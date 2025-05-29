<?php 
include_once "../config/Database.php";
include_once "./smsApiController.php";
$db = new Database();
$sendsms = new smsApiController();
$conn = $db->connection();
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['register'])){
        $fname = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_STRING);
        $lname = filter_input(INPUT_POST, 'lname', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'rpassword', FILTER_SANITIZE_STRING);
        $usertype = filter_input(INPUT_POST, 'usertype', FILTER_SANITIZE_STRING);

        $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email || firstname = :firstname && lastname = :lastname");
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':firstname', $fname, PDO::PARAM_STR);
        $stmt->bindParam(':lastname', $lname, PDO::PARAM_STR);
        $stmt->execute(['email' => $email, 'firstname' => $fname, 'lastname'=> $lname]);
        if($stmt->rowCount() > 0){
            echo "exist";
        } else {
            $param = [
                'firstname' => strtolower($fname),
                'lastname' => strtolower($lname) ,
                'email' => strtolower($email) ,
                'password' => md5($password),
                'usertype' => strtolower($usertype)
            ];
            if($usertype == "user"){
                $result = $db->query("INSERT INTO users (firstname, lastname,email, password,usertype, status) VALUES (:firstname,:lastname, :email , :password, :usertype, 'granted')",$param);
                if($result){
                     echo "ok";
                }
            } else {
                $result = $db->query("INSERT INTO users (firstname, lastname,email, password,usertype, status) VALUES (:firstname,:lastname, :email , :password, :usertype,'pending')",$param);
                if($result){
                     echo "ok";
                }
            }
          
        }
    }

    if(isset($_POST['login'])){
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        $rem = filter_input(INPUT_POST, 'remember_me', FILTER_SANITIZE_STRING);
        
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch();
        
        if($user->usertype == "admin"){
            if($user->password == md5($password)){
                  if(isset($rem)){
                        $_SESSION["profiling_email"] = $email;
                        $_SESSION["profiling_password"] = $password;
                        $_SESSION["profiling_userslogin"] = $rem;
                        
                    } else {
                        $_SESSION["profiling_email"] = "";
                        $_SESSION["profiling_password"] = "";
                        $_SESSION["profiling_userslogin"] = "";
                        
                    }
                    $_SESSION['profiling_immunization_admin_id'] = $user->users_id;
                    $_SESSION['profiling_immunization_admin_token'] = $user->firstname;
                    echo "login_admin";
            }else{
                echo "wrong";
            }
          
        }else {
            
            if($stmt->rowCount() == 1){
                if($user->status == "pending"){
                    echo "contact_admin";
                }else{
                    if($user->password == md5($password)){
                        if(isset($rem)){
                            $_SESSION["profiling_email"] = $email;
                            $_SESSION["profiling_password"] = $password;
                            $_SESSION["profiling_userslogin"] = $rem;
                            
                        } else {
                            $_SESSION["profiling_email"] = "";
                            $_SESSION["profiling_password"] = "";
                            $_SESSION["profiling_userslogin"] = "";
                            
                        }
                        
                        if($user->usertype == "staff"){
                            $_SESSION['profiling_immunization_staff_id'] = $user->users_id;
                            $_SESSION['profiling_immunization_staff_token'] = $user->firstname;
                            echo "login_dash";
                        } else if($user->usertype == "user"){
                            $_SESSION['profiling_immunization_users_id'] = $user->users_id;
                            $_SESSION['profiling_immunization_users_token'] = $user->firstname;
                            echo "login_home";
                        } else {
                            echo "login_err";
                        }
                    }else{
                        echo "pass_not";
                    }
                }
                
            }else{
                echo "login_err";
            }
        }
    }

    if(isset($_POST['patient_enrolled'])){

        $users_id = filter_input(INPUT_POST, 'users_id', FILTER_SANITIZE_STRING);
        $lname = filter_input(INPUT_POST, 'lname', FILTER_SANITIZE_STRING);
        $fname = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_STRING);
        $mname = filter_input(INPUT_POST, 'mname', FILTER_SANITIZE_STRING);
        $gender = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_STRING);
        $bdate = filter_input(INPUT_POST, 'bdate', FILTER_SANITIZE_STRING);
        $birthplace = filter_input(INPUT_POST, 'birthplace', FILTER_SANITIZE_STRING);
        $bloodtype = filter_input(INPUT_POST, 'bloodtype', FILTER_SANITIZE_STRING);
        $spousename = filter_input(INPUT_POST, 'spousename', FILTER_SANITIZE_STRING);
        $civilstatus = filter_input(INPUT_POST, 'civilstatus', FILTER_SANITIZE_STRING);
        $educationalattainment = filter_input(INPUT_POST, 'educationalattainment', FILTER_SANITIZE_STRING);
        $employmentstatus = filter_input(INPUT_POST, 'employmentstatus', FILTER_SANITIZE_STRING);
        $familymember = filter_input(INPUT_POST, 'familymember', FILTER_SANITIZE_STRING);
        $facilitycode = filter_input(INPUT_POST, 'facilitycode', FILTER_SANITIZE_STRING);
        $suffixname = filter_input(INPUT_POST, 'suffixname', FILTER_SANITIZE_STRING);
        $contactnumber = filter_input(INPUT_POST, 'contactnumber', FILTER_SANITIZE_STRING);
        $mothersname = filter_input(INPUT_POST, 'mothersname', FILTER_SANITIZE_STRING);
        $residentialAddress = filter_input(INPUT_POST, 'residentialAddress', FILTER_SANITIZE_STRING);
        $dswdnhts = filter_input(INPUT_POST, 'dswdnhts', FILTER_SANITIZE_STRING);
        $facility_no = filter_input(INPUT_POST, 'facility_no', FILTER_SANITIZE_STRING);
        $fourpsmember = filter_input(INPUT_POST, 'fourpsmember', FILTER_SANITIZE_STRING);
        $phmember = filter_input(INPUT_POST, 'phmember', FILTER_SANITIZE_STRING);
        $statustype = filter_input(INPUT_POST, 'statustype', FILTER_SANITIZE_STRING);
        $phealthno = filter_input(INPUT_POST, 'phealthno', FILTER_SANITIZE_STRING);
        $membercategory = filter_input(INPUT_POST, 'membercategory', FILTER_SANITIZE_STRING);
        $psbmember = filter_input(INPUT_POST, 'psbmember', FILTER_SANITIZE_STRING);

        $stmt = $conn->prepare("SELECT * FROM patient_enrollement WHERE lastname = :lastname && firstname = :firstname && middlename = :middlename");
        $stmt->bindParam(':lastname', $lname, PDO::PARAM_STR);
        $stmt->bindParam(':firstname', $fname, PDO::PARAM_STR);
        $stmt->bindParam(':middlename', $mname, PDO::PARAM_STR);
        $stmt->execute(['lastname' => $lname, 'firstname' => $fname, 'middlename'=> $mname]);
        if($stmt->rowCount() > 0){
            echo "enrolled_exist";
        } else {
            $param = [
                'lastname' => strtolower($lname), 
                'firstname' => strtolower($fname), 
                'middlename' => strtolower($mname), 
                'gender' => strtolower($gender), 
                'birthdate' => $bdate, 
                'birthplace' => strtolower($birthplace), 
                'bloodtype' => strtolower($bloodtype),
                'spousename' => strtolower($spousename), 
                'civilstatus' => strtolower($civilstatus), 
                'educationalattainment' => strtolower($educationalattainment), 
                'employmentstatus' => strtolower($employmentstatus), 
                'familymember' => strtolower($familymember), 
                'facilitycode' => strtolower($facilitycode), 
                'suffix' => strtolower($suffixname), 
                'contactnumber' => strtolower($contactnumber), 
                'mothersname' => strtolower($mothersname), 
                'residentialAddress' => strtolower($residentialAddress), 
                'dswdnhts' => strtolower($dswdnhts), 
                'facility_no' => strtolower($facility_no), 
                'fourpsmember' => strtolower($fourpsmember), 
                'phmember' => strtolower($phmember), 
                'statustype' => strtolower($statustype), 
                'phealthno' => strtolower($phealthno), 
                'membercategory' => strtolower($membercategory), 
                'psbmember' => strtolower($phmember),
                'users_id' => strtolower($users_id),
            ];
           
            $result = $db->query("INSERT INTO patient_enrollement (lastname, firstname, middlename, gender, birthdate, birthplace, bloodtype, spousename, civilstatus, educationalattainment, employmentstatus, familymember, facilitycode, suffix, contactnumber, mothersname, residentialAddress, dswdnhts, facility_no, fourpsmember, phmember, statustype, phealthno, membercategory, psbmember, users_id) VALUES (:lastname, :firstname, :middlename, :gender, :birthdate, :birthplace, :bloodtype, :spousename, :civilstatus, :educationalattainment, :employmentstatus, :familymember, :facilitycode, :suffix, :contactnumber, :mothersname, :residentialAddress, :dswdnhts, :facility_no, :fourpsmember, :phmember, :statustype, :phealthno, :membercategory, :psbmember, :users_id)",$param);
            
            if($result == 1){
                $stmt = $conn->prepare("SELECT * FROM patient_enrollement WHERE users_id = :users_id");
                $stmt->execute(['users_id' => $users_id]);
                $patient_enrollement_get_id = $stmt->fetch();
                $id = $patient_enrollement_get_id->patient_id;
                
                $param2 = [
                    'firstname' => strtolower($fname), 
                    'lastname' => strtolower($lname), 
                    'middlename' => strtolower($mname), 
                    'gender' => strtolower($gender), 
                    'birthdate' => $bdate, 
                    'mothersname' => strtolower($mothersname), 
                    'address' => strtolower($residentialAddress),
                    'facilitycode' => strtolower($facilitycode),
                    'patient_id' => $id
                ];
                $stmt = $conn->prepare("INSERT INTO record_one (firstname,lastname,middlename,gender,birthdate,mothersname,address,facilitycode, patient_id) VALUES (:firstname,:lastname,:middlename,:gender,:birthdate,:mothersname,:address,:facilitycode, :patient_id)");
                $re = $stmt->execute($param2);
                if($re){
                    $count = 0;
                    $_SESSION['count_new_data'] = $count++;
                    echo "enrolled_ok"; 
                }
               
            }
          
        }
    }


    if(isset($_POST['form_one'])){
       
        $pass_id = filter_input(INPUT_POST, 'pass_id', FILTER_SANITIZE_STRING);
        $fname = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_STRING);
        $lname = filter_input(INPUT_POST, 'lname', FILTER_SANITIZE_STRING);
        $mname = filter_input(INPUT_POST, 'mname', FILTER_SANITIZE_STRING);
        $gender = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_STRING);
        $bdate = filter_input(INPUT_POST, 'bdate', FILTER_SANITIZE_STRING);
        $mothersname = filter_input(INPUT_POST, 'mothersname', FILTER_SANITIZE_STRING);
        $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
        $facilitycode = filter_input(INPUT_POST, 'facilitycode', FILTER_SANITIZE_STRING);
        $sestatus = filter_input(INPUT_POST, 'sestatus', FILTER_SANITIZE_STRING);
        $first_time = filter_input(INPUT_POST, 'first_time', FILTER_SANITIZE_STRING);
        $delivery = filter_input(INPUT_POST, 'delivery', FILTER_SANITIZE_STRING);
        $param2 = [
            'firstname' => strtolower($fname), 
            'lastname' => strtolower($lname), 
            'middlename' => strtolower($mname), 
            'gender' => strtolower($gender), 
            'birthdate' => $bdate, 
            'mothersname' => strtolower($mothersname), 
            'address' => strtolower($address),
            'facilitycode' => strtolower($facilitycode),
            'se_status' => $sestatus,
            'first_time' => $first_time,
            'delivery' => $delivery,
            'patient_id' => $pass_id
        ];
        $stmt = $conn->prepare("UPDATE record_one SET firstname = :firstname,lastname = :lastname, middlename = :middlename, gender = :gender, birthdate = :birthdate, mothersname = :mothersname, address = :address, facilitycode = :facilitycode, se_status = :se_status, first_time= :first_time, delivery = :delivery   WHERE patient_id = :patient_id");
        $re = $stmt->execute($param2);
        if($re){
            $param1 = [
                'firstname' => strtolower($fname), 
                'lastname' => strtolower($lname), 
                'middlename' => strtolower($mname), 
                'gender' => strtolower($gender), 
                'birthdate' => $bdate, 
                'mothersname' => strtolower($mothersname), 
                'address' => strtolower($address),
                'facilitycode' => strtolower($facilitycode),
                'patient_id' => $pass_id
            ];
            $stmt = $conn->prepare("UPDATE patient_enrollement SET firstname = :firstname,lastname = :lastname, middlename = :middlename, gender = :gender, birthdate = :birthdate, mothersname = :mothersname, residentialAddress = :address, facilitycode = :facilitycode WHERE patient_id = :patient_id");
            $res = $stmt->execute($param1);
            if($res){
                echo "save";
            }
        }

    }


    if(isset($_POST['form_two'])){
       
        $pass_id = filter_input(INPUT_POST, 'pass_id', FILTER_SANITIZE_STRING);
        $length_birth = filter_input(INPUT_POST, 'length_birth', FILTER_SANITIZE_STRING);
        $weight_birth = filter_input(INPUT_POST, 'weight_birth', FILTER_SANITIZE_STRING);
        $weight_birth_status = filter_input(INPUT_POST, 'weight_birth_status', FILTER_SANITIZE_STRING);
        $breast_feeding = filter_input(INPUT_POST, 'breast_feeding', FILTER_SANITIZE_STRING);
        $bcg = filter_input(INPUT_POST, 'bcg', FILTER_SANITIZE_STRING);
        $bbd = filter_input(INPUT_POST, 'bbd', FILTER_SANITIZE_STRING);
        $nutrition_age_months = filter_input(INPUT_POST, 'nutrition_age_months', FILTER_SANITIZE_STRING);
        $nutrition_length = filter_input(INPUT_POST, 'nutrition_length', FILTER_SANITIZE_STRING);
        $nutrition_length_date = filter_input(INPUT_POST, 'nutrition_length_date', FILTER_SANITIZE_STRING);
        $nutrition_weight = filter_input(INPUT_POST, 'nutrition_weight', FILTER_SANITIZE_STRING);
        $nutrition_weight_date = filter_input(INPUT_POST, 'nutrition_weight_date', FILTER_SANITIZE_STRING);
        $nutrition_status = filter_input(INPUT_POST, 'nutrition_status', FILTER_SANITIZE_STRING);
        $low_birth_first_month = filter_input(INPUT_POST, 'low_birth_first_month', FILTER_SANITIZE_STRING);
        $low_birth_second_month = filter_input(INPUT_POST, 'low_birth_second_month', FILTER_SANITIZE_STRING);
        $low_birth_third_month = filter_input(INPUT_POST, 'low_birth_third_month', FILTER_SANITIZE_STRING);
        $immunization_first_dose = filter_input(INPUT_POST, 'immunization_first_dose', FILTER_SANITIZE_STRING);
        $immunization_second_dose = filter_input(INPUT_POST, 'immunization_second_dose', FILTER_SANITIZE_STRING);
        $immunization_third_dose = filter_input(INPUT_POST, 'immunization_third_dose', FILTER_SANITIZE_STRING);

        $param3 = [
            'length_birth' => strtolower($length_birth), 
            'weight_birth' => strtolower($weight_birth), 
            'weight_birth_status' => strtolower($weight_birth_status), 
            'breast_feeding' => $breast_feeding, 
            'bcg' => $bcg, 
            'bbd' => $bbd, 
            'nutrition_age_months' => strtolower($nutrition_age_months),
            'nutrition_length' => strtolower($nutrition_length), 
            'nutrition_length_date' => $nutrition_length_date, 
            'nutrition_weight' => strtolower($nutrition_weight), 
            'nutrition_weight_date' => $nutrition_weight_date, 
            'nutrition_status' => $nutrition_status, 
            'low_birth_first_month' =>$low_birth_first_month, 
            'low_birth_second_month' => $low_birth_second_month, 
            'low_birth_third_month' => $low_birth_third_month, 
            'immunization_first_dose' => $immunization_first_dose, 
            'immunization_second_dose' =>$immunization_second_dose, 
            'immunization_third_dose' => $immunization_third_dose, 
            'patient_id' => $pass_id,
        ];
      
        $stmt = $conn->prepare("SELECT * FROM record_two WHERE patient_id = :patient_id");
        $stmt->execute(['patient_id' => $pass_id]);
        if($stmt->rowCount() > 0){
            $sql = "UPDATE record_two SET 
            length_birth = :length_birth,
            weight_birth = :weight_birth,
            weight_birth_status = :weight_birth_status,
            breast_feeding = :breast_feeding,
            bcg = :bcg,
            bbd = :bbd,
            nutrition_age_months = :nutrition_age_months,
            nutrition_length = :nutrition_length,
            nutrition_length_date = :nutrition_length_date,
            nutrition_weight = :nutrition_weight,
            nutrition_weight_date = :nutrition_weight_date,
            nutrition_status = :nutrition_status,
            low_birth_first_month = :low_birth_first_month,
            low_birth_second_month = :low_birth_second_month,
            low_birth_third_month = :low_birth_third_month,
            immunization_first_dose = :immunization_first_dose, 
            immunization_second_dose = :immunization_second_dose,
            immunization_third_dose = :immunization_third_dose
             WHERE patient_id = :patient_id";

            $stmt = $conn->prepare($sql);
            $res = $stmt->execute($param3);
            if($res){
                echo "save";
            }
        } 
        else {
       
            $sql1 = "INSERT INTO `record_two`
            (
                `length_birth`, 
                `weight_birth`, 
                `weight_birth_status`, 
                `breast_feeding`, 
                `bcg`, 
                `bbd`, 
                `nutrition_age_months`,
                `nutrition_length`, 
                `nutrition_length_date`, 
                `nutrition_weight`, 
                `nutrition_weight_date`, 
                `nutrition_status`, 
                `low_birth_first_month`, 
                `low_birth_second_month`, 
                `low_birth_third_month`, 
                `immunization_first_dose`, 
                `immunization_second_dose`, 
                `immunization_third_dose`, 
                `patient_id`
            ) VALUES 
            (
                :length_birth, 
                :weight_birth, 
                :weight_birth_status, 
                :breast_feeding, 
                :bcg, 
                :bbd, 
                :nutrition_age_months,
                :nutrition_length, 
                :nutrition_length_date, 
                :nutrition_weight, 
                :nutrition_weight_date, 
                :nutrition_status, 
                :low_birth_first_month, 
                :low_birth_second_month, 
                :low_birth_third_month, 
                :immunization_first_dose, 
                :immunization_second_dose, 
                :immunization_third_dose, 
                :patient_id
            )";
            $stmt = $conn->prepare($sql1);
            $res = $stmt->execute($param3);
            if($res){
                echo "save";
            }
        
        }
    }
   
    if(isset($_POST['form_three'])){
        $pass_id = filter_input(INPUT_POST, 'pass_id', FILTER_SANITIZE_STRING);
        $opv_first_dose = filter_input(INPUT_POST, 'opv_first_dose', FILTER_SANITIZE_STRING);
        $opv_second_dose = filter_input(INPUT_POST, 'opv_second_dose', FILTER_SANITIZE_STRING);
        $opv_third_dose = filter_input(INPUT_POST, 'opv_third_dose', FILTER_SANITIZE_STRING);
        $pcv_first_dose = filter_input(INPUT_POST, 'pcv_first_dose', FILTER_SANITIZE_STRING);
        $pcv_second_dose = filter_input(INPUT_POST, 'pcv_second_dose', FILTER_SANITIZE_STRING);
        $pcv_third_dose = filter_input(INPUT_POST, 'pcv_third_dose', FILTER_SANITIZE_STRING);
        $ipv_third_dose = filter_input(INPUT_POST, 'ipv_third_dose', FILTER_SANITIZE_STRING);
        $exlusive_breastfed_one_month = filter_input(INPUT_POST, 'exlusive_breastfed_one_month', FILTER_SANITIZE_STRING);
        $exlusive_breastfed_one_month_date = filter_input(INPUT_POST, 'exlusive_breastfed_one_month_date', FILTER_SANITIZE_STRING);
        $exlusive_breastfed_two_month = filter_input(INPUT_POST, 'exlusive_breastfed_two_month', FILTER_SANITIZE_STRING);
        $exlusive_breastfed_two_month_date = filter_input(INPUT_POST, 'exlusive_breastfed_two_month_date', FILTER_SANITIZE_STRING);
        $exlusive_breastfed_three_month = filter_input(INPUT_POST, 'exlusive_breastfed_three_month', FILTER_SANITIZE_STRING);
        $exlusive_breastfed_three_month_date = filter_input(INPUT_POST, 'exlusive_breastfed_three_month_date', FILTER_SANITIZE_STRING);
        $exlusive_breastfed_four_month = filter_input(INPUT_POST, 'exlusive_breastfed_four_month', FILTER_SANITIZE_STRING);
        $exlusive_breastfed_four_month_date = filter_input(INPUT_POST, 'exlusive_breastfed_four_month_date', FILTER_SANITIZE_STRING);
        $nutrition_age_month = filter_input(INPUT_POST, 'nutrition_age_month', FILTER_SANITIZE_STRING);
        $nutrition_length_month = filter_input(INPUT_POST, 'nutrition_length_month', FILTER_SANITIZE_STRING);
        $nutrition_weight_month = filter_input(INPUT_POST, 'nutrition_weight_month', FILTER_SANITIZE_STRING);
        $nutrition_status_month = filter_input(INPUT_POST, 'nutrition_status_month', FILTER_SANITIZE_STRING);
        //$exclusive_breastfeeding_option = filter_input(INPUT_POST, 'exclusive_breastfeeding_option', FILTER_SANITIZE_STRING);
        //$exclusive_breastfeeding_date = filter_input(INPUT_POST, 'exclusive_breastfeeding_date', FILTER_SANITIZE_STRING);

        $param4 = [
            'opv_first_dose' => $opv_first_dose, 
            'opv_second_dose' => $opv_second_dose, 
            'opv_third_dose' => $opv_third_dose, 
            'pcv_first_dose' => $pcv_first_dose, 
            'pcv_second_dose' => $pcv_second_dose, 
            'pcv_third_dose' => $pcv_third_dose, 
            'ipv_third_dose' => $ipv_third_dose, 
            'exlusive_breastfed_one_month' => $exlusive_breastfed_one_month, 
            'exlusive_breastfed_one_month_date' => $exlusive_breastfed_one_month_date, 
            'exlusive_breastfed_two_month' => $exlusive_breastfed_two_month, 
            'exlusive_breastfed_two_month_date' => $exlusive_breastfed_two_month_date, 
            'exlusive_breastfed_three_month' => $exlusive_breastfed_three_month, 
            'exlusive_breastfed_three_month_date' => $exlusive_breastfed_three_month_date, 
            'exlusive_breastfed_four_month' => $exlusive_breastfed_four_month, 
            'exlusive_breastfed_four_month_date' => $exlusive_breastfed_four_month_date, 
            'nutrition_age_month' => $nutrition_age_month, 
            'nutrition_length_month' => $nutrition_length_month, 
            'nutrition_weight_month' => $nutrition_weight_month, 
            'nutrition_status_month' => $nutrition_status_month, 
            'patient_id' => $pass_id
        ];

        $stmt = $conn->prepare("SELECT * FROM record_three WHERE patient_id = :patient_id");
        $stmt->execute(['patient_id' => $pass_id]);
        if($stmt->rowCount() > 0){
            $sql = "
            UPDATE 
            `record_three` 
            SET 
            `opv_first_dose`= :opv_first_dose,
            `opv_second_dose`= :opv_second_dose,
            `opv_third_dose`= :opv_third_dose,
            `pcv_first_dose`= :pcv_first_dose,
            `pcv_second_dose`= :pcv_second_dose,
            `pcv_third_dose`= :pcv_third_dose,
            `ipv_third_dose`= :ipv_third_dose,
            `exlusive_breastfed_one_month`= :exlusive_breastfed_one_month,
            `exlusive_breastfed_one_month_date`= :exlusive_breastfed_one_month_date,
            `exlusive_breastfed_two_month`= :exlusive_breastfed_two_month,
            `exlusive_breastfed_two_month_date`= :exlusive_breastfed_two_month_date,
            `exlusive_breastfed_three_month`= :exlusive_breastfed_three_month,
            `exlusive_breastfed_three_month_date`= :exlusive_breastfed_three_month_date,
            `exlusive_breastfed_four_month`= :exlusive_breastfed_four_month,
            `exlusive_breastfed_four_month_date`= :exlusive_breastfed_four_month_date,
            `nutrition_age_month`= :nutrition_age_month,
            `nutrition_length_month`= :nutrition_length_month,
            `nutrition_weight_month`= :nutrition_weight_month,
            `nutrition_status_month`= :nutrition_status_month
            WHERE `patient_id`= :patient_id
            ";

            $stmt = $conn->prepare($sql);
            $res = $stmt->execute($param4);
            if($res){
                echo "save";
            }
        }
        else {
       
            $sql1 = "
            INSERT INTO `record_three` (
                `opv_first_dose`, 
                `opv_second_dose`, 
                `opv_third_dose`, 
                `pcv_first_dose`, 
                `pcv_second_dose`, 
                `pcv_third_dose`, 
                `ipv_third_dose`, 
                `exlusive_breastfed_one_month`, 
                `exlusive_breastfed_one_month_date`, 
                `exlusive_breastfed_two_month`, 
                `exlusive_breastfed_two_month_date`, 
                `exlusive_breastfed_three_month`, 
                `exlusive_breastfed_three_month_date`, 
                `exlusive_breastfed_four_month`, 
                `exlusive_breastfed_four_month_date`, 
                `nutrition_age_month`, 
                `nutrition_length_month`, 
                `nutrition_weight_month`, 
                `nutrition_status_month`, 
                `patient_id`
                )
                 VALUES 
                 (
                    :opv_first_dose, 
                    :opv_second_dose, 
                    :opv_third_dose, 
                    :pcv_first_dose, 
                    :pcv_second_dose, 
                    :pcv_third_dose, 
                    :ipv_third_dose, 
                    :exlusive_breastfed_one_month, 
                    :exlusive_breastfed_one_month_date, 
                    :exlusive_breastfed_two_month, 
                    :exlusive_breastfed_two_month_date, 
                    :exlusive_breastfed_three_month, 
                    :exlusive_breastfed_three_month_date, 
                    :exlusive_breastfed_four_month, 
                    :exlusive_breastfed_four_month_date, 
                    :nutrition_age_month, 
                    :nutrition_length_month, 
                    :nutrition_weight_month, 
                    :nutrition_status_month, 
                    :patient_id
                 )
            ";
            $stmt = $conn->prepare($sql1);
            $res = $stmt->execute($param4);
            if($res){
                echo "save";
            }
        
        }
    }

  
    if(isset($_POST['form_four'])){
        $pass_id = filter_input(INPUT_POST, 'pass_id', FILTER_SANITIZE_STRING);
        $feeding_six_months = filter_input(INPUT_POST, 'feeding_six_months', FILTER_SANITIZE_STRING);
        $feeding_six_months_duration = filter_input(INPUT_POST, 'feeding_six_months_duration', FILTER_SANITIZE_STRING);
        $vitamin_a_date = filter_input(INPUT_POST, 'vitamin_a_date', FILTER_SANITIZE_STRING);
        $mnp_date = filter_input(INPUT_POST, 'mnp_date', FILTER_SANITIZE_STRING);
        $mmr_date_dose_one = filter_input(INPUT_POST, 'mmr_date_dose_one', FILTER_SANITIZE_STRING);
        $nutrional_age_months = filter_input(INPUT_POST, 'nutrional_age_months', FILTER_SANITIZE_STRING);
        $nutrional_length = filter_input(INPUT_POST, 'nutrional_length', FILTER_SANITIZE_STRING);
        $nutrional_weight = filter_input(INPUT_POST, 'nutrional_weight', FILTER_SANITIZE_STRING);
        $nutritional_status = filter_input(INPUT_POST, 'nutritional_status', FILTER_SANITIZE_STRING);
        $mmr_date_dose_twi = filter_input(INPUT_POST, 'mmr_date_dose_twi', FILTER_SANITIZE_STRING);
        $fic_date = filter_input(INPUT_POST, 'fic_date', FILTER_SANITIZE_STRING);
        $remarks = filter_input(INPUT_POST, 'remarks', FILTER_SANITIZE_STRING);
        
        $param5 = [
            'feeding_six_months' => $feeding_six_months,
            'feeding_six_months_duration' => $feeding_six_months_duration,
            'vitamin_a_date' => $vitamin_a_date,
            'mnp_date' => $mnp_date,
            'mmr_date_dose_one' => $mmr_date_dose_one,
            'nutrional_age_months' => $nutrional_age_months,
            'nutrional_length' => $nutrional_length,
            'nutrional_weight' => $nutrional_weight,
            'nutritional_status' => $nutritional_status,
            'mmr_date_dose_twi' => $mmr_date_dose_twi,
            'fic_date' => $fic_date,
            'remarks' => $remarks,
            'patient_id' => $pass_id
        ];

        $stmt = $conn->prepare("SELECT * FROM record_four WHERE patient_id = :patient_id");
        $stmt->execute(['patient_id' => $pass_id]);
        if($stmt->rowCount() > 0){
            $sql = "
            UPDATE `record_four` SET 
            `feeding_six_months` = :feeding_six_months,
            `feeding_six_months_duration` = :feeding_six_months_duration,
            `vitamin_a_date` = :vitamin_a_date,
            `mnp_date` = :mnp_date,
            `mmr_date_dose_one` = :mmr_date_dose_one,
            `nutrional_age_months` = :nutrional_age_months,
            `nutrional_length` = :nutrional_length,
            `nutrional_weight` = :nutrional_weight,
            `nutritional_status` = :nutritional_status,
            `mmr_date_dose_twi` = :mmr_date_dose_twi,
            `fic_date` = :fic_date,
            `remarks` = :remarks
             WHERE `patient_id` = :patient_id
            ";

            $stmt = $conn->prepare($sql);
            $res = $stmt->execute($param5);
            if($res){
                echo "save";
            }
        }else {
           
            $sql1 = "
            INSERT INTO `record_four` 
            (
                `feeding_six_months`, 
                `feeding_six_months_duration`, 
                `vitamin_a_date`, 
                `mnp_date`,
                `mmr_date_dose_one`,
                `nutrional_age_months`, 
                `nutrional_length`, 
                `nutrional_weight`, 
                `nutritional_status`, 
                `mmr_date_dose_twi`, 
                `fic_date`, 
                `remarks`, 
                `patient_id`
            ) 
                VALUES 
            (
                :feeding_six_months,
                :feeding_six_months_duration,
                :vitamin_a_date,
                :mnp_date,
                :mmr_date_dose_one,
                :nutrional_age_months,
                :nutrional_length,
                :nutrional_weight,
                :nutritional_status,
                :mmr_date_dose_twi,
                :fic_date,
                :remarks,
                :patient_id
            )
            ";
            $stmt = $conn->prepare($sql1);
            $res = $stmt->execute($param5);
            if($res){
                echo "save";
            }
        }
    }

    if(isset($_POST['approved'])){
        $users_id = filter_input(INPUT_POST, 'users_id', FILTER_SANITIZE_STRING);
        $sql = "UPDATE users SET status = 'granted' WHERE users_id = :users_id";
        $stmt = $conn->prepare($sql);
        $re = $stmt->execute(['users_id'=> $users_id]);
        if($re){
            echo "save";
        }
    }

    
    if(isset($_POST['declined'])){
        $users_id = filter_input(INPUT_POST, 'users_id', FILTER_SANITIZE_STRING);
        $sql = "DELETE FROM users WHERE users_id = :users_id";
        $stmt = $conn->prepare($sql);
        $re = $stmt->execute(['users_id'=> $users_id]);
        if($re){
            echo "save";
        }
    }
 
    if(isset($_POST['add_individual'])){
        $patient_id = filter_input(INPUT_POST, 'patient_id', FILTER_SANITIZE_STRING);
        $sql = "SELECT * FROM patient_enrollement WHERE patient_id = :patient_id";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['patient_id'=> $patient_id]);
        $data = json_encode($stmt->fetch());
        echo $data;
    }
