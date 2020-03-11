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
    
    #map{
        width: 100%;
        height: 250px;
    }
    
    #searchInput{
        top: 10px !important;
        padding: 10px;
        width: 300px;
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
                <div class="breadcrumb-item"><i class="fas fa-angle-right"></i><a href="list-hotel">Listing</a>
                </div>
                <div class="breadcrumb-item active"><i class="fas fa-angle-right"></i>Edit
                </div>
            </div><!-- end breadcrumb-->
        </div><!-- end column -->

    </div><!-- end row -->

    <div class="box">

        <div class="row">
            <div class="col">
                <div>
                    <p style="margin-left: 18px;color: green;font-weight: 600;font-size: 14px;">
                        <?php echo $this->session->flashdata('success_msg');?>
                    </p>
                </div>
                <div class="details-text">
                    <h4>Edit Details</h4>
                </div><!-- end details-text -->
            </div><!-- End column -->
        </div><!-- end row -->
        <div class="hotel-listing-form">
            <div id="error_message" style="margin-left: 43px;"></div>
            <div id="success_msg" style="margin-left: 43px;color: green;font-weight: 600;"></div>
            
            <form class="text-center" id="add_hotel_info">
                
                <input type="hidden" name="hotel_id" value="<?php echo $hotel_info[0]['id'];?>">
                
                <div class="form-row">
                    <div class="col-md" id="country_id">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect00">Country:</label>
                                </div>
                                <select class="custom-select" name="country_id" id="inputGroupSelect00">
                                    <option value="">Choose Country</option>
                                    <?php foreach ($all_country as $country) {?>
                                    <option value="<?php echo $country['id']?>"  <?php if($hotel_info[0]['country'] == $country['id']){echo 'selected';}?>>
                                        <?php echo $country['name'];?>
                                    </option>
                                    <?php }?>
                                </select>
                                <i class="fas fa-angle-down"></i>
                            </div>
                        </div><!-- end form-group -->
                    </div><!-- end column -->
                    <div class="col-md" id="city">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01">City:</label>
                                </div>
                                <select class="custom-select" id="city" name="city" id="">
                                    
                                </select>
                                <i class="fas fa-angle-down"></i>
                            </div>
                        </div><!-- end form-group -->
                    </div><!-- end column -->
                    
                </div><!-- end form-row -->
                <div class="form-row">
                    <div class="col-md" id="hotel_name">
                        <div class="form-group">
                            <label for="inputGroupSelect07" class="">Hotel Name:</label>
                            <input type="text" class="form-control" name="hotel_name" required id="" value="<?php echo $hotel_info[0]['hotel_name']?>">
                        </div><!-- end form-group -->
                    </div><!-- end column -->
                    
                </div><!-- end form-row -->
                <div class="form-row">
                    <div class="col-md" style="margin-bottom: 1rem;">
                        <nav>
                            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                              <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Hotel Description</a>
                              <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Hotel Address</a>
                              <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Hotel Facilities</a>
                              <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact1" role="tab" aria-controls="nav-contact" aria-selected="false">Hotel Itinerary</a>
                            </div>
                          </nav>
                          <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <textarea name="" id="editor" class="mb-3 editor"><?php echo $hotel_info[0]['hotel_description']?></textarea>
                                <input type="hidden" name="hotel_description">
                            </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <div class="form-group">
                                    <textarea class="form-control textarea text-left p-3 h-100" name="hotel_address" id="exampleFormControlTextarea1" rows="5" placeholder="Hotel Address" style="border: 1px solid #ccc"><?php echo $hotel_info[0]['hotel_address']?></textarea>
                                </div>
                                <div class="form-group">
                                    <input id="searchInput" class="controls" type="text" placeholder="Enter a location">
                                    <div id="map"></div>
                                    <ul id="geoData">
                                        <li style="display: none;">Full Address: <span id="location"></span></li>
                                        <li style="display: none;">Postal Code: <span id="postal_code"></span></li>
                                        <li style="display: none;">Country: <span id="country"></span></li>
                                        <li style="display: none;">Latitude: <span id="lat"></span></li>
                                        <li style="display: none;">Longitude: <span id="lon"></span></li>
                                    </ul>
                                </div>
                                <div class="form-row">
                                    <div class="col-md" id="">
                                        <div class="form-group">
                                            <label for="exampleInputuname">Longitude</label>
                                            <input type="text" class="form-control" id="longitude" name="longitude" value="<?php echo $hotel_info[0]['longitude']?>" readonly="">
                                        </div><!-- end form-group -->
                                    </div>
                                    <div class="col-md" id="">
                                        <div class="form-group">
                                            <label for="exampleInputuname">Latitude</label>
                                            <input type="text" class="form-control" id="latitude" name="latitude" value="<?php echo $hotel_info[0]['latitude']?>" readonly="">
                                        </div><!-- end form-group -->
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                <textarea name="hotel_facilities" id="editor" class="mb-3 editor"><?php echo $hotel_info[0]['hotel_facilities']?></textarea>
                            </div>
                            <div class="tab-pane fade" id="nav-contact1" role="tabpanel" aria-labelledby="nav-contact-tab">
                                <textarea name="hotel_itinerary" id="editor" class="mb-3 editor"><?php echo $hotel_info[0]['hotel_itinerary']?></textarea>
                            </div>
                            
                          </div>
                    </div>
                </div>
                
