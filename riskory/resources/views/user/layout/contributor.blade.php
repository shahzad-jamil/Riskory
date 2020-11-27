@include('user.inc.header')
@include('user.inc.jqueryScript')
@include('user.inc.toastr')
<body class="bg-white">
	<div class="d-flex w-100 flex-column">
        @include('user.inc.navbarUser')
        
        <main role="main" class="inner">
            <div class="container-fluid row pr-0">
                @yield('content')
                @include('user.inc.contributorSidebar')
            </div>
        </main>
		@include('user.inc.contentfooter')
	</div>

 @include('user.inc.logoutModal')
    
 <script>
    @if(session()->get('success'))
    toastr.success("{{session()->get('success')}}");
    @elseif(session()->get('error'))
    toastr.error("{{session()->get('error')}}");
    @endif
</script>
	<!-- jQuery, Popper.js, and Bootstrap JS -->
 
    @include('user.inc.bootstrapScript')
   
</body>
</html>