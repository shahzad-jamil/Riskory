@extends('user.layout.contributor')
@section('SiteTitle','Add Benchmark || Riskory')
@section('content')
<div class="pl-0 col-12 col-md-9 py-3 pr-0 pr-md-5">
    <div class="pl-0 col-12 col-sm-12 col-md-10 col-lg-7">
        <p class="bg-lblue font-eb font-18 py-2 px-5"><i><img src="{{asset('assets/images/Mask Group 16@2x.png')}}" class="align-bottom" width="35px"></i>&nbsp;&nbsp;Creating Benchmark For Risk Control <span class="color-r">#{{$riskcontrol->id}}</span></p>
    </div>
    <div class="container">
        <div class="row px-0 px-md-2 px-lg-5 mx-0 mx-md-2 mx-lg-5 pt-2">
            <div class="col-12 bg-lgray br-20 mt-3 px-0 pt-4">
                <div class="col-12 mx-auto my-3">
                    <form id="msform" role="form" method="POST" action="{{route('store.benchmark',$riskcontrol)}}" class="risk-form px-lg-5">
                        @csrf
                        <fieldset>
                            <div class="radio-item mb-4">
                                <input type="radio" id="rsuccess" name="benchmark" value="Success" checked="">
                                <label for="rsuccess">Success</label>
                            </div>
                            <div class="radio-item ml-5 mb-4"> 
                                <input type="radio" id="rfailed" name="benchmark" value="Failed">
                                <label for="rfailed">Failed</label>
                            </div>
                            <div class="mb-4">
                                <label class="font-eb font-16 bg-white px-4 mb-0 ml-3 br-tl-12 br-tr-12">Date</label>
                                <div class="form-group">
                                    <div class="input-group date" id="datetimepicker1">
                                        <input type="date" name="benchmarkDate" class="form-control p-5 br-20 box-shadow border-0 font-16 font-e color-dg @error('benchmarkDate') is-invalid @enderror" placeholder="Enter The Benchmark date" />
                                        @error('benchmarkDate')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="font-eb font-16 bg-white px-4 mb-0 ml-3 br-tl-12 br-tr-12">Description</label>
                                <input type="text" name="description" class="form-control p-5 br-20 box-shadow border-0 font-16 font-e color-dg" placeholder="Enter The Benchmark Description">
                            </div>
                            
                            <div class="mb-4">
                                <label class="font-eb font-16 bg-white px-4 mb-0 ml-3 br-tl-12 br-tr-12">Response</label>
                                <input type="text" name="response" class="form-control p-5 br-20 box-shadow border-0 font-16 font-e color-dg" placeholder="Enter The Risk Response">
                                <small id="response" class="form-text text-muted ml-3">
                                    The terms adopted here are reduce, retain, remove, or transfer.
                                 </small>
                            </div>

                            <div class="mb-4">
                                <label class="font-eb font-16 bg-white px-4 mb-0 ml-3 br-tl-12 br-tr-12">Reason</label>
                                <input type="text" name="reason" class="form-control p-5 br-20 box-shadow border-0 font-16 font-e color-dg" placeholder="Enter The Reason">
                                <small id="response" class="form-text text-muted ml-3">  
                                   If any then mention reason for failure or success.
                                 </small>
                            </div>
                            
                            <div class="mb-4">
                                <label class="font-eb font-16 bg-white px-4 mb-0 ml-3 br-tl-12 br-tr-12">Notes</label>
                                <input type="text" name="notes" class="form-control p-5 br-20 box-shadow border-0 font-16 font-e color-dg" placeholder="Enter any additional notes">
                            </div>
                            <div class="mb-4 text-right">
                                <button class="btn-cancel mr-4 mt-3 mt-sm-0">Cancel</button>
                                <button class="btn-create mr-4 mr-sm-0 mt-3 mt-sm-0" type="submit">Create</button>
                            </div>
                        </fieldset>
                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

