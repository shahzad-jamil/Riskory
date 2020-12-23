@extends('user.layout.contributor')
@section('SiteTitle','Edit profile || Riskory')
@section('content')
<div class="pl-0 col-12 col-md-9 py-5 pr-0 pr-md-5">
    <div class="pl-0 col-12 col-sm-10 col-md-7 col-lg-5">
    <p class="bg-lblue font-eb font-18 py-2 px-2 px-md-5"><i><img src="https://s.svgbox.net/hero-outline.svg?ic=user&fill=E90000" class="align-bottom" width="35px"></i>&nbsp;&nbsp;Update user profile</p>
    </div>
    <div class="container">
        <div class="row px-0 px-md-2 px-lg-5 mx-0 mx-md-2 mx-lg-5 pt-4 ">
            <p id="riskControlDefinition" class="font-eb font-18 bg-lblue color-r px-4 py-2 mx-2 br-15"><img src="https://s.svgbox.net/hero-outline.svg?ic=pencil-alt&fill=E90000" alt="" width="35" height="35">
                Edit User Profile
            </p>
            <div class="col-12 bg-lgray br-20 mt-3 px-0 shadow">
                <div class="col-12 mx-auto my-3">
                <form id="msform" role="form" method="POST" action="{{route('updateProfile')}}" class="create-risk-form risk-form px-lg-5">
                    @csrf
                        <fieldset id="firstfieldset">
                            <div class="mb-4">
                                <label class="font-eb font-16 bg-white px-4 mb-0 ml-3 br-tl-12 br-tr-12">Username</label>
                                <input type="text" name="username" value="{{$user->name}}" class="form-control p-5 br-20 box-shadow border-0 font-16 font-e color-dg @error('username') is-invalid @enderror" placeholder="Enter the username to display everywhere" required>
                                {{-- <small id="title" class="form-text text-muted ml-3">
                                   Short descriptive of the Risk Control
                                </small> --}}
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="mb-4">
                                        <label class="font-eb font-16 bg-white px-4 mb-0 ml-3 br-tl-12 br-tr-12">Firstname</label>
                                    <input type="text" name="fname" value="{{$user->fname}}" class="form-control p-5 br-20 box-shadow border-0 font-16 font-e color-dg @error('fname') is-invalid @enderror" placeholder="Your firstname" required>
                                        @error('fname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="mb-4">
                                        <label class="font-eb font-16 bg-white px-4 mb-0 ml-3 br-tl-12 br-tr-12">Lastname</label>
                                    <input type="text" name="lname" value="{{$user->lname}}" class="form-control p-5 br-20 box-shadow border-0 font-16 font-e color-dg @error('lname') is-invalid @enderror" placeholder="Your lastname" required>
                                        @error('lname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="font-eb font-16 bg-white px-4 mb-0 ml-3 br-tl-12 br-tr-12">About</label>
                                <textarea name="about" id="about" class="form-control p-5 br-20 box-shadow border-0 font-16 font-e color-dg @error('about') is-invalid @enderror" cols="30" rows="5"></textarea>
                                @error('about')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="mb-4">
                                        <label class="font-eb font-16 bg-white px-4 mb-0 ml-3 br-tl-12 br-tr-12">Date of birth</label>
                                        <input type="date" name="dob" value="{{$user->dob}}" class="form-control br-20 box-shadow border-0 font-16 font-e color-dg @error('dob') is-invalid @enderror" placeholder="Enter the username to display everywhere" required>
                                        
                                        @error('dob')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="mb-4">
                                        <label for="country">Country</label>
                                        <select name="country" id="country" class="form-control shadow-sm">
                                            @foreach($countries as $cn)
                                                <option value="{{$cn->id}}" @if($cn->id == $user->country_id) selected @endif
                                                >{{$cn->country}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="font-eb font-16 bg-white px-4 mb-0 ml-3 br-tl-12 br-tr-12">Gender</label>
                                <select name="gender" id="gender" class="form-control custom-select border-0 font-16 font-e color-dg br-20 box-shadow">
                                    <option value="Male" 
                                    @if($user->gender == 'Male')
                                        selected
                                    @endif
                                        >Male</option>
                                    <option value="Female"
                                    @if($user->gender == 'Female')
                                    selected
                                @endif
                                    >Female</option>
                                    <option value="Other"
                                    @if($user->gender == 'Other')
                                    selected
                                @endif
                                    >Other</option>
                                </select>
                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                     
                        
    
                       
                        
                            <div class="mb-4 text-right">
                                {{-- <button onclick="cancelRelation()" type="button" class="btn-cancel mr-4 mt-3 mt-sm-0">Back</button> --}}
                                <button type="submit" class="btn-create mr-4 mr-sm-0 mt-3 mt-sm-0">Update profile</button>
                            </div>
                        </fieldset>
                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection