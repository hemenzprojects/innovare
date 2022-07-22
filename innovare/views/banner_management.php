<title><?php echo $properties['title']; ?> || Banner Management</title>
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
                        <h4 class="card-title" id="hidden-label-basic-form">Add Banner Slider</h4>
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
                                    <h4 class="form-section"><i class="fas fa-image"></i> Banner Image</h4>
                                    <div class="row">
                                        <div class="form-group col-md-12 mb-2">
                                            <label class="sr-only" for="course_thumbail">Bannner Image:</label>
                                            <input type="file" id="file" class="dropify " name="file"  required="" />
                                        </div>
    
                                    </div>

 
                                </div>
                                <div class="form-actions ">
                                    <button type="submit" id="add_banner" name="add_banner" class="btn btn-success btn-block btn-lg" style="padding-right: 60px;padding-left: 60px; ">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ADD SLIDER -->

        <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" id="hidden-label-basic-form">View Banners</h4>
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
                                            <th>Banner Image</th>
                                            <th>Date Created </th>
                                            <th>Status</th>
                                            <!-- <th>Order</th> -->
                                            <th></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php foreach ($innovare->getBanner() as $banner_info): 
                                                // var_dump($event_info);
                                            ?>
                                            <tr style="padding-top: 20px;">

                                                <td class="capital"><?php echo $banner_info->id ?></td>

                                                <td class="capital">
                                                    <div class="thumnail" >
                                                        <img src="<?php echo $banner_info->image_url?>" alt="avatar" style="width: 300px;">    
                                                    </div>
                                                </td>

                                                <td class="capital"><?php echo date('jS F, Y', strtotime($banner_info->created_at)) ?></td>
                                                

                                                <td class="capital" style="text-align: center;">

                                                    <?php if ($banner_info->status == 'active') { ?>

                                                        <span class="badge badge-success" style="text-transform: uppercase !important; padding: 10px; border-radius: 3px; font-weight: 100">Active</span>

                                                    <?php } else if ($banner_info->status == 'deactivated') { ?>

                                                        <span class="badge badge-danger" style="text-transform: uppercase !important; padding: 10px; border-radius: 3px; font-weight: 100">Deactivated</span>
                                                    

                                                    <?php } ?>
                                                </td>

                                                <td style="text-align: center;">

                                                    <div class="tool-container tool-bottom toolbar-dark  option" style="">
                                                        <div class="tool-items">

                                                            <?php if ($banner_info->status == 'active') { ?>
                                                           
                                                            <a href="?deactivate&banner_id=<?php echo $banner_info->id ?>" title="Mark as Deactivated" class="tool-item">
                                                                <i class="fas fa-ban" aria-hidden="true"></i>
                                                            </a>
                                                            <?php } else if ($banner_info->status == 'deactivated') { ?>
                                                            <a href="?activate&banner_id=<?php echo $banner_info->id ?>" title="Mark as Active" class="tool-item">
                                                                <i class="fas fa-check" aria-hidden="true"></i>
                                                            </a>
                                                            <?php } ?>

                                                            <a href="?delete&banner_id=<?php echo $banner_info->id ?>" title="Delete" class="tool-item">
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

   