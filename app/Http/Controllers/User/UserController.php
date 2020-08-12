<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('user');
    }

    public function showUser()
    {

        return 'show controller';
    }

    public function create()
    {
        return 'create controller';
    }


    public function search()
    {
        return 'search controller';
    }

    public function update()
    {
        return 'update controller';
    }

    public function edit()
    {
        return 'edit controller';
    }

    public function delete()
    {
        return 'delete controller';
    }

    public function restore()
    {
        return 'restore controller';
    }
}
