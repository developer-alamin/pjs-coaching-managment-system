@extends('admin.app')
@section('title','Admin | Register')
@section('content')
<div class="registerPageDiv">
	<div class="registerTitle">
		<h4>PJS Coaching Center All Student Manage</h4>
		<button class="registration btn" id="register"><i class="fas fa-users"></i>Registration</button>
	</div>
	<div class="registrationTable d-none">
		<table id="StudentTable" class=" table table-bordered table-hover table-striped">
			<thead class="thead">
				<tr>
          <th>Id</th>
					<th>Name</th>
					<th>Father Name</th>
					<th>Mother Name</th>
					<th>Email</th>
					<th>Student Id</th>
					<th>Phone</th>
					<th>Post</th>
          <th>Category</th>
					<th>Class</th>
					<th>Taka</th>
					<th>Img</th>
					<th>Date</th>
				</tr>
			</thead>
			<tbody class="registerTbody">
				
			</tbody>
		</table>
	</div>
   <div class="loaderDiv mt-5">
      <span class="loader m-auto"></span>
   </div>
  
</div>
 <div class="notfundImgDiv d-none">
   <img class="" src="{{asset('img/no_data_found_4x.webp')}}">
 </div>
<br><br>
<?php
  $class = ["Five","Six","Seven","Eight","Nine","Ten","SSC","Collage","HSC"];
  $Taka = ['100','200','300','400','500'];
  
?>
 {{-- add new employee modal start --}}
<div class="modal fade" id="addEmployeeModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-lg ">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modelregisterTitle">PJS Coaching Center Student Registration</h4>
        <img src="{{asset('img/pjs.jpg')}}" class="previewImg" style="width: 75px;height: 75px;">
      </div>
      <form id="addStudent" enctype="multipart/form-data">
        @csrf
        <div class="modal-body p-4 bg-light">
          <div class="form-row">
            <div class="col-lg-4">
              <label for="img">Image:</label>
              <input type="file" id="img" accept="image/*" name="img" class="form-control" placeholder="First Name" required>
            </div>
            <div class="col-lg-4">
              <label for="name">Name:</label>
              <input type="text" id="name" name="name" class="form-control" placeholder="First Name">
            </div>
            <div class="col-4">
                <label for="fname">Father's Name:</label>
                <input type="text" name="fname" id="fname" class="form-control" placeholder="Enter Your Father Name">
            </div>
        </div>
        <br>
        <div class="form-row">
          <div class="col-4">
              <label for="mname">Mother's Name:</label>
              <input type="text" name="mname" id="mname" class="form-control" placeholder="Enter Your Mother Name">
            </div>
            <div class="col-4">
              <label for="email">Email</label>
              <input type="email" name="email" id="email" class="form-control" placeholder="Enter Your Email">
            </div>
             <div class="col-4">
              <label for="studentid">Student Id:</label>
              <input type="number" name="studentid" id="studentid" class="form-control" placeholder="Enter Your Student Id">
            </div>
        </div>
        <br>
        <div class="form-row">
            <div class="col-4">
              <label for="phone">Phone:</label>
              <input type="number" name="phone" id="phone" class="form-control" placeholder="Enter Your phone">
            </div>
             <div class="col-4">
              <label for="post">Post(Hobby):</label>
              <input type="text" name="post" id="post" class="form-control" placeholder="Enter Your Post">
            </div>
            <div class="col-4">
              <label for="category">Category:</label>
              <select class="form-select category" name="category" id="category" required>
                <option value="">Select Class</option>
                <option value="Arts">Arts</option>
                <option value="Science">Science</option>
                <option value="Madrasah">Madrasah</option>
              </select>
            </div>
        </div>
       <br>
        <div class="form-row">
          <div class="col-4">
              <label for="class">Class:</label>
              <select class="form-select class" name="class" id="class" required>
                <option value="">Select Class</option>
                <option value="Five">Five</option>
                <option value="Six">Six</option>
                <option value="Seven">Seven</option>
                <option value="Eight">Eight</option>
                <option value="Nine">Nine</option>
                <option value="Ten">Ten</option>
                <option value="SSC">SSC</option>
                <option value="Collage">Collage</option>
                <option value="HSC">HSC</option>
              </select>
            </div>
            <div class="col-4">
              <label for="taka">Taka:</label>
              <select class="form-select taka" name="taka" id="taka" required>
                <option value="">Select Taka</option>
                <option value="100">100</option>
                <option value="200">200</option>
                <option value="300">300</option>
                <option value="400">400</option>
                <option value="500">500</option>
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
              <label for="pass">Password:</label>
              <input type="password" name="pass" id="pass" class="form-control " placeholder="Enter Your Password">
            </div>
            <div class="col-4">
              <label for="conpass">Confirm Password</label>
              <input type="password" name="conpass" id="conpass" class="form-control" placeholder="Enter Your Confirm Password">
            </div>
             <div class="col-4">
              <label for="date">Date&Time:</label>
              <input type="text" name="date" id="date" class="form-control" placeholder="Date&Time Name">
            </div>
          </div>
          <br>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
          <button type="submit" id="add_employee_btn" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>
{{-- add new employee modal end --}}


