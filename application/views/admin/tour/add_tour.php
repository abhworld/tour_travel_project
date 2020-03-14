<style>
    ul {
        list-style-type: none;
    }

    li {
        display: inline-block;
    }
    
    #related_data label, #related_data .modal-body label {
        border: 1px solid #fff;
        padding: 10px;
        display: block;
        position: relative;
        margin: 10px;
        cursor: pointer;
        -webkit-touch-callout: none;
        -webkit-user-select: none;
        -khtml-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    #related_data label::before {
/*        background-color: white;
        color: white;*/
        /*content: " ";*/
        display: block;
        border-radius: 50%;
        border: 1px solid grey;
        position: absolute;
        top: -5px;
        left: -5px;
        width: 25px;
        height: 25px;
        text-align: center;
        line-height: 28px;
        transition-duration: 0.4s;
        /*transform: scale(0);*/
    }

    #related_data label img {
        height: 100px;
        width: 100px;
        transition-duration: 0.2s;
        transform-origin: 50% 50%;
    }
    
    #related_data input[type="checkbox"][id^="hotel"] {
        display: none;
    }

    :checked+label {
        border-color: #ddd;
    }

    :checked+label::before {
        content: "✓";
        background-color: grey;
        transform: scale(1);
    }

    :checked+label img {
        transform: scale(0.9);
        box-shadow: 0 0 5px #333;
        z-index: 0;
    }
    
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
    
    .block {
        padding: 20px;
        border: 1px solid #ccc;
        background: #fff;
        margin: 20px 0px;
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
                <h3>Tour Listing</h3>
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
            
            <form class="text-center" action="tour/save_tour_info" method="post" enctype="multipart/form-data">
                
                <div class="form-row">
                    <div class="col-md" id="tour_name">
                        <div class="form-group">
                            <label for="inputGroupSelect07" class="">Tour Name:</label>
                            <input type="text" class="form-control" name="package_name" required id="">
                        </div>
                    </div>
                    
                    <div class="col-md" id="tour_name">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="">Total Day:</label>
                                </div>
                                <select class="custom-select" id="no_of_day" name="no_of_day">
                                    <option value="">Choose No Of Day</option>
                                    <?php for ($i = 1; $i <= 15; $i++) {?>
                                    <option value="<?php echo $i?>">
                                        <?php echo $i;?>
                                    </option>
                                    <?php }?>
                                </select>
                                <!--<i class="fas fa-angle-down"></i>-->
                            </div>
                            
                        </div>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="col-md">
                        <div class="form-group">
                            <label for="inputGroupSelect07" class="">Price:</label>
                            <input type="text" class="form-control" name="tour_price" required id="">
                        </div>
                    </div>
                    
                    <div class="col-md">
                        <div class="col-md" id="tour_name">
                            <div class="form-group">
                                <label for="inputGroupSelect07" class="">Tour Image:</label>
                                <input type="file" class="form-control" name="image[]" required id="">
                            </div>
                        </div>
                    </div>

                </div>

                <h6 style="display: block;width: 100%;text-align: left;">
                    Tour Description
                </h6>
                <div class="tab-pane fade show active" aria-labelledby="nav-home-tab">
                    <textarea id="editor" class="mb-3 editor" name="tour_description"></textarea>
                    <input type="hidden" name="">
                </div>

                <!--  <div class="form-row">
                    <div class="col-md-6" id="">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect00">Tour Type:</label>
                                </div>
                               
                                <select class="custom-select" id="tour_type" name="type_id" >
                                    <option value="">Choose Type</option>
                                        <?php foreach ($all_type as $type) {?>
                                    <option value="<?php echo $type['type_id']?>">
                                        <?php echo $type['type_name'];?>
                                    </option>
                                        <?php }?>
                                </select>
                            </div>
                        </div>
                    </div> 
                </div> -->
                
                <div class="optionBox">

                    <div class="block" style="text-align: left;display: none;">
                        <!--<span class="remove btn btn-danger" style="margin-bottom: 10px;">Remove Option</span>-->
                    </div>
                </div>

                <div class="form-row">
                    <h6 style="display: block;width: 100%;text-align: left;">
                        Accommodation
                    </h6>
                    <div class="col-md">
                        <label class="checkbox-inline" style="float: left;">
                            <input type="checkbox" name="all_inclusive" value="1"> All Inclusive
                        </label>
                    </div>
                </div>
                
                <div class="form-row">
                    
                    <h6 style="display: block;width: 100%;text-align: left;">
                        What's Included
                    </h6>
                    
                    
                    <div class="col-md">
                        <label class="checkbox-inline">
                            <input type="checkbox" name="insurance" value="1">Travel Insurance
                        </label>
                    </div>
                    <div class="col-md">
                        <label class="checkbox-inline">
                            <input type="checkbox" name="five_star_accommodation" value="1"> 5 Star Accommodation
                        </label>
                    </div>
                    <div class="col-md">
                        <label class="checkbox-inline">
                            <input type="checkbox" name="airport_transfer" value="1"> Airport Transfer
                        </label>
                    </div>
                    <div class="col-md">
                        <label class = "checkbox-inline">
                            <input type="checkbox" name="breakfast" value="1"> Breakfast
                        </label>
                    </div>
                    <div class="col-md">
                        <label class="checkbox-inline">
                            <input type="checkbox" name="personal_guide" value="1"> Personal Guide
                        </label>
                    </div>
                    <div class="col-md">
                        <label class="checkbox-inline">
                            <input type="checkbox" name="two_days_long_city_tour" value="1"> Two Days Long City Tour
                        </label>
                    </div>
                </div>
                
                <h6 style="text-align: left;">Related Tours</h6>
                <ul id="related_data" class="">
                    <?php $i = 1;foreach ($get_all_tour as $row) {?>
                    <li>
                        <input type="checkbox" id="hotel<?=$i?>" name="related_tour_id[]" value="<?php echo $row['tour_id'];?>"/>
                        <label for="hotel<?=$i?>">
                            <img src="uploads/tour/thumbnail/<?php echo $row['tour_image'];?>" alt=""/>
                            <div class="caption" style="padding: 0px; margin-top: 5px;">
                                <p>
                                    <?php echo $row['package_name'];?>
                                </p>
                            </div>
                        </label>
                    </li>
                    <?php $i++;}?>
                </ul>

            <!-- 
                <h6 style="text-align: left;">
                
                    <label class="checkbox-inline">
                        <input id="check" type="checkbox" name="is_discount" value="1"> Discount
                    </label> 
                </h6> 
                 
                <div id="discount_checkbox" class="form-row" style="display: none;">
                    <div class="col-md-6" id="tour_discount">
                        <div class="form-group">
                            <label for="inputGroupSelect07" class="">Discount Amount:</label>
                            <input type="text" class="form-control integerPositive" name="tour_discount" id="">
                        </div>
                    </div>
                </div> -->

               <div class="form-row">
                    
                    <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Upload Gallery</label>
                        <input type="file" multiple="" class="form-control" name="gallery_image[]">
                    </div>
                  </div>
                </div> 

                <ul class="list-inline">
                    <li class="list-inline-item">
                        <button type="submit" class="btn" id="add_tour">Submit</button>
                    </li>
                    <li class="list-inline-item">
                        <!--<button type="submit" class="btn">Cancel</button>-->
                        <a href="list-tour" class="btn" style="background-color: #737373;font-weight: 600;color: #e6e6e6;padding: 6px 30px;">Cancel</a>
                    </li>
                </ul>

            </form>
        </div><!-- end tour-listing-form -->
    </div><!-- end box -->
</div><!-- end in-content-wrapper -->

<input type="hidden" name="sentence_sequence" id="sentence_sequence" value="0">

<script>
    
    $("select[name='country_id[]']").change(function (){
        
    });
    
    function get_city(a){
        $.ajax({
            url: "tour/get_city_by_country",
            type: 'POST',
            data: {
                country_id: $( "#country_"+ a +" option:selected" ).val(),
                city_id: ''
            },
            success: function (response) {
                var obj = JSON.parse(response);
                $('#city_'+ a).html(obj);
            }
        })
    }
    
//    var id = 1;
    var prev_box_data = 0;
    $('#no_of_day').change(function () {
        var counter = $("#no_of_day").val();
        var j = 1;
        
        if(parseInt(counter - prev_box_data) >= 0) {
            for(var i = 1; i <= parseInt(counter - prev_box_data); i++){
                $("#sentence_sequence").val(parseInt(parseInt($("#sentence_sequence").val()) + 1));
                
                $('.block:last').after('<div class="block" style="text-align: left;">\n\
                                            <h6>Day '+ $("#sentence_sequence").val() +'</h6>\n\
                                            <div class="form-row">\n\
                                                <div class="col-md" id="country_id">\n\
                                                    <div class="form-group">\n\
                                                        <div class="input-group">\n\
                                                            <div class="input-group-prepend">\n\
                                                                <label class="input-group-text" for="inputGroupSelect00">Country:</label>\n\
                                                            </div>\n\
                                                            <select class="custom-select" id="country_'+ j +'" name="country_id[]" onchange="get_city('+ j +')">\n\
                                                                <option value="">Choose Country</option>\n\
                                                                <?php foreach ($all_country as $country) {?>\n\
                                                                <option value="<?php echo $country['id']?>">\n\
                                                                    <?php echo $country['name'];?>\n\
                                                                </option>\n\
                                                                <?php }?>\n\
                                                            </select>\n\
                                                        </div>\n\
                                                    </div>\n\
                                                </div>\n\
                                                <div class="col-md" id="city">\n\
                                                    <div class="form-group">\n\
                                                        <div class="input-group">\n\
                                                            <div class="input-group-prepend">\n\
                                                                <label class="input-group-text" for="inputGroupSelect01">City:</label>\n\
                                                            </div>\n\
                                                            <select class="custom-select select2" name="city[]" id="city_'+ j +'">\n\
                                                                \n\
                                                            </select>\n\
                                                            <i class="fas fa-angle-down"></i>\n\
                                                        </div>\n\
                                                    </div>\n\
                                                </div>\n\
                                            </div>\n\
                                            <div class="form-row">\n\
                                                <div class="col-md" id="tour_name">\n\
                                                    <div class="form-group">\n\
                                                        <label for="inputGroupSelect07" class="">Image:</label>\n\
                                                        <input type="file" class="form-control" name="userfile[]" required id="">\n\
                                                    </div>\n\
                                                </div>\n\
                                            </div>\n\
                                            <div class="form-group">\n\
                                                <textarea class="form-control textarea text-left p-3 h-100" name="tour_detail_text[]" id="exampleFormControlTextarea1" rows="2" placeholder="Tour Details"></textarea>\n\
                                            </div>\n\
                                            <div class="appenddata' + i + '"></div>\n\
                                        </div>');
                j++;
                
            }
        } else {
            var table_list = $(".block");
            var loop_count = parseInt($(".block").length) - (parseInt(counter) + 1);
            console.log(counter);
            
            for (var i = 0; i < loop_count; i++) {
                table_list[parseInt($(".block").length) - 1].remove();
            }
//            
            $("#sentence_sequence").val(counter);
        }
        
        prev_box_data = $("#sentence_sequence").val();
    });
    
    $('.optionBox').on('click', '.remove', function () {
        $(this).closest('.block').remove();
//        $(this).parent().remove();
    });


    $(document).on("input", ".integerPositive", function(event) {
        this.value = this.value.replace(/[^0-9]/g, '');
    });

    $("#check").click(function () {
        if ($('input#check').is(':checked')) {
            $("#discount_checkbox").show();
        } else {
            $("#discount_checkbox").hide();
        }
    })
</script>