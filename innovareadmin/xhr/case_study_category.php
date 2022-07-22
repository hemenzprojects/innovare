<script type="text/javascript">
	
	$('#add_case_study_cat').on('submit', function(e){
        e.preventDefault();
        var name = $('#name').val();
        var admin_id = $('#admin_id').val();
        // console.log(name);

            // $('#add_cat').attr("disabled","disabled");
            $('#add_cat').html('<i class="fa fa-spinner spinner"></i>' + ' Loading');
            $.ajax({
                type:'POST',
                url:`<?php echo $properties['baseurl']?>controller/caseStudyCatController.php?case_study_cat`,
                data:{name,admin_id},
                success:function(response){
                    var resp = JSON.parse(response);
                    console.log(resp.message);
                    if (resp.response == 'error') {
                        swal.fire({  
                            title: resp.response,  
                            text: resp.message,  
                            icon: "error" 
                        }).then(function() {
                            $('#add_cat').removeAttr("disabled","disabled");
                            $('#add_cat').html('Submit');
                         });

                    }
                    else if (resp.response == 'success') {
                        swal.fire({  
                              title: "successful",   
                              text: resp.message,   
                              icon: "success",
                              showConfirmButton: true 
                            }).then(function() {
                              $('#add_cat').removeAttr("disabled","disabled");
                              $('#add_cat').html('Submit');
                              window.location.reload();
                            });

                    }                   
                },
                error: function(response){
                    var resp = response;
                    console.log('resp');
                    swal.fire({  
                    title: 'ERROR',  
                    text: "There has been an error with System, kindly contact your System Admin",  
                    icon: "error" 
                    }).then(function() {
                    $('#add_cat').removeAttr("disabled","disabled");
                    $('#add_cat').html('Submit');
                  });

                } 

            });

    });

    $('#edit_case_study_cat').on('submit', function(e){
        e.preventDefault();
        var name = $('#name').val();
        var admin_id = $('#admin_id').val();
        var case_study_cat_id = $('#case_study_cat_id').val();
        // console.log(name,course_cat_id);

            $('#edit_cat').attr("disabled","disabled");
            $('#edit_cat').html('<i class="fa fa-spinner spinner"></i>' + ' Loading');
            $.ajax({
                type:'POST',
                url:`<?php echo $properties['baseurl']?>controller/caseStudyCatController.php?edit_case_study_cat`,
                data:{name,case_study_cat_id,admin_id},
                success:function(response){
                    var resp = JSON.parse(response);
                    console.log(resp.message);
                    if (resp.response == 'error') {
                        swal.fire({  
                            title: resp.response,  
                            text: resp.message,  
                            icon: "error" 
                        }).then(function() {
                            $('#edit_cat').removeAttr("disabled","disabled");
                            $('#edit_cat').html('Update');
                         });

                    }
                    else if (resp.response == 'success') {
                        swal.fire({  
                              title: "successful",   
                              text: resp.message,   
                              icon: "success",
                              showConfirmButton: true 
                            }).then(function() {
                              $('#edit_cat').removeAttr("disabled","disabled");
                              $('#edit_cat').html('Update');
                              window.location = resp.url;
                            });

                    }                   
                },
                error: function(response){
                    var resp = response;
                    console.log('resp');
                    swal.fire({  
                    title: 'ERROR',  
                    text: "There has been an error with System, kindly contact your System Admin",  
                    icon: "error" 
                    }).then(function() {
                    $('#edit_cat').removeAttr("disabled","disabled");
                    $('#edit_cat').html('Update');
                  });

                } 

            });

    });

</script>