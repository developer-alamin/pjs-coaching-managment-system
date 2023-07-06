@extends('backend.app')
@section('content')
    <br>
    <div class="card">
        <div class="card-header">
            <h6>This is non verify student's table...please gmail Verify again ...because wrong email was given earlier</h6>
        </div>
        <div class="card-body">
           <table id="nonVerifyDataTable" class="table nonVerifyTable table-bordered table-hover table-striped d-none table-light">
            <thead class="thead-light">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Verify Status</th>
                    <th>Student Id</th>
                    <th>Phone</th>
                    <th>Class</th>
                    <th>Img</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="nonVerifyTbody">
                
            </tbody>
           </table>
        </div>
    </div>

<div class="loading">
    <span class="DisplayLoader"></span>
</div>
<div class="notfundImgDiv d-none">
    <img class="" src="{{asset('img/no_data_found_4x.webp')}}">
</div>

{{-- studeny verify html modal code --}}
<div class="modal fade" id="stuVerifyModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-lg ">
      <div class="modal-content">
        <div class="modal-header">
          <h6>Student Verify Email Collection</h6>
          <div class="nonVerifyDiv">
            <h4></h4>
          </div>
        </div>
        <div class="UpdateShowImg">
          <div class="EditLoaderSpan m-auto"></div>
        </div>
        <form id="nonVerifySubForm">
           @csrf 
           <div class="modal-body p-4 bg-light">
            <div class="form-row">
                <input type="hidden" name="nonVerifyUpId" id="nonVerifyUpId">
                <div class="col-4">
                    <label for="nonVerifyEmail">Email:</label>
                    <input type="email" name="nonVerifyEmail" id="nonVerifyEmail" class="form-control">
                </div>
            </div>
            <br>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
              <button type="submit" id="verifyBtn" class="btn btn-primary">Verify</button>
            </div>
        </form>
        <div class="notfundImgDiv d-none">
          <img class="" src="{{asset('img/no_data_found_4x.webp')}}">
        </div>
      </div>
    </div>
  </div>
{{-- studeny verify html modal code --}}
@endsection
@section('script')
    <script type="text/javascript">
    $(document).ready(function () {
        getNonVerifyData();
        nonverifyStuUpdate();
    });
    function getNonVerifyData(){
    $.ajax({
      type: "GET",
      url: "/admin/getNonVerifyStu",
      success: function (responce) {
        if (responce.status == 200) {
          $('.DisplayLoader').addClass('d-none');
          $('.nonVerifyTable').removeClass('d-none');

          $('#nonVerifyDataTable').DataTable().destroy();
          $('.nonVerifyTbody').empty();

          var jsonNonVerfyData = responce.data;
          $.each(jsonNonVerfyData, function (i) { 
            var id = "<td>"+jsonNonVerfyData[i].id+"</td>"; 
            var name = "<td>"+jsonNonVerfyData[i].student_name+"</td>"; 
            var email = "<td>"+jsonNonVerfyData[i].student_email+"</td>"; 
            var studentId = "<td>"+jsonNonVerfyData[i].student_studentId+"</td>"; 
            var phone = "<td>"+jsonNonVerfyData[i].student_phone+"</td>"; 
            var classs = "<td>"+jsonNonVerfyData[i].student_class+"</td>"; 
            var image = "<td><img src="+jsonNonVerfyData[i].student_img+"></td>"; 
            if (jsonNonVerfyData[i].student_email_verified_at == null) {
              var verifyEmail = "<td><p class='statusdeactive'>Non Verify</p></td>";
            }
            var eye = "<td><i data-id='"+jsonNonVerfyData[i].student_studentId+"' class='material-icons-outlined NonStuVisible'>visibility</i></td>";
            $('<tr>').html(id+name+email+verifyEmail+studentId+phone+classs+image+eye).appendTo('.nonVerifyTbody');
          });
          $('.NonStuVisible').click(function(e){
            var id = $(this).data('id');
            $('#stuVerifyModal').modal('show');
            $('.nonVerifyDiv h4').html(id);
            nonVerifyEmailShow(id);
          });

          $("#nonVerifyDataTable").DataTable();
          $('.datatablees_length').addClass('bs-select');
        }else{
          $('.DisplayLoader').addClass('d-none');
          $(".notfundImgDiv").removeClass('d-none');
        }
      },
      error:function(error){
        $('.DisplayLoader').addClass('d-none');
        $(".notfundImgDiv").removeClass('d-none');
      }
    });
}
function nonVerifyEmailShow(id) { 
  $.ajax({
    type: "GET",
    url: "/admin/nonVerifyEmailShow",
    data: {verifyId:id},
    success: function (responce) {
      if (responce.status == 200) {
       $('.UpdateShowImg').addClass('d-none');
       var nonVerifyJson = responce.data;
       $('#nonVerifyUpId').val(nonVerifyJson.id);
       $('#nonVerifyEmail').val(nonVerifyJson.student_email);
      }else{
        $('.UpdateShowImg').addClass('d-none');
        $('.notfundImgDiv').removeClass('d-none');
      }
    },
    error:function(){
      $('.UpdateShowImg').addClass('d-none');
      $('.notfundImgDiv').removeClass('d-none');
    }
  });
 }
 function nonverifyStuUpdate(){
  $('#nonVerifySubForm').submit(function (e) { 
    e.preventDefault();
    var addloader = "<span class='sppener'></span>";
    $('#verifyBtn').html(addloader);
    var data = new FormData(this);
    $.ajax({
      type: "POST",
      url: "/adminNonVerifyStu",
      data: data,
      cache: false,
      contentType: false,
      processData: false,
      success: function (responce) {
        if(responce == 404){
          $('#verifyBtn').html("Verify");
          toastr.error('This Email Already Exits');
        }else if (responce.status == 200) {
          swal("Updated", "Updated SuucessFully!", "success");
          getNonVerifyData();
          $("#stuVerifyModal").modal('hide');
          $('#verifyBtn').html("Verify");
        }else{
          swal("Sorry", "Updated Faild!", "error");
          getNonVerifyData();
          $("#stuVerifyModal").modal('hide');
          $('#verifyBtn').html("Verify");
        }
      },
      error:function(error){
        swal("Sorry", "Updated Faild!", "error");
        getNonVerifyData();
        $("#stuVerifyModal").modal('hide');
        $('#verifyBtn').html("Verify");
      }
    });
  });
 }
   
    </script>
@endsection