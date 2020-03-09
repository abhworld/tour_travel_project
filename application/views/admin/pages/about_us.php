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
                <h3>About Us Page</h3>
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
                <?php if($get_info[0]['is_enable'] == 1) {
                    $section_content = json_decode($get_info[0]['section_content'], true);?>

                <style>
                    .about-us-page {
                        background-image: url('uploads/<?php echo $section_content['background_image']?>');
                    }
                </style>

                <section class="page-banner about-us-page">
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
                                        <a href="home" class="link home">Home</a>
                                    </li>
                                    <li class="active">
                                        <a href="#" class="link">about us</a>
                                    </li>
                                </ol>
                                <div class="clearfix"></div>
                                <h2 class="captions">about us</h2>
                            </div>
                        </div>
                    </div>
                </section>
                <?php }?>
                
                <?php $section_content = json_decode($get_info[1]['section_content'], true);?>
                <section class="about-us layout-2 padding-top padding-bottom about-us-4">
                    <div class="container">
                        <div class="row">
                            <div class="col-md">
                                <h3 class="text text-left">Section 2</h3>
                            </div>
                            <div class="col-md" style="text-align: right;">
                                <label class="switch">
                                    <input type="checkbox" value="About Us - 2" id="togBtn" class="status" <?php if(isset($get_info[1]['is_enable']) && $get_info[1]['is_enable'] == 1){echo 'checked';}?>>
                                    <div class="slider round"></div>
                                </label>

                                <button class="btn btn-success edit_section" data-id="2">
                                    Edit
                                </button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="wrapper-contact-style">
                                <div class="col-lg-6 col-md-8">
                                    <h3 class="title-style-2">
                                        <?php echo $section_content['title']?>
                                    </h3>
                                    <div class="about-us-wrapper">
                                        <?php echo $section_content['text']?>
                                    </div>
                                </div>
                                <div data-wow-delay="0.4s" class="about-us-image wow zoomInRight">
                                    <img src="uploads/<?php echo $section_content['background_image']?>" alt="" class="img-responsive">
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                
                <?php $section3_content = json_decode($get_info[2]['section_content'], true);?>
                <section class="videos padding-top padding-bottom page-our-values">
                    <div class="container">
                        <div class="row">
                            <div class="col-md">
                                <h3 class="text text-left">Section 3</h3>
                            </div>
                            <div class="col-md" style="text-align: right;">
                                <label class="switch">
                                    <input type="checkbox" value="About Us - 3" id="togBtn" class="status" <?php if(isset($get_info[2]['is_enable']) && $get_info[2]['is_enable'] == 1){echo 'checked';}?>>
                                    <div class="slider round"></div>
                                </label>

