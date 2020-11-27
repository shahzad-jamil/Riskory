@extends('user.layout.contributor')
@section('SiteTitle','Dashboard || Riskory')
@section('content')

<div class="col-12 col-md-9 py-2 py-md-5 px-0">
    <div class="row px-md-5 mx-2">
        <div class="col-12">
            <div class="profile-cover">
            <img src="{{asset('assets/images/user-cover.png')}}" class="user-cover" alt="cover-image" width="100%">
                <button class="select-image"><i class="fas fa-camera"></i></button>
            </div>
        </div>
    </div>
    <div class="px-md-5">
        <div class="row col-12 user-profile px-0 mx-0">
            <div class="col-12 col-lg-4 pl-lg-4 text-center pt-4 pt-lg-0">
                <div id="profile-container text-center">
                <img id="profileImage" class="rounded-circle w-100"  src="
                @if(Auth::user()->avatar == 'images/avatars/default.png')
                    https://ui-avatars.com/api/?background=random&name={{ str_replace(' ','+' ,Auth::user()->name) }}
                    @else
                    {{asset('userAvat/'.Auth::user()->avatar)}}
                    @endif
                " />
                </div>
                <input id="imageUpload" type="file" name="profile_photo" placeholder="Photo" required="" capture>
            <p class="font-eb font-18">{{Auth::user()->name}}</p>
            </div>
            <div class="col-12 col-lg-4 my-lg-auto text-center text-lg-left">
                <p class="font-eb font-18 pt-lg-4"><a href="#" class="color-r">12 Following</a><a href="#" class="color-r ml-3">30 Followers</a></p>
            </div>
            <div class="col-12 col-lg-4  my-lg-auto text-center text-lg-right pr-md-5">
                <button class="mt-lg-4 font-eb font-16 color-r bg-transparent px-4 py-1 border-1 br-15">Edit Info</button>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="pt-4 px-md-5">
            <nav>
              <div class="nav nav-tabs d-flex text-center" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active flex-fill" id="nav-posts-tab" data-toggle="tab" href="#nav-posts" role="tab" aria-controls="nav-posts" aria-selected="true">Posts</a>
                <a class="nav-item nav-link flex-fill" id="nav-categories-tab" data-toggle="tab" href="#nav-categories" role="tab" aria-controls="nav-categories" aria-selected="false">Categories</a>
                <a class="nav-item nav-link flex-fill" id="nav-likes-tab" data-toggle="tab" href="#nav-likes" role="tab" aria-controls="nav-likes" aria-selected="false">Likes/Dislikes</a>
                <a class="nav-item nav-link flex-fill" id="nav-lists-tab" data-toggle="tab" href="#nav-lists" role="tab" aria-controls="nav-lists" aria-selected="false">Lists</a>
                <a class="nav-item nav-link flex-fill" id="nav-bookmarks-tab" data-toggle="tab" href="#nav-bookmarks" role="tab" aria-controls="nav-bookmarks" aria-selected="false">Bookmarks</a>
              </div>
            </nav>
        </div>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active px-md-5" id="nav-posts" role="tabpanel" aria-labelledby="nav-posts-tab">
                <div class="col-12 bg-lgray br-20 border-0 box-shadow mt-4 mb-4">
                    <div class="row">
                        <div class="col-12 px-0">
                            <span class="br-tl-20 bg-white font-16 font-eb color-r px-3 py-1">50 views</span>
                            <span class="br-tr-20 bg-white font-16 font-e color-r px-3 py-1 float-right">Under Discussion</span>
                        </div>
                    </div>
                    <div class="row px-md-4 px-1 pt-2">
                        <div class="col-12">
                            <p class="font-eb font-18 color-b mb-0">Risk Control Title</p>
                            <p class="p-style">This is supposed to be the risk objective summary<br>This is supposed to be the risk objective summary</p>
                        </div>
                    </div>
                    <div class="px-md-4 px-1 pt-2">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-6 col-lg-3 px-0">
                                    <button class="bg-red color-w font-14 border-0 br-15 p-2 font-eb" onclick="parent.location='add-benchmark.html'">Add Benchmark</button>
                                    <p class="font-e font-14 text-underl pt-3"><a href="risk-control-detail.html" class="color-r">Click for more Info</a></p>
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
                <div class="col-12 bg-lgray br-20 border-0 box-shadow mb-4">
                    <div class="row">
                        <div class="col-12 px-0">
                            <span class="br-tl-20 bg-white font-16 font-eb color-r px-3 py-1">50 views</span>
                            <span class="br-tr-20 bg-white font-16 font-e color-r px-3 py-1 float-right">Under Discussion</span>
                        </div>
                    </div>
                    <div class="row px-md-4 px-1 pt-2">
                        <div class="col-12">
                            <p class="font-eb font-18 color-b mb-0">Risk Control Title</p>
                            <p class="p-style">This is supposed to be the risk objective summary<br>This is supposed to be the risk objective summary</p>
                        </div>
                    </div>
                    <div class="px-md-4 px-1 pt-2">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-6 col-lg-3 px-0">
                                    <button class="bg-red color-w font-14 border-0 br-15 p-2 font-eb" onclick="parent.location='add-benchmark.html'">Add Benchmark</button>
                                    <p class="font-e font-14 text-underl pt-3"><a href="risk-control-detail.html" class="color-r">Click for more Info</a></p>
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
            </div>
            <div class="tab-pane fade" id="nav-categories" role="tabpanel" aria-labelledby="nav-categories-tab">
                <div class="pl-0 col-12 py-5">
                    <!-- Browse By Industry Secion -->
                    <div class="pl-0 col-12 col-sm-10 col-md-7 col-lg-5">
                        <p class="bg-lblue font-eb font-18 py-2 px-2 px-md-5"><i><img src="assets/images/Mask-Group-55.svg" class="align-bottom" width="35px"></i>&nbsp;&nbsp;Industry</p>
                    </div>
                    <div class="row pl-3 pl-md-5">
                        <div class="col-12 col-md-6 col-lg-4">
                            <p class="p-style bg-lgray box-shadow py-2 px-4"><i class="fas fa-tag fa-rotate-90"></i> &nbsp;&nbsp;IN Category <button class="btn-follow bg-dgray">Unfollow</button></p>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <p class="p-style bg-lgray box-shadow py-2 px-4"><i class="fas fa-tag fa-rotate-90"></i> &nbsp;&nbsp;IN Category <button class="btn-follow bg-dgray">Unfollow</button></p>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <p class="p-style bg-lgray box-shadow py-2 px-4"><i class="fas fa-tag fa-rotate-90"></i> &nbsp;&nbsp;IN Category <button class="btn-follow bg-dgray">Unfollow</button></p>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <p class="p-style bg-lgray box-shadow py-2 px-4"><i class="fas fa-tag fa-rotate-90"></i> &nbsp;&nbsp;IN Category <button class="btn-follow bg-dgray">Unfollow</button></p>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <p class="p-style bg-lgray box-shadow py-2 px-4"><i class="fas fa-tag fa-rotate-90"></i> &nbsp;&nbsp;IN Category <button class="btn-follow bg-dgray">Unfollow</button></p>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <p class="p-style bg-lgray box-shadow py-2 px-4"><i class="fas fa-tag fa-rotate-90"></i> &nbsp;&nbsp;IN Category <button class="btn-follow bg-dgray">Unfollow</button></p>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <p class="p-style bg-lgray box-shadow py-2 px-4"><i class="fas fa-tag fa-rotate-90"></i> &nbsp;&nbsp;IN Category <button class="btn-follow bg-dgray">Unfollow</button></p>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <p class="p-style bg-lgray box-shadow py-2 px-4"><i class="fas fa-tag fa-rotate-90"></i> &nbsp;&nbsp;IN Category <button class="btn-follow bg-dgray">Unfollow</button></p>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <p class="p-style bg-lgray box-shadow py-2 px-4"><i class="fas fa-tag fa-rotate-90"></i> &nbsp;&nbsp;IN Category <button class="btn-follow bg-dgray">Unfollow</button></p>
                        </div>
                    </div>
                    <div class="ml-5" style="width: 85px">
                        <p class="p-style bg-lgray box-shadow py-2 px-4"><a href="#" class="color-b text-underl">More</a></p>
                    </div>
                    <!-- Browse By Business Process Section -->
                    <div class="pl-0 col-12 col-sm-10 col-md-7 col-lg-5 mt-5">
                        <p class="bg-lblue font-eb font-18 py-2 px-2 px-md-5"><i><img src="assets/images/Mask Group 56.svg" class="align-bottom" width="35px"></i>&nbsp;&nbsp;Business Process</p>
                    </div>
                    <div class="row pl-3 pl-md-5">
                        <div class="col-12 col-md-6 col-lg-4">
                            <p class="p-style bg-lgray box-shadow py-2 px-4"><i class="fas fa-tag fa-rotate-90"></i> &nbsp;&nbsp;BP Category <button class="btn-follow bg-dgray">Unfollow</button></p>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <p class="p-style bg-lgray box-shadow py-2 px-4"><i class="fas fa-tag fa-rotate-90"></i> &nbsp;&nbsp;BP Category <button class="btn-follow bg-dgray">Unfollow</button></p>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <p class="p-style bg-lgray box-shadow py-2 px-4"><i class="fas fa-tag fa-rotate-90"></i> &nbsp;&nbsp;BP Category <button class="btn-follow bg-dgray">Unfollow</button></p>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <p class="p-style bg-lgray box-shadow py-2 px-4"><i class="fas fa-tag fa-rotate-90"></i> &nbsp;&nbsp;BP Category <button class="btn-follow bg-dgray">Unfollow</button></p>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <p class="p-style bg-lgray box-shadow py-2 px-4"><i class="fas fa-tag fa-rotate-90"></i> &nbsp;&nbsp;BP Category <button class="btn-follow bg-dgray">Unfollow</button></p>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <p class="p-style bg-lgray box-shadow py-2 px-4"><i class="fas fa-tag fa-rotate-90"></i> &nbsp;&nbsp;BP Category <button class="btn-follow bg-dgray">Unfollow</button></p>
                        </div>
                    </div>
                    <div class="ml-5" style="width: 85px">
                        <p class="p-style bg-lgray box-shadow py-2 px-4"><a href="#" class="color-b text-underl">More</a></p>
                    </div>
                    <!-- Browse By Framework Section -->
                    <div class="pl-0 col-12 col-sm-10 col-md-7 col-lg-5 mt-5">
                        <p class="bg-lblue font-eb font-18 py-2 px-2 px-md-5"><i><img src="assets/images/Mask Group 57.svg" class="align-bottom" width="35px"></i>&nbsp;&nbsp;Framework</p>
                    </div>
                    <div class="row pl-3 pl-md-5">
                        <div class="col-12 col-md-6 col-lg-4">
                            <p class="p-style bg-lgray box-shadow py-2 px-4"><i class="fas fa-tag fa-rotate-90"></i> &nbsp;&nbsp;FW Category <button class="btn-follow bg-dgray">Unfollow</button></p>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <p class="p-style bg-lgray box-shadow py-2 px-4"><i class="fas fa-tag fa-rotate-90"></i> &nbsp;&nbsp;FW Category <button class="btn-follow bg-dgray">Unfollow</button></p>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <p class="p-style bg-lgray box-shadow py-2 px-4"><i class="fas fa-tag fa-rotate-90"></i> &nbsp;&nbsp;FW Category <button class="btn-follow bg-dgray">Unfollow</button></p>
                        </div>
                    </div>
                    <div class="ml-5" style="width: 85px">
                        <p class="p-style bg-lgray box-shadow py-2 px-4"><a href="#" class="color-b text-underl">More</a></p>
                    </div>
                    <!-- Browse By Tags Section -->
                    <div class="pl-0 col-12 col-sm-10 col-md-7 col-lg-5 mt-5">
                        <p class="bg-lblue font-eb font-18 py-2 px-2 px-md-5"><i><img src="assets/images/Icon awesome-tags.png" class="align-bottom" width="35px"></i>&nbsp;&nbsp;Tags</p>
                    </div>
                    <div class="row pl-3 pl-md-5">
                        <div class="col-12 col-md-6 col-lg-4">
                            <p class="p-style bg-lgray box-shadow py-2 px-4"><i class="fas fa-tag fa-rotate-90"></i> &nbsp;&nbsp;Tag Name <button class="btn-follow bg-dgray">Unfollow</button></p>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <p class="p-style bg-lgray box-shadow py-2 px-4"><i class="fas fa-tag fa-rotate-90"></i> &nbsp;&nbsp;Tag Name <button class="btn-follow bg-dgray">Unfollow</button></p>
                        </div>
                    </div>
                    <div class="ml-5" style="width: 85px">
                        <p class="p-style bg-lgray box-shadow py-2 px-4"><a href="#" class="color-b text-underl">More</a></p>
                    </div>
                </div>				
            </div>
            <div class="tab-pane fade px-md-5" id="nav-likes" role="tabpanel" aria-labelledby="nav-likes-tab">
                <div class="text-center text-md-right pt-4">
                    <div class="btn-group btn-group-toggle btn-follower" data-toggle="buttons">
                      <label class="btn btn-secondary active">
                        <input type="radio" name="options" id="option1" autocomplete="off" checked> Likes
                      </label>
                      <label class="btn btn-secondary">
                        <input type="radio" name="options" id="option2" autocomplete="off"> Dislikes
                      </label>
                    </div>
                </div>
                <div class="col-12 bg-lgray br-20 border-0 box-shadow mt-4 mb-4">
                    <div class="row">
                        <div class="col-12 px-0">
                            <span class="br-tl-20 bg-white font-16 font-eb color-r px-3 py-1">50 views</span>
                            <span class="br-tr-20 bg-white font-16 font-e color-r px-3 py-1 float-right">Under Discussion</span>
                        </div>
                    </div>
                    <div class="row px-md-4 px-1 pt-2">
                        <div class="col-12">
                            <p class="font-eb font-18 color-b mb-0">Risk Control Title</p>
                            <p class="p-style">This is supposed to be the risk objective summary<br>This is supposed to be the risk objective summary</p>
                        </div>
                    </div>
                    <div class="px-md-4 px-1 pt-2">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-6 col-lg-3 px-0">
                                    <button class="bg-red color-w font-14 border-0 br-15 p-2 font-eb" onclick="parent.location='add-benchmark.html'">Add Benchmark</button>
                                    <p class="font-e font-14 text-underl pt-3"><a href="risk-control-detail.html" class="color-r">Click for more Info</a></p>
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
                <div class="col-12 bg-lgray br-20 border-0 box-shadow mb-4">
                    <div class="row">
                        <div class="col-12 px-0">
                            <span class="br-tl-20 bg-white font-16 font-eb color-r px-3 py-1">50 views</span>
                            <span class="br-tr-20 bg-white font-16 font-e color-r px-3 py-1 float-right">Under Discussion</span>
                        </div>
                    </div>
                    <div class="row px-md-4 px-1 pt-2">
                        <div class="col-12">
                            <p class="font-eb font-18 color-b mb-0">Risk Control Title</p>
                            <p class="p-style">This is supposed to be the risk objective summary<br>This is supposed to be the risk objective summary</p>
                        </div>
                    </div>
                    <div class="px-md-4 px-1 pt-2">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-6 col-lg-3 px-0">
                                    <button class="bg-red color-w font-14 border-0 br-15 p-2 font-eb" onclick="parent.location='add-benchmark.html'">Add Benchmark</button>
                                    <p class="font-e font-14 text-underl pt-3"><a href="risk-control-detail.html" class="color-r">Click for more Info</a></p>
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
            </div>
            <div class="tab-pane fade" id="nav-lists" role="tabpanel" aria-labelledby="nav-lists-tab">
                <div class="text-center text-md-right pt-3 px-0 px-md-5">
                    <button class="btn-list bg-red border-0 br-30 font-eb color-w px-5 py-3 btn-hover"><i class="fas fa-plus-circle"></i> New List</button>
                </div>
                <div class="row pl-1 pl-md-5 mx-0 mx-md-5 pt-3">
                    <div class="col-12 bg-lgray br-20 border-0 box-shadow mb-4 py-1 px-4 p-md-5">
                        <div class="row bg-white px-1 px-md-5 py-3 py-md-4 br-20 my-3">
                            <div class="col-9 col-md-6 text-left text-md-left float-md-left">
                                <img src="assets/images/Mask Group 39@2x.png" class="img-cicle d-inline-block align-top" width="60px">
                                <div class="d-inline-block pt-1 pl-2">
                                    <p class="p-style mb-0 font-eb font-18"><a href="#" class="color-b">List Name</a></p>
                                    <p class="p-style font-eb color-r font-14 mb-0">12 risks</p>
                                </div>
                            </div>
                            <div class="col-3 col-md-6 text-center text-md-right mt-1 mt-md-0 float-md-right">
                                <div class="d-inline-block mx-3 mt-2">
                                    <a href="#" class="font-eb color-lg font-24"><i class="fas fa-lock"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="row bg-dgray px-1 px-md-5 py-3 py-md-4 br-20 my-3">
                            <div class="col-9 col-md-6 text-left text-md-left float-md-left">
                                <img src="assets/images/Mask Group 39@2x.png" class="img-cicle d-inline-block align-top" width="60px">
                                <div class="d-inline-block pt-1 pl-2">
                                    <p class="p-style mb-0 font-eb font-18"><a href="#" class="color-b">List Name</a></p>
                                    <p class="p-style font-eb color-r font-14 mb-0">12 risks</p>
                                </div>
                            </div>
                            <div class="col-3 col-md-6 text-center text-md-right mt-1 mt-md-0 float-md-right">
                                <div class="d-inline-block mx-3 mt-2">
                                    <a href="#" class="font-eb color-lg font-24"><i class="fas fa-lock"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="row bg-white px-1 px-md-5 py-3 py-md-4 br-20 my-3">
                            <div class="col-9 col-md-6 text-left text-md-left float-md-left">
                                <img src="assets/images/Mask Group 39@2x.png" class="img-cicle d-inline-block align-top" width="60px">
                                <div class="d-inline-block pt-1 pl-2">
                                    <p class="p-style mb-0 font-eb font-18"><a href="#" class="color-b">List Name</a></p>
                                    <p class="p-style font-eb color-r font-14 mb-0">12 risks</p>
                                </div>
                            </div>
                            <div class="col-3 col-md-6 text-center text-md-right mt-1 mt-md-0 float-md-right">
                                <div class="d-inline-block mx-3 mt-2">
                                    <a href="#" class="font-eb color-lg font-24"><i class="fas fa-lock"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="row bg-dgray px-1 px-md-5 py-3 py-md-4 br-20 my-3">
                            <div class="col-9 col-md-6 text-left text-md-left float-md-left">
                                <img src="assets/images/Mask Group 39@2x.png" class="img-cicle d-inline-block align-top" width="60px">
                                <div class="d-inline-block pt-1 pl-2">
                                    <p class="p-style mb-0 font-eb font-18"><a href="#" class="color-b">List Name</a></p>
                                    <p class="p-style font-eb color-r font-14 mb-0">12 risks</p>
                                </div>
                            </div>
                            <div class="col-3 col-md-6 text-center text-md-right mt-1 mt-md-0 float-md-right">
                                <div class="d-inline-block mx-3 mt-2">
                                    <a href="#" class="font-eb color-lg font-24"><i class="fas fa-lock"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="row bg-white px-1 px-md-5 py-3 py-md-4 br-20 my-3">
                            <div class="col-9 col-md-6 text-left text-md-left float-md-left">
                                <img src="assets/images/Mask Group 39@2x.png" class="img-cicle d-inline-block align-top" width="60px">
                                <div class="d-inline-block pt-1 pl-2">
                                    <p class="p-style mb-0 font-eb font-18"><a href="#" class="color-b">List Name</a></p>
                                    <p class="p-style font-eb color-r font-14 mb-0">12 risks</p>
                                </div>
                            </div>
                            <div class="col-3 col-md-6 text-center text-md-right mt-1 mt-md-0 float-md-right">
                                <div class="d-inline-block mx-3 mt-2">
                                    <a href="#" class="font-eb color-lg font-24"><i class="fas fa-lock"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="row bg-dgray px-1 px-md-5 py-3 py-md-4 br-20 my-3">
                            <div class="col-9 col-md-6 text-left text-md-left float-md-left">
                                <img src="assets/images/Mask Group 39@2x.png" class="img-cicle d-inline-block align-top" width="60px">
                                <div class="d-inline-block pt-1 pl-2">
                                    <p class="p-style mb-0 font-eb font-18"><a href="#" class="color-b">List Name</a></p>
                                    <p class="p-style font-eb color-r font-14 mb-0">12 risks</p>
                                </div>
                            </div>
                            <div class="col-3 col-md-6 text-center text-md-right mt-1 mt-md-0 float-md-right">
                                <div class="d-inline-block mx-3 mt-2">
                                    <a href="#" class="font-eb color-lg font-24"><i class="fas fa-lock"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="row bg-white px-1 px-md-5 py-3 py-md-4 br-20 my-3">
                            <div class="col-9 col-md-6 text-left text-md-left float-md-left">
                                <img src="assets/images/Mask Group 39@2x.png" class="img-cicle d-inline-block align-top" width="60px">
                                <div class="d-inline-block pt-1 pl-2">
                                    <p class="p-style mb-0 font-eb font-18"><a href="#" class="color-b">List Name</a></p>
                                    <p class="p-style font-eb color-r font-14 mb-0">12 risks</p>
                                </div>
                            </div>
                            <div class="col-3 col-md-6 text-center text-md-right mt-1 mt-md-0 float-md-right">
                                <div class="d-inline-block mx-3 mt-2">
                                    <a href="#" class="font-eb color-lg font-24"><i class="fas fa-lock"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="row bg-dgray px-1 px-md-5 py-3 py-md-4 br-20 my-3">
                            <div class="col-9 col-md-6 text-left text-md-left float-md-left">
                                <img src="assets/images/Mask Group 39@2x.png" class="img-cicle d-inline-block align-top" width="60px">
                                <div class="d-inline-block pt-1 pl-2">
                                    <p class="p-style mb-0 font-eb font-18"><a href="#" class="color-b">List Name</a></p>
                                    <p class="p-style font-eb color-r font-14 mb-0">12 risks</p>
                                </div>
                            </div>
                            <div class="col-3 col-md-6 text-center text-md-right mt-1 mt-md-0 float-md-right">
                                <div class="d-inline-block mx-3 mt-2">
                                    <a href="#" class="font-eb color-lg font-24"><i class="fas fa-lock"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade px-md-5" id="nav-bookmarks" role="tabpanel" aria-labelledby="nav-bookmarks-tab">
                <div class="row col-12 pt-4 px-0 mx-0">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-5 col-12 text-right">
                        <div class="input-group search-bar py-1 ml-md-0">
                          <input type="text" class="form-control" placeholder="Search through the category" aria-label="Search Risks Here" aria-describedby="basic-addon2">
                          <div class="input-group-append">
                            <button class="btn-search bgb-lgray color-dg" type="button"><i class="fas fa-search"></i></button>
                          </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-12">
                        <div class="topbar-icon text-center text-lg-right mt-3 mt-md-0">
                          <a href="#" class="text-center mx-2 my-1 bg-lblue color-r"><i class="fas fa-sort-amount-up-alt"></i></a>
                          <a href="#" class="text-center mx-2 my-1"><i class="fas fa-sort-amount-down"></i></a>
                          <a href="#" class="text-center mx-2 my-1"><i class="fas fa-filter"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-12 bg-lgray br-20 border-0 box-shadow mt-4 mb-4">
                    <div class="row">
                        <div class="col-12 px-0">
                            <span class="br-tl-20 bg-white font-16 font-eb color-r px-3 py-1">50 views</span>
                            <span class="br-tr-20 bg-white font-16 font-e color-r px-3 py-1 float-right">Under Discussion</span>
                        </div>
                    </div>
                    <div class="row px-md-4 px-1 pt-2">
                        <div class="col-12">
                            <p class="font-eb font-18 color-b mb-0">Risk Control Title</p>
                            <p class="p-style">This is supposed to be the risk objective summary<br>This is supposed to be the risk objective summary</p>
                        </div>
                    </div>
                    <div class="px-md-4 px-1 pt-2">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-6 col-lg-3 px-0">
                                    <button class="bg-red color-w font-14 border-0 br-15 p-2 font-eb" onclick="parent.location='add-benchmark.html'">Add Benchmark</button>
                                    <p class="font-e font-14 text-underl pt-3"><a href="risk-control-detail.html" class="color-r">Click for more Info</a></p>
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
                <div class="col-12 bg-lgray br-20 border-0 box-shadow mb-4">
                    <div class="row">
                        <div class="col-12 px-0">
                            <span class="br-tl-20 bg-white font-16 font-eb color-r px-3 py-1">50 views</span>
                            <span class="br-tr-20 bg-white font-16 font-e color-r px-3 py-1 float-right">Under Discussion</span>
                        </div>
                    </div>
                    <div class="row px-md-4 px-1 pt-2">
                        <div class="col-12">
                            <p class="font-eb font-18 color-b mb-0">Risk Control Title</p>
                            <p class="p-style">This is supposed to be the risk objective summary<br>This is supposed to be the risk objective summary</p>
                        </div>
                    </div>
                    <div class="px-md-4 px-1 pt-2">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-6 col-lg-3 px-0">
                                    <button class="bg-red color-w font-14 border-0 br-15 p-2 font-eb" onclick="parent.location='add-benchmark.html'">Add Benchmark</button>
                                    <p class="font-e font-14 text-underl pt-3"><a href="risk-control-detail.html" class="color-r">Click for more Info</a></p>
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
            </div>
        </div>
    </div>
</div>
     
        

@endsection