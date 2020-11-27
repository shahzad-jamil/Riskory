<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
Use Illuminate\Support\Facades\Hash;
use Illuminate\Http\UploadedFile;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected function authenticated(Request $request, $user)
    {
        if($user->hasRole('superadministrator')){
            session()->flash('success', 'Welcome Back '.Auth::user()->name);
            return redirect('/admin');
        }
        
        if($user->hasRole('user')){
            session()->flash('success', 'Welcome Back '.Auth::user()->name);
            return redirect('/user');
        }

        return redirect('/user');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function facebookRedirectToProvider(){
        return Socialite::driver('facebook')->redirect();
    }

    public function facebookProviderCallback(){
        $user = Socialite::driver('facebook')->user();
        dd($user);
    }

    public function googleRedirectToProvider(){
        return Socialite::driver('google')->redirect();
    }

    public function googleProviderCallback(){
        $user = Socialite::driver('google')->user();

        $found_user = User::where('email',$user->getEmail())->first();
        
        if ($found_user) {

            Auth::login($found_user);
            session()->flash('success', 'Welcome Back '.Auth::user()->name);
            return redirect()->route('user');
        }
        else{
            $url = preg_replace('/\?sz=[\d]*$/', '', $user->getAvatar());
            $info = pathinfo($url);
            $contents = file_get_contents($url);
            $file = 'public/userAvat/' . $info['basename'].'.jpg';
            file_put_contents($file, $contents);
            $uploaded_file = new UploadedFile($file, $info['basename']);
            //dd($uploaded_file);

            $new_user = new User;
            
            $new_user->name  = $user->getName();
            $new_user->email = $user->getEmail();
            $new_user->avatar = $info['basename'].'.jpg';
            
            $password = rand(1000,1000000);
            $new_user->password = $password = Hash::make($password);

            if ($new_user->save()) {
                session()->flash('success', 'Profile Created successfully!');
                $new_user->attachRole('user');
                 Auth::login($new_user);
                 return redirect()->route('user');
             } 
        }
        
    }
}
