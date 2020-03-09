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
    
    .block {
        padding: 20px;
        border: 1px solid #ccc;
        background: #fff;
        margin: 20px 0px;
    }
    
    .block:first-of-type{
        padding: 0px;
        border: none;
        background: inherit;
        margin: 0px;
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
<div class="in-content-wrapper">
    <div class="row no-gutters">

        <div class="col">
            <div class="heading-messages">
                <h3>Hotel Editing</h3>
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
            
            <form class="text-center" action="update_slider" method="post" enctype="multipart/form-data" id="add_slider_info">
                
                <input type="hidden" name="page_id" value="<?php echo $page_data[0]['page_id'];?>">
                
                <div class="form-row">
                    <div class="col-md" id="menu_id">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="inputGroupSelect07" class="">Page Name:</label>
                                <input type="text" class="form-control" name="page_name"  value="<?php echo $page_data[0]['page_name'];?>">
                            </div>
                        </div><!-- end form-group -->
                    </div><!-- end column -->
                    
                    <div class="col-md">
                        <div class="form-group">
                            <label for="inputGroupSelect07" class="">Slider:</label>
                            <input type="file" class="form-control" name="userfile[]" id="">
                        </div>
                    </div>
                </div><!-- end form-row -->
               
                
                <ul class="list-inline">
                    <li class="list-inline-item">
                        <button type="submit" class="btn" id="add_hotel">Submit</button>
                    </li>
                    <li class="list-inline-item">
                        <!--<button type="submit" class="btn">Cancel</button>-->
                        <a href="slider-list" class="btn" style="background-color: #737373;font-weight: 600;color: #e6e6e6;padding: 6px 30px;">Cancel</a>
                    </li>
                </ul>

            </form>
        </div><!-- end hotel-listing-form -->
    </div><!-- end box -->
</div><!-- end in-content-wrapper -->


<script>
    $("#add_hotel").click(function (){
//        var form_data = new FormData($("#add_slider_info")[0]);
//        $(".error_msg").html('');
//        
//        $.ajax({
//            url: "admin/save_slider_info",
//            type: 'POST',
//            processData: false,
//            contentType: false,
//            cache: false,
//            enctype: 'multipart/form-data',
//            data: form_data,
//            success: function (response) {
//                var obj = JSON.parse(response);
//                $.each(obj.errors, function(key, val) {
//                    $('#error_message').append("<div><small class='error_msg' style='font-weight: bold;color: red;'>" + val + "</small></div>");
//                });
//                
//                if(obj.status == true) {
//                    $("#success_msg").show();
//                    $("#success_msg").html('Slider Added Successfully');
//                    setTimeout(function() {
//                        document.location.reload()
//                    }, 2000);
//                }
//            }
//        })
    });
    
</script>