<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class VisitorController extends Controller
{
    //
    public function __construct()
    {
        
    }

    public function index(){
        

        return view('user.homepage');
    }

    public function about(){
        $con = Content::where('key','=','about-us')->get()->first();
        return view('user.aboutus',compact('con'));
    }

    public function contact(){
        $con = Content::where('key','=','contact-us')->get()->first();
        return view('user.contactus',compact('con'));
    }

    public function signup(){

        return view('user.register');
    }

    public function register(Request $request){
        $validation = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
        
        $user =  User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        $user->attachRole('user');
        if($user){
            $request->session()->flash('success', 'Successfully registered to RISKORY');

        }else{
            $request->session()->flash('error', 'Unable to complete your request. Try Again later');
        }

        return redirect()->route('userLogin');
        
    }

    public function loginForm(){
        if(Auth::user()){
            return redirect()->route('user');
        }else{
            return view('user.login');
        }
        
    }

}
