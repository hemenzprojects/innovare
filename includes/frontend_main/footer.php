     <!-- Footer -->
        <footer>

            <!-- Footer [content] -->
            <section id="footer" class="odd footer offers">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-4 footer-left">

                            <!-- Navbar Brand-->
                            <a class="navbar-brand" href="index.html">
                                <span class="brand">
                                    <!-- <span class="featured" style="background: white;"> -->
                                        <!-- <span class="first">NEX</span> -->
                                        <img src="<?php echo $website_details[0]->logo_url?>" alt="innovare Learning">

                                    <!-- </span> -->
                                    <!-- <span class="last">GEN</span> -->
                                </span>
                                
                                <!-- 
                                    Custom Logo
                                    <img src="assets/images/logo.svg" alt="NEXGEN">
                                -->
                            </a>
                            <p>Providing Value-Driven Information Security Service And Solution.</p>
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a href="tel:<?php echo $contact_details[0]->phone ?>"  class="nav-link">
                                        <i class="fas fa-phone-alt mr-2"></i>
                                        <?php echo $contact_details[0]->phone ?>
                                    </a>
                                    <?php if ( !empty($contact_details[0]->opt_phone) ): ?>
                                        <a href="tel:<?php echo $contact_details[0]->opt_phone ?>"  class="nav-link">
                                            <i class="fas fa-mobile mr-2"></i> 
                                            <?php echo $contact_details[0]->opt_phone ?>
                                        </a>
                                    <?php endif ?>

                                </li>

                                <li class="nav-item">
                                    <a href="mailto:<?php echo $contact_details[0]->email ?>" class="nav-link">
                                        <i class="fas fa-envelope mr-2"></i> 
                                        <?php echo $contact_details[0]->email; ?>
                                    </a> 

                                    <?php if (!empty($contact_details[0]->opt_email)): ?>
                                        <a href="mailto:<?php echo $contact_details[0]->opt_email ?>" class="nav-link">
                                            <i class="far fa-envelope mr-2"></i>
                                            <?php echo $contact_details[0]->opt_email?>
                                        </a>  
                                    <?php endif ?>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo $contact_details[0]->google_location?> " class="nav-link">
                                        <i class="fas fa-map-marker-alt mr-2"></i>
                                        <?php echo $contact_details[0]->location?>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo $properties['baseurl']?>contact-us" class="mt-4 btn outline-button smooth-anchor">Get in Touch</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-12 col-lg-8 p-0 footer-right">
                            <div class="row items">
                                <div class="col-12 col-lg-6 item">
                                    <div class="card">
                                        <h4>Company</h4>
                                        <a href="<?php echo $properties['baseurl']?>about"><i class="icon-arrow-right"></i>Who we are</a>
                                        <!-- <a href="<?php echo $properties['baseurl']?>servives"><i class="icon-arrow-right"></i>What we do</a> -->
                                        <!-- <a href="<?php echo $properties['baseurl']?>industries"><i class="icon-arrow-right"></i>Our Industries</a> -->
                                        <a href="<?php echo $properties['baseurl']?>career"><i class="icon-arrow-right"></i>Career Path</a>
                                        <a href="<?php echo $properties['baseurl']?>event-management"><i class="icon-arrow-right"></i>Conferences</a>
                                        <a href="<?php echo $properties['baseurl']?>contact-us"><i class="icon-arrow-right"></i>Get in Touch</a>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 item">
                                    <div class="card">
                                        <h4>Special Links</h4>
                                        <a href="<?php echo $properties['baseurl']?>consulting-services"><i class="icon-arrow-right"></i>Consulting Services</a>
                                        <a href="<?php echo $properties['baseurl']?>professional-training"><i class="icon-arrow-right"></i>Professional Training</a>
                                        <a href="<?php echo $properties['baseurl']?>banking-as-a-service"><i class="icon-arrow-right"></i>Banking as a Service</a>
                                        <!-- <a href="<?php echo $properties['baseurl']?>knowledge-transfer"><i class="icon-arrow-right"></i>Knowledge Transfer</a> -->
                                        <!-- <a href="<?php echo $properties['baseurl']?>thought-leadership"><i class="icon-arrow-right"></i>Thought Leadership</a> -->
                                        <a href="<?php echo $properties['baseurl']?>training-courses"><i class="icon-arrow-right"></i>Training Services</a>
                                        <!-- <a href="<?php echo $properties['baseurl']?>case-studies"><i class="icon-arrow-right"></i>Case Studies</a> -->
                                        <!-- <a href="<?php echo $properties['baseurl']?>news"><i class="icon-arrow-right"></i>Keynotes</a> -->
                                        <!-- <a href="#"><i class="icon-arrow-right"></i></a> -->
                                    </div>
                                </div>
                                <!-- <div class="col-12 col-lg-4 item">
                                    <div class="card">
                                        <h4>Support</h4>
                                        <a href="#"><i class="icon-arrow-right"></i>Responsibility</a>
                                        <a href="#"><i class="icon-arrow-right"></i>Terms of Use</a>
                                        <a href="#"><i class="icon-arrow-right"></i>About Cookies</a>
                                        <a href="#"><i class="icon-arrow-right"></i>Privacy Policy</a>
                                        <a href="#"><i class="icon-arrow-right"></i>Accessibility</a>
                                        <a href="#"><i class="icon-arrow-right"></i>Information</a>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Copyright -->
            <section id="copyright" class="p-3 odd copyright">
                <div class="container">
                    <div class="row">
                        
                        <div class="col-12 col-md-6 p-3 text-center text-lg-left">
                            <p style="letter-spacing: 2px;">&copy; <?php echo date('Y');?> <a href="<?php echo $properties['baseurl']?>" target="_blank">INNOVARE</a> | All rights reserved</p>
                        </div>
                    </div>
                </div>
            </section>

        </footer>

        

        <!-- Scroll [to top] -->
        <div id="scroll-to-top" class="scroll-to-top">
            <a href="#header" class="smooth-anchor">
                <i class="fas fa-arrow-up"></i>
            </a>
        </div>        
    
    <?php include 'includes/frontend_main/header_partials/js_scripts.php'?>


    </body>

</html>