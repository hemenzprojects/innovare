<title><?php echo $properties['title']; ?> || Edit Page</title>
 <div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">


            

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" id="hidden-label-basic-form">Edit Page -- <?php echo $page_info[0]->title ?></h4>
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

                                <form class="form" id="edit_page_form" action="" method="POST" enctype="multipart/form-data">
                                    <div class="form-body">
                                        <h4 class="form-section"><i class="fas fa-calendar-alt"></i>Edit Page Info</h4>
                                        <div class="row">

                                            <div class="form-group col-md-12 mb-2">
                                                <label class="" for="projectinput1">Title</label>
                                                <input type="text" id="title" class="form-control" placeholder="Title" name="title" required="" value="<?php echo $page_info[0]->title; ?>">
                                                <input type="hidden" id="admin_id" class="form-control" name="admin_id" value="<?php echo $admin_id?>">
                                                <input type="hidden" name="page_id" id="page_id" value="<?php echo $page_info[0]->id; ?>">
                                                
                                            </div>

        
                                        </div>

                                        <!-- <h4 class="form-section"><i class="fas fa-info-circle"></i> Event Description</h4> -->

                                         <div class="row">

                                            <div class="form-group col-md-12 mb-2">
                                                <label class="" for="projectinput4">Description:</label>
                                                <textarea name="description" id="description" rows="10" class="form-control required description" aria-invalid="false" placeholder="Service Description" >
                                                    <?php echo html_entity_decode($page_info[0]->description) ?>
                                                </textarea>
                                            </div>
                                        </div>  
                                    </div>
                                    <div class="form-actions ">
                                        <button type="submit" id="edit_page" name="edit_page" class="btn btn-success btn-block btn-lg" style="padding-right: 60px;padding-left: 60px; ">Update</button>
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

   