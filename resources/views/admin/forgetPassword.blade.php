<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin | Forget Password</title>
    <!-- bootstrap min css start form here -->
	<link rel="stylesheet" href="{{ asset('../css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="{{ asset('../css/mdb.min.css') }}">
    <link rel="stylesheet" href="{{ asset('../css/app.css') }}">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center align-items-center" style="height:100vh">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h2>Admin Forget Password</h2>
                    </div>
                    <div class="card-body">
                        @if (Session('faild'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>{{ Session::get('faild') }}</strong>
                                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                             </div>
                             @elseif(Session('success'))
                             <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ Session::get('success') }}</strong>
                                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                             </div>
                            @endif
                       <form action="{{ route('admin.PostForgetPass') }}" method="POST" id="adminForgetPassForm">
                        @csrf
                        <div class="form-row">
                            <div class="col-8 m-auto">
                                <label for="adminForgetPass">Email:</label>
                                <input type="email" name="adminForgetPass" id="adminForgetPass" class="form-control" placeholder="Type Email">
                            </div>
                            <div class="col-7 m-auto pt-3">
                                <button class="btn btn-primary form-control">Submit</button>
                            </div>
                        </div>
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
        $(document).ready(function () {
            $('.alert').delay(10000).slideUp(200,function(){
                $(this).alert('close');
            });;
            adminForgetPass();
        });
        function adminForgetPass(){
            $('#adminForgetPassForm').validate({
                rules:{
                    adminForgetPass:{required:true,email:true}
                },
                messages:{
                    adminForgetPass:{
                        required:"Please Enter Your Email",
                        email:"This Email Not valid" 
                    }
                }
            });
        }
     </script>
</body>
</html>