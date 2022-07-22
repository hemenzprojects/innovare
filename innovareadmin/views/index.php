<title><?php echo $properties['title']; ?> || Dashboard</title>
 <div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <!-- COURSE STATS -->
            <!-- <div class="row">
                <div class="col-12 mt-0 mb-2">
                    <h4 class="text-uppercase"><i class="fas fa-book"></i> Courses</h4>
                     <p>Statistics on minimal cards.</p> --
                </div>
            </div> -->
            <div class="row mb-2">
                <div class="col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-12 border-right-blue-grey border-right-lighten-5">
                                        <div class="media d-flex p-2">
                                            <div class="align-self-center">
                                                <i class="fas fa-book  font-large-2 float-left"></i>
                                            </div>
                                            <div class="media-body text-right">
                                                <h3 class=" font-large-2 text-bold-300 info"><?php echo $total_course_count;?></h3>
                                                <span>Total Courses</span>
                                            </div>
                                        </div>
                                        <div class="progress  mb-0" style="height: 7px;">
                                            <div class="progress-bar bg-info" role="progressbar" style="width: 100%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-12 border-right-blue-grey border-right-lighten-5">
                                        <div class="media d-flex p-2">
                                            <div class="align-self-center">
                                                <i class="fas fa-book  font-large-2 float-left"></i>
                                            </div>
                                            <div class="media-body text-right">
                                                <h3 class=" font-large-2 text-bold-300 success"><?php echo $active_course_count;?></h3>
                                                <span>Active Courses</span>
                                            </div>
                                        </div>
                                        <div class="progress  mb-0" style="height: 7px;">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-12 border-right-blue-grey border-right-lighten-5">
                                        <div class="media d-flex p-2">
                                            <div class="align-self-center">
                                                <i class="fas fa-book  font-large-2 float-left"></i>
                                            </div>
                                            <div class="media-body text-right">
                                                <h3 class=" font-large-2 text-bold-300 warning"><?php echo $archived_course_count;?></h3>
                                                <span>Archived Courses</span>
                                            </div>
                                        </div>
                                        <div class="progress  mb-0" style="height: 7px;">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 100%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-12">
                                        <div class="media d-flex p-2">
                                            <div class="align-self-center">
                                                <i class="fas fa-stream  font-large-2 float-left"></i>
                                            </div>
                                            <div class="media-body text-right">
                                                <h3 class=" font-large-2 text-bold-300 primary"><?php echo $course_cat_count;?></h3>
                                                <span>Courses Categories</span>
                                            </div>
                                        </div>
                                        <div class="progress  mb-0" style="height: 7px;">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 100%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- COURSE STATS -->

            <!-- EVENT STATS -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-12 border-right-blue-grey border-right-lighten-5">
                                        <div class="media d-flex p-2">
                                            <div class="align-self-center">
                                                <i class="fas fa-calendar-alt font-large-2 float-left"></i>
                                            </div>
                                            <div class="media-body text-right">
                                                <h3 class=" font-large-2 text-bold-300 info"><?php echo $total_event_count;?></h3>
                                                <span>Total Events</span>
                                            </div>
                                        </div>
                                        <div class="progress  mb-0" style="height: 7px;">
                                            <div class="progress-bar bg-info" role="progressbar" style="width: 100%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-12 border-right-blue-grey border-right-lighten-5">
                                        <div class="media d-flex p-2">
                                            <div class="align-self-center">
                                                <i class="fas fa-calendar-alt font-large-2 float-left"></i>
                                            </div>
                                            <div class="media-body text-right">
                                                <h3 class=" font-large-2 text-bold-300 success"><?php echo $active_event_count;?></h3>
                                                <span>Active Events</span>
                                            </div>
                                        </div>
                                        <div class="progress  mb-0" style="height: 7px;">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-12 border-right-blue-grey border-right-lighten-5">
                                        <div class="media d-flex p-2">
                                            <div class="align-self-center">
                                                <i class="fas fa-calendar-alt  font-large-2 float-left"></i>
                                            </div>
                                            <div class="media-body text-right">
                                                <h3 class=" font-large-2 text-bold-300 warning"><?php echo $archived_event_count;?></h3>
                                                <span>Archived Events</span>
                                            </div>
                                        </div>
                                        <div class="progress  mb-0" style="height: 7px;">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 100%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-12">
                                        <div class="media d-flex p-2">
                                            <div class="align-self-center">
                                                <i class="fas fa-stream font-large-2 float-left"></i>
                                            </div>
                                            <div class="media-body text-right">
                                                <h3 class=" font-large-2 text-bold-300 primary"><?php echo $event_cat_count;?></h3>
                                                <span>Events Categories</span>
                                            </div>
                                        </div>
                                        <div class="progress  mb-0" style="height: 7px;">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 100%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- EVENT STATS -->

            <!-- SERVICE STATS -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-12 border-right-blue-grey border-right-lighten-5">
                                        <div class="media d-flex p-2">
                                            <div class="align-self-center">
                                                <i class="far fa-handshake font-large-2 float-left"></i>
                                            </div>
                                            <div class="media-body text-right">
                                                <h3 class=" font-large-2 text-bold-300 info"><?php echo $total_service_count;?></h3>
                                                <span>Total Events</span>
                                            </div>
                                        </div>
                                        <div class="progress  mb-0" style="height: 7px;">
                                            <div class="progress-bar bg-info" role="progressbar" style="width: 100%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-12 border-right-blue-grey border-right-lighten-5">
                                        <div class="media d-flex p-2">
                                            <div class="align-self-center">
                                                <i class="far fa-handshake font-large-2 float-left"></i>
                                            </div>
                                            <div class="media-body text-right">
                                                <h3 class=" font-large-2 text-bold-300 success"><?php echo $active_service_count;?></h3>
                                                <span>Active Events</span>
                                            </div>
                                        </div>
                                        <div class="progress  mb-0" style="height: 7px;">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-12 border-right-blue-grey border-right-lighten-5">
                                        <div class="media d-flex p-2">
                                            <div class="align-self-center">
                                                <i class="far fa-handshake  font-large-2 float-left"></i>
                                            </div>
                                            <div class="media-body text-right">
                                                <h3 class=" font-large-2 text-bold-300 warning"><?php echo $archived_service_count;?></h3>
                                                <span>Archived Events</span>
                                            </div>
                                        </div>
                                        <div class="progress  mb-0" style="height: 7px;">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 100%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- SERVICE STATS -->


            <!-- Course Table STATS -->
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" id="hidden-label-basic-form">View Courses</h4>
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

                            <table id="adminTableActive" class="table table-reponsive table-striped display  row-border table-hover thead-dark" style="width: 100% !important;">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Thumnail</th>
                                        <th>Details</th>
                                        <!-- <th>Price</th> -->
                                        <!-- <th>Course Type</th> -->
                                        <!-- <th>Date Created</th> -->
                                        <th>Status</th>
                                        <!-- <th></th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($innovare->getCourseDash() as $course_info): 
                                            // var_dump($course_info);
                                        ?>
                                        <tr style="padding-top: 20px;">
                                            <td class="capital"><?php echo $course_info->course_id ?></td>
                                            <td class="capital">
                                                <div class="thumnail" >
                                                    <img src="<?php echo $course_info->thumbnail?>" alt="avatar" style="width: 100px;">    
                                                </div>
                                            </td>
                                            
                                            <td class="capital" style="font-size: 12px">

                                                <a href="<?php echo $properties['baseurl']?>view-course-details/<?php echo $course_info->course_id?>"><p><span style="font-weight: 600;">Title: </span><?php echo $course_info->title; ?></p></a>

                                                <p><span style="font-weight: 600;">Category: </span><?php echo $course_info->name; ?></p>


                                                <p><span style="font-weight: 600;">Price(S): </span><?php echo $properties['currency']?><span style="font-size: 13px;"> <?php echo number_format($course_info->price,2); ?></p>

                                                    
                                             </td>



                                            <td class="capital" style="text-align: center;">

                                                <?php if ($course_info->status == 'active') { ?>

                                                    <span class="badge badge-success" style="text-transform: uppercase !important; padding: 10px; border-radius: 3px; font-weight: 100">Active</span>

                                                <?php } else if ($course_info->status == 'archived') { ?>

                                                    <span class="badge badge-warning" style="text-transform: uppercase !important; padding: 10px; border-radius: 3px; font-weight: 100">archived</span>

                                                <?php } ?>
                                            </td>
                                                                               
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" id="hidden-label-basic-form">View Events</h4>
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

                                <table id="eventTableActive" class="table table-reponsive table-striped display  row-border table-hover thead-dark" style="width: 100% !important;">

                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Thumbnail</th>
                                            <th>Details</th>
                                            <!-- <th>Date Details</th> -->
                                            <th>Status</th>
                                            <!-- <th></th> -->
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php foreach ($innovare->getEventDash() as $event_info): 
                                                // var_dump($event_info);
                                            ?>
                                            <tr style="padding-top: 20px;">

                                                <td class="capital"><?php echo $event_info->id ?></td>

                                                <td class="capital">
                                                    <div class="thumnail" >
                                                        <img src="<?php echo $event_info->thumbnail?>" alt="avatar" style="width: 100px;">    
                                                    </div>
                                                </td>
                                                
                                                <td class="capital" style="font-size: 12px;">

                                                   <a href="<?php echo $properties['baseurl']?>view-event-details/<?php echo $event_info->event_id?>" title="View"> <p><span style="font-weight: 600;">Title: </span><?php echo $event_info->title; ?></p></a>

                                                    <p><span style="font-weight: 600;">Category: </span><?php echo $event_info->name; ?></p>

                                                    <p><span style="font-weight: 600;">Location: </span><?php echo $event_info->location; ?></p>

                                                   
                                                </td>
        
                                                <td class="capital" style="text-align: center;">

                                                    <?php if ($event_info->status == 'active') { ?>

                                                        <span class="badge badge-success" style="text-transform: uppercase !important; padding: 10px; border-radius: 3px; font-weight: 100">Active</span>

                                                    <?php } else if ($event_info->status == 'archived') { ?>

                                                        <span class="badge badge-warning" style="text-transform: uppercase !important; padding: 10px; border-radius: 3px; font-weight: 100">archived</span>

                                                    <?php } else if ($event_info->status == 'past') { ?>

                                                        <span class="badge badge-warning" style="text-transform: uppercase !important; padding: 10px; border-radius: 3px; font-weight: 100">Past</span>

                                                    <?php } ?>
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

   