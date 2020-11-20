<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        return view('user.aboutus');
    }

    public function contact(){

        return view('user.contactus');
    }

    public function signup(){

        return view('user.register');
    }

}
