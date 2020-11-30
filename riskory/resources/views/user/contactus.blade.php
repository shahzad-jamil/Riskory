@extends('user.layout.visitor')
@section('SiteTitle','Contact us || Riskory')
@section('content')
<main role="main" class="inner cover pb-5 pb-sm-5">
    <div class="container">
       <div class="row">
           <div class="col-12">
                <div class="text-center">
                    <h1 class="font-eb color-r">{{$con->heading}}</h1>
                    <p class="p-style">{{$con->content}}</p>
                </div>
           </div>
       </div>

       <div class="row d-flex justify-content-center">
           <div class="col-sm-6">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br />
            @endif

            <div class="card shadow-sm">
                <div class="card-header">
                  Contact Us
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('submission')}}">
                        @csrf
            
                        <div class="form-group">
                            <label>Name <strong class="text-danger">*</strong></label>
                            <input type="text" class="form-control" name="name">
                        </div>
            
                        <div class="form-group">
                            <label>Email <strong class="text-danger">*</strong></label>
                            <input type="text" class="form-control" name="email">
                        </div>
            
                        <div class="form-group">
                            <label for="message">Message <strong class="text-danger">*</strong></label>
                            <textarea name="message" id="message" cols="30" rows="10" class="form-control"></textarea>
                        </div>
            
                        <div class="form-group mt-4 mb-4">
                            <div class="captcha">
                                <span>{!! captcha_img() !!}</span>
                                <button type="button" class="btn btn-danger" class="reload" id="reload">
                                    &#x21bb;
                                </button>
                            </div>
                        </div>
            
                        <div class="form-group mb-4">
                            <input id="captcha" type="text" class="form-control" placeholder="Enter Captcha" name="captcha">
                        </div>
            
                        <div class="form-group">
                            <button type="submit" class="btn btn-danger btn-block">Submit</button>
                        </div>
                    </form>
                </div>
              </div>

            
           </div>
       </div>
    </div>
</main>
@endsection

@section('script')
<script type="text/javascript">
    $('#reload').click(function () {
        $.ajax({
            type: 'GET',
            url: 'reload-captcha',
            success: function (data) {
                $(".captcha span").html(data.captcha);
            }
        });
    });

</script>
@endsection