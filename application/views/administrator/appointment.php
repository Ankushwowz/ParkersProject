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
                         <?php if($this->session->userdata('role_id')==1 || $this->session->userdata('role_id')==2  || $this->session->userdata('role_id')==3 || $this->session->userdata('role_id')==4){ ?>
							    <a rel="<?php echo $appointmentinfo['appointmentID']; ?>" class="label label-inverse-primary edit_data" data-toggle="modal" data-target="#editAppointment " href="<?php echo base_url(); ?>administrator/editAppointment/<?php echo $appointmentinfo['appointmentID']; ?>">Edit</a>
								<a  rel="<?php echo $appointmentinfo['appointmentID']; ?>" class="label label-inverse-danger delete_appointment" href='<?php echo base_url(); ?>administrator/deleteAppointment/<?php echo $appointmentinfo['appointmentID']; ?>'>Delete</a>
                     <?php } ?>
								
								
								</td>
							 
							</tr> <?php 
						} 
					 }?>
                     </tbody>
                  </table>
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
                     <input type="text" name="clientName" class="form-control appointment_form_validate" placeholder="Client Name" value="" id="clientName" required="true">
                  </div>
               </div>
               <div class="form-group row">
                  <label class="col-md-4 col-form-label">Business Name:</label>
                  <div class="col-md-8">
                     <input type="text"  name="businessName" id="businessName" class="form-control" value="" placeholder="Business Name" required="true">
                  </div>
               </div>
               <div class="form-group row">
                  <label class="col-md-4 col-form-label">Business Number:</label>
                  <div class="col-md-8">
                     <input type="text"  name="businessNumber" id="businessNumber" class="form-control" value="" placeholder="Business Number" required="true">
                  </div>
               </div>
               <div class="form-group row">
                  <label class="col-md-4 col-form-label">Mobile Number:</label>
                  <div class="col-md-8">
                     <input type="text"  name="mobileNumber" id="mobileNumber" class="form-control" value="" placeholder="Mobile Number" required="true">
                  </div>
               </div>
               <div class="form-group row">
                  <label class="col-md-4 col-form-label">Address:</label>
                  <div class="col-md-8">
                     <textarea  name="address" id="address" class="form-control" value="" placeholder="Address" required="true"></textarea>
                  </div>
               </div>
               <div class="form-group row">
                  <label class="col-md-4 col-form-label">Service:</label>
                  <div class="col-md-8">
                     <select class="form-control" name="serviceID" id="serviceID" required="true">
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
                     <input type="date"  name="appointmentDate" id="appointmentDate" class="form-control" value="" placeholder="Appointment Date" required="true">
                  </div>
               </div>
               <div class="form-group row">
                  <label class="col-md-4 col-form-label">Appointment Time:</label>
                  <div class="col-md-8" style="padding: 0;">
                     <div class="col-md-12">
                        <div class="col-md-4" style="float:left; padding: 0;">
                           <select class="form-control" name="AppointmentHours" id="AppointmentHours" required="true">
						   <option value="">Hours</option>
                              <?php for ($x = 1; $x <= 12; $x++) { ?> 
                              <option value="<?php echo $x;?>"><?php if($x <= 9) { echo'0'.$x;}else{ echo $x;}?></option>
                              <?php 
                                 } ?>
                           </select>
                        </div>
						 <div class="col-md-4" style="float:left; padding: 0;">
                           <select class="form-control" name="AppointmentMintus" id="AppointmentMintus"  required="true">
						    <option value="">Min</option>
                              <?php for ($x = 0; $x <= 59; $x++) { ?> 
                              <option value="<?php if($x <= 9) { echo'0'.$x;}else{ echo $x;}?>"><?php if($x <= 9) { echo'0'.$x;}else{ echo $x;}?></option>
                              <?php 
                                 } ?>
                           </select>
                        </div>
                        <div class="col-md-4" style="float:left; padding:0 0 0 6px;">
                           <select class="form-control" name="AppointmentTime" id="AppointmentTime">
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
                     <textarea  name="meetinglocation" class="form-control" id="meetinglocation" value="" placeholder="Meeting Location" required="true"></textarea>
                  </div>
               </div>
               <div class="form-group row">
                  <label class="col-md-4 col-form-label">Notes:</label>
                  <div class="col-md-8">
                     <textarea  name="notes" id="notes" class="form-control" value="" placeholder="Notes" required="true"></textarea>
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


