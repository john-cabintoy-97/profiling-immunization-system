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

    <title>Profiling Immunization | Patients Record</title>

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
                    $patient_list = $controller->getAllpatient();
                 
                    
                ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Patients</li>
                            <li class="breadcrumb-item active" aria-current="page">Patients Enrollement Record</li>
                        </ol>
                    </nav>
                    <div class="card shadow mb-4 wow fadeIn slow">
                        <div class="card-header bg-custom py-3">
                            <h6 class="m-0 font-weight-bold text-white">Patients Enrollement Record</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th><strong>#</strong></th>
                                            <th><strong>Child Name</strong></th>
                                            <th><strong>Mothers Name</strong></th>
                                            <th><strong>Address</strong></th>

                                            <th><strong>Date of Registration</strong></th>
                                            <th><strong>Action</strong></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th><strong>#</strong></th>
                                            <th>Child Name</th>
                                            <th>Mothers Name</th>
                                            <th>Address</th>
                                            <th>Date of Registration</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                            $counter = 1;
                                            foreach($patient_list as $lists): 
                                               date_default_timezone_set('Asia/Manila');
                                               $dateNow = new DateTime();
                                               $origanal_schedule = new DateTime($lists->schedule);
                                               $schedule = new DateTime($lists->schedule);
                                         ?>
                                        <?php if(($origanal_schedule->format('Y-m-d') >= $dateNow->format('Y-m-d') || trim($lists->schedule) == '0000-00-00') || $lists->schedule_status == "approved"): ?>
                                        <?php if(($controller->isPatientGraduated($lists->patient_id) == 0) && ($lists->schedule_status == "approved")): ?>
                                        <?php 
                                            $controller->isGraduated($lists->patient_id);
                                        ?>
                                        <tr data-toggle="tooltip" data-placement="bottom"
                                            title="Complete Vaccinated  / <?= date("m-d-Y",strtotime($controller->completeVacDate($lists->patient_id)) ); ?>">
                                            <td class="bg-success-custom"><?= $counter++; ?></td>
                                            <td><?= $lists->firstname . " " . $lists->middlename[0]. ". " . $lists->lastname . " " . $lists->suffix; ?>
                                            </td>
                                            <td><?= $lists->mothersname; ?></td>
                                            <td><?= $lists->residentialAddress	; ?></td>
                                            <td><?= date("m-d-Y",strtotime($lists->timestamp)); ?></td>
                                            <td>
                                                <div class="d-flex justify-items-center">
                                                    <a href="view-enrolled.php?view=<?= $controller->urlEncode($lists->patient_id); ?>"
                                                        class="btn btn-sm text-white bg-custom mr-2">view</a>
                                                    <a href="interview.php?view=<?= $controller->urlEncode($lists->patient_id); ?>"
                                                        class="btn btn-sm btn-info mr-2">interview</a>
                                                   
                                                    <a href="#" class="btn btn-sm btn-warning mr-2">schedule</a>
                                                    <a href="#" class="btn btn-sm btn-success mr-2">individual</a>

                                                </div>
                                            </td>
                                        </tr>
                                        <?php elseif($origanal_schedule->format('Y-m-d') == $dateNow->format('Y-m-d') && ((trim($lists->schedule) == '0000-00-00') || ($lists->schedule_status == "pending"))): ?>
                                            <?php $controller->notGraduated($lists->patient_id); ?>
                                            <tr data-toggle="tooltip" data-placement="bottom"  title="Schedule today">
                                            <td class="bg-today-custom"><?= $counter++; ?></td>
                                            <td><?= $lists->firstname . " " . $lists->middlename[0]. ". " . $lists->lastname . " " . $lists->suffix; ?>
                                            </td>
                                            <td><?= $lists->mothersname; ?></td>
                                            <td><?= $lists->residentialAddress	; ?></td>
                                            <td><?= date("m-d-Y",strtotime($lists->timestamp)); ?></td>
                                            <td>
                                                <div class="d-flex justify-items-center">
                                                    <a href="view-enrolled.php?view=<?= $controller->urlEncode($lists->patient_id); ?>"
                                                        class="btn btn-sm text-white bg-custom mr-2">view</a>
                                                    <a href="interview.php?view=<?= $controller->urlEncode($lists->patient_id); ?>"
                                                        class="btn btn-sm btn-info mr-2">interview</a>

                                                    <a href="#" onclick="schedule(<?= $lists->patient_id; ?>)"
                                                        class="btn btn-sm btn-warning mr-2">schedule</a>
                                                    <a href="#" onclick="individual(<?= $lists->patient_id; ?>)"
                                                        class="btn btn-sm btn-success mr-2">individual</a>

                                                </div>
                                            </td>
                                        </tr>
                                        <?php elseif($origanal_schedule->format('Y-m-d') > $dateNow->format('Y-m-d') && ((trim($lists->schedule) == '0000-00-00') || ($lists->schedule_status == "pending"))): ?>
                                            <?php $controller->notGraduated($lists->patient_id); ?>
                                            <tr data-toggle="tooltip" data-placement="bottom"  title="Scheduled: <?= date("m-d-Y",strtotime($lists->schedule)); ?>">
                                            <td><?= $counter++; ?></td>
                                            <td><?= $lists->firstname . " " . $lists->middlename[0]. ". " . $lists->lastname . " " . $lists->suffix; ?>
                                            </td>
                                            <td><?= $lists->mothersname; ?></td>
                                            <td><?= $lists->residentialAddress	; ?></td>
                                            <td><?= date("m-d-Y",strtotime($lists->timestamp)); ?></td>
                                            <td>
                                                <div class="d-flex justify-items-center">
                                                    <a href="view-enrolled.php?view=<?= $controller->urlEncode($lists->patient_id); ?>"
                                                        class="btn btn-sm text-white bg-custom mr-2">view</a>
                                                    <a href="interview.php?view=<?= $controller->urlEncode($lists->patient_id); ?>"
                                                        class="btn btn-sm btn-info mr-2">interview</a>

                                                    <a href="#" onclick="schedule(<?= $lists->patient_id; ?>)"
                                                        class="btn btn-sm btn-warning mr-2">schedule</a>
                                                    <a href="#" onclick="individual(<?= $lists->patient_id; ?>)"
                                                        class="btn btn-sm btn-success mr-2">individual</a>

                                                </div>
                                            </td>
                                        </tr>
                                        <?php else: ?>
                                        <?php $controller->notGraduated($lists->patient_id); ?>
                                        <tr data-toggle="tooltip" data-placement="bottom"  title="No schedule yet">
                                            <td><?= $counter++; ?></td>
                                            <td><?= $lists->firstname . " " . $lists->middlename[0]. ". " . $lists->lastname . " " . $lists->suffix; ?>
                                            </td>
                                            <td><?= $lists->mothersname; ?></td>
                                            <td><?= $lists->residentialAddress	; ?></td>
                                            <td><?= date("m-d-Y",strtotime($lists->timestamp)); ?></td>
                                            <td>
                                                <div class="d-flex justify-items-center">
                                                    <a href="view-enrolled.php?view=<?= $controller->urlEncode($lists->patient_id); ?>"
                                                        class="btn btn-sm text-white bg-custom mr-2">view</a>
                                                    <a href="interview.php?view=<?= $controller->urlEncode($lists->patient_id); ?>"
                                                        class="btn btn-sm btn-info mr-2">interview</a>

                                                    <a href="#" onclick="schedule(<?= $lists->patient_id; ?>)"
                                                        class="btn btn-sm btn-warning mr-2">schedule</a>
                                                    <a href="#" onclick="individual(<?= $lists->patient_id; ?>)"
                                                        class="btn btn-sm btn-success mr-2">individual</a>

                                                </div>
                                            </td>
                                        </tr>
                                        <?php endif; ?>
                                        <?php else: ?>
                                        <?php 
                                            $diff = $origanal_schedule->diff($dateNow);
                                            $late_status =  $controller->format_interval($diff) . " late"; ?>
                                        <tr data-toggle="tooltip" data-placement="bottom" title="<?= $late_status ?>">
                                            <td class="bg-danger-custom"><?= $counter++; ?></td>
                                            <td><?= $lists->firstname . " " . $lists->middlename[0]. ". " . $lists->lastname . " " . $lists->suffix; ?>
                                            </td>
                                            <td><?= $lists->mothersname; ?></td>
                                            <td><?= $lists->residentialAddress	; ?></td>
                                            <td><?= date("m-d-Y",strtotime($lists->timestamp)); ?></td>
                                            <td>
                                                <div class="d-flex justify-items-center">
                                                    <a href="view-enrolled.php?view=<?= $controller->urlEncode($lists->patient_id); ?>"
                                                        class="btn btn-sm text-white bg-custom mr-2">view</a>
                                                    <a href="interview.php?view=<?= $controller->urlEncode($lists->patient_id); ?>"
                                                        class="btn btn-sm btn-info mr-2">interview</a>

                                                    <a href="#" onclick="schedule(<?= $lists->patient_id; ?>)"
                                                        class="btn btn-sm btn-warning mr-2">schedule</a>
                                                    <a href="#" onclick="individual(<?= $lists->patient_id; ?>)"
                                                        class="btn btn-sm btn-success mr-2">individual</a>

                                                </div>
                                            </td>
                                        </tr>

                                        <?php endif; ?>

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