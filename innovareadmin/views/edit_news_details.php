<title><?php echo $properties['title']; ?> || Edit News Details</title>
 <div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" id="hidden-label-basic-form">Edit News Image -- <?php echo $news_info[0]->title ?></h4>
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
                                        <h4 class="form-section"><i class="fas fa-image"></i> News Image</h4>
                                        <div class="row">
                                            <div class="form-group col-md-12 mb-2">
                                                <label for="course_thumbail">News Image :</label>
                                                <input type="file" id="file" class="dropify " name="file"  required="" data-default-file="<?php echo $news_info[0]->image_url; ?>" >
                                                <input type="hidden" name="news_id" id="news_id" value="<?php echo $news_info[0]->id ?>" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions ">
                                        <button type="submit" id="add_news_image" name="add_news_image" class="btn btn-success btn-block btn-lg" style="padding-right: 60px;padding-left: 60px; ">Update</button>
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
                            <h4 class="card-title" id="hidden-label-basic-form">Edit News -- <?php echo $news_info[0]->title ?> </h4>
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

                                <form class="form" id="edit_news_form" action="" method="POST" enctype="multipart/form-data">
                                    <div class="form-body">
                                        <h4 class="form-section"><i class="fas fa-calendar-alt"></i> News Info</h4>
                                        <div class="row">

                                            <div class="form-group col-md-6 mb-2">
                                                <label class="" for="projectinput1">News Title</label>
                                                <input type="text" id="news_title" class="form-control" placeholder="News Title" name="news_title" required="" value="<?php echo $news_info[0]->title ?>">
                                                <input type="hidden" id="admin_id" class="form-control" name="admin_id" value="<?php echo $admin_id?>">
                                                <input type="hidden" id="news_id" class="form-control" name="news_id" value="<?php echo $news_info[0]->id?>">
                                            </div>


                                            <div class="form-group col-md-6 mb-2">
                                                <label class="" for="category">News Category</label>
                                                <select id="news_category" name="news_category[]" class="form-control select_cat" required="" multiple="multiple">
                                                    <!-- <option value="none" selected="" disabled="">News Category...</option> -->
                                                    <?php foreach ($innovare->getNewsCat() as $news_cat): ?>

                                                        <option  
                                                        <?php 
                                                            if (!empty($news_info[0]->category_id)) {
                                                                foreach (explode(', ', $news_info[0]->category_id) as $news_cat_id) {
                                                                    $category = json_encode( $innovare->getNewsCatByID($news_cat_id) );

                                                                    $category = json_decode($category);

                                                                    if ( $category[0]->id == $news_cat->id) { 
                                                                     // var_dump($course_info[0]->category_id);die();          
                                                        ?>
                                                            selected 
                                                        <?php 
                                                                    } 
                                                                } 
                                                            }
                                                            else if (empty($news_info[0]->category_id)){?>  <?php } ?> 

                                                            value="<?php echo $news_cat->id?>"
                                                    > <?php echo $news_cat->name?></option>
                                                        
                                                    <?php endforeach ?>
                                                    
                                                </select>
                                            </div>

                                            <div class="form-group col-md-6 mb-2">
                                                <label class="" for="">Status</label>
                                                <select id="status" name="status" class="form-control select_opt" required="">
                                                    <option  value="none" selected="" disabled="">Status...</option>
                                                    <option <?php if ($news_info[0]->status = 'draft'): ?> selected <?php endif; ?> value="draft">Draft</option>
                                                    <option <?php if ($news_info[0]->status = 'active'): ?> selected <?php endif; ?> value="active">Published</option>   
                                                    <option <?php if ($news_info[0]->status = 'archived'): ?> selected <?php endif; ?> value="archived">Archived</option>   
                                                </select>
                                            </div>

                                            <!-- <div class="form-group col-md-6 mb-2">
                                                <label class="" for="">Plublsihed Date</label>
                                                <input type="datetime-local" id="published_date" class="form-control" placeholder="" name="published_date" value="<?php //echo date($news_info[0]->published_date) ?>">
                                            </div> -->

                                            
                                        </div>
                                        
                                        <h4 class="form-section"><i class="fas fa-info-circle"></i> News Details</h4>

                                         <div class="row" >

                                            <div class="form-group col-md-12 mb-2">
                                                <label class="sr-only" for="">News Description:</label>
                                                <textarea name="description" id="description" rows="20" class="form-control description" aria-invalid="false" placeholder="Course Description" ><?php echo $news_info[0]->description ?></textarea>
                                            </div>
                                        </div>  
                                    </div>
                                    <div class="form-actions ">
                                        <button type="submit" id="edit_news" name="edit_news" class="btn btn-success btn-block btn-lg" style="padding-right: 60px;padding-left: 60px; ">Update</button>
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

   