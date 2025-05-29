<?php
    $view_sql = "SELECT ro.firstname, ro.lastname, ro.middlename, ro.gender, ro.birthdate, ro.mothersname, ro.address, ro.facilitycode, ro.se_status, ro.first_time, ro.delivery, p.timestamp FROM record_one AS ro INNER JOIN patient_enrollement AS p WHERE ro.patient_id = :patient_id";
    $patient = $controller->getPatientById($view_sql, $patient_id);
 
?>

<form method="post" class="form_one">

    <div class="card shadow mb-4 ">

        <div class="card-header bg-custom py-3 ">
            <div class="row">

                <div class="col-sm-12 col-lg-11">
                    <?php if(empty($patient->firstname) || empty($patient->lastname) || empty($patient->middlename) || empty($patient->gender) || empty($patient->birthdate) || empty($patient->mothersname) || empty($patient->address) || empty($patient->facilitycode) || empty($patient->se_status) || (empty($patient->first_time) && empty($patient->delivery))): ?>
                        <h6 class="m-0 text-white form-status"><i class="fas fa-exclamation-circle text-danger" data-toggle="tooltip" data-placement="bottom" title="Form not completed!"></i> &nbsp;Target Client List for Immunization and Nutrition Service for Infants Age 0-11 Months Old and Children Age 12 Months Old.</h6>
                    <?php else: ?>
                        <h6 class="m-0 text-white form-status"><i class="fas fa-check-circle text-success" data-toggle="tooltip" data-placement="bottom" title="Form completed!"></i> &nbsp;Target Client List for Immunization and Nutrition Service for Infants Age 0-11 Months Old and Children Age 12 Months Old.</h6>
                    <?php endif; ?>
                   
                </div>
                <div class="col-sm-12 col-lg-1">
                    <h6 class="m-0 font-weight-bold text-white">( 1/4 )</h6>
                </div>
            </div>

        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12 border-custom">
                    <div class="user p-5">
                        <h6 class="mb-3"><Strong>Date of Registration: <span
                                    class="text-primary"><?= date("m-d-Y / h-A",strtotime($patient->timestamp)); ?></span></Strong>
                        </h6>
                        <div class="form-group row">
                            <div class="col-sm-12 mb-2">

                                <small><Strong>Name of Child</Strong></small>

                            </div>
                            <div class="col-sm-5 mb-3 mb-sm-0">

                                <div class="md-form mb-0">
                                    <input type="text" name="fname" class="form-control" autocomplete="off"
                                        value="<?= $patient->firstname; ?>" disabled>
                                    <label>First Name (Pangalan)</label>
                                </div>

                            </div>
                            <div class="col-sm-5 ">
                                <div class="md-form">
                                    <input type="text" id="inputDisabledEx" name="lname" class="form-control"
                                        value="<?= $patient->lastname; ?>" disabled>
                                    <label for="inputDisabledEx" class="disabled">Last Name (Apelyisdo)</label>
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="md-form">
                                    <input type="text" id="inputDisabledEx" name="mname" class="form-control"
                                        value="<?= $patient->middlename; ?>" disabled>
                                    <label for="inputDisabledEx" class="disabled">Middlename</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">

                            <div class="col-sm-6 ">
                                <small>Sex (Kasarian)</small>
                                <select name="gender" id="gender" class="browser-default custom-select mb-3" disabled>
                                    <option value="">--select gender--</option>
                                    <option value="male" <?php if($patient->gender == "male"){ echo "selected"; } ?>>
                                        male</option>
                                    <option value="female"
                                        <?php if($patient->gender == "female"){ echo "selected"; } ?>>female</option>
                                </select>
                            </div>
                            <div class="col-sm-6 mb-3 mb-sm-0">

                                <div class="md-form">
                                    <input type="date" id="inputDisabledEx" name="bdate" class="form-control"
                                        value="<?= $patient->birthdate; ?>" disabled>
                                    <label for="inputDisabledEx" class="disabled">Birth date (Kapanganakan)</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="md-form">
                                <input type="text" id="inputDisabledEx" name="mothersname" class="form-control"
                                    value="<?= $patient->mothersname; ?>" disabled>
                                <label for="inputDisabledEx" class="disabled">Complete Name of Mother</label>
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="md-form">
                                <input type="text" id="inputDisabledEx" name="address" class="form-control mt-5"
                                    value="<?= $patient->address; ?>" disabled>
                                <label for="inputDisabledEx" class="disabled">Complete Address</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <div class="md-form">
                                    <input type="text" id="inputDisabledEx" name="facilitycode" class="form-control "
                                        value="<?= $patient->facilitycode; ?>" disabled>
                                    <label for="inputDisabledEx" class="disabled">Family Serial Number</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <small>SE Status</small>

                                <select name="sestatus" id="sestatus" class="browser-default custom-select" disabled>
                                    <option value="">--select status--</option>
                                    <option value="nhts" <?php if($patient->se_status == "nhts"){ echo "selected"; } ?>>
                                        NHTS</option>
                                    <option value="non-nhts"
                                        <?php if($patient->se_status == "non-nhts"){ echo "selected"; } ?>>Non-NHTS
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <small>Child Protected at Birth (CPAB) <br>
                                (count should be consistent with Maternal TCL Livebirths) <br>
                                Check the box.
                            </small>
                        </div>
                        <div class="form-group">
                            <input class="form-check-input ml-1" type="checkbox" name="first_time" id="first_time"
                                disabled <?php if($patient->first_time == "on"){ echo "checked"; } ?>>
                            <small class="ml-4"><strong>TT2/Td2 given to the mother a month prior to delivery (for
                                    mothers pregnant
                                    for the first time)</strong></small>
                        </div>
                        <div class="form-group">
                            <input class="form-check-input ml-1" type="checkbox" name="delivery" id="delivery" disabled
                                <?php if($patient->delivery == "on"){ echo "checked"; } ?>>
                            <small class="ml-4"><strong>TT3/Td3 to TT5/Td5 (or TT1/Td1 to TT5/Td5) given to the mother a
                                    month prior to delivery (for mothers pregnant
                                    for the first time)</strong></small>
                        </div>
                        <div class="form-group">
                            <!-- <p><strong>Total: </strong></p> -->

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <input type="hidden" name="pass_id" value="<?= $patient_id; ?>">
    <input type="hidden" name="form_one">
    <!-- <button type="button" class="btn btn-custom btn-submit-bottom mb-3"><i class="fas fa-file"></i> &nbsp; Save changes</button> -->
    <button type="button" class="btn btn-custom btn-submit-bottom mb-3" name="edit" id="form_one_btn_edit"><i
            class="fas fa-pen"></i> &nbsp; Edit</button>
    <button type="submit" class="btn btn-custom-2 btn-submit-bottom mb-3" id="form_one_btn_save" style="display:none;"
        name="save"><i class="fas fa-paper-plane"></i> &nbsp; Save Changes</button>
</form>

