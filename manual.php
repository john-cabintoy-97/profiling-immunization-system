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

    <title>Profiling Immunization | Manual Register</title>

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
                <div class="container-fluid" id="interviewForm">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Patient</li>
                            <li class="breadcrumb-item active" aria-current="page">Patients Enrollement Form</li>
                        </ol>
                    </nav>

                    <form method="post" class="manual_register_form">
                        <fieldset class="fieldset_form_one">
                            <div class="card shadow mb-4 wow fadeIn slow">
                                <div class="card-header bg-custom py-3">
                                    <div class="row">
                                        <div class="col-sm-12 col-lg-11">

                                            <h6 class="m-0 text-white">Manual Account Register</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body p-5">
                                    <div class="row p-5">
                                        <div class="col-lg-6 d-none d-lg-block bg-register-image3">

                                        </div>
                                        <div class="col-lg-6">
                                            <div class="bgc my-4 p-5">
                                                <div class="form-group row">
                                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                                        <div class="md-form mb-0">
                                                            <input type="text" name="rfname" class="form-control prior"
                                                                autocomplete="off">
                                                            <label>Firstname</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="md-form mb-0">
                                                            <input type="text" name="rlname" class="form-control prior"
                                                                autocomplete="off">
                                                            <label>Lastname</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="md-form mb-0">
                                                        <input type="email" name="email" class="form-control prior"
                                                            autocomplete="off">
                                                        <label>Email</label>
                                                    </div>

                                                </div>
                                                <div class="form-group js-strength-meter strength-meter row">
                                                    <div class="col-sm-12 mb-sm-0">
                                                        <div class="md-form pwd-custom " id="show_hide_password">
                                                            <input type="password" name="rpassword"
                                                                class="form-control js-password-input "
                                                                value="abcde12345" autocomplete="off">
                                                            <label>Password</label>
                                                            <span toggle="#password" class="field-icon"><i
                                                                    class="far fa-eye-slash"></i></span>

                                                        </div>
                                                    </div>

                                                </div>


                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <button type="button" class="btn btn-custom button-btn mb-3 next-fieldset" name="next" disabled>Next
                                Step
                                &nbsp;<i class="fas fa-angle-right"></i></button>

                        </fieldset>
                        <!-- form end -->
                        <!-- form individual -->
                        <fieldset>
                            <div class="card shadow mb-4">
                                <div class="card-header bg-custom py-3">
                                    <div class="row">
                                        <div class="col-sm-12 col-lg-11">
                                            <h6 class="m-0 text-white">Manual Patients Enrollement Form</h6>
                                        </div>

                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">

                                        <div class="col-lg-6 border-custom">
                                            <div class="user p-2">
                                                <div class="form-group row">
                                                <div class="col-sm-12 mb-0 pb-0 ch-extra"><small>Child Name</small></div>
                                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                                        <div class="md-form mb-0">
                                                            <input type="text" name="lname" class="form-control mb-3"
                                                                autocomplete="off" required>
                                                            <label>Last Name</label>
                                                        </div>

                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="md-form mb-0">
                                                            <input type="text" name="fname" class="form-control mb-3"
                                                                autocomplete="off" required>
                                                            <label>First Name</label>
                                                        </div>

                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="md-form mb-0">
                                                            <input type="text" name="mname" class="form-control mb-3"
                                                                autocomplete="off" required>
                                                            <label>Middle Name</label>
                                                        </div>

                                                    </div>

                                                </div>
                                                <div class="form-group row">

                                                    <div class="col-sm-6">
                                                        <small>Sex (Kasarian)</small>
                                                        <select name="gender"
                                                            class="form-control form-control-custom-0 form-select-lg mb-3" required>
                                                            <option value="">--select gender--</option>
                                                            <option value="male">
                                                                Male</option>
                                                            <option value="female">
                                                                Female</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                                        <div class="md-form mb-0">
                                                            <input type="date" name="birthdate"
                                                                class="form-control mb-3" autocomplete="off" required>
                                                            <label> Birth date</label>
                                                        </div>


                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="md-form mb-0">
                                                        <input type="text" name="birthplace" class="form-control mb-3"
                                                            autocomplete="off" required>
                                                        <label>Birthplace</label>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                                        <div class="md-form mb-0">
                                                            <input type="text" name="bloodtype"
                                                                class="form-control mb-3" autocomplete="off" required>
                                                            <label>Blood Type</label>
                                                        </div>

                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="md-form mb-0">
                                                            <input type="text" name="spousename"
                                                                class="form-control mb-3" autocomplete="off" required>
                                                            <label>Spouse's Name</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                                        <small>Civil Status</small>
                                                        <select name="civilstatus"
                                                            class="form-control form-control-custom-0 form-select-lg" required>
                                                            <option value="">--select civil status--
                                                            </option>
                                                            <option value="single">
                                                                Single (Walang Asawa)
                                                            </option>
                                                            <option value="married">
                                                                Married (May Asawa)
                                                            </option>
                                                            <option value="widow">
                                                                Widow/er (Balo)</option>
                                                            <option value="annuled">
                                                                Annulled (Anulado)
                                                            </option>
                                                            <option value="separated">
                                                                Single (Separated)
                                                            </option>
                                                            <option value="co-habition">
                                                                Co-Habition
                                                                (Paninirahang)</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-6">

                                                        <small>Educational Attainment</small>
                                                        <select name="educationalattainment"
                                                            class="form-control form-control-custom-0 form-select-lg" required>
                                                            <option value="">--select educational
                                                                attainment--</option>
                                                            <option value="no formal education">
                                                                NO
                                                                Formal Education (Walang Pormal na Edukasyon) </option>
                                                            <option value="elementary">
                                                                Elementary (Elemnetarya)
                                                            </option>
                                                            <option value="high school">
                                                                High School (Hayskul)
                                                            </option>
                                                            <option value="college">
                                                                College (Kolehiyo) </option>
                                                            <option value="vocational">
                                                                Vocational (Bukasyonal)
                                                            </option>
                                                            <option value="post graduate">
                                                                Post Graduate
                                                            </option>
                                                        </select>
                                                    </div>

                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                                        <small>Employment Status</small>
                                                        <select name="employmentstatus"
                                                            class="form-control form-control-custom-0 form-select-lg" required>
                                                            <option value="">--select employment
                                                                Status--</option>
                                                            <option value="student">
                                                                Student (Estudyante) </option>
                                                            <option value="employed">
                                                                Employed (May Trabaho)
                                                            </option>
                                                            <option value="retired">
                                                                Retired (Retirado) </option>
                                                            <option value="none/unemployed">
                                                                None/Unemployed
                                                                (Kolehiyo) </option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <small>Family Member</small>
                                                        <select name="familymember"
                                                            class="form-control form-control-custom-0 form-select-lg" required>
                                                            <option value="">--select Family
                                                                member--</option>
                                                            <option value="father">
                                                                Father (Ama) </option>
                                                            <option value="mother">
                                                                Mother (Ina) </option>
                                                            <option value="son">
                                                                Son (Anak Na Lalaki) </option>
                                                            <option value="daughter">
                                                                Daughter (Anak Na Babae) </option>
                                                        </select>
                                                    </div>

                                                </div>
                                                <div class="form-group">
                                                    <div class="md-form mb-0">
                                                        <input type="text" name="facilitycode" class="form-control mb-3"
                                                            autocomplete="off">
                                                        <label>Facility Serial Number</label>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="user p-1">
                                                <div class="form-group row">
                                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                                        <div class="md-form mb-0">
                                                            <input type="text" name="suffixname"
                                                                class="form-control mb-3" autocomplete="off">
                                                            <label>Suffix</label>
                                                        </div>

                                                    </div>
                                                    <div class="col-sm-8">
                                                        <div class="md-form mb-0">
                                                            <input type="tel" name="contactnumber"
                                                                class="form-control mb-3" pattern="[0-9]{11}"  autocomplete="off" required>
                                                            <label>Contact Number</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <small>Pangalan
                                                        sa pagkadalaga (para sa mga babaeng
                                                        may-asawa)</small>
                                                    <div class="md-form mb-0">

                                                        <input type="text" name="mothersname" class="form-control mb-3"
                                                            autocomplete="off" required>
                                                        <label>Mother's Name</label>
                                                    </div>



                                                </div>
                                                <div class="form-group ">
                                                    <div class="md-form mb-0">
                                                        <input type="text" name="residentialAddress"
                                                            class="form-control mb-3" autocomplete="off" required>
                                                        <label>Residential Address</label>
                                                    </div>

                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                                        <small>DSWD NHTS?</small>
                                                        <div class="d-flex justify-content-start">
                                                            <div class="form-check pr-3">
                                                                <div class="my-2">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="dswdnhts" id="dswdnhts" value="yes" required>
                                                                    <label class="form-check-label"
                                                                        for="flexRadioDefault1">
                                                                        Yes
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="form-check ">
                                                                <div class="my-2">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="dswdnhts" id="dswdnhts" value="no">
                                                                    <label class="form-check-label"
                                                                        for="flexRadioDefault1">
                                                                        No
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="md-form mb-0">
                                                            <input type="text" name="facility_no"
                                                                class="form-control mb-3" autocomplete="off">
                                                            <label>Facility Household #</label>
                                                        </div>

                                                    </div>
                                                    <div class="col-sm-4">
                                                        <small>4Ps Member?</small>
                                                        <div class="d-flex justify-content-start">
                                                            <div class="form-check pr-3">
                                                                <div class="my-2">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="fourpsmember" id="fourpsmember" required
                                                                        value="yes">
                                                                    <label class="form-check-label"
                                                                        for="flexRadioDefault1">
                                                                        Yes
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="form-check ">
                                                                <div class="my-2">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="fourpsmember" id="fourpsmember"
                                                                        value="no">
                                                                    <label class="form-check-label"
                                                                        for="flexRadioDefault1">
                                                                        No
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                                        <small>PhilHealth Member?</small>
                                                        <div class="d-flex justify-content-start">
                                                            <div class="form-check pr-3">
                                                                <div class="my-2">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="phmember" id="phmember" value="yes" required>
                                                                    <label class="form-check-label"
                                                                        for="flexRadioDefault1">
                                                                        Yes
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="form-check ">
                                                                <div class="my-2">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="phmember" id="phmember" value="no">
                                                                    <label class="form-check-label"
                                                                        for="flexRadioDefault1">
                                                                        No
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <small>Status Type</small>

                                                        <select name="statustype" id="statustype"
                                                            class="form-control form-control-custom-0">
                                                            <option value="">--select status type--</option>
                                                            <option value="member">
                                                                member</option>
                                                            <option value="dependent">
                                                                dependent</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="md-form mb-0">

                                                            <input type="text" name="phealthno"
                                                                class="form-control mb-3" autocomplete="off">
                                                            <label>PhilHealth No.</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                                        <small>member, please
                                                            indicate
                                                            category</small>
                                                        <select name="membercategory" id="membercategory"
                                                            class="form-control form-control-custom-0">
                                                            <option value="">--select indicate catergory--</option>
                                                            <option value="fe-private">
                                                                FE-Private</option>
                                                            <option value="fe-government">
                                                                FE-Government</option>
                                                            <option value="ie-private">
                                                                IE-Private</option>
                                                            <option value="others" id="other">
                                                                OTHERS: </option>
                                                        </select>
                                                        <div class="other-form mt-2">
                                                            <input type="hidden"
                                                                class="form-control form-control-custom">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <small>Primary Care Benefit
                                                            (PSB)
                                                            Member?</small>

                                                        <div class="d-flex justify-content-start">
                                                            <div class="form-check pr-3">
                                                                <div class="my-2">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="psbmember" id="psbmember" value="yes" required>
                                                                    <label class="form-check-label"
                                                                        for="flexRadioDefault1">
                                                                        Yes
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="form-check ">
                                                                <div class="my-2">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="psbmember" id="psbmember" value="no">
                                                                    <label class="form-check-label"
                                                                        for="flexRadioDefault1">
                                                                        No
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <br>
                                            </div>

                                        </div>
                                    </div>


                                </div>

                            </div>
                            <input type="hidden" name="manual_register">
                            <button type="submit" class="btn btn-custom-2 btn-submit-bottom mb-3"
                                 name="save"><i class="fas fa-paper-plane"></i> &nbsp; Save Changes</button>
                            <button type="button"
                                class="btn btn-custom button-btn mb-3 previous_four_btn previous-fieldset"><i
                                    class="fas fa-angle-left"></i> &nbsp; Previous Step</button>
                        </fieldset>
                        <!-- form end -->
                    </form>

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