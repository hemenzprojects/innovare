<title><?php echo $properties['title']; ?> || View Knowledge Transfer Details</title>
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
        	<div class="content-detached content-left">
	        	<div class="content-body">
		            <section class="row">
		                <div class="col-md-12">
		                    <div class="card">
		                    	<div class="card-head">
			                        <div class="card-header">
			                           <h4 class="card-title" style="text-transform: uppercase;">Knowledge Transfer Details</h4>
			                           <!-- <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a> -->
			                           <div class="heading-elements">
				                            <div class="btn-group " role="group" >
					                           	<a class="btn  btn-dark" href="<?php echo $properties['baseurl']?>edit-knowledge-transfer-details/<?php echo $kwowledge_transfer_info[0]->id?>" style="padding: 10px;border-right: 2px solid #ffffff6e;">
					                           		<i class="fas fa-edit"></i> Edit
					                           	</a>
					                           	<?php if ($kwowledge_transfer_info[0]->status == 'active') : ?>
						                           	<a class="btn btn-dark" href="?archive&knowledge_transfer_id=<?php echo $kwowledge_transfer_info[0]->id ?>" style="padding: 10px;border-right: 2px solid #ffffff6e;">
						                           		<i class="fas fa-archive"></i> Archive
						                           	</a>	
						                        <?php elseif ($kwowledge_transfer_info[0]->status == 'archived') : ?>
						                           	<a class="btn btn-dark" href="?activate&knowledge_transfer_id=<?php echo $kwowledge_transfer_info[0]->id ?>" style="padding: 10px;border-right: 2px solid #ffffff6e;">
						                           		<i class="fas fa-check"></i> Active
						                           	</a>
					                           	<?php endif; ?>
					                           	<!-- <a class="btn  btn-dark" href="<?php // echo $properties['baseurl']?>view-event-documents/<?php  //echo $event_info[0]->event_id?>" style="padding: 10px;border-right: 2px solid #ffffff6e;">
					                           		<i class="fas fa-eye"></i> Document
					                           	</a>
					                           	<button class="btn btn-dark dropdown-toggle dropdown-menu-right" id="btnGroupDrop1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					                           		<i class="fa fa-settings icon-left"></i> More
					                           	</button>
					                           	
					                           	<div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
					                           		<a class="dropdown-item" href="<?php //echo $properties['baseurl']?>edit-event-gallery/<?php //echo $event_info[0]->event_id ?>">Edit Gallery</a>
					                           		<a class="dropdown-item" href="#"> Participant List</a>
					                           	</div> -->
							              	</div>
			                           	</div>	
			                        </div>
			                        <div class="px-1">
			                           <ul class="list-inline list-inline-pipe text-center p-1 border-bottom-grey border-bottom-lighten-3">
			                           </ul>
			                        </div>
			                    </div>
		                     <!-- project-info -->
		                    <div id="project-info" class="card-body row">
		                        <div class="col-lg-12 col-md-12" style="">
		                           <img src="<?php echo $kwowledge_transfer_info[0]->thumbnail; ?>" style="width: 100%;" >
		                        </div>
		                        <div class="col-md-12">
		                        	<div class="course-title">
		                        		<h2>Title: <span style="font-weight: 500"><?php echo $kwowledge_transfer_info[0]->title; ?></span></h2>
		                        		<hr class="m-0" style="margin-top: 1.5rem !important;margin-bottom: 1.5rem !important;">
		                        		<p>
	                                        <span style="font-weight: 600;">Course Category: </span>
	                                        <?php 
	                                            if (!empty($kwowledge_transfer_info[0]->course_cat_id)) {
	                                                    // var_dump($kwowledge_transfer_info->course_cat_id);die();

	                                                foreach (explode(', ', $kwowledge_transfer_info[0]->course_cat_id) as $cat_id) {

	                                                    if (!empty($innovare->getCourseCatByID($cat_id))) {

	                                                        $category = json_encode( $innovare->getCourseCatByID($cat_id) );
	                                                    $category = json_decode($category);
	                                                    ?>
	                                                     <span class="badge badge-danger" style="text-transform: uppercase !important;  border-radius: 3px; font-weight: 100"><?= $category[0]->name?></span>
	                                                    <?php

	                                                    // echo  $category[0]->name.; 

	                                                    } else {
	                                                    echo " -- -";

	                                                    }
	                                                }
	                                            } elseif (empty($kwowledge_transfer_info[0]->course_cat_id)) {

	                                                echo " -- --";
	                                            }
	                                            else {

	                                                echo " ---- ";
	                                            }
	                                        ?>
	                                    </p>
		                        	</div>
		                        </div>
		                    </div>
		                 </div>
		            </section>

		            <!-- Description -->
		            <div class="row">
		                <div class="col-md-12">
		                    <div class="card">
		                        <div class="card-header">
		                            <h4 class="card-title" id="hidden-label-basic-form">Knowledge Transfer Description</h4>
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
		                                <div class="row">
		                                	<div class="col-md-12">
		                                		<p>
		                                			<?php echo html_entity_decode($kwowledge_transfer_info[0]->description); ?> 
		                                		</p>
		                                	</div>
		                                </div>
		                            </div>
		                        </div>
		                    </div>
		                </div> 
		            </div> 
	            </div>
	        </div>

	        <div class="sidebar-detached sidebar-right">
	          	<div class="sidebar">
		            <div class="project-sidebar-content">
		               <div class="card">
		                  	<div class="card-header">
		                        <h4 class="card-title" id="hidden-label-basic-form">Knowledge Transfer Status</h4>
		                        <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
		                        <div class="heading-elements">
		                            <ul class="list-inline mb-0">
		                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
		                                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
		                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
		                            </ul>
		                        </div>
		                    </div>
		                  	<div class="card-content">
		                      <!-- project search -->
		                      	<div class="card-body border-top-blue-grey border-top-lighten-5">
		                          	<div class="row" style="text-align: center;">
		                          		<div class="col-md-12">

		                          			<p>STATUS:<br><br>

		                          				<?php if ($kwowledge_transfer_info[0]->status == 'active' ) : ?>

		                          					<button class="btn btn-success " style="text-transform: capitalize;padding-left: 40px;padding-right: 40px;">Active</button>

		                          				<?php elseif ($kwowledge_transfer_info[0]->status == 'archived' ) : ?>

		                          					<button class="btn btn-warning " style="text-transform: capitalize;padding-left: 40px;padding-right: 40px;">Archived</button>

		                          				<?php endif; ?>

		                          				<br>
		                          				<br>

		                          				<p>DATE CREATED:<br>
		                          					<p><?php echo date('jS F, Y', strtotime($kwowledge_transfer_info[0]->created_at));?> </p>
		                          			</p>
		                          		</div>	
		                          	</div>
		                      	</div>
		                      <!-- /project search -->
		                  	</div>
		              	</div>
		            </div>
	          	</div>
	        </div>
        </div>
    </div>
</div>