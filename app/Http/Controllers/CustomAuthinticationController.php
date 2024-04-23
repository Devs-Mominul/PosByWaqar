<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CustomAuthinticationController extends Controller
{
    public function user(){
        return view('authentication.user_login');
    }
    public function user_post(Request $request){
        $request->validate([
            'name' => ['required'],
            'email' => ['required'],
            'password' => ['required'],
           'user_type'=>['required'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'user_type'=>$request->user_type,

        ]);
        return redirect()->route('login');

    }
    public function admin(){
        return view('authentication.admin');
    }
    public function admin_post(Request $request){
        $request->validate([
            'name' => ['required'],
            'email' => ['required'],
            'password' => ['required'],
           'user_type'=>['required'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'user_type'=>$request->user_type,

        ]);
        return redirect()->route('login');

    }
    public function depo(){
        return view('authentication.depo');
    }
    public function depo_post(Request $request){
        $request->validate([
            'name' => ['required'],
            'email' => ['required'],
            'password' => ['required'],
           'user_type'=>['required'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'user_type'=>$request->user_type,

        ]);
        return redirect()->route('login');

    }
    public function stockiest(){
        return view('authentication.stockiest');
    }
    public function stockiest_post(Request $request){
        $request->validate([
            'name' => ['required'],
            'email' => ['required'],
            'password' => ['required'],
           'user_type'=>['required'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'user_type'=>$request->user_type,

        ]);
        return redirect()->route('login');

    }
}