// fetch total enrolled
    if(isset($_POST['fetch_total_enrolled'])){
        $sql = "SELECT timestamp, patient_id FROM patient_enrollement GROUP BY timestamp";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
       
        $data = array();
        foreach($result as $row){
            $data[] = $row;
        }
        echo json_encode($data);
    }
    if(isset($_POST['fetch_total_vaccinated'])){
        $sql = "SELECT timestamp, patient_id FROM individual_treatment GROUP BY timestamp";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
       
        $data = array();
        foreach($result as $row){
            $data[] = $row;
        }
        echo json_encode($data);
    }
// fetch user total
    if(isset($_POST['fetch_total_users'])){
        $sql = "SELECT usertype FROM users GROUP BY users_id";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
       
        $data = array();
        foreach($result as $row){
            $data[] = $row;
        }
        echo json_encode($data);
    }
// insert individual
    if(isset($_POST['individual_form_insert'])){
      
        $patient_id = filter_input(INPUT_POST, 'patient_id', FILTER_SANITIZE_STRING);
        $lname = filter_input(INPUT_POST, 'lname', FILTER_SANITIZE_STRING);
        $fname = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_STRING);
        $mname = filter_input(INPUT_POST, 'mname', FILTER_SANITIZE_STRING);
        $suffix = filter_input(INPUT_POST, 'suffix', FILTER_SANITIZE_STRING);
        $age = filter_input(INPUT_POST, 'age', FILTER_SANITIZE_STRING);
        $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
        $modeoftransaction = filter_input(INPUT_POST, 'modeoftransaction', FILTER_SANITIZE_STRING);
        $dateofconsultation = filter_input(INPUT_POST, 'dateofconsultation', FILTER_SANITIZE_STRING);
        $consultationtime = filter_input(INPUT_POST, 'consultationtime', FILTER_SANITIZE_STRING);
        $bloodpressure = filter_input(INPUT_POST, 'bloodpressure', FILTER_SANITIZE_STRING);
        $temperature = filter_input(INPUT_POST, 'temperature', FILTER_SANITIZE_STRING);
        $height = filter_input(INPUT_POST, 'height', FILTER_SANITIZE_STRING);
        $weight = filter_input(INPUT_POST, 'weight', FILTER_SANITIZE_STRING);

        $nameattendingprovider = filter_input(INPUT_POST, 'nameattendingprovider', FILTER_SANITIZE_STRING);
        $natureofvisit = filter_input(INPUT_POST, 'natureofvisit', FILTER_SANITIZE_STRING);
        $typeofconsultationpurposeofvisit = filter_input(INPUT_POST, 'typeofconsultationpurposeofvisit', FILTER_SANITIZE_STRING);
        $refferedfrom = filter_input(INPUT_POST, 'refferedfrom', FILTER_SANITIZE_STRING);
        $refferedto = filter_input(INPUT_POST, 'refferedto', FILTER_SANITIZE_STRING);
        $reasonforreferral = filter_input(INPUT_POST, 'reasonforreferral', FILTER_SANITIZE_STRING);
        $refferedby = filter_input(INPUT_POST, 'refferedby', FILTER_SANITIZE_STRING);
        $cheifcomplaints = filter_input(INPUT_POST, 'cheifcomplaints', FILTER_SANITIZE_STRING);
        $diagnosis = filter_input(INPUT_POST, 'diagnosis', FILTER_SANITIZE_STRING);
        $medicaltreatment = filter_input(INPUT_POST, 'medicaltreatment', FILTER_SANITIZE_STRING);
        $nameofhealthprovider = filter_input(INPUT_POST, 'nameofhealthprovider', FILTER_SANITIZE_STRING);
        $labfindingsimpression = filter_input(INPUT_POST, 'labfindingsimpression', FILTER_SANITIZE_STRING);
        $performedlabtest = filter_input(INPUT_POST, 'performedlabtest', FILTER_SANITIZE_STRING);
        

        $sql = "INSERT INTO `individual_treatment`(
            `lname`, `fname`, `mname`, `suffix`, `age`, `address`, 
            `modeoftransaction`, `dateofconsultation`, `consultationtime`, 
            `bloodpressure`, `temperature`, `height`, `weight`, `nameattendingprovider`, 
            `natureofvisit`, `typeofconsultationpurposeofvisit`, `refferedfrom`, `refferedto`, 
            `reasonforreferral`, `refferedby`, `cheifcomplaints`, `diagnosis`, `medicaltreatment`,
             `nameofhealthprovider`, `labfindingsimpression`, `performedlabtest`, `patient_id`)
         VALUES 
         (:lname,:fname,:mname,:suffix,:age,:address,
         :modeoftransaction,:dateofconsultation,:consultationtime,:bloodpressure,:temperature,:height,:weight,
         :nameattendingprovider,:natureofvisit,:typeofconsultationpurposeofvisit,:refferedfrom,:refferedto,:reasonforreferral,
         :refferedby,:cheifcomplaints,:diagnosis,:medicaltreatment,:nameofhealthprovider,:labfindingsimpression,:performedlabtest,:patient_id)";

        $param6 = [
        'lname' => $lname,
        'fname' => $fname,
        'mname' => $mname,
        'suffix' => $suffix,
        'age' => $age,
        'address' => $address,
        'modeoftransaction' => $modeoftransaction,
        'dateofconsultation' => $dateofconsultation,
        'consultationtime' => $consultationtime,
        'bloodpressure' => $bloodpressure,
        'temperature' => $temperature,
        'height' => $height,
        'weight' => $weight,

        'nameattendingprovider' => $nameattendingprovider,
        'natureofvisit' => $natureofvisit,
        'typeofconsultationpurposeofvisit' => $typeofconsultationpurposeofvisit,
        'refferedfrom' => $refferedfrom,
        'refferedto' => $refferedto,
        'reasonforreferral' => $reasonforreferral,
        'refferedby' => $refferedby,
        'cheifcomplaints' => $cheifcomplaints,
        'diagnosis' => $diagnosis,
        'medicaltreatment' => $medicaltreatment,
        'nameofhealthprovider' => $nameofhealthprovider,
        'labfindingsimpression' => $labfindingsimpression,
        'performedlabtest' => $performedlabtest,

        'patient_id' => $patient_id
        ];

        $stmt = $conn->prepare($sql);
        $res = $stmt->execute($param6);
        if($res){
          
            $stmt = $conn->prepare("UPDATE patient_enrollement SET schedule_status = :schedule_status  WHERE patient_id = :patient_id");
            $stat = $stmt->execute(['schedule_status' => 'approved', 'patient_id' => $patient_id]);
            if($stat){
                echo "save";
            }
        }

    }
