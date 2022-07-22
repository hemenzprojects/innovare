
<!--  ADMIN -->

    <?php if (isset($_GET['archived']) && $_GET['archived'] == 'yes'): ?>
    	<script type="text/javascript">
    		 $(document).ready(function() {
            	toastr.success("Admin Successful Archived!", "Success", {
                closeButton: !0,
                timeOut: 10000
            });
        });
    	</script>

    <?php elseif (isset($_GET['archived']) && $_GET['archived'] == 'no'): ?>
    	<script type="text/javascript">
    		 $(document).ready(function() {
            	toastr.error("Admin Not Archived!", "Error", {
                closeButton: !0,
                timeOut: 10000
            });
        });
    	</script>

    <?php elseif (isset($_GET['active']) && $_GET['active'] == 'yes'): ?>
    	<script type="text/javascript">
    		 $(document).ready(function() {
            	toastr.success("Admin Successful Activated!", "Success", {
                closeButton: !0,
                timeOut: 10000
            });
        });
    	</script>

    <?php elseif (isset($_GET['active']) && $_GET['active'] == 'no'): ?>
    	<script type="text/javascript">
    		 $(document).ready(function() {
            	toastr.error("Admin Not Activated!", "Error", {
                closeButton: !0,
                timeOut: 10000
            });
        });
    	</script>

    <?php elseif (isset($_GET['delete']) && $_GET['delete'] == 'yes'): ?>
    	<script type="text/javascript">
    		 $(document).ready(function() {
            	toastr.success("Admin  Deleted!", "Success", {
                closeButton: !0,
                timeOut: 10000
            });
        });
    	</script>

    <?php elseif (isset($_GET['detele']) && $_GET['delete'] == 'no'): ?>
    	<script type="text/javascript">
    		 $(document).ready(function() {
            	toastr.error("Admin Not Deleted!", "Error", {
                    closeButton: !0,
                    timeOut: 10000
                });
        });
    	</script>

<!-- // ADMIN  //-->


<!-- COURSES -->


    <?php elseif (isset($_GET['course_archived']) && $_GET['course_archived'] == 'yes'): ?>
        <script type="text/javascript">
             $(document).ready(function() {
                toastr.success("Course Successful Archived!", "Success", {
                closeButton: !0,
                timeOut: 10000
            });
        });
        </script>

    <?php elseif (isset($_GET['course_archived']) && $_GET['course_archived'] == 'no'): ?>
        <script type="text/javascript">
             $(document).ready(function() {
                toastr.error("Course Not Archived!", "Error", {
                closeButton: !0,
                timeOut: 10000
            });
        });
        </script>

    <?php elseif (isset($_GET['course_active']) && $_GET['course_active'] == 'yes'): ?>
        <script type="text/javascript">
             $(document).ready(function() {
                toastr.success("Course Successful Activated!", "Success", {
                closeButton: !0,
                timeOut: 10000
            });
        });
        </script>

    <?php elseif (isset($_GET['course_active']) && $_GET['course_active'] == 'no'): ?>
        <script type="text/javascript">
             $(document).ready(function() {
                toastr.error("Course Not Activated!", "Error", {
                closeButton: !0,
                timeOut: 10000
            });
        });
        </script>

    <?php elseif (isset($_GET['course_delete']) && $_GET['course_delete'] == 'yes'): ?>
        <script type="text/javascript">
             $(document).ready(function() {
                toastr.success("Course  Deleted!", "Success", {
                closeButton: !0,
                timeOut: 10000
            });
        });
        </script>

    <?php elseif (isset($_GET['course_delete']) && $_GET['course_delete'] == 'no'): ?>
        <script type="text/javascript">
             $(document).ready(function() {
                toastr.error("Course Not Deleted!", "Error", {
                    closeButton: !0,
                    timeOut: 10000
                });
        });
        </script>
    <?php elseif (isset($_GET['course_cat_delete']) && $_GET['course_cat_delete'] == 'yes'): ?>
        <script type="text/javascript">
             $(document).ready(function() {
                toastr.success("Course  Deleted!", "Success", {
                closeButton: !0,
                timeOut: 10000
            });
        });
        </script>

    <?php elseif (isset($_GET['course_cat_delete']) && $_GET['course_cat_delete'] == 'no'): ?>
        <script type="text/javascript">
             $(document).ready(function() {
                toastr.error("Course Not Deleted!", "Error", {
                    closeButton: !0,
                    timeOut: 10000
                });
        });
        </script>

