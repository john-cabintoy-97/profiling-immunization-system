<?php
include_once "./config/Database.php";

class Controller
{
    private $con;
    public function __construct()
    {
        $db = new Database();
        $this->con = $db->connection();
    }

    public function statusUsersCount()
    {
        $stmt = $this->con->prepare("SELECT * FROM record_one");
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function statusPatientCount()
    {
        $stmt = $this->con->prepare("SELECT * FROM patient_enrollement");
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function statusIndividualCount()
    {
        $stmt = $this->con->prepare("SELECT * FROM individual_treatment");
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function getAllpatient()
    {
        $stmt = $this->con->prepare("SELECT * FROM patient_enrollement ORDER BY patient_id DESC");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getAllschedule()
    {
        $stmt = $this->con->prepare("SELECT * FROM schedule ORDER BY schedule_id DESC");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getAllsmsLogs()
    {
        $stmt = $this->con->prepare("SELECT * FROM sms_logs ORDER BY sms_log_id DESC");
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getAllpatientAlert()
    {
        $stmt = $this->con->prepare("SELECT * FROM patient_enrollement ORDER BY patient_id DESC LIMIT 4");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function countUser()
    {
        $stmt = $this->con->prepare("SELECT * FROM patient_enrollement LIMIT 1");
        $stmt->execute();
        return $stmt->rowCount();
    }
    public function getAllIndividual()
    {
        $stmt = $this->con->prepare("SELECT * FROM individual_treatment ORDER BY fname && lname ASC");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getAllstaff()
    {
        $stmt = $this->con->prepare("SELECT * FROM users WHERE usertype = 'staff' AND status = 'granted'");
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getAllregisterdpatients()
    {
        $stmt = $this->con->prepare("SELECT * FROM users WHERE usertype = 'user' AND status = 'granted'");
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getAllstaffPending()
    {
        $stmt = $this->con->prepare("SELECT * FROM users WHERE status = 'pending'");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getAlluserpending()
    {
        $stmt = $this->con->prepare("SELECT * FROM users WHERE status = 'pending'");
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function getUserById($sql, $id)
    {
        $stmt = $this->con->prepare($sql);
        $stmt->execute(['users_id' => $id]);
        return $stmt->fetch();
    }

    public function UserById($sql, $id)
    {
        $stmt = $this->con->prepare($sql);
        $stmt->execute(['users_id' => $id]);
        return $stmt->fetch();
    }

    public function getIndividualById($sql, $id)
    {
        $stmt = $this->con->prepare($sql);
        $stmt->execute(['individual_treatment_id' => $id]);
        return $stmt->fetch();
    }

    public function getPatientById($sql, $id)
    {
        $stmt = $this->con->prepare($sql);
        $stmt->execute(['patient_id' => $id]);
        return $stmt->fetch();
    }

    public function getPatientByUserId($sql, $id)
    {
        $stmt = $this->con->prepare($sql);
        $stmt->execute(['users_id' => $id]);
        return $stmt->fetch();
    }

    public function getAlluserpost($id)
    {
        $stmt = $this->con->prepare("SELECT pt.patient_id ,pt.schedule, pt.schedule_status,sc.timestamp, sc.schedule_time, sc.sender_name, sc.childname FROM schedule AS sc INNER JOIN patient_enrollement AS pt ON pt.users_id = sc.users_id WHERE sc.users_id = :users_id ORDER BY schedule_id DESC LIMIT 1");
        $stmt->execute(['users_id' => $id]);
        return $stmt->fetchAll();
    }

    public function urlEncode($url)
    {
        return urlencode(base64_encode($url));
    }

    public function urlDecode($url)
    {
        return base64_decode(urldecode($url));
    }

    public function preventUser()
    {
        // prevent users to register if already done.
        $user_id = $_SESSION['profiling_immunization_users_id'];
        $prevent_users = $this->getUserById("SELECT * FROM patient_enrollement WHERE users_id = :users_id", $user_id);

        if (isset($prevent_users->users_id)) {
            if ($prevent_users->users_id == $user_id) {
                header('Location: home.php');
            } else {
                header('Location: enroll-patients.php');
            }
        }
    }

    public function preventUserNotEnrolledAccessHome()
    {
        $user_id = $_SESSION['profiling_immunization_users_id'];
        $prevent_users = $this->getUserById("SELECT * FROM patient_enrollement WHERE users_id = :users_id", $user_id);

        if (!isset($prevent_users->users_id)) {
            header('Location: enroll-patients.php');
        }
    }

    public function isAdmin()
    {
        $stmt = $this->con->prepare("SELECT * FROM users WHERE usertype = 'admin'");
        $stmt->execute();
        $count = $stmt->rowCount();
        return $count;

    }

   
   
    public function isPatientGraduated($id)
    {
        
        $counter = 0;
        $stmt = $this->con->prepare("SELECT * FROM record_one WHERE patient_id = :patient_id");
        $stmt->execute(['patient_id' => $id]);
        $rc1 = $stmt->fetch();

        if (empty($rc1->firstname) || empty($rc1->lastname) || empty($rc1->middlename) || empty($rc1->gender) || empty($rc1->birthdate) || empty($rc1->mothersname) || empty($rc1->address) || empty($rc1->facilitycode) || empty($rc1->se_status) || (empty($rc1->first_time) && empty($rc1->delivery))) {
            $counter = $counter + 1;
        }

        $stmt = $this->con->prepare("SELECT * FROM record_two WHERE patient_id = :patient_id");
        $stmt->execute(['patient_id' => $id]);
        $rc2 = $stmt->fetch();
        if (empty($rc2->length_birth) || empty($rc2->weight_birth) || empty($rc2->weight_birth_status) || (empty($rc2->breast_feeding) || $rc2->breast_feeding == "0000-00-00") || (empty($rc2->bcg) || $rc2->bcg == "0000-00-00") || (empty($rc2->bbd) || $rc2->bbd == "0000-00-00") || (empty($rc2->nutrition_age_months) || $rc2->nutrition_age_months == "0000-00-00") || empty($rc2->nutrition_length) || (empty($rc2->nutrition_length_date) || $rc2->nutrition_length_date == "0000-00-00") || empty($rc2->nutrition_weight) || (empty($rc2->nutrition_weight_date) || $rc2->nutrition_weight_date == "0000-00-00") || empty($rc2->nutrition_status) || (empty($rc2->low_birth_first_month) || $rc2->low_birth_first_month == "0000-00-00") || (empty($rc2->low_birth_second_month) || $rc2->low_birth_second_month == "0000-00-00") || (empty($rc2->low_birth_third_month) || $rc2->low_birth_third_month == "0000-00-00") || (empty($rc2->immunization_first_dose) || $rc2->immunization_first_dose == "0000-00-00") || (empty($rc2->immunization_second_dose) || $rc2->immunization_second_dose == "0000-00-00") || (empty($rc2->immunization_third_dose) || $rc2->immunization_third_dose == "0000-00-00")) {
            $counter = $counter + 1;
        }

        $stmt = $this->con->prepare("SELECT * FROM record_three WHERE patient_id = :patient_id");
        $stmt->execute(['patient_id' => $id]);
        $rc3 = $stmt->fetch();
        if ((empty($rc3->opv_first_dose) || $rc3->opv_first_dose == "0000-00-00") || (empty($rc3->opv_second_dose) || $rc3->opv_second_dose == "0000-00-00") || (empty($rc3->opv_third_dose) || $rc3->opv_third_dose == "0000-00-00") || (empty($rc3->pcv_first_dose) || $rc3->pcv_first_dose == "0000-00-00") || (empty($rc3->pcv_second_dose) || $rc3->pcv_second_dose == "0000-00-00") || (empty($rc3->pcv_third_dose) || $rc3->pcv_third_dose == "0000-00-00") || (empty($rc3->ipv_third_dose) || $rc3->ipv_third_dose == "0000-00-00")  || empty($rc3->exlusive_breastfed_one_month) || (empty($rc3->exlusive_breastfed_one_month_date) || $rc3->exlusive_breastfed_one_month_date == "0000-00-00") ||  empty($rc3->exlusive_breastfed_two_month) || (empty($rc3->exlusive_breastfed_two_month_date) || $rc3->exlusive_breastfed_two_month_date == "0000-00-00") || empty($rc3->exlusive_breastfed_three_month) || (empty($rc3->exlusive_breastfed_three_month_date) || $rc3->exlusive_breastfed_three_month_date == "0000-00-00") || empty($rc3->exlusive_breastfed_four_month) || (empty($rc3->exlusive_breastfed_four_month_date) || $rc3->exlusive_breastfed_four_month_date == "0000-00-00") || (empty($rc3->nutrition_age_month) || $rc3->nutrition_age_month == "0000-00-00") || (empty($rc3->nutrition_length_month) || $rc3->nutrition_length_month == "0000-00-00") || (empty($rc3->nutrition_weight_month) || $rc3->nutrition_weight_month == "0000-00-00")  || empty($rc3->nutrition_status_month)) {
            $counter = $counter + 1;
        }

        
        $stmt = $this->con->prepare("SELECT * FROM record_four WHERE patient_id = :patient_id");
        $stmt->execute(['patient_id' => $id]);
        $rc4 = $stmt->fetch();
        if (empty($rc4->feeding_six_months) || empty($rc4->feeding_six_months_duration) || (empty($rc4->vitamin_a_date) || $rc4->vitamin_a_date == "0000-00-00") || (empty($rc4->mnp_date) || $rc4->mnp_date == "0000-00-00") || (empty($rc4->mmr_date_dose_one) || $rc4->mmr_date_dose_one == "0000-00-00") || empty($rc4->nutrional_age_months) ||  empty($rc4->nutrional_length) || empty($rc4->nutrional_weight) || empty($rc4->nutritional_status) || (empty($rc4->mmr_date_dose_twi) || $rc4->mmr_date_dose_twi == "0000-00-00") || (empty($rc4->fic_date) || $rc4->fic_date == "0000-00-00") || empty($rc4->remarks)) {
            $counter = $counter + 1;
        }
        return $counter;
    }

    public function format_interval(DateInterval $interval)
    {
        $result = "";

        if ($interval->d) {$result .= $interval->format("%d day's ");}

        return $result;
    }

    public function timeago($date, $display = array('Year', 'Month', 'Day', 'Hour', 'Minute', 'Second'), $ago = '')
    {
        date_default_timezone_set('Asia/Manila');
        $timestamp = strtotime($date);
        $timestamp = (int) $timestamp;
        $current_time = time();
        $diff = $current_time - $timestamp;

        //intervals in seconds
        $intervals = array(
            'year' => 31556926, 'month' => 2629744, 'week' => 604800, 'day' => 86400, 'hour' => 3600, 'minute' => 60,
        );

        //now we just find the difference
        if ($diff == 0) {
            return ' Just now ';
        }

        if ($diff < 60) {
            return $diff == 1 ? $diff . ' second ago ' : $diff . ' seconds ago ';
        }

        if ($diff >= 60 && $diff < $intervals['hour']) {
            $diff = floor($diff / $intervals['minute']);
            return $diff == 1 ? $diff . ' minute ago ' : $diff . ' minutes ago ';
        }

        if ($diff >= $intervals['hour'] && $diff < $intervals['day']) {
            $diff = floor($diff / $intervals['hour']);
            return $diff == 1 ? $diff . ' hour ago ' : $diff . ' hours ago ';
        }

        if ($diff >= $intervals['day'] && $diff < $intervals['week']) {
            $diff = floor($diff / $intervals['day']);
            return $diff == 1 ? $diff . ' day ago ' : $diff . ' days ago ';
        }

        if ($diff >= $intervals['week'] && $diff < $intervals['month']) {
            $diff = floor($diff / $intervals['week']);
            return $diff == 1 ? $diff . ' week ago ' : $diff . ' weeks ago ';
        }

        if ($diff >= $intervals['month'] && $diff < $intervals['year']) {
            $diff = floor($diff / $intervals['month']);
            return $diff == 1 ? $diff . ' month ago ' : $diff . ' months ago ';
        }

        if ($diff >= $intervals['year']) {
            $diff = floor($diff / $intervals['year']);
            return $diff == 1 ? $diff . ' year ago ' : $diff . ' years ago ';
        }
    }
    public function countVaccinatedGraduet(){
        $vac_count = 0;
        $stmt = $this->con->prepare("SELECT * FROM record_four");
        $stmt->execute();
        $result_arr = $stmt->fetchAll();
      
        foreach($result_arr as $result){
            if(!empty($result->status) && ($result->status == "success")){
                $vac_count = $vac_count + 1;
            }
        }
        return $vac_count;
    }

    public function completeVacDate($id){
        $stmt = $this->con->prepare("SELECT * FROM record_four WHERE patient_id = :patient_id");
        $stmt->execute(['patient_id' => $id]);
        $result_arr = $stmt->fetch();
        return $result_arr->timestamp;
    }

    public function late_patient()
    {
        $patient_list = $this->getAllpatient();

        $counter = 0;
        foreach ($patient_list as $lists) {
            
            date_default_timezone_set('Asia/Manila');
            $dateNow = new DateTime();
            $origanl_schedule = new DateTime($lists->schedule);
            $schedule = new DateTime($lists->schedule);
            $schedExpiry = $schedule->add(new DateInterval('P1D'));
          
            if (($origanl_schedule->format('Y-m-d') < $dateNow->format('Y-m-d')) && $lists->schedule_status == "pending") {
                $counter = $counter + 1;
            }
        }
        return $counter;
    }

    public function isGraduated($id)
    { 
        $stmt = $this->con->prepare("UPDATE record_four SET status = :status WHERE patient_id = :patient_id");
        $result = $stmt->execute(['status'=>'success','patient_id'=>$id]);
    }

    
    public function notGraduated($id)
    { 
        $stmt = $this->con->prepare("UPDATE record_four SET status = :status WHERE patient_id = :patient_id");
        $result = $stmt->execute(['status'=>'pending','patient_id'=>$id]);
    }

}
// $ns = new Controller();
// print_r($ns->isGraduated());
