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
</style>
<div class="in-content-wrapper">
    <div class="row no-gutters">

        <div class="col">
            <div class="heading-messages">
                <h3>Visa Content</h3>
            </div><!-- End heading-messages -->
        </div><!-- End column -->
        <div class="col-md-4">
            <div class="breadcrumb">
                <div class="breadcrumb-item"><i class="fas fa-angle-right"></i><a href="slider-list">Listing</a>
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
        <div class="hotel-listing-form">
            <div id="error_message" style="margin-left: 43px;"></div>
            <div id="success_msg" style="margin-left: 43px;"></div>
            
            <form class="text-center" id="add_hotel_info">
                
                <div class="form-row" style="margin-bottom: 20px;">
                    <h6>Visa Content</h6>
                    <textarea name="section_content" class="form-control textarea text-left p-3 h-100" rows="2" placeholder="Hotel Content" style="margin: 0px;"><?php echo $hotel_content['section_content']?></textarea>
                </div>
                
                <div class="form-row">
                    <div class="col-md" id="menu_id">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="inputGroupSelect07" class="">Meta Title:</label>
                                <input type="text" class="form-control" name="meta_title"  value="<?php echo $hotel_meta_content['meta_title'];?>">
                            </div>
                        </div>
                    </div>
                </div>
                
                <?php $meta_keyword = explode(', ', $hotel_meta_content['meta_keyword']);?>
                <div class="form-row">
                    <div class="col-md" id="menu_id">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="inputGroupSelect07" style="position: relative;display: block;padding: inherit;background: none;height: auto;margin: 0px;text-align: left;">Meta Keywords:</label>
                                <select type="text" class="form-control js-example-tokenizer" name="meta_keyword[]" multiple="" tabindex="-1">
                                    <?php foreach($meta_keyword as $keyword) {?>
                                    <option value="<?php echo $keyword?>" selected=""><?php echo $keyword?></option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="form-row">
                    <h6>Meta Description</h6>
                    <textarea name="meta_description" class="form-control textarea text-left p-3 h-100" rows="2" placeholder="Meta Description" style="margin: 0px;"><?php echo $hotel_meta_content['meta_description']?></textarea>
                </div>
                
                <ul class="list-inline">
                    <li class="list-inline-item">
                        <button type="button" class="btn" id="submit_btn">Submit</button>
                    </li>
                </ul>

            </form>
        </div><!-- end hotel-listing-form -->
    </div><!-- end box -->
</div><!-- end in-content-wrapper -->


<script>
    $("#submit_btn").click(function (){
        
        var form_data = new FormData($("#add_hotel_info")[0]);
        $(".error_msg").html('');
        
        $.ajax({
            url: "admin/update_visa_content",
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
                
                if(obj.status == true) {
                    $("#success_msg").show();
                    $("#success_msg").html('Data Updated Successfully');
                    setTimeout(function() {
                        document.location.reload()
                    }, 2000);
                }
            }
        })
    });
    
</script>