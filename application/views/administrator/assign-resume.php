<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/assets/pages/data-table/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/bower_components/ekko-lightbox/dist/ekko-lightbox.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/bower_components/lightbox2/dist/css/lightbox.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">

$(document).ready(function(){
$('.selectbox').on('change', function(e) {    
    
    var assign_id = $(this).val();
    var resume_id = $(this).attr('rel');
    //alert("Assign" + assign_id);
    //alert("order_id" + resume_id);
    e.preventDefault();
    if(assign_id != ''){
        jQuery.ajax({
            url: "<?php echo base_url(); ?>administrator/assign_franchise",
            method: "POST",
            data: {user_id:assign_id,resume_id:resume_id},
            success:function(data){
                //alert("here");
                window.location.href = "<?php echo base_url(); ?>administrator/dashboard";
                     //window.location.href = data.redirect;
            }
        });
    }else{
        alert('Not Done');
    }
  //alert( main );
    //var main = document.getElementById("assign").value;
});
});

</script>
<script type="text/javascript">
    $(document).ready(function(){
    $('.selectstatus').on('change', function(e) {    
   var status = $(this).val();
    alert(status);
   var resume_id = $(this).attr('rel');
    alert(resume_id);
   if(resume_id != ''){
    jQuery.ajax({
        url:"<?php echo base_url(); ?>administrator/change_status",
        method: "POST",
        data: {status:status,resume_id: resume_id},
        success: function(data){
            window.location.href="<?php echo base_url(); ?>administrator/resume";
        }
    });
   }else{
    alert('Status Not Changed');
   }
   

});
});
</script>


<script type="text/javascript">

$(document).ready(function(){
$('.selectbox1').on('change', function(e) {    
    var cse_id = $(this).val();
    var resume_id = $(this).attr('rel');
    e.preventDefault();
    if(cse_id != ''){
        jQuery.ajax({
            url: "<?php echo base_url(); ?>administrator/assign_cse",
            method: "POST",
            data: {cse_id:cse_id,resume_id:resume_id},
            success:function(data){
                //alert("here");
                window.location.href = "<?php echo base_url(); ?>administrator/resume";
                     //window.location.href = data.redirect;
            }
        });
    }else{
        alert('Not Done');
    }
  //alert( main );
    //var main = document.getElementById("assign").value;
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
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>jobs/assigneresume">Resume</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">List Resume</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Page-header end -->
            <!-- Page-body start -->
            <div class="page-body">
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
                                        <th>Title</th>
                                        <th>Name</th>                                        
                                        <th>City</th>
                                        <th>Franchise Name</th>                                       
                                        <!-- <th>CSE</th>  -->                                      
                                        <th>Assigned By</th>                                       
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                 <?php
                                 $count = 1;
                                  foreach($resume_job as $resume) : 
                                   // echo "<pre>"; print_r($resume); die;
                                    ?>
                                    <tr>
                                        <td class="resume_id"><?php echo $count; ?></td>
                                        <!-- <td>
                                            <img width="20px;" src="<?php //echo site_url();?>assets/images/jobs/<?php //echo $resume['image']; ?> ">                                           
                                        </td> -->
                                        <td><?php echo $resume['Service_name']; ?></td>
                                        <td><?php echo $resume['title']; ?></td>
                                        <td><?php echo $resume['full_name']; ?></td>
                                        <td><?php echo $resume['city_name']; ?></td>  
                                        <td><?php echo $resume['french_user']; ?></td>                                        
                                        <!-- <td><?php //echo $resume['cse_user']; ?></td> -->                                        
                                        <td><?php echo $resume['assignedby']; ?></td>                                        
                                        
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


