<?php

namespace App\Http\Controllers\Front;

use App\Helpers\Classes\Flash;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\Repository\Contracts\IUserRepository;
use Illuminate\View\Factory;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * @var IUserRepository
     */
    private $userRepository;

    /**
     * @param IUserRepository $userRepository
     */
    public function __construct(IUserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @return Factory|View
     */
    public function edit()
    {
        $user = auth()->user();

        return view('front.profile.edit', compact('user'));
    }

    public function update(ProfileUpdateRequest $request)
    {
        $user = auth()->user();

        $user->update(
            $request->only(
                'name',
                'date_of_birth',
                'sex',
                'username',
                'email',
                'phone',
                'address',
                'description',
                'private'
            )
        );

        if($request->input('password') !== null){
            $user->update(
                $request->only('password')
            );
        }

        Flash::success(__('Your profile is successfully updated.'));

        return redirect()->back();
    }
}
