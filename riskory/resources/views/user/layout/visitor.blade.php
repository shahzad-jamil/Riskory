@include('user.inc.header')
<body class="bg-white">
	<div class="cover-container d-flex w-100 flex-column">
@include('user.inc.navbarmain')

@yield('content')

@include('user.inc.contentfooter')

	</div>

	<!-- jQuery, Popper.js, and Bootstrap JS -->
    @include('user.inc.jqueryScript')
	@include('user.inc.bootstrapScript')
</body>
</html>