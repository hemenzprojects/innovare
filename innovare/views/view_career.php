<title><?php echo $properties['title']; ?> || View Career Submission</title>
 <div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" id="hidden-label-basic-form">View Career Submission</h4>
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

                            <table id="adminTableActive" class="table table-reponsive table-striped display row-border table-hover thead-dark" style="width: 100% !important;">
                                <thead>
                                    <tr>
                                        
                                        <th></th>
                                        <th>Personal Details</th>
                                        <th>Professional Details</th>
                                        <!-- <th></th> -->
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($innovare->getCareerSubmission() as $career_info): 
                                            // var_dump($course_info);
                                        ?>
                                        <tr style="padding-top: 20px;">
                                            <td class="capital"><?php echo $career_info->id ?></td>
                                            
                                            <td class="capital">

                                                <p>
                                                    <span style="font-weight: 600;">Name: </span><?php echo $career_info->firstname.' '.$career_info->lastname; ?>
                                                </p>

                                                <p>
                                                    <span style="font-weight: 600;">Email: </span><?php echo $career_info->email; ?>
                                                </p>

                                                <p><span style="font-weight: 600;">Phone No.: </span><?php echo $career_info->phone; ?></p>
                                                
                                                <?php if (!empty($career_info->alt_phone)): ?> 
                                                    <p><span style="font-weight: 600;">Alt Phone No.: </span><?php echo $career_info->alt_phone; ?></p>
                                                <?php endif ?>

                                                <p><span style="font-weight: 600;">Address: </span><?php echo $career_info->address; ?></p>
                                                

                                                    
                                             </td>

                                            <td class="capital">
                                                 <p><span style="font-weight: 600;">University: </span><?php echo $career_info->phone; ?></p>
                                                 <p><span style="font-weight: 600;">Degree/Discipline: </span><?php echo $career_info->phone; ?></p>
                                                 <p><span style="font-weight: 600;">Qualification: </span><?php echo $career_info->phone; ?></p>
                                            </td>

                                            <!-- <td class="capital"><?php echo date('jS F, Y', strtotime($course_info->created_at)) ?></td> -->


                                            <!-- <td class="capital" style="text-align: center;">

                                                <?php if ($course_info->status == 'active') { ?>

                                                    <span class="badge badge-success" style="text-transform: uppercase !important; padding: 10px; border-radius: 3px; font-weight: 100">Active</span>

                                                <?php } else if ($course_info->status == 'archived') { ?>

                                                    <span class="badge badge-warning" style="text-transform: uppercase !important; padding: 10px; border-radius: 3px; font-weight: 100">archived</span>

                                                <?php } ?>
                                            </td> -->

                                            <td style="text-align: center;">

                                                <div class="tool-container tool-bottom toolbar-dark  option" style="">
                                                    <div class="tool-items">

                                                        <a href="<?php echo $properties['baseurl']?>view-course-details/<?php echo $course_info->course_id?>" title="View" class="tool-item">
                                                            <i class="fas fa-eye" aria-hidden="true"></i>
                                                        </a>

                                                        <a href="?delete&course_id=<?php echo $course_info->course_id ?>" title="Delete" class="tool-item">
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

   