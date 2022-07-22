<title><?php echo $properties['title']; ?> || View Published/Draft News</title>
 <div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" id="hidden-label-basic-form">View Published News</h4>
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

                                <table id="newsActive" class="table table-reponsive table-striped display row-border table-hover thead-dark" style="width: 100% !important;">

                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Thumbnail</th>
                                            <th>Details</th>
                                            <th>Status</th>
                                            <th></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php foreach ($innovare->getActiveNews() as $news_info): 
                                                // var_dump($event_info);
                                            ?>
                                            <tr style="padding-top: 20px;">

                                                <td class="capital"><?php echo $news_info->id ?></td>

                                                <td class="capital">
                                                    <div class="thumnail" >
                                                        <img src="<?php echo $news_info->image_url?>" alt="avatar" style="width: 200px;">    
                                                    </div>
                                                </td>
                                                
                                                <td class="capital">

                                                    <p><span style="font-weight: 600;">Title: </span><?php echo $news_info->title; ?></p>

                                                    <p>
                                                        <span style="font-weight: 600;">Category: </span>
                                                        <?php 
                                                            if (!empty($news_info->category_id)) {
                                                                foreach (explode(', ', $news_info->category_id) as $news_cat_id) {
                                                                    $category = json_encode( $innovare->getNewsCatByID($news_cat_id) );

                                                                    $category = json_decode($category);

                                                                    // if ( $category[0]->id == $news_cat->id) { 
                                                                     // var_dump($course_info[0]->category_id);die();          
                                                    // var_dump($category_info);die();

                                                                        echo $category[0]->name.'||';

                                                                    // } 
                                                                } 
                                                            } 
                                                            else if (empty($news_info[0]->category_id)){

                                                                echo " -- ";
                                                            
                                                            }

                                                        ?>
                                                    </p>
        
                                                </td>

                                                <td class="capital" style="text-align: center;">

                                                    <?php if ($news_info->status == 'active') { ?>

                                                        <span class="badge badge-success" style="text-transform: uppercase !important; padding: 10px; border-radius: 3px; font-weight: 100">Active</span>

                                                    <?php } else if ($news_info->status == 'archived') { ?>

                                                        <span class="badge badge-warning" style="text-transform: uppercase !important; padding: 10px; border-radius: 3px; font-weight: 100">archived</span>

                                                    <?php } else if ($news_info->status == 'past') { ?>

                                                        <span class="badge badge-warning" style="text-transform: uppercase !important; padding: 10px; border-radius: 3px; font-weight: 100">Past</span>

                                                    <?php } ?>
                                                </td>

                                                <td style="text-align: center;">

                                                    <div class="tool-container tool-bottom toolbar-dark  option" style="">
                                                        <div class="tool-items">

                                                            <a href="<?php echo $properties['baseurl']?>view-news-details/<?php echo $news_info->id?>" title="View" class="tool-item">
                                                                <i class="fas fa-eye" aria-hidden="true"></i>
                                                            </a>

                                                            <a href="?archive&news_id=<?php echo $news_info->id ?>" title="Archive" class="tool-item">
                                                                <i class="fas fa-archive" aria-hidden="true"></i>
                                                            </a>

                                                            <a href="?delete&news_id=<?php echo $news_info->id ?>" title="Delete" class="tool-item">
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


            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" id="hidden-label-basic-form">View Draft News</h4>
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

                                <table id="newsDraft" class="table table-reponsive table-striped display row-border table-hover thead-dark" style="width: 100% !important;">

                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Thumbnail</th>
                                            <th>Details</th>
                                            <th>Status</th>
                                            <th></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php foreach ($innovare->getDraftNews() as $news_info): 
                                                // var_dump($event_info);
                                            ?>
                                            <tr style="padding-top: 20px;">

                                                <td class="capital"><?php echo $news_info->id ?></td>

                                                <td class="capital">
                                                    <div class="thumnail" >
                                                        <img src="<?php echo $news_info->image_url?>" alt="avatar" style="width: 200px;">    
                                                    </div>
                                                </td>
                                                
                                                <td class="capital">

                                                    <p><span style="font-weight: 600;">Title: </span><?php echo $news_info->title; ?></p>

                                                    <p>
                                                        <span style="font-weight: 600;">Category: </span>
                                                        <?php 
                                                            if (!empty($news_info->category_id) ) {
                                                                // var_dump($news_info->category_id);die();

                                                                 $category = json_decode($news_info->category_id);

                                                                if (!empty($category)) {

                                                                    foreach ($category as $category_info) {

                                                                        $category_info = json_encode( $innovare->getNewsCatByID($category_info) );

                                                                        $category_info = json_decode($category_info);
                                                                        
                                                                        // var_dump($category_info);die();

                                                                        echo $category_info[0]->name.'||';

                                                                    } 
                                                                } 
                                                            } 
                                                            else if (empty($news_info[0]->category_id)){

                                                                echo " -- ";
                                                            
                                                            }

                                                        ?>
                                                    </p>
        
                                                </td>

                                                <td class="capital" style="text-align: center;">

                                                    <?php if ($news_info->status == 'active') { ?>

                                                        <span class="badge badge-success" style="text-transform: uppercase !important; padding: 10px; border-radius: 3px; font-weight: 100">Active</span>

                                                    <?php } else if ($news_info->status == 'archived') { ?>

                                                        <span class="badge badge-warning" style="text-transform: uppercase !important; padding: 10px; border-radius: 3px; font-weight: 100">archived</span>

                                                    <?php } else if ($news_info->status == 'past') { ?>

                                                        <span class="badge badge-warning" style="text-transform: uppercase !important; padding: 10px; border-radius: 3px; font-weight: 100">Past</span>

                                                    <?php } ?>
                                                </td>

                                                <td style="text-align: center;">

                                                    <div class="tool-container tool-bottom toolbar-dark  option" style="">
                                                        <div class="tool-items">

                                                            <a href="<?php echo $properties['baseurl']?>view-news-details/<?php echo $news_info->id?>" title="View" class="tool-item">
                                                                <i class="fas fa-eye" aria-hidden="true"></i>
                                                            </a>

                                                            <a href="?archive&news_id=<?php echo $news_info->id ?>" title="Archive" class="tool-item">
                                                                <i class="fas fa-archive" aria-hidden="true"></i>
                                                            </a>

                                                            <a href="?delete&news_id=<?php echo $news_info->id ?>" title="Delete" class="tool-item">
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

   