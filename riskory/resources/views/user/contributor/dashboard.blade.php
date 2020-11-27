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
                <div class="col-12 col-md-6 col-lg-4">
                <p class="p-style bg-lgray box-shadow py-2 px-4 p-tab"><i class="fas fa-tag fa-rotate-90"></i> &nbsp;&nbsp;{{$ind->name}}<button class="btn-follow">Follow</button></p>
                </div>
                @endforeach
            
            </div>
            <div class="ml-5 ">
            <a href="{{route('seeMore','industries')}}" class="color-b text-underl p-style bg-lgray box-shadow py-2 px-4">More Industries</a>
            </div>
            <!-- Browse By Business Process Section -->
            <div class="pl-0 col-12 col-sm-10 col-md-7 col-lg-5 mt-5">
                <p class="bg-lblue font-eb font-18 py-2 px-2 px-md-5"><i><img src="assets/images/Mask Group 56.svg" class="align-bottom" width="35px"></i>&nbsp;&nbsp;Browse By Business Process</p>
            </div>
            <div class="row pl-3 pl-md-5">
            @foreach($bprocesses as $bp)
                <div class="col-12 col-md-6 col-lg-4">
                    <p class="p-style bg-lgray box-shadow py-2 px-4 p-tab"><i class="fas fa-tag fa-rotate-90"></i> &nbsp;&nbsp;{{$bp->name}} <button class="btn-follow">Follow</button></p>
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
                <div class="col-12 col-md-6 col-lg-4">
                    <p class="p-style bg-lgray box-shadow py-2 px-4 p-tab"><i class="fas fa-tag fa-rotate-90"></i> &nbsp;&nbsp;{{$bf->name}} <button class="btn-follow">Follow</button></p>
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
                <div class="col-12 col-md-6 col-lg-4">
                    <p class="p-style bg-lgray box-shadow py-2 px-4"><i class="fas fa-tag fa-rotate-90"></i> &nbsp;&nbsp;Tag Name <button class="btn-follow">Follow</button></p>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <p class="p-style bg-lgray box-shadow py-2 px-4"><i class="fas fa-tag fa-rotate-90"></i> &nbsp;&nbsp;Tag Name <button class="btn-follow bg-dgray">Unfollow</button></p>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <p class="p-style bg-lgray box-shadow py-2 px-4"><i class="fas fa-tag fa-rotate-90"></i> &nbsp;&nbsp;Tag Name <button class="btn-follow">Follow</button></p>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <p class="p-style bg-lgray box-shadow py-2 px-4"><i class="fas fa-tag fa-rotate-90"></i> &nbsp;&nbsp;Tag Name <button class="btn-follow bg-dgray">Unfollow</button></p>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <p class="p-style bg-lgray box-shadow py-2 px-4"><i class="fas fa-tag fa-rotate-90"></i> &nbsp;&nbsp;Tag Name <button class="btn-follow">Follow</button></p>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <p class="p-style bg-lgray box-shadow py-2 px-4"><i class="fas fa-tag fa-rotate-90"></i> &nbsp;&nbsp;Tag Name <button class="btn-follow bg-dgray">Unfollow</button></p>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <p class="p-style bg-lgray box-shadow py-2 px-4"><i class="fas fa-tag fa-rotate-90"></i> &nbsp;&nbsp;Tag Name <button class="btn-follow bg-dgray">Unfollow</button></p>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <p class="p-style bg-lgray box-shadow py-2 px-4"><i class="fas fa-tag fa-rotate-90"></i> &nbsp;&nbsp;Tag Name <button class="btn-follow">Follow</button></p>
                </div>
            </div>
            <div class="ml-5" style="width: 85px">
                <p class="p-style bg-lgray box-shadow py-2 px-4"><a href="#" class="color-b text-underl">More</a></p>
            </div>
        </div>
        

@endsection