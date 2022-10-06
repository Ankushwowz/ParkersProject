<?php 
//echo "<pre>"; print_r($view_resume['full_name']); die; ?>
    <div class="page-header">
                <div class="page-header-title">
                    <h4><?php echo $title; ?></h4>
                </div>
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url(); ?>administrator/dashboard">
                                <i class="icofont icofont-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>administrator/resume">Resume</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!"><?php echo $title; ?></a>
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
                                <h5>View Resume -- <small style="text-decoration: underline;"><?php echo $view_resume['full_name']; ?></small></h5>
                               
                            </div>
                            <div class="card-block">
                                 <div class="col-sm-12">
                             <div class="col-sm-6" style="float:left;">
                              <div class="form-group row">

                                <label class="col-sm-4 col-form-label"><b>Service Name:- </b></label>
                                <div class="col-sm-8">
                                    <span><?php echo $view_resume['Service_name']; ?></span>
                                  
                                </div>
                                </div>   
                             <div class="form-group row">

                                <label class="col-sm-4 col-form-label"><b>Name:- </b></label>
                                <div class="col-sm-8">
                                    <span><?php echo $view_resume['full_name'];?></span>
                                  
                                </div>
                                </div> 
                                

                                     <div class="form-group row">
                                        <label class="col-sm-4 col-form-label"><b>Title:- </b></label>
                                        <div class="col-sm-8">
                                            <span><?php echo $view_resume['title']; ?></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label"><b>Email:- </b></label>
                                        <div class="col-sm-8">
                                             <span><?php echo $view_resume['email'];?></span>
                                          
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label"><b>Phone:- </b></label>
                                        <div class="col-sm-8">
                                             <span><?php echo $view_resume['phone'];?></span>
                                          
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label"><b>Hear About Us:- </b></label>
                                        <div class="col-sm-8">
                                             <span><?php echo $view_resume['hear_about_us'];?></span>
                                          
                                        </div>
                                    </div>                                  
                                     
                                   
                                
                               </div>

                               <div class="col-sm-6" style="float:left;">
                            
                               

                                     <div class="form-group row">
                                        <label class="col-sm-4 col-form-label"><b>Apply For Job:- </b></label>
                                        <div class="col-sm-8">
                                            <span><?php echo $view_resume['job_title']; ?></span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label"><b>Assigned By:- </b></label>
                                        <div class="col-sm-8">
                                             <span><?php echo $view_resume['assignedby'];?></span>
                                          
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label"><b>City:- </b></label>
                                        <div class="col-sm-8">
                                             <span><?php echo $view_resume['city'];?></span>
                                          
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label"><b>Pincode:-</b></label>
                                        <div class="col-sm-8">
                                             <span><?php echo $view_resume['pincode'];?></span>
                                          
                                        </div>
                                    </div>


                                     <div class="form-group row">
                                        <label class="col-sm-4 col-form-label"><b>Start Date:- </b></label>
                                        <div class="col-sm-8">
                                             <span><?php echo $view_resume['start_date'];?></span>
                                          
                                        </div>
                                    </div>   


                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label"><b>Address:- </b></label>
                                        <div class="col-sm-8">
                                             <span><?php echo $view_resume['address'];?></span>
                                          
                                        </div>
                                    </div>
                                
                               </div>

                               </div>
					<h3 style="padding:20px;">Uploads Files</h3>
                            <div class="col-sm-12">
							<?php if(!empty($view_resume['image'])) {?>
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">
                                        <b>
									<?php $ext = pathinfo($view_resume['image'], PATHINFO_EXTENSION);

									if($ext=='pdf'){
									$keyname = 'pdf.png';
									}
									if($ext=='docx' || $ext=='xlsx' || $ext=='doc'){
									$keyname = 'word.png';
									}
									if($ext=='png' || $ext=='jpg' || $ext=='gif'){
									$keyname = 'file_image.png';
									}

									?>
                                        <img src="<?php echo base_url();?>/assets/images/orderfiles/<?php echo $keyname;?>" width="30" height="30">
                                        </b>
                                    </label> 
                                    <div class="col-sm-8">
                                        <span class="text_style">
										
                                            <a target="_blank" href="<?php echo base_url(); ?>assets/images/jobs/<?php echo $view_resume['image'] ?>"><?php echo $view_resume['image'] ?></a>
                                        </span>
                                    </div>
                                </div>
                                
                            </div> 
							<?php } ?>
						<?php if(!empty($view_resume['image2'])) { ?>
						<div class="col-sm-6">
									<div class="form-group row">
										<label class="col-sm-4 col-form-label">
											<b>
										<?php $ext1 = pathinfo($view_resume['image2'], PATHINFO_EXTENSION);

										if($ext1=='pdf'){
										$keyname1 = 'pdf.png';
										}
										if($ext1=='docx' || $ext1=='xlsx'){
										$keyname1 = 'word.png';
										}
										if($ext1=='png' || $ext1=='jpg' || $ext1=='gif'){
										$keyname1 = 'file_image.png';
										}

										?>
											<img src="<?php echo base_url();?>/assets/images/orderfiles/<?php echo $keyname1;?>" width="30" height="30">
											</b>
										</label> 
										<div class="col-sm-8">
											<span class="text_style">
											
												<a target="_blank" href="<?php echo base_url(); ?>assets/images/jobs/<?php echo $view_resume['image2'] ?>"><?php echo $view_resume['image2'] ?></a>
											</span>
										</div>
									</div>
									
						</div> 
						<?php } ?>						
                            </div>

                                   
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        
                    </div>

                    <div class="row">
                            
                            </div>
                        <!-- Basic Form Inputs card end -->
                   
