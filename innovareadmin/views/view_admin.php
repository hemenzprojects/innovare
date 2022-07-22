<title><?php echo $properties['title']; ?> || View Admin Accounts</title>
 <div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">

           
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="hidden-label-basic-form">View Admin Account</h4>
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

                        <table id="adminTableActive" class="table table-striped display nowrap" style="width: 100% !important;">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Name</th>
                                    <th>Contact Info</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($innovare->getAdminActive() as $admin): ?>
                                <tr st>
                                    <td class="capital">
                                        <?php echo $admin->id ?></td>
                                    <td class="capital">
                                        <div class="media">
                                            <div class="media-left pr-1">
                                                <span class="avatar avatar-md avatar-online rounded-circle">
                                                    <img src="<?php echo $properties['staticurl']?>app-assets/images/portrait/medium/avatar-2.png" alt="avatar">
                                                </span>
                                            </div>
                                            <div class="media-body media-middle" style="padding-top: 10px;">
                                                <?php echo $admin->first_name.' '.$admin->last_name ?>
                                            </div>
                                        </div>
                                        
                                    </td>
                                    <td class="capital">

                                        <p><span style="font-weight: 600;">Email: </span><?php echo $admin->email; ?></p>
                                        <p><span style="font-weight: 600;">Phone: </span><?php echo $admin->phone; ?></p>
                                            
                                     </td>
                                    <!-- <td class="capital"><?php //echo $admin->phone ?></td> -->
                                    <td class="capital"><?php echo $admin->role ?></td>
                                    <td class="capital"><?php echo $admin->status ?></td>
                                    <td>
                                        <div class="tool-container tool-bottom toolbar-dark  option" style="">
                                            <div class="tool-items">
                                                <a href="<?php echo $properties['baseurl']?>edit-admin/<?php echo $admin->id?>" title="Edit Admin" class="tool-item">
                                                    <i class="fas fa-user-edit" aria-hidden="true"></i>
                                                </a>
                                                <a href="?archive&admin_id=<?php echo $admin->id ?>" title="Edit Admin" class="tool-item">
                                                    <i class="fas fa-archive" aria-hidden="true"></i>
                                                </a>

                                                <a href="?delete&admin_id=<?php echo $admin->id ?>" title="Delete" class="tool-item">
                                                    <i class="fas fa-trash-alt" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </div>
                                            <!-- <div class="arrow" style="left: 50%; right: 50%;"></div></div> -->
                                    </td>
                                    
                                    <!-- <td><a href="<?php //echo $properties['baseurl'] ?>view/user/<?php// echo $users->id ?>"><i class="fa fa-eye fa-2x"></i></a></td> -->
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
                        <h4 class="card-title" id="hidden-label-basic-form"> Archive Admin Account</h4>
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

                            <table id="adminTableArchive" class="table table-striped display nowrap" style="width: 100% !important;">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Name</th>
                                    <!-- <th>Email</th> -->
                                    <th>Contact Info</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($innovare->getAdminArchive() as $admin): ?>
                                <tr st>
                                    <td class="capital">
                                        <?php echo $admin->id ?></td>
                                    <td class="capital">
                                        <div class="media">
                                            <div class="media-left pr-1">
                                                <span class="avatar avatar-md avatar-online rounded-circle">
                                                    <img src="<?php echo $properties['staticurl']?>app-assets/images/portrait/medium/avatar-2.png" alt="avatar">
                                                </span>
                                            </div>
                                            <div class="media-body media-middle" style="padding-top: 8px;">
                                                <?php echo $admin->first_name.' '.$admin->last_name ?>
                                            </div>
                                        </div>
                                        
                                    </td>
                                    <td class="capital">

                                        <p><span style="font-weight: 600;">Email: </span><?php echo $admin->email; ?></p>
                                        
                                        <p><span style="font-weight: 600;">Phone: </span><?php echo $admin->phone; ?></p>
                                            
                                     </td>
                                    <!-- <td class="capital"><?php //echo $admin->phone ?></td> -->
                                    <td class="capital"><?php echo $admin->role; ?></td>

                                    <td class="capital"><?php echo $admin->status; ?></td>

                                    <td>
                                        <div class="tool-container tool-bottom toolbar-dark  option" style="">
                                            <div class="tool-items">
                                                <a href="<?php echo $properties['baseurl']?>edit-admin/<?php echo $admin->id?>" title="Edit Admin" class="tool-item">
                                                    <i class="fas fa-user-edit" aria-hidden="true"></i>
                                                </a>
                                                <a href="?activate&admin_id=<?php echo $admin->id ?>" title="Activate" class="tool-item">
                                                    <i class="fas fa-check" aria-hidden="true"></i>
                                                </a>

                                                <a href="?delete&admin_id=<?php echo $admin->id ?>" title="Delete" class="tool-item">
                                                    <i class="fas fa-trash-alt" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </div>
                                            <!-- <div class="arrow" style="left: 50%; right: 50%;"></div></div> -->
                                    </td>
                                    
                                    <!-- <td><a href="<?php //echo $properties['baseurl'] ?>view/user/<?php// echo $users->id ?>"><i class="fa fa-eye fa-2x"></i></a></td> -->
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

   