// fetch sms data
    if(isset($_POST['get_enrolled_user_sms'])){
        $patient_id = filter_input(INPUT_POST, 'patient_id', FILTER_SANITIZE_STRING);
        $sql = "SELECT contactnumber,firstname,lastname, middlename, patient_id,users_id, suffix FROM patient_enrollement WHERE patient_id = :patient_id";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['patient_id'=> $patient_id]);
        $data = json_encode($stmt->fetch());
        echo $data;
    }
// send sms
    if(isset($_POST['sms'])){

        $sender_name = filter_input(INPUT_POST, 'sender_name', FILTER_SANITIZE_STRING);
        $contactnumber = filter_input(INPUT_POST, 'contactnumber', FILTER_SANITIZE_STRING);
        $childname = filter_input(INPUT_POST, 'childname', FILTER_SANITIZE_STRING);
        $schedule_time = filter_input(INPUT_POST, 'schedule_time', FILTER_SANITIZE_STRING);
        $schedule_date = filter_input(INPUT_POST, 'schedule_date', FILTER_SANITIZE_STRING);
         $id = filter_input(INPUT_POST, 'pass_id', FILTER_SANITIZE_STRING);
        $schedule_time = date('h:i A', strtotime($schedule_time));
        
        $body_param = 
        "IMMUNIZATION SCHEDULE\nName: $childname\nDate:  $schedule_date\nTime: $schedule_time\nSend by: $sender_name";
        $send_status = $sendsms->itexmo($contactnumber, $body_param);
        if($send_status == false){
            $param_sms = [
                'sender_name' => strtolower($sender_name), 
                'contactnumber' => strtolower($contactnumber), 
                'childname' => strtolower($childname), 
                'schedule_time' => $schedule_time, 
                'schedule_date' => $schedule_date, 
                'users_id' => $id
            ];
          
            $stmt = $conn->prepare("INSERT INTO sms_logs (sender_name, contactnumber, childname, schedule_time, schedule_date, users_id) VALUES (:sender_name,:contactnumber, :childname, :schedule_time, :schedule_date, :users_id)");
            $res = $stmt->execute($param_sms);
            if($res){
                $stmt = $conn->prepare("UPDATE patient_enrollement SET schedule = :schedule, schedule_status = :schedule_status  WHERE patient_id = :patient_id");
                $stat = $stmt->execute(['schedule' => $schedule_date,'schedule_status' => 'pending', 'patient_id' => $patient_id]);
                if($stat){
                    echo "ok";
                }
             }
        }else{
            echo "no";
        }
       
        
       
    }
