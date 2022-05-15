<!doctype html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="Description" content="Atom Pocket sederhana">
		<meta name="Author" content="Alibudi">
		<meta name="Keywords" content="Atom Pocket"/>
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<!-- Title -->
		<title> @yield('title') </title>

		<!-- Favicon -->
		<link rel="icon" href="{{ asset('assets/img/brand/favicon.png')}}" type="image/x-icon"/>

		<!-- Icons css -->
		<link href="{{ asset('assets/css/icons.css')}}" rel="stylesheet">

		<!--  Right-sidemenu css -->
		<link href="{{ asset('assets/plugins/sidebar/sidebar.css')}}" rel="stylesheet">

		<!--  Custom Scroll bar-->
		<link href="{{ asset('assets/plugins/mscrollbar/jquery.mCustomScrollbar.css')}}" rel="stylesheet"/>

		<link href="{{ asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
		<link href="{{ asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
		<link href="{{ asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
		<link href="{{ asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
		<link href="{{ asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
		<link href="{{ asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">

		<!--  Left-Sidebar css -->
		<link rel="stylesheet" href="{{ asset('assets/css/sidemenu.css')}}">

		<!--- Style css --->
		<link href="{{ asset('assets/css/style.css')}}" rel="stylesheet">

		<!--- Dark-mode css --->
		<link href="{{ asset('assets/css/style-dark.css')}}" rel="stylesheet">

		<!---Skinmodes css-->
		<link href="{{ asset('assets/css/skin-modes.css')}}" rel="stylesheet" />

		<!--- Animations css-->
		<link href="{{ asset('assets/css/animate.css')}}" rel="stylesheet">
		<!--- Internal Sweet-Alert css-->
		<link href="{{ asset('assets/plugins/sweet-alert/sweetalert.css')}}" rel="stylesheet">
		@stack('css')
		@method('header-js')
	</head>

	<body class="main-body app sidebar-mini dark-theme">

		<!-- Loader -->
		<div id="global-loader">
			<img src="{{ asset('assets/img/loader.svg')}}" class="loader-img" alt="Loader">
		</div>
		<!-- /Loader -->

		<!-- Page -->
		<div class="page">

			<!-- main-sidebar -->
			<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
            @include('template.sidebar')
			<!-- main-sidebar -->

			<!-- main-content -->
			<div class="main-content app-content">

				<!-- main-header -->
				@include('template.header')
				<!-- /main-header -->

				<!-- container -->
				<div class="container-fluid">

					@yield('content')
					<!-- row closed -->
				</div>
				<!-- Container closed -->
			</div>
			<!-- main-content closed -->

		


			<!-- Footer opened -->
			@include('template.footer')
			<!-- Footer closed -->

		</div>
		<!-- End Page -->

		<!-- Back-to-top -->
		<a href="#top" id="back-to-top"><i class="las la-angle-double-up"></i></a>

		<!-- JQuery min js -->
		<script src="{{ asset('assets/plugins/jquery/jquery.min.js')}}"></script>

		<!-- Bootstrap Bundle js -->
		<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

		<!-- Ionicons js -->
		<script src="{{ asset('assets/plugins/ionicons/ionicons.js')}}"></script>

		<!-- Moment js -->
		<script src="{{ asset('assets/plugins/moment/moment.js')}}"></script>

		<!-- P-scroll js -->
		<script src="{{ asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
		<script src="{{ asset('assets/plugins/perfect-scrollbar/p-scroll.js')}}"></script>

		<!-- Sticky js -->
		<script src="{{ asset('assets/js/sticky.js')}}"></script>

		<!-- eva-icons js -->
		<script src="{{ asset('assets/js/eva-icons.min.js')}}"></script>

		<!-- Rating js-->
		<script src="{{ asset('assets/plugins/rating/jquery.rating-stars.js')}}"></script>
		<script src="{{ asset('assets/plugins/rating/jquery.barrating.js')}}"></script>

		<!-- Custom Scroll bar Js-->
		<script src="{{ asset('assets/plugins/mscrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<!-- Internal Data tables -->
		<script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
		<script src="{{ asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
		<script src="{{ asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
		<script src="{{ asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
		<script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
		<script src="{{ asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
		<script src="{{ asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
		<script src="{{ asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
		<script src="{{ asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
		<script src="{{ asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
		<script src="{{ asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
		<script src="{{ asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
		<script src="{{ asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
		<script src="{{ asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
		<script src="{{ asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
		<script src="{{ asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
		<!-- Sidebar js -->
		<script src="{{ asset('assets/plugins/side-menu/sidemenu.js')}}"></script>
<script src="{{ asset('assets/js/table-data.js')}}"></script>
		<!-- Right-sidebar js -->
		<script src="{{ asset('assets/plugins/sidebar/sidebar.js')}}"></script>
		<script src="{{ asset('assets/plugins/sidebar/sidebar-custom.js')}}"></script>
		<script src="{{ asset('assets/plugins/sweet-alert/sweetalert.min.js')}}"></script>
		<script src="{{ asset('assets/plugins/sweet-alert/jquery.sweet-alert.js')}}"></script>

		<!-- Sweet-alert js  -->
		<script src="{{ asset('assets/plugins/sweet-alert/sweetalert.min.js')}}"></script>
		<script src="{{ asset('assets/js/sweet-alert.js')}}"></script>
		<!-- custom js -->
		<script src="{{ asset('assets/js/custom.js')}}"></script>
		@stack('js')

	</body>
</html>