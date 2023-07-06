<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hello {{ $data->student_name; }}</title>
    <link rel="icon" href="{{ asset($data->student_img) }}">
    <link rel="stylesheet" href="{{ asset('../css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{asset('../css/studentProfile.css')}}"/>
    <link rel="stylesheet" href="{{ asset('../css/loader.css') }}">
    <style>
      button.btn.btn-primary a{
        color: white;
        text-decoration: none;
        font-weight: bolder;
      }
    </style>
</head>
<body onoffline="alert('Helo')">
    <div class="content">
        <div class="main-body">
              <!-- Breadcrumb -->
            @if(Session::get('success'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ Session::get('success') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
              </div>
						@elseif(Session::get('faild'))
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ Session::get('faild') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
              </div>
					   @endif
              <!-- /Breadcrumb -->
              <div class="row gutters-sm">
                <div class="col-12 col-sn-12 col-md-3 col-xl-4 mb-2">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex flex-column align-items-center text-center">
                        <img src="{{ asset($data->student_img) }}" alt="Admin" class="rounded-circle" width="150">
                        <div class="mt-3">
                          <h4>{{ $data->student_name; }}</h4>
                          <p class="text-secondary mb-1">{{ $data->student_post }}</p>
                          <button class="btn btn-primary"><a href="{{ route('student.logout') }}">Logout</a></button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <br>
                <div class="col-12 col-md-9 col-xl-8">
                    <div class="card mb-3">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-12 col-lg-6 col-sl-6">
                            <div class="row">
                              <div class="col-5">
                                <h6 class="mb-0">{{ __('Full Name') }}</h6>
                              </div>
                              <div class="col-7 text-secondary">
                                {{ $data->student_name; }}
                              </div>
                            </div>
                            <hr>
                            <div class="row">
                              <div class="col-5">
                                <h6 class="mb-0">{{ __('Email') }}</h6>
                              </div>
                              <div class="col-7 text-secondary">
                                {{ $data->student_email; }}
                              </div>
                            </div>
                            <hr>
                            <div class="row">
                              <div class="col-5">
                                <h6 class="mb-0">{{ __('Student Id') }}</h6>
                              </div>
                              <div class="col-7 text-secondary">
                               {{$data->student_studentId;}}
                              </div>
                            </div>
                            <hr>
                            <div class="row">
                              <div class="col-5">
                                <h6 class="mb-0">{{ __('Mobile') }}</h6>
                              </div>
                              <div class="col-7 text-secondary">
                                {{ $data->student_phone; }}
                              </div>
                            </div>
                            <hr>
                            <div class="row">
                              <div class="col-5">
                                <h6 class="mb-0">{{ __('Category') }}</h6>
                              </div>
                              <div class="col-7 text-secondary">
                                {{ $data->student_category; }}
                              </div>
                            </div>
                            <hr>
                          </div>
                          <div class="col-12 col-lg-6 col-xl-6">
                            <div class="row">
                              <div class="col-5 ">
                                <h6 class="mb-0">{{ __('Class') }}</h6>
                              </div>
                              <div class="col-7 text-secondary">
                                {{ $data->student_class; }}
                              </div>
                            </div>
                            <hr>
                            <div class="row">
                              <div class="col-5">
                                <h6 class="mb-0">{{ __('Taka') }}</h6>
                              </div>
                              <div class="col-7 text-secondary">
                                {{ $data->student_taka; }}
                              </div>
                            </div>
                            <hr>
                            <div class="row">
                              <div class="col-5">
                                <h6 class="mb-0">{{ __('Village') }}</h6>
                              </div>
                              <div class="col-7 text-secondary">
                                {{ $data->student_village; }}
                              </div>
                            </div>
                            <hr>
                            <div class="row dueMonthRow" >
                              <div class="col-5">
                                <h6 class="mb-0">{{ __('Due') }}</h6>
                              </div>
                              <div class="" id="due">
                                {{ $invoiceDue; }}
                              </div>
                              <div class="dueMonthDivChart d-none">
                                @foreach ($monthDue as $monthDue)
                                <p> {{ $monthDue->invoice_month; }}<br></p>
                               @endforeach
                              </div>
                            </div>
                            <hr>
                            <div class="row">
                              <div class="col-3 col-md-5 col-lg-3">
                                <h6 class="mb-0">{{ __('Invoice Month') }}</h6>
                              </div>
                              <div class="col-9 col-md-7 col-lg-9">
                                <form action="" id="stuProInvoiceForm">
                                  @csrf
                                    <div class="form-row">
                                      <div class="col-6">
                                        <input type="hidden" name="stuProShowInId" id="stuProShowInId" value="{{$data->student_studentId;}}">
                                        <select name="monthSelect" id="monthSelect" class="form-control">
                                          <option value="">Select Month</option>
                                          @foreach ($invoiceMonth as $invoiceMonth)
                                          <option value="{{ $invoiceMonth->invoice_month }}">{{ $invoiceMonth->invoice_month }}</option>
                                          @endforeach
                                      </select>
                                      </div>
                                      <div class="col-6">
                                        <button class="btn btn-primary stuProInBtn">Submit</button>
                                      </div>
                                    </div>
                                </form>
                              </div>
                            </div>
                            <hr>
                          </div>
                          <div class="container"><br>
                            <div class="row">
                              <div class="col-6">
                                <h4><a href="" data-StuProEdit="{{ $data->student_studentId; }}" class="btn btn-primary invoiceEdit">Edit</a></h4>
                              </div>
                              <div class="col-6">
                                <span class="studentProfileLoader d-none"></span>
                               <div class="statusDiv d-none">
                                <h6>Status:</h6>
                                <div class="appendDiv d-none">
                                
                                </div>
                               </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    </div>
              </div>
            </div>
        </div>

        <!-- Five data Edit modal -->
<div class="modal fade" id="studentProfileModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-lg ">
    <div class="modal-content">
      <div class="modal-header">
        <h6>PJS Coahing Center Student Data Show</h6>
        <div class="stuProEditId">
          <h4></h4>
        </div>
      </div>
      <div class="UpdateShowImg m-auto">
        <div class="EditLoaderSpan m-auto"></div>
        <img src="" class="updatePreview rounded-circle" style="width:100px;height:100px;">
      </div>
      <form id="stuProSubForm" enctype="multipart/form-data"> 
        @csrf 
        <div class="modal-body p-4 bg-light">
          <input type="hidden" id="stuProUpId" name="stuProUpId">
          <input type="hidden" name="stuProPreImg" id="stuProPreImg">
          <div class="form-row">
            <div class="col-lg-4">
              <label for="stuProUPUpImg">Image:</label>
              <input type="file" id="stuProUpImg" accept="image/*" name="stuProUpImg" class="form-control">
            </div>
            <div class="col-lg-4">
              <label for="stuProUpName">Name:</label>
              <input type="text" id="stuProUpName" name="stuProUpName" class="form-control">
            </div>
            <div class="col-4">
              <label for="stuProUpfname">Father's Name:</label>
              <input type="text" name="stuProUpfname" id="stuProUpfname" class="form-control">
            </div>
          </div>
          <br>
          <div class="form-row">
            <div class="col-4">
              <label for="stuProUpMother">Mother's Name:</label>
              <input type="text" name="stuProUpMother" id="stuProUpMother" class="form-control">
            </div>
            <div class="col-4">
              <label for="stuProUpPhone">Phone:</label>
              <input type="number" name="stuProUpPhone" id="stuProUpPhone" class="form-control">
            </div>
            <div class="col-4">
              <label for="stuProUpPost">Post(Hobby):</label>
              <input type="text" name="stuProUpPost" id="stuProUpPost" class="form-control">
            </div>
          </div>
          <br>
          <div class="form-row">
            <div class="col-4">
              <label for="stuProUpCate">Category:</label>
              <select class="form-control" name="stuProUpCate" id="stuProUpCate">
                <option>Select Class</option>
                @foreach ($depart as $depart)
                  <option>{{ $depart->depart_name; }}</option>
                 @endforeach
              </select>
            </div>
            <div class="col-4">
              <label for="stuProUpClass">Class:</label>
              <select class="form-control" name="stuProUpClass" id="stuProUpClass">
                <option>Select Class</option>
                @foreach ($class as $class)
                   <option>{{ $class->class_name; }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-4">
              <label for="stuProUpTaka">Taka:</label>
              <select class="form-control" name="stuProUpTaka" id="stuProUpTaka">
                <option>Select Taka</option>
                @foreach ($taka as $taka)
                  <option>{{ $taka->pjs_taka; }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <br>
          <div class="form-row">
            <div class="col-4">
              <label for="stuProUpVil">Village:</label>
              <input type="text" name="stuProUpVil" id="stuProUpVil" class="form-control">
            </div>
          </div>
          <div class="notfundImgDiv text-center d-none">
            <img class="" src="{{asset('../img/no_data_found_4x.webp')}}" style="width:
            300px">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
            <button type="submit" id="stuProUpBtn" class="btn btn-primary">Submit</button>
          </div>
      </form>
    </div>
  </div>
</div>
<!-- Five data Edit modal b-->
      
  <!-- JQuery js start form here -->
  <script type="text/javascript" src="{{ asset('../js/jquery-1.10.2.js') }}"></script>
  <!-- popper min js start form here -->
  <script type="text/javascript" src="{{ asset('../js/popper.min.js') }}"></script>
  <!-- bootstrap min js start form here -->
  <script type="text/javascript" src="{{ asset('../js/bootstrap.min.js') }}"></script>
   {{-- jquery validation plugin cdn start form here --}}
   {{-- sweetalert.min.js start form here --}}
   <script type="text/javascript" src="{{asset('../js/sweetalert.min.js')}}"></script>
  <script>
    $(document).ready(function() {
        $(".alert").delay(10000).slideUp(200, function() {
            $(this).alert('close');
        });

        $(document).ready(()=>{
          $('#stuProUpImg').change(function(){
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



        $("#due").mousemove(function () { 
          $(".dueMonthDivChart").removeClass('d-none');
        });

        $("#due").mouseout(function () { 
          $(".dueMonthDivChart").addClass('d-none');
        });

        $('.invoiceEdit').click(function (e) { 
          e.preventDefault();
          var stuProEditId = $(this).attr('data-StuProEdit');
          $("#studentProfileModal").modal('show');
          $(".stuProEditId h4").html(stuProEditId);
          invoiceEdit(stuProEditId)
        });

        stuProSubForm();
        monthFilter();
    });

    function stuProSubForm(){ 
      $("#stuProSubForm").submit(function (e) { 
        e.preventDefault();
        var data = new FormData(this);
        var addloader = "<span class='sppener'></span>";
         $('#stuProUpBtn').html(addloader);

         $.ajax({
          url: '/student/stuProUpdate',
          type: 'POST',
          data: data,
          cache: false,
          contentType: false,
          processData: false,
          success: function(response) {
            swal("Updated", "Updated SuucessFully!", "success");
            location.reload();
            $("#studentProfileModal").modal('hide');
            $('#stuProUpBtn').html('Update');
          },
          error: function(error) {
            swal("Faild", "Your Data Updated Faild");
            location.reload();
            $("#studentProfileModal").modal('hide');
            $('#stuProUpBtn').html('Update');
          }
        });

      });
     }

    function invoiceEdit(stuProEditId){
      $.ajax({
        url:"/student/stuProEditShow",
        type:"GET",
        data:{stuProUpShowId:stuProEditId},
        success:function(responce){
          if (responce.status == 200) {
              $(".EditLoaderSpan").addClass('d-none');
              var jsonData = responce.data;
              $("#stuProUpId").val(jsonData.id);
              $("#stuProUpName").val(jsonData.student_name);
              $('#stuProUpfname').val(jsonData.student_fname);
              $("#stuProUpMother").val(jsonData.student_mname);
              $('#stuProUpPhone').val(jsonData.student_phone);
              $("#stuProUpPost").val(jsonData.student_post);
              $('#stuProUpCate').val(jsonData.student_category);
              $('#stuProUpClass').val(jsonData.student_class);
              $("#stuProUpTaka").val(jsonData.student_taka);
              $('#stuProUpVil').val(jsonData.student_village);
              $('.updatePreview').attr('src',jsonData.student_img);
              $('#stuProPreImg').val(jsonData.student_img)
          }else{
            $(".EditLoaderSpan").addClass('d-none');
            $('.form-row').addClass('d-none');
            $('.notfundImgDiv').removeClass('d-none');
          }
        },
        error:function(){
          $(".EditLoaderSpan").addClass('d-none');
          $('.form-row').addClass('d-none');
          $('.notfundImgDiv').removeClass('d-none');
        }
      });
    }

    function monthFilter(){
      $('#stuProInvoiceForm').submit(function (e) { 
        e.preventDefault();
        var addloader = "<span class='sppener'></span>";
        var select = $("#monthSelect").val();

        if(select.length == ""){
          alert('Please Month Select');
        }else{
        $(".stuProInBtn").html(addloader);
        var data = new FormData(this);
        $('.statusDiv').addClass('d-none');
        $(".appendDiv").addClass('d-none');
        
        $(".studentProfileLoader").removeClass("d-none");

        $.ajax({
          url: "/student/filterData",
          type: "POST",
          data: data,
          cache: false,
          contentType: false,
          processData: false,
          success: function (response) {
            if(response.status == 200){
              $('.statusDiv').removeClass('d-none');
              $('.appendDiv').empty();
              $(".appendDiv").removeClass('d-none');
              $(".stuProInBtn").html("Submit");
              $(".studentProfileLoader").addClass("d-none");
              var status = (response.data[0].invoice_status == 0) ? "Unpaid" : "Paid";
             $("<h5>").html(status).appendTo('.appendDiv');
            }else{
              $('.statusDiv').removeClass('d-none');
              $('.appendDiv').empty();
              $(".appendDiv").removeClass('d-none');
              $(".stuProInBtn").html("Submit");
              $(".studentProfileLoader").addClass("d-none");
              $("<h5>").html("Comming").appendTo('.appendDiv');
            }
           
          },
          error:function(error){
            $('.statusDiv').removeClass('d-none');
            $('.appendDiv').empty();
             $(".appendDiv").removeClass('d-none');
             $(".stuProInBtn").html("Submit");
              $(".studentProfileLoader").addClass("d-none");
              $("<h5>").html("Comming").appendTo('.appendDiv');
          }
        });
        }
        
      });
    }

  </script>
</body>
</html>