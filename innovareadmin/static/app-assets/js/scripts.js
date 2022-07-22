$(document).ready(function(){
        
    $('#adminTableActive').DataTable({
        "order": [[0, 'desc']], 
        "columnDefs": [{
            "targets": [ 0 ], 
            "visible": false, 
            "searchable": false
        }]
    });

    $('#subsTable').DataTable({
        "order": [[0, 'desc']], 
        "columnDefs": [{
            "targets": [ 0 ], 
            "visible": false, 
            "searchable": false
        }],
        dom: 'Bfrtip',
        buttons: [
             'csv', 'excel', 'pdf', 'print'
        ]
    });

    $('#videoTable').DataTable({
        "order": [[1, 'desc']], 
        "columnDefs": [{
            "targets": [ 0 ], 
            "visible": false, 
            "searchable": false
        }]
    });

    $('#eventTableActive').DataTable({
        "order": [[0, 'desc']], 
        "columnDefs": [{
            "targets": [ 0 ], 
            "visible": false, 
            "searchable": false
        }]
    });
    
    $('#adminTableArchive').DataTable({
        "order": [[0, 'desc']], 
        "columnDefs": [{
            "targets": [ 0 ], 
            "visible": false, 
            "searchable": false
        }]
    });
    $('#courseCat').DataTable({
        "order": [[0, 'desc']], 
        "columnDefs": [{
            "targets": [ 0 ], 
            "visible": false, 
            "searchable": false
        }]
    });
    $('#courseCatEdit').DataTable({
        "order": [[0, 'desc']], 
        "columnDefs": [{
            "targets": [ 0 ], 
            "visible": false, 
            "searchable": false
        }]
    });
    $('#newsDraft').DataTable({
        "order": [[0, 'desc']], 
        "columnDefs": [{
            "targets": [ 0 ], 
            "visible": false, 
            "searchable": false
        }]
    });
    $('#newsActive').DataTable({
        "order": [[0, 'desc']], 
        "columnDefs": [{
            "targets": [ 0 ], 
            "visible": false, 
            "searchable": false
        }]
    });

    $('.dropify').dropify();

    $('#date_time').hide();
    $('#date_range').hide();
    var sec = 1500;

    $('#duration').change(function(){
        var duration = $('#duration').val();
        console.log(duration);
        if (duration == 'one_day') {
            $('#date_time').show(sec);
            $('#date_time:input').attr("required","required");

            
            $('#date_range').hide(sec);

        }else if (duration == 'multiple_days') {
            $('#date_time').hide(sec);

            $('#date_range').show(sec);
            $('#date_range:input').attr("required","required");


        }
    });

    if ($("#event_description").length > 0) {
        tinymce.init({
            selector: "textarea#event_description",
            theme: "modern",
            height: 300,
            images_upload_base_path: '../',
            // editor_selector : "mceEditor",
            plugins: [
                "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker", "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking", "save table contextmenu directionality emoticons template paste textcolor"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
        });
    }
    if ($("#caseStudy_description").length > 0) {
        tinymce.init({
            selector: "textarea#caseStudy_description",
            theme: "modern",
            height: 500,
            images_upload_base_path: '../',
            // editor_selector : "mceEditor",
            plugins: [
                "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker", "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking", "save table contextmenu directionality emoticons template paste textcolor"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
        });
    }
    if ($("#description").length > 0) {
        tinymce.init({
            selector: "textarea#description",
            theme: "modern",
            height: 300,
            images_upload_base_path: '../',
            // editor_selector : "mceEditor",
            plugins: [
                "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker", "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking", "save table contextmenu directionality emoticons template paste textcolor"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
        });
    }

    Dropzone.options.dpzMultipleFiles = {
        paramName: "file",
        acceptedFiles: "image/*"
    }

    $(document).ready(function(){
        var duration_select = $('#duration').val();
            // var daily = $('#radio_edit_2:checked');
        // console.log(duration_select);
        if (duration_select == 'one_day') {
            $("#date_time").show(sec); 
            $("#date_range").hide(sec);

        }
        else if (duration_select == 'multiple_days') {
            $("#date_range").show(sec);
            $("#date_time").hide(sec);
        }
       
    });


    var edit_course_id = $('#edit_course_id').val();
    if(!edit_course_id){
    // partner's link on add course page
        $('#partners_link').hide();
        $('#partners_link_select').change(function(){
            var partners_link_select = $('#partners_link_select').val();
            // console.log(duration_select);
            if (partners_link_select == 'yes') {
                $("#partners_link").show(); 
                $("#pat_link").attr("required", "required"); 
            }
            else if (partners_link_select == 'no') {
                $("#partners_link").hide();
                $("#pat_link").removeAttr("required", "required");
            }
        })

    }else{


    // edit course partner link
        var partners_link_select = $('#partners_link_select').val();

        if (partners_link_select == 'yes') {
            $("#partners_link").show(); 
            $("#pat_link").attr("required", "required"); 
        }
        else if (partners_link_select == 'no') {
            $("#partners_link").hide();
            $("#pat_link").removeAttr("required", "required");
        }

        $('#partners_link_select').change(function(){
            var partners_link_select = $('#partners_link_select').val();
            // console.log(duration_select);
            if (partners_link_select == 'yes') {
                $("#partners_link").show(); 
                $("#pat_link").attr("required", "required"); 
            }
            else if (partners_link_select == 'no') {
                $("#partners_link").hide();
                $("#pat_link").removeAttr("required", "required");
            }
        })


    }
    $('#instructor').select2({
        placeholder: "Select Instructors",
        allowClear: !0
    });

    $('#category').select2({
        placeholder: "Select category",
        allowClear: !0
    });
    $('.select_cat').select2({
        placeholder: "Select category",
        allowClear: !0
    });
    $('.select_2').select2({
        placeholder: "",
        allowClear: !0
    });

});