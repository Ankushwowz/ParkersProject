            <div class="page-header">
                <div class="page-header-title">
                    <h4>Dashboard</h4>
                </div>
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="#">
                                <i class="icofont icofont-home"></i>
                            </a>
                        </li>
                      
                        <li class="breadcrumb-item"><a href="#!">Dashboard</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="page-body dash">
                <div class="row">
                  
                   
                    <div class="col-md-12 col-xl-4">
                        <!-- table card start -->
                        <div class="card table-card">
                            <div class="">
							<a href="<?php echo base_url();?>administrator/users/viewusers/<?php echo base64_encode('4');?>">
                                <div class="row-table">
                                    <div class="col-sm-12 card-block-big br">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <i class="icofont icofont-ui-user text-success"></i>
                                            </div>
                                            <div class="col-sm-8 text-center">
                                              <h5><?php if(!empty($total_user['Customer_Support_Executives'])) { echo $total_user['Customer_Support_Executives'];} ?></h5>
                                                <span>Customer Support Executive</span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
								</a>
                            </div>
                           
                        </div>
                        <!-- table card end -->
                    </div>
             
			       <div class="col-md-12 col-xl-4">
                        <!-- table card start -->
                        <div class="card table-card">
                            <div class="">
							<a href="<?php echo base_url();?>administrator/users/viewusers/<?php echo base64_encode('6');?>">
                                <div class="row-table">
                                    <div class="col-sm-12 card-block-big br">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <i class="icofont icofont-ui-user text-success"></i>
                                            </div>
                                            <div class="col-sm-8 text-center">
                                                <h5><?php if(!empty($total_user['Client'])) { echo $total_user['Client'];} ?></h5>
                                                <span>Users</span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
								</a>
                            </div>
                           
                        </div>
                        <!-- table card end -->
                    </div>
             
                    <div class="col-md-12 col-xl-4">
                        <!-- table card start -->
                        <div class="card table-card">
                            <div class="">
							<a href="<?php echo base_url();?>administrator/completedsales">
                                <div class="row-table">
                                    <div class="col-sm-12 card-block-big br">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <i class="icofont icofont-cart-alt text-success"></i>
                                            </div>
                                            <div class="col-sm-8 text-center">
                                                <h5><?php echo count($completed_orders); ?></h5>
                                                <span>Sales</span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
							</a>
                            </div>
                           
                        </div>
                        <!-- table card end -->
                    </div>
                  </div>

                     <div class="row">

                        
                   <div class="col-md-12 col-xl-4">
                        <!-- table card start -->
                        <div class="card table-card">
                            <div class="">
							<a href="<?php echo base_url();?>administrator/resume">
                                <div class="row-table">
                                    <div class="col-sm-12 card-block-big br">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <i class="icofont icofont-ui-folder text-success"></i>
                                            </div>
                                            <div class="col-sm-8 text-center">
                                               <h5><?php if(!empty($total_resume)) { echo $total_resume;} ?></h5>
                                                <span>Resume</span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
								</a>
                            </div>
                           
                        </div>
                        <!-- table card end -->
                    </div>
                 
                   
                  
                   
                   
                </div>
            </div>
       