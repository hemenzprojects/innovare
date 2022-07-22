<script type="text/javascript">

	$('#edit_event_form').on('submit', function(e){
		e.preventDefault();
        var admin_id = $('#admin_id').val();
        var edit_event_id = $('#edit_event_id').val();
        var event_title = $('#event_title').val();
        var event_category = $('#event_category').val();
        var event_location = $('#event_location').val();
        var google_location = $('#google_location').val();
        var pat_reg = $('#pat_reg').val();
        var duration = $('#duration').val();
        // var event_description = $('#event_description').val();
        var event_description = tinyMCE.get('event_description').getContent();

        if (duration == 'one_day') {

            var event_date = $('#event_date').val();
            var event_time_from = $('#event_time_from').val();
            var event_time_to = $('#event_time_to').val();

            // console.log(admin_id,event_title,event_category,event_location,google_location,pat_reg,duration,event_description,event_date,event_time_from,event_time_to);

            $('#edit_event').attr("disabled","disabled");
            $('#edit_event').html('<i class="fa fa-spinner spinner"></i>' + ' Loading');
            $.ajax({
                type:'POST',
                url:`<?php echo $properties['baseurl']?>controller/eventController.php?edit_event`,
                data:{admin_id,edit_event_id,event_title,event_category,event_location,google_location,pat_reg,duration,event_description,event_date,event_time_from,event_time_to},
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
                            $('#edit_event').removeAttr("disabled","disabled");
                            $('#edit_event').html('Update');
                        });
                    }
                    else if (resp.response == 'success') {
                        swal.fire({  
                          title: "successful",   
                          text: resp.message,   
                          icon: "success",
                          showConfirmButton: true 
                        }).then(function() {
                          $('#edit_event').removeAttr("disabled","disabled");
                          $('#edit_event').html('Update');
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
                    $('#edit_event').removeAttr("disabled","disabled");
                    $('#edit_event').html('Update');
                  });

                } 
            });
        }
        else if (duration == 'multiple_days') {

            var event_date_from = $('#event_date_to').val();
            var event_date_to = $('#event_date_to').val();

            // console.log(admin_id,event_title,event_category,event_location,google_location,pat_reg,duration,event_description,event_date_from,event_date_to);
            $('#edit_event').attr("disabled","disabled");
            $('#edit_event').html('<i class="fa fa-spinner spinner"></i>' + ' Loading');
            $.ajax({
                type:'POST',
                url:`<?php echo $properties['baseurl']?>controller/eventController.php?edit_event`,
                data:{admin_id,edit_event_id,event_title,event_category,event_location,google_location,pat_reg,duration,event_description,event_date_from,event_date_to},
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
                            $('#edit_event').removeAttr("disabled","disabled");
                            $('#edit_event').html('Update');
                        });
                    }
                    else if (resp.response == 'success') {
                        swal.fire({  
                          title: "successful",   
                          text: resp.message,   
                          icon: "success",
                          showConfirmButton: true 
                        }).then(function() {
                          $('#edit_event').removeAttr("disabled","disabled");
                          $('#edit_event').html('Update');
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
                    $('#edit_event').removeAttr("disabled","disabled");
                    $('#edit_event').html('Update');
                  });

                } 
            });

        }

        // var training_type = $('#training_type').val();


            
        
    });
</script>