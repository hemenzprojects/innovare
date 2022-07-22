<title><?php echo $properties['title']; ?> || Add Case Study</title>
 <div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="hidden-label-basic-form">Add Case Study</h4>
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

                            <form class="form" id="add_caseStudy_form" action="" method="POST" enctype="multipart/form-data">
                                <div class="form-body">
                                    <h4 class="form-section"><i class="fas fa-project-diagram"></i> Case Study Info</h4>
                                    <div class="row">

                                        <div class="form-group col-md-6 mb-2">
                                            <label class="sr-only" for="projectinput1">Case Study Title</label>
                                            <input type="text" id="caseStudy_title" class="form-control" placeholder="Case Study Title" name="caseStudy_title" required="">
                                            <input type="hidden" id="admin_id" class="form-control" name="admin_id" value="<?php echo $admin_id?>">
                                        </div>


                                        <div class="form-group col-md-6 mb-2">
                                            <label class="sr-only" for="category">Case Study Category</label>
                                            <select id="caseStudy_category" name="caseStudy_category[]" class="form-control select_cat " required="" multiple="multiple">
                                                <!-- <option value="none" selected="" disabled="">Event Category...</option> -->
                                                <?php foreach ($innovare->getCaseStudyCat() as $caseStudy_cat): ?>

                                                    <option value="<?php echo $caseStudy_cat->id?>"><?php echo $caseStudy_cat->name?></option>
                                                    
                                                <?php endforeach ?>
                                                
                                            </select>
                                        </div>

                                        
                                    </div>

                                   
                                    
                                    <h4 class="form-section"><i class="fas fa-info-circle"></i> Case Study Description</h4>

                                     <div class="row" >

                                        <div class="form-group col-md-12 mb-2">
                                            <label class="sr-only" for="projectinput4">Event Description:</label>
                                            <textarea name="caseStudy_description " id="caseStudy_description" rows="10" class="form-control required description" aria-invalid="false" placeholder="Case Study Description" ></textarea>
                                        </div>
                                    </div>  
                                </div>
                                <div class="form-actions ">
                                    <button type="submit" id="add_caseStudy" name="add_caseStudy" class="btn btn-success btn-block btn-lg" style="padding-right: 60px;padding-left: 60px; ">Submit</button>
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

   