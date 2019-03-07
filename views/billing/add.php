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
                                    <?php
                                        foreach($patient as $each){
                                    ?>
                                        <option value="<?= $each['id']?>"><?= $each['patient_name']?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        
                        <h6 class="mb-4 mt-5" style="font-weight: 700">Vaccine</h6>
                        <table class="table table-pad table-striped table-hover table-standard">
                            <thead>
                                <tr>
                                    <th rowspan="2" style="vertical-align: middle;"><strong>Vaccine</strong></th>                  
                                    <th colspan="7">Bill</th>                                               
                                </tr>   
                                <tr>                  
                                    <th>1st</th>                                               
                                    <th>2nd</th>                                               
                                    <th>3rd</th>                                               
                                    <th>Booster 1</th>                                               
                                    <th>Booster 2</th>                                               
                                    <th>Booster 3</th>                                               
                                    <th>Total</th>                                               
                                </tr>   
                            </thead>
                            <tbody>
                                <?php foreach ($vaccines as $key => $vaccine):?>
                                <?php $vaccineBill = Db::selectByColumn(DATABASE_NAME, 'tbl_vaccine_bill', array('vaccine_id' => $vaccine['id'])); ?>
                                    <tr> 
                                        <td class="text-standard">
                                            <strong><?=$vaccine['vaccine']?></strong>
                                            <input type="hidden" class="form-control" name="vaccine[]" value="<?=$vaccine['id']?>">      
                                        </td>
                                        <td>
                                            <input type="checkbox" class="bill-vacc" name="bill_<?=$vaccine['id']?>[]" data-amount="<?=$vaccineBill[0]['1st']?>" value="1">   
                                        </td>
                                        <td>
                                            <input type="checkbox" class="bill-vacc" name="bill_<?=$vaccine['id']?>[]" data-amount="<?=$vaccineBill[0]['2nd']?>" value="2">   
                                        </td>
                                        <td>
                                            <input type="checkbox" class="bill-vacc" name="bill_<?=$vaccine['id']?>[]" data-amount="<?=$vaccineBill[0]['3rd']?>" value="3">   
                                        </td>
                                        <td>
                                            <input type="checkbox" class="bill-vacc" name="bill_<?=$vaccine['id']?>[]" data-amount="<?=$vaccineBill[0]['booster_1']?>" value="4">   
                                        </td>
                                        <td>
                                            <input type="checkbox" class="bill-vacc" name="bill_<?=$vaccine['id']?>[]" data-amount="<?=$vaccineBill[0]['booster_2']?>" value="5">   
                                        </td>
                                        <td>
                                            <input type="checkbox" class="bill-vacc" name="bill_<?=$vaccine['id']?>[]" data-amount="<?=$vaccineBill[0]['booster_3']?>" value="6">   
                                        </td>
                                        <td class="totalVaccineBill">
                                            <input type="hidden" class="inputTotalVaccineBill" name="inputTotalVaccineBill[]" value="0">
                                            <span></span>
                                        </td>
                                    </tr>
                                <?php endforeach;?> 
                            </tbody>
                        </table>

                        <h6 class="mb-4 mt-5" style="font-weight: 700">Other Fee</h6>
                        <table class="table table-pad table-striped table-hover table-standard">
                            <thead>
                                <tr>
                                    <th><strong>Other Fee</strong></th>                  
                                    <th>Amount</th>                                               
                                    <th></th>                                               
                                </tr> 
                            </thead>
                            <tbody>
                                <?php $other = Db::loadAll(DATABASE_NAME, 'tbl_other_fee'); ?>
                                <?php foreach ($other as $key => $eachOther):?>
                                    <tr> 
                                        <td class="text-standard">
                                            <strong><?=$eachOther['fee_name']?></strong>
                                        </td>
                                        <td>     
                                            <strong><?=$eachOther['fee']?></strong>
                                        </td>
                                        <td class="billOtherAmount">
                                            <input type="checkbox" class="bill-other" name="other_fee[]" data-amount="<?= $eachOther['fee']?>" value="<?=$eachOther['id']?>">   
                                            <input type="hidden" class="bill-other-amount" name="bill_other_amount[]" value="0">   
                                        </td>
                                    </tr>
                                <?php endforeach;?> 
                            </tbody>
                        </table>

                        <h6 class="mb-4 mt-5 text-right" style="font-weight: 700"></h6>
                        <div class="form-group row">
                            <label class="col-sm-8 col-form-label text-right">Consultation Fee</label>
                            <div class="col-sm-4">
                                <input class="form-control" type="text" name="doc_fee" value="<?= !empty($fee) ? $fee[0]['fee'] : 0?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-8 col-form-label text-right">Additional Fee</label>
                            <div class="col-sm-4">
                                <input class="form-control" type="text" name="add_fee" value="0">
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label class="col-sm-8 col-form-label text-right">Total Fees</label>
                            <div class="col-sm-4">
                                <label id="superTotal" style="padding-top: 2px; font-size: 16px; font-weight: bolder">P <?= !empty($fee) ? $fee[0]['fee'] : 0?></label>
                            </div>
                        </div>
                    </div>
                </div>
             </form>
        </div>
    </div>
</div>
<script src="<?=URL?>public/js/billing.js"></script>