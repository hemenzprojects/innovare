<title><?php echo $website_details[0]->title?> || Get in Touch </title>

<!-- Hero -->
    <section id="slider" class="hero p-0 odd featured">
        <div class="swiper-container no-slider animation slider-h-50 slider-h-auto">
            <div class="swiper-wrapper">

                <!-- Item 1 -->
                <div class="swiper-slide slide-center">

                    <!-- Media -->
                    <img src="<?php echo $properties['staticurl']?>assets/images/banners/banner-21.jpg" alt="Who we are" class="full-image" data-mask="60">
                    <div class="slide-content row text-center">
                        <div class="col-12 mx-auto inner">
                            <!-- Content -->
                            <nav data-aos="zoom-out-up" data-aos-delay="800" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo $properties['baseurl']; ?>home">Home</a></li>
                                    <!-- <li class="breadcrumb-item" aria-current="page"> <a href="<?php echo $properties['baseurl']; ?>page/<?= $special_page_info[0]->slug ?>"><?= $special_page_info[0]->slug ?></a></li> -->
                                    <li class="breadcrumb-item active" aria-current="page">Contact-us</li>

                                </ol>
                            </nav>
                            <h1 class="mb-0 title effect-static-text">Get in Touch</h1>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

<!-- Page info -->
   <section id="contact" class="section-1 form contact">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-8 pr-md-5 align-self-center text">
                    <div class="row intro">
                        <div class="col-12 p-0">
                            <span class="pre-title m-0">Send us a Message</span>
                            <h2>Get in <span class="featured"><span>Touch</span></span></h2>
                            <p>If you’d like a free consultation, please start by completing the form:</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 p-0">
                            <form action="" id="contact_form" class="nexgen-simple-form">
                                <!-- <input type="hidden" name="section" value="nexgen_form"> -->

                                <input type="hidden" name="reCAPTCHA" data-key="6Lf-NwEVAAAAAPo_wwOYxFW18D9_EKvwxJxeyUx7">
                                <!-- Remove this field if you want to disable recaptcha -->

                                <div class="row form-group-margin">
                                    <div class="col-12 col-md-6 m-0 p-2 input-group">
                                        <input type="text" id="cname" name="name" class="form-control field-name" placeholder="Name" required="required">
                                    </div>
                                    <div class="col-12 col-md-6 m-0 p-2 input-group">
                                        <input type="email" id="cemail" name="email" class="form-control field-email" placeholder="Email" required="required">
                                    </div>
                                    <div class="col-12 col-md-12 m-0 p-2 input-group">
                                        <input type="text" id="csubject" name="subject" class="form-control field-phone" placeholder="Subject" required="required">
                                    </div>
                                    <!-- <div class="col-12 col-md-6 m-0 p-2 input-group">
                                        <i class="icon-arrow-down mr-3"></i>
                                        <select name="info" class="form-control field-info">
                                            <option value="" selected="" disabled="">More Info</option>
                                            <option>Audit &amp; Assurance</option>
                                            <option>Financial Advisory</option>
                                            <option>Analytics and M&amp;A</option>
                                            <option>Middle Marketing</option>
                                            <option>Legal Consulting</option>
                                            <option>Regulatory Risk</option>
                                            <option>Other</option>
                                        </select>
                                    </div> -->
                                    <div class="col-12 m-0 p-2 input-group">
                                        <textarea id="cmessage" name="message" class="form-control field-message" placeholder="Message" required="required"></textarea>
                                    </div>
                                    <div class="col-12 col-12 m-0 p-2 input-group">
                                        <span class="form-alert" style="display: none;"></span>
                                    </div>
                                    <div class="col-12 input-group m-0 p-2">
                                        <button type="submit" id="send_message" class="btn primary-button">SEND MESSAGE</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>                        
                </div>
                <div class="col-12 col-md-4">
                    <div class="contacts">
                        <h4>Innovare LTD</h4>
                        <p>Providing Value-Driven Information Security Service And Solution.</p>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="tel:<?= $contact_details[0]->phone ?>" class="nav-link">
                                    <i class="fas fa-phone-alt mr-2"></i>
                                    <?= $contact_details[0]->phone ?>
                                </a>
                            </li>
                            <?php if ( !empty($contact_details[0]->opt_phone) ): ?>
                                <li class="nav-item">
                                    <a href="tel:<?= $contact_details[0]->opt_phone ?>" class="nav-link">
                                        <i class="fas fa-mobile mr-2"></i>
                                        <?= $contact_details[0]->opt_phone ?>
                                    </a>
                                </li>    
                            <?php endif ?>
                            
                            <li class="nav-item">
                                <a href="mailto:<?php echo $contact_details[0]->email ?>" class="nav-link">
                                    <i class="fas fa-envelope mr-2"></i>
                                    <?php echo $contact_details[0]->email?>
                                </a>
                            </li>
                            <?php if (!empty($contact_details[0]->opt_email)): ?>
                                <li class="nav-item">
                                    <a href="mailto:<?php echo $contact_details[0]->opt_email ?>" class="nav-link">
                                        <i class="far fa-envelope mr-2"></i>
                                        <?php echo $contact_details[0]->opt_email?>
                                    </a> 
                                </li>
                            <?php endif ?>
                            <li class="nav-item">
                                <a href="<?php echo $contact_details[0]->google_location?>" target="_blank" class="nav-link">
                                    <i class="fas fa-map-marker-alt mr-2"></i>
                                    <?php echo $contact_details[0]->location?>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="mt-2 btn outline-button" data-toggle="modal" data-target="#map">VIEW MAP</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php include 'includes/frontend_main/subs_footer.php'; ?>
