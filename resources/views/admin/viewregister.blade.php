@extends('backend.app')
@section('title','Admin | View Register')
@section('content')
<br>
<div class="viewRegister">
  <div class="card">
    <div class="card-header">
        <h4>PJS Coaching Center All Student Manage</h4>
    </div>
    <div class="card-body">
        <div class="registrationTable d-none">
        <table id="StudentTable" class=" table table-bordered table-hover table-striped">
          <thead class="thead">
            <tr>
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
            </tr>
          </thead>
          <tbody class="registerTbody">
            
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<div class="loading">
  <span class="DisplayLoader"></span>
</div>

 <div class="notfundImgDiv d-none">
   <img class="" src="{{asset('img/no_data_found_4x.webp')}}">
 </div>
@endsection

@section('script')
<script type="text/javascript">
$(document).ready(function () {
  getRegister();

    $("#date").datepicker({
      altField: "#date",
      altFormat: "DD, d MM, yy",
    });
});

 function getRegister() {
      var url = '/getregister';

      axios.get(url)
        .then(function (response) {
          if (response.status == 200) {
            $('.registrationTable').removeClass('d-none');
            $('.DisplayLoader').addClass('d-none');

            $('#StudentTable').DataTable().destroy();
            $('.registerTbody').empty();

            var getData = response.data;
            $.each(getData, function (i) {
              var id = "<td>" + getData[i].id + "</td>";
              var name = "<td>" + getData[i].student_name + "</td>";
              var fname = "<td>" + getData[i].student_fname + "</td>";
              var mname = "<td>" + getData[i].student_mname + "</td>";
              var email = "<td>" + getData[i].student_email + "</td>";
              var studentId = "<td>" + getData[i].student_studentId + "</td>";
              var phone = "<td>" + getData[i].student_phone + "</td>";
              var post = "<td>" + getData[i].student_post + "</td>";
              var category = "<td>" + getData[i].student_category + "</td>";
              var classs = "<td>" + getData[i].student_class + "</td>";
              var taka = "<td>" + getData[i].student_taka + "</td>";
              var img = "<td><img src='"+getData[i].student_img+"' style='width:50px;height:50px;'></td>";
             
              $('<tr>').html(name+fname+mname+email+studentId+phone+post+category+classs+taka+img).appendTo('.registerTbody');

            });

            $('.eyevisible').click(function (e) { 
              e.preventDefault();
              var id = $(this).data('verify');
              $('#stuEmailVerifyUpModal').modal('show');
              $(".stuUpVerifyId").html(id);
            });

            $("#StudentTable").DataTable({
              order : [0,'desc']
            });
            $('.datatablees_length').addClass('bs-select');

          } else {
            $('.notfundImgDiv').removeClass('d-none');
            $('.DisplayLoader').addClass('d-none');
          }
        })
        .catch(function (error) {
          $('.notfundImgDiv').removeClass('d-none');
          $('.DisplayLoader').addClass('d-none');
        });
    }

</script>
@endsection