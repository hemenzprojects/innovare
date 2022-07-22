<script type="text/javascript">

	$('#add_course_form').on('submit', function(e){
		e.preventDefault();
        var title = $('#title').val();
        var code = $('#code').val();
        var category = $('#category').val();
        var instructor = $('#instructor').val();
        var partners_link_select = $('#partners_link_select').val();
        // if (partners_link_select == 'yes') {
            var pat_link = $('#pat_link').val();
        // }
        var description = tinyMCE.get('description').getContent();
        var price = $('#price').val();
        var duration = $('#duration').val();
        var training_type = $('#training_type').val();
        var admin_id = $('#admin_id').val();

        // console.log (instructor);

        // console.log(title,code,category,instructor,description,price,duration,training_type,admin_id);

            $('#add_course').attr("disabled","disabled");
            $('#add_course').html('<i class="fa fa-spinner spinner"></i>' + ' Loading');
            $.ajax({
                type:'POST',
                url:`controller/courseController.php?add_course`,
                data:{title,code,category,instructor,description,price,partners_link_select,pat_link,duration,training_type,admin_id},
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
		                    $('#add_course').removeAttr("disabled","disabled");
		                    $('#add_course').html('Submit');
                        });
                    }
                    else if (resp.response == 'success') {
                    	swal.fire({  
	                      title: "successful",   
	                      text: resp.message,   
	                      icon: "success",
	                      showConfirmButton: true 
	                    }).then(function() {
	                      $('#add_course').removeAttr("disabled","disabled");
	                      $('#add_course').html('Submit');
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
                    $('#add_course').removeAttr("disabled","disabled");
                    $('#add_course').html('Submit');
                  });

                } 
            });
        
    });
</script>