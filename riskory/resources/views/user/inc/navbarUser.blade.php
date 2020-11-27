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
                  <a href="#" class="text-center mx-2 my-1"><i class="fas fa-plus-circle"></i></a>
                  <a href="#" class="text-center mx-2 my-1"><i class="fas fa-list-ul"></i></a>
                  <a href="#" class="text-center mx-2 my-1"><i class="fas fa-th-large"></i></a>
                  <a href="#" class="text-center mx-2 my-1"><i class="fas fa-users"></i></a>
                  <a href="#" class="text-center mx-2 my-1"><i class="fas fa-bookmark"></i></a>
                  <a href="#" class="text-center mx-2 my-1"><i class="fas fa-bell"></i></a>
                  <a href="{{URL::route('userProfile')}}" class="topbar-img text-center mx-2 my-1"><img src="
                    @if(Auth::user()->avatar == 'images/avatars/default.png')
                    https://ui-avatars.com/api/?background=random&name={{ str_replace(' ','+' ,Auth::user()->name) }}
                    @else
                    {{asset('userAvat/'.Auth::user()->avatar)}}
                    @endif
                  " class="rounded-circle" title="{{Auth::user()->name}}"></a>
                </div>
            </div>
        </div>
      </div>
    </nav>
</header>