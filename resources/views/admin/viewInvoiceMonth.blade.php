@extends('backend.app')
@section('title','Admin | Invoice View')
@section('content')
<br>
    <div class="row">
      <div class="container">
        <div class="col-12 m-auto">
            <div class="card">
                <div class="card-header">
                    <h4>Add Invoice Student</h4>
                </div>
                <div class="card-body">
                    <form action="">
                        <div class="form-row ">
                            <div class="col-4">
                                <label for="invStuId">Student Id:</label>
                                <select name="invStuId" id="invStuId" class="form-select">
                                    <option value="">Select Student Id</option>
                                    @foreach ($studentId as $studentId)
                                        <option value="">{{ $studentId->student_studentId }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-4 ">
                                <label for="accordingMonth ">According:</label>
                                <select name="accordingMonth" id="accordingMonth" class="form-select">
                                    <option value="">According Month</option>
                                    <option value="">{{ $invoiceMonthData[0]->invoice_month }}</option>
                                </select>
                            </div>
                            <div class="col-4">
                                <label for="" ></label>
                                <button class="btn btn-primary form-control mt-2">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </div>
    <br>
    <div class="card">
        <div class="card-header InvoiceMonthDueCardHeader">
            <h2>Data According to Your Month...{{ $invoiceMonthData[0]->invoice_month; }}</h2>
            <a href="{{ route('invoice.selectInvoiceMonth') }}" class="invoiceDueHome"><i class="fas fa-home"></i></a>
        </div>
        <div class="card-body">
            <table id="dataTable" class="table table-hover table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Invoice Name</th>
                        <th>Invoice Id</th>
                        <th>Invoice Taka</th>
                        <th>Invoice Due</th>
                        <th>Month</th>
                        <th>Status</th>
                        <th>Type</th>
                        <th>Note</th>
                        <th>Action</th>
                    </tr>
                </thead>
               
                <tbody>
                    @foreach ($invoiceMonthData as $value)
                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->invoice_name; }}</td>
                        <td>{{ $value->invoice_id }}</td>
                        <td>{{ $value->invoice_taka; }}</td>
                        <td>{{ $value->invoice_due; }}</td>
                        <td>{{ $value->invoice_month; }}</td>
                        @if($value->invoice_status == 0)
                          <td><p class="unpaid">Unpaid</p></td>
                        @else
                        <td><p class="paid">Paid</p></td>
                        @endif
                        
                        <td>{{ $value->invoice_type }}</td>
                        <td>{{ $value->invoice_note }}</td>
                        <td><a href=""><i class="material-icons-outlined visible dueInvoiceEye" data-month="{{ $value->invoice_month}}" data-id="{{ $value->invoice_id }}">visibility</i></a></td>
                    </tr>
                    @endforeach
                </tbody>
              
                <tfoot>
                    <tr>
                        <th colspan="4"></th>
                        <th><span>Total Due = </span>{{ $monthTotalDue }}</th>
                        <th colspan="5"></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>


    {{-- due invoice data show modal html code --}}
    <div class="modal fade" id="dueInvoiceModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-lg ">
          <div class="modal-content">
            <div class="modal-header">
              <h6>PJS Coahing Center Due Invoice Status Show</h6>
              <div class="dueInvoiceHeadDiv">
                <h4></h4>
              </div>
            </div>
            <div class="updateEidDiv">
                <div class="EditLoaderSpan m-auto"></div>
            </div>
            <form id="dueInvoiceForm"> 
                @csrf 
                <div class="modal-body p-4 bg-light">
                    <input type="hidden" name="dueInvUpMonth" id="dueInvUpMonth">
                    <input type="hidden" id="dueInvUpdateId" name="dueInvUpdateId">
                    <input type="hidden" name="dueInvUpTaka" id="dueInvUpTaka">
                <div class="form-row">
                  <div class="col-lg-4">
                    <label>Due Status:</label>
                    <select name="updueInvStatus" class="form-select" id="updueInvStatus">
                        <option value="Paid">Paid</option>
                        <option value="Unpaid">Unpaid</option>
                    </select>
                  </div>
                </div>
                <br>
                <div class="notfundImgDiv d-none">
                  <img class="" src="{{asset('img/no_data_found_4x.webp')}}">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                  <button type="submit" id="dueInvUpBtn" class="btn btn-primary">Update</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    {{-- due invoice data show modal html code --}}
@endsection
@section('script')
    <script type="text/javascript">
    $(document).ready(function () {
        $('#dataTable').DataTable();
        $('.datatablees_length').addClass('bs-select');
        dueInvoiceShow();
        dueInvoiceStatusUp();
    });
    function dueInvoiceShow(){
        $(".dueInvoiceEye").click(function(e){
            e.preventDefault()
            var id = $(this).data("id");
           var month = $(this).data('month');
           $('#dueInvoiceModal').modal('show');
           $('.dueInvoiceHeadDiv h4').html(id);
           dueInvoiceDataShow(id,month);
           
        });
    }
    function dueInvoiceDataShow(id,month){
        var url = "{{ route('admin.dueInvoiceDataShow') }}";
        $.ajax({
            type: "GET",
            url: url,
            data: {ShowId:id,showMonth:month},
            success: function (responce) {
                if (responce.status == 200) {
                   $('.EditLoaderSpan').addClass('d-none');
                   var jsonData = responce.data[0].invoice_status;
                   var dueInvStatus = (jsonData == 0)? "Unpaid":"Paid";
                   $('#dueInvUpdateId').val(responce.data[0].id);
                   $('#dueInvUpTaka').val(responce.data[0].invoice_taka);
                   $("#dueInvUpMonth").val(responce.data[0].invoice_month);
                   $("#updueInvStatus").val(dueInvStatus);
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
    function dueInvoiceStatusUp(){
       $("#dueInvoiceForm").submit(function (e) {
        e.preventDefault();
        var data = new FormData(this);
         var addloader = "<span class='sppener'></span>";
         $('#dueInvUpBtn').html(addloader);

         $.ajax({
            type: "POST",
            url: "{{ route('admin.dueInvoiveUpdate') }}",
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            success: function (responce) {
                if(responce.status == 200){
                    swal('success','Updated SuccessFully','success');
                    $('#dueInvoiceModal').modal('hide');
                    $('#dueInvUpBtn').html('Update');
                    setTimeout(() => {
                        location.reload();
                    }, 2000);
                }else{
                    swal('Sorry','Updated SuccessFully','error');
                    $('#dueInvoiceModal').modal('hide');
                    $('#dueInvUpBtn').html('Update');
                    location.reload();
                }
            },
            error:function(error){
                swal('success','Updated SuccessFully','success');
                $('#dueInvoiceModal').modal('hide');
                $('#dueInvUpBtn').html('Update');
                location.reload();
            }
         });
       });
    }
    </script>  
@endsection