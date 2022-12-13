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
    /**
     * Login View
     */
    public function index()
    {
        return view('auth.login');
    }
    
    /**
     * Registration View
     */
    public function registration()
    {
        return view('auth.registration');
    }
    
    /**
     * 1. Check Validities 
     * 2. Check Existing User
     * 3. Get User Login 
     */
    // $request object-oriented way to interact with the current HTTP request being handled by your application
    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        // attempt() accepts an array of key / value pairs as its first argument
        if (Auth::attempt($credentials)) {
            // intended() redirect the user to the URL they were attempting to access before being intercepted by the authentication middleware
            return redirect()->intended('dashboard')->withSuccess('You have successfully loggedin');
        }

        return redirect("login")->withSuccess('Oppss! You have entered invalid credentials');
    }

    /**
     * 1. Check Validities 
     * 2. Get User Register
     */
    // $request object-oriented way to interact with the current HTTP request being handled by your application
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

    /**
     * 1. Display Successfull Login messege
     * 2. Display Successfull Register messege
     */
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

    /**
     * Logout - Session Break
     */
    public function logout(){
        Auth::logout();

        return Redirect('login');
    }
}
