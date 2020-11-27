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
                <div class="col-12 col-md-6 col-lg-4">
                <p class="p-style bg-lgray box-shadow py-2 px-4 p-tab"><i class="fas fa-tag fa-rotate-90"></i> &nbsp;&nbsp;{{$dat->name}}<button class="btn-follow">Follow</button></p>
                </div>
                @endforeach
            </div>
         
           
                
            </div>
@endsection