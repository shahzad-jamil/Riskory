@extends('user.layout.contributor')
@section('SiteTitle','Dashboard || Riskory')
@section('content')

        <div class="pl-0 col-12 col-md-9 py-5 pr-0 pr-md-3 pr-lg-5">
            <!-- Browse By Industry Secion -->
            <div class="pl-0 col-12 col-sm-10 col-md-7 col-lg-5">
                
                <p class="bg-lblue font-eb font-18 py-2 px-2 px-md-5"><i><img src="assets/images/Mask-Group-55.svg" class="align-bottom" width="35px"></i>&nbsp;&nbsp;Browse By Industry</p>
            </div>

            <div class="row pl-3 pl-md-5">
                @foreach($industries as $ind)
                <div class="col-12 col-md-6 col-lg-4 px-4 pb-3 d-flex">
                    <div class="row align-items-center bg-lgray box-shadow py-2">
                        <div class="col-2">
                            <i class="fas fa-tag fa-rotate-90"></i>
                        </div>
                        <div class="col-7 pl-0">
                        <p class="p-style mb-0"><a href="{{route('byControl',['control'=>$ind,'type'=>$ind->type])}}">{{$ind->name}}</a> ({{$ind->followers->count()}})</p>
                        </div>
                        <div class="col-3">
                            @if (!($ind->followedBy(auth()->user())))
                                <button class="btn-follow" onclick="parent.location='{{route('control.follow',$ind->id)}}'">Follow</button>
                            @else
                        <form action="{{route('control.unfollow',$ind->id)}}" method="POST">
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
            <div class="ml-5 my-2">
            <a href="{{route('seeMore','industries')}}" class="color-b text-underl p-style bg-lgray box-shadow py-2 px-4">More Industries</a>
            </div>
            <!-- Browse By Business Process Section -->
            <div class="pl-0 col-12 col-sm-10 col-md-7 col-lg-5 mt-5">
                <p class="bg-lblue font-eb font-18 py-2 px-2 px-md-5"><i><img src="assets/images/Mask Group 56.svg" class="align-bottom" width="35px"></i>&nbsp;&nbsp;Browse By Business Process</p>
            </div>
            <div class="row pl-3 pl-md-5">
            @foreach($bprocesses as $bp)
            <div class="col-12 col-md-6 col-lg-4 px-4 pb-3 d-flex">
                    <div class="row align-items-center bg-lgray box-shadow py-2">
                        <div class="col-2">
                            <i class="fas fa-tag fa-rotate-90"></i>
                        </div>
                        <div class="col-7 pl-0">
                            <p class="p-style mb-0"><a href="{{route('byControl',['control'=>$bp,'type'=>$bp->type])}}">{{$bp->name}}</a> ({{$bp->followers->count()}})</p>
                        </div>
                        <div class="col-3">
                            @if (!($bp->followedBy(auth()->user())))
                                <button class="btn-follow" onclick="parent.location='{{route('control.follow',$bp->id)}}'">Follow</button>
                            @else
                        <form action="{{route('control.unfollow',$bp->id)}}" method="POST">
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
            <div class="ml-5">
                <a href="{{route('seeMore','bprocesses')}}" class="color-b text-underl p-style bg-lgray box-shadow py-2 px-4">More Business Processes</a>
            </div>
            <!-- Browse By Framework Section -->
            <div class="pl-0 col-12 col-sm-10 col-md-7 col-lg-5 mt-5">
                <p class="bg-lblue font-eb font-18 py-2 px-2 px-md-5"><i><img src="assets/images/Mask Group 57.svg" class="align-bottom" width="35px"></i>&nbsp;&nbsp;Browse By Framework</p>
            </div>
            <div class="row pl-3 pl-md-5">
            @foreach($bframeworks as $bf)
            <div class="col-12 col-md-6 col-lg-4 px-4 pb-3 d-flex">
                <div class="row align-items-center bg-lgray box-shadow py-2">
                    <div class="col-2">
                        <i class="fas fa-tag fa-rotate-90"></i>
                    </div>
                    <div class="col-7 pl-0">
                        <p class="p-style mb-0"><a href="{{route('byControl',['control'=>$bf,'type'=>$bf->type])}}">{{$bf->name}}</a> ({{$bf->followers->count()}})</p>
                    </div>
                    <div class="col-3">
                        @if (!($bf->followedBy(auth()->user())))
                            <button class="btn-follow" onclick="parent.location='{{route('control.follow',$bf->id)}}'">Follow</button>
                        @else
                    <form action="{{route('control.unfollow',$bf->id)}}" method="POST">
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
            <div class="ml-5">
                <a href="{{route('seeMore','bframeworks')}}" class="color-b text-underl p-style bg-lgray box-shadow py-2 px-4">More Business Frameworks</a>
            </div>
            <!-- Browse By Tags Section -->
            <div class="pl-0 col-12 col-sm-10 col-md-7 col-lg-5 mt-5">
                <p class="bg-lblue font-eb font-18 py-2 px-2 px-md-5"><i><img src="assets/images/Icon awesome-tags.png" class="align-bottom" width="35px"></i>&nbsp;&nbsp;Browse By Tags</p>
            </div>
            <div class="row pl-3 pl-md-5">
                @foreach($tags as $tg)
                <div class="col-12 col-md-6 col-lg-4 px-4 pb-3 d-flex">
                    <div class="row align-items-center bg-lgray box-shadow py-2">
                        <div class="col-2">
                            <i class="fas fa-tag fa-rotate-90"></i>
                        </div>
                        <div class="col-7 pl-0">
                            <p class="p-style mb-0"><a href="{{route('byTag',['tag'=>$tg])}}">{{$tg->name}}</a> ({{$tg->followers->count()}})</p>
                        </div>
                        <div class="col-3">
                            @if (!($tg->followedBy(auth()->user())))
                                <button class="btn-follow" onclick="parent.location='{{route('tag.follow',$tg->id)}}'">Follow</button>
                            @else
                        <form action="{{route('tag.unfollow',$tg->id)}}" method="POST">
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
            <div class="ml-5">
                <a href="{{route('seeMore','tags')}}" class="color-b text-underl p-style bg-lgray box-shadow py-2 px-4">More Tags</a>
            </div>
        </div>
        

@endsection