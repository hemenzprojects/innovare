<title><?php echo $properties['title']; ?> || View Team Member Details</title>
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
			                           <h4 class="card-title" style="text-transform: uppercase;">Team Member Details</h4>
			                           <!-- <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a> -->
			                           <div class="heading-elements">
				                            <div class="btn-group " role="group" >
					                           	<a class="btn  btn-dark" href="<?php echo $properties['baseurl']?>edit-team-member-details/<?php echo $team_info[0]->id?>" style="padding: 10px;border-right: 2px solid #ffffff6e;">
					                           		<i class="fas fa-edit"></i> Edit
					                           	</a>
					                           	<?php if ($team_info[0]->status == 'active') : ?>
						                           	<a class="btn btn-dark" href="?archive=course_id=<?php echo $team_info[0]->id ?>" style="padding: 10px;">
						                           		<i class="fas fa-archive"></i> Archive
						                           	</a>	
						                        <?php elseif ($team_info[0]->status == 'archived') : ?>
						                           	<a class="btn btn-dark" href="?activate=course_id=<?php echo $team_info[0]->id ?>" style="padding: 10px;">
						                           		<i class="fas fa-check"></i> Active
						                           	</a>
					                           	<?php endif; ?>
					                           	<!-- <a class="btn  btn-dark" href="<?php // echo $properties['baseurl']?>view-course-documents/<?php // echo $course_info[0]->course_id?>" style="padding: 10px;border-right: 2px solid #ffffff6e;">
					                           		<i class="fas fa-eye"></i> Document
					                           	</a>
					                           	<button class="btn btn-dark dropdown-toggle dropdown-menu-right" id="btnGroupDrop1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					                           		<i class="fa fa-settings icon-left"></i> More
					                           	</button>
					                           	
					                           	<div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
					                           		<a class="dropdown-item" href="#">Course Report</a>
					                           		<a class="dropdown-item" href="#">Student List</a>
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
		                           <img src="<?php echo $team_info[0]->thumbnail; ?>" style="width: 100%;" >
		                        </div>
		                        <div class="col-md-12">
		                        	<div class="course-title">
		                        		<h2 class="capital">Name: <span style="font-weight: 500"><?php echo $team_info[0]->title.'. '.$team_info[0]->name; ?></span></h2>
		                        		<p style="font-size: 16px;"><b>Position:</b> <?php echo $team_info[0]->position; ?></p>
		                        		<span class="badge badge-danger " style="margin-bottom: 10px; text-transform: capitalize;"> <?php echo $team_info[0]->role; ?></span>

		                        		<hr class="m-0" style="margin-top: 1.5rem !important;margin-bottom: 1.5rem !important;">
		                        		<div class="row">

		                        			<div class="col-md-6">

		                        				<p style="font-size: 16px;"><b>Email:</b> <?php echo $team_info[0]->email; ?></p>

		                        				<p style="font-size: 16px;"><b>Phone:</b> <?php echo $team_info[0]->phone; ?></p>

		                        				
		                        				
		                        			</div>
		                        			<div class="col-md-6">
		                        				<p style="font-size: 16px;"><b>Additional Email:</b> <?php echo $team_info[0]->opt_email; ?></p>
		                        				
		                        				<p style="font-size: 16px;"><b>Additional Pohne:</b> <?php echo $team_info[0]->opt_phone; ?></p>

		                        			</div>
		                        			
		                        		</div>
		                        		
		                        		
		                        		
		                        		
		                        		<!-- <p style="font-size: 16px;padding-bottom: 10px; "><b>Role:</b> </p> -->
		                        	</div>
		                        </div>
		                        <div class="col-lg-12" style="padding-bottom: 1rem;padding-top: 1rem;" >
			                        <div class="card-body">
				                        <div class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2 my-1">
				                           <span>Socail Media Links</span>
				                        </div>
				                    </div>
				                </div>
		                        <div class="col-md-12">
		                        	<div class="row " style="margin-left: 0px;margin-right: 0px;">
				                        <div class="col-md-3 details">
				                            <a href="<?php echo $team_info[0]->facebook; ?> ">
				                            	<i class="fab fa-facebook-square detail_icon" aria-hidden="true"></i>
				                            	<h4>Facebook</h4>
				                            </a>
				                        </div>

				                        <div class="col-md-3 details">
				                        	<a href="<?php echo $team_info[0]->twitter; ?> ">
				                            	<i class="fab fa-twitter-square detail_icon" aria-hidden="true"></i>
				                            	<h4>Twitter</h4>
				                            </a>
				                        </div>

				                        <div class="col-md-3 details">
				                            <a href="<?php echo $team_info[0]->linkedin; ?> ">
				                            	<i class="fab fa-linkedin-square detail_icon" aria-hidden="true"></i>
				                            	<h4>Linkedin</h4>
				                            </a>
				                            
				                        </div>
				                        
				                        <div class="col-md-3 details">
				                        	<a href="<?php echo $team_info[0]->instagram; ?> ">
				                            	<i class="fab fa-instagram-square detail_icon" aria-hidden="true"></i>
				                            	<h4>Instagram</h4>
				                            </a>
				                        </div>   
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
		                            <h4 class="card-title" id="hidden-label-basic-form">Team Member About</h4>
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
		                                			<?php echo html_entity_decode($team_info[0]->about); ?> 
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
		                        <h4 class="card-title" id="hidden-label-basic-form">Status</h4>
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

		                          				<?php if ($team_info[0]->status == 'active' ) : ?>

		                          					<button class="btn btn-success " style="text-transform: capitalize;padding-left: 40px;padding-right: 40px;">Active</button>

		                          				<?php elseif ($team_info[0]->status == 'archived' ) : ?>

		                          					<button class="btn btn-warning " style="text-transform: capitalize;padding-left: 40px;padding-right: 40px;">Archived</button>
		                          				<?php endif; ?>
		                          			</p>
		                          		<br>

		                          		
		                          			<p>DATE CREATED:<br><br>
		                          				 <button class="btn btn-primary " style="text-transform: capitalize;padding-left: 40px;padding-right: 40px;"><?php echo date('jS F, Y', strtotime($team_info[0]->created_at)) ?> </button>
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


    
    <!-- ////////////////////////////////////////////////////////////////////////////-->

   