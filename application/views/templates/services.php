
<style type="text/css">
	.service-text * {overflow: hidden;}
	.single-service-item {height: 335px;}
</style>
<!--Page Title-->
        <section class="bredcrumb">
			<div class="bg-image text-center" style="background-image: url('<?php echo base_url(); ?>/assets/frontend/images/resources/banner.jpg');">
				<h1>Services</h1>
			</div>
			<div class="">
				<ul class= "middle">
					<li><a href="index-2.html">Home</a></li>
					<li><a class="inner" href="#">Services</a></li>
				</ul>
			</div>
		</section>
        <!--Page Title Ends-->
		
		<section class="our-services">
			<div class="container">
				<div class="sec-title">
					<h2 class="center">Our Services</h2>
					<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Perspiciatis unde omnis iste natus error sit.</p>
				</div>
				<div class="row clearfix">
					<!--Start single service icon-->

					<?php
					$data['services'] = $this->Service_Model->get_services(); 
					foreach ($data['services'] as $service) { 
					//echo "<pre>"; print_r($service); die;

						?>
						

					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
						<div class="single-service-item">
						
							<div class="service-left-bg"></div>
							<div class="service-icon">
								<img src="<?php echo site_url();?>/assets/images/services/<?php echo $service['image']; ?>" alt="">
							</div>
							<div class="service-text">
								<h4><a href="<?php echo base_url(); ?>services/single_service/<?php echo base64_encode($service['id']); ?>" ><?php echo $service['name']; ?></a></h4>
								<?php echo word_limiter($service['short_description'], 30)?>
								<a class="read-more" href="<?php echo base_url(); ?>services/single_service/<?php echo base64_encode($service['id']); ?>">Read More</a>
								
							</div>
						</div>
					</div>
					<?php } ?>
					<!--End single service icon-->
					<!--Start single service icon-->
					
					<!--Start single service icon-->
					
					<!--End single service icon-->
					
				</div>
			</div>
		</section>


