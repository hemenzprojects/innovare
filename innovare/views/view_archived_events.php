<title><?php echo $properties['title']; ?> || View Events</title>
 <div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">

            <div class="row">
                <div class="col-md-12">
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
                                            <th>Date Details</th>
                                            <th>Status</th>
                                            <th></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php foreach ($innovare->getArchivedEvent() as $event_info): 
                                                // var_dump($event_info);
                                            ?>
                                            <tr style="padding-top: 20px;">

                                                <td class="capital"><?php echo $event_info->event_date ?></td>

                                                <td class="capital">
                                                    <div class="thumnail" >
                                                        <img src="<?php echo $event_info->thumbnail?>" alt="avatar" style="width: 200px;">    
                                                    </div>
                                                </td>
                                                
                                                <td class="capital">

                                                    <p><span style="font-weight: 600;">Title: </span><?php echo $event_info->title; ?></p>

                                                    <p>
                                                        <span style="font-weight: 600;">Category: </span>
                                                        <?php 
                                                            if (!empty($event_info->category_id)) {
                                                                    // var_dump($event_info->category_id);

                                                                foreach (explode(', ', $event_info->category_id) as $cat_id) {

                                                                    if (!empty($innovare->getEventCatByID($cat_id))) {

                                                                        $category = json_encode( $innovare->getEventCatByID($cat_id) );
                                                                    $category = json_decode($category);

                                                                    echo $category[0]->name.' || '; 

                                                                    } else {
                                                                    echo " -- ";

                                                                    }
                                                                    

                                                                    

                                                                }
                                                            } elseif (empty($event_info->category_id)) {

                                                                echo " -- ";
                                                            }
                                                            else {

                                                                echo " -- ";
                                                            }
                                                        ?>
                                                    </p>

                                                    <p><span style="font-weight: 600;">Location: </span><?php echo $event_info->location; ?></p>

                                                    <p><a href="<?php echo $event_info->google_location; ?>" style="font-weight: 400;">Google Location </a></p>
        
                                                </td>

                                                <!-- <td class="capital"><?php// echo $properties['currency']?><span style="font-size: 13px;"> <?php // echo number_format($event_info->price,2); ?></td> -->

                                                <?php if ($event_info->duration == 'one_day') { ?>

                                                    <td class="capital">

                                                        <p><span style="font-weight: 600;">duration: </span>One Day </p>

                                                        <p>
                                                            <span style="font-weight: 600;">Event Date: </span><?php echo date('jS F, Y', strtotime($event_info->event_date)) ?>
                                                        </p>

                                                        <p>
                                                            <span style="font-weight: 600;">Time (From): </span><?php echo $event_info->time_from  ?>
                                                        </p>

                                                        <p>
                                                            <span style="font-weight: 600;">Time (to): </span><?php echo $event_info->time_to?>
                                                        </p>
                                                            
                                                    </td>

                                                <?php }elseif ($event_info->duration == 'multiple_days') { ?>

                                                    <td class="capital">
                                                          <p><span style="font-weight: 600;">duration: </span>Multiple Days </p>

                                                        <p>
                                                            <span style="font-weight: 600;">Date (From): </span><?php echo date('jS F, Y', strtotime($event_info->date_from)) ?>
                                                            
                                                        </p>
                                                        <p>
                                                            <span style="font-weight: 600;">Date (To): </span><?php echo date('jS F, Y', strtotime($event_info->date_to)) ?>
                                                            
                                                        </p>
                                                            
                                                    </td>


                                                <?php } ?>

                                                <td class="capital" style="text-align: center;">

                                                    <?php if ($event_info->status == 'active') { ?>

                                                        <span class="badge badge-success" style="text-transform: uppercase !important; padding: 10px; border-radius: 3px; font-weight: 100">Active</span>

                                                    <?php } else if ($event_info->status == 'archived') { ?>

                                                        <span class="badge badge-warning" style="text-transform: uppercase !important; padding: 10px; border-radius: 3px; font-weight: 100">archived</span>

                                                    <?php } else if ($event_info->status == 'past') { ?>

                                                        <span class="badge badge-warning" style="text-transform: uppercase !important; padding: 10px; border-radius: 3px; font-weight: 100">Past</span>

                                                    <?php } ?>
                                                </td>

                                                <td style="text-align: center;">

                                                    <div class="tool-container tool-bottom toolbar-dark  option" style="">
                                                        <div class="tool-items">

                                                            <a href="<?php echo $properties['baseurl']?>view-event-details/<?php echo $event_info->event_id?>" title="View" class="tool-item">
                                                                <i class="fas fa-eye" aria-hidden="true"></i>
                                                            </a>

                                                            <a href="?activate&event_id=<?php echo $event_info->event_id ?>" title="Activate" class="tool-item">
                                                                <i class="fas fa-check" aria-hidden="true"></i>
                                                            </a>

                                                            <a href="?delete&event_id=<?php echo $event_info->event_id ?>" title="Delete" class="tool-item">
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

   