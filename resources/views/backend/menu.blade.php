 <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="{{ url('admin/') }}">{{ $data->admin_name; }}</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fa fa-bars"></i></button>
    {{-- <img src="{{ asset('img/pjs.jpg') }}" alt=""> --}}
     <!-- Navbar Search-->
     <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        <div class="input-group">
            <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
            <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
        </div>
    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><img class="adminImg" src="{{ $data->admin_img; }}" alt=""></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="">Profile</a></li>
                <li><a class="dropdown-item" href="">Logout</a></li>
            </ul>
        </li>
    </ul>
</nav>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <a class="nav-link" href="{{ url('/admin') }}">
                        <div class="sb-nav-link-icon"><i class="fa fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <div class="managment"><h6>Category Managment</h6></div>
                    <a class="nav-link collapsed" href="" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                        <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                        Class
                        <div class="sb-sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapsePages" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link before" href="{{ url('admin/addClass') }}">Class Category</a>
                        </nav>
                    </div>
                    <a class="nav-link collapsed" href="" data-bs-toggle="collapse" data-bs-target="#department" aria-expanded="false" aria-controls="department">
                        <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                        Department
                        <div class="sb-sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="department" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link before" href="{{ route('depertment') }}">Department Category</a>
                        </nav>
                    </div>
                    <a class="nav-link collapsed" href="" data-bs-toggle="collapse" data-bs-target="#taka" aria-expanded="false" aria-controls="taka">
                        <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                        Taka
                        <div class="sb-sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="taka" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link before" href="{{ route('view.taka') }}">Taka Category</a>
                        </nav>
                    </div>



                    <div class="managment"><h6>Register Managment</h6></div>
                    <a class="nav-link collapsed" href="" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fa fa-users"></i></div>
                        Register
                        <div class="sb-sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                             <a class="nav-link before" href="{{ url('admin/addregister') }}">Add Student</a>
                            <a class="nav-link before" href="{{ url('admin/viewregister') }}">View Student</a>
                        </nav>
                    </div> 
                    <div class="managment"><h6>Student Managment</h6></div>
                    <a class="nav-link collapsed" href="" data-bs-toggle="collapse" data-bs-target="#studentmanagment" aria-expanded="false" aria-controls="studentmanagment">
                        <div class="sb-nav-link-icon"><i class="fa fa-users"></i></div>
                        Student
                        <div class="sb-sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="studentmanagment" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link before" href="{{ url('admin/five') }}">View Five</a>
                             <a class="nav-link before" href="{{ url('admin/six') }}">View Six</a>
                             <a class="nav-link before" href="{{ url('admin/seven') }}">View Seven</a>
                             <a class="nav-link before" href="{{ url('admin/eight') }}">View Eight</a>
                             <a class="nav-link before" href="{{ url('admin/nine') }}">View Nine</a>
                             <a class="nav-link before" href="{{ url('admin/ten') }}">View Ten</a>
                             <a class="nav-link before" href="{{ url('admin/ssc') }}">View SSC</a>
                             <a class="nav-link before" href="{{ url('admin/collage') }}">View Collage</a>
                             <a class="nav-link before" href="{{ url('admin/hsc') }}">View HSC</a>
                        </nav>
                    </div>
                    <div class="managment"><h6>User Setting</h6></div>
                    <a class="nav-link collapsed" href="" data-bs-toggle="collapse" data-bs-target="#userpage" aria-expanded="false" aria-controls="collapsePages">
                        <div class="sb-nav-link-icon"><i class="fa fa-user"></i></div>
                        Admin
                        <div class="sb-sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
                    </a>
                     <div class="collapse" id="userpage" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link before" href="">Add Admin</a>
                        </nav>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                
            