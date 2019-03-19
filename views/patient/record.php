<?php
    $patient = $this->patient;
    $vaccines = $this->vaccines;

?>
<style>
    .nav-standard{
        cursor: pointer!important;
        color: #007bff!important;
    }
    .nav-standard.active{
        color: #fff!important;
    }
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 mt-4">
            <div class="clearfix">
                <div class="float-left">
                    <h5 class="float-left"> Patient Information <a href="#" class="update-trigger"><i class="ti-pencil"></i></a></h5>
                </div>
                <div class="float-right">
                    <button class="btn btn-standard-success btn-sm btn-update d-none" form = "updatePatientForm"><i class="ti-pencil"></i> <span>Update</span></button>
                </div>
            </div><hr>
            <form class="form-standard" id="updatePatientForm">
                <div class="card card-standard">
                    <div class="card-body">
                        <h6 class="mb-4" style="font-weight: 700">Patient Record</h6>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Patient Name</label>
                            <div class="col-sm-10">
                                <input type="text" disabled class="form-control" name="patient_name" value="<?=$patient['patient_name']?>">
                                <input type="hidden" disabled class="form-control" name="patient_id" value="<?=$patient['id']?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Address</label>
                            <div class="col-sm-10">
                                <input type="text" disabled class="form-control" name="address" value="<?=$patient['address']?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Gender</label>
                            <div class="col-sm-4">
                                <input type="text" disabled class="form-control" value="<?=$patient['gender']?>" name="gender">
                            </div>
                            <label for="inputPassword" class="col-sm-1 col-form-label">Birthday</label>
                            <div class="col-sm-5">
                                <input type="text" disabled class="form-control" value="<?=$patient['birthday']?>" name="birthday" max="<?=date('Y-m-d')?>">
                            </div>
                        </div> 
                        <hr>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Father's Name</label>
                            <div class="col-sm-4">
                                <input type="text" disabled class="form-control" name="father_name" value="<?= !empty($patient['parent']) ? $patient['parent']['father_name'] : '' ?>">
                            </div>
                            <label for="inputPassword" class="col-sm-1 col-form-label">Occupation</label>
                            <div class="col-sm-2">
                                <input type="text" disabled class="form-control" name="father_occupation" value="<?= !empty($patient['parent']) ? $patient['parent']['father_occupation'] : '' ?>">
                            </div>
                            <label for="inputPassword" class="col-sm-1 col-form-label">Contact No.</label>
                            <div class="col-sm-2">
                                <input type="text" disabled class="form-control" name="father_telephone" value="<?= !empty($patient['parent']) ? $patient['parent']['father_telephone'] : '' ?>">
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Mother's Name</label>
                            <div class="col-sm-4">
                                <input type="text" disabled class="form-control" name="mother_name" value="<?= !empty($patient['parent']) ? $patient['parent']['mother_name'] : '' ?>">
                            </div>
                            <label for="inputPassword" class="col-sm-1 col-form-label">Occupation</label>
                            <div class="col-sm-2">
                                <input type="text" disabled class="form-control" name="mother_occupation" value="<?= !empty($patient['parent']) ? $patient['parent']['mother_occupation'] : '' ?>">
                            </div>
                            <label for="inputPassword" class="col-sm-1 col-form-label">Contact No.</label>
                            <div class="col-sm-2">
                                <input type="text" disabled class="form-control" name="mother_telephone" value="<?= !empty($patient['parent']) ? $patient['parent']['mother_telephone'] : '' ?>">
                            </div>
                        </div> <hr>
                        <label>In case of emergency</label>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Guardian's Name</label>
                            <div class="col-sm-5">
                                <input required disabled type="text" class="form-control" name="guardian_name" value="<?= !empty($patient) ? $patient['guardian_name'] : '' ?>">
                            </div>
                            <label for="inputPassword" class="col-sm-1 col-form-label">Contact No.</label>
                            <div class="col-sm-4">
                                <input required disabled type="text" class="form-control" name="contact_no" value="<?= !empty($patient) ? $patient['contact_no'] : '' ?>">
                            </div>
                        </div> 
                        <h6 class="mb-4 mt-5" style="font-weight: 700">Birth History</h6>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-1 col-form-label">Term</label>
                            <div class="col-sm-1">
                                <input type="text" disabled class="form-control" name="term" value="<?=!empty($patient['birthHistory']) ? $patient['birthHistory']['term'] : '' ?>">
                            </div>
                            <label for="inputPassword" class="col-sm-1 col-form-label">No. Of Months</label>
                            <div class="col-sm-1">
                                <input type="text" disabled class="form-control" name="no_of_mos" value="<?=!empty($patient['birthHistory']) ? $patient['birthHistory']['no_of_mos'] : '' ?>">
                            </div>
                            <label for="inputPassword" class="col-sm-1 col-form-label">Weeks</label>
                            <div class="col-sm-1">
                                <input type="text" disabled class="form-control" name="weeks" value="<?=!empty($patient['birthHistory']) ? $patient['birthHistory']['no_of_mos'] : '' ?>">
                            </div>
                            <label for="inputPassword" class="col-sm-1 col-form-label">Days</label>
                            <div class="col-sm-1">
                                <input type="text" disabled class="form-control" name="days" value="<?=!empty($patient['birthHistory']) ? $patient['birthHistory']['days'] : '' ?>">
                            </div>
                            <label for="inputPassword" class="col-sm-1 col-form-label">Head Circumference</label>
                            <div class="col-sm-3">
                                <input type="text" disabled class="form-control" name="head_circumference" value="<?= !empty($patient['birthHistory']) ? $patient['birthHistory']['head_circumference'] : '' ?>">
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-1 col-form-label">Type of Delivery</label>
                            <div class="col-sm-5">
                                <input type="text" disabled class="form-control" name="type_of_delivery" value="<?=!empty($patient['birthHistory']) ? $patient['birthHistory']['type_of_delivery'] : '' ?>">
                            </div>
                            <label for="inputPassword" class="col-sm-1 col-form-label">Chest Circumference</label>
                            <div class="col-sm-5">
                                <input type="text" disabled class="form-control" name="chest_circumference" value="<?= !empty($patient['birthHistory']) ? $patient['birthHistory']['chest_circumference'] : '' ?>">
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-1 col-form-label">Birth Weight</label>
                            <div class="col-sm-2">
                                <input type="text" disabled class="form-control" name="birth_weight" value="<?=!empty($patient['birthHistory']) ? $patient['birthHistory']['birth_weight'] : '' ?>">
                            </div>
                            <label for="inputPassword" class="col-sm-1 col-form-label">Birth Length</label>
                            <div class="col-sm-2">
                                <input type="text" disabled class="form-control" name="birth_length" value="<?=!empty($patient['birthHistory']) ? $patient['birthHistory']['birth_length'] : '' ?>">
                            </div>
                            <label for="inputPassword" class="col-sm-1 col-form-label">Blood Type</label>
                            <div class="col-sm-1">
                                <input type="text" disabled class="form-control" name="blood_type" value="<?=!empty($patient['birthHistory']) ? $patient['birthHistory']['blood_type'] : '' ?>">
                            </div>
                            <label for="inputPassword" class="col-sm-1 col-form-label">Abdominal Circumference</label>
                            <div class="col-sm-3">
                                <input type="text" disabled class="form-control" name="abdominal_circumference" value="<?= !empty($patient['birthHistory']) ? $patient['birthHistory']['abdominal_circumference'] : '' ?>">
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-1 col-form-label">Diagnosis Notes</label>
                            <div class="col-sm-5">
                                <input required disabled type="text" class="form-control" name="diagnosis_notes" value="<?= !empty($patient['birthHistory']) ? $patient['birthHistory']['diagnosis_notes'] : '' ?>">
                            </div>
                             <label for="inputPassword" class="col-sm-1 col-form-label">Medication Notes</label>
                            <div class="col-sm-5">
                                <input required disabled type="text" class="form-control" name="medication_notes" value="<?= !empty($patient['birthHistory']) ? $patient['birthHistory']['medication_notes'] : '' ?>">
                            </div>
                        </div>
                        <hr>
                        <nav class="nav nav-pills nav-fill">
                            <a class="nav-item nav-link nav-standard" data-link="medication">Medication</a>
                            <a class="nav-item nav-link nav-standard" data-link="followupvisit">Follow Up Visit</a>
                            <a class="nav-item nav-link nav-standard" data-link="vaccine">Vaccine</a>
                            <a class="nav-item nav-link nav-standard" data-link="othervaccine">Other Vaccine</a>
                        </nav>
                        <div class="returnModule">
                        </div>
                    </div>
                </div>
             </form>
        </div>
    </div>
