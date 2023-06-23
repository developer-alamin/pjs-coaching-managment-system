@extends('backend.app')
@section('title','Admin | Five')
@section('content')
<br>
<div class="fiveStudentdata">
  <div class="card">
    <div class="card-header">
      <strong>PJS Five Student Data</strong>
      <img src="{{asset('img/pjs.jpg')}}" style="float: right">
    </div>
    <div class="card-body">
      <table id="StudentTable" class="table d-none table-hover table-bordered table-striped">
        <thead class="thead">
          <tr>
            <th>Name</th>
            <th>Father Name</th>
            <th>Mother Name</th>
            <th>Student Id</th>
            <th>Phone</th>
            <th>Post</th>
            <th>Category</th>
            <th>Class</th>
            <th>Taka</th>
            <th>Img</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody class="fiveTbody"></tbody>
      </table>
    </div>
  </div>
</div>
<div class="loading">
  <span class="DisplayLoader"></span>
</div>
<div class="notfundImgDiv d-none">
  <img class="" src="{{asset('img/no_data_found_4x.webp')}}">
</div>
<!-- Five data Edit modal -->
<div class="modal fade" id="fiveUpdateModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-lg ">
    <div class="modal-content">
      <div class="modal-header">
        <h6>PJS Coahing Center Five Student Data Show</h6>
        <div class="fiveEditIdDiv">
          <h4></h4>
        </div>
      </div>
      <div class="UpdateShowImg">
        <div class="EditLoaderSpan m-auto"></div>
        <img src="" class="updatePreview">
      </div>
      <form id="fiveUpdateForm" enctype="multipart/form-data"> @csrf <div class="modal-body p-4 bg-light">
          <input type="number" id="updateId" name="updateId" class="form-control col-4 d-none">
          <input type="hidden" name="preImg" id="preImg">
          <div class="form-row">
            <div class="col-lg-4">
              <label for="upimg">Image:</label>
              <input type="file" id="upimg" accept="image/*" name="upimg" class="form-control">
            </div>
            <div class="col-lg-4">
              <label for="upname">Name:</label>
              <input type="text" id="upname" name="upname" class="form-control">
            </div>
            <div class="col-4">
              <label for="upfname">Father's Name:</label>
              <input type="text" name="upfname" id="upfname" class="form-control">
            </div>
          </div>
          <br>
          <div class="form-row">
            <div class="col-4">
              <label for="upmname">Mother's Name:</label>
              <input type="text" name="upmname" id="upmname" class="form-control">
            </div>
            <div class="col-4">
              <label for="upemail">Email</label>
              <input type="email" name="upemail" id="upemail" class="form-control">
            </div>
            <div class="col-4">
              <label for="studentid">Student Id:</label>
              <input type="number" name="upstudentid" id="upstudentid" class="form-control">
            </div>
          </div>
          <br>
          <div class="form-row">
            <div class="col-4">
              <label for="upphone">Phone:</label>
              <input type="number" name="upphone" id="upphone" class="form-control">
            </div>
            <div class="col-4">
              <label for="uppost">Post(Hobby):</label>
              <input type="text" name="uppost" id="uppost" class="form-control">
            </div>
            <div class="col-4">
              <label for="upcategory">Category:</label>
              <select class="form-control category" name="upcategory" id="upcategory">
                <option>Select Class</option>
                <option>Arts</option>
                <option>Science</option>
                <option>Madrasah </option>
              </select>
            </div>
          </div>
          <br>
          <div class="form-row">
            <div class="col-4">
              <label for="upclass">Class:</label>
              <select class="form-control class" name="upclass" id="upclass">
                <option>Select Class</option>
                <option>Five</option>
                <option>Six</option>
                <option>Seven</option>
                <option>Eight</option>
                <option>Nine</option>
                <option>Ten</option>
                <option>SSC</option>
                <option>Collage</option>
                <option>HSC</option>
              </select>
            </div>
            <div class="col-4">
              <label for="uptaka">Taka:</label>
              <select class="form-control taka" name="uptaka" id="uptaka">
                <option>Select Taka</option>
                <option>100</option>
                <option>200</option>
                <option>300</option>
                <option>400</option>
                <option>500</option>
              </select>
            </div>
            <div class="col-4">
              <label for="upvillage">Village:</label>
              <input type="text" name="upvillage" id="upvillage" class="form-control">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
            <button type="submit" id="add_employee_btn" class="btn btn-primary">Submit</button>
          </div>
      </form>
      <div class="notfundImgDiv d-none">
        <img class="" src="{{asset('img/no_data_found_4x.webp')}}">
      </div>
    </div>
  </div>
</div>
<!-- Five data Edit modal -->
@endsection

