@extends('user.layout.contributor')
@section('SiteTitle','Bookmarks || Riskory')
@section('content')
<div class="px-0 col-12 col-md-9 py-2">
    <div class="row pt-4 mx-0">
        <div class="pl-0 col-12 col-sm-12 col-md-6 col-lg-4">
            <div class="">
            <p class="bg-lblue font-eb font-18 py-2 px-5"><i><img src="{{asset('assets/images/Mask Group 10@2x.png')}}" class="align-bottom" width="35px"></i>&nbsp;&nbsp;Bookmarked Risk Controls</p>
            </div>
        </div>
        <div class="col-lg-5 col-md-6 col-sm-12 col-12 text-right px-4">
            <div class="input-group search-bar py-1 ml-0 ml-md-0">
              <input type="text" class="form-control" placeholder="Search through the category" aria-label="Search Risks Here" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn-search bgb-lgray color-dg" type="button"><i class="fas fa-search"></i></button>
              </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 col-12">
            <div class="topbar-icon text-center text-md-right mt-3 mt-md-0">
              <a href="#" class="text-center mx-2 my-1 bg-lblue color-r"><i class="fas fa-sort-amount-up-alt"></i></a>
              <a href="#" class="text-center mx-2 my-1"><i class="fas fa-sort-amount-down"></i></a>
              <a href="#" class="text-center mx-2 my-1"><i class="fas fa-filter"></i></a>
            </div>
        </div>
    </div>
    <div class="row px-2 px-md-5 mx-0 mx-md-5 pt-5">
        {{-- Risk control starts here --}}
        @if($rcs)
            @foreach($rcs as $b)
            <?php $rc = $b->rcs;?>
                <div class="col-12 bg-lgray br-20 border-0 box-shadow mt-4 mb-4">
                    <div class="row">
                        <div class="col-12 px-0">
                            <span class="br-tl-20 bg-white font-16 font-eb color-r px-3 py-1">{{views($rc)->count()}} views</span>
                            
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
                    <div class="row px-md-4 px-1 pt-2">
                        <div class="col-12">
                        <p class="font-eb font-18 color-b mb-0">{{$rc->title}}</p>
                        <p class="p-style">{{$rc->obj_summary}}</p>
                        </div>
                    </div>
                    <div class="px-md-4 px-1 pt-2">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-6 col-lg-3 px-0">
                                    <button class="bg-red color-w font-14 border-0 br-15 p-2 font-eb" role="button">Add Benchmark</button>
                                <p class="font-e font-14 text-underl pt-3"><a href="{{route('rc.view',$rc->slug)}}" class="color-r">Click for more Info</a></p>
                                </div>
                                <div class="col-6 col-lg-4 pb-4 pb-lg-0 px-0">
                                    <div class="pt-1 pl-3 float-lg-right float-left">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-5 px-0">
                                    <div class="modal-icon text-center float-lg-right">
                                        <div class="d-inline-block">
                                            <a href="#listModal" data-toggle="modal"><i class="fas fa-list-ul"></i></a>
                                            <p class="p-style font-eb text-center">8</p>
                                        </div>
                                        <div class="d-inline-block">
                                            @if (!($rc->likedBy(auth()->user())))
                                                <a role="button" onclick="parent.location='{{route('rc.like',$rc)}}'" href="#"><i class="far fa-thumbs-up"></i></a>
                                            @else
                                                <form action="{{route('rc.unlike',$rc)}}" name="unlike" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a class="bg-dark" role="button" href="javascript:document.unlike.submit()"><i class="fas fa-thumbs-up"></i></a>
                                                </form>
                                            @endif
                                                    <p class="p-style font-eb text-center">{{$rc->likes->count()}}</p>
                                                    
                                                </div>
                                                <div class="d-inline-block">
                                            @if (!($rc->dislikedBy(auth()->user())))
                                                <a role="button" onclick="parent.location='{{route('rc.dislike',$rc)}}'" href="#"><i class="far fa-thumbs-down"></i></a>
                                            @else
                                                <form action="{{route('rc.undislike',$rc)}}" name="undislike" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a class="bg-dark" role="button" href="javascript:document.undislike.submit()"><i class="fas fa-thumbs-down"></i></a>
                                                </form>
                                            @endif
                                                    <p class="p-style font-eb text-center">{{$rc->dislikes->count()}}</p>
                                                    
                                                    
                                                </div>
                                                <div class="d-inline-block">
                                                
                                            @if (!($rc->bookmarkedBy(auth()->user())))
                                                <a role="button" onclick="parent.location='{{route('rc.bookmark',$rc)}}'" href="#"><i class="far fa-bookmark"></i></a>
                                            @else
                                                <form action="{{route('rc.unbookmark',$rc)}}" name="unbookmark" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a class="bg-dark" role="button" href="javascript:document.unbookmark.submit()"><i class="fas fa-bookmark"></i></a>
                                                </form>
                                            @endif
                                                    <p class="p-style font-eb text-center">{{$rc->bookmarks->count()}}</p>
                                                </div>
                                    </div>
                                    <!-- Modal -->
                                    <div class="modal fade" id="listModal" tabindex="-1" role="dialog" aria-labelledby="relationModalCenterTitle" aria-hidden="true">
                                      <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                                        <div class="modal-content lists-modal">
                                          <div class="modal-header">
                                              <label class="font-eb font-16 pt-2 pl-5">Your Lists</label>
                                            <button class="btn-list"><i class="fas fa-plus-circle"></i></button>
                                          </div>
                                          <div class="modal-body">
                                            <div class="lists-modal-body">
                                                <div class="row px-3 bg-lgray pb-3">
                                                    <div class="round col-2">
                                                        <input type="checkbox" name="checkbox[]" id="checkbox1" checked="" />
                                                        <label for="checkbox1"></label>
                                                     </div>
                                                     <div class="col-10  border-0 pt-2">
                                                         <div class="col-9 col-md-9 text-left text-md-left float-md-left d-inline-block">
                                                            <div class="d-inline-block pt-1">
                                                                <p class="p-style mb-0 font-eb font-16"><a href="#" class="color-b">List Name</a></p>
                                                                <p class="p-style font-eb color-r font-12 mb-0">12 risks</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-3 col-md-3 text-left text-md-right mt-md-0 float-md-right pt-1 d-inline-block float-right">
                                                            <div class="d-inline-block mx-md-3 mt-2">
                                                                <a href="#" class="font-eb color-lg font-16"><i class="fas fa-lock"></i></a>
                                                            </div>
                                                        </div>
                                                     </div>
                                                </div>
                                                <div class="row px-3 bg-white pb-3">
                                                    <div class="round col-2">
                                                        <input type="checkbox" name="checkbox[]" id="checkbox2" checked="" />
                                                        <label for="checkbox2"></label>
                                                     </div>
                                                     <div class="col-10  border-0 pt-2">
                                                         <div class="col-9 col-md-9 text-left text-md-left float-md-left d-inline-block">
                                                            <div class="d-inline-block pt-1">
                                                                <p class="p-style mb-0 font-eb font-16"><a href="#" class="color-b">List Name</a></p>
                                                                <p class="p-style font-eb color-r font-12 mb-0">12 risks</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-3 col-md-3 text-left text-md-right mt-md-0 float-md-right pt-1 d-inline-block float-right">
                                                            <div class="d-inline-block mx-md-3 mt-2">
                                                                <a href="#" class="font-eb color-lg font-16"><i class="fas fa-lock"></i></a>
                                                            </div>
                                                        </div>
                                                     </div>
                                                </div>
                                                <div class="row px-3 bg-lgray pb-3">
                                                    <div class="round col-2">
                                                        <input type="checkbox" name="checkbox[]" id="checkbox3" checked="" />
                                                        <label for="checkbox3"></label>
                                                     </div>
                                                     <div class="col-10  border-0 pt-2">
                                                         <div class="col-9 col-md-9 text-left text-md-left float-md-left d-inline-block">
                                                            <div class="d-inline-block pt-1">
                                                                <p class="p-style mb-0 font-eb font-16"><a href="#" class="color-b">List Name</a></p>
                                                                <p class="p-style font-eb color-r font-12 mb-0">12 risks</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-3 col-md-3 text-left text-md-right mt-md-0 float-md-right pt-1 d-inline-block float-right">
                                                            <div class="d-inline-block mx-md-3 mt-2">
                                                                <a href="#" class="font-eb color-lg font-16"><i class="fas fa-lock"></i></a>
                                                            </div>
                                                        </div>
                                                     </div>
                                                </div>
                                                <div class="row px-3 bg-white pb-3">
                                                    <div class="round col-2">
                                                        <input type="checkbox" name="checkbox[]" id="checkbox4" checked="" />
                                                        <label for="checkbox4"></label>
                                                     </div>
                                                     <div class="col-10  border-0 pt-2">
                                                         <div class="col-9 col-md-9 text-left text-md-left float-md-left d-inline-block">
                                                            <div class="d-inline-block pt-1">
                                                                <p class="p-style mb-0 font-eb font-16"><a href="#" class="color-b">List Name</a></p>
                                                                <p class="p-style font-eb color-r font-12 mb-0">12 risks</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-3 col-md-3 text-left text-md-right mt-md-0 float-md-right pt-1 d-inline-block float-right">
                                                            <div class="d-inline-block mx-md-3 mt-2">
                                                                <a href="#" class="font-eb color-lg font-16"><i class="fas fa-lock"></i></a>
                                                            </div>
                                                        </div>
                                                     </div>
                                                </div>
                                                <div class="row px-3 bg-lgray pb-3">
                                                    <div class="round col-2">
                                                        <input type="checkbox" name="checkbox[]" id="checkbox5" checked="" />
                                                        <label for="checkbox5"></label>
                                                     </div>
                                                     <div class="col-10  border-0 pt-2">
                                                         <div class="col-9 col-md-9 text-left text-md-left float-md-left d-inline-block">
                                                            <div class="d-inline-block pt-1">
                                                                <p class="p-style mb-0 font-eb font-16"><a href="#" class="color-b">List Name</a></p>
                                                                <p class="p-style font-eb color-r font-12 mb-0">12 risks</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-3 col-md-3 text-left text-md-right mt-md-0 float-md-right pt-1 d-inline-block float-right">
                                                            <div class="d-inline-block mx-md-3 mt-2">
                                                                <a href="#" class="font-eb color-lg font-16"><i class="fas fa-lock"></i></a>
                                                            </div>
                                                        </div>
                                                     </div>
                                                </div>
                                                <div class="row px-3 bg-white pb-3">
                                                    <div class="round col-2">
                                                        <input type="checkbox" name="checkbox[]" id="checkbox6" checked="" />
                                                        <label for="checkbox6"></label>
                                                     </div>
                                                     <div class="col-10  border-0 pt-2">
                                                         <div class="col-9 col-md-9 text-left text-md-left float-md-left d-inline-block">
                                                            <div class="d-inline-block pt-1">
                                                                <p class="p-style mb-0 font-eb font-16"><a href="#" class="color-b">List Name</a></p>
                                                                <p class="p-style font-eb color-r font-12 mb-0">12 risks</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-3 col-md-3 text-left text-md-right mt-md-0 float-md-right pt-1 d-inline-block float-right">
                                                            <div class="d-inline-block mx-md-3 mt-2">
                                                                <a href="#" class="font-eb color-lg font-16"><i class="fas fa-lock"></i></a>
                                                            </div>
                                                        </div>
                                                     </div>
                                                </div>
                                                <div class="row px-3 bg-lgray pb-3">
                                                    <div class="round col-2">
                                                        <input type="checkbox" name="checkbox[]" id="checkbox7" checked="" />
                                                        <label for="checkbox7"></label>
                                                     </div>
                                                     <div class="col-10  border-0 pt-2">
                                                         <div class="col-9 col-md-9 text-left text-md-left float-md-left d-inline-block">
                                                            <div class="d-inline-block pt-1">
                                                                <p class="p-style mb-0 font-eb font-16"><a href="#" class="color-b">List Name</a></p>
                                                                <p class="p-style font-eb color-r font-12 mb-0">12 risks</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-3 col-md-3 text-left text-md-right mt-md-0 float-md-right pt-1 d-inline-block float-right">
                                                            <div class="d-inline-block mx-md-3 mt-2">
                                                                <a href="#" class="font-eb color-lg font-16"><i class="fas fa-lock"></i></a>
                                                            </div>
                                                        </div>
                                                     </div>
                                                </div>
                                                <p class="text-right p-4"><a href="#" class="color-r font-eb font-14 text-underl">Back To Top</a><i class="fas fa-arrow-up color-r"></i></p>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        @endforeach
    @endif
        {{-- Riskcontrol ends here --}}
    </div>
</div>


@endsection