// patient enrolled 
    if(isset($_POST['patient_enrolled_edit'])){
        
        $users_id = filter_input(INPUT_POST, 'users_id', FILTER_SANITIZE_STRING);
        $lname = filter_input(INPUT_POST, 'lname', FILTER_SANITIZE_STRING);
        $fname = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_STRING);
        $mname = filter_input(INPUT_POST, 'mname', FILTER_SANITIZE_STRING);
        $gender = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_STRING);
        $bdate = filter_input(INPUT_POST, 'bdate', FILTER_SANITIZE_STRING);
        $birthplace = filter_input(INPUT_POST, 'birthplace', FILTER_SANITIZE_STRING);
        $bloodtype = filter_input(INPUT_POST, 'bloodtype', FILTER_SANITIZE_STRING);
        $spousename = filter_input(INPUT_POST, 'spousename', FILTER_SANITIZE_STRING);
        $civilstatus = filter_input(INPUT_POST, 'civilstatus', FILTER_SANITIZE_STRING);
        $educationalattainment = filter_input(INPUT_POST, 'educationalattainment', FILTER_SANITIZE_STRING);
        $employmentstatus = filter_input(INPUT_POST, 'employmentstatus', FILTER_SANITIZE_STRING);
        $familymember = filter_input(INPUT_POST, 'familymember', FILTER_SANITIZE_STRING);
        $facilitycode = filter_input(INPUT_POST, 'facilitycode', FILTER_SANITIZE_STRING);
        $suffixname = filter_input(INPUT_POST, 'suffixname', FILTER_SANITIZE_STRING);
        $contactnumber = filter_input(INPUT_POST, 'contactnumber', FILTER_SANITIZE_STRING);
        $mothersname = filter_input(INPUT_POST, 'mothersname', FILTER_SANITIZE_STRING);
        $residentialAddress = filter_input(INPUT_POST, 'residentialAddress', FILTER_SANITIZE_STRING);
        $dswdnhts = filter_input(INPUT_POST, 'dswdnhts', FILTER_SANITIZE_STRING);
        $facility_no = filter_input(INPUT_POST, 'facility_no', FILTER_SANITIZE_STRING);
        $fourpsmember = filter_input(INPUT_POST, 'fourpsmember', FILTER_SANITIZE_STRING);
        $phmember = filter_input(INPUT_POST, 'phmember', FILTER_SANITIZE_STRING);
        $statustype = filter_input(INPUT_POST, 'statustype', FILTER_SANITIZE_STRING);
        $phealthno = filter_input(INPUT_POST, 'phealthno', FILTER_SANITIZE_STRING);
        $membercategory = filter_input(INPUT_POST, 'membercategory', FILTER_SANITIZE_STRING);
        $psbmember = filter_input(INPUT_POST, 'psbmember', FILTER_SANITIZE_STRING);

        $timestamp = filter_input(INPUT_POST, 'timestamp', FILTER_SANITIZE_STRING);

            $param = [
                'lastname' => strtolower($lname), 
                'firstname' => strtolower($fname), 
                'middlename' => strtolower($mname), 
                'gender' => strtolower($gender), 
                'birthdate' => $bdate, 
                'birthplace' => strtolower($birthplace), 
                'bloodtype' => strtolower($bloodtype),
                'spousename' => strtolower($spousename), 
                'civilstatus' => strtolower($civilstatus), 
                'educationalattainment' => strtolower($educationalattainment), 
                'employmentstatus' => strtolower($employmentstatus), 
                'familymember' => strtolower($familymember), 
                'facilitycode' => strtolower($facilitycode), 
                'suffix' => strtolower($suffixname), 
                'contactnumber' => strtolower($contactnumber), 
                'mothersname' => strtolower($mothersname), 
                'residentialAddress' => strtolower($residentialAddress), 
                'dswdnhts' => strtolower($dswdnhts), 
                'facility_no' => strtolower($facility_no), 
                'fourpsmember' => strtolower($fourpsmember), 
                'phmember' => strtolower($phmember), 
                'statustype' => strtolower($statustype), 
                'phealthno' => strtolower($phealthno), 
                'membercategory' => strtolower($membercategory), 
                'psbmember' => strtolower($phmember),
                'users_id' => strtolower($users_id),
                'timestamp' => $timestamp,
            ];
           
            $result = $db->query("UPDATE patient_enrollement SET lastname = :lastname , firstname = :firstname, middlename = :middlename, gender = :gender, birthdate = :birthdate, birthplace = :birthplace, bloodtype = :bloodtype, spousename = :spousename, civilstatus = :civilstatus, educationalattainment = :educationalattainment, employmentstatus = :employmentstatus, familymember = :familymember, facilitycode = :facilitycode, suffix = :suffix, contactnumber = :contactnumber, mothersname = :mothersname, residentialAddress = :residentialAddress, dswdnhts = :dswdnhts, facility_no = :facility_no, fourpsmember = :fourpsmember, phmember = :phmember, statustype = :statustype, phealthno = :phealthno, membercategory = :membercategory, psbmember = :psbmember, timestamp = :timestamp WHERE users_id = :users_id",$param);
            
            if($result){
                echo "enrolled_update_ok";
            }
       
    }
