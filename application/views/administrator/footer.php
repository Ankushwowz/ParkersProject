</div>
            </div>
            <!-- Page body end -->
        </div>
    </div>
    <!-- Main-body end -->
   
 <!-- Warning Section Ends -->
    <!-- Required Jqurey -->
    <script type="text/javascript" src="<?php echo base_url(); ?>admintemplate/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>admintemplate/bower_components/jquery-ui/jquery-ui.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>admintemplate/bower_components/tether/dist/js/tether.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>admintemplate/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="<?php echo base_url(); ?>admintemplate/bower_components/jquery-slimscroll/jquery.slimscroll.js"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="<?php echo base_url(); ?>admintemplate/bower_components/modernizr/modernizr.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>admintemplate/bower_components/modernizr/feature-detects/css-scrollbars.js"></script>
    <!-- classie js -->
    <script type="text/javascript" src="<?php echo base_url(); ?>admintemplate/bower_components/classie/classie.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>admintemplate/bower_components/lightbox2/dist/js/lightbox.min.js"></script>
    <!-- Rickshow Chart js -->
    <script src="<?php echo base_url(); ?>admintemplate/bower_components/d3/d3.js"></script>
    <script src="<?php echo base_url(); ?>admintemplate/bower_components/rickshaw/rickshaw.js"></script>
    <!-- Morris Chart js -->
    <script src="<?php echo base_url(); ?>admintemplate/bower_components/raphael/raphael.min.js"></script>
    <script src="<?php echo base_url(); ?>admintemplate/bower_components/morris.js/morris.js"></script>
    <!-- Horizontal-Timeline js -->
    <script type="text/javascript" src="<?php echo base_url(); ?>admintemplate/assets/pages/dashboard/horizontal-timeline/js/main.js"></script>
    <!-- amchart js -->
    <script type="text/javascript" src="<?php echo base_url(); ?>admintemplate/assets/pages/dashboard/amchart/js/amcharts.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>admintemplate/assets/pages/dashboard/amchart/js/serial.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>admintemplate/assets/pages/dashboard/amchart/js/light.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>admintemplate/assets/pages/dashboard/amchart/js/custom-amchart.js"></script>
    <!-- i18next.min.js -->
    <script type="text/javascript" src="<?php echo base_url(); ?>admintemplate/bower_components/i18next/i18next.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>admintemplate/bower_components/i18next-xhr-backend/i18nextXHRBackend.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>admintemplate/bower_components/i18next-browser-languagedetector/i18nextBrowserLanguageDetector.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>admintemplate/bower_components/jquery-i18next/jquery-i18next.min.js"></script>
     <!-- jquery file upload js -->
    <script src="<?php echo base_url(); ?>admintemplate/bower_components/jquery.filer/js/jquery.filer.min.js"></script>
    <script src="<?php echo base_url(); ?>admintemplate/assets/pages/filer/custom-filer.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>admintemplate/assets/pages/filer/jquery.fileuploads.init.js" type="text/javascript"></script>
    <!-- Custom js -->
    <script type="text/javascript" src="<?php echo base_url(); ?>admintemplate/assets/pages/dashboard/custom-dashboard.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>admintemplate/assets/js/script.js"></script>

   <script src="<?php echo base_url(); ?>admintemplate/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>admintemplate/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url(); ?>admintemplate/assets/pages/data-table/js/jszip.min.js"></script>
    <script src="<?php echo base_url(); ?>admintemplate/assets/pages/data-table/js/pdfmake.min.js"></script>
    <script src="<?php echo base_url(); ?>admintemplate/assets/pages/data-table/js/vfs_fonts.js"></script>
    <script src="<?php echo base_url(); ?>admintemplate/bower_components/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?php echo base_url(); ?>admintemplate/bower_components/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?php echo base_url(); ?>admintemplate/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo base_url(); ?>admintemplate/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url(); ?>admintemplate/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
    <script src="<?php echo base_url(); ?>admintemplate/assets/pages/data-table/js/data-table-custom.js"></script>	 <script src="<?php echo base_url(); ?>assets/frontend/js/form_builder.js"></script>
    
   <script>
   


        CKEDITOR.replace( 'editor1' );
    </script>   
     <script>
    lightbox.option({
        'resizeDuration': 200,
        'wrapAround': true
    })
    </script>  
    <script type="text/javascript">
      $(document).ready(function(){
        $('#role').on('change', function() {
        if ( this.value == '4')
        {
          $("#franchise").show();
        }
        else
        {
          $("#franchise").hide();
        }
      });
      });
    </script>

    

  <script type="text/javascript">
    jQuery(".switch-fe").click(function(e){ 
      e.preventDefault();
      var id=  jQuery(this).attr('rel');
      //alert(id);
      swal({
        title: "Are you sure you want to request for a new Franchise?",
        text: "",
        icon: "warning",
        buttons: [
        'No, cancel it!',
        'Yes, I am sure!'
        ],
        dangerMode: true,
      }).then(function(isConfirm) {
          if (isConfirm) {
            swal({
            title: 'Request Submitted!',
            text: 'Request are successfully Submitted to Admin!',
            icon: 'success'
            }).then(function() {
            var baseUrl = "<?php echo base_url()?>";
            jQuery.ajax({
            type: "POST",
            url: baseUrl+'administrator/requeststatus',
            data: {
              id : id
            },
            success: function(msg) 
            {
            if(msg==1){
              
              //jQuery('#tr_'+id).remove();
            
            }
            else{
            //alert('else');
            }

            }

            });

            });
          } else {
            swal("Cancelled", "", "error");
            }
        });

    });
  </script>

  <script type="text/javascript">
    jQuery(".change-roleto-cls").click(function(e){ 
      e.preventDefault();
      var id = jQuery(this).attr('rel');
      alert('UserID ' + id);
      var frenchise_id = jQuery(this).attr('rel2');
      alert('FrenchiseId '+frenchise_id); //return false;
      swal({
        title: "Are you sure you want to request for a new Franchise?",
        text: "",
        icon: "warning",
        buttons: [
        'No, cancel it!',
        'Yes, I am sure!'
        ],
        dangerMode: true,
      }).then(function(isConfirm) {
          if (isConfirm) {
            swal({
            title: 'Request Submitted!',
            text: 'Request are successfully Submitted!',
            icon: 'success'
            }).then(function() {
            var baseUrl = "<?php echo base_url()?>";
            jQuery.ajax({
            type: "POST",
            url: baseUrl+'administrator/request_to_fe',
            data: {
              id : id,
              frenchise_id:frenchise_id

            },
            success: function(msg) 
            {
            if(msg==1){
              
              //jQuery('#tr_'+id).remove();
            
            }
            else{
            //alert('else');
            }

            }

            });

            });
          } else {
            swal("Cancelled", "", "error");
            }
        });

    });
  </script>


  <script type="text/javascript">
    jQuery(".change-roletofe-cls").click(function(e){ 
      e.preventDefault();
      var id = jQuery(this).attr('rel');
      alert('UserID ' + id);
      var frenchise_id = jQuery(this).attr('rel2');
      alert('FrenchiseId '+frenchise_id); //return false;
      swal({
        title: "Are you sure you want to request for a new Franchise?",
        text: "",
        icon: "warning",
        buttons: [
        'No, cancel it!',
        'Yes, I am sure!'
        ],
        dangerMode: true,
      }).then(function(isConfirm) {
          if (isConfirm) {
            swal({
            title: 'Request Submitted!',
            text: 'Request are successfully Submitted to Admin!',
            icon: 'success'
            }).then(function() {
            var baseUrl = "<?php echo base_url()?>";
            jQuery.ajax({
            type: "POST",
            url: baseUrl+'administrator/request_to_sa',
            data: {
              id : id,
              frenchise_id:frenchise_id

            },
            success: function(msg) 
            {
            if(msg==1){
              
              //jQuery('#tr_'+id).remove();
            
            }
            else{
            //alert('else');
            }

            }

            });

            });
          } else {
            swal("Cancelled", "", "error");
            }
        });

    });
  </script>




  <script>

     jQuery('.change-ferole-cls').click(function(){        
       var userid=  jQuery(this).attr('rel');
       var frenchid=  jQuery(this).attr('rels');
       var role_id =  jQuery(this).attr('role_id');
        jQuery('#roles').val(role_id);
        jQuery('#frenchid').val(frenchid);
        jQuery('#userid').val(userid);
      });

       jQuery('#change-ferole-submit').click(function(){
        var roles = jQuery('#roles').val();
        var frenchid = jQuery('#frenchid').val();
        var userid = jQuery('#userid').val();
        var baseUrl = "<?php echo base_url()?>";
        
        $.ajax({
        type: "POST",
        url: baseUrl+'administrator/change_request_role',
        data: {
            roles :roles,
            frenchid :frenchid,
            userid : userid
        },
        success: function(msg) 
        {
            if(msg==1){
              window.location.href = baseUrl+'administrator/users/users'; 
            }
            else{
                 //alert('else');
            }

        }

      });

      });
  

      jQuery('.change-role-cls').click(function(){
        
       var userid=  jQuery(this).attr('rel');
       var role_id=  jQuery(this).attr('role_id');
        jQuery('#roles').val(role_id);
        jQuery('#userid').val(userid);

      });

       jQuery('#change-role-submit').click(function(){
        var roles = jQuery('#roles').val();
        var userid = jQuery('#userid').val();
        var baseUrl = "<?php echo base_url()?>";
        
        $.ajax({
        type: "POST",
        url: baseUrl+'administrator/change_role',
        data: {
            roles :roles,
            userid : userid
        },
        success: function(msg) 
        {
            if(msg==1){
              window.location.href = baseUrl+'administrator/users/users'; 

            }
            else{
                 //alert('else');
            }

        }

      });

      });

      $('.french-cls').click(function(){
        var french_id =  $(this).attr('rel'); 
        var baseUrl = "<?php echo base_url()?>";      
        //alert(french_id); return false;
        $.ajax({
        type: "POST",
        url: baseUrl+'services/getsalereports/'+french_id,
        data: {
            french_id : french_id
        },
        success: function(msg) 
        {
            if(msg==1){
              window.location.href = baseUrl+'administrator/salereports'; 

            }
            else{
                 //alert('else');
            }

        }

      });

      });

       /*$('#french-submit').click(function(){  
        var french_id =  $(this).attr('rel');
        alert(french_id); return false;    
        var userid = $('#french_id').val();
        var baseUrl = "<?php echo base_url()?>";
        
        $.ajax({
        type: "POST",
        url: baseUrl+'services/getsalereports',
        data: {
            french_id : french_id
        },
        success: function(msg) 
        {
            if(msg==1){
              window.location.href = baseUrl+'administrator/users/users'; 

            }
            else{
                 //alert('else');
            }

        }

      });

      }); */


     $(document).on('click', '.edit_data', function(){  
           var appointment_id = $(this).attr('rel'); 
          // alert(appointment_id); return
           //console.log(appointment_id); return false;
           var baseUrl = "<?php echo base_url()?>";
           $.ajax({  
                url: baseUrl+'administrator/editAppointment',  
                method:"POST",  
                data:{appointment_id:appointment_id},  
                success:function(data){  
                 var resultData =  JSON.parse(data);

                   var str = resultData.AppointmentHours;
                  var res = str.split(":");


                     $('#appointmentID').val(resultData.appointmentID);  
                     $('#clientName').val(resultData.clientName);  
                     $('#businessName').val(resultData.businessName);  
                     $('#businessNumber').val(resultData.businessNumber);  
                     $('#mobileNumber').val(resultData.mobileNumber);  
                     $('#address').val(resultData.address);  
                     $('#serviceID').val(resultData.serviceID);  
                     $('#appointmentDate').val(resultData.appointmentDate);  
                     $('#AppointmentHours').val(res[0]);  
                     $('#AppointmentMintus').val(res[1]);  
                     $('#AppointmentTime').val(resultData.AppointmentTime);  
                     $('#meetinglocation').val(resultData.meetinglocation);  
                     $('#notes').val(resultData.notes);  
                }  
           }); 
      });



  jQuery('#milestones').keyup(function(){
		   $('#milestones').css('border-color','');
	   });
	    jQuery('#milestones').change(function(){
		   $('#milestonesDate').css('border-color','');
	   });
	  
	    jQuery('#milestonessubmit').click(function(){
        var orderid = jQuery('#orderid').val();
        var amount = parseFloat(jQuery('#milestones').val());
        var pending_amount = parseFloat(jQuery('#pending_amount').val());
		
		if(amount > 0){
			if(amount > pending_amount){
				jQuery('#pending-error').css('display','block');
				jQuery('#pending-error-zero').css('display','none');
				return false;
			}else{
				jQuery('#pending-error').css('display','none');
			}
		}else{
			jQuery('#pending-error-zero').css('display','block');
				return false;
		}
		var DateMilestones = jQuery('#milestonesDate').val();
		if(amount==''){
			 $('#milestones').css('border-color','red');
			return false;
		}
		if(DateMilestones==''){
			 $('#milestonesDate').css('border-color','red');
			return false;
		}
		var baseUrl = "<?php echo base_url()?>";
        
        $.ajax({
        type: "POST",
        url: baseUrl+'services/create_milestones',
        data: {
            orderid :orderid,
            amount :amount,
            DateMilestones :DateMilestones
        },
        success: function(msg) 
        {
            if(msg==1){
             window.location.href = baseUrl+'administrator/orderview/'+orderid; 

            }
            else{
                 //alert('else');
            }

        }

      });

      });