<!--                                <button class="btn btn-success edit_section" data-id="2">
                                    Edit
                                </button>-->
                            </div>
                        </div>
                        <h3 class="title-style-2 white">Our Values</h3>
                        <div class="row">
                            <div class="our-wrapper">
                                <div class="col-sm-3 col-xs-3">
                                    <div class="our-content">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <i class="our-icon flaticon-cruise" style="float: left;"></i>
                                                <button class="btn btn-info edit_section3_data" data-id="Section 3 - 0"><i class="fa fa-edit"></i></button>
                                            </div>
                                        </div>
                                        <div class="main-our">
                                            <p class="our-title"><?php echo $section3_content['content'][0]['title'];?></p>
                                            <p class="text"><?php echo $section3_content['content'][0]['text'];?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3 col-xs-3">
                                    <div class="our-content">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <i class="our-icon flaticon-security-1" style="float: left;"></i>
                                                <button class="btn btn-info edit_section3_data" data-id="Section 3 - 1"><i class="fa fa-edit"></i></button>
                                            </div>
                                        </div>
                                        <div class="main-our">
                                            <p class="our-title"><?php echo $section3_content['content'][1]['title'];?></p>
                                            <p class="text"><?php echo $section3_content['content'][1]['text'];?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3 col-xs-3">
                                    <div class="our-content">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <i class="our-icon flaticon-direction" style="float: left;"></i>
                                                <button class="btn btn-info edit_section3_data" data-id="Section 3 - 2"><i class="fa fa-edit"></i></button>
                                            </div>
                                        </div>
                                        <div class="main-our">
                                            <p class="our-title"><?php echo $section3_content['content'][2]['title'];?></p>
                                            <p class="text"><?php echo $section3_content['content'][2]['text'];?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3 col-xs-3">
                                    <div class="our-content">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <i class="our-icon flaticon-food-3" style="float: left;"></i>
                                                <button class="btn btn-info edit_section3_data" data-id="Section 3 - 3"><i class="fa fa-edit"></i></button>
                                            </div>
                                        </div>
                                        <div class="main-our">
                                            <p class="our-title"><?php echo $section3_content['content'][3]['title'];?></p>
                                            <p class="text"><?php echo $section3_content['content'][3]['text'];?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="our-wrapper">
                                <div class="col-sm-3 col-xs-3">
                                    <div class="our-content">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <i class="our-icon flaticon-transport-10" style="float: left;"></i>
                                                <button class="btn btn-info edit_section3_data" data-id="Section 3 - 4"><i class="fa fa-edit"></i></button>
                                            </div>
                                        </div>
                                        <div class="main-our">
                                            <p class="our-title"><?php echo $section3_content['content'][4]['title'];?></p>
                                            <p class="text"><?php echo $section3_content['content'][4]['text'];?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3 col-xs-3">
                                    <div class="our-content">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <i class="our-icon flaticon-people-6" style="float: left;"></i>
                                                <button class="btn btn-info edit_section3_data" data-id="Section 3 - 5"><i class="fa fa-edit"></i></button>
                                            </div>
                                        </div>
                                        <div class="main-our">
                                            <p class="our-title"><?php echo $section3_content['content'][5]['title'];?></p>
                                            <p class="text"><?php echo $section3_content['content'][5]['text'];?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3 col-xs-3">
                                    <div class="our-content">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <i class="our-icon flaticon-man" style="float: left;"></i>
                                                <button class="btn btn-info edit_section3_data" data-id="Section 3 - 6"><i class="fa fa-edit"></i></button>
                                            </div>
                                        </div>
                                        <div class="main-our">
                                            <p class="our-title"><?php echo $section3_content['content'][6]['title'];?></p>
                                            <p class="text"><?php echo $section3_content['content'][6]['text'];?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3 col-xs-3">
                                    <div class="our-content">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <i class="our-icon flaticon-food" style="float: left;"></i>
                                                <button class="btn btn-info edit_section3_data" data-id="Section 3 - 7"><i class="fa fa-edit"></i></button>
                                            </div>
                                        </div>
                                        <div class="main-our">
                                            <p class="our-title"><?php echo $section3_content['content'][7]['title'];?></p>
                                            <p class="text"><?php echo $section3_content['content'][7]['text'];?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                
                <section class="our-expert padding-top padding-bottom-50">
                    <div class="container">
                        
                        <div class="row">
                            <div class="col-md">
                                <h3 class="text text-left">Section 4</h3>
                            </div>
                            <div class="col-md" style="text-align: right;">
                                <label class="switch">
                                    <input type="checkbox" value="About Us - 4" id="togBtn" class="status" <?php if(isset($get_info[3]['is_enable']) && $get_info[3]['is_enable'] == 1){echo 'checked';}?>>
                                    <div class="slider round"></div>
                                </label>

                                <button class="btn btn-success" data-toggle="modal" data-target="#add_section_modal">
                                    Add
                                </button>
                            </div>
                        </div>
                        
                        <?php $section4_content = json_decode($get_info[3]['section_content'], TRUE);?>
                        <h3 class="title-style-2">our expert</h3>
                        <div class="wrapper-expert">
                            <?php $i = 0;foreach ($section4_content['person'] as $person) {?>
                            <div class="item content-expert">
                                
                                <button class="btn btn-info edit_person_data" data-id="Section 4 - <?=$i;?>"><i class="fa fa-edit"></i></button>
                                
                                <a href="#" class="img-expert">
                                    <img src="uploads/about_us_expert/thumbnail/<?php echo $person['image'];?>" alt="" class="img-responsive img">
                                </a>
                                
                                <div class="caption-expert">
                                    <a href="#" class="title">
                                        <?php echo $person['name'];?>
                                    </a>
                                    <p class="text">
                                        <?php echo $person['title'];?>
                                    </p>
                                    <ul class="social list-inline">
                                        <li>
                                            <a href="<?php echo $person['fb_link'];?>" class="social-expert">
                                                <i class="expert-icon fa fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo $person['twitter_link'];?>" class="social-expert">
                                                <i class="expert-icon fa fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo $person['pinterest_link'];?>" class="social-expert">
                                                <i class="expert-icon fa fa-pinterest-p"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo $person['google_link'];?>" class="social-expert">
                                                <i class="expert-icon fa fa-google"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <?php $i++;}?>
                            
                        </div>
                    </div>
                </section>
                
                <div class="about-tours padding-top padding-bottom">
                    <?php $section5_content = json_decode($get_info[4]['section_content'], true);?>
                    <style>
                        .about-tours {
                            background-image: url("uploads/<?php echo $section5_content['background_image']?>");
                        }
                    </style>
                    <div class="container">
                        
                        <div class="row">
                            <div class="col-md">
                                <h3 class="text text-left">Section 5</h3>
                            </div>
                            <div class="col-md" style="text-align: right;">
                                <label class="switch">
                                    <input type="checkbox" value="About Us - 5" id="togBtn" class="status" <?php if(isset($get_info[4]['is_enable']) && $get_info[4]['is_enable'] == 1){echo 'checked';}?>>
                                    <div class="slider round"></div>
                                </label>

                                <button class="btn btn-success edit_section" data-id="5">
                                    Edit
                                </button>
                            </div>
                        </div>
                        
                        <div class="wrapper-tours">
                            <div class="content-icon-tours">
                                <div class="content-tours">
                                    <i class="icon flaticon-people"></i>
                                    <div class="wrapper-thin">
                                        <span class="wrapper-icon-thin">
                                            <i class="icon-thin fa fa-circle-thin"></i>
                                        </span>
                                        <div class="tours-title">
                                            <?php echo $section5_content['happy_customer']?>
                                        </div>
                                    </div>
                                    <div class="text">Happy Customers</div>
                                </div>
                                <div class="content-tours">
                                    <i class="icon flaticon-suitcase"></i>
                                    <div class="wrapper-thin">
                                        <span class="wrapper-icon-thin">
                                            <i class="icon-thin fa fa-circle-thin"></i>
                                        </span>
                                        <div class="tours-title">
                                            <?php echo $section5_content['flight_to_travel']?>
                                        </div>
                                    </div>
                                    <div class="text">Flight To Travel</div>
                                </div>
                                <div class="content-tours">
                                    <i class="icon flaticon-two"></i>
                                    <div class="wrapper-thin">
                                        <span class="wrapper-icon-thin">
                                            <i class="icon-thin fa fa-circle-thin"></i>
                                        </span>
                                        <div class="tours-title">
                                            <?php echo $section5_content['hotel_to_stay']?>
                                        </div>
                                    </div>
                                    <div class="text">Hotel to stay</div>
                                </div>
                                <div class="content-tours">
                                    <i class="icon flaticon-transport"></i>
                                    <div class="wrapper-thin">
                                        <span class="wrapper-icon-thin">
                                            <i class="icon-thin fa fa-circle-thin"></i>
                                        </span>
                                        <div class="tours-title">
                                            <?php echo $section5_content['car_rental']?>
                                        </div>
                                    </div>
                                    <div class="text">Car Rental</div>
                                </div>
                                <div class="content-tours">
                                    <i class="icon flaticon-drink"></i>
                                    <div class="wrapper-thin">
                                        <span class="wrapper-icon-thin">
                                            <i class="icon-thin fa fa-circle-thin"></i>
                                        </span>
                                        <div class="tours-title">
                                            <?php echo $section5_content['awesome_tour']?>
                                        </div>
                                    </div>
                                    <div class="text">Awesome Tours</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <section class="wrapper-open-position padding-top padding-bottom">
                    <?php $section6_content = json_decode($get_info[5]['section_content'], TRUE);?>
                    <div class="container">
                        
                        <div class="row">
                            <div class="col-md">
                                <h3 class="text text-left">Section 6</h3>
                            </div>
                            <div class="col-md" style="text-align: right;">
                                <label class="switch">
                                    <input type="checkbox" value="About Us - 6" id="togBtn" class="status" <?php if(isset($get_info[5]['is_enable']) && $get_info[5]['is_enable'] == 1){echo 'checked';}?>>
                                    <div class="slider round"></div>
                                </label>

                                <button class="btn btn-success edit_section" data-id="6">
                                    Edit
                                </button>
                            </div>
                        </div>
                        
                        <div class="wrapper-position">
                            <h3 class="title-style-2">open position</h3>
                            <div class="content-position">
                                <div class="row">
                                    
                                    <div class="col-md-4 col-sm-12 col-xs-12">
                                        
                                        <div class="wrapper-llc">
                                            <div class="llc-title">
                                                <?php echo $section6_content['left_section_title'];?>
                                            </div>
                                            
                                            <?php echo $section6_content['left_section_text'];?>
                                            
                                        </div>
