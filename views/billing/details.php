<?php 
    $vaccines = $this->vaccines;
    $fee = Db::loadAll(DATABASE_NAME, 'tbl_doctor_fee');
?>
<h6 class="mb-4 mt-5" style="font-weight: 700">Vaccine</h6>
    <table class="table table-pad table-striped table-hover table-standard">
        <thead>
            <tr>
                <th><strong>Vaccine</strong></th>                  
                <th>Total</th>                                               
            </tr> 
        </thead>
        <tbody>
            <?php foreach ($vaccines as $key => $vaccine):?>
            <?php $vaccineBill = Db::selectByColumn(DATABASE_NAME, 'tbl_vaccine_bill', array('vaccine_id' => $vaccine['id'])); ?>
            <?php $immune = Db::selectByColumn(DATABASE_NAME, 'tbl_immunization_record', array('patient_id' => $_POST['id'], 'vaccine_id' => $vaccine['id']));?>
            <?php 
                $total = 0;
                if($immune[0]['1st'] != '' && $immune[0]['1st'] != '0000-00-00 00:00:00') {
                    $total += $vaccineBill[0]['1st'];
                }
                if($immune[0]['2nd'] != '' && $immune[0]['2nd'] != '0000-00-00 00:00:00') {
                    $total += $vaccineBill[0]['2nd'];
                }
                if($immune[0]['3rd'] != '' && $immune[0]['3rd'] != '0000-00-00 00:00:00') {
                    $total += $vaccineBill[0]['3rd'];
                }
                if($immune[0]['Booster_1'] != '' && $immune[0]['Booster_1'] != '0000-00-00 00:00:00') {
                    $total += $vaccineBill[0]['booster_1'];
                }
                if($immune[0]['Booster_2'] != '' && $immune[0]['Booster_2'] != '0000-00-00 00:00:00') {
                    $total += $vaccineBill[0]['booster_2'];
                }
                if($immune[0]['Booster_3'] != '' && $immune[0]['Booster_3'] != '0000-00-00 00:00:00') {
                    $total += $vaccineBill[0]['booster_3'];
                }
            ?>
                <tr> 
                    <td class="text-standard">
                        <strong><?=$vaccine['vaccine']?></strong>
                        <input type="hidden" class="form-control" name="vaccine[]" value="<?=$vaccine['id']?>">      
                    </td>
                    <td class="totalVaccineBill">
                        <input type="text" class="inputTotalVaccineBill form-control" readonly name="inputTotalVaccineBill[]" value="<?=$total?>">
                    </td>
                </tr>
            <?php endforeach;?> 
        </tbody>
    </table>

    <h6 class="mb-4 mt-5" style="font-weight: 700">Other Vaccine</h6>
    <table class="table table-pad table-striped table-hover table-standard">
        <thead>
            <tr>
                <th><strong>Other Vaccine</strong></th>                  
                <th>Amount</th>                                           
            </tr> 
        </thead>
        <tbody>
            <?php $other = Db::loadAll(DATABASE_NAME, 'tbl_other_fee'); ?>
            <?php foreach ($other as $key => $eachOther):?>
            <?php $immune2 = Db::selectByColumn(DATABASE_NAME, 'tbl_immunization_record_other', array('patient_id' => $_POST['id'], 'other_fee_id' => $eachOther['id']));?>
                <tr> 
                    <td class="text-standard">
                        <strong><?=$eachOther['fee_name']?></strong>
                    </td>
                    <td class="billOtherAmount">
                        <input type="text" readonly class="bill-other-amount form-control" name="bill_other_amount[]" value="<?= $immune2[0]['date_shot'] != '' && $immune2[0]['date_shot'] != '0000-00-00 00:00:00' ? $eachOther['fee'] : 0?>">   
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
<script>
    $(function(){
        totalAll();
        $('input[name="add_fee"]').blur(function(){
            var total = 0;
            $('.inputTotalVaccineBill').each(function(){
                var value = $(this).val();
                total += parseInt(value); 
            });
            $('.bill-other-amount').each(function(){
                var value3 = $(this).val();
                total += parseInt(value3); 
            });
            
            var fee = $('input[name="doc_fee"]').val();
            var add = $('input[name="add_fee"]').val();
            let superTotal = total+parseInt(fee)+parseInt(add);
            $('#superTotal').text('P '+superTotal.toFixed(2));


        })
        function totalAll(){
            var total = 0;
            $('.inputTotalVaccineBill').each(function(){
                var value = $(this).val();
                total += parseInt(value); 
            });

            $('.bill-other-amount').each(function(){
                var value3 = $(this).val();
                total += parseInt(value3); 
            });

            var fee = $('input[name="doc_fee"]').val();
            var add = $('input[name="add_fee"]').val();
            let superTotal = total+parseInt(fee)+parseInt(add);

        
            $('#superTotal').text('P '+superTotal.toFixed(2));
        }
    })
</script>