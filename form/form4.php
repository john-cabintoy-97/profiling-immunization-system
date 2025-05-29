<?php
    $view_sql4 = "SELECT feeding_six_months, feeding_six_months_duration, vitamin_a_date,mnp_date, mmr_date_dose_one, nutrional_age_months, nutrional_length, nutrional_weight,nutritional_status,mmr_date_dose_twi,fic_date, remarks FROM record_four WHERE patient_id = :patient_id";
    $patient_four = $controller->getPatientById($view_sql4, $patient_id);
   
?>
<form method="post" class="form_four">
    <div class="card shadow mb-4">
        <div class="card-header bg-custom py-3">
            <div class="row">
                <div class="col-sm-12 col-lg-11">
                <?php if(empty($patient_four->feeding_six_months) || empty($patient_four->feeding_six_months_duration) || (empty($patient_four->vitamin_a_date) || $patient_four->vitamin_a_date == "0000-00-00") || (empty($patient_four->mnp_date) || $patient_four->mnp_date == "0000-00-00") || (empty($patient_four->mmr_date_dose_one) || $patient_four->mmr_date_dose_one == "0000-00-00") || empty($patient_four->nutrional_age_months) ||  empty($patient_four->nutrional_length) || empty($patient_four->nutrional_weight) || empty($patient_four->nutritional_status) || (empty($patient_four->mmr_date_dose_twi) || $patient_four->mmr_date_dose_twi == "0000-00-00") || (empty($patient_four->fic_date) || $patient_four->fic_date == "0000-00-00") || empty($patient_four->remarks)): ?>
                        <h6 class="m-0 text-white form-status"><i class="fas fa-exclamation-circle text-danger" data-toggle="tooltip" data-placement="bottom" title="Form not completed!"></i> &nbsp;Target Client List for Immunization and Nutrition Service for Infants Age 0-11 Months Old and Children Age 12 Months Old.</h6>
                    <?php else: ?>
                        <h6 class="m-0 text-white form-status"><i class="fas fa-check-circle text-success" data-toggle="tooltip" data-placement="bottom" title="Form completed!"></i> &nbsp;Target Client List for Immunization and Nutrition Service for Infants Age 0-11 Months Old and Children Age 12 Months Old.</h6>
                    <?php endif; ?>
                   
                </div>
                <div class="col-sm-12 col-lg-1">
                    <h6 class="m-0 font-weight-bold text-white">( 4/4 )</h6>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12 border-custom">
                    <div class="user p-5">
                        <div class="row">
                            <div class="col-sm-12 col-lg-12">
                                <h6 class="text-primary"><Strong>6-11 months old</Strong></h6>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-2">
                                        <h6><Strong>Introduction of Complementary Feeding** at 6 months old</Strong>
                                        </h6>
                                    </div>
                                    <div class="col-sm-12 col-lg-6">
                                        <select name="feeding_six_months" class="form-control mb-4 form-select-lg"
                                            disabled>
                                            <option value="">--select yes or no option--</option>
                                            <option value="yes"
                                                <?php if(isset($patient_four->feeding_six_months)){if($patient_four->feeding_six_months == "yes"){ echo "selected"; }} ?>>
                                                Yes</option>
                                            <option value="no"
                                                <?php if(isset($patient_four->feeding_six_months)){if($patient_four->feeding_six_months == "no"){ echo "selected"; }} ?>>
                                                No</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-12 col-lg-6">
                                        <select name="feeding_six_months_duration"
                                            class="form-control mb-4 form-select-lg" disabled>
                                            <option value="">--select breastfeeding option--</option>
                                            <option value="continue"
                                                <?php if(isset($patient_four->feeding_six_months_duration)){if($patient_four->feeding_six_months_duration == "continue"){ echo "selected"; }} ?>>
                                                Continues breasfeeding</option>
                                            <option value="no"
                                                <?php if(isset($patient_four->feeding_six_months_duration)){if($patient_four->feeding_six_months_duration == "no"){ echo "selected"; }} ?>>
                                                No longer breastfeeding or never breastfed</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-2">
                                        <h6><Strong>Vitamin A</Strong>
                                        </h6>
                                    </div>
                                    <div class="col-sm-12 col-lg-12">
                                        <div class="md-form">
                                            <input type="date" id="inputDisabledEx" name="vitamin_a_date"
                                                class="form-control"
                                                value="<?php if(isset($patient_four->vitamin_a_date)){ echo $patient_four->vitamin_a_date;} else { echo "";} ?>"
                                                disabled>
                                            <label for="inputDisabledEx" class="disabled">(Date Given)</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-2">
                                        <h6><Strong>MNP</Strong>
                                        </h6>
                                    </div>

                                    <div class="col-sm-12 col-lg-12">

                                        <div class="md-form">
                                            <input type="date" id="inputDisabledEx" name="mnp_date" class="form-control"
                                                value="<?php if(isset($patient_four->mnp_date)){ echo $patient_four->mnp_date;} else { echo "";} ?>"
                                                disabled>
                                            <label for="inputDisabledEx" class="disabled">(date when 90 sachets
                                                given)</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-2">
                                        <h6><Strong>MMR</Strong>
                                        </h6>
                                    </div>

                                    <div class="col-sm-12 col-lg-12">

                                        <div class="md-form">
                                            <input type="date" id="inputDisabledEx" name="mmr_date_dose_one"
                                                class="form-control"
                                                value="<?php if(isset($patient_four->mmr_date_dose_one)){ echo $patient_four->mmr_date_dose_one;} else { echo "";} ?>"
                                                disabled>
                                            <label for="inputDisabledEx" class="disabled">Dose 1 at 9th
                                                month</strong>(Date given)</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 col-lg-12">
                                <h6 class="text-primary"><Strong>12 months old</Strong></h6>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <h6><Strong>Nutritional Status Assesment</Strong></h6>
                                    </div>
                                    <div class="col-sm-12 mb-3 mb-sm-0">

                                        <div class="md-form">
                                            <input type="number" id="inputDisabledEx" name="nutrional_age_months"
                                                class="form-control"
                                                value="<?php if(isset($patient_four->nutrional_age_months)){ echo $patient_four->nutrional_age_months;} else { echo "";} ?>"
                                                disabled>
                                            <label for="inputDisabledEx" class="disabled">Age in months</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">

                                        <div class="md-form">
                                            <input type="text" id="inputDisabledEx" name="nutrional_length"
                                                class="form-control"
                                                value="<?php if(isset($patient_four->nutrional_length)){ echo $patient_four->nutrional_length;} else { echo "";} ?>"
                                                disabled>
                                            <label for="inputDisabledEx" class="disabled">Length (cm)</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mb-3">

                                        <div class="md-form">
                                            <input type="text" id="inputDisabledEx" name="nutrional_weight"
                                                class="form-control"
                                                value="<?php if(isset($patient_four->nutrional_weight)){ echo $patient_four->nutrional_weight;} else { echo "";} ?>"
                                                disabled>
                                            <label for="inputDisabledEx" class="disabled">Weight (Kg)</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <small><strong>Status</strong></small>

                                        <select name="nutritional_status" class="form-control form-select-lg" disabled>
                                            <option value="">--select nutritional status--</option>
                                            <option value="stunted"
                                                <?php if(isset($patient_four->nutritional_status)){if($patient_four->nutritional_status == "stunted"){ echo "selected"; }} ?>>
                                                Stunted</option>
                                            <option value="man"
                                                <?php if(isset($patient_four->nutritional_status)){if($patient_four->nutritional_status == "man"){ echo "selected"; }}  ?>>
                                                Wasted-MAM</option>
                                            <option value="sam"
                                                <?php if(isset($patient_four->nutritional_status)){if($patient_four->nutritional_status == "sam"){ echo "selected"; }} ?>>
                                                Wasted-SAM</option>
                                            <option value="obese"
                                                <?php if(isset($patient_four->nutritional_status)){if($patient_four->nutritional_status == "obese"){ echo "selected"; }}  ?>>
                                                Obese / overweight</option>
                                            <option value="normal"
                                                <?php if(isset($patient_four->nutritional_status)){if($patient_four->nutritional_status == "normal"){ echo "selected"; }}  ?>>
                                                Normal</option>

                                        </select>
                                    </div>

                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-12 mb-2">
                                        <h6><Strong>MMR</Strong>
                                        </h6>
                                    </div>

                                    <div class="col-sm-12 col-lg-12">
                                        <div class="md-form">
                                            <input type="date" id="inputDisabledEx" name="mmr_date_dose_twi"
                                                class="form-control"
                                                value="<?php if(isset($patient_four->mmr_date_dose_twi)){ echo $patient_four->mmr_date_dose_twi;} else { echo "";} ?>"
                                                disabled>
                                            <label for="inputDisabledEx" class="disabled">Dose 2 at 12th
                                                month</strong>(Date given)</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-2">
                                        <h6><Strong>FIC ***</Strong>
                                        </h6>
                                    </div>

                                    <div class="col-sm-12 col-lg-12">
                                        <div class="md-form">
                                            <input type="date" id="inputDisabledEx" name="fic_date" class="form-control"
                                                value="<?php if(isset($patient_four->fic_date)){ echo $patient_four->fic_date;} else { echo "";} ?>"
                                                disabled>
                                            <label for="inputDisabledEx" class="disabled">(Date)</label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-sm-12 col-lg-12">
                                <hr>
                                <div class="md-form">
                                    <textarea id="form7" name="remarks" class="md-textarea form-control" cols="30"
                                        rows="3"
                                        disabled><?php if(isset($patient_four->remarks)){ echo $patient_four->remarks;} else { echo "";} ?></textarea>
                                    <label for="form7">Remarks</label>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <input type="hidden" name="pass_id" value="<?= $patient_id; ?>">
    <input type="hidden" name="form_four">
    <button type="button" class="btn btn-custom btn-submit-bottom mb-3" name="edit" id="form_four_btn_edit"><i
            class="fas fa-pen"></i> &nbsp; Edit</button>
    <button type="submit" class="btn btn-custom-2 btn-submit-bottom mb-3" id="form_four_btn_save" style="display:none;"
        name="save"><i class="fas fa-paper-plane"></i> &nbsp; Save Changes</button>
</form>