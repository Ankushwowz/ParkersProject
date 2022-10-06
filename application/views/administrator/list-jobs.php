<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- <script type="text/javascript">
     $(document).ready(function(){
            $(".delete").click(function(e){ alert('as');
                $this  = $(this);
                e.preventDefault();
                var url = $(this).attr("href");
                $.get(url, function(r){
                    if(r.success){
                        $this.closest("tr").remove();
                    }
                })
            });
        });
    $(document).ready(function(){
            $(".enable").click(function(e){ alert('as');
                $this  = $(this);
                e.preventDefault();
                var url = $(this).attr("href");
                $.get(url, function(r){
                    if(r.success){
                        $this.closest("tr").remove();
                    }
                })
            });
        });

    $(document).ready(function(){
            $(".disable").click(function(e){ alert('as');
                $this  = $(this);
                e.preventDefault();
                var url = $(this).attr("href");
                $.get(url, function(r){
                    if(r.success){
                        $this.closest("tr").remove();
                    }
                })
            });
        });

    </script> -->
 
            <!-- Page-header start -->
            <div class="page-header">
                <div class="page-header-title">
                    <h4>Jobs List</h4>
                </div>
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index-2.html">
                                <i class="icofont icofont-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Jobs</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Jobs List</a>
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
                                        <th>Service Name</th>                                        
                                        <th>Job Name</th>                                        
                                        <th>Job Description</th>
                                        <th>Job Amount</th>
                                        <th>Job Location</th>
                                        <th>Job Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 <?php $count = 1; foreach($jobs as $job) : 
								
								 
								 ?>
                                    <tr>
                                        <td><?php echo $count; ?></td>
                                        
                                        <td><?php echo $job['serviceName']; ?></td>                                        
                                        <td><?php echo $job['job_name']; ?></td>                                        
                                        <td><?php echo substr($job['job_description'],0,20); ?></td>                                        
                                        <td><?php echo'£'.$job['job_amount']; ?></td>                                        
                                        <td><?php echo $job['location']; ?></td>                                        
                                        <td>
										
										<?php if(!empty($job['job_image'])) { ?>
										<img  width="50" src="<?php echo base_url();?>/assets/images/jobs/<?php echo $job['job_image']; ?>">
										<?php } ?>
										
										</td>                                        
                                        <td>
                                           
                                            <!-- Edit Button -->
                                            
                                            <a class="label label-inverse-info" href='<?php echo base_url(); ?>administrator/update_job/<?php echo $job['job_id']; ?>'>Edit</a>
                                            <!-- Delete Button -->
                                            <a rel="<?php echo $job['job_id']; ?>" class="label label-inverse-danger deletes" href='<?php echo base_url(); ?>administrator/deletejob/<?php echo $job['job_id']; ?>'>Delete</a>
                                            
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
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
    jQuery(".deletes").click(function(e){ 
          //alert('Delete');
          //return false;
             e.preventDefault();
      var userid=  jQuery(this).attr('rel');
      swal({
          title: "Are you sure?",
          text: "",
          icon: "warning",
          buttons: [
            'No, cancel it!',
            'Yes, I am sure!'
          ],
          dangerMode: true,
        }).then(function(isConfirm) {
          if (isConfirm) {
            swal({
              title: 'Deleted!',
              text: 'Job are successfully Deleted!',
              icon: 'success'
            }).then(function() {
            var baseUrl = "<?php echo base_url()?>";
                jQuery.ajax({
                type: "POST",
                url: baseUrl+'administrator/deletejob',
                data: {
                
                userid : userid
                },
                success: function(msg) 
                {
                if(msg==1){
                  window.location.href = baseUrl+'administrator/jobs/view-jobs'; 
                  //jQuery(this).closest("tr").remove();
                }
                else{
                //alert('else');
                }

                }

                });

            });
          } else {
            swal("Cancelled", "", "error");
          }
        });
           
        });
});
</script>