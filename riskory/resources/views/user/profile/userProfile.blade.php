@extends('user.layout.contributor')
@section('SiteTitle','Dashboard || Riskory')
@section('select2')
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css" integrity="sha256-jKV9n9bkk/CTP8zbtEtnKaKf+ehRovOYeKoyfthwbC8=" crossorigin="anonymous" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js" integrity="sha256-CgvH7sz3tHhkiVKh05kSUgG97YtzYNnWt6OXcmYzqHY=" crossorigin="anonymous"></script> --}}
<link rel="stylesheet" href="{{ asset('assets/croppie/croppie.css') }}">
  <script src="{{ asset('assets/croppie/croppie.js') }}"></script>
@endsection
@section('content')

<div class="col-12 col-md-9 py-2 py-md-5 px-0">
    <div class="row px-md-5 mx-2">
        <div class="col-12">
            <div class="profile-cover border-1 shadow">
                <img id="coverImage" src="
                @if(Auth::user()->cover == 'images/covers/default.png')
                {{asset('assets/images/user-cover.png')}}
                @else
                {{asset('userCover/'.Auth::user()->cover)}}
                @endif
            " class="user-cover" alt="cover-image" width="100%"/>
            
                <button class="select-image" id="coverBtn"><i class="fas fa-camera"></i></button>
            </div>
        </div>
    </div>
    <div class="px-md-5">
        <div class="row col-12 user-profile px-0 mx-0">
            <div class="col-12 col-lg-3 pl-lg-4 text-center pt-4 pt-lg-0">
                <div id="profile-container text-center">
                <img id="profileImage" class="rounded-circle w-100 shadow img-thumbnail profileImage"  src="
                @if(Auth::user()->avatar == 'images/avatars/default.png')
                    https://ui-avatars.com/api/?background=random&name={{ str_replace(' ','+' ,Auth::user()->name) }}
                    @else
                    {{asset('userAvat/'.Auth::user()->avatar)}}
                    @endif
                " />
                
                </div>
                <form method="POST" action="{{URL::route('uploadAvatar')}}" enctype="multipart/form-data">
                    @csrf
                    <input id="imageUpload" type="file" name="profile_photo" placeholder="Photo" required capture>
                    <button class="mt-1 font-eb font-16 color-r bg-transparent px-4 py-1 border-1 br-20" style="display: none;" id="uploadAvatarBtn">Upload Avatar <i class="fas fa-camera" ></i></button>
                </form>
            <p class="font-eb font-18">{{Auth::user()->name}}</p>
            </div>
            <div class="col-12 col-lg-4 my-lg-auto text-center text-lg-left">
                <p class="font-eb font-18 pt-lg-4"><a href="#" class="color-r">12 Following</a><a href="#" class="color-r ml-3">30 Followers</a></p>
            </div>
            <div class="col-12 col-lg-3  my-lg-auto text-center text-lg-right pr-md-1">
                <form method="POST" action="{{URL::route('uploadCover')}}" enctype="multipart/form-data">
                    @csrf
                    <input id="coverUpload" type="file" name="cover" placeholder="Photo" required capture style="display: none;">
                    <button class="mt-1 font-eb font-16 color-r bg-transparent px-4 py-1 border-1 br-20"  id="uploadCoverBtn" style="display: none;">Upload Cover <i class="fas fa-camera" ></i></button>
                </form>
            </div>
            <div class="col-12 col-lg-2  my-lg-auto text-center text-lg-right pr-md-1">
                
            <button class="mt-lg-4 font-eb font-16 color-r bg-transparent px-4 py-1 border-1 br-15" onclick="parent.location='{{route('editProfile')}}'">Edit Info</button>
            </div>
            
        </div>
    </div>
    <div class="container-fluid">
        <div class="pt-4 px-md-5">
            <nav>
              <div class="nav nav-tabs d-flex text-center" id="nav-tab" role="tablist">
                <a class="nav-item nav-link  active flex-fill" onclick="postsData()" id="nav-posts-tab" data-toggle="tab" href="#nav-posts" role="tab" aria-controls="nav-posts" aria-selected="true">Posts</a>
                <a class="nav-item nav-link flex-fill"  id="nav-categories-tab" data-toggle="tab" href="#nav-categories" role="tab" aria-controls="nav-categories" aria-selected="false">Categories</a>
                <a class="nav-item nav-link  flex-fill" onclick="likesData()" id="nav-likes-tab" data-toggle="tab" href="#nav-likes" role="tab" aria-controls="nav-likes" aria-selected="false">Likes/Dislikes</a>
                <a class="nav-item nav-link flex-fill" id="nav-lists-tab" data-toggle="tab" href="#nav-lists" role="tab" aria-controls="nav-lists" aria-selected="false">Lists</a>
                <a class="nav-item nav-link flex-fill" onclick="bookmarksData()" id="nav-bookmarks-tab" data-toggle="tab" href="#nav-bookmarks" role="tab" aria-controls="nav-bookmarks" aria-selected="false">Bookmarks</a>
              </div>
            </nav>
        </div>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active px-md-5" id="nav-posts" role="tabpanel" aria-labelledby="nav-posts-tab">
                {{-- Risk control Starts Here --}}
                <div class="row" id="posts_data">
                    @include('user.profile.riskcontrols')
                </div>
                
                {{-- Risk control ends here --}}
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
                        <input type="radio" name="options" id="option1" autocomplete="off" checked onclick="likesData()"> Likes
                      </label>
                      <label class="btn btn-secondary">
                        <input type="radio" name="options" id="option2" autocomplete="off" onclick="dislikesData()"> Dislikes
                      </label>
                    </div>
                </div>
                <div class="row" id="likes_data">
                    @include('user.profile.likes')
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

            {{-- Bookmarks Tab panel --}}

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
                @csrf
                <div class="row" id="bookmarks_data">
                    @include('user.profile.bookmarks')
                </div>
            </div>
            <style type="text/css">
                
                
                </style>
            {{-- <div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="modalLabel">Laravel Profile crop</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="uploadView"></div>
                            </div>
                            <div class="col-md-4">
                                <div class="cropped"></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                      <button type="button" class="btn btn-primary" id="crop">Crop</button>
                    </div>
                  </div>
                </div>
              </div> --}}

            {{-- End bookmarks panel --}}

        </div>
    </div>
