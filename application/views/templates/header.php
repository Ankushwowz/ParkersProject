<html>
<!--   <head>
    <title>CI Blog</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css">
  </head> -->

<head>
  <meta charset="UTF-8">
  <title>Parkers Business Consultancy</title> 
  
  <!-- mobile responsive meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/style.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/responsive.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/fonts/flaticon.css" />
  <!--favicon-->
  <link rel="shortcut icon" href="images/favicon/favicon.ico">
  <script src="http://cdn.ckeditor.com/4.7.1/full/ckeditor.js"></script>
  
</head>


<body>
  <div class="boxed_wrapper">
  
  <?php $role_array = array('1','2','4');
  if (!in_array($this->session->userdata('role_id'), $role_array)){  ?>
   <div class="crypto-top-strip crypto-bgcolor" style="padding:17px 0px;">
            <div class="container">
                <div class="row">
                    <aside class="col-md-6">
                        <ul class="crypto-userinfo" style="display:none;">
                           <!-- <li><i class="fa fa-envelope-o"></i> contact@parkersconsultancy.co.uk </li>
                            <li><i class="fa fa-phone"></i> +0203 126 4428</li>-->
							
                        </ul>
                    </aside>
                 
                </div>
            </div>
        </div><?php 
	 
  }
  
  ?>
  
    
	
	<!-- Menu -->
    <div class="mainmenu-area stricky">
        <div class="container">
          <div class="row">
            <div class="col-md-3">
            <div class="main-logo main-logo2">
              <a href="<?php echo base_url(); ?>">
                <?php if($this->session->userdata('image') != ""){ ?>
                        <img src="<?php echo base_url(); ?>assets/images/<?php echo $this->session->userdata('site_logo'); ?>" alt="Site Logo" class="img-fluid" style="width: auto; height: 50px;" >
                    <?php }else{ ?>
                         <img class="img-fluid" src="<?php echo base_url(); ?>admintemplate/assets/images/logo.png" alt="Theme-Logo" />
                    <?php } ?>             
              </a>
            </div>
          </div>
          <div class="col-md-9 menu-column">
          <?php  if (!in_array($this->session->userdata('role_id'), $role_array)){ 
			?>
			<nav class="main-menu">
                    <div class="navbar-header">     
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="navbar-collapse collapse clearfix">
                        <ul class="navigation clearfix">
                           
                            <li class="<?php if($pagename == '/' || $pagename == '/home') {echo'current'; }?>"><a href="<?php echo base_url(); ?>">home</a></li>                 
                            
                            <li class="dropdown  <?php if($pagename == '/about') {echo'current'; }?>"><a href="<?php echo base_url(); ?>about">about</a></li>

                            <li class="dropdown <?php if(strpos($pagename,'services')) { echo'current'; }?>"><a href="<?php echo base_url('services'); ?>">service</a></li>

                            <li class="dropdown <?php if($pagename == '/jobs') {echo'current'; }?>"><a href="<?php echo base_url() ?>jobs">recruitment</a>
                              <!-- <ul><li><a href="<?php echo base_url() ?>jobs">Job Apply</a></li></ul> -->
                            </li>

                            <li class="dropdown <?php if($pagename == '/business-consultation') { echo'current'; }?>"><a href="<?php echo base_url(); ?>business-consultation">business consultation</a></li>
                            <li class="<?php if($pagename == '/contactus') { echo'current'; }?>"><a href="<?php echo base_url(); ?>contactus">Contact</a></li>
                        </ul>

                        <ul class="mobile-menu clearfix">

                            <li><a href="<?php echo base_url(); ?>">home</a></li>                 
                            
                            <li class="current"><a href="<?php echo base_url('about') ?>">about</a></li>

                            <li><a href="<?php echo base_url('services'); ?>">service</a></li>
                            <li><a href="<?php echo base_url('jobs'); ?>">recruitment</a></li>
                            <li><a href="<?php echo base_url(); ?>business-consultation">Business Consultation</a></li>

                            <li><a href="<?php echo base_url(); ?>contactus">Contact</a></li>

                        </ul>
                    </div>
                </nav>
			<?php } ?>


		<?php if (in_array($this->session->userdata('role_id'), $role_array)){?>
			<div class="right-area1">
               <div class="link_btn float_right">
                  <a href="<?php echo base_url()?>administrator/dashboard" class="thm-btn">Admin panel</a>
               </div>
            </div>  
		  
			<?php }?>
		 </div>
            
          </div>
            
        </div>
    </div>
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
  <!-- <body>
  <nav class="navbar navbar-inverse">
  	<div class="container">
  		<div class="navbar-header">
  		<a class="navbar-brand" href="<?php echo base_url(); ?>">CI Blogs</a>	
  		</div>
  		<div id="navbar">
  		 <ul class="nav navbar-nav">
  		 	<li><a href="<?php echo base_url(); ?>">Home</a></li>
  		 	<li><a href="<?php echo base_url(); ?>about">About</a></li>
        <li><a href="<?php echo base_url(); ?>posts">Blog</a></li>
         <li><a href="<?php echo base_url(); ?>categories">Category</a></li>
  		 </ul>	
       <ul class="nav navbar-nav navbar-right">
         <?php if(!$this->session->userdata('login')): ?>
            <li><a href="<?php echo base_url(); ?>users/register">Register</a></li>
            <li><a href="<?php echo base_url(); ?>users/login">Login</a></li>
         <?php endif; ?>
         <?php if($this->session->userdata('login')): ?>
            <li><a href="<?php echo base_url(); ?>users/dashboard"><?php echo $this->session->userdata('username'); ?></a></li>
            <li><a href="<?php echo base_url(); ?>users/logout">Logout</a></li>
         <?php endif; ?>
       </ul>  
  		</div>
  	</div>
  </nav>

  <div class="container"> -->

  <!-- Flash Messages -->
    <!-- <?php if($this->session->flashdata('user_registered')): ?>
      <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_registered').'</p>'; ?>
    <?php endif; ?>

     <?php if($this->session->flashdata('post_created')): ?>
      <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_created').'</p>'; ?>
    <?php endif; ?>

     <?php if($this->session->flashdata('post_updated')): ?>
      <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_updated').'</p>'; ?>
    <?php endif; ?>

    <?php if($this->session->flashdata('category_created')): ?>
      <?php echo '<p class="alert alert-success">'.$this->session->flashdata('category_created').'</p>'; ?>
    <?php endif; ?>

    <?php if($this->session->flashdata('post_deleted')): ?>
      <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_deleted').'</p>'; ?>
    <?php endif; ?>

    <?php if($this->session->flashdata('login_failed')): ?>
      <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('login_failed').'</p>'; ?>
    <?php endif; ?>

    <?php if($this->session->flashdata('user_loggedin')): ?>
      <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedin').'</p>'; ?>
    <?php endif; ?>

    <?php if($this->session->flashdata('user_loggedout')): ?>
      <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedout').'</p>'; ?>
    <?php endif; ?>

     <?php if($this->session->flashdata('category_deleted')): ?>
      <?php echo '<p class="alert alert-success">'.$this->session->flashdata('category_deleted').'</p>'; ?>
    <?php endif; ?> -->
