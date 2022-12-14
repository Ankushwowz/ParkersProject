<style type="text/css">
	.sec-title .p-cls {padding-top: 10px;}
	.sec-title .job-view {color: #999;}
	.a-cls {color: #666 !important;padding-left: 10px;}
	.s-list li { margin-top: 10px;}
	.about {padding: 60px;}
	.serviceactive { background: #26cdff;}
	ul {
     list-style-type: unset; 
}
</style>
<!--Page Title-->
        <section class="bredcrumb">
			<div class="bg-image text-center" style="background-image: url('<?php echo base_url(); ?>assets/frontend/images/resources/banner.jpg');">
				<h1><?php echo $title; ?></h1>
			</div>
			<div class="">
				<ul class= "middle">
					<li><a href="<?php echo base_url(); ?>">Home</a></li>
					<li><a class="inner" href="#"><?php echo $title; ?></a></li>
				</ul>
			</div>
		</section>
        <!--Page Title Ends-->
        <?php $urlid = base64_decode($this->uri->segment(3)); ?>
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
		<section class="about">
			<div class="container">
				<div class="item-list">
					<div class="row">
						
						<div class="col-md-8 col-sm-12 col-xs-12">
			                <div class="sec-title">
								<h3 class="left"><?php echo $viewjob['job_name']; ?></h3>
								<?php if($viewjob['location'] != ''){  ?>
								<p class="p-cls"><span class="job-view"><b>Location:</b> </span><a class="a-cls"><?php echo $viewjob['location']; ?></a></p>
								<?php } else { ?> 
										<p class="p-cls"><span class="job-view"><b>Location:</b> </span><a class="a-cls">NaN</a></p>
								<?php } ?>
								<p class="p-cls"><span class="job-view"><b>Keyskills:</b> </span><a class="a-cls"><?php echo $viewjob['keyskills']; ?></a></p>
								<p class="p-cls"><span class="job-view"><b>Employment Type:</b> </span><a class="a-cls"><?php echo $viewjob['job_type']; ?></a></p>
								<p class="p-cls"><span class="job-view"><b>Amount:</b> </span><a class="a-cls">??<?php echo $viewjob['job_amount']; ?></a></p>
							</div>
			                
			                <div class="s-list mb-20">
			                	<h4>Job Description</h4>
			                  <p><?php echo $viewjob['job_description']; ?></p>
			                  <!-- <li><span class="fa fa-check"></span>Success happens here</li> -->
			                  
			                </div>
			                <div class="about-links text-left">
								<!-- <li><a href="<?php echo base_url('services'); ?>" class="thm-btn style-two">View Services</a></li> -->
								<li><a href="<?php echo base_url(); ?>jobs/apply_form/<?php echo base64_encode($viewjob['service_id']); ?>/<?php echo base64_encode($viewjob['job_id']); ?> " class="thm-btn style-two">Apply Now</a></li>
							</div>

			              </div>
						<!-- <div class="col-md-5 col-sm-10 col-xs-12">
							<div class="item">
								<figure class="image-box">
									<img src="<?php echo base_url(); ?>assets/frontend/images/about/1.jpg" alt="" />
								</figure>
							</div>
						</div> -->
					</div>
				</div>
			</div>
		</section>
		

		</div>					
			</div>
		</section>
		


		