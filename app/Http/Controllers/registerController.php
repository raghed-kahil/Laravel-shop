<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class registerController extends Controller
{
    public function __invoke(Request $request){
            $this->validate($request,[
                'name' => 'required|alpha_dash',
                'email' => 'required|email',
                'password' => 'required|confirmed',
                ]);
        return $request->post();
    }
}
