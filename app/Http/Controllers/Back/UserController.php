<?php

namespace App\Http\Controllers\Back;

use App\Helpers\Classes\Flash;
use App\Http\Controllers\Controller;
use App\Repository\Contracts\IUserRepository;
use Carbon\Carbon;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;
use Exception;

class UserController extends Controller
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
     * @throws Exception
     */
    public function index(Request $request)
    {
        if($request->expectsJson()){

            $users = $this->userRepository->queryUsersDatatable();

            return Datatables::of($users)
                ->addColumn('actions', 'back.users.actions')
                ->rawColumns(['actions'])
                ->make(true);

        } else{
            return view('back.users.index');
        }
    }

    /**
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     * @throws Exception
     */
    public function ban(Request $request, int $id)
    {
        $user = $this->userRepository->findOrFail($id);

        if($user->id !== auth()->user()->id){
            $user->banned_at = Carbon::now();
            $user->save();

            if($user){
                Flash::success(__('User is successfully banned!'));
            } else{
                Flash::error(__('User could not be banned!'));
            }
        } else{
            Flash::error(__('You cannot ban or unban your account!'));
        }

        return redirect()->route('back.users.index');
    }

    /**
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     * @throws Exception
     */
    public function unBan(Request $request, int $id)
    {
        $user = $this->userRepository->findOrFail($id);

        if($user->id !== auth()->user()->id){
            $user->banned_at = null;
            $user->save();

            if($user){
                Flash::success(__('User is successfully unbanned!'));
            } else{
                Flash::error(__('User could not be unbanned!'));
            }
        } else{
            Flash::error(__('You cannot ban or unban your account!'));
        }

        return redirect()->route('back.users.index');
    }

    /**
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     * @throws Exception
     */
    public function delete(Request $request, int $id)
    {
        $user = $this->userRepository->findOrFail($id);

        if($user->id !== auth()->user()->id){
            $deleted = $user->delete();

            if($deleted){
                Flash::success(__('User is successfully deleted!'));
            } else{
                Flash::error(__('User could not be deleted!'));
            }
        } else{
            Flash::error(__('You cannot delete your account!'));
        }

        return redirect()->route('back.users.index');
    }
}
