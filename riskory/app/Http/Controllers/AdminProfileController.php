<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class AdminProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('role:superadministrator');
    }
    

    public function index()
    {
        // $user = User::where('id',Auth::id())->first();
        // //$user = User::with('getCountry')->get();
        // dd($user);
        //return view('admin.profileView',compact('user'));
    }
}
