<title><?php echo $properties['title']; ?> || View Event Details</title>
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
			                           <h4 class="card-title" style="text-transform: uppercase;">Event Details</h4>
			                           <!-- <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a> -->
			                           <div class="heading-elements">
				                            <div class="btn-group " role="group" >
					                           	<a class="btn  btn-dark" href="<?php echo $properties['baseurl']?>edit-event-details/<?php echo $event_info[0]->event_id?>" style="padding: 10px;border-right: 2px solid #ffffff6e;">
					                           		<i class="fas fa-edit"></i> Edit
					                           	</a>
					                           	<?php if ($event_info[0]->status == 'active') : ?>
						                           	<a class="btn btn-dark" href="?archive=event_id=<?php echo $event_info[0]->event_id ?>" style="padding: 10px;border-right: 2px solid #ffffff6e;">
						                           		<i class="fas fa-archive"></i> Archive
						                           	</a>	
						                        <?php elseif ($event_info[0]->status == 'archived') : ?>
						                           	<a class="btn btn-dark" href="?activate=event_id=<?php echo $event_info[0]->event_id ?>" style="padding: 10px;border-right: 2px solid #ffffff6e;">
						                           		<i class="fas fa-check"></i> Active
						                           	</a>
					                           	<?php endif; ?>
					                           	<a class="btn  btn-dark" href="<?php echo $properties['baseurl']?>view-event-documents/<?php echo $event_info[0]->event_id?>" style="padding: 10px;border-right: 2px solid #ffffff6e;">
					                           		<i class="fas fa-eye"></i> Document
					                           	</a>
					                           	<button class="btn btn-dark dropdown-toggle dropdown-menu-right" id="btnGroupDrop1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					                           		<i class="fa fa-settings icon-left"></i> More
					                           	</button>
					                           	
					                           	<div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
					                           		<a class="dropdown-item" href="<?php echo $properties['baseurl']?>edit-event-gallery/<?php echo $event_info[0]->event_id ?>">Edit Gallery</a>
					                           		<a class="dropdown-item" href="#"> Participant List</a>
					                           	</div>
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
		                           <img src="<?php echo $event_info[0]->thumbnail; ?>" style="width: 100%;" >
		                        </div>
		                        <div class="col-md-12">
		                        	<div class="course-title">
		                        		<h2>Title: <span style="font-weight: 500"><?php echo $event_info[0]->title; ?></span></h2>
		                        		<hr class="m-0" style="margin-top: 1.5rem !important;margin-bottom: 1.5rem !important;">
		                        		<span class="badge badge-danger " style="margin-bottom: 10px; text-transform: capitalize;"> <?php echo $event_info[0]->duration; ?></span>
		                        	</div>
		                        </div>
		                        <div class="col-md-12">
		                        	<div class="row " style="margin-left: 0px;margin-right: 0px;">
				                        <div class="col-md-4 details">
				                            <i class="fas fa-list detail_icon" aria-hidden="true"></i>
				                            <h4>Category</h4>
				                            
				                            <p> 
				                            	<?php 
                                                            if (!empty($event_info[0]->category_id)) {
                                                                    // var_dump($event_info->category_id);

                                                                foreach (explode(', ', $event_info[0]->category_id) as $cat_id) {

                                                                    if (!empty($innovare->getEventCatByID($cat_id))) {

                                                                        $category = json_encode( $innovare->getEventCatByID($cat_id) );
                                                                    $category = json_decode($category);

                                                                    echo $category[0]->name.' || '; 

                                                                    } else {
                                                                    echo " -- ";

                                                                    }
                                                                    

                                                                    

                                                                }
                                                            } elseif (empty($event_info[0]->category_id)) {

                                                                echo " -- ";
                                                            }
                                                            else {

                                                                echo " -- ";
                                                            }
                                                        ?>
                                             </p>
				                        </div>
				                        <div class="col-md-4 details">
				                            <i class="fas fa-calendar-alt detail_icon" aria-hidden="true"></i>
				                            <h4>Duration</h4>
				                            <?php if ($event_info[0]->duration == 'one_day') : ?>

				                            	<p><span style="font-weight: 600;">Event Date: </span> <?php echo $event_info[0]->event_date; ?></p>

				                            	<p><span style="font-weight: 600">Time (From): </span> <?php echo date("h:i:sa", strtotime($event_info[0]->time_from)); ?></p>
				                            	<p><span style="font-weight: 600">TIme (To): </span> <?php echo date("h:i:sa", strtotime($event_info[0]->time_to)); ?></p>

				                            <?php elseif ($event_info[0]->duration == 'multiple_days') : ?>

				                            	<p><span style="font-weight: 600">Date (From): </span> <?php echo date('jS F, Y', strtotime($event_info[0]->date_from)); ?></p>
				                            	<p><span style="font-weight: 600">Date (To): </span> <?php echo date('jS F, Y', strtotime($event_info[0]->date_to)); ?></p>

				                            

				                        	<?php endif; ?>
				                        </div>
				                        <div class="col-md-4 details">
				                        	<i class="fas fa-credit-card detail_icon"></i>
				                            <h4>Location</h4>
				                            <p> <?php echo $event_info[0]->location; ?> </p>
				                            <p><a href="<?php echo $event_info[0]->google_location; ?>" target="_blank" style="font-weight: 400;">Google Location </a></p>
				                        </div>   
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
		                            <h4 class="card-title" id="hidden-label-basic-form">Event Description</h4>
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
		                                			<?php echo html_entity_decode($event_info[0]->description); ?> 
		                                		</p>
		                                	</div>
		                                </div>
		                            </div>
		                        </div>
		                    </div>
		                </div> 
		            </div>

		            <!-- Gallery -->
		            <div class="row">
		                <div class="col-md-12">
		                    <div class="card">
		                        <div class="card-header">
		                            <h4 class="card-title" id="hidden-label-basic-form">Event Gallery</h4>
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
		                                		<!-- <div class="row"> -->
						                                    <div class="zoom-gallery m-t-30">
						                                    	<div class="row">
						                                    		<?php foreach ($innovare->getEventGallery($event_info[0]->event_id) as $event_gallery):
			                                							// var_dump($event_gallery);die();
			                                			 			?>
							                                			<div class="col-md-4">
									                                        <a href="<?php echo $event_gallery->url?>" > 
									                                        	<img src="<?php echo $event_gallery->url?>" width="100%" /> 
									                                        </a>
							                                         	</div>
						                                         	<?php  endforeach ?>
						                            			</div>
						                                    </div>
												 	<!--  -->
		                                		<!-- </div> -->
		                                	
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
		                        <h4 class="card-title" id="hidden-label-basic-form">Event Status</h4>
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

		                          				<?php if ($event_info[0]->status == 'active' ) : ?>

		                          					<button class="btn btn-success " style="text-transform: capitalize;padding-left: 40px;padding-right: 40px;">Active</button>

		                          				<?php elseif ($event_info[0]->status == 'archived' ) : ?>

		                          					<button class="btn btn-warning " style="text-transform: capitalize;padding-left: 40px;padding-right: 40px;">Archived</button>
		                          				<?php endif; ?>
		                          			</p>
		                          		

		                          		
		                          			<p style="text-transform: uppercase;padding-top: 10px;">Allow Participant Registration:<br><br>
		                          				 <button class="btn btn-danger " style="text-transform: capitalize;padding-left: 40px;padding-right: 40px;"><?php echo $event_info[0]->pat_register; ?> </button>
		                          			</p>
		                          			</div>
		                          		
		                          		
		                          	</div>
		                      	</div>
		                      <!-- /project search -->
		                  	</div>
		              	</div>



		              <!-- COURSE DOCUMENT -->
		              	<div class="card">
		                  	<div class="card-header">
		                        <h4 class="card-title" id="hidden-label-basic-form">Event Documents</h4>
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
		                      	<div class="card-body">
									<div role="tabpanel" class="tab-pane active vertical-scroll  height-300" id="" aria-expanded="true" aria-labelledby="">
				                      	<?php foreach ($innovare->getEventDoc($event_info[0]->event_id) as $event_doc) { ?>
					                      	<a href="<?php echo $event_doc->url; ?>" target="_blank" class="c-doc" >
					                          	<div class="row">

					                          		<div class="col-md-3 thumbnail">
					                          				<i class="fas fa-file"></i>
					                          		</div>
					                          		<div class="col-md-9">
					                          			<p style="font-size: 12px;margin-bottom: 0px !important;"><?php echo $event_doc->name; ?>.</p>
					                          			<p style="font-size: 12px;margin-bottom: 0px !important;">Date: <?php echo date('jS F, Y', strtotime($event_doc->created_at)) ?>.</p>
					                          			<i class="fas fa-download" style="font-size: 11px;"></i>
					                          		</div>
					                          		<!-- <div class="col-md-4"></div> -->
					                          	</div>
					                        </a>
					                        <hr class="m-2">
					                    <?php } ?>
					                </div>
						                
					                
			                    
		                      	</div>
		                  	</div>
		              	</div>
		              <!--/ Project Overview -->
		              <!-- Project Users -->
		              	<div class="card">
		                  	<div class="card-header">
		                        <h4 class="card-title" id="hidden-label-basic-form">Participant List</h4>
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
		                      	<div class="card-content">

			                      	
		                          	<div class="card-body  py-0 px-0">
										<div role="tabpanel" class="tab-pane active vertical-scroll  height-300" id="active_student" aria-expanded="true" aria-labelledby="base-active_student">
				                            <div class="list-group">
				                                <a href="javascript:void(0)"  class="list-group-item">
			                                      	<div class="media">
			                                          	<div class="media-left pr-1">
			                                          		<span class="avatar avatar-sm avatar-online rounded-circle">
			                                          			<img src="../app-assets/images/portrait/small/avatar-s-1.png" alt="avatar">
			                                          		</span>
			                                          	</div>
			                                          	<div class="media-body w-100">
			                                              	<h6 class="media-heading mb-0">Margaret Govan</h6>
			                                              	<p class="font-small-2 mb-0 text-muted">Project Owner</p>
			                                          	</div>
				                                    </div>
				                                </a>
				                                <a href="javascript:void(0)"  class="list-group-item">
			                                      	<div class="media">
			                                          	<div class="media-left pr-1">
			                                          		<span class="avatar avatar-sm avatar-online rounded-circle">
			                                          			<img src="../app-assets/images/portrait/small/avatar-s-1.png" alt="avatar">
			                                          		</span>
			                                          	</div>
			                                          	<div class="media-body w-100">
			                                              	<h6 class="media-heading mb-0">Margaret Govan</h6>
			                                              	<p class="font-small-2 mb-0 text-muted">Project Owner</p>
			                                          	</div>
				                                    </div>
				                                </a>
				                                <a href="javascript:void(0)"  class="list-group-item">
			                                      	<div class="media">
			                                          	<div class="media-left pr-1">
			                                          		<span class="avatar avatar-sm avatar-online rounded-circle">
			                                          			<img src="../app-assets/images/portrait/small/avatar-s-1.png" alt="avatar">
			                                          		</span>
			                                          	</div>
			                                          	<div class="media-body w-100">
			                                              	<h6 class="media-heading mb-0">Margaret Govan</h6>
			                                              	<p class="font-small-2 mb-0 text-muted">Project Owner</p>
			                                          	</div>
				                                    </div>
				                                </a>   
				                            </div>
				                        </div>    
		                          </div>
		                      </div>
		                  </div>
		              </div>
		              <!--/ Project Users -->
		            </div>
	          	</div>
	        </div>

            

        </div>
    </div>
</div>


    
    <!-- ////////////////////////////////////////////////////////////////////////////-->

   