@section('script')
<script type="text/javascript">
  $(document).ready(()=>{
    $('#upimg').change(function(){
      const file = this.files[0];
      if (file){
        let reader = new FileReader();
        reader.onload = function(event){
          console.log(event.target.result);
          $('.updatePreview').attr('src',event.target.result);
        }
        reader.readAsDataURL(file);
      }
    });
  });



	$(document).ready(function() {
		 getFive();
     fiveUpdate();
	});

  function getFive() {
  var url = "/getFive";
  axios.get(url)
    .then(function(response) {
      if (response.status == 200) {
        $('#StudentTable').removeClass('d-none');
        $('.DisplayLoader').addClass('d-none');

        $('#StudentTable').DataTable().destroy();
        $('.fiveTbody').empty();

        var getData = response.data;
        $.each(getData, function(i) {
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
          var img = "<td><img src='" + getData[i].student_img + "' style='width:50px;height:50px;'></td>";
          var date = "<td>" + getData[i].student_date + "</td>";
          var edit = "<td class='editTd'><i class='editButton fa fa-edit' data-edit='" + getData[i].id + "'></i></td>";
          var deleted = "<td class='deleteTd'><i class='deleteButton fa fa-trash' data-delete='" + getData[i].id + "'></i></td>";
          $('<tr>').html(name + fname + mname + studentId + phone + post + category + classs + taka + img + edit + deleted).appendTo('.fiveTbody');

        });

        $(".editButton").click(function() {
          var id = $(this).data('edit');
          FiveEditShow(id);
          $("#fiveUpdateModal").modal('show');
          $('.fiveEditIdDiv h4').html(id);

        });

        $('.deleteButton').click(function() {
          var delid = $(this).data('delete');
          fiveDelete(delid);
        });


        $("#StudentTable").DataTable();
        $('.datatablees_length').addClass('bs-select');

      } else {
        $('.notfundImgDiv').removeClass('d-none');
        $('.DisplayLoader').addClass('d-none');
      }
    })
    .catch(function(error) {
      $('.notfundImgDiv').removeClass('d-none');
      $('.DisplayLoader').addClass('d-none');
    });
}

//five data edit show function start form here

function FiveEditShow(id) {
  var url = "/fiveEditShow";
  var data = {id: id};

  axios.post(url, data)
    .then(function(response) {
      if (response.status == 200) {
        $('.EditLoaderSpan').addClass('d-none');
        var jsonShowData = response.data;

        $("#updateId").val(jsonShowData[0].id)
        $('#upname').val(jsonShowData[0].student_name);
        $('#upfname').val(jsonShowData[0].student_fname);
        $('#upmname').val(jsonShowData[0].student_mname);
        $('#upemail').val(jsonShowData[0].student_email);
        $('#upstudentid').val(jsonShowData[0].student_studentId);
        $('#upphone').val(jsonShowData[0].student_phone);
        $('#uppost').val(jsonShowData[0].student_post);
        $('#upcategory').val(jsonShowData[0].student_category);
        $('#uptaka').val(jsonShowData[0].student_taka);
        $('#upclass').val(jsonShowData[0].student_class);
        $('#upvillage').val(jsonShowData[0].student_village);

        $('.UpdateShowImg img').attr('src', jsonShowData[0].student_img);
        $('#preImg').val(jsonShowData[0].student_img);

      } else {
        $('.notfundImgDiv').removeClass('d-none');
        $('.EditLoaderSpan').addClass('d-none');
      }

    })
    .catch(function(error) {
      $('.notfundImgDiv').removeClass('d-none');
      $('.EditLoaderSpan').addClass('d-none');
    })

}
//five data edit show function end form here

//five data update jquery function satrt form here

function fiveUpdate() {
  $("#fiveUpdateForm").submit(function(e) {
    e.preventDefault();
    const fd = new FormData(this);

    var addloader = "<span class='sppener'></span>";
    $('#add_employee_btn').html(addloader);


    $.ajax({
      url: '/fiveUpdate',
      method: 'post',
      data: fd,
      cache: false,
      contentType: false,
      processData: false,
      success: function(response) {
        swal("Updated", "Updated SuucessFully!", "success");
        getFive();
        $("#fiveUpdateModal").modal('hide');
        $('#add_employee_btn').html('Update');
      },
      error: function(error) {
        swal("Faild", "Your Data Updated Faild");
        getFive();
        $("#fiveUpdateModal").modal('hide');
        $('#add_employee_btn').html('Update');
      }
    });
  });
}

//five data update jquery function end form here
//five data delete jquery function start form here

function fiveDelete(id) {
  var data = {
    id: id
  };
  var url = "/fiveDelete";

  swal({
      title: "Are you sure?",
      text: "Are You Want To Five Student Data Deleted!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        axios.post(url, data)
          .then(function(response) {
            swal("Success", "Your Data Deleted Success!", "success");
            getFive();
          })
          .catch(function(error) {
             swal("Sorry...", "Your Data Not Deleted!", "error");
          })
      }
    });

}

//five data delete jquery function end form here



</script>
@endsection