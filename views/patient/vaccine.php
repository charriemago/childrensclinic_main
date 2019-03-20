<?php 
    $vaccines = $this->vaccines;
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 mt-4">
            <form class="form-standard form-add-vaccine" method="POST" class="form-standard">
                <input class="form-control" type="hidden" value="<?=$_POST['id']?>" name="patient_id">
                <div class=" clearfix">
                    <div class="float-left">
                        <h5 class="float-left"> Vaccines </h5>
                    </div>
                    <div class="float-right">
                        <!-- <button type="submit" class="btn btn-standard-success"><i class="pe-7s-paper-plane pe-lg"></i> Submit</button> -->
                    </div>
                </div><hr>
                <div class="card card-standard">
                    <div class="card-body">
                        <h6 style="font-weight: 700">Records</h6>
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
                                        <?php $immune = Db::selectByColumn(DATABASE_NAME, 'tbl_immunization_record', array('patient_id' => $_POST['id'], 'vaccine_id' => $vaccine['id']));?>
                                        <?php
                                            $i1st = $immune[0]['1st'] != '' && $immune[0]['1st'] != '0000-00-00 00:00:00' ? explode(" ",$immune[0]['1st']) : '';
                                            $i2nd = $immune[0]['2nd'] != '' && $immune[0]['2nd'] != '0000-00-00 00:00:00' ? explode(" ",$immune[0]['2nd']) : '';
                                            $i3rd = $immune[0]['3rd'] != '' && $immune[0]['3rd'] != '0000-00-00 00:00:00' ? explode(" ",$immune[0]['3rd']) : '';
                                            $Booster1 = $immune[0]['Booster_1'] != '' && $immune[0]['Booster_1'] != '0000-00-00 00:00:00' ? explode(" ",$immune[0]['Booster_1']) : '';
                                            $Booster2 = $immune[0]['Booster_2'] != '' && $immune[0]['Booster_2'] != '0000-00-00 00:00:00' ? explode(" ",$immune[0]['Booster_2']) : '';
                                            $Booster3 = $immune[0]['Booster_3'] != '' && $immune[0]['Booster_3'] != '0000-00-00 00:00:00' ? explode(" ",$immune[0]['Booster_3']) : '';
                                        ?>
                                        <tr>
                                            <td class="text-standard">
                                                <strong><?=$vaccine['vaccine']?></strong>
                                            </td>      
                                            <td><input type="text" class="form-control" name="1st[<?=$vaccine['id']?>]" value="<?=  $i1st != '' ? $i1st[0].'T'.$i1st[1] : ''?>"></td>      
                                            <td><input type="text" class="form-control" name="2nd[<?=$vaccine['id']?>]" value="<?=  $i2nd != '' ? $i2nd[0].'T'.$i2nd[1] : ''?>"></td>      
                                            <td><input type="text" class="form-control" name="3rd[<?=$vaccine['id']?>]" value="<?=  $i3rd != '' ? $i3rd[0].'T'.$i3rd[1] : ''?>"></td>      
                                            <td><input type="text" class="form-control" name="Booster_1[<?=$vaccine['id']?>]" value="<?= $Booster1 != '' ? $Booster1[0].'T'.$Booster1[1] : ''?>"></td>      
                                            <td><input type="text" class="form-control" name="Booster_2[<?=$vaccine['id']?>]" value="<?= $Booster2 != '' ? $Booster2[0].'T'.$Booster2[1] : ''?>"></td>      
                                            <td><input type="text" class="form-control" name="Booster_3[<?=$vaccine['id']?>]" value="<?= $Booster3 != '' ? $Booster3[0].'T'.$Booster3[1] : ''?>"></td>      
                                            <td><textarea class="form-control" name="reaction[<?=$vaccine['id']?>]" rows="2"><?= !empty($immune[0]) ? $immune[0]['reaction'] : '' ?></textarea></td>              
                                        </tr>
                                    <?php endforeach;?> 
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
             </form>
        </div>
    </div>
</div>
<script>
    $(function(){
        $('.form-add-vaccine').submit(function(){
            var form = $(this).serialize();
            validateForm("Are you sure you want to add this data?" , function() {
                $.post(URL + 'patient/updateImmunizationRecord', form)
                .done(function(returnData){
                    alert('Saved Successfull');
                    location.reload();
                })
                return false;
            });
            return false;
        })
    })
</script>