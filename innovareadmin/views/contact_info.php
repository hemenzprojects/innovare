<title><?php echo $properties['title']; ?> || Contact Information</title>
 <div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
        <!-- CONTACT INFO -->
        
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="hidden-label-basic-form">Contact Information</h4>
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

                            <form class="form" id="add_contact_form" action="" method="POST" enctype="multipart/form-data">
                                <div class="form-body">
                                    <input type="hidden" id="admin_id" class="form-control" name="admin_id" value="<?php echo $admin_id?>">


                                    <h4 class="form-section"><i class="fas fa-desktop"></i> Contact Info</h4>

                                    <div class="row">

                                        

                                        <div class="form-group col-md-12 mb-2">
                                            <label class="" for="">Email Address(s)</label>
                                        </div>
                                        <div class="form-group col-md-6 mb-2">
                                            <label class="sr-only" for="">Email (main)</label>
                                            <input type="email" id="email" class="form-control" placeholder="Email (Main)" name="email" required="" <?php if ( !empty($contact_info[0]->email) ): ?> value="<?php echo $contact_info[0]->email?>" <?php endif ?> >
                                        </div>
                                        <div class="form-group col-md-6 mb-2">
                                            <label class="sr-only" for="">Email (alternate)</label>
                                            <input type="email" id="opt_email" class="form-control" placeholder="Email (Alternate)" name="opt_email"  <?php if ( !empty($contact_info[0]->opt_email) ): ?> value="<?php echo $contact_info[0]->opt_email?>" <?php endif ?>  >
                                        </div>

                                        <div class="form-group col-md-12 mb-2">
                                            <label class="" for="">Phone Number(s)</label>
                                        </div>
                                        <div class="form-group col-md-6 mb-2">
                                            <label class="sr-only" for="">Phone (main)</label>
                                            <input type="tel" id="phone" class="form-control" placeholder="Phone (Main)" name="phone" required=""  <?php if ( !empty($contact_info[0]->phone) ): ?> value="<?php echo $contact_info[0]->phone?>" <?php endif ?> >
                                        </div>
                                        <div class="form-group col-md-6 mb-2">
                                            <label class="sr-only" for="">Phone (alternate)</label>
                                            <input type="tel" id="opt_phone" class="form-control" placeholder="Phone (Alternate)" name="opt_phone"  <?php if ( !empty($contact_info[0]->opt_phone) ): ?> value="<?php echo $contact_info[0]->opt_phone?>" <?php endif ?> >
                                        </div>

                                        
                                        <div class="form-group col-md-12 mb-2">
                                            <label class="sr-only" for="">P. O. Box Address</label>
                                            <input type="text" id="po_box" class="form-control" placeholder="P. O. Box Address" name="po_box" required=""  <?php if ( !empty($contact_info[0]->p_o_box) ): ?> value="<?php echo $contact_info[0]->p_o_box?>" <?php endif ?> >
                                        </div>

                                    </div> 

                                    <h4 class="form-section"><i class="fas fa-map-marked-alt"></i> Location Info</h4>

                                    <div class="row">
                                        <div class="form-group col-md-12 mb-2">
                                            <label class="sr-only" for="">Location</label>
                                            <input type="text" id="location" class="form-control" placeholder="Location" name="location" required=""  <?php if ( !empty($contact_info[0]->location) ): ?> value="<?php echo $contact_info[0]->location?>" <?php endif ?>>
                                        </div>

                                        <div class="form-group col-md-12 mb-2">
                                            <label class="sr-only" for="">Google Location(link)</label>
                                            <input type="text" id="google_location" class="form-control" placeholder="Google Location(link)" name="google_location"  <?php if ( !empty($contact_info[0]->google_location) ): ?> value="<?php echo $contact_info[0]->google_location?>" <?php endif ?> >
                                        </div>

                                    </div>
 
                                </div>
                                <div class="form-actions ">
                                    <button type="submit" id="add_contact" name="add_contact" class="btn btn-success btn-block btn-lg" style="padding-right: 60px;padding-left: 60px; ">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- CONTACT INFO -->

        

        </div>
      </div>
    </div>


    
    <!-- ////////////////////////////////////////////////////////////////////////////-->

   