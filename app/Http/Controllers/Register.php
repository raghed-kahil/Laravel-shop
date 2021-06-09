<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Register extends Controller
{
  public function __invoke(Request $request)
  {
    //validating data
    $this->validate($request, [
      'fname' => 'required|alpha_dash',
      'lname' => 'required|alpha_dash',
      'email' => ['required', 'email', 'unique:users'],
      'password' => 'required|confirmed',
    ]);
    //creating user
    $user = new User($request->only(['fname', 'lname', 'email']));
    $user->setAttribute('password', Hash::make('rdkl-sail'.$request->get('password') ));
    $user->save();
    Auth::login($user, true);
    $request->session()->regenerate();
    return redirect('/');
  }
}
