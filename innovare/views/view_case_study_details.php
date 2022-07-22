<title><?php echo $properties['title']; ?> || View Case Study Details</title>
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
			                           <h4 class="card-title" style="text-transform: uppercase;">Case Study Details</h4>
			                           <!-- <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a> -->
			                           <div class="heading-elements">
				                            <div class="btn-group " role="group" >
					                           	<a class="btn  btn-dark" href="<?php echo $properties['baseurl']?>edit-case-study-details/<?php echo $caseStudy_info[0]->caseStudy_id?>" style="padding: 10px;border-right: 2px solid #ffffff6e;">
					                           		<i class="fas fa-edit"></i> Edit
					                           	</a>
					                           	<?php if ($caseStudy_info[0]->status == 'active') : ?>
						                           	<a class="btn btn-dark" href="?archive=caseStudy_id=<?php echo $caseStudy_info[0]->caseStudy_id ?>" style="padding: 10px;border-right: 2px solid #ffffff6e;">
						                           		<i class="fas fa-archive"></i> Archive
						                           	</a>	
						                        <?php elseif ($caseStudy_info[0]->status == 'archived') : ?>
						                           	<a class="btn btn-dark" href="?activate=caseStudy_id=<?php echo $caseStudy_info[0]->caseStudy_id ?>" style="padding: 10px;border-right: 2px solid #ffffff6e;">
						                           		<i class="fas fa-check"></i> Active
						                           	</a>
					                           	<?php endif; ?>
					                           	<a class="btn  btn-dark" href="<?php echo $properties['baseurl']?>edit-case-study-documents/<?php echo $caseStudy_info[0]->caseStudy_id?>" style="padding: 10px;border-right: 2px solid #ffffff6e;">
					                           		<i class="fas fa-eye"></i> Document
					                           	</a>
					                           		<a class="btn  btn-dark" href="<?php echo $properties['baseurl']?>edit-case-study-gallery/<?php echo $caseStudy_info[0]->caseStudy_id ?>" style="padding: 10px;border-right: 2px solid #ffffff6e;">
					                           		<i class="fas fa-images"></i> Gallery
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
		                           <img src="<?php echo $caseStudy_info[0]->thumbnail; ?>" style="width: 100%;" >
		                        </div>
		                        <div class="col-md-12">
		                        	<div class="course-title">
		                        		<h2>Title: <span style="font-weight: 500"><?php echo $caseStudy_info[0]->title; ?></span></h2>
		                        		<hr class="m-0" style="margin-top: 1.5rem !important;margin-bottom: 1.5rem !important;">
		                        		<p> Category:
			                        		<?php 
                                                if (!empty($caseStudy_info[0]->category_id)) {
                                                    foreach (explode(', ', $caseStudy_info[0]->category_id) as $caseStudy_cat_id) {
                                                        $category = json_encode( $innovare->getCaseStudyCatByID($caseStudy_cat_id) );

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
		                            <h4 class="card-title" id="hidden-label-basic-form">Case Study Description</h4>
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
		                                			<?php echo html_entity_decode($caseStudy_info[0]->description); ?> 
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
		                            <h4 class="card-title" id="hidden-label-basic-form">Case Study Gallery</h4>
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
						                                    		<?php foreach ($innovare->getCaseStudyGallery($caseStudy_info[0]->caseStudy_id) as $event_gallery):
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
		                        <h4 class="card-title" id="hidden-label-basic-form">Case Study Status</h4>
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

		                          				<?php if ($caseStudy_info[0]->status == 'active' ) : ?>

		                          					<button class="btn btn-success " style="text-transform: capitalize;padding-left: 40px;padding-right: 40px;">Active</button>

		                          				<?php elseif ($caseStudy_info[0]->status == 'archived' ) : ?>

		                          					<button class="btn btn-warning " style="text-transform: capitalize;padding-left: 40px;padding-right: 40px;">Archived</button>
		                          				<?php endif; ?>
		                          			</p>
		                          			<p style="text-transform: uppercase;padding-top: 10px;">Publish Date:<br><br>
		                          				 <button class="btn btn-danger " style="text-transform: capitalize;padding-left: 40px;padding-right: 40px;"><?php echo date('jS F, Y', strtotime($caseStudy_info[0]->created_at)); ?> </button>
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
		                        <h4 class="card-title" id="hidden-label-basic-form">Case Study Documents</h4>
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
				                      	<?php foreach ($innovare->getCaseStudyDoc($caseStudy_info[0]->caseStudy_id) as $caseStudy_doc) { ?>
					                      	<a href="<?php echo $caseStudy_doc->url; ?>" target="_blank" class="c-doc" >
					                          	<div class="row">

					                          		<div class="col-md-3 thumbnail">
					                          				<i class="fas fa-file"></i>
					                          		</div>
					                          		<div class="col-md-9">
					                          			<p style="font-size: 12px;margin-bottom: 0px !important;text-transform: capitalize;"><?php echo $caseStudy_doc->name.'.'.$caseStudy_doc->extension; ?></p>
					                          			<p style="font-size: 12px;margin-bottom: 0px !important;">Date: <?php echo date('jS F, Y', strtotime($caseStudy_doc->created_at)) ?>.</p>
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
		              
		            </div>
	          	</div>
	        </div>

            

        </div>
    </div>
</div>


    
    <!-- ////////////////////////////////////////////////////////////////////////////-->

   