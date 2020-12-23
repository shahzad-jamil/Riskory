@extends('user.layout.contributor')
@section('SiteTitle','Dashboard || Riskory')
@section('content')

        <div class="pl-0 col-12 col-md-9 py-5 pr-0 pr-md-3 pr-lg-5">
            <!-- Browse By Industry Secion -->
            <div class="pl-0 col-12 col-sm-10 col-md-7 col-lg-5">
                
            <p class="bg-lblue font-eb font-18 py-2 px-2 px-md-5"><i><img src="{{asset($icon)}}" class="align-bottom" width="35px"></i>&nbsp;&nbsp;Browse By {{$name}}</p>
            </div>
            <div class="row pl-3 pl-md-5">
                @foreach($data as $dat)
                <div class="col-12 col-md-6 col-lg-4 px-4 pb-3 d-flex">
                    <div class="row align-items-center bg-lgray box-shadow py-2">
                        <div class="col-2">
                            <i class="fas fa-tag fa-rotate-90"></i>
                        </div>
                        <div class="col-7 pl-0">
                            <p class="p-style mb-0">{{$dat->name}} ({{$dat->followers->count()}})</p>
                        </div>
                        <div class="col-3">
                            @if (!($dat->followedBy(auth()->user())))
                                <button class="btn-follow" onclick="parent.location='{{route('tag.follow',$dat->id)}}'">Follow</button>
                            @else
                        <form action="{{route('tag.unfollow',$dat->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn-follow bg-dgray" type="submit">Unfollow</button>
                        </form> 
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
         
           
                
            </div>
@endsection