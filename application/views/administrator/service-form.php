<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>admintemplate/assets/css/form_builder.css" id="color"/>
<style type="text/css">.pull-right {
    float: none;
}</style>
<div class="container">

             
            <button style="cursor: pointer;display: none" class="btn btn-info export_html mt-2 pull-right">Export HTML</button>
            <div class="form_builder" style="margin-top: 25px">
                <div class="row">
                    <div class="col-sm-2">
                        <nav class="nav-sidebar">
                            <ul class="nav">
                                <li class="form_bal_textfield">
                                    <a href="javascript:;">Text Field <i class="fa fa-plus-circle pull-right"></i></a>
                                </li>
                                <li class="form_bal_textarea">
                                    <a href="javascript:;">Text Area <i class="fa fa-plus-circle pull-right"></i></a>
                                </li>
                                <li class="form_bal_select">
                                    <a href="javascript:;">Select <i class="fa fa-plus-circle pull-right"></i></a>
                                </li>
                                <li class="form_bal_radio">
                                    <a href="javascript:;">Radio Button <i class="fa fa-plus-circle pull-right"></i></a>
                                </li>
                                <li class="form_bal_checkbox">
                                    <a href="javascript:;">Checkbox <i class="fa fa-plus-circle pull-right"></i></a>
                                </li>
                                <li class="form_bal_email">
                                    <a href="javascript:;">Email <i class="fa fa-plus-circle pull-right"></i></a>
                                </li>
                                <li class="form_bal_number">
                                    <a href="javascript:;">Number <i class="fa fa-plus-circle pull-right"></i></a>
                                </li>
                                <li class="form_bal_password">
                                    <a href="javascript:;">Password <i class="fa fa-plus-circle pull-right"></i></a>
                                </li>
                                <li class="form_bal_date">
                                    <a href="javascript:;">Date <i class="fa fa-plus-circle pull-right"></i></a>
                                </li>
                                <li class="form_bal_button">
                                    <a href="javascript:;">Button <i class="fa fa-plus-circle pull-right"></i></a>
                                </li>
                                <li class="form_bal_image">
                                    <a href="javascript:;">Image <i class="fa fa-plus-circle pull-right"></i></a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-md-5 bal_builder">
                        <div class="form_builder_area">
						 <?php echo json_decode($service_data['preview_data']);?>
						</div>
                    </div>
                    <div class="col-md-5">
                        <div class="col-md-12">
                            <form id="service_form" class="form-horizontal" method="post" action="<?php echo base_url(); ?>services/addform">
                                <div class="preview"><?php 
								echo json_decode($service_data['form_data']);?></div>
                                <div style="display: none" class="form-group plain_html">
								<textarea name="form_data" id="form_data" rows="50" class="form-control"></textarea>
								
								<textarea id="preview_data" name="preview_data" id="form_date"  class="form-control"></textarea>
								<input type="hidden" name="service_id" value="<?php echo $this->uri->segment(3);?>">
								</div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>