<?php  session_start(); 
 if(!isset($_SESSION['profiling_immunization_staff_token']) && !isset($_SESSION['profiling_immunization_admin_token'])){
    header("location: index.php");
 } 


?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Profiling Immunization | Dashboard</title>

    <?php require "libs/css_lib.php"; ?>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <?php include_once 'sidebar.php'; ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include_once 'navbar.php'; ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>

                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <?php if(isset($_SESSION['profiling_immunization_admin_token'])): ?>
                        <div class="col-lg-12 row">
                            <!-- Patient Enrolled Card Example -->
                            <div class="col-xl-3 col-md-6  mb-4">
                                <div class="card border-left-info shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div
                                                    class="text-xs font-weight-bold custom-text-color-1 text-uppercase mb-1">
                                                    Patients Enrolled</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <?= $controller->statusPatientCount(); ?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-hospital-user fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                    Interview</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <?= $controller->statusUsersCount(); ?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-users fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-info shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                    Individual treatment</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <?= $controller->statusIndividualCount(); ?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-hospital-user fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-danger shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                    Patient Late in schedule</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <?= $controller->late_patient(); ?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-clock fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php else: ?>
                        <div class="col-lg-12 row">
                            <!-- Patient Enrolled Card Example -->
                            <div class="col-xl-3 col-md-6  mb-4">
                                <div class="card border-left-info shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div
                                                    class="text-xs font-weight-bold custom-text-color-1 text-uppercase mb-1">
                                                    Patients Enrolled</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <?= $controller->statusPatientCount(); ?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-hospital-user fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                    Interview</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <?= $controller->statusUsersCount(); ?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-users fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-info shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                    Individual treatment</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <?= $controller->statusIndividualCount(); ?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-hospital-user fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-danger shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                    Patient Late in schedule</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <?= $controller->late_patient(); ?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-clock fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>

                    <!-- Content Row -->

                    <div class="row">
                        <div class="col-lg-4 p-0">
                            <!-- Pending Requests Card Example -->
                            <?php if(isset($_SESSION['profiling_immunization_admin_token'])): ?>
                            <div class="col-xl-12 col-md-6 mb-3">
                                <div class="card border-left-secondary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div
                                                    class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                                     Vaccinated total</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <?= $controller->statusIndividualCount(); ?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-syringe fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12 col-md-6 mb-3">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div
                                                    class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                     Vaccinated gradueted total</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <?= $controller->countVaccinatedGraduet(); ?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-syringe fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12 col-md-6 mb-4">
                                <div class="card border-left-warning shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                    Pending Staff Approval</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <?= $controller->getAlluserpending(); ?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-12">
                                <div class="card shadow mb-4 wow fadeInRight slow">
                                    <!-- Card Header - Dropdown -->
                                    <div
                                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold custom-text-color-1">Users Overview
                                        </h6>
                                    </div>
                                    <!-- Card Body -->
                                    <div class="card-body">
                                        <div class="chart-area">
                                            <canvas id="myPieChart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php else: ?>
                            <div class="col-xl-12 col-md-6 mb-3">
                                <div class="card border-left-secondary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div
                                                    class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                                    total Vaccinated</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <?= $controller->statusIndividualCount(); ?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-syringe fa-2x text-gray-300"></i>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12 col-md-6 mb-3">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div
                                                    class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                     Vaccinated gradueted total</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <?= $controller->countVaccinatedGraduet(); ?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-syringe fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           <!-- here -->
                           <div class="col-xl-12 col-lg-12 row pr-0">
                                <div class="col-sm-12 col-lg-12 p-2">
                                    <div class="card shadow mb-4 wow pulse slow">
                                        <!-- Card Header - Dropdown -->
                                        <div
                                            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                            <h6 class="m-0 font-weight-bold custom-text-color-1">Vaccinated Patients
                                                Overview
                                            </h6>
                                        </div>
                                        <!-- Card Body -->
                                        <div class="card-body ">
                                            <div class="chart-area">
                                                <canvas id="myAreaChartVaccinated"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <?php endif; ?>
                        </div>
                        <div class="col-lg-8">
                            <?php if(isset($_SESSION['profiling_immunization_admin_token'])): ?>
                            <div class="col-xl-12 col-lg-12 row p-0 pr-0">
                                <div class="col-sm-12 col-lg-12">
                                    <div class="card shadow mb-4 wow pulse slow">
                                        <!-- Card Header - Dropdown -->
                                        <div
                                            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                            <h6 class="m-0 font-weight-bold custom-text-color-1">Patients Enrolled
                                                Overview
                                            </h6>
                                        </div>
                                        <!-- Card Body -->
                                        <div class="card-body ">
                                            <div class="chart-area">
                                                <canvas id="myAreaChart"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-xl-12 col-lg-12 row p-0 pr-0">
                                <div class="col-sm-12 col-lg-12">
                                    <div class="card shadow mb-4 wow pulse slow">
                                        <!-- Card Header - Dropdown -->
                                        <div
                                            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                            <h6 class="m-0 font-weight-bold custom-text-color-1">Vaccinated Patients
                                                Overview
                                            </h6>
                                        </div>
                                        <!-- Card Body -->
                                        <div class="card-body ">
                                            <div class="chart-area">
                                                <canvas id="myAreaChartVaccinated"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <?php else: ?>
                            <!-- Area Chart -->
                            <div class="col-xl-12 col-lg-12 row  pr-0">
                                <div class="col-sm-12 col-lg-12 p-0">
                                    <div class="card shadow mb-4 wow pulse slow">
                                        <!-- Card Header - Dropdown -->
                                        <div
                                            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                            <h6 class="m-0 font-weight-bold custom-text-color-1">Patients Enrolled
                                                Overview
                                            </h6>
                                        </div>
                                        <!-- Card Body -->
                                        <div class="card-body ">
                                            <div class="chart-area">
                                                <canvas id="myAreaChart"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <?php endif; ?>
                            <!-- Pie Chart -->

                        </div>
                    </div>



                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Profiling Immunization System</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <?php include_once "modules/modal.php"; ?>

    <?php require "libs/js_lib.php"; ?>
</body>

</html>