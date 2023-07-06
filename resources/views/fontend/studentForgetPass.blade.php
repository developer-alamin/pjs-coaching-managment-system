<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Forget Password Syatem</title>
    <!-- bootstrap min css start form here -->
	<link rel="stylesheet" type="text/css" href="http://127.0.0.1:8000/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	 <!-- MDB -->
     <link rel="stylesheet" href="{{asset('../css/mdb.min.css')}}" rel="stylesheet"/>
     <link rel="stylesheet" type="text/css" href="{{ asset('../css/app.css') }}">
</head>
<body>
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center" style="height: 100vh">
            <div class="col-6 m-auto">
                <div class="card">
                    <div class="card-header">
                        <h4>{{ __('Student Forget Password System..') }}</h4>
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
                        <form method="POST" action="{{ route('student.postforgetPass') }}" id="stuForgetPassForm">
                            @csrf
                            <div class="form-group">
                                <div class="col-8 m-auto pb-3">
                                    <label for="stuForgetEmail">Email:</label>
                                    <input type="email" class="form-control" id="stuForgetEmail" name="stuForgetEmail" placeholder="Your Email Address">
                                </div>
                                <div class="col-7 m-auto">
                                    <button class="btn btn-primary form-control">Submit</button>
                                </div>
                            </div>
                            <h6>have an account <a href="" style="color:red;">Login</a></h6>
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
            $(".alert").delay(10000).slideUp(200, function() {
                $(this).alert('close');
            });
            
            forgetPasvali();
        });
        function forgetPasvali(){
            $("#stuForgetPassForm").validate({
                rules:{
                    stuForgetEmail:{
                        required:true,
                        email:true
                    }
                },
                massage:{
                    stuForgetEmail:{
                        required:"Please Your Email",
                        email: "This Email Not Valid"
                    }
                }
            });  
        }
     </script>
</body>
</html>