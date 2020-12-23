@extends('user.layout.contributor')
@section('SiteTitle','Create Risk Control || Riskory')
@section('select2')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
@endsection
@section('content')
<div class="pl-0 col-12 col-md-9 py-5 pr-0 pr-md-5">
    <!-- Browse By Industry Secion -->
    <div class="row pt-4">
        <div class="pl-0 col-12 col-sm-12 col-md-6 col-lg-4">
            <div class="">
            <p class="bg-lblue font-eb font-18 py-2 px-5"><i><img src="{{asset('assets/images/Mask Group 10@2x.png')}}" class="align-bottom" width="35px"></i>&nbsp;&nbsp;Risk Control Detail</p>
            </div>
        </div>
    </div>
    <div class="row pl-1 pl-md-5 mx-0 mx-md-5 pt-5">
        <div class="col-12 bg-lgray br-20 border-0 box-shadow mb-4">
            <div class="row">
                <div class="col-12 px-0">
                    <span class="br-tl-20 bg-white font-16 font-eb color-r px-3 py-1">{{$rc->views}} views</span>
                    <span class="br-tr-20 bg-white font-16 font-e color-r px-3 py-1 float-right">
                        @if($rc->status == 'U')
                                    Under Discussion
                                @elseif($rc->status == 'P')
                                    Pending
                                @elseif($rc->status == 'A')
                                    Approved
                                @elseif($rc->status == 'R')
                                    Rejected
                                @elseif($rc->status == 'O')
                                    Our next bigthing
                                @endif
                    </span>
                </div>
            </div>
            <div class="px-md-4 px-1 pt-5">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div class="pb-2">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                            </div>
                            <button class="bg-red color-w font-14 border-0 br-15 p-2 font-eb btn-benchmark">Add Benchmark</button>
                            <button class="btn-risk-edit" onclick="parent.location='{{route('rc.edit',$rc)}}'">Edit</button>
                        </div>
                        <div class="col-12 col-lg-6 pt-3 pt-md-0">
                            <div class="modal-icon float-left float-lg-right">
                                @include('user.inc.rcactions')
                            </div>
                        </div>
                    </div>
                <label class="px-3 py-1 my-3 bg-white font-eb">Risk Control Number <a href="#" class="color-r">#00{{$rc->id}}</a></label><br>
                    <label class="px-3 py-1 my-3 bg-white font-eb">Risk Control Title</label>
                <p class="p-style">{{$rc->title}}</p>
                    <label class="px-3 py-1 my-3 bg-white font-eb">Risk Control Description</label>
                <p class="p-style">{{$rc->description}}</p>
                    <label class="px-3 py-1 my-3 bg-white font-eb">Risk Control Frequency</label>
                <p class="p-style">{{$rc->frequency}}</p>
                    <label class="px-3 py-1 my-3 bg-white font-eb">Risk Control Industry</label>
                    <div>
                <?php $industries = $rc->controls->where('type','industry');?>
                @if($industries)
                    @foreach($industries as $ind)
                        <button class="border-0 bg-lblue font-e br-12 px-3 p-2 mx-1 my-2">{{$ind->control->name}}</button>
                    @endforeach
                @endif
                    </div>
                    <label class="px-3 py-1 my-3 bg-white font-eb">Risk Control Business Process</label>
                    <div>
                <?php $bprocesses = $rc->controls->where('type','bprocess');?>
                @if($bprocesses)
                    @foreach($bprocesses as $bp)
                        <button class="border-0 bg-lblue font-e br-12 px-3 p-2 mx-1 my-2">{{$bp->control->name}}</button>
                    @endforeach
                @endif
                    </div>
                    <label class="px-3 py-1 my-3 bg-white font-eb">Risk Control Framework</label>
                    <div>
                <?php $bframeworks = $rc->controls->where('type','bframework');?>
                @if($bframeworks)
                    @foreach($bframeworks as $bf)
                        <button class="border-0 bg-lblue font-e br-12 px-3 p-2 mx-1 my-2">{{$bf->control->name}}</button>
                    @endforeach
                @endif
                    </div>
                    <label class="px-3 py-1 my-3 bg-white font-eb">Risk Control Tags</label>
                    <div>
                @if($rc->tags)
                    @foreach($rc->tags as $tag)
                        <button class="border-0 bg-lblue font-e br-12 px-3 p-2 mx-1 my-2"><i class="fas fa-tag fa-rotate-90"></i> {{$tag->tag->name}}</button>
                    @endforeach
                @endif

                    </div>
                    <label class="px-3 py-1 my-3 bg-white font-eb">Testing Steps</label>
               
                @if($rc->testingsteps)
                <p class="p-style">
                    <ol>
                @foreach($rc->testingsteps as $tstep)
                   
                        <li>{{$tstep->step}}</li>    
                        
                @endforeach
                    </ol>
                </p>
                @endif
                    <label class="px-3 py-1 my-3 bg-white font-eb">Business Impact</label>
                    <p class="p-style">
                        {{$rc->business_impact}}
                    </p>
                    <label class="px-3 py-1 my-3 bg-white font-eb">Recommendations</label>
                    <p class="p-style">
                        {{$rc->recommendation}}
                    </p>
                    <label class="px-3 py-1 my-3 bg-white font-eb">Risk Control Relationship</label>
                    <div>
                        <div class="col-11 bg-lgray br-20 border-0 box-shadow pl-0 pr-1 pr-md-4 my-3">
                            <div class="row ml-0">
                                <p class="br-tl-20 bg-white font-16 font-eb color-r px-3 py-1">50 views</p>
                                <div class="pt-1 pl-3">
                                    <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                </div>
                            </div>
                            <div class="row px-md-4 px-1">
                                <div class="col-12 col-md-5">
                                    <p class="font-eb font-18 color-b mb-0">Risk Control Title</p>
                                    <p class="font-e font-14 text-underl"><a href="#" class="color-r">Click for more Info</a></p>
                                </div>
                                <div class="col-12 col-md-7">
                                    <div class="modal-icon">
                                        <div class="d-inline-block">
                                         <a href="#"><i class="fas fa-list-ul"></i></a>
                                         <p class="p-style font-eb text-center">8</p>
                                        </div>
                                        <div class="d-inline-block">
                                         <a href="#"><i class="far fa-thumbs-up"></i></a>
                                         <p class="p-style font-eb text-center">12</p>
                                        </div>
                                        <div class="d-inline-block">
                                         <a href="#"><i class="far fa-thumbs-down"></i></a>
                                         <p class="p-style font-eb text-center">19</p>
                                        </div>
                                        <div class="d-inline-block">
                                         <a href="#"><i class="fas fa-bookmark"></i></a>
                                         <p class="p-style font-eb text-center">2</p>
                                        </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-11 bg-lgray br-20 border-0 box-shadow pl-0 pr-1 pr-md-4 my-3">
                            <div class="row ml-0">
                                <p class="br-tl-20 bg-white font-16 font-eb color-r px-3 py-1">50 views</p>
                                <div class="pt-1 pl-3">
                                    <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                </div>
                            </div>
                            <div class="row px-md-4 px-1">
                                <div class="col-12 col-md-5">
                                    <p class="font-eb font-18 color-b mb-0">Risk Control Title</p>
                                    <p class="font-e font-14 text-underl"><a href="#" class="color-r">Click for more Info</a></p>
                                </div>
                                <div class="col-12 col-md-7">
                                    <div class="modal-icon">
                                        <div class="d-inline-block">
                                         <a href="#"><i class="fas fa-list-ul"></i></a>
                                         <p class="p-style font-eb text-center">8</p>
                                        </div>
                                        <div class="d-inline-block">
                                         <a href="#"><i class="far fa-thumbs-up"></i></a>
                                         <p class="p-style font-eb text-center">12</p>
                                        </div>
                                        <div class="d-inline-block">
                                         <a href="#"><i class="far fa-thumbs-down"></i></a>
                                         <p class="p-style font-eb text-center">19</p>
                                        </div>
                                        <div class="d-inline-block">
                                         <a href="#"><i class="fas fa-bookmark"></i></a>
                                         <p class="p-style font-eb text-center">2</p>
                                        </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="px-4 py-3"><span class="border-1 br-20 p-2 font-eb box-shadow color-r">+6</span>&nbsp;&nbsp;&nbsp;<a href="#" class="font-eb color-r text-underl">Click to see all related risk controls</a></p>
                    <label class="px-3 py-1 my-3 bg-white font-eb">Risk Control Benchmark</label>
                    <div>
                        <div class="col-12 bg-lgray br-20 border-0 box-shadow p-4 my-3">
                            <img src="assets/images/Ellipse 4.png" class="img-cicle d-inline-block align-top">
                            <div class="d-inline-block pt-1 pl-2">
                                <p class="p-style mb-0"><a href="#" class="font-eb color-b">Vincent Sullivan</a></p>
                                <p class="p-style font-14 mb-0">This risk got <a href="#" class="font-eb color-r">Success</a> by Vincent</p>
                            </div>
                        </div>
                    </div>
                    <p class="px-4 py-3"><span class="border-1 br-20 p-2 font-eb box-shadow color-r">+6</span>&nbsp;&nbsp;&nbsp;<a href="#" class="font-eb color-r text-underl">Click to see all benchmarks</a></p>
                    <hr>
                    <div class="bg-white br-20 p-4 mx-1 mx-md-5 comment-section">
                        <div class="input-group">
                          <input type="text" class="form-control" placeholder="Feel Free to Write Your Comment" aria-label="Recipient's username" aria-describedby="basic-addon2">
                          <div class="input-group-append">
                            <button class="btn box-shadow px-4" type="button">Send</button>
                          </div>
                        </div>
                    </div>
                    <div class="p-4 mx-1 mx-md-5 comment-section">
                        <div class="py-2">
                            <img src="assets/images/Ellipse 4.png" class="img-cicle d-inline-block align-top">
                            <div class="d-inline-block pt-1 pl-2">
                                <p class="p-style mb-0"><a href="#" class="font-eb color-b">User Name</a></p>
                                <p class="p-style font-14 mb-0">I think it is an important risk control in the field ..!</p>
                            </div>
                        </div>
                        <div class="py-2">
                            <img src="assets/images/Ellipse 6.png" class="img-cicle d-inline-block align-top">
                            <div class="d-inline-block pt-1 pl-2">
                                <p class="p-style mb-0"><a href="#" class="font-eb color-b">User Name</a></p>
                                <p class="p-style font-14 mb-0">I think it is an important risk control in the field ..!</p>
                            </div>
                        </div>
                        <p class="px-4 py-3"><span class="border-1 br-20 font-12 p-2 font-eb box-shadow color-r">+6</span>&nbsp;&nbsp;&nbsp;<a href="#" class="font-eb color-r text-underl font-12">Click to see all comments</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
