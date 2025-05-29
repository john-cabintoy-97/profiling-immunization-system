<?php
    $view_sql3 = "SELECT  rth.opv_first_dose, rth.opv_second_dose, rth.opv_third_dose, rth.pcv_first_dose, rth.pcv_second_dose, rth.pcv_third_dose, rth.ipv_third_dose, rth.exlusive_breastfed_one_month, rth.exlusive_breastfed_one_month_date, rth.exlusive_breastfed_two_month, rth.exlusive_breastfed_two_month_date, rth.exlusive_breastfed_three_month, rth.exlusive_breastfed_three_month_date, rth.exlusive_breastfed_four_month, rth.exlusive_breastfed_four_month_date, rth.nutrition_age_month, rth.nutrition_length_month, rth.nutrition_weight_month, rth.nutrition_status_month FROM record_three AS rth WHERE patient_id = :patient_id";
    $patient = $controller->getPatientById($view_sql3, $patient_id);
  
?>
<form method="post" class="form_three">
    <div class="card shadow mb-4">
        <div class="card-header bg-custom py-3">
            <div class="row">
                <div class="col-sm-12 col-lg-11">
                <?php if((empty($patient->opv_first_dose) || $patient->opv_first_dose == "0000-00-00") || (empty($patient->opv_second_dose) || $patient->opv_second_dose == "0000-00-00") || (empty($patient->opv_third_dose) || $patient->opv_third_dose == "0000-00-00") || (empty($patient->pcv_first_dose) || $patient->pcv_first_dose == "0000-00-00") || (empty($patient->pcv_second_dose) || $patient->pcv_second_dose == "0000-00-00") || (empty($patient->pcv_third_dose) || $patient->pcv_third_dose == "0000-00-00") || (empty($patient->ipv_third_dose) || $patient->ipv_third_dose == "0000-00-00")  || empty($patient->exlusive_breastfed_one_month) || (empty($patient->exlusive_breastfed_one_month_date) || $patient->exlusive_breastfed_one_month_date == "0000-00-00") ||  empty($patient->exlusive_breastfed_two_month) || (empty($patient->exlusive_breastfed_two_month_date) || $patient->exlusive_breastfed_two_month_date == "0000-00-00") || empty($patient->exlusive_breastfed_three_month) || (empty($patient->exlusive_breastfed_three_month_date) || $patient->exlusive_breastfed_three_month_date == "0000-00-00") || empty($patient->exlusive_breastfed_four_month) || (empty($patient->exlusive_breastfed_four_month_date) || $patient->exlusive_breastfed_four_month_date == "0000-00-00") || (empty($patient->nutrition_age_month) || $patient->nutrition_age_month == "0000-00-00") || (empty($patient->nutrition_length_month) || $patient->nutrition_length_month == "0000-00-00") || (empty($patient->nutrition_weight_month) || $patient->nutrition_weight_month == "0000-00-00")  || empty($patient->nutrition_status_month)): ?>
                        <h6 class="m-0 text-white form-status"><i class="fas fa-exclamation-circle text-danger" data-toggle="tooltip" data-placement="bottom" title="Form not completed!"></i> &nbsp;Target Client List for Immunization and Nutrition Service for Infants Age
                        0-11 Months Old and Children Age 12 Months Old.</h6>
                    <?php else: ?>
                        <h6 class="m-0 text-white form-status"><i class="fas fa-check-circle text-success" data-toggle="tooltip" data-placement="bottom" title="Form completed!"></i> &nbsp;Target Client List for Immunization and Nutrition Service for Infants Age
                        0-11 Months Old and Children Age 12 Months Old.</h6>
                    <?php endif; ?>
                </div>
                <div class="col-sm-12 col-lg-1">
                    <h6 class="m-0 font-weight-bold text-white">( 3/4 )</h6>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12 border-custom">
                    <div class="user p-5">
                        <div class="row">
                            <div class="col-sm-12 col-lg-12 ">
                                <h6 class="text-primary"><Strong>1-3 months old</Strong></h6>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <h6><Strong>OPV</Strong></h6>
                                    </div>
                                    <div class="col-sm-12 col-lg-6">
                                        <div class="md-form mb-0">
                                            <input type="date" name="opv_first_dose" class="form-control mb-3"
                                                autocomplete="off"
                                                value="<?php if(isset($patient->opv_first_dose)){ echo $patient->opv_first_dose;} else { echo "";} ?>"
                                                disabled>
                                            <label>1st Dose (1, 1/2 months)</label>
                                        </div>

                                    </div>
                                    <div class="col-sm-12 col-lg-6">
                                        <div class="md-form mb-0">
                                            <input type="date" name="opv_second_dose" class="form-control mb-3"
                                                autocomplete="off"
                                                value="<?php if(isset($patient->opv_second_dose)){ echo $patient->opv_second_dose;} else { echo "";} ?>"
                                                disabled>
                                            <label>2nd Dose (2, 1/2 months)</label>
                                        </div>

                                    </div>
                                    <div class="col-sm-12 col-lg-12">
                                        <div class="md-form mb-0">
                                            <input type="date" name="opv_third_dose" class="form-control mb-3"
                                                autocomplete="off"
                                                value="<?php if(isset($patient->opv_third_dose)){ echo $patient->opv_third_dose;} else { echo "";} ?>"
                                                disabled>
                                            <label>3rd Dose (3, 1/2 months)</label>
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <h6><Strong>PCV</Strong></h6>
                                    </div>
                                    <div class="col-sm-12 col-lg-6">
                                        <div class="md-form mb-0">
                                            <input type="date" name="pcv_first_dose" class="form-control mb-3"
                                                autocomplete="off"
                                                value="<?php if(isset($patient->pcv_first_dose)){ echo $patient->pcv_first_dose;} else { echo "";} ?>"
                                                disabled>
                                            <label>1st Dose (1, 1/2 months)</label>
                                        </div>

                                    </div>
                                    <div class="col-sm-12 col-lg-6">
                                        <div class="md-form mb-0">
                                            <input type="date" name="pcv_second_dose" class="form-control mb-3"
                                                autocomplete="off"
                                                value="<?php if(isset($patient->pcv_second_dose)){ echo $patient->pcv_second_dose;} else { echo "";} ?>"
                                                disabled>
                                            <label>2nd Dose (2, 1/2 months)</label>
                                        </div>

                                    </div>
                                    <div class="col-sm-12 col-lg-12">
                                        <div class="md-form mb-0">
                                            <input type="date" name="pcv_third_dose" class="form-control mb-3"
                                                autocomplete="off"
                                                value="<?php if(isset($patient->pcv_third_dose)){ echo $patient->pcv_third_dose;} else { echo "";} ?>"
                                                disabled>
                                            <label>3rd Dose (3, 1/2 months)</label>
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group ">
                                    <p>IPV</p>
                                    <div class="md-form mb-0">
                                        <input type="date" name="ipv_third_dose" class="form-control mb-3"
                                            autocomplete="off"
                                            value="<?php if(isset($patient->ipv_third_dose)){ echo $patient->ipv_third_dose;} else { echo "";} ?>"
                                            disabled>
                                        <label>3rd Dose (3, 1/2 months)</label>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group ">
                                    <h6><Strong>Exclusive Breastfeeding</Strong></h6>
                                    <small>During the following immunization visit of the child at 1-(1/2), 2-(1/2) and
                                        3-(1/2) months old (or a 4-5 mos.) asl the mother if the child continues to be
                                        exclusively breastfed. select Yes if still EBF or No if no longer EBF then input
                                        the date when the infant was assessed.<br><br></small>

                                    <div class="form-group row">
                                        <div class="col">
                                            <small>1, 1/2 months</small>
                                            <select name="exlusive_breastfed_one_month"
                                                class="form-control  form-select-lg" disabled>
                                                <option value="">--select option--</option>
                                                <option value="yes"
                                                    <?php if(isset($patient->exlusive_breastfed_one_month)){if($patient->exlusive_breastfed_one_month == "yes"){ echo "selected"; }} ?>>
                                                    Yes</option>
                                                <option value="no"
                                                    <?php if(isset($patient->exlusive_breastfed_one_month)){if($patient->exlusive_breastfed_one_month == "no"){ echo "selected"; }} ?>>
                                                    No</option>
                                            </select>
                                        </div>
                                        <div class="col">

                                            <div class="md-form mb-0">
                                                <input type="date" name="exlusive_breastfed_one_month_date"
                                                    class="form-control " autocomplete="off"
                                                    value="<?php if(isset($patient->exlusive_breastfed_one_month_date)){ echo $patient->exlusive_breastfed_one_month_date;} else { echo "";} ?>"
                                                    disabled>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col">
                                            <small><strong>2, 1/2 months</strong></small>
                                            <select name="exlusive_breastfed_two_month"
                                                class="form-control  form-select-lg" disabled>
                                                <option value="">--select option--</option>
                                                <option value="yes"
                                                    <?php if(isset($patient->exlusive_breastfed_two_month)){if($patient->exlusive_breastfed_two_month == "yes"){ echo "selected"; }} ?>>
                                                    Yes</option>
                                                <option value="no"
                                                    <?php if(isset($patient->exlusive_breastfed_two_month)){if($patient->exlusive_breastfed_two_month == "no"){ echo "selected"; }} ?>>
                                                    No</option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <div class="md-form mb-0">
                                                <input type="date" name="exlusive_breastfed_two_month_date"
                                                    class="form-control " autocomplete="off"
                                                    value="<?php if(isset($patient->exlusive_breastfed_two_month_date)){ echo $patient->exlusive_breastfed_two_month_date;} else { echo "";} ?>"
                                                    disabled>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col">
                                            <small><strong>3, 1/2 months</strong></small>
                                            <select name="exlusive_breastfed_three_month"
                                                class="form-control  form-select-lg" disabled>
                                                <option value="">--select option--</option>
                                                <option value="yes"
                                                    <?php if(isset($patient->exlusive_breastfed_three_month)){if($patient->exlusive_breastfed_three_month == "yes"){ echo "selected"; }} ?>>
                                                    Yes</option>
                                                <option value="no"
                                                    <?php if(isset($patient->exlusive_breastfed_three_month)){if($patient->exlusive_breastfed_three_month == "no"){ echo "selected"; }} ?>>
                                                    No</option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <div class="md-form mb-0">
                                                <input type="date" name="exlusive_breastfed_three_month_date"
                                                    class="form-control " autocomplete="off"
                                                    value="<?php if(isset($patient->exlusive_breastfed_three_month_date)){ echo $patient->exlusive_breastfed_three_month_date;} else { echo "";} ?>"
                                                    disabled>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col">
                                            <small><strong>4-5 months</strong></small>
                                            <select name="exlusive_breastfed_four_month"
                                                class="form-control  form-select-lg" disabled>
                                                <option value="">--select option--</option>
                                                <option value="yes"
                                                    <?php if(isset($patient->exlusive_breastfed_four_month)){if($patient->exlusive_breastfed_four_month == "yes"){ echo "selected"; }} ?>>
                                                    Yes</option>
                                                <option value="no"
                                                    <?php if(isset($patient->exlusive_breastfed_four_month)){if($patient->exlusive_breastfed_four_month == "no"){ echo "selected"; }} ?>>
                                                    No</option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <div class="md-form mb-0">
                                                <input type="date" name="exlusive_breastfed_four_month_date"
                                                    class="form-control " autocomplete="off"
                                                    value="<?php if(isset($patient->exlusive_breastfed_four_month_date)){ echo $patient->exlusive_breastfed_four_month_date;} else { echo "";} ?>"
                                                    disabled>

                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-sm-12 col-lg-12">
                                <h6 class="text-primary"><Strong>6-11 months old</Strong></h6>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <h6><Strong>Nutrition Status Assesment</Strong></h6>
                                    </div>
                                    <div class="col-sm-12 col-lg-4 mb-3 mb-sm-0">
                                        <div class="md-form mb-0">
                                            <input type="date" name="nutrition_age_month" class="form-control "
                                                autocomplete="off"
                                                value="<?php if(isset($patient->nutrition_age_month)){ echo $patient->nutrition_age_month;} else { echo "";} ?>"
                                                disabled>
                                            <label>Age in months</label>
                                        </div>

                                    </div>
                                    <div class="col-sm-12 col-lg-4">
                                        <div class="md-form mb-0">
                                            <input type="date" name="nutrition_length_month" class="form-control "
                                                autocomplete="off"
                                                value="<?php if(isset($patient->nutrition_length_month)){ echo $patient->nutrition_length_month;} else { echo "";} ?>"
                                                disabled>
                                            <label>Length (cm)</label>
                                        </div>

                                    </div>
                                    <div class="col-sm-12 col-lg-4 mb-3">
                                        <div class="md-form mb-0">
                                            <input type="date" name="nutrition_weight_month" class="form-control "
                                                autocomplete="off"
                                                value="<?php if(isset($patient->nutrition_weight_month)){ echo $patient->nutrition_weight_month;} else { echo "";} ?>"
                                                disabled>
                                            <label>Weight (Kg)</label>
                                        </div>

                                       
                                    </div>
                                    <div class="col-sm-12">
                                        <small><strong>Status</strong></small>

                                        <select name="nutrition_status_month" class="form-control form-select-lg"
                                            disabled>
                                            <option value="">--select nutrition status--</option>
                                            <option value="stunted"
                                                <?php if(isset($patient->nutrition_status_month)){if($patient->nutrition_status_month == "stunted"){ echo "selected"; }} ?>>
                                                Stunted</option>
                                            <option value="man"
                                                <?php if(isset($patient->nutrition_status_month)){if($patient->nutrition_status_month == "man"){ echo "selected"; }}  ?>>
                                                Wasted-MAM</option>
                                            <option value="sam"
                                                <?php if(isset($patient->nutrition_status_month)){if($patient->nutrition_status_month == "sam"){ echo "selected"; }} ?>>
                                                Wasted-SAM</option>
                                            <option value="obese"
                                                <?php if(isset($patient->nutrition_status_month)){if($patient->nutrition_status_month == "obese"){ echo "selected"; }}  ?>>
                                                Obese / overweight</option>
                                            <option value="normal"
                                                <?php if(isset($patient->nutrition_status_month)){if($patient->nutrition_status_month == "normal"){ echo "selected"; }}  ?>>
                                                Normal</option>


                                        </select>
                                    </div>

                                </div>
                                <!-- <div class="form-group ">
                                    <h6><Strong>Exclusive Breastfeeding</Strong></h6>
                                    <small>During the following immunization visit of the child at 1-(1/2), 2-(1/2) and
                                        3-(1/2) months old (or a 4-5 mos.) asl the mother if the child continues to be
                                        exclusively breastfed. select Yes if still EBF or No if no longer EBF then input
                                        the date when the infant was assessed.<br><br></small>

                                    <div class="form-group row">
                                        <div class="col-sm-12">

                                            <select name="exclusive_breastfeeding_option"
                                                class="form-control mb-4 form-select-lg" disabled>
                                                <option value="">--select option--</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-12">

                                            <input type="date" class="form-control " name="exclusive_breastfeeding_date"
                                                disabled>
                                        </div>
                                    </div>

                                </div> -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <input type="hidden" name="pass_id" value="<?= $patient_id; ?>">
    <input type="hidden" name="form_three">
    <button type="button" class="btn btn-custom btn-submit-bottom mb-3" name="edit" id="form_three_btn_edit"><i
            class="fas fa-pen"></i> &nbsp; Edit</button>
    <button type="submit" class="btn btn-custom-2 btn-submit-bottom mb-3" id="form_three_btn_save" style="display:none;"
        name="save"><i class="fas fa-paper-plane"></i> &nbsp; Save Changes</button>
</form>