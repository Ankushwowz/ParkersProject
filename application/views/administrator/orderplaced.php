 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 <style>
 .change-header-m-h {
    background-color: #2C3E50;
    color: #fff;
    text-transform: uppercase;
}
.text_style{
	float:right;
}
.form-group {
    margin-bottom: 0;
    padding: 10px 20px;
}
.file-cls {
 background: #2C3E50;
}
.file-cls a {
 color: #fff;
}

.color-cls{
	
	color:#1ABC9C;
}
 </style>
 <div class="page-header">
                <div class="page-header-title">
                    <h4>Orders</h4>
                </div>
                
            </div>
           
            <!-- Page-header end -->
            <!-- Page-body start -->
            <div class="page-body">
                <!-- DOM/Jquery table start -->
				<?php 
					$assign_array = array('1','2','3'); 
					$array = array('1','2','4'); 
					$array_admin_user = array('1','2'); 
				?>
                <div class="card">
                    <div class="card-block">
                        <div class="table-responsive dt-responsive">
                            <table id="dom-jqry" class="table table-striped table-bordered nowrap">
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
                <!-- DOM/Jquery table end -->
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
		<select name="users" class="form-control" id="user_id">
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
		<option value="1">Pending</option>
		<option value="2">Processing</option>
		<option value="3">On Hold</option>
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