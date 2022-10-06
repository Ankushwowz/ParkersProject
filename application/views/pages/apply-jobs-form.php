 <link rel="stylesheet" href="<?php echo  base_url();?>assets/frontend/css/form-css.css" />

<style>
  .form-1 {
    max-width: 500px;
    margin: 33px auto;
    text-align: left;
}
  .form-1  input[type="file"]
  {opacity: 1;
    font-size: inherit;
    padding: 0;
    position: static;
    border: none;

  }

  .alert.alert-warning.icons-alert {
    width: 522px;
    margin: 0 auto;
    text-align: center !important;
}
.label-1 span {
    font-weight: bold;
    /*color: #de6262;*/
    float: left;
}
.hidden{
  display: none;
}

.label-1 #mobile-valid {
    color: #268632;
}
.label-1 #folio-invalid {
    color: #de6262;
}
.alert.alert-warning.icons-alert {
    display: none;
}
.error {
    color: #c04d4d;
}


.msg {display: none;}
.success {color: #268632;}
#upload-error {width:100%; float:left;}
.padding-left{padding-left: 198px;}
#error1 {
	font-family: 'Open Sans', sans-serif;
    font-weight: 400;
    font-size: 14px;
    line-height: 24px;
    width: 100%;
    float: left;
}
#error2 {
	font-family: 'Open Sans', sans-serif;
    font-weight: 400;
    font-size: 14px;
    line-height: 24px;
    width: 100%;
    float: left;
}

#error3 {
	font-family: 'Open Sans', sans-serif;
    font-weight: 400;
    font-size: 14px;
    line-height: 24px;
    width: 100%;
    float: left;
}
#error4 {
	font-family: 'Open Sans', sans-serif;
    font-weight: 400;
    font-size: 14px;
    line-height: 24px;
    width: 100%;
    float: left;
}
</style>

