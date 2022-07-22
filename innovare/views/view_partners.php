<title><?php echo $properties['title']; ?> || View Partners</title>
 <div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" id="hidden-label-basic-form">View Partners</h4>
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
                                            <th>Logo</th>
                                            <th>Name</th>
                                            <th>Date created</th>
                                            <th>Status</th>
                                            <th></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php foreach ($innovare->getActivePartners() as $partners_info): 
                                                // var_dump($event_info);
                                            ?>
                                            <tr style="padding-top: 20px;">

                                                <td class="capital"><?php echo $partners_info->id ?></td>

                                                <td class="capital">
                                                    <div class="thumnail" >
                                                        <img src="<?php echo $partners_info->thumbnail?>" alt="avatar" style="width: 200px;">    
                                                    </div>
                                                </td>
                                                
                                                <td class="capital">

                                                    <p><?php echo $partners_info->name; ?></p>
        
                                                </td>

                                                <td class="capital">

                                                    <p><?php echo date('jS F, Y', strtotime($partners_info->created_at)); ?></p>
        
                                                </td>

                                                <td class="capital" style="text-align: center;">

                                                    <?php if ($partners_info->status == 'active') { ?>

                                                        <span class="badge badge-success" style="text-transform: uppercase !important; padding: 10px; border-radius: 3px; font-weight: 100">Active</span>

                                                    <?php } else if ($partners_info->status == 'archived') { ?>

                                                        <span class="badge badge-warning" style="text-transform: uppercase !important; padding: 10px; border-radius: 3px; font-weight: 100">archived</span>

                                                    <?php } ?>
                                                </td>

                                                <td style="text-align: center;">

                                                    <div class="tool-container tool-bottom toolbar-dark  option" style="">
                                                        <div class="tool-items">

                                                            <a href="<?php echo $properties['baseurl']?>view-partners-details/<?php echo $partners_info->id?>" title="View" class="tool-item">
                                                                <i class="fas fa-eye" aria-hidden="true"></i>
                                                            </a>

                                                            <a href="?archive&partners_id=<?php echo $partners_info->id ?>" title="Archive" class="tool-item">
                                                                <i class="fas fa-archive" aria-hidden="true"></i>
                                                            </a>

                                                            <a href="?delete&partners_id=<?php echo $partners_info->id ?>" title="Delete" class="tool-item">
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
                            <h4 class="card-title" id="hidden-label-basic-form">View Archived Partners</h4>
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
                                            <th>Logo</th>
                                            <th>Name</th>
                                            <th>Date created</th>
                                            <th>Status</th>
                                            <th></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php foreach ($innovare->getArchivedPartners() as $partners_info): 
                                                // var_dump($event_info);
                                            ?>
                                            <tr style="padding-top: 20px;">

                                                <td class="capital"><?php echo $partners_info->id ?></td>

                                                <td class="capital">
                                                    <div class="thumnail" >
                                                        <img src="<?php echo $partners_info->thumbnail?>" alt="avatar" style="width: 200px;">    
                                                    </div>
                                                </td>
                                                
                                                <td class="capital">

                                                    <p><?php echo $partners_info->name; ?></p>
        
                                                </td>

                                                <td class="capital">

                                                    <p><?php echo date('jS F, Y', strtotime($partners_info->created_at)); ?></p>
        
                                                </td>

                                                <td class="capital" style="text-align: center;">

                                                    <?php if ($partners_info->status == 'active') { ?>

                                                        <span class="badge badge-success" style="text-transform: uppercase !important; padding: 10px; border-radius: 3px; font-weight: 100">Active</span>

                                                    <?php } else if ($partners_info->status == 'archived') { ?>

                                                        <span class="badge badge-warning" style="text-transform: uppercase !important; padding: 10px; border-radius: 3px; font-weight: 100">archived</span>

                                                    <?php } ?>
                                                </td>

                                                <td style="text-align: center;">

                                                    <div class="tool-container tool-bottom toolbar-dark  option" style="">
                                                        <div class="tool-items">

                                                            <a href="<?php echo $properties['baseurl']?>view-partners-details/<?php echo $partners_info->id?>" title="View" class="tool-item">
                                                                <i class="fas fa-eye" aria-hidden="true"></i>
                                                            </a>

                                                            <a href="?activate&partners_id=<?php echo $partners_info->id ?>" title="Archive" class="tool-item">
                                                                <i class="fas fa-check" aria-hidden="true"></i>
                                                            </a>

                                                            <a href="?delete&partners_id=<?php echo $partners_info->id ?>" title="Delete" class="tool-item">
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

   