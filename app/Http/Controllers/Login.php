<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Login extends Controller
{
  //
  public function login()
  {
    $credentials = [
      'email' => 'admin@admin.com',
      'password' => 'admin'
    ];

    if (Auth::attempt($credentials)) {
      $user = new User();
      $user->name = 'admin';
      $user->email = $credentials['email'];
      $user->password = Hash::make( $credentials['password'] );
      $user->save();
    }

    if (Auth::attempt($credentials)) {
      $user = Auth::user();
      $adminToken = $user->createToken('adminToken', ['create', 'update', 'delete']);
      $updateToken = $user->createToken('updateToken', ['create', 'update']);
      $basicToken = $user->createToken('basicToken');
      return [
        'adminToken' => $adminToken->plainTextToken,
        'updateToken' => $updateToken->plainTextToken,
        'basic' => $basicToken->plainTextToken,
      ];
    }
  }
}