<!--                <div class="form-row">
                    <div class="col-md" id="airport_transfer">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect00">Airport Transfer:</label>
                                </div>
                                <select class="custom-select" name="airport_transfer" id="inputGroupSelect00">
                                    <option value="">Choose</option>
                                    <option value="1" <?php if($hotel_info[0]['is_airport_transfer'] == 1){echo 'selected';}?>>Yes</option>
                                    <option value="2" <?php if($hotel_info[0]['is_airport_transfer'] == 2){echo 'selected';}?>>No</option>
                                </select>
                                <i class="fas fa-angle-down"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md">
                        <div id="transportation_div" style="<?php if($hotel_info[0]['is_airport_transfer'] == 2){?>display: none;<?php }?>">
                            <div class="form-group">
                                <label for="inputGroupSelect07" class="">Transportation Cost:</label>
                                <input type="text" class="form-control" name="transfer_rate" required id="" value="<?php echo $hotel_info[0]['transfer_rate']?>">
                            </div>
                        </div>
                    </div>
                </div>-->
                
                <div class="form-row">
                    <div class="col-md">
                        <label for="inputGroupSelect07" class="" style="display: block;text-align: left;font-weight: 600;font-size: 16px;">Main Image:</label>
                        <input type="file" id="input-file-now" class="dropify" name="userfile[]" data-default-file="uploads/hotel/<?php echo $hotel_info[0]['hotel_image']?>"/>
                        <input type="hidden" name="prev_hotel_image" value="<?php echo $hotel_info[0]['hotel_image']?>">
                    </div>
                </div>
<!--                <div class="form-row">
                    <div class="col-md">
                        <label for="inputGroupSelect07" class="" style="display: block;text-align: left;font-weight: 600;font-size: 16px;">Main Image:</label>
                        <input type="file" id="input-file-now" class="dropify" name="userfile[]" data-default-file="uploads/hotel/<?php echo $hotel_images[0]['image']?>"/>
                    </div>
                </div>-->