<?php //echo form_open_multipart('jobs/create/','id="$id"');?>
<section class="service-single">
<div class="container">
		<div class="sec-title">
		<h2 class="center padding-left">Apply Form (<?php if(!empty($jobsName['job_name'])) { echo $jobsName['job_name'];}?>)</h2>
		<?php $urlid = base64_decode($this->uri->segment(3)); ?>
		</div>
		<div class="row clearfix">
		<div class="col-md-4 col-sm-12 col-xs-12">          
						<h5 class="heading_s">Current Opening</h5>
						<ul class="list-group">
							
							<?php foreach ($services as $service) { ?>
							<li class="list-group-item <?php if($urlid==$service['id']) { echo 'serviceactive';} ?>"><a href="<?php echo base_url(); ?>jobs/jobslist/<?php echo base64_encode($service['id']); ?>"><?php echo $service['name']; ?>(<?php echo $service['totalcount']; ?>)</a></li>
						<?php } ?>							
						</ul>
					</div>
		<div class="col-md-8 col-sm-12 col-xs-12">
		<form action="<?php echo base_url(); ?>jobs/apply_form/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4); ?>" method="POST" enctype="multipart/form-data" role="form" novalidate="" id="apply_form">
		   
	   <div class="row">
			<div class="col-md-6">
			   <div class="form-group">
				  <label>Title</label>
				  <input type="text" class="form-control" name="title" placeholder="Title" required="true">
				  <?php echo form_error('title', '<div class="error">', '</div>'); ?>
			   </div>
		   </div>
		   <div class="col-md-6">
			<div class="form-group">
				<label>Full Name</label>
				<input type="text" class="form-control" name="full_name" placeholder="Full Name" required="true">
				<?php echo form_error('full_name', '<div class="error">', '</div>'); ?>
			</div>
		   </div>
	   </div>
	   <div class="row">
			<div class="col-md-6">
			   <div class="form-group">
				   <label>Home Address</label>
					<input type="text" class="form-control" name="address" placeholder="Address Name" required="true">
			   </div>
		   </div>
		   <div class="col-md-6">
			<div class="form-group">
			<label>Country</label>
			<?php $data['country'] = $this->Administrator_Model->fetch_country();?>
			<select name="country" id="country" class="form-control input-lg" required="true">
				<option value="">Select Country</option>
				<?php foreach($data['country'] as $row){
					echo '<option value="'.$row->id.'">'.$row->name.'</option>';
				}
				?>
			</select>
			</div>
		   </div>
	   </div>
		<div class="row">
			<!--<div class="col-md-6">
			   <div class="form-group">
					<label>State</label>
					<select name="state" id="state" class="form-control input-lg" required="true">
						<option value="">Select State</option>
					</select>
			   </div>
		   </div>-->
		   <div class="col-md-6">
			<div class="form-group">
				<label>City</label>
				<input type="text" name="city" id="city" class="form-control input-lg" required="true">
					
			</div>
		   </div>
		   <div class="col-md-6">
			   <div class="form-group">
					<label>Postcode</label>
					<input type="text" class="form-control" name="pincode" placeholder="Postcode" required="true">
					<?php echo form_error('pincode', '<div class="error">', '</div>'); ?>
			   </div>
		   </div>
	   </div>
	   <div class="row">
			
		   <div class="col-md-6">
			<div class="form-group">
					<label>Email</label>
					<input  required="true" type="email" class="form-control" name="email" placeholder="Email Name" onblur="validateEmail(this);">
					<span class="msg error"><i class="fa fa-times mobile-invalid"></i>Not a valid email address</span>
					<span class="msg success"><i class="fa fa-check pwd-valid"></i>A valid email address!</span>
					<?php echo form_error('email', '<div class="error">', '</div>'); ?>
			</div>
		   </div>
		    <div class="col-md-6">
				<div class="form-group">
					<label>Phone</label>
					<input type="text" class="form-control" name="phone" id='mobile-num' placeholder="Phone Name" required="true">
					<div class="label">
						<div class="label-1">
							<span id="mobile-valid" class="hidden mob">
								<i class="fa fa-check pwd-valid"></i>Valid Mobile No
							</span>  
							<span id="folio-invalid" class="hidden mob-helpers">
								<i class="fa fa-times mobile-invalid"></i>Invalid mobile No
							</span>
						</div>
					</div>
				</div>
		   </div>
	   </div>
	   <div class="row">
		
		  
		   <div class="col-md-6">
				<div class="form-group">
					<label>Job Title</label>
					<?php $job_title = $this->Jobs_Model->get_job_title(); ?>
					<input required="true" type="text" class="form-control" name="job_title" value="<?php echo $job_title['job_name'] ?>" readonly>
				</div>
		   </div>
		   <div class="col-md-6">
				<div class="form-group">
					<label>Available Start Date</label>
					<input required="true" type="text" class="form-control" name="start_date" id="select_date" placeholder="Available Start Date ">
				</div>
		   </div>
	   </div>
	   <div class="row">
			
		   
		   
		   <div class="col-md-6">
				<div class="form-group">
					  <label>Hear About Us</label>
					<input type="text" required="true" type="text" class="form-control" name="hear_about_us" placeholder="How did you hear about us?">
				</div>
		   </div>
		 
		 
		   <div class="col-md-6">
				<div class="form-group">
					
					<!--<input type="file" id="file" name="userfile" class="form-control1" onchange="return fileValidation()">-->
					
					<div style="position: relative;float: left; margin: 0px; padding: 0px; height: 55px;    margin-top: 26px;">
					<a class='btn btn-primary' style="color:#fff;" href='javascript:;'>
					Upload CV
					<input type="file" name="userfile" id="apply_form_image" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent; width:117px; height:51px;cursor: pointer;' name="file_source" size="40"  >
					</a>
					&nbsp;
					<span class='label label-info' id="upload-file-info"></span>
					
					
					</div>
					<p id="error1" style="display:none; color:#FF0000;">Please upload doc/docx/pdf only</p>
					<p id="error2" style="display:none; color:#FF0000;">File is too large and File must be less than 2MB.</p>
					<div class="error" id="upload-error"></div>
				</div>
				</div>
		 
	   </div>

		<div class="row">
			
		   
		   
		   
				
				<div class="col-md-6">
				<div class="form-group">
					<!--<label >Optional Upload</label>->               
					<!--<input type="file" id="file2" name="userfile2" class="form-control1" onchange="return fileValidations()">-->
					
					
					<div style="position:relative; float: left;">
					<a class='btn btn-primary' style="color:#fff;" href='javascript:;'>
					Upload(Optional)
					<input type="file" name="userfile2" id="file2" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent; width:117px; height:51px;cursor: pointer;' name="file_source" size="40"  onchange="return fileValidations()">
					</a>
					&nbsp;
					<span class='label label-info' id="upload-file-info"></span>
					</div>
					<p id="error3" style="display:none; color:#FF0000;">Please upload jpg/jpeg/png/gif only</p>
					<p id="error4" style="display:none; color:#FF0000;">File is too large and File must be less than 2MB.</p>
				</div>
		   </div>
	   </div>
	  
		<?php /*  <div class="row">
			  <div class="col-md-6">
				<div class="form-group">
					
					<!--<input type="file" id="file" name="userfile" class="form-control1" onchange="return fileValidation()">-->
					
					<div style="position:relative; float: left;">
					<a class='btn btn-primary' style="color:#fff;" href='javascript:;'>
					Upload CV
					<input type="file" name="userfile" id="file" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent; width:117px; height:51px;cursor: pointer;' name="file_source" size="40"  onchange='$("#upload-file-info").html($(this).val());' >
					</a>
					&nbsp;
					<span class='label label-info' id="upload-file-info"></span>
					</div>
				</div>
				</div>
		 
	   </div>*/
	   ?>
	   
		<div class="row">
		<div class="col-md-6">
		<input type="submit" class="btn btn-primary submit-btn-primary" name="Submit" id="Submit" value="Submit">
		</div>
		</div>
		</form>
	</div>
	</div>
