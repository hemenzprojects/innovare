<script type="text/javascript">

	$('#add_caseStudy_form').on('submit', function(e){
		e.preventDefault();
        var admin_id = $('#admin_id').val();
        var caseStudy_title = $('#caseStudy_title').val();
        var caseStudy_category = $('#caseStudy_category').val();
        // var event_description = $('#event_description').val();
        var caseStudy_description = tinyMCE.get('caseStudy_description').getContent();

            // console.log(admin_id,event_title,event_category,event_location,google_location,pat_reg,duration,event_description,event_date,event_time_from,event_time_to);

            $('#add_caseStudy').attr("disabled","disabled");
            $('#add_caseStudy').html('<i class="fa fa-spinner spinner"></i>' + ' Loading');
            $.ajax({
                type:'POST',
                url:`controller/caseStudyController.php?add_caseStudy`,
                data:{admin_id,caseStudy_title,caseStudy_category,caseStudy_description},
                success:function(response){
                    console.log(response);
                    var resp = JSON.parse(response);
                    console.log(resp.message);
                    if (resp.response == 'error') {
                        swal.fire({  
                            title: resp.response,  
                            text: resp.message,  
                            icon: "error" 
                        }).then(function() {
                            $('#add_caseStudy').removeAttr("disabled","disabled");
                            $('#add_caseStudy').html('Submit');
                        });
                    }
                    else if (resp.response == 'success') {
                        swal.fire({  
                          title: "successful",   
                          text: resp.message,   
                          icon: "success",
                          showConfirmButton: true 
                        }).then(function() {
                          $('#add_caseStudy').removeAttr("disabled","disabled");
                          $('#add_caseStudy').html('Submit');
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
                    $('#add_caseStudy').removeAttr("disabled","disabled");
                    $('#add_caseStudy').html('Submit');
                  });

                } 
            });    
    });
</script>