<!-- // COURSES  //-->


<!-- SERVICES -->


    <?php elseif (isset($_GET['service_archived']) && $_GET['service_archived'] == 'yes'): ?>
        <script type="text/javascript">
             $(document).ready(function() {
                toastr.success("Service Successful Archived!", "Success", {
                closeButton: !0,
                timeOut: 10000
            });
        });
        </script>

    <?php elseif (isset($_GET['service_archived']) && $_GET['service_archived'] == 'no'): ?>
        <script type="text/javascript">
             $(document).ready(function() {
                toastr.error("Service Not Archived!", "Error", {
                closeButton: !0,
                timeOut: 10000
            });
        });
        </script>

    <?php elseif (isset($_GET['service_active']) && $_GET['service_active'] == 'yes'): ?>
        <script type="text/javascript">
             $(document).ready(function() {
                toastr.success("Service Successful Activated!", "Success", {
                closeButton: !0,
                timeOut: 10000
            });
        });
        </script>

    <?php elseif (isset($_GET['service_active']) && $_GET['service_active'] == 'no'): ?>
        <script type="text/javascript">
             $(document).ready(function() {
                toastr.error("Service Not Activated!", "Error", {
                closeButton: !0,
                timeOut: 10000
            });
        });
        </script>

    <?php elseif (isset($_GET['service_delete']) && $_GET['service_delete'] == 'yes'): ?>
        <script type="text/javascript">
             $(document).ready(function() {
                toastr.success("Service  Deleted!", "Success", {
                closeButton: !0,
                timeOut: 10000
            });
        });
        </script>

    <?php elseif (isset($_GET['service_delete']) && $_GET['service_delete'] == 'no'): ?>
        <script type="text/javascript">
             $(document).ready(function() {
                toastr.error("Service Not Deleted!", "Error", {
                    closeButton: !0,
                    timeOut: 10000
                });
        });
        </script>

<!-- // SERVICES  //-->


<!-- PAGES -->


    <?php elseif (isset($_GET['page_archived']) && $_GET['page_archived'] == 'yes'): ?>
        <script type="text/javascript">
             $(document).ready(function() {
                toastr.success("Page Successful Archived!", "Success", {
                closeButton: !0,
                timeOut: 10000
            });
        });
        </script>

    <?php elseif (isset($_GET['page_archived']) && $_GET['page_archived'] == 'no'): ?>
        <script type="text/javascript">
             $(document).ready(function() {
                toastr.error("Page Not Archived!", "Error", {
                closeButton: !0,
                timeOut: 10000
            });
        });
        </script>

    <?php elseif (isset($_GET['page_active']) && $_GET['page_active'] == 'yes'): ?>
        <script type="text/javascript">
             $(document).ready(function() {
                toastr.success("Page Successful Activated!", "Success", {
                closeButton: !0,
                timeOut: 10000
            });
        });
        </script>

    <?php elseif (isset($_GET['page_active']) && $_GET['page_active'] == 'no'): ?>
        <script type="text/javascript">
             $(document).ready(function() {
                toastr.error("Page Not Activated!", "Error", {
                closeButton: !0,
                timeOut: 10000
            });
        });
        </script>

    <?php elseif (isset($_GET['page_delete']) && $_GET['page_delete'] == 'yes'): ?>
        <script type="text/javascript">
             $(document).ready(function() {
                toastr.success("Page  Deleted!", "Success", {
                closeButton: !0,
                timeOut: 10000
            });
        });
        </script>

    <?php elseif (isset($_GET['page_delete']) && $_GET['page_delete'] == 'no'): ?>
        <script type="text/javascript">
             $(document).ready(function() {
                toastr.error("Page Not Deleted!", "Error", {
                    closeButton: !0,
                    timeOut: 10000
                });
        });
        </script>

<!-- // PAGES  //-->



