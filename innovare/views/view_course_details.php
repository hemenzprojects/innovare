<title><?php echo $properties['title']; ?> || View Course Details</title>
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
			                           <h4 class="card-title" style="text-transform: uppercase;">Course Details</h4>
			                           <!-- <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a> -->
			                           <div class="heading-elements">
				                            <div class="btn-group " role="group" >
					                           	<a class="btn  btn-dark" href="<?php echo $properties['baseurl']?>edit-course-details/<?php echo $course_info[0]->course_id?>" style="padding: 10px;border-right: 2px solid #ffffff6e;">
					                           		<i class="fas fa-edit"></i> Edit
					                           	</a>
					                           	<?php if ($course_info[0]->status == 'active') : ?>
						                           	<a class="btn btn-dark" href="?archive=course_id=<?php echo $course_info[0]->course_id ?>" style="padding: 10px;">
						                           		<i class="fas fa-archive"></i> Archive
						                           	</a>	
						                        <?php elseif ($course_info[0]->status == 'archived') : ?>
						                           	<a class="btn btn-dark" href="?activate=course_id=<?php echo $course_info[0]->course_id ?>" style="padding: 10px;">
						                           		<i class="fas fa-check"></i> Active
						                           	</a>
					                           	<?php endif; ?>
					                           	<a class="btn  btn-dark" href="<?php echo $properties['baseurl']?>view-course-documents/<?php echo $course_info[0]->course_id?>" style="padding: 10px;border-right: 2px solid #ffffff6e;">
					                           		<i class="fas fa-eye"></i> Document
					                           	</a>
					                           	<button class="btn btn-dark dropdown-toggle dropdown-menu-right" id="btnGroupDrop1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					                           		<i class="fa fa-settings icon-left"></i> More
					                           	</button>
					                           	
					                           	<div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
					                           		<a class="dropdown-item" title="coming-soon" href="javascript:void(0)">Course Report</a>
					                           		<a class="dropdown-item" title="coming-soon" href="javascript:void(0)">Student List</a>
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
		                           <img src="<?php echo $course_info[0]->thumbnail; ?>" style="width: 100%;" >
		                        </div>
		                        <div class="col-md-12">
		                        	<div class="course-title">
		                        		<h2>Title: <span style="font-weight: 500"><?php echo $course_info[0]->title; ?></span></h2>
		                        		<hr class="m-0" style="margin-top: 1.5rem !important;margin-bottom: 1.5rem !important;">
		                        		<p style="padding-bottom: 10px; "><b>Course Code:</b> <?php echo $course_info[0]->code; ?></p>
		                        		<p style="padding-bottom: 10px; "><b>Instructors:</b> 
		                        			<?php 

		                        				if ($course_info[0]->instructor) {

		                        					// $instructor = json_decode($course_info[0]->instructor);
		                        					// var_dump($instructor);die();

		                        					foreach (explode(', ', $course_info[0]->instructor) as $cus_in) {

		                        					
		                        					$instructor = json_encode( $innovare->getTeamByID($cus_in) );

		                        					$instructor = json_decode($instructor);
		                        					// var_dump($instructor);
		                        			?>
		                        			<a class="badge badge-danger" href="<?php echo $properties['baseurl']?>view-team-member-details/<?php echo $instructor[0]->id; ?>" style="font-size: 14px;text-transform: capitalize;" ><?php echo $instructor[0]->title.'. '.$instructor[0]->name; ?> </a>	
		                        			<?php  }  }else{ ?>

		                        			<span> -- </span>
		                        			<?php } ?>
		                        		</p>
		                        	</div>
		                        </div>

		                        <div class="col-md-12">
		                        	<div class="row " style="margin-left: 0px;margin-right: 0px;">
				                        <div class="col-md-4 details">
				                            <i class="fas fa-list detail_icon" aria-hidden="true"></i>
				                            <h4>Category</h4>
				                            
				                            <p> 
				                            	<?php 
                                                        if (!empty($course_info[0]->category_id)) {
                                                                // var_dump($course_info->category_id);

                                                            foreach (explode(', ', $course_info[0]->category_id) as $cat_id) {

                                                                $category = json_encode( $innovare->getCourseCatByID($cat_id) );
                                                                $category = json_decode($category);

                                                                // echo $category[0]->name.' || '; 
                                                    ?>
                                                        <span class="badge badge-danger"><?= $category[0]->name?></span>
                                                    <?php

                                                            }
                                                        } elseif (empty($course_info[0]->category_id)) {

                                                            echo " -- ";
                                                        }
                                                    ?> 
				                            </p>

				                        </div>
				                        <div class="col-md-4 details">
				                            <i class="fas fa-calendar-alt detail_icon" aria-hidden="true"></i>
				                            <h4>Duration</h4>
				                            <?php if ($course_info[0]->duration == '6_weeks') : ?>

				                            	<p> Six(6) Weeks </p>

				                            <?php elseif ($course_info[0]->duration == '3_months') : ?>

				                            	<p> Three(3) Months </p>

				                            <?php elseif ($course_info[0]->duration == '6_months') : ?>

				                            	<p> Six(6) Months </p>

				                            <?php elseif ($course_info[0]->duration == '1_year') : ?>

				                            	<p> One(1) Year</p>

				                            <?php elseif ($course_info[0]->duration == '2_years') : ?>

				                            	<p> Two(2) Yeas</p>

				                        	<?php endif; ?>
				                        </div>
				                        <div class="col-md-4 details">
				                        	<i class="fas fa-credit-card detail_icon"></i>
				                            <h4>Price</h4>
				                            <p> <?php echo $properties['currency']?><span style="font-size: 13px;"> <?php echo number_format($course_info[0]->price,2); ?> </p>
				                        </div>   
				                    </div>
		                        </div>

		                        <div class="col-lg-12" style="padding-bottom: 1rem;padding-top: 1rem;" >
			                        <div class="card-body">
				                        <div class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2 my-1">
				                           <span>Registered Student Statistics</span>
				                        </div>
				                    </div>
				                </div>

		                        <div class="project-info-count col-lg-4 col-md-12 ">
		                           <div class="project-info-icon">
		                              <h2>12</h2>
		                              <div class="project-info-sub-icon">
		                                 <span class="fas fa-users"></span>
		                              </div>
		                           </div>
		                           <div class="project-info-text pt-1">
		                              <h5>Total Registed Students</h5>
		                           </div>
		                        </div>
		                        <div class="project-info-count col-lg-4 col-md-12 ">
		                           <div class="project-info-icon">
		                              <h2>160</h2>
		                              <div class="project-info-sub-icon">
		                                 <span class="fas fa-users"></span>
		                              </div>
		                           </div>
		                           <div class="project-info-text pt-1">
		                              <h5>Completed Students</h5>
		                           </div>
		                        </div>
		                        <div class="project-info-count col-lg-4 col-md-12 ">
		                           <div class="project-info-icon">
		                              <h2>20</h2>
		                              <div class="project-info-sub-icon">
		                                 <span class="fas fa-users"></span>
		                              </div>
		                           </div>
		                           <div class="project-info-text pt-1">
		                              <h5>Active Students</h5>
		                           </div>
		                        </div>
		                    </div>
		                     <!-- project-info -->
		                    
		                  </div>
		               </div>
		            </section>

		            <!-- Description -->
		            <div class="row">
		                <div class="col-md-12">
		                    <div class="card">
		                        <div class="card-header">
		                            <h4 class="card-title" id="hidden-label-basic-form">Course Description</h4>
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
		                                			<?php echo html_entity_decode($course_info[0]->description); ?> 
		                                		</p>
		                                	</div>
		                                </div>
		                            </div>
		                        </div>
		                    </div>
		                </div> 
		            </div>

		            <!-- Task Progress -->
		            <!-- <div class="row">
		               <div class="col-xl-6 col-lg-12 col-md-12">
		                  <div class="card">
		                     <div class="card-head">
		                        <div class="card-header">
		                           <h4 class="card-title">Course Stats(payments)</h4>
		                           <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
		                           <div class="heading-elements">
		                              <ul class="list-inline mb-0">
		                                 <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
		                              </ul>
		                           </div>
		                        </div>
		                     </div>
		                     <div class="card-content">
		                        <div class="card-body">
		                           <div id="task-pie-chart" class="height-400 echart-container"></div>
		                        </div>
		                     </div>
		                  </div>
		               </div>
		               <!--/ Task Progress --
		               <!-- Bug Progress --
		               <div class="col-xl-6 col-lg-12 col-md-12">
		                  <div class="card">
		                     <div class="card-header">
		                        <h4 class="card-title">Course Students(Month)</h4>
		                        <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
		                           <div class="heading-elements">
		                           <ul class="list-inline mb-0">
		                              <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
		                           </ul>
		                        </div>
		                     </div>
		                     <div class="card-content">
		                        <div class="card-body">
		                           <div id="bug-pie-chart" class="height-400 echart-container"></div>
		                        </div>
		                     </div>
		                  </div>
		               </div>
		               <!--/ Bug Progress --
		            </div> -->
	            </div>
	        </div>
	        <div class="sidebar-detached sidebar-right">
	          	<div class="sidebar">
		            <div class="project-sidebar-content">
		               <div class="card">
		                  	<div class="card-header">
		                        <h4 class="card-title" id="hidden-label-basic-form">Course Status</h4>
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
		                          			<p>STATUS:<br>

		                          				<?php if ($course_info[0]->status == 'active' ) : ?>

		                          					<button class="btn btn-success " style="text-transform: capitalize;padding-left: 40px;padding-right: 40px;">Active</button>

		                          				<?php elseif ($course_info[0]->status == 'archived' ) : ?>

		                          					<button class="btn btn-warning " style="text-transform: capitalize;padding-left: 40px;padding-right: 40px;">Archived</button>
		                          				<?php endif; ?>
		                          			</p>
		                          		

		                          		
		                          			<p>TYPE:<br>
		                          				 <button class="btn btn-primary " style="text-transform: capitalize;padding-left: 40px;padding-right: 40px;"><?php echo $course_info[0]->training_type; ?> </button>
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
		                        <h4 class="card-title" id="hidden-label-basic-form">Course Documents</h4>
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
		                      		<ul class="nav nav-tabs nav-underline no-hover-bg">
										<li class="nav-item tabs_select" style="">
											<a class="nav-link active" id="base-free_doc" data-toggle="tab" aria-controls="free_doc" href="#free_doc" aria-expanded="true">Free</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" id="base-paid_doc" data-toggle="tab" aria-controls="paid_doc" href="#paid_doc" aria-expanded="false">Paid</a>
										</li>
									</ul>

									<div class="tab-content  pt-1 ">
										<div role="tabpanel" class="tab-pane active vertical-scroll  height-300" id="free_doc" aria-expanded="true" aria-labelledby="base-free_doc">
					                      	<?php foreach ($innovare->getCourseDocFree($course_info[0]->id) as $course_doc) { ?>
						                      	<a href="<?php echo $course_doc->url; ?>" class="c-doc" >
						                          	<div class="row">

						                          		<div class="col-md-3 thumbnail">
						                          				<i class="fas fa-file"></i>
						                          		</div>
						                          		<div class="col-md-9">
						                          			<p style="font-size: 12px;margin-bottom: 0px !important;"><?php echo $course_doc->name; ?>.</p>
						                          			<p style="font-size: 12px;margin-bottom: 0px !important;">Date: <?php echo date('jS F, Y', strtotime($course_doc->created_at)) ?>.</p>
						                          			<i class="fas fa-download" style="font-size: 11px;"></i>
						                          		</div>
						                          		<!-- <div class="col-md-4"></div> -->
						                          	</div>
						                        </a>
						                        <hr class="m-2">
						                    <?php } ?>
						                </div>
						                <div role="tabpanel" class="tab-pane vertical-scroll  height-300" id="paid_doc" aria-expanded="true" aria-labelledby="base-paid_doc">
					                      	<?php foreach ($innovare->getCourseDocPaid($course_info[0]->id) as $course_doc) { ?>
						                      	<a href="<?php echo $course_doc->url; ?>" class="c-doc" >
						                          	<div class="row">

						                          		<div class="col-md-3 thumbnail">
						                          				<i class="fas fa-file"></i>
						                          		</div>
						                          		<div class="col-md-9">
						                          			<p style="font-size: 12px;margin-bottom: 0px !important;"><?php echo $course_doc->name; ?>.</p>
						                          			<p style="font-size: 12px;margin-bottom: 0px !important;">Date: <?php echo date('jS F, Y', strtotime($course_doc->created_at)) ?>.</p>
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
		              	</div>
		              <!--/ Project Overview -->
		              <!-- Project Users -->
		              	<div class="card">
		                  	<div class="card-header">
		                        <h4 class="card-title" id="hidden-label-basic-form">Student List</h4>
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
			                          	<ul class="nav nav-tabs nav-underline no-hover-bg" style="margin-left: 10px;margin-right: 10px;">
											<li class="nav-item tabs_select" style="">
												<a class="nav-link active" id="base-active_student" data-toggle="tab" aria-controls="active_student" href="#active_student" aria-expanded="true">Active</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" id="base-completed_student" data-toggle="tab" aria-controls="completed_student" href="#completed_student" aria-expanded="false">Paid</a>
											</li>
										</ul>
										<div class="tab-content  pt-1">
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
					                        <div role="tabpanel" class="tab-pane vertical-scroll  height-300" id="completed_student" aria-expanded="true" aria-labelledby="base-completed_student">
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
		              </div>
		              <!--/ Project Users -->
		            </div>
	          	</div>
	        </div>

            

        </div>
    </div>
</div>


    
    <!-- ////////////////////////////////////////////////////////////////////////////-->

   