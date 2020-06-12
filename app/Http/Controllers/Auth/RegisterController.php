<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\Classes\Flash;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Repository\Contracts\IUserRepository;
use App\Traits\RedirectsAuthUsers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Validation\Validator as ValidatorContract;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers, RedirectsAuthUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    private $userRepository;

    /**
     * Create a new controller instance.
     *
     * @param IUserRepository $userRepository
     * @return void
     */
    public function __construct(IUserRepository $userRepository)
    {
        $this->middleware('guest');

        $this->userRepository = $userRepository;
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return ValidatorContract
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:190'],
            'username' => ['required', 'string', 'max:190', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:190', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'max:50', 'confirmed']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return Model
     */
    protected function create(array $data)
    {
        return $this->userRepository->create([
            'role_id' => 2,
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => $data['password'],
        ]);
    }

    /**
     * @param Request $request
     * @param $user
     */
    public function registered(Request $request, $user)
    {
        Flash::success(__('You are successfully registered on our APP! Please confirm your email address...'));
    }
}
