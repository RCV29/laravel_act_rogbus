<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthManager extends Controller
{
    function login(){
        if (Auth::check()){
            return redirect(route('home'));
        }
        return view('login');
    }

    function registration(){
        if (Auth::check()){
            return redirect(route('home'));
        }
        return view('registration');
    }

    function loginPost(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email','password');
        if(Auth::attempt($credentials)){
            return redirect()->intended(route('home'));
        }
        return redirect(route('login'))->with("error", "Invalid credential");

    }

    function registrationPost(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);

        $data['name']= $request->name;
        $data['email']= $request->email;
        $data['password']= Hash::make($request->password);
        $user = User::create($data);
        if(!$user){
            return redirect(route('registration'))->with("error", "Registration failed try again");
        }
        return redirect(route('login'))->with("success", "Registration Successful");
    }


    function logout(){
        
        Auth::logout();
        return redirect(route('login'));

    }

    function dashboard(){
        
        Auth::logout();
        return redirect(route('dashboard'));

    }

    public function index(){
        return User::with('expenses')->get(); // Changed 'credentials' to 'expenses'
    }

    public function store(Request $request){
        $user = User::create($request->all());
        if($request->has('expenses')){
            $user->expenses()->createMany($request->input('expenses'));
        }
        return response()->json($user, 200); // Changed status code to 200
    }

    public function update(Request $request, $id){
        $user = User::find($id);
        $user->update($request->all());
        return response()->json(['user' => $user]);
    }

    public function destroy($id){
        $user = User::find($id);
        $user->expenses()->delete();
        $user->delete();
        return response()->json(['message' => "successfully deleted data"]);
    }
}


