<?php 

/*$id = $_GET['msg'];
echo $id;*/
//echo "<pre>"; print_r($view_resume['full_name']); die; 
if(!empty($_GET['msg']) && $_GET['msg']){

    $id = $_GET['msg'];

    $this->Administrator_Model->updatestatus($id);
    //$this->session->set_flashdata('success', 'Message Read.');
    redirect('administrator/viewcontact');
   
}

?>

<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<style type="text/css">
    #cls-hidecse{
        display: none;
    }
    /*#assiged_cse{
        display: none;
    }*/
    .cls-showcse{
        display: block;
    }
</style>
<!-- <script type="text/javascript">

$(document).ready(function(){
$('.selectbox').on('change', function(e) {    
    var french_id = $(this).val();
    var message_id = $(this).attr('rel');

    e.preventDefault();
    if(french_id != ''){
        jQuery.ajax({
            url: "<?php echo base_url(); ?>administrator/assign_contact_franchise",
            method: "POST",
            data: {french_id:french_id,message_id:message_id},
            success:function(data){
                        
                //alert("here");
                window.location.href = "<?php echo base_url(); ?>administrator/viewcontact";
                     //window.location.href = data.redirect;
            }
        });
    }else{
        alert('Not Done');
    }
});
});

</script> -->

<script type="text/javascript">


$(document).ready(function(){
    jQuery('.assign_contact_cls').click(function(){
        var message_id=  jQuery(this).attr('rel');
        //alert("MessageID " + message_id);
        jQuery('#assign_contact_id').val(message_id);
        });
    jQuery("#assign-contact-to-user").click(function(){ 
//$('.assign-resume-to-user').on('click', function(e) {    
        var message_id = $('#assign_contact_id').val();
        var assign_id = $('#user_id').val();
        //alert("ContactID " + message_id);
        //alert("AssignID " + assign_id);
        console.log("Contact" + message_id);
        console.log("Assign" + assign_id);
        
        if(assign_id==''){
                $('#user_id').css('border-color','red');
                return false;
            }

            var baseUrl = "<?php echo base_url()?>";
            jQuery.ajax({
                type: "POST",
                url: baseUrl+'administrator/assignContact',
                data: {
                message_id : message_id,
                user_id : assign_id
                
                },
                success: function(msg) 
                {
                    if(msg==1){
                     window.location.href = baseUrl+'administrator/viewcontact'; 

                    }
                }
            });
});
});

</script>



<script type="text/javascript">

$(document).ready(function(){
$('.assiged_cse').on('change', function(e) {    
    var cse_id = $(this).val();
    var message_id = $(this).attr('rel');
    e.preventDefault();
    if(cse_id != ''){
        jQuery.ajax({
            url: "<?php echo base_url(); ?>administrator/assign_message_cse",
            method: "POST",
            data: {cse_id:cse_id,message_id:message_id},
            success:function(data){
                window.location.href = "<?php echo base_url(); ?>administrator/viewcontact";
                     //window.location.href = data.redirect;
            }
        });
    }else{
        alert('Not Done');
    }
});
});

</script>

<script>
    $(document).ready(function(){
        $('.cls-accept').on('click',function(e){
            var message_id = $(this).attr('rel');
            var user_id = $(this).attr('rel-admin');
             e.preventDefault();
            if(message_id != ''){
                jQuery.ajax({
                    url: "<?php echo base_url(); ?>administrator/accept_message_franchise",
                    method: "POST",
                    data: {message_id:message_id,user_id:user_id},
                    success:function(data){
                        console.log(data);
                        //window.location.href = "<?php echo base_url(); ?>administrator/viewcontact";
                        location.reload();
                        document.getElementById('assiged_cse').style.display = "block";
                        $('#assiged_cse').fadeIn(3000);
                        //$(this).removeClass('.cls-hidecse').addClass('cls-showcse');                        //alert("here");
                             //window.location.href = data.redirect;
                             
                    }
                });
            }else{
                alert('Not Done');
            }
        });
    })
