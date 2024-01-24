<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\Response;

class UserController extends Controller
{
    public function index(): Response
    {
        return response()->view('admin.manage_users.index', [
            'users' => User::orderBy('updated_at', 'desc')->get(),
        ]);
    }

    public function form(){
        $users = User::all();
        return view('admin.manage_users.form', compact('users'));
    }
}
