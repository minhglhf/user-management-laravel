<?php

namespace App\Http\Controllers\User;

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
        return view('show_user')->with(['users' => $this->userRepository->getData()]);
    }

    public function info()
    {
        return view('user_create');
    }

    public function infoSearch()
    {
        return view('user_search');
    }

    public function infoUpdate()
    {
        return view('user_update')->with(['users' => $this->userRepository->getData(Session::get('login'))]);
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

    public function edit()
    {
        return 'edit controller';
    }

    public function delete(Request $request)
    {
        return $this->userRepository->deleteData($request->id);
    }

    public function restore(Request $request)
    {
        return $this->userRepository->restoreData($request->id);
    }
}
