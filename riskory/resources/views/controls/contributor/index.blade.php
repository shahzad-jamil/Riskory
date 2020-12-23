@extends('layouts.adminApp')

@section('pageHeading')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{URL::route('admin')}}">Dashboard</a></li>
    <li class="breadcrumb-item active">Contributors management</li>
    </ol>
  </nav>
@endsection

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Datatable of all contributors.</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-striped" id="contributorTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Sr #</th>
              <th>Image</th>
              <th>Name</th>
              <th>Email</th>
              <th>Registed On</th>
              <th class="text-center">Actions</th>
            </tr>
          </thead>
          <tbody>
    @if($contributors)
        @foreach($contributors as $con)
            <tr>
            <td>{{$loop->iteration}}</td>
            <td class="text-center"><img src="
                @if($con->avatar == 'images/avatars/default.png')
                https://ui-avatars.com/api/?background=random&name={{ str_replace(' ','+' ,$con->name) }}
                @else
                {{asset('userAvat/'.$con->avatar)}}
                @endif
                " alt="" class="rounded-circle img-fluid img-thumbnail" style="max-width: 30px; height:auto;"></td>
            <td>{{$con->name}}</td>
            <td>{{$con->email}}</td>
            <td>{{$con->joined_at}}</td>
            <td>
            <a href="{{route('contributor.view',$con->id)}}" class="btn btn-outline-info btn-sm" title="View"><i class="fas fa-eye"></i></a>
                <button href="#" class="btn btn-outline-danger btn-sm" title="Delete" disabled><i class="fas fa-trash"></i></button>
                {{-- <a href="#" class="btn btn-outline-warning btn-sm" title="Update"><i class="fas fa-pen"></i></a> --}}
            </td>
            </tr>
        @endforeach
    @endif
          </tbody>
        </table>
      </div>
    </div>
  </div>

@endsection

@section('scripts')
<script>
$(document).ready(function() {
    $('#contributorTable').DataTable();
  });

</script>

@endsection