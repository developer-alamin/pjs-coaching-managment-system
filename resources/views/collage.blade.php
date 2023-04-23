@extends('admin.app')
@section('title','Admin | Collage')
@section('content')
<br>
<div class="collageStudentDiv">
  <div class="card">
    <div class="card-header">
      <strong>Collage Student Table</strong>
       <img src="{{asset('img/pjs.jpg')}}" style="float: right">
    </div>
    <div class="card-body">
      <table id="StudentTable" class="d-none table table-hover table-bordered table-striped">
        <thead class="thead">
          <tr>
            <th>Name</th>
            <th>Father Name</th>
            <th>Mother Name</th>
            <th>Email</th>
            <th>Student Id</th>
            <th>Phone</th>
            <th>Post</th>
            <th>Class</th>
            <th>Taka</th>
            <th>Img</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody class="collageTbody">
          
        </tbody>
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

  {{-- ssc edit modal show start form here --}}
<div class="modal fade" id="collageUpdateModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-lg ">
    <div class="modal-content">
      <div class="modal-header">
        <h6>PJS Coahing Center Collage Student Data Show</h6>
        <div class="collageEditIdDiv">
          <h4></h4>
        </div>
      </div>
      <div class="UpdateShowImg">
         <div class="EditLoaderSpan m-auto"></div>
         <img src="" class="updatePreview">
      </div> 
      <form id="UpdateForm" class="" enctype="multipart/form-data">
        @csrf
        <div class="modal-body p-4 bg-light">
          <input type="hidden" id="updateId" name="updateId">
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
              <select class="form-select category" name="upcategory" id="upcategory">
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
              <select class="form-select class" name="upclass" id="upclass">
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
              <select class="form-select taka" name="uptaka" id="uptaka">
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
        <div class="notfundImgDiv d-none">
          <img class="" src="{{asset('img/no_data_found_4x.webp')}}">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
          <button type="submit" id="updateStudent" class="btn btn-primary">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>
{{-- ssc edit modal show end form here --}}
@endsection
@section('script')
<script type="text/javascript">
	$(document).ready(function() {
		 getCollage();
     collageUpdate();
	});

	function getCollage() {
		var url = "/getCollage";
		axios.get(url)
        .then(function (response) {
          if (response.status == 200) {
            $('#StudentTable').removeClass('d-none');
            $('.DisplayLoader').addClass('d-none');

            $('#StudentTable').DataTable().destroy();
            $('.collageTbody').empty();

            var getData = response.data;
            $.each(getData, function (i) {
             var id = "<td>" + getData[i].id + "</td>";
            var name = "<td>" + getData[i].name + "</td>";
            var fname = "<td>" + getData[i].fname + "</td>";
            var mname = "<td>" + getData[i].mname + "</td>";
            var studentId = "<td>" + getData[i].studentId + "</td>";
            var phone = "<td>" + getData[i].phone + "</td>";
            var post = "<td>" + getData[i].post + "</td>";
            var category = "<td>" + getData[i].category + "</td>";
            var classs = "<td>" + getData[i].class + "</td>";
            var taka = "<td>" + getData[i].taka + "</td>";
            var img = "<td><img src='"+getData[i].img+"' style='width:50px;height:50px;'></td>";
            var date = "<td>" + getData[i].date + "</td>";
            var edit = "<td class='editTd'><i class='editButton fa fa-edit' data-edit='" + getData[i].id + "'></i></td>";
            var deleted = "<td class='deleteTd'><i class='deleteButton fa fa-trash' data-delete='" + getData[i].id + "'></i></td>";
              $('<tr>').html(name+fname+mname+studentId+phone+post+category+classs+taka+img+edit+deleted).appendTo('.collageTbody');

            });

            $(".editButton").click(function() {
                var id = $(this).data('edit');
                $("#collageUpdateModal").modal('show');
                $(".collageEditIdDiv h4").html(id);
                collageEditShow(id);
            });

            $('.deleteButton').click(function() {
                var deleteId = $(this).data('delete');
                collageDelete(deleteId);
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
function collageEditShow(id) {
   var data = {id:id}
  var url = "/collageEditShow";
  axios.post(url, data)
  .then(function(response) {
    if (response.status == 200) {
      $('.EditLoaderSpan').addClass('d-none');
        var jsonSixShowData = response.data;
        $("#updateId").val(jsonSixShowData[0].id);
        $("#preImg").val(jsonSixShowData[0].img);
        $('#upname').val(jsonSixShowData[0].name);
        $('#upfname').val(jsonSixShowData[0].fname);
        $('#upmname').val(jsonSixShowData[0].mname);
        $('#upemail').val(jsonSixShowData[0].email);
        $('#upstudentid').val(jsonSixShowData[0].studentId);
        $('#upphone').val(jsonSixShowData[0].phone);
        $('#uppost').val(jsonSixShowData[0].post);
        $('#upcategory').val(jsonSixShowData[0].category);
        $('#upclass').val(jsonSixShowData[0].class);
        $('#uptaka').val(jsonSixShowData[0].taka);
        $('#upvillage').val(jsonSixShowData[0].village);
        $('.updatePreview').attr('src', jsonSixShowData[0].img);
      } else {
        $('.EditLoaderSpan').addClass('d-none');
        $('.form-row').addClass('d-none');

        $('.notfundImgDiv').removeClass('d-none');
      }
    })
    .catch(function(error) {
        $('.EditLoaderSpan').addClass('d-none');
        $('.notfundImgDiv').removeClass('d-none');
    });
  }

  function collageUpdate() {
    $('#UpdateForm').submit(function(e) {
        e.preventDefault();
        var data = new FormData(this);

        var addloader = "<span class='sppener'></span>";
        $('#updateStudent').html(addloader);

        $.ajax({
            url: '/collageUpdate',
            method: 'post',
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            success: function(response) {
              swal("Updated", "Updated SuucessFully!", "success");
               getCollage();
               $("#collageUpdateModal").modal('hide');
              $('#updateStudent').html('Update');
            },
            error: function(error) {
              swal("Faild", "Your Data Updated Faild");
               getCollage();
              $("#collageUpdateModal").modal('hide');
              $('#updateStudent').html('Update');
            }
        });
    });
}


function collageDelete(deleteId) {
    var data = {id: deleteId}

    var url = "/collageDelete";

    swal({
      title: "Are you sure?",
      text: "Are You Want To Collage Student "+deleteId+" Number Data Deleted!",
      icon: "warning",
      buttons: true,
      dangerMode: true
    })
    .then((willDelete) => {
        if (willDelete) {
            axios.post(url, data)
            .then(function(response) {
                swal("Success", "Your Data Deleted Success!", "success");
                getCollage();
            })
            .catch(function(error) {
                swal("Sorry...", "Your Data Not Deleted!", "error");
                getCollage();
            })
        }
    });

}

</script>
@endsection