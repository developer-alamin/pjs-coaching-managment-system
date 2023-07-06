@extends('backend.app')
@section('title','Admin | Add Register')
@section('content')
<br>
	<div class="addRegisterDiv">
		<div class="card">
			<div class="card-header">
				<h5 style="color: green">Pjs Coaching Center Registration Form....</h5>
				<img class="registerImg" src="{{ asset('img/pjs.jpg') }}" id="registerImg">
			</div>
			<div class="card-body">
				 @if(Session::get('success'))
			       <div class="alert alert-success alert-dismissible fade show" role="alert">
			         <strong>{{ Session::get('success') }}</strong>
			          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			           <span aria-hidden="true">&times;</span>
			         </button>
			      </div>
			    @endif
			   @if(Session::get('error'))
			       <div class="alert alert-danger alert-dismissible fade show" role="alert">
			         <strong>{{ Session::get('error') }}</strong>
			          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			           <span aria-hidden="true">&times;</span>
			         </button>
			      </div>
			    @endif


			  <form id="storeRegister" method="post" action="{{ route('store.register') }}" enctype="multipart/form-data">
		        @csrf
		        <div class="modal-body p-4 bg-light">
		          <div class="form-row">
		            <div class="col-lg-4">
		              <label for="img">Image:</label>
		              <input type="file" id="image" accept="image/*" name="image" class="form-control">
		              <font>{{ ($errors->has('image'))?($errors->first('image')):'' }}</font>
		            </div>
		            <div class="col-lg-4">
		              <label for="name">Name:</label>
		              <input type="text" id="name" name="name" class="form-control" placeholder="Enter Student Name">
		            </div>
		            <div class="col-4">
		                <label for="fname">Father's Name:</label>
		                <input type="text" name="fname" id="fname" class="form-control" placeholder="Student Father Name">
		            </div>
		        </div>
		        <br>
		        <div class="form-row">
		          <div class="col-4">
		              <label for="mname">Mother's Name:</label>
		              <input type="text" name="mname" id="mname" class="form-control" placeholder="Student Mother Name">
		            </div>
		            <div class="col-4">
		              <label for="email">Email</label>
		              <input type="email" name="student_email" id="student_email" class="form-control" placeholder="Student Email Address">
		              <font>{{ ($errors->has('student_email'))?($errors->first('student_email')):'' }}</font>
		            </div>
		             <div class="col-4">
		              <label for="studentid">Student Id:</label>
		              <input type="number" name="student_studentId" id="studentid" class="form-control" placeholder="Pjs Student Id">
		              <font>{{ ($errors->has('student_studentId'))?($errors->first('student_studentId')):'' }}</font>
		            </div>
		        </div>
		        <br>
		        <div class="form-row">
		            <div class="col-4">
		              <label for="phone">Phone:</label>
		              <input type="number" name="student_phone" id="phone" class="form-control" placeholder="Student phone Number">
		              <font>{{ ($errors->has('student_phone'))?($errors->first('student_phone')):'' }}</font>
		            </div>
		             <div class="col-4">
		              <label for="post">Post(Hobby):</label>
		              <input type="text" name="post" id="post" class="form-control" placeholder="Your Post Name">
		            </div>
		            <div class="col-4">
		              <label for="category">Category:</label>
		              <select class="form-select category" name="category" id="category">
		                <option value="">Select Class</option>
		                <option value="Arts">Arts</option>
		              </select>
		            </div>
		        </div>
		       <br>
		        <div class="form-row">
		          <div class="col-4">
		              <label for="class">Class:</label>
		              <select class="form-select class" name="class" id="class">
		                <option value="">Select Class</option>
		                <option value="Five">Five</option>
		              </select>
		            </div>
		            <div class="col-4">
		              <label for="taka">Taka:</label>
		              <select class="form-select taka" name="taka" id="taka">
		                <option value="">Select Taka</option>
		                <option value="100">100</option>
		              </select>
		            </div>
		             <div class="col-4">
		              <label for="village">Village:</label>
		              <input type="text" name="village" id="village" class="form-control" placeholder="Enter Your Village">
		            </div>
		        </div>
		        <br>
		        <div class="form-row">
		          <div class="col-4">
		              <label for="password">Password:</label>
		              <input type="password" name="password" id="password" class="form-control " placeholder="Student Your Password">
		            </div>
		            <div class="col-4">
		              <label for="con_pass">Confirm Password</label>
		              <input type="password" name="con_pass" id="con_pass" class="form-control" placeholder="Your Confirm Password">
		            </div>
		          </div>
		          <br>
		          <div class="form-row">
		          	<button class="btn btn-success form-control col-5 m-auto"><i class='fab fa-telegram-plane'></i> Submit</button>
		          </div>
		      </form>
			</div>
		</div>
	</div>
@endsection()

@section('script')
<script type="text/javascript">
	$(document).ready(()=>{
	  $('#image').change(function(){
	    const file = this.files[0];
	    if (file){
	      let reader = new FileReader();
	      reader.onload = function(event){
	        console.log(event.target.result);
	        $('#registerImg').attr('src',event.target.result);
	      }
	      reader.readAsDataURL(file);
	    }
	  });
	});



	$(document).ready(function() {

		$(".alert").delay(12000).slideUp(200, function() {
	        $(this).alert('close');
	    });
		$( "#date" ).datepicker({
	      altField: "#date",
	      altFormat: "DD, d MM, yy"
	    });
		student_Register();
	})
	function student_Register() {
		$("#storeRegister").validate({
            rules: {
               image:{required:true},
                name:{required:true},
	            fname:{required:true},
	            mname:{required:true},
                student_email:{required: true,email: true},
                student_studentId:{
                	required:true,
                	minlength: 5,
                	maxlength: 8
                	
                },
                student_phone:{
                	required:true,
                	minlength: 11,
                	maxlength: 11
                	
                },
                post:{required:true},
                category:{required:true},
                class:{required:true},
                taka:{required:true},
                village:{required:true},
                password: {
                    required: true,
                    minlength: 5,
                    maxlength: 7
                },
                con_pass: {
                    required: true,
                    minlength: 5,
                    maxlength: 7,
                    equalTo: "#password"
                }
            },
            messages: {
            	image:"Please Student Photo",
                name: "Please Student name",
                fname: "Student Father Name",
                student_email: {
                    required: "Please enter a Email",
                    email: "This Email Not Valid"
                },
                student_studentId:{
                	 required: "Please Student Id",
                	 minlength: "Please At Least 5 characters",
                	 maxlength:  "Please No More Then 8 characters"
                },
                student_phone:{
                	 required: "Please Student Phone Number",
                	 minlength: "Please At Least 11 characters",
                	 maxlength:  "Please No More Then 11 characters"
                },
                post:"Please Your Post Name",
                category: "Please Select Your Category",
                class: "Please Select Your Class",
                taka: "Please Select Your Taka",
                village: "Please Your Village Name",
                password: {
                    required: "Please Your password",
                    minlength: "Your password must be 5 characters",
                   maxlength: "Password No More Then 7 characters" 
                },
                con_pass: {
                    required: "Please Confirm Password",
                    minlength: "Your password must be 5 characters",
                    maxlength: "Password No More Then 7 characters",
                    equalTo: "Please enter the same password as above"
                }
            }
        });
	}

</script>
@endsection()