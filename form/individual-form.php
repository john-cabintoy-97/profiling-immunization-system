<?php
    $individual_id = $controller->urlDecode($_GET['view']);
  
    $view_sql4 = "SELECT * FROM individual_treatment WHERE individual_treatment_id = :individual_treatment_id";
    $individual = $controller->getIndividualById($view_sql4, $individual_id);

    if($individual){
        $indi_id = $individual->patient_id;
        $view_ini_sql = "SELECT * FROM patient_enrollement WHERE patient_id = :patient_id";
        $ini_info = $controller->getPatientById($view_ini_sql, $indi_id);
        if($ini_info){
            $user_fetch_id = $ini_info->users_id;
            $view_user_sql = "SELECT * FROM users WHERE users_id = :users_id";
            $user_info = $controller->UserById($view_user_sql, $user_fetch_id);
        }
    }
    
?>
<div class="row">
    <div class="col-lg-12">
        <button class="btn btn-warning" type="button" data-toggle="collapse" data-target="#userinfoCollapse"
            aria-expanded="false" aria-controls="userinfoCollapse">
            Registered User information
        </button>
        <div class="collapse" id="userinfoCollapse">
        <div class="card">
            <div class="card-header bg-warning"></div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <div class="md-form mb-0">
                            <input type="text" class="form-control mb-3" autocomplete="off"
                                value="<?php if(isset($user_info->firstname)){ echo $user_info->firstname . " " . $user_info->lastname;} else { echo "";} ?>"
                                disabled>
                            <label>Registerd Name</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="md-form mb-0">
                            <input type="text" class="form-control mb-3" autocomplete="off"
                                value="<?php if(isset($user_info->lastname)){ echo $user_info->email;} else { echo "";} ?>"
                                disabled>
                            <label>Registered Email</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
