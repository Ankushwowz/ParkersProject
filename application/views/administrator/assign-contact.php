
      <!-- Page-header start -->
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
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>jobs/assigneresume">Assigned Contacts</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!"><?php echo $title; ?></a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Page-header end -->
            <!-- Page-body start -->
            <div class="page-body">
                <!-- DOM/Jquery table start $testimonials-->
                <div class="card">
                    <div class="card-block">
                        <div class="table-responsive dt-responsive">
                            <table id="dom-jqry" class="table table-striped table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <!-- <th>Image</th> -->
                                        
                                       
                                        <th>Service Name</th>                                        
                                        <th>Name</th>                                        
                                        <th>Email</th>
                                        <th>Subject</th>
                                        <th>Message</th>
                                        <th>Franchise Name</th>                                       
                                        <th>CSE</th>                                       
                                        <th>Assigned By</th>                                       
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                 <?php
                                 $count = 1;
                                  foreach($assigne_contact as $assigned) : 
                                   // echo "<pre>"; print_r($resume); die;
                                    ?>
                                    <tr>
                                        <td class="resume_id"><?php echo $count; ?></td>
                                        <!-- <td>
                                            <img width="20px;" src="<?php //echo site_url();?>assets/images/jobs/<?php //echo $resume['image']; ?> ">                                           
                                        </td> -->
                                        
                                        <td><?php echo $assigned['Service_name']; ?></td>
                                        <td><?php echo $assigned['name']; ?></td>
                                        <td><?php echo $assigned['email']; ?></td>
                                        <td><?php echo $assigned['subject']; ?></td>
                                        <td><?php echo $assigned['message']; ?></td>  
                                        <td><?php echo $assigned['french_user']; ?></td>                                        
                                        <td><?php echo $assigned['cse_user']; ?></td>                                        
                                        <td><?php echo $assigned['assignedby']; ?></td>                                        
                                        
                                    </tr>
                                <?php $count++; endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- DOM/Jquery table end -->
                        
                      

                    </div>
                </div>
            </div>
            <!-- Page body end -->
        </div>
    </div>
    <!-- Main-body end -->  


