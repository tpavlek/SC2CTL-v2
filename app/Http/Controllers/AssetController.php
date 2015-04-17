<?php

namespace Depotwarehouse\SC2CTL\Web\Http\Controllers;

use Depotwarehouse\SC2CTL\Web\Model\User\UserRepository;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\MessageBag;
use Image;

class AssetController extends Controller
{

    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * [POST] Upload a user profile image.
     *
     * @param $id
     * @param Image $image
     * @param Request $input
     * @param Repository $config
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function uploadUserProfileImage($id, Image $image, Request $input, Repository $config)
    {
        $user = $this->userRepository->find($id);

        if (!$input->hasFile('img')) {
            return redirect()->route('user.edit', $id)->withErrors(new MessageBag([
                'errors' => "You did not upload an image"
            ]));
        }
        $file = $input->file('img');
        $path = $file->getRealPath();

        $img = Image::make($path);
        $img->resize(200, 200, function ($constraint) {
            $constraint->upsize();
            $constraint->aspectRatio();
        });

        $profile_img_path = $config->get('storage.user_profile_img_path');
        $img->save(public_path() . $profile_img_path . '/uid_' . $id . ".jpg");

        return redirect()->route('user.show', $id);
    }
}
