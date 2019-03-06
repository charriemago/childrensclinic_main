$(function() {
    addVisits();
    addNewLine();
    $('#table-visits').on('blur', 'input[name="date_nextvisit[]"]', function(){
        var visit = $(this).closest('tr').find('input[name="date_visit[]"]').val();
        var next = $(this).val();
        that = $(this);
        var newvisit = new Date(visit);
        var newnext = new Date(next);
        
        if(newvisit >= newnext){
            that.val('');
            alert('Invalid input');
        }
    })
});


function addNewLine() {
    $('.btn-add-line').unbind('click');
    $('.btn-add-line').bind('click', function () {
        var newLine = `
            <tr>
                <td><input class="form-control" type="date" name="date_visit[]" required="required"></td>      
                <td><input class="form-control" type="date" name="date_nextvisit[]" required="required"></td>
                <td><input class="form-control" type="text" name="weight[]" required="required"></td>      
                <td><input class="form-control" type="text" name="height[]" required="required"></td>      
                <td><input class="form-control" type="text" name="diagnosis[]" required="required"></td>
                <td><a class="btn-delete"><i class="ti-trash text-danger"></i></a></td>
            </tr>
        `;
        $('#table-visits tbody').append(newLine);

    });
    $('#table-visits').on('click', '.btn-delete', function(){
        $(this).closest('tr').remove();
    })
}

function addVisits() {
    $('.form-add-visit').submit(function(){
        let form = $(this).serialize();
        
        validateForm("Are you sure you want to add this data?" , function() {
            $.post(URL + 'followup/save', form)
            .done(function(result) {
                alert(result)
                if(result === '1') {
                    alert('Follow up Successfully Saved.');
                    location.reload();
                } else if(result === '0') {
                    alert('Follow up already exist!');
                    $('#save_confirm_modal').modal('toggle');
                    removeSpinner('button[type="button"]');

                }
            });
            return false;
        });
        return false;
       
    });
}

