<style>
    footer .widget .title-widget {
        font-size: 17px;
        margin-bottom: 30px;
        text-transform: capitalize;
        color: #a5a5a5;
    }

    .title-widget{
        text-align: left;
    }
    
    .explore-widget ul li .link, .top-deals-widget ul li .link{
        text-align: left;
    }
    
    .contact-us-widget .info-list ul li .link{
        text-align: left;
    }
    
    .booking-widget ul{
        margin-left: 0;
    }
    
    .btn-success {
        color: #fff;
        background-color: #28a745;
        border-color: #28a745;
    }
    
    .switch {
        position: relative;
        display: inline-block;
        width: 105px;
        height: 34px;
        margin-bottom: -14px;
    }

    .switch input {
        display:none;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ca2222;
        -webkit-transition: .4s;
        transition: .4s;
        border-radius: 34px;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 5px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
        border-radius: 50%;
    }

    input:checked + .slider {
        background-color: #2ab934;
    }

    input:focus + .slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(55px);
        left: 18%;
    }

    /*------ ADDED CSS ---------*/
    .slider:after {
        content: 'DISABLE';
        color: white;
        display: block;
        position: absolute;
        transform: translate(-50%,-50%);
        top: 50%;
        left: 62%;
        font-size: 11px;
        font-family: Verdana, sans-serif;
    }

    input:checked + .slider:after {  
        content: 'ENABLE';
        left: 38%;
    }
    
    .col-sm-3 {
        width: 25%;
        float: left;
    }
    
    .our-content .our-icon {
        color: #ffdd00;
    }
    
    .list-inline > li {
        display: inline-block;
        padding-right: 5px;
        padding-left: 5px;
    }
    
    .content-expert .caption-expert {
        background-color: #ffdd00;
    }
    
    .slick-next {
        right: -11px;
    }
    
    .slick-prev {
        left: -11px;
    }
    
    .logo-item{
        float: left;
    }
    
</style>

<div class="in-content-wrapper">
    <div class="row no-gutters">

        <div class="col">
            <div class="heading-messages">
                <h3>Footer Content</h3>
            </div><!-- End heading-messages -->
        </div><!-- End column -->
