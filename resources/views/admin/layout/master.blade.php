<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
	<meta name="author" content="NobleUI">
	<meta name="keywords" content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<title>@yield('title','Home')</title>

  @include('admin.layout.css')
</head>
<body>
	<div class="main-wrapper">

	 {{-- Side Bar  --}}
     @include('admin.layout.sidebar')
    {{-- End Side Bar  --}}

		<!-- partial -->

		<div class="page-wrapper">

		 {{-- Nav Bar  --}}
         @include('admin.layout.header')
	       {{--End Nav Bar  --}}
			<div class="page-content">

             @yield('content')

			</div>

			<!-- partial:partials/_footer.html -->
			<footer class="footer d-flex flex-column flex-md-row align-items-center justify-content-between px-4 py-3 border-top small">
				<p class="text-muted mb-1 mb-md-0">Copyright © 2022 <a href="https://www.nobleui.com" target="_blank">NobleUI</a>.</p>
				<p class="text-muted">Handcrafted With <i class="mb-1 text-primary ms-1 icon-sm" data-feather="heart"></i></p>
			</footer>
			<!-- partial -->

		</div>
	</div>

@include('admin.layout.js')
</body>
</html>
