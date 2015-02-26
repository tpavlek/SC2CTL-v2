<?php

namespace Depotwarehouse\SC2CTL\Web\Http\Controllers\Auth;

use Depotwarehouse\OAuth2\Client\Provider\BattleNet;
use Depotwarehouse\OAuth2\Client\Provider\BattleNetUser;
use Depotwarehouse\SC2CTL\Web\Http\Controllers\Controller;
use Depotwarehouse\SC2CTL\Web\Model\User\BattleNetUserRepository;
use Depotwarehouse\Toolbox\DataManagement\Validation\ValidationException;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Logging\Log;
use Illuminate\Support\MessageBag;
use Input;
use Redirect;

class BNetAuthController extends Controller
{
    /**
     * @var BattleNet
     */
    protected $provider;

    protected $auth;

    protected $logger;

    public function __construct(BattleNet $provider, BattleNetUserRepository $repository, Guard $auth, Log $logger)
    {
        $this->provider = $provider;
        $this->repository = $repository;
        $this->auth = $auth;
        $this->logger = $logger;

        $this->middleware('auth');
        $this->middleware('requires_bnet', [ 'only' => 'bnet_disconnect' ]);
    }

    /**
     * Redirect to the Battle.net authorizer.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function bnet_connect()
    {
        return Redirect::to($this->provider->getAuthorizationUrl());
    }

    /**
     * Auth to BNet.
     *
     * This method is used as the callback from the Battle.net server in the authorization_code OAuth flow.
     * It will create a new BattleNetUser record if one does not exist, otherwise it will update the existing one.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function bnet_auth()
    {
        //TODO This method is a little long. Consider refactoring.
        // Was the OAuth return successful?
        if (Input::has('code') and $code = Input::get('code')) {
            try {
                $token = $this->provider->getAccessToken("authorization_code", [
                    'code' => $code
                ]);

                /** @var BattleNetUser $user */
                $bnet_user = $this->provider->getUserDetails($token);
                $attributes = (array)$bnet_user;
                $attributes['user_id'] = $this->auth->user()->id;
                // The ID field is not fillable, so we make sure to set it as bnet_id.
                $attributes['bnet_id'] = $attributes['id'];
                unset($attributes['id']);

                if ($this->repository->isAccountUsed($attributes['bnet_id'])) {
                    return Redirect::route('user.show', $this->auth->user()->id)
                        ->withErrors(new MessageBag([
                            'errors' => "Someone has already connected to that BNet Account"
                        ]));
                }

                $this->repository->create($attributes);

                return Redirect::route('user.show', $this->auth->user()->id);

            } catch (ValidationException $exception) {
                return Redirect::route('user.edit', $this->auth->user()->id)
                    ->withErrors($exception->get());
            } catch (\Exception $exception) {
                $this->logger->error("Exception connecting to BNET API");
                $this->logger->error($exception);

                return Redirect::route('user.edit', $this->auth->user()->id)->withErrors(new MessageBag([
                    'errors' => "Error connecting to BNET API: " . $exception->getMessage()
                ]));
            }
        }
        // Were there OAuth errors?
        if (Input::has('error') and $error = Input::get('error')) {
            return Redirect::route('user.edit')
                ->withErrors(new MessageBag([
                    'errors' => "Error connecting to Battle.net: {$error} - " . Input::get('error_description')
                ]));
        }

        // No code or error, something odd happened.
        return Redirect::route('user.edit', $this->auth->user()->id)->withErrors(new MessageBag(
            [ 'errors' => 'An unexpected error occured, please try again later' ]
        ));
    }

    /**
     * Disconnect the current Battle.net account.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function bnet_disconnect()
    {
        $bnet_id = $this->auth->user()->bnet->id;
        $this->repository->destroy($bnet_id);
        return Redirect::route('user.show', $this->auth->user()->id);
    }

}