// fetch user
    if(isset($_POST['get_user_data'])){
       
        $users_id = filter_input(INPUT_POST, 'users_id', FILTER_SANITIZE_STRING);
        $sql = "SELECT * FROM patient_enrollement WHERE users_id = :users_id";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['users_id'=> $users_id]);
        echo $stmt->rowCount();
       
    }
// fetch individual
    if(isset($_POST['get_user_individual'])){
       
        $users_id = filter_input(INPUT_POST, 'users_id', FILTER_SANITIZE_STRING);
        $sql = "SELECT * FROM patient_enrollement WHERE users_id = :users_id";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['users_id'=> $users_id]);
        
       if($stmt->rowCount() == 1){
            $data = $stmt->fetch();
            $patient_id = $data->patient_id;
            $sql = "SELECT * FROM individual_treatment WHERE patient_id = :patient_id";
            $stmt = $conn->prepare($sql);
            $stmt->execute(['patient_id'=> $patient_id]);
            echo $stmt->rowCount();
       }else {
           echo 0;
       }
       
    }
// delete user
    if(isset($_POST['delete_user'])){
      
        $users_id = filter_input(INPUT_POST, 'users_id', FILTER_SANITIZE_STRING);
        $admin_pass =  filter_input(INPUT_POST, 'admin_pass', FILTER_SANITIZE_STRING);
        $stmt = $conn->prepare("SELECT * FROM users WHERE usertype='admin'");
        $stmt->execute();
        $admin = $stmt->fetch();
       
        if($admin->password == md5($admin_pass)){
            $sql = "DELETE FROM users WHERE users_id = :users_id";
            $stmt = $conn->prepare($sql);
            $re = $stmt->execute(['users_id'=> $users_id]);
            if($re){
                echo "save";
            }
        }
        else{
            echo "no";
        }
        
    }

    // delete staff
   if(isset($_POST['delete_staff'])){
        $users_id = filter_input(INPUT_POST, 'users_id', FILTER_SANITIZE_STRING);
        $admin_pass =  filter_input(INPUT_POST, 'admin_pass', FILTER_SANITIZE_STRING);
        $stmt = $conn->prepare("SELECT * FROM users WHERE usertype='admin'");
        $stmt->execute();
        $admin = $stmt->fetch();
       
        if($admin->password == md5($admin_pass)){
            $sql = "DELETE FROM users WHERE users_id = :users_id";
            $stmt = $conn->prepare($sql);
            $re = $stmt->execute(['users_id'=> $users_id]);
            if($re){
                echo "save";
            }
        }else {
            echo "no";
        }
        
    }

    }

    // post schedule
