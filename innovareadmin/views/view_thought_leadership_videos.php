<title><?php echo $properties['title']; ?> || Thought Leadership Video</title>
 <div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12" style="margin-bottom: 30px;">
                <h3>
                    <a href="<?php echo $properties['baseurl']?>view-thought-leadership-details/<?php echo $leadership_info[0]->id?>" style="color: inherit;" >
                        <i class="fas fa-arrow-left"></i> Back
                    </a>
                </h3>
                <div class="row breadcrumbs-top">
                    <!-- <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index-2.html">Home</a>
                            </li>
                            <li class="breadcrumb-item"><a href="#">Project</a>
                            </li>
                            <li class="breadcrumb-item active">Project Summary
                          </li>
                        </ol>
                    </div> -->
                </div>
            </div> 
        </div>
        <div class="content-body">

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" id="hidden-label-basic-form"><?php if (isset($_GET['edit_video'])): ?>E dit Thought Leadership Video(s) <?php else :?>Add Thought Leadership Video(s)<?php endif ?></h4>
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

                                <?php if (isset($_GET['edit_video'])): ?>
                                    <form class="form" id="edit_leadership_video" action="" method="POST" enctype="multipart/form-data">
                                        <div class="form-body">
                                            <h4 class="form-section"><i class="fab fa-youtube"></i> Thought Leadership Video(s)</h4>
                                            <div class="row">

                                                <div class="form-group col-md-6 mb-2">
                                                    <label class="" for="projectinput1">Thought Leadership Video Title</label>
                                                    <input type="text" id="title" class="form-control" placeholder=" Title" name="title" required="" value="<?php echo $video_info[0]->title ?>">
                                                   
                                                    <input type="hidden" id="leadership_id" class="form-control" name="leadership_id" value="<?php echo $leadership_info[0]->id?>">
                                                   
                                                    <input type="hidden" id="video_id" class="form-control" name="video_id" value="<?php echo $video_info[0]->id?>">

                                                    <input type="hidden" id="admin_id" class="form-control" name="admin_id" value="<?php echo $admin_id?>">
                                                </div>
                                                <div class="form-group col-md-6 mb-2">
                                                    <label class="" for="projectinput1">Thought Leadership Video Order ID</label>
                                                    <input type="number" id="track_id" class="form-control" placeholder="Order ID (01, 02, 03 ...)" name="track_id" required="" value="<?php echo $video_info[0]->track_id ?>">
                                                    <!-- <input type="hidden" id="admin_id" class="form-control" name="admin_id" value="<?php echo $admin_id?>"> -->
                                                </div>

                                                <div class="form-group col-md-12 mb-2">
                                                    <label class="" for="projectinput1">Thought Leadership Video URL</label>
                                                    <input type="text" id="url" class="form-control" placeholder=" Enter video URL" name="url" required=""value="<?php echo $video_info[0]->url; ?>">
                                                    <!-- <input type="hidden" id="admin_id" class="form-control" name="admin_id" value="<?php echo $admin_id?>"> -->
                                                </div>
                                            </div>

                                        </div>
                                        <div class="form-actions ">
                                            <button type="submit" id="edit_thought_leadership_video" name="edit_thought_leadership_video" class="btn btn-success btn-block btn-lg" style="padding-right: 60px;padding-left: 60px; ">Update</button>
                                        </div>
                                    </form>
                               <?php else:  ?>
                                <form class="form" id="add_leadership_video" action="" method="POST" enctype="multipart/form-data">
                                    <div class="form-body">
                                        <h4 class="form-section"><i class="fab fa-youtube"></i> Thought Leadership Video(s)</h4>
                                        <div class="row">

                                            <div class="form-group col-md-6 mb-2">
                                                <label class="" for="projectinput1">Thought Leadership Video Title</label>
                                                <input type="text" id="title" class="form-control" placeholder=" Title" name="title" required="">
                                                <input type="hidden" id="leadership_id" class="form-control" name="leadership_id" value="<?php echo $leadership_info[0]->id?>">
                                                <input type="hidden" id="admin_id" class="form-control" name="admin_id" value="<?php echo $admin_id?>">
                                            </div>
                                            <div class="form-group col-md-6 mb-2">
                                                <label class="" for="projectinput1">Thought Leadership Video Order ID</label>
                                                <input type="number" id="track_id" class="form-control" placeholder="Order ID (01, 02, 03 ...)" name="track_id" required="">
                                                <!-- <input type="hidden" id="admin_id" class="form-control" name="admin_id" value="<?php echo $admin_id?>"> -->
                                            </div>

                                            <div class="form-group col-md-12 mb-2">
                                                <label class="" for="projectinput1">Thought Leadership Video URL</label>
                                                <input type="text" id="url" class="form-control" placeholder=" Enter video URL" name="url" required="">
                                                <!-- <input type="hidden" id="admin_id" class="form-control" name="admin_id" value="<?php echo $admin_id?>"> -->
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-actions ">
                                        <button type="submit" id="add_thought_leadership_video" name="add_thought_leadership_video" class="btn btn-success btn-block btn-lg" style="padding-right: 60px;padding-left: 60px; ">Submit</button>
                                    </div>
                                </form>
                               <?php endif  ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" id="hidden-label-basic-form"><?php echo $leadership_info[0]->title?> -- Thought Leadership Video(s)</h4>
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

                            <table id="videoTable" class="table table-reponsive table-striped display row-border table-hover thead-dark" style="width: 100% !important;">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Track ID</th>
                                        <!-- <th>Thumbnail</th> -->
                                        <th>Details</th>
                                        <th>Date Created</th>
                                        <th>Status</th>
                                        <!-- <th></th> -->
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($innovare->getThoughtLeadershipVideo($leadership_id) as $leadership_vid): 
                                            // var_dump($course_info);
                                        ?>
                                        <tr style="padding-top: 20px;">
                                            <td class="capital"><?php echo $leadership_vid->vid_id ?></td>
                                            <td class="capital"><?php echo $leadership_vid->track_id ?></td>
                                            <!-- <td class="capital"><?php echo $course_doc->doc_id ?></td> -->
                                            <!-- <td class="capital">
                                                <div class="thumnail" >
                                                    <i class="fab fa-youtube" alt="avatar" style="font-size: 60px;"></i>   
                                                </div>
                                            </td> -->
                                            
                                            <td class="capital" style="max-width:250px !important; ">

                                                <p><span style="font-weight: 600;">Title: </span><?php echo $leadership_vid->title; ?></p>



                                                <p><span style="font-weight: 600;">URL: </span><a href="<?php echo $leadership_vid->url; ?>" target="_blank" style="color:#E93F33" >Video Link</a></p>

                                            </td>

                                            <td class="capital"><?php echo date('jS F, Y', strtotime($leadership_vid->created_at)) ?></td>

                                            <td>
                                                <?php if ($leadership_vid->status == 'active' ) : ?>

                                                    <button class="btn btn-success " style="text-transform: capitalize;padding-left: 40px;padding-right: 40px;">Active</button>

                                                <?php elseif ($leadership_vid->status == 'archived' ) : ?>

                                                    <button class="btn btn-warning " style="text-transform: capitalize;padding-left: 40px;padding-right: 40px;">Archived</button>

                                                <?php endif; ?>
                                            </td>

                                            <td style="text-align: center;">

                                                <div class="tool-container tool-bottom toolbar-dark  option" style="">
                                                    <div class="tool-items">
                                                        <button class="btn btn-dark dropdown-toggle dropdown-menu-right" id="btnGroupDrop1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-cog"></i> </button>
                                                    
                                                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                            <a class="dropdown-item" href="?edit_video&vid_id=<?php echo $leadership_vid->vid_id ?>"><i class="fas fa-edit"></i>  Edit</a>


                                                            <?php if ($leadership_vid->status == 'active') : ?>
                                                                <a class="dropdown-item" href="?archive&vid_id=<?php echo $leadership_vid->vid_id ?>" style="padding: 10px;border-right: 2px solid #ffffff6e;">
                                                                    <i class="fas fa-archive"></i> Archive
                                                                </a>    
                                                            <?php elseif ($leadership_vid->status == 'archived') : ?>
                                                                <a class="dropdown-item" href="?activate&vid_id=<?php echo $leadership_vid->vid_id ?>" style="padding: 10px;border-right: 2px solid #ffffff6e;">
                                                                    <i class="fas fa-check"></i> Active
                                                                </a>
                                                            <?php endif; ?>

                                                            <a class="dropdown-item" href="?video_delete&vid_id=<?php echo $leadership_vid->vid_id ?>"> <i class="fas fa-trash-alt" aria-hidden="true"></i> Delete</a>
                                                        </div>

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

   