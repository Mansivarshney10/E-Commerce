<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    // 
    public function index()
    {
        return view('auth.login');
    }

    public function registration()
    {
        return view('auth.registration');
    }

    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')->withSuccess('You have successfully loggedin');
        }

        return redirect("login")->withSuccess('Oppss! You have entered invalid credentials');
    }

    public function postRegistration(Request $request){
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'password' => 'required|min:6'
        ]);

        $data =  $request->all();
        $obj = new User(); 
        $obj->name=$request->name;
        $obj->address=$request->address;
        $obj->phone=$request->phone;
        $obj->email=$request->email;
        $obj->password=Hash::make($request->password);
        $obj->save();
        return redirect("dashboard")->withSuccess('Great! You have Successfully loggedin');
    }

    public function dashboard()
    {
        if(Auth::check()){
            return view('dashboard');
        }
        return redirect("login")->withSuccess('Opps! You do not have access');
    }

    public function create(array $data){
        return User::create([
            'name' => $data['name'],
            'address' => $data['address'],
            'phone' => $data['phone'] ?? 1234567,
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }

    public function logout(){
        Auth::logout();

        return Redirect('login');
    }
}
