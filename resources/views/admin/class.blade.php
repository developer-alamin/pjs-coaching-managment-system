@extends('backend.app')
@section('title','Admin | Class')
@section('stylecss')
<style type="text/css">
	.alert.alert-success.alert-dismissible.fade.show {
	    position: absolute;
	    z-index: 1;
	    min-width: 100%;
	}
	.alert.alert-error.alert-dismissible.fade.show {
	    position: absolute;
	    z-index: 1;
	    min-width: 100%;
	}

</style>
@endsection()
@section('content')<br>
	<div class="storeClassDiv">
		<div class="row">
			<div class="col-6 m-auto">
				<div class="card">
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
					<div class="card-header" id="card-header">
						<h2>Class Managment System</h2>
					</div>
					<div class="card-body">
						<form id="addClass" method="post" action="{{ route('stor.class') }}">
					        @csrf
					        <div class="container">
					            <div class="form-group">
					                <table>
					                	<tr>
					                	<th><label>Class Name:</label></th>
					                	<td>
							                <input type="text" name="class_name" class="class_name form-control"  placeholder="Class Name">
							                <font>{{ ($errors->has('class_name'))?($errors->first('class_name')):'' }}</font>
					                	</td>
					                </tr>
					                <tr style="position: relative;top: 5px;">
					                	<th>
					                		<label>Date&Time:</label>
					                	</th>
					                	<td>
					                		<input type="text" name="class_date" class="class_date form-control" placeholder="Class Date">
						                	<font>{{ ($errors->has('addClass'))?($errors->first('addClass')):'' }}</font>
					                	</td>
					                </tr>
					                </table>
					            </div>
					        </div>
					        <br>
					        <div class="modal-footer">
					          <button type="submit" id="add_Class_Btn" class="btn btn-primary">Submit</button>
					        </div>
					      </form>
					</div>
				</div>
			</div>
		</div><br>
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h4>Class Managment Data</h4>
					</div>
					<div class="card-body">
						<table id="ClassDataTable" class="table table-hover table-bordered table-striped d-none ClassTable">
							<thead>
								<tr>
									<th>Sl No</th>
									<th>Class Name</th>
									<th>Class Date</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody class="Classtbody">	

							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

{{-- animation html code start form here --}}
	<div class="loading">
	  <span class="DisplayLoader"></span>
	</div>
	<div class="notfundImgDiv d-none">
	  <img class="" src="{{asset('img/no_data_found_4x.webp')}}">
	</div>
{{-- animation html code end form here --}}

{{-- class modal html code start form here --}}
<div class="modal fade" id="classUpdateModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-lg ">
    <div class="modal-content">
      <div class="modal-header">
        <h6>PJS Coahing Center Class Data Show</h6>
        <div class="classEditData">
          <h4></h4>
        </div>
      </div>
      <form id="ClassUpdateForm"> 
      	@csrf 
      	<div class="modal-body p-4 bg-light">
          <input type="hidden" id="updateId" name="updateId">
          <div class="form-row">
            <div class="col-lg-4">
              <label>Class Name:</label>
              <input type="text" name="upClassName" class="upClassName form-control">
            </div>
            <div class="col-4">
              <label>Class Date:</label>
              <input type="text" name="upClasdate" class="upClasdate form-control">
            </div>
           <div class="col-4">
           	 <div class="UpdateShowImg">
		        <div class="EditLoaderSpan m-auto"></div>
		      </div>
           </div>
          </div>
          <br>
          <div class="notfundImgDiv d-none">
            <img class="" src="{{asset('img/no_data_found_4x.webp')}}">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
            <button type="submit" id="updateClass" class="btn btn-primary">Update</button>
          </div>
      </form>
    </div>
  </div>
</div>
{{-- class modal html code end form here --}}

@endsection()

@section('script')
<script type="text/javascript">
	$(document).ready(function() {
		addClass();
		ClassData();
		classUpdate()


		  $(".alert").delay(3000).slideUp(200, function() {
	        $(this).alert('close');
	    });

		 $( ".class_date" ).datepicker({
	      altField: ".class_date",
	      showAnim:'slideDown',
	      altFormat: "DD, d MM, yy"
	    });

     
      $( ".upClasdate" ).datepicker({
        altField: ".upClasdate",
        showAnim:'slideDown',
        altFormat: "DD, d MM, yy"
      });



	});


	function addClass() {
		$("#addClass").validate({
            rules: {
                class_name:{required:true},
                class_date:{
                	required: true
                }
            },
            messages: {
                class_name: "Please New Class name",
                class_date:"Please Your Date&Time"
            }
        });
	}

function ClassData() {
    var url = "/getClass";
    axios.get(url)
        .then(function (response) {
          if (response.status == 200) {
            $('.ClassTable').removeClass('d-none');
            $('.DisplayLoader').addClass('d-none');

            $('#ClassDataTable').DataTable().destroy();
            $('.Classtbody').empty();

            var classData = response.data;
            $.each(classData, function (i) {
             var id = "<td>" + classData[i].id + "</td>";
              var name = "<td>" + classData[i].class_name + "</td>";
              var date = "<td>" + classData[i].class_date + "</td>";
              var action = "<td class='text-center'><i class='editButton fa fa-edit' data-edit='" + classData[i].id + "'></i> <i class='deleteButton fa fa-trash' data-delete='" + classData[i].id + "'></i></td>";
              $('<tr>').html(id+name+date+action).appendTo('.Classtbody');

            }); 


            $(".editButton").click(function() {
	            var id = $(this).data('edit');
	            $("#classUpdateModal").modal('show');
	            $(".classEditData h4").html(id);
	            updateShowData(id);
            });

             $('.deleteButton').click(function() {
                var deleteId = $(this).data('delete');
                classDelete(deleteId);
            });

            $("#ClassDataTable").DataTable({
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
function updateShowData(id) {
	var Showid = {id:id}
	var url = "/UpdateShow";
	 axios.post(url,Showid)
  .then(function(response) {
    if (response.status == 200) {
      $('.EditLoaderSpan').addClass('d-none');
        var jsonSixShowData = response.data;
        $("#updateId").val(jsonSixShowData[0].id);
        $(".upClassName").val(jsonSixShowData[0].class_name);
        $('.upClasdate').val(jsonSixShowData[0].class_date);
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

function classUpdate() {
    $('#ClassUpdateForm').submit(function(e) {
        e.preventDefault();
        var data = new FormData(this);

        var addloader = "<span class='sppener'></span>";
        $('#updateClass').html(addloader);

        $.ajax({
            url: '/classUpdate',
            method: 'post',
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            success: function(response) {
              swal("Updated", "Updated SuucessFully!", "success");
              ClassData();
              $("#classUpdateModal").modal('hide');
              $('#updateClass').html('Update');
            },
            error: function(error) {
              swal("Sorry", "Your Data Updated Faild",'error');
              ClassData();
              $("#classUpdateModal").modal('hide');
              $('#updateClass').html('Update');
            }
        });
    });
}


function classDelete(deleteId) {
 var data = {id: deleteId}

    var url = "/classDelete";

    swal({
      title: "Are you sure?",
      text: "Are You Want To Class "+deleteId+" Number Data Deleted!",
      icon: "warning",
      buttons: true,
      dangerMode: true
    })
    .then((willDelete) => {
        if (willDelete) {
            axios.post(url, data)
            .then(function(response) {
                swal("Success", "Your Data Deleted Success!", "success");
                ClassData();
            })
            .catch(function(error) {
                swal("Sorry...", "Your Data Not Deleted!", "error");
                ClassData();
            })
        }
    });
}
</script>
@endsection()