<!--------- Edit Appointment Start Here ---------->
<div id="editAppointment" class="modal fade" role="dialog" aria-hidden="true">
   <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
         <div class="modal-header change-role-m-h">
            <h4 class="modal-title">Create Appointment</h4>
         </div>
         <div class="modal-body">
            <div class="col-md-12">
               <!-- Basic Form Inputs card start -->
               <?php echo form_open_multipart('',array('id'=>'my_form_appointments','role'=>'form','novalidate'=>'')); ?>
               <input type="hidden" id="appointmentID" name="appointmentID">
               <div class="form-group row">
                  <label class="col-md-4 col-form-label">Client Name:</label>
                  <div class="col-md-8">
                     <input type="text" name="clientName" id="clientName" class="form-control appointment_form_validate" placeholder="Client Name" value="" required="true">
                  </div>
               </div>
               <div class="form-group row">
                  <label class="col-md-4 col-form-label">Business Name:</label>
                  <div class="col-md-8">
                     <input type="text"  name="businessName" id="businessName" class="form-control" value="" placeholder="Business Name" required="true">
                  </div>
               </div>
               <div class="form-group row">
                  <label class="col-md-4 col-form-label">Business Number:</label>
                  <div class="col-md-8">
                     <input type="text"  name="businessNumber" id ="businessNumber" class="form-control" value="" placeholder="Business Number" required="true">
                  </div>
               </div>
               <div class="form-group row">
                  <label class="col-md-4 col-form-label">Mobile Number:</label>
                  <div class="col-md-8">
                     <input type="text"  name="mobileNumber" id="mobileNumber" class="form-control" value="" placeholder="Mobile Number" required="true">
                  </div>
               </div>
               <div class="form-group row">
                  <label class="col-md-4 col-form-label">Address:</label>
                  <div class="col-md-8">
                     <textarea  name="address" class="form-control" id ="address" value="" placeholder="Address" required="true"></textarea>
                  </div>
               </div>
               <div class="form-group row">
                  <label class="col-md-4 col-form-label">Service:</label>
                  <div class="col-md-8">
                     <select class="form-control" name="serviceID" required="true" id="serviceID">
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
                     <input type="date"  name="appointmentDate" class="form-control" id="appointmentDate" value="" placeholder="Appointment Date" required="true">
                  </div>
               </div>
               <div class="form-group row">
                  <label class="col-md-4 col-form-label">Appointment Time:</label>
                  <div class="col-md-8" style="padding: 0;">
                     <div class="col-md-12">
                        <div class="col-md-4" style="float:left; padding: 0;">
                           <select class="form-control" name="AppointmentHours"  required="true" id="AppointmentHours">
                     <option value="">Hours</option>
                              <?php for ($x = 1; $x <= 12; $x++) { ?> 
                              <option value="<?php echo $x;?>"><?php if($x <= 9) { echo'0'.$x;}else{ echo $x;}?></option>
                              <?php 
                                 } ?>
                           </select>
                        </div>
                   <div class="col-md-4" style="float:left; padding: 0;">
                           <select class="form-control" name="AppointmentMintus"  required="true" id="AppointmentMintus">
                      <option value="">Min</option>
                              <?php for ($x = 0; $x <= 59; $x++) { ?> 
                              <option value="<?php if($x <= 9) { echo'0'.$x;}else{ echo $x;}?>"><?php if($x <= 9) { echo'0'.$x;}else{ echo $x;}?></option>
                              <?php 
                                 } ?>
                           </select>
                        </div>
                        <div class="col-md-4" style="float:left; padding:0 0 0 6px;">
                           <select class="form-control" name="AppointmentTime" id="AppointmentTime">
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
                     <textarea  name="meetinglocation" id="meetinglocation" class="form-control" value="" placeholder="Meeting Location" required="true"></textarea>
                  </div>
               </div>
               <div class="form-group row">
                  <label class="col-md-4 col-form-label">Notes:</label>
                  <div class="col-md-8">
                     <textarea  name="notes" class="form-control" id="notes" value="" placeholder="Notes" required="true"></textarea>
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
<!--------- Edit Appointment End Here ---------->
