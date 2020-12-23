@extends('user.layout.contributor')
@section('SiteTitle','Lists || Riskory')
@section('content')
<div class="pl-0 col-12 col-md-9 py-2 pr-0 pr-md-5">
    <div class="row pt-4 mx-0">
        <div class="pl-0 col-12 col-sm-12 col-md-6 col-lg-5">
            <div class="">
                <p class="bg-lblue font-eb font-18 py-2 px-5"><i><img src="{{asset('assets/images/Mask Group 10@2x.png')}}" class="align-bottom" width="35px"></i>&nbsp;&nbsp;Your Risk Control Lists</p>
            </div>
        </div>
        <div class="col-lg-7 col-md-6 col-sm-12 col-12 text-center text-md-right">
            <button class="btn-list bg-red border-0 br-30 font-eb color-w px-5 py-3 btn-hover" data-toggle="modal" data-target="#newListModal"><i class="fas fa-plus-circle"></i> New List</button>
        {{-- Modal --}}
        <div class="modal fade riskory-modal" id="newListModal" tabindex="-1" role="dialog" aria-labelledby="listModal" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-body">
                  <div class="text-center">
                      <h6 class="p-style font-b">Creating New List</h6>
                      <input type="hidden" value="{{route('get.all.lists')}}" id="getDataUrl"></span>
                      <form id="listForm" method="POST" action="{{route('add.list')}}">
                          @csrf
                          <input type="text" name="name" placeholder="List Name" class="form-control color-b br-10 mt-2 mb-3" required>
                          <input type="text" name="description" placeholder="Description" class="form-control color-b br-10">
                          <div class="radio-item">
                              <input type="radio" id="publiclist" name="listtype" value="1" checked="">
                              <label for="publiclist" class="font-14">Public</label>
                          </div>
                          <div class="radio-item ml-3">
                              <input type="radio" id="privatelist" name="listtype" value="0">
                              <label for="privatelist" class="font-14">Private</label>
                          </div>
                          <div class="my-2">
                              <button class="font-14 font-b color-r bg-transparent border-2 br-30 px-3 py-2 mx-1" type="button" data-dismiss="modal">Cancel</button>
                              <input type="submit" name="" value="Create" class="font-14 font-b color-w bg-red border-2 br-20 px-3 py-2 mx-1">
                          </div>
                      </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    <div class="row pl-md-5 mx-0 mx-md-5 pt-4 mx-2">
        <div class="col-12 bg-lgray br-20 border-0 box-shadow mb-4 py-1 px-4 p-md-5" id="listsData">
            
           
        </div>
    </div>
</div>
<div class="modal fade riskory-modal" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <div class="text-center">
              <h6 class="p-style text-danger">Delete List</h6>
              <form id="deleteForm" method="POST" action="{{route('delete.list')}}">
                  @method('DELETE')
                  @csrf
                  <input type="hidden" id="delId" name="delId" value="0">
                  <p class="lead">Do you really want to delete this list?</p>
                  <div class="my-2">
                    <button class="font-14 font-b color-r bg-transparent border-2 br-30 px-3 py-2 mx-1" type="button" data-dismiss="modal">Cancel</button>
                    <input type="submit" name="" value="delete" class="font-14 font-b color-w bg-red border-2 br-20 px-3 py-2 mx-1">
                </div>
              </form>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('script')
<script src="{{asset('js/list.js')}}"></script>
@endsection