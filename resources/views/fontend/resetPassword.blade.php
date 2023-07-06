<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hello...{{ $studentData->student_name; }}</title>
    <link rel="icon" href="{{ $studentData->student_img; }}">
    <!-- bootstrap min css start form here -->
	<link rel="stylesheet" type="text/css" href="http://127.0.0.1:8000/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	 <!-- MDB -->
     <link rel="stylesheet" href="{{asset('../css/mdb.min.css')}}" rel="stylesheet"/>
    <!-- style css start form here -->
    <link rel="stylesheet" type="text/css" href="{{ asset('../css/app.css') }}">
</head>
<body>
    <div class="container">
        <div class="row" style="height:100vh">
            <div class="col-6 m-auto">
                <div class="card">
                    <div class="card">
                        <div class="card-header d-flex justify-content-center align-items-center">
                            <strong>Hello,,,{{ $studentData->student_name; }} You Are Allowed to Reset The Password</strong>
                            <img src="{{ $studentData->student_img; }}" alt="" style="width:100px;height:100px">
                        </div>
                        <div class="card-body">
                            @if (Session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>{{ Session::get('error') }}</strong>
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
                           <form action="{{ Route('student.PostResetPass',$stuResetCode) }}" method="POST" id="stuResetPassForm">
                            @csrf
                            <div class="form-group">
                                <div class="col-8 m-auto">
                                    <label for="stuResetEmail">Email:</label>
                                    <input type="email" name="stuResetEmail" id="stuResetEmail" class="form-control" placeholder="Your Email Type..">
                                </div>
                                <div class="col-8 m-auto">
                                    <label for="stuResetPass">Password:</label>
                                    <input type="password" name="stuResetPass" id="stuResetPass" class="form-control" placeholder="Your Password Type..">
                                </div>
                                <div class="col-8 m-auto">
                                    <label for="stuResetConPass">Confirm Password:</label>
                                    <input type="password" name="stuResetConPass" id="stuResetConPass" class="form-control" placeholder="Confirm Password Type..">
                                </div><br>
                                <div class="col-8 m-auto">
                                    <button class="form-control btn btn-primary">Reset</button>
                                </div>
                            </div>
                           </form>
                        </div>
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
            StuResetPassvali();
        });
        function StuResetPassvali(){
            $("#stuResetPassForm").validate({
            rules: {
                stuResetEmail:{required: true,email: true},
                stuResetPass: {
                    required: true,
                    minlength: 5,
                    maxlength: 7,
                },
                stuResetConPass: {
                    required: true,
                    minlength: 5,
                    maxlength: 7,
                    equalTo: "#stuResetPass"
                }
            },
            messages: {
                stuResetEmail: {
                    required: "Please enter a Email",
                    email: "This Email Not Valid"
                },
                stuResetPass: {
                    required: "Please Your password",
                    minlength: "Your password must be 5 characters",
                   maxlength: "Password No More Then 7 characters" 
                },
                stuResetConPass: {
                    required: "Please Confirm Password",
                    minlength: "Your password must be 5 characters",
                    maxlength: "Password No More Then 7 characters",
                    equalTo: "Please enter the same password as above"
                }
            }
        });
        }
     </script>
</body>
</html>