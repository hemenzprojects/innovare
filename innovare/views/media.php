<title><?php echo $properties['title']; ?> || Slider Management</title>
 <div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
        <!-- ADD SLIDER -->
        
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="hidden-label-basic-form">Add New Slider</h4>
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

                            <form class="form" id="add_media_form" action="" method="POST" enctype="multipart/form-data">
                                <div class="form-body">
                                    <h4 class="form-section"><i class="fas fa-image"></i>Upload Image</h4>
                                    <div class="row">
                                        <div class="form-group col-md-12 mb-2">
                                            <label class="sr-only" for="course_thumbail">Slider Image:</label>
                                            <input type="file" id="file" class="dropify " name="file"  required=""  />
                                        </div>
    
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <button type="submit" id="add_media" name="add_media" class="btn btn-success btn-block btn-lg" style="padding-right: 60px;padding-left: 60px; ">Upload</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ADD SLIDER -->

        <div class="row" >
            <div class="col-md-12" >
                <div class="card" >
                    <div class="card-header">
                        <h4 class="card-title" id="hidden-label-basic-form">Media Gallery</h4>
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
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- <div class="row"> -->
                                                <div class=" m-t-30">
                                                    <div class="row vertical-scroll  height-600 p-1">
                                                        <?php foreach ($innovare->getMedia() as $media_gallery):?>
                                                            <!-- <div class="col-md-3" >
                                                                <a title="URL: <?php echo $media_gallery->image_url?>" data-mfp-src='<?php echo $media_gallery->image_url?>' href="<?php echo $media_gallery->image_url?>"   > 
                                                                    <img  src="<?php echo $media_gallery->image_url?>" width="100%" style="box-shadow: 2px 2px 9px -4px rgba(245,242,245,1);" /> 
                                                                </a>
                                                                <div class="pull-right">
                                                                    <button type="button" id="detele_media" class="btn btn-danger"  style=""><i class="fas fa-trash"></i></button>
                                                                </div>                                                            
                                                            </div> -->

                                                            <div class="col-md-3">
                                                                 
                                                                <a href="#" data-toggle="modal" data-target="#image_modal<?php echo $media_gallery->id?>">
                                                                    <img src="<?php echo $media_gallery->image_url?>" width="100%" style="box-shadow: 2px 2px 9px -4px rgba(245,242,245,1);" />
                                                                </a>
                                                                <div class="pull-right">
                                                                    <span id="detele_media" class="badge badge-danger"><i class="fas fa-trash"></i></span>
                                                                </div>
                                                            </div>
                                                            
                                                            <!-- The Modal -->
                                                            <div class="modal fade" id="image_modal<?php echo $media_gallery->id?>">
                                                                <div class="modal-dialog modal-lg">
                                                                    <div class="modal-content">
                                                                  
                                                                        <!-- Modal Header -->
                                                                        <div class="modal-header">
                                                                            <h4 class="modal-title">Modal Heading</h4>
                                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                        </div>
                                                                        
                                                                        <!-- Modal body -->
                                                                        <div class="modal-body" >
                                                                            <div style="width:70%;margin-right: auto;margin-left: auto;">
                                                                                <img src="<?php echo $media_gallery->image_url?>" width="100%" />
                                                                            </div>
                                                                            <form >
                                                                                <div class="form-group" style="margin-top:20px;">
                                                                                    <label for="pwd">Image URL:</label>
                                                                                    <input type="text" class="form-control" value="<?php echo $media_gallery->image_url?>"id="copy<?php echo $media_gallery->id?>" >

                                                                                </div>
                                                                            </form>
                                                                                <button  class="btn btn-danger" id="copied<?php echo $media_gallery->id?>" style="float: right;" onclick="myFunction<?php echo $media_gallery->id?>()">Copy Text</button>

                                                                            <script>
                                                                                function myFunction<?php echo $media_gallery->id?>() {
                                                                                    var copyText = document.getElementById("copy<?php echo $media_gallery->id?>");
                                                                                    copyText.select();
                                                                                    // copyText.setSelectionRange(0, 99999)
                                                                                    document.execCommand("copy",false);
                                                                                    // alert("Copied the text: " + copyText.value);
                                                                                    var copyB = $("#copied<?php echo $media_gallery->id?>").html("Copied");


                                                                                }
                                                                            </script>
                                                                            

                                                                        </div>
                                                                        
                                                                        <!-- Modal footer -->
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                        </div>
                                                                    
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        <?php  endforeach ?>
                                                    </div>
                                                </div>
                                        <!--  -->
                                    <!-- </div> -->
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>

        </div>
      </div>
    </div>


    
    <!-- ////////////////////////////////////////////////////////////////////////////-->

   