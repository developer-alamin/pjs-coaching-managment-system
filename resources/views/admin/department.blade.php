@extends('backend.app')
@section('title','Admin | Department')
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
						<h2>Department Managment System</h2>
					</div>
					<div class="card-body">
						<form id="departmentForm" method="post" action="{{ route('store.depart') }}">
					        @csrf
					        <div class="container">
					            <div class="form-group">
					                <table>
					                	<tr>
					                	<th><label>Depart Name:</label></th>
					                	<td>
							                <input type="text" name="depart_name" class=" form-control depart_name"  placeholder="Department Name">
							               <font>
							               	{{ ($errors->has('depart_name'))?($errors->first('depart_name')):'' }}
							               </font>
					                	</td>
					                </tr>
					                <tr style="position: relative;top: 5px;">
					                	<th>
					                		<label>Date&Time:</label>
					                	</th>
					                	<td>
					                		<input type="text" name="depart_date" class=" form-control depart_date" placeholder="Department Date">
						                	
					                	</td>
					                </tr>
					                </table>
					            </div>
					        </div>
					        <br>
					        <div class="modal-footer">
					          <button type="submit" id="" class="btn btn-primary">Submit</button>
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
						<h4>Department Managment Data</h4>
					</div>
					<div class="card-body">
						<table id="departDataTable" class="table table-hover table-bordered table-striped d-none DeparTable">
							<thead>
								<tr>
									<th>Sl No</th>
									<th>Department Name</th>
									<th>Department Date</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody class="departTbody">	

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
<div class="modal fade" id="departUpdateModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-lg ">
    <div class="modal-content">
      <div class="modal-header">
        <h6>PJS Coahing Center Department Data Show</h6>
        <div class="departEditData">
          <h4></h4>
        </div>
      </div>
      <form id="departUpdateForm"> 
      	@csrf 
      	<div class="modal-body p-4 bg-light">
          <input type="hidden" id="updateId" name="updateId">
          <div class="form-row">
            <div class="col-lg-4">
              <label>Class Name:</label>
              <input type="text" name="upDepartName" class="upDepartName form-control">
            </div>
            <div class="col-4">
              <label>Class Date:</label>
              <input type="text" name="updepartDate" class="updepartDate form-control">
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
            <button type="submit" id="departUpdate" class="btn btn-primary">Update</button>
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
		departValidation();
		showDepart();
		classUpdate();

		$(".alert").delay(3000).slideUp(200, function() {
	        $(this).alert('close');
	    });

		$( ".depart_date" ).datepicker({
	      altField: ".depart_date",
	      showAnim:'slideDown',
	      altFormat: "DD, d MM, yy"
	    });

	    $( ".updepartDate" ).datepicker({
	        altField: ".updepartDate",
	        showAnim:'slideDown',
	        altFormat: "DD, d MM, yy"
	      });

	})
	function departValidation() {
		$("#departmentForm").validate({
            rules: {
                depart_name:{required:true},
                depart_date:{
                	required: true
                }
            },
            messages: {
                depart_name: "Please New Department name",
                depart_date:"Please Your Date&Time"
            }
        });
	}

	
function showDepart() {
     var url = "/showDepart";
      axios.get(url)
        .then(function (response) {
          if (response.status == 200) {
            $('.DeparTable').removeClass('d-none');
            $('.DisplayLoader').addClass('d-none');

            $('#departDataTable').DataTable().destroy();
            $('.departTbody').empty();

            var departData = response.data;
            $.each(departData, function (i) {
             var id = "<td>" + departData[i].id + "</td>";
              var name = "<td>" + departData[i].depart_name + "</td>";
              var date = "<td>" + departData[i].depart_date + "</td>";
              var action = "<td class='text-center'><i class='editButton fa fa-edit' data-edit='" + departData[i].id + "'></i> <i class='deleteButton fa fa-trash' data-delete='" + departData[i].id + "'></i></td>";
              $('<tr>').html(id+name+date+action).appendTo('.departTbody');

            }); 

            $(".editButton").click(function() {
              var id = $(this).data('edit');
              $("#departUpdateModal").modal('show');
              $(".departEditData h4").html(id);
              departDetail(id);
            });

              $('.deleteButton').click(function() {
                var deleteId = $(this).data('delete');
                classDelete(deleteId);
            });

            $("#departDataTable").DataTable({
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

  function departDetail(id) {
    var Showid = {id:id}
	  var url = "/departupdateShow";
	   axios.post(url,Showid)
	  .then(function(response) {
	    if (response.status == 200) {
	      $('.EditLoaderSpan').addClass('d-none');
	        var jsonSixShowData = response.data;
	        $("#updateId").val(jsonSixShowData[0].id);
	        $(".upDepartName").val(jsonSixShowData[0].depart_name);
	        $('.updepartDate').val(jsonSixShowData[0].depart_date);
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
    $('#departUpdateForm').submit(function(e) {
        e.preventDefault();
        var data = new FormData(this);

        var addloader = "<span class='sppener'></span>";
        $('#departUpdate').html(addloader);

        $.ajax({
            url: '/departUpdate',
            method: 'post',
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            success: function(response) {
              swal("Updated", "Updated SuucessFully!", "success");
              showDepart();
              $("#departUpdateModal").modal('hide');
              $('#departUpdate').html('Update');
            },
            error: function(error) {
              swal("Sorry", "Your Data Updated Faild",'error');
              showDepart()
              $("#departUpdateModal").modal('hide');
              $('#departUpdate').html('Update');
            }
        });
    });
}

function classDelete(deleteId) {
 var data = {id: deleteId}

    var url = "/departDelete";

    swal({
      title: "Are you sure?",
      text: "Are You Want To Department "+deleteId+" Number Data Deleted!",
      icon: "warning",
      buttons: true,
      dangerMode: true
    })
    .then((willDelete) => {
        if (willDelete) {
            axios.post(url, data)
            .then(function(response) {
                swal("Success", "Your Data Deleted Success!", "success");
                 showDepart();
            })
            .catch(function(error) {
                swal("Sorry...", "Your Data Not Deleted!", "error");
                showDepart();
            })
        }
    });
}
</script>
@endsection()