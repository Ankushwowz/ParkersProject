<style>
.serviceactive
{
     background: #26cdff;
}
#read + [data-readmore-toggle], #read[data-readmore] {
    display: block;
    width: 100%;
   
    
}

.thm-btn-readmore {
    width: 200px !important;
    margin-left: 201px!important;;
text-align:center !important;
}
.ui-state-active, .ui-widget-content .ui-state-active, .ui-widget-header .ui-state-active, a.ui-button:active, .ui-button:active, .ui-button.ui-state-active:hover {
    border: 1px solid #003eff;
    background: #26cdff !important;
    font-weight: normal;
    color: #ffffff;
}
.ui-accordion .ui-accordion-header {
    /* display: block; */
    /* cursor: pointer; */
    /* position: relative; */
    /* margin: 2px 0 0 0; */
    padding: .5em 7.5em 0.5em 1.7em !important;
    font-size: 100%;
}
.ui-accordion .ui-accordion-icons {
    padding-left: 2.2em;
}



.ui-accordion .ui-accordion-header {
    display: block;
    cursor: pointer;
    position: relative;
    margin: 2px 0 0 0;
    padding: .5em .5em .5em .7em;
    font-size: 100%;
}
.ui-accordion .ui-accordion-icons {
    padding-left: 2.2em;
}
.ui-accordion .ui-accordion-header {
    /* display: block; */
    /* cursor: pointer; */
    /* position: relative; */
    /* margin: 2px 0 0 0; */
   /* padding: 15px 15px !important;*/
    font-size: 100%;
    background: #fff;
   color:#000;
}
input[type="file"] {
    z-index: 999;
    line-height: 0;
    font-size: 16px;
    position: absolute;
    opacity: 9;
    filter: alpha(opacity = 0);
    -ms-filter: "alpha(opacity=0)";
    margin: 0;
    padding: 0;
    left: 17px;
}
</style>
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
						<h5 class="heading_s">Services List </h5>
						<ul class="list-group">
						
						<?php foreach($serviceslist as $serviceslistInfo) { ?>
							<li class="list-group-item  <?php if($urlid==$serviceslistInfo['id']) { echo 'serviceactive';} ?>"><a href="<?php echo base_url();?>buyservices/<?php echo base64_encode($serviceslistInfo['id']);?>"><?php echo $serviceslistInfo['name'];?></a></li>
						<?php } ?>
						</ul>
					</div>
				
				<div class="col-md-8">
				
				<form action="<?php echo base_url();?>services/addservices" id="form_service_id" enctype="multipart/form-data" method="post" accept-charset="utf-8">
			    <div class="row">
					<div class="col-md-6">
						<div class="form-group"><label class="control-label">Title</label>
						<input type="text" name="Title" placeholder="Title" class="form-control"></div>
					</div>
					<div class="col-md-6">
					<div class="form-group"><label class="control-label">Name</label><input type="text" name="Name" placeholder="Name" class="form-control"></div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group"><label class="control-label">Occupation</label><input type="text" name="Occupation" placeholder="Occupation" class="form-control"></div>
					</div>
					<div class="col-md-6">
					<div class="form-group"><label class="control-label">Company Name</label><input type="text" name="Company_Name" placeholder="Company Name" class="form-control"></div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group"><label class="control-label">Address</label><textarea rows="1" name="Address" placeholder="Address" class="form-control"></textarea></div>
					</div>
					<div class="col-md-6">
					<div class="form-group"><label class="control-label">Telephone</label><input type="text" name="Telephone" placeholder="Telephone" class="form-control"></div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group"><label class="control-label">Email</label><input type="email" name="Email" placeholder="Email" class="form-control"></div>
					</div>
					<?php if($urlid=='2'){?>
						<div class="col-md-6">
						<div class="form-group"><label class="control-label">Website Address</label>
							<textarea rows="1" name="Website_Address" placeholder="Website Address" class="form-control"></textarea>
						</div>
						</div><?php 
					} ?>
					<?php if($urlid=='3'){?>
						<div class="col-md-6">
						<div class="form-group"><label class="control-label">Company Website</label>
							<textarea rows="1" name="Company_Website" placeholder="Website Address" class="form-control"></textarea>
						</div>
						</div><?php 
					} ?>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group"><label class="control-label">Set-up Cost</label>
						<input type="text" name="Set-up_Cost" placeholder="Set-up Cost" class="form-control"></div>
					</div>
					<?php if($urlid=='2'){?>
						<div class="col-md-6">
						<div class="form-group"><label class="control-label">Service Amount</label>
							<input type="text" name="Service_Amount" placeholder="Service Amount" class="form-control"></div>
						</div><?php
					}?>
					<?php if($urlid=='3'){?>
						<div class="col-md-6">
						<div class="form-group"><label class="control-label">SMO package</label>
							<select class="form-control" name="Service_Amount">
							<option value="1">Basic</option>
							<option value="2">Moderate</option>
							<option value="3">Advance</option>
							<option value="4">Other</option>
							
							</select>
							
							</div>
						</div><?php
					}?>
				</div>
				<?php if($urlid=='3'){?>
					<div class="row">
						
						<div class="col-md-6">
							<div class="form-group"><label class="control-label">SMO monthly management Charge</label><input type="text" name="Smo_monthly_management_Charge" placeholder="SMO monthly management Charge" class="form-control"></div>
						</div>
					</div><?php
				}?>
				
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
						<label class="control-label">Agreement Length</label>
						<select class="form-control" name="Agreement_length">
						<option value="1 Month">1 Month</option>
						<option value="2 Months">2 Months</option>
						<option value="3 Months">3 Months</option>
						<option value="4 Months">4 Months</option>
						<option value="5 Months">5 Months</option>
						<option value="6 Months">6 Months</option>
						<option value="7 Months">7 Months</option>
						<option value="8 Months">8 Months</option>
						<option value="9 Months">9 Months</option>
						<option value="10 Months">10 Months</option>
						<option value="11 Months">11 Months</option>
						<option value="12 Months">12 Months</option>
						</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group"><label class="control-label">Deposit</label><input type="text" name="Deposit" placeholder="Deposit" class="form-control"></div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group"><label class="control-label">Date</label><input type="date" name="Date" class="form-control" required=""></div>
					</div>
					<div class="col-md-6">
					<div class="form-group"><label class="control-label">Date</label><input type="date" name="Date" class="form-control" required=""></div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group"><label class="control-label">Comment</label><textarea rows="2" name="Comment" placeholder="Comment" class="form-control" required=""></textarea></div>
					</div>
					<div class="col-md-6">
					<div class="form-group"><label class="control-label">Upload(optional)</label>
					<input multiple="" type="file" name="image[]" class="form-control"></div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-6">
						<input type="hidden" name="serviceid" value="2">
				<input type="submit" class="btn btn-primary submit-btn-primary" name="submit">
					</div>
					
				</div>
				
				</form>
				</div>
					
				</div>
			</div>
		</section>

