@extends('layouts.adminApp')

@section('pageHeading')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{URL::route('admin')}}">Dashboard</a></li>
    <li class="breadcrumb-item active">Edit Content</li>
    </ol>
  </nav>
@endsection

@section('content')

<div class="row d-flex justify-content-center mb-4">
    <div class="col-md-8 col-sm-12 col-lg-6">
     <div class="card shadow border-left-warning">
         <div class="card-header text-center">
         <span class="text-center">Update Content <i class="fas fa-industry text-warning"></i></span>
         </div>
         <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
         <form method="POST" action="{{route('content.update',$content->id)}}">
            @csrf
            @method('PUT') 
                <div class="form-group">
                    <label for="heading">Heading</label>
                <input type="text" class="form-control" placeholder="Heading" name="heading" required value="{{$content->heading}}">
                </div>
                    
                <div class="form-group">
                    <label for="content">Content </label>
                    <textarea name="content" id="content" class="form-control" cols="30" rows="5" required>{{$content->content}}</textarea>
                  
                </div>
                
              


               
                <button type="submit" class="float-right btn btn-outline-warning shadow-sm">Update <i class="fas fa-pen"></i></button>
              </form>
               
         </div>
       </div>
    </div>
 </div>

@endsection