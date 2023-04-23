@extends('admin.app')
@section('title','Admin | Test')
@section('content')
  <div class="testFormDiv mt-4">
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


    <form id="testForm" method="post" action="{{ route('CreateTest') }}" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <input type="text" name="name" class="form-control col-3" placeholder="Enter Your Name">
        <br>
        <select name="cate" class="form-select col-3"> 
          <option value="">Select Category</option>
           <option value="admin">Admin</option>
           <option value="user">User</option>
        </select>
        <br>
        <input type="file" name="image" class="form-control col-3"><br>
        <font>
          {{ ($errors->has('image'))?($errors->first('image')):'' }}
        </font>
        <input type="password" name="password" id="password" class="form-control col-3" placeholder="Enter Pass">
        <br>
       <input type="password" name="con_pass" class="form-control col-3" placeholder="Enter con_pass">
      </div>
      <input type="submit" id="TestSubmit" name="submit" class="form-control col-2" value="Submit">
    </form>
    <div class="showDiv">
      <h4></h4>
    </div>
  </div>
@endsection

@section('script')
<script type="text/javascript">
  $(document).ready(function() {
      $(".alert").delay(3000).slideUp(200, function() {
        $(this).alert('close');

    });

        $("#testForm").validate({
            rules: {
                name:{
                  required:true
                },
                email:{
                    required: true,
                    email: true
                },
                cate:{
                   required:true
                 },
                 image:{
                    required: true
                 },
                password: {
                    required: true,
                    minlength: 8
                },
                con_pass: {
                    required: true,
                    minlength: 8,
                    equalTo: "#password"
                }
            },
            messages: {
                name: "Please enter your name",
                cate: "Please Select Your Category",
                image : {
                    required: "Please Your Photo",
                    extension: 'only (png)'
                 },
                email: {
                    required: "Please enter a Email",
                    email: "a Valid Email"
                },
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 8 characters long"
                },
                con_pass: {
                    required: "Please Confirm Password",
                    minlength: "Your password must be at least 8 characters long",
                    equalTo: "Please enter the same password as above"
                }
            }
        });


  })




</script>
@endsection