@extends('layouts.adminApp')

@section('pageHeading')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{URL::route('admin')}}">Dashboard</a></li>
    <li class="breadcrumb-item active">Riskcontrols</li>
    </ol>
  </nav>
@endsection

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data table of all riskcontrols. <button class="btn btn-outline-success" href="#" disabled>Add riskcontrol <i class="fas fa-plus"></i></button></h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-striped" id="rctable" width="100%" cellspacing="0">
          <thead>
            <tr>
              {{-- <th>Sr #</th> --}}
              <th>Riskcontrol</th>
              <th>More details</th>
              <th class="text-center">Actions</th>
            </tr>
          </thead>
          <tbody>
@foreach($rcs as $rc)
            <tr>
            {{-- <td>{{$loop->iteration}}</td> --}}
            <td>
            <div class="row">
                <div class="col-12"><h4><strong>Title:</strong> {{$rc->title}}</h4></div>
                
            </div>
            <div class="col-12"><p><strong>Objective Summary: </strong>{{$rc->obj_summary}}</p></div>
            <div class="col-12">
                
                <?php $conts = $rc->controls->where('type','industry');?>
                @if($conts)
                <small><strong>Industries</strong></small><br>
                    @foreach($conts as $con)
                    <span class="badge badge-primary">{{$con->control->name}}</span>
                    @endforeach
                @endif
            </div>
            <div class="col-12">
                
                <?php $conts = $rc->controls->where('type','bframework');?>
                @if($conts)
                <small><strong>Business frameworks</strong></small><br>
                    @foreach($conts as $con)
                    <span class="badge badge-warning">{{$con->control->name}}</span>
                    @endforeach
                @endif
            </div>
            <div class="col-12">
                
                <?php $conts = $rc->controls->where('type','bprocess');?>
                @if($conts)
                <small><strong>Business processs</strong></small><br>
                    @foreach($conts as $con)
                    <span class="badge badge-success">{{$con->control->name}}</span>
                    @endforeach
                @endif
            </div>
            </td>
            <td>
                <div class="row">
                    <div class="col-12">
                        <span class="badge badge-success">{{views($rc)->count()}} Views</span><br>
                        Created by: {{$rc->user->name}}<br>
                        Posted on: {{$rc->created_at}}<br>
                        Last updated at: {{$rc->updated_at}}<br>
                    Status: <span class="badge badge-danger">{{$rc->status}}</span><br>
                    
                    </div>
                </div>
            </td>
            <td>

            </td>
            </tr>

@endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

@endsection

@section('scripts')
<script>
$(document).ready(function() {
    $('#rctable').DataTable();
  });

</script>

@endsection