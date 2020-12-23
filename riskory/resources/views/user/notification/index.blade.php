@extends('user.layout.contributor')
@section('SiteTitle','Notifications || Riskory')
@section('content')
<div class="col-12 col-md-9 py-2 pr-md-5">
    <div class="row pt-4">
        <div class="px-0 col-12 col-sm-12 col-md-6 col-lg-5">
            <div class="">
                <p class="bg-lblue font-eb font-18 py-2 px-5"><i class="fas fa-bell color-r"></i>&nbsp;&nbsp;New Notifications</p>
            </div>
        </div>
    </div>
    <div class="row px-2 px-md-5 mx-0 mx-md-5 pt-2">
        <div class="col-12 bg-lgray br-20 border-0 box-shadow mb-4 py-3 px-3 p-md-5">
            @foreach($user->unreadNotifications as $not)
                @if($not->data['type']=='follower')
                @php
                    $follower = App\Models\User::find($not->data['follower_id']);
                @endphp
                <div class="py-2 py-md-0 text-center text-md-left">
                    <img src="@if($follower->avatar == 'images/avatars/default.png')
                    https://ui-avatars.com/api/?background=random&name={{ str_replace(' ','+' ,$follower->name) }}
                    @else
                    {{asset('userAvat/'.$follower->avatar)}}
                    @endif
                    " class="rounded-circle shadow avatar-img-lg">
                    <div class="d-inline-block pt-1 pl-0 pl-md-2">
                        <p class="font-eb mt-2 font-18 color-b"><a href="{{route('visit.profile',$follower)}}" class="color-r">{{$follower->name}}</a> Followed You</p>
                    </div>
                    <span class="float-md-right">
                        @if($follower->followedBy(Auth::user()))
            <form action="{{route('user.unfollow',$follower)}}" method="POST">
                @csrf
                @method('DELETE')
                
                <button class="bg-red color-w font-eb px-3 py-2 border-0 br-20 mr-5 btn-hover" type="submit">Unfollow</button>
            </form> 
            
            @else
            <button class="bg-red color-w font-eb px-3 py-2 border-0 br-20 mr-5 btn-hover" onclick="parent.location='{{route('follow.user',$follower)}}'">Follow Back</button>
            @endif
                        {{-- <button class="bg-red color-w font-eb px-3 py-2 border-0 br-20 mr-5 btn-hover">Follow Back</button> --}}
                        <div class="d-inline-block float-md-right">
                          <a class="color-dg" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-h"></i>
                          </a>
    
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="#">Mark as read</a>
                            <a class="dropdown-item" href="#">Delete</a>
                          </div>
                        </div>
                    </span>
                </div>
                <hr>
                @endif
            @endforeach
            
            {{-- <div class="row">
                <p class="col-10 font-eb color-b font-18 d-inline-block">New risk management in <a href="#" class="color-r">Business Process</a>
                </p>
                <span class="col-2 float-right d-inline-block">
                        <div class="d-inline-block float-md-right">
                          <a class="color-dg" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-h"></i>
                          </a>

                          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="#">Action 1</a>
                            <a class="dropdown-item" href="#">Action 2</a>
                            <a class="dropdown-item" href="#">Action 3</a>
                          </div>
                        </div>
                </span>
            </div> --}}
            
        </div>
    </div>
</div>

@endsection