    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
	    <link rel="stylesheet" href="<?php echo base_url();?>assets/frontend/css/font-awesome.css" />
    <style type="text/css">
        .form-group .thm-btn {
    width: auto;
    }
    .thm-btn {
    position: relative;
    background: #26cdff;
    font-size: 14px;
    line-height: 42px;
    font-weight: 700;
    color: #ffffff;
    border: 2px solid #26cdff;
    text-transform: uppercase;
    display: inline-block;
    padding: 0 26px;
    font-family: 'Roboto', sans-serif;
    -webkit-transition: all .5s cubic-bezier(0.4, 0, 1, 1);
    transition: all .5s cubic-bezier(0.4, 0, 1, 1);
}

.col-sm-9.amounts {
    padding-left: 0px;
}
.input-container {
    display: -ms-flexbox;
    display: flex;
    width: 100%;
    margin-bottom: 15px;
}
.icon {
    padding: 13px;
    background: #26cdff;
    color: white;
    min-width: 37px;
    text-align: center;
    height: 37px;
}
#upload-error {width:100%; float:left; color:red;}

    </style>
 
           <div class="page-header">
                <div class="page-header-title">
                    <h4>Edit Job</h4>
                </div>
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url(); ?>administrator/dashboard">
                                <i class="icofont icofont-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>administrator/jobs/view-jobs">List Jobs</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Edit Job</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Page header end -->
            <!-- Page body start -->
            <div class="page-body">
                <div class="row">
                    <div class="col-sm-12">
                        <!-- Basic Form Inputs card start -->
                        <div class="card">
                            <div class="card-header">
                                <h5>Edit Job</h5>
                                <!-- <div class="card-header-right">
                                    <i class="icofont icofont-rounded-down"></i>
                                    <i class="icofont icofont-refresh"></i>
                                    <i class="icofont icofont-close-circled"></i>
                                </div> -->
                            </div>

                            <div class="card-block">

                                <!-- <h4><?= $title ?></h4> -->
                                
								<form id="sale_form" action="<?php echo base_url() ?>administrator/update_job/<?php echo $editjobs['job_id'];?>" role="form" novalidate="" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="id" value="<?php echo $editjobs['job_id']; ?>">

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Job Services</label>
                                        <div class="col-sm-10">
                                            <?php $data['services'] = $this->Service_Model->get_services(); ?>
                                        <select name="service_id" id="service_id" class="form-control">
                                            <?php foreach ($data['services'] as $service) { ?>
                                                <option value="<?php echo $service['id']; ?>"><?php echo $service['name']; ?></option>
                                            <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Job Title</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="job_name" value="<?php echo $editjobs['job_name']; ?>" class="form-control" required="true">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Key Skills</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="keyskills" value="<?php echo $editjobs['keyskills']; ?>" class="form-control" required="true">
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Location</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="location" value="<?php echo $editjobs['location']; ?>" class="form-control" required="true">
                                        </div>
                                    </div>

                                     
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Job Description</label>
                                        <div class="col-sm-10">
                                            <textarea id="editor1" rows="10"  cols="5" class="form-control" required="true" name="job_description"><?php echo $editjobs['job_description']; ?></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Job Budget</label>
                                     
                                    <div class="col-sm-10 amounts">
									<div class="input-container">
									<i class="fa fa-gbp icon"></i>
                                            <input type="text"  name="job_amount" class="form-control" value="<?php echo $editjobs['job_amount']; ?>" required="true">
                                        </div>
                                        </div>
                                    </div>

                                    <!-- <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Job Budget</label>
                                        <div class="col-sm-10">
                                            <input type="text"  name="job_amount" class="form-control" value="<?php //echo $editjobs['job_amount']; ?>">
                                        </div>
                                    </div> -->

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Job Type</label>
                                        <div class="col-sm-10">
                                            <select name="job_type" id="job_type" class="form-control">
                                                <option value="permanent">Permanent</option>
                                                <option value="part-time">Part Time</option>
                                           
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Job Image</label>
                                        <div class="col-sm-10">
                                            <input type="file" class="form-control" name="userfile" id="job_image">
                                            <input type="hidden" class="form-control old-image-empty" name="old_job_image" id="old_job_image" value="<?php echo $editjobs['job_image']; ?>">
												<p id="error1" style="display:none; color:#FF0000;">
												Invalid Image Format! Image Format Must Be JPG, JPEG, PNG or GIF.
												</p>
										</div>
										
                                    </div>
									 <div class="form-group row image-cls-div" >
                                        <label class="col-sm-2 col-form-label">&nbsp;</label>
                                        <div class="col-sm-10">
										<?php if(!empty($editjobs['job_image'])) { ?>
                                         <div class="col-sm-10"> <img width="100" src="<?php  echo base_url();?>assets/images/jobs/<?php echo $editjobs['job_image']; ?>">
										 </div>
										  <div class="col-sm-2"><i class="fa fa-remove delete-image" style="font-size:18px;color:red;cursor: pointer; margin-top: 10px;"></i> </div>
										<?php } ?>
										</div>
										
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label"></label>
                                        <div class="col-sm-10">
                                            <input type="submit" class="thm-btn thm-color" name="Submit" id="Submit" value="Update Job">
                                            <!-- <button type="submit" name="submit" class="btn btn-primary">Update</button> -->
                                        </div>
                                    </div>

                                    
                                </form>
                               
                                   
                                </div>
                            </div>
                        </div>
                        <!-- Basic Form Inputs card end -->
                        
                      

                    </div>
                </div>
            </div>
            <!-- Page body end -->
        </div>
    </div>

    <!-- ck editor -->
    <link rel="stylesheet" type="text/css" href="bower_components/switchery/dist/switchery.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- <script src="<?php echo base_url(); ?>assets/frontend/js/formvalidation.js"></script> -->
<script>
    // WRITE THE VALIDATION SCRIPT.
    function isNumber(evt) {
        var iKeyCode = (evt.which) ? evt.which : evt.keyCode
        if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
            return false;

        return true;
    }    
</script>
    <script type="text/javascript">
        $(document).ready(function(){
		$( "#sale_form" ).submit(function( event ){ 
		//on form submit      
var old_job_image = $('#old_job_image').val();		
        var proceed = true;
        //loop through each field and we simply change border color to red for invalid fields       
        $("#sale_form input[required=true],#sale_form radio[required=true],#sale_form file[required=true],#sale_form textarea[required=true]").each(function(){
                $(this).css('border-color',''); 
                if(!$.trim($(this).val())){ //if this field is empty 
                    $(this).css('border-color','red'); //change border color to red   
                    proceed = false; //set do not proceed flag
                }
			if(empty(old_job_image)){	
			var ext = $('#job_image').val().split('.').pop().toLowerCase();
			if ($.inArray(ext, ['gif','png','jpg','jpeg']) == -1){
				 $('#error1').slideDown("slow");
				 proceed = false;
			}
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
    

});
    </script>


    <script type="text/javascript">
        $('.datepicker').pickadate({
        weekdaysShort: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
        showMonthsShort: true
        });
		
    </script>
<script src="<?php echo base_url(); ?>admintemplate/bower_components/ckeditor/ckeditor.js"></script>

