$(function(){
    $('input[name="no_of_mos"]').keyup(function(){
        var value = $(this).val();
        var week = Math.ceil(value * 4.34524);
        $('input[name="weeks"]').val(week);
        var day = week * 7;
        $('input[name="days"]').val(day);
    })
    $('#addPatientForm').submit(function(){
        let form = $(this).serialize();
        validateForm("Are you sure you want to add this data?" , function() {
            $.post(URL+'patient/save', form)
            .done( data => {
                let {msg} = JSON.parse(data);
                alert(msg);
                location.href = URL+'patient';
            })
            .fail ( err_data => {
                let err = JSON.parse(err_data.responseText);
                if(err.msg != undefined){
                    alert('Error: ' + err.msg);
                    $('#save_confirm_modal').modal('toggle');
                    removeSpinner('button[type="button"]');
                }
            });
        });
        return false;
    });

    $('#updatePatientForm').submit(function(){
        let form = $(this).serialize();
        validateForm("Are you sure you want to update this data?" , function() {
            $.post(URL+'patient/update', form)
                .done( data => {
                    let {msg} = JSON.parse(data);
                    alert(msg);
                    location.href = URL+'patient';
                })
                .fail ( err_data => {
                    let err = JSON.parse(err_data.responseText);
                    if(err.msg != undefined){
                        alert('Error: ' + err.msg);
                        $('#save_confirm_modal').modal('toggle');
                        removeSpinner('button[type="button"]');
                    }
                });
        });
        return false;
    });
    $('#patientListTable').on('click', '.btn-delete', function(){
        var id = $(this).attr('data-id');
        validateForm("Are you sure you want to delete this data?" , function() {
            $.post(URL+'patient/delete', {'id': id})
            .done(function(returnData){
                alert('Patient successfully deleted.');
                location.href = URL+'patient';
            })
        });
        return false;
    });

    $('.update-trigger').click(function(){
        $('input, textarea').prop('disabled', false);
        $('.btn-update').removeClass('d-none');
    })
    $('.btn-add').click(function(){
        $('#addVaccineModal').modal('toggle');
    })
})

function weekCount(year, month_number) {

    var firstOfMonth = new Date(year, month_number-1, 1);
    var lastOfMonth = new Date(year, month_number, 0);

    var used = firstOfMonth.getDay() + lastOfMonth.getDate();

    return Math.ceil( used / 7);
}