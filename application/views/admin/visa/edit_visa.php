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
                <h3>Vias Add</h3>
            </div><!-- End heading-messages -->
        </div><!-- End column -->
        <div class="col-md-4">
            <div class="breadcrumb">
                <div class="breadcrumb-item"><i class="fas fa-angle-right"></i><a href="list-visa">Listing</a>
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
            
            <form class="text-center" id="add_visa_info">
                <input type="hidden" name="visa_id" value="<?php echo $visa_info[0]['visa_id']?>">
                <div class="form-row">
                    <div class="col-md">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect00">Continents:</label>
                                </div>
                                <select class="custom-select" id="continent_id" name="continent_id">
                                    <option value="">Choose Continent</option>
                                    <?php foreach ($continents as $continent) {?>
                                    <option value="<?php echo $continent['continent_id']?>" <?php if($visa_info[0]['continent_id'] == $continent['continent_id']){echo 'selected';}?>>
                                        <?php echo $continent['continent_name'];?>
                                    </option>
                                    <?php }?>
                                </select>
                                <!--<i class="fas fa-angle-down"></i>-->
                            </div>
                        </div><!-- end form-group -->
                    </div>
                </div>
                <div class="form-row">
                 
                    <div class="col-md">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect00">Country:</label>
                                </div>
                                <select class="custom-select" id="country_id" name="country_id" onchange="get_city('1')">
                                    <option value="">Choose Country</option>
                                    <?php foreach ($all_country as $country) {?>
                                    <option value="<?php echo $country['id']?>" <?php if($visa_info[0]['country_id'] == $country['id']){echo 'selected';}?>>
                                        <?php echo $country['name'];?>
                                    </option>
                                    <?php }?>
                                </select>
                                <!--<i class="fas fa-angle-down"></i>-->
                            </div>
                        </div><!-- end form-group -->
                    </div>
                    
                    <div class="col-md" style="text-align: left;">
                        <div class="form-group">
                            <label for="inputGroupSelect07" class="">Image:</label>
                            <input type="file" class="form-control" name="images[]" required id="">
                            <input type="hidden" class="form-control" name="prev_image" value="<?php echo $visa_info[0]['image']?>">
                        </div>
                        
                        <img src="uploads/visa/<?php echo $visa_info[0]['image']?>" alt="" style="width: 100px;">
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="col-md" style="margin-bottom: 1rem;">
                        <nav>
                            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                              <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-itinerary" role="tab" aria-controls="nav-home" aria-selected="true">Description</a>
                              <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-included" role="tab" aria-controls="nav-profile" aria-selected="false">Facilities</a>
                              <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-excluded" role="tab" aria-controls="nav-contact" aria-selected="false">Itinerary</a>
                            </div>
                        </nav>
                        <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-itinerary" role="tabpanel" aria-labelledby="nav-home-tab">
                                <textarea name="" class="mb-3 itinerary"><?php echo $visa_info[0]['description']?></textarea>
                                <input type="hidden" name="description">
                            </div>
                            <div class="tab-pane fade" id="nav-included" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <div class="form-group">
                                    <textarea name="" class="mb-3 included"><?php echo $visa_info[0]['facilities']?></textarea>
                                    <input type="hidden" name="facilities">
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-excluded" role="tabpanel" aria-labelledby="nav-contact-tab">
                                <textarea name="" class="mb-3 excluded"><?php echo $visa_info[0]['itinerary']?></textarea>
                                <input type="hidden" name="itinerary">
                            </div>
                        </div><!-- end detail-tabs -->
                    </div><!-- end column -->
                    
                </div>
                
                
                <ul class="list-inline">
                    <li class="list-inline-item">
                        <button type="button" class="btn" id="add_visa">Submit</button>
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


<script>
    $("#add_visa").click(function (){
        $('[name="description"]').val($( 'textarea.itinerary' ).val());
        $('[name="facilities"]').val($( 'textarea.included' ).val());
        $('[name="itinerary"]').val($( 'textarea.excluded' ).val());

        var form_data = new FormData($("#add_visa_info")[0]);
        
        $(".error_msg").html('');
        $.ajax({
            url: "visa/save_visa_info",
            type: 'POST',
            processData: false,
            contentType: false,
            cache: false,
            enctype: 'multipart/form-data',
            data: form_data,
            success: function (response) {
                var obj = JSON.parse(response);
                
                if(obj.status == true){
                    $("#success_msg").show();
                    $("#success_msg").html('Account Info Updated Successfully');
                    
                    setTimeout(function() {
                        window.location.href="<?php echo base_url();?>list-visa";
                    }, 2000);
                } else {
                    $.each(obj.errors, function(key, val) {
                        $('#error_message').append("<div><small class='error_msg' style='font-weight: bold;color: red;'>" + val + "</small></div>");
                    });
                }
            }
        })
    });
    
    
</script>
