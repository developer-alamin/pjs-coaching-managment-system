<!DOCTYPE html>
<html>
<head>
	<title>PJS Student login Page</title>
	<!-- bootstrap min css start form here -->
	<link rel="stylesheet" type="text/css" href="http://127.0.0.1:8000/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	 <!-- MDB -->
     <link rel="stylesheet" href="{{asset('../css/mdb.min.css')}}" rel="stylesheet"/>
    <!-- style css start form here -->
    <link rel="stylesheet" type="text/css" href="{{ asset('../css/app.css') }}">
	<style type="text/css">
		div.row {height: 97vh;justify-content: center;align-items: center;}
		div.card {box-shadow: 1px 4px 19px 5px #265999;}
		div.card-header {display: flex;align-items: center;}
		a{ margin-left: auto;color: blue;} 
		div.card-header h4{color: blue;font-family: auto;} 
		div.form-row {justify-content: center;}
		label{font-weight: bold;}
		body {background-image: url('../img/login.jpg');background-repeat: no-repeat;background-size: cover;
		    background-position: center;}
	</style>
</head>
<body>
	<div class="content">
		<div class="row">
			<div class="col-10 col-sm-8 col-lg-4 col-xl-4 m-auto">
				<div class="card">
					<div class="card-header">
						<h4>Admin And Student Login</h4>
						<a href="{{ route('admin.Login') }}" class="">Admin</a>
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

						<form action="{{ route('student.login.strore') }}" id="studentLogin" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Student Id:</label>
                                <input type="number" name="loginStudentId" value="{{ old('loginStudentId') }}" class="form-control" placeholder="Student id"><br>
                                <label>Password:</label>
                                <input type="password" name="loginStudentPass" class="form-control" placeholder="Password">
                            </div>
                            <div class="form-row">
                                <button type="submit" class="col-6 btn form-control log_stu_btn">Login</button>
                            </div>
                            <br>
                            <h6>Don't have an account ? <a href="" style="color:red;">Register</a></h6>
                        </form>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!-- JQuery js start form here -->
	<script type="text/javascript" src="{{ asset('../js/jquery.min.js') }}"></script>
	<!-- popper min js start form here -->
	<script type="text/javascript" src="{{ asset('../js/popper.min.js') }}"></script>
	<!-- bootstrap min js start form here -->
	<script type="text/javascript" src="{{ asset('../js/bootstrap.min.js') }}"></script>
     {{-- jquery validation plugin cdn start form here --}}
     <script type="text/javascript" src="{{ asset('../js/jquery.validate.js') }}"></script>
	<script type="text/javascript">
       $(document).ready(function() {
            $(".alert").delay(3000).slideUp(200, function() {
                $(this).alert('close');
            });
             StudeLoginVali();
        });
        function StudeLoginVali(){
            $("#studentLogin").validate({
                rules:{
                    loginStudentId:{required:true},
                    loginStudentPass: {
                    required: true,
                    minlength: 5,
                    maxlength: 7,
                }
                },
                massage:{
                    loginStudentId:"Please Your Student Id",
                    loginStudentPass:{
                        required: "Please Your password",
                        minlength: "Your password must be 5 characters",
                    maxlength: "Password No More Then 7 characters" 
                }
                }
            })
        }
	</script>
</body>
</html>