<!-- VIDEO -->


    <?php elseif (isset($_GET['video_archived']) && $_GET['video_archived'] == 'yes'): ?>
        <script type="text/javascript">
             $(document).ready(function() {
                toastr.success("Video Successful Archived!", "Success", {
                closeButton: !0,
                timeOut: 10000
            });
        });
        </script>

    <?php elseif (isset($_GET['video_archived']) && $_GET['video_archived'] == 'no'): ?>
        <script type="text/javascript">
             $(document).ready(function() {
                toastr.error("Video Not Archived!", "Error", {
                closeButton: !0,
                timeOut: 10000
            });
        });
        </script>

    <?php elseif (isset($_GET['video_active']) && $_GET['video_active'] == 'yes'): ?>
        <script type="text/javascript">
             $(document).ready(function() {
                toastr.success("Video Successful Activated!", "Success", {
                closeButton: !0,
                timeOut: 10000
            });
        });
        </script>

    <?php elseif (isset($_GET['video_active']) && $_GET['video_active'] == 'no'): ?>
        <script type="text/javascript">
             $(document).ready(function() {
                toastr.error("Video Not Activated!", "Error", {
                closeButton: !0,
                timeOut: 10000
            });
        });
        </script>

    <?php elseif (isset($_GET['video_delete']) && $_GET['video_delete'] == 'yes'): ?>
        <script type="text/javascript">
             $(document).ready(function() {
                toastr.success("Video  Deleted!", "Success", {
                closeButton: !0,
                timeOut: 10000
            });
        });
        </script>

    <?php elseif (isset($_GET['video_delete']) && $_GET['video_delete'] == 'no'): ?>
        <script type="text/javascript">
             $(document).ready(function() {
                toastr.error("Video Not Deleted!", "Error", {
                    closeButton: !0,
                    timeOut: 10000
                });
        });
        </script>

<!-- // VIDEO  //-->



<!-- THOUGHT LEADERSHIP -->


    <?php elseif (isset($_GET['leadership_archived']) && $_GET['leadership_archived'] == 'yes'): ?>
        <script type="text/javascript">
             $(document).ready(function() {
                toastr.success("Thought Leadership Successful Archived!", "Success", {
                closeButton: !0,
                timeOut: 10000
            });
        });
        </script>

    <?php elseif (isset($_GET['leadership_archived']) && $_GET['leadership_archived'] == 'no'): ?>
        <script type="text/javascript">
             $(document).ready(function() {
                toastr.error("Thought Leadership Not Archived!", "Error", {
                closeButton: !0,
                timeOut: 10000
            });
        });
        </script>

    <?php elseif (isset($_GET['leadership_active']) && $_GET['leadership_active'] == 'yes'): ?>
        <script type="text/javascript">
             $(document).ready(function() {
                toastr.success("Thought Leadership Successful Activated!", "Success", {
                closeButton: !0,
                timeOut: 10000
            });
        });
        </script>

    <?php elseif (isset($_GET['leadership_active']) && $_GET['leadership_active'] == 'no'): ?>
        <script type="text/javascript">
             $(document).ready(function() {
                toastr.error("Thought Leadership Not Activated!", "Error", {
                closeButton: !0,
                timeOut: 10000
            });
        });
        </script>

    <?php elseif (isset($_GET['leadership_delete']) && $_GET['leadership_delete'] == 'yes'): ?>
        <script type="text/javascript">
             $(document).ready(function() {
                toastr.success("Thought Leadership  Deleted!", "Success", {
                closeButton: !0,
                timeOut: 10000
            });
        });
        </script>

    <?php elseif (isset($_GET['leadership_delete']) && $_GET['leadership_delete'] == 'no'): ?>
        <script type="text/javascript">
             $(document).ready(function() {
                toastr.error("Thought Leadership Not Deleted!", "Error", {
                    closeButton: !0,
                    timeOut: 10000
                });
        });
        </script>

<!-- // THOUGHT LEADERSHIP  //-->


