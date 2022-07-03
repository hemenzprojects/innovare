<ul class="navbar-nav">
                        <li class="nav-item">
                            <a> 
                                <i class="fas fa-phone-alt mr-2"></i>
                                <a href="tel:<?php echo $contact_details[0]->phone; ?>" class="nav-link"><?php echo $contact_details[0]->phone; ?></a> ||
                                <a href="tel:<?php echo $contact_details[0]->opt_phone; ?>" class="nav-link"><?php echo $contact_details[0]->opt_phone; ?></a>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a>
                                <a href="mailto:<?php echo $contact_details[0]->email; ?>" class="nav-link"><i class="fas fa-envelope mr-2"></i><?php echo $contact_details[0]->email; ?></a> 
                                || 

                                <a href="mailto:<?php echo $contact_details[0]->opt_email; ?>" class="nav-link"><i class="fas fa-envelope mr-2"></i><?php echo $contact_details[0]->opt_email; ?></a>
                            </a>
                        </li>
                    </ul>