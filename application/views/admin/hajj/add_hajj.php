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
    
    .select2-container--default .select2-selection--single{
        border-radius: 0px;
    }
    
    .select2-container .select2-selection--single{
        height: 38px;
    }
    
    .select2-container--default .select2-selection--single .select2-selection__rendered{
        line-height: 35px;
    }
    
    .select2-container--default .select2-selection--single .select2-selection__arrow{
        height: 36px;
    }
</style>
<div class="in-content-wrapper">
    <div class="row no-gutters">

        <div class="col">
            <div class="heading-messages">
                <h3>Hajj Add</h3>
            </div><!-- End heading-messages -->
        </div><!-- End column -->
        <div class="col-md-4">
            <div class="breadcrumb">
                <div class="breadcrumb-item"><i class="fas fa-angle-right"></i><a href="">Listing</a>
                </div>
                <div class="breadcrumb-item active"><i class="fas fa-angle-right"></i>Create
                </div>
            </div><!-- end breadcrumb-->
        </div><!-- end column -->

    </div><!-- end row -->

    <div class="box">

        <div class="row">
            <div class="col">
                
                <div class="details-text">
                    <h4>Add Details</h4>
                </div><!-- end details-text -->
            </div><!-- End column -->
        </div><!-- end row -->
        <div class="tour-listing-form">
            <div id="error_message" style="margin-left: 43px;"></div>
            <div id="success_msg" style="margin-left: 43px;color: green;font-weight: 600;"></div>
            
            <form class="text-center" id="add_hajj_info">
                
                <div class="form-row">
                    <div class="col-md" id="hajj_name">
                        <div class="form-group">
                            <label for="inputGroupSelect07" class="">Package Name:</label>
                            <input type="text" class="form-control" name="package_name" required id="">
                        </div><!-- end form-group -->
                    </div>
                </div>
                
                <!-- end form-row -->
                <div class="form-row">
                    <!-- end column -->
                    <textarea name="hajj_text" class="form-control" rows="5" placeholder="Hajj Text" style="margin-bottom: 20px;"></textarea>
                </div><!-- end form-row -->
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
                                <textarea name="" class="mb-3 itinerary"></textarea>
                                <input type="hidden" name="hajj_itinerary">
                            </div>
                            <div class="tab-pane fade" id="nav-included" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <div class="form-group">
                                    <textarea name="" class="mb-3 included"></textarea>
                                    <input type="hidden" name="hajj_included">
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-excluded" role="tabpanel" aria-labelledby="nav-contact-tab">
                                <textarea name="" class="mb-3 excluded"></textarea>
                                <input type="hidden" name="hajj_excluded">
                            </div>
                            <div class="tab-pane fade" id="nav-faq" role="tabpanel" aria-labelledby="nav-contact-tab">
                                <textarea name="" class="mb-3 faq"></textarea>
                                <input type="hidden" name="hajj_faq">
                            </div>
                            <div class="tab-pane fade" id="nav-price" role="tabpanel" aria-labelledby="nav-contact-tab">
                                <textarea name="" class="mb-3 price"></textarea>
                                <input type="hidden" name="hajj_price">
                            </div>

                        </div><!-- end detail-tabs -->
                    </div><!-- end column -->
                    
                </div><!-- end form-row -->
                
                
                
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


<script>
    $("#add_hajj").click(function (){
        $('[name="hajj_itinerary"]').val($( 'textarea.itinerary' ).val());
        $('[name="hajj_included"]').val($( 'textarea.included' ).val());
        $('[name="hajj_excluded"]').val($( 'textarea.excluded' ).val());
        $('[name="hajj_faq"]').val($( 'textarea.faq' ).val());
        $('[name="hajj_price"]').val($( 'textarea.price' ).val());
//        form_data.append('hajj_overivew', editor.getData());
        var form_data = new FormData($("#add_hajj_info")[0]);
//        var content = $( 'textarea.editor' ).val();
//        console.log(editor.getData());
        $("#error_message").html('');
        $("#success_msg").html('');
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
        });
    });
    
</script>