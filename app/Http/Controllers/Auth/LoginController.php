<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index(){
        return view('');
    }

    public function login(Request $request){
        $this->validator($request->all())->validate();

        if(auth::attempt($request->only('email','password'), $request->filled('remember'))){
            return redirect()->intended(route('home'));
        }

        return redirect()->back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->withInput($request->except('password'));
    }

    protected function validator(array $data){
        return Validator::make($data, [
            'email'=> ['required', 'string', 'email'],
            'password'=> ['required', 'string'],

        ]);
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('home');
    }

}
