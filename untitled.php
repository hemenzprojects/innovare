<section id="result" class="section-1 showcase blog-grid projects" style="padding-bottom: 20px;">
            <div class="container full-grid">
            <div class="row items">
                <div class="col-12 col-md-3 pr-md-5 text">
                    <div data-aos="fade-up" class="row intro aos-init aos-animate">
                        <div class="col-12 p-0">
                            <span class="pre-title m-0">News Articles</span>
                            <h2 class="mb-3">Latest<br>News<br>from Innovare</h2>
                            <!-- <div class="row">
                                <div class="col-12 p-0 input-group">
                                    <input type="text" class="form-control" placeholder="Enter Keywords">
                                </div>
                            </div> -->
                            <div class="row">
                                <div class="col-12 p-0 input-group align-self-center">
                                    <a href="<?php echo $properties['baseurl']?>view-news" class="btn primary-button">See All</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div data-aos="fade-up" class="col-12 col-md-9 item aos-init aos-animate">
                <!-- <div class="container "> -->
                        <div class="swiper-container mid-slider items" data-perview="2"> 
                            <div class="swiper-wrapper">

                                <?php 

                                    if ( !empty( $innovare->getActiveNews() ) ) {
                                        
                                        foreach ($innovare->getActiveNews() as $news_info ) {
                                            // var_dump($event_info);die();
                                            # code...
                                 
                                ?>

                                    <div class="swiper-slide slide-center item">
                                        <div class="row card p-0 text-center">
                                            <div class="image-over" style="min-width: 325px; min-height: 300px; background: url('<?php echo $news_info->image_url ?>')  no-repeat center center;background-size: cover;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;" >
                                                <img src="" style="width: 100%">
                                            </div>
                                            <div class="card-footer d-lg-flex align-items-center justify-content-center" style="">
                                                <a href="#" class="d-lg-flex align-items-center">
                                                    <i class="fas fa-stream"></i>
                                                    <?php 

                                                         if (!empty($news_info->category_id) ) {
                                                            // var_dump($news_info->category_id);die();

                                                            $category = json_decode($news_info->category_id);

                                                            if (!empty($category)) {

                                                                foreach ($category as $category_info) {

                                                                    $category_info = json_encode( $innovare->getNewsCatByID($category_info) );

                                                                    $category_info = json_decode($category_info);
                                                                                    
                                                            // echo $news_info[0]->duration; 
                                                    ?>
                                                        <span class="badge badge-danger " style="margin-bottom: 10px; text-transform: capitalize;"> 
                                                            <?php echo $category_info[0]->name; ?>
                                                        </span>
                                                    <?php } } } ?>

                                                </a>
                                                <a class="d-lg-flex align-items-center">
                                                    <i class="far fa-clock"></i>
                                                    <?php echo date('jS F, Y', strtotime($news_info->created_at)) ?>
                                                </a>
                                            </div>
                                            <div class="card-caption col-12 p-0">
                                                <div class="card-body">
                                                    <a href="<?php echo $properties['baseurl']?>view-event-info/<?php echo $news_info->slug ?>">
                                                        <h4 ><?php echo $news_info->title; ?></h4>
                                                        <a href="<?php echo $properties['baseurl']?>view-event-info/<?php echo $news_info->slug ?>"><i>More Info</i></a>
                                                        
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <?php } }else{ ?>

                                    <h1 class="text-center"> NO NEWS ARTICLES TO DISPLAY</h1>

                                <?php } ?>


                                
                            </div>
                        </div>
                    <!-- </div> -->
                    </div>

               
                
            </div>
            </div>
        </section>