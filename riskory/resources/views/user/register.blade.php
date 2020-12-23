@extends('user.layout.visitor')
@section('SiteTitle','Register || Riskory')
@section('content')
<main role="main" class="inner cover pb-5 pb-sm-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-sm-6 col-md-6 text-center">
                <img class="img-80" src="assets/images/Mask-Group-1.svg" width="100%">
            </div>
            <div class="col-12 col-sm-6 col-md-6 text-center pb-2 pb-sm-3">
                <p class="p-style font-18 font-b color-n">Signup With</p>
                <div class="signup-icon">
                  <a href="{{route('twitterLogin')}}"><i class="fab fa-twitter"></i></a>
                  <a href="#"><i class="fab fa-facebook-f"></i></a>
                  <a href="{{route('googleLogin')}}"><i class="fab fa-google"></i></a>
                </div>
                <p class="p-style font-18 font-b color-n" style="margin-top: 15px;">Or With</p>
            <form class="form-style" action="{{route('userRegister')}}" method="POST">
                @csrf
                    <div class="form-group">
                        <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name" required value="{{ old('name') }}" autocomplete="name" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="form-group">
                        <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="form-group">
                        <input type="password" id="password" name="password"  class="form-control @error('password') is-invalid @enderror" placeholder="Password" required autocomplete="new-password">
                        @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <input type="password" id="confirmPassword" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>
                    </div>
                    <div class="form-group mt-4 mb-4">
                        <div class="captcha">
                            <span>{!! captcha_img() !!}</span>
                            <button type="button" class="btn btn-danger" class="reload" id="reload">
                                &#x21bb;
                            </button>
                        </div>
                    </div>
        
                    <div class="form-group mb-4">
                        <input id="captcha" type="text" class="form-control @error('captcha') is-invalid @enderror" placeholder="Enter Captcha" name="captcha" required>
                        @error('captcha')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <p class="p-style mb-0">By SIGN UP have to agree to our</p>
                    <p class="p-style mt-0"><a class="color-g text-underl" href="#">Service Terms</a> & <a class="color-g text-underl" href="#">Privacy Policy</a></p>
                    <input type="submit" id="submit" name="signup" value="Sign Up" class="btn-submit">
                <p class="p-style font-20 mt-3">Already Have Account ! <a href="{{route('userLogin')}}" class="color-b">LOGIN HERE</a></p>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
@section('script')
<script type="text/javascript">
    $('#reload').click(function () {
        $.ajax({
            type: 'GET',
            url: 'reload-captcha',
            success: function (data) {
                $(".captcha span").html(data.captcha);
            }
        });
    });

</script>
@endsection