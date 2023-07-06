<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hello {{ $adminData->admin_name; }}</title>
    <link rel="icon" href="{{ $adminData->admin_img; }}">
     <!-- bootstrap min css start form here -->
	<link rel="stylesheet" type="text/css" href="http://127.0.0.1:8000/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	 <!-- MDB -->
     <link rel="stylesheet" href="{{asset('../css/mdb.min.css')}}" rel="stylesheet"/>
    <!-- style css start form here -->
    <link rel="stylesheet" type="text/css" href="{{ asset('../css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('../css/admin.css') }}">
</head>
<body>
   
    <div class="container">
        <div class="row" style="height:100vh">
            <div class="col-6 m-auto">
                <div class="card">
                   <div class="card-header d-flex justify-content-center align-items-center">
                    <strong>Hello..  {{  $adminData->admin_name; }} ..You Are Allowed to Reset The Password</strong>
                    <img src="{{ $adminData->admin_img; }}" style="width:100px;height:100px">
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
                        <form action="{{ route('admin.PostRessetPass',$adminResetCode) }}" method="post" id="adminResetPassFormId">
                            @csrf
                            <div class="form-group">
                               <div class="col-9 m-auto">
                                <label for="adminResetEmail">Email:</label>
                                <input type="email" name="adminResetEmail" id="adminResetEmail" class="form-control" placeholder="You Type Email">
                               </div>
                               <div class="col-9 m-auto">
                                <label for="adminResetPass">Password:</label>
                                <input type="password" name="adminResetPass" id="adminResetPass" class="form-control" placeholder="New Password">
                               </div>
                               <div class="col-9 m-auto">
                                <label for="admiResetConPass">Confirm Password:</label> 
                                <input type="password" name="admiResetConPass" id="admiResetConPass" class="form-control" placeholder="Confirm Password">
                               </div>
                            </div>
                            <div class="form-row">
                                <div class="col-6 m-auto">
                                    <button class="btn btn-primary form-control">Reset</button>
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
            adminResetPassFunc();
        });

        function adminResetPassFunc(){
            $('#adminResetPassFormId').validate({
                rules:{
                    adminResetEmail:{required:true,email:true},
                    adminResetPass:{required:true,minlength: 5,maxlength: 7},
                    admiResetConPass:{required:true,minlength: 5,maxlength: 7, equalTo: "#adminResetPass"}
                },
                messages:{
                    adminResetEmail:{
                        required:"Enter Your Email",
                        email:"This Email Not Valid "
                    },
                    adminResetPass: {
                        required: "Please Your password",
                        minlength: "Your password must be 5 characters",
                        maxlength: "Password No More Then 7 characters" 
                    },
                    admiResetConPass: {
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