$(document).ready(function(){
$('#packageprice').change(function(){
	var str = $(this).val();
	var amount_value = str.split("_");
	$('#ChargeAmount').val(amount_value[1]);
});

$( "#sale_form" ).submit(function( event ){ 


//on form submit       
        var proceed = true;
        //loop through each field and we simply change border color to red for invalid fields       
        $("#sale_form input[required=true],#sale_form radio[required=true],#sale_form file[required=true],#sale_form textarea[required=true],#sale_form select[required=true]").each(function(){
                $(this).css('border-color',''); 
                if(!$.trim($(this).val())){ //if this field is empty 
                    $(this).css('border-color','red'); //change border color to red   
					proceed = false; //set do not proceed flag
                }
                //check invalid email
                var email_reg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/; 
                if($(this).attr("type")=="email" && !email_reg.test($.trim($(this).val()))){
                    $(this).css('border-color','red'); //change border color to red  
					 proceed = false; //set do not proceed flag   
					
                }
        });
       
       
		
	  if(proceed==true){}else
		{
		  event.preventDefault(); 
		}
    });
	

 $("#sale_form input[required=true],#sale_form radio[required=true],#sale_form file[required=true],#sale_form textarea[required=true]").keyup(function() { 
        $(this).css('border-color',''); 
});
	
	 $("#sale_form select[required=true]").change(function() { 
        $(this).css('border-color',''); 
});
	
	
	
 $('#country').change(function(){
	
          var country_id = $('#country').val();
          if(country_id != '')
          {
			  var base_url =$('#base_url').val();
			$.ajax({
            url:base_url+"administrator/fetch_state",
            method:"POST",
            data:{country_id:country_id},
            success:function(data)
            {
             $('#state').html(data);
             $('#city').html('<option value="">Select City</option>');
            }
           });
          }
          else
          {
           $('#state').html('<option value="">Select State</option>');
           $('#city').html('<option value="">Select City</option>');
          }
         });

         /*$('#state').change(function(){
          var state_id = $('#state').val();
          if(state_id != '')
          {
           $.ajax({
            url:"<?php echo base_url(); ?>administrator/fetch_city",
            method:"POST",
            data:{state_id:state_id},
            success:function(data)
            {
             $('#city').html(data);
            }
           });
          }
          else
          {
           $('#city').html('<option value="">Select City</option>');
          }
         });*/
		 
		$(".digits-cls").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        //$("#errmsg").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
   
   
   
   
   
   $( "#apply_form" ).submit(function( event ){ 
//event.preventDefault(); 

	if($('#file2').val()!=''){
		var ext = $('#file2').val().split('.').pop().toLowerCase();
			if ($.inArray(ext, ['jpg','jpeg','png','gif']) == -1){
				$('#error3').slideDown("slow");
				$('#error4').hide();
				return false;
				
			}
	}
	if($('#apply_form_image').val()!=''){
		var filesize =$('#apply_form_image')[0].files[0].size;
		if(filesize > 2000000){
			$('#error4').slideDown("slow");
			$('#error3').hide();
			return false;

	}
	}
	



//on form submit       
        var proceed = true;
        //loop through each field and we simply change border color to red for invalid fields       
        $("#apply_form input[required=true],#apply_form radio[required=true],#apply_form file[required=true],#apply_form textarea[required=true],#apply_form select[required=true]").each(function(){
                $(this).css('border-color',''); 
                if(!$.trim($(this).val())){ //if this field is empty 
                    $(this).css('border-color','red'); //change border color to red   
					proceed = false; //set do not proceed flag
                }
				
				
					
					var ext = $('#apply_form_image').val().split('.').pop().toLowerCase();
					if ($.inArray(ext, ['doc','docx','pdf']) == -1){
					 $('#error1').slideDown("slow");
					 $('#error2').hide();
					 proceed = false;
					}
					if($('#apply_form_image').val()!=''){
						var filesize =$('#apply_form_image')[0].files[0].size;
					if(filesize > 2000000){
						$('#error2').slideDown("slow");
						$('#error1').hide();
					      proceed = false;
						
					}
				}
				
				
				
				//check invalid email
                var email_reg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/; 
                if($(this).attr("type")=="email" && !email_reg.test($.trim($(this).val()))){
                    $(this).css('border-color','red'); //change border color to red  
					 proceed = false; //set do not proceed flag   
					
                }
        });
       
       
		
	  if(proceed==true){}else
		{
		  event.preventDefault(); 
		}
    });
	

 $("#apply_form input[required=true],#apply_form radio[required=true],#apply_form file[required=true],#apply_form textarea[required=true]").keyup(function() { 
        $(this).css('border-color',''); 
});
	
	$("#apply_form select[required=true]").change(function() { 
        $(this).css('border-color',''); 
	});
	 $("#apply_form_image").change(function() { 
        $('#error1').hide();
        $('#error2').hide();
	});
	
	
	
	
	
	
$( "#contact-form-id" ).submit(function( event ){ 


//on form submit       
        var proceed = true;
        //loop through each field and we simply change border color to red for invalid fields       
        $("#contact-form-id input[required=true],#contact-form-id radio[required=true],#contact-form-id file[required=true],#contact-form-id textarea[required=true],#contact-form-id select[required=true]").each(function(){
                $(this).css('border-color',''); 
                if(!$.trim($(this).val())){ //if this field is empty 
                    $(this).css('border-color','red'); //change border color to red   
					proceed = false; //set do not proceed flag
                }
                //check invalid email
                var email_reg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/; 
                if($(this).attr("type")=="email" && !email_reg.test($.trim($(this).val()))){
                    $(this).css('border-color','red'); //change border color to red  
					 proceed = false; //set do not proceed flag   
					
                }
        });
       
       
		
	  if(proceed==true){
	    var base_url =$('#base_url_id').val();
        var form_data = $('#contact-form-id').serialize();

	   $.ajax({
            url:base_url+"contact/home_contact_form",
            method:"POST",
            data:form_data,
            success:function(msg){
               
               $('#myModal_home_contact').modal("show");
                $("input[type=text], textarea,input[type=email]").val("");
            }
           });
	  
	  return false;
	  
	  
	  }else
		{
		  event.preventDefault(); 
		}
});


 $("#contact-form-id input[required=true],#contact-form-id radio[required=true],#contact-form-id file[required=true],#contact-form-id textarea[required=true]").keyup(function() { 
        $(this).css('border-color',''); 
});
});

function checkSize(){
	alert('dddd');
       // var size = input.files[0].size;
        //console.log(size);
    }