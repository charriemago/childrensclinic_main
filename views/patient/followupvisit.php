<?php 
    $id = $this->getId;
    $visit = $this->allVisits;
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 mt-4">
            <form class="form-standard form-add-visit" method="POST">
                <input type="hidden" name="patient_id" value="<?= $id?>" class="form-standard">
                <div class=" clearfix">
                    <div class="float-left">
                        <h5 class="float-left"> Follow-Up Visits</h5>
                    </div>
                    <div class="float-right">
                        <button type="button" class="btn btn-standard-success btn-add-line"><i class="pe-7s-plus pe-lg"></i> Add Line</button>
                        <button type="submit" class="btn btn-standard-success btn-sm"><i class="pe-7s-paper-plane pe-lg"></i> <span>Submit</span></button>
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
                                    <?php foreach ($visit as $key => $v) : ?>
                                        <?php 
                                            $dateVisit = $v['date_visit'] != '' && $v['date_visit'] != '0000-00-00 00:00:00' ? explode(" ",$v['date_visit']) : '';
                                            $dateNext = $v['date_next'] != '' && $v['date_next'] != '0000-00-00 00:00:00' ? explode(" ",$v['date_next']) : '';
                                        ?>
                                        <tr>
                                            <td><input class="form-control" type="datetime-local" name="date_visit[]" value="<?= $dateVisit != '' ? $dateVisit[0].'T'.$dateVisit[1] : ''?>"></td> 
                                            <td><input class="form-control" type="datetime-local" name="date_nextvisit[]" value="<?= $dateNext != '' ? $dateNext[0].'T'.$dateNext[1] : ''?>"></td> 
                                            <td><input class="form-control" type="number" name="weight[]" value="<?= $v['weight']?>"></td>      
                                            <td><input class="form-control" type="number" name="height[]" value="<?= $v['height']?>"></td>      
                                            <td><input class="form-control" type="text" name="diagnosis[]" value="<?= $v['diagnosis_physician_notes']?>"></td>      
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
<script src="<?=URL?>public/js/follow_up.js"></script>