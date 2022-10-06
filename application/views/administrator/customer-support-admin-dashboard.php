<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<style>
   .nav-tabs .nav-link.active {
   color: #fff;
   background-color: #1ABC9C;
   border-color: #2c3e50;
   }
   .nav-tabs .nav-link:hover {
   border-color: #2c3e50;
   }
   a {
   color: #2c3e50;
   text-decoration: none;
   }
   .nav-tabs .nav-link {
   border: none;
   border-top-right-radius: 0;
   border-top-left-radius: 0;
   color: #fff;
   }
   .tab-content>.active {
   display: block;
   border: 2px solid #2c3e50;
   padding: 20px;
   border-radius: 2px;
   border-top: 4px solid #8CDDCD;
   box-shadow: 0 2px 1px rgba(0,0,0,0.05);
   border-left: none;
   border-right: none;
   border-bottom: none;
   margin-bottom: 30px;
   background:#ffffff;
   }
   .nav-tabs {
   border-bottom: none !important;
   background: #2c3e50;
   }
   .float-left-cls {float:left;}
   .color-cls{ color:#1ABC9C; }
	#dynamic-table1_filter {display:none;}
	.dataTables_scroll {    margin-top: 20px;}
	a.dt-button {
	background-color: #1abc9c;
	border-color: #1abc9c;
	border-radius: 2px;
	color: #fff;
	background-image: none;
	font-size: 14px;
	padding: 20px 30px 10px 30px;
	line-height: 50px;
	margin: 0 5px;	
	}
	.search-btn {
	margin-top: 26px;
	background-color:#1abc9c;
	}
	.search-btn:hover{
	margin-top: 26px;
	background-color:#1abc9c;
	}
	.table-bordered {
	border: 1px solid #eceeef;
	width: 100% !important;
	}
	.ui-button {
	padding: 0 0em!important;
	}
</style>
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
<div class="page-body">
<div class="row">
   <div class="col-md-12 col-xl-4">
      <!-- table card start -->
      <div class="card table-card">
         <div class="">
            <a href="<?php echo base_url();?>administrator/users/viewusers/<?php echo base64_encode('2');?>">
               <div class="row-table">
                  <div class="col-md-12 card-block-big br">
                     <div class="row">
                        <div class="col-md-2">
                           <i class="icofont icofont-ui-user text-success"></i>
                        </div>
                        <div class="col-md-8 text-center">
                           <h5><?php if(!empty($total_user['Customer_Support_Admin'])) { echo $total_user['Customer_Support_Admin'];} ?></h5>
                           <span>Customer Support Admin</span>
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
            <a href="<?php echo base_url();?>administrator/users/viewusers/<?php echo base64_encode('3');?>">
               <div class="row-table">
                  <div class="col-md-12 card-block-big br">
                     <div class="row">
                        <div class="col-md-2">
                           <i class="icofont icofont-ui-user text-success"></i>
                        </div>
                        <div class="col-md-8 text-center">
                           <h5><?php if(!empty($total_user['Franchise_Executives'])) { echo $total_user['Franchise_Executives'];} ?></h5>
                           <span>Franchise Executive</span>
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
            <a href="<?php echo base_url();?>administrator/users/viewusers/<?php echo base64_encode('4');?>">
               <div class="row-table">
                  <div class="col-md-12 card-block-big br">
                     <div class="row">
                        <div class="col-md-2">
                           <i class="icofont icofont-ui-user text-success"></i>
                        </div>
                        <div class="col-md-8 text-center">
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
</div>
<div class="row">
   <div class="col-md-12 col-xl-4">
      <!-- table card start -->
      <div class="card table-card">
         <div class="">
            <a href="<?php echo base_url();?>administrator/users/viewusers/<?php echo base64_encode('6');?>">
               <div class="row-table">
                  <div class="col-md-12 card-block-big br">
                     <div class="row">
                        <div class="col-md-2">
                           <i class="icofont icofont-ui-user text-success"></i>
                        </div>
                        <div class="col-md-8 text-center">
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
               <div class="col-md-12 card-block-big br">
                  <div class="row">
                     <div class="col-md-2">
                        <i class="icofont icofont-cart-alt text-success"></i>
                     </div>
                     <div class="col-md-8 text-center">
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
   <div class="col-md-12 col-xl-4">
      <!-- table card start -->
      <div class="card table-card">
         <div class="">
            <a href="<?php echo base_url();?>administrator/resume">
               <div class="row-table">
                  <div class="col-md-12 card-block-big br">
                     <div class="row">
                        <div class="col-md-2">
                           <i class="icofont icofont-ui-folder text-success"></i>
                        </div>
                        <div class="col-md-8 text-center">
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
<div class="row">
   <div class="col-md-12">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
         <!--<li class="nav-item">
            <a class="nav-link <?php //if(empty($_GET['tab'])) { echo 'active';}?>" id="place-an-order-tab" data-toggle="tab" href="#place" role="tab" aria-controls="place"
               aria-selected="true">Place an Order</a>
         </li>-->
         <li class="nav-item">
            <a class="nav-link <?php if(empty($_GET['tab'])) { echo 'active';}?>  <?php if(isset($_GET['tab']) && $_GET['tab']=='pending') { echo 'active';}?>" id="pending-sale-tab" data-toggle="tab" href="#pending" role="tab" aria-controls="pending"
               aria-selected="false">Pending Sale</a>
         </li>
         <li class="nav-item">
            <a class="nav-link <?php if(isset($_GET['tab']) && $_GET['tab']=='completed') { echo 'active';}?>" id="completed-sales-tab" data-toggle="tab" href="#completed" role="tab" aria-controls="completed"
               aria-selected="false">Completed Sales</a>
         </li>
         <li class="nav-item">
            <a class="nav-link <?php if(isset($_GET['tab']) && $_GET['tab']=='orderplaced') { echo 'active';}?>" id="order-placed-tab" data-toggle="tab" href="#orderplaced" role="tab" aria-controls="orderplaced"
               aria-selected="false">Order Placed</a>
         </li>
         <li class="nav-item">
            <a class="nav-link <?php if(isset($_GET['tab']) && $_GET['tab']=='salereports') { echo 'active';}?>" id="sale-reports-tab" data-toggle="tab" href="#salereports" role="tab" aria-controls="salereports"
               aria-selected="false">Sale Reports</a>
         </li>
         <li class="nav-item">
            <a class="nav-link <?php if(isset($_GET['tab']) && $_GET['tab']=='appointment') { echo 'active';}?>" id="appointment-tab" data-toggle="tab" href="#appointment" role="tab" aria-controls="appointment"
               aria-selected="false">Appointment </a>
         </li>
      </ul>
      <div class="tab-content" id="myTabContent">
         <!--<div class="tab-pane fade <?php //if(empty($_GET['tab'])) { echo 'show active';}?>" id="place" role="tabpanel" aria-labelledby="place-an-order-tab">
           
         </div>-->
         <div class="tab-pane fade <?php if(empty($_GET['tab'])) { echo 'show active';}?> <?php if(isset($_GET['tab']) && $_GET['tab']=='pending') { echo 'show active';}?>" id="pending" role="tabpanel" aria-labelledby="pending-sale-tab">
			<?php 
				$assign_array = array('1','2','3'); 
				$array = array('1','2','4'); 
				$array_admin_user = array('1','2'); 
			?>
			  <div  class="col-md-12">
			      <div class="table-responsive dt-responsive">
                            <table class="table table-striped table-bordered nowrap dom-jqry">
                                <thead>
                                    <tr>
									
									<th>Order Id</th>
									<th>Client Name</th>
									<th>Business Name</th>
									<th>Service Name</th>
									<th>Created By</th>
									<th>Country</th>
									<th>City</th>
									
									<?php if (in_array($this->session->userdata('role_id'), $array)){ ?>
									<th>Assigned By</th>
									<?php } ?>
									<?php if (in_array($this->session->userdata('role_id'), $assign_array)){ ?>
									<th>Assigned To</th>
									<?php } ?>
									<th>Date</th>
									<th>Sale Status</th>
									<th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
								  <?php 
								   $orderid =5000;
                                   $counter =1; 
								   foreach($pending_orders as $post) : 
									$username = json_decode($post['order_data']);
									
								 
								  ?>
                                 <tr>
									
									<td><?php echo  $orderid + $post['order_id']; ?></td>
									<td><?php echo $username->Name; ?></td>
									<td><?php echo $username->Company_Name; ?></td>
									<td><?php echo $post['name']; ?></td>
									
									<td><?php echo $post['created_by_user']; ?><br> <?php if(!empty($post['role_name'])) { ?><b class="color-cls">(<?php echo $post['role_name'];?>)</b> <?php } ?></td>
									<td><?php echo $post['countryName']; ?></td>
									<td><?php echo $post['statesName']; ?></td>
									
									<?php 
									if (in_array($this->session->userdata('role_id'), $array_admin_user)){ ?>
									<td><?php echo $post['sale_assign_by_user']; ?><br> <?php if(!empty($post['role_assign_sale_by_user'])){ ?><b class="color-cls" >(<?php echo $post['role_assign_sale_by_user'];?>)</b> <?php } ?></td>
									<?php } ?>
									<?php 
									if (in_array($this->session->userdata('role_id'), $array_admin_user)){ ?>
									<td><?php echo $post['sale_assign_to_user']; ?><br><?php if(!empty($post['role_assign_sale_to_user'])) { ?><b class="color-cls">(<?php echo $post['role_assign_sale_to_user'];?>)</b> <?php } ?></td>
										<?php } ?>
									<?php if($this->session->userdata('role_id')==3){?>
									<td><?php echo $post['cse_user_name']; ?></td>
									<?php } ?>
									<?php if($this->session->userdata('role_id')==4){?>
									<td>
									<?php if(!empty($post['cse_user_name'])) { ?>
									<?php echo $post['sale_assign_to_user']; ?><br><?php if(!empty($post['role_assign_sale_to_user'])) { ?><b class="color-cls">(<?php echo $post['role_assign_sale_to_user'];?>)</b> <?php }  } ?>
									</td>
									<?php } ?>
									
									<td><?php echo date("M d,Y", strtotime($post['created_at'])); ?></td>
									<td><?php 
									if($post['order_Status']==1){ echo"Pending";}
									if($post['order_Status']==2){ echo"Processing";}
									if($post['order_Status']==3){ echo"On Hold";}
									if($post['order_Status']==4){ echo"Dispute";}
									if($post['order_Status']==5){ echo"Completed";}
									
									?></td>
									<td><a  class="label label-inverse-primary oder-view"  href="<?php echo base_url();?>administrator/orderview/<?php echo base64_encode($post['order_id']);?>">Order View</a>
									
									<?php 
									
									if (in_array($this->session->userdata('role_id'), $array)){  
										if($post['orderstatus'] =='1'){ ?>
										<a class="label label-inverse-primary enable orderactive"  rel="active" order_id="<?php echo base64_encode($post['order_id']); ?>"  class="label label-inverse-info" href='#'>Active</a>
										<?php }else{ ?> 
										<a class="label label-inverse-warning desable orderdeactive" rel="deactive" order_id="<?php echo base64_encode($post['order_id']); ?>"  class="label label-inverse-info"  href='#'>Deactive</a><?php
										} 
									}?>
									<?php 
									if (in_array($this->session->userdata('role_id'), $assign_array)){  ?>
										<a  class="label label-inverse-primary assign_sale_cls" rel="<?php echo base64_encode($post['order_id']); ?>"  class="label label-inverse-info" href='#' data-toggle="modal" data-target="#myModalAssignorder">Assign Sale</a>
									<?php } ?>
									
										<?php 
									if (in_array($this->session->userdata('role_id'), $array)){  ?>
										<a  class="label label-inverse-primary assign_sale_cls" rel="<?php echo base64_encode($post['order_id']); ?>"  class="label label-inverse-info" href='#' data-toggle="modal" data-target="#myModalChangeStatus">Change Status</a>
									<?php } ?>
									
									</td>
                                      
                                    </tr>
                                <?php 

                                    $counter = $counter + 1;
									endforeach; ?>

                                <!-- <div class="paginate-link">
                                    <?php //echo $this->pagination->create_links(); ?>
                                </div>  -->

                                 </tbody>
                            </table>
                        </div>
			  </div>
         </div>
         <div class="tab-pane fade <?php if(isset($_GET['tab']) && $_GET['tab']=='completed') { echo 'show active';}?>" id="completed" role="tabpanel" aria-labelledby="completed-sales-tab">
             <div class="col-md-12">
			   <div class="table-responsive dt-responsive">
                            <table class="table table-striped table-bordered nowrap dom-jqry">
                                <thead>
                                    <tr>
									
									<th>Order Id</th>
									<th>Client Name</th>
									<th>Business Name</th>
									<th>Service Name</th>
									
									<th>Created By</th>
									<th>Country</th>
									<th>City</th>
									
									<?php if (in_array($this->session->userdata('role_id'), $array)){ ?>
									<th>Assigned By</th>
									<?php } ?>
									<?php if (in_array($this->session->userdata('role_id'), $assign_array)){ ?>
									<th>Assigned To</th>
									<?php } ?>
									<th>Date</th>
									<th>Sale Status</th>
									<th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
								  <?php 
								  $completed_orders_orderid =5000;
                                   $completed_orders_counter =1; 
								   foreach($completed_orders as $post) : 
									$username = json_decode($post['order_data']);
									?>
                                 <tr>
									
									<td><?php echo $completed_orders_orderid + $post['order_id']; ?></td>
									<td><?php echo $username->Name; ?></td>
									<td><?php echo $username->Company_Name; ?></td>
									<td><?php echo $post['name']; ?></td>
									
									<td><?php echo $post['created_by_user']; ?><br> <?php if(!empty($post['role_name'])) { ?><b class="color-cls">(<?php echo $post['role_name'];?>)</b> <?php } ?></td>
									<td><?php echo $post['countryName']; ?></td>
									<td><?php echo $post['statesName']; ?></td>
									
									<?php 
									if (in_array($this->session->userdata('role_id'), $array_admin_user)){ ?>
									<td><?php echo $post['sale_assign_by_user']; ?><br> <?php if(!empty($post['role_assign_sale_by_user'])){ ?><b class="color-cls" >(<?php echo $post['role_assign_sale_by_user'];?>)</b> <?php } ?></td>
									<?php } ?>
									<?php 
									if (in_array($this->session->userdata('role_id'), $array_admin_user)){ ?>
									<td><?php echo $post['sale_assign_to_user']; ?><br><?php if(!empty($post['role_assign_sale_to_user'])) { ?><b class="color-cls">(<?php echo $post['role_assign_sale_to_user'];?>)</b> <?php } ?></td>
										<?php } ?>
									<?php if($this->session->userdata('role_id')==3){?>
									<td><?php echo $post['cse_user_name']; ?></td>
									<?php } ?>
									<?php if($this->session->userdata('role_id')==4){?>
									<td><?php echo $post['sale_assign_to_user']; ?><br><?php if(!empty($post['role_assign_sale_to_user'])) { ?><b class="color-cls">(<?php echo $post['role_assign_sale_to_user'];?>)</b> <?php } ?></td>
									<?php } ?>
									
									<td><?php echo date("M d,Y", strtotime($post['created_at'])); ?></td>
									<td><?php 
									if($post['order_Status']==1){ echo"Pending";}
									if($post['order_Status']==2){ echo"Processing";}
									if($post['order_Status']==3){ echo"On Hold";}
									if($post['order_Status']==4){ echo"Dispute";}
									if($post['order_Status']==5){ echo"Completed";}
									
									?></td>
									<td><a  class="label label-inverse-primary oder-view"  href="<?php echo base_url();?>administrator/orderview/<?php echo base64_encode($post['order_id']);?>">Order View</a>
									
									<?php 
									
									if (in_array($this->session->userdata('role_id'), $array)){  
										if($post['orderstatus'] =='1'){ ?>
										<a class="label label-inverse-primary enable orderactive"   rel="active" order_id="<?php echo base64_encode($post['order_id']); ?>"  class="label label-inverse-info" href='#'>Active</a>
										<?php }else{ ?> 
										<a class="label label-inverse-warning desable orderdeactive"   rel="deactive" order_id="<?php echo base64_encode($post['order_id']); ?>"  class="label label-inverse-info"  href='#'>Deactive</a><?php
										} 
									}?>
									
									
										<?php 
									if (in_array($this->session->userdata('role_id'), $array)){  ?>
										<a  class="label label-inverse-primary assign_sale_cls" rel="<?php echo base64_encode($post['order_id']); ?>"  class="label label-inverse-info" href='#' data-toggle="modal" data-target="#myModalChangeStatus">Change Status</a>
									<?php } ?>
									</td>
									
                                      
                                    </tr>
                                <?php 

                                    $completed_orders_counter = $completed_orders_counter + 1;
									endforeach; ?>

                                <!-- <div class="paginate-link">
                                    <?php //echo $this->pagination->create_links(); ?>
                                </div>  -->

                                 </tbody>
                            </table>
                        </div>
			 
			 
			 </div>
         </div>
         <div class="tab-pane fade <?php if(isset($_GET['tab']) && $_GET['tab']=='orderplaced') { echo 'show active';}?>" id="orderplaced" role="tabpanel" aria-labelledby="order-placed-tab">
           <div class="col-md-12">
		     <div class="table-responsive dt-responsive">
                            <table class="table table-striped table-bordered nowrap dom-jqry">
                                <thead>
                                    <tr>
									
									<th>Order Id</th>
									<th>Client Name</th>
									<th>Business Name</th>
									<th>Service Name</th>
									
									<th>Created By</th>
									<th>Country</th>
									<th>City</th>
									
									<?php if (in_array($this->session->userdata('role_id'), $array)){ ?>
									<th>Assigned By</th>
									<?php } ?>
									<?php if (in_array($this->session->userdata('role_id'), $assign_array)){ ?>
									<th>Assigned To</th>
									<?php } ?>
									<th>Date</th>
									<th>Sale Status</th>
									<th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
								  <?php 
								  $order_placed_orderid =5000;
                                   $order_placed_counter =1; 
								   foreach($order_placed as $post) : 
									$username = json_decode($post['order_data']);
									
								 
								  ?>
                                  <tr>
									
									<td><?php echo $order_placed_orderid + $post['order_id']; ?></td>
									<td><?php echo $username->Name; ?></td>
									<td><?php echo $username->Company_Name; ?></td>
									<td><?php echo $post['name']; ?></td>
									
									<td><?php echo $post['created_by_user']; ?><br> <?php if(!empty($post['role_name'])) { ?><b class="color-cls">(<?php echo $post['role_name'];?>)</b> <?php } ?></td>
									<td><?php echo $post['countryName']; ?></td>
									<td><?php echo $post['statesName']; ?></td>
									
									<?php 
									if (in_array($this->session->userdata('role_id'), $array_admin_user)){ ?>
									<td><?php echo $post['sale_assign_by_user']; ?><br> <?php if(!empty($post['role_assign_sale_by_user'])){ ?><b class="color-cls" >(<?php echo $post['role_assign_sale_by_user'];?>)</b> <?php } ?></td>
									<?php } ?>
									<?php 
									if (in_array($this->session->userdata('role_id'), $array_admin_user)){ ?>
									<td><?php echo $post['sale_assign_to_user']; ?><br><?php if(!empty($post['role_assign_sale_to_user'])) { ?><b class="color-cls">(<?php echo $post['role_assign_sale_to_user'];?>)</b> <?php } ?></td>
										<?php } ?>
									<?php if($this->session->userdata('role_id')==3){?>
									<td><?php echo $post['cse_user_name']; ?></td>
									<?php } ?>
									<?php if($this->session->userdata('role_id')==4){?>
									<td>
									<?php if(!empty($post['cse_user_name'])) { ?>
									<?php echo $post['sale_assign_to_user']; ?><br><?php if(!empty($post['role_assign_sale_to_user'])) { ?><b class="color-cls">(<?php echo $post['role_assign_sale_to_user'];?>)</b> <?php }  } ?>
									</td>
									<?php } ?>
									
									<td><?php echo date("M d,Y", strtotime($post['created_at'])); ?></td>
									<td><?php 
									if($post['order_Status']==1){ echo"Pending";}
									if($post['order_Status']==2){ echo"Processing";}
									if($post['order_Status']==3){ echo"On Hold";}
									if($post['order_Status']==4){ echo"Dispute";}
									if($post['order_Status']==5){ echo"Completed";}
									
									?></td>
									<td><a  class="label label-inverse-primary oder-view"  href="<?php echo base_url();?>administrator/orderview/<?php echo base64_encode($post['order_id']);?>">Order View</a>
									
									<?php 
									
									if (in_array($this->session->userdata('role_id'), $array)){  
										if($post['orderstatus'] =='1'){ ?>
										<a class="label label-inverse-primary enable orderactive"  rel="active" order_id="<?php echo base64_encode($post['order_id']); ?>"  class="label label-inverse-info" href='#'>Active</a>
										<?php }else{ ?> 
										<a class="label label-inverse-warning desable orderdeactive" rel="deactive" order_id="<?php echo base64_encode($post['order_id']); ?>"  class="label label-inverse-info"  href='#'>Deactive</a><?php
										} 
									}?>
									<?php 
									if (in_array($this->session->userdata('role_id'), $assign_array)){  ?>
										<a  class="label label-inverse-primary assign_sale_cls" rel="<?php echo base64_encode($post['order_id']); ?>"  class="label label-inverse-info" href='#' data-toggle="modal" data-target="#myModalAssignorder">Assign Sale</a>
									<?php } ?>
									
										<?php 
									if (in_array($this->session->userdata('role_id'), $array)){  ?>
										<a  class="label label-inverse-primary assign_sale_cls" rel="<?php echo base64_encode($post['order_id']); ?>"  class="label label-inverse-info" href='#' data-toggle="modal" data-target="#myModalChangeStatus">Change Status</a>
									<?php } ?>
									
									</td>
                                      
                                    </tr>
                                <?php 

                                    $order_placed_counter = $order_placed_counter + 1;
									endforeach; ?>

                                <!-- <div class="paginate-link">
                                    <?php //echo $this->pagination->create_links(); ?>
                                </div>  -->

                                 </tbody>
                            </table>
                        </div>
		   
		   
		   </div>
         </div>
         <div class="tab-pane fade <?php if(isset($_GET['tab']) && $_GET['tab']=='salereports') { echo 'show active';}?>" id="salereports" role="tabpanel" aria-labelledby="sale-reports-tab">
		
            <div class="col-md-12">
			<div class="row">
				<div class="col-md-12" style="margin-bottom: 10px;">
				
				 <form id="filterform1" class="" action="<?php echo base_url(); ?>administrator/dashboard?tab=salereports" method="post" role="">
	            <div class="col-md-9" style="float:left;">
				
				<div class="form-group">
				<div class="col-md-4" style="float:left;">
				
				  <label for="Date"><b>Start Date:</b></label>
				<input class="form-control" placeholder="Enter Start Date"  name="fromDate" type="text" id="from" readonly=""  value="<?php if(!empty($_POST['fromDate'])) { echo $_POST['fromDate']; } ?>" />
				</div>
				
				 <div class="col-md-4" style="float:left;">
				
				  <label for="Date"><b>End Date:</b></label>
					<input class="form-control" placeholder="Enter End Date" type="text"  name="toDate"  id="to"  value="<?php if(!	empty($_POST['toDate'])) { echo $_POST['toDate']; } ?>" readonly="" />
				</div>
				
				<div class="col-md-4" style="float:left;">
				  <label for="Date"><b>Order Status:</b></label>
					<select name="order_Status" class="form-control" id="order_Status">
					<option value="">Order Status</option>
					<option value="1" 
					<?php if(!empty($_POST['order_Status'])) { if($_POST['order_Status']==1){ echo"selected";}}?>
					>Pending</option>
					<option value="2" <?php if(!empty($_POST['order_Status'])) { if($_POST['order_Status']==2){ echo"selected";}}?>>Processing</option>
					<!--<option value="3" <?php //if(!empty($_POST['order_Status'])) { if($_POST['order_Status']==3){ echo"selected";}}?>>On Hold</option>-->
					<option value="4" <?php if(!empty($_POST['order_Status'])) { if($_POST['order_Status']==4){ echo"selected";}}?>>Dispute</option>
					<option value="5" <?php if(!empty($_POST['order_Status'])) { if($_POST['order_Status']==5){ echo"selected";}}?>>Completed</option>
					</select>
				</div>
				</div>
				
				
				
				</div>
				
				<div class="col-md-3" style="float:left;">
				<button type="submit" class="btn btn-default search-btn">Submit</button>
				</div>
				<?php if (in_array($this->session->userdata('role_id'), $array_admin_user)){ ?>
            
            <div class="col-md-12" style="float:left;">
            
            <div class="form-group">
            
            <?php if (in_array($this->session->userdata('role_id'), $array_admin_user)){ ?>
            <div class="col-md-3" style="float:left;">
              <label for="Date"><b>User:</b></label>
              <select name="user_id" id="user_id" class="form-control">
              <option value="">Select User</option>
              <?php foreach($users as $usersinfo){?>
               <option value="<?php echo $usersinfo['id']?>" <?php if(!empty($_POST['user_id']) && $_POST['user_id']==$usersinfo['id']) { echo "selected";}?>><?php echo $usersinfo['username']?><?php if(!empty($usersinfo['role_name'])) { ?><b class="color-cls">(<?php echo $usersinfo['role_name'];?>)</b> <?php } ?></option>
              <?php } ?>
              
              </select>
            </div>
            <?php } ?>
            
              <div class="col-md-3" style="float:left;">
              <label for="Date"><b>Country:</b></label>
               <select name="country" id="country" class="form-control">
                <option value="">Select Country</option>
                     <?php
                     foreach($country as $row)
                     { ?>
                     <option value="<?php echo $row->id; ?>" <?php if(!empty($_POST['country']) && $_POST['country']==$row->id) { echo "selected"; }?>> <?php echo $row->name; ?></option>
                     <?php  }
                     ?>
              
               </select>
            </div>
            
              <div class="col-md-3" style="float:left;">
              <label for="state"><b>State:</b></label>
               <select name="state" id="state" class="form-control input-lg" >
                     <option value="">Select State</option>
                  </select>
            </div>
            
            
            </div>
            </div><?php } ?>
				
				
				
				
				</form>
				</div>
				
				</div>
			
			
			
			
			
			</div>
            <div class="col-md-12">
			
			 <div class="table-responsive dt-responsive adv-table">
							
					  
                           <table  class="display table table-bordered table-striped" id="dynamic-table1">
                                <thead>
                                    <tr>
									
									<th>Order Id</th>
									<th>Client Name</th>
									<th>Business Name</th>
									<th>Service Name</th>
									
									<th>Created By</th>
									<th>Country</th>
									<th>City</th>
									<?php if (in_array($this->session->userdata('role_id'), $array)){ ?>
									<th>Assigned By</th>
									<?php } ?>
									<?php if (in_array($this->session->userdata('role_id'), $assign_array)){ ?>
									<th>Assigned To</th>
									<?php } ?>
									
									<th>Sale Status</th>
									<th>Date</th>
								
                                    </tr>
                                </thead>
                                <tbody>
								  <?php 
								  $sale_reports_orderid =5000;
                                   $sale_reports_counter =1; 
								   foreach($sale_reports as $post) : 
									$username = json_decode($post['order_data']);
									
								 
								  ?>
                                 <tr>
									
									<td><?php echo $sale_reports_orderid + $post['order_id']; ?></td>
									<td><?php echo $username->Name; ?></td>
									<td><?php echo $username->Company_Name; ?></td>
									<td><?php echo $post['name']; ?></td>
									
									<td><?php echo $post['created_by_user']; ?><br> <?php if(!empty($post['role_name'])) { ?><b class="color-cls">(<?php echo $post['role_name'];?>)</b> <?php } ?></td>
									<td><?php echo $post['countryName']; ?></td>
									<td><?php echo $post['statesName']; ?></td>
									
									<?php 
									if (in_array($this->session->userdata('role_id'), $array_admin_user)){ ?>
									<td><?php echo $post['sale_assign_by_user']; ?><br> <?php if(!empty($post['role_assign_sale_by_user'])){ ?><b class="color-cls" >(<?php echo $post['role_assign_sale_by_user'];?>)</b> <?php } ?></td>
									<?php } ?>
									<?php 
									if (in_array($this->session->userdata('role_id'), $array_admin_user)){ ?>
									<td><?php echo $post['sale_assign_to_user']; ?><br><?php if(!empty($post['role_assign_sale_to_user'])) { ?><b class="color-cls">(<?php echo $post['role_assign_sale_to_user'];?>)</b> <?php } ?></td>
										<?php } ?>
									<?php if($this->session->userdata('role_id')==3){?>
									<td><?php echo $post['cse_user_name']; ?></td>
									<?php } ?>
									<?php if($this->session->userdata('role_id')==4){?>
									<td><?php echo $post['sale_assign_to_user']; ?><br><?php if(!empty($post['role_assign_sale_to_user'])) { ?><b class="color-cls">(<?php echo $post['role_assign_sale_to_user'];?>)</b> <?php } ?></td>
									<?php } ?>
									
									
									<td><?php 
									if($post['order_Status']==1){ echo"Pending";}
									if($post['order_Status']==2){ echo"Processing";}
									if($post['order_Status']==3){ echo"On Hold";}
									if($post['order_Status']==4){ echo"Dispute";}
									if($post['order_Status']==5){ echo"Completed";}
									
									?></td>
									
                                      <td><?php echo date("M d,Y", strtotime($post['created_at'])); ?></td>
                                    </tr>
                                <?php 

                                    $sale_reports_counter = $sale_reports_counter + 1;
									endforeach; ?>

                                <!-- <div class="paginate-link">
                                    <?php //echo $this->pagination->create_links(); ?>
                                </div>  -->

                                 </tbody>
                            </table>
                        </div>
                   

			
			
			</div>
         </div>
         <div class="tab-pane fade <?php if(isset($_GET['tab']) && $_GET['tab']=='appointment') { echo 'show active';}?>" id="appointment" role="tabpanel" aria-labelledby="appointment-tab">
            <div class="col-md-12">
               <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#createAppointment ">Create Appointment </button>
            </div>
            <div  class="col-md-12">
               <div class="table-responsive dt-responsive">
                  <table id="dom-jqry" class="table table-striped table-bordered nowrap">
                     <thead>
                        <tr>
                           <th>Client Name</th>
                           <th>Business Name</th>
                           <th>Business Number</th>
                           <th>Mobile Number</th>
                           <th>Address</th>
                           <th>Service</th>
                           <th>Appointment Date</th>
                           <th>Appointment Time</th>
                           <th>Meeting location</th>
                           <th>Note</th>
                           <th>Created By</th>
                           <th>Created Date</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
					 <?php 
					 
					 if(count($appointment > 0)) {
						 
						 foreach($appointment as $appointmentinfo) { ?>
							<tr>
								<td><?php echo $appointmentinfo['clientName'];?></td>
								<td><?php echo $appointmentinfo['businessName'];?></td>
								<td><?php echo $appointmentinfo['businessNumber'];?></td>
								<td><?php echo $appointmentinfo['mobileNumber'];?></td>
								<td><?php echo $appointmentinfo['address'];?></td>
								<td><?php echo $appointmentinfo['name'];?></td>
								<td><?php echo date("M d,Y", strtotime($appointmentinfo['appointmentDate'])); ?></td>
								<td><?php echo $appointmentinfo['AppointmentHours'].' '.$appointmentinfo['AppointmentTime'];?></td>
								<td><?php echo $appointmentinfo['meetinglocation'];?></td>
								<td><?php echo $appointmentinfo['notes'];?></td>
								<td><?php echo $appointmentinfo['username'];?>
								<br> <?php if(!empty($appointmentinfo['role_name'])){ ?><b class="color-cls" >(<?php echo $appointmentinfo['role_name'];?>)</b> <?php } ?></td>
								<td><?php echo date("M d,Y", strtotime($appointmentinfo['created_date'])); ?></td>
								<td>
								<a  rel="<?php echo $appointmentinfo['appointmentID']; ?>" class="label label-inverse-danger delete_appointment" href='<?php echo base_url(); ?>administrator/deleteAppointment/<?php echo $appointmentinfo['appointmentID']; ?>'>Delete</a>
								
								
								</td>
							 
							</tr> <?php 
						} 
					 }?>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div id="createAppointment" class="modal fade" role="dialog" aria-hidden="true">
   <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
         <div class="modal-header change-role-m-h">
            <h4 class="modal-title">Create Appointment</h4>
         </div>
         <div class="modal-body">
            <div class="col-md-12">
               <!-- Basic Form Inputs card start -->
               <?php echo form_open_multipart('',array('id'=>'my_form_appointment','role'=>'form','novalidate'=>'')); ?>
               <div class="form-group row">
                  <label class="col-md-4 col-form-label">Client Name:</label>
                  <div class="col-md-8">
                     <input type="text" name="clientName" class="form-control appointment_form_validate" placeholder="Client Name" value="" required="true">
                  </div>
               </div>
               <div class="form-group row">
                  <label class="col-md-4 col-form-label">Business Name:</label>
                  <div class="col-md-8">
                     <input type="text"  name="businessName" class="form-control" value="" placeholder="Business Name" required="true">
                  </div>
               </div>
               <div class="form-group row">
                  <label class="col-md-4 col-form-label">Business Number:</label>
                  <div class="col-md-8">
                     <input type="text"  name="businessNumber" class="form-control" value="" placeholder="Business Number" required="true">
                  </div>
               </div>
               <div class="form-group row">
                  <label class="col-md-4 col-form-label">Mobile Number:</label>
                  <div class="col-md-8">
                     <input type="text"  name="mobileNumber" class="form-control" value="" placeholder="Mobile Number" required="true">
                  </div>
               </div>
               <div class="form-group row">
                  <label class="col-md-4 col-form-label">Address:</label>
                  <div class="col-md-8">
                     <textarea  name="address" class="form-control" value="" placeholder="Address" required="true"></textarea>
                  </div>
               </div>
               <div class="form-group row">
                  <label class="col-md-4 col-form-label">Service:</label>
                  <div class="col-md-8">
                     <select class="form-control" name="serviceID" required="true">
                        <option value=""> Select Service</option>
                        <?php foreach($service as $serviceinfo) { ?>
                        <option value="<?php echo $serviceinfo['id']?>"> <?php echo $serviceinfo['name']?></option>
                        <?php } ?>
                     </select>
                  </div>
               </div>
               <div class="form-group row">
                  <label class="col-md-4 col-form-label">Appointment Date:</label>
                  <div class="col-md-8">
                     <input type="date"  name="appointmentDate" class="form-control" value="" placeholder="Appointment Date" required="true">
                  </div>
               </div>
               <div class="form-group row">
                  <label class="col-md-4 col-form-label">Appointment Time:</label>
                  <div class="col-md-8" style="padding: 0;">
                     <div class="col-md-12">
                        <div class="col-md-4" style="float:left; padding: 0;">
                           <select class="form-control" name="AppointmentHours"  required="true">
						   <option value="">Hours</option>
                              <?php for ($x = 1; $x <= 12; $x++) { ?> 
                              <option value="<?php echo $x;?>"><?php if($x <= 9) { echo'0'.$x;}else{ echo $x;}?></option>
                              <?php 
                                 } ?>
                           </select>
                        </div>
						 <div class="col-md-4" style="float:left; padding: 0;">
                           <select class="form-control" name="AppointmentMintus"  required="true">
						    <option value="">Min</option>
                              <?php for ($x = 0; $x <= 59; $x++) { ?> 
                              <option value="<?php if($x <= 9) { echo'0'.$x;}else{ echo $x;}?>"><?php if($x <= 9) { echo'0'.$x;}else{ echo $x;}?></option>
                              <?php 
                                 } ?>
                           </select>
                        </div>
                        <div class="col-md-4" style="float:left; padding:0 0 0 6px;">
                           <select class="form-control" name="AppointmentTime">
                              <option value="AM">AM</option>
                              <option value="PM">PM</option>
                           </select>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="form-group row">
                  <label class="col-md-4 col-form-label">Meeting location:</label>
                  <div class="col-md-8">
                     <textarea  name="meetinglocation" class="form-control" value="" placeholder="Meeting Location" required="true"></textarea>
                  </div>
               </div>
               <div class="form-group row">
                  <label class="col-md-4 col-form-label">Notes:</label>
                  <div class="col-md-8">
                     <textarea  name="notes" class="form-control" value="" placeholder="Notes" required="true"></textarea>
                  </div>
               </div>
               <div class="form-group row">
                  <label class="col-md-4 col-form-label">&nbsp;</label>
                  <div class="col-md-8">
                     <button type="submit" class="btn btn-primary" value="Submit" id="appointment_btn">Submit</button>
                  </div>
               </div>
               </form>
            </div>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div>


<div id="myModalorder" class="modal fade" role="dialog">
			<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
			<div class="modal-header change-header-m-h">
				<h4 class="modal-title"><span id="ordertext"></span></h4>
			</div>
			<div class="modal-body" id="order_body">
			
				<div class="form-group row">
				<label class="col-sm-3 col-form-label">Reason :</label>
				<div class="col-sm-9">
				<textarea placeholder="Enter reason of active or deactive" rows="5" name="message" id="reasontext" class="form-control"></textarea>
				<input type="hidden" id="order_id" name="order_id" value="" >
				<input type="hidden" id="order_status" name="order_status" value="" >
				</div>
				</div>

				<div class="form-group row">
				<label class="col-sm-3 col-form-label"></label>
				<div class="col-sm-9">

				<button type="button" class="btn btn-primary" data-dismiss="modal" id="order-submit">Submit</button>
				</div>
				</div>
             
			</div>
			
			<div class="modal-footer">
			<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
			</div>
			</div>

			</div>
		</div>
		
		<!----- myModalAssignorder------------------------>
		<div id="myModalAssignorder" class="modal fade" role="dialog">
		<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
		<div class="modal-header change-role-m-h">

		<h4 class="modal-title">Assign Sale</h4>
		</div>
		<div class="modal-body">
			<?php if (in_array($this->session->userdata('role_id'), $assign_array)){  ?>
		<div class="form-group row">
		<label class="col-sm-3 col-form-label">Country:</label>
		<div class="col-sm-9">
		<select name="country" id="country" class="form-control">
					 <option value="">Select Country</option>
							<?php
							foreach($country as $row)
							{ ?>
							<option value="<?php echo $row->id; ?>" > <?php echo $row->name; ?></option>
							<?php  }
							?>
				  
		</select>
		
		
		</div>
		</div>
		
		<div class="form-group row">
		<label class="col-sm-3 col-form-label">State :</label>
		<div class="col-sm-9">
		<select name="state" id="state" class="form-control input-lg" >
							<option value="">Select State</option>
						</select>
		
		
		</div>
		</div>
			<?php } ?>
		
		<div class="form-group row">
		<label class="col-sm-3 col-form-label">Assign Sale :</label>
		<div class="col-sm-9">
		<select name="users" class="form-control" id="user_id1">
		<?php if (in_array($this->session->userdata('role_id'), $array_admin_user)){  ?>
        <option value=""> Select Franchise Executive</option>
		<?php } else { ?>
			<option value=""> Select Customer Support Executive </option>
		<?php } ?>
		

		</select>
		<p id="no-data" style="color:red;"></p>
		<input type="hidden" id="assign_order_id" name="order_id" value="" >
		</div>
		</div>

		  <div class="form-group row">
		<label class="col-sm-3 col-form-label"></label>
		<div class="col-sm-9">

		<button type="button" class="btn btn-primary" data-dismiss="modal" id="assign-sale-to-user">Submit</button>
		</div>
		</div>
		</div>
		<div class="modal-footer">
		<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
		</div>
		</div>

		</div>
		</div>
		
		<!----- myModalAssignorder------------------------>
		<div id="myModalChangeStatus" class="modal fade" role="dialog">
		<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
		<div class="modal-header change-role-m-h">

		<h4 class="modal-title">Change Status</h4>
		</div>
		<div class="modal-body">
		
		
		<div class="form-group row">
		<label class="col-sm-3 col-form-label">Change Status :</label>
		<div class="col-sm-9">
		<select name="ChangeStatus" class="form-control" id="ChangeStatus">
		<option value="">Change Status</option>
		<option value="2">Processing</option>
		<option value="4">Dispute</option>
		<option value="5">Completed</option>
		
		</select>
		
		<input type="hidden" id="status_order_id" name="status_order_id" value="" >
		</div>
		</div>

		  <div class="form-group row">
		<label class="col-sm-3 col-form-label"></label>
		<div class="col-sm-9">

		<button type="button" class="btn btn-primary" data-dismiss="modal" id="change_status_btn">Submit</button>
		</div>
		</div>
		</div>
		<div class="modal-footer">
		<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
		</div>
		</div>

		</div>
		</div>