<title><?php echo $properties['title']; ?> || View Management Team</title>
 <div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" id="hidden-label-basic-form">View Management Team (Ative)</h4>
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

                                <div id="simple-user-cards-with-border" class="row mt-2">
                                    <?php foreach ($innovare->getActiveManagement() as $team_info): 
                                            // var_dump($course_info);
                                        ?>
                                        <div class="col-xl-3 col-md-6 col-12">
                                            <div class="card border-success border-lighten-3" style="box-shadow: 0 2px 1px rgb(0 0 0 / 5%)!important;">
                                                <div class="text-center">
                                                    <div class="card-body">
                                                        <img src="<?php echo $team_info->thumbnail ?>" class="rounded-circle  height-150" alt="Card image">
                                                    </div>
                                                    <div class="card-body">
                                                        <h4 class="card-title capital"><?php echo $team_info->title ?>. <?php echo $team_info->name ?></h4>
                                                        <h6 class="card-subtitle text-muted"><?php echo $team_info->position ?></h6>
                                                    </div>
                                                    <div class="text-center mt-1" >
                                                        <a href="<?php echo $team_info->facebook ?>" class="btn btn-social-icon mr-1 mb-1 btn-outline-facebook"><span class="fa fa-facebook"></span></a>

                                                        <a href="<?php echo $team_info->twitter ?>" class="btn btn-social-icon mr-1 mb-1 btn-outline-twitter"><span class="fa fa-twitter"></span></a>

                                                        <a href="<?php echo $team_info->linkedin ?>" class="btn btn-social-icon mr-1 mb-1 btn-outline-linkedin"><span class="fa fa-linkedin font-medium-4"></span></a>

                                                        <a href="<?php echo $team_info->instagram ?>" class="btn btn-social-icon mb-1 btn-outline-instagram"><span class="fa fa-instagram font-medium-4"></span></a>
                                                    </div>
                                                    <hr class="m-0" style="margin-top: 1rem !important;margin-bottom: 1rem !important;">

                                                    <div class="tool-container tool-bottom toolbar-dark  option mb-1" style="">
                                                        <div class="tool-items">

                                                            <a href="<?php echo $properties['baseurl']?>view-team-member-details/<?php echo $team_info->id?>" title="View" class="tool-item">
                                                                <i class="fas fa-eye" aria-hidden="true"></i>
                                                            </a>

                                                            <a href="?archive&team_id=<?php echo $team_info->id ?>" title="Archive" class="tool-item">
                                                                <i class="fas fa-archive" aria-hidden="true"></i>
                                                            </a>

                                                            <a href="?delete&team_id=<?php echo $team_info->id ?>" title="Delete" class="tool-item">
                                                                <i class="fas fa-trash-alt" aria-hidden="true"></i>
                                                            </a>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach ?>

                                    
                                </div>

                            </div>
                        </div>
                    </div>
                </div> 
            </div>



            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" id="hidden-label-basic-form">View Management Team (Archived)</h4>
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

                                <div id="simple-user-cards-with-border" class="row mt-2">
                                    <?php foreach ($innovare->getArchivedManagement() as $team_info): 
                                            // var_dump($course_info);
                                        ?>
                                        <div class="col-xl-3 col-md-6 col-12">
                                            <div class="card border-success border-lighten-3" style="box-shadow: 0 2px 1px rgb(0 0 0 / 5%)!important;">
                                                <div class="text-center">
                                                    <div class="card-body">
                                                        <img src="<?php echo $team_info->thumbnail ?>" class="rounded-circle  height-150" alt="Card image">
                                                    </div>
                                                    <div class="card-body">
                                                        <h4 class="card-title capital"><?php echo $team_info->title ?>. <?php echo $team_info->name ?></h4>
                                                        <h6 class="card-subtitle text-muted"><?php echo $team_info->position ?></h6>
                                                    </div>
                                                    <div class="text-center mt-1" >
                                                        <a href="<?php echo $team_info->facebook ?>" class="btn btn-social-icon mr-1 mb-1 btn-outline-facebook"><span class="fa fa-facebook"></span></a>

                                                        <a href="<?php echo $team_info->twitter ?>" class="btn btn-social-icon mr-1 mb-1 btn-outline-twitter"><span class="fa fa-twitter"></span></a>

                                                        <a href="<?php echo $team_info->linkedin ?>" class="btn btn-social-icon mr-1 mb-1 btn-outline-linkedin"><span class="fa fa-linkedin font-medium-4"></span></a>

                                                        <a href="<?php echo $team_info->instagram ?>" class="btn btn-social-icon mb-1 btn-outline-instagram"><span class="fa fa-instagram font-medium-4"></span></a>
                                                    </div>
                                                    <hr class="m-0" style="margin-top: 1rem !important;margin-bottom: 1rem !important;">

                                                    <div class="tool-container tool-bottom toolbar-dark  option mb-1" style="">
                                                        <div class="tool-items">

                                                            <a href="<?php echo $properties['baseurl']?>view-team-member-details/<?php echo $team_info->id?>" title="View" class="tool-item">
                                                                <i class="fas fa-eye" aria-hidden="true"></i>
                                                            </a>

                                                            <a href="?activate&team_id=<?php echo $team_info->id ?>" title="Archive" class="tool-item">
                                                                <i class="fas fa-check" aria-hidden="true"></i>
                                                            </a>

                                                            <a href="?delete&team_id=<?php echo $team_info->id ?>" title="Delete" class="tool-item">
                                                                <i class="fas fa-trash-alt" aria-hidden="true"></i>
                                                            </a>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach ?>

                                    
                                </div>

                            </div>
                        </div>
                    </div>
                </div> 
            </div>

        </div>
    </div>
</div>


    
    <!-- ////////////////////////////////////////////////////////////////////////////-->

   