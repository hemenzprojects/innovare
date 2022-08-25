<head>
        <!-- ==============================================
        Basic Page Needs
        =============================================== -->
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--[if IE]><meta http-equiv="x-ua-compatible" content="IE=9" /><![endif]-->

        <!-- <title><?php// echo $propertise['title']; ?></title> -->

        <meta name="description" content="Business, Consulting, Finance, Insurance, Startup and Technology, Traning, Courses">
        <meta name="subject" content="Business, Consulting, Finance, Insurance, Startup and Technology, Traning, Courses">
        <meta name="author" content="Innovare">
        

        <!-- ==============================================
        Favicons
        =============================================== -->
        <link rel="shortcut icon" href="<?php echo $website_details[0]->favicon_url?>">
        <link rel="apple-touch-icon" href="<?php echo $website_details[0]->favicon_url?>">
        <link rel="apple-touch-icon" sizes="72x72" href="<?php echo $website_details[0]->favicon_url?>">
        <link rel="apple-touch-icon" sizes="114x114" href="<?php echo $website_details[0]->favicon_url?>">

        <!-- ==============================================
        Vendor Stylesheet
        =============================================== -->
        <link rel="stylesheet" href="<?php echo $properties['staticurl']?>assets/css/vendor/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo $properties['staticurl']?>assets/css/vendor/slider.min.css">
        <link rel="stylesheet" href="<?php echo $properties['staticurl']?>assets/css/main.css">
        <link rel="stylesheet" href="<?php echo $properties['staticurl']?>assets/css/vendor/icons.min.css">
        <link rel="stylesheet" href="<?php echo $properties['staticurl']?>assets/css/vendor/icons-fa.min.css">
        <link rel="stylesheet" href="<?php echo $properties['staticurl']?>assets/css/vendor/animation.min.css">
        <link rel="stylesheet" href="<?php echo $properties['staticurl']?>assets/css/vendor/gallery.min.css">
        <link rel="stylesheet" href="<?php echo $properties['staticurl']?>assets/css/vendor/cookie-notice.min.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.13.0/dist/sweetalert2.all.min.js"></script>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.13.0/dist/sweetalert2.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.green.min.css" integrity="sha512-C8Movfk6DU/H5PzarG0+Dv9MA9IZzvmQpO/3cIlGIflmtY3vIud07myMu4M/NTPJl8jmZtt/4mC9bAioMZBBdA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog==" crossorigin="anonymous" referrerpolicy="no-referrer" />


        <!-- ==============================================
        Custom Stylesheet
        =============================================== -->
        <link rel="stylesheet" href="<?php echo $properties['staticurl']?>assets/css/default.css">

        <!-- ==============================================
        Theme Color
        =============================================== -->
        <meta name="theme-color" content="#21333e">

        <!-- ==============================================
        Theme Settings
        =============================================== -->
        <style>
            :root {
                --hero-bg-color: #080d10;
                
                --section-1-bg-color: #ffffff;
                --section-2-bg-color: #111117;
                --section-3-bg-color: #111117;
                --section-4-bg-color: #ffffff;
                --section-5-bg-color: #eef4ed;
                --section-6-bg-color: #111117;
                --section-7-bg-color: #ffffff;
                --p-size:15px;

                /*--footer-bg-color: #080d10; --footer-bg-image: url('<?php echo $properties['staticurl']?>assets/images/bg-7.jpg');*/
            }
            p{
                line-height: 1.9rem;
            }
            .card {
                padding: 35px;
            }
            .badge-danger {
                color: #fff;
                background-color: #dc3545;
            }
            @media (min-width: 992px){
                .d-lg-flex {
                    /*display: -ms-flexbox!important;*/
                     display: block; 
                }
            }
            a{
                /*color: #fff !important;*/
            }
            .board-member-name h4:hover{
                color:  #E93F33!important;
            }
            .list-group-item h6:hover{
                color:  #E93F33!important;


            }
            .register:hover{
                color: #fff !important;
            }
            .modal-header.absolute .icon-close{
                background-color: rgb(226 61 49 / 65%) !important;
            }
            .badge-danger{
                background-color: #E93F33 !important;
            }
            .list-color{
                color: #E93F33;
                /*font-size: 25px;*/
            }
            .select2-container--default .select2-selection--multiple{
                width: 100%;
                /*height: 50px;*/
                background: no-repeat;
                box-shadow: none;
                padding: 1rem;
                background-color: rgba(0, 0, 0, 0.075);
                border: none;
                border-radius: 4px;
                line-height: 1.2;
                color: var(--primary-t-color);
            }
            .select2-container--classic .select2-selection--multiple .select2-selection__choice, .select2-container--default .select2-selection--multiple .select2-selection__choice{
            background-color: #E93F33 !important;
            border-color: #E93F33 !important;
            color: #fff;
        }
        
        .select2-container--classic .select2-results__options .select2-results__option[aria-selected=true], .select2-container--default .select2-results__options .select2-results__option[aria-selected=true]{
            background-color: #E93F33 !important;

        }
        .select2-container--default .select2-search--inline .select2-search__field{
            font-family: inherit;
        }
        </style>
</head>