</div>
@endsection
@section('script')

<script type="text/javascript">
    $idOfData = '#posts_data';
    $url = "{{ route('riskcontrols.fetch',Auth::user()) }}";
    function postsData(){
        $idOfData = '#posts_data';
        $url = "{{ route('riskcontrols.fetch',Auth::user()) }}";
    }

    function likesData(){
        $idOfData = '#likes_data';
        $url = "{{ route('likes.fetch',Auth::user()) }}";
        fetch_data(1);
    }
    function dislikesData(){
        $idOfData = '#likes_data';
        $url = "{{ route('dislikes.fetch',Auth::user()) }}";
        fetch_data(1);
    }
    function bookmarksData(){
        $idOfData = '#bookmarks_data';
        $url = "{{ route('bookmarks.fetch',Auth::user()) }}";
    }
    $(document).ready(function(){
    
     $(document).on('click', '.page-link', function(event){
        event.preventDefault(); 
        var page = $(this).attr('href').split('page=')[1];
        fetch_data(page);
     });
    
     
    
    });

    function fetch_data(page)
     {
         console.log(page);
      var _token = $("input[name=_token]").val();
      $.ajax({
          url:$url,
          method:"POST",
          data:{_token:_token, page:page},
          success:function(data)
          {
           $($idOfData).html(data);
          }
        });
     }

     

    $("#profileImage").click(function(e) {
         $("#imageUpload").click();
     });

    function fasterPreview( uploader ) {
        if ( uploader.files && uploader.files[0] ){
              $('#profileImage').attr('src', 
                 window.URL.createObjectURL(uploader.files[0]) );
                 document.getElementById('uploadAvatarBtn').style.display = 'inline';
        }
    }

    $("#imageUpload").change(function(){
        fasterPreview( this );
    });

    $("#coverBtn").click(function(e) {
         $("#coverUpload").click();
     });

    function fasterCoverPreview( uploader ) {
        if ( uploader.files && uploader.files[0] ){
              $('#coverImage').attr('src', 
                 window.URL.createObjectURL(uploader.files[0]) );
                 document.getElementById('uploadCoverBtn').style.display = 'inline';
        }
    }

    $("#coverUpload").change(function(){
        fasterCoverPreview( this );
    });


    //cropie script starts here*************************************************************

