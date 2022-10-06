<link rel="stylesheet" href="<?php echo  base_url();?>assets/frontend/css/form-css.css" />
<style type="text/css">
	.our-gallery .single-item .cart {
    height: 44px;
    width: 90px;
    font-size: 16px;
    line-height: 45px;
}

.cart a {
    color: #fff;
}

.cart a:hover {
    color: #26cdff;
}
.h2-cls{
	
	text-align: center;
    margin: 71px 0 0 0;
    background: #26cdff;
    color: #fff;
    padding: 16px;
	border-radius: 10px;
}
.see-more {

    height: 42px;
    width: 97px;
    font-size: 16px;
    line-height: 45px;
    background: #26cdff;
    text-align: center;
    color: #fff;
    left: 0;

}
.see-more a {
    color: #fff;
}
.our-gallery .single-item p {
    margin-top: 0;
    color: #848484;
	  line-height:50px;
}
</style>
<!--Page Title-->
        <section class="bredcrumb">
			<div class="bg-image text-center" style="background-image: url('<?php echo base_url(); ?>assets/frontend/images/resources/banner.jpg');">
				<h1>Job List</h1>
			</div>
			<div class="">
				<ul class= "middle">
					<li><a href="<?php echo base_url(); ?>">Home</a></li>
					<li><a class="inner" href="#">Job List</a></li>
				</ul>
			</div>
		</section>
        <!--Page Title Ends-->
		<?php $urlid = base64_decode($this->uri->segment(3)); ?>
		<!--team section-->
		<section class="our-gallery service-single">
			<div class="container">
				<div class="row">
				<div class="col-md-4 col-sm-12 col-xs-12">          
						<h5 class="heading_s">Current Opening</h5>
						<ul class="list-group">
							
							<?php foreach ($services as $service) { ?>
							<li class="list-group-item <?php if($urlid==$service['id']) { echo 'serviceactive';} ?>"><a href="<?php echo base_url(); ?>jobs/jobslist/<?php echo base64_encode($service['id']); ?>"><?php echo $service['name']; ?>(<?php echo $service['totalcount']; ?>)</a></li>
						<?php } ?>							
						</ul>
					</div>
				<div class="col-md-8 col-sm-12 col-xs-12">
					<?php if(!empty($jobs)){ ?>
					<?php foreach ($jobs as $job) { 
					?>
						
					<div class="col-md-4 col-sm-6 col-xs-12">
						<div class="single-item">
							<div class="img-holder">
							<?php if(!empty($job['job_image'])) { ?>
							<img  style="height: 230px !important;" src="<?php echo base_url();?>/assets/images/jobs/<?php echo $job['job_image']; ?>">
							<?php }else{ ?>							
								<img style="height: 230px !important;" src="<?php echo base_url(); ?>assets/images/jobs.jpg" alt="Awesome Image"/>
							<?php } ?>
								<div class="cart">
									<a href="<?php echo base_url(); ?>jobs/apply_form/<?php echo base64_encode($job['service_id']); ?>/<?php echo base64_encode($job['job_id']); ?>" >Apply Now</a>
								</div>
							</div>
							<div class="review">
								<?php if($job['location'] != ''){  ?>
								<a href="#"><i class="fa fa-map-marker" aria-hidden="true" style="margin-right: 3px;"></i><?php echo $job['location']; ?> </a>
								<br>
							<?php }  ?>
								<a href="#"><i class="fa fa-clock-o" aria-hidden="true" style="margin-right: 3px;"></i><span style="text-transform: capitalize;"><?php echo $job['job_type']; ?></span></a>
								<br>
								<a href="#">£<?php echo $job['job_amount']; ?></a>
								<!-- <div class="price"> <ins>
							<span class="amount">$<?php //echo $job['job_amount']; ?></span>
						</ins> </div> -->
							</div>
							<div class="overlay">
								<div class="inner">
							
									<h4><a href="<?php echo base_url(); ?>jobs/apply_form/<?php echo base64_encode($job['service_id']); ?>/<?php echo base64_encode($job['job_id']); ?>"><?php echo substr($job['job_name'],0,30); ?></a></h4>
								<p><?php echo strip_tags(substr($job['job_description'],0,30)); ?><br><div class="see-more"><a href="<?php echo base_url(); ?>jobs/viewjob/<?php echo base64_encode($job['service_id']); ?>">See More</a></div><br></p>
								</div>
							</div>
						
						</div>
					</div>

				<?php	} ?>
				<?php	} else{ ?>
				        <div class="col-md-12">
						<!--<h2 class="h2-cls">No Job Found for this Service</h2>-->
						<h2 class="h2-cls"><img src="<?php echo base_url();?>assets/images/nojob.png"></h2>
						</div>
				<?php } ?>
                 </div>
					
					

					

					<!-- <ul class="col-xs-12 link_btn text-center">
						<li><a href="#" class="thm-btn style-two">load more</a></li>
					</ul> -->
				</div>					
			</div>
		</section>
