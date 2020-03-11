<style>
    
    .ck-editor__editable_inline {
        min-height: 200px;
    }
    
    .tab-content > .active {
        padding: 10px;
    }
    
    
</style>

<div class="in-content-wrapper">
    <div class="row no-gutters">

        <div class="col">
            <div class="heading-messages">
                <h3>News Listing</h3>
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
                    <h4>
                        Add Details
                        <span style="float: right;">
                            <button class="btn btn-success" data-toggle="modal" data-target="#add-category">Add Category</button>
                        </span>
                    </h4>
                    
                </div>
                
            </div>
        </div>
        <div class="hotel-listing-form">
            <div id="error_message" style="margin-left: 43px;"></div>
            <div id="success_msg" style="margin-left: 43px;color: green;"></div>
            
            <form class="text-center" id="add_news_info">
                
                <div class="form-row">
                    <div class="col-md" id="country_id">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect00">Categories:</label>
                                </div>
                                <select class="custom-select" name="category_id" id="category_id">
                                    <option value="">Choose Category</option>
                                    <?php foreach ($all_category as $category) {?>
                                    <option value="<?php echo $category['id']?>">
                                        <?php echo $category['category_name'];?>
                                    </option>
                                    <?php }?>
                                </select>
                                <i class="fas fa-angle-down"></i>
                            </div>
                        </div><!-- end form-group -->
                    </div>
                    
                    <div class="col-md" id="hotel_name">
                        <div class="form-group">
                            <label for="inputGroupSelect07" class="">News Title:</label>
                            <input type="text" class="form-control" name="news_title" required id="">
                        </div>
                    </div>
                    
                </div>
                
                <div class="form-row">
                    <div class="col-md">
                        <label for="inputGroupSelect07" class="" style="display: block;text-align: left;font-weight: 600;font-size: 16px;">News Description:</label>
                        <textarea class="editor" name=""></textarea>
                        <input type="hidden" name="news_description">
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="col-md">
                        <label for="inputGroupSelect07" class="" style="display: block;text-align: left;font-weight: 600;font-size: 16px;">Main Image:</label>
                        <input type="file" id="input-file-now" class="dropify" name="userfile[]"/>
                    </div>
                </div>

                <ul class="list-inline">
                    <li class="list-inline-item">
                        <button type="button" class="btn" id="add_news">Submit</button>
                    </li>
                    <li class="list-inline-item">
                        <a href="all-news" class="btn" style="background-color: #737373;font-weight: 600;color: #e6e6e6;padding: 6px 30px;">Cancel</a>
                    </li>
                </ul>

            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="add-category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="add-category-form">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Category Name</label>
                        <input type="text" class="form-control" name="category_name" id="category_name" placeholder="Enter Category Name" style="border: 1px solid #b3b3b3 !important;">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="add-category-btn">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    $("#add_news").click(function (){
        $('[name="news_description"]').val($( 'textarea.editor' ).val());
        var form_data = new FormData($("#add_news_info")[0]);
        
        $(".error_msg").html('');
        
        $.ajax({
            url: "news/save_info",
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
                    $('html, body').animate({
                        scrollTop: $(".box").offset().top
                    }, 1000);
                });
                if(obj.status == true) {
                    $("#success_msg").show();
                    $("#success_msg").html('Data Inserted Successfully');
                    
                    $('#add_news_info').trigger("reset");
                    $('html, body').animate({
                        scrollTop: $(".box").offset().top
                    }, 1000);
                }
            }
        })
    });
    
    $("#add-category-btn").click(function (){
        var form_data = new FormData($("#add-category-form")[0]);
        $(".error_cat_msg").html('');
        
        $.ajax({
            url: "news/save_category_info",
            type: 'POST',
            processData: false,
            contentType: false,
            cache: false,
            enctype: 'multipart/form-data',
            data: form_data,
            success: function (response) {
                var obj = JSON.parse(response);
                
                if(obj.status == true) {
                    $("#success_cat_msg").show();
                    $("#success_cat_msg").html('Data Inserted Successfully');
                    
                    $('#add-cateogry-form').trigger("reset");
                    $('#add-category').modal('hide');
                    $('#category_id').html(obj.html);
                } else {
                    $.each(obj.errors, function(key, val) {
                        $('#'+key).after("<small class='error_cat_msg' style='font-weight: bold;color: red;'>" + val + "</small>");
                    });
                }
            }
        })
    });
    
    
</script>

