<title><?php echo $properties['title']; ?> || Edit Industry</title>
 <div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">


            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" id="hidden-label-basic-form">Edit Industry Image -- <?php echo $industry_info[0]->title ?></h4>
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
                                        <h4 class="form-section"><i class="fas fa-image"></i> Industry Image (Thumbnail)</h4>
                                        <div class="row">
                                            <div class="form-group col-md-12 mb-2">
                                                <label for="course_thumbail">Industry Image (Thumbnail):</label>
                                                <input type="file" id="file" class="dropify " name="file"  required="" data-default-file="<?php echo $industry_info[0]->thumbnail; ?>" >
                                                <input type="hidden" name="industry_id" id="industry_id" value="<?php echo $industry_info[0]->id; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions ">
                                        <button type="submit" id="update_industry_image" name="update_industry_image" class="btn btn-success btn-block btn-lg" style="padding-right: 60px;padding-left: 60px; ">Update</button>
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
                            <h4 class="card-title" id="hidden-label-basic-form">Edit Industry -- <?php echo $industry_info[0]->title ?></h4>
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

                                <form class="form" id="edit_industry_form" action="" method="POST" enctype="multipart/form-data">
                                    <div class="form-body">
                                        <h4 class="form-section"><i class="fas fa-calendar-alt"></i>Edit Industry Info</h4>
                                        <div class="row">

                                            <div class="form-group col-md-12 mb-2">
                                                <label class="" for="projectinput1">Industry Title</label>
                                                <input type="text" id="title" class="form-control" placeholder="Industry Title" name="title" required="" value="<?php echo $industry_info[0]->title; ?>">
                                                <input type="hidden" id="admin_id" class="form-control" name="admin_id" value="<?php echo $admin_id?>">
                                                <input type="hidden" name="industry_id" id="industry_id" value="<?php echo $industry_info[0]->id; ?>">
                                                
                                            </div>

        
                                        </div>

                                        <!-- <h4 class="form-section"><i class="fas fa-info-circle"></i> Event Description</h4> -->
                                        <div class="row">

                                            <div class="form-group col-md-12 mb-2">
                                                <label class="" for="projectinput4">Industry Excerpt (Short description):</label>
                                                <textarea name="excerpt" id="excerpt" rows="7" class="form-control required" aria-invalid="false" placeholder="Excerpt (Short Description)" required=""><?php echo html_entity_decode($industry_info[0]->excerpt) ?></textarea>
                                            </div>
                                        </div> 

                                         <div class="row">

                                            <div class="form-group col-md-12 mb-2">
                                                <label class="" for="projectinput4">Industry Description:</label>
                                                <textarea name="description" id="description" rows="10" class="form-control required description" aria-invalid="false" placeholder="Service Description" >
                                                    <?php echo html_entity_decode($industry_info[0]->description) ?>
                                                </textarea>
                                            </div>
                                        </div>  
                                    </div>
                                    <div class="form-actions ">
                                        <button type="submit" id="edit_industry" name="edit_industry" class="btn btn-success btn-block btn-lg" style="padding-right: 60px;padding-left: 60px; ">Update</button>
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


    
    <!-- ///////////////////////////////////////////////////////////////////////////-->