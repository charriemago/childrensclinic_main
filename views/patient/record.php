<?php
    $patient = $this->patient;
    $vaccines = $this->vaccines;
    $delivery = array('Normal' => 'normal', 'Cesarean', 'cesarean');
    $blood = array('0+','0-','A+','A-','B+','B-','AB+','AB-');
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
                                <input type="date" disabled class="form-control" value="<?=$patient['birthday']?>" name="birthday" max="<?=date('Y-m-d')?>">
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
                                <select class="form-control" name="typeofdelivery" disabled>
                                    <option value="" required selected>Select Type of Delivery</option>
                                    <?php foreach($delivery as $key=>$each): ?>
                                    <option value="<?= $each?>" <?= $patient['birthHistory']['type_of_delivery'] == $each ? 'selected' : '' ?>><?= $key?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <label for="inputPassword" class="col-sm1-1 col-form-label">Chest Circumference</label>
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
                                <select class="form-control" name="blood_type" disabled>
                                    <option value="" required selected>Select Blood Type</option>
                                    <?php foreach($blood as $each): ?>
                                    <option value="<?= $each?>" <?= $patient['birthHistory']['blood_type'] == $each ? 'selected' : '' ?>><?= $each?></option>
                                    <?php endforeach; ?>
                                </select>
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
        $('input[name="birthday"]').blur(function(){
            var date = $(this).val();
            var days = datediff(date,dateToday()) + 1;
            var months = Math.floor(parseInt(days) * 0.0328767);
            var weeks = Math.floor(parseInt(months) * 4.34524);
            $('input[name="no_of_mos"]').val(months);
            $('input[name="weeks"]').val(weeks);
            $('input[name="days"]').val(days);
        })
        
        function datediff(first, second) {
            var first = first.split('-');
            var second = second.split('-');
            var oneDay = 24*60*60*1000; // hours*minutes*seconds*milliseconds
            var firstDate = new Date(first[0],first[1],first[2]);
            var secondDate = new Date(second[0],second[1],second[2]);

            var diffDays = Math.round(Math.abs((firstDate.getTime() - secondDate.getTime())/(oneDay)));
            return diffDays;
        }
        function dateToday(){
            var d = new Date();
            var month = d.getMonth()+1;
            var day = d.getDate();
            return d.getFullYear() + '-' +
            (month<10 ? '0' : '') + month + '-' +
            (day<10 ? '0' : '') + day;
        }
        // function humanise (diff) {
        //     // The string we're working with to create the representation
        //     var str = '';
        //     // Map lengths of `diff` to different time periods
        //     var values = [[' year', 365], [' month', 30], [' day', 1]];

        //     // Iterate over the values...
        //     for (var i=0;i<values.length;i++) {
        //         var amount = Math.floor(diff / values[i][1]);

        //         // ... and find the largest time value that fits into the diff
        //         if (amount >= 1) {
        //         // If we match, add to the string ('s' is for pluralization)
        //         str += amount + values[i][0] + (amount > 1 ? 's' : '') + ' ';

        //         // and subtract from the diff
        //         diff -= amount * values[i][1];
        //         }
        //     }

        //     return str;
        // }
    })
</script>