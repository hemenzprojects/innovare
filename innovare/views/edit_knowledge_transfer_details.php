<title><?php echo $properties['title']; ?> || Edit Knowledge Transfer</title>
 <div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">


            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" id="hidden-label-basic-form">Edit Knowledge Transfer Image -- <?php echo $kwowledge_transfer_info[0]->title ?></h4>
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
                                        <h4 class="form-section"><i class="fas fa-image"></i> Knowledge Transfer Image (Thumbnail)</h4>
                                        <div class="row">
                                            <div class="form-group col-md-12 mb-2">
                                                <label for="course_thumbail">Knowledge Transfer Image (Thumbnail):</label>
                                                <input type="file" id="file" class="dropify " name="file"  required="" data-default-file="<?php echo $kwowledge_transfer_info[0]->thumbnail; ?>" >
                                                <input type="hidden" name="kwowledge_transfer_id" id="kwowledge_transfer_id" value="<?php echo $kwowledge_transfer_info[0]->id; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions ">
                                        <button type="submit" id="update_kwowledge_transfer_image" name="update_kwowledge_transfer_image" class="btn btn-success btn-block btn-lg" style="padding-right: 60px;padding-left: 60px; ">Update</button>
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
                            <h4 class="card-title" id="hidden-label-basic-form">Edit Knowledge Transfer -- <?php echo $kwowledge_transfer_info[0]->title ?></h4>
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

                                <form class="form" id="edit_knowledge_transfer_form" action="" method="POST" enctype="multipart/form-data">
                                    <div class="form-body">
                                        <h4 class="form-section"><i class="fas fa-bookmark"></i>Edit Knowledge Transfer Info</h4>
                                        <div class="row">

                                            <div class="form-group col-md-12 mb-2">
                                                <label class="" for="projectinput1">Knowledge Transfer Title</label>
                                                <input type="text" id="title" class="form-control" placeholder="Knowledge Transfer Title" name="title" required="" value="<?php echo $kwowledge_transfer_info[0]->title; ?>">
                                                <input type="hidden" id="admin_id" class="form-control" name="admin_id" value="<?php echo $admin_id?>">
                                                <input type="hidden" name="kwowledge_transfer_id" id="kwowledge_transfer_id" value="<?php echo $kwowledge_transfer_info[0]->id; ?>">
                                            </div>
                                            <div class="form-group col-md-12 mb-2">
                                                <label class="sr-only" for="category">Course Category</label>
                                                <select id="category" name="category[]" class="form-control" required="" multiple="multiple">
                                                    <!-- <option value="none" selected="" disabled="">Category...</option> -->
                                                    <?php foreach ($innovare->getCourseCat() as $course_cat): ?>

                                                        <option  
                                                        <?php 
                                                            if (!empty($kwowledge_transfer_info[0]->course_cat_id)) {
                                                                foreach (explode(', ', $kwowledge_transfer_info[0]->course_cat_id) as $cus_cat) {
                                                                    $category = json_encode( $innovare->getCourseCatByID($cus_cat) );

                                                                    $category = json_decode($category);

                                                                    if ( $category[0]->id == $course_cat->id) { 
                                                                     // var_dump($course_info[0]->category_id);die();          
                                                        ?>
                                                            selected 
                                                        <?php 
                                                                    } 
                                                                } 
                                                            }
                                                            else if (empty($kwowledge_transfer_info[0]->category_id)){?>  <?php } ?> 

                                                            value="<?php echo $course_cat->id?>"
                                                    > <?php echo $course_cat->name?></option>
                                                        
                                                    <?php endforeach ?>
                                                    
                                                </select>
                                            </div>

        
                                        </div>

                                        <h4 class="form-section"><i class="fas fa-info-circle"></i> Knowledge Transfer Description</h4>

                                         <div class="row">

                                            <div class="form-group col-md-12 mb-2">
                                                <label class="" for="projectinput4">Knowledge Transfer Description:</label>
                                                <textarea name="description" id="description" rows="10" class="form-control required description" aria-invalid="false" placeholder="Knowledge Transfer Description" >
                                                    <?php echo html_entity_decode($kwowledge_transfer_info[0]->description) ?>
                                                </textarea>
                                            </div>
                                        </div>  
                                    </div>
                                    <div class="form-actions ">
                                        <button type="submit" id="edit_kwowledge_transfer" name="edit_kwowledge_transfer" class="btn btn-success btn-block btn-lg" style="padding-right: 60px;padding-left: 60px; ">Update</button>
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

   