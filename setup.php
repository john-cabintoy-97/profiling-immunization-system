<?php 
include_once "controllers.php";
 $contx = new Controller();
//  $contx->isAdmin();
if($contx->isAdmin() == 1){
    header('location: index.php');
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

    <title>Profiling Immunization | Admin Wizard</title>


    <?php require "libs/css_lib.php"; ?>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">


                <?php if(isset($_SESSION['profiling_immunization_users_token'])){
                   header("location: home.php");
                } ?>
                <!-- Begin Page Content -->
                <div class="container">
                    <div class="card o-hidden shadow border-0  my-5">
                        <div class="card-body p-0">
                            <div class="setup">
                                <!-- Nested Row within Card Body -->
                                <div class="row">
                                    <div class="col-lg-6 d-none d-lg-block bg-admin-image">

                                    </div>
                                    <div class="col-lg-6">
                                
                                        <fieldset>
                                            <form method="post" class="admin_setup">
                                                <div class="p-5 cmsetup my-4">
                                                    <div class="text-center">
                                                        <h1 class="h4 text-gray-900 mb-4">Admin Wizard</h1>
                                                        <p class="text-gray-10000">Set-up this website</p>
                                                        <p class="text-warning">Provide administrator credentials to
                                                            manage the profiling immunization website.</p>
                                                    </div>
                                                    <div class="msetup pt-3 pl-5 pr-5 pb-5">


                                                        <div class="card mform">
                                                            <div class="card-body">
                                                                <div class="">
                                                                    <div class="form-group row">
                                                                        <!-- <div class="col-sm-12">
                                                                        <p>Admin credentials</p>
                                                                    </div> -->
                                                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                                                            <div class="md-form mb-0">
                                                                                <input type="text" name="sfname"
                                                                                    class="form-control prior"
                                                                                    autocomplete="off" required>
                                                                                <label>Firstname</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <div class="md-form mb-0">
                                                                                <input type="text" name="slname"
                                                                                    class="form-control prior"
                                                                                    autocomplete="off" required>
                                                                                <label>Lastname</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="md-form mb-0">
                                                                            <input type="email" name="email"
                                                                                class="form-control prior"
                                                                                autocomplete="off" required>
                                                                            <label>Email</label>
                                                                        </div>

                                                                    </div>
                                                                    <div
                                                                        class="form-group js-strength-meter strength-meter row">
                                                                        <div class="col-sm-12 mb-sm-0">
                                                                            <div class="md-form pwd-custom "
                                                                                id="show_hide_password">
                                                                                <input type="password" name="rpassword"
                                                                                    class="form-control js-password-input "
                                                                                    value="abcde12345"
                                                                                    autocomplete="off">
                                                                                <label>Password</label>
                                                                                <span toggle="#password"
                                                                                    class="field-icon"><i
                                                                                        class="far fa-eye-slash"></i></span>

                                                                            </div>
                                                                            <div class="strength-meter-message">
                                                                                <span
                                                                                    class="js-strength-meter-copy strength-meter-copy"></span>
                                                                            </div>
                                                                        </div>

                                                                    </div>


                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>
                                                <input type="hidden" name="setup_admin">
                                                <button type="submit" class="btn btn-custom setup-next btn-block " name="setup_btn" disabled>
                                                    setup
                                                </button>
                                            </form>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->



        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <div class="loading">
        <svg class="spinner" width="65px" height="65px" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg">
            <circle class="path" fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="30"></circle>
        </svg>
    </div>
    <?php require "libs/js_lib.php"; ?>

</html>