</script>
 
 <script type="text/javascript">
    $(document).ready(function(){
    $('.cse_status').on('change', function(e) { 
    var status = $(this).val();
    //alert(status);
   var contact_id = $(this).attr('rel');
   alert(contact_id);
   if(contact_id != ''){
    jQuery.ajax({
        url:"<?php echo base_url(); ?>administrator/contact_cse_status",
        method: "POST",
        data: {status:status,contact_id: contact_id},
        success: function(data){
            window.location.href="<?php echo base_url(); ?>administrator/viewcontact";
        }
    });
   }else{
    alert('Status Not Changed');
   }
   

});
});
</script>




            <!-- Page-header start -->
            <div class="page-header">
                <div class="page-header-title">
                    <h4><?php echo $title; ?></h4>
                </div>
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url(); ?>administrator/dashboard">
                                <i class="icofont icofont-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>administrator/viewcontact">Contacts</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">List Contacts</a>
                        </li>
                    </ul>
                </div>
               
            </div>
            <!-- Page-header end -->
            <!-- Page-body start -->
            <div class="page-body">
                <?php 
                    $assign_array = array('1','2','3'); 
                    $array = array('1','2','4'); 
                    $array_admin_user = array('1','2'); 
                ?>
                <!-- DOM/Jquery table start $testimonials-->
                <div class="card">
                    <div class="card-block">
                        <div class="table-responsive dt-responsive">
                            <table id="dom-jqry" class="table table-striped table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <!-- <th>Image</th> -->
                                        <th>Service Name</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Subject</th>                                        
                                        <th>Message</th>  
                                        <th>Assign By</th>                                     
                                        <?php if($this->session->userdata('role_id')==1 || $this->session->userdata('role_id')==2){ ?>                       
                                        <th>Assign To</th> <?php } ?>                                               
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 <?php
                                 $count = 1;
                                  foreach($contact_list as $contacts) : 
                                   //echo "<pre>"; print_r($contacts); die;
                                    ?>
                                    <tr>
                                        <td class="resume_id"><?php echo $count; ?></td>
                                        <!-- <td>
                                            <img width="20px;" src="<?php //echo site_url();?>assets/images/jobs/<?php //echo $resume['image']; ?> ">                                           
                                        </td> -->
                                        <td><?php echo $contacts['service_name']; ?></td>
                                        <td><?php echo $contacts['name']; ?></td>
                                        <td><?php echo $contacts['email']; ?></td>
                                        <td><?php echo $contacts['phone']; ?></td>
                                        <td><?php echo $contacts['subject']; ?></td>
                                        <td><?php echo $contacts['message']; ?></td>                                    
                                        <td><?php 
                                    if($this->session->userdata('role_id')==4){ echo $contacts['username']; } 
                                    if($this->session->userdata('role_id')==3 || $this->session->userdata('role_id')==1 || $this->session->userdata('role_id')==2){ echo $contacts['assignedby']; } 
                                        ?> </td>

                                       <?php if($this->session->userdata('role_id')==1 || $this->session->userdata('role_id')==2){ ?>
                                        <td><?php 
                                        if($this->session->userdata('role_id')==1 || $this->session->userdata('role_id')==2){ echo $contacts['username']; }
                                            //if($this->session->userdata('role_id')==3){ echo $contacts['cse_assigned']; } 
                                        ?></td>
                                    <?php } ?>

                                                                      
                                        <td>
                                            <a class="label label-inverse-info" href='<?php echo base_url(); ?>administrator/contactview/<?php echo $contacts['id']; ?>'>View</a>
                                            
                                       <?php if($this->session->userdata('role_id')==3 && $contacts['franch_status']!='accepted'){ ?>
                                            
                                            <!-- <a class="label label-inverse-primary enable cls-accept" href='<?php echo base_url(); ?>administrator/accept_message_franchise/<?php echo $contacts['id']; ?>'">Accept</a> -->

                                           <a class="label label-inverse-primary enable cls-accept" rel-admin = "<?php echo $contacts['assigned_by']; ?>" rel="<?php echo $contacts['id']; ?>">Accept</a>
                                           <a class="label label-inverse-warning desable" href='<?php echo base_url(); ?>administrator/reject_message_franchise/<?php echo $contacts['id']; ?>'>Reject</a>
                                            
                                            <!-- <a  class="label label-inverse-primary assign_contact_cls" rel="<?php echo $contacts['id']; ?>"  class="label label-inverse-info" href='#' data-toggle="modal" data-target="#myModalAssignorder">Assign Contact</a> -->

                                       <?php  } else{if($this->session->userdata('role_id')==1){ ?>
                                            <a  class="label label-inverse-primary assign_contact_cls" rel="<?php echo $contacts['id']; ?>"  class="label label-inverse-info" href='#' data-toggle="modal" data-target="#myModalAssignorder">Assign Contact</a>
                                        <?php } } ?>
                                            
                                        </td>
                                        
                                    </tr>
                                <?php $count++; endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- DOM/Jquery table end -->
                        
                      

                    </div>
                </div>
            </div>
            <!-- Page body end -->
        </div>
    </div>
    <!-- Main-body end -->  


<!----- myModalAssignorder------------------------>
        <div id="myModalAssignorder" class="modal fade" role="dialog">
        <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header change-role-m-h">

        <h4 class="modal-title">Assign Contacts</h4>
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
        <label class="col-sm-3 col-form-label">Assign Contact :</label>
        <div class="col-sm-9">
        <select name="users" class="form-control" id="user_id">
        <?php if (in_array($this->session->userdata('role_id'), $array_admin_user)){  ?>
        <option value=""> Select Franchise Executive</option>
        <?php } else { ?>
        <option value=""> Select Customer Support Executive </option>
        <?php } ?>
        

        </select>
        
        <input type="hidden" id="assign_contact_id" name="contact_id" value="" >
        </div>
        </div>

          <div class="form-group row">
        <label class="col-sm-3 col-form-label"></label>
        <div class="col-sm-9">

        <button type="button" class="btn btn-primary" data-dismiss="modal" id="assign-contact-to-user">Submit</button>
        </div>
        </div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        </div>
        </div>

        </div>
        </div>
        