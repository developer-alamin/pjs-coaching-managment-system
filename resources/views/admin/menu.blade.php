 <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="{{ url('admin/') }}">PJS Coaching</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fa fa-bars"></i></button>
</nav>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <a class="nav-link" href="{{ url('/test') }}">
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
                            <a class="nav-link before" href="">Class Category</a>
                        </nav>
                    </div>
                    <a class="nav-link collapsed" href="" data-bs-toggle="collapse" data-bs-target="#department" aria-expanded="false" aria-controls="department">
                        <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                        Department
                        <div class="sb-sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="department" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link before" href="">Department Category</a>
                        </nav>
                    </div>
                    <a class="nav-link collapsed" href="" data-bs-toggle="collapse" data-bs-target="#taka" aria-expanded="false" aria-controls="taka">
                        <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                        Taka
                        <div class="sb-sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="taka" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link before" href="">Taka Category</a>
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
                             <a class="nav-link before" href="{{ url('admin/addregister') }}">Add Register</a>
                            <a class="nav-link before" href="{{ url('admin/viewregister') }}">View Register</a>
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
                        User
                        <div class="sb-sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
                    </a>
                     <div class="collapse" id="userpage" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link before" href="">Logout</a>
                        </nav>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                
            