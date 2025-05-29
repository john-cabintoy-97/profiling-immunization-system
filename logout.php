<?php
session_start();
if(isset($_GET['user'])){
    unset($_SESSION['profiling_immunization_users_id']);
    unset($_SESSION['profiling_immunization_users_token']);

    unset($_SESSION['profiling_immunization_staff_id']);
    unset($_SESSION['profiling_immunization_staff_token']);

    unset($_SESSION['profiling_immunization_admin_id']);
    unset($_SESSION['profiling_immunization_admin_token']);
    header('location: index.php');
}

?>