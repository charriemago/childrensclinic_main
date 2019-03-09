$(function(){
    $('.btn-add').click(function(){
        $('#addOtherModal').modal('toggle');
    })
    $('table').on('click', '.btn-edit', function(){
        var id = $(this).attr('data-id');
        var name = $(this).closest('tr').find('td:nth-child(1)').text();
        var amount = $(this).closest('tr').find('td:nth-child(2)').text();
        $('#updateOtherForm').find('input[name="fee"]').val(amount);
        $('#updateOtherForm').find('input[name="fee_name"]').val(name);
        $('#updateOtherForm').find('input[name="id"]').val(id);
        $('#updateOtherModal').modal('toggle');
    })
    $('table').on('click', '.btn-delete', function(){
        var id = $(this).attr('data-id');
        validateForm("Are you sure you want to delete this data?" , function(){
            $.post(URL+'fee/deleteOther', {'id': id})
            .done(function(returnData){
                alert('Fee Successfully Deleted.')
                location.reload();
            })
        })
        return false;
    })
    $('#addOtherForm').submit(function(){
        var form = $(this).serialize();
        validateForm("Are you sure you want to submit this data?" , function(){
            $.post(URL+'fee/addOther', form)
            .done(function(returnData){
                alert('Fee Successfully Added.')
                location.reload();
            })
        })
        return false;
    })
    $('#updateOtherForm').submit(function(){
        var form = $(this).serialize();
        validateForm("Are you sure you want to update this data?" , function(){
            $.post(URL+'fee/updateOther', form)
            .done(function(returnData){
                alert('Fee Successfully Updated.')
                location.reload();
            })
        })
        return false;
    })
})