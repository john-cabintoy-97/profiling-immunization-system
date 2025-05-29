<?php  $user_id = $_SESSION['profiling_immunization_users_id']; ?>
<div class="card o-hidden border-0 shadow my-4">

    <div class="card-body p-0">
        <div class="card-header bg-custom py-3">
            <h6 class="m-0 font-weight-bold text-white">Patient
                Enrollment
                Record</h6>
        </div>
        <div class="form_patient_enroll">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-12">
                    <form method="POST" class="enrolled">
                        <div class="p-3">
                            <div class="row">

                                <div class="col-lg-6 border-custom">
                                    <div class="user p-2">
                                        <div class="form-group row">
                                            <div class="col-sm-12 mb-0 pb-0 ch-extra"><small>Child Name</small></div>
                                            <div class="col-sm-4 mb-3 mb-sm-0">
                                                <div class="md-form mb-0">
                                                
                                                    <input type="text" name="lname" class="form-control mb-3"
                                                        autocomplete="off" required>
                                                    <label>Last Name</label>
                                                </div>

                                            </div>
                                            <div class="col-sm-4">
                                                <div class="md-form mb-0">
                                                    <input type="text" name="fname" class="form-control mb-3"
                                                        autocomplete="off" required>
                                                    <label>First Name</label>
                                                </div>

                                            </div>
                                            <div class="col-sm-4">
                                                <div class="md-form mb-0">
                                                    <input type="text" name="mname" class="form-control mb-3"
                                                        autocomplete="off" required>
                                                    <label>Middle Name</label>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="form-group row">

                                            <div class="col-sm-6">
                                                <small>Sex (Kasarian)</small>
                                                <select name="gender"
                                                    class="form-control form-control-custom-0 form-select-lg mb-3"
                                                    required>
                                                    <option value="">--select gender--</option>
                                                    <option value="male">
                                                        Male</option>
                                                    <option value="female">
                                                        Female</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <div class="md-form mb-0">
                                                    <input type="date" name="bdate" class="form-control mb-3"
                                                        autocomplete="off" required>
                                                    <label> Birth date</label>
                                                </div>


                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="md-form mb-0">
                                                <input type="text" name="birthplace" class="form-control mb-3"
                                                    autocomplete="off" required>
                                                <label>Birthplace</label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <div class="md-form mb-0">
                                                    <input type="text" name="bloodtype" class="form-control mb-3"
                                                        autocomplete="off" required>
                                                    <label>Blood Type</label>
                                                </div>

                                            </div>
                                            <div class="col-sm-6">
                                                <div class="md-form mb-0">
                                                    <input type="text" name="spousename" class="form-control mb-3"
                                                        autocomplete="off" required>
                                                    <label>Spouse's Name</label>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <small>Civil Status</small>
                                                <select name="civilstatus"
                                                    class="form-control form-control-custom-0 form-select-lg" required>
                                                    <option value="">--select civil status--
                                                    </option>
                                                    <option value="single">
                                                        Single (Walang Asawa)
                                                    </option>
                                                    <option value="married">
                                                        Married (May Asawa)
                                                    </option>
                                                    <option value="widow">
                                                        Widow/er (Balo)</option>
                                                    <option value="annuled">
                                                        Annulled (Anulado)
                                                    </option>
                                                    <option value="separated">
                                                        Single (Separated)
                                                    </option>
                                                    <option value="co-habition">
                                                        Co-Habition
                                                        (Paninirahang)</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-6">

                                                <small>Educational Attainment</small>
                                                <select name="educationalattainment"
                                                    class="form-control form-control-custom-0 form-select-lg" required>
                                                    <option value="">--select educational
                                                        attainment--</option>
                                                    <option value="no formal education">
                                                        NO
                                                        Formal Education (Walang Pormal na Edukasyon) </option>
                                                    <option value="elementary">
                                                        Elementary (Elemnetarya)
                                                    </option>
                                                    <option value="high school">
                                                        High School (Hayskul)
                                                    </option>
                                                    <option value="college">
                                                        College (Kolehiyo) </option>
                                                    <option value="vocational">
                                                        Vocational (Bukasyonal)
                                                    </option>
                                                    <option value="post graduate">
                                                        Post Graduate
                                                    </option>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <small>Employment Status</small>
                                                <select name="employmentstatus"
                                                    class="form-control form-control-custom-0 form-select-lg" required>
                                                    <option value="">--select employment
                                                        Status--</option>
                                                    <option value="student">
                                                        Student (Estudyante) </option>
                                                    <option value="employed">
                                                        Employed (May Trabaho)
                                                    </option>
                                                    <option value="retired">
                                                        Retired (Retirado) </option>
                                                    <option value="none/unemployed">
                                                        None/Unemployed
                                                        (Kolehiyo) </option>
                                                </select>
                                            </div>
                                            <div class="col-sm-6">
                                                <small>Family Member</small>
                                                <select name="familymember"
                                                    class="form-control form-control-custom-0 form-select-lg" required>
                                                    <option value="">--select Family
                                                        member--</option>
                                                    <option value="father">
                                                        Father (Ama) </option>
                                                    <option value="mother">
                                                        Mother (Ina) </option>
                                                    <option value="son">
                                                        Son (Anak Na Lalaki) </option>
                                                    <option value="daughter">
                                                        Daughter (Anak Na Babae) </option>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <div class="md-form mb-0">
                                                <input type="text" name="facilitycode" class="form-control mb-3"
                                                    autocomplete="off">
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
                                                        autocomplete="off">
                                                    <label>Suffix</label>
                                                </div>

                                            </div>
                                            <div class="col-sm-8">
                                                <div class="md-form mb-0">
                                                    <input type="tel" name="contactnumber" class="form-control mb-3"
                                                        autocomplete="off" pattern="[0-9]{11}" required>
                                                    <label>Contact Number ex. 09518******</label>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <small>Pangalan
                                                sa pagkadalaga (para sa mga babaeng
                                                may-asawa)</small>
                                            <div class="md-form mb-0">

                                                <input type="text" name="mothersname" class="form-control mb-3"
                                                    autocomplete="off" required>
                                                <label>Mother's Name</label>
                                            </div>



                                        </div>
                                        <div class="form-group ">
                                            <div class="md-form mb-0">
                                                <input type="text" name="residentialAddress" class="form-control mb-3"
                                                    autocomplete="off" required>
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
                                                                value="yes" id="dswdnths1" required>
                                                            <label class="form-check-label" for="flexRadioDefault1">
                                                                Yes
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-check ">
                                                        <div class="my-2">
                                                            <input class="form-check-input" type="radio" name="dswdnhts"
                                                                value="no" id="dswdnths2">
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
                                                        autocomplete="off">
                                                    <label>Facility Household #</label>
                                                </div>

                                            </div>
                                            <div class="col-sm-4">
                                                <small>4Ps Member?</small>
                                                <div class="d-flex justify-content-start">
                                                    <div class="form-check pr-3">
                                                        <div class="my-2">
                                                            <input class="form-check-input" type="radio"
                                                                name="fourpsmember" id="fourpsmember1" value="yes" required>
                                                            <label class="form-check-label" for="flexRadioDefault1">
                                                                Yes
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-check ">
                                                        <div class="my-2">
                                                            <input class="form-check-input" type="radio"
                                                                name="fourpsmember" id="fourpsmember2" value="no">
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
                                                                id="phmember1" value="yes" required>
                                                            <label class="form-check-label" for="flexRadioDefault1">
                                                                Yes
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-check ">
                                                        <div class="my-2">
                                                            <input class="form-check-input" type="radio" name="phmember"
                                                                id="phmember2" value="no">
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
                                                    class="form-control form-control-custom-0">
                                                    <option value="">--select status type--</option>
                                                    <option value="member">
                                                        member</option>
                                                    <option value="dependent">
                                                        dependent</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="md-form mb-0">

                                                    <input type="text" name="phealthno" class="form-control mb-3"
                                                        autocomplete="off">
                                                <label>PhilHealth No.</label>
                                            </div>

                                            </div>
                                            </div>
                                            <div class=" form-group row">
                                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                                        <small>member, please
                                                            indicate
                                                            category</small>
                                                        <select name="membercategory"
                                                            class="form-control form-control-custom-0">
                                                            <option value="">--select indicate catergory--</option>
                                                            <option value="fe-private">
                                                                FE-Private</option>
                                                            <option value="fe-government">
                                                                FE-Government</option>
                                                            <option value="ie-private">
                                                                IE-Private</option>
                                                            <option value="others" id="other">
                                                                OTHERS: </option>
                                                        </select>
                                                        <div class="other-form mt-2">
                                                            <input type="hidden"
                                                                class="form-control form-control-custom">
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
                                                                        name="psbmember" id="psbmember1" value="yes" required>
                                                                    <label class="form-check-label"
                                                                        for="flexRadioDefault1">
                                                                        Yes
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="form-check ">
                                                                <div class="my-2">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="psbmember" id="psbmember2" value="no">
                                                                    <label class="form-check-label"
                                                                        for="flexRadioDefault1">
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
                                <input type="hidden" value="<?= $user_id; ?>" name="users_id">
                                <input type="hidden" name="patient_enrolled">
                                <button class="btn btn-custom mb-4 enrolled-btn" name="btn-enrolled"
                                    type="submit">Submit</button><br>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>