</div>
<script src="<?=URL?>public/js/patient.js"></script>

<script>
    $(function(){
        $('.nav-link').click(function(){
            $('.nav-link').removeClass('active');
            $(this).addClass('active');
            var link = $(this).attr('data-link');
            var patient_id = "<?=$patient['id']?>";
            if(link == 'medication'){
                urlLink = 'patient/medication';
            } else if(link == 'followupvisit') {
                urlLink = 'patient/followupvisit';
            } else if(link == 'vaccine') {
                urlLink = 'patient/vaccine';
            } else if(link == 'othervaccine') {
                urlLink = 'patient/othervaccine';
            }
            $.post(URL + urlLink, {'id' : patient_id})
            .done(function(returnData){
                $('.returnModule').html(returnData);
            })
        })
        
    })
    // new Date("dateString") is browser-dependent and discouraged, so we'll write
    // a simple parse function for U.S. date format (which does no error checking)
    function parseDate(str) {
        var mdy = str.split('/');
        return new Date(mdy[2], mdy[0]-1, mdy[1]);
    }

    function datediff(first, second) {
        // Take the difference between the dates and divide by milliseconds per day.
        // Round to nearest whole number to deal with DST.
        return Math.round((second-first)/(1000*60*60*24));
    }

    alert(datediff(parseDate(first.value), parseDate(second.value)));
</script>