<?php
    $medication = $this->medication;
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 mt-4">
            <form class="form-standard form-add-medication" method="POST" class="form-standard">
                <input class="form-control" type="hidden" value="<?=$_POST['id']?>" name="patient_id">
                <div class=" clearfix">
                    <div class="float-left">
                        <h5 class="float-left"> Medication </h5>
                    </div>
                    <div class="float-right">
                        <!-- <button type="button" class="btn btn-standard-success btn-add-line"><i class="pe-7s-plus pe-lg"></i> Add Line</button>
                        <button type="submit" class="btn btn-standard-success"><i class="pe-7s-paper-plane pe-lg"></i> Submit</button> -->
                    </div>
                </div><hr>
                <h6 style="font-weight: 700">Records</h6>
                <div class="table-responsive">
                    <table id="table-medication" class="table table-pad table-striped table-hover table-standard">
                        <thead>
                            <tr>
                            
                                <th>Date of Prescription</th>                  
                                <!-- <th>Age</th>    -->                                  
                                <th>Prescription of Doctor/Physicians</th>                                     
                                <th></th>                                     
                            </tr>   
                        </thead>
                        <tbody>
                            <?php foreach($medication as $each): ?>
                                <?php $datePres = explode(" ",$each['date_of_prescription']); ?>
                            <tr>
                                <td><input class="form-control" type="datetime-local" name="date_of_prescription[]" disabled value="<?= $datePres[0].'T'.$datePres[1]?>" required="required"></td>      
                                <td><input class="form-control" type="text" name="prescription[]" disabled value="<?= $each['prescription']?>" required="required"></td>
                                <td></td>
                            </tr>
        
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
             </form>
        </div>
    </div>
</div>
<script>
    $(function(){
        addNewLine()
        $('.form-add-medication').submit(function(){
            var form = $(this).serialize();
            validateForm("Are you sure you want to add this data?" , function() {
                $.post(URL + 'patient/addMedication', form)
                .done(function(returnData){
                    alert('Saved Successfull');
                    location.reload();
                })
                return false;
            });
            return false;
        })
    })
    function addNewLine() {
        $('.btn-add-line').unbind('click');
        $('.btn-add-line').bind('click', function () {
            var newLine = `
                <tr>
                    <td><input class="form-control" type="datetime-local" name="date_of_prescription[]" required="required"></td>      
                    <td><input class="form-control" type="text" name="prescription[]" required="required"></td>
                    <td><a class="btn-delete"><i class="ti-trash text-danger" style="cursor: pointer"></i></a></td>
                </tr>
            `;
            $('#table-medication tbody').append(newLine);

        });
        $('#table-medication').on('click', '.btn-delete', function(){
            $(this).closest('tr').remove();
        })
    }
</script>