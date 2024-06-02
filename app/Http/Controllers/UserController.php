<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function openLogin(){
        return view('user.login');
    }
    public function login(Request $request){
        $email   = $request->email;
        $password = $request->password;

        if(Auth::attempt(['email' => $email, 'password' => $password])){
            return redirect('/');
        }
        else{
            return redirect('/login');
        }


    }

    public function openRegister(){
        return view('user.register');
    }
    public function register(Request $request){
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;

        try {
            User::create([
                'name'=>$name,
                'email'=>$email,
                'password'=>Hash::make($password)
            ]);
            return redirect('/login');
        } catch (Exception $e) {
            return redirect('/register');
        }
    }

    public function openlogout(){
        return view('students.logout');
    }
    public function logout(){
        Auth::logout();
        return redirect('/login');
    }

}
