<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Admin | Login</title>
	<!-- bootstrap min css start form here -->
	<link rel="stylesheet" href="{{ asset('../css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="{{ asset('../css/mdb.min.css') }}">
	<link rel="stylesheet" href="{{ asset('../css/adminLogin.css') }}">
</head>
<body>
	<section id="adminSection">
		<div class="row">
			<div class="col-4 m-auto">
				<div class="card">
					<div class="card-header">
						<h3>Admin Login</h3>
					</div>
					<div class="card-body">
						@if(Session::get('success'))
						<div class="alert alert-success alert-dismissible fade show" role="alert">
						   <strong>{{ Session::get('success') }}</strong>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							 <span aria-hidden="true">&times;</span>
						   </button>
						</div>

						@elseif(Session::get('faild'))
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
						   <strong>{{ Session::get('faild') }}</strong>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							 <span aria-hidden="true">&times;</span>
						   </button>
						</div>
					   @endif
						<form action="{{ route('admin.store.login') }}" method="post" id="adminFormid">
							@csrf
							<div class="form-row">
								<div class="col-12 mb-2">
									<label id="labeladminEmail" for="adminEmail">Email:</label>
									<input type="email" name="adminEmail" class="form-control" value="{{ old('adminEmail') }}" placeholder="Eamil">
								</div>
								<div class="col-12 ">
									<label id="labeladminpass" for="adminpass">Password:</label>
									<input type="password" name="adminpass" class="form-control" placeholder="Password">
								</div>
								<div class="col-10 m-auto pt-4">
									<button type="submit" class="btn form-control adminLoginbtn">Login</button>
								</div>
							</div><br>
							<div class="form-row">
								<div class="col-12 text-center">
									<a href="{{ route('admin.getForgetPassword') }}">Forget Password</a>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>

		<!-- JQuery js start form here -->
		<script type="text/javascript" src="{{ asset('../js/jquery.min.js') }}"></script>
		<!-- popper min js start form here -->
		<script type="text/javascript" src="{{ asset('../js/popper.min.js') }}"></script>
		<!-- bootstrap min js start form here -->
		<script type="text/javascript" src="{{ asset('../js/bootstrap.min.js') }}"></script>
     {{-- jquery validation plugin cdn start form here --}}
     <script type="text/javascript" src="{{ asset('../js/jquery.validate.js') }}"></script>
	<script>
		$(document).ready(function() {
			$(".alert").delay(11000).slideUp(200, function() {
                $(this).alert('close');
            });
			adminLoginVali();
		});
		function adminLoginVali(){
            $("#adminFormid").validate({
                rules:{
                    adminEmail:{required:true,email:true},
                    adminpass: {
                    required: true,
                    password: true
                }
                },
                massage:{
                    adminEmail:"Please Your Email",
                    adminpass:{
                        required: "Please Your password"
                }
                }
            });
        }
	</script>
</body>
</html>