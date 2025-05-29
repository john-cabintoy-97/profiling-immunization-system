<?php

 include_once "controllers.php";
 $controller = new Controller();

if($controller->isAdmin() == 0){
    header('location: setup.php');
}
 ?>
<nav class="navbar navbar-expand navbar-light navbar-default  bg-custom topbar mb-4 static-top shadow fixed">
    <button id="sidebarToggleTop" class="btn btn-link d-md-none text-white mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Search -->
    <!-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form> -->
    <div class="show-lg">
        <h1 class="h5 mb-0 text-gray-1000 title-sm"><a class="link-custom" href="index.php">Profiling Immunization
                System</a></h1>
    </div>

    <div class="d-sm-none">
        <h1 class="h5 mb-0 text-gray-1000"><a class="link-custom" href="index.php">Profiling Immunization</a></h1>
    </div>

    <!-- Topbar Navbar -->
    <?php if(!isset($_SESSION['admin'])): ?>

    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <!-- <li class="dropdown no-arrow mx-1">
            <form class="nav-link d-none d-lg-block.d-xl-none d-xl-block form-inline ">
                <div class="input-group ">
                    <input type="text" class="form-control border-0  mt-2 small" placeholder="Search for..."
                        aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-custom" type="button">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>
        </li> -->

        <!-- Nav Item - Alerts -->
        <?php
            $patient_list_alert = $controller->getAllpatientAlert(); 
                  
        ?>
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <!-- <span class="badge badge-danger badge-counter"><?php if(isset($_SESSION['count_new_data'])){ echo $_SESSION['count_new_data']; }?></span> -->
            </a>
            <!-- Dropdown - Alerts -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header bg-custom">
                    Alerts Center
                </h6>
                <?php foreach($patient_list_alert as $plist): ?>
                <a class="dropdown-item d-flex align-items-center"
                    href="view-enrolled.php?view=<?= $controller->urlEncode($plist->patient_id); ?>">
                    <div class="mr-3">
                        <div class="icon-circle bg-primary">
                            <i class="fas fa-user text-white"></i>
                        </div>
                    </div>
                    <div>
                        <div class="small text-gray-500"><?= date("m-d-Y",strtotime($plist->timestamp)); ?></div>
                        <span
                            class="font-weight-thin"><?= $plist->firstname . " " . $plist->middlename[0]. ". " . $plist->lastname . " " . $plist->suffix; ?></span>
                    </div>
                </a>
                <?php endforeach; ?>
                <a class="dropdown-item text-center small text-gray-500" href="patients-record.php">Show All</a>
            </div>
        </li>


        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <?php if(isset($_SESSION['profiling_immunization_staff_token'])): ?>
                <span
                    class="mr-2 d-none d-lg-inline text-white-600 small"><?php if(isset($_SESSION['profiling_immunization_staff_token'])){ echo $_SESSION['profiling_immunization_staff_token']; } ?></span>
                <?php else: ?>
                <span
                    class="mr-2 d-none d-lg-inline text-white-600 small"><?php if(isset($_SESSION['profiling_immunization_admin_token'])){ echo "administrator"; } ?></span>
                <?php endif; ?>

                <img class="img-profile rounded-circle" src="public/img/undraw_profile.svg">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#userProfileModal">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                </a>

                <div class="dropdown-divider"></div>
                <?php if(isset($_SESSION['profiling_immunization_staff_token'])): ?>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#stafflogoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
                <?php else: ?>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#adminlogoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
                <?php endif; ?>

            </div>
        </li>

    </ul>

    <?php endif; ?>



</nav>