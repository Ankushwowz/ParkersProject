<!--  <link rel="stylesheet" href="<?php echo  base_url();?>assets/frontend/css/form-css.css" /> -->
<style>
      /* Set the size of the div element that contains the map */
      #map {
        height: 400px;  /* The height is 400 pixels */
        width: 100%;  /* The width is the width of the web page */
       }
       #sale_form .cl-service{
       	-moz-appearance: unset !important;
		-webkit-appearance: menulist !important;
       }

     .form-group.style-two textarea.form-control.textarea {
    height: 300px;
} 
    .form-group.style-two .thm-btn {
    width: auto;
}
.error {
    color: #c04d4d;
}


.msg {display: none;}
.success {color: #268632;}
.text p {word-wrap: break-word;}
.p-cls {color:#000!important;}
#sale_form .cl-service {
    -moz-appearance: unset !important;
    -webkit-appearance: menulist !important;
    color: #484646 !important;
}
    </style>

<div class="contact_details sec-padd">
			<div id="map"></div>
				<div class="home-google-map">
					<!-- <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d3736489.7218514383!2d90.21589792292741!3d23.857125486636733!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1506502314230" width="100%" height="315" frameborder="0" style="border:0" allowfullscreen></iframe> -->
					<!-- <div 
						class="google-map" 
						id="contact-google-map" 
						data-map-lat="40.7128" 
						data-map-lng="-74.0060" 
						data-icon-path="<?php echo base_url(); ?>assets/frontend/images/logo/map-marker.png"
						data-map-title="Chester"
						data-map-zoom="10" >
					</div> -->
				</div>
			
		</div>
	

		<!-- <div id="map"></div> -->	
		<section class="feature-style-three">
			<div class="container">			
				<div class="item-list">
					<div class="row">
						<div class="item">
							<div class="column col-md-4 col-sm-6 col-xs-12">
								<div class="inner-box">
									<div class="icon-box"><span class="icon flaticon-pin-1"></span></div>
									<h3>Location</h3>
									<div class="text"><p>COVENT GARDEN LONDON ENGLAND WC2H 9JQ</p></div>
								</div>
							</div>
						</div>
						
						<!--<div class="item">
							<div class="column col-md-4 col-sm-6 col-xs-12">
								<div class="inner-box">
									<div class="icon-box"><span class="icon flaticon-cell-phone"></span></div>
									<h3>Phone Number</h3>
									<div class="text"><p>+ 0203 126 4428</p></div>
								</div>
							</div>
						</div>-->
						
						<div class="item">
							<div class="column col-md-4 col-sm-6 col-xs-12" >
								<div class="inner-box" style="padding-bottom:53px!important;">
									<div class="icon-box"><span class="icon flaticon-message"></span></div>
									<h3>Email Us</h3>
									<div class="text"><p>contact@parkersconsultancy.co.uk</p></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="contact_us">
			<div class="container">   
                <div class="sec-title text-center">
                    <h2>Get In Touch</h2>
					<p class="p-cls">Let us help you today! Our experienced consultants will call you back within the next 24hrs. Fill the form below.</p>
                </div>
                <div class="default-form-area">
					<form id="sale_form" name="contact_form" class="col-md-10 col-md-offset-1 default-form" action="<?php echo base_url(); ?>contact/conatct_add" role="form" novalidate="" method="post">
						<div class="row clearfix">
							
							
							<div class="col-md-6 col-sm-6 col-xs-12">
												
								<div class="form-group style-two">
									<?php $data['services'] = $this->Service_Model->get_services();
										//echo "<pre>"; print_r($data['services']); die;
									 ?>
									<select name="service_name" class="form-control cl-service">
										<option value="">Select Service</option>
										<?php foreach ($data['services'] as $services) { ?>
											
										<option value="<?php echo $services['id']; ?>"><?php echo $services['name']; ?></option>
										<?php } ?>
										
									</select>
								</div>


								<div class="form-group style-two">
									<input type="text" name="name" class="form-control" value="" placeholder="Name" required="true">
								</div>


								<div class="form-group style-two">
									<input type="email" name="email" class="form-control email" required="true" value="" placeholder="Email" required="true" onblur="validateEmail(this);">
									<span class="msg error"><i class="fa fa-times mobile-invalid"></i>Not a valid email address</span>
									<span class="msg success"><i class="fa fa-check pwd-valid"></i>A valid email address!</span>
									<?php echo form_error('email', '<div class="error">', '</div>'); ?>

								</div>


								<div class="form-group style-two">
									<input type="text" name="phone" class="form-control" required="true" value="" placeholder="Phone">
								</div>

								<div class="form-group style-two">
									<input type="text" name="subject" class="form-control" required="true" value="" placeholder="Subject">
								</div>
							
								</div>
							

								<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="form-group style-two">
									<textarea name="message" class="form-control textarea" required="true" placeholder="Your Message"></textarea>
								</div>

								<div class="form-group style-two">
								<input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden" value="">
								<input type="submit" class="thm-btn thm-color" name="Submit" id="Submit" value="Send Message">
								<!-- <button class="thm-btn thm-color" type="submit" data-loading-text="Please wait...">send message</button> -->
							</div>

								</div>   											  
						</div
						>
						<div class="contact-section-btn text-center">
							
						</div> 
					</form>
				</div>          
			</div>
		</section>


<script>
// Initialize and add the map
function initMap() {
  // The location of Uluru
  var uluru = {lat: 51.5117, lng: 0.1240};
  // The map, centered at Uluru
  var map = new google.maps.Map(
      document.getElementById('map'), {zoom: 4, center: uluru});
  // The marker, positioned at Uluru
  var marker = new google.maps.Marker({position: uluru, map: map});
}
    </script>



    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAPVcxuj3a6rgnP2G29f2TgMY_KtD05DQc&callback=initMap">
    </script>
<script type="text/javascript">
  $('form input[name="email"]').blur(function () {
    var email = $(this).val();
var re = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
if (re.test(email)) {
    $('.msg').hide();
    $('.success').show();
   // alert('1');
} else {
    $('.msg').hide();
    $('.error').show();
    //alert('2');
}

});
  /*function validateEmail(emailField){
        var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

        if (reg.test(emailField.value) == false) 
        {
            swal("Error!", "Invalid Email Address!", "error");
            //alert('Invalid Email Address');
            return false;
        }

        return true;

}*/
</script>