<title><?php echo $properties['title']; ?> || Website Details</title>
 <div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
        <!-- ADD SLIDER -->
        
        <div class="row">


            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="hidden-label-basic-form">Upload Logo</h4>
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
                                    <h4 class="form-section"><i class="fas fa-image"></i> Logo Image</h4>
                                    <div class="row">
                                        <div class="form-group col-md-12 mb-2">
                                            <label class="sr-only" for="course_thumbail">Logo Image:</label>
                                            <input type="file" id="file" class="dropify " name="file"  required="" <?php if (!empty($website_info[0]->logo_url)): ?> data-default-file="<?php echo $website_info[0]->logo_url; ?>" <?php endif ?> />
                                        </div>
    
                                    </div>

 
                                </div>
                                <div class="form-actions ">
                                    <button type="submit" id="upload_logo" name="upload_logo" class="btn btn-success btn-block btn-lg" style="padding-right: 60px;padding-left: 60px; ">Upload</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="hidden-label-basic-form">Upload Favicon </h4>
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
                                    <h4 class="form-section"><i class="fas fa-image"></i> Favicon Image <span style="font-size: 12px; font-style: italic; color: red;">(150x150)</span></h4>
                                    <div class="row">
                                        <div class="form-group col-md-12 mb-2">
                                            <label class="sr-only" for="course_thumbail">Favicon Image:</label>
                                            <input type="file" id="file" class="dropify " name="file"  required="" <?php if (!empty($website_info[0]->favicon_url)): ?> data-default-file="<?php echo $website_info[0]->favicon_url; ?>" <?php endif ?>  />
                                        </div>
    
                                    </div>

 
                                </div>
                                <div class="form-actions ">
                                    <button type="submit" id="upload_favicon" name="upload_favicon" class="btn btn-success btn-block btn-lg" style="padding-right: 60px;padding-left: 60px; ">Upload</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="hidden-label-basic-form">Website Title</h4>
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

                            <form class="form" id="" action="" method="POST" enctype="multipart/form-data">
                                <div class="form-body">
                                        <h4 class="form-section"><i class="fas fa-info-circle"></i> Website Title</h4>
                                    <!-- <h4 class="form-section"><i class="fas fa-image"></i> Logo Image</h4> -->
                                    <div class="row">
                                        <div class="form-group col-md-12 mb-2">
                                            <label class="sr-only" for="">Website Title</label>
                                            <input type="text" id="title" class="form-control" placeholder="Website Title" name="title" <?php if (!empty($website_info[0]->title)): ?> value="<?php echo $website_info[0]->title; ?>" <?php endif ?> >
                                        </div>
    
                                    </div>

 
                                </div>
                                <div class="form-actions ">
                                    <button type="submit" id="add_title" name="add_title" class="btn btn-success btn-block btn-lg" style="padding-right: 60px;padding-left: 60px; ">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>


        

        </div>
      </div>
    </div>


    
    <!-- ////////////////////////////////////////////////////////////////////////////-->

   