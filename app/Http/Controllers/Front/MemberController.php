<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Repository\Contracts\IUserRepository;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MemberController extends Controller
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
     * @param Request $request
     * @return Factory|View
     */
    public function index(Request $request)
    {
        $users = $this->userRepository
            ->queryPublicClients($request->input('keyword'))
            ->paginate(10);

        return view('front.member.index', compact('users'));
    }

    /**
     * @param string $username
     * @return Factory|View
     */
    public function details(string $username)
    {
        $user = $this->userRepository->findClientByUsername($username);

        return view('front.member.details', compact('user'));
    }
}
