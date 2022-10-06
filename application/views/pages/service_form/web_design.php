  <link rel="stylesheet" href="<?php echo  base_url();?>assets/frontend/css/form-css.css" />
<!--Page Title-->
        <section class="bredcrumb">
			<div class="bg-image text-center" style="background-image: url('<?php echo base_url(); ?>/assets/frontend/images/resources/banner.jpg');">
				<h1>Services</h1>
			</div>
			<div class="">
				<ul class= "middle">
					<li><a href="<?php echo base_url();?>">Home</a></li>
					<li><a class="inner" href="#">Services</a></li>
				</ul>
			</div>
		</section>
        <!--Page Title Ends-->
		
		<section class="service-single">
			<div class="container">
				<div class="sec-title">
				<h2 class="center"><?php if(!empty($services['name'])) { echo $services['name']; }?></h2>
					<?php $urlid = base64_decode($this->uri->segment(2)); ?>
				</div>
				<div class="row clearfix">
				
				<div class="col-md-4">
					<?php 
					$data['serviceslist'] = $serviceslist;
					$this->load->view('pages/service_form/service-leftside',$data); 
					?>				
				</div>
				
				<div class="col-md-8">
				
				<form action="<?php echo base_url();?>services/addservices"  enctype="multipart/form-data" method="post" accept-charset="utf-8" role="form" novalidate="" id="sale_form">
			    <div class="row">
					<div class="col-md-6">
						<div class="form-group"><label class="control-label">Title</label>
						<input type="text" name="Title" placeholder="Title" class="form-control" required="true"></div>
					</div>
					<div class="col-md-6">
					<div class="form-group"><label class="control-label">Name</label><input type="text" name="Name" placeholder="Name" class="form-control" required="true"></div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group"><label class="control-label">Occupation</label><input type="text" name="Occupation" placeholder="Occupation" class="form-control" required="true"></div>
					</div>
					<div class="col-md-6">
					<div class="form-group"><label class="control-label">Company Name</label><input type="text" name="Company_Name" placeholder="Company Name" class="form-control" required="true"></div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group"><label class="control-label">Address</label><textarea rows="1" name="Address" placeholder="Address" class="form-control" required="true"></textarea></div>
					</div>
					<div class="col-md-6">
					<div class="form-group"><label class="control-label">Telephone</label><input type="text" name="Telephone" placeholder="Telephone" class="form-control" required="true" maxlength="16"></div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group"><label class="control-label">Email</label><input type="email" name="Email" placeholder="Email" class="form-control" required="true"></div>
					</div>
						<div class="col-md-6">
						<div class="form-group"><label class="control-label">Company Website</label>
							<textarea rows="1" name="Company_Website" placeholder="Company Website" class="form-control" required="true"></textarea>
						</div>
						</div>
				
				
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group"><label class="control-label">Country</label>
						
						
							<select name="country" id="country" class="form-control input-lg" required="true">
							<option value="">Select Country</option>
							<?php
							foreach($country as $row)
							{ ?>
							<option value="<?php echo $row->id; ?>" <?php if(!empty($_POST['country']) && $_POST['country']==$row->id) { echo "selected"; }?>> <?php echo $row->name; ?></option>
							<?php  }
							?>
							</select>
					</div>
					</div>
					<div class="col-md-6">
						<div class="form-group"><label class="control-label">State</label>
							<select name="state" id="state" class="form-control input-lg" required="true">
							<option value="">Select State</option>
						</select>
						</div>
					</div>
				</div>
				<div class="row">
				
						<div class="col-md-6">
							<div class="form-group"><label class="control-label">Website package </label>
								<select class="form-control" name="Website_package" required="true">
								<option value="Basic">Basic</option>
								<option value="Moderate">Moderate</option>
								<option value="Advance">Advance</option>
								<option value="Other">Other</option>
								</select>
							</div>
						</div>
						<div class="col-md-6">
						<div class="form-group"><label class="control-label">Complete Website cost</label>
                        
						<div class="input-container">
						<i class="fa fa-gbp icon"></i>
						<input class="input-field form-control digits-cls" type="text" placeholder="Complete Website cost" name="Service_Amount" required="true">
						</div>
                        
                        </div>
					</div>
						
				</div>
			
				
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
						<label class="control-label">Website maintenance length </label>
						<select class="form-control" name="Agreement_length" required="true">
						<?php
							for ($x = 1; $x <= 12; $x++) { 
							  if($x==1){?>
								<option value="<?php echo $x; ?> Month"><?php echo $x; ?> Month</option><?php 
							  }else{ ?>
								<option value="<?php echo $x; ?> Months"><?php echo $x; ?> Months</option><?php   
							  }
						
							} ?>
						</select>
						</div>
					</div>
					<div class="col-md-6">
					<div class="form-group"><label class="control-label">Maintenance Charge </label>
					<div class="input-container">
					<i class="fa fa-gbp icon"></i>
					<input class="input-field form-control digits-cls" type="text" placeholder="Maintenance Charge" name="Maintenance_Charge" required="true">
					</div>

					</div>
					</div>
					
				</div>
				<div class="row">
				<div class="col-md-6">
						<div class="form-group"><label class="control-label">Deposit</label>
                        
						<div class="input-container">
						<i class="fa fa-gbp icon"></i>
						<input class="input-field form-control digits-cls" type="text" placeholder="Deposit" name="Deposit" required="true">
						</div>
					</div>
					</div>
					<div class="col-md-6">
						<div class="form-group"><label class="control-label">Date</label><input type="date" name="Date" class="form-control" required="true"></div>
					</div>
					
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group"><label class="control-label">Comment</label><textarea rows="1" name="Comment" placeholder="Comment" class="form-control" required="true"></textarea></div>
					</div>
						<div class="col-md-6">
					<!--<div class="form-group">
					
					<label class="control-label">Upload(optional)</label>
					<input multiple="" type="file" name="image[]" class="form-control1"></div>-->
					
					<div style="position:relative; float: left;margin-top: 28px;">
					<a class='btn btn-primary' style="color:#fff;" href='javascript:;'>
					Upload(Optional)
					<input multiple="" type="file" name="image[]"  style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent; width:117px; height:51px;cursor: pointer;' name="file_source" size="40" >
					</a>
					&nbsp;
					<span class='label label-info' id="upload-file-info"></span>
					</div>
					
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-6">
						<input type="hidden" name="serviceid" value="<?php echo base64_decode($this->uri->segment(2))?>">
						<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>">
				<input type="submit" class="btn btn-primary submit-btn-primary" name="submit" value="Submit">
					</div>
					
				</div>
				
				</form>
				</div>
					
				</div>
			</div>
		</section>

