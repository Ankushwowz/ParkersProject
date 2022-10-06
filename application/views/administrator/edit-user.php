<div class="page-header">
                <div class="page-header-title">
                    <h4>Users</h4>
                </div>
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url(); ?>administrator/dashboard">
                                <i class="icofont icofont-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>administrator/users/add-user">Users</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Add Users</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Page header end -->
            <!-- Page body start -->
            <div class="page-body">
                <div class="row">
                    <div class="col-sm-12">
                        <!-- Basic Form Inputs card start -->
                        <div class="card">
                            <div class="card-header">
                                <h5>Add User</h5>
                                <!-- <div class="card-header-right">
                                    <i class="icofont icofont-rounded-down"></i>
                                    <i class="icofont icofont-refresh"></i>
                                    <i class="icofont icofont-close-circled"></i>
                                </div> -->
                            </div>
                            <div class="card-block">
                             <div class="col-sm-8">
                                 <div class="validation_errors_alert">

                                </div>
                            </div>
                             <div class="col-sm-8">
							<?php $user_id = $this->uri->segment('3'); ?>
                               <?php echo form_open_multipart('administrator/edituser/'.$user_id ,array('id'=>'my_form','role'=>'form','novalidate'=>'')); ?>
                                
                                
                                <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Role</label>
                                        <div class="col-sm-9">
                                            <select name="role" id="role" class="form-control" required="true">
                                               <option value="">Select Role</option>
                                                <?php foreach($roles as $role){ ?>
                                                <option value="<?php echo $role['role_id']?>" <?php if($editUser['role_id']==$role['role_id']) { echo "selected"; }?>><?php echo $role['role_name'];?></option>
                                            <?php } ?>
                                               
                                            </select>
                                        </div>
                                    </div>


                                    <?php if(!empty($editUser['franchise_id'])){ ?>
                                    <div class="form-group row" id="franchise">
                                        <label class="col-sm-3 col-form-label">Franchise</label>
                                        <div class="col-sm-9">                                            
                                            <select name="franchise" class="form-control" required="true">
                                                <option value="">Select Franchise</option>
                                                <?php foreach($franchise_role as $franchise){ ?>

                                                <option value="<?php echo $franchise['id']?>" <?php if($editUser['franchise_id']==$franchise['id']) { echo "selected"; }?>> <?php echo $franchise['username']; ?></option>   

                                                
                                            <?php } ?>
                                               
                                            </select>
                                        </div>
                                    </div>
                                    <?php }else { ?> 
                                        <div class="form-group row" id="franchise" style='display:none;'>
                                        <label class="col-sm-3 col-form-label">Franchise</label>
                                        <div class="col-sm-9">
                                            <select name="franchise" class="form-control" required="true">
                                                <option value="">Select Franchise</option>
                                                <?php foreach($franchise_role as $franchise){ ?>
                                                <option value="<?php echo $franchise['id']?>" <?php if(!empty($_POST['franchise']) && $_POST['franchise']==$franchise['id']) { echo"selected";
                                                    
                                                }?>><?php echo $franchise['username'];?></option>
                                            <?php } ?>
                                               
                                            </select>
                                        </div>
                                    </div>
                                    <?php }?>
                                
                                   
								<div class="form-group row">
								<label class="col-sm-3 col-form-label">Email</label>
								<div class="col-sm-9">
									<input readonly type="text"  name="email" class="form-control" placeholder="Email" value="<?php if(!empty($editUser['email'])) { echo $editUser['email']; }?>" required="true">
								</div>
								</div>
                                 <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">First Name</label>
                                        <div class="col-sm-9">
                                            <input type="text"  name="first_name" class="form-control" value="<?php if(!empty($editUser['first_name'])) { echo $editUser['first_name']; } ?>" placeholder="First Name" required="true">
                                        </div>
                                    </div>
                                 
                                  <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Surname</label>
                                        <div class="col-sm-9">
                                            <input type="text"  name="surname" class="form-control" value="<?php if(!empty($editUser['last_name'])) { echo $editUser['last_name']; } ?>" placeholder="Surname" required="true">
                                        </div>
                                    </div>
                                   
                                     <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">User Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="username" class="form-control" placeholder="User Name" value="<?php if(!empty($editUser['username'])) { echo $editUser['username']; }?>" required="true">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Password</label>
                                        <div class="col-sm-9">
                                            <input type="password" name="password" class="form-control" placeholder="Password" value="<?php if(!empty($editUser['plain_password'])){ echo $editUser['plain_password']; } ?>" >
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Country</label>
                                        <div class="col-sm-9">
                                            <?php $data['country'] = $this->Administrator_Model->fetch_country();?>
                                           <select name="country" id="country" class="form-control input-lg" required="true">
                                                <option value="">Select Country</option>
                                                <?php
                                                foreach($data['country'] as $row)
                                                { ?>
													<option value="<?php echo $row->id; ?>" <?php if($editUser['country']== $row->id) { echo "selected"; }?>> <?php echo $row->name; ?></option>
                                               <?php  }
                                                ?>
                                               </select>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">State</label>
                                        <div class="col-sm-9">
                                          <select name="state" id="state" class="form-control" required="true">
                                                <?php
                                                foreach($editUser['statelist'] as $stateData)
                                                { ?>
													<option value="<?php echo $stateData->id; ?>" <?php if(!empty($editUser['state']) && $editUser['state']==$stateData->id) { echo "selected"; }?>> <?php echo $stateData->name; ?></option>
                                               <?php  }
                                                ?>
                                               </select>
                                        </div>
                                    </div> 

                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Zipcode</label>
                                        <div class="col-sm-9">
                                            <input type="text"  value="<?php if(!empty($editUser['zipcode'])) { echo $editUser['zipcode']; }?>"  name="zipcode" class="form-control" placeholder="Zipcode" required="true">
                                           <!-- <select name="city" id="city" class="form-control input-lg">
                                                <option value="">Select City</option>
                                            </select> -->
                                        </div>
                                    </div>
									  <div class="form-group row" style="float:center;">
                                    <label class="col-sm-3 col-form-label">Gender</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <label>
                                            <input value="Male" checked <?php if(!empty($editUser['gender'])) { if($editUser['gender'] == 'Male'){ echo "checked"; }  }?> name="gender" type="radio"><i class="helper"></i> Male
                                        </label>
										   &nbsp;&nbsp;&nbsp;&nbsp;
                                         <label>
                                            <input value="Female" <?php if(!empty($editUser['gender'])) { if($editUser['gender'] == 'Female'){ echo "checked"; } } ?> name="gender"  type="radio"><i class="helper"></i> Female
                                        </label>
                                 
                                        
                                    </div>
									   <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Date of Birth</label>
                                        <div class="col-sm-9">
                                            <input type="date"  value="<?php if(!empty($editUser['dob'])){ echo $editUser['dob']; } ?>"  name="dob" class="form-control" placeholder="Date of Birth" required="true">
                                          
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label"></label>
                                        <div class="col-sm-9">
                                            <button type="submit" name="submit" class="btn btn-primary">Update User</button>
                                        </div>
                                    </div>
                                    <textarea id="description" style="visibility: hidden;"></textarea>
                                    
                                </form>
                               </div>
                                   
                                </div>
                            </div>
                        </div>
                        <!-- Basic Form Inputs card end -->
                   
                       