<!-- KNOWLEDGE TRANSFER -->


    <?php elseif (isset($_GET['knowledge_transfer_archived']) && $_GET['knowledge_transfer_archived'] == 'yes'): ?>
        <script type="text/javascript">
             $(document).ready(function() {
                toastr.success("knowledge transfer Successful Archived!", "Success", {
                closeButton: !0,
                timeOut: 10000
            });
        });
        </script>

    <?php elseif (isset($_GET['knowledge_transfer_archived']) && $_GET['knowledge_transfer_archived'] == 'no'): ?>
        <script type="text/javascript">
             $(document).ready(function() {
                toastr.error("knowledge transfer Not Archived!", "Error", {
                closeButton: !0,
                timeOut: 10000
            });
        });
        </script>

    <?php elseif (isset($_GET['knowledge_transfer_active']) && $_GET['knowledge_transfer_active'] == 'yes'): ?>
        <script type="text/javascript">
             $(document).ready(function() {
                toastr.success("knowledge transfer Successful Activated!", "Success", {
                closeButton: !0,
                timeOut: 10000
            });
        });
        </script>

    <?php elseif (isset($_GET['knowledge_transfer_active']) && $_GET['knowledge_transfer_active'] == 'no'): ?>
        <script type="text/javascript">
             $(document).ready(function() {
                toastr.error("knowledge transfer Not Activated!", "Error", {
                closeButton: !0,
                timeOut: 10000
            });
        });
        </script>

    <?php elseif (isset($_GET['knowledge_transfer_delete']) && $_GET['knowledge_transfer_delete'] == 'yes'): ?>
        <script type="text/javascript">
             $(document).ready(function() {
                toastr.success("knowledge transfer  Deleted!", "Success", {
                closeButton: !0,
                timeOut: 10000
            });
        });
        </script>

    <?php elseif (isset($_GET['knowledge_transfer_delete']) && $_GET['knowledge_transfer_delete'] == 'no'): ?>
        <script type="text/javascript">
             $(document).ready(function() {
                toastr.error("knowledge transfer Not Deleted!", "Error", {
                    closeButton: !0,
                    timeOut: 10000
                });
        });
        </script>

<!-- // KNOWLEDGE TRANSFER  //-->

<!-- INDUSTRIES -->


    <?php elseif (isset($_GET['industries_archived']) && $_GET['industries_archived'] == 'yes'): ?>
        <script type="text/javascript">
             $(document).ready(function() {
                toastr.success("Industry Successful Archived!", "Success", {
                closeButton: !0,
                timeOut: 10000
            });
        });
        </script>

    <?php elseif (isset($_GET['industries_archived']) && $_GET['industries_archived'] == 'no'): ?>
        <script type="text/javascript">
             $(document).ready(function() {
                toastr.error("Industry Not Archived!", "Error", {
                closeButton: !0,
                timeOut: 10000
            });
        });
        </script>

    <?php elseif (isset($_GET['industries_active']) && $_GET['industries_active'] == 'yes'): ?>
        <script type="text/javascript">
             $(document).ready(function() {
                toastr.success("Industry Successful Activated!", "Success", {
                closeButton: !0,
                timeOut: 10000
            });
        });
        </script>

    <?php elseif (isset($_GET['industries_active']) && $_GET['industries_active'] == 'no'): ?>
        <script type="text/javascript">
             $(document).ready(function() {
                toastr.error("Industry Not Activated!", "Error", {
                closeButton: !0,
                timeOut: 10000
            });
        });
        </script>

    <?php elseif (isset($_GET['industries_delete']) && $_GET['industries_delete'] == 'yes'): ?>
        <script type="text/javascript">
             $(document).ready(function() {
                toastr.success("Industry  Deleted!", "Success", {
                closeButton: !0,
                timeOut: 10000
            });
        });
        </script>

    <?php elseif (isset($_GET['industries_delete']) && $_GET['industries_delete'] == 'no'): ?>
        <script type="text/javascript">
             $(document).ready(function() {
                toastr.error("Industry Not Deleted!", "Error", {
                    closeButton: !0,
                    timeOut: 10000
                });
        });
        </script>

<!-- // INDUSTRIES  //-->


<!-- PARTNERS -->


    <?php elseif (isset($_GET['partners_archived']) && $_GET['partners_archived'] == 'yes'): ?>
        <script type="text/javascript">
             $(document).ready(function() {
                toastr.success("Partner Successful Archived!", "Success", {
                closeButton: !0,
                timeOut: 10000
            });
        });
        </script>

    <?php elseif (isset($_GET['partners_archived']) && $_GET['partners_archived'] == 'no'): ?>
        <script type="text/javascript">
             $(document).ready(function() {
                toastr.error("Partner Not Archived!", "Error", {
                closeButton: !0,
                timeOut: 10000
            });
        });
        </script>

    <?php elseif (isset($_GET['partners_active']) && $_GET['partners_active'] == 'yes'): ?>
        <script type="text/javascript">
             $(document).ready(function() {
                toastr.success("Partner Successful Activated!", "Success", {
                closeButton: !0,
                timeOut: 10000
            });
        });
        </script>

    <?php elseif (isset($_GET['partners_active']) && $_GET['partners_active'] == 'no'): ?>
        <script type="text/javascript">
             $(document).ready(function() {
                toastr.error("Partner Not Activated!", "Error", {
                closeButton: !0,
                timeOut: 10000
            });
        });
        </script>

    <?php elseif (isset($_GET['partners_delete']) && $_GET['partners_delete'] == 'yes'): ?>
        <script type="text/javascript">
             $(document).ready(function() {
                toastr.success("Partner  Deleted!", "Success", {
                closeButton: !0,
                timeOut: 10000
            });
        });
        </script>

    <?php elseif (isset($_GET['partners_delete']) && $_GET['partners_delete'] == 'no'): ?>
        <script type="text/javascript">
             $(document).ready(function() {
                toastr.error("Partner Not Deleted!", "Error", {
                    closeButton: !0,
                    timeOut: 10000
                });
        });
        </script>

