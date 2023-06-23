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
    <style>
      button.btn.btn-primary a{
        color: white;
        text-decoration: none;
        font-weight: bolder;
      }
    </style>
</head>
<body>
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
                <div class="col-md-4 mb-3">
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
                <div class="col-md-8">
                    <div class="card mb-3">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-6">
                            <div class="row">
                              <div class="col-sm-3">
                                <h6 class="mb-0">{{ __('Full Name') }}</h6>
                              </div>
                              <div class="col-sm-9 text-secondary">
                                {{ $data->student_name; }}
                              </div>
                            </div>
                            <hr>
                            <div class="row">
                              <div class="col-sm-3">
                                <h6 class="mb-0">{{ __('Email') }}</h6>
                              </div>
                              <div class="col-sm-9 text-secondary">
                                {{ $data->student_email; }}
                              </div>
                            </div>
                            <hr>
                            <div class="row">
                              <div class="col-sm-3">
                                <h6 class="mb-0">{{ __('Student Id') }}</h6>
                              </div>
                              <div class="col-sm-9 text-secondary">
                               {{$data->student_studentId;}}
                              </div>
                            </div>
                            <hr>
                            <div class="row">
                              <div class="col-sm-3">
                                <h6 class="mb-0">{{ __('Mobile') }}</h6>
                              </div>
                              <div class="col-sm-9 text-secondary">
                                {{ $data->student_phone; }}
                              </div>
                            </div>
                            <hr>
                            <div class="row">
                              <div class="col-sm-12">
                                <a class="btn btn-info " target="__blank" href="https://www.bootdey.com/snippets/view/profile-edit-data-and-skills">Edit</a>
                              </div>
                            </div>
                          </div>
                          <div class="col-6">
                            <div class="row">
                              <div class="col-sm-3">
                                <h6 class="mb-0">{{ __('Category') }}</h6>
                              </div>
                              <div class="col-sm-9 text-secondary">
                                {{ $data->student_category; }}
                              </div>
                            </div>
                            <hr>
                            <div class="row">
                              <div class="col-sm-3">
                                <h6 class="mb-0">{{ __('Class') }}</h6>
                              </div>
                              <div class="col-sm-9 text-secondary">
                                {{ $data->student_class; }}
                              </div>
                            </div>
                            <hr>
                            <div class="row">
                              <div class="col-sm-3">
                                <h6 class="mb-0">{{ __('Taka') }}</h6>
                              </div>
                              <div class="col-sm-9 text-secondary">
                                {{ $data->student_taka; }}
                              </div>
                            </div>
                            <hr>
                            <div class="row">
                              <div class="col-sm-3">
                                <h6 class="mb-0">{{ __('Village') }}</h6>
                              </div>
                              <div class="col-sm-9 text-secondary">
                                {{ $data->student_village; }}
                              </div>
                            </div>
                            <hr>
                            
                          </div>
                        </div>
                      </div>
                    </div>
                    </div>
              </div>
            </div>
        </div>
      
  <!-- JQuery js start form here -->
  <script type="text/javascript" src="{{ asset('../js/jquery.min.js') }}"></script>
  <!-- popper min js start form here -->
  <script type="text/javascript" src="{{ asset('../js/popper.min.js') }}"></script>
  <!-- bootstrap min js start form here -->
  <script type="text/javascript" src="{{ asset('../js/bootstrap.min.js') }}"></script>
   {{-- jquery validation plugin cdn start form here --}}
  <script>
    $(document).ready(function() {
      $(".alert").delay(3000).slideUp(200, function() {
          $(this).alert('close');
      });
    });
  </script>
</body>
</html>