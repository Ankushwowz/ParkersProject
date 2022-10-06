<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<div class="page-header">
                <div class="page-header-title">
                    <h4>Team Members</h4>
                </div>
              
            </div>
           
            <!-- Page-header end -->
            <!-- Page-body start -->
            <div class="page-body">
                <!-- DOM/Jquery table start -->

                <div class="card">
                    <div class="card-block">
                        <div class="table-responsive dt-responsive">
                            <table id="dom-jqry" class="table table-striped table-bordered nowrap">
                                <thead>
                                    <tr>
									<th>SL.no</th>
									<th>Employee No</th>
									<th>Name</th>
									<th>User Name</th>
                                    <th>Franchise Name</th>
									<th>Email</th>
									<th>Gender</th>
									<th>Dob</th>
									<th>Created Date</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
								
                                   $counter =1; 
                                foreach($users as $post) {
									
								  $EmployeNo =  'P0'.$post['id']; 
								 
								?>
                                 <tr>
                                        <td><?php echo $counter; ?></td>
                                        <td><?php  echo $EmployeNo;?></td>
                                       <td><?php echo $post['first_name'];?> <?php if(!empty($post['last_name'])) { echo $post['last_name'];}?></td>
                                        <td><a href="<?php echo base_url(); ?>administrator/users/viewprofile/<?php echo base64_encode($post['id']); ?>"><?php echo $post['username']; ?></a></td>
                                        <td><?php echo $post['franchise_user']; ?></td>
                                        <td><?php echo $post['email']; ?></td>
                                        
                                        <td><?php echo $post['gender']; ?></td>
										<td><?php if(!empty($post['dob'])) { echo date("M d,Y", strtotime($post['dob'])); } ?></td>
                                         <td><?php echo date("M d,Y", strtotime($post['created_date'])); ?></td>
                                        
                                    </tr>
                                <?php 

                                    $counter = $counter + 1;
								}?>

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

  