<!--        <div class="col-md-4">
            <div class="breadcrumb">
                <div class="breadcrumb-item"><i class="fas fa-angle-right"></i><a href="#">Listing</a>
                </div>
                <div class="breadcrumb-item active"><i class="fas fa-angle-right"></i>All
                </div>
            </div> end breadcrumb 
        </div> End column -->
    </div><!-- end row -->

    <div class="box" style="background-color: #fff">
        <div>
            <p style="margin-left: 18px;color: green;font-weight: 600;font-size: 14px;" id="success_msg">
                <?php echo $this->session->flashdata('success_msg');?>
            </p>
        </div>
        <div class="row no-gutters">
            <div class="col text-left">
            </div><!-- End column-->
            <div class="col text-right">
            </div><!-- End text-right-->

        </div><!-- end row -->
        <div class="row no-gutters">
            <div class="col">
                <footer>
                    
                    <?php 
                    $section_content = json_decode($get_info[0]['section_content'], true);
                    ?>
                    <div class="footer-main padding-top padding-bottom">
                        <div class="container">

                            <div class="row">
                                <div class="col-md">
                                    <h3 class="text text-left">Section 1</h3>
                                </div>
                                <div class="col-md" style="text-align: right;">
                                    <button class="btn btn-success edit_section" data-id="1">
                                        Edit
                                    </button>
                                </div>
                            </div>

                            <div class="footer-main-wrapper">
                                <a href="index.html" class="logo-footer">
                                    <img src="assets/frontend_asset/images/logo/logo-white-color-1.png" alt="" class="img-responsive" />
                                </a>
                                <div class="row">
                                    <div class="col-md-3 col-xs-5">
                                        <div class="contact-us-widget widget">
                                            <div class="title-widget">contact us</div>
                                            <div class="content-widget">
                                                <div class="info-list">
                                                    <ul class="list-unstyled">
                                                        <li>
                                                            <i class="icons fa fa-map-marker"></i>
                                                            <a href="#" class="link">
                                                                <?php echo $company_info['company_address']; ?>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <i class="icons fa fa-phone"></i>
                                                            <a href="#" class="link">
                                                                <?php echo $company_info['company_phone']; ?>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <i class="icons fa fa-envelope-o"></i>
                                                            <a href="#" class="link">
                                                                <?php echo $company_info['company_email']; ?>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-xs-3">
                                        <div class="booking-widget widget text-center">
                                            <div class="title-widget">book now</div>
                                            <div class="content-widget">
                                                <ul class="list-unstyled">
                                                    <li>
                                                        <a href="tour-homepage" class="link">Tour</a>
                                                    </li>
                                                    <li>
                                                        <a href="hotel-homepage" class="link">Hotel</a>
                                                    </li>
                                                    <li>
                                                        <a href="visa-homepage" class="link">Visa</a>
                                                    </li>
                                                    <li>
                                                        <a href="hajj-homepage" class="link">Hajj</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-xs-4">
                                        <div class="explore-widget widget">
                                            <div class="title-widget">
                                                explore
                                                <button class="btn" style="width: inherit;color: #fff;" data-toggle="modal" data-target="#edit_explore_modal">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                            </div>
                                            <div class="content-widget">
                                                <ul class="list-unstyled">
                                                    <?php foreach ($section_content['explore_content'] as $row) {?>
                                                    <li>
                                                        <a href="<?php echo $row['link'];?>" class="link">
                                                            <?php echo $row['title'];?>
                                                        </a>
                                                    </li>
                                                    <?php }?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-2 col-xs-6">
                                        <div class="top-deals-widget widget">
                                            <div class="title-widget">
                                                top deals
                                                <button class="btn" style="width: inherit;color: #fff;" data-toggle="modal" data-target="#edit_deals_modal">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                            </div>
                                            <div class="content-widget">
                                                <ul class="list-unstyled">
                                                    <?php $i = 0;foreach ($section_content['deals_content'] as $row) {?>
                                                    <li>
                                                        <a href="<?php echo $row['link'];?>" class="link">
                                                            <?php echo $row['title'];?>
                                                        </a>
                                                    </li>
                                                    <?php }?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-xs-6">
                                        <div class="destination-widget widget">
                                            <div class="title-widget">Destination</div>
                                            <div class="content-widget">
                                                <ul class="list-unstyled list-inline">
                                                    <li>
                                                        <a href="#" class="thumb">
                                                            <img src="assets/frontend_asset/images/footer/gallery-01.jpg" alt="" class="img-responsive" />
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="thumb">
                                                            <img src="assets/frontend_asset/images/footer/gallery-02.jpg" alt="" class="img-responsive" />
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="thumb">
                                                            <img src="assets/frontend_asset/images/footer/gallery-03.jpg" alt="" class="img-responsive" />
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="thumb">
                                                            <img src="assets/frontend_asset/images/footer/gallery-04.jpg" alt="" class="img-responsive" />
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="thumb">
                                                            <img src="assets/frontend_asset/images/footer/gallery-05.jpg" alt="" class="img-responsive" />
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="thumb">
                                                            <img src="assets/frontend_asset/images/footer/gallery-06.jpg" alt="" class="img-responsive" />
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php 
                    $section1_content = json_decode($get_info[1]['section_content'], true);
                    ?>

                    <div class="hyperlink">
                        <div class="container">

                            <div class="row">
                                <div class="col-md">
                                    <h3 class="text text-left">Section 2</h3>
                                </div>
                                <div class="col-md" style="text-align: right;">
                                    <label class="switch">
                                        <input type="checkbox" value="Footer - 2" id="togBtn" class="status" <?php if(isset($get_info[1]['is_enable']) && $get_info[1]['is_enable'] == 1){echo 'checked';}?>>
                                        <div class="slider round"></div>
                                    </label>

                                    <button class="btn btn-success" data-toggle="modal" data-target="#add_section_modal">
                                        Add
                                    </button>
                                </div>
                            </div>

                            <div class="slide-logo-wrapper">
                                <marquee style="margin-top: 20px;">
                                    <?php $i = 0;foreach ($section1_content['footer_image'] as $row) {?>
                                    <div class="logo-item">
                                        <button class="btn btn-info delete_image_data" data-id="Section 2 - <?= $i; ?>">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                        <a href="<?php echo $row['link'];?>" class="link">
                                            <img src="uploads/footer/thumbnail/<?php echo $row['image'];?>" alt="" class="img-responsive" />
                                        </a>
                                    </div>
                                    <?php $i++;}?>

                                </marquee>
                            </div>
                            <div class="social-footer">
                                <ul class="list-inline list-unstyled">
                                    <li>
                                        <a href="#" class="link facebook">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="link twitter">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="link pinterest">
                                            <i class="fa fa-pinterest-p"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="link google">
                                            <i class="fa fa-google"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="name-company">&copy; Developed by ABH World Traweb.</div>
                        </div>
                    </div>
                </footer>
                
            </div><!-- end column -->
        </div><!-- end row -->
    </div><!-- end box -->
</div>

<!-- Edit Modal -->
<div class="modal fade" id="section_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    
</div>

