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
                            <input required type="number" class="form-control" name="father_telephone">
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
                            <input required type="number" class="form-control" name="mother_telephone">
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
                            <input required type="number" class="form-control" name="contact_no">
                        </div>
                    </div> 
                    <h6 class="mb-4 mt-5" style="font-weight: 700">Birth History</h6>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-1 col-form-label">Term</label>
                        <div class="col-sm-1">
                            <input type="number" class="form-control" name="term">
                        </div>
                        <label for="inputPassword" class="col-sm-1 col-form-label">No. Of Months</label>
                        <div class="col-sm-1">
                            <input type="text" class="form-control" name="no_of_mos" readonly>
                        </div>
                        <label for="inputPassword" class="col-sm-1 col-form-label">Weeks</label>
                        <div class="col-sm-1">
                            <input type="text" class="form-control" name="weeks" readonly>
                        </div>
                        <label for="inputPassword" class="col-sm-1 col-form-label">Days</label>
                        <div class="col-sm-1">
                            <input type="text" class="form-control" name="days" readonly>
                        </div>
                        <label for="inputPassword" class="col-sm-1 col-form-label">Head Circumference</label>
                        <div class="col-sm-3">
                            <input type="number" class="form-control" name="head_circumference" placeholder="cm">
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
                            <input type="number" class="form-control" name="chest_circumference"
                            placeholder="cm" placeholder="cm">
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-1 col-form-label">Birth Weight</label>
                        <div class="col-sm-2">
                            <input type="number" class="form-control" name="birth_weight" placeholder="kg">
                        </div>
                        <label for="inputPassword" class="col-sm-1 col-form-label">Birth Length</label>
                        <div class="col-sm-2">
                            <input type="number" class="form-control" name="birth_length" placeholder="cm">
                        </div>
                        <label for="inputPassword" class="col-sm-1 col-form-label">Blood Type</label>
                        <div class="col-sm-1">
                            <select class="form-control" name="blood_type">
                                <option value="" required selected>Select Blood Type</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
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
                            <input type="number" class="form-control" name="abdominal_circumference" placeholder="cm">
                        </div>
                    </div> 
                    <!-- <div class="form-group row">
                        <label for="inputPassword" class="col-sm-1 col-form-label">Diagnosis and Phycisian's Notes</label>
                        <div class="col-sm-5">
                            <input required type="text" class="form-control" name="diagnosis_notes">
                        </div>
                            <label for="inputPassword" class="col-sm-1 col-form-label">Medication Notes</label>
                        <div class="col-sm-5">
                            <input required type="text" class="form-control" name="medication_notes">
                        </div>
                    </div>  -->
                </div> 
            </div> 
        </div> 
    </div> 
</div> 
</form>
<script src="<?=URL?>public/js/patient.js"></script>
<script>
    $(function(){
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