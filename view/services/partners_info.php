<title><?php echo $website_details[0]->title?> || what-we-do || Professional Training || <?= $partners_info[0]->name?> </title>

<!-- Hero -->
    <section id="slider" class="hero p-0 odd featured">
        <div class="swiper-container no-slider animation slider-h-50 slider-h-auto">
            <div class="swiper-wrapper">

                <!-- Item 1 -->
                <div class="swiper-slide slide-center">

                    <!-- Media -->
                    <img src="<?php echo $banner[0]->image_url; ?>" alt="Who we are" class="full-image" data-mask="80">
                    <div class="slide-content row text-center">
                        <div class="col-12 mx-auto inner">
                            <!-- Content -->
                            <nav data-aos="zoom-out-up" data-aos-delay="800" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo $properties['baseurl']; ?>home">Home</a></li>
                                    <li class="breadcrumb-item" aria-current="page"> <a >What-we-do</a></li>
                                    <li class="breadcrumb-item " aria-current="page"><a href="<?= $properties['baseurl']; ?>professional-training">Professional Training</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><?= $partners_info[0]->name?></li>
                                </ol>
                            </nav>
                            <h1 class="mb-0 title effect-static-text"><?= $partners_info[0]->name?></h1>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

<!-- Partners info -->
    <section id="about-2" class="section-3 highlights team image-right odd">
        <div class="container  full-grid" style="padding: 0 50px;">
            <div class="row row-eq-height ">
                <div class="col-12 col-lg-7 align-self-center text pt-4 pb-4">
                    <div class="row intro m-0">
                        <div class="col-12 col-lg-12 p-0">
                            <span class="pre-title m-0">Professional Training</span>
                            <h2><?= $partners_info[0]->name?> <span class="featured"><span></span></span></h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 p-0 pr-md-5">
                            <?= html_entity_decode($partners_info[0]->description) ?>
                        </div>
                    </div>
                    
                   
                </div>
                <div data-aos="zoom-in" class="col-12 col-lg-5  " style="background: url('<?= $partners_info[0]->thumbnail?>')no-repeat center center/cover;">
                    <div class="image-over" >
                        <!-- <img src="<?php echo $properties['staticurl']?>assets/images/adesa.jpg" style="width: 100%;"> -->
                    </div>
                </div>
            </div>
        </div>
    </section>

<!-- Partners Courses -->
    <section id="projects" class="section-1 showcase blog-grid filter-section projects featured">
        <div class="overflow-holder">
            <div class="container">
                <div class="row text-center intro">
                    <div class="col-12">
                        <span class="pre-title">Our Partnered Courses</span>
                        <h2 class="mb-0">What we <span class="featured"><span>Provide</span></span></h2>
                    </div>
                </div>
                
                <div class="row items filter-items"> 
                <?php 

                    if(!empty($partners_info[0]->course_cat_id ) || $partners_info[0]->course_cat_id != '0' ){


                        foreach (explode(', ', $partners_info[0]->course_cat_id) as $cat_id) {
                            $category = json_encode( $innovare->getCourseCatByID($cat_id) );
                            $category = json_decode($category);
                                    // var_dump($category);die();

                            
                            if ( !empty( $innovare->getKnowledgeCourseByCatIDActive($category[0]->id) ) ) {
                                
                                foreach ($innovare->getKnowledgeCourseByCatIDActive($category[0]->id) as $partners_course_info ) {
                                    // var_dump($event_info);die();
                                    # code...

                ?>                      
                    <div class="col-12 col-md-6 col-lg-4 item filter-item" >
                        <div class="row card p-0 text-center">
                            <div class="image-over">
                                <img src="<?php echo $partners_course_info->thumbnail; ?>" alt="<?php echo $partners_course_info->title; ?>">
                            </div>
                            <div class="card-caption col-12 p-0">
                                <div class="card-body">
                                    <?php if ($partners_course_info->partners_link_select == 'yes'): ?>
                                        <a href="<?= $partners_course_info->pat_link; ?>" target="_blank"> 
                                    <?php else: ?>
                                        <a href="<?php echo $properties['baseurl']?>training-course/<?php echo $partners_course_info->slug ?>">
                                    <?php endif ?>
                                        <h4><?php echo $partners_course_info->title; ?></h4>
                                        <p>More info</p>
                                    </a>
                                </div>
                            </div>
                            <?php if ($partners_course_info->partners_link_select == 'yes'): ?>
                                <a href="<?= $partners_course_info->pat_link; ?>"><i class="btn-icon fas fas fa-arrow-right"></i></a> 
                            <?php else: ?>
                                <a href="<?php echo $properties['baseurl']?>training-course/<?php echo $partners_course_info->slug ?>"><i class="btn-icon fas fas fa-arrow-right"></i></a> 
                            <?php endif ?>
                        </div>
                    
                    </div>            
                    
                    <!-- <div class="col-1 filter-sizer"></div> -->
                <?php 
                                } 
                            }else{ 
                ?>

                    <h4 class="text-center">Nothing  To Display</h4>

                <?php 
                            }
                        }
                    }else{   
                ?> 
                    <h4 class="text-center">Nothing To Display</h4>
                <?php 
                    } 
                ?> 
                </div>
            </div>
        </div>
    </section>
<?php include 'includes/frontend_main/subs_footer.php'; ?>