<!-- // PARTNERS  //-->


<!-- TEAM -->


    <?php elseif (isset($_GET['team_archived']) && $_GET['team_archived'] == 'yes'): ?>
        <script type="text/javascript">
             $(document).ready(function() {
                toastr.success("Team Member Successful Archived!", "Success", {
                closeButton: !0,
                timeOut: 10000
            });
        });
        </script>

    <?php elseif (isset($_GET['team_archived']) && $_GET['team_archived'] == 'no'): ?>
        <script type="text/javascript">
             $(document).ready(function() {
                toastr.error("Team Member Not Archived!", "Error", {
                closeButton: !0,
                timeOut: 10000
            });
        });
        </script>

    <?php elseif (isset($_GET['team_active']) && $_GET['team_active'] == 'yes'): ?>
        <script type="text/javascript">
             $(document).ready(function() {
                toastr.success("Team Member Successful Activated!", "Success", {
                closeButton: !0,
                timeOut: 10000
            });
        });
        </script>

    <?php elseif (isset($_GET['team_active']) && $_GET['team_active'] == 'no'): ?>
        <script type="text/javascript">
             $(document).ready(function() {
                toastr.error("Team Member Not Activated!", "Error", {
                closeButton: !0,
                timeOut: 10000
            });
        });
        </script>

    <?php elseif (isset($_GET['team_delete']) && $_GET['team_delete'] == 'yes'): ?>
        <script type="text/javascript">
             $(document).ready(function() {
                toastr.success("Team Member Deleted!", "Success", {
                closeButton: !0,
                timeOut: 10000
            });
        });
        </script>

    <?php elseif (isset($_GET['team_delete']) && $_GET['team_delete'] == 'no'): ?>
        <script type="text/javascript">
             $(document).ready(function() {
                toastr.error("Team Member Not Deleted!", "Error", {
                    closeButton: !0,
                    timeOut: 10000
                });
        });
        </script>

<!-- // TEAM  //-->


<!-- SLIDER  -->

    <?php elseif (isset($_GET['slider_delete']) && $_GET['slider_delete'] == 'yes'): ?>
        <script type="text/javascript">
             $(document).ready(function() {
                toastr.success("Slider Deleted!", "Success", {
                closeButton: !0,
                timeOut: 10000
            });
        });
        </script>

    <?php elseif (isset($_GET['slider_delete']) && $_GET['slider_delete'] == 'no'): ?>
        <script type="text/javascript">
             $(document).ready(function() {
                toastr.error("Slider Not Deleted!", "Error", {
                    closeButton: !0,
                    timeOut: 10000
                });
        });
        </script>
<!-- // SLIDER  //-->


