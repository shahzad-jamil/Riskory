@section('navbarUser')
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-white px-sm-5 px-2 pt-sm-2 pt-2 box-shadow">
    <a class="navbar-brand" href="{{route('user')}}">
      <img class="brand-logo" src="{{asset('assets/images/logo.png')}}">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div class="row col-12 mx-0">
            <div class="col-lg-4 pt-4 pt-lg-2 text-center">
                <div class="input-group search-bar">
                  <input type="text" class="form-control" placeholder="Search Risks Here" aria-label="Search Risks Here" aria-describedby="basic-addon2">
                  <div class="input-group-append">
                    <button class="btn-search" type="button"><i class="fas fa-search"></i></button>
                  </div>
                </div>
            </div>
            <div class="col-lg-8 py-4  py-lg-0">
                <div class="topbar-icon text-center">
                <a href="{{route('rc.create')}}" class="text-center mx-2 my-1 " title="Create risk control"><i class="fas fa-plus-circle"></i></a>
                <a href="{{route('rc.all')}}" class="text-center mx-2 my-1" title="Risk controls feed"><i class="fas fa-columns"></i></a>
                <a href="{{route('all.lists')}}" class="text-center mx-2 my-1"><i class="fas fa-list-ul" title="All lists"></i></a>
                  <a href="{{route('user')}}" class="text-center mx-2 my-1"><i class="fas fa-th-large" title="All categories"></i></a>
                  <a href="{{route('user.network')}}" class="text-center mx-2 my-1"><i class="fas fa-users" title="Users"></i></a>
                  <a href="{{route('rc.bookmarks')}}" class="text-center mx-2 my-1" title="Bookmarks"><i class="fas fa-bookmark"></i></a>
                <a href="{{route('user.notifications')}}" class="text-center mx-2 my-1"><i class="fas fa-bell" title="Notifications"><span class="badge badge-danger counter-badge shadow"><small>{{Auth::user()->unreadNotifications->count()}}</small></span></i></a>
                  <a href="javascript:void(0)" id="dropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class=" topbar-img text-center mx-2 my-1" data-offset="30,20"><img src="
                    @if(Auth::user()->avatar == 'images/avatars/default.png')
                    https://ui-avatars.com/api/?background=random&name={{ str_replace(' ','+' ,Auth::user()->name) }}
                    @else
                    {{asset('userAvat/'.Auth::user()->avatar)}}
                    @endif
                  " class="rounded-circle shadow" title="{{Auth::user()->name}}"></a>
                      <div class="dropdown-menu" aria-labelledby="dropdownProfile">
                      <a class="dropdown-item" href="{{route('userProfile')}}"><i class="fas fa-user-alt"></i> My Profile</a>
                      <div class="dropdown-divider"></div>  
                      <a class="dropdown-item" href="#"><i class="fas fa-cogs"></i> Settings</a>
                      <div class="dropdown-divider"></div>  
                      <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal"><i class="fas fa-sign-out-alt"></i> Logout</a>
                      </div>
                </div>
            </div>
        </div>
      </div>
    </nav>
</header>
<script>
  $( document ).ajaxStart(function() {
    document.getElementById("loader").style.display = "flex";
 });

 $( document ).ajaxComplete(function() {
  document.getElementById("loader").style.display = "none";
 });
</script>
<div class="container-loader" id="loader">
	<svg class="loader" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 340 340">
		 <circle cx="170" cy="170" r="160" stroke="#E2007C"/>
		 <circle cx="170" cy="170" r="135" stroke="#404041"/>
		 <circle cx="170" cy="170" r="110" stroke="#E2007C"/>
		 <circle cx="170" cy="170" r="85" stroke="#404041"/>
	</svg>
	
</div>