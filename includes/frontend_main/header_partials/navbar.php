
        <!-- Header -->
        <header id="header">

            <!-- Top Navbar -->
            <nav class="navbar navbar-expand top" style="background-color: #131313">
                <div class="container header">

                    <!-- Navbar Items [left] -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="#" class="nav-link pl-0"><i class="fas fa-clock mr-2"></i>Open Hours: Mon – Fri: 8:00AM – 5:00PM </a>
                        </li>
                    </ul>

                    <!-- Nav holder -->
                    <div class="ml-auto"></div>

                    <!-- Navbar Items [right] -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                                
                            <a href="tel:<?php echo $contact_details[0]->phone; ?>" class="nav-link"><i class="fas fa-phone-alt mr-2"></i><?php echo $contact_details[0]->phone; ?></a>
                        </li>
                        <li class="nav-item">

                            <a href="mailto:<?php echo $contact_details[0]->email; ?>" class="nav-link"><i class="fas fa-envelope mr-2"></i><?php echo $contact_details[0]->email; ?></a> 

                        </li>
                    </ul>

                    <!-- Navbar Icons -->
                    <ul class="navbar-nav icons">
                        <li class="nav-item social">
                            <a href="https://facebook.com/innovareafrica" target="_blank" class="nav-link"><i class="fab fa-facebook-f"></i></a>
                        </li>
                        <li class="nav-item social">
                            <a href="https://twitter.com/innovareafrica" target="_blank"  class="nav-link"><i class="fab fa-twitter"></i></a>
                        </li>
                        <li class="nav-item social">
                            <a href="https://www.instagram.com/innovareafrica/" target="_blank"  class="nav-link"><i class="fab fa-instagram"></i></a>
                        </li>
                        <li class="nav-item social">
                            <a href="https://www.linkedin.com/company/innovare-learning-center/" class="nav-link "><i class="fab fa-linkedin-in"></i></a>
                        </li>
                        <li class="nav-item social">
                            <a href="https://www.youtube.com/channel/UCqiR6UxK59WIwIsPWKfJpjw" class="nav-link pr-0"><i class="fab fa-youtube"></i></a>
                        </li>
                    </ul>

                </div>
            </nav>

            <!-- Navbar -->
            <nav class="navbar navbar-expand navbar-fixed sub">
                <div class="container header">

                    <!-- Navbar Brand-->
                    <a class="navbar-brand" href="<?php echo $properties['baseurl']; ?>">
                        <span class="brand">
                            <img src="<?php echo $website_details[0]->logo_url?>" alt="innovare Learning" style="width: 130px; height: auto;" >
                        </span> 
                    </a>

                    <!-- Nav holder -->
                    <div class="ml-auto"></div>

                    <!-- Navbar Items -->
                    <ul class="navbar-nav items">

                        <li class="nav-item dropdown">
                            <a href="<?= $properties['baseurl']?>home" class="nav-link">Home </a>
                        </li>

                        <li class="nav-item dropdown">
                            <a href="<?php echo $properties['baseurl']?>about" class="nav-link">About us<i class="icon-arrow-down"></i></a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a href="<?php echo $properties['baseurl']?>about#intro" class="nav-link">Introduction</a></li>
                                <li class="nav-item"><a href="<?php echo $properties['baseurl']?>about#facts" class="nav-link">Facts About Us</a></li>
                                <li class="nav-item"><a href="<?php echo $properties['baseurl']?>about#services" class="nav-link">Services</a></li>
                                <li class="nav-item"><a href="<?php echo $properties['baseurl']?>about#board" class="nav-link">Board Members</a></li>
                                <li class="nav-item"><a href="<?php echo $properties['baseurl']?>about#management" class="nav-link">Management Team</a></li>
                                <li class="nav-item"><a href="<?php echo $properties['baseurl']?>awards_recognition" class="nav-link">Awards & Recognition</a></li>

                                <!-- <li class="nav-item"><a href="#services" class="nav-link">What We Do</a></li> -->
                            </ul>
                           
                        </li>

                        <li class="nav-item dropdown">
                            <a href="<?php echo $properties['baseurl']?>#" class="nav-link"> Services<i class="icon-arrow-down"></i></a>
                            <ul class="dropdown-menu"> 
                                <li class="nav-item"><a href="<?php echo $properties['baseurl']?>consulting-services" class="nav-link">Consulting</a></li>
                                <li class="nav-item"><a href="<?php echo $properties['baseurl']?>cisoaas" class="nav-link">CISOaaS</a></li>
                                <li class="nav-item"> <a href="<?php echo $properties['baseurl']?>professional-training" class="nav-link">Professional Training</a></li>
                                <li class="nav-item"> <a href="<?php echo $properties['baseurl']?>banking-as-a-service" class="nav-link">Financial Services solution</a></li>
                                <li class="nav-item"><a href="<?php echo $properties['baseurl']?>cyber_assure" class="nav-link">Cyber Assure </a></li>
                                <li class="nav-item"><a href="<?php echo $properties['baseurl']?>itaudit" class="nav-link"> IT Audit  </a></li>
                                <li class="nav-item"><a href="<?php echo $properties['baseurl']?>#" class="nav-link"> Data Analytics  </a></li>


                                <!-- <li class="nav-item"><a href="#services" class="nav-link">What We Do</a></li> -->
                            </ul>
                           
                        </li>
                        <!-- <li class="nav-item dropdown">
                            <a href="<?php echo $properties['baseurl']?>services" class="nav-link">W<i class="icon-arrow-down"></i></a>
                            <ul class="dropdown-menu">
                                <li class="nav-item dropdown">
                                    <a href="<?php echo $properties['baseurl']?>consulting-services" class="nav-link">Consulting Services<i class="icon-arrow-right"></i></a>
                                        <ul class="dropdown-menu">
                                            <?php 
                                                if ( !empty( $innovare->getActiveConsultingServices() ) ) {
                                                    foreach ( $innovare->getActiveConsultingServices() as $consult_info ) {
                                                     
                                            ?>

                                                <li class="nav-item"><a href="<?= $properties['baseurl']?>consulting-services/<?= $consult_info->slug ?>" class="nav-link"><?= $consult_info->title ?></a></li>

                                            <?php
                                                }
                                            } 
                                            ?>
                                        </ul> 
                                </li>

                                <li class="nav-item dropdown">
                                    <a href="<?php echo $properties['baseurl']?>knowledge-transfer" class="nav-link"> Knowlwdge Transfer<i class="icon-arrow-right"></i></a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item dropdown">
                                            <a href="<?php echo $properties['baseurl']?>thought-leadership" class="nav-link">Thought Leadership<i class="icon-arrow-right"></i></a>
                                            <ul class="dropdown-menu">
                                                <li class="nav-item"><a href="<?php echo $properties['baseurl']?>event-management" class="nav-link">Conferences</a></li>
                                                <?php 
                                                    if ( !empty( $innovare->getActiveThoughtLeaderships() ) ) {
                                                        foreach ( $innovare->getActiveThoughtLeaderships() as $leader_info ) {
                                                         
                                                ?>

                                                    <li class="nav-item"><a href="<?= $properties['baseurl']?>thought-leadership/<?= $leader_info->slug ?>" class="nav-link"><?= $leader_info->title ?></a></li>

                                                <?php
                                                    }
                                                } 
                                                ?>
                                            </ul> 
                                        </li>

                                        <?php 
                                            if ( !empty( $innovare->getActiveKnowledgeTransfer() ) ) {
                                                foreach ( $innovare->getActiveKnowledgeTransfer() as $know_info ) {
                                             
                                        ?>

                                            <li class="nav-item"><a href="<?= $properties['baseurl']?>knowledge-transfer/<?= $know_info->slug ?>" class="nav-link"><?= $know_info->title ?></a></li>

                                        <?php
                                            }
                                        } 
                                        ?>

                                    </ul> 
                                </li>

                                <li class="nav-item dropdown">
                                    <a href="<?php echo $properties['baseurl']?>services-offered" class="nav-link">Services<i class="icon-arrow-right"></i></a>
                                        <ul class="dropdown-menu">
                                            <?php 
                                                if ( !empty( $innovare->getActiveServices() ) ) {
                                                    foreach ( $innovare->getActiveServices() as $services_off_info ) {
                                                     
                                            ?>

                                                <li class="nav-item"><a href="<?= $properties['baseurl']?>services-offered/<?= $services_off_info->slug ?>" class="nav-link"><?= $services_off_info->title ?></a></li>

                                            <?php
                                                }
                                            } 
                                            ?>
                                        </ul> 
                                </li>

                            </ul>
                        </li>
 -->
                        <!-- <li class="nav-item dropdown">
                            <a href="<?php echo $properties['baseurl']?>consulting-services" class="nav-link">Consulting</a>
                        </li> -->

                        <!-- <li class="nav-item dropdown">
                            <a href="<?php echo $properties['baseurl']?>cisoaas" class="nav-link">CISOaaS</a>
                        </li> -->

                        <li class="nav-item dropdown">
                            <!-- <a href="<?php echo $properties['baseurl']?>professional-training" class="nav-link">Professional Training</a> -->
                        </li>

                        <!-- <li class="nav-item dropdown">
                            <a href="<?php echo $properties['baseurl']?>banking-as-a-service" class="nav-link">Banking as a Service</a>
                        </li> -->

                       <!--  <li class="nav-item dropdown">
                            <a href="<?php echo $properties['baseurl']?>industries" class="nav-link">Industries</a>
                        </li> -->

                        <!-- <li class="nav-item dropdown">
                            <a href="<?php echo $properties['baseurl']?>thought-leadership" class="nav-link">Thought Leadership</a>
                        </li> -->

                        <!-- <li class="nav-item dropdown">
                            <a href="<?php echo $properties['baseurl']?>case-study" class="nav-link">Case Study</a>
                        </li> -->
                        <li class="nav-item dropdown">
                            <a href="<?php echo $properties['baseurl']?>about" class="nav-link"> Media<i class="icon-arrow-down"></i></a>
                            <ul class="dropdown-menu"> 
                                <li class="nav-item"><a href="<?php echo $properties['baseurl']?>singlepost" class="nav-link">Upcoming Event</a></li>
                            </ul>
                           
                        </li>
                        <li class="nav-item dropdown">
                            <a href="<?php echo $properties['baseurl']?>career" class="nav-link">Career</a>
                        </li> 
                        <!-- <li class="nav-item dropdown">
                            <a href="javascript:void(0)" class="nav-link">Special Pages <i class="icon-arrow-down"></i></a>
                            <ul class="dropdown-menu">
                                <?php 
                                    if ( !empty( $innovare->getActivePages() ) ) {
                                        foreach ( $innovare->getActivePages() as $page_info ) {
                                         
                                ?>

                                    <li class="nav-item"><a href="<?= $properties['baseurl']?>page/<?= $page_info->slug ?>" class="nav-link"><?= $page_info->title ?></a></li>

                                <?php
                                    }
                                } 
                                ?>
                            </ul> 
                        </li> -->

                        <!-- <li class="nav-item dropdown">
                            <a href="<?php echo $properties['baseurl']?>news" class="nav-link">News</a>
                        </li> -->
                        
                        <!-- <li class="nav-item dropdown">
                            <a href="<?php echo $properties['baseurl']?>events" class="nav-link">Events</a>
                        </li> -->
                        
                        
                        <li class="nav-item dropdown">
                            <a href="<?= $properties['baseurl']?>contact-us" class="nav-link btn outline-button" style="color: #fff; padding: 10px 20px;">Contact Us</a>
                        </li>
                        
                    </ul>

                    <!-- Navbar Icons -->
                    <ul class="navbar-nav icons">
                        <!-- <li class="nav-item">
                            <a href="#" class="nav-link" data-toggle="modal" data-target="#search">
                                <i class="icon-magnifier"></i>
                            </a>
                        </li> -->
                        <!-- <li class="nav-item">
                            <a href="#" class="nav-link" data-toggle="modal" data-target="#sign">
                                <i class="icon-user"></i>
                            </a>
                        </li> -->
                    </ul>

                    <!-- Navbar Toggle -->
                    <ul class="navbar-nav toggle">
                        <li class="nav-item">
                            <a href="#" class="nav-link" data-toggle="modal" data-target="#menu">
                                <i class="icon-menu m-0"></i>
                            </a>
                        </li>
                    </ul>

                </div>
            </nav>

        </header>