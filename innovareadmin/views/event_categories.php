<title><?php echo $properties['title']; ?> || Event Categories</title>
 <div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
           
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" id="hidden-label-basic-form"><?php if(isset($_GET['edit_event_cat'])){ ?>Edit Event Category <?php }else{ ?> Add Event Category<?php } ?></h4>
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

                                <form class="form" <?php if(isset($_GET['edit_event_cat'])){ ?>id="edit_event_cat" <?php }else{ ?> id="add_event_cat"<?php } ?>  action="" method="POST">
                                    <div class="form-body">
                                        <h4 class="form-section"><i class="fas fa-list"></i><?php if(isset($_GET['edit_event_cat'])){ ?>Edit Category <?php }else{ ?> Add Category<?php } ?></h4>
                                        <div class="row">
                                            <div class="form-group col-md-12 mb-2">
                                                <label class="sr-only" for="projectinput1"></label>
                                                <input type="text" id="name" class="form-control" placeholder="Name" name="name" required="" value="<?php if(isset($_GET['edit_event_cat'])){ echo $event_cat_info[0]->name; } ?>">
                                                <input type="hidden" name="admin_id" id="admin_id" value="<?php echo $admin_id?>">

                                                <?php if(isset($_GET['edit_event_cat'])){ ?>
                                                    <input type="hidden" name="event_cat_id" id="event_cat_id" value="<?php echo $event_cat_info[0]->id;?>">
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions ">
                                        <button type="submit"<?php if(isset($_GET['edit_event_cat'])){ ?> id="edit_cat" name="edit_cat" <?php }else{ ?> id="add_cat" name="add_cat" <?php } ?>  class="btn btn-success btn-lg" style="padding-right: 60px;padding-left: 60px; "> <?php if(isset($_GET['edit_event_cat'])){ ?> Update <?php }else{ ?> Submit <?php } ?> </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> 

                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" id="hidden-label-basic-form">View Category</h4>
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

                                <table id="courseCat" class="table table-striped display" style="width: 100% !important;">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Name</th>
                                            <th>Slug</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($innovare->getEventCat() as $eventCat): ?>
                                            <tr>
                                                <td style="padding-top: 20px;"><?php echo $eventCat->id; ?></td>
                                                
                                                <td style="padding-top: 20px;"><?php echo $eventCat->name; ?></td>
                                                <td style="padding-top: 20px;"><?php echo $eventCat->slug; ?></td>
                                                
                                                <td>
                                                    <div class="tool-container tool-bottom toolbar-dark  option" style="">
                                                        <div class="tool-items">
                                                            <a href="?edit_event_cat&event_cat_id=<?php echo $eventCat->id?>" title="Edit" class="tool-item">
                                                                <i class="fas fa-edit" aria-hidden="true"></i>
                                                            </a>
                                                            <a href="?delete&event_cat=<?php echo $eventCat->id ?>" title="Delete" class="tool-item">
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

   