<?php 
    $vaccines = $this->vaccines;
?>

<form class="form-standard" id="addPatientForm">
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 mt-4">
            <div class=" clearfix">
                <div class="float-left">
                    <h5 class="float-left"> Add Patient</h5>
                </div>
                <div class="float-right">
                    <button class="btn btn-standard-success btn-sm" form="addPatientForm"><i class="pe-7s-paper-plane pe-lg"></i> <span>Submit</span></button>
                </div>
            </div><hr>
            <div class="card card-standard">
                <div class="card-body">
                    <h6 class="mb-4" style="font-weight: 700">Patient Record</h6>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Patient Name</label>
                        <div class="col-sm-10">
                            <input required type="text" class="form-control" name="patient_name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                            <input required type="text" class="form-control" name="address">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Gender</label>
                        <div class="col-sm-4">
                            <select required class="form-control" name="gender">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                        <label for="inputPassword" class="col-sm-1 col-form-label">Birthday</label>
                        <div class="col-sm-5">
                            <input required type="date" class="form-control" name="birthday" max="<?=date('Y-m-d')?>">
                        </div>
                    </div> 
                    <hr>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Father's Name</label>
                        <div class="col-sm-4">
                            <input required type="text" class="form-control" name="father_name">
                        </div>
                        <label for="inputPassword" class="col-sm-1 col-form-label">Occupation</label>
                        <div class="col-sm-2">
                            <input required type="text" class="form-control" name="father_occupation">
                        </div>
                        <label for="inputPassword" class="col-sm-1 col-form-label">Contact No.</label>
                        <div class="col-sm-2">
                            <input required type="text" class="form-control" name="father_telephone">
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Mother's Name</label>
                        <div class="col-sm-4">
                            <input required type="text" class="form-control" name="mother_name">
                        </div>
                        <label for="inputPassword" class="col-sm-1 col-form-label">Occupation</label>
                        <div class="col-sm-2">
                            <input required type="text" class="form-control" class="form-control" name="mother_occupation">
                        </div>
                        <label for="inputPassword" class="col-sm-1 col-form-label">Contact No.</label>
                        <div class="col-sm-2">
                            <input required type="text" class="form-control" name="mother_telephone">
                        </div>
                    </div> <hr>
                    <label>In case of emergency</label>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Guardian's Name</label>
                        <div class="col-sm-5">
                            <input required type="text" class="form-control" name="guardian_name">
                        </div>
                        <label for="inputPassword" class="col-sm-1 col-form-label">Contact No.</label>
                        <div class="col-sm-4">
                            <input required type="text" class="form-control" name="contact_no">
                        </div>
                    </div> 
                    <h6 class="mb-4 mt-5" style="font-weight: 700">Birth History</h6>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-1 col-form-label">Term</label>
                        <div class="col-sm-1">
                            <input type="text" class="form-control" name="term">
                        </div>
                        <label for="inputPassword" class="col-sm-1 col-form-label">No. Of Months</label>
                        <div class="col-sm-1">
                            <input type="text" class="form-control" name="no_of_mos">
                        </div>
                        <label for="inputPassword" class="col-sm-1 col-form-label">Weeks</label>
                        <div class="col-sm-1">
                            <input type="text" class="form-control" name="weeks">
                        </div>
                        <label for="inputPassword" class="col-sm-1 col-form-label">Days</label>
                        <div class="col-sm-1">
                            <input type="text" class="form-control" name="days">
                        </div>
                        <label for="inputPassword" class="col-sm-1 col-form-label">Head Circumference</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="head_circumference" placeholder="cm">
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-1 col-form-label">Type of Delivery</label>
                        <div class="col-sm-5">
                            <select class="form-control" name="typeofdelivery">
                                <option value="" required selected>Select Type of Delivery</option>
                                <option value="normal">Normal</option>
                                <option value="cesarean">Cesarean</option>
                            </select>
                        </div>
                        <label for="inputPassword" class="col-sm-1 col-form-label">Chest Circumference</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="chest_circumference"
                            placeholder="cm">
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-1 col-form-label">Birth Weight</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" name="birth_weight" placeholder="kg">
                        </div>
                        <label for="inputPassword" class="col-sm-1 col-form-label">Birth Length</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" name="birth_length" placeholder="cm">
                        </div>
                        <label for="inputPassword" class="col-sm-1 col-form-label">Blood Type</label>
                        <div class="col-sm-1">
                            <select class="form-control" name="blood_type">
                                <option value="" required selected>Select Blood Type</option>
                                <option value="0+">0+</option>
                                <option value="0-">0-</option>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                            </select>
                        </div>
                        <label for="inputPassword" class="col-sm-1 col-form-label">Abdominal Circumference</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="abdominal_circumference" placeholder="cm">
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-1 col-form-label">Diagnosis Notes</label>
                        <div class="col-sm-5">
                            <input required type="text" class="form-control" name="diagnosis_notes">
                        </div>
                            <label for="inputPassword" class="col-sm-1 col-form-label">Medication Notes</label>
                        <div class="col-sm-5">
                            <input required type="text" class="form-control" name="medication_notes">
                        </div>
                    </div> 
                    <h6 class="mb-4 mt-5" style="font-weight: 700">Immunization Record</h6>
                    <div class="table-responsive">
                        <table class="table table-pad table-striped table-hover table-standard">
                            <thead>
                                <tr>
                                    <th><strong>Vaccine</strong></th>                  
                                    <th>1st</th>                   
                                    <th>2nd</th>                   
                                    <th>3rd</th>                   
                                    <th>Booster 1</th>                   
                                    <th>Booster 2</th>                   
                                    <th>Booster 3</th>                   
                                    <th>Reaction</th>                                                   
                                </tr>   
                            </thead>
                            <tbody>
                                <?php foreach ($vaccines as $key => $vaccine) : ?>
                                    <tr>
                                        <td class="text-standard">
                                            <strong><?=$vaccine['vaccine']?></strong>
                                        </td>      
                                        <td><input type="checkbox" name="1st[<?=$vaccine['id']?>]"></td>      
                                        <td><input type="checkbox" name="2nd[<?=$vaccine['id']?>]"></td>      
                                        <td><input type="checkbox" name="3rd[<?=$vaccine['id']?>]"></td>      
                                        <td><input type="checkbox" name="Booster_1[<?=$vaccine['id']?>]"></td>      
                                        <td><input type="checkbox" name="Booster_2[<?=$vaccine['id']?>]"></td>      
                                        <td><input type="checkbox" name="Booster_3[<?=$vaccine['id']?>]"></td>      
                                        <td><textarea class="form-control" name="reaction[<?=$vaccine['id']?>]" rows="2"></textarea></td>              
                                    </tr>
                                <?php endforeach;?> 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?=URL?>public/js/patient.js"></script>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 mt-4">
            <form class="form-standard form-add-visit" method="POST">
                <div class=" clearfix">
                    <div class="float-left">
                        <h5 class="float-left"> Follow-Up Visits</h5>
                    </div>
                    <div class="float-right">
                        <button type="button" class="btn btn-standard-success btn-add-line"><i class="pe-7s-plus pe-lg"></i> Add Line</button>
                    </div>
                </div><hr>
                <div class="card card-standard">
                    <div class="card-body">
                        <h6 style="font-weight: 700">Records</h6>
                        <div class="table-responsive">
                            <table id="table-visits" class="table table-pad table-striped table-hover table-standard">
                                <thead>
                                    <tr>
                                        <th>Date Visit</th>
                                        <th>Date Next Check-up</th>                  
                                        <!-- <th>Age</th>    -->                
                                        <th>Weight</th>                   
                                        <th>Height</th>                   
                                        <th>Diagnosis and Physician's Notes</th>                                     
                                    </tr>   
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input class="form-control" type="date" name="date_visit[]" required="required"></td> 
                                        <td><input class="form-control" type="date" name="date_nextvisit[]" required="required"></td>      
                                       <!--  <td><input class="form-control" type="number" name="age[]" required="required"></td>    -->   
                                        <td><input class="form-control" type="text" name="weight[]" required="required"></td>      
                                        <td><input class="form-control" type="text" name="height[]" required="required"></td>      
                                        <td><input class="form-control" type="text" name="diagnosis[]" required="required"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
             </form>
        </div>
    </div>
</div>
<script src="<?=URL?>public/js/follow_up.js"></script>

</form>