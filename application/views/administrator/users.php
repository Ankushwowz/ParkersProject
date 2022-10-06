<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<div class="page-header">
                <div class="page-header-title">
                    <h4>Users List</h4>
                </div>
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url(); ?>administrator/dashboard">
                                <i class="icofont icofont-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>administrator/users/users">Users</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Users List</a>
                        </li>
                    </ul>
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
                                        <th>Email</th>
                                       <th>Role</th>
                                       <th>Gender</th>
                                       <th>Dob</th>
                                        <th>Created Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
								$role_array = array('1','2'); 
                                   $counter =1; 
                                foreach($users as $post) :
								
								if($post['role_id']=='3') { 
									$EmployeNo =  $post['statesName']."-".substr($post['username'],0,3).'-'.$post['id']; 
								}else 
								{
								$EmployeNo = "P0".$post['id']; 
								} 
								?>
                                 <tr>
                                        <td><?php echo $counter; ?></td>
                                        <td><?php  echo $EmployeNo;?></td>
                                       <td><?php echo $post['first_name'];?> <?php if(!empty($post['last_name'])) { echo $post['last_name'];}?></td>
                                        <td><a href="<?php echo base_url(); ?>administrator/users/viewprofile/<?php echo base64_encode($post['id']); ?>"><?php echo $post['username']; ?></a></td>
                                        <td><?php echo $post['email']; ?></td>
                                        <td><?php echo $post['role_name']; ?></td>
                                        <td><?php echo $post['gender']; ?></td>
										<td><?php if(!empty($post['dob'])) { echo date("M d,Y", strtotime($post['dob'])); } ?></td>
                                         <td><?php echo date("M d,Y", strtotime($post['register_date'])); ?></td>
                                        <td>
										<?php if (in_array($this->session->userdata('role_id'), $role_array)) { ?>
											<a  rel="<?php echo $post['id']; ?>" class="label label-inverse-primary" href='<?php echo base_url(); ?>administrator/edituser/<?php echo base64_encode($post['id']); ?>'>Edit</a>
											<a  rel="<?php echo $post['id']; ?>" class="label label-inverse-danger delete" href='<?php echo base_url(); ?>administrator/delete/<?php echo $post['id']; ?>'>Delete</a>
										
                                              <a  class="label label-inverse-primary change-role-cls" rel="<?php echo $post['id']; ?>" role_id="<?php echo $post['role_id']; ?>"  class="label label-inverse-info" href='#' data-toggle="modal" data-target="#myModalChangerole">Change Role</a>
											  <?php } ?>
											   <?php if($post['status'] == 1){ ?>
                                               <a class="label label-inverse-primary enabled_user"  user_id="<?php 
											   echo $post['id']; ?>" rel="disabled"  href='<?php echo base_url(); ?>administrator/enable/<?php echo $post['id']; ?>?table=<?php echo base64_encode('users'); ?>'>Enabled</a>
                                                <?php }else{ ?> 
                                                <a class="label label-inverse-warning disabled_user" user_id="<?php echo $post['id']; ?>" rel="enabled" href='<?php echo base_url(); ?>administrator/desable/<?php echo $post['id']; ?>?table=<?php echo base64_encode('users'); ?>'>Disabled</a>
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

    <div id="myModalChangerole" class="modal fade" role="dialog">
    <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
    <div class="modal-header change-role-m-h">
    
    <h4 class="modal-title">Change Role</h4>
    </div>
    <div class="modal-body">
        <div class="form-group row">
        <label class="col-sm-3 col-form-label">Role</label>
        <div class="col-sm-9">
        <select name="role" class="form-control" id="roles">
       
        <?php foreach($roles as $role){ ?>
        <option value="<?php echo $role['role_id']?>"><?php echo $role['role_name'];?></option>
        <?php } ?>

        </select>
        <input type="hidden" name="userid" id="userid" >
		</div>
        </div>
		
		  <div class="form-group row">
        <label class="col-sm-3 col-form-label"></label>
        <div class="col-sm-9">
       
       <button type="button" class="btn btn-primary" data-dismiss="modal" id="change-role-submit">Submit</button>
		</div>
        </div>
    </div>
    <div class="modal-footer">
    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
    </div>
    </div>

    </div>
    </div>