if(isset($_POST['notif'])){
    $patient_id = filter_input(INPUT_POST, 'pass_id', FILTER_SANITIZE_STRING);
    $users_id = filter_input(INPUT_POST, 'users_id', FILTER_SANITIZE_STRING);
    $sender_name = filter_input(INPUT_POST, 'sender_name', FILTER_SANITIZE_STRING);
    $childname = filter_input(INPUT_POST, 'childname', FILTER_SANITIZE_STRING);
    $schedule_time = filter_input(INPUT_POST, 'schedule_time', FILTER_SANITIZE_STRING);
    $schedule_date = filter_input(INPUT_POST, 'schedule_date', FILTER_SANITIZE_STRING);
  
    $param_notif = [
        'sender_name' => strtolower($sender_name), 
        'childname' => strtolower($childname), 
        'schedule_time' => $schedule_time, 
        'schedule_date' => $schedule_date, 
        'patient_id' => $patient_id,
        'users_id' => $users_id
    ];
  
    $stmt = $conn->prepare("INSERT INTO schedule (sender_name, childname, schedule_time, schedule_date, patient_id, users_id) VALUES (:sender_name, :childname, :schedule_time, :schedule_date, :patient_id, :users_id)");
    $res = $stmt->execute($param_notif);
    if($res){
        $stmt = $conn->prepare("UPDATE patient_enrollement SET schedule = :schedule, schedule_status = :schedule_status  WHERE patient_id = :patient_id");
        $stat = $stmt->execute(['schedule' => $schedule_date,'schedule_status' => 'pending', 'patient_id' => $patient_id]);
        if($stat){
            echo "save";
        }
    }
}