</div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script type="text/javascript">
   $(function() {
$("#select_date").datepicker({
minDate: "0",
//maxDate: "+1"
});
});
</script>
<!--
<script type="text/javascript">
 function fileValidation(){
    var fileInput = document.getElementById('file');
    var filePath = fileInput.value;
    var allowedExtensions = /(\.doc|\.docx|\.pdf)$/i;
    if(!allowedExtensions.exec(filePath)){
       $('#upload-error').text('Please upload doc/docx/pdf/ only.');
      	
        fileInput.value = '';
        return false;
    }else{
        //Image preview
        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('imagePreview').innerHTML = '<img src="'+e.target.result+'"/>';
            };
            reader.readAsDataURL(fileInput.files[0]);
			$('#upload-error').text('');
        }
    }
}
</scrip



<script type="text/javascript">
  function fileValidations(){
    var fileInput = document.getElementById('file2');
    var filePath = fileInput.value;
    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
    if(!allowedExtensions.exec(filePath)){
        alert('Please upload file having extensions .jpeg/.jpg/.png/.gif only.');
        fileInput.value = '';
        return false;
    }else{
        //Image preview
        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('imagePreview').innerHTML = '<img src="'+e.target.result+'"/>';
            };
            reader.readAsDataURL(fileInput.files[0]);
        }
    }
}
</script>-->

<script type="text/javascript">
 $(document).ready(function(){
  
  /*$("#mobile-num").on("blur", function(){
        var mobNum = $(this).val();
        var filter = /^\d*(?:\.\d{1,2})?$/;

          if (filter.test(mobNum)) {
            if(mobNum.length==10){
                  //alert("valid");
              swal("Good job!", "Mobile Number Valid!", "success");
              $("#mobile-valid").removeClass("hidden");
              $("#folio-invalid").addClass("hidden");
             } else {
               swal("Warning!", "Please put 10  digit mobile number!", "warning");
               $("#folio-invalid").removeClass("hidden");
               $("#mobile-valid").addClass("hidden");
                return false;
              }
            }
            else {
              swal("Error!", "Not a valid number!", "error");
              $("#folio-invalid").removeClass("hidden");
              $("#mobile-valid").addClass("hidden");
              return false;
           }
    
  });*/
  
});
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

<script>
        jQuery(document).ready(function(){
            //alert('here');
         jQuery('#country').change(function(){
          var country_id = jQuery('#country').val();
          if(country_id != '')
          {
           jQuery.ajax({
            url:"<?php echo base_url(); ?>administrator/fetch_state",
            method:"POST",
            data:{country_id:country_id},
            success:function(data)
            {
             jQuery('#state').html(data);
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

         jQuery('#state').change(function(){
          var state_id = jQuery('#state').val();
          if(state_id != '')
          {
           jQuery.ajax({
            url:"<?php echo base_url(); ?>administrator/fetch_city",
            method:"POST",
            data:{state_id:state_id},
            success:function(data)
            {
             jQuery('#city').html(data);
            }
           });
          }
          else
          {
           jQuery('#city').html('<option value="">Select City</option>');
          }
         });
         
        });
        </script>