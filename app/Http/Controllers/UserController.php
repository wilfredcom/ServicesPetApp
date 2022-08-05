<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUser(Request $request)
    {
        try {
            $user = User::where('email', $request['email'])->first();
            return response()->json($user);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function index()
    {
        try {
            $users = User::all();
            return response()->json($users);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