jQuery(document).ready(function(){
       
	   jQuery(".delete").click(function(e){ 
             e.preventDefault();
			var userid=  jQuery(this).attr('rel');
			swal({
          title: "Are you sure?",
          text: "",
          icon: "warning",
          buttons: [
            'No, cancel it!',
            'Yes, I am sure!'
          ],
          dangerMode: true,
        }).then(function(isConfirm) {
          if (isConfirm) {
            swal({
              title: 'Deleted!',
              text: 'User are successfully Deleted!',
              icon: 'success'
            }).then(function() {
            var baseUrl = "<?php echo base_url()?>";
                jQuery.ajax({
                type: "POST",
                url: baseUrl+'administrator/delete',
                data: {
                
                userid : userid
                },
                success: function(msg) 
                {
                if(msg==1){
                  window.location.href = baseUrl+'administrator/users/users'; 
                  //jQuery(this).closest("tr").remove();
                }
                else{
                //alert('else');
                }

                }

                });

			});
          } else {
            swal("Cancelled", "", "error");
          }
        });
           
        });





		jQuery(".deletemilestones").click(function(e){ 
			e.preventDefault();
			var id=  jQuery(this).attr('rel');
			swal({
				title: "Are you sure?",
				text: "",
				icon: "warning",
				buttons: [
				'No, cancel it!',
				'Yes, I am sure!'
				],
				dangerMode: true,
			}).then(function(isConfirm) {
					if (isConfirm) {
						swal({
						title: 'Deleted!',
						text: 'MileStone are successfully Deleted!',
						icon: 'success'
						}).then(function() {
						var baseUrl = "<?php echo base_url()?>";
						jQuery.ajax({
						type: "POST",
						url: baseUrl+'services/deletemilestones',
						data: {
							id : id
						},
						success: function(msg) 
						{
						if(msg==1){
							
							jQuery('#tr_'+id).remove();
						
						}
						else{
						//alert('else');
						}

						}

						});

						});
					} else {
						swal("Cancelled", "", "error");
						}
				});

		});
		
		
	jQuery("#milestones").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        jQuery("#errmsg").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
   
   
   /************* country and State **************************/
   
      
         jQuery('#country,.country').change(function(){
			H5_loading.show(); 
          var country_id = jQuery(this).val();
		  jQuery('#no-data').html('');
		   jQuery('#user_id').css('border-color','');
          if(country_id != '')
          {
           jQuery.ajax({
            url:"<?php echo base_url(); ?>administrator/fetch_state",
            method:"POST",
            data:{country_id:country_id},
            success:function(data)
            {
				 H5_loading.hide();
             jQuery('#state').html(data);
             jQuery('.state').html(data);
             jQuery('#city').html('<option value="">Select City</option>');
            }
           });
          }
          else
          {
           jQuery('#state').html('<option value="">Select State</option>');
           jQuery('#city').html('<option value="">Select City</option>');
          }
         });

         jQuery('#state,.state').change(function(){
			 H5_loading.show(); 
		 jQuery('#no-data').html('');	 
		 jQuery('#user_id').css('border-color',''); 
          var state_id = jQuery('#state').val();
		   var country_id = jQuery('#country').val();
		   
          if(state_id != '')
          {
           jQuery.ajax({
            url:"<?php echo base_url(); ?>services/assign_user",
            method:"POST",
            data:{state_id:state_id,country_id:country_id},
            success:function(data)
            {
			 H5_loading.hide();
             jQuery('#user_id').html(data);
             jQuery('#user_id1').html(data);
			 if(data=='<option value="">Select Franchise Executive</option>'){
				jQuery('#no-data').html('No Franchise Executive found');
			 }
			 if(data=='<option value="">Select Customer Support Executive</option>'){
				jQuery('#no-data').html('No Customer Support Executive found');
			 }
            }
           });
          }
          else
          {
           //jQuery('#user_id').html('<option value="">Select City</option>');
          }
         });
   
   
   /************** end here **************************/
   /************ Form validation ***********************/
   
   jQuery( "#my_form" ).submit(function( event ){ 

    
        var proceed = true;
        //loop through each field and we simply change border color to red for invalid fields       
        jQuery("#my_form input[required=true],#my_form radio[required=true],#my_form file[required=true],#my_form textarea[required=true],#my_form select[required=true]").each(function(){
                jQuery(this).css('border-color',''); 
                if(!jQuery.trim($(this).val())){ //if this field is empty 
                    jQuery(this).css('border-color','red'); //change border color to red   
					proceed = false; //set do not proceed flag
                }
                //check invalid email
                /*var email_reg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/; 
                if(jQuery(this).attr("type")=="email" && !email_reg.test(jQuery.trim(jQuery(this).val()))){
                    jQuery(this).css('border-color','red'); //change border color to red  
					 proceed = false; //set do not proceed flag   
					
                }*/
        });
       
       if(proceed==true){}else
		{
		  event.preventDefault(); 
		}
    });
	 $("#my_form input[required=true],textarea[required=true]").keyup(function() { 
        $(this).css('border-color',''); 
	});
	
	$("#my_form select[required=true]").change(function() { 
        $(this).css('border-color',''); 
	});
	
	jQuery(".orderactive").click(function(e){ 
			e.preventDefault();
			var order_status = $(this).attr('rel');
			var order_id = $(this).attr('order_id');
			swal({
				title: "Are you sure deactive this order ?",
				text: "",
				icon: "warning",
				buttons: [
				'No, cancel it!',
				'Yes, I am sure!'
				],
				dangerMode: true,
			}).then(function(isConfirm) {
				if (isConfirm) {
					$('#ordertext').text('Deactive Order');
					$('#order_id').val(order_id);
					$('#order_status').val(order_status);
					$('#myModalorder').modal("show");
					return false;
				} else {
					swal("Cancelled", "", "error");
				}
			});

		});
		
		jQuery(".orderdeactive").click(function(e){ 
             e.preventDefault();
			var order_status = $(this).attr('rel');
			var order_id = $(this).attr('order_id');
		swal({
				title: "Are you sure active this order?",
				text: "",
				icon: "warning",
				buttons: [
				'No, cancel it!',
				'Yes, I am sure!'
				],
          dangerMode: true,
        }).then(function(isConfirm) {
          if (isConfirm) {
			  $('#ordertext').text('Active Order');
			  $('#order_id').val(order_id);
			  $('#order_status').val(order_status);
			  $('#myModalorder').modal("show");
			  return false;
           
          } else {
            swal("Cancelled", "", "error");
          }
        });
           
        });
		
		/********** Reason Active/Deactive order ************/
		jQuery("#order-submit").click(function(){ 
		var pageURL = jQuery(location). attr("href");
			var order_id = jQuery('#order_id').val();
			var order_status = jQuery('#order_status').val();
			var tab_status = jQuery('.active').attr('id');
			if(tab_status=='completed-sales-tab'){
				var str = pageURL;
				var res = str.split("?");
				var pageURL = res[0]+'?tab=completed';
			}else if(tab_status=='pending-sale-tab'){
				var str = pageURL;
				var res = str.split("?");
				var pageURL = res[0]+'?tab=pending';
			}else if(tab_status=='order-placed-tab'){
				var str = pageURL;
				var res = str.split("?");
				var pageURL = res[0]+'?tab=orderplaced';
			}
			else{
				pageURL = pageURL;
			}
			
			var reasonTxt = jQuery('#reasontext').val();
			if(reasonTxt==''){
				$('#reasontext').css('border-color','red');
				return false;
			}

			var baseUrl = "<?php echo base_url()?>";
			jQuery.ajax({
				type: "POST",
				url: baseUrl+'services/orderStatus',
				data: {
				order_id : order_id,
				reasonTxt : reasonTxt,
				order_status : order_status
				},
				success: function(msg) 
				{
					if(msg==1){
					//window.location.href = baseUrl+'administrator/pendingsale'; 
					window.location.href = pageURL;

					}
				}
			});

		});
		/******* End here *****************************/
		
		/*************** Assign Sale ******************/
		
		jQuery('.assign_sale_cls').click(function(){
        var order_id=  jQuery(this).attr('rel');
		jQuery('#assign_order_id').val(order_id);
		jQuery('#status_order_id').val(order_id);
        });
		   
		
		jQuery("#assign-sale-to-user").click(function(){ 
			var pageURL = jQuery(location). attr("href");
			var order_id = $('#assign_order_id').val();
			
			var tab_status = jQuery('.active').attr('id');
			if(tab_status=='pending-sale-tab'){
				var user_id = $('#user_id1').val();
				var str = pageURL;
				var res = str.split("?");
				var pageURL = res[0]+'?tab=pending'
				if(user_id1==''){
					$('#user_id1').css('border-color','red');
					return false;
				}
			}else if(tab_status=='order-placed-tab'){
				var user_id = $('#user_id1').val();
				var str = pageURL;
				var res = str.split("?");
				var pageURL = res[0]+'?tab=orderplaced'
				if(user_id1==''){
					$('#user_id1').css('border-color','red');
					return false;
				}
			}else{
				pageURL = pageURL;
				var user_id = $('#user_id').val();
				if(user_id==''){
					$('#user_id').css('border-color','red');
					return false;
				}
			}
			var baseUrl = "<?php echo base_url()?>";
			jQuery.ajax({
				type: "POST",
				url: baseUrl+'services/assignSale',
				data: {
				order_id : order_id,
				user_id : user_id
				
				},
				success: function(msg) 
				{
					if(msg==1){
					// window.location.href = baseUrl+'administrator/pendingsale';
					window.location.href = pageURL; 					

					}
				}
			});

		});
		
		jQuery("#change_status_btn").click(function(){ 
		var pageURL = jQuery(location). attr("href");
			var order_id = $('#status_order_id').val();
			var ChangeStatus = $('#ChangeStatus').val();
			if(ChangeStatus==''){
				$('#ChangeStatus').css('border-color','red');
				return false;
			}
			var tab_status = jQuery('.active').attr('id');
			if(tab_status=='completed-sales-tab'){
				var str = pageURL;
				var res = str.split("?");
				var pageURL = res[0]+'?tab=completed'
			}else if(tab_status=='pending-sale-tab'){
				var str = pageURL;
				var res = str.split("?");
				var pageURL = res[0]+'?tab=pending';
			}else if(tab_status=='order-placed-tab'){
				var str = pageURL;
				var res = str.split("?");
				var pageURL = res[0]+'?tab=orderplaced';
			}else{
				pageURL = pageURL;
			}
			var baseUrl = "<?php echo base_url()?>";
			jQuery.ajax({
				type: "POST",
				url: baseUrl+'services/orderChangeStatus',
				data: {
				order_id : order_id,
				ChangeStatus : ChangeStatus
				
				},
				success: function(msg) 
				{
					if(msg==1){
					 //window.location.href = baseUrl+'administrator/pendingsale'; 
					 window.location.href = pageURL; 

					}
				}
			});

		});
		/************** Table Reports js ******************/
		
		    /* Initialise the DataTable */
		var oTable = jQuery('#dynamic-table1').dataTable({
        
        "iDisplayLength": 10,
        "bJQueryUI": true,
        "sPaginationType": "full_numbers",
        "scrollX": true,
        "aaSorting": [[ 0, "asc" ]],
        "bFilter": true,
        dom: 'Bfrtip',
         buttons: [
                {
                    extend : 'excelHtml5',
                   /* exportOptions : {
                        columns : [0,1,2,3,4,5]
                    }*/
                },
                {
                    extend : 'csvHtml5',
                   /* exportOptions : {
                        columns : [0,1,2,3,4,5]
                    }*/
                },
                {
                    extend : 'pdfHtml5',
                    /*exportOptions : {
                        columns : [0,1,2,3,4,5]
                    }*/
                }]
    });
	
	
	
	  jQuery( function() {
    var dateFormat = "yy/dd/mm",
      from = jQuery( "#from" )
        .datepicker({
          defaultDate: "+1w",
          changeMonth: true,
          numberOfMonths: 2,
          dateFormat: 'yy-mm-dd' 
        })
        .on( "change", function() {
          to.datepicker( "option", "minDate", getDate( this ) );
        }),
      to = jQuery( "#to" ).datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        numberOfMonths: 2,
        dateFormat: 'yy-mm-dd' 
      })
      .on( "change", function() {
        from.datepicker( "option", "maxDate", getDate( this ) );
      });
 
    function getDate( element ) {
		
      var date;
      try {
        date = jQuery.datepicker.parseDate( dateFormat, element.value );
      } catch( error ) {
        date = null;
      }
 
      return date;
    }
  } );
	
	
	/*********** ernd here ***********************/
	
	
	
		jQuery(".enabled_user").click(function(e){ 
		var pageURL = jQuery(location). attr("href");
		
				e.preventDefault();
				var userstatus = jQuery(this).attr('rel');
				var user_id = jQuery(this).attr('user_id');
				swal({
				  title: "Are you sure, you want to disable the account?",
				  text: "",
				  icon: "warning",
				  buttons: [
					'No, cancel it!',
					'Yes, I am sure!'
				  ],
				  dangerMode: true,
				}).then(function(isConfirm) {
				  if (isConfirm) {
					swal({
					  title: 'Disabled!',
					   text: 'User has ben Disabled successfully!',
					  icon: 'success'
					}).then(function() {
					var baseUrl = "<?php echo base_url()?>";
						jQuery.ajax({
							type: "POST",
							url: baseUrl+'administrator/user_enabled_disabled',
							data: {
								user_id : user_id,
								userstatus : userstatus
							},
							success: function(msg){
								if(msg==1){
								 window.location.href = pageURL; 
								 
								}
							}

						});

					});
				  } else {
					swal("Cancelled", "", "error");
				  }
				});
		});
		
			jQuery(".disabled_user").click(function(e){ 
			var pageURL = jQuery(location). attr("href");
				e.preventDefault();
				var userstatus = jQuery(this).attr('rel');
				var user_id = jQuery(this).attr('user_id');
				swal({
				  title: "Are you sure, you want to enable the account?",
				  text: "",
				  icon: "warning",
				  buttons: [
					'No, cancel it!',
					'Yes, I am sure!'
				  ],
				  dangerMode: true,
				}).then(function(isConfirm) {
				  if (isConfirm) {
					swal({
					  title: 'Enabled!',
					  text: 'User has ben Enabled successfully!',
					  icon: 'success'
					}).then(function() {
					var baseUrl = "<?php echo base_url()?>";
						jQuery.ajax({
							type: "POST",
							url: baseUrl+'administrator/user_enabled_disabled',
							data: {
								user_id : user_id,
								userstatus : userstatus
							},
							success: function(msg){
								if(msg==1){
								  window.location.href = pageURL; 
								 
								}
							}

						});

					});
				  } else {
					swal("Cancelled", "", "error");
				  }
				});
		});
	   /************ End here ******************************/
	  