@endsection

@section('script')
<script type="text/javascript">
$(document).ready(function () {
  getRegister();
    $('#register').click(function () {
      $('#addEmployeeModal').modal('show');
    })

    $("#date").datepicker({
      altField: "#date",
      altFormat: "DD, d MM, yy",
    });


    $('#addStudent').submit(function (event) {
      event.preventDefault();

      var name = $("#name").val();
      var fname = $("#fname").val();
      var mname = $("#mname").val();
      var email = $("#email").val();
      var studentid = $("#studentid").val();
      var phone = $("#phone").val();
      var post = $("#post").val();
      var clases = $("#class").val();
      var taka = $("#taka").val();
      var village = $("#village").val();
      var pass = $("#pass").val();
      var conpass = $("#conpass").val();
      var date = $("#date").val();
      var stulen = studentid.length;
      var eqalTaka = ('100', '200', '300', '400', '500');

      if (name == false) {
        toastr.error('Pleas Your Name');
      } else if (fname == false) {
        toastr.error('Please Your Father Name');
      } else if (mname == false) {
        toastr.error('Please Your Mother Name');
      } else if (email == false) {
        toastr.error('Please Your Email');
      } else if (studentid == false) {
        toastr.error('Please Your Student Id');
      } else if (stulen !== 6) {
        toastr.error('Please Student Id Limit 6');
      } else if (phone == false) {
        toastr.error('Please Your phone Number');
      } else if (post == false) {
        toastr.error('Please Your Post Name');
      } else if (village == false) {
        toastr.error('Please Village Name');
      } else if (pass == false) {
        toastr.error('Please Password');
      } else if (conpass == false) {
        toastr.error('Please Confirm Password');
      } else if ((pass == conpass) == false) {
        toastr.error('Does Not Macth Password');
      } else if (date == false) {
        toastr.error('Please Your Date');
      } else {

        var addloader = "<span class='sppener'></span>";
        $('#add_employee_btn').html(addloader);

        var data = new FormData(this);

        $.ajax({
          url: "/register",
          method: 'POST',
          data: data,
          cache: false,
          processData: false,
          contentType: false,
          success: function (res) {
            swal("Success!", "PJS Student Add Success", "success");
            getRegister();
            $('#addEmployeeModal').modal('hide');
            $('#add_employee_btn').html('Submit');
             $('input').val("");
          },
          error: function (error) {
            alert('error');
          }
        })
      }

    });


});

 function getRegister() {
      var url = '/getregister';

      axios.get(url)
        .then(function (response) {
          if (response.status == 200) {
            $('.registrationTable').removeClass('d-none');
            $('.loader').addClass('d-none');

            $('#StudentTable').DataTable().destroy();
            $('.registerTbody').empty();

            var getData = response.data;
            $.each(getData, function (i) {
              var id = "<td>" + getData[i].id + "</td>";
              var name = "<td>" + getData[i].name + "</td>";
              var fname = "<td>" + getData[i].fname + "</td>";
              var mname = "<td>" + getData[i].mname + "</td>";
              var email = "<td>" + getData[i].email + "</td>";
              var studentId = "<td>" + getData[i].studentId + "</td>";
              var phone = "<td>" + getData[i].phone + "</td>";
              var post = "<td>" + getData[i].post + "</td>";
              var category = "<td>" + getData[i].category + "</td>";
              var classs = "<td>" + getData[i].class + "</td>";
              var taka = "<td>" + getData[i].taka + "</td>";
              var img = "<td><img src='"+getData[i].img+"' style='width:50px;height:50px;'></td>";
              var date = "<td>" + getData[i].date + "</td>";
              
              $('<tr>').html(id+name+fname+mname+email+studentId+phone+post+category+classs+taka+img+date).appendTo('.registerTbody');

            });

            $("#StudentTable").DataTable({
              order : [0,'desc']
            });
            $('.datatablees_length').addClass('bs-select');

          } else {
            $('.notfundImgDiv').removeClass('d-none');
            $('.loader').addClass('d-none');
          }
        })
        .catch(function (error) {
          $('.notfundImgDiv').removeClass('d-none');
          $('.loader').addClass('d-none');
        });
    }

</script>
@endsection