<title><?php echo $properties['title']; ?> || View News Details</title>
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
			                           <h4 class="card-title" style="text-transform: uppercase;">News Details</h4>
			                           <!-- <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a> -->
			                           <div class="heading-elements">
				                            <div class="btn-group " role="group" >
					                           	<a class="btn  btn-dark" href="<?php echo $properties['baseurl']?>edit-news-details/<?php echo $news_info[0]->id?>" style="padding: 10px;border-right: 2px solid #ffffff6e;">
					                           		<i class="fas fa-edit"></i> Edit
					                           	</a>
					                           	<?php if ($news_info[0]->status == 'active') : ?>
						                           	<a class="btn btn-dark" href="?archive&news_id=<?php echo $news_info[0]->id ?>" style="padding: 10px;border-right: 2px solid #ffffff6e;">
						                           		<i class="fas fa-archive"></i> Archive
						                           	</a>
						                        
						                        <?php elseif ($news_info[0]->status == 'archived') : ?>

						                           	<a class="btn btn-dark" href="?activate&news_id=<?php echo $news_info[0]->id ?>" style="padding: 10px;border-right: 2px solid #ffffff6e;">
						                           		<i class="fas fa-check"></i> Active
						                           	</a>

						                        <?php elseif ($news_info[0]->status == 'draft' ) : ?>

						                           	<a class="btn btn-dark" href="?activate&news_id=<?php echo $news_info[0]->id ?>" style="padding: 10px;border-right: 2px solid #ffffff6e;">
						                           		<i class="fas fa-check"></i> Active
						                           	</a>

					                           	<?php endif; ?>

						                        <?php if ($news_info[0]->status == 'active' || $news_info[0]->status == 'archived') : ?>
						                           	<a class="btn btn-dark" href="?draft&news_id=<?php echo $news_info[0]->id ?>" style="padding: 10px;border-right: 2px solid #ffffff6e;">
						                           		<i class="fab fa-firstdraft"></i> Draft
						                           	</a>
					                           	<?php endif; ?>

					                           	<a class="btn  btn-dark" href="<?php echo $properties['baseurl']?>view-news-gallery/<?php echo $news_info[0]->id?>" style="padding: 10px;border-right: 2px solid #ffffff6e;">
					                           		<i class="fas fa-images"></i> Gallery
					                           	</a>
					                           	<!-- <button class="btn btn-dark dropdown-toggle dropdown-menu-right" id="btnGroupDrop1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					                           		<i class="fa fa-settings icon-left"></i> More
					                           	</button>
					                           	
					                           	<div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
					                           		<a class="dropdown-item" href="<?php // echo $properties['baseurl']?>edit-event-gallery/<?php // echo $event_info[0]->event_id ?>">Edit Gallery</a>
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
		                           <img src="<?php echo $news_info[0]->image_url; ?>" style="width: 100%;" >
		                        </div>
		                        <div class="col-md-12">
		                        	<div class="course-title">
		                        		<h2>Title: <span style="font-weight: 500"><?php echo $news_info[0]->title; ?></span></h2>
		                        		<hr class="m-0" style="margin-top: 1.5rem !important;margin-bottom: 1.5rem !important;">
		                        		<p> Category:
			                        		<?php 
                                                if (!empty($news_info[0]->category_id)) {
                                                    foreach (explode(', ', $news_info[0]->category_id) as $news_cat_id) {
                                                        $category = json_encode( $innovare->getNewsCatByID($news_cat_id) );

                                                        $category = json_decode($category);

                                                        // if ( $category[0]->id == $news_cat->id) { 
                                                         // var_dump($course_info[0]->category_id);die();          
                                            ?>
				                        		<span class="badge badge-danger " style="margin-bottom: 10px; text-transform: capitalize;"> 
				                        			<?php echo $category[0]->name; ?>
				                        		</span>
				                        	<?php  } } ?>
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
		                                		<div style="line-height: 1.7rem">
		                                			<?php echo html_entity_decode($news_info[0]->description); ?> 
		                                		</div>
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
						                                    		<?php foreach ($innovare->getNewsGallery($news_info[0]->id) as $news_gallery):
			                                							// var_dump($event_gallery);die();
			                                			 			?>
							                                			<div class="col-md-4">
									                                        <a href="<?php echo $news_gallery->url?>" > 
									                                        	<img src="<?php echo $news_gallery->url?>" width="100%" /> 
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
		                        <h4 class="card-title" id="hidden-label-basic-form">News Status</h4>
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

		                          				<?php if ($news_info[0]->status == 'active' ) : ?>

		                          					<button class="btn btn-success " style="text-transform: capitalize;padding-left: 40px;padding-right: 40px;">Active</button>

		                          				<?php elseif ($news_info[0]->status == 'draft' ) : ?>

		                          					<button class="btn btn-info " style="text-transform: capitalize;padding-left: 40px;padding-right: 40px;">Draft</button>

		                          				<?php elseif ($news_info[0]->status == 'archived' ) : ?>

		                          					<button class="btn btn-warning " style="text-transform: capitalize;padding-left: 40px;padding-right: 40px;">Archived</button>
		                          					
		                          				<?php endif; ?>
		                          			</p>
		                          		

		                          		
		                          			<p style="text-transform: uppercase;padding-top: 10px;">Publish Date:<br><br>
		                          				 <button class="btn btn-danger " style="text-transform: capitalize;padding-left: 40px;padding-right: 40px;"><?php echo date('jS F, Y', strtotime($news_info[0]->created_at)); ?> </button>
		                          			</p>
		                          			</div>
		                          		
		                          		
		                          	</div>
		                      	</div>
		                      <!-- /project search -->
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

   