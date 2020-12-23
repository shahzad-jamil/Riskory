@extends('user.layout.visitor')
@section('SiteTitle','About us || Riskory')
@section('content')
<main role="main" class="inner cover pb-5 pb-sm-5">
    <div class="container">
        <div class="text-center">
        <h1 class="font-eb color-r">{{$con->heading}}</h1>
        <p class="p-style">{!!$con->content!!}</p>
        </div>
    </div>
</main>
@endsection