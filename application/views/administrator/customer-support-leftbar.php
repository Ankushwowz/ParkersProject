<?php $url= explode('/',$_SERVER['REQUEST_URI']); ?>
<style> .inner-active{ color: #1ABC9C !important; } </style>
     <!-- Menu aside start -->
    <div class="main-menu">
              <!--<div class="main-menu-header">
           <ul class="nav-left-new">
                        <li>
                            <a id="collapse-menu" href="#">
                                <i class="ti-home"></i>
                            </a>
                        </li>
                        <li>
                            <a class="main-search morphsearch-search" href="#">
                                <i class="ti-user   "></i>
                            </a>
                        </li>
                        <li>
                            <a class="main-search morphsearch-search" href="#">
                                <i class="ti-settings"></i>
                            </a>
                        </li>
                        <li>
                            <a class="main-search morphsearch-search" href="#">
                                <i class="ti-email"></i>
                            </a>
                        </li>
                   
                    </ul>
        </div>-->
        <div class="main-menu-content">
            <ul class="main-navigation">
             <li class="nav-item <?php if(in_array('dashboard',$url)) { echo "has-class";}?>">
                    <a href="<?php echo base_url(); ?>administrator/dashboard">
                        <i class="ti-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item  <?php if(in_array('users',$url) || in_array('edituser',$url)) { echo "has-class";}?>">
                    <a href="#!">
                        <i class="ti-layout"></i>
                        <span>Users</span>
                    </a>
                    <ul class="tree-1">
                        <li><a class="<?php if(in_array('add-user',$url)) { echo "inner-active";}?>"  href="<?php echo base_url(); ?>administrator/users/add-user">Add User</a></li>
                        <li><a  class="<?php if(in_array('viewusers',$url)) { echo "inner-active";}?>" href="<?php echo base_url(); ?>administrator/users/viewusers">View Users</a></li>
                    </ul>
                </li>

                  <li class="nav-item <?php if(in_array('pendingsale',$url) || in_array('salereports',$url) || in_array('completedsales',$url) || in_array('orderplaced',$url) || in_array('appointment',$url) ) { echo "has-class";}?>">
                    <a href="#!">
                        <i class="ti-layout"></i>
                        <span>Sales</span>
                    </a>
                    <ul class="tree-1">
                        
                        <li><a  class="<?php if(in_array('saleservices',$url)) { echo "inner-active";}?>" href="<?php echo base_url(); ?>saleservices">Place an Order</a></li>
                        <!--<li>
						<a class="<?php //if(in_array('viewsales',$url)) { echo "inner-active";}?>"  href="<?php //echo base_url(); ?>administrator/viewsales">View Sales</a>
						</li>-->
						
						
						<li><a class="<?php if(in_array('pendingsale',$url)) { echo "inner-active";}?>"  href="<?php echo base_url(); ?>administrator/pendingsale">Pending Sale</a></li>
						<li><a  class="<?php if(in_array('completedsales',$url)) { echo "inner-active";}?>" href="<?php echo 	base_url(); ?>administrator/completedsales">Completed Sales</a></li>
						
							<li><a class="<?php if(in_array('orderplaced',$url)) { echo "inner-active";}?>"  href="<?php echo base_url(); ?>administrator/orderplaced">Order Placed</a></li>
						
							<li><a class="<?php if(in_array('salereports',$url)) { echo "inner-active";}?>"  href="<?php echo base_url(); ?>administrator/salereports">Sale Reports</a></li>
							<li><a class="<?php if(in_array('appointment',$url)) { echo "inner-active";}?>"  href="<?php echo base_url(); ?>administrator/appointment">Appointment</a></li>
                    </ul>
                </li>
                
                
                <li class="nav-item <?php if(in_array('resume',$url) || in_array('assign-resume',$url)) { echo "has-class";}?>">
                    <a href="#!">
                        <i class="ti-layout"></i>
                        <span>Resume</span>
                    </a>
                    <ul class="tree-1">
                        
                       <li><a class="<?php if(in_array('resume',$url)) { echo "inner-active";}?>" href="<?php echo base_url(); ?>administrator/resume">View Resumes</a></li>
                      <li><a  class="<?php if(in_array('assign-resume',$url)) { echo "inner-active";}?>" href="<?php echo base_url(); ?>administrator/assign-resume">Resume Assignment</a></li>
                    </ul>
                </li>
                  
                
            </ul>
        </div>
    </div>
    <!-- Menu aside end -->
     <!-- Main-body start -->
    <!-- Main-body start -->
    <div class="main-body">
        <div class="page-wrapper">
            <!-- Page-header start -->
			
				
			 <?php if($this->session->flashdata('create_milestones')): ?>
      <?php echo '<div class="alert alert-success icons-alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="icofont icofont-close-line-circled"></i>
                </button>
                <p><strong>Success! &nbsp;&nbsp;</strong>'.$this->session->flashdata('create_milestones').'</p></div>'; ?>
    <?php endif; ?>
			
				 <?php if($this->session->flashdata('neworder')): ?>
      <?php echo '<div class="alert alert-success icons-alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="icofont icofont-close-line-circled"></i>
                </button>
                <p><strong>Success! &nbsp;&nbsp;</strong>'.$this->session->flashdata('neworder').'</p></div>'; ?>
    <?php endif; ?>
	
			
			
			 <?php if($this->session->flashdata('orderChangeStatus')): ?>
      <?php echo '<div class="alert alert-success icons-alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="icofont icofont-close-line-circled"></i>
                </button>
                <p><strong>Success! &nbsp;&nbsp;</strong>'.$this->session->flashdata('orderChangeStatus').'</p></div>'; ?>
    <?php endif; ?>
			 <?php if($this->session->flashdata('assignSale')): ?>
      <?php echo '<div class="alert alert-success icons-alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="icofont icofont-close-line-circled"></i>
                </button>
                <p><strong>Success! &nbsp;&nbsp;</strong>'.$this->session->flashdata('assignSale').'</p></div>'; ?>
    <?php endif; ?>
    <?php if($this->session->flashdata('success')): ?>
      <?php echo '<div class="alert alert-success icons-alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="icofont icofont-close-line-circled"></i>
                </button>
                <p><strong>Success! &nbsp;&nbsp;</strong>'.$this->session->flashdata('success').'</p></div>'; ?>
    <?php endif; ?>
    <?php if($this->session->flashdata('danger')): ?>
      <?php echo '<div class="alert alert-danger icons-alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="icofont icofont-close-line-circled"></i>
                </button>
                <p><strong>Error! &nbsp;&nbsp;</strong>'.$this->session->flashdata('danger').'</p></div>'; ?>
    <?php endif; ?>

     <?php if(validation_errors() != null): ?>
      <?php echo '<div class="alert alert-warning icons-alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="icofont icofont-close-line-circled"></i>
                </button>
                <p><strong>Alert! &nbsp;&nbsp;</strong>'.validation_errors().'</p></div>'; ?>
    <?php endif; ?>

    <?php if($this->session->flashdata('match_old_password')): ?>
      <?php echo '<p class="alert alert-success">'.$this->session->flashdata('match_old_password').'</p>'; ?>
    <?php endif; ?>


     



