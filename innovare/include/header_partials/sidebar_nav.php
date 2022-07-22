<div class="main-menu menu-fixed menu-dark menu-accordion menu-bordered menu-shadow">
  <!-- main menu header-->
  <!-- / main menu header-->
  <!-- main menu content-->
  <div class="main-menu-content">
    <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

      <li class=" nav-item">
        <a href="<?php echo $properties['baseurl']?>">
          <i class="fa fa-home"></i>
          <span class="menu-title" data-i18n="nav.dash.main">Dashboard</span>
        <!-- <span class="badge badge badge-primary badge-pill float-right mr-2"></span> -->
        </a>
      </li>

      <li class=" navigation-header">
        <span data-i18n="">Admin Settings</span>
        <i class="ft-more-horizontal ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="Layouts"></i>
      </li>

      <li class=" nav-item">
        <a href="#">
          <i class="fa fa-book"></i>
          <span class="menu-title" data-i18n="nav.templates.main">Courses</span>
        </a>
        <ul class="menu-content">
          <li>
            <a class="menu-item" href="<?php echo $properties['baseurl']?>add-course" data-i18n="nav.templates.horz.main">Add Course</a>
          </li>
          <li>
            <a class="menu-item" href="<?php echo $properties['baseurl']?>view-courses" data-i18n="nav.templates.vert.main">View  Courses</a> 
          </li>
          <li>
            <a class="menu-item" href="<?php echo $properties['baseurl']?>course-categories" data-i18n="nav.templates.horz.main">Categories</a>
          </li>
          <li>
            <a class="menu-item" href="<?php echo $properties['baseurl']?>view-archived-courses" data-i18n="nav.templates.horz.main">Archived Courses</a>
          </li>
          <li>
            <a class="menu-item" href="<?php echo $properties['baseurl']?>course-calender" data-i18n="nav.templates.horz.main">Course Calender</a>
            <!-- <ul class="menu-content">
              <li>
                <a class="menu-item" href="layout-content-left-sidebar.html" data-i18n="nav.page_layouts.3_columns.left_sidebar">View Calender </a>
              </li>

              <li>
                <a class="menu-item" href="layout-content-left-sidebar.html" data-i18n="nav.page_layouts.3_columns.left_sidebar">Upload Calender</a>
              </li>
            </ul> -->
          </li>
        </ul>
      </li>

      <li class=" nav-item">
        <a href="#">
          <!-- <i class="fa fa-time"></i> -->
          <i class="fas fa-calendar-alt"></i>
          <span class="menu-title" data-i18n="nav.templates.main">Conferences</span>
        </a>
        <ul class="menu-content">
          <li>
            <a class="menu-item" href="<?php echo $properties['baseurl']?>view-events" data-i18n="nav.templates.vert.main">View Conferences</a> 
          </li>
          <li>
            <a class="menu-item" href="<?php echo $properties['baseurl']?>add-event" data-i18n="nav.templates.horz.main">Add Conferences</a>
          </li>
          <li>
            <a class="menu-item" href="<?php echo $properties['baseurl']?>event-categories" data-i18n="nav.templates.horz.main">Categories</a>
          </li>
          <li>
            <a class="menu-item" href="<?php echo $properties['baseurl']?>view-archived-events" data-i18n="nav.templates.horz.main">Archived Conferences</a>
          </li>
        </ul>
      </li>

      <li class=" nav-item">
        <a href="#">
          <i class="fas fa-cogs"></i>
          <span class="menu-title" data-i18n="nav.templates.main">Services</span>
        </a>
        <ul class="menu-content">
          <li>
            <a class="menu-item" href="<?php echo $properties['baseurl']?>view-services" data-i18n="nav.templates.vert.main">View Services</a> 
          </li>
          <li>
            <a class="menu-item" href="<?php echo $properties['baseurl']?>add-services" data-i18n="nav.templates.horz.main">Add New Services</a>
          </li>
          <!-- <li>
            <a class="menu-item" href="#" data-i18n="nav.templates.horz.main">Categories</a>
          </li> -->
          <li>
            <a class="menu-item" href="<?php echo $properties['baseurl']?>view-archived-services" data-i18n="nav.templates.horz.main">Archived Services</a>
          </li>
        </ul>
      </li>

      <li class=" nav-item">
        <a href="#">
          <i class="fas fa-comments-dollar"></i>
          <span class="menu-title" data-i18n="nav.templates.main">Consuting Services</span>
        </a>
        <ul class="menu-content">
          <li>
            <a class="menu-item" href="<?php echo $properties['baseurl']?>view-consulting-services" data-i18n="nav.templates.vert.main">View Consuting Services</a> 
          </li>
          <li>
            <a class="menu-item" href="<?php echo $properties['baseurl']?>add-consulting-service" data-i18n="nav.templates.horz.main">Add Consuting Services</a>
          </li>
          <!-- <li>
            <a class="menu-item" href="#" data-i18n="nav.templates.horz.main">Categories</a>
          </li> -->
          <li>
            <a class="menu-item" href="<?php echo $properties['baseurl']?>view-archived-consulting-services" data-i18n="nav.templates.horz.main">Archived Consuting Services</a>
          </li>
        </ul>
      </li>

      <li class=" nav-item">
        <a href="#">
          <i class="fas fa-bookmark"></i>
          <span class="menu-title" data-i18n="nav.templates.main">Knowledge Transfer</span>
        </a>
        <ul class="menu-content">
           <li>
            <a class="menu-item" href="<?php echo $properties['baseurl']?>add-knowledge-transfer" data-i18n="nav.templates.horz.main">Add Knowledge Transfer</a>
          </li>
          <li>
            <a class="menu-item" href="<?php echo $properties['baseurl']?>view-knowledge-transfer" data-i18n="nav.templates.vert.main">View Knowledge Transfer</a> 
          </li>
         
          <!-- <li>
            <a class="menu-item" href="#" data-i18n="nav.templates.horz.main">Categories</a>
          </li> -->
          <li>
            <a class="menu-item" href="<?php echo $properties['baseurl']?>view-archived-knowledge-transfer" data-i18n="nav.templates.horz.main">Archived Knowledge Transfer</a>
          </li>
        </ul>
      </li>

      <li class=" nav-item">
        <a href="#">
          <i class="fas fa-chalkboard-teacher"></i>
          <span class="menu-title" data-i18n="nav.templates.main">Thought Leadership</span>
        </a>
        <ul class="menu-content">
          <li>
            <a class="menu-item" href="<?php echo $properties['baseurl']?>view-thought-leadership" data-i18n="nav.templates.vert.main">View Thought Leadership</a> 
          </li>
          <li>
            <a class="menu-item" href="<?php echo $properties['baseurl']?>add-thought-leadership" data-i18n="nav.templates.horz.main">Add Thought Leadership</a>
          </li>
          <!-- <li>
            <a class="menu-item" href="#" data-i18n="nav.templates.horz.main">Categories</a>
          </li> -->
          <li>
            <a class="menu-item" href="<?php echo $properties['baseurl']?>view-archived-thought-leadership" data-i18n="nav.templates.horz.main">Archived Thought Leadership</a>
          </li>
        </ul>
      </li>

      <li class=" nav-item">
        <a href="#">
          <!-- <i class="fa fa-book"></i> -->
          <i class="fas fa-users"></i>
          <!-- <i class="far fa-handshake"></i> -->
          <span class="menu-title" data-i18n="nav.templates.main">Team</span>
        </a>
        <ul class="menu-content">
          <li>
            <a class="menu-item" href="<?php echo $properties['baseurl']?>add-team-member" data-i18n="nav.page_layouts.3_columns.left_sidebar">Add Team Member </a>
          </li>
          <li>
            <a class="menu-item" href="<?php echo $properties['baseurl']?>view-management"> View Management</a> 
          </li>

          <li>
            <a class="menu-item" href="<?php echo $properties['baseurl']?>view-staff"> View Staff</a> 
            
          </li>
          <li>
            <a class="menu-item" href="<?php echo $properties['baseurl']?>view-instructor"> View Instructor</a> 
            
          </li>
        </ul>
      </li>

      <li class=" nav-item">
        <a href="#">
          <i class="fas fa-newspaper"></i>
          <span class="menu-title" data-i18n="nav.templates.main">News</span>
        </a>
        <ul class="menu-content">
          <li>
            <a class="menu-item" href="<?php echo $properties['baseurl']?>view-news" data-i18n="nav.templates.vert.main">View News</a> 
          </li>
          <li>
            <a class="menu-item" href="<?php echo $properties['baseurl']?>add-news" data-i18n="nav.templates.horz.main">Add New News</a>
          </li>
          <li>
            <a class="menu-item" href="<?php echo $properties['baseurl']?>news-categories" data-i18n="nav.templates.horz.main">Categories</a>
          </li>
          <li>
            <a class="menu-item" href="<?php echo $properties['baseurl']?>view-archived-news" data-i18n="nav.templates.horz.main">Archived News</a>
          </li>
        </ul>
      </li>

       <li class=" nav-item">
        <a href="#">
          <!-- <i class="fa fa-book"></i> -->
          <i class="far fa-building"></i>
          <span class="menu-title" data-i18n="nav.templates.main">Industries</span>
        </a>
        <ul class="menu-content">
          <li>
            <a class="menu-item" href="<?php echo $properties['baseurl']?>view-industries" data-i18n="nav.templates.vert.main">View Industries</a> 
          </li>
          <li>
            <a class="menu-item" href="<?php echo $properties['baseurl']?>add-industry" data-i18n="nav.templates.horz.main">Add New Industry</a>
          </li>
          <!-- <li>
            <a class="menu-item" href="#" data-i18n="nav.templates.horz.main">Categories</a>
          </li> -->
          <li>
            <a class="menu-item" href="<?php echo $properties['baseurl']?>view-archived-industries" data-i18n="nav.templates.horz.main">Archived Industries</a>
          </li>
        </ul>
      </li>

      <li class=" nav-item">
        <a href="#">
          <i class="fas fa-project-diagram"></i>
          <span class="menu-title" data-i18n="nav.templates.main">Case Studies</span>
        </a>
        <ul class="menu-content">
          <li>
            <a class="menu-item" href="<?php echo $properties['baseurl']?>view-case-studies" data-i18n="nav.templates.vert.main">View Case Studies</a> 
          </li>
          <li>
            <a class="menu-item" href="<?php echo $properties['baseurl']?>add-case-study" data-i18n="nav.templates.horz.main">Add Case Study</a>
          </li>
          <li>
            <a class="menu-item" href="<?php echo $properties['baseurl']?>case-study-categories" data-i18n="nav.templates.horz.main">Categories</a>
          </li>
          <li>
            <a class="menu-item" href="<?php echo $properties['baseurl']?>view-archived-case-studies" data-i18n="nav.templates.horz.main">Archived Case Studies</a>
          </li>
        </ul>
      </li>

      <li class=" nav-item">
        <a href="#">
          <!-- <i class="fa fa-book"></i> -->
          <i class="far fa-handshake"></i>
          <span class="menu-title" data-i18n="nav.templates.main">Partners</span>
        </a>
        <ul class="menu-content">
          <li>
            <a class="menu-item" href="<?php echo $properties['baseurl']?>view-partners" data-i18n="nav.templates.vert.main">View Partners</a> 
          </li>
          <li>
            <a class="menu-item" href="<?php echo $properties['baseurl']?>add-partners" data-i18n="nav.templates.horz.main">Add New Partners</a>
          </li>
        </ul>
      </li>
      <li class=" nav-item">
        <a href="<?php echo $properties['baseurl']?>special-pages">
          <i class="fas fa-copy"></i>
          <span class="menu-title" data-i18n="nav.templates.main">Special Pages</span>
        </a>
        <ul class="menu-content">
          <li>
            <a class="menu-item" href="<?php echo $properties['baseurl']?>view-pages" data-i18n="nav.templates.vert.main">View Pages</a> 
          </li>
          <li>
            <a class="menu-item" href="<?php echo $properties['baseurl']?>add-pages" data-i18n="nav.templates.horz.main">Add Page</a>
          </li>
          <!-- <li>
            <a class="menu-item" href="#" data-i18n="nav.templates.horz.main">Categories</a>
          </li> -->
          <li>
            <a class="menu-item" href="<?php echo $properties['baseurl']?>view-archived-pages" data-i18n="nav.templates.horz.main">Archived Pages</a>
          </li>
        </ul>
        
      </li>

      <!-- <li class=" nav-item">
        <a href="<?php echo $properties['baseurl']?>view-career-submission">
          <i class="fas fa-align-left"></i>
          <span class="menu-title" data-i18n="nav.templates.main"> Career Forms</span>
        </a>
       
      </li> -->

     

      <li class=" nav-item">
        <a href="<?php echo $properties['baseurl']?>newsletter-subscription">
          <i class="fas fa-paper-plane"></i>
          <span class="menu-title" data-i18n="nav.templates.main">Newsletter Subscription</span>
        </a>
        
      </li>
      

      <li class=" nav-item">
        <a href="<?php echo $properties['baseurl']?>media">
        <i class="fas fa-images"></i>
          <span class="menu-title" data-i18n="nav.templates.main">Media</span>
        </a>
        
      </li>



      <li class=" navigation-header">
        <span data-i18n="nav.category.layouts">Website Settings</span>
        <i class="ft-more-horizontal ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="Layouts"></i>
      </li>
      
      <!-- <li class=" nav-item">
        <a href="<?php echo $properties['baseurl']?>themes">
          <i class="fas fa-desktop"></i>
          <span class="menu-title" data-i18n="nav.templates.main">Themes</span>
        </a>
      </li> -->

      <li class=" nav-item">
        <a href="<?php echo $properties['baseurl']?>slider-management">
          <i class="far fa-window-maximize"></i>          
          <span class="menu-title" data-i18n="nav.templates.main">Slider Management</span>
        </a>
      </li>
      <li class=" nav-item">
        <a href="<?php echo $properties['baseurl']?>banner-management">
          <i class="fas fa-window-maximize"></i>
          <span class="menu-title" data-i18n="nav.templates.main">Banner Management</span>
        </a>
      </li>

      <li class=" nav-item">
        <a href="<?php echo $properties['baseurl']?>website-details">
          <i class="fas fa-info-circle"></i>
          <span class="menu-title" data-i18n="nav.templates.main">Website Details</span>
        </a>
      </li>

      <li class=" nav-item">
        <a href="<?php echo $properties['baseurl']?>contact-information">
          <i class="fas fa-address-book"></i>
          <span class="menu-title" data-i18n="nav.templates.main">Contact Information</span>
        </a>
      </li>

      <!-- <li class=" navigation-header">
        <span data-i18n="">Account Management</span>
        <i class="ft-more-horizontal ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="usermanagement"></i>
      </li>

      <li class=" nav-item">
        <a href="#">
          <i class="fas fa-credit-card"></i>
          <span class="menu-title" data-i18n="nav.templates.main">Payments</span>
        </a>
        <ul class="menu-content">
          <li>
            <a class="menu-item" href="#">View Payments</a> 
          </li>

          <li>
            <a class="menu-item" href="#">Record Payment</a> 
          </li>
        </ul>
      </li>

      <li class=" nav-item">
        <a href="#">
          <i class="fas fa-file-invoice"></i>
          <span class="menu-title" data-i18n="nav.templates.main">Invoices</span>
        </a>
        <ul class="menu-content">
          <li>
            <a class="menu-item" href="#">View Invoices</a> 
          </li>

          <li>
            <a class="menu-item" href="#">Add New Invoice</a> 
          </li>
        </ul>
      </li>
 -->
      

  <!-- USER MANAGEMENT  -->
      <li class=" navigation-header">
        <span data-i18n="">Account Management</span>
        <i class="ft-more-horizontal ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="usermanagement"></i>
      </li>

     <!--  <li class=" nav-item">
        <a href="#">
          <i class="fas fa-users-cog"></i>
          <span class="menu-title" data-i18n="nav.templates.main">Users Accounts</span>
        </a>
        <ul class="menu-content">
          <li>
            <a class="menu-item" href="#">View Users</a> 
          </li>

          <li>
            <a class="menu-item" href="#">Add New Users</a> 
          </li>
        </ul>
      </li> -->

     <!--  <li class=" nav-item">
        <a href="#">
          <i class="fas fa-users-cog"></i>
          <span class="menu-title" data-i18n="nav.templates.main">Company Accounts</span>
        </a>
        <ul class="menu-content">
          <li>
            <a class="menu-item" href="#">View Company</a> 
          </li>

          <li>
            <a class="menu-item" href="#">Add New Users</a> 
          </li>
        </ul>
      </li> -->

      <li class=" nav-item">
        <a href="#">
          <i class="fas fa-users"></i>
          <span class="menu-title" data-i18n="nav.templates.main">Admin accounts</span>
        </a>
        <ul class="menu-content">
          <li>
            <a class="menu-item" href="<?php echo $properties['baseurl']?>view-admin">View Admin</a> 
          </li>

          <li>
            <a class="menu-item" href="<?php echo $properties['baseurl']?>add-admin">Add New Admin</a> 
          </li>
        </ul>
      </li>

    </ul>
  </div>
  <!-- /main menu content-->
</div>