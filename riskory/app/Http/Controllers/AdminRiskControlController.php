<?php

namespace App\Http\Controllers;

use App\Models\RiskControl;
use Illuminate\Http\Request;

class AdminRiskControlController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('role:superadministrator');
    }

    public function index(){
        $rcs = RiskControl::all();

        return view('riskcontrol.index',compact('rcs'));
    }
}
