<title><?php echo $properties['title']; ?> || Edit Slider</title>
 <div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">


            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title capital" id="hidden-label-basic-form">Edit Slider Image -- <?php echo $slider_info[0]->header_text; ?></h4>
                            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                    <!-- <li><a data-action="close"><i class="ft-x"></i></a></li> -->
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collpase show">
                            <div class="card-body">
                                <div class="card-text">
                                </div>

                                <form class="form" id="" action="" method="POST" enctype="multipart/form-data">
                                    <div class="form-body">
                                        <h4 class="form-section"><i class="fas fa-image"></i>Slider Image </h4>
                                        <div class="row">
                                            <div class="form-group col-md-12 mb-2">
                                                <!-- <label for="course_thumbail">Slider Image:</label> -->
                                                <input type="file" id="file" class="dropify " name="file"  required="" data-default-file="<?php echo $slider_info[0]->image_url; ?>" >
                                                <input type="hidden" name="slider_id" id="slider_id" value="<?php echo $slider_info[0]->id; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions ">
                                        <button type="submit" id="update_slider_image" name="update_slider_image" class="btn btn-success btn-block btn-lg" style="padding-right: 60px;padding-left: 60px; ">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title capital" id="hidden-label-basic-form">Edit Slider -- <?php echo $slider_info[0]->header_text; ?></h4>
                            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collpase show">
                            <div class="card-body">
                                <div class="card-text">
                                </div>

                                <form class="form" id="edit_slider_form" action="" method="POST" enctype="multipart/form-data">
                                    <div class="form-body">

                                        <h4 class="form-section"><i class="fas fa-desktop"></i> Slider Content</h4>

                                        <div class="row">
                                            <div class="form-group col-md-12 mb-2">
                                                <label class="" for="confirm_pass">Slider Content Position</label>
                                                <select id="slider_text_position" name="slider_text_position" class="form-control" required="">
                                                    <!-- <option value="none"  disabled="">Position</option> -->
                                                    <option <?php if ($slider_info[0]->content_position == 'left') { ?> selected <?php } ?> value="left">Left</option>
                                                    <option <?php if ($slider_info[0]->content_position == 'center') { ?> selected <?php } ?> value="center">Center</option>
                                                    <option <?php if ($slider_info[0]->content_position == 'right') { ?> selected <?php } ?> value="right">Right</option> 
                                                    
                                                </select>
                                            </div>

                                            <div class="form-group col-md-12 mb-2">
                                                <label class="" for="projectinput1">Slider header text</label>
                                                <input type="text" id="header_text" class="form-control" placeholder="Header Text" name="header_text" value="<?php echo $slider_info[0]->header_text; ?>" required="">
                                                <input type="hidden" id="admin_id" class="form-control" name="admin_id" value="<?php echo $admin_id?>">
                                                <input type="hidden" id="slider_id" class="form-control" name="slider_id" value="<?php echo $slider_info[0]->id; ?>">
                                            </div>

                                            <div class="form-group col-md-12 mb-2">
                                                <label class="" for="projectinput1">Sub-Header Text</label>
                                                <input type="text" id="sub_hearder_text" class="form-control" placeholder="Sub-Header Text" name="sub_hearder_text" required="" value="<?php echo $slider_info[0]->sub_header_text; ?>">
                                            </div>

                                            <div class="form-group col-md-12 mb-2">
                                                <label class="" for="projectinput1">Button One (1) (Text and URL)</label>
                                            </div>
                                            <div class="form-group col-md-6 mb-2">
                                                <label class="sr-only" for="projectinput1">Button 1 (Text)</label>
                                                <input type="text" id="button_text" class="form-control" placeholder="Button Text" name="button_text"value="<?php echo $slider_info[0]->btn_1_text; ?>" >
                                            </div>
                                            <div class="form-group col-md-6 mb-2">
                                                <label class="sr-only" for="projectinput1">Button 1 (URL)</label>
                                                <input type="text" id="button_one_url" class="form-control" placeholder="Button URL" name="button_one_url" value="<?php echo $slider_info[0]->btn_1_url; ?>" >
                                            </div>

                                            <div class="form-group col-md-12 mb-2">
                                                <label class="" for="projectinput1">Button Two (2) (Text and URL)</label>
                                            </div>
                                            <div class="form-group col-md-6 mb-2">
                                                <label class="sr-only" for="projectinput1">Button 2 (Text)</label>
                                                <input type="text" id="button_text_1" class="form-control" placeholder="Button Text" name="button_text_1" value="<?php echo $slider_info[0]->btn_2_text; ?>" >
                                            </div>
                                            <div class="form-group col-md-6 mb-2">
                                                <label class="sr-only" for="projectinput1">Button 2 (URL)</label>
                                                <input type="text" id="button_two_url" class="form-control" placeholder="Button URL" name="button_two_url" value="<?php echo $slider_info[0]->btn_2_url; ?>" >
                                            </div>

                                        </div> 

                                        <h4 class="form-section"><i class="fas fa-desktop"></i> Slider Position</h4>

                                        <div class="row">
                                            <div class="form-group col-md-12 mb-2">
                                                <label class="sr-only" for="confirm_pass">Slider Position</label>
                                                <select id="sorting_order" name="sorting_order" class="form-control" required="">
                                                    <option value="none" selected="" disabled="">Slider Position</option>
                                                    <option <?php if ($slider_info[0]->sorting_order == '0') { ?> selected <?php } ?> value="0">Slider 0</option>
                                                    <option <?php if ($slider_info[0]->sorting_order == '1') { ?> selected <?php } ?> value="1">Slider 1</option>
                                                    <option <?php if ($slider_info[0]->sorting_order == '2') { ?> selected <?php } ?> value="2">Slider 2</option>
                                                    <option <?php if ($slider_info[0]->sorting_order == '3') { ?> selected <?php } ?> value="3">Slider 3</option> 
                                                    <option <?php if ($slider_info[0]->sorting_order == '4') { ?> selected <?php } ?> value="4">Slider 4</option> 
                                                    <option <?php if ($slider_info[0]->sorting_order == '5') { ?> selected <?php } ?> value="5">Slider 5</option> 
                                                </select>
                                            </div>

                                        </div>
     
                                    </div>
                                    <div class="form-actions ">
                                        <button type="submit" id="edit_slider" name="edit_slider" class="btn btn-success btn-block btn-lg" style="padding-right: 60px;padding-left: 60px; ">Update</button>
                                    </div>
                                </form>
                                <!--  -->
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
        </div>
      </div>
    </div>


    
    <!-- ////////////////////////////////////////////////////////////////////////////-->

   