//     var resize = $('#uploadView').croppie({
//     enableExif: true,
//     enableOrientation: true,    
//     viewport: { // Default { width: 100, height: 100, type: 'square' } 
//         width: 150,
//         height: 150,
//         type: 'circle' //square
//     },
//     boundary: {
//         width: 300,
//         height: 300
//     }
// });
// $('#imageUpload').on('change', function () { 
//   var reader = new FileReader();
//     reader.onload = function (e) {
//       resize.croppie('bind',{
//         url: e.target.result
//       }).then(function(){
//         console.log('jQuery bind complete');
//       });
//     }
//     reader.readAsDataURL(this.files[0]);
// });
// $('#crop').on('click', function (ev) {
//   resize.croppie('result', {
//     type: 'canvas',
//     size: 'viewport'
//   }).then(function (img) {
//     html = '<img src="' + img + '" />';
//     $("#cropped").html(html);
//     //$("#upload-success").html("Images cropped and uploaded successfully.");
//     //$("#upload-success").show();
//     // $.ajax({
//     //   url: "",
//     //   type: "POST",
//     //   data: {"image":img},
//     //   success: function (data) {
        
//     //   }
//     // });
//   });
// });


    // var $modal = $('#imagemodal');
    // var image = document.getElementById('image');
    // var cropper;
      
    // $("body").on("change","#imageUpload", function(e){
    //     var files = e.target.files;
    //     var done = function (url) {
    //       image.src = url;
    //       $modal.modal('show');
    //     };
    //     var reader;
    //     var file;
    //     var url;
    
    //     if (files && files.length > 0) {
    //       file = files[0];
    
    //       if (URL) {
    //         done(URL.createObjectURL(file));
    //       } else if (FileReader) {
    //         reader = new FileReader();
    //         reader.onload = function (e) {
    //           done(reader.result);
    //         };
    //         reader.readAsDataURL(file);
    //       }
    //     }
    // });
    
    // $modal.on('shown.bs.modal', function () {
    //     cropper = new Cropper(image, {
    //       viewMode: 3,
    //       autoCropArea:1,
    //       preview: '.preview'
    //     });
    // }).on('hidden.bs.modal', function () {
    //    cropper.destroy();
    //    cropper = null;
    // });
    
    // $("#crop").click(function(){
    //     canvas = cropper.getCroppedCanvas({
    //         width: 300,
    //         height: 300,
    //       });
    
    //     canvas.toBlob(function(blob) {
    //         url = URL.createObjectURL(blob);
    //         var reader = new FileReader();
    //          reader.readAsDataURL(blob); 
    //          reader.onloadend = function() {
    //             var base64data = reader.result;	
    //             var _token = $("input[name=_token]").val();
    //             $.ajax({
    //                 type: "POST",
    //                 dataType: "json",
    //                 url: "{{route('uploadAvatar')}}",
    //                 data: {'_token': _token, 'image': base64data},
    //                 success: function(data){
    //                     $modal.modal('hide');
    //                     alert("success upload image");
    //                 }
    //               });
    //          }
    //     });
    // })
    
    </script>
@endsection