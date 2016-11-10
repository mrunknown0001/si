$(document).ready(function(){
    $('#filter').on('change',function(){
       if( $(this).val()==="age"){
        	$('#age_value').show()
        	$('#gender_value').hide()
        }
        else if( $(this).val() === 'gender' ) {
        	$('#age_value').hide()
        	$('#gender_value').show()
        }
        else {
        	$('#age_value').hide()
        	$('#gender_value').hide()
        }
    });
});