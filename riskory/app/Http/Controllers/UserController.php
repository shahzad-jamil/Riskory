<?php

namespace App\Http\Controllers;

use App\Models\Bframework;
use App\Models\Bprocess;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Industry;

class UserController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        
        $categories = Category::all();
        $industries = Industry::where('status','=','1')->with('parent')->skip(0)->take(8)->get();
        $bprocesses = Bprocess::with('parent')->skip(0)->take(8)->get();
        $bframeworks = Bframework::with('parent')->skip(0)->take(8)->get();

        //dd($industries->toArray());
        return view('user.contributor.dashboard',compact('industries','bprocesses','bframeworks'));
    }

    public function seeMore($req = null){
        if($req == 'industries'){
            $data = Industry::where('status','=','1')->get();
            $name = 'Industry';
            $icon = 'assets/images/Mask-Group-55.svg';
            return view('user.contributor.viewMore',compact('data','name','icon'));
        }elseif($req == 'bframeworks'){
            $data = Bframework::where('status','=','1')->get();
            $name = 'Business Framework';
            $icon = 'assets/images/Mask Group 57.svg';
            return view('user.contributor.viewMore',compact('data','name','icon'));
        }elseif($req == 'bprocesses'){
            $data = Bprocess::where('status','=','1')->get();
            $name = 'Business process';
            $icon = 'assets/images/Mask Group 56.svg';
            return view('user.contributor.viewMore',compact('data','name','icon'));
        }else{
            
            return redirect()->route('user');
        }


    }

    public function userProfile(){
        return view('user.profile.userProfile');
    }
}
