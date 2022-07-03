<title><?php echo $website_details[0]->title?> || News Articles</title>

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
                                <li class="breadcrumb-item"><a href="<?php echo $properties['baseurl']; ?>">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">News</li>
                            </ol>
                        </nav>
                        <h1 class="mb-0 title effect-static-text">News</h1>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- News -->
<section id="blog" class="section-1 single showcase projects">
    <div class="container">
        <div class="row content">

            <!-- Main -->
            <div class="col-12 col-lg-8 p-0 blog-grid">
                <div class="row items">

                    <?php 

                        if ( !empty( $innovare->getActiveNews() ) ) {
                            
                            foreach ($innovare->getActiveNews() as $news_info ) {
                                // var_dump($event_info);die();
                                # code...
                     
                    ?>
                        <div class="col-12 col-md-12 item">
                            <div class="row card p-0 text-center">
                                <div class="image-over" style="/*min-width: 325px; min-height: 300px;*/ background: url('<?php echo $news_info->image_url ?>')  no-repeat center top;background-size: cover;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;">
                                    <img src="" alt="Lorem ipsum">
                                </div>
                                <div class="card-footer d-lg-flex align-items-center justify-content-center">
                                    <a href="#" class="d-lg-flex align-items-center">
                                        <!-- <i class="icon-user"></i> -->
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
                                    <a href="#" class="d-lg-flex align-items-center">
                                        <i class="icon-clock"></i>
                                         <?php echo date('jS F, Y', strtotime($news_info->created_at)) ?>
                                    </a>
                                </div>
                                <div class="card-caption col-12 p-0">
                                    <div class="card-body">
                                        <a href="<?php echo $properties['baseurl']?>view-event-info/<?php echo $news_info->slug ?>">
                                            <h4><?php echo $news_info->title; ?></h4>
                                            <a class="nav-link" href="<?php echo $properties['baseurl']?>view-event-info/<?php echo $news_info->slug ?>"><i>Read More</i></a>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div> 

                    <?php } }else{ ?>

                        <h1 class="text-center"> NO NEWS ARTICLES TO DISPLAY</h1>

                    <?php } ?>           
                    
                </div>

                <!-- Pagination -->
              <!--   <div class="row">
                    <div class="col-12">
                        <nav>
                            <ul class="pagination justify-content-center">
                                <li class="page-item">
                                    <a class="page-link" href="#" tabindex="-1">
                                        <i class="icon-arrow-left"></i>
                                    </a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item active"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">
                                        <i class="icon-arrow-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div> -->
            </div>

            <!-- Sidebar-->
            <aside class="col-12 col-lg-4 pl-lg-5 p-0 float-right sidebar">                     
                
                

                <!-- Search -->
                <!-- <div class="row item widget-search">
                    <div class="col-12 align-self-center">
                        <h4 class="title">Search</h4>
                        <div class="row">
                            <div class="col-12 m-0 p-0 input-group">
                                <input type="text" class="form-control" placeholder="Enter Keywords">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 p-0 input-group align-self-center">
                                <button class="btn primary-button">SEARCH</button>
                            </div>
                        </div>
                    </div>
                </div> -->
                    

                <!-- Categories -->
                <div class="row item widget-categories">
                    <div class="col-12 align-self-center">
                        <h4 class="title">Categories</h4>
                        <ul class="list-group list-group-flush">

                            <?php 

                                    if ( !empty( $innovare->getNewsCat() ) ) {
                                        
                                        foreach ($innovare->getNewsCat() as $news_cat ) {
                                            // var_dump($event_info);die();
                                            # code...
                                 
                                ?>

                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <a href="<?php echo  $properties['baseurl'] ?>view-news-category/<?php echo  $news_cat->slug ?>"><?php echo  $news_cat->name ?></a>
                                <span class="badge circle"><?php echo  count($innovare->getNewsCountByCatid($news_cat->id)) ?></span>
                            </li>

                            <?php } }else{ ?>

                                <h1 class="text-center"> NO CATEGORIES TO DISPLAY</h1>

                            <?php } ?>
                            
                        </ul>
                    </div>
                </div>
                    
                
                <!-- Quote -->
                <div class="row item widget-quote team">
                    <div class="col-12 align-self-center">
                        <div class="quote">
                            <div class="quote-content">
                                <h4>Author Message</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                <h5>T. Johnson</h5>
                            </div>
                            <i class="quote-right fas fa-quote-right"></i>
                        </div>
                    </div>
                </div>

                
            </aside>
        </div>
    </div>
</section>




