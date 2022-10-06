<!-- Page-header start -->
            <div class="page-header">
                <div class="page-header-title">
                    <h4>List Services</h4>
                </div>
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index-2.html">
                                <i class="icofont icofont-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Services</a>
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
                                 <?php foreach($services as $service) : ?>
                                    <tr>
                                        <td><?php echo $service['id']; ?></td>
                                        <td>
                                            <img width="20px;" src="<?php echo site_url();?>assets/images/services/<?php echo $service['image']; ?> ">                                           
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
                                            <a class="label label-inverse-danger delete" href='<?php echo base_url(); ?>services/delete/<?php echo $service['id']; ?>?table=<?php echo base64_encode('services'); ?>'>Delete</a>
                                            <a class="label label-primary" href='<?php echo base_url(); ?>services/service_form/<?php echo base64_encode($service['id']); ?>'>Add Form</a>
                                            
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
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