<!-- BANNER  -->

    <?php elseif (isset($_GET['banner_deactivate']) && $_GET['banner_deactivate'] == 'yes'): ?>
        <script type="text/javascript">
             $(document).ready(function() {
                toastr.success("Banner Successful Deactivated!", "Success", {
                closeButton: !0,
                timeOut: 10000
            });
        });
        </script>

    <?php elseif (isset($_GET['banner_deactivate']) && $_GET['banner_deactivate'] == 'no'): ?>
        <script type="text/javascript">
             $(document).ready(function() {
                toastr.error("Banner Not Deactivated!", "Error", {
                closeButton: !0,
                timeOut: 10000
            });
        });
        </script>

    <?php elseif (isset($_GET['banner_active']) && $_GET['banner_active'] == 'yes'): ?>
        <script type="text/javascript">
             $(document).ready(function() {
                toastr.success("Banner Successful Activated!", "Success", {
                closeButton: !0,
                timeOut: 10000
            });
        });
        </script>

    <?php elseif (isset($_GET['banner_active']) && $_GET['banner_active'] == 'no'): ?>
        <script type="text/javascript">
             $(document).ready(function() {
                toastr.error("Banner Not Activated!", "Error", {
                closeButton: !0,
                timeOut: 10000
            });
        });
        </script>

    <?php elseif (isset($_GET['banner_delete']) && $_GET['banner_delete'] == 'yes'): ?>
        <script type="text/javascript">
             $(document).ready(function() {
                toastr.success("Banner Deleted!", "Success", {
                closeButton: !0,
                timeOut: 10000
            });
        });
        </script>

    <?php elseif (isset($_GET['banner_delete']) && $_GET['banner_delete'] == 'no'): ?>
        <script type="text/javascript">
             $(document).ready(function() {
                toastr.error("Banner Not Deleted!", "Error", {
                    closeButton: !0,
                    timeOut: 10000
                });
        });
        </script>
<!-- // BANNER  //-->


<!--  DOCUMENTS -->

    <?php elseif (isset($_GET['status_change']) && $_GET['status_change'] == 'yes'): ?>
        <script type="text/javascript">
             $(document).ready(function() {
                toastr.success("Status change successful!", "Success", {
                closeButton: !0,
                timeOut: 10000
            });
        });
        </script>

    <?php elseif (isset($_GET['status_change']) && $_GET['status_change'] == 'no'): ?>
        <script type="text/javascript">
             $(document).ready(function() {
                toastr.error("Status change failed!", "Error", {
                closeButton: !0,
                timeOut: 10000
            });
        });
        </script>

    <?php elseif (isset($_GET['doc_delete']) && $_GET['doc_delete'] == 'yes'): ?>
        <script type="text/javascript">
             $(document).ready(function() {
                toastr.success("Document  Deleted!", "Success", {
                closeButton: !0,
                timeOut: 10000
            });
        });
        </script>

    <?php elseif (isset($_GET['doc_delete']) && $_GET['doc_delete'] == 'no'): ?>
        <script type="text/javascript">
             $(document).ready(function() {
                toastr.error("Document Not Deleted!", "Error", {
                    closeButton: !0,
                    timeOut: 10000
                });
        });
        </script>

<!-- // DOCUMENTS  //-->


<!--  EVENT CATEGORY DELETE -->

    <?php elseif (isset($_GET['event_cat_delete']) && $_GET['event_cat_delete'] == 'yes'): ?>
        <script type="text/javascript">
             $(document).ready(function() {
                toastr.success("Category  Deleted!", "Success", {
                closeButton: !0,
                timeOut: 10000
            });
        });
        </script>

    <?php elseif (isset($_GET['event_cat_delete']) && $_GET['event_cat_delete'] == 'no'): ?>
        <script type="text/javascript">
             $(document).ready(function() {
                toastr.error("Category Not Deleted!", "Error", {
                    closeButton: !0,
                    timeOut: 10000
                });
        });
        </script>

<!-- // EVENT CATEGORY DELETE   //-->


<!--  IMAGE DELETE  -->

    <?php elseif (isset($_GET['image_delete']) && $_GET['image_delete'] == 'yes'): ?>
        <script type="text/javascript">
             $(document).ready(function() {
                toastr.success("Image Deleted!", "Success", {
                closeButton: !0,
                timeOut: 10000
            }).then(function(){
                window.location.reload();
            })
        });
        </script>

    <?php elseif (isset($_GET['image_delete']) && $_GET['image_delete'] == 'no'): ?>
        <script type="text/javascript">
             $(document).ready(function() {
                toastr.error("Image Not Deleted!", "Error", {
                    closeButton: !0,
                    timeOut: 10000
                });
        });
        </script>

<!-- // IMAGE DELETE   //-->


