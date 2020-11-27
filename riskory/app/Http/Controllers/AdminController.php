<?php

namespace App\Http\Controllers;

use App\Models\Bframework;
use App\Models\Bprocess;
use App\Models\Category;
use App\Models\Industry;
use App\Models\User;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('role:superadministrator');
    }

    public function index(){
       $indCount = Industry::get()->count();
       $bpCount = Bprocess::get()->count();
       $bfCount = Bframework::get()->count();
       $catCount = Category::get()->count();
       //dd($indCount);
        return view('admin.index',compact('indCount','bpCount','bfCount','catCount'));
    }

    public function allContributors(){
        $contributors = User::all();
        return view('controls.contributor.index',compact('contributors'));
    }

    public function viewContributor($id){
        $contributor = User::find($id);
        return view('controls.contributor.view',compact('contributor'));
    }


}