/*jQuery('#change-role-submit').click(function(){
        var roles = jQuery('#roles').val();
        var userid = jQuery('#userid').val();
        var baseUrl = "<?php echo base_url()?>";
        
        $.ajax({
        type: "POST",
        url: baseUrl+'administrator/change_role',
        data: {
            roles :roles,
            userid : userid
        },
        success: function(msg) 
        {
            if(msg==1){
              window.location.href = baseUrl+'administrator/users/users'; 

            }
            else{
                 //alert('else');
            }

        }

      });

      });*/




	jQuery( "#my_form_appointment" ).submit(function( event ){ 
		var proceed = true;
        //loop through each field and we simply change border color to red for invalid fields       
        jQuery("#my_form_appointment input[required=true],#my_form_appointment radio[required=true],#my_form_appointment file[required=true],#my_form_appointment textarea[required=true],#my_form_appointment select[required=true]").each(function(){
                jQuery(this).css('border-color',''); 
                if(!jQuery.trim($(this).val())){ //if this field is empty 
                    jQuery(this).css('border-color','red'); //change border color to red   
					proceed = false; //set do not proceed flag
                }
       });
       if(proceed==true){

		   var baseUrl = "<?php echo base_url()?>";
       alert(baseUrl); 
			var form_data =  jQuery('#my_form_appointment').serialize();
      //alert(form_data);
      alert(form_data); //return false;
				$.ajax({
				type: "POST",
				url: baseUrl+'administrator/CreateAppointment',
        //url:'http://localhost/parkers/administrator/CreateAppointment',
				data: form_data,
        
				success: function(msg){
          //return false;
          alert('here');
					if(msg==1){
					  //window.location.href = baseUrl+'administrator/dashboard?tab=appointment'; 
					}
				},error: function() {
              alert('Something is wrong');
           }
        
			  });
		   
	   }else
		{
      //alert('not working'); return false;
		  event.preventDefault(); 
		}
    });
    
    
    
    
    
    jQuery( "#my_form_appointments" ).submit(function( event ){ 
      H5_loading.show();
      var baseUrl = "<?php echo base_url()?>";
      console.log(baseUrl);
      var form_data =  jQuery('#my_form_appointments').serialize();
      //console.log(form_data); return false;

      jQuery.ajax({
        type: "POST",
        url: baseUrl+'administrator/UpdateAppointment',
        data: form_data, 
        success: function(msg){
             H5_loading.hide();
          if(msg==1){
        
            $('#editAppointment').modal('hide');

          }
           
          
       },
       error: function(){
           alert("Fail")
       }
        });
      event.preventDefault();
      //alert('i am here'); return false;

    });
    
    
		
	jQuery(".delete_appointment").click(function(e){ 
			e.preventDefault();
			 var appointmentID = jQuery(this).attr('rel');
			swal({
				  title: "Are you sure, you want to delete this appointment?",
				  text: "",
				  icon: "warning",
				  buttons: [
					'No, cancel it!',
					'Yes, I am sure!'
				  ],
				  dangerMode: true,
				}).then(function(isConfirm) {
				  if (isConfirm) {
					swal({
					  title: 'Deleted!',
					  text: 'Appointment has ben Deleted successfully!',
					  icon: 'success'
					}).then(function() {
					var baseUrl = "<?php echo base_url()?>";
						jQuery.ajax({
							type: "POST",
							url: baseUrl+'administrator/deleteAppointment',
							data: {
								appointmentID : appointmentID
							
							},
							success: function(msg){
								if(msg==1){
								  window.location.href = baseUrl+'administrator/dashboard?tab=appointment'; 
                                }
							}

						});

					});
				  } else {
					swal("Cancelled", "", "error");
				  }
				});
		});
		
	jQuery("#my_form_appointment input[required=true],textarea[required=true]").keyup(function() { 
		jQuery(this).css('border-color',''); 
	});

	jQuery("#my_form_appointment select[required=true]").change(function() { 
		jQuery(this).css('border-color',''); 
	});
	
    jQuery("#my_form_appointments input[required=true],textarea[required=true]").keyup(function() { 
        jQuery(this).css('border-color',''); 
    });
    
    jQuery("#my_form_appointments select[required=true]").change(function() { 
        jQuery(this).css('border-color',''); 
    });
	
	jQuery(".delete-image").click(function(){ 
			swal({
				  title: "Are you sure, you want to remove this image?",
				  text: "",
				  icon: "warning",
				  buttons: [
					'No, cancel it!',
					'Yes, I am sure!'
				  ],
				  dangerMode: true,
				}).then(function(isConfirm) {
				  if (isConfirm) {
					swal({
					  title: 'Deleted!',
					  text: 'Image has ben remove successfully!',
					  icon: 'success'
					}).then(function() {
					var baseUrl = "<?php echo base_url()?>";
						jQuery('.old-image-empty').val('');
						jQuery('.image-cls-div').hide();

					});
				  } else {
					swal("Cancelled", "", "error");
				  }
				});
		});
		
	
	
	
	jQuery('#user_id').change(function(){
			jQuery('#state').val('');
			 var baseUrl = "<?php echo base_url()?>";
			 var user_id =$('#user_id').val();
			  jQuery.ajax({
					type: "POST",
					url: baseUrl+'services/get_user_data',
					data:{
						user_id : user_id
					},
					success: function(msg) 
					{
						var ResultData = JSON.parse(msg);
						jQuery('#country').val(ResultData.country);
						if(ResultData.country!=null){
							jQuery("#country").trigger('change');
							setTimeout(function () { Get_State(ResultData.state) }, 1000);
						}
					}
				});
		});
	
	/*************** end heere************/		
   });




