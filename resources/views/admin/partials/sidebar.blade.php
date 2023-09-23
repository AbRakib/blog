<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">DevNews <sup>up</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Posts</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Post Components:</h6>
                <a class="collapse-item" href="{{route('admin.posts')}}">Post Total</a>
                <a class="collapse-item" href="{{route('admin.post.add')}}">Post Add</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Categories Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCategories"
            aria-expanded="true" aria-controls="collapseCategories">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Categories</span>
        </a>
        <div id="collapseCategories" class="collapse" aria-labelledby="headingCategories"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Category Components:</h6>
                <a class="collapse-item" href="">Category Total</a>
                <a class="collapse-item" href="">Category Add</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Comments Collapse Menu  -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseComments"
            aria-expanded="true" aria-controls="collapseComments">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Comments</span>
        </a>
        <div id="collapseComments" class="collapse" aria-labelledby="headingComments"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Comment Components:</h6>
                <a class="collapse-item" href="">Comment Total</a>
                <a class="collapse-item" href="">Comment Add</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        System
    </div>

    <!-- Nav Item - Users -->
    <li class="nav-item">
        <a class="nav-link" href="">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Users</span></a>
    </li>

    <!-- Nav Item - Settings -->
    <li class="nav-item">
        <a class="nav-link" href="Settings.html">
            <i class="fas fa-fw fa-table"></i>
            <span>Settings</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->
    <div class="sidebar-card d-none d-lg-flex">
        <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
        <p class="text-center mb-2"><strong>Personal Help</strong> If you need any help about web design, web development, seo, Project Idea Contact Us. Email: abrakib.cse@gmail.com</p>
        <a class="btn btn-success btn-sm" href="">Upgrade to Pro!</a>
    </div>

</ul>