<!--                                        <a href="#" class="view-more">
                                            <span class="more">View our company page</span>
                                        </a>-->
                                    </div>
                                    
                                    <div class="col-md-8 col-sm-12 col-xs-12 main-right">
                                        <div class="content-open">
                                            <div class="main-position">
                                                <div class="img-position">
                                                    <a href="#" class="img-open">
                                                        <img src="uploads/<?php echo $section6_content['background_image'];?>" alt="" class="img-responsive">
                                                    </a>
                                                </div>
                                                
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="wrapper-text-excel">
                                                <div class="text-excel">
                                                    <?php echo $section6_content['right_section_title'];?>
                                                </div>
                                                
                                                <?php echo $section6_content['right_section_text'];?>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                
<!--                <section class="about-banner">
                    <div class="container">
                        
                        <div class="row">
                            <div class="col-md">
                                <h3 class="text text-left">Section 7</h3>
                            </div>
                            <div class="col-md" style="text-align: right;">
                                <label class="switch">
                                    <input type="checkbox" value="About Us - 7" id="togBtn" class="status" <?php if(isset($get_info[6]['is_enable']) && $get_info[6]['is_enable'] == 1){echo 'checked';}?>>
                                    <div class="slider round"></div>
                                </label>

                                <button class="btn btn-success add_section_data" data-id="7">
                                    Add
                                </button>
                            </div>
                        </div>
                        
                        <h3 class="title-style-2">OUR INVESTORS RELATIONS</h3>
                        <div class="wrapper-banner">
                            <div class="content-banner">
                                <a href="#" class="img-banner">
                                    <img src="assets/frontend_asset/images/logo/about-banner-1.png" alt="" class="img-responsive">
                                </a>
                                <a href="#" class="img-banner">
                                    <img src="assets/frontend_asset/images/logo/about-banner-4.png" alt="" class="img-responsive">
                                </a>
                            </div>
                            <div class="content-banner">
                                <a href="#" class="img-banner">
                                    <img src="assets/frontend_asset/images/logo/about-banner-2.png" alt="" class="img-responsive">
                                </a>
                                <a href="#" class="img-banner">
                                    <img src="assets/frontend_asset/images/logo/about-banner-5.png" alt="" class="img-responsive">
                                </a>
                            </div>
                            <div class="content-banner">
                                <a href="#" class="img-banner">
                                    <img src="assets/frontend_asset/images/logo/about-banner-3.png" alt="" class="img-responsive">
                                </a>
                                <a href="#" class="img-banner">
                                    <img src="assets/frontend_asset/images/logo/about-banner-6.png" alt="" class="img-responsive">
                                </a>
                            </div>
                            <div class="content-banner">
                                <a href="#" class="img-banner">
                                    <img src="assets/frontend_asset/images/logo/about-banner-4.png" alt="" class="img-responsive">
                                </a>
                                <a href="#" class="img-banner">
                                    <img src="assets/frontend_asset/images/logo/about-banner-1.png" alt="" class="img-responsive">
                                </a>
                            </div>
                            <div class="content-banner">
                                <a href="#" class="img-banner">
                                    <img src="assets/frontend_asset/images/logo/about-banner-5.png" alt="" class="img-responsive">
                                </a>
                                <a href="#" class="img-banner">
                                    <img src="assets/frontend_asset/images/logo/about-banner-2.png" alt="" class="img-responsive">
                                </a>
                            </div>
                            <div class="content-banner">
                                <a href="#" class="img-banner">
                                    <img src="assets/frontend_asset/images/logo/about-banner-6.png" alt="" class="img-responsive">
                                </a>
                                <a href="#" class="img-banner">
                                    <img src="assets/frontend_asset/images/logo/about-banner-3.png" alt="" class="img-responsive">
                                </a>
                            </div>
                        </div>
                    </div>
                </section>-->
                
                <form class="text-center" id="add_hotel_info" style="width: 100%;">
                
                    <input type="hidden" name="page_name" value="About Us">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6" style="float: left;">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="inputGroupSelect07" class="" style="display: block;text-align: left;">Page Title:</label>
                                        <input type="text" class="form-control" name="meta_title" value="<?php echo $about_meta_content['meta_title'];?>" style="border: 1px solid #c6c6c6;">
                                    </div>
                                </div>
                            </div>


                            <?php $meta_keyword = explode(', ', $about_meta_content['meta_keyword']);?>

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
                                <textarea name="meta_description" class="form-control textarea text-left p-3 h-100" rows="2" placeholder="Meta Description" style="margin: 0px;border: 1px solid #c6c6c6;"><?php echo $about_meta_content['meta_description']?></textarea>
                            </div>
                        </div>
                    </div>

                    <ul class="list-inline" style="margin-top: 20px;">
                        <li class="list-inline-item">
                            <button type="button" class="btn" id="submit_btn" style="background-color: #ff3333;color: #e6e6e6;">Submit</button>
                        </li>
                    </ul>

                </form>
                
            </div>
        </div>
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
                <h5 class="modal-title" id="exampleModalLabel">Edit Section</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="section_4">
                <div class="modal-body">
                    <input type="hidden" name="page_name" value="About Us">
                    <input type="hidden" name="section" value="Section 4">

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
                            <label for="inputGroupSelect07" class="">Facebook Link:</label>
                            <input type="text" class="form-control" name="fb_link" required id="" style="border: 1px solid #ced4da;" value="">
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label for="inputGroupSelect07" class="">Twitter Link:</label>
                            <input type="text" class="form-control" name="twitter_link" required id="" style="border: 1px solid #ced4da;" value="">
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label for="inputGroupSelect07" class="">Pinterest Link:</label>
                            <input type="text" class="form-control" name="pinterest_link" required id="" style="border: 1px solid #ced4da;" value="">
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label for="inputGroupSelect07" class="">Google Link:</label>
                            <input type="text" class="form-control" name="google_link" required id="" style="border: 1px solid #ced4da;" value="">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="inputGroupSelect07" class="">Image:</label>
                            <input type="file" class="form-control" name="image[]" required id="" style="border: 1px solid #ced4da;">
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
                type: "About Us"
            },
            type: 'POST',
            success: function (data) {
                var obj = JSON.parse(data);
                $("#section_modal").html(obj.section_modal_div);
                $('#section_modal').modal('show');
                if($("textarea.editor1").length > 0){
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
                Section: "About Us"
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
                Section: "About Us"
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
        if($("textarea.editor1").length > 0){
            form_data.append('text', CKEDITOR.instances.editor1.getData());
        }
        $.ajax({
            url: "admin/save_about_us_section",
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