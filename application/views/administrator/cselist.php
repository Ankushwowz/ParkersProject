<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<div class="page-header">
                <div class="page-header-title">
                    <h4>CSE Change Request</h4>
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
                        <li class="breadcrumb-item"><a href="#!">CSE Change Request</a>
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
                                        <th>User Name</th>
                                        <th>Email</th>
                                       <th>Role</th>
                                        <th>Created Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
								$role_array = array('1'); 
                                   $counter =1; 
                                foreach($users as $post) :						
								?>
                                 <tr>
                                        <td><?php echo $counter; ?></td>
                                        <td><a href="<?php echo base_url(); ?>administrator/users/viewprofile/<?php echo base64_encode($post['id']); ?>"><?php echo $post['username']; ?></a></td>
                                        <td><?php echo $post['email']; ?></td>

                                        <td><?php 
                                            if($post['role_id']==1){ echo"Supper Admin";}
                                            if($post['role_id']==2){ echo"Customer Support Admin";}
                                            if($post['role_id']==3){ echo"Franchise Executive";}
                                            if($post['role_id']==4){ echo"Customer Support Executive";}
                                            if($post['role_id']==5){ echo"Client";}
                                            if($post['role_id']==6){ echo"User";}
                                            ?> 
                                        </td>

                                       
                                         <td><?php echo date("M d,Y", strtotime($post['register_date'])); ?></td>
                                         <td>
                                            <?php if($post['switch_fe_status'] == ''){ ?>
                                            <a  rel="<?php echo $post['id']; ?>" rel2="<?php echo $post['franchise_id']; ?>" class="label label-inverse-primary change-roleto-cls" href="">Request for Franchise</a></td>
                                        <?php } ?>
                                        <!-- <td>
                                            <?php if (in_array($this->session->userdata('role_id'), $role_array)) { ?>
                                                                                    
                                              <a  class="label label-inverse-primary change-ferole-cls" rel="<?php echo $post['id']; ?>" role_id="<?php echo $post['role_id']; ?>"  class="label label-inverse-info" href='#' data-toggle="modal" data-target="#myModalChangerole">Change Role</a>
                                                                                      <?php } ?>
                                                                                       
                                        </td> -->
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
       
       <button type="button" class="btn btn-primary" data-dismiss="modal" id="change-ferole-submit">Submit</button>
		</div>
        </div>
    </div>
    <div class="modal-footer">
    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
    </div>
    </div>

    </div>
    </div>
