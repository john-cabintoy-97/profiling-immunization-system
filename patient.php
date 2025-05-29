<?php  session_start(); 
 if(!isset($_SESSION['profiling_immunization_admin_token'])){
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

    <title>Profiling Immunization | User Patient</title>

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
                     $user_list = $controller->getAllregisterdpatients(); 
                  
                ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Users</li>
                            <li class="breadcrumb-item active" aria-current="page">Patient List</li>
                        </ol>
                    </nav>
                    <div class="card shadow mb-4 wow fadeIn slow">
                        <div class="card-header bg-custom py-3 ">
                            <h6 class="m-0 font-weight-bold text-white">Registerd patients List</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th><strong>#</strong></th>
                                            <th><strong>Name</strong></th>
                                            <th><strong>Email</strong></th>

                                            <th><strong>Date of Registration</strong></th>
                                            <th><strong>Action</strong></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th><strong>#</strong></th>
                                            <th>Name</th>
                                            <th>Email</th>

                                            <th>Date of Registration</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $counter = 1; foreach($user_list as $lists): ?>
                                        <tr>
                                            <td><?= $counter++; ?></td>
                                            <td><?= $lists->firstname . " ". $lists->lastname; ?>
                                            </td>
                                            <td><?= $lists->email; ?></td>

                                            <td><?= date("m-d-Y",strtotime($lists->timestamp)); ?></td>
                                            <td>
                                                <div class="d-flex">
                                                    <?php $name = $lists->firstname . " ". $lists->lastname; ?>
                                                    <button
                                                        onclick="changepassworbyadmin('<?= $lists->users_id; ?> ',' <?= $name; ?>')"
                                                        class="btn btn-sm btn-warning"><i
                                                            class="fas fa-key"></i></button>
                                                    <button onclick="user_delete(<?= $lists->users_id; ?>)"
                                                        class="btn btn-sm btn-danger"><i
                                                            class="fas fa-trash"></i></button>
                                                </div>
                                            </td>
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