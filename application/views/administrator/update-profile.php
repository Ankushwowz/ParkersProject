<div class="page-header">
                <div class="page-header-title">
                    <h4>Update Profile</h4>
                </div>
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index-2.html">
                                <i class="icofont icofont-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Users</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Update Profile</a>
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
                                <h5>Update User</h5>
                                <!-- <div class="card-header-right">
                                    <i class="icofont icofont-rounded-down"></i>
                                    <i class="icofont icofont-refresh"></i>
                                    <i class="icofont icofont-close-circled"></i>
                                </div> -->
                            </div>
                            <div class="card-block">
                             <div class="col-sm-8">
							 <?php //echo"<pre>"; print_r($user);?>
                               <?php echo form_open_multipart('administrator/update-profile',array('id'=>'my_form','role'=>'form','novalidate'=>'')); ?>
                                     <input type="hidden" name="user_id" class="form-control" value="<?php echo $this->session->userdata('user_id'); ?>">
                                   
                                   <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">First Name</label>
                                        <div class="col-sm-9">
                                            <input type="text"  name="first_name" class="form-control" value="<?php if(!empty($user['first_name'])) { echo $user['first_name']; } ?>" placeholder="First Name" required="true">
                                        </div>
                                    </div>
                                 
                                  <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Last Name</label>
                                        <div class="col-sm-9">
                                            <input type="text"  name="last_name" class="form-control" value="<?php if(!empty($user['last_name'])) { echo $user['last_name']; } ?>" placeholder="Last Name" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Country</label>
                                        <div class="col-sm-9">
                                          
											
											  <select name="country" id="country" class="form-control" required="true">
                                                <option value="">Select Country</option>
                                                <?php
                                                foreach($country as $row)
                                                { ?>
													<option value="<?php echo $row->id; ?>" <?php if(!empty($user['country']) && $user['country']==$row->id) { echo "selected"; }?>> <?php echo $row->name; ?></option>
                                               <?php  }
                                                ?>
                                               </select>
                                        </div>
                                        </div>
                                 
                                     <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">State</label>
                                        <div class="col-sm-9">
                                            <!--<input type="text"  name="state" class="form-control" value="<?php //echo $user['state']; ?>" placeholder="State">-->
											
											<select name="state" id="state" class="form-control" required="true">
                                                <?php
                                                foreach($user['statelist'] as $stateData)
                                                { ?>
													<option value="<?php echo $stateData->id; ?>" <?php if(!empty($user['state']) && $user['state']==$stateData->id) { echo "selected"; }?>> <?php echo $stateData->name; ?></option>
                                               <?php  }
                                                ?>
                                               </select>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">City</label>
                                        <div class="col-sm-9">
                                            <input type="text"  name="city" class="form-control" value="<?php if(!empty($user['city'])) { echo $user['city']; } ?>" placeholder="City" required="true">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Address</label>
                                        <div class="col-sm-9">
                                            <textarea name="address" class="form-control" placeholder="Address" required="true"><?php if(!empty($user['address'])) { echo $user['address']; } ?></textarea>
                                        </div>
                                    </div>
                                     <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Address1</label>
                                        <div class="col-sm-9">
                                            <textarea name="address1" class="form-control" placeholder="Address1" required="true"><?php if(!empty($user['address1']))  { echo $user['address1']; } ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Zipcode</label>
                                        <div class="col-sm-9">
                                            <input type="text"  name="zipcode" value="<?php if(!empty($user['zipcode'])) {  echo $user['zipcode']; } ?>" class="form-control" placeholder="Zipcode" required="true">
                                        </div>
                                    </div>
                                    <div class="form-group row" style="float:center;">
                                    <label class="col-sm-3 col-form-label">Gender</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <label>
                                            <input value="Male" checked=""  <?php if($user['gender'] == 'Male'){ echo "checked"; } ?> name="gender" type="radio"><i class="helper"></i> Male
                                        </label>
										   &nbsp;&nbsp;&nbsp;&nbsp;
                                         <label>
                                            <input value="Female" <?php if($user['gender'] == 'Female'){ echo "checked"; } ?> name="gender"  type="radio"><i class="helper"></i> Female
                                        </label>
                                 
                                        
                                    </div>
                                     <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">User Image</label>
                                        <div class="col-sm-6">
										<?php if(!empty($user['image'])) { ?>
                                           <img src="<?php echo base_url().'assets/images/users/'.$user['image']; ?>" width="70px">
										<?php } else { ?>
										 <img src="<?php echo base_url().'assets/images/users/head.png'; ?>" width="70px">
										<?php } ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Update Image</label>
                                        <div class="col-sm-6">
                                            <input type="file" name="userfile" class="form-control">
                                        </div>
                                    </div>
                                   
                                  
                                            <input type="hidden" value="<?php echo $user['image']; ?>" name="old_userfile"  />

                                            <input type="hidden" value="<?php echo $user['status']; ?>" name="status" class="js-single" />
                                        
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label"></label>
                                        <div class="col-sm-9">
                                            <input type="submit" name="submit" class="btn btn-primary" value="Update">
                                        </div>
                                    </div>
                                    <textarea id="description" style="visibility: hidden;"></textarea>
                                </form>
                               </div>
                                   
                                </div>
                            </div>
                        </div>
        
    