<?php

namespace Depotwarehouse\SC2CTL\Web\Http\Controllers;

use Depotwarehouse\SC2CTL\Web\Model\User\UserRepository;
use Depotwarehouse\Toolbox\DataManagement\Validation\ValidationException;
use Illuminate\Contracts\Auth\Guard;
use Input;
use Redirect;
use View;

class UserController extends Controller
{

    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Returns a paginated list of all the users.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // TODO make this paginate.
        $users = $this->userRepository->all();
        return View::make('user/index')->with('users', $users);
    }

    /**
     * Show the page for a particular user.
     *
     * @param  int $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $user = $this->userRepository->find($id);
        return View::make('user.show')
            ->with('user', $user);
    }

    /**
     * Save a user record to the database.
     *
     * @param Guard $auth
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Guard $auth)
    {
        $attributes = Input::all();
        // We need to explicitly pull the confirmation here since it's not a field of the model, but we want to validate.
        $attributes['password_confirmation'] = Input::get('password_confirmation');

        try {
            $user = $this->userRepository->create($attributes);
            $auth->login($user, false);
            return Redirect::route('user.show', $user->id);

        } catch (ValidationException $exception) {
            return Redirect::route('user.register')
                ->withErrors($exception->get())
                ->withInput();
        }
    }

    /**
     * Show the form to edit a user's properties.
     *
     * @param $id
     * @return View
     */
    public function edit($id)
    {
        $user = $this->userRepository->find($id);

        return View::make('user.edit')
            ->with('user', $user);
    }

    /**
     * Updates a user's properties.
     *
     * @param  int $id
     * @return Redirect
     */
    public function update($id)
    {
        $attributes = Input::all();

        try {
            $this->userRepository->update($id, $attributes);
        } catch (ValidationException $exception) {
            return Redirect::route('user.edit', $id)
                ->withErrors($exception->get())
                ->withInput();
        }

        return Redirect::route('user.show', $id);
    }

}
