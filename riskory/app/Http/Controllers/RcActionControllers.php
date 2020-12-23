<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use App\Models\Dislike;
use App\Models\Like;
use App\Models\RiskControl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RcActionControllers extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function bookmark(RiskControl $riskControl,Request $request){

        // dd($control);
        if($riskControl->bookmarkedBy($request->user())){
            return response(null,409);
        }
        $riskControl->bookmarks()->create([
            'user_id'=>$request->user()->id,
            'rc_id'=>$riskControl,
        ]);

        return back();
    }

    public function unbookmark(RiskControl $riskControl,Request $request){
        //dd($control);
        $request->user()->bookmarks()->where('rc_id',$riskControl->id)->delete();
        return back();
    }

    public function like(RiskControl $riskControl,Request $request){

        // dd($control);
        // if($riskControl->likedBy($request->user())){
        //     return response(null,409);
        // }
        // Dislike::where('rc_id',$riskControl->id)->where('user_id',$request->user()->id)->delete();
        // $riskControl->likes()->create([
        //     'user_id'=>$request->user()->id,
        //     'rc_id'=>$riskControl,
        // ]);

        // return back();

        // if($riskControl->likedBy($request->user())){
        //     return response(null,409);
        // }
        Dislike::where('rc_id',$riskControl->id)->where('user_id',$request->user()->id)->delete();
        $riskControl->likes()->create([
            'user_id'=>$request->user()->id,
            'rc_id'=>$riskControl,
        ]);

        return back();
    }

    public function unlike(RiskControl $riskControl,Request $request){
        //dd($control);
        $request->user()->likes()->where('rc_id',$riskControl->id)->delete();
        return back();
    }

    public function dislike(RiskControl $riskControl,Request $request){

        // dd($control);
        if($riskControl->dislikedBy($request->user())){
            return response(null,409);
        }
        Like::where('rc_id',$riskControl->id)->where('user_id',$request->user()->id)->delete();
        $riskControl->dislikes()->create([
            'user_id'=>$request->user()->id,
            'rc_id'=>$riskControl,
        ]);

        return back();
    }

    public function undislike(RiskControl $riskControl,Request $request){
        //dd($control);
        $request->user()->dislikes()->where('rc_id',$riskControl->id)->delete();
        return back();
    }

    public function allBookmarks(Request $request){
        $rcs = Bookmark::where('user_id',Auth::id())->get();
        return view('user.bookmark.index',compact('rcs'));
    }

}
