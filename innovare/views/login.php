<title><?php echo $properties['title']; ?> || Admin Login Panel</title>
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="app-content content">
      <div class="content-wrapper" style="padding-top:120px;padding-bottom:120px;">
        <div class="content-header row">
        </div>
        <div class="content-body">
			<section class="flexbox-container">
			    <div class="col-12 d-flex align-items-center justify-content-center">
			        <div class="col-md-4 col-10 box-shadow-2 p-0">
			            <div class="card border-grey border-lighten-3 m-0">
			                <div class="card-header border-0">
			                    <div class="card-title text-center">
			                        <img src="<?php echo $properties['staticurl']?>app-assets/images/logo/logo.png" alt="Innovare" style="width: 50%;">
			                    </div>
			                </div>
			                <div class="card-content">
			                    <p class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2 my-2"><span>ADMIN LOGIN</span></p>
			                    <div class="card-body pt-0">
			                        <form class="form-horizontal" action="" id="loginForm" method="POST">
			                            <fieldset class="form-group position-relative has-icon-left">
			                                <input type="email" class="form-control input-lg" id="email" placeholder="Email" required="">
			                                <div class="form-control-position">
			                                    <i class="fa fa-user"></i>
			                                </div>
			                            </fieldset>
			                            <fieldset class="form-group position-relative has-icon-left">
			                                <input type="password" class="form-control input-lg" id="password" placeholder="Password" required>
			                                <div class="form-control-position">
			                                    <i class="fa fa-key"></i>
			                                </div>
			                            </fieldset>
			                            <button type="submit" id="login" class="btn btn-info btn-lg btn-block"><i class="ft-unlock"></i> Login</button>
			                        </form>
			                    </div>
			                    <br>
			                    <br>
			                    <!-- <div class="card-body pb-0">
			                        <p class="text-center"><a href="recover-password.html" class="card-link">Recover password</a></p>
			                        <p class="text-center">New to Robust Admin? <a href="register-with-navbar.html" class="card-link">Create Account</a></p>
			                    </div> -->
			                </div>
			            </div>
			        </div>
			    </div>
			</section>
        </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

