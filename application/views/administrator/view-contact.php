
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
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>administrator/viewcontact">Contacts</a>
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
                                <h5>View Contact -- <small style="text-decoration: underline;"><?php echo $contact_view['name']; ?></small></h5>
                               
                            </div>
                            <div class="card-block">
                                 <div class="col-sm-12">
                             <div class="col-sm-6" style="float:left;">
                              <div class="form-group row">

                                <label class="col-sm-4 col-form-label"><b>Service Name:- </b></label>
                                <div class="col-sm-8">
                                    <span><?php echo $contact_view['Service_name']; ?></span>
                                  
                                </div>
                                </div>
                                
                             <div class="form-group row">

                                <label class="col-sm-4 col-form-label"><b>Email:- </b></label>
                                <div class="col-sm-8">
                                    <span><?php echo $contact_view['email'];?></span>
                                  
                                </div>
                                </div> 
                                

                                     
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label"><b>Subject:- </b></label>
                                        <div class="col-sm-8">
                                             <span><?php echo $contact_view['subject'];?></span>
                                          
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label"><b>Message:- </b></label>
                                        <div class="col-sm-8">
                                             <span><?php echo $contact_view['message'];?></span>
                                          
                                        </div>
                                    </div>

                                                                      
                                     
                                   
                                
                               </div>

                               <div class="col-sm-6" style="float:left;">
                                
                                <div class="form-group row">

                                <label class="col-sm-4 col-form-label"><b>Name:- </b></label>
                                <div class="col-sm-8">
                                    <span><?php echo $contact_view['name']; ?></span>
                                  
                                </div>
                                </div> 
                               


                                <div class="form-group row">
                                        <label class="col-sm-4 col-form-label"><b>Phone:- </b></label>
                                        <div class="col-sm-8">
                                            <span><?php echo $contact_view['phone']; ?></span>
                                        </div>
                                    </div>

                                <?php if($contact_view['assignedby'] != ''){ ?>
                                 <div class="form-group row">
                                        <label class="col-sm-4 col-form-label"><b>Assigned By:- </b></label>
                                        <div class="col-sm-8">
                                             <span><?php echo $contact_view['assignedby'];?></span>
                                          
                                        </div>
                                    </div>    
                                     <?php } ?>
                                
                               </div>

                               </div>

                           

                                   
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>
                    </div>

                    
                        <!-- Basic Form Inputs card end -->
                   
