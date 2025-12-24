<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon">
            @if (setting()->logo)
                <img src="/upload/{{ setting()->logo }}" alt="" width="80px">    
            @endif
            <img src="/upload/default.png" alt="" width="80px">
        </div>
        <div class="sidebar-brand-text">{{ setting()->name_short }}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="/">
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
        <a class="nav-link {{Request::is('academy*')?'':'collapsed'}}" href="#" data-toggle="collapse" data-target="#academy"
            aria-expanded="true" aria-controls="academy">
            <i class="fas fa-fw fa-home"></i>
            <span>Acamedic</span>
        </a>
        <div id="academy" class="collapse {{Request::is('academy*')?'show':''}}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{Request::is('academy/class*')?'active':''}}" href="{{route('class.index')}}"><i class="fas fa-fw fa-arrow-right mr-2"></i> Class</a>
                <a class="collapse-item {{Request::is('academy/section*')?'active':''}}" href="{{route('section.index')}}"><i class="fas fa-fw fa-arrow-right mr-2"></i> Section</a>
                <a class="collapse-item {{Request::is('academy/session*')?'active':''}}" href="{{route('session.index')}}"><i class="fas fa-fw fa-arrow-right mr-2"></i> Session</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link {{Request::is('student*')?'':'collapsed'}}" href="#" data-toggle="collapse" data-target="#student"
            aria-expanded="true" aria-controls="student">
            <i class="fas fa-fw fa-home"></i>
            <span>Student</span>
        </a>
        <div id="student" class="collapse {{Request::is('student*')?'show':''}}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{Request::is('student/create*')?'active':''}}" href="{{route('student.create')}}"><i class="fas fa-fw fa-arrow-right mr-2"></i> Create</a>
                <a class="collapse-item {{Request::is('student/index*')?'active':''}}" href="{{route('student.index')}}"><i class="fas fa-fw fa-arrow-right mr-2"></i> List</a>
            </div>
        </div>
    </li>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link {{Request::is('setting*')?'':'collapsed'}}" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Setting</span>
        </a>
        <div id="collapsePages" class="collapse {{Request::is('setting*')?'show':''}}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{Request::is('setting/division*')?'active':''}}" href="{{ route('division.index') }}"> <i class="fas fa-fw fa-arrow-right mr-2"></i>Division</a>
                <a class="collapse-item {{Request::is('setting/district*')?'active':''}}" href="{{ route('district.index') }}"> <i class="fas fa-fw fa-arrow-right mr-2"></i>District</a>
                <a class="collapse-item {{Request::is('setting/upazila*')?'active':''}}" href="{{ route('upazila.index') }}"> <i class="fas fa-fw fa-arrow-right mr-2"></i>Upazila</a>
                <a class="collapse-item {{Request::is('setting/blood_group*')?'active':''}}" href="{{ route('blood_group.index') }}"> <i class="fas fa-fw fa-arrow-right mr-2"></i>Blood Group</a>
                <a class="collapse-item {{Request::is('setting/gender*')?'active':''}}" href="{{ route('gender.index') }}"> <i class="fas fa-fw fa-arrow-right mr-2"></i>Gender</a>
                <a class="collapse-item {{Request::is('setting/religion*')?'active':''}}" href="{{ route('religion.index') }}"> <i class="fas fa-fw fa-arrow-right mr-2"></i>Religion</a>
                <a class="collapse-item {{Request::is('setting/role')?'active':''}}" href="{{ route('role.index') }}"> <i class="fas fa-fw fa-arrow-right mr-2"></i>Role</a>
                <a class="collapse-item {{Request::is('setting/user')?'active':''}}" href="{{ route('user.index') }}"> <i class="fas fa-fw fa-arrow-right mr-2"></i>User</a>
                <a class="collapse-item {{Request::is('setting/site_setting')?'active':''}}" href="{{ route('site_setting.index') }}"> <i class="fas fa-fw fa-arrow-right mr-2"></i>Site Setting</a>
            </div>
        </div>
    </li>
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->