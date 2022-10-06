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

/*TABS CSS START HERE*/


.nav-tabs {
    border-bottom: none !important;
    background: #2c3e50;
    margin-left: 46px;
}
.nav-tabs .nav-link.active {
    color: #fff; background-color:#1ABC9C; border-color: #2c3e50;
}

.card-block.report-list {
    width: 970px;
}
.nav-tabs .nav-link {
color: #fff;
	}
/*TABS CSS END HERE*/



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
				</form>
				</div>
				
				</div>



				<ul class="nav nav-tabs" id="myTab" role="tablist">

			         <li class="nav-item">
			            <a class="nav-link <?php if(empty($_GET['tab'])) { echo 'active';}?>  <?php if(isset($_GET['tab']) && $_GET['tab']=='pending') { echo 'active';}?>" id="pending-sale-tab" data-toggle="tab" href="#pending" role="tab" aria-controls="pending" aria-selected="false">CSE Result</a>
			         </li>
			         <li class="nav-item">
			            <a class="nav-link <?php if(isset($_GET['tab']) && $_GET['tab']=='completed') { echo 'active';}?>" id="completed-sales-tab" data-toggle="tab" href="#completed" role="tab" aria-controls="completed"
			               aria-selected="false">Sales Report</a>
			         </li>
			       
			      </ul>
			

				<div class="tab-content" id="myTabContent">
				  <div class="tab-pane active" id="pending">
				  		<div class="card">
                    	<div class="card-block">
                      		<div class="table-responsive dt-responsive adv-table">
                           		<table  class="display table table-bordered table-striped" id="dynamic-table1">
                                <thead>
                                    <tr>	
									 <th>OrderID</th>
									 <th>Franchise Name</th>
									 <th>Business Name	</th>
									 <th>Created By	</th>
									 <th>Country</th>									
									 <th>State</th>
									 <th>Sale Status</th>				
                                    </tr>
                                </thead>
                                <tbody>
								  <?php 
								  $orderid =5000;
                                   $counter =1; 
								   foreach($ordersReports as $post) : 
									$username = json_decode($post['order_data']);
									//echo "<pre>"; print_r($username); die;									
								 
								  ?>
                                 <tr>
                                 	<td><?php echo  $orderid + $post['order_id']; ?></td>
                                 	<td><?php echo $post['franchise_user']; ?></td>
									<td><?php echo $username->Company_Name; ?></td>
									<td><?php echo $post['username']; ?><br> <?php if(!empty($post['role_name'])) { ?><b class="color-cls">(<?php echo $post['role_name'];?>)</b> <?php } ?></td>
									<td><?php echo $post['countryName']; ?></td>
									<td><?php echo $post['statesName']; ?></td>
									<td><?php 
									if($post['order_Status']==1){ echo"Pending";}
									if($post['order_Status']==2){ echo"Processing";}
									if($post['order_Status']==3){ echo"On Hold";}
									if($post['order_Status']==4){ echo"Dispute";}
									if($post['order_Status']==5){ echo"Completed";}
									
									?></td>
									
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

				  </div>
				  <div class="tab-pane" id="completed">
				  	<div class="card">
                    	<div class="card-block report-list">
                      		<div class="table-responsive dt-responsive adv-table">
                           		<table  class="display table table-bordered table-striped" id="dynamic-table1">
                                <thead>
                                    <tr>	
									 <th>Franchise Name</th>
									 <th>Month</th>
									 <th>Completed Sales</th>
									 <th>Hold</th>
									 <th>Pending</th>
									 <th>Processing</th>
									 									 			
                                    </tr>
                                </thead>
                                <tbody>
								  <?php 
								  $orderid =5000;
                                   $counter =1; 
								   foreach($ordersReportsCount as $ordersReports) : 
									$username = json_decode($post['order_data']);
								  ?>
                                 <tr>
                                 	<td><?php echo $ordersReports['franchise_user']; ?></td>
                                 	<td><?php echo date("M d,Y", strtotime($post['created_at'])); ?></td>
									<td><?php echo $ordersReports['Completed'] ?></td>
									<td><?php echo $ordersReports['Hold'] ?></td>
									<td><?php echo $ordersReports['Pending']; ?></td>
									<td><?php echo $ordersReports['Processsing']; ?></td>
									
									
									
                                    </tr>
                                <?php 

                                    $counter = $counter + 1;
									endforeach;?>

                                <!-- <div class="paginate-link">
                                    <?php //echo $this->pagination->create_links(); ?>
                                </div>  -->

                                 </tbody>
                            </table>
                        </div>
                    </div>
                </div> 

				  </div>
				  <!-- <div class=tab-pane id=form>2</div>
				  <div class=tab-pane id=status>3</div>
				  <div class=tab-pane id=reports>4</div> -->
				</div>	


                
             
	

                
                <!-- DOM/Jquery table end -->
            </div>

      <!-- Javascript -->

<!--Add custom filter methods-->

