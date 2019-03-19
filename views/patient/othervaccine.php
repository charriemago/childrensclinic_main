<?php 
    $vaccines = $this->vaccines;
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 mt-4">
            <form class="form-standard form-add-vaccine" method="POST">
                <input class="form-control" type="hidden" value="<?=$_POST['id']?>" name="patient_id">
                <div class=" clearfix">
                    <div class="float-left">
                        <h5 class="float-left"> Other Vaccines </h5>
                    </div>
                    <div class="float-right">
                    <button type="submit" class="btn btn-standard-success"><i class="pe-7s-paper-plane pe-lg"></i> Submit</button>
                    </div>
                </div><hr>
                <div class="card card-standard">
                    <div class="card-body">
                        <h6 style="font-weight: 700">Records</h6>
                        <div class="table-responsive">
                            <table id="table-visits" class="table table-pad table-striped table-hover table-standard">
                                <thead>
                                    <tr>
                                        <th>Vaccine</th>
                                        <th>Date of Vaccine shots</th>               
                                        <th>Reaction</th>                                     
                                    </tr>   
                                </thead>
                                <tbody>
                                <?php foreach ($vaccines as $key => $vaccine) : ?>
                                    <?php $immune = Db::selectByColumn(DATABASE_NAME, 'tbl_immunization_record_other', array('patient_id' => $_POST['id'], 'other_fee_id' => $vaccine['id']));?>
                                    <?php
                                        $dateShot = $immune[0]['date_shot'] != '' ? explode(" ",$immune[0]['date_shot']) : '';
                                    ?>
                                    <tr>
                                       <td class="text-standard">
                                            <strong><?=$vaccine['fee_name']?></strong>
                                        </td>      
                                        <td><input class="form-control" type="datetime-local" name="date_shot[<?=$vaccine['id']?>]" value="<?= $dateShot != '' ? $dateShot[0].'T'.$dateShot[1] : ''?>"></td>      
                                        <td><input class="form-control" type="text" name="reaction[<?=$vaccine['id']?>]" value="<?=$immune[0]['reaction']?>"></td>
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
            if(confirm('Are you sure you want to save this data?')){
                $.post(URL + 'patient/updateImmunizationRecordOther', form)
                .done(function(returnData){
                    alert('Saved Successfull');
                    location.reload();
                })
                return false;
            } else {
                return false;
            }
        })
    })
</script>