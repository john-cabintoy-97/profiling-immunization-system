<?php
    $view_sql2 = "SELECT rt.length_birth,rt.weight_birth,rt.weight_birth_status,rt.breast_feeding,rt.bcg,rt.bbd,rt.nutrition_age_months,rt.nutrition_length,rt.nutrition_length_date,rt.nutrition_weight,rt.nutrition_weight_date,rt.nutrition_status, rt.low_birth_first_month,rt.low_birth_second_month, rt.low_birth_third_month,rt.immunization_first_dose,  rt.immunization_second_dose,rt.immunization_third_dose  FROM record_two AS rt WHERE patient_id = :patient_id";
    $patient = $controller->getPatientById($view_sql2, $patient_id);
    
?>
<form method="post" class="form_two">
    <div class="card shadow mb-4">
        <div class="card-header bg-custom py-3">
            <div class="row">
                <div class="col-sm-12 col-lg-11">
                    <?php if(empty($patient->length_birth) || empty($patient->weight_birth) || empty($patient->weight_birth_status) || (empty($patient->breast_feeding) || $patient->breast_feeding == "0000-00-00") || (empty($patient->bcg) || $patient->bcg == "0000-00-00") || (empty($patient->bbd) || $patient->bbd == "0000-00-00") || (empty($patient->nutrition_age_months) || $patient->nutrition_age_months == "0000-00-00") || empty($patient->nutrition_length) || (empty($patient->nutrition_length_date) || $patient->nutrition_length_date == "0000-00-00") || empty($patient->nutrition_weight) || (empty($patient->nutrition_weight_date) || $patient->nutrition_weight_date == "0000-00-00") || empty($patient->nutrition_status) || (empty($patient->low_birth_first_month) || $patient->low_birth_first_month == "0000-00-00") || (empty($patient->low_birth_second_month) || $patient->low_birth_second_month == "0000-00-00") || (empty($patient->low_birth_third_month) || $patient->low_birth_third_month == "0000-00-00") || (empty($patient->immunization_first_dose) || $patient->immunization_first_dose == "0000-00-00") || (empty($patient->immunization_second_dose) || $patient->immunization_second_dose == "0000-00-00") || (empty($patient->immunization_third_dose) || $patient->immunization_third_dose == "0000-00-00")): ?>
                        <h6 class="m-0 text-white form-status"><i class="fas fa-exclamation-circle text-danger" data-toggle="tooltip" data-placement="bottom" title="Form not completed!"></i> &nbsp;Target Client List for Immunization and Nutrition Service for Infants Age 0-11 Months Old and Children Age 12 Months Old.</h6>
                    <?php else: ?>
                        <h6 class="m-0 text-white form-status"><i class="fas fa-check-circle text-success" data-toggle="tooltip" data-placement="bottom" title="Form completed!"></i> &nbsp;Target Client List for Immunization and Nutrition Service for Infants Age 0-11 Months Old and Children Age 12 Months Old.</h6>
                    <?php endif; ?>
                </div>
                <div class="col-sm-12 col-lg-1">
                    <h6 class="m-0 font-weight-bold text-white">( 2/4 )</h6>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12 border-custom">
                    <div class="user p-5">
                        <div class="row">
                            <div class="col-sm-12 col-lg-12">
                                <h6 class="text-primary"><Strong>Newborn (0-28 days old)</Strong></h6>
                                <hr>
                                <div class="form-group row">

                                    <div class="col-sm-12 col-lg-4 mb-sm-0">
                                        <div class="md-form mb-0">
                                            <input type="text" name="length_birth" class="form-control"
                                                autocomplete="off"
                                                value="<?php if(isset($patient->length_birth)){ echo $patient->length_birth;} else { echo "";} ?>"
                                                disabled>
                                            <label>Length at Birth (cm)</label>
                                        </div>


                                    </div>
                                    <div class="col-sm-12 col-lg-4">
                                        <div class="md-form mb-0">
                                            <input type="text" name="weight_birth" class="form-control"
                                                autocomplete="off"
                                                value="<?php if(isset($patient->weight_birth)){ echo $patient->weight_birth;} else { echo "";} ?>"
                                                disabled>
                                            <label>Weight at Birth (Kg)</label>
                                        </div>

                                    </div>

                                    <div class="col-sm-12 col-lg-4">
                                        <small>Status (Birth Weight)</small>
                                        <select name="weight_birth_status" class="form-control  mb-2 form-select-lg"
                                            disabled>
                                            <option value="">--select status--</option>
                                            <option value="low"
                                                <?php if(isset($patient->weight_birth_status)){if($patient->weight_birth_status == "low"){ echo "selected"; }} ?>>
                                                Low: < 2,500 gms</option>
                                            <option value="normal"
                                                <?php if(isset($patient->weight_birth_status)){if($patient->weight_birth_status == "normal"){ echo "selected"; }} ?>>
                                                Normal: > 2,500 gms</option>
                                            <option value="unknown"
                                                <?php if(isset($patient->weight_birth_status)){if($patient->weight_birth_status == "unknown"){ echo "selected"; }} ?>>
                                                Unknown</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <div class="md-form mb-0">
                                        <input type="date" name="breast_feeding" class="form-control" autocomplete="off"
                                            value="<?php if(isset($patient->breast_feeding)){ echo $patient->breast_feeding;} else { echo "";} ?>"
                                            disabled>
                                        <label>Initiated breast feeding immediately after birth last for 90 minutes
                                            (date)</label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <h6><Strong>Immunization</Strong></h6>
                                    </div>
                                    <div class="col-sm-12 col-lg-6 mb-3">
                                        <div class="md-form mb-0">
                                            <input type="date" name="bcg" class="form-control" autocomplete="off"
                                                value="<?php if(isset($patient->bcg)){ echo $patient->bcg;} else { echo "";} ?>"
                                                disabled>
                                            <label>BCG (date)</label>
                                        </div>

                                    </div>
                                    <div class="col-sm-12 col-lg-6">
                                        <div class="md-form mb-0">
                                            <input type="date" name="bbd" class="form-control" autocomplete="off"
                                                value="<?php if(isset($patient->bbd)){ echo $patient->bbd;} else { echo "";} ?>"
                                                disabled>
                                            <label>Hepa BBD (date)</label>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-12 border-leftt">
                                <h6 class="text-primary"><Strong>1-3 months old</Strong></h6>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <p>Nutrition Status Assesment</p>
                                    </div>
                                    <div class="col-sm-12 mb-sm-0">
                                        <div class="md-form mb-0">
                                            <input type="date" name="nutrition_age_months" class="form-control mb-3"
                                                autocomplete="off"
                                                value="<?php if(isset($patient->nutrition_age_months)){ echo $patient->nutrition_age_months;} else { echo "";} ?>"
                                                disabled>
                                            <label>Age in months</label>
                                        </div>

                                    </div>
                                    <div class="col-sm-12">
                                        <small>Length (cm)</small>
                                        <div class="form-group row">

                                            <div class="col-sm-6">
                                                <div class="md-form mb-0">
                                                    <input type="text" name="nutrition_length" class="form-control"
                                                        autocomplete="off"
                                                        value="<?php if(isset($patient->nutrition_length)){ echo $patient->nutrition_length;} else { echo "";} ?>"
                                                        disabled>

                                                </div>

                                            </div>
                                            <div class="col-sm-6">
                                                <div class="md-form mb-0">
                                                    <input type="date" name="nutrition_length_date" class="form-control"
                                                        autocomplete="off"
                                                        value="<?php if(isset($patient->nutrition_length_date)){ echo $patient->nutrition_length_date;} else { echo "";} ?>"
                                                        disabled>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 ">
                                        <small>Weight (Kg)</small>
                                        <div class="form-group row">

                                            <div class="col-sm-6">
                                                <div class="md-form mb-0">
                                                    <input type="text" name="nutrition_weight" class="form-control"
                                                        autocomplete="off"
                                                        value="<?php if(isset($patient->nutrition_weight)){ echo $patient->nutrition_weight;} else { echo "";} ?>"
                                                        disabled>

                                                </div>

                                            </div>
                                            <div class="col-sm-6">
                                                <div class="md-form mb-0">
                                                    <input type="date" name="nutrition_weight_date" class="form-control"
                                                        autocomplete="off"
                                                        value="<?php if(isset($patient->nutrition_weight_date)){ echo $patient->nutrition_weight_date;} else { echo "";} ?>"
                                                        disabled>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <small><strong>Status</strong></small>

                                        <select name="nutrition_status" class="form-control  form-select-lg" disabled>
                                            <option value="">--select status--</option>
                                            <option value="stunted"
                                                <?php if(isset($patient->nutrition_status)){if($patient->nutrition_status == "stunted"){ echo "selected"; }} ?>>
                                                Stunted</option>
                                            <option value="man"
                                                <?php if(isset($patient->nutrition_status)){if($patient->nutrition_status == "man"){ echo "selected"; }}  ?>>
                                                Wasted-MAM</option>
                                            <option value="sam"
                                                <?php if(isset($patient->nutrition_status)){if($patient->nutrition_status == "sam"){ echo "selected"; }} ?>>
                                                Wasted-SAM</option>
                                            <option value="obese"
                                                <?php if(isset($patient->nutrition_status)){if($patient->nutrition_status == "obese"){ echo "selected"; }}  ?>>
                                                Obese / overweight</option>
                                            <option value="normal"
                                                <?php if(isset($patient->nutrition_status)){if($patient->nutrition_status == "normal"){ echo "selected"; }}  ?>>
                                                Normal</option>

                                        </select>
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <p>Low Birth weight given Iron (Date)</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-4">
                                        <div class="md-form mb-0">
                                            <input type="date" name="low_birth_first_month" class="form-control mb-3"
                                                autocomplete="off"
                                                value="<?php if(isset($patient->low_birth_first_month)){ echo $patient->low_birth_first_month;} else { echo "";} ?>"
                                                disabled>
                                            <label>1 month</label>
                                        </div>

                                    </div>
                                    <div class="col-sm-12 col-lg-4">
                                        <div class="md-form mb-0">
                                            <input type="date" name="low_birth_second_month" class="form-control mb-3"
                                                autocomplete="off"
                                                value="<?php if(isset($patient->low_birth_second_month)){ echo $patient->low_birth_second_month;} else { echo "";} ?>"
                                                disabled>
                                            <label>2 month</label>
                                        </div>

                                    </div>
                                    <div class="col-sm-12 col-lg-4">
                                        <div class="md-form mb-0">
                                            <input type="date" name="low_birth_third_month" class="form-control mb-3"
                                                autocomplete="off"
                                                value="<?php if(isset($patient->low_birth_third_month)){ echo $patient->low_birth_third_month;} else { echo "";} ?>"
                                                disabled>
                                            <label>3 month</label>
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <hr>
                                        <p>Immunization (Date) <spanclass="text-dark">
                                                <strong>DPT-HiB-HepB</strong></span></p>
                                    </div>
                                    <div class="col-sm-12 col-lg-4">
                                        <div class="md-form mb-0">
                                            <input type="date" name="immunization_first_dose" class="form-control mb-3"
                                                autocomplete="off"
                                                value="<?php if(isset($patient->immunization_first_dose)){ echo $patient->immunization_first_dose;} else { echo "";} ?>"
                                                disabled>
                                            <label>1st Dose (1, 1/2 months)</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-lg-4">
                                        <div class="md-form mb-0">
                                            <input type="date" name="immunization_second_dose" class="form-control mb-3"
                                                autocomplete="off"
                                                value="<?php if(isset($patient->immunization_second_dose)){ echo $patient->immunization_second_dose;} else { echo "";} ?>"
                                                disabled>
                                            <label>2nd Dose (2, 1/2 months)</label>
                                        </div>

                                    </div>
                                    <div class="col-sm-12 col-lg-4">
                                        <div class="md-form mb-0">
                                            <input type="date" name="immunization_third_dose" class="form-control mb-3"
                                                autocomplete="off"
                                                value="<?php if(isset($patient->immunization_third_dose)){ echo $patient->immunization_third_dose;} else { echo "";} ?>"
                                                disabled>
                                            <label>3rd Dose (3, 1/2 months)</label>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <input type="hidden" name="pass_id" value="<?= $patient_id; ?>">
    <input type="hidden" name="form_two">
    <button type="button" class="btn btn-custom btn-submit-bottom mb-3" name="edit" id="form_two_btn_edit"><i
            class="fas fa-pen"></i> &nbsp; Edit</button>
    <button type="submit" class="btn btn-custom-2 btn-submit-bottom mb-3" id="form_two_btn_save" style="display:none;"
        name="save"><i class="fas fa-paper-plane"></i> &nbsp; Save Changes</button>
</form>