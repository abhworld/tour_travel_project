<style>
    #nav-tabContent {
        background: #fff;
    }
    
    #nav-tab a {
        color: #0f0f0f;
        font-weight: 600;
    }
    
    .ck-editor__editable_inline {
        min-height: 200px;
    }
    
    .tab-content > .active {
        padding: 10px;
    }
    
    .form-group {
        margin-bottom: 1rem !important;
    }
    
    .block textarea{
        margin: 0px !important;
        border: 1px solid #ccc;
        resize: none;
    }
    
    .block textarea:focus {
        border: 1px solid #ccc;
    }
</style>

<?php 
    ?>
<div class="in-content-wrapper">
    <div class="row no-gutters">

        <div class="col">
            <div class="heading-messages">
                <h3>Hajj Editing</h3>
            </div><!-- End heading-messages -->
        </div><!-- End column -->
        <div class="col-md-4">
            <div class="breadcrumb">
                <div class="breadcrumb-item"><i class="fas fa-angle-right"></i><a href="list-hajj">Listing</a>
                </div>
                <div class="breadcrumb-item active"><i class="fas fa-angle-right"></i>Edit
                </div>
            </div><!-- end breadcrumb-->
        </div><!-- end column -->

    </div><!-- end row -->

    <div class="box">

        <div class="row">
            <div class="col">
                
                <div class="details-text">
                    <h4>Edit Details</h4>
                </div><!-- end details-text -->
            </div><!-- End column -->
        </div><!-- end row -->
        <div class="tour-listing-form">
            <div id="error_message" style="margin-left: 43px;"></div>
            <div id="success_msg" style="margin-left: 43px;color: green;font-weight: 600;"></div>
            
            <form class="text-center" id="add_hajj_info">
                
                <input type="hidden" name="hajj_id" value="<?php echo $hajj_info[0]['hajj_id'];?>">
                
                <div class="form-row">
                    <div class="col-md" id="hajj_name">
                        <div class="form-group">
                            <label for="inputGroupSelect07" class="">Package Name:</label>
                            <input type="text" class="form-control" name="package_name" required id="" value="<?php echo $hajj_info[0]['package_name']?>">
                        </div><!-- end form-group -->
                    </div><!-- end column -->
                    
                </div><!-- end form-row -->
                
                <div class="form-row">
                    <textarea name="hajj_text" class="form-control" rows="5" placeholder="Hajj Text" style="margin-bottom: 20px;"><?php echo $hajj_info[0]['hajj_text']?></textarea>
                </div>
                
                <div class="form-row">
                    <div class="col-md" style="margin-bottom: 1rem;">
                        <nav>
                            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-itinerary" role="tab" aria-controls="nav-home" aria-selected="true">Itinerary</a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-included" role="tab" aria-controls="nav-profile" aria-selected="false">Included</a>
                                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-excluded" role="tab" aria-controls="nav-contact" aria-selected="false">Excluded</a>
                                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-faq" role="tab" aria-controls="nav-contact" aria-selected="false">FAQ</a>
                                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-price" role="tab" aria-controls="nav-contact" aria-selected="false">Price details</a>
                            </div>
                        </nav>
                        <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-itinerary" role="tabpanel" aria-labelledby="nav-home-tab">
                                <textarea name="" class="mb-3 itinerary"><?php echo $hajj_info[0]['hajj_itinerary']?></textarea>
                                <input type="hidden" name="hajj_itinerary">
                            </div>
                            <div class="tab-pane fade" id="nav-included" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <div class="form-group">
                                    <textarea name="" class="mb-3 included"><?php echo $hajj_info[0]['hajj_included']?></textarea>
                                    <input type="hidden" name="hajj_included">
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-excluded" role="tabpanel" aria-labelledby="nav-contact-tab">
                                <textarea name="" class="mb-3 excluded"><?php echo $hajj_info[0]['hajj_excluded']?></textarea>
                                <input type="hidden" name="hajj_excluded">
                            </div>
                            <div class="tab-pane fade" id="nav-faq" role="tabpanel" aria-labelledby="nav-contact-tab">
                                <textarea name="" class="mb-3 faq"><?php echo $hajj_info[0]['hajj_faq']?></textarea>
                                <input type="hidden" name="hajj_faq">
                            </div>
                            <div class="tab-pane fade" id="nav-price" role="tabpanel" aria-labelledby="nav-contact-tab">
                                <textarea name="" class="mb-3 price"><?php echo $hajj_info[0]['hajj_price']?></textarea>
                                <input type="hidden" name="hajj_price">
                            </div>

                        </div><!-- end detail-tabs -->
                    </div><!-- end column -->
                    
                </div><!-- end form-row -->
                
                <div class="form-row" style="margin-bottom: 20px;">
                    <div class="col-md">
                        <h6 class="text-left">Images</h6>
                        <table class="table table-bordered" style="background-color: #fff;margin: 0px;max-width: 100%">
                            <?php foreach ($hajj_images as $image) {?>
                            <tr>
                                <td><img src="uploads/hajj/<?php echo $image['image']?>" alt="images" style="width: 100px; height: 60px;"></td>
                                <td><?php if($image['is_main_image'] == 1) { echo 'Main Image';} else { echo 'Sub image';}?></td>
                                <td>
                                    <a onclick="open_image_modal('<?php echo $image['image_id']?>')"><i class="fas fa-edit"></i></a>
                                    <?php if($image['is_main_image'] == 0) {?>
                                    <a href="delete-hajj-image/<?php echo $image['image_id'].'/'.$hajj_info[0]['hajj_id']?>">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                    <?php }?>
                                </td>
                                
                                
                            </tr>
                            <?php }?>
                        </table>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="col-md" id="hajj_name">
                        <div class="form-group">
                            <label for="inputGroupSelect07" class="">Image:</label>
                            <input type="file" multiple="" class="form-control" name="userfile[]" required id="">
                        </div><!-- end form-group -->
                    </div>
                </div>

                <ul class="list-inline">
                    <li class="list-inline-item">
                        <button type="button" class="btn" id="add_hajj">Submit</button>
                    </li>
                    <li class="list-inline-item">
                        <!--<button type="submit" class="btn">Cancel</button>-->
                        <a href="list-hajj" class="btn" style="background-color: #737373;font-weight: 600;color: #e6e6e6;padding: 6px 30px;">Cancel</a>
                    </li>
                </ul>

            </form>
        </div><!-- end hajj-listing-form -->
    </div><!-- end box -->
