@extends('layouts.adminApp')

@section('pageHeading')
Profile
@endsection
@section('content')
    <div class="row d-flex justify-content-center">
       <div class="col-md-6">
        <div class="card">
            <div class="card-header">
            </span> Admin Profile View<span> <button class="btn btn-primary float-right btn-sm">Edit Profile</button>
            </div>
            <div class="card-body">
                <ul class="list-group">
                <li class="list-group-item"><strong>Username: </strong> {{$user->name}}</li>
                    <li class="list-group-item"><strong>Email: </strong> {{$user->email}}</li>
                    <li class="list-group-item"><strong>Username: {{$user->name}}</strong></li>
                    <li class="list-group-item"><strong>Firstname: {{$user->fname}}</strong></li>
                    <li class="list-group-item"><strong>Lastname: {{$user->lname}}</strong></li>
                    <li class="list-group-item"><strong>Joined At: </strong> {{$user->joined_at}}</li>
                    <li class="list-group-item"><strong>DOB: </strong> {{$user->dob}}</li>
                <li class="list-group-item"><strong>Country: </strong> </li>
                    <li class="list-group-item"><strong>Gender: </strong></li>
                    
                  </ul>
            </div>
          </div>
       </div>
    </div>
@endsection

