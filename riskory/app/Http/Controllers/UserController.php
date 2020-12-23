<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use Illuminate\Http\Request;
use App\Models\Control;
use App\Models\Country;
use App\Models\Dislike;
use App\Models\Like;
use App\Models\RiskControl;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(){
        
        //$categories = Control::where('status','=','1')->where('type','category')->with('parent')->skip(0)->take(8)->get();
        $industries = Control::where('status','=','1')->where('type','industry')->with('parent')->with('followers')->skip(0)->take(8)->get();
        $bprocesses = Control::where('status','=','1')->where('type','bprocess')->with('parent')->with('followers')->skip(0)->take(8)->get();
        $bframeworks = Control::where('status','=','1')->where('type','bframework')->with('parent')->with('followers')->skip(0)->take(8)->get();
        $tags = Tag::where('status','=','1')->skip(0)->take(8)->get();
        //dd($industries->toArray());
        return view('user.contributor.dashboard',compact('industries','bprocesses','bframeworks','tags'));
    }

    public function seeMore($req = null){
        if($req == 'industries'){
            $data = Control::where('status','=','1')->where('type','industry')->with('parent')->with('followers')->get();
            $name = 'Industry';
            $icon = 'assets/images/Mask-Group-55.svg';
            return view('user.contributor.viewMore',compact('data','name','icon'));
        }elseif($req == 'bframeworks'){
            $data = Control::where('status','=','1')->where('type','bframework')->with('parent')->with('followers')->get();
            $name = 'Business Framework';
            $icon = 'assets/images/Mask Group 57.svg';
            return view('user.contributor.viewMore',compact('data','name','icon'));
        }elseif($req == 'bprocesses'){
            $data = Control::where('status','=','1')->where('type','bprocess')->with('parent')->with('followers')->get();
            $name = 'Business process';
            $icon = 'assets/images/Mask Group 56.svg';
            return view('user.contributor.viewMore',compact('data','name','icon'));
        }elseif($req == 'tags'){
            $data = Tag::where('status','=','1')->with('followers')->get();
            $name = 'Tags';
            $icon = 'assets/images/Icon awesome-tags.png';
            
            return view('user.contributor.viewMoreTags',compact('data','name','icon'));
        }else{
            
            return redirect()->route('user');
        }


    }

    public function userProfile(){
        $bookmarks = Bookmark::where('user_id',Auth::id())->with('rcs')->simplePaginate(2);
        $rcs = RiskControl::where('user_id',Auth::id())->with('likes')->with('dislikes')->with('bookmarks')->simplePaginate(2);
        $likes = Like::where('user_id',Auth::id())->with('rcs')->simplePaginate(2);

        return view('user.profile.userProfile',compact('rcs','bookmarks','likes'));
    }

    public function byControl(Control $control ){
       $data =  $control->rccontrols;
       
       return view('user.rc.viewByControl',compact('data'));
    }

    public function byTag(Tag $tag){
       $data =  $tag->rctags;
       $expiresAt = now()->addHours(3);
        views($tag)
            ->cooldown($expiresAt)
            ->record();
       return view('user.rc.viewByControl',compact('data'));
    }



    public function fetchBookmarks(Request $request, User $user){
        if($request->ajax())
        {
            $bookmarks = Bookmark::where('user_id',$user->id)->with('rcs')->simplePaginate(2);
            //dd($rcs);
            return view('user.profile.bookmarks', compact('bookmarks'))->render();
        }
    }

    public function fetchRiskcontrols(Request $request, User $user){
        if($request->ajax())
        {
            $rcs = RiskControl::where('user_id',$user->id)->simplePaginate(2);
            //dd($rcs);
            return view('user.profile.riskcontrols', compact('rcs'))->render();
        }
    }

    public function fetchLikes(Request $request,User $user){
        if($request->ajax())
        {
            $likes = Like::where('user_id',$user->id)->with('rcs')->simplePaginate(2);
            //dd($rcs);
            return view('user.profile.likes', compact('likes'))->render();
        }
    }

    public function fetchDislikes(Request $request,User $user){
        if($request->ajax())
        {
            $likes = Dislike::where('user_id',$user->id)->with('rcs')->simplePaginate(2);
            //dd($rcs);
            return view('user.profile.likes', compact('likes'))->render();
        }
    }

    public function editProfile(Request $request){
        $user = User::find(Auth::id());
        $countries = Country::all();
        
        return view('user.profile.editProfile',compact('user','countries'));
    }

    public function updateProfile(Request $request){
        $data = array(
            'name' =>$request->input('username'),
            'gender' =>$request->input('gender'),
            'fname'=>$request->input('fname'),
            'lname'=>$request->input('lname'),
            'country_id'=>$request->input('country'),
            'dob'=>$request->input('dob'),
        );

        $user = User::where('id',Auth::id())->update($data);

        // dd($user);
        if($user==1){
            $request->session()->flash('success', 'Profile updated successfully!');
        }else{
            $request->session()->flash('error', 'Unable to update profile try later.');
        }

        return redirect()->route('userProfile');
    }

   
        public function uploadAvatar(Request $request){
            $request->validate([
                'profile_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:1024',
            ]);
        
            $imageName = time().Auth::user()->name.'.'.$request->profile_photo->extension();
         
            $request->profile_photo->move(public_path('userAvat'), $imageName);
            //$contents = file_get_contents(asset('public/userAvat/'.$imageName));
            //$request->avatar->move(public_path('userAvat'), $imageName);
            // $file = 'public/userAvat/' .$imageName;
            // file_put_contents($file, $contents);
            $user = User::find(Auth::user()->id)->update(['avatar'=>$imageName]);
    
            if($user){
            $request->session()->flash('success', 'Avatar updated successfully');
            }else{
    
            }
            return redirect()->route('userProfile');
        }

        public function uploadCover(Request $request){
            $request->validate([
                'cover' => 'required|image|mimes:jpeg,png,jpg,gif|max:1024',
            ]);
        
            $imageName = time().Auth::user()->name.'.'.$request->cover->extension();
         
            $request->cover->move(public_path('userCover'), $imageName);
            //$contents = file_get_contents(asset('public/userAvat/'.$imageName));
            //$request->avatar->move(public_path('userAvat'), $imageName);
            // $file = 'public/userAvat/' .$imageName;
            // file_put_contents($file, $contents);
            $user = User::find(Auth::user()->id)->update(['cover'=>$imageName]);
    
            if($user){
            $request->session()->flash('success', 'Cover updated successfully');
            }else{
    
            }
            return redirect()->route('userProfile');
        }

        public function visitProfile(User $user){
            $bookmarks = Bookmark::where('user_id',$user->id)->with('rcs')->simplePaginate(2);
            $rcs = RiskControl::where('user_id',$user->id)->with('likes')->with('dislikes')->with('bookmarks')->simplePaginate(2);
            $likes = Like::where('user_id',$user->id)->with('rcs')->simplePaginate(2);


            return view('user.profile.otherUserProfile',compact('user','rcs','likes','bookmarks'));
        }

        public function fetchUserBookmarks(Request $request){
            if($request->ajax())
            {
                $bookmarks = Bookmark::where('user_id',Auth::id())->with('rcs')->simplePaginate(2);
                //dd($rcs);
                return view('user.profile.bookmarks', compact('bookmarks'))->render();
            }
        }

        public function userNetwork(){
            $user = User::find(Auth::id());
            return view('user.profile.network',compact('user'));
        }
    
        
}   
