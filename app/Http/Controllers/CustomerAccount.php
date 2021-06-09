<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

class CustomerAccount extends Controller
{
    public function index(){

        return view('customer-account')
            ->with('wrongPassword',Session::get('wrongPassword',false))
            ->with('user',Auth::user());
    }
    public function store(Request $request)
    {
        $user = Auth::user();
        $this->validate($request, ['change-password'=>'required|boolean']);
        //change password
        if ($request->get('change-password')) {
            $this->validate($request, ['password_old' => 'required', 'password' => 'required|confirmed']);
            if (Auth::once(['email' => $user->email, 'password' => 'rdkl-sail' . $request->get('password_old')])) {
                $user->setAttribute('password', Hash::make('rdkl-sail'.$request->get('password')));
                $user->save();
            }
            else
                return redirect()->back();
        }
        //update details
        else{
            $this->validate($request, ['email'=>'required|email']);
            $user->setRawAttributes($request->only([
                'fname', 'lname',
                'email',
                'company', 'city',
                'street', 'zip',
                'state', 'country',
                'phone']));
            $user->save();
        }
        return redirect()->back();
    }
}