<!--  IMAGE UPLOAD  -->

    <?php elseif (isset($image_success) ): 
            $results = json_encode($image_success);
            $results = json_decode($results);
            // var_dump($results->message);die();
        ?>
        <script type="text/javascript">
            $(document).ready(function() {
                swal.fire({  
                  title: "successful",   
                  text: "<?php echo $results->message; ?>",   
                  icon: "success",
                  showConfirmButton: true 
                })
            });
        </script>
    <?php elseif (isset($image_error) ): 
            $results = json_encode($image_error);
            $results = json_decode($results);
        ?>
        <script type="text/javascript">
            $(document).ready(function() {
                swal.fire({  
                  title: "Error",   
                  text: "<?php echo $results->message; ?>",   
                  icon: "error",
                  showConfirmButton: true 
                });
            });
        </script>
    <?php elseif (isset($event_image_success) ): 
            $results = json_encode($event_image_success);
            $results = json_decode($results);
            // var_dump($results->message);die();
        ?>
        <script type="text/javascript">
            $(document).ready(function() {
                swal.fire({  
                  title: "successful",   
                  text: "<?php echo $results->message; ?>",   
                  icon: "success",
                  showConfirmButton: true 
                }).then(function(){
                    window.location = "<?php echo $results->url; ?>";
                })
            });
        </script>
    <?php elseif (isset($event_image_error) ): 
            $results = json_encode($event_image_error);
            $results = json_decode($results);
        ?>
        <script type="text/javascript">
            $(document).ready(function() {
                swal.fire({  
                  title: "Error",   
                  text: "<?php echo $results->message; ?>",   
                  icon: "error",
                  showConfirmButton: true 
                });
            });
        </script>

<!-- //  IMAGE UPLOAD  //-->


<!-- EVENT IMAGE UPLOAD  -->

    <?php elseif (isset($image_update_success) ): 
            $results = json_encode($image_update_success);
            $results = json_decode($results);
            // var_dump($results->message);die();
        ?>
        <script type="text/javascript">
            $(document).ready(function() {
                swal.fire({  
                  title: "successful",   
                  text: "<?php echo $results->message; ?>",   
                  icon: "success",
                  showConfirmButton: true 
                }).then(function(){
                    window.location = "<?php echo $results->url; ?>"
                })
            });
        </script>
    <?php elseif (isset($image_update_error) ): 
            $results = json_encode($image_update_error);
            $results = json_decode($results);
        ?>
        <script type="text/javascript">
            $(document).ready(function() {
                swal.fire({  
                  title: "Error",   
                  text: "<?php echo $results->message; ?>",   
                  icon: "error",
                  showConfirmButton: true 
                });
            });
        </script>

<!-- // EVENT IMAGE UPLOAD  //-->


<!-- EVENTS -->


    <?php elseif (isset($_GET['event_archived']) && $_GET['event_archived'] == 'yes'): ?>
        <script type="text/javascript">
             $(document).ready(function() {
                toastr.success("Event Successful Archived!", "Success", {
                closeButton: !0,
                timeOut: 10000
            });
        });
        </script>

    <?php elseif (isset($_GET['event_archived']) && $_GET['event_archived'] == 'no'): ?>
        <script type="text/javascript">
             $(document).ready(function() {
                toastr.error("Event Not Archived!", "Error", {
                closeButton: !0,
                timeOut: 10000
            });
        });
        </script>

    <?php elseif (isset($_GET['event_active']) && $_GET['event_active'] == 'yes'): ?>
        <script type="text/javascript">
             $(document).ready(function() {
                toastr.success("Event Successful Activated!", "Success", {
                closeButton: !0,
                timeOut: 10000
            });
        });
        </script>

    <?php elseif (isset($_GET['event_active']) && $_GET['event_active'] == 'no'): ?>
        <script type="text/javascript">
             $(document).ready(function() {
                toastr.error("Event Not Activated!", "Error", {
                closeButton: !0,
                timeOut: 10000
            });
        });
        </script>

    <?php elseif (isset($_GET['event_delete']) && $_GET['event_delete'] == 'yes'): ?>
        <script type="text/javascript">
             $(document).ready(function() {
                toastr.success("Event  Deleted!", "Success", {
                closeButton: !0,
                timeOut: 10000
            });
        });
        </script>

    <?php elseif (isset($_GET['event_delete']) && $_GET['event_delete'] == 'no'): ?>
        <script type="text/javascript">
             $(document).ready(function() {
                toastr.error("Event Not Deleted!", "Error", {
                    closeButton: !0,
                    timeOut: 10000
                });
        });
        </script>

<!-- // EVENTS  //-->



