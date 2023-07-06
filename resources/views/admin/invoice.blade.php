@extends('backend.app')
@section('title', 'invoice')
<style>
    strong.invoiceStrong {
    color: #0cff3beb;
    font-family: inherit;
    font-size: 25px;
}
</style>
@section('content')
<br>
   <div class="content">
    <div class="row">
        <div class="col-7 m-auto">
            <div class="card">
                <div class="card-header">
                    <h3>Studnt Monthly Invoice System</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('poststore.invoice') }}" id="invoiceForm" method="post">
                        @csrf
                        @if(Session::get('success'))
                            <div class="alert alert-secondary alert-dismissible fade show" role="alert">
                                <strong class="invoiceStrong">{{ Session::get('success') }}</strong>
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
                        <div class="form-group">
                            <div class="col-12">
                                <label for="invoiceMonth">Month:</label>
                                <select name="invoice_month" id="invoice_month" class="form-select">
                                    <option value="">Select Month</option>
                                    <option value="<?= date('M-Y')?>">
                                    <?php
                                       echo date('M-Y');
                                     ?>
                                     </option>
                                </select>
                                <font>{{ ($errors->has('invoice_month'))?($errors->first('invoice_month')):'' }}</font>
                            </div><br>
                            <div class="col-12">
                                <button class="btn btn-primary form-control">Pjs Send Invoice</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2>Student Latest Monthly Invoice Data</h2>
                </div>
                <div class="card-body">
                    <table id="invoiceTable" class="d-none table table-bordered table-hover table-striped">
                        <thead class="bg-secondary text-white">
                            <tr>
                                <th>Sr No</th>
                                <th>Name</th>
                                <th>Invoice Id</th>
                                <th>Taka</th> 
                                <th>Month</th>
                                <th>Status</th>
                                <th>Due</th>
                                <th>Type</th>
                                <th>Note</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="letestInvoiceTbody">
                           
                        </tbody>
                        <tfoot>
                          <tr class="">
                            <td colspan="5"></td>
                            <td>Total Due</td>
                            <td class="totalamountdue text-center"></td>
                            <td colspan="3"></td>
                          </tr>
                        </tfoot>
                    </table>
                </div>
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

  {{-- invoice edit html code start form here --}}
  <div class="modal fade" id="invoiceUpdateModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-lg ">
      <div class="modal-content">
        <div class="modal-header">
          <h6>PJS Coahing Center Invoice Update Show Status</h6>
          <div class="classEditData">
            <h4></h4>
          </div>
        </div>
        <form id="invoiceUpdateForm"> 
            @csrf 
            <div class="modal-body p-4 bg-light">
              <input type="hidden" id="invoiceHiddTaka" name="invoiceHiddTaka">
            <input type="hidden" id="invoiceupdateId" name="invoiceupdateId">
            <div class="form-row m-auto">
              <div class="col-lg-4 m-auto">
                <label>Invoice Change:</label>
                <select name="upinvoiceStatus" id="upinvoiceStatus" class="form-select">
                  <option value="Unpaid">Unpaid</option>
                  <option value="Paid">Paid</option>
                </select>
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
              <button type="submit" id="updateInvoice" class="btn btn-primary">Update</button>
            </div>
        </form>
      </div>
    </div>
  </div>
    {{-- invoice edit html code end form here --}}
@endsection
@section('script')
   <script type="text/javascript">
     $(document).ready(function () {
        $(".alert").delay(3000).slideUp(200, function() {
	        $(this).alert('close');
	    });
        invoiceForm();
        getInvoice();
        invoiceUpdate();
     });

     function invoiceForm(){
  $("#invoiceForm").validate({
      rules:{
          invoice_month:{required:true} 
      },
      messages:{
          invoice_month:"Please Invoice Month And Year"
      }
  });
}


function getInvoice(){
var url = "/admin/letestInvoice";
  axios.get(url)
  .then(function(response) {
  if (response.status == 200) {
      $('#invoiceTable').removeClass('d-none');
      $('.DisplayLoader').addClass('d-none');

      $('#invoiceTable').DataTable().destroy();
      $('.letestInvoiceTbody').empty();

      var getinvoiveData = response.data;
      $.each(getinvoiveData, function(i) {
      var id = "<td>" + getinvoiveData[i].id + "</td>";
      var name = "<td>" + getinvoiveData[i].invoice_name + "</td>";
      var invoiceId = "<td>" + getinvoiveData[i].invoice_id + "</td>";
      var taka = "<td>" + getinvoiveData[i].invoice_taka + "</td>";
      var month = "<td>" + getinvoiveData[i].invoice_month + "</td>";
      if(getinvoiveData[i].invoice_status == 0){
          var status = "<td><p class='unpaid'>Unpaid</p></td>";
      }else{
          var status = "<td><p class='paid'>Paid</p></td>";
      }

      var due = "<td class='due'>" + getinvoiveData[i].invoice_due+"</td>";
      var type = "<td>" + getinvoiveData[i].invoice_type + "</td>";
      var note = "<td>" + getinvoiveData[i].invoice_note + "</td>";
      var edit = "<td class='editTd'><i class='editButton fa fa-edit' data-edit='" + getinvoiveData[i].id + "'></i></td>";
      
      $('<tr>').html(id+name+invoiceId+taka+month+status+due+type+note+edit).appendTo('.letestInvoiceTbody');

      });
     
      $('.editButton').click(function(){
          var id = $(this).data('edit');
          $("#invoiceUpdateModal").modal('show');
          invoiceUpdateShow(id);
          $('.classEditData h4').html(id);
      });

      $("#invoiceTable").DataTable();
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

  var totalUrl = "/admin/totalAmountDue";
  axios.get(totalUrl)
  .then(function(response){
    if(response.status == 200){
      $('td.totalamountdue').empty();
      var totalAmountDue = response.data;
      $("<span>").html(totalAmountDue).appendTo("td.totalamountdue");
    }
  })
  .catch(function(error){
    
  })

}

function invoiceUpdateShow(id){
  var Showid = {id:id}
	var url = "/admin/invoiceUpdateShoe";
	 axios.post(url,Showid)
  .then(function(response) {
    if (response.status == 200) {
     $('.EditLoaderSpan').addClass('d-none');
        var InvoiceShowData = response.data;
        $("#invoiceupdateId").val(InvoiceShowData[0].id);
        $("#invoiceHiddTaka").val(InvoiceShowData[0].invoice_taka);
        (InvoiceShowData[0].invoice_status == 0) ? $("#upinvoiceStatus").val('Unpaid') : $("#upinvoiceStatus").val('Paid');
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

function invoiceUpdate(){
  $("#invoiceUpdateForm").submit(function (e) { 
    e.preventDefault();
    const fd = new FormData(this);
    var addloader = "<span class='sppener'></span>";
    $('#updateInvoice').html(addloader);

      $.ajax({
        url: '/admin/invoiceUpdate',
        method:'post',
        data: fd,
        cache: false,
        contentType: false,
        processData: false,
        success: function(response) {
          swal("Updated", "Updated SuucessFully!", "success");
          getInvoice();
          $("#invoiceUpdateModal").modal('hide');
          setTimeout( () =>{
            $('#updateInvoice').html('Update');
          },1000);
        },
        error: function(error) {
          swal("Faild", "Your Data Updated Faild");
          getInvoice();
          $("#invoiceUpdateModal").modal('hide');
          setTimeout( () => {
            $('#updateInvoice').html('Update');
          },1000);
        }
      });
    
  });
}
     
   </script>
@endsection