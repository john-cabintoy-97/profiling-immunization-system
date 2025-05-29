<?php
    
    $users_id = $controller->urlDecode($_GET['view']);
    $view_sql4 = "SELECT * FROM patient_enrollement WHERE users_id = :users_id";
    $patient_enrolled = $controller->getPatientByUserId($view_sql4, $users_id);
  
?>

<form method="POST" class="enrolled_view_form">
    <div class="card o-hidden border-0  wow fadeIn slow shadow my-4">

        <div class="card-body p-0">
            <div class="card-header bg-custom py-3">
                <h6 class="m-0 font-weight-bold text-white">Patient
                    Enrollment
                    Record View</h6>
            </div>
            <div class="form_patient_enroll">
                <!-- Nested Row within Card Body -->
                <div class="row">

                    <div class="col-lg-12">

                        <div class="p-5 form1">
                            <div class="row">

                                <div class="col-lg-6 border-custom">
                                    <div class="user p-2">
                                        <div class="form-group row">
                                        <div class="col-sm-12 mb-0 pb-3 ch-extra"><small>Child Name</small></div>
                                            <div class="col-sm-4 mb-3 mb-sm-0">
                                                <div class="md-form mb-0">

                                                    <input type="text" name="lname" class="form-control mb-3"
                                                        autocomplete="off"
                                                        value="<?php if(isset($patient_enrolled->lastname)){ echo $patient_enrolled->lastname;} else { echo "";} ?>"
                                                        disabled required>
                                                    <label>Last Name</label>
                                                </div>

                                            </div>
                                            <div class="col-sm-4">
                                                <div class="md-form mb-0">
                                                    <input type="text" name="fname" class="form-control mb-3"
                                                        autocomplete="off"
                                                        value="<?php if(isset($patient_enrolled->firstname)){ echo $patient_enrolled->firstname;} else { echo "";} ?>"
                                                        disabled required>
                                                    <label>First Name</label>
                                                </div>

                                            </div>
                                            <div class="col-sm-4">
                                                <div class="md-form mb-0">
                                                    <input type="text" name="mname" class="form-control mb-3"
                                                        autocomplete="off"
                                                        value="<?php if(isset($patient_enrolled->middlename)){ echo $patient_enrolled->middlename;} else { echo "";} ?>"
                                                        disabled required>
                                                    <label>Middle Name</label>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="form-group row">
                                            
                                            <div class="col-sm-6">
                                                <small>Sex (Kasarian)</small>
                                                <select name="gender"
                                                    class="form-control form-control-custom-0 form-select-lg mb-3"
                                                    disabled required>
                                                    <option value="">--select gender--</option>
                                                    <option value="male" 
                                                        <?php if(isset($patient_enrolled->gender)){if($patient_enrolled->gender == "male"){ echo "selected"; }} ?>>
                                                        Male</option>
                                                    <option value="female"
                                                        <?php if(isset($patient_enrolled->gender)){if($patient_enrolled->gender == "female"){ echo "selected"; }} ?>>
                                                        Female</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <div class="md-form mb-0">
                                                    <input type="date" name="bdate" class="form-control mb-3"
                                                        autocomplete="off"
                                                        value="<?php if(isset($patient_enrolled->birthdate)){ echo $patient_enrolled->birthdate;} else { echo "";} ?>"
                                                        disabled required>
                                                    <label> Birth date</label>
                                                </div>


                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="md-form mb-0">
                                                <input type="text" name="birthplace" class="form-control mb-3"
                                                    autocomplete="off"
                                                    value="<?php if(isset($patient_enrolled->birthplace)){ echo $patient_enrolled->birthplace;} else { echo "";} ?>"
                                                    disabled required>
                                                <label>Birthplace</label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <div class="md-form mb-0">
                                                    <input type="text" name="bloodtype" class="form-control mb-3"
                                                        autocomplete="off"
                                                        value="<?php if(isset($patient_enrolled->bloodtype)){ echo $patient_enrolled->bloodtype;} else { echo "";} ?>"
                                                        disabled required>
                                                    <label>Blood Type</label>
                                                </div>

                                            </div>
                                            <div class="col-sm-6">
                                                <div class="md-form mb-0">
                                                    <input type="text" name="spousename" class="form-control mb-3"
                                                        autocomplete="off"
                                                        value="<?php if(isset($patient_enrolled->spousename)){ echo $patient_enrolled->spousename;} else { echo "";} ?>"
                                                        disabled required>
                                                    <label>Spouse's Name</label>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <small>Civil Status</small>
                                                <select name="civilstatus"
                                                    class="form-control form-control-custom-0 form-select-lg" disabled required>
                                                    <option value="">--select civil status--
                                                    </option>
                                                    <option value="single"
                                                        <?php if(isset($patient_enrolled->civilstatus)){if($patient_enrolled->civilstatus == "single"){ echo "selected"; }} ?>>
                                                        Single (Walang Asawa)
                                                    </option>
                                                    <option value="married"
                                                        <?php if(isset($patient_enrolled->civilstatus)){if($patient_enrolled->civilstatus == "married"){ echo "selected"; }} ?>>
                                                        Married (May Asawa)
                                                    </option>
                                                    <option value="widow"
                                                        <?php if(isset($patient_enrolled->civilstatus)){if($patient_enrolled->civilstatus == "widow"){ echo "selected"; }} ?>>
                                                        Widow/er (Balo)</option>
                                                    <option value="annuled"
                                                        <?php if(isset($patient_enrolled->civilstatus)){if($patient_enrolled->civilstatus == "annuled"){ echo "selected"; }} ?>>
                                                        Annulled (Anulado)
                                                    </option>
                                                    <option value="separated"
                                                        <?php if(isset($patient_enrolled->civilstatus)){if($patient_enrolled->civilstatus == "separated"){ echo "selected"; }} ?>>
                                                        Single (Separated)
                                                    </option>
                                                    <option value="co-habition"
                                                        <?php if(isset($patient_enrolled->educationalattainment)){if($patient_enrolled->educationalattainment == "no formal education"){ echo "selected"; }} ?>>
                                                        Co-Habition
                                                        (Paninirahang)</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-6">

                                                <small>Educational Attainment</small>
                                                <select name="educationalattainment"
                                                    class="form-control form-control-custom-0 form-select-lg" disabled required>
                                                    <option value="">--select educational
                                                        attainment--</option>
                                                    <option value="no formal education"
                                                        <?php if(isset($patient_enrolled->educationalattainment)){if($patient_enrolled->educationalattainment == "no formal education"){ echo "selected"; }} ?>>
                                                        NO
                                                        Formal Education (Walang Pormal na Edukasyon) </option>
                                                    <option value="elementary"
                                                        <?php if(isset($patient_enrolled->educationalattainment)){if($patient_enrolled->educationalattainment == "elementary"){ echo "selected"; }} ?>>
                                                        Elementary (Elemnetarya)
                                                    </option>
                                                    <option value="high school"
                                                        <?php if(isset($patient_enrolled->educationalattainment)){if($patient_enrolled->educationalattainment == "high school"){ echo "selected"; }} ?>>
                                                        High School (Hayskul)
                                                    </option>
                                                    <option value="college"
                                                        <?php if(isset($patient_enrolled->educationalattainment)){if($patient_enrolled->educationalattainment == "college"){ echo "selected"; }} ?>>
                                                        College (Kolehiyo) </option>
                                                    <option value="vocational"
                                                        <?php if(isset($patient_enrolled->educationalattainment)){if($patient_enrolled->educationalattainment == "vocational"){ echo "selected"; }} ?>>
                                                        Vocational (Bukasyonal)
                                                    </option>
                                                    <option value="post graduate"
                                                        <?php if(isset($patient_enrolled->educationalattainment)){if($patient_enrolled->educationalattainment == "post graduate"){ echo "selected"; }} ?>>
                                                        Post Graduate
                                                    </option>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <small>Employment Status</small>
                                                <select name="employmentstatus"
                                                    class="form-control form-control-custom-0 form-select-lg" disabled required>
                                                    <option value="">--select employment
                                                        Status--</option>
                                                    <option value="student"
                                                        <?php if(isset($patient_enrolled->employmentstatus)){if($patient_enrolled->employmentstatus == "student"){ echo "selected"; }} ?>>
                                                        Student (Estudyante) </option>
                                                    <option value="employed"
                                                        <?php if(isset($patient_enrolled->employmentstatus)){if($patient_enrolled->employmentstatus == "employed"){ echo "selected"; }} ?>>
                                                        Employed (May Trabaho)
                                                    </option>
                                                    <option value="retired"
                                                        <?php if(isset($patient_enrolled->employmentstatus)){if($patient_enrolled->employmentstatus == "retired"){ echo "selected"; }} ?>>
                                                        Retired (Retirado) </option>
                                                    <option value="none/unemployed"
                                                        <?php if(isset($patient_enrolled->employmentstatus)){if($patient_enrolled->employmentstatus == "none/unemployed"){ echo "selected"; }} ?>>
                                                        None/Unemployed
                                                        (Kolehiyo) </option>
                                                </select>
                                            </div>
                                            <div class="col-sm-6">
                                                <small>Family Member</small>
                                                <select name="familymember"
                                                    class="form-control form-control-custom-0 form-select-lg" disabled required>
                                                    <option value="">--select Family
                                                        member--</option>
                                                    <option value="father"
                                                        <?php if(isset($patient_enrolled->familymember)){if($patient_enrolled->familymember == "father"){ echo "selected"; }} ?>>
                                                        Father (Ama) </option>
                                                    <option value="mother"
                                                        <?php if(isset($patient_enrolled->familymember)){if($patient_enrolled->familymember == "mother"){ echo "selected"; }} ?>>
                                                        Mother (Ina) </option>
                                                    <option value="son"
                                                        <?php if(isset($patient_enrolled->familymember)){if($patient_enrolled->familymember == "son"){ echo "selected"; }} ?>>
                                                        Son (Anak Na Lalaki) </option>
                                                    <option value="daughter"
                                                        <?php if(isset($patient_enrolled->familymember)){if($patient_enrolled->familymember == "daughter"){ echo "selected"; }} ?>>
                                                        Daughter (Anak Na Babae) </option>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <div class="md-form mb-0">
                                                <input type="text" name="facilitycode" class="form-control mb-3" 
                                                    autocomplete="off"
                                                    value="<?php if(isset($patient_enrolled->facilitycode)){ echo $patient_enrolled->facilitycode;} else { echo "";} ?>"
                                                    disabled>
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
                                                    <input type="text" name="suffixname" class="form-control mb-3"
                                                        autocomplete="off"
                                                        value="<?php if(isset($patient_enrolled->suffix)){ echo $patient_enrolled->suffix;} else { echo "";} ?>"
                                                        disabled >
                                                    <label>Suffix</label>
                                                </div>

                                            </div>
                                            <div class="col-sm-8">
                                                <div class="md-form mb-0">
                                                    <input type="tel" name="contactnumber" class="form-control mb-3"
                                                        autocomplete="off" pattern="[0-9]{11}" 
                                                        value="<?php if(isset($patient_enrolled->contactnumber)){ echo $patient_enrolled->contactnumber;} else { echo "";} ?>"
                                                        disabled required>
                                                    <label>Contact Number ex. 095181*****</label>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <small>Pangalan
                                                sa pagkadalaga (para sa mga babaeng
                                                may-asawa)</small>
                                            <div class="md-form mb-0">

                                                <input type="text" name="mothersname" class="form-control mb-3"
                                                    autocomplete="off"
                                                    value="<?php if(isset($patient_enrolled->mothersname)){ echo $patient_enrolled->mothersname;} else { echo "";} ?>"
                                                    disabled required>
                                                <label>Mother's Name</label>
                                            </div>



                                        </div>
                                        <div class="form-group ">
                                            <div class="md-form mb-0">
                                                <input type="text" name="residentialAddress" class="form-control mb-3"
                                                    autocomplete="off"
                                                    value="<?php if(isset($patient_enrolled->residentialAddress)){ echo $patient_enrolled->residentialAddress;} else { echo "";} ?>"
                                                    disabled required>
                                                <label>Residential Address</label>
                                            </div>

                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-4 mb-3 mb-sm-0">
                                                <small>DSWD NHTS?</small>
                                                <div class="d-flex justify-content-start">
                                                    <div class="form-check pr-3">
                                                        <div class="my-2">
                                                            <input class="form-check-input" type="radio" name="dswdnhts"
                                                                value="yes" id="dswdnths1"
                                                                <?php if(isset($patient_enrolled->dswdnhts)){if($patient_enrolled->dswdnhts == "yes"){ echo "checked"; }} ?>
                                                                disabled required>
                                                            <label class="form-check-label" for="flexRadioDefault1">
                                                                Yes
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-check ">
                                                        <div class="my-2">
                                                            <input class="form-check-input"
                                                                <?php if(isset($patient_enrolled->dswdnhts)){if($patient_enrolled->dswdnhts == "no"){ echo "checked"; }} ?>
                                                                type="radio" name="dswdnhts" value="no" id="dswdnths2"
                                                                disabled required>
                                                            <label class="form-check-label" for="flexRadioDefault1">
                                                                No
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-sm-4">
                                                <div class="md-form mb-0">
                                                    <input type="text" name="facility_no" class="form-control mb-3"
                                                        autocomplete="off"
                                                        value="<?php if(isset($patient_enrolled->facility_no)){ echo $patient_enrolled->facility_no;} else { echo "";} ?>"
                                                        disabled >
                                                    <label>Facility Household #</label>
                                                </div>

                                            </div>
                                            <div class="col-sm-4">
                                                <small>4Ps Member?</small>
                                                <div class="d-flex justify-content-start">
                                                    <div class="form-check pr-3">
                                                        <div class="my-2">
                                                            <input class="form-check-input" type="radio"
                                                                name="fourpsmember" id="fourpsmember1" value="yes"
                                                                <?php if(isset($patient_enrolled->fourpsmember)){if($patient_enrolled->fourpsmember == "yes"){ echo "checked"; }} ?>
                                                                disabled required>
                                                            <label class="form-check-label" for="flexRadioDefault1">
                                                                Yes
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-check ">
                                                        <div class="my-2">
                                                            <input class="form-check-input" type="radio"
                                                                name="fourpsmember" id="fourpsmember2" value="no"
                                                                <?php if(isset($patient_enrolled->fourpsmember)){if($patient_enrolled->fourpsmember == "no"){ echo "checked"; }} ?>
                                                                disabled>
                                                            <label class="form-check-label" for="flexRadioDefault1">
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
                                                            <input class="form-check-input" type="radio" name="phmember"
                                                                id="phmember1" value="yes"
                                                                <?php if(isset($patient_enrolled->phmember)){if($patient_enrolled->phmember == "yes"){ echo "checked"; }} ?>
                                                                disabled required>
                                                            <label class="form-check-label" for="flexRadioDefault1">
                                                                Yes
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-check ">
                                                        <div class="my-2">
                                                            <input class="form-check-input"
                                                                <?php if(isset($patient_enrolled->phmember)){if($patient_enrolled->phmember == "no"){ echo "checked"; }} ?>
                                                                type="radio" name="phmember" id="phmember2" value="no"
                                                                disabled>
                                                            <label class="form-check-label" for="flexRadioDefault1">
                                                                No
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <small>Status Type</small>

                                                <select name="statustype" id="statustype"
                                                    class="form-control form-control-custom-0" disabled >
                                                    <option value="">--select status type--</option>
                                                    <option value="member"
                                                        <?php if(isset($patient_enrolled->statustype)){if($patient_enrolled->statustype == "member"){ echo "selected"; }} ?>>
                                                        member</option>
                                                    <option value="dependent"
                                                        <?php if(isset($patient_enrolled->statustype)){if($patient_enrolled->statustype == "dependent"){ echo "selected"; }} ?>>
                                                        dependent</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="md-form mb-0">

                                                    <input type="text" name="phealthno" class="form-control mb-3"
                                                        autocomplete="off"
                                                        value="<?php if(isset($patient_enrolled->phealthno)){ echo $patient_enrolled->phealthno;} else { echo "";} ?>"
                                                        disabled>
                                                    <label>PhilHealth No.</label>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <small>member, please
                                                    indicate
                                                    category</small>
                                                <select name="membercategory" class="form-control form-control-custom-0"
                                                    disabled>
                                                    <option value="">--select indicate catergory--</option>
                                                    <option value="fe-private"
                                                        <?php if(isset($patient_enrolled->membercategory)){if($patient_enrolled->membercategory == "fe-private"){ echo "selected"; }} ?>>
                                                        FE-Private</option>
                                                    <option value="fe-government"
                                                        <?php if(isset($patient_enrolled->membercategory)){if($patient_enrolled->membercategory == "fe-government"){ echo "selected"; }} ?>>
                                                        FE-Government</option>
                                                    <option value="ie-private"
                                                        <?php if(isset($patient_enrolled->membercategory)){if($patient_enrolled->membercategory == "ie-private"){ echo "selected"; }} ?>>
                                                        IE-Private</option>
                                                    <option value="others" id="other"
                                                        <?php if(isset($patient_enrolled->membercategory)){if($patient_enrolled->membercategory == "others"){ echo "selected"; }} ?>>
                                                        OTHERS: </option>
                                                </select>
                                                <div class="other-form mt-2">
                                                    <input type="hidden" class="form-control form-control-custom"
                                                        disabled>
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
                                                                name="psbmember" id="psbmember1" value="yes"
                                                                <?php if(isset($patient_enrolled->psbmember)){if($patient_enrolled->psbmember == "yes"){ echo "checked"; }} ?>
                                                                disabled required>
                                                            <label class="form-check-label" for="flexRadioDefault1">
                                                                Yes
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-check ">
                                                        <div class="my-2">
                                                            <input class="form-check-input" type="radio"
                                                                name="psbmember" id="psbmember2" value="no"
                                                                <?php if(isset($patient_enrolled->psbmember)){if($patient_enrolled->psbmember == "no"){ echo "checked"; }} ?>
                                                                disabled>
                                                            <label class="form-check-label" for="flexRadioDefault1">
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
                        </div><br>
                        <input type="hidden" value="<?= $patient_enrolled->timestamp; ?>" name="timestamp">
                        <input type="hidden" value="<?= $patient_enrolled->users_id; ?>" name="users_id">
                        <input type="hidden" name="patient_enrolled_edit">
                        <!-- <button class="btn btn-custom mb-4 enrolled-btn" name="btn-enrolled"
                            type="submit">Submit</button><br> -->

                    </div>
                </div>

            </div>
        </div>
    </div>
    <button type="button" class="btn btn-custom btn-submit-bottom mb-3" name="edit" id="view_enrolled_btn_edit"><i
            class="fas fa-pen"></i> &nbsp; Edit</button>
    <button type="submit" class="btn btn-custom-2 btn-submit-bottom mb-3" id="" style="display:none;" name="save"><i
            class="fas fa-paper-plane"></i> &nbsp; Save Changes</button>
</form>