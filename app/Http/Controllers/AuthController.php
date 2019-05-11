<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $data = $request->only(['email', 'password']);

        return dd(Auth::attempt($data));
    }

    public function register(Request $request)
    {
      $data = $request->only([
      'f_name',
      's_name',
      'email',
      'password',
      'phone',
      'address'
      ]);

      $data['role'] = 'customer';

      return User::create($data);
    }


}