<!--                <div class="form-row">
                    <div class="col-md">
                        <label for="inputGroupSelect07" class="" style="display: block;text-align: left;font-weight: 600;font-size: 16px;">Sub Images:</label>
                        <div  class="col-md-3" id="add_images_div" style="float: left;">
                            <a onclick="add_images()" style="cursor: pointer;">
                                <img id="add_img_div" onmouseover="image_hover('#f0f5f5')" onmouseout="image_hover('')" style="height: 150px; width: 150px;" src="<?= base_url() . 'uploads/add_images.png'; ?>"
                                     alt="">
                            </a>

                        </div>
                    </div>
                </div>-->

                <div class="form-row">
                    
                    <h6 style="display: block;width: 100%;text-align: left;">
                        Hotel Facilities
                    </h6>
                    
                    <div class="col-md">
                        <label class="checkbox-inline">
                            <input type="checkbox" name="restaurant" value="1" <?php if($hotel_info[0]['restaurant'] == 1){echo 'checked';}?>>  Restaurant
                        </label>
                    </div>
                    <div class="col-md">
                        <label class="checkbox-inline">
                            <input type="checkbox" name="swimming_pool" value="1" <?php if($hotel_info[0]['swimming_pool'] == 1){echo 'checked';}?>> Swimming Pool
                        </label>
                    </div>
                    <div class="col-md">
                        <label class="checkbox-inline">
                            <input type="checkbox" name="fitness_center" value="1" <?php if($hotel_info[0]['fitness_center'] == 1){echo 'checked';}?>> Fitness Center
                        </label>
                    </div>
                    
                    <div class="col-md">
                        <label class="checkbox-inline">
                            <input type="checkbox" name="service_room" value="1" <?php if($hotel_info[0]['service_room'] == 1){echo 'checked';}?>> Service Room
                        </label>
                    </div>
                    <div class="col-md">
                        <label class = "checkbox-inline">
                            <input type="checkbox" name="coffee_shop" value="1" <?php if($hotel_info[0]['coffee_shop'] == 1){echo 'checked';}?>> Coffee Shop
                        </label>
                    </div>
                    <div class="col-md">
                        <label class="checkbox-inline">
                            <input type="checkbox" name="wifi" value="1" <?php if($hotel_info[0]['wifi'] == 1){echo 'checked';}?>> Wifi Free
                        </label>
                    </div>
                </div>
                
                <div class="optionBox">
                    <div class="block" style="text-align: left;">
                        <span class="add btn btn-success" style="margin: 10px 0px;">Add Option</span>
                    </div>
                    <?php $i = 1;foreach ($room_detail_info as $room_detail) {?>
                    <input type="hidden" name="room_id[]" value="<?php echo $room_detail['room_detail_id']?>">
                    <div class="block" style="text-align: left;">
                        <h6>Serial <?php echo $i;?></h6>
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect00" style="width: 120px;">Room Type:</label>
                                        </div>
                                        <select class="custom-select" name="room_type[]" id="inputGroupSelect00">
                                            <option value="">Choose</option>
                                            <option value="1" <?php if($room_detail['room_type'] == 1){echo 'selected';}?>>Yes</option>
                                            <option value="2">No</option>
                                        </select>
                                        <i class="fas fa-angle-down"></i>
                                    </div>
                                </div><!-- end form-group -->
                            </div><!-- end column -->
                            <div class="col">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect00">Room Condition:</label>
                                        </div>
                                        <select class="custom-select" name="room_condition[]" id="inputGroupSelect00">
                                            <option value="">Choose</option>
                                            <option value="1" <?php if($room_detail['room_condition'] == 1){echo 'selected';}?>>AC</option>
                                            <option value="2" <?php if($room_detail['room_condition'] == 2){echo 'selected';}?>>Non-AC</option>
                                        </select>
                                        <i class="fas fa-angle-down"></i>
                                    </div>
                                </div><!-- end form-group -->
                            </div><!-- end column -->
                            <div class="col">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect00">Meal:</label>
                                        </div>
                                        <select class="custom-select" name="meal_type[]" id="inputGroupSelect00">
                                            <option value="">Choose</option>
                                            <option value="1" <?php if($room_detail['meal_type'] == 1){echo 'selected';}?>>Yes</option>
                                            <option value="2">No</option>
                                        </select>
                                        <i class="fas fa-angle-down"></i>
                                    </div>
                                </div><!-- end form-group -->
                            </div><!-- end column -->

                        </div>
                        
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="inputGroupSelect07" class="">No. Of Guest:</label>
                                    <input type="text" class="form-control" name="no_of_guest[]" required id="" value="<?php echo $room_detail['no_of_guest']?>">
                                </div><!-- end form-group -->
                            </div><!-- end column -->
                            <div class="col">
                                <div class="form-group">
                                    <label for="inputGroupSelect07" class="" style="width: 90px;">Adult:</label>
                                    <input type="text" class="form-control" name="no_of_adult[]" required id="" value="<?php echo $room_detail['no_of_adult']?>">
                                </div><!-- end form-group -->
                            </div><!-- end column -->
                            <div class="col">
                                <div class="form-group">
                                    <label for="inputGroupSelect07" class="" style="width: 90px;">Child:</label>
                                    <input type="text" class="form-control" name="no_of_child[]" required id="" value="<?php echo $room_detail['no_of_child']?>">
                                </div><!-- end form-group -->
                            </div><!-- end column -->

                            <div class="col">
                                <div class="form-group">
                                    <label for="inputGroupSelect07" class="" style="width: 90px;">Infant:</label>
                                    <input type="text" class="form-control" name="no_of_infant[]" required id="" value="<?php echo $room_detail['no_of_infant']?>">
                                </div><!-- end form-group -->
                            </div><!-- end column -->

                        </div>
                        
                        <div class="form-row">
                            
                            <div class="col-md">
                                <div id="transportation_div">
                                    <div class="form-group">
                                        <label for="inputGroupSelect07" class="">Rent Per Night:</label>
                                        <input type="text" class="form-control" name="rent_per_night[]" required id="" value="<?php echo $room_detail['rent_per_night']?>">
                                    </div><!-- end form-group -->
                                </div><!-- end form-group -->
                            </div><!-- end column -->
                            
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="inputGroupSelect07" class="">Room Image:</label>
                                    <input type="file" class="form-control" name="room_image[]" required id="">
                                </div>
                            </div>
                            
                        </div><!-- end form-row -->
                        
                        <div class="form-group">
                            <textarea class="form-control textarea text-left p-3 h-100" name="room_detail[]" id="exampleFormControlTextarea1" rows="2" placeholder="Room Details"><?php echo $room_detail['room_detail']?></textarea>
                        </div><!-- end form-group -->
                        
                        <div class="appenddata1"></div>
                        <?php if($i > 1){?>
                        <span class="remove btn btn-danger" style="margin-bottom: 10px;">Remove Option</span>
                        <?php }?>
                    </div>
                    <?php $i++;}?>

                </div>

                <ul class="list-inline">
                    <li class="list-inline-item">
                        <button type="button" class="btn" id="add_hotel">Submit</button>
                    </li>
                    <li class="list-inline-item">
                        <!--<button type="submit" class="btn">Cancel</button>-->
                        <a href="list-hotel" class="btn" style="background-color: #737373;font-weight: 600;color: #e6e6e6;padding: 6px 30px;">Cancel</a>
                    </li>
                </ul>

            </form>
        </div><!-- end hotel-listing-form -->
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
            <form action="hotel/update_image" method="post" enctype="multipart/form-data">
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
        get_city('<?php echo $hotel_info[0]['country']?>','<?php echo $hotel_info[0]['city']?>');
    });
    
    $("#add_hotel").click(function (){
        $('[name="hotel_description"]').val($( 'textarea.editor' ).val());
        // $('[name="hotel_address"]').val($( 'textarea.editor' ).val());
        $('[name="hotel_facilities"]').val($( 'textarea.editor' ).val());
        $('[name="hotel_itinerary"]').val($( 'textarea.editor' ).val());
//        form_data.append('hotel_overivew', editor.getData());
        var form_data = new FormData($("#add_hotel_info")[0]);
//        var content = $( 'textarea.editor' ).val();
//        console.log(editor.getData());
        $(".error_msg").html('');
        CKupdate();
        $.ajax({
            url: "hotel/save_hotel_info",
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
                    
                    window.location.href="<?php echo base_url();?>list-hotel";
                }
            }
        })
    });
    
    function CKupdate() {
        
        for (instance in CKEDITOR.instances){
            CKEDITOR.instances[instance].updateElement();
        }
    }
    
    $("[name='airport_transfer']").change(function (){
        if(this.value == 1){
            $("#transportation_div").show();
        } else {
            $("#transportation_div").hide();
        }
    });
    
    $("[name='country_id']").change(function (){
//        alert(this.value);
        get_city(this.value);
    });
    
    function get_city(country_id, city_id){
        $.ajax({
            url: "hotel/get_city_by_country",
            type: 'POST',
            data: {
                country_id: country_id,
                city_id: city_id
            },
            success: function (response) {
                var obj = JSON.parse(response);
                $('[name="city"]').html(obj);
            }
        })
    }
    
    var id = <?php echo count($room_detail_info);?>;
    $('.add').click(function () {
        id++;
//        alert(id);
        $('.block:last').after('<div class="block" style="text-align: left;">\n\
                                    <div class="form-row">\n\
                                        <div class="col">\n\
                                            <div class="form-group">\n\
                                                <div class="input-group">\n\
                                                    <div class="input-group-prepend">\n\
                                                        <label class="input-group-text" for="inputGroupSelect00">Room Type:</label>\n\
                                                    </div>\n\
                                                    <select class="custom-select" name="room_type['+id+'][]" id="inputGroupSelect00">\n\
                                                        <option value="">Choose</option>\n\
                                                        <option value="1">Yes</option>\n\
                                                        <option value="2">No</option>\n\
                                                    </select>\n\
                                                    <i class="fas fa-angle-down"></i>\n\
                                                </div>\n\
                                            </div>\n\
                                        </div>\n\
                                        <div class="col">\n\
                                            <div class="form-group">\n\
                                                <div class="input-group">\n\
                                                    <div class="input-group-prepend">\n\
                                                        <label class="input-group-text" for="inputGroupSelect00">Room Condition:</label>\n\
                                                    </div>\n\
                                                    <select class="custom-select" name="room_condition['+id+'][]" id="inputGroupSelect00">\n\
                                                        <option value="">Choose</option>\n\
                                                        <option value="1">AC</option>\n\
                                                        <option value="2">Non-AC</option>\n\
                                                    </select>\n\
                                                    <i class="fas fa-angle-down"></i>\n\
                                                </div>\n\
                                            </div>\n\
                                        </div>\n\
                                        <div class="col-md">\n\
                                            <div class="form-group">\n\
                                                <div class="input-group">\n\
                                                    <div class="input-group-prepend">\n\
                                                        <label class="input-group-text" for="inputGroupSelect00">Meal:</label>\n\
                                                    </div>\n\
                                                    <select class="custom-select" name="meal_type['+id+'][]" id="inputGroupSelect00">\n\
                                                        <option value="">Choose</option>\n\
                                                        <option value="1">Yes</option>\n\
                                                        <option value="2">No</option>\n\
                                                    </select>\n\
                                                    <i class="fas fa-angle-down"></i>\n\
                                                </div>\n\
                                            </div>\n\
                                        </div>\n\
                                    </div>\n\
                                    <div class="form-row">\n\
                                        <div class="col-md">\n\
                                            <div class="form-group">\n\
                                                <label for="inputGroupSelect07" class="">No. Of Guest:</label>\n\
                                                <input type="text" class="form-control" name="no_of_guest['+id+'][]" required id="">\n\
                                            </div>\n\
                                        </div>\n\
                                        <div class="col">\n\
                                            <div class="form-group">\n\
                                                <label for="inputGroupSelect07" class="" style="width: 90px;">Adult:</label>\n\
                                                <input type="text" class="form-control" name="no_of_adult['+id+'][]" required id="">\n\
                                            </div>\n\
                                        </div>\n\
                                        <div class="col">\n\
                                            <div class="form-group">\n\
                                                <label for="inputGroupSelect07" class="" style="width: 90px;">Child:</label>\n\
                                                <input type="text" class="form-control" name="no_of_child['+id+'][]" required id="">\n\
                                            </div>\n\
                                        </div>\n\
                                    </div>\n\
                                    <div class="form-row">\n\
                                        <div class="col-md">\n\
                                            <div id="transportation_div">\n\
                                                <div class="form-group">\n\
                                                    <label for="inputGroupSelect07" class="">Rent Per Night:</label>\n\
                                                    <input type="text" class="form-control" name="rent_per_night['+id+'][]" required id="">\n\
                                                </div>\n\
                                            </div>\n\
                                        </div>\n\
                                        <div class="col-md">\n\
                                            <div class="form-group">\n\
                                                <label for="inputGroupSelect07" class="">Room Image:</label>\n\
                                                <input type="file" class="form-control" name="room_image['+id+'][]" required id="">\n\
                                            </div>\n\
                                        </div>\n\
                                    </div>\n\
                                    <div class="form-group">\n\
                                        <textarea class="form-control textarea text-left p-3 h-100" name="room_detail['+id+'][]" id="exampleFormControlTextarea1" rows="2" placeholder="Room Details"></textarea>\n\
                                    </div>\n\
                                    <div class="appenddata' + id + '"></div>\n\
                                    <span class="remove btn btn-danger" style="margin-bottom: 10px;">Remove Option</span>\n\
                                </div>');
    
    });
    
    $('.optionBox').on('click', '.remove', function () {
        $(this).parent().remove();
    });
    
    function open_image_modal(image_id){
        
        $('#image_modal').modal('show'); 
        
        $("[name='image_id']").val(image_id);
    }
