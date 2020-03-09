<style>
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
    
    .padding-bottom {
        padding-bottom: 210px;
    }
    
</style>

<div class="in-content-wrapper">
    <div class="row no-gutters">

        <div class="col">
            <div class="heading-messages">
                <h3>Home Page</h3>
            </div><!-- End heading-messages -->
        </div><!-- End column -->
        <div class="col-md-4">
            <div class="breadcrumb">
                <div class="breadcrumb-item"><i class="fas fa-angle-right"></i><a href="#">Listing</a>
                </div>
                <div class="breadcrumb-item active"><i class="fas fa-angle-right"></i>All
                </div>
            </div><!-- end breadcrumb -->
        </div><!-- End column -->
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
                <?php $section_content = json_decode($get_info[0]['section_content'], true);?>
                
                <style>
                    .contact-page {
                        background-image: url('uploads/<?php echo $section_content['background_image']?>');
                    }
                </style>

                <section class="page-banner contact-page">
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
                        <div class="page-title-wrapper">
                            <div class="page-title-content">
                                <ol class="breadcrumb">
                                    <li>
                                        <a href="index.html" class="link home">Home</a>
                                    </li>
                                    <li class="active">
                                        <a href="#" class="link">contact</a>
                                    </li>
                                </ol>
                                <div class="clearfix"></div>
                                <h2 class="captions">contact</h2>
                            </div>
                        </div>
                    </div>
                </section>

                <?php 
                $section1_content = json_decode($get_info[1]['section_content'], true);
                ?>
                <section class="padding-top padding-bottom contact-organization">
                    <div class="container">
                        <div class="row">
                            <div class="col-md">
                                <h3 class="text text-left">Section 2</h3>
                            </div>
                            <div class="col-md" style="text-align: right;">
                                <label class="switch">
                                    <input type="checkbox" value="Contact Us - 2" id="togBtn" class="status" <?php if(isset($get_info[1]['is_enable']) && $get_info[1]['is_enable'] == 1){echo 'checked';}?>>
                                    <div class="slider round"></div>
                                </label>

                                <button class="btn btn-success" data-toggle="modal" data-target="#add_section_modal">
                                    Add
                                </button>
                            </div>
                        </div>
                        <h3 class="title-style-2">Our organization</h3>
                        <div class="row">
                            <div class="wrapper-organization" style="width: 100%;">
                                
                                <?php $i = 0;foreach ($section1_content['person'] as $person) {?>
                                <div class="col-md-4 col-sm-4 col-xs-4 md-organization" style="float: left;">
                                    <div class="content-organization">
                                        
                                        <button class="btn btn-info edit_person_data" data-id="Section 2 - <?=$i;?>"><i class="fa fa-edit"></i></button>
                                        
                                        <div class="wrapper-img">
                                            <img src="uploads/contact_us_organization/thumbnail/<?php echo $person['image']?>" alt="" class="img img-responsive">
                                        </div>
                                        <div class="main-organization">
                                            <div class="organization-title">
                                                <a href="#" class="title">
                                                    <?php echo $person['name'];?>
                                                </a>
                                                <p class="text">
                                                    <?php echo $person['title'];?>
                                                </p>
                                            </div>
                                            <div class="content-widget">
                                                <div class="info-list">
                                                    <ul class="list-unstyled">
                                                        <li class="main-list">
                                                            <i class="icons fa fa-map-marker"></i>
                                                            <a class="link">
                                                                <?php echo $person['address'];?>
                                                            </a>
                                                        </li>
                                                        <li class="main-list">
                                                            <i class="icons fa fa-phone"></i>
                                                            <a href="#" class="link">
                                                                <?php echo $person['phone'];?>
                                                            </a>
                                                        </li>
                                                        <li class="main-list">
                                                            <i class="icons fa fa-envelope-o"></i>
                                                            <a href="#" class="link">
                                                                <?php echo $person['email_address'];?>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php $i++;}?>
                                
                            </div>
                        </div>
                    </div>
                </section>
                
                <form class="text-center" id="add_hotel_info" style="width: 100%;">
                
                    <input type="hidden" name="page_name" value="Contact Us">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6" style="float: left;">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="inputGroupSelect07" class="" style="display: block;text-align: left;">Page Title:</label>
                                        <input type="text" class="form-control" name="meta_title" value="<?php echo $contact_meta_content['meta_title'];?>" style="border: 1px solid #c6c6c6;">
                                    </div>
                                </div>
                            </div>


                            <?php $meta_keyword = explode(', ', $contact_meta_content['meta_keyword']);?>

                            <div class="col-md-6" style="float: left;">
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
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6" style="float: left;">
                                <label for="inputGroupSelect07" class="" style="display: block;text-align: left;">Meta Description:</label>
                                <textarea name="meta_description" class="form-control textarea text-left p-3 h-100" rows="2" placeholder="Meta Description" style="margin: 0px;border: 1px solid #c6c6c6;"><?php echo $contact_meta_content['meta_description']?></textarea>
                            </div>
                        </div>
                    </div>

                    <ul class="list-inline" style="margin-top: 20px;">
                        <li class="list-inline-item">
                            <button type="button" class="btn" id="submit_btn" style="background-color: #ff3333;color: #e6e6e6;">Submit</button>
                        </li>
                    </ul>

                </form>
                
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
                <h5 class="modal-title" id="exampleModalLabel">Add Organization Client Info</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="section_4">
                <div class="modal-body">
                    <input type="hidden" name="page_name" value="Contact Us">
                    <input type="hidden" name="section" value="Section 2">

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputGroupSelect07" class="">Name:</label>
                            <input type="text" class="form-control" name="name" required id="" style="border: 1px solid #ced4da;" value="">
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label for="inputGroupSelect07" class="">Title:</label>
                            <input type="text" class="form-control" name="title" required id="" style="border: 1px solid #ced4da;" value="">
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label for="inputGroupSelect07" class="">Address:</label>
                            <input type="text" class="form-control" name="address" required id="" style="border: 1px solid #ced4da;" value="">
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label for="inputGroupSelect07" class="">Phone:</label>
                            <input type="text" class="form-control" name="phone" required id="" style="border: 1px solid #ced4da;" value="">
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label for="inputGroupSelect07" class="">Email Address:</label>
                            <input type="text" class="form-control" name="email_address" required id="" style="border: 1px solid #ced4da;" value="">
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label for="inputGroupSelect07" class="">Image:</label>
                            <input type="file" class="form-control" name="image[]" required id="" style="border: 1px solid #ced4da;" value="">
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
                if($("textarea.editor").length > 0){
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
            url: "admin/get_contact_person_data",
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
        if($("textarea.editor").length > 0){
            form_data.append('text', CKEDITOR.instances.editor1.getData());
        }
        $.ajax({
            url: "admin/save_contact_us_section",
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
</script>