// manual register
if(isset($_POST['manual_register'])){
    $rfname = filter_input(INPUT_POST, 'rfname', FILTER_SANITIZE_STRING);
    $rlname = filter_input(INPUT_POST, 'rlname', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'rpassword', FILTER_SANITIZE_STRING);
    $usertype = "user";

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email || firstname = :firstname && lastname = :lastname");
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':firstname', $fname, PDO::PARAM_STR);
    $stmt->bindParam(':lastname', $lname, PDO::PARAM_STR);
    $stmt->execute(['email' => $email, 'firstname' => $fname, 'lastname'=> $lname]);
    if($stmt->rowCount() > 0){
        echo "exist";
    } else {
        $rrfname = filter_input(INPUT_POST, 'rfname', FILTER_SANITIZE_STRING);
        $rrlname = filter_input(INPUT_POST, 'rlname', FILTER_SANITIZE_STRING);
        $rremail = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
        $rrpassword = filter_input(INPUT_POST, 'rpassword', FILTER_SANITIZE_STRING);
        $rrusertype = "user";

        $param = [
            'firstname' => strtolower($rrfname),
            'lastname' => strtolower($rrlname) ,
            'email' => strtolower($rremail) ,
            'password' => md5($rrpassword),
            'usertype' => strtolower($rrusertype)
        ];
        if($rrusertype == "user"){
            $result = $db->query("INSERT INTO users (firstname, lastname,email, password,usertype, status) VALUES (:firstname,:lastname, :email , :password, :usertype, 'granted')",$param);
            if($result){
                $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
                $stmt->bindParam(':email', $email, PDO::PARAM_STR);
                $stmt->execute(['email' => $email]);
                $user = $stmt->fetch();
                if($user){
                    $xlname = filter_input(INPUT_POST, 'lname', FILTER_SANITIZE_STRING);
                    $xfname = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_STRING);
                    $xmname = filter_input(INPUT_POST, 'mname', FILTER_SANITIZE_STRING);
            
                    $stmt = $conn->prepare("SELECT * FROM patient_enrollement WHERE lastname = :lastname && firstname = :firstname && middlename = :middlename");
                    $stmt->bindParam(':lastname', $xlname, PDO::PARAM_STR);
                    $stmt->bindParam(':firstname', $xfname, PDO::PARAM_STR);
                    $stmt->bindParam(':middlename', $xmname, PDO::PARAM_STR);
                    $stmt->execute(['lastname' => $xlname, 'firstname' => $xfname, 'middlename'=> $xmname]);
                    if($stmt->rowCount() > 0){
                        echo "enrolled_exist";
                    } else {
                        $users_id = $user->users_id;
                        $lname = filter_input(INPUT_POST, 'lname', FILTER_SANITIZE_STRING);
                        $fname = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_STRING);
                        $mname = filter_input(INPUT_POST, 'mname', FILTER_SANITIZE_STRING);
                        $gender = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_STRING);
                        $bdate = filter_input(INPUT_POST, 'birthdate', FILTER_SANITIZE_STRING);
                        $birthplace = filter_input(INPUT_POST, 'birthplace', FILTER_SANITIZE_STRING);
                        $bloodtype = filter_input(INPUT_POST, 'bloodtype', FILTER_SANITIZE_STRING);
                        $spousename = filter_input(INPUT_POST, 'spousename', FILTER_SANITIZE_STRING);
                        $civilstatus = filter_input(INPUT_POST, 'civilstatus', FILTER_SANITIZE_STRING);
                        $educationalattainment = filter_input(INPUT_POST, 'educationalattainment', FILTER_SANITIZE_STRING);
                        $employmentstatus = filter_input(INPUT_POST, 'employmentstatus', FILTER_SANITIZE_STRING);
                        $familymember = filter_input(INPUT_POST, 'familymember', FILTER_SANITIZE_STRING);
                        $facilitycode = filter_input(INPUT_POST, 'facilitycode', FILTER_SANITIZE_STRING);
                        $suffixname = filter_input(INPUT_POST, 'suffixname', FILTER_SANITIZE_STRING);
                        $contactnumber = filter_input(INPUT_POST, 'contactnumber', FILTER_SANITIZE_STRING);
                        $mothersname = filter_input(INPUT_POST, 'mothersname', FILTER_SANITIZE_STRING);
                        $residentialAddress = filter_input(INPUT_POST, 'residentialAddress', FILTER_SANITIZE_STRING);
                        $dswdnhts = filter_input(INPUT_POST, 'dswdnhts', FILTER_SANITIZE_STRING);
                        $facility_no = filter_input(INPUT_POST, 'facility_no', FILTER_SANITIZE_STRING);
                        $fourpsmember = filter_input(INPUT_POST, 'fourpsmember', FILTER_SANITIZE_STRING);
                        $phmember = filter_input(INPUT_POST, 'phmember', FILTER_SANITIZE_STRING);
                        $statustype = filter_input(INPUT_POST, 'statustype', FILTER_SANITIZE_STRING);
                        $phealthno = filter_input(INPUT_POST, 'phealthno', FILTER_SANITIZE_STRING);
                        $membercategory = filter_input(INPUT_POST, 'membercategory', FILTER_SANITIZE_STRING);
                        $psbmember = filter_input(INPUT_POST, 'psbmember', FILTER_SANITIZE_STRING);

                        $param = [
                            'lastname' => strtolower($lname), 
                            'firstname' => strtolower($fname), 
                            'middlename' => strtolower($mname), 
                            'gender' => strtolower($gender), 
                            'birthdate' => $bdate, 
                            'birthplace' => strtolower($birthplace), 
                            'bloodtype' => strtolower($bloodtype),
                            'spousename' => strtolower($spousename), 
                            'civilstatus' => strtolower($civilstatus), 
                            'educationalattainment' => strtolower($educationalattainment), 
                            'employmentstatus' => strtolower($employmentstatus), 
                            'familymember' => strtolower($familymember), 
                            'facilitycode' => strtolower($facilitycode), 
                            'suffix' => strtolower($suffixname), 
                            'contactnumber' => strtolower($contactnumber), 
                            'mothersname' => strtolower($mothersname), 
                            'residentialAddress' => strtolower($residentialAddress), 
                            'dswdnhts' => strtolower($dswdnhts), 
                            'facility_no' => strtolower($facility_no), 
                            'fourpsmember' => strtolower($fourpsmember), 
                            'phmember' => strtolower($phmember), 
                            'statustype' => strtolower($statustype), 
                            'phealthno' => strtolower($phealthno), 
                            'membercategory' => strtolower($membercategory), 
                            'psbmember' => strtolower($phmember),
                            'users_id' => strtolower($users_id),
                        ];
                
                        $result = $db->query("INSERT INTO patient_enrollement (lastname, firstname, middlename, gender, birthdate, birthplace, bloodtype, spousename, civilstatus, educationalattainment, employmentstatus, familymember, facilitycode, suffix, contactnumber, mothersname, residentialAddress, dswdnhts, facility_no, fourpsmember, phmember, statustype, phealthno, membercategory, psbmember, users_id) VALUES (:lastname, :firstname, :middlename, :gender, :birthdate, :birthplace, :bloodtype, :spousename, :civilstatus, :educationalattainment, :employmentstatus, :familymember, :facilitycode, :suffix, :contactnumber, :mothersname, :residentialAddress, :dswdnhts, :facility_no, :fourpsmember, :phmember, :statustype, :phealthno, :membercategory, :psbmember, :users_id)",$param);
                        
                        if($result == 1){
                            $stmt = $conn->prepare("SELECT * FROM patient_enrollement WHERE users_id = :users_id");
                            $stmt->execute(['users_id' => $users_id]);
                            $patient_enrollement_get_id = $stmt->fetch();
                            $id = $patient_enrollement_get_id->patient_id;
                            
                            $param2 = [
                                'firstname' => strtolower($fname), 
                                'lastname' => strtolower($lname), 
                                'middlename' => strtolower($mname), 
                                'gender' => strtolower($gender), 
                                'birthdate' => $bdate, 
                                'mothersname' => strtolower($mothersname), 
                                'address' => strtolower($residentialAddress),
                                'facilitycode' => strtolower($facilitycode),
                                'patient_id' => $id
                            ];
                            $stmt = $conn->prepare("INSERT INTO record_one (firstname,lastname,middlename,gender,birthdate,mothersname,address,facilitycode, patient_id) VALUES (:firstname,:lastname,:middlename,:gender,:birthdate,:mothersname,:address,:facilitycode, :patient_id)");
                            $re = $stmt->execute($param2);
                            if($re){
                                $count = 0;
                                $_SESSION['count_new_data'] = $count = $count + 1;
                                echo "enrolled_ok"; 
                            }
                           
                        }
                      
                    }
                }
            }
        } 
      
    }
}

// profile edit 
if(isset($_POST['profile_method_edit'])){
    $fname = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_STRING);
    $lname = filter_input(INPUT_POST, 'lname', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch();
    $id = $user->users_id;
    if($user->email == $email){
        $stmt = $conn->prepare("UPDATE users SET firstname = :firstname, lastname = :lastname, email = :email WHERE users_id = :users_id");
        $result = $stmt->execute(['firstname' => strtolower($fname), 'lastname'=> strtolower($lname), 'email'=> $email,'users_id' => $id]);
        if($result){
            if($user->usertype == "admin"){
                $_SESSION['profiling_immunization_admin_id'] = $user->users_id;
                $_SESSION['profiling_immunization_admin_token'] = $user->firstname;
             } else if($user->usertype == "staff"){
                $_SESSION['profiling_immunization_staff_id'] = $user->users_id;
                $_SESSION['profiling_immunization_staff_token'] = $user->firstname;
             } else if($user->usertype == "user"){
                $_SESSION['profiling_immunization_users_id'] = $user->users_id;
                $_SESSION['profiling_immunization_users_token'] = $user->firstname;
             }
          


            echo "changes";
        }
    }
   
}

