
            <!-- Page-header start -->
            <div class="page-header">
                <div class="page-header-title">
                    <h4>List Messages</h4>
                </div>
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url(); ?>administrator/dashboard">
                                <i class="icofont icofont-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>administrator/getmessages">Messages</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">List Messages</a>
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
                                        <th>Message</th>                                        
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 <?php
                                    $count = 1;
                                  foreach($message_list as $messages) : ?>
                                    <tr>
                                        <td><?php echo $count; ?></td>
                                        
                                        <td><?php echo $messages['message']; ?></td>                                        
                                        <td>
                                            <!-- Edit Button -->
                                            <a class="label label-inverse-info" href='<?php echo base_url(); ?>administrator/update_message/<?php echo $messages['id']; ?>'>Edit</a>
                                            <!-- Delete Button -->
                                            <a class="label label-inverse-danger" href='<?php echo base_url(); ?>administrator/deletemessage/<?php echo $messages['id']; ?>?table=<?php echo base64_encode('messages'); ?>'>Delete</a>
                                            
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
