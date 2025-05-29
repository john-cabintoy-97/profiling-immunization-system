<?php session_start();
include_once "controllers.php";
$controller = new Controller();
if(isset($_SESSION['profiling_immunization_users_id'])){
    header("location:enroll-patients.php");
}
if($controller->isAdmin() == 0){
    header('location: setup.php');
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

    <title>Profiling Immunization</title>


    <?php require "libs/css_lib.php"; ?>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-custom navbar-light bg-custom topbar mb-4 static-top shadow">

                    <div class="show-lg">
                        <h1 class="h5 mb-0 text-gray-1000 title-sm"><a class="link-custom" href="index.php">Profiling
                                Immunization
                                System</a></h1>
                    </div>

                    <div class="d-sm-none">
                        <h1 class="h5 mb-0 text-gray-1000"><a class="link-custom" href="index.php">Profiling
                                Immunization</a></h1>
                    </div>

                </nav>
                <!-- End of Topbar -->

                <?php 
                if(isset($_SESSION['profiling_immunization_users_token'])){
                   header("location: home.php");
                } 
                if(isset($_SESSION['profiling_immunization_staff_token'])){
                    header("location: dashboard.php");
                 } 
                 if(isset($_SESSION['profiling_immunization_admin_token'])){
                    header("location: dashboard.php");
                 } 
                ?>
                <!-- Begin Page Content -->
                <div class="container userbord">
                    <div class="card  o-hidden border-0 my-5">
                        <div class="card-body p-0">
                            <div class="login_hide wow pulse slow">
                                <!-- Nested Row within Card Body -->
                                <div class="row">
                                    <div class="col-lg-6 d-none d-lg-block bg-register-image2">

                                    </div>
                                    <div class="col-lg-6">
                                        <div class="p-5 my-4">
                                            <div class="text-center">
                                                <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                            </div>
                                            <form method="POST" class="user p-4 login">

                                                <div class="form-group">
                                                    <div class="md-form mb-0">
                                                        <input type="email" name="email" class="form-control"
                                                            autocomplete="off"
                                                            value="<?php if(isset($_SESSION['profiling_email'])){ echo $_SESSION['profiling_email'];  } else { echo ""; } ?>">
                                                        <label>Email</label>
                
                                                    </div>

                                                </div>
                                                <div class="form-group">
                                                    <div class="md-form pwd-custom " id="show_hide_password1">
                                                        <input type="password" name="password" id="login_password"
                                                            class="form-control" autocomplete="off"
                                                            value="<?php if(isset($_SESSION['profiling_password'])){ echo $_SESSION['profiling_password'];  } else { echo ""; } ?>">
                                                        <label>Password</label>
                                                        <span toggle="#password" class="field-icon"><i
                                                                class="far fa-eye-slash"></i></span>

                                                    </div>

                                                </div>
                                                <div class="form-group">
                                                    <div class="custom-control custom-checkbox small">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="customCheck" name="remember_me"
                                                            <?php if(!empty($_SESSION['profiling_userslogin'])){ echo "checked";  } ?>>
                                                        <label class="custom-control-label" for="customCheck">Remember
                                                            Me</label>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="login">
                                                <button type="submit" name="btn-login" class="btn btn-custom btn-block">
                                                    Login
                                                </button>
                                            </form>
                                            <hr>

                                            <div class="text-center">
                                                <p>or</p>
                                                <!-- <a class="small" href="register.php">Create an Account!</a> -->
                                                <span id="users_hide_login"
                                                    class="small btn-sm btn-custom-1 custom-link-item text-white">Create
                                                    an Account!</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="register_hide " style="display:none">
                                <!-- Nested Row within Card Body -->
                                <div class="row">
                                    <div class="col-lg-6 d-none d-lg-block bg-register-image1">

                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mobile-res-register my-4 p-5">
                                            <div class="text-center">
                                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                                            </div>
                                            <form method="POST" class="user p-3  register ">
                                                <div class="form-group row">
                                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                                        <div class="md-form mb-0">
                                                            <input type="text" name="fname" class="form-control"
                                                                autocomplete="off">
                                                            <label>Firstname</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="md-form mb-0">
                                                            <input type="text" name="lname" class="form-control"
                                                                autocomplete="off">
                                                            <label>Lastname</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="md-form mb-0">
                                                        <input type="email" name="email" class="form-control"
                                                            autocomplete="off">
                                                        <label>Email</label>
                                                    </div>

                                                </div>
                                                <div class="form-group js-strength-meter strength-meter row">
                                                    <div class="col-sm-6 mb-sm-0">
                                                        <div class="md-form pwd-custom " id="show_hide_password">
                                                            <input type="password" name="rpassword"
                                                                class="form-control js-password-input"
                                                                autocomplete="off">
                                                            <label>Password</label>
                                                            <!-- <span toggle="#password" class="field-icon"><i
                                                                    class="far fa-eye-slash"></i></span> -->

                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 ">
                                                        <div class="md-form pwd-custom " id="show_hide_password">
                                                            <input type="password" name="confirm_password"
                                                                class="form-control js-password-input"
                                                                autocomplete="off">
                                                            <label>Repeat password</label>
                                                            <span toggle="#password" class="field-icon"><i
                                                                    class="far fa-eye-slash"></i></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="strength-meter-message">
                                                            <span
                                                                class="js-strength-meter-copy strength-meter-copy"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <small><span class="text-danger">*</span> if you are patient, please
                                                        select the user in the menu. choose staff if you are a
                                                        nurse.</small>
                                                    <select name="usertype" class="browser-default custom-select">
                                                        <option value="user">user</option>
                                                        <option value="staff">staff</option>
                                                    </select>
                                                </div>
                                                <input type="hidden" id="register" name="register">
                                                <button type="submit" name="btn-register"
                                                    class="btn  btn-custom  btn-block">
                                                    Register Account
                                                </button>

                                            </form>
                                            <hr>

                                            <div class="text-center">
                                                <p>or</p>
                                                <!-- <a class="small" href="login.php">Already have an account? Login!</a>
                                             -->
                                                <span id="users_hide_register"
                                                    class="small btn-sm btn-custom-1 custom-link-item text-white">Already
                                                    have an account? Login!</span>
                                            </div>

                                        </div>
                                    </div>
                                </div>
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

    <div class="loading">
        <svg class="spinner" width="65px" height="65px" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg">
            <circle class="path" fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="30"></circle>
        </svg>
    </div>
    <?php require "libs/js_lib.php"; ?>

</html>