// profile change password
if(isset($_POST['change_pass_btn_form'])){
   
    $newpass = filter_input(INPUT_POST, 'new_pass', FILTER_SANITIZE_STRING);
    $oldpass = filter_input(INPUT_POST, 'old_pass', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch();
    $id = $user->users_id;

    if($user->password == md5($oldpass)){
        $stmt = $conn->prepare("UPDATE users SET password = :password WHERE users_id = :users_id");
        $result = $stmt->execute(['password' => md5($newpass),'users_id' => $id]);
        if($result){
            echo "pass_updated";
        }
    }else{
        echo "pass_not";
    }
}

// delete profile
if(isset($_POST['user_delete_profile'])){
    $users_id = filter_input(INPUT_POST, 'users_id', FILTER_SANITIZE_STRING);
    $sql = "DELETE FROM users WHERE users_id = :users_id";
    $stmt = $conn->prepare($sql);
    $re = $stmt->execute(['users_id'=> $users_id]);
    if($re){
        unset($_SESSION['profiling_immunization_staff_id']);
        unset($_SESSION['profiling_immunization_staff_token']);    
       echo "deleted";
    }
}
// delete admin
if(isset($_POST['admin_delete_profile'])){
    $users_id = filter_input(INPUT_POST, 'users_id', FILTER_SANITIZE_STRING);
    $sql = "DELETE FROM users WHERE users_id = :users_id";
    $stmt = $conn->prepare($sql);
    $re = $stmt->execute(['users_id'=> $users_id]);
    if($re){
       echo "deleted";
       unset($_SESSION['profiling_immunization_users_id']);
       unset($_SESSION['profiling_immunization_users_token']);
   
       unset($_SESSION['profiling_immunization_staff_id']);
       unset($_SESSION['profiling_immunization_staff_token']);
   
       unset($_SESSION['profiling_immunization_admin_id']);
       unset($_SESSION['profiling_immunization_admin_token']);
      
    }
}
// change user password thru admin authorization
if(isset($_POST['user_change_pass_by_admin'])){
    $admin_id = $_SESSION['profiling_immunization_admin_id'];
    $users_id = filter_input(INPUT_POST, 'users_id', FILTER_SANITIZE_STRING);
    $admin_pass = filter_input(INPUT_POST, 'admin_pass', FILTER_SANITIZE_STRING);
    $user_pass = filter_input(INPUT_POST, 'user_pass', FILTER_SANITIZE_STRING);

    $stmt = $conn->prepare("SELECT * FROM users WHERE users_id = :users_id");
    $stmt->execute(['users_id' => $admin_id]);
    $admin = $stmt->fetch();
    //$id = $user->users_id;
    if($admin->password == md5($admin_pass)){
        $stmt = $conn->prepare("UPDATE users SET password = :password WHERE users_id = :users_id");
        $result = $stmt->execute(['password' => md5($user_pass),'users_id' => $users_id]);
        if($result){
            echo "pass_updated";
        }
    }else {
        echo "no";
    }
   
}
// truncate schedule post / delete all
if(isset($_POST['schedtruncate'])){
    $sql = "TRUNCATE TABLE schedule";
    $stmt = $conn->prepare($sql);
    $re = $stmt->execute();
    if($re){
       echo "deleted";
    }
}

// truncate schedule sms / delete all
if(isset($_POST['schedsmstruncate'])){
    $sql = "TRUNCATE TABLE sms_logs";
    $stmt = $conn->prepare($sql);
    $re = $stmt->execute();
    if($re){
       echo "deleted";
    }
}

// delete individual
if(isset($_POST['delete_individual'])){

    $id = filter_input(INPUT_POST, 'individual_treatment_id', FILTER_SANITIZE_STRING);
    
    $sql = "DELETE FROM individual_treatment WHERE individual_treatment_id = :individual_treatment_id";
    $stmt = $conn->prepare($sql);
    $re = $stmt->execute(['individual_treatment_id'=> $id]);
    if($re){
       echo "deleted";
    }
}

// update individual
if(isset($_POST['individual_update'])){
    $individual_treatment_id = filter_input(INPUT_POST, 'pass_id', FILTER_SANITIZE_STRING);
    $lname = filter_input(INPUT_POST, 'lname', FILTER_SANITIZE_STRING);
    $fname = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_STRING);
    $mname = filter_input(INPUT_POST, 'mname', FILTER_SANITIZE_STRING);
    $suffix = filter_input(INPUT_POST, 'suffix', FILTER_SANITIZE_STRING);
    $age = filter_input(INPUT_POST, 'age', FILTER_SANITIZE_STRING);
    $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
    $modeoftransaction = filter_input(INPUT_POST, 'modeoftransaction', FILTER_SANITIZE_STRING);
    $dateofconsultation = filter_input(INPUT_POST, 'dateofconsultation', FILTER_SANITIZE_STRING);
    $consultationtime = filter_input(INPUT_POST, 'consultationtime', FILTER_SANITIZE_STRING);
    $bloodpressure = filter_input(INPUT_POST, 'bloodpressure', FILTER_SANITIZE_STRING);
    $temperature = filter_input(INPUT_POST, 'temperature', FILTER_SANITIZE_STRING);
    $height = filter_input(INPUT_POST, 'height', FILTER_SANITIZE_STRING);
    $weight = filter_input(INPUT_POST, 'weight', FILTER_SANITIZE_STRING);

    $nameattendingprovider = filter_input(INPUT_POST, 'nameattendingprovider', FILTER_SANITIZE_STRING);
    $natureofvisit = filter_input(INPUT_POST, 'natureofvisit', FILTER_SANITIZE_STRING);
    $typeofconsultationpurposeofvisit = filter_input(INPUT_POST, 'typeofconsultationpurposeofvisit', FILTER_SANITIZE_STRING);
    $refferedfrom = filter_input(INPUT_POST, 'refferedfrom', FILTER_SANITIZE_STRING);
    $refferedto = filter_input(INPUT_POST, 'refferedto', FILTER_SANITIZE_STRING);
    $reasonforreferral = filter_input(INPUT_POST, 'reasonforreferral', FILTER_SANITIZE_STRING);
    $refferedby = filter_input(INPUT_POST, 'refferedby', FILTER_SANITIZE_STRING);
    $cheifcomplaints = filter_input(INPUT_POST, 'cheifcomplaints', FILTER_SANITIZE_STRING);
    $diagnosis = filter_input(INPUT_POST, 'diagnosis', FILTER_SANITIZE_STRING);
    $medicaltreatment = filter_input(INPUT_POST, 'medicaltreatment', FILTER_SANITIZE_STRING);
    $nameofhealthprovider = filter_input(INPUT_POST, 'nameofhealthprovider', FILTER_SANITIZE_STRING);
    $labfindingsimpression = filter_input(INPUT_POST, 'labfindingsimpression', FILTER_SANITIZE_STRING);
    $performedlabtest = filter_input(INPUT_POST, 'performedlabtest', FILTER_SANITIZE_STRING);
    

    $sql = "UPDATE individual_treatment SET age = :age, modeoftransaction = :modeoftransaction, dateofconsultation = :dateofconsultation, 
    consultationtime = :consultationtime, bloodpressure = :bloodpressure, temperature = :temperature, height = :height, weight = :weight,
    nameattendingprovider = :nameattendingprovider,natureofvisit = :natureofvisit, typeofconsultationpurposeofvisit = :typeofconsultationpurposeofvisit,
    refferedfrom = :refferedfrom, refferedto = :refferedto, reasonforreferral = :reasonforreferral,
    refferedby = :refferedby, cheifcomplaints = :cheifcomplaints, diagnosis = :diagnosis, medicaltreatment = :medicaltreatment,
    nameofhealthprovider = :nameofhealthprovider,labfindingsimpression = :labfindingsimpression, performedlabtest = :performedlabtest WHERE individual_treatment_id = :individual_treatment_id";

    $param6 = [
    'age' => $age,
    'modeoftransaction' => $modeoftransaction,
    'dateofconsultation' => $dateofconsultation,
    'consultationtime' => $consultationtime,
    'bloodpressure' => $bloodpressure,
    'temperature' => $temperature,
    'height' => $height,
    'weight' => $weight,

    'nameattendingprovider' => $nameattendingprovider,
    'natureofvisit' => $natureofvisit,
    'typeofconsultationpurposeofvisit' => $typeofconsultationpurposeofvisit,
    'refferedfrom' => $refferedfrom,
    'refferedto' => $refferedto,
    'reasonforreferral' => $reasonforreferral,
    'refferedby' => $refferedby,
    'cheifcomplaints' => $cheifcomplaints,
    'diagnosis' => $diagnosis,
    'medicaltreatment' => $medicaltreatment,
    'nameofhealthprovider' => $nameofhealthprovider,
    'labfindingsimpression' => $labfindingsimpression,
    'performedlabtest' => $performedlabtest,

    'individual_treatment_id' => $individual_treatment_id
    ];

    $stmt = $conn->prepare($sql);
    $res = $stmt->execute($param6);
    if($res){
        echo "save";
    }
}
?>