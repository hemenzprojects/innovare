<title><?php echo $properties['title']; ?> || View Courses</title>
 <div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">

            <div class="row">
                <div class="col-md-12">
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

                            <table id="adminTableActive" class="table table-reponsive table-striped display row-border table-hover thead-dark" style="width: 100% !important;">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Thumbnail</th>
                                        <th>Details</th>
                                        <th>Price</th>
                                        <!-- <th>Course Type</th> -->
                                        <th>Date Created</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($innovare->getActiveCourse() as $course_info): 
                                            // var_dump($course_info);
                                        ?>
                                        <tr style="padding-top: 20px;">
                                            <td class="capital"><?php echo $course_info->course_id ?></td>
                                            <td class="capital">
                                                <div class="thumnail" >
                                                    <img src="<?php echo $course_info->thumbnail?>" alt="avatar" style="width: 200px;">    
                                                </div>
                                            </td>
                                            
                                            <td class="capital">

                                                <p><span style="font-weight: 600;">Title: </span><?php echo $course_info->title; ?></p>

                                                <p>
                                                    <span style="font-weight: 600;">Category: </span>
                                                    <?php 
                                                        if (!empty($course_info->category_id)) {
                                                                // var_dump($course_info->category_id);

                                                            foreach (explode(', ', $course_info->category_id) as $cat_id) {

                                                                $category = json_encode( $innovare->getCourseCatByID($cat_id) );
                                                                $category = json_decode($category);

                                                                // echo $category[0]->name.' || '; 

                                                    ?>
                                                        <span class="badge badge-danger"><?= $category[0]->name?></span>
                                                    <?php

                                                            }
                                                        } elseif (empty($course_info->category_id)) {

                                                            echo " -- ";
                                                        }
                                                    ?>
                                                        

                                                </p>

                                                <p>
                                                    <span style="font-weight: 600;">Duration: </span>
                                                    <?php if ($course_info->duration == '6_weeks'): ?>
                                                        <?php echo "Six(6) Weeks" ?>
                                                    <?php elseif ($course_info->duration == '3_months'): ?>
                                                        <?php echo "Three(3) Months" ?>
                                                    <?php elseif ($course_info->duration == '6_months'): ?>
                                                        <?php echo "Six(6) Months" ?>
                                                    <?php elseif ($course_info->duration == '1_year'): ?>
                                                        <?php echo "One(1) Year" ?>
                                                    <?php elseif ($course_info->duration == '2_years'): ?>
                                                        <?php echo "Two(2) Years" ?>
                                                    <?php endif ?>
                                                </p>

                                                

                                                    
                                             </td>

                                            <td class="capital"><?php echo $properties['currency']?><span style="font-size: 13px;"> <?php echo number_format($course_info->price,2); ?></td>

                                            <td class="capital"><?php echo date('jS F, Y', strtotime($course_info->created_at)) ?></td>


                                            <td class="capital" style="text-align: center;">

                                                <?php if ($course_info->status == 'active') { ?>

                                                    <span class="badge badge-success" style="text-transform: uppercase !important; padding: 10px; border-radius: 3px; font-weight: 100">Active</span>

                                                <?php } else if ($course_info->status == 'archived') { ?>

                                                    <span class="badge badge-warning" style="text-transform: uppercase !important; padding: 10px; border-radius: 3px; font-weight: 100">archived</span>

                                                <?php } ?>
                                            </td>
                                            <td style="text-align: center;">

                                                <div class="tool-container tool-bottom toolbar-dark  option" style="">
                                                    <div class="tool-items">

                                                        <a href="<?php echo $properties['baseurl']?>view-course-details/<?php echo $course_info->course_id?>" title="View" class="tool-item">
                                                            <i class="fas fa-eye" aria-hidden="true"></i>
                                                        </a>

                                                        <a href="?archive&course_id=<?php echo $course_info->course_id ?>" title="Archive" class="tool-item">
                                                            <i class="fas fa-archive" aria-hidden="true"></i>
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

   