function Get_State(stateId){
  $('#state').val(stateId);
}

function Get_Country(countryId){
	if(countryId!=''){
		$("#country").trigger('change');
		var StateId ="<?php echo $_POST['state']?>";
		setTimeout(function () { Get_State(StateId) }, 1000);
	}
}

$(window).on('load', function () {
	var countryId= "<?php echo $_POST['country']?>";
	$('#country').val(countryId);
	if(countryId!=null){
	setTimeout(function () { Get_Country(countryId) }, 1000);
	}
});


    function get_notification(){
	var ajaxhit =1;
	var baseUrl = "<?php echo base_url()?>";
	 jQuery.ajax({
				type: "POST",
				url: baseUrl+'administrator/get_notification',
				data:{
					postData : ajaxhit
				},
				success: function(msg) 
				{
					var returnedData = JSON.parse(msg);
					var counter = returnedData['counter'];
					var notification_data = returnedData['notification_data'];
					$( "span#notification-count" ).replaceWith(counter);
					
					$( "#notification-data" ).replaceWith(notification_data);
					return false;
					
				}
			});

}
function read_notification($id){
	var id = $id;
	
	var baseUrl = "<?php echo base_url()?>";
	 jQuery.ajax({
				type: "POST",
				url: baseUrl+'administrator/read_notification',
				data:{
					id : id
				},
				success: function(msg) 
				{
					
				}
			});
	
}

setInterval("get_notification()", 10000); // Update every 10 seconds 


  </script>
    </body>
</html>