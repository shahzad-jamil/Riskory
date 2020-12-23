@extends('user.layout.visitor')
@section('SiteTitle','Login || Riskory')
@section('content')
<main role="main" class="inner cover pb-5 pb-sm-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-sm-6 col-md-6 text-center">
                <img class="img-80" src="assets/images/Mask-Group-1.svg" width="100%">
            </div>
            <div class="col-12 col-sm-6 col-md-6 text-center pb-2 pb-sm-3">
                <p class="p-style font-18 font-b color-n">Login With</p>
                <div class="signup-icon">
                <a href="#"><i class="fab fa-twitter"></i></a>
                  <a href="#"><i class="fab fa-facebook-f"></i></a>
                  <a href="{{route('googleLogin')}}"><i class="fab fa-google"></i></a>
                </div>
                <p class="p-style font-18 font-b color-n" style="margin-top: 15px;">Or With</p>
            <form class="form-style" action="{{url('/login')}}" method="POST">
                @csrf
                    <div class="form-group">
                        <input type="email" id="email" name="email" class="form-control @if($errors->any()) is-invalid @endif" placeholder="Email" required value="{{ old('email') }}" autocomplete="email" autofocus>
                        @if($errors->any())
                        <span class="invalid-feedback" role="alert"> 
                            <strong>Your Email or Password is incorrect</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <input type="password" id="password" name="password" class="form-control @if ($errors->any()) is-invalid @endif" placeholder="Password" required >
                        @if($errors->any())
                        <span class="invalid-feedback" role="alert"> 
                            <strong>Your Email or Password is incorrect</strong>
                        </span>
                        @endif
                    </div>
                    <p class="p-style font-20"><a href="forget-password.html" class="color-b">Forget Your Password!</a></p>
                    <input type="submit" id="submit" name="signup" value="Login" class="btn-submit">
                <p class="p-style font-20 mt-3">Don't Have Account ! <a href="{{route('userRegister')}}" class="color-b">SIGN UP</a></p>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection