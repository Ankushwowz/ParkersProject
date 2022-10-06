<link rel="stylesheet" href="<?php echo base_url();?>assets/frontend/css/font-awesome.css" >
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<style>
.input-container {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  width: 100%;
  margin-bottom: 15px;
}

.icon {
  padding: 18px;
  background: #26cdff;
  color: white;
  min-width: 50px;
  text-align: center;
}

.input-field {
  width: 100%;
  padding: 10px;
  outline: none;
}

.input-field:focus {
  border: 2px solid dodgerblue;
}
.fa {
    /* display: inline-block; */
    font: normal normal normal 14px/1 FontAwesome;
    font-size: inherit;
    text-rendering: auto;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}

#pending-error { color:red;}
#pending-error-zero { color:red;}
</style>   
   <div class="page-header">
                <div class="page-header-title">
                    <h4>Order Details</h4>
                </div>
               
            </div>
            <!-- Page header end -->
            <!-- Page body start -->
            <div class="page-body">
                <div class="row">
                    <div class="col-sm-12">
                        <!-- Basic Form Inputs card start -->
                        <div class="card">
                           
                            <div class="card-block">
							<div class="row">
							
							<?php 
							$html ='';
							
							$orderData = json_decode($orders['order_data']);
							
								unset($orderData->serviceid);
								unset($orderData->submit);
								unset($orderData->Service_Amount);
								unset($orderData->Deposit);
								unset($orderData->Setup_Cost);
								unset($orderData->Maintenance_Charge);
							
							$orderAmount = json_decode($orders['order_data']);
							$order_upload_data = json_decode($orders['order_upload_data']); 
							if($orderData!=''){ 						
							$count =0;
							foreach($orderData as $key=>$value){
							
								if(!empty($value)){
									
									if ($count%4 == 0 ){ 
									if($count==0)
										{
										 $html .='<div class="col-sm-6">';
										} else
										{
										 $html .='</div><div class="col-sm-6">';	
										}
									}
									
									    $key = str_replace("_"," ",$key);
										
										if(ucfirst($key)=='Date'){
											$DateValue= date("M d,Y", strtotime($value));
											$html .='<div class="form-group row"><label class="col-sm-4 col-form-label"><b>'.ucfirst($key).':</b></label> <div class="col-sm-8"><span class="text_style">'.$DateValue.'</span></div></div>';
										}
									
										else{
											$html .='<div class="form-group row"><label class="col-sm-4 col-form-label"><b>'.ucfirst($key).':</b></label> <div class="col-sm-8"><span class="text_style">'.$value.'</span></div></div>';
										}
										
										$count = $count+1;
								}
								
							}
							
							echo $html;
							}
							
						
							?>
							</div>
							
							</div>
							<div class="row">
							
							<div class="col-sm-6">
							<?php if(!empty($orderAmount->Maintenance_Charge)){ ?>
								<div class="form-group row">
								<label class="col-sm-4 col-form-label"><b>Maintenance Charge :</b></label> 
								<div class="col-sm-8">
									<span class="text_style">£<?php echo $orderAmount->Maintenance_Charge;?></span>
								</div>
								</div><?php 
							}
							?>
							<?php if(!empty($orderAmount->Setup_Cost)){ ?>
								<div class="form-group row">
								<label class="col-sm-4 col-form-label"><b>Setup Cost :</b></label> 
								<div class="col-sm-8">
									<span class="text_style">€<?php echo $orderAmount->Setup_Cost;?></span>
								</div>
								</div><?php 
							}
							?>
							<div class="form-group row">
							<label class="col-sm-4 col-form-label"><b>Service Amount :</b></label> 
							<div class="col-sm-8">
								<span class="text_style">£<?php echo $orderAmount->Service_Amount;?></span>
							</div>
							</div>
							<div class="form-group row">
							<label class="col-sm-4 col-form-label"><b>Deposit :</b></label> 
							<div class="col-sm-8">
								<span class="text_style">£<?php echo $orderAmount->Deposit;?></span>
							</div>
							</div>
							<div class="form-group row">
							<label class="col-sm-4 col-form-label"><b>Pending Amount :</b></label> 
							<div class="col-sm-8">
								<div class=" col-md-12">
								<div class="col-md-6" style="float:left;">
								
								<span class="text_style">£<?php 
								echo $pending_amount = $orderAmount->Service_Amount  - $orderAmount->Deposit;
								?></span>
								<input type="hidden" id="pending_amount" name="pending_amount" value="<?php echo $pending_amount;?>">
								</div>
								<?php if($this->session->userdata('role_id')!=3){?>
								<div class="col-md-6" style="float:right;"><a href="" class="btn btn-primary" data-toggle="modal" data-target="#myModalMilestones">Create Milestones</a></div>
								<?php } ?>
								
								
								</div>
							</div>
							</div>
							
							
							</div>
							
							</div>
							<div class="clearfix"></div>
							<?php if($order_upload_data!=''){ ?>
							<div class="row">
							<h3 style="padding:20px;">Uploads Files</h3>
							<div class="col-sm-12">
							<?php 
							
							$html1 ='<div class="col-sm-6">';
							
							foreach($order_upload_data as $key=>$value){
							foreach($value as $key1=>$value1){
							$ext = pathinfo($value1, PATHINFO_EXTENSION);
							
							if($ext=='pdf'){
							$keyname = 'pdf.png';
							}
							if($ext=='docx' || $ext=='xlsx'){
							$keyname = 'word.png';
							}
							if($ext=='png' || $ext=='jpg' || $ext=='gif'){
							$keyname = 'file_image.png';
							}

							$html1 .='<div class="form-group row"><label class="col-sm-4 col-form-label"><b><img width="30" height="30" src="'.base_url().'/assets/images/orderfiles/'.$keyname.'"></b></label> <div class="col-sm-8"><span class="text_style"><a target="_blank" href="'.base_url().'/assets/images/orderfiles/'.$value1.'">'.$value1.'</a></span></div></div>';
							}
							}
							echo $html1 .='</div>';
						
							?>
							
							</div>
							</div>
							<?php } ?>

                               <div class="row">
							   
							     <div class="table-responsive dt-responsive">
                            <table id="dom-jqry" class="table table-striped table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <th>Sr.no</th>
                                        <th>Order Id</th>
                                        <th>Amount</th>
										<th>Name</th>
										<th>Payment Status</th>
                                        <th>Milestone Date</th>
                                        <th>Created Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 <?php 
							
                                   $counter =1; 
                                foreach($payment as $post) { ?>
                                 <tr id="tr_<?php echo $post['payment_id']; ?>">
                                  <td><?php echo $counter; ?></td>
								  <td><?php echo $post['order_id']; ?></td>
								  <td>£<?php echo $post['amount']; ?></td>
								  <td><?php echo $post['userName']; ?></td>
								 
								  <td><?php echo $post['payment_status']; ?></td>
								  <td><?php echo  date("M d,Y", strtotime($post['milestones_date'])); ?></td>
								  <td><?php echo  date("M d,Y", strtotime($post['created_date'])); ?></td>
								  <td><?php if($post['payment_status']=='Pending') { ?><a href="<?php echo base_url();?>administrator/milestonepayment/<?php echo base64_encode($post['order_id']); ?>/<?php echo base64_encode($post['payment_id']); ?>" class="btn btn-primary">Payment</a> <a href="<?php echo base_url();?>administrator/milestonepayment/<?php echo base64_encode($post['order_id']); ?>/<?php echo base64_encode($post['payment_id']); ?>" rel='<?php echo $post['payment_id']; ?>' class="btn btn-danger deletemilestones">Delete</a><?php } ?></td>
                                    </tr>
                             <?php 
							 $counter = $counter + 1;
							 } ?>

                                <!-- <div class="paginate-link">
                                    <?php //echo $this->pagination->create_links(); ?>
                                </div>  -->

                                 </tbody>
                            </table>
                        </div>
							   </div>
                                </div>
                            </div>
                        </div>
                        <!-- Basic Form Inputs card end -->
                   
				   <div id="myModalMilestones" class="modal fade" role="dialog">
					<div class="modal-dialog">

					<!-- Modal content-->
					<div class="modal-content">
					<div class="modal-header change-role-m-h">
					
					<h4 class="modal-title">Create Milestones</h4>
					</div>
					<div class="modal-body">
						<div class="form-group row">
						<label class="col-sm-3 col-form-label"><b>Amount</b></label>
						<div class="col-sm-9">
							<div class="input-container">
							<i class="fa fa-gbp icon"></i>
							<input class="form-control" type="text" name="milestones" id="milestones" required>
							
							</div>
						  <span id="pending-error" style="display:none;">Amount should not be greater than pending amount</span>
							<span id="pending-error-zero" style="display:none;">Amount should be greater than zero</span>
						</div>
						</div>
						<div class="form-group row">
						<label class="col-sm-3 col-form-label"><b>Date</b></label>
						<div class="col-sm-9">
							<input class="form-control" type="date" name="milestonesDate" id="milestonesDate" required>
							
						</div>
						
						</div>
						<div class="form-group row">
						<label class="col-sm-3 col-form-label"></label>
						<div class="col-sm-9">
							<input class="btn btn-primary" type="submit" name="milestonessubmit" id="milestonessubmit" value="Submit">
							 <input type="hidden" name="orderid" id="orderid" value="<?php echo $this->uri->segment(3);?>" >
						</div>
						</div>
					</div>
					<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
					</div>
					</div>

					</div>
    </div>
    