</div><!-- end in-content-wrapper -->

<!-- Modal -->
<div class="modal fade" id="image_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="hajj/update_image" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" name="image_id" value="">
                    <div class="form-group">
                        <label for="inputGroupSelect07" class="">Image:</label>
                        <input type="file" class="form-control" name="image[]" required id="" style="border: 1px solid #ced4da;">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    
    $(document).ready(function (){
//        get_city();
    });
    
    $("#add_hajj").click(function (){
        $('[name="hajj_itinerary"]').val($( 'textarea.itinerary' ).val());
        $('[name="hajj_included"]').val($( 'textarea.included' ).val());
        $('[name="hajj_excluded"]').val($( 'textarea.excluded' ).val());
        $('[name="hajj_faq"]').val($( 'textarea.faq' ).val());
        $('[name="hajj_price"]').val($( 'textarea.price' ).val());
        
        var form_data = new FormData($("#add_hajj_info")[0]);
//        var content = $( 'textarea.editor' ).val();
//        console.log(editor.getData());
        $(".error_msg").html('');

        $.ajax({
            url: "hajj/save_hajj_info",
            type: 'POST',
            processData: false,
            contentType: false,
            cache: false,
            enctype: 'multipart/form-data',
            data: form_data,
            success: function (response) {
                var obj = JSON.parse(response);
                $.each(obj.errors, function(key, val) {
                    $('#error_message').append("<div><small class='error_msg' style='font-weight: bold;color: red;'>" + val + "</small></div>");
                });
                if(obj.status == true){
                    $("#success_msg").show();
                    $("#success_msg").html('Account Info Updated Successfully');
                    
                    window.location.href="<?php echo base_url();?>list-hajj";
                }
            }
        })
    });
    
    function open_image_modal(image_id){
        
        $('#image_modal').modal('show'); 
        
        $("[name='image_id']").val(image_id);
    }
</script>