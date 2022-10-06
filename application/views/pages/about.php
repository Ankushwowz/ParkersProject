<!--Page Title-->
      <style>
          .how-box-one{height:460px;}
          
          
      </style>
        <section class="bredcrumb">
			<div class="bg-image text-center" style="background-image: url('<?php echo base_url(); ?>assets/frontend/images/resources/banner.jpg');">
				<h1>about us</h1>
			</div>
			<div class="">
				<ul class= "middle">
					<li><a href="<?php echo base_url(); ?>">Home</a></li>
					<li><a class="inner" href="#">About us</a></li>
				</ul>
			</div>
		</section>
        <!--Page Title Ends-->
		
		<section class="about">
			<div class="container">
				<div class="item-list">
					<div class="row">
						
						<div class="col-md-7 col-sm-12 col-xs-12">
			                <div class="sec-title">
								<h2 class="left">About Us</h2>
								<p><?php $about = $this->Service_Model->get_aboutus();
									//echo "<pre>"; print_r($about); die;
									 ?>
									 <?php echo word_limiter($about['content']); ?></p>
							</div>
			                
			                <ul class="s-list list-unstyled mb-20">
			                  <li><span class="fa fa-check"></span>Here to help you nail the digital age</li>
			                  <li><span class="fa fa-check"></span>Success happens here</li>
			                  <li><span class="fa fa-check"></span>Helping your digital ideas come to reality</li>
			                  <li><span class="fa fa-check"></span>Here to shape your digital presence</li>
			                  <li><span class="fa fa-check"></span>Make it Digitally Yours</li>
			                  <li><span class="fa fa-check"></span>Taking you to a digital level</li>
			                </ul>
			                <ul class="about-links text-left">
								<li><a href="<?php echo base_url('services'); ?>" class="thm-btn style-two">View Services</a></li>
								<li><a href="<?php echo base_url('contactus'); ?> " class="thm-btn style-two">Contact us</a></li>
							</ul>

			              </div>
						<div class="col-md-5 col-sm-10 col-xs-12">
							<div class="item item-about">
								<figure class="image-box">
									<img src="<?php echo base_url(); ?>assets/frontend/images/about/1.jpg" alt="" />
								</figure>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		
		<section class="countup-section bg-image" style="background-image: url('<?php echo base_url(); ?>assets/frontend/images/background/bg-1.jpg'); background-attachment: fixed;">
			<div class="container">
				<div class="row">
					<div class="col-sm-4 col-6">
						<div class="text-center single_block">
							<div class="icon-box">
								<img class="counter-icon" src="<?php echo base_url(); ?>assets/frontend/images/icons/count-1.png" alt="">
							</div>
							<div class="counter" data-speed="3000" data-stop="1650">40</div><span class="count">+</span>
							<h3>Experienced Consultants</h3>
						</div>
					</div>
					<div class="col-sm-4 col-6">
						<div class="text-center single_block">
							<div class="icon-box">
								<img class="counter-icon" src="<?php echo base_url(); ?>assets/frontend/images/icons/count-2.png" alt="">
							</div>
							<div class="counter">200</div><span class="count">+</span>
							<h3>Successfull Projects</h3>
						</div>
					</div>
				
					<div class="col-sm-4 col-6">
						<div class="text-center single_block">
							<div class="icon-box">
								<img class="counter-icon" src="<?php echo base_url(); ?>assets/frontend/images/icons/count-4.png" alt="">
							</div>
							<div class="counter">200</div><span class="count">+</span>
							<h3>Satisfied Customers</h3>
						</div>
					</div>
				</div>
			</div>
		</section>


		<section id="how-it-work" class="how-it-work">
          	<div class="container text-center">
            	<div class="sec-title">
					<h2 class="center">Our main Features</h2>
					<p>We provide the best service and consultants to help you decide the best business solutions</p>
				</div>
	            <div class="how-one-container">
	                <!--how it work Box-->
	                <div class="col-md-4 col-sm-6 col-xs-12">
	                	<div class="how-box-one" style="background: linear-gradient(rgba(3, 61, 117, 0.9),rgba(3, 61, 117, 0.9)),url(images/news/1.jpg);">
		                   <div class="inner-box">
		                      <div class="icon-box">
		                         <img src="<?php echo base_url(); ?>assets/frontend/images/icons/how-1.png" alt="">
		                      </div>
		                      <h4><a href="#">Aim of Our Business</a></h4>
		                      <div class="text">Our business aims to provide not only the best digital solution but also consultants that has an eye for the success of your project. We make our services readily available and tailored fit based on your business needs. We strive to be the go-to solutions expert and the one-stop-shop for everything you need as you take your business to the digital level.</div>
		                   </div>
		                </div>
	                </div>

	                <!--how it work Box-->
	                <div class="col-md-4 col-sm-6 col-xs-12">
	                	<div class="how-box-one" style="background: linear-gradient(rgba(3, 61, 117, 0.9),rgba(3, 61, 117, 0.9)),url(<?php echo base_url(); ?>assets/frontend/images/news/2.jpg);">
		                   <div class="inner-box">
		                      <div class="icon-box">
		                         <img src="<?php echo base_url(); ?>assets/frontend/images/icons/how-2.png" alt="">
		                      </div>
		                      <h4><a href="#">Business Analytics Policy</a></h4>
		                      <div class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores deleniti nisi odit qui tempora porro tempore amet, eveniet at, illum recusa ndaee.</div>
		                   </div>
		                </div>
	                </div>

	                <!--how it work Box-->
	                <div class="col-md-4 col-sm-6 col-xs-12">
	                	<div class="how-box-one" style="background: linear-gradient(rgba(3, 61, 117, 0.9),rgba(3, 61, 117, 0.9)),url(<?php echo base_url(); ?>assets/frontend/images/news/3.jpg);">
		                   <div class="inner-box">
		                      <div class="icon-box">
		                         <img src="<?php echo base_url(); ?>assets/frontend/images/icons/how-3.png" alt="">
		                      </div>
		                      <h4><a href="#">Global consumer insights</a></h4>
		                      <div class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores deleniti nisi odit qui tempora porro tempore amet, eveniet at, illum recusa ndaee.</div>
		                   </div>
		                </div>
	                </div>
	                

	            </div>
            </div>
        </section>

        <section class="ask-question">
           <div class="container">
             <div class="row">
               <div class="col-md-6 pull-right col-sm-10 col-sm-offset-1 col-md-offset-0 col-xs-12">
                 <!--ask item -->
                 <div class="ask-box active">
                    <div class="ask-circle">
                      <span class="fa fa-search"></span>
                    </div>
                    <div class="ask-info">
                      <h3 class="text-white">ARE YOU LOOKING FOR A CONSULTING?</h3>
                      <p class="text-white">Talk to an expert for your solutions</p>
                    </div>
                    <div class="ask-arrow">
                      <a href="#"><span class="fa fa-angle-right"></span></a>
                    </div>
                 </div>
               </div>

             </div>
             <div class="row only_for_mobile" style="visibility: hidden;">
             	<div class="col-md-6 pull-right col-sm-10 col-sm-offset-1 col-md-offset-0 col-xs-12">
                 <!--ask item -->
                 <div class="ask-box active mt-30">
                    <div class="ask-circle">
                      <span class="fa fa-usd"></span>
                    </div>
                    <div class="ask-info">
                      <h3 class="text-white">LOOKING FOR EARNING MORE MONEY ?</h3>
                      <p class="text-white">lorem ipsum dolor sit elit. Perferendis veniam exercitationem ducimus  magni.</p>
                    </div>
                    <div class="ask-arrow">
                      <a href="#"><span class="fa fa-angle-right"></span></a>
                    </div>
                 </div>
               </div>
             </div>
           </div>
         </section>

		