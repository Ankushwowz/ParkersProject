           <div class="page-header">
                <div class="page-header-title">
                    <h4>Messages</h4>
                </div>
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url(); ?>administrator/dashboard">
                                <i class="icofont icofont-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>administrator/getmessages">Message</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Edit Messages</a>
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
                                <h5>Edit Messages</h5>
                              
                            </div>

                            <div class="card-block">

                                <h4><?= $title ?></h4>
                                <?php echo form_open_multipart('administrator/update_message/'.$messages['id']); ?>
                                    <input type="hidden" name="id" value="<?php echo $messages['id']; ?>">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Message</label>
                                        <div class="col-sm-10">
                                            <input type="text" required="" value="<?php echo $messages['message']; ?>" name="message" class="form-control" placeholder="Type your Message in Placeholder">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label"></label>
                                        <div class="col-sm-10">
                                            <button type="submit" name="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </div>

                                    
                                </form>
                               
                                   
                                </div>
                            </div>
                        </div>
                        <!-- Basic Form Inputs card end -->
                        
                      

                    </div>
                </div>
            </div>
            <!-- Page body end -->
        </div>
    </div>

    <!-- ck editor -->
    <script src="<?php echo base_url(); ?>admintemplate/bower_components/ckeditor/ckeditor.js"></script>