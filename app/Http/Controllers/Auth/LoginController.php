<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Rules\CurrentPassword;
use App\Traits\RedirectsAuthUsers;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Helpers\Classes\Flash;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers, RedirectsAuthUsers;

    /**
     * @var int
     */
    public $maxAttempts = 3;

    /**
     * @var int
     */
    public $decayMinutes = 10;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout', 'showLogoutOtherDevicesForm', 'logoutOtherDevices');
    }

    /**
     * Get the login username or email to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        $identity  = request()->input('email_or_username');
        $fieldName = filter_var($identity, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        request()->merge([$fieldName => $identity]);
        return $fieldName;
    }

    /**
     * Validate the user login request.
     *
     * @param Request $request
     */
    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|max:190',
            'password' => 'required|min:6|max:50',
        ], [
            "{$this->username()}.required" => __('Email or Username is required.'),
            'password.required' => __('Password is required.'),
        ]);
    }

    /**
     * @param Request $request
     * @param $user
     */
    public function authenticated(Request $request, User $user)
    {
        if($user->banned_at === null){
            Flash::success(__("Hi {$user->name}, welcome back!"));
        }
    }

    /**
     * @param Request $request
     */
    public function loggedOut(Request $request)
    {
        Flash::success(__('You logged out successfully!'));
    }

    /**
     * @return Factory|View
     */
    public function showLogoutOtherDevicesForm()
    {
        if (!session()->has('referer_url')) {
            session()->put('referer_url', redirect()->back()->getTargetUrl());
        }

        return view('auth.logout-other-devices');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function logoutOtherDevices(Request $request)
    {
        $request->validate([
            'password' => ['required', new CurrentPassword]
        ]);

        Auth::logoutOtherDevices($request->input('password'));

        Flash::success(__('You logged out successfully on other devices!'));

        if (session()->has('referer_url')) {
            $referer = session()->pull('referer_url');
            return redirect()->to($referer);
        }

        return redirect()->route('front.home');
    }
}
