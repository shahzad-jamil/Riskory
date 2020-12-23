@section('contributorSidebar')
<div class="col-12 col-md-3 py-4 box-shadow-sidebar">
    <div class="pl-lg-5 pr-lg-4 pt-3 border-1 text-center">
    <a href="http://skiller.com/"><img src="{{asset('assets/images/logo2.png')}}" class="mb-4"></a>
        <p class="p-style"><a href="http://skiller.com/" class="color-r text-underl">Visit the best employment platform here ..</a></p>
    </div>
  

    <p class="font-eb font-18 px-3 pt-3"><i class="fas fa-tags fa-rotate-90"></i>&nbsp;&nbsp;&nbsp; Most Opened Tags</p>
    <div class="row pl-2">
        @php
        $tags = App\Models\Tag::orderByUniqueViews()->limit(5)->get() 

        @endphp
        @foreach($tags as $tg)
        <div class="btn-group">
        <button class="bg-lgray border-0 color-b box-shadow py-2 px-3 font-12 mx-1 my-1" type="button" id="dropdownMenuButton{{$tg->id}}"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{$tg->name}} <i class="fas fa-caret-down"></i></button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton{{$tg->id}}">
            <a class="dropdown-item" href="javascript:void(0)"><span class="badge badge-pill badge-secondary">Views ({{views($tg)->count()}})</span></a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="javascript:void(0)"><span class="badge badge-pill badge-secondary">Followers ({{$tg->followers->count()}})</span></a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{route('byTag',['tag'=>$tg])}}">Visit</a>
          </div>
        </div>
        @endforeach
        
        <button class="bg-lgray border-0 color-b box-shadow py-2 px-3 font-12 mx-1 my-1 text-underl" onclick="parent.location='{{route('seeMore','tags')}}'">More ..</button>
    </div>
    <p class="font-eb font-18 px-3 pt-3"><i class="fas fa-tags fa-rotate-90"></i>&nbsp;&nbsp;&nbsp; People To Follow</p>
    <ul class="pl-2">
        <li class="nav-link">
        <img src="{{asset('assets/images/Ellipse 4.png')}}" class="img-cicle d-inline-block align-top">
            <div class="d-inline-block pt-1 pl-2">
                <p class="p-style mb-0"><a href="#" class="color-b">Harry Bradley</a></p>
                <p class="p-style color-r font-14 mb-0">12 new risks</p>
            </div>
        </li>
        <li class="nav-link">
        <img src="{{asset('assets/images/Ellipse 6.png')}}" class="img-cicle d-inline-block align-top">
            <div class="d-inline-block pt-1 pl-2">
                <p class="p-style mb-0"><a href="#" class="color-b">Kelly Green</a></p>
                <p class="p-style color-r font-14 mb-0">2 new risks</p>
            </div>
        </li>
        <li class="nav-link">
        <img src="{{asset('assets/images/Ellipse 8.png')}}" class="img-cicle d-inline-block align-top">
            <div class="d-inline-block pt-1 pl-2">
                <p class="p-style mb-0"><a href="#" class="color-b">Fionna Patel</a></p>
                <p class="p-style color-r font-14 mb-0">6 new risks</p>
            </div>
        </li>
    </ul>
    <p class="p-style text-underl pl-5 ml-5"><a href="#" class="color-b">More ..</a></p>
</div>