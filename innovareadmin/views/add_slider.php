<title><?php echo $properties['title']; ?> || Slider Management</title>
 <div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
        <!-- ADD SLIDER -->
        
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="hidden-label-basic-form">Add New Slider</h4>
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

                            <form class="form" id="add_slider_form" action="" method="POST" enctype="multipart/form-data">
                                <div class="form-body">
                                    <h4 class="form-section"><i class="fas fa-image"></i> Slider Image</h4>
                                    <div class="row">
                                        <div class="form-group col-md-12 mb-2">
                                            <label class="sr-only" for="course_thumbail">Slider Image:</label>
                                            <input type="file" id="file" class="dropify " name="file"  required="" />
                                        </div>
    
                                    </div>

                                    <h4 class="form-section"><i class="fas fa-desktop"></i>Slider Content</h4>

                                    <div class="row">

                                        <div class="form-group col-md-12 mb-2">
                                            <label class="" for="confirm_pass">Slider Content Position</label>
                                            <select id="slider_text_position" name="slider_text_position" class="form-control" required="">
                                                <option value="none" selected="" disabled="">Position</option>
                                                <option value="left">Left</option>
                                                <option value="center">Center</option>
                                                <option value="right">Right</option> 
                                                
                                            </select>
                                        </div>

                                        <div class="form-group col-md-12 mb-2">
                                            <label class="" for="projectinput1">Slider header text</label>
                                            <input type="text" id="header_text" class="form-control" placeholder="Header Text" name="header_text" required="">
                                            <input type="hidden" id="admin_id" class="form-control" name="admin_id" value="<?php echo $admin_id?>">
                                        </div>

                                        <div class="form-group col-md-12 mb-2">
                                            <label class="" for="projectinput1">Sub-Header Text</label>
                                            <input type="text" id="sub_hearder_text" class="form-control" placeholder="Sub-Header Text" name="sub_hearder_text" required="">
                                        </div>

                                        <div class="form-group col-md-12 mb-2">
                                            <label class="" for="projectinput1">Button One (1) (Text and URL)</label>
                                        </div>
                                        <div class="form-group col-md-6 mb-2">
                                            <label class="sr-only" for="projectinput1">Button 1 (Text)</label>
                                            <input type="text" id="button_text" class="form-control" placeholder="Button Text" name="button_text" >
                                        </div>
                                        <div class="form-group col-md-6 mb-2">
                                            <label class="sr-only" for="projectinput1">Button 1 (URL)</label>
                                            <input type="text" id="button_one_url" class="form-control" placeholder="Button URL" name="button_one_url" >
                                        </div>

                                        <div class="form-group col-md-12 mb-2">
                                            <label class="" for="projectinput1">Button Two (2) (Text and URL)</label>
                                        </div>
                                        <div class="form-group col-md-6 mb-2">
                                            <label class="sr-only" for="projectinput1">Button 2 (Text)</label>
                                            <input type="text" id="button_text_1" class="form-control" placeholder="Button Text" name="button_text_1" >
                                        </div>
                                        <div class="form-group col-md-6 mb-2">
                                            <label class="sr-only" for="projectinput1">Button 2 (URL)</label>
                                            <input type="text" id="button_two_url" class="form-control" placeholder="Button URL" name="button_two_url" >
                                        </div>

                                    </div> 

                                    <h4 class="form-section"><i class="fas fa-desktop"></i>Slider Order</h4>

                                    <div class="row">
                                        <div class="form-group col-md-12 mb-2">
                                            <label class="sr-only" for="confirm_pass">Slider Order</label>
                                            <select id="sorting_order" name="sorting_order" class="form-control" required="">
                                                <option value="none" selected="" disabled="">Slider Position</option>
                                                <option value="0">Slider 1</option>
                                                <option value="1">Slider 2</option>
                                                <option value="2">Slider 3</option> 
                                                <option value="3">Slider 4</option> 
                                                <option value="4">Slider 5</option> 
                                                <option value="5">Slider 6</option>

                                            </select>
                                        </div>

                                    </div>
 
                                </div>
                                <div class="form-actions ">
                                    <button type="submit" id="add_slider" name="add_slider" class="btn btn-success btn-block btn-lg" style="padding-right: 60px;padding-left: 60px; ">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- VIEW SLIDER -->

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="hidden-label-basic-form">View Sliders</h4>
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

                            <table id="eventTableActive" class="table table-reponsive table-striped display  row-border table-hover thead-dark" style="width: 100% !important;">

                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Slider Details</th>
                                        <!-- <th>Slider Text</th> -->
                                        <th>Button</th>
                                        <th>Order</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($innovare->getslider() as $slider_info): 
                                            // var_dump($event_info);
                                        ?>
                                        <tr style="padding-top: 20px;">

                                            <td class="capital"><?php echo $slider_info->id ?></td>

                                            <td class="capital" style="padding-top:30px;">
                                                <div class="thumnail" >
                                                    <img src="<?php echo $slider_info->image_url?>" alt="avatar" style="width: 300px;">    
                                                </div>
                                                <br>
                                                <p><span style="font-weight: 600;">Header Content Position: </span> <span class="badge badge-danger" style="text-transform: uppercase !important; padding: 10px; border-radius: 3px; font-weight: 100"><?php echo $slider_info->content_position; ?></span></p>
                                                
                                                <p><span style="font-weight: 600;">Header Text:<br> </span><?php echo $slider_info->header_text; ?></p>

                                                <p><span style="font-weight: 600;">Sub Header Text:<br> </span><?php echo $slider_info->sub_header_text; ?></p>
                                            </td>
                                            
                                            <!-- <td class="capital"></td> -->

                                            <td class="capital" style="padding-top:30px;">


                                                <p><span style="font-weight: 600;">Button One Text:<br> </span><?php echo $slider_info->btn_1_text; ?></p>

                                                <p><span style="font-weight: 600;">Button One Url:<br> </span><?php echo $slider_info->btn_1_url; ?></p>

                                                <hr class="mb-2 mt-2">

                                                <p><span style="font-weight: 600;">Button Two Text:<br> </span><?php echo $slider_info->btn_2_text; ?></p>

                                                <p><span style="font-weight: 600;">Button Two Url:<br> </span><?php echo $slider_info->btn_2_url; ?></p>

    
                                            </td>

                                            <td class="capital" style="text-align: center; padding-top:30px;" >

                                                <?php if ($slider_info->sorting_order == '0') { ?>

                                                    <span class="badge badge-danger" style="text-transform: uppercase !important; padding: 10px; border-radius: 3px; font-weight: 100">Slider 1</span>

                                                <?php } else if ($slider_info->sorting_order == '1') { ?>

                                                    <span class="badge badge-success" style="text-transform: uppercase !important; padding: 10px; border-radius: 3px; font-weight: 100">Slider 2</span>
                                                <?php } else if ($slider_info->sorting_order == '2') { ?>

                                                    <span class="badge badge-success" style="text-transform: uppercase !important; padding: 10px; border-radius: 3px; font-weight: 100">Slider 3</span>
                                                <?php } else if ($slider_info->sorting_order == '3') { ?>

                                                    <span class="badge badge-success" style="text-transform: uppercase !important; padding: 10px; border-radius: 3px; font-weight: 100">Slider 4</span>
                                                <?php } else if ($slider_info->sorting_order == '4') { ?>

                                                    <span class="badge badge-success" style="text-transform: uppercase !important; padding: 10px; border-radius: 3px; font-weight: 100">Slider 5</span>
                                                <?php } else if ($slider_info->sorting_order == '5') { ?>

                                                    <span class="badge badge-success" style="text-transform: uppercase !important; padding: 10px; border-radius: 3px; font-weight: 100">Slider 6</span>

                                                <?php } ?>
                                            </td>

                                            <td style="text-align: center; padding-top:30px;">

                                                <div class="tool-container tool-bottom toolbar-dark  option" style="">
                                                    <div class="tool-items">

                                                        <a href="<?php echo $properties['baseurl']?>edit-slider-details/<?php echo $slider_info->id?>" title="View" class="tool-item">
                                                            <i class="fas fa-edit" aria-hidden="true"></i>
                                                        </a>

                                                        <a href="?delete&slider_id=<?php echo $slider_info->id ?>" title="Delete" class="tool-item">
                                                            <i class="fas fa-trash-alt" aria-hidden="true"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>                                        
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> 
        </div>

        </div>
      </div>
    </div>


    
    <!-- ////////////////////////////////////////////////////////////////////////////-->

   