<!-- jQuery Library -->
<style>
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

<!-- Datatable JS -->
<link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<?php 
					$assign_array = array('1','2','3'); 
					$array = array('1','2','4'); 
					$array_admin_user = array('1','2'); 
				?>
 <div class="page-header">
                <div class="page-header-title">
                    <h4>Orders Reports</h4>
                </div>
               
            </div>
           
            <!-- Page-header end -->
            <!-- Page-body start -->
            <div class="page-body">
				<div class="row">
				<div class="col-md-12" style="margin-bottom: 10px;">
				
				 <form id="filterform1" class="" action="<?php echo base_url(); ?>administrator/salereports" method="post" role="">
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
					<option value="3" <?php if(!empty($_POST['order_Status'])) { if($_POST['order_Status']==3){ echo"selected";}}?>>On Hold</option>
					<option value="4" <?php if(!empty($_POST['order_Status'])) { if($_POST['order_Status']==4){ echo"selected";}}?>>Dispute</option>
					<option value="5" <?php if(!empty($_POST['order_Status'])) { if($_POST['order_Status']==5){ echo"selected";}}?>>Completed</option>
					</select>
				</div>
				</div>
				
				
				
				</div>
				
				<div class="col-md-3" style="float:left;">
				<button type="submit" class="btn btn-default search-btn">Submit</button>
				<?php if (in_array($this->session->userdata('role_id'), $array_admin_user)){ ?>
				<a  class="btn btn-default search-btn" href="<?php echo base_url();?>administrator/salereports">All Users</button></a>
				<?php } ?>
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
                <!-- DOM/Jquery table start -->
				
                <div class="card">
                    <div class="card-block">
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
								  $orderid =5000;
                                   $counter =1; 
								   foreach($orders as $post) : 
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
                <!-- DOM/Jquery table end -->
            </div>

      <!-- Javascript -->

<!--Add custom filter methods-->

