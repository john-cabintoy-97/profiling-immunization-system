<?php 
include_once "controllers.php";
$controller = new Controller();
session_start();
  if(!isset($_SESSION['profiling_immunization_users_token'])){
    header("location: index.php");
 } 

$controller->preventUserNotEnrolledAccessHome();

$data = $controller->getAlluserpost($_SESSION['profiling_immunization_users_id']);

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Profiling Immunization | Home</title>
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
                <nav class="navbar navbar-expand navbar-light bg-custom topbar mb-4 static-top shadow">

                    <div class="show-lg">
                        <h1 class="h5 mb-0 text-gray-1000 title-sm"><a class="link-custom" href="index.php">Profiling
                                Immunization
                                System</a></h1>
                    </div>

                    <div class="d-sm-none">
                        <h1 class="h5 mb-0 text-gray-1000"><a class="link-custom" href="index.php">Profiling
                                Immunization</a></h1>
                    </div>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span
                                    class="mr-2 d-none d-lg-inline text-white-600 small"><?= $_SESSION['profiling_immunization_users_token']; ?></span>
                                <img class="img-profile rounded-circle" src="public/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#userProfileModal">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="enrolled-view-user.php?view=<?= $controller->urlEncode($_SESSION['profiling_immunization_users_id']); ?>">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Enrollement Record
                                </a>
                                <!-- <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>  -->
                                <!-- <div class="dropdown-divider"></div> -->
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#userlogoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>


                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid  bg-home-image">

                    <div class="row home">

                        <div class="col-lg-12">
                            <div class="card card-custom shadow mb-4">
                                <div class="card-header bg-custom py-2">
                                    <h6 class="m-0 text-white">Immunization Schedule</h6>

                                </div>
                                <div class="card-body">

                                    <?php if(empty($data)): ?>
                                    <h1 class="text-center mt-5">No schedule posted.</h1>
                                    <?php else: ?>
                                    <?php foreach($data as $arr): ?>
                                    <?php 
                                       
                                        date_default_timezone_set('Asia/Manila');
                                        $dateNow = new DateTime();
                                        $origanal_schedule = new DateTime($arr->schedule);
                                       
                                       
                                    ?>
                                    <!-- start -->
                                    <?php if($controller->isPatientGraduated($arr->patient_id) == 0): ?>
                                    <div class="card mb-3 bg-custom-home-success">

                                        <div class="chat_list">
                                            <div class="chat_people">
                                                <div class="chat_img_bb"><img src="public/img/baby_smiling.svg" alt="">
                                                </div>
                                                <div class="chat_ib">

                                                    <div class="pt-2 mb-2">
                                                        <hr>
                                                        <h1 class="text-success mb-4">Congratulations <strong
                                                                class="text-capitalize text-info"><u><?= $arr->childname ?></u></strong>,
                                                            you have already completed your vaccination.</h1>
                                                        <h4 class="text-info">Completed Vaccination Date:
                                                            <?= date("m-d-Y",strtotime($controller->completeVacDate($arr->patient_id)) ); ?>
                                                        </h4>
                                                    </div>

                                                    <br>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <?php else: ?>
                                    <?php  if($origanal_schedule->format('Y-m-d') >= $dateNow->format('Y-m-d') || trim($arr->schedule) == '0000-00-00' || $arr->schedule_status == "approved"): ?>

                                    <?php if($origanal_schedule->format('Y-m-d') == $dateNow->format('Y-m-d') && ((trim($arr->schedule) == '0000-00-00') || ($arr->schedule_status == "pending"))): ?>
                                    <div class="card mb-3 bg-custom-home-warning">

                                        <div class="chat_list">
                                            <div class="chat_people">
                                                <div class="chat_img"><img
                                                        src="data:image/png;base64,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" />
                                                </div>
                                                <div class="chat_ib">
                                                    <h5>Child Name: <strong
                                                            class="text-capitalize"><?= $arr->childname ?></strong><span
                                                            class="chat_date">Posted
                                                            <?= $controller->timeago($arr->timestamp); ?></span></h5>

                                                    <div class="pt-2 mb-2">
                                                        <hr>
                                                        <p>Date of immunization:
                                                            <strong><?= date("M, d, Y",strtotime($arr->schedule)); ?></strong>
                                                        </p>
                                                        <p>Time of immunization:
                                                            <strong><?= date("h:i A",strtotime($arr->schedule_time)); ?></strong>
                                                        </p>
                                                        <p>Posted By: <strong><?= $arr->sender_name ?></strong></p>
                                                    </div>
                                                    <br>
                                                    <h6 class="text-primary"><span class="text-danger">*</span>Paalala:
                                                        <strong>Ngayon ang schedule mo para sa immunization.</strong>
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <?php elseif(trim($arr->schedule) == '0000-00-00' || $arr->schedule_status == "approved"): ?>
                                    <!-- code -->
                                    <div class="card mb-3 bg-custom-home-success">

                                        <div class="chat_list">
                                            <div class="chat_people">
                                                <div class="chat_img"><img
                                                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGQAAABkCAYAAABw4pVUAAAABmJLR0QA/wD/AP+gvaeTAAANxUlEQVR4nO2dW2wc13mAv3NmdnZ2l7vLy/IiURJ1l62LZSmK49SNZcepjSQGAtSt26AN0AINUBR9aQsEKFAUQYE+tA9t0L70oXlogjQpUDRNL64Tt0ZbWUjtunEsl5JCSzIlkRRJ8bZc7mVmZ+b0YZdLrvZC7uyuKkrzLQiCe85//pnzn8t/zvlnCAEBAQEBAQEBAQEBAQEBAQEBAQEBATsf0YlCvpL9+jmJegKU3onydi7CU8K7/EeRL/8QIZSvEtpR/9L4b/XrIf07An6mnXIeNpTgolMs/vz3j3/tTquybbXo6fTctxEqMEYtz4D4HuqrTyO+6rUiKP1qPPn2L55DqBf9yj/8qI+f+OFEy43Vt0GUJ570K/uoIKU607KMb21ChX3LPiIoJcxWZfwbJKArBAZ5wAgM8oARGOQBIzDIA0ZgkAeMwCAPGL63Tr40+1OOQK508mIeNoTwnK/w1y3J+DbI2aNndCFEr1/5R4PWd799GyRimuBrgzmgGb4NEpJ6YJAt8FM9vg0yPzV7avfeUb/ijwQz0zOnW5XxbRDbtvt0qfkVfyRwHbevVRnfBtGkhi4CgzRD83Eg69sgEpAiWMY0Q4j7aBAhxH0xSKFYYDm/iue5CCEwQyZ9kWTlZl3lspRdwXZsAHRNZyDah65t3NpKPk3OzqOUQkpJ0owTNaKV9AUvzYQzha0cpBAMyl6O6XuR5RZuYTNenGTVywMQE2FOhg4QEc2PhKSPdXcbZ+qy6waxHJvrC5N4qtpfcVyHkcQQADcWJ8la+ar0dD7DsaFDCCG4u7bITHq2Kn0xu8yRwQNEQhHSXpa/y1/Awa3Kk/FyPB0+DsBr+be54y5VpV9zZ/hi9IWK0eohZOs9xHeNSko9pJs/OTtXYwyAVWsNKSRKUWMMAMuxcDwHKSQZa60mXSnFmpVDCsmMt1BjDICb3hxSSIq4NcYAWPYyZFW+6fWL+zmHCNn9HtIIpRRSSDzROKBDlBtMw8WAKs2BXoMMrvK2vD8lms+jfuqnrUndTwtoBdHghkT502yMFpRbaKOJVZTK0Bro0MotXKOxJylp3gv81E9bTVyI7v7Ew7G6nkoy0oMQoGsaUSNSkx7WDMyQgRCQNHvqXnvSLJUxqg3Wbcn79CGEAFOGGNRqt+wSMkqvjDW9fj+0MamLrveQaCjCsaFDLK4t4yoXEMSMKCOJwYruo4OHmF2dw3aLAOgyxK7EUKWSd8WHkUIja2crQ11/tJd4uGSolJbkldizXLFvYisHAQxp/XwsfLSi42ejz/KufZVM2cuKCpNz4WNoW6zD/NROG26vPz+7VZJmgqSZaJge1g3G+vc2TBdCsKvskTViTB9hTB9pmB7XojwfObv1xdYqb1mkLbd3Oz2k4FhYxdIawdB1IqHqIcZxXXLFHEqBlJKYEUVuuhGlFFk7h+t5CAERwyQkQx3V4SmPOXcZSzlIAQNaktg9IVXLXoa0mwMgLk0GtOSW9+5nPmhvUt/CHreWp5m+Zw0w3JPiYGoMKLmvV+eu4Xobbqephzm16zF0TcdVHuOzV8naG66tFIKjQwfpi/R2REdROXxr7Q3m3Y2zNh2NL/Q8w6FQafP0P/OX+K/CeJWO08ZhXop9vHkF+KC9Sb3JRymYWZ2rkZlbW8BxHQSC2fRcVUVBqbUvZJcRCFZyK1XGAPCUYmZlrmM6rhWnq4wB4ODyTuEKAoGLxzvWlRod79vXyHmFpnUgfFRv1xYSrnJRdRZ1AEXXKf32ahdkAI7nlH83SFdux3QUlF03PV/+3lYOnqq/3sk3kG2HHbM7KIo2NKj8tsrtsqfYKl174kkXGprUaoYLgcDQDQDMUJjVQqZG1gyVJlQxcZn+C/+MMX0bUbRRQuD2DSBOnMH73AF0M9K2jqSsv07plfFSPmEQFiEsVaxK15DEZbSeaFt0rYcIITiS2o+hb3hEhhbicGo/6wdbe5O7iZs9FfdZCslgzwD9GMz+xR+Q++afEZ68XuodgFAKfWkB7cIbTP3hb1D48JJvHalo6ezoQGgXZ8NHMUSpbQoEI1o/z0fPlCtI8PnYJ6sqPyZMPhv7BGFR7e11pN78Cv7grX/7mxOPHX+1kxcDoIo2d/7897BuXds6s6az69d/H/PIyU5fRkf4yYcT//HpT55/rhUZ3z1E0NzL8vtZee072zMGgOtw9xt/irKsrlxLux8/dPWp2ZXCKpNLt7EcCwBDNxjrHaW/PFwUvSLXFm6SKWRQKHTLou/CP1WVsfb0p8gdfwJlhEF5hOZnSf7ra2iZVQCczDJX/+UbZM6e25YOKSWp2AD7+/ZUKu2twgd8YF3HUkWEEIxoA3w2+gkS5WFq0pnlzdyPWPWyAPTICOcjT3IktKfjdda1OUShmJi/QdbO4XgujueSs/NM3L2BW3Yjby/PsJRbpug5OJ6LuH4VHKdShrV3jMzTn8JNJPFMEy8SxRo7yOqzL1Tp0iY+2LYO2ykyk55lMVtae0w6s7yVv0Tay1JQNnnP4qPiDG/m/6dyH/+4dpF5d5mCsikomwU3zT9kL1JUDp2mawZxXJeiV6z53lVepcfkitWLPm1psTpv/0D9svtTzeWa6FgnVyxtgyy5tR4YwKJb6oEFzyarCjXpReWQLveYTtK9dUizIbTBckK697a4xmcZVX86tYbfKkptfbhSDTKuf6/u8zKlvTmkycVqUiKEqLuS1jUdRCmUaDNuT7y6eNuqW7a0qlusF6/dDW6kY/P1IcBs4LqGhQECDKEjEXVPFsMy1Lzh+WjuXeshUkiG44M136difZV1w0hiqGoL39q7vyqveeND9PRydQFKEX3v3aqvrH3Vcs10ABiaQaqnH4DDxih9WnVDkAjOmceA0kbjafNwzX08ZuzrysKwq17WoYExhnoGsMpDiqGFSGw6weuLJDm75xRZu7w1PnyE/MGLWDdKm3nCskh96y+xd+9DhYySl7V4F215U9CBkIy+8AojqV3b0yEESbMHTZZuPSwMfjXxOW478xTXD6j0XvrkRq97KfoUp4yDrHqleScmTPaEmp+x+KXrL4uJh3uINwlfMvUwpr6RwX7ly0x/7XdRxdJwJewi4cnrDeWT51+mb+x402u4V8e9GELnUGh30zJ26yma5+gMXTWI47nMZuaxypUb0kOMxIcwtI1x++7aIhlrrRzEppFKpRj+ld9h/q/+BM+u9W42Ezv70yRe/iWm0nda0xHtJW5uDFNz7jKXrUksVUSK0tbJyfDBSsxVQdm8Z01UDqh6pMkZ82jNIVYn6OqZ+pW5CVYL1XFRC2vLnB09iRCCmfQsN5ZuVaXfWZ3jyaMnGP3tP2b+u1/H+sn7tQXHkwx+/pdJPP0ZLs1e8adj93FiRoxlL8M309+vic1acdc4Hy29PeRvM//OlHO3+t7sW/xa8uXmgXI+Vutd6yGO59ZUFEC+mKfgWkR0k6V8uiZdKcVSPs3eXfvQv/Sb3L7xY4zpW2i5NZQeopgaJnTgGIdGT7atI2bEuFmcqxsod92Z4TxPUlB2jTEAFt00aW+NPhmvSWuHrhmk0cERgPLKPn6Dg59KOh5uIkk+caoqXV9fI3RAh1vHGEA5yoW6kZMbeVp689K26KLb2zht3Q1tFLVSSW9weetDQSd0aA10rAfQaU0CB2QXom66ZhBN6sTCtX76Zo8nGakfubEe9pPYdI6xmd5IomM69uhDdQPl1sOCwsJgSK997iapxegV9Q+32qGrXtbx4aNMr9ypBLGFZIjR5EilkvckRpBCsmZlymsESSrWX1lHREMRTowc425msRIo12NEGU2OdExHSkvyC/FPM259VAmUG9b6ecp8vKLj1Z7nebtwuRIoFxMmT5mPdyW2uasGCWsGBwfGGqYLIRhNDAPDDfP0mgl6mwXKdUDHfn2E/c0C5WSUz0TPNUzvJF1fGOadwqYgthDROkFs2WKu8jBNjxGrCZRbs3O45Qd2onUC5bbSsZPoqkFuLt3mdrr6xZwj8UEOpw4AsFrIMD43URWkENFNTu8+XgmUu3TnMlkrV0mXQvDY0BH6o73b0rHT6Nqk7inF1OpszfezmbuV8X46PVsTMZJ3CsxnS+cbS9nlKmNUyi0bYDs6dhrdC5TzGgexOe56IFz9E7dKeoMTuXW57ejYaTyYgXLrU8gj+KaIrhlEl1pli3szQmwOYqu/ORfRzS3Sw9vWsdPoaqDc0cEDVRVjaCGOpA5Ugtj29e4mbsargtiGelKkYqXDo75Ikt2J4cqDMQJBjxFjf/++bevYafh/k4O29Q0PRPsYiDZ+u0RYD3N61+MN0wEODow1XWdspeP/k62esKqH7x7S6Kw6YAOh3ceHPj3P63ws/sOG1/rzCr4Ncmdu9oZf2UeF+fn5W1vnqsa3QZYWF+Y/ujnpV/yhZ+bODDOzM1Otyvme1MPhMONXx1FKcWDffl/v9XgY8ZTH1NQU/3tlHMNo/czdt0GMsGGh4Nr1D5m8+RE9sZ5teV4PM67nks2uUSw66JpGSNObR2nUwb9BjMiPxaYjzHy+fgzto4YUGmFjfd2k3mtV3rdBvviFn3v3u6/9/Q9ABP9lpx5KvPP+f//ojVbF2hr4X3/99X5PU99GBEapQqiLuqu9+uKLL860LNoJ/W9eePNjCvWEoAsP3e0gPE+4msb4c88897bw+W/zAgICAgICAgICAgICAgICAgICAgICHgb+DzZ/kMrLKCgRAAAAAElFTkSuQmCC" />
                                                </div>
                                                <div class="chat_ib">
                                                    <h5>Child Name: <strong
                                                            class="text-capitalize"><?= $arr->childname ?></strong><span
                                                            class="chat_date">Posted
                                                            <?= $controller->timeago($arr->timestamp); ?></span></h5>

                                                    <div class="pt-2 mb-2">
                                                        <hr>
                                                        <p>Date of immunization:
                                                            <strong><del><?= date("M, d, Y",strtotime($arr->schedule)); ?></del></strong>
                                                        </p>
                                                        <p>Time of immunization:
                                                            <strong><del><?= date("h:i A",strtotime($arr->schedule_time)); ?></del></strong>
                                                        </p>
                                                        <p>Posted By: <strong><?= $arr->sender_name ?></strong></p>
                                                    </div>
                                                    <br>
                                                    <h6 class="text-success"><strong>Tapos na ang schedule mo para sa immunization ngayon buwan.</strong>
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <?php else: ?>
                                    <div class="card mb-3 ">


                                        <div class="chat_list">
                                            <div class="chat_people">
                                                <div class="chat_img"><img
                                                        src="data:image/png;base64,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" />
                                                </div>
                                                <div class="chat_ib">
                                                    <h5>Child Name: <strong
                                                            class="text-capitalize"><?= $arr->childname ?></strong><span
                                                            class="chat_date">Posted
                                                            <?= $controller->timeago($arr->timestamp); ?></span></h5>

                                                    <div class="pt-2 mb-2">
                                                        <hr>
                                                        <p>Date of immunization:
                                                            <strong><?= date("M, d, Y",strtotime($arr->schedule)); ?></strong>
                                                        </p>
                                                        <p>Time of immunization:
                                                            <strong><?= date("h:i A",strtotime($arr->schedule_time)); ?></strong>
                                                        </p>
                                                        <p>Posted By: <strong><?= $arr->sender_name ?></strong></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <?php endif; ?>
                                    <?php else: ?>
                                    <div class="card mb-3 bg-custom-home-danger">
                                        <!-- <div class="card-header bg-custom py-0">
            <span class="home_time">10s</span>
        </div> -->

                                        <div class="chat_list">
                                            <div class="chat_people">
                                                <div class="chat_img"><img
                                                        src="data:image/png;base64,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" />
                                                </div>
                                                <div class="chat_ib">
                                                    <h5>Child Name: <strong
                                                            class="text-capitalize"><?= $arr->childname ?></strong><span
                                                            class="chat_date">Posted
                                                            <?= $controller->timeago($arr->timestamp); ?></span></h5>

                                                    <div class="pt-2 mb-2">
                                                        <hr>
                                                        <p>Date of immunization:
                                                            <strong><?= date("M, d, Y",strtotime($arr->schedule)); ?></strong>
                                                        </p>
                                                        <p>Time of immunization:
                                                            <strong><?= date("h:i A",strtotime($arr->schedule_time)); ?></strong>
                                                        </p>
                                                        <p>Posted By: <strong><?= $arr->sender_name ?></strong></p>
                                                    </div>
                                                    <br>
                                                    <h6 class="text-danger"><span class="text-warning">*</span>Paalala:
                                                        <strong>Huli ka na sa iyong iskedyul para sa
                                                            pagbabakuna.</strong></h6>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <?php endif; ?>
                                    <?php endif; ?>
                                    <!-- end -->
                                    <?php endforeach; ?>
                                    <?php endif; ?>

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
    <?php include_once "modules/modal.php"; ?>
    <?php require "libs/js_lib.php"; ?>

</body>

</html>