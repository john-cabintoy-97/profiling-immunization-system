<ul class="navbar-nav sidebar  toggled sidebar-dark accordion" id="accordionSidebar">
    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="dashboard.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Immunization
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-hospital-user"></i>
            <span>Patients</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Patients Components:</h6>
                <a class="collapse-item" href="manual.php">Patients Enrollement Form</a>
                <a class="collapse-item" href="patients-record.php">Patients Enrollement Record</a>
                <a class="collapse-item" href="individual-treatment-list.php">Individual Treatment Record</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapset" aria-expanded="true"
            aria-controls="collapset">
            <i class="fas fa-book"></i>
            <span>Logs</span>
        </a>
        <div id="collapset" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Logs Components:</h6>
                <a class="collapse-item" href="schedule_post_logs.php">Schedule POST logs</a>
                <a class="collapse-item" href="schedule_sms_logs.php">Schedule SMS logs</a>
            </div>
        </div>
    </li>
    <?php if(isset($_SESSION['profiling_immunization_admin_token'])): ?>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true"
            aria-controls="collapseThree">
            <i class="fas fa-users"></i>
            <span>Users</span>
        </a>
        <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Users Components:</h6>
                <a class="collapse-item" href="patient.php">Patients List</a>
                <a class="collapse-item" href="staff.php">Staff List</a>
            </div>
        </div>
    </li>
    <?php endif; ?>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>



</ul>