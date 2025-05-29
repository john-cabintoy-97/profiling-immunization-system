 <!-- Logout Modal-->
 <div class="modal fade" id="userlogoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header  bg-custom text-white">
                 <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                 <button class="close text-white" type="button" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">×</span>
                 </button>
             </div>
             <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
             <div class="modal-footer">
                 <button class="btn " type="button" data-dismiss="modal">Cancel</button>
                 <a class="btn btn-danger"
                     href="logout.php?user=<?= $_SESSION['profiling_immunization_users_id']; ?>">Logout</a>
             </div>
         </div>
     </div>
 </div>
 <!-- Logout staff Modal-->
 <div class="modal fade" id="stafflogoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header  bg-custom text-white">
                 <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                 <button class="close text-white" type="button" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">×</span>
                 </button>
             </div>
             <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
             <div class="modal-footer">
                 <button class="btn " type="button" data-dismiss="modal">Cancel</button>
                 <a class="btn btn-danger"
                     href="logout.php?user=<?= $_SESSION['profiling_immunization_staff_id']; ?>">Logout</a>
             </div>
         </div>
     </div>
 </div>
 <!-- Logout admin Modal-->
 <div class="modal fade" id="adminlogoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header  bg-custom text-white">
                 <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                 <button class="close text-white" type="button" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">×</span>
                 </button>
             </div>
             <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
             <div class="modal-footer">
                 <button class="btn " type="button" data-dismiss="modal">Cancel</button>
                 <a class="btn btn-danger"
                     href="logout.php?user=<?= $_SESSION['profiling_immunization_admin_id']; ?>">Logout</a>
             </div>
         </div>
     </div>
 </div>
 <?php $staff_pending = $controller->getAllstaffPending(); ?>
 <!-- staff pending list -->
 <div class="modal fade" id="pendingStaffModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
     <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header bg-custom text-white">
                 <h5 class="modal-title" id="exampleModalLabel">Pending List</h5>
                 <button class="close text-white" type="button" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">×</span>
                 </button>
             </div>
             <div class="modal-body">
                 <?php if(empty($staff_pending)): ?>
                 <div class="text-center text-danger">
                     No pending records to show.
                 </div>
                 <?php else: ?>
                 <table class="table">
                     <thead>
                         <tr>
                             <th scope="col">#</th>
                             <th scope="col">Name</th>
                             <th scope="col">Email</th>
                             <th scope="col">Action</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php  $counter = 1; ?>
                         <?php foreach($staff_pending as $pending_list): ?>

                         <tr>
                             <th scope="row"><?= $counter++; ?></th>
                             <td><?= $pending_list->firstname; ?></td>
                             <td><?= $pending_list->email; ?></td>
                             <td>
                                 <div class="d-flex justify-items-center">
                                     <button class="btn btn-warning btn-sm text-whit mr-2" onclick="approved(this)"
                                         value="<?= $pending_list->users_id; ?>">Approved</button>
                                     <button class="btn btn-danger btn-sm text-white  mr-2" onclick="declined(this)"
                                         value="<?= $pending_list->users_id; ?>">Declined</button>
                                 </div>
                             </td>

                         </tr>
                         <?php endforeach; ?>
                     </tbody>



                 </table>
                 <?php endif; ?>

             </div>


         </div>
     </div>
 </div>
 <!-- individual modal insert -->
 <div class="modal fade" id="individualModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header bg-custom text-white">
                 <h5 class="modal-title" id="exampleModalLabel">Individual Treatment Form</h5>
                 <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <form method="post" class="p-3 individualmodal">
                     <div class="row">
                         <div class="col-lg-12 ">
                             <small><strong>#1 PATIENT INFORMATION (IMPORMASYON NG PASYENTE)</strong></small>
                         </div>
                         <div class="col-lg-12">
                             <div class="form-group row">
                                 <div class="col-sm-12 mb-3 mb-sm-0 row">
                                     <div class="col-sm-6">
                                         <div class="md-form mb-0">
                                             <input type="text" name="lname" class="form-control" autocomplete="off"
                                                 value="&nbsp;" readonly>
                                             <label>Last Name (Apelyido)</label>
                                         </div>
                                     </div>
                                     <div class="col-sm-6">
                                         <div class="md-form mb-0">
                                             <input type="text" name="fname" class="form-control" autocomplete="off"
                                                 value="&nbsp;" readonly>
                                             <label>First Name (Pangalan)</label>
                                         </div>
                                     </div>
                                     <div class="col-sm-6">
                                         <div class="md-form mb-0">
                                             <input type="text" name="mname" class="form-control" autocomplete="off"
                                                 value="&nbsp;" readonly>
                                             <label>Middle Name (Gitnang Pangalan)</label>
                                         </div>
                                     </div>
                                     <div class="col-sm-6">
                                         <div class="md-form mb-0">
                                             <input type="text" name="suffix" class="form-control" autocomplete="off"
                                                 value="&nbsp;" readonly>
                                             <label>Suffix</label>
                                         </div>
                                     </div>
                                 </div>

                                 <div class="col-sm-12">
                                     <div class="md-form mb-0">
                                         <input type="text" name="age" class="form-control" autocomplete="off" required>
                                         <label>Age (Edad)</label>
                                     </div>
                                 </div>
                                 <div class="col-sm-12">
                                     <div class="md-form mb-4">
                                         <input type="text" name="address" class="form-control" autocomplete="off"
                                             value="&nbsp;" readonly>
                                         <label>Residential Address (Tirahan)</label>
                                     </div>
                                 </div>
                                 <hr>
                                 <div class="col-sm-12 mb-3">
                                     <small><strong>#2 FOR CHU /RHU PERSONNEL ONLY</strong></small>
                                 </div>
                                 <div class="col-sm-12">
                                     <small>Mode of transaction</small>
                                     <select name="modeoftransaction" class="browser-default custom-select mb-3">
                                         <option value="">--select mode--</option>
                                         <option value="walk-in" selected>Walk-in</option>
                                         <option value="visited">Visited</option>
                                         <option value="referral">Referral</option>
                                     </select>
                                 </div>
                                 <div class="col-sm-12">
                                     <div class="md-form mb-4">
                                         <input type="date" name="dateofconsultation" class="form-control"
                                             autocomplete="off" required>
                                         <label>Date of Consultation</label>
                                     </div>
                                 </div>
                                 <div class="col-sm-12">
                                     <div class="md-form mb-4">
                                         <input type="time" name="consultationtime" class="form-control"
                                             autocomplete="off" required>
                                         <label>Consultation Time</label>
                                     </div>
                                 </div>
                                 <div class="col-sm-12 row">
                                     <div class="col">
                                         <div class="md-form mb-4">
                                             <input type="text" name="bloodpressure" class="form-control"
                                                 autocomplete="off">
                                             <label>Blood Pressure</label>
                                         </div>
                                     </div>
                                     <div class="col">
                                         <div class="md-form mb-4">
                                             <input type="text" name="temperature" class="form-control"
                                                 autocomplete="off" required>
                                             <label>Temperature</label>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-sm-12 row">
                                     <div class="col">
                                         <div class="md-form mb-4">
                                             <input type="text" name="height" class="form-control" autocomplete="off"
                                                 required>
                                             <label>Height (cm)</label>
                                         </div>
                                     </div>
                                     <div class="col">
                                         <div class="md-form mb-4">
                                             <input type="text" name="weight" class="form-control" autocomplete="off"
                                                 required>
                                             <label>Weight (kg)</label>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-sm-12">
                                     <div class="md-form mb-4">
                                         <input type="text" name="nameattendingprovider" class="form-control"
                                             autocomplete="off" value="&nbsp;">
                                         <label>Name of Attending Provider</label>
                                     </div>
                                 </div>
                                 <hr>
                                 <div class="col-sm-12">
                                     <small>Nature of Visit</small>
                                     <select name="natureofvisit" class="browser-default custom-select mb-3" required>
                                         <option value="">--select option--</option>
                                         <option value="new-consultation-case">New Consultation/Case</option>
                                         <option value="new-admission">New Admission (Transferee)</option>
                                         <option value="follow-up-visit">Follow-up visit</option>
                                     </select>
                                 </div>
                                 <div class="col-sm-12">
                                     <small>Type of Consultation / Purpose of visit</small>
                                     <select name="typeofconsultationpurposeofvisit"
                                         class="browser-default custom-select mb-3">
                                         <option value="">--select option--</option>
                                         <option value="general">General</option>
                                         <option value="prenatal">Prenatal</option>
                                         <option value="dental-care">Dental Care</option>
                                         <option value="child-care">Child Care</option>
                                         <option value="child-nutrition">Child Nutrition</option>
                                         <option value="injury">Injury</option>
                                         <option value="adult-immunization">Adult Immunization</option>
                                         <option value="family-planning">Family Planning</option>
                                         <option value="postpartum">Postpartum</option>
                                         <option value="tuberculosis">Tuberculosis</option>
                                         <option value="child-immunization" selected>Child Immunization</option>
                                         <option value="sick-children">Sick Children</option>
                                         <option value="firecracker-injury">Firecracker Injury</option>
                                     </select>
                                 </div>
                                 <div class="col-sm-12 row">
                                     <div class="col-lg-12">
                                         <small>For REFERRAL Transaction only/</small>
                                     </div>
                                     <div class="col-lg-6">
                                         <div class="md-form mb-4">
                                             <input type="text" name="refferedfrom" class="form-control"
                                                 autocomplete="off" value="&nbsp;">
                                             <label>REFERRED FROM</label>
                                         </div>
                                     </div>
                                     <div class="col-lg-6">
                                         <div class="md-form mb-4">
                                             <input type="text" name="refferedto" class="form-control"
                                                 autocomplete="off" value="&nbsp;">
                                             <label>REFERRED TO</label>
                                         </div>
                                     </div>
                                     <div class="col-lg-12">
                                         <div class="md-form">
                                             <textarea name="reasonforreferral" class="md-textarea form-control"
                                                 rows="2">&nbsp;</textarea>
                                             <label for="form7">Reason(s) for Referral</label>
                                         </div>
                                     </div>
                                     <div class="col-lg-12">
                                         <div class="md-form mb-4">
                                             <input type="text" name="refferedby" class="form-control"
                                                 autocomplete="off" value="&nbsp;">
                                             <label>Referred by</label>
                                         </div>
                                     </div>
                                     <div class="col-lg-12">
                                         <div class="md-form">
                                             <textarea name="cheifcomplaints" class="md-textarea form-control"
                                                 rows="2">&nbsp;</textarea>
                                             <label for="form7">Chief Complaints</label>
                                         </div>
                                     </div>
                                     <div class="col-lg-12">
                                         <div class="md-form">
                                             <textarea name="diagnosis" class="md-textarea form-control" required
                                                 rows="2"></textarea>
                                             <label for="form7">Diagnosis</label>
                                         </div>
                                     </div>
                                     <div class="col-lg-12 row">
                                         <div class="col-lg-12">
                                             <div class="md-form">
                                                 <textarea name="medicaltreatment" class="md-textarea form-control"
                                                     rows="2">&nbsp;</textarea>
                                                 <label for="form7">Medical / Treatment </label>
                                             </div>
                                         </div>
                                         <div class="col-lg-12">
                                             <div class="md-form">
                                                 <input type="text" name="nameofhealthprovider" class="form-control"
                                                     autocomplete="off" value="&nbsp;">
                                                 <label for="form7">Name of Health Care Provider</label>
                                             </div>
                                         </div>
                                     </div>
                                     <div class="col-lg-12 row">
                                         <div class="col-lg-12">
                                             <div class="md-form">
                                                 <textarea name="labfindingsimpression" class="md-textarea form-control"
                                                     rows="2">&nbsp;</textarea>
                                                 <label for="form7">Labaratory Findings / Impression</label>
                                             </div>
                                         </div>
                                         <div class="col-lg-12">
                                             <div class="md-form">
                                                 <input type="text" name="performedlabtest" class="form-control"
                                                     autocomplete="off" value="&nbsp;">
                                                 <label for="form7">Performed Laboratory Test</label>
                                             </div>
                                         </div>



                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <input type="hidden" name="patient_id" class="form-control" autocomplete="off">
                     <input type="hidden" name="individual_form_insert">
             </div>
             <div class="modal-footer">
                 <button class="btn " type="button" data-dismiss="modal">Cancel</button>
                 <button type="submit" class="btn btn-success">Submit</button>
             </div>
             </form>
         </div>
     </div>
 </div>
 <!-- sms / schedule modal -->
 <div class="modal fade" id="scheduleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header bg-custom text-white">
                 <h5 class="modal-title" id="exampleModalLabel">Schedule</h5>
                 <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>

             <div class="modal-body">
                 <div id="accordion">
                     <div class="card">
                         <div class="card-header" id="headingOne">
                             <div class="d-flex justify-content-between">
                                 <h5 class="mb-0">
                                     <button class="btn btn-link" type="button" data-toggle="collapse"
                                         data-target="#smsCollapse" aria-expanded="true" aria-controls="smsCollapse">
                                         SEND SCHEDULE IN PATIENT USING SMS
                                     </button>
                                 </h5>
                                 <h5 class="mb-0">
                                     <button class="btn btn-link collapsed" data-toggle="collapse"
                                         data-target="#notifCollapse" type="button" aria-expanded="false"
                                         aria-controls="notifCollapse">
                                         POST SCHEDULE IN PATIENT TIMELINE
                                     </button>
                                 </h5>
                             </div>
                         </div>
                         <!-- sms -->
                         <form method="post" class="smsModalForm">
                             <div id="smsCollapse" class="collapse show" aria-labelledby="headingOne"
                                 data-parent="#accordion">
                                 <div class="card-body">
                                     <div class="row">
                                         <div class="col-lg-12">
                                             <small>From:</small>
                                             <?php if(isset($_SESSION['profiling_immunization_staff_token'])): ?>
                                             <div class="md-form mb-0">
                                                 <input type="text" name="sender_name" class="form-control"
                                                     autocomplete="off"
                                                     value="<?php if(isset($_SESSION['profiling_immunization_staff_token'])){ echo $_SESSION['profiling_immunization_staff_token']; } ?>"
                                                     required>
                                                 <label>Name of Health Care Provider</label>

                                             </div>
                                             <?php else: ?>
                                             <div class="md-form mb-0">
                                                 <input type="text" name="sender_name" class="form-control"
                                                     autocomplete="off"
                                                     value="<?php if(isset($_SESSION['profiling_immunization_admin_token'])){ echo "admin"; } ?>"
                                                     required>
                                                 <label>Name of Health Care Provider</label>

                                             </div>
                                             <?php endif; ?>

                                         </div>
                                         <div class="col-lg-12">
                                             <small>To:</small>
                                             <div class="md-form mb-0">
                                                 <input type="text" name="contactnumber" class="form-control"
                                                     autocomplete="off" value="&nbsp;" required>
                                                 <label>Contact Number ex. 091000*****</label>

                                             </div>
                                         </div>
                                         <div class="col-lg-12">

                                             <div class="md-form mb-0">
                                                 <input type="text" name="childname" class="form-control"
                                                     autocomplete="off" value="&nbsp;" required>
                                                 <label>Child name</label>

                                             </div>
                                         </div>

                                         <div class="col-lg-12 row">
                                             <div class="col-lg-6">
                                                 <small>Schedule Time:</small>
                                                 <div class="md-form mb-0">
                                                     <input type="time" name="schedule_time" class="form-control"
                                                         autocomplete="off" required>
                                                     <label></label>
                                                 </div>
                                             </div>
                                             <div class="col-lg-6">
                                                 <small>Schedule Date:</small>
                                                 <div class="md-form mb-0">
                                                     <input type="date" name="schedule_date" class="form-control"
                                                         autocomplete="off" required>
                                                     <label></label>

                                                 </div>
                                             </div>
                                          

                                         </div>

                                         <!-- <div class="col-lg-12">
                                             <small>Body:</small>
                                             <div class="md-form">
                                                 <textarea name="body" class="md-textarea form-control"
                                                     rows="2"></textarea>
                                                 <label for="form7">Optional</label>
                                             </div>
                                         </div> -->
                                         <input type="hidden" name="pass_id">
                                         <input type="hidden" name="sms">
                                         <div class="col-lg-12">
                                             <br>
                                             <button type="submit" name="smsbtn" class="btn btn-success "><i
                                                     class="fas fa-paper-plane"></i> &nbsp;SEND MESSAGE</button>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </form>
                         <!-- post -->
                         <form method="post" class="notifModalForm">
                             <div id="notifCollapse" class="collapse" aria-labelledby="headingOne"
                                 data-parent="#accordion">
                                 <div class="card-body">
                                     <div class="row">
                                         <div class="col-lg-12">
                                             <small>From:</small>
                                             <?php if(isset($_SESSION['profiling_immunization_staff_token'])): ?>
                                             <div class="md-form mb-0">
                                                 <input type="text" name="sender_name" class="form-control"
                                                     autocomplete="off"
                                                     value="<?php if(isset($_SESSION['profiling_immunization_staff_token'])){ echo $_SESSION['profiling_immunization_staff_token']; } ?>"
                                                     required>
                                                 <label>Name of Health Care Provider</label>

                                             </div>
                                             <?php else: ?>
                                             <div class="md-form mb-0">
                                                 <input type="text" name="sender_name" class="form-control"
                                                     autocomplete="off"
                                                     value="<?php if(isset($_SESSION['profiling_immunization_admin_token'])){ echo "admin"; } ?>"
                                                     required>
                                                 <label>Name of Health Care Provider</label>

                                             </div>
                                             <?php endif; ?>
                                         </div>
                                         <div class="col-lg-12">

                                             <div class="md-form mb-0">
                                                 <input type="text" name="childname" class="form-control"
                                                     autocomplete="off" value="&nbsp;">
                                                 <label>Child name</label>

                                             </div>
                                         </div>

                                         <div class="col-lg-12 row">
                                             <div class="col-lg-6">
                                                 <small>Schedule Time:</small>
                                                 <div class="md-form mb-0">
                                                     <input type="time" name="schedule_time" class="form-control"
                                                         autocomplete="off" required>
                                                     <label></label>
                                                 </div>
                                             </div>
                                             <div class="col-lg-6">
                                                 <small>Schedule Date:</small>
                                                 <div class="md-form mb-0">
                                                     <input type="date" name="schedule_date" class="form-control"
                                                         autocomplete="off" required>
                                                     <label></label>

                                                 </div>
                                             </div>
                                            
                                         </div>
                                         <input type="hidden" name="notif">
                                         <input type="hidden" name="pass_id">
                                         <input type="hidden" name="users_id">
                                         <div class="col-lg-12">
                                             <br>
                                             <button type="submit" name="postbtn" class="btn btn-success "><i
                                                     class="fas fa-paper-plane"></i> &nbsp;POST SCHEDULE</button>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </form>
                     </div>

                 </div>

             </div>


         </div>
     </div>
 </div>

 <!-- user delete -->
 <div class="modal fade" id="userDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header bg-custom text-white">
                 <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-trash"></i></h5>
                 <button class="close text-white" type="button" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">×</span>
                 </button>
             </div>
             <div class="modal-body">
                 <h5>Sigurado ka bang gusto mong tanggalin ang user na ito at lahat ng impormasyon niya?</h5>
                 <hr>
                 <p><strong>Mga impormasyon ng user</strong></p>
                 <p>Enrollement Record: <span id="delete_enroll_status"></span></p>
                 <!-- <p>Individual Record: <span id="delete_individual_status" class="text-danger"></span></p> -->
                 <hr>
                 <form method="post" class="userModalDelete">
                     <div class="md-form pwd-custom " id="show_hide_password1">
                         <input type="password" name="admin_pass" class="form-control js-password-input"
                             autocomplete="off" required>
                         <label>Enter admin password</label>
                         <span toggle="#password" class="field-icon"><i class="far fa-eye-slash"></i></span>
                     </div>
             </div>

             <input type="hidden" name="users_id">
             <div class="modal-footer">
                 <button class="btn " type="button" data-dismiss="modal">Cancel</button>
                 <button class="btn btn-danger" type="submit">Delete</button>
             </div>
             </form>
         </div>
     </div>
 </div>

 <!-- staff delete -->
 <div class="modal fade" id="staffDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header bg-custom text-white">
                 <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-trash"></i></h5>
                 <button class="close text-white" type="button" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">×</span>
                 </button>
             </div>
             <div class="modal-body">
                 <h5>Sigurado ka bang gusto mong tanggalin ang kawani na ito?</h5>
                 <hr>
                 <form method="post" class="staffModalDelete">
                     <div class="md-form pwd-custom " id="show_hide_password1">
                         <input type="password" name="admin_pass" class="form-control js-password-input"
                             autocomplete="off" required>
                         <label>Enter admin password</label>
                         <span toggle="#password" class="field-icon"><i class="far fa-eye-slash"></i></span>
                     </div>
             </div>

             <input type="hidden" name="users_id">
             <div class="modal-footer">
                 <button class="btn " type="button" data-dismiss="modal">Cancel</button>
                 <button class="btn btn-danger" type="submit">Delete</button>
             </div>
             </form>
         </div>
     </div>
 </div>

 <?php 
 if(isset($_SESSION['profiling_immunization_admin_id'])){
    $user_profile = $controller->getUserById("SELECT * FROM users WHERE users_id = :users_id", $_SESSION['profiling_immunization_admin_id']); 
 } else if(isset($_SESSION['profiling_immunization_staff_id'])){
    $user_profile = $controller->getUserById("SELECT * FROM users WHERE users_id = :users_id", $_SESSION['profiling_immunization_staff_id']); 
 } else {
    $user_profile = $controller->getUserById("SELECT * FROM users WHERE users_id = :users_id", $_SESSION['profiling_immunization_users_id']); 
 }

 ?>
 <!-- profile -->
 <div class="modal fade" id="userProfileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header bg-custom text-white">
                 <h5 class="modal-title" id="exampleModalLabel">Profile Management</h5>
                 <button class="close text-white" type="button" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">×</span>
                 </button>
             </div>
             <div class="modal-body">

                 <form method="post" class="profile_edit">
                     <div class="row p-3">

                         <div class="col-sm-12">
                             <div class="md-form mb-0">
                                 <input type="text" name="fname" class="form-control" autocomplete="off"
                                     value="<?= $user_profile->firstname; ?>" required disabled>
                                 <label>Firstname</label>

                             </div>
                         </div>
                         <div class="col-sm-12">
                             <div class="md-form mb-0">
                                 <input type="text" name="lname" class="form-control" autocomplete="off"
                                     value="<?= $user_profile->lastname; ?>" required disabled>
                                 <label>Lastname</label>

                             </div>
                         </div>
                         <div class="col-sm-12">
                             <div class="md-form mb-0">
                                 <input type="email" name="email" class="form-control mb-3" autocomplete="off"
                                     value="<?= $user_profile->email; ?>" required disabled>
                                 <label>Email</label>
                             </div>
                         </div>
                         <div class="col-sm-12 p-0">
                             <input type="hidden" name="profile_method_edit">
                             <button type="button" class="btn bg-custom text-white form-control" name="profile_edit_btn"
                                 onclick="profileEdit()">EDIT</button>
                             <button type="submit" class="btn bg-success text-white form-control"
                                 name="profile_submit_btn" style="display:none;">SUBMIT</button>

                             <?php if(isset($_SESSION['profiling_immunization_admin_id'])): ?>
                             <button type="button" class="btn bg-danger text-white form-control"
                                 onclick="profileAdminDelete(<?= $user_profile->users_id; ?>);">Delete Account</button>
                             <?php elseif(!isset($_SESSION['profiling_immunization_users_id'])): ?>
                             <button type="button" class="btn bg-danger text-white form-control"
                                 onclick="profileDelete(<?= $user_profile->users_id; ?>);">Delete Account</button>
                             <?php endif;?>
                         </div>

                     </div>
                 </form>
                 <form method="post" class="change_password_form">
                     <div class="row">
                         <div class="col-sm-12 p-0">

                             <button class="btn btn-link form-control" type="button" data-toggle="collapse"
                                 data-target="#collapseChangepassword" aria-expanded="false"
                                 aria-controls="collapseChangepassword">
                                 Change Password
                             </button>
                             <div class="collapse" id="collapseChangepassword">
                                 <div class="card card-body">

                                     <div class="row">
                                         <div class="col-sm-12">
                                             <div class="md-form pwd-custom " id="show_hide_password1">
                                                 <input type="password" name="old_pass"
                                                     class="form-control js-password-input" autocomplete="off">
                                                 <label>Old password</label>
                                                 <span toggle="#password" class="field-icon"><i
                                                         class="far fa-eye-slash"></i></span>
                                             </div>
                                         </div>
                                         <div class="col-sm-12">
                                             <div class="md-form pwd-custom " id="show_hide_password">
                                                 <input type="password" name="new_pass"
                                                     class="form-control js-password-input" autocomplete="off">
                                                 <label>New password</label>
                                                 <span toggle="#password" class="field-icon"><i
                                                         class="far fa-eye-slash"></i></span>
                                             </div>
                                         </div>
                                         <div class="col-sm-12">
                                             <div class="strength-meter-message">
                                                 <span class="js-strength-meter-copy strength-meter-copy"></span>
                                             </div>
                                         </div>
                                         <div class="col-sm-12">
                                             <input type="hidden" name="email" value="<?= $user_profile->email; ?>">
                                             <input type="hidden" name="change_pass_btn_form">
                                             <button type="submit" name="change_pass_btn"
                                                 class="btn btn-danger form-control" disabled>Change
                                                 Password</button>
                                         </div>
                                     </div>

                                 </div>
                             </div>
                         </div>
                     </div>
                 </form>
             </div>

         </div>
     </div>
 </div>
 <!-- change password by admin -->
 <div class="modal fade" id="userChangePasswordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header bg-warning text-white">
                 <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-key"></i>&nbsp; <span
                         id="change_name_pass"></span></h5>
                 <button class="close text-white" type="button" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">×</span>
                 </button>
             </div>
             <div class="modal-body">
                 <form method="post" class="changepassbyadminform">
                     <div class="row">
                         <!-- <div class="col-sm-12">
                             <p>Change <strong><span class="text-danger" name="user_name"></span></strong> password?</p>
                         </div> -->
                         <div class="col-sm-12">
                             <div class="md-form pwd-custom " id="show_hide_password1">
                                 <input type="password" name="admin_pass" class="form-control js-password-input"
                                     autocomplete="off">
                                 <label>Enter admin password</label>
                                 <span toggle="#password" class="field-icon"><i class="far fa-eye-slash"></i></span>
                             </div>
                         </div>
                         <div class="col-sm-12">
                             <div class="md-form pwd-custom " id="show_hide_password">
                                 <input type="password" name="new_user_pass" class="form-control js-password-input"
                                     autocomplete="off">
                                 <label>New user password</label>
                                 <span toggle="#password" class="field-icon"><i class="far fa-eye-slash"></i></span>
                             </div>
                         </div>
                         <div class="col-sm-12">
                             <input type="hidden" name="pass_id">
                             <input type="hidden" name="change_pass_btn_form">
                             <button type="submit" name="change_pass_btn" class="btn btn-danger form-control"
                                 disabled>Change
                                 Password</button>
                         </div>
                     </div>

                 </form>
             </div>

         </div>
     </div>
 </div>
 <!-- loading style -->
 <div class="loading">
     <svg class="spinner" width="65px" height="65px" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg">
         <circle class="path" fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="30"></circle>
     </svg>
 </div>