@extends('user.layout.contributor')
@section('SiteTitle','Risk controls feed || Riskory')
@section('content')
<div class="px-0 col-12 col-md-9 py-2">
    <div class="row pt-4 mx-0">
        <div class="pl-0 col-12 col-sm-12 col-md-6 col-lg-9">
            <div class="">
                <p class="bg-lblue font-eb font-18 py-2 px-5"><i><img src="assets/images/Mask Group 10@2x.png" class="align-bottom" width="35px"></i>&nbsp;&nbsp;All Risk Controls</p>
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
        @include('user.sections.riskcontrols')
        {{-- Riskcontrol ends here --}}
    </div>
</div>


@endsection




