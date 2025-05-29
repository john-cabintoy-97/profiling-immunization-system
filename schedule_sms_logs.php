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

    <title>Profiling Immunization | Logs SMS</title>

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
                <?php
                     $sched = $controller->getAllsmsLogs(); 
                  
                ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Logs</li>
                            <li class="breadcrumb-item active" aria-current="page">Schedule SMS Logs</li>
                        </ol>
                    </nav>
                    <div class="card shadow mb-4 wow fadeIn slow">
                        <div class="card-header bg-custom py-3">
                            <h6 class="m-0 font-weight-bold text-white">Schedule SMS Logs</h6>
                        </div>
                        <div class="card-body">
                            <?php if(isset($_SESSION['profiling_immunization_admin_token'])): ?>
                                <button class="btn btn-danger mb-3" onclick="schedulesmsDelete()">CLEAR ALL RECORDS</button>
                            <?php endif; ?>
                            
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th><strong>#</strong></th>
                                            <th><strong>Child Name</strong></th>
                                            <th><strong>Mobile number</strong></th>
                                            <th><strong>Schedule Time</strong></th>
                                            <th><strong>Schedule Date</strong></th>

                                            <th><strong>Send By</strong></th>
                                            <th><strong>Timestamp</strong></th>
                                         
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th><strong>#</strong></th>
                                            <th>Child Name</th>
                                            <th>Mobile number</th>
                                            <th>Schedule Time</th>
                                            <th>Schedule Date</th>
                                            <th>Send By</th>
                                            <th>Timestamp</th>
                                           
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $counter = 1; foreach($sched as $lists): ?>
                                        <tr>
                                            <td><?= $counter++; ?></td>
                                            <td><?= $lists->childname; ?>
                                            </td>
                                            <td><?= $lists->contactnumber; ?>
                                            </td>
                                            <td><?= date("h:i A",strtotime($lists->schedule_time)); ?></td>
                                            <td><?= date("m/d/Y",strtotime($lists->schedule_date)); ?></td>
                                            <td><?= $lists->sender_name; ?></td>
                                            <td><?= date("m-d-Y h:i A",strtotime($lists->timestamp)); ?></td>
                                          
                                          
                                        </tr>
                                        <?php endforeach; ?>

                                    </tbody>
                                </table>
                            </div>
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

    <?php include_once "modules/modal.php"; ?>

    <?php require "libs/js_lib.php"; ?>
</body>

</html>