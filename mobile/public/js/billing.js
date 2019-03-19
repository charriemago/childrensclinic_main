$(function(){
    $('#addForm').submit(function(){
        let form = $(this).serialize();
        validateForm("Are you sure you want to add this data?" , function() { 
            $.post(URL+'billing/saveBill', form)
            .done(function(returnData){
                alert('Bill successfully saved');
                location.href=URL+'billing';
            })    
        })
        return false;
    });
    $('select[name="patient"]').change(function(){
        var id = $(this).val();
        $.post(URL + 'billing/details', {'id': id})
        .done(function(returnData){
            $('.returnDetails').html(returnData);
        })
    })
    $('.bill-vacc').change(function(){
        var value = $(this).attr('data-amount');
        var totalValue = $(this).closest('tr').find('td.totalVaccineBill .inputTotalVaccineBill').val();
        var that = $(this); 
        if(that.is(':checked')) {
            totalTotal = parseInt(totalValue) + parseInt(value);
        } else {
            totalTotal = parseInt(totalValue) - parseInt(value);
        }
        $(this).closest('tr').find('td.totalVaccineBill span').html('P '+totalTotal);
        $(this).closest('tr').find('td.totalVaccineBill .inputTotalVaccineBill').val(totalTotal);

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
    $('.bill-other').change(function(){
        var value2 = $(this).attr('data-amount');
        var that = $(this); 
        
        if(that.is(':checked')) {
            $(this).closest('tr').find('td.billOtherAmount .bill-other-amount').val(value2);
        } else {
            $(this).closest('tr').find('td.billOtherAmount .bill-other-amount').val(0);
        }

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
    
    $('.btn-export').click(function(){
        let tabledata = `
			<style>
				table {
				  border-collapse: collapse;
				}

				table, th, td {
				  border: 1px solid black;
				}

				table th {
					background: #0d47a1;
					color: white;
				}
			<style>`+
			$("table").clone().wrap('<div>').parent().html()
        ;
        fnExcelReport('Billing_Report', tabledata);
    })
})