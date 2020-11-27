@extends('layouts.adminApp')

@section('pageHeading')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{URL::route('admin')}}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{route('contributor.index')}}">Contributors</a></li>
      <li class="breadcrumb-item active" aria-current="page">View</li>
    </ol>
  </nav>
@endsection
@section('content')
<div class="row d-flex justify-content-center mb-4">
    <div class="col-md-8 col-sm-12 col-lg-6">
     <div class="card shadow border-left-primary">
         <div class="card-header text-center">
         <span class="text-center">Contributor View  <i class="fas fa-user text-primary"></i></span>
         </div>
         <div class="card-body">
            <div class="border-bottom mx-3 my-3 px-3 py-3 bg-light shadow-sm rounded-top text-center">
                <img src="
                @if($contributor->avatar == 'images/avatars/default.png')
                https://ui-avatars.com/api/?background=random&name={{ str_replace(' ','+' ,$contributor->name) }}
                @else
                {{asset('userAvat/'.$contributor->avatar)}}
                @endif
                " alt="" class="rounded-circle img-fluid img-thumbnail" style="width:100px; max-width: 100px; height:auto;">
            </div>

            <div class="border-bottom mx-3 my-3 px-3 py-3 bg-light shadow-sm rounded-top">
            <h1 class="lead"><span class="badge badge-primary">Name: </span> {{$contributor->name}}</h1>
            </div>

            <div class="border-bottom mx-3 my-3 px-3 py-3 bg-light shadow-sm rounded-top">
                <h1 class="lead"><span class="badge badge-primary">Email: </span> {{$contributor->email}} </h1>
            </div>

            <div class="border-bottom mx-3 my-3 px-3 py-3 bg-light shadow-sm rounded-top">
                <h1 class="lead"><span class="badge badge-primary">Joined At: </span> {{$contributor->joined_at}}</h1>
            </div>
           
            <div class="border-bottom mx-3 my-3 px-3 py-3 bg-light shadow-sm rounded-top">
                <h1 class="lead"><span class="badge badge-primary">Roles: </span> 
                @foreach($contributor->roles as $role)
                    {{$role->name}} || 
                @endforeach
                </h1>
            </div>
         </div>
       </div>
    </div>
 </div>




@endsection