<!-- CASE STUDY -->


    <?php elseif (isset($_GET['case_study_archived']) && $_GET['case_study_archived'] == 'yes'): ?>
        <script type="text/javascript">
             $(document).ready(function() {
                toastr.success("Case Study Successful Archived!", "Success", {
                closeButton: !0,
                timeOut: 10000
            });
        });
        </script>

    <?php elseif (isset($_GET['case_study_archived']) && $_GET['case_study_archived'] == 'no'): ?>
        <script type="text/javascript">
             $(document).ready(function() {
                toastr.error("Case Study Not Archived!", "Error", {
                closeButton: !0,
                timeOut: 10000
            });
        });
        </script>

    <?php elseif (isset($_GET['case_study_active']) && $_GET['case_study_active'] == 'yes'): ?>
        <script type="text/javascript">
             $(document).ready(function() {
                toastr.success("Case Study Successful Activated!", "Success", {
                closeButton: !0,
                timeOut: 10000
            });
        });
        </script>

    <?php elseif (isset($_GET['case_study_active']) && $_GET['case_study_active'] == 'no'): ?>
        <script type="text/javascript">
             $(document).ready(function() {
                toastr.error("Case Study Not Activated!", "Error", {
                closeButton: !0,
                timeOut: 10000
            });
        });
        </script>

    <?php elseif (isset($_GET['case_study_delete']) && $_GET['case_study_delete'] == 'yes'): ?>
        <script type="text/javascript">
             $(document).ready(function() {
                toastr.success("Case Study  Deleted!", "Success", {
                closeButton: !0,
                timeOut: 10000
            });
        });
        </script>

    <?php elseif (isset($_GET['case_study_delete']) && $_GET['case_study_delete'] == 'no'): ?>
        <script type="text/javascript">
             $(document).ready(function() {
                toastr.error("Case Study Not Deleted!", "Error", {
                    closeButton: !0,
                    timeOut: 10000
                });
        });
        </script>

<!-- // CASE STUDY  //-->


<!-- NEWS -->


    <?php elseif (isset($_GET['news_archived']) && $_GET['news_archived'] == 'yes'): ?>
        <script type="text/javascript">
             $(document).ready(function() {
                toastr.success("News Successful Archived!", "Success", {
                closeButton: !0,
                timeOut: 10000
            });
        });
        </script>

    <?php elseif (isset($_GET['news_archived']) && $_GET['news_archived'] == 'no'): ?>
        <script type="text/javascript">
             $(document).ready(function() {
                toastr.error("News Not Archived!", "Error", {
                closeButton: !0,
                timeOut: 10000
            });
        });
        </script>

    <?php elseif (isset($_GET['news_active']) && $_GET['news_active'] == 'yes'): ?>
        <script type="text/javascript">
             $(document).ready(function() {
                toastr.success("News Successful Activated!", "Success", {
                closeButton: !0,
                timeOut: 10000
            });
        });
        </script>

    <?php elseif (isset($_GET['news_active']) && $_GET['news_active'] == 'no'): ?>
        <script type="text/javascript">
             $(document).ready(function() {
                toastr.error("Event Not Activated!", "Error", {
                closeButton: !0,
                timeOut: 10000
            });
        });
        </script>

    <?php elseif (isset($_GET['news_delete']) && $_GET['news_delete'] == 'yes'): ?>
        <script type="text/javascript">
             $(document).ready(function() {
                toastr.success("News Deleted!", "Success", {
                closeButton: !0,
                timeOut: 10000
            });
        });
        </script>

    <?php elseif (isset($_GET['news_delete']) && $_GET['news_delete'] == 'no'): ?>
        <script type="text/javascript">
             $(document).ready(function() {
                toastr.error("News Not Deleted!", "Error", {
                    closeButton: !0,
                    timeOut: 10000
                });
        });
        </script>

    <?php elseif (isset($_GET['news_draft']) && $_GET['news_draft'] == 'yes'): ?>
        <script type="text/javascript">
             $(document).ready(function() {
                toastr.success("News saved as draft!", "Success", {
                closeButton: !0,
                timeOut: 10000
            });
        });
        </script>

    <?php elseif (isset($_GET['news_draft']) && $_GET['news_draft'] == 'no'): ?>
        <script type="text/javascript">
             $(document).ready(function() {
                toastr.error("News not saved as draft!", "Error", {
                    closeButton: !0,
                    timeOut: 10000
                });
        });
        </script>

<!-- // NEWS  //-->


<?php endif; ?>