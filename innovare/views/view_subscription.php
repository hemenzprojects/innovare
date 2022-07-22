<title><?php echo $properties['title']; ?> || View Newsletter Subscriptions</title>
 <div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" id="hidden-label-basic-form">View Subscriptions</h4>
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

                            <table id="subsTable" class="table table-reponsive table-striped display row-border table-hover thead-dark file-export" style="width: 100% !important;">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Subscription Date</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($innovare->getSubscription() as $subs_info): 
                                            // var_dump($course_info);
                                        ?>
                                        <tr style="padding-top: 20px;">
                                            <td class="capital"><?php echo $subs_info->id ?></td>
                                            
                                            <td class="capital"><?php echo $subs_info->full_name; ?></td>
                                            
                                            <td class="capital"><?php echo $subs_info->email; ?></td>

                                            <td class="capital"><?php echo date('jS F, Y', strtotime($subs_info->created_at)) ?></td>

                                            <td style="text-align: center;">

                                                <div class="tool-container tool-bottom toolbar-dark  option" style="">
                                                    <div class="tool-items">
                                                        <a href="?delete&subs_id=<?php echo $subs_info->id ?>" title="Delete" class="tool-item">
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

   