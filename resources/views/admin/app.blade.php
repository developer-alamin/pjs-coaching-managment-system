<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	<!-- Font Awesome -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"rel="stylesheet"/>
	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
	<!-- MDB -->
	<link rel="stylesheet" href="{{asset('css/mdb.min.css')}}" rel="stylesheet"/>
	{{-- toastr css start form here --}}
	<link rel="stylesheet" href="{{asset('css/toastr.min.css')}}"/>
	{{-- bootstrap min css start form here --}}
	<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
	{{-- datatable min css start form here --}}
	<link rel="stylesheet" href="{{asset('css/datatables.min.css')}}"/>
	{{-- select datatable min css start form here --}}
	<link rel="stylesheet" href="{{asset('css/select.dataTables.min.css')}}" />
	{{-- JQuery ui css start form here --}}
	<link rel="stylesheet" href="{{asset('css/jquery-ui.css')}}" />
	{{-- site app css start form here --}}
	<link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
	{{-- animation loader css start form here --}}
	<link rel="stylesheet" type="text/css" href="{{asset('css/loader.css')}}">
	{{-- DataTables css start form here --}}
	<link rel="stylesheet" type="text/css" href="{{asset('css/dataTable.css')}}">
	{{-- modal.css css start form here --}}
	<link rel="stylesheet" type="text/css" href="{{asset('css/modal.css')}}">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

		@includeif('admin.menu')
			@yield('content')
			</div>
		</div>
		</main>
	</section>




	{{-- JQuery js start form here --}}
	<script type="text/javascript" src="{{asset('js/jquery-1.9.1.js')}}"></script>
	{{-- propper js start form here --}}
	<script type="text/javascript" src="{{asset('js/popper.min.js')}}"></script>
	{{-- bootstrap min js start form here --}}
	<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
	<!-- MDB -->
	<script type="text/javascript" src="{{asset('js/mdb.min.js')}}"></script>
	{{-- toastr min js start form here --}}
	<script type="text/javascript" src="{{asset('js/toastr.min.js')}}"></script>
	{{-- jquery.dataTables.min.js start form here --}}
	<script type="text/javascript" src="{{asset('js/jquery.dataTables.min.js')}}"></script>
	{{-- dataTables.select.min.js start form here --}}
	<script type="text/javascript" src="{{asset('js/dataTables.select.min.js')}}"></script>
	{{-- sweetalert.min.js start form here --}}
	<script type="text/javascript" src="{{asset('js/sweetalert.min.js')}}"></script>
	{{-- JQuery ui js start form here --}}
	<script type="text/javascript" src="{{asset('js/jquery-ui.js')}}"></script>
	{{-- jquery.waypoints.min.js start form here --}}
	<script type="text/javascript" src="{{asset('js/jquery.waypoints.min.js')}}"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	{{-- axios.min.js start form here --}}
	<script type="text/javascript" src="{{asset('js/axios.min.js')}}"></script>
	<script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
	{{-- site main js start form here --}}
	<script type="text/javascript" src="{{asset('js/main.js')}}"></script>
	@yield('script')
</body>
</html>