<!-- Add Modal -->
<div class="modal fade" id="add_section_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Footer Image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="section_4">
                <div class="modal-body">
                    <input type="hidden" name="page_name" value="Footer">
                    <input type="hidden" name="section" value="Section 2">

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputGroupSelect07" class="">Image:</label>
                            <input type="file" class="form-control" name="image[]" required id="" style="border: 1px solid #ced4da;" value="">
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label for="inputGroupSelect07" class="">Image Link:</label>
                            <input type="text" class="form-control" name="link" required id="" style="border: 1px solid #ced4da;" value="">
                        </div>
                        
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary save_section_btn" data-id="4">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Add Modal -->
<div class="modal fade" id="edit_explore_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Explore</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="edit_explore_data">
                <div class="modal-body">
                    
                    <input type="hidden" name="page_name" value="Footer">
                    <input type="hidden" name="section" value="Section 1">
                    <input type="hidden" name="type" value="explore">

                     <div class="optionBox">
                        <?php $i = 0;foreach ($section_content['explore_content'] as $row) {?>
                        <div class="block" style="text-align: left;">
                            <div class="form-row">
                                <div class="form-group col-md-5" style="margin-bottom: 10px;">
                                    <label for="inputGroupSelect07" class="">Title:</label>
                                    <input type="text" class="form-control" name="title[]" required id="" style="border: 1px solid #ced4da;" value="<?php echo $row['title'];?>">
                                </div>

                                <div class="form-group col-md-5" style="margin-bottom: 10px;">
                                    <label for="inputGroupSelect07" class="">Link:</label>
                                    <input type="text" class="form-control" name="link[]" required id="" style="border: 1px solid #ced4da;" value="<?php echo $row['link'];?>">
                                </div>
                                
                                <div class="form-group col-md-2" style="margin-bottom: 10px;">
                                    <?php if($i == 0){?>
                                        <span class="add btn btn-success" style="margin-top: 32px;width: inherit;border-radius: 5px;padding: 5px 8px;">Add</span>
                                    <?php } else {?>
                                        <span class="remove btn btn-danger" style="margin-top: 32px;color: #fff;background-color: #dc3545;border-color: #dc3545;width: inherit;border-radius: 5px;padding: 5px 8px;">X</span>
                                    <?php }?>
                                    
                                </div>

                            </div>
                        </div>
                        <?php $i++;}?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary save_explore_btn" data-id="4">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="edit_deals_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Top Deals</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="edit_deals_data">
                <div class="modal-body">
                    
                    <input type="hidden" name="page_name" value="Footer">
                    <input type="hidden" name="section" value="Section 1">
                    <input type="hidden" name="type" value="deals">

                     <div class="optionBox">
                        <?php $i = 0;foreach ($section_content['deals_content'] as $row) {?>
                        <div class="block" style="text-align: left;">
                            <div class="form-row">
                                <div class="form-group col-md-5" style="margin-bottom: 10px;">
                                    <label for="inputGroupSelect07" class="">Title:</label>
                                    <input type="text" class="form-control" name="title[]" required id="" style="border: 1px solid #ced4da;" value="<?php echo $row['title'];?>">
                                </div>

                                <div class="form-group col-md-5" style="margin-bottom: 10px;">
                                    <label for="inputGroupSelect07" class="">Link:</label>
                                    <input type="text" class="form-control" name="link[]" required id="" style="border: 1px solid #ced4da;" value="<?php echo $row['link'];?>">
                                </div>
                                
                                <div class="form-group col-md-2" style="margin-bottom: 10px;">
                                    <?php if($i == 0){?>
                                        <span class="add btn btn-success" style="margin-top: 32px;width: inherit;border-radius: 5px;padding: 5px 8px;">Add</span>
                                    <?php } else {?>
                                        <span class="remove btn btn-danger" style="margin-top: 32px;color: #fff;background-color: #dc3545;border-color: #dc3545;width: inherit;border-radius: 5px;padding: 5px 8px;">X</span>
                                    <?php }?>
                                    
                                </div>

                            </div>
                        </div>
                        <?php $i++;}?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary save_deals_btn">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    
    $(".edit_section").click(function () {
        $(this).attr('data-id');
        $.ajax({
            url: "admin/get_section_data",
            data: {
                id: $(this).attr('data-id'),
                type: "Contact Us"
            },
            type: 'POST',
            success: function (data) {
                var obj = JSON.parse(data);
                $("#section_modal").html(obj.section_modal_div);
                $('#section_modal').modal('show');
                if($("textarea").length > 0){
//                    CKEDITOR.replace( 'text' );
                    CKEDITOR.replace('text' ,{
                        filebrowserBrowseUrl: '/uploads/ckeditor_image?type=Images',
                        filebrowserUploadUrl: 'imageUpload',
                    });
                    CKEDITOR.replace('right_section_text' ,{
                        filebrowserBrowseUrl: '/uploads/ckeditor_image?type=Images',
                        filebrowserUploadUrl: 'imageUpload',
                    });
                }
            }
        });
    });
    
    $(".edit_person_data").click(function () {
        $(this).attr('data-id');
        $.ajax({
            url: "admin/get_person_data",
            data: {
                id: $(this).attr('data-id'),
                Section: "Contact Us"
            },
            type: 'POST',
            success: function (data) {
                var obj = JSON.parse(data);
                $("#section_modal").html(obj.section_modal_div);
                $('#section_modal').modal('show');
            }
        });
    });
    
    $(".delete_image_data").click(function () {
        $(this).attr('data-id');
        $.ajax({
            url: "admin/delete_image_data",
            data: {
                index_id: $(this).attr('data-id'),
                page_name: "Footer"
            },
            type: 'POST',
            success: function (data) {
                window.location.reload(1);
            }
        });
    });
    
    $(".edit_section3_data").click(function () {
        $(this).attr('data-id');
        $.ajax({
            url: "admin/get_section3_data",
            data: {
                id: $(this).attr('data-id'),
                Section: "Contact Us"
            },
            type: 'POST',
            success: function (data) {
                var obj = JSON.parse(data);
                $("#section_modal").html(obj.section_modal_div);
                $('#section_modal').modal('show');
            }
        });
    });
    
    $(document).on('click', '.save_section_btn', function(){
        var form_data = new FormData($("#section_"+$(this).attr('data-id'))[0]);
//        console.log(CKEDITOR.instances.editor1.getData());
        if($("textarea").length > 0){
            form_data.append('text', CKEDITOR.instances.editor1.getData());
        }
        $.ajax({
            url: "admin/save_footer_section",
            data: form_data,
            type: 'POST',
            processData: false,
            contentType: false,
            cache: false,
            enctype: 'multipart/form-data',
            success: function (data) {
                window.location.reload(1);
            }
        });
    });
    
    $('.status').change(function() {
        var is_enable = ''
        if($(this).is(":checked")) {
            is_enable = 1;
        } else {
            is_enable = 0;
        }
        
        $.ajax({
            url: "admin/update_section_status",
            data: {
                val: this.value,
                is_enable: is_enable
            },
            type: 'POST',
            success: function (data) {
                var obj = JSON.parse(data);
                $("#section_modal").html(obj.section_modal_div);
                $('#section_modal').modal('show');
            }
        });
    });
    
    var id = 1;
    $('.add').click(function () {
        id++;
//        alert(id);
        $('.block:last').after('<div class="block" style="text-align: left;">\n\
                                    <div class="form-row">\n\
                                        <div class="form-group col-md-5" style="margin-bottom: 10px;">\n\
                                            <label for="inputGroupSelect07" class="">Title:</label>\n\
                                            <input type="text" class="form-control" name="title[]" required id="" style="border: 1px solid #ced4da;" value="">\n\
                                        </div>\n\
                                        <div class="form-group col-md-5" style="margin-bottom: 10px;">\n\
                                            <label for="inputGroupSelect07" class="">Link:</label>\n\
                                            <input type="text" class="form-control" name="link[]" required id="" style="border: 1px solid #ced4da;" value="">\n\
                                        </div>\n\
                                        <div class="form-group col-md-2" style="margin-bottom: 10px;">\n\
                                            <span class="remove btn btn-danger" style="margin-top: 32px;color: #fff;background-color: #dc3545;border-color: #dc3545;width: inherit;border-radius: 5px;padding: 5px 8px;">X</span>\n\
                                        </div>\n\
                                    </div>\n\
                                </div>');
        $(".select2").select2();
    });
    
    $('.optionBox').on('click', '.remove', function () {
        $(this).closest('.block').remove();
//        $(this).parent().remove();
    });
    
    $("#submit_btn").click(function (){
        
        var form_data = new FormData($("#add_hotel_info")[0]);
        $(".error_msg").html('');
        
        $.ajax({
            url: "admin/update_content",
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
        });
    });
    
    $(document).on('click', '.save_explore_btn', function(){
        var form_data = new FormData($("#edit_explore_data")[0]);
        
        $.ajax({
            url: "admin/update_explore_content",
            type: 'POST',
            data: form_data,
            processData: false,
            contentType: false,
            success: function (response) {
                var obj = JSON.parse(response);
                
                if(obj.status == true) {
                    setTimeout(function() {
                        document.location.reload()
                    }, 2000);
                }
            }
        });
    });
    $(document).on('click', '.save_deals_btn', function(){
        var form_data = new FormData($("#edit_deals_data")[0]);
        
        $.ajax({
            url: "admin/update_explore_content",
            type: 'POST',
            data: form_data,
            processData: false,
            contentType: false,
            success: function (response) {
                var obj = JSON.parse(response);
                
                if(obj.status == true) {
                    setTimeout(function() {
                        document.location.reload();
                    }, 2000);
                }
            }
        });
    });
</script>