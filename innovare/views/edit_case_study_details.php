<title><?php echo $properties['title']; ?> || Edit Case Study Details</title>
 <div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" id="hidden-label-basic-form">Edit Case Study Image -- <?php echo $caseStudy_info[0]->title ?></h4>
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
                                        <h4 class="form-section"><i class="fas fa-image"></i> Case Study Image (Thumbnail)</h4>
                                        <div class="row">
                                            <div class="form-group col-md-12 mb-2">
                                                <label for="course_thumbail">Case Study Image (Thumbnail):</label>
                                                <input type="file" id="file" class="dropify " name="file"  required="" data-default-file="<?php echo $caseStudy_info[0]->thumbnail; ?>" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions ">
                                        <button type="submit" id="add_caseStudy_image" name="add_caseStudy_image" class="btn btn-success btn-block btn-lg" style="padding-right: 60px;padding-left: 60px; ">Update</button>
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
                            <h4 class="card-title" id="hidden-label-basic-form">Edit Case Study -- <?php echo $caseStudy_info[0]->title ?> </h4>
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

                                <form class="form" id="edit_caseStudy_form" action="" method="POST" enctype="multipart/form-data">
                                    <div class="form-body">
                                        <h4 class="form-section"><i class="fas fa-project-diagram"></i> Case Study Info</h4>
                                        <div class="row">
                                            <div class="form-group col-md-6 mb-2">
                                                <label class="sr-only" for="projectinput1">Case Study Title</label>
                                                <input type="text" id="caseStudy_title" class="form-control" placeholder="Case Study Title" name="caseStudy_title" required="" value="<?php echo $caseStudy_info[0]->title ?>">
                                                <input type="hidden" id="admin_id" class="form-control" name="admin_id" value="<?php echo $admin_id?>">
                                                <input type="hidden" id="caseStudy_id" class="form-control" name="caseStudy_id" value="<?php echo $caseStudy_info[0]->id ?>">
                                            </div>
                                            <div class="form-group col-md-6 mb-2">
                                                <label class="sr-only" for="category">Case Study Category</label>
                                                <select id="caseStudy_category" name="caseStudy_category[]" class="form-control select_cat" required="" multiple="multiple">
                                                    <!-- <option value="none" selected="" disabled="">Case Study Category...</option> -->
                                                    <?php foreach ($innovare->getCaseStudyCat() as $caseStudy_cat): ?>

                                                        <option  
                                                            <?php 
                                                                if (!empty($caseStudy_info[0]->category_id)) {
                                                                         // var_dump($caseStudy_cat[0]->category_id);          
                                                                    foreach (explode(', ', $caseStudy_info[0]->category_id) as $caseStudy_cat_id) {
                                                                        if ($innovare->getCaseStudyCatByID($caseStudy_cat_id)) {

                                                                            $category = json_encode( $innovare->getCaseStudyCatByID($caseStudy_cat_id) );

                                                                            $category = json_decode($category);

                                                                            if ( $category[0]->id == $caseStudy_cat->id) { 
                                                                            # code...
                                                                        
                                                            ?>
                                                                selected 
                                                            <?php 
                                                                            }
                                                                        
                                                                        } 
                                                                    } 
                                                                }
                                                                else if (empty($caseStudy_info[0]->category_id)){?>  <?php } ?> 

                                                                value="<?php echo $caseStudy_cat->id?>"
                                                        > <?php echo $caseStudy_cat->name?></option>
                                                        
                                                    <?php endforeach ?>
                                                    
                                                </select>
                                            </div>

                                        </div>
                                        <h4 class="form-section"><i class="fas fa-info-circle"></i> Case Study Description</h4>

                                         <div class="row">

                                            <div class="form-group col-md-12 mb-2">
                                                <label class="sr-only" for="projectinput4">Case Study Description:</label>
                                                <textarea name="caseStudy_description " id="caseStudy_description" rows="10" class="form-control required description" aria-invalid="false" placeholder="Case Study Description" ><?php echo html_entity_decode($caseStudy_info[0]->description) ?></textarea>
                                            </div>
                                        </div>  
                                    </div>
                                    <div class="form-actions ">
                                        <button type="submit" id="edit_caseStudy" name="edit_caseStudy" class="btn btn-success btn-block btn-lg" style="padding-right: 60px;padding-left: 60px; ">Update</button>
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

   