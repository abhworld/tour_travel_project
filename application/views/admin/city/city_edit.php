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
                <h3>Hotel Listing</h3>
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
        <div class="hotel-listing-form">
            <div id="error_message" style="margin-left: 43px;"></div>
            <div id="success_msg" style="margin-left: 43px;"></div>
            
            <form class="text-center" id="add_slider_info" action="admin/update_city_info" method="post">
                
                <input type="hidden" name="id" value="<?php echo $city_data[0]['id']?>">
                
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect00">Country:</label>
                        </div>
                        <select class="custom-select" name="country_id" id="inputGroupSelect00">
                            <option value="">Choose Country</option>
                            <?php foreach ($all_country_list as $menu) {?>
                            <option value="<?php echo $menu['id']?>" <?php if($city_data[0]['country_id'] == $menu['id']){echo 'selected';}?>>
                                <?php echo $menu['name'];?>
                            </option>
                            <?php }?>
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md" id="menu_id">
                        <div class="form-group">
                            <label for="inputGroupSelect07" class="" style="text-align: left;display: block;">City Name:</label>
                            <input type="text" class="form-control" name="name" required value="<?php echo $city_data[0]['name']?>" style="border: 1px solid #ced4da !important;">
                        </div><!-- end form-group -->
                    </div><!-- end column -->
                </div><!-- end form-row -->

                
                <ul class="list-inline">
                    <li class="list-inline-item">
                        <button type="submit" class="btn" id="add_hotel">Submit</button>
                    </li>
                    <li class="list-inline-item">
                        <!--<button type="submit" class="btn">Cancel</button>-->
                        <a href="cities-list" class="btn" style="background-color: #737373;font-weight: 600;color: #e6e6e6;padding: 6px 30px;">Cancel</a>
                    </li>
                </ul>

            </form>
        </div><!-- end hotel-listing-form -->
    </div><!-- end box -->
</div><!-- end in-content-wrapper -->


<script>
    $("#save_city_btn").click(function (){
        var form_data = new FormData($("#add_city")[0]);
        $(".error_msg").html('');
        
        $.ajax({
            url: "admin/save_city",
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
                    $("#success_msg").html('Cities Added Successfully');
                    setTimeout(function() {
                        document.location.reload();
                    }, 1000);
                }
            }
        })
    })
    
    var id = 1;
    $('.add').click(function () {
        id++;
//        alert(id);
        $('.block:last').after('<div class="block" style="text-align: left;">\n\
                                    <div class="form-row">\n\
                                        <div class="col-md-10" id="city">\n\
                                            <div class="form-group">\n\
                                                <label for="inputGroupSelect07" class="" style="text-align: left;display: block;">City Name:</label>\n\
                                                <input type="text" class="form-control" name="name[]" required id="" style="border: 1px solid #ced4da !important;">\n\
                                            </div>\n\
                                        </div>\n\
                                        <div class="col-md-2" id="city">\n\
                                            <span class="remove btn btn-danger" style="margin-top: 32px;">X</span>\n\
                                        </div>\n\
                                    </div>\n\
                                    <div class="appenddata' + id + '"></div>\n\
                                </div>');
        $(".select2").select2();
    });
    
    $('.optionBox').on('click', '.remove', function () {
        $(this).closest('.block').remove();
//        $(this).parent().remove();
    });
    
</script>