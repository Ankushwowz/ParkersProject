  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />          
		  <div class="page-header">
                <div class="page-header-title">
                    <h4>Services</h4>
                </div>
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url(); ?>administrator/dashboard">
                                <i class="icofont icofont-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>administrator/services/list">Services</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Add Services</a>
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
                                <h5>Edit Services</h5>
                                <!-- <div class="card-header-right">
                                    <i class="icofont icofont-rounded-down"></i>
                                    <i class="icofont icofont-refresh"></i>
                                    <i class="icofont icofont-close-circled"></i>
                                </div> -->
                            </div>

                            <div class="card-block">

                                <h4><?= $title ?></h4>
                                <?php echo form_open_multipart('administrator/update_service/'.$service['id']); ?>
                                    <input type="hidden" name="id" value="<?php echo $service['id']; ?>">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" required="" value="<?php echo $service['name']; ?>" name="name" class="form-control" placeholder="Type your title in Placeholder">
                                        </div>
                                    </div>
                                    <?php if(!empty($service['image'])) { ?>
                                    <div class="form-group row image-cls-div">
                                        <label class="col-sm-2 col-form-label">Current Image</label>
										
                                        <div class="col-sm-10">
										 <div class="col-sm-10">
                                           <img src="<?php echo site_url();?>assets/images/services/<?php echo $service['image']; ?>" width="100px">
                                        </div>
										  <div class="col-sm-2"><i class="fa fa-remove delete-image" style="font-size:18px;color:red;cursor: pointer; margin-top: 10px;"></i> </div>
                                        </div>
										
										 
                                    </div>
									<?php } ?>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Image</label>
                                        <div class="col-sm-10">
                                            <input type="file" name="userfile" class="form-control">
                                            <input type="hidden" name="old-image-service" class="form-control old-image-empty" value="<?php echo $service['image']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Description</label>
                                        <div class="col-sm-10">
                                            <textarea id="editor1" rows="10" required="" cols="5" class="form-control" name="description" placeholder="Default textarea"><?php echo $service['description']; ?></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Short Description</label>
                                        <div class="col-sm-10">
                                            <input type="text" required="" value="<?php echo $service['short_description']; ?>" name="short_description" class="form-control" placeholder="Type your Short Description">
                                            
                                        </div>
                                    </div>
                                    <!-- <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Want to make Enable?</label>
                                        <div class="col-sm-3">
                                            <input type="checkbox" value="1" name="status" class="js-single" <?php if($testimonial['status'] == 1){ echo "checked"; } else { echo ""; } ?> />
                                        </div>
                                    </div> -->
                                    
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