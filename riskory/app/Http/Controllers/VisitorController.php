<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Content;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class VisitorController extends Controller
{
    //
    public function __construct()
    {
        
    }

    public function index(){
        
        if(Auth::user()){
            return redirect()->route('user');
        }
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
        if(Auth::user()){
            return redirect()->route('user');
        }

        return view('user.register');
    }

    public function register(Request $request){
        $validation = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'captcha' => 'required|captcha',
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
        event(new Registered($user));
        
        return redirect()->route('userLogin');
        
    }

    public function loginForm(){
        if(Auth::user()){
            return redirect()->route('user');
        }else{
            if(!session()->has('url.intended'))
            {
                session(['url.intended' => url()->previous()]);
            }
            return view('user.login');
        }
        
    }

    public function submission(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
            'captcha' => 'required|captcha'
        ]);

       $data = array(
        'name'=>$request->input('name'),
        'email'=>$request->input('email'),
        'message'=>$request->input('message'),
       );
       $con = Contact::create($data);
       if($con){
        $request->session()->flash('success', 'Submitted successfully');

        }else{
            $request->session()->flash('error', 'Unable to submit ! Try again later');
        }
        return redirect()->route('contactUs');
    }

    public function reloadCaptcha()
    {
        return response()->json(['captcha'=> captcha_img()]);
    }

}
