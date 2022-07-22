<title><?php echo $properties['title']; ?> || View Thought leadership Details</title>
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
			                           <h4 class="card-title" style="text-transform: uppercase;">Thought leadership Details</h4>
			                           <!-- <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a> -->
			                           <div class="heading-elements">
				                            <div class="btn-group " role="group" >
					                           	<a class="btn  btn-dark" href="<?php echo $properties['baseurl']?>edit-thought-leadership-details/<?php echo $leadership_info[0]->id?>" style="padding: 10px;border-right: 2px solid #ffffff6e;">
					                           		<i class="fas fa-edit"></i> Edit
					                           	</a>
					                           	<?php if ($leadership_info[0]->status == 'active') : ?>
						                           	<a class="btn btn-dark" href="?archive&leadership_id=<?php echo $leadership_info[0]->id ?>" style="padding: 10px;border-right: 2px solid #ffffff6e;">
						                           		<i class="fas fa-archive"></i> Archive
						                           	</a>	
						                        <?php elseif ($leadership_info[0]->status == 'archived') : ?>
						                           	<a class="btn btn-dark" href="?activate&leadership_id=<?php echo $leadership_info[0]->id ?>" style="padding: 10px;border-right: 2px solid #ffffff6e;">
						                           		<i class="fas fa-check"></i> Active
						                           	</a>
					                           	<?php endif; ?>
					                           	<a class="btn  btn-dark" href="<?php  echo $properties['baseurl']?>view-thought-leadership-videos/<?php echo $leadership_info[0]->id?>" style="padding: 10px;border-right: 2px solid #ffffff6e;">
					                           		<i class="fab fa-youtube"></i> Videos
					                           	</a>
					                           	
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
		                           <img src="<?php echo $leadership_info[0]->thumbnail; ?>" style="width: 100%;" >
		                        </div>
		                        <div class="col-md-12">
		                        	<div class="course-title">
		                        		<h2>Title: <span style="font-weight: 500"><?php echo $leadership_info[0]->title; ?></span></h2>
		                        		<hr class="m-0" style="margin-top: 1.5rem !important;margin-bottom: 1.5rem !important;">
		                        		
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
		                            <h4 class="card-title" id="hidden-label-basic-form">Thought leadership Description</h4>
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
		                                			<?php echo html_entity_decode($leadership_info[0]->description); ?> 
		                                		</p>
		                                	</div>
		                                </div>
		                            </div>
		                        </div>
		                    </div>
		                </div> 
		            </div>

		             <!-- Description -->
		            <div class="row">
		                <div class="col-md-12">
		                    <div class="card">
		                        <div class="card-header">
		                            <h4 class="card-title" id="hidden-label-basic-form">Thought leadership Videos</h4>
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
		                                	<?php 
                                				foreach ($innovare->getThoughtLeadershipVideoActive($leadership_info[0]->id) as $leadership_vid) :
                                					$youtube_video_id = $innovare->getVideoID($leadership_vid->url);
                                					// var_dump($youtube_video_id);

                                			?> 
			                                	<div class="col-md-6">

			                                			<iframe width="100%" height="300" src="https://www.youtube.com/embed/<?= $youtube_video_id;?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

			                                			<h4 class="card-title mt-1">Title: <?= $leadership_vid->title;?> </h4>

			                                	</div>
		                                	<?php endforeach ?>

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
		                        <h4 class="card-title" id="hidden-label-basic-form">Thought Leadership Status</h4>
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

		                          				<?php if ($leadership_info[0]->status == 'active' ) : ?>

		                          					<button class="btn btn-success " style="text-transform: capitalize;padding-left: 40px;padding-right: 40px;">Active</button>

		                          				<?php elseif ($leadership_info[0]->status == 'archived' ) : ?>

		                          					<button class="btn btn-warning " style="text-transform: capitalize;padding-left: 40px;padding-right: 40px;">Archived</button>

		                          				<?php endif; ?>

		                          				<br>
		                          				<br>

		                          				<p>DATE CREATED:<br>
		                          					<p><?php echo date('jS F, Y', strtotime($leadership_info[0]->created_at));?> </p>
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