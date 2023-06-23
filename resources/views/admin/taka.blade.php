@extends('backend.app')
@section('title','Admin | Taka')
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
						<h2>Taka Managment System</h2>
					</div>
					<div class="card-body">
						<form id="formTaka" method="post" action="{{ route('store.taka') }}">
					        @csrf
					        <div class="container">
					            <div class="form-group">
					                <table>
					                	<tr>
					                	<th><label>Taka:</label></th>
					                	<td>
							                <input type="number" name="pjs_taka" class=" form-control pjs_taka"  placeholder="Your Taka">
							                <font>
							                	{{ ($errors->has('pjs_taka'))?($errors->first('pjs_taka')):'' }}
							                </font>
					                	</td>
					                </tr>
					                <tr style="position: relative;top: 5px;">
					                	<th>
					                		<label>Date&Time:</label>
					                	</th>
					                	<td>
					                		<input type="text" name="taka_date" class="taka_date form-control" placeholder="Class Date">
					                	</td>
					                </tr>
					                </table>
					            </div>
					        </div>
					        <br>
					        <div class="modal-footer">
					          <button type="submit" id="add_taka_btn" class="btn btn-primary">Submit</button>
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
						<h4>Taka Managment Data</h4>
					</div>
					<div class="card-body">
						<table id="takaDataTable" class="table table-hover table-bordered table-striped d-none takaTable">
							<thead>
								<tr>
									<th>Sl No</th>
									<th>Taka</th>
									<th>Taka Date</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody class="takaTbody">	

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
<div class="modal fade" id="takaUpdatemodal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-lg ">
    <div class="modal-content">
      <div class="modal-header">
        <h6>PJS Coahing Center Taka Data Show</h6>
        <div class="takaEditdata">
          <h4></h4>
        </div>
      </div>
      <form id="takaUpdateForm"> 
      	@csrf 
      	<div class="modal-body p-4 bg-light">
          <input type="hidden" id="updateId" name="updateId">
          <div class="form-row">
            <div class="col-lg-4">
              <label>Class Name:</label>
              <input type="number" name="uppjstaka" class="uppjstaka form-control">
            </div>
            <div class="col-4">
              <label>Class Date:</label>
              <input type="text" name="uptakadate" class="uptakadate form-control">
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
            <button type="submit" id="updateTaka" class="btn btn-primary">Update</button>
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
    validateTaka();
    showTaka();
    takaUpdate();

    $(".alert").delay(3000).slideUp(200, function() {
        $(this).alert('close');
    });

    $(".taka_date").datepicker({
        altField: ".taka_date",
        showAnim: 'slideDown',
        altFormat: "DD, d MM, yy"
    });


    $(".uptakadate").datepicker({
        altField: ".uptakadate",
        showAnim: 'slideDown',
        altFormat: "DD, d MM, yy"
    });

})

function validateTaka() {
    $("#formTaka").validate({
        rules: {
            pjs_taka: {
                required: true
            },
            taka_date: {
                required: true
            }
        }
        ,
        messages: {
            pjs_taka: "Please New Taka",
            taka_date: "Please Your Date&Time"
        }
    });
}

function showTaka() {
    var url = "/showTaka";

    axios.get(url).then(function(response) {
        if (response.status == 200) {
            $('.takaTable').removeClass('d-none');
            $('.DisplayLoader').addClass('d-none');

            $('#takaDataTable').DataTable().destroy();
            $('.takaTbody').empty();

            var takaData = response.data;

            $.each(takaData, function(i) {
                var id = "<td>" + takaData[i].id + "</td>";
                var name = "<td>" + takaData[i].pjs_taka + "</td>";
                var date = "<td>" + takaData[i].taka_date + "</td>";
                var action = "<td class='text-center'><i class='editButton fa fa-edit' data-edit='" + takaData[i].id + "'></i> <i class='deleteButton fa fa-trash' data-delete='" + takaData[i].id + "'></i></td>";
                $('<tr>').html(id + name + date + action).appendTo('.takaTbody');

            });


            $(".editButton").click(function() {
                var id = $(this).data('edit');
                $("#takaUpdatemodal").modal('show');
                $(".takaEditdata h4").html(id);
                takaUpdateShow(id);
            });

            $('.deleteButton').click(function() {
                var deleteId = $(this).data('delete');
                takaDelete(deleteId);
            });

            $("#takaDataTable").DataTable({
                order: [0, 'desc']
            });
            $('.datatablees_length').addClass('bs-select');

        } else {
            $('.notfundImgDiv').removeClass('d-none');
            $('.DisplayLoader').addClass('d-none');
        }

    }).catch(function(error) {
        $('.notfundImgDiv').removeClass('d-none');
        $('.DisplayLoader').addClass('d-none');
    });
}


function takaUpdateShow(id) {
    var Showid = {
        id: id
    }

    var url = "/takaUpdateShow";

    axios.post(url, Showid).then(function(response) {
        if (response.status == 200) {
            $('.EditLoaderSpan').addClass('d-none');

            var jsonSixShowData = response.data;
            $("#updateId").val(jsonSixShowData[0].id);
            $(".uppjstaka").val(jsonSixShowData[0].pjs_taka);
            $('.uptakadate').val(jsonSixShowData[0].taka_date);
        } else {
            $('.EditLoaderSpan').addClass('d-none');
            $('.form-row').addClass('d-none');

            $('.notfundImgDiv').removeClass('d-none');
        }

    }).catch(function(error) {
        $('.EditLoaderSpan').addClass('d-none');
        $('.notfundImgDiv').removeClass('d-none');
    });
}


function takaUpdate() {
    $('#takaUpdateForm').submit(function(e) {
        e.preventDefault();
        var data = new FormData(this);

        var addloader = "<span class='sppener'></span>";
        $('#updateTaka').html(addloader);

        $.ajax({

            url: '/takaUpdate',
            method: 'post',
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            success: function(response) {
                    swal("Updated", "Updated SuucessFully!", "success");
                    showTaka();
                    $("#takaUpdatemodal").modal('hide');
                    $('#updateTaka').html('Update');
                }

                ,
            error: function(error) {
                swal("Sorry", "Your Data Updated Faild", 'error');
                showTaka();
                $("#takaUpdatemodal").modal('hide');
                $('#updateTaka').html('Update');
            }
        });
    });
}


function takaDelete(deleteId) {
    var data = {
        id: deleteId
    }

    var url = "/takaDelete";

    swal({
        title: "Are you sure?",
        text: "Are You Want To Taka " + deleteId + " Number Data Deleted!",
        icon: "warning",
        buttons: true,
        dangerMode: true

    }).then((willDelete) => {
        if (willDelete) {
            axios.post(url, data).then(function(response) {
                swal("Success", "Your Data Deleted Success!", "success");
                showTaka();

            }).catch(function(error) {
                swal("Sorry...", "Your Data Not Deleted!", "error");
                showTaka();
            })
        }
    });
}
</script>
@endsection()