</script>

<script>
    function initMap() {
        var longitude = document.getElementById('longitude').value;
        var latitude = document.getElementById('latitude').value;

        var myLatlng = new google.maps.LatLng(latitude,longitude);
    //    alert(myLatlng);
        var map = new google.maps.Map(document.getElementById('map'), {
                    center: myLatlng,
                    zoom: 15
                  });
        var input = document.getElementById('searchInput');
    //    alert(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.bindTo('bounds', map);

        var infowindow = new google.maps.InfoWindow();
        var marker = new google.maps.Marker({
                        position: myLatlng,
                        map: map,
//                        anchorPoint: new google.maps.Point(0, -29),
                        draggable:true,
                    });
        
        map.addListener('click',function(event) {
            marker.setPosition(event.latLng);
            document.getElementById('latitude').value = event.latLng.lat();
            document.getElementById('longitude').value = event.latLng.lng();
            infowindow.setContent('Latitude: ' + event.latLng.lat() + '<br>Longitude: ' + event.latLng.lng());
            infowindow.open(map,marker);        
        });

        google.maps.event.addListener(marker,'dragend',function(event) {
            document.getElementById('latitude').value = event.latLng.lat();
            document.getElementById('longitude').value = event.latLng.lng();
            infowindow.setContent('Latitude: ' + event.latLng.lat() + '<br>Longitude: ' + event.latLng.lng());
            infowindow.open(map,marker);
        });

        autocomplete.addListener('place_changed', function() {
            infowindow.close();
            marker.setVisible(false);
            var place = autocomplete.getPlace();
            if (!place.geometry) {
                window.alert("Autocomplete's returned place contains no geometry");
                return;
            }

            // If the place has a geometry, then present it on a map.
            if (place.geometry.viewport) {
                map.fitBounds(place.geometry.viewport);
            } else {
                map.setCenter(place.geometry.location);
                map.setZoom(17);
            }
            /*
            marker.setIcon(({
                url: place.icon,
                size: new google.maps.Size(71, 71),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(17, 34),
                scaledSize: new google.maps.Size(35, 35)
            }));
            */
            marker.setPosition(place.geometry.location);
            marker.setVisible(true);

            var address = '';
            if (place.address_components) {
                address = [
                (place.address_components[0] && place.address_components[0].short_name || ''),
                (place.address_components[1] && place.address_components[1].short_name || ''),
                (place.address_components[2] && place.address_components[2].short_name || '')
                ].join(' ');
            }

            infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
            infowindow.open(map, marker);

            //Location details
            for (var i = 0; i < place.address_components.length; i++) {
                if(place.address_components[i].types[0] == 'postal_code'){
                    document.getElementById('postal_code').innerHTML = place.address_components[i].long_name;
                }
                if(place.address_components[i].types[0] == 'country'){
                    document.getElementById('country').innerHTML = place.address_components[i].long_name;
                }
            }
            document.getElementById('location').innerHTML = place.formatted_address;
            document.getElementById('latitude').value = place.geometry.location.lat();
            document.getElementById('longitude').value = place.geometry.location.lng();
        });
    }
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC9x8mCn5-P8XUl59uGqwmmcU6Alt1qza8&libraries=places&language=en&callback=initMap" async defer></script>