<title><?php echo $properties['title']; ?> || Add News</title>
 <div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="hidden-label-basic-form">Add New News</h4>
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

                            <form class="form" id="add_news_form" action="" method="POST" enctype="multipart/form-data">
                                <div class="form-body">
                                    <h4 class="form-section"><i class="fas fa-calendar-alt"></i> News Info</h4>
                                    <div class="row">
                                        <div class="form-group col-md-12 mb-2">
                                            <label for="course_thumbail">News Image:</label>
                                            <input type="file" id="file" class="dropify " name="file"  required="" />
                                        </div>

                                        <div class="form-group col-md-6 mb-2">
                                            <label class="sr-only" for="projectinput1">News Title</label>
                                            <input type="text" id="news_title" class="form-control" placeholder="News Title" name="news_title" required="">
                                            <input type="hidden" id="admin_id" class="form-control" name="admin_id" value="<?php echo $admin_id?>">
                                        </div>


                                        <div class="form-group col-md-6 mb-2">
                                            <label class="sr-only" for="category">News Category</label>
                                            <select id="news_category" name="news_category[]" class="form-control select_cat" required="" multiple="multiple">
                                                <!-- <option value="none" selected="" disabled="">News Category...</option> -->
                                                <?php foreach ($innovare->getNewsCat() as $news_cat): ?>

                                                    <option value="<?php echo $news_cat->id?>"><?php echo $news_cat->name?></option>
                                                    
                                                <?php endforeach ?>
                                                
                                            </select>
                                        </div>

                                        <div class="form-group col-md-6 mb-2">
                                            <label class="sr-only" for="confirm_pass">Status</label>
                                            <select id="status" name="status" class="form-control select_opt" required="">
                                                <option value="none" selected="" disabled="">Status...</option>
                                                <option value="draft">Draft</option>
                                                <option value="active">Published</option>   
                                                <option value="archived">Archived</option>   
                                            </select>
                                        </div>

                                        
                                    </div>
                                    
                                    <h4 class="form-section"><i class="fas fa-info-circle"></i> News Details</h4>

                                     <div class="row" >

                                        <div class="form-group col-md-12 mb-2">
                                            <label class="sr-only" for="">News Description:</label>
                                            <textarea name="description" id="description" rows="20" class="form-control description" aria-invalid="false" placeholder="Course Description" ></textarea>
                                        </div>
                                    </div>  
                                </div>
                                <div class="form-actions ">
                                    <button type="submit" id="add_news" name="add_news" class="btn btn-success btn-block btn-lg" style="padding-right: 60px;padding-left: 60px; ">Submit</button>
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

   