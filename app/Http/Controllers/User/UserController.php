<?php

namespace App\Http\Controllers\User;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider;
use App\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UpdateRequest;
use Illuminate\Support\Facades\Route;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Support\Facades\Session;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Config;

//use Illuminate\Validation\Validator;

class UserController extends Controller
{
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->middleware('auth');
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        return view('user')->with(['auth_role' =>  Config::get('common.' . Auth::user()->role) ]);
    }

    public function showUser()
    {
        return view('show_user')->with(['users' => $this->userRepository->getData()]);
    }

    public function store(UserRequest $request)
    {
        return $this->userRepository->setData($request);
    }

    public function find(Request $request)
    {
        return view('show_user')->with(['users' => $this->userRepository->findData($request)]);
    }

    public function update(UpdateRequest $request)
    {
        return $this->userRepository->updateData($request);
    }

    public function edit($id)
    {
        if ($this->checkRole('edit-user')) return redirect()->route('user.infoUpdate',
            ['id' => $id]);
        return $this->userRepository->denied_permission();
    }

    public function delete($id)
    {
        if ($this->checkRole('create-user')) return $this->userRepository->deleteData($id);
        return $this->userRepository->denied_permission();
    }

    public function restore()
    {
        if ($this->checkRole('restore-user')) return view('show_soft_delete_user')
            ->with(['users' => $this->userRepository->getSoftDeleteData()]);
        return $this->userRepository->denied_permission();
    }

    public function _postRestore($id)
    {
        return $this->userRepository->restoreData($id);
    }

    public function checkRole($roleName)
    {
        if (Gate::allows($roleName)) {
            return true;
        }
        return false;
    }

    public function info()
    {
        if ($this->checkRole('create-user')) return view('user_create');
        return $this->userRepository->denied_permission();
    }

    public function infoSearch()
    {
        return view('user_search');
    }

    public function infoUpdate($id = null)
    {
        if ($id != null) {
            return view('user_update')->with(['users' => $this->userRepository->getData($id)]);
        }
        return view('user_update')->with(['users' => $this->userRepository->getData(Auth::user()->id)]);
    }
}
