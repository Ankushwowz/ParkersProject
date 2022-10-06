<!--Page Title-->
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
</style>
<?php //echo "<pre>"; print_r($viewservices['description']); 
//$serviceid=base64_decode($this->uri->segment(3));


//die; ?>
        <section class="bredcrumb">
			<div class="bg-image text-center" style="background-image: url('<?php echo base_url() ?>/assets/frontend/images/resources/banner.jpg');">
				<h1>Recruitment</h1>
			</div>
			<div class="">
				<ul class= "middle">
					<li><a href="<?php echo base_url(); ?>">Home</a></li>
					<li><a class="inner" href="#">Recruitment</a></li>
				</ul>
			</div>
		</section>
        <!--Page Title Ends-->
		
		<section class="service-single">
			<div class="container">
				<div class="row">     
					<div class="col-md-4 col-sm-12 col-xs-12">          
						<h5 class="heading_s">Current Opening</h5>
						<ul class="list-group">
							
							<?php foreach ($services as $service) { ?>
							<li class="list-group-item <?php if($service['id']=='12') { echo'serviceactive';}?>"><a href="<?php echo base_url(); ?>jobs/jobslist/<?php echo base64_encode($service['id']); ?>"><?php echo $service['name']; ?>(<?php echo $service['totalcount']; ?>)</a></li>
						<?php } ?>							
						</ul>
					</div>
					<div class="col-md-8 col-sm-12 col-xs-12">
						<div class="outer-box">
													
								
								<div class="content-box">
									<div class="sec-title">
										<h4><?php //echo $services['name']; ?></h4>
									</div>
									
										<?php $get_requruitment = $this->Jobs_Model->get_requruitment();
												//echo "<pre>"; print_r($get_requruitment); die;
										 ?>
									<div class="text">
										<div id="accordion">
										<?php echo $get_requruitment['description']; ?>
										</div>
									
									</div>
									
									
								</div>						                                                       
						</div>					
					</div>
				</div>
			</div>
		</section>
		
		<!-- Call to action -->
		<div class="promotion" style="padding-top:0">
		    <div class="container">
                <div class="inner_promotion">
                    <div class="row">
                        <div class="col-sm-12 col-md-10">
                            <div class="sec-title text-left">
		                        <h2 class="left">Looking for an Excellent business solution?</h2>
		                        <p>Building a refreshing and modern website that captures the attention of prospective customers and holds the attention of existing customers </p>
		                        <p>Creating effective video and multimedia advertising which will help your company communicate how you stand out from the pack. </p>
		                
		                     </div>
							
                        </div>
                        <div class="col-sm-12 col-md-2">
                        	<a href="<?php echo base_url('contactus') ?>" class="thm-btn inverse ">Contact us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
  $( function() {
    $( "#accordion" ).accordion({ header: "h3", collapsible: true, active: 0,heightStyle: "content" });
  } );
  </script>

 
