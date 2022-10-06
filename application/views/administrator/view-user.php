    <div class="page-header">
                <div class="page-header-title">
                    <h4>Users</h4>
                </div>
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url(); ?>administrator/dashboard">
                                <i class="icofont icofont-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>administrator/users/users">Users</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">View Users</a>
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
                                <h5>View User -- <small style="text-decoration: underline;"><?php echo $user['username']; ?></small></h5>
                                <h5 style="float:right;"><b><?php echo $user['role_name'];?></b></h5>
                            </div>
                            <div class="card-block">
                                 <div class="col-sm-12">
                             <div class="col-sm-6" style="float:left;">
                             <div class="form-group row">

                                <label class="col-sm-4 col-form-label"><b>Name</b></label>
                                <div class="col-sm-8">
                                    <span><?php echo $user['first_name'];?> <?php if(!empty($user['last_name'])) { echo $user['last_name'];}?></span>
                                  
                                </div>
                                </div> 
								

                                     <div class="form-group row">
                                        <label class="col-sm-4 col-form-label"><b>User Name</b></label>
                                        <div class="col-sm-8">
                                            <span><?php echo $user['username']; ?></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label"><b>Email</b></label>
                                        <div class="col-sm-8">
                                             <span><?php echo $user['email'];?></span>
                                          
                                        </div>
                                    </div>
									
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label"><b>Gender</b></label>
                                        <div class="col-sm-8">
                                            <span><?php echo $user['gender']; ?></span>
                                        </div>
                                    </div> 
									  <div class="form-group row">
                                        <label class="col-sm-4 col-form-label"><b>Date Of Birth</b></label>
                                        <div class="col-sm-8">
                                            <span><?php if(!empty($user['dob'])) { echo date("M d,Y", strtotime($user['dob'])); } ?></span>
                                        </div>
                                    </div> 
                                   
                                
                               </div>

                               <div class="col-sm-6" style="float:left;">
                            
                               

                                  
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label"><b>Country</b></label>
                                        <div class="col-sm-8">
                                             <span><?php echo $user['countryName'];?></span>
                                          
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label"><b>State</b></label>
                                        <div class="col-sm-8">
                                             <span><?php echo $user['stateName'];?></span>
                                          
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label"><b>Zipcode</b></label>
                                        <div class="col-sm-8">
                                             <span><?php echo $user['zipcode'];?></span>
                                          
                                        </div>
                                    </div>
                                
                               </div>

                               </div>


                                   
                                </div>
                            </div>
                        </div>
                        <!-- Basic Form Inputs card end -->
                   

    