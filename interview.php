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

    <title>Profiling Immunization | Patient Interview</title>

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
                <?php
                     $patient_id = $controller->urlDecode($_GET['view']);
                    
                ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid" id="interviewForm">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>

                            <li class="breadcrumb-item"><a href="patients-record.php">Patients List</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Interview</li>
                        </ol>
                    </nav>
                    <!-- form patient enrolled -->
                    <fieldset class="fieldset_form_one">
                        <?php include_once "form/form1.php"; ?>
                        <?php if(empty($patient->firstname) || empty($patient->lastname) || empty($patient->middlename) || empty($patient->gender) || empty($patient->birthdate) || empty($patient->mothersname) || empty($patient->address) || empty($patient->facilitycode) || empty($patient->se_status) || (empty($patient->first_time) && empty($patient->delivery))): ?>
                        <button type="button" class="btn btn-custom button-btn mb-3 btn-form1 next-fieldset"
                            disabled>Next Page
                            &nbsp;<i class="fas fa-angle-right"></i></button>
                        <?php else: ?>
                        <button type="button" class="btn btn-custom button-btn mb-3 btn-form1 next-fieldset">Next Page
                            &nbsp;<i class="fas fa-angle-right"></i></button>
                        <?php endif; ?>

                    </fieldset>
                    <!-- form end -->
                    <!-- form individual -->
                    <fieldset class="fieldset_form_two">
                        <?php include_once "form/form2.php"; ?>
                        <button type="button"
                            class="btn btn-custom button-btn mb-3 previous_two_btn previous-fieldset"><i
                                class="fas fa-angle-left"></i> &nbsp; Previous Page</button>
                        <?php if(empty($patient->length_birth) || empty($patient->weight_birth) || empty($patient->weight_birth_status) || (empty($patient->breast_feeding) || $patient->breast_feeding == "0000-00-00") || (empty($patient->bcg) || $patient->bcg == "0000-00-00") || (empty($patient->bbd) || $patient->bbd == "0000-00-00") || (empty($patient->nutrition_age_months) || $patient->nutrition_age_months == "0000-00-00") || empty($patient->nutrition_length) || (empty($patient->nutrition_length_date) || $patient->nutrition_length_date == "0000-00-00") || empty($patient->nutrition_weight) || (empty($patient->nutrition_weight_date) || $patient->nutrition_weight_date == "0000-00-00") || empty($patient->nutrition_status) || (empty($patient->low_birth_first_month) || $patient->low_birth_first_month == "0000-00-00") || (empty($patient->low_birth_second_month) || $patient->low_birth_second_month == "0000-00-00") || (empty($patient->low_birth_third_month) || $patient->low_birth_third_month == "0000-00-00") || (empty($patient->immunization_first_dose) || $patient->immunization_first_dose == "0000-00-00") || (empty($patient->immunization_second_dose) || $patient->immunization_second_dose == "0000-00-00") || (empty($patient->immunization_third_dose) || $patient->immunization_third_dose == "0000-00-00")): ?>
                        <button type="button" class="btn btn-custom button-btn mb-3 next_two_btn next-fieldset" disabled>Next
                            Page &nbsp;<i class="fas fa-angle-right"></i></button>
                        <?php else: ?>
                        <button type="button" class="btn btn-custom button-btn mb-3 next_two_btn next-fieldset">Next
                            Page &nbsp;<i class="fas fa-angle-right"></i></button>
                        <?php endif; ?>
                    </fieldset>
                    <!-- form end -->
                    <!-- form individual -->
                    <fieldset class="fieldset_form_three">
                        <?php include_once "form/form3.php"; ?>
                        <button type="button"
                            class="btn btn-custom button-btn mb-3 previous_three_btn previous-fieldset"><i
                                class="fas fa-angle-left"></i> &nbsp; Previous Page</button>
                                <?php if((empty($patient->opv_first_dose) || $patient->opv_first_dose == "0000-00-00") || (empty($patient->opv_second_dose) || $patient->opv_second_dose == "0000-00-00") || (empty($patient->opv_third_dose) || $patient->opv_third_dose == "0000-00-00") || (empty($patient->pcv_first_dose) || $patient->pcv_first_dose == "0000-00-00") || (empty($patient->pcv_second_dose) || $patient->pcv_second_dose == "0000-00-00") || (empty($patient->pcv_third_dose) || $patient->pcv_third_dose == "0000-00-00") || (empty($patient->ipv_third_dose) || $patient->ipv_third_dose == "0000-00-00")  || empty($patient->exlusive_breastfed_one_month) || (empty($patient->exlusive_breastfed_one_month_date) || $patient->exlusive_breastfed_one_month_date == "0000-00-00") ||  empty($patient->exlusive_breastfed_two_month) || (empty($patient->exlusive_breastfed_two_month_date) || $patient->exlusive_breastfed_two_month_date == "0000-00-00") || empty($patient->exlusive_breastfed_three_month) || (empty($patient->exlusive_breastfed_three_month_date) || $patient->exlusive_breastfed_three_month_date == "0000-00-00") || empty($patient->exlusive_breastfed_four_month) || (empty($patient->exlusive_breastfed_four_month_date) || $patient->exlusive_breastfed_four_month_date == "0000-00-00") || (empty($patient->nutrition_age_month) || $patient->nutrition_age_month == "0000-00-00") || (empty($patient->nutrition_length_month) || $patient->nutrition_length_month == "0000-00-00") || (empty($patient->nutrition_weight_month) || $patient->nutrition_weight_month == "0000-00-00")  || empty($patient->nutrition_status_month)): ?>
                       
                            <button type="button" class="btn btn-custom button-btn mb-3 next_three_btn next-fieldset" disabled>Next
                            Page &nbsp;<i class="fas fa-angle-right"></i></button>
                        <?php else: ?>
                            <button type="button" class="btn btn-custom button-btn mb-3 next_three_btn next-fieldset">Next
                            Page &nbsp;<i class="fas fa-angle-right"></i></button>
                        <?php endif; ?>
                    </fieldset>
                    <!-- form end -->
                    <!-- form individual -->
                    <fieldset class="fieldset_form_four">
                        <?php include_once "form/form4.php"; ?>
                        <button type="button"
                            class="btn btn-custom button-btn mb-3 previous_four_btn previous-fieldset"><i
                                class="fas fa-angle-left"></i> &nbsp; Previous Page</button>
                    </fieldset>
                    <!-- form end -->

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