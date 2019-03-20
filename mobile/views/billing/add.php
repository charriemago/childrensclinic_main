<?php 
    $vaccines = $this->vaccines;
    $patient = $this->patientList;
    $fee = Db::loadAll(DATABASE_NAME, 'tbl_doctor_fee');
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 mt-4">
            <div class=" clearfix">
                <div class="float-left">
                    <h5 class="float-left"> Add Payment</h5>
                </div>
                <div class="float-right">
                    <button class="btn btn-standard-success btn-sm" form="addForm"><i class="pe-7s-paper-plane pe-lg"></i> <span>Submit</span></button>
                </div>
            </div><hr>
            <form class="form-standard" id="addForm">
                <div class="card card-standard">
                    <div class="card-body">
                        <h6 class="mb-4" style="font-weight: 700">Patient</h6>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Patient Name</label>
                            <div class="col-sm-10">
                                <select class="form-control selectpicker" name="patient" data-live-search="true">
                                    <option selected disabled value="">Select Patient</option>
                                    <?php
                                        foreach($patient as $each){
                                    ?>
                                        <option value="<?= $each['id']?>"><?= $each['patient_name']?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <hr>
                        <div class="returnDetails">
                            
                        </div>
                    </div>
                </div>
             </form>
        </div>
    </div>
</div>
<script src="<?=URL?>public/js/billing.js"></script>