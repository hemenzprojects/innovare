<title><?php echo $properties['title']; ?> || Add Admin Account</title>
 <div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
           
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="hidden-label-basic-form">Add New Admin Account</h4>
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

                            <form class="form" id="add_admin_form" action="" method="POST">
                                <div class="form-body">
                                    <h4 class="form-section"><i class="ft-user"></i> Personal Info</h4>
                                    <div class="row">
                                        <div class="form-group col-md-6 mb-2">
                                            <label class="sr-only" for="projectinput1">First Name</label>
                                            <input type="text" id="fname" class="form-control" placeholder="First Name" name="fname" required="">
                                        </div>
                                        <div class="form-group col-md-6 mb-2">
                                            <label class="sr-only" for="projectinput2">Last Name</label>
                                            <input type="text" id="lname" class="form-control" placeholder="Last Name" name="lname" required="">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6 mb-2">
                                            <label class="sr-only" for="projectinput3">E-mail</label>
                                            <input type="text" id="email" class="form-control" placeholder="E-mail" name="email" required="">
                                        </div>
                                        <div class="form-group col-md-6 mb-2">
                                            <label class="sr-only" for="projectinput4">Contact Number</label>
                                            <input type="text" id="phone" class="form-control" placeholder="Phone" name="phone" required="">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6 mb-2">
                                            <label class="sr-only" for="projectinput6">Admin Role</label>
                                            <select id="role" name="role" class="form-control" required="">
                                                <option value="none" selected="" disabled="">Role...</option>
                                                <option value="admin">Admin</option>
                                                <option value="accounts">Accounts</option>
                                                <option value="manager">Manager</option>
                                            </select>
                                        </div>
                                    </div>

                                    <h4 class="form-section"><i class="ft-lock"></i>Password</h4>
                                    <div class="row">
                                        <div class="form-group col-md-6 mb-2">
                                            <label class="sr-only" for="Password">Password</label>
                                            <input type="Password" id="password" class="form-control" placeholder="Password" name="password" required="">
                                        </div>
                                        <div class="form-group col-md-6 mb-2">
                                            <label class="sr-only" for="confirm_pass">Confirm Password</label>
                                            <input type="Password" id="confirm_pass" class="form-control" placeholder="Confirm Password" name="confirm_pass" required="">
                                        </div>
                                    </div>                                   
                                    <!-- <div class="row">
                                        <div class="form-group col-12 mb-2">
                                            <label class="sr-only" for="projectinput9">About Project</label>
                                            <textarea id="projectinput9" rows="5" class="form-control" name="comment" placeholder="About Project"></textarea>
                                        </div>
                                    </div> -->
                                </div>

                                <div class="form-actions ">
                                    <button type="submit" id="add_admin" name="add_admin" class="btn btn-success btn-block btn-lg" style="padding-right: 60px;padding-left: 60px; "><i class="fas fa-check"></i> Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            
        </div>


        </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

   