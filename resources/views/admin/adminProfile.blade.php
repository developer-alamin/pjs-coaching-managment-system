@extends('backend.app')
@section('title','Admin | Profile')
@section('content')
    <br>
    <div class="container">
        <div class="row">
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row text-center">
                            <div class="col-12 mb-1">
                                <img class="adminProfileImg" src="{{ $data->admin_img }}" alt="" style="width:200px;height:200px;">
                            </div>
                            <div class="col-12">
                                <h1>{{ $data->admin_name }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h6>{{ __('Email:') }}</h6>
                            </div>
                            <div class="col-9">
                                {{ $data->admin_email }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col">
                                <h6>{{ __('Phone:') }}</h6>
                            </div>
                            <div class="col-9">
                                {{ $data->admin_mobile }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col">
                                <h6>{{ __('Village:') }}</h6>
                            </div>
                            <div class="col-9">
                                {{ $data->admin_village }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col">
                                <h6>{{ __('Post:') }}</h6>
                            </div>
                            <div class="col-9">
                                {{ $data->admin_post }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-3">
                                <h6>{{ __('About:') }}</h6>
                            </div>
                            <div class="col-9">
                                {{ $data->admin_about }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-12">
                                <button data-email="{{ $data->admin_email; }}" data-id="{{ $data->id; }}" class="btn btn-primary form-control adminProfileBtn">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{-- admin profile update html modal show.... --}}
<div class="modal fade" id="adminProfileModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-lg ">
      <div class="modal-content">
        <div class="modal-header adminModalHeader">
            <h5 class="modal-title" id="myModalTitle">Admin Profile Data Show</h5>
            <h4></h4>
        </div>
        <div class="UpdateShowImg">
          <div class="EditLoaderSpan m-auto"></div>
          <img class="adminProUpImg" src="" alt="" style="width:100px;height:100px">
        </div>
        <form id="adminProUpdate" enctype="multipart/form-data">
           @csrf 
           <div class="modal-body p-4 bg-light">
            <input type="hidden" id="updateId" name="updateId">
            <input type="hidden" name="preImg" id="preImg">
            <div class="form-row">
                <div class="col-4">
                    <label for="AdminUpImg">Image:</label>
                    <input type="file" id="adminUpImg" name="adminUpImg" class="form-control">
                </div>
                <div class="col-4">
                    <label for="AdminUpName">Name:</label>
                    <input type="text" id="AdminUpName" name="AdminUpName" class="form-control">
                </div>
                <div class="col-4">
                    <label for="AdminUpEmail">Email:</label>
                    <input type="text" id="AdminUpEmail" name="AdminUpEmail" class="form-control">
                </div>
            </div><br>
            <div class="form-row">
                <div class="col-4">
                    <label for="AdminUpPhone">Phone:</label>
                    <input type="text" id="AdminUpPhone" name="AdminUpPhone" class="form-control">
                </div>
                <div class="col-4">
                    <label for="AdminUpVillage">Village:</label>
                    <input type="text" id="AdminUpVillage" name="AdminUpVillage" class="form-control">
                </div>
                <div class="col-4">
                    <label for="AdminUpPost">Post:</label>
                    <input type="text" id="AdminUpPost" name="AdminUpPost" class="form-control">
                </div>
            </div><br>
            <div class="form-row">
                <div class="col-12">
                    <label for="adminUpAbout">About:</label>
                    <textarea name="adminUpAbout" id="adminUpAbout" class="form-control"></textarea>
                </div>
            </div>
            <div class="notfundImgDiv d-none">
                <img class="" src="{{asset('img/no_data_found_4x.webp')}}">
              </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
              <button type="submit" id="add_employee_btn" class="btn btn-primary">Submit</button>
            </div>
        </form>
      </div>
    </div>
  </div>

@endsection
@section('script')
<script type="text/javascript">
    $(document).ready(function() {
        $('#adminUpImg').change(function(){
            const file = this.files[0];
            if (file){
            let reader = new FileReader();
            reader.onload = function(event){
                console.log(event.target.result);
                $('.adminProUpImg').attr('src',event.target.result);
            }
            reader.readAsDataURL(file);
            }
        });

       

        adminProfileBtn();
        adminProUpdate();
    });

    function adminProfileBtn(){
        $('.adminProfileBtn').click(function (e) { 
            e.preventDefault();
            var id = $(this).data('id');
            var email = $(this).data('email');
            $('#adminProfileModal').modal('show');
            $('.adminModalHeader h4').html(id);
            adminProUpShow(id,email);
        });
    }
    function adminProUpShow(id,email){
       var url = "{{ Route('admin.proUpShow') }}";
        var data = {id:id,email:email}
       $.ajax({
            url:url,
            type:"GET",
            data:data,
            success: function(responce){
               if(responce.status == 200){
                $('.EditLoaderSpan').addClass('d-none');
                var jsonData = responce.data;
                $('#updateId').val(jsonData[0].id);
                $('#preImg').val(jsonData[0].admin_img);
                $('.adminProUpImg').attr('src',jsonData[0].admin_img);
                $('#AdminUpName').val(jsonData[0].admin_name);
                $('#AdminUpEmail').val(jsonData[0].admin_email);
                $('#AdminUpPhone').val(jsonData[0].admin_mobile);
                $('#AdminUpVillage').val(jsonData[0].admin_village);
                $('#AdminUpPost').val(jsonData[0].admin_post);
                $('#adminUpAbout').val(jsonData[0].admin_about)
               }else{
                $('.EditLoaderSpan').addClass('d-none');
                $('.notfundImgDiv').removeClass('d-none');
               }
            },
            error:function(error){
                $('.EditLoaderSpan').addClass('d-none');
                $('.notfundImgDiv').removeClass('d-none');
            }
      });
    }

  function adminProUpdate(){
    $('#adminProUpdate').submit(function (e) { 
        e.preventDefault();
        var data = new FormData(this);
        var addloader = "<span class='sppener'></span>";
        $('#add_employee_btn').html(addloader); 

        $.ajax({
            type: "POST",
            url: "{{ route('admin.proUpdate') }}",
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            success: function (responce) {
                if (responce.status == 200) {
                    $('#add_employee_btn').html('Update');
                    swal("Success", "Your Data Updated Success!", "success");
                    location.reload();
                }else{
                    $('#add_employee_btn').html('Update');
                    swal("Sorry", "Your Data Updated Faild!", "error");
                    location.reload();
                }
            },
            error:function(error){
                $('#add_employee_btn').html('Update');
                swal("Sorry", "Your Data Updated Faild!", "error");
                location.reload();
            }
        });
    });
  }
</script>  
@endsection