<form method="POST" class="individual_view_form">
    <div class="card o-hidden border-0  wow fadeIn slow shadow my-4">

        <div class="card-body p-0">
            <div class="card-header bg-custom py-3">
                <h6 class="m-0 font-weight-bold text-white">Individual Treatment
                    Record View</h6>
            </div>
            <div class="form_patient_enroll">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-12">

                        <div class="p-5 form1">
                            <div class="row">
                                <div class="col-lg-12 ">
                                    <small><strong>#1 PATIENT INFORMATION (IMPORMASYON NG PASYENTE)</strong></small>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group row">
                                        <div class="col-sm-12 mb-3 mb-sm-0 row">
                                            <div class="col-sm-6">
                                                <div class="md-form mb-0">
                                                    <input type="text" disabled name="lname" class="form-control"
                                                        autocomplete="off" value="<?= $individual->lname; ?>" required>
                                                    <label>Last Name (Apelyido)</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="md-form mb-0">
                                                    <input type="text" disabled name="fname" class="form-control"
                                                        autocomplete="off" value="<?= $individual->fname; ?>" required>
                                                    <label>First Name (Pangalan)</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="md-form mb-0">
                                                    <input type="text" disabled name="mname" class="form-control"
                                                        autocomplete="off" value="<?= $individual->mname; ?>" required>
                                                    <label>Middle Name (Gitnang Pangalan)</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="md-form mb-0">
                                                    <input type="text" disabled name="suffix" class="form-control"
                                                        autocomplete="off" value="<?= $individual->suffix; ?>" required>
                                                    <label>Suffix</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="md-form mb-0">
                                                <input type="text" disabled name="age" class="form-control" autocomplete="off"
                                                    required value="<?= $individual->age; ?>">
                                                <label>Age (Edad)</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="md-form mb-4">
                                                <input type="text" disabled name="address" class="form-control"
                                                    autocomplete="off" value="<?= $individual->address; ?>" required>
                                                <label>Residential Address (Tirahan)</label>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="col-sm-12 mb-3">
                                            <small><strong>#2 FOR CHU /RHU PERSONNEL ONLY</strong></small>
                                        </div>
                                        <div class="col-sm-12">
                                            <small>Mode of transaction</small>
                                            <select name="modeoftransaction" disabled class="browser-default custom-select mb-3">
                                                <option value="">--select mode--</option>
                                                <option value="walk-in" <?php if($individual->modeoftransaction == "walk-in"){ echo "selected"; } ?>>Walk-in</option>
                                                <option value="visited" <?php if($individual->modeoftransaction == "visited"){ echo "selected"; } ?>>Visited</option>
                                                <option value="referral" <?php if($individual->modeoftransaction == "referral"){ echo "selected"; } ?>>Referral</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="md-form mb-4">
                                                <input type="date" disabled name="dateofconsultation" class="form-control"
                                                    autocomplete="off" required value="<?= $individual->dateofconsultation; ?>">
                                                <label>Date of Consultation</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="md-form mb-4">
                                                <input type="time" disabled name="consultationtime" class="form-control"
                                                    autocomplete="off" required value="<?= $individual->consultationtime; ?>">
                                                <label>Consultation Time</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 row">
                                            <div class="col">
                                                <div class="md-form mb-4">
                                                    <input type="text" disabled name="bloodpressure" class="form-control"
                                                        autocomplete="off" value="<?= $individual->bloodpressure; ?>">
                                                    <label>Blood Pressure</label>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="md-form mb-4">
                                                    <input type="text" disabled name="temperature" class="form-control"
                                                        autocomplete="off" required value="<?= $individual->temperature; ?>">
                                                    <label>Temperature</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 row">
                                            <div class="col">
                                                <div class="md-form mb-4">
                                                    <input type="text" disabled name="height" class="form-control"
                                                        autocomplete="off" required value="<?= $individual->height; ?>">
                                                    <label>Height (cm)</label>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="md-form mb-4">
                                                    <input type="text" disabled name="weight" class="form-control"
                                                        autocomplete="off" required value="<?= $individual->weight; ?>">
                                                    <label>Weight (kg)</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="md-form mb-4">
                                                <input type="text" disabled name="nameattendingprovider" class="form-control"
                                                    autocomplete="off" value="<?= $individual->nameattendingprovider; ?>">
                                                <label>Name of Attending Provider</label>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="col-sm-12">
                                            <small>Nature of Visit</small>
                                            <select name="natureofvisit" disabled class="browser-default custom-select mb-3"
                                                required>
                                                <option value="">--select option--</option>
                                                <option value="new-consultation-case" <?php if($individual->natureofvisit == "new-consultation-case"){ echo "selected"; } ?>>New Consultation/Case</option>
                                                <option value="new-admission" <?php if($individual->natureofvisit == "new-admission"){ echo "selected"; } ?>>New Admission (Transferee)</option>
                                                <option value="follow-up-visit" <?php if($individual->natureofvisit == "follow-up-visit"){ echo "selected"; } ?>>Follow-up visit</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-12">
                                            <small>Type of Consultation / Purpose of visit</small>
                                            <select name="typeofconsultationpurposeofvisit" disabled
                                                class="browser-default custom-select mb-3">
                                                <option value="">--select option--</option>
                                                <option value="general" <?php if($individual->typeofconsultationpurposeofvisit == "general"){ echo "selected"; } ?>>General</option>
                                                <option value="prenatal" <?php if($individual->typeofconsultationpurposeofvisit == "prenatal"){ echo "selected"; } ?>>Prenatal</option>
                                                <option value="dental-care" <?php if($individual->typeofconsultationpurposeofvisit == "dental-care"){ echo "selected"; } ?>>Dental Care</option>
                                                <option value="child-care" <?php if($individual->typeofconsultationpurposeofvisit == "child-care"){ echo "selected"; } ?>>Child Care</option>
                                                <option value="child-nutrition" <?php if($individual->typeofconsultationpurposeofvisit == "child-nutrition"){ echo "selected"; } ?>>Child Nutrition</option>
                                                <option value="injury" <?php if($individual->typeofconsultationpurposeofvisit == "injury"){ echo "selected"; } ?>>Injury</option>
                                                <option value="adult-immunization" <?php if($individual->typeofconsultationpurposeofvisit == "adult-immunization"){ echo "selected"; } ?>>Adult Immunization</option>
                                                <option value="family-planning" <?php if($individual->typeofconsultationpurposeofvisit == "family-planning"){ echo "selected"; } ?>>Family Planning</option>
                                                <option value="postpartum" <?php if($individual->typeofconsultationpurposeofvisit == "postpartum"){ echo "selected"; } ?>>Postpartum</option>
                                                <option value="tuberculosis" <?php if($individual->typeofconsultationpurposeofvisit == "tuberculosis"){ echo "selected"; } ?>>Tuberculosis</option>
                                                <option value="child-immunization" <?php if($individual->typeofconsultationpurposeofvisit == "child-immunization"){ echo "selected"; } ?> >Child Immunization</option>
                                                <option value="sick-children" <?php if($individual->typeofconsultationpurposeofvisit == "sick-children"){ echo "selected"; } ?>>Sick Children</option>
                                                <option value="firecracker-injury" <?php if($individual->typeofconsultationpurposeofvisit == "firecracker-injury"){ echo "selected"; } ?>>Firecracker Injury</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-12 row">
                                            <div class="col-lg-12">
                                                <small>For REFERRAL Transaction only/</small>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="md-form mb-4">
                                                    <input type="text" name="refferedfrom" disabled class="form-control"
                                                        autocomplete="off" value="<?= $individual->refferedfrom; ?>">
                                                    <label>REFERRED FROM</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="md-form mb-4">
                                                    <input type="text" name="refferedto" disabled class="form-control"
                                                        autocomplete="off" value="<?= $individual->refferedto; ?>">
                                                    <label>REFERRED TO</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="md-form">
                                                    <textarea name="reasonforreferral" disabled class="md-textarea form-control"
                                                        rows="2"><?= $individual->reasonforreferral; ?></textarea>
                                                    <label for="form7">Reason(s) for Referral</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="md-form mb-4">
                                                    <input type="text" name="refferedby" disabled class="form-control"
                                                        autocomplete="off" value="<?= $individual->refferedby; ?>">
                                                    <label>Referred by</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="md-form">
                                                    <textarea name="cheifcomplaints" disabled class="md-textarea form-control"
                                                        rows="2"><?= $individual->cheifcomplaints; ?></textarea>
                                                    <label for="form7">Chief Complaints</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="md-form">
                                                    <textarea name="diagnosis" disabled  class="md-textarea form-control" required
                                                        rows="2"><?= $individual->diagnosis; ?></textarea>
                                                    <label for="form7">Diagnosis</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 row">
                                                <div class="col-lg-12">
                                                    <div class="md-form">
                                                        <textarea name="medicaltreatment" disabled
                                                            class="md-textarea form-control" rows="2"><?= $individual->medicaltreatment; ?></textarea>
                                                        <label for="form7">Medical / Treatment </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="md-form">
                                                        <input type="text" name="nameofhealthprovider" disabled
                                                            class="form-control" autocomplete="off" value="<?= $individual->nameofhealthprovider; ?>">
                                                        <label for="form7">Name of Health Care Provider</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 row">
                                                <div class="col-lg-12">
                                                    <div class="md-form">
                                                        <textarea name="labfindingsimpression" disabled
                                                            class="md-textarea form-control" rows="2"><?= $individual->labfindingsimpression; ?></textarea>
                                                        <label for="form7">Labaratory Findings / Impression</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="md-form">
                                                        <input type="text" name="performedlabtest" disabled class="form-control"
                                                            autocomplete="off" value="<?= $individual->performedlabtest; ?>">
                                                        <label for="form7">Performed Laboratory Test</label>
                                                    </div>
                                                </div>



                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><br>
                     

                    </div>
                </div>

            </div>
        </div>
    </div>
    <input type="hidden" name="pass_id" value="<?= $_GET['view']; ?>">
    <input type="hidden" name="individual_update">
    <button type="button" class="btn btn-custom btn-submit-bottom mb-3" name="edit" id="view_individual_btn_edit"><i
            class="fas fa-pen"></i> &nbsp; Edit</button>
    <button type="submit" class="btn btn-custom-2 btn-submit-bottom mb-3" id="" style="display:none;" name="save"><i
            class="fas fa-paper-plane"></i> &nbsp; Save Changes</button>
</form>