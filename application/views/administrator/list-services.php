<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/assets/pages/data-table/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/bower_components/ekko-lightbox/dist/ekko-lightbox.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/bower_components/lightbox2/dist/css/lightbox.css">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
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

    </script>
 
            <!-- Page-header start -->
            <div class="page-header">
                <div class="page-header-title">
                    <h4>List Services</h4>
                </div>
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url(); ?>administrator/dashboard">
                                <i class="icofont icofont-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url() ?>administrator/services/list">Services</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">List Services</a>
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
                                        <th>Image</th>
                                        <th>Name</th>                                        
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 <?php $count = 1; foreach($services as $service) : ?>
                                    <tr>
                                        <td><?php echo $count; ?></td>
                                        <td>
										<?php if(!empty($service['image'])) { ?>
                                            <img width="20px;" src="<?php echo site_url();?>assets/images/services/<?php echo $service['image']; ?> ">
										<?php } else { ?>	
										
										<?php } ?>
                                        </td>
                                        <td><a href="<?php echo base_url(); ?>administrator/update_service/<?php echo $service['id']; ?>"></a><?php echo $service['name']; ?></td>                                        
                                        <td>
                                           <!--  <?php if($service['status'] == 1): ?>
                                           <a class="label label-inverse-primary enable" href='<?php echo base_url(); ?>administrator/disable/<?php echo $service['id']; ?>?table=<?php echo base64_encode('services'); ?>'>Enabled</a> 
                                            <?php else: ?> 
                                            <a class="label label-inverse-warning disable" href='<?php echo base_url(); ?>administrator/enable/<?php echo $service['id']; ?>?table=<?php echo base64_encode('services'); ?>'>Disabled</a>
                                            <?php endif; ?> -->
                                            <!-- Edit Button -->
                                            <a class="label label-inverse-info" href='<?php echo base_url(); ?>administrator/update_service/<?php echo $service['id']; ?>'>Edit</a>
                                            <!-- Delete Button -->

                                            <a rel="<?php echo $service['id']; ?>" class="label label-inverse-danger deletes" href='<?php echo base_url(); ?>administrator/deleteservice/<?php echo $service['id']; ?>'>Delete</a>

                                            <!--<a class="label label-inverse-danger delete" href='<?php echo base_url(); ?>services/delete/<?php echo $service['id']; ?>?table=<?php echo base64_encode('services'); ?>'>Delete</a>-->
                                            
                                            
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
<!-- echart js -->

<script src="<?php echo base_url(); ?>admintemplate/assets/pages/user-profile.js"></script>
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
              text: 'Service are successfully Deleted!',
              icon: 'success'
            }).then(function() {
            var baseUrl = "<?php echo base_url()?>";
                jQuery.ajax({
                type: "POST",
                url: baseUrl+'administrator/deleteservice',
                data: {
                
                userid : userid
                },
                success: function(msg) 
                {
                if(msg==1){
                  window.location.href = baseUrl+'administrator/services/view-service'; 
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