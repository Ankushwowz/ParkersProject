<!-- <style>
a.cls-unread {padding:0 !important;}
</style> -->

<body class="horizontal-static">
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="ball-scale">
            <div></div>
        </div>
    </div>

    <nav class="navbar header-navbar">
        <div class="navbar-wrapper">
            <div class="navbar-logo">
                <a class="mobile-menu" id="mobile-collapse" href="#!">
                    <i class="ti-menu"></i>
                </a>
                <a class="mobile-search morphsearch-search" href="#">
                    <i class="ti-search"></i>
                </a>
                <a href="<?php echo base_url(); ?>administrator/dashboard">
                 <?php if($this->session->userdata('image') != ""){ ?>
                        <img src="<?php echo base_url(); ?>assets/images/<?php echo $this->session->userdata('site_logo'); ?>" alt="Site Logo" class="img-fluid" style="width: auto; height: 30px;" >
                    <?php }else{ ?>
                         <img class="img-fluid" src="<?php echo base_url(); ?>admintemplate/assets/images/logo.png" alt="Theme-Logo" />
                    <?php } ?>

                   
                </a>
                <a class="mobile-options">
                    <i class="ti-more"></i>
                </a>
            </div>
            <div class="navbar-container container-fluid">
                <div>
                    <ul class="nav-left">
                        <li>
                            <a id="collapse-menu" href="#">
                                <i class="ti-menu"></i>
                            </a>
                        </li>
                        <!--  <li>
                            <a class="main-search morphsearch-search" href="#">
                                <!-- themify icon -->
                               <!--   <i class="ti-search"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#!" onclick="javascript:toggleFullScreen()">
                                <i class="ti-fullscreen"></i>
                            </a>
                        </li>
                        <!-- <li class="mega-menu-top">
                            <a href="#">
              Mega
              <i class="ti-angle-down"></i>
            </a>
                            <ul class="show-notification row">
                                <li class="col-sm-3">
                                    <h6 class="mega-menu-title">Popular Links</h6>
                                    <ul class="mega-menu-links">
                                        <li><a href="form-elements-component.html">Form Elements</a></li>
                                        <li><a href="button.html">Buttons</a></li>
                                        <li><a href="map-google.html">Maps</a></li>
                                        <li><a href="user-card.html">Contact Cards</a></li>
                                        <li><a href="user-profile.html">User Information</a></li>
                                        <li><a href="auth-lock-screen.html">Lock Screen</a></li>
                                    </ul>
                                </li>
                                <li class="col-sm-3">
                                    <h6 class="mega-menu-title">Mailbox</h6>
                                    <ul class="mega-mailbox">
                                        <li>
                                            <a href="#" class="media">
                                                <div class="media-left">
                                                    <i class="ti-folder"></i>
                                                </div>
                                                <div class="media-body">
                                                    <h5>Data Backup</h5>
                                                    <small class="text-muted">Store your data</small>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="media">
                                                <div class="media-left">
                                                    <i class="ti-headphone-alt"></i>
                                                </div>
                                                <div class="media-body">
                                                    <h5>Support</h5>
                                                    <small class="text-muted">24-hour support</small>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="media">
                                                <div class="media-left">
                                                    <i class="ti-dropbox"></i>
                                                </div>
                                                <div class="media-body">
                                                    <h5>Drop-box</h5>
                                                    <small class="text-muted">Store large amount of data in one-box only
                                                    </small>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="media">
                                                <div class="media-left">
                                                    <i class="ti-location-pin"></i>
                                                </div>
                                                <div class="media-body">
                                                    <h5>Location</h5>
                                                    <small class="text-muted">Find Your Location with ease of use</small>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="col-sm-3">
                                    <h6 class="mega-menu-title">Gallery</h6>
                                    <div class="row m-b-20">
                                        <div class="col-sm-4"><img class="img-fluid img-thumbnail" src="<?php echo base_url(); ?>admintemplate/assets/images/mega-menu/01.jpg" alt="Gallery-1">
                                        </div>
                                        <div class="col-sm-4"><img class="img-fluid img-thumbnail" src="<?php echo base_url(); ?>admintemplate/assets/images/mega-menu/02.jpg" alt="Gallery-2">
                                        </div>
                                        <div class="col-sm-4"><img class="img-fluid img-thumbnail" src="<?php echo base_url(); ?>admintemplate/assets/images/mega-menu/03.jpg" alt="Gallery-3">
                                        </div>
                                    </div>
                                    <div class="row m-b-20">
                                        <div class="col-sm-4"><img class="img-fluid img-thumbnail" src="<?php echo base_url(); ?>admintemplate/assets/images/mega-menu/04.jpg" alt="Gallery-4">
                                        </div>
                                        <div class="col-sm-4"><img class="img-fluid img-thumbnail" src="<?php echo base_url(); ?>admintemplate/assets/images/mega-menu/05.jpg" alt="Gallery-5">
                                        </div>
                                        <div class="col-sm-4"><img class="img-fluid img-thumbnail" src="<?php echo base_url(); ?>admintemplate/assets/images/mega-menu/06.jpg" alt="Gallery-6">
                                        </div>
                                    </div>
                                    <button class="btn btn-primary btn-sm btn-block">Browse Gallery</button>
                                </li>
                                <li class="col-sm-3">
                                    <h6 class="mega-menu-title">Contact Us</h6>
                                    <div class="mega-menu-contact">
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-3 col-form-label">Name</label>
                                            <div class="col-9">
                                                <input class="form-control" type="text" placeholder="Artisanal kale" id="example-text-input">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-3 col-form-label">Email</label>
                                            <div class="col-9">
                                                <input class="form-control" type="email" placeholder="Enter your E-mail Id" id="example-search-input">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-3 col-form-label">Contact</label>
                                            <div class="col-9">
                                                <input class="form-control" type="number" placeholder="+91-9898989898" id="example-search-input">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="exampleTextarea" class="col-3 col-form-label">Message</label>
                                            <div class="col-9">
                                                <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li> -->
                    </ul>
                    <ul class="nav-right">
                       <!--  <li class="header-notification lng-dropdown">
                            <a href="#" id="dropdown-active-item">
                                <i class="flag-icon flag-icon-gb m-r-5"></i> English
                            </a>
                            <ul class="show-notification">
                                <li>
                                    <a href="#" data-lng="en">
                                        <i class="flag-icon flag-icon-gb m-r-5"></i> English
                                    </a>
                                </li>
                                <li>
                                    <a href="#" data-lng="es">
                                        <i class="flag-icon flag-icon-es m-r-5"></i> Spanish
                                    </a>
                                </li>
                                <li>
                                    <a href="#" data-lng="pt">
                                        <i class="flag-icon flag-icon-pt m-r-5"></i> Portuguese
                                    </a>
                                </li>
                                <li>
                                    <a href="#" data-lng="fr">
                                        <i class="flag-icon flag-icon-fr m-r-5"></i> French
                                    </a>
                                </li>
                            </ul>
                        </li> -->
                        <?php if($this->session->userdata('role_id')==1 || $this->session->userdata('role_id')==2 || $this->session->userdata('role_id')==3 || $this->session->userdata('role_id')==4){ ?>
                         <li class="header-notification">
                            <a href="#!">
                                <i class="ti-bell"></i>
                                <?php 
                                $total_admin_notifications = $this->Administrator_Model->total_admin_notifications();
                                $data['total_admin_notification'] = count($total_admin_notifications);
                                ?>
                                <span class="badge" id="notification-count"><?php echo $data['total_admin_notification']; ?></span>
                            </a>
                            <ul class="show-notification" id="notification-data">
							<?php  if(count($total_admin_notifications) > 0 ){	?>
                                <li>
                                    <h6>Notifications</h6>
                                    <label class="label label-danger">New</label>
                                </li>
                                <?php  
								     $data['admin_notifications'] = $this->Administrator_Model->total_admin_notifications();
									 	$message = 0;
										
										   foreach ($data['admin_notifications'] as $admin_notification) {

                                              if($message==5){
												  break;
											  }
    											   ?>  
												<li>
													<div class="media">
														<img class="d-flex align-self-center" src="<?php echo base_url(); ?>admintemplate/assets/images/user.png" alt="Generic placeholder image">
														<div class="media-body">
															<!-- <h5 class="notification-user">John Doe</h5> -->
															<p class="notification-msg"> 
															<?php if(!empty($admin_notification['contact_id'])) {
																$url ='administrator/viewcontact?msg='.$admin_notification['id'].'"';
															}
															else if(($admin_notification['order_id'])) {
																$url ='administrator/orderview/'.base64_encode($admin_notification['order_id']).'"';
															}
															else{
															 $url ='administrator/resume?msg='.$admin_notification['id'].'"';

															}  ?>                                           
																<a onclick="read_notification(<?php echo $admin_notification['id'];?>)" href="<?php echo base_url().$url;?>" class="cls-unread"><?php echo$admin_notification['message'] ; ?>
																</a>                                           
															</p>

															<!-- <span class="notification-time">30 minutes ago</span> -->
														</div>
													</div>
												</li><?php 
												$message  = $message  + 1;
											}
									
							}?>
                            </ul>
                        </li>
                    <?php } ?>
                      <li class="header-notification">
                            <a href="#!" class="displayChatbox role-cls cls-pad">
                                <?php echo $this->session->userdata('role'); ?>
                            </a>
                        </li> 
                         
                        <li class="user-profile header-notification">
                            <a href="#!">
                            <?php   if(!empty($UserProfileImage['image'])){ ?>
                                <img src="<?php echo base_url(); ?>assets/images/users/<?php echo $UserProfileImage['image']; ?>" alt="User-Profile-Image" style="border-radius: 25px;">
                            <?php }else{?>
                                <img src="<?php echo base_url(); ?>admintemplate/assets/images/user.png" alt="User-Profile-Image">
                            <?php } ?>
                                <span><?php echo $this->session->userdata('username'); ?></span>
                                <i class="ti-angle-down"></i>
                            </a>
                            <ul class="show-notification profile-notification">
                                <?php if($this->session->userdata('role_id')!=1){ ?>
                                <li>
                                    <a href="<?php echo base_url(); ?>administrator/update-profile">
                                        <i class="ti-user"></i> Profile
                                    </a>
                                </li>
								<?php } ?>
                                 <?php if($this->session->userdata('role_id')==1 || $this->session->userdata('role_id')==2){ ?>
                                <li>
                                    <a href="<?php echo base_url(); ?>administrator/change-password">
                                        <i class="ti-lock"></i> Change Password
                                    </a>
                                </li>
								 <?php } ?>
                                <!-- <li>
                                    <a href="<?php echo base_url(); ?>administrator/inbox">
                                        <i class="ti-email"></i> My Messages
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>administrator/settings">
                                        <i class="ti-settings"></i> Settings
                                    </a>
                                </li> -->
                                <li>
                                    <a href="<?php echo base_url(); ?>administrator/logout">
                                        <i class="ti-layout-sidebar-left"></i> Logout
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                  
                </div>
            </div>
        </div>
    </nav>
    <!-- Menu header end -->
<style type="text/css">
    .nav-left-new {
    display: flex;
    float: left;
}
.nav-left-new > li {
    padding: 0 45px 0 0;
}
.nav-left-new a {
    color: #ffffff;
}
.nav-left-new a:hover {
    color: rgb(26,188,156);
}
.role-class {color: #1ABC9C;}
</style>