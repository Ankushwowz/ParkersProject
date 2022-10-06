<style type="text/css">
	.service-text * {overflow: hidden;}
	.single-service-item {height: 300px;     border-radius: 35px;}
	.btn-cls {margin-top:30px;}
	input[type="file"] {
    z-index: 999;
    line-height: 0;
    font-size: 15px;
    position: inherit;
    opacity: 1;
    filter: alpha(opacity = 0);
    -ms-filter: "alpha(opacity=0)";
    margin: auto 0;
    padding: 0;
   
}
.control-label {float:left;}
.modal-open .modal {
  
    z-index: 9999999;
}

.change-header {
    background-color: #2C3E50;
    color: #fff;
    text-transform: uppercase;
	text-align: left;
}
.modal-content {
    
    overflow-y: scroll !important;
    height: 700px;
    
}
.submit-btn-primary {float:left;}
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
		
		<section class="our-services">
			<div class="container">
				<div class="sec-title">
					<h2 class="center">Sale Services</h2>
					
				</div>
				<div class="row clearfix">
					<!--Start single service icon-->

					<?php foreach ($services as $service) { ?>
					<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
						<div class="single-service-item">
						
							<div class="service-left-bg"></div>
							<div class="service-icon">
								<img src="<?php echo site_url();?>/assets/images/services/<?php echo $service['image']; ?>" alt="">
							</div>
							<div class="service-text">
								<h4><a href="#"><?php echo $service['name']; ?></a></h4>
								<a href="<?php echo base_url();?>buyservices/<?php echo base64_encode($service['id']); ?>"><button class="btn btn-primary btn-cls" >Sale Service</button></a>
								<!--<button class="btn btn-primary btn-cls" data-toggle="modal" data-target="#myModal_<?php echo $service['id']; ?>">Sale Service</button>-->
								
								<!-- Modal -->
								<div id="myModal_<?php echo $service['id']; ?>" class="modal fade" role="dialog">
								  <div class="modal-dialog">

									<!-- Modal content-->
									<div class="modal-content">
									  <div class="modal-header change-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title "><?php echo $service['name'];?></h4>
									  </div>
									  <div class="modal-body">
									   <?php echo form_open_multipart('services/addservices','id="form_service_id"'); ?>
										<p><?php echo json_decode($service['form_data']); ?></p>
										<input type="hidden"  name="serviceid"  value="<?php echo $service['id'];?>">
										<input type="hidden"  name="Service_Amount_text"  value="" id="Service_Amount_text">
										<input type="submit" class="btn btn-primary submit-btn-primary" name="submit" >
										</form>
									  </div>
									  <div class="modal-footer">
										<button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
									  </div>
									</div>

								  </div>
								</div>
								
							</div>
						</div>
					</div>
					<?php } ?>
					
					
				</div>
			</div>
		</section>

