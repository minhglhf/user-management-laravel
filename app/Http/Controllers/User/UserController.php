<?php

namespace App\Http\Controllers\User;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider;
use App\PostUser;
use App\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UserRequest;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        return view('user');
    }

    public function showUser()
    {
        if (Gate::allows('view-user')) {
            return view('show_user')->with(['users' => $this->userRepository->getData()]);
        }
        return $this->userRepository->denied_permission();
    }

    public function store(UserRequest $request)
    {
        return $this->userRepository->setData($request);
    }

    public function find(Request $request)
    {
        return view('show_user')->with(['users' => $this->userRepository->findData($request)]);
    }

    public function update(UserRequest $request)
    {
        return $this->userRepository->updateData($request);
    }

    public function edit(Request $request)
    {
        if (Gate::allows('edit-user')) {
            return $this->infoUpdate($request->id);
        }
        return $this->userRepository->denied_permission();
    }

    public function delete(Request $request)
    {
        if (Gate::allows('delete-user')) {
            return $this->userRepository->deleteData($request->id);
        }
        return $this->userRepository->denied_permission();
    }

    public function restore(Request $request)
    {
        if (Gate::allows('restore-user')) {
          //  return $this->userRepository->restoreData($request->id);
            return  view('show_user')->with(['users' => $this->userRepository->getData()]);
        }
        return $this->userRepository->denied_permission();
    }

    public function pickId(Request $request){
        return view('chooseAction')->with(['user_id' =>  $request->user_id]);
    }

    public function info()
    {
        if (Gate::allows('create-user')) {
            return view('user_create');
        }
        return $this->userRepository->denied_permission();
    }

    public function infoSearch()
    {
        return view('user_search');
    }

    public function infoUpdate($id = null)
    {
        if($id != null) return view('user_update')->with(['users' => $this->userRepository->getData($id)]);
        return view('user_update')->with(['users' => $this->userRepository->getData(Auth::user()->id)]);
    }
}
