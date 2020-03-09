<style>
/*    .btn{
        color: white;
    }
    
    .btn:hover {
        color: #3c3c3c;
        border: 1px solid #fff;
        background-color: #fff;
    }*/

    .modal-body ul {
        list-style-type: none;
    }

    .modal-body li {
        display: inline-block;
    }

    .modal-body input[type="checkbox"][id^="cb"] {
        display: none;
    }
    
    .modal-body input[type="checkbox"][id^="tour"] {
        display: none;
    }

    #setTourModal .modal-body label, #setHotelModal .modal-body label {
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

    .modal-body label::before {
        background-color: white;
        color: white;
        content: " ";
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
        transform: scale(0);
    }

    .modal-body label img {
        height: 100px;
        width: 100px;
        transition-duration: 0.2s;
        transform-origin: 50% 50%;
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
    
    .btn-success {
        color: #fff;
        background-color: #28a745;
        border-color: #28a745;
    }
    
    .traveler{
        float: left;
    }
    
    .hero-area.owl-carousel.owl-theme .owl-nav {
	    margin: 0;
    }

    .hero-area.owl-carousel.owl-theme .owl-nav [class*=owl-prev] {
        right: auto;
        left: 0;
    }

    .hero-area.owl-carousel.owl-theme .owl-nav [class*=owl-] {
        height: 100px;
        line-height: 100px;
        -webkit-transition: all 500ms ease;
        -o-transition: all 500ms ease;
        transition: all 500ms ease;
        margin-top: -25px;
        top: 50%;
        font-size: 26px;
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
            </div>
            <div class="col text-right">
            </div>

        </div>
        
        <div class="row no-gutters">
            <?php 
            $section_content = json_decode($get_info[1]['section_content'], true);
            // echo '<pre>';print_r($section_content);
            ?>
            
            <div class="col-md">
                <h3 class="text text-left">Section 1</h3>
            </div>
            <div class="col-md" style="text-align: right;">
                <button class="btn btn-success" data-toggle="modal" data-target="#add_section_1_data">
                    Add
                </button>
            </div>
            
            <section class="hero-area owl-carousel owl-theme parallax-window" data-parallax="scroll">
                <?php $i = 1;foreach($section_content['section_content'] as $row) {?>
                    <div class="page-banner homepage-default" style="background-image:url(<?php echo base_url(); ?>uploads/home/section1/thumbnail/<?php echo $row['background_image'] ?>);">
                        <div class="container">
                            
                            <div class="row">
                                <div class="col-md" style="text-align: right;">
                                    <button class="btn btn-success edit_slider_section" data-id="Section 1 - <?php echo $i;?>">
                                        Edit
                                    </button>
                                </div>
                            </div>
                            
                            <div class="homepage-banner-warpper">
                                <div class="homepage-banner-content">
                                    <div class="group-title">
                                        <h1 class="title">
                                            <?php echo $row['title']?>
                                        </h1>
                                        <p class="text">
                                            <?php echo $row['text']?>                      
                                            <span class="boder" style="width: 170px;"></span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php $i++;}?>
                
            </section>
            
            <section class="about-us layout-1 padding-top padding-bottom">
                <?php $section2_content = json_decode($get_info[2]['section_content'], true);?>
                <div class="container">
                    <div class="row">
                        <div class="col-md">
                            <h3 class="text text-left">Section 2</h3>
                        </div>
                        <div class="col-md" style="text-align: right;">
                            <label class="switch">
                                <input type="checkbox" value="Home - 2" id="togBtn" class="status" <?php if(isset($get_info[2]['is_enable']) && $get_info[2]['is_enable'] == 1){echo 'checked';}?>>
                                <div class="slider round"></div>
                            </label>
                            <button class="btn btn-success edit_section" data-id="2">
                                Edit
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-7">
                            <div class="group-title">
                                <div class="sub-title">
                                    <p class="text">
                                        <?php echo $section2_content['sub_title']?>
                                    </p>
                                    <i class="icons flaticon-people"></i>
                                </div>
                                <h2 class="main-title">
                                    <?php echo $section2_content['title']?>
                                </h2>
                            </div>
                            <div class="about-us-wrapper">
                                <?php echo $section2_content['text']?>
                                
                                <div class="group-button">
                                    <!--<a href="tour-result.html" class="btn btn-maincolor">purchase now</a>-->
                                    <a href="about-us" class="btn">read more</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div data-wow-delay="0.5s" class="about-us-image wow zoomIn" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;">
                                <img src="uploads/thumbnail/<?php echo $section2_content['background_image']?>" alt="" class="img-responsive">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
            <section class="tours padding-top padding-bottom">
                <?php $section3_content = json_decode($get_info[3]['section_content'], true);?>
                <style>
                    .tours {
                        background-image: url("uploads/<?php echo $section3_content['background_image']?>");
                    }
                </style>
                <div class="container">
                    <div class="row">
                        <div class="col-md">
                            <h3 class="text text-left">Section 3</h3>
                        </div>
                        <div class="col-md" style="text-align: right;">
                            <label class="switch">
                                <input type="checkbox" value="Home - 3" id="togBtn" class="status" <?php if(isset($get_info[3]['is_enable']) && $get_info[3]['is_enable'] == 1){echo 'checked';}?>>
                                <div class="slider round"></div>
                            </label>
                            
                            <button class="btn btn-info" style="color: #fff;background-color: #17a2b8;border-color: #17a2b8;" data-toggle="modal" data-target="#setTourModal">
                                Set Tours
                            </button>
                            <button class="btn btn-success edit_section" data-id="3">
                                Edit
                            </button>
                        </div>
                    </div>
                    
                    <div class="tours-wrapper">
                        <div class="group-title">
                            <div class="sub-title">
                                <p class="text">
                                    <?php echo $section3_content['text']?>
                                </p>
                                <i class="icons flaticon-people"></i>
                            </div>
                            <h2 class="main-title">
                                <?php echo $section3_content['title']?>
                            </h2>
                        </div>
                        <div class="tours-content margin-top70">
                            <div class="tours-list slick-initialized slick-slider">
                                <div aria-live="polite" class="slick-list draggable">
                                    <div class="slick-track" style="opacity: 1; width: 780px; left: 0px;" role="listbox">
                                        <?php $explode_tour_data = explode(',', $section3_content['tour_id']);
                                        foreach ($get_all_tour as $row) {
                                            if(in_array($row['tour_id'], $explode_tour_data)){?>
                                        <div class="tours-layout slick-slide slick-current slick-active" data-slick-index="0" aria-hidden="false" style="width: 360px;" tabindex="-1" role="option" aria-describedby="slick-slide10">
                                            <div class="image-wrapper">
                                                <a href="tour-view/<?php echo str_replace(' ', '-', strtolower($row['package_name']));?>" class="link" tabindex="0">
                                                    <img src="uploads/tour/thumbnail/<?php echo $row['tour_image'];?>" alt="" class="img-responsive">
                                                </a>
                                                <div class="title-wrapper">
                                                    <a href="tour-view/<?php echo str_replace(' ', '-', strtolower($row['package_name']));?>" class="title" tabindex="0">
                                                        <?php echo $row['package_name'];?>
                                                    </a>
                                                    <i class="icons flaticon-circle"></i>
                                                </div>
                                            </div>
                                            <div class="content-wrapper">

                                                <div class="content" style="margin: 0px;">

                                                    <div class="title">
                                                        <div class="price">
                                                            
                                                            <span class="number">
                                                                <?php echo $row['tour_price'];?>
                                                            </span>
                                                            <sup>&#x9f3;</sup>
                                                        </div>
                                                        <p class="for-price">
                                                            <?php echo $row['no_of_day'];?> days
                                                        </p>
                                                    </div>

                                                    <p class="text"></p>

                                                    <div class="group-btn-tours">
                                                        <a href="tour-view/<?php echo str_replace(' ', '-', strtolower($row['package_name']));?>" class="left-btn" style="border-radius: 50px;padding-right: 25px;" tabindex="0">
                                                            book now
                                                        </a>
                                                        <!--<a href="blog.html" class="right-btn">add to list</a>-->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php }}?>
                                    </div>
                                </div>
                            </div>
                            <a href="tour-homepage" class="btn btn-transparent margin-top70">more tours</a>
                        </div>
                    </div>
                </div>
            </section>
            
            <section class="videos layout-1">
                
                <?php $section4_content = json_decode($get_info[4]['section_content'], true);?>
                
                <div class="container">
                    <div class="row">
                        <div class="col-md">
                            <h3 class="text text-left">Section 4</h3>
                        </div>
                        <div class="col-md" style="text-align: right;">
                            <label class="switch">
                                <input type="checkbox" value="Home - 4" id="togBtn" class="status" <?php if(isset($get_info[4]['is_enable']) && $get_info[4]['is_enable'] == 1){echo 'checked';}?>>
                                <div class="slider round"></div>
                            </label>

                            <button class="btn btn-success edit_section" data-id="4">
                                Edit
                            </button>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-5">
                            <div class="video-wrapper padding-top padding-bottom">
                                <h5 class="sub-title">
                                    <?php echo $section4_content['sub_title']?>
                                </h5>
                                <h2 class="title">
                                    <?php echo $section4_content['title']?>
                                </h2>
                                <div class="text">
                                    <p><?php echo $section4_content['text']?></p>
                                </div>
                                <a href="tour-homepage" class="btn btn-maincolor">read more</a>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="video-thumbnail">
                                <div class="video-bg">
                                    <img src="assets/frontend_asset/images/homepage/video-bg.jpg" alt="" class="img-responsive">
                                </div>
                                <div class="video-button-play">
                                    <i class="icons fa fa-play"></i>
                                </div>
                                <div class="video-button-close"></div>
                                <?php 
                                $abc = $section4_content['video_url'];
                                preg_match_all('/src="([^"]+)"/', $section4_content['video_url'], $match);
            //                    echo '<pre>';print_r($match[1][0]);
                                ?>
                                <?php // echo $match[1][0];?>
                                <iframe src="<?php echo $match[1][0];?>?rel=0" allowfullscreen="allowfullscreen" class="video-embed"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
            <section class="hotels padding-top padding-bottom">
                
                <?php $section5_content = json_decode($get_info[5]['section_content'], true);?>
                <style>
                    .hotels {
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
                                <input type="checkbox" value="Home - 5" id="togBtn" class="status" <?php if(isset($get_info[5]['is_enable']) && $get_info[5]['is_enable'] == 1){echo 'checked';}?>>
                                <div class="slider round"></div>
                            </label>
                            
                            <!--<input type="checkbox" value="Home - 5" id="todo-check2" class="status" <?php if(isset($get_info[5]['is_enable']) && $get_info[5]['is_enable'] == 1){echo 'checked';}?>>-->
                            <button class="btn btn-info" style="color: #fff;background-color: #17a2b8;border-color: #17a2b8;" data-toggle="modal" data-target="#setHotelModal">
                                Set Hotels
                            </button>
                            <button class="btn btn-success edit_section" data-id="5">
                                Edit
                            </button>
                        </div>
                    </div>
                    
                    <div class="hotels-wrapper">
                        <div class="group-title">
                            <div class="sub-title">
                                <p class="text">
                                    <?php echo $section5_content['text'];?>
                                </p>
                                <i class="icons flaticon-people"></i>
                            </div>
                            <h2 class="main-title">
                                <?php echo $section5_content['title'];?>
                            </h2>
                        </div>
                        <div class="hotels-content margin-top70">
                            <div class="row hotels-list">
                                <?php $explode_hotel_data = explode(',', $section5_content['hotel_id']);
                                foreach ($get_all_hotel as $row) {
                                    if(in_array($row['id'], $explode_hotel_data)){?>
                                <div class="col-sm-6">
                                    <div class="hotels-layout">
                                        <div class="image-wrapper" style="width: 50%;">
                                            <a href="hotel-view/<?php echo str_replace(' ', '-', strtolower($row['hotel_name']));?>" class="link">
                                                <img src="uploads/hotel/thumbnail/<?php echo $row['hotel_image']?>" alt="" class="img-responsive">
                                            </a>
                                            <div class="title-wrapper">
                                                <a href="hotel-view/<?php echo str_replace(' ', '-', strtolower($row['hotel_name']));?>" class="title">
                                                    <?php echo $row['hotel_name']?>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="content-wrapper">
                                            <div class="content" style="margin: 0px;">
                                                <div class="title">
                                                    <div class="price">
                                                        <span class="number" style="font-size: 30px;">
                                                            <?php echo get_lowest_price($row['id'])?>
                                                        </span>
                                                        <sup>&#x9f3;</sup>
                                                    </div>
                                                    <p class="for-price">per night</p>
                                                </div>
                                                <p class="text">
                                                    <?php echo substr(strip_tags($row['hotel_overview']), 0, 50)?>
                                                </p>
                                                <div class="group-btn-tours">
                                                    <a href="hotel-view/<?php echo str_replace(' ', '-', strtolower($row['hotel_name']));?>" class="left-btn">book now</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php }}?>
                            </div>
                            <a href="hotel-homepage" class="btn btn-transparent margin-top70">more hotel</a>
                        </div>
                    </div>
                </div>
            </section>
            
            <section class="travelers">
                <?php 
                $section6_content = json_decode($get_info[6]['section_content'], true);
//                echo '<pre>';print_r($section6_content['person']);
                ?>
                <div class="container">
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-md">
                            <h3 class="text text-left">Section 6</h3>
                        </div>
                        <div class="col-md" style="text-align: right;">
                            <label class="switch">
                                <input type="checkbox" value="Home - 6" id="togBtn" class="status" <?php if(isset($get_info[6]['is_enable']) && $get_info[6]['is_enable'] == 1){echo 'checked';}?>>
                                <div class="slider round"></div>
                            </label>
                            
                            <button class="btn btn-success" data-toggle="modal" data-target="#add_section_modal">
                                Add
                            </button>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-4">
                            <div class="traveler-wrapper padding-top padding-bottom">
                                <div class="group-title white">
                                    <div class="sub-title">
                                        <p class="text">RELAX AND ENJOY</p>
                                        <i class="icons flaticon-people"></i>
                                    </div>
                                    <h2 class="main-title">happy traveler</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="traveler-list">
                                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        <?php $i = 0;for($j = 0; $j < count($section6_content['person']); $j = $j + 2) {?>
                                        <div class="carousel-item <?php if($j == 0){echo 'active';}?>">
                                        <?php foreach ($section6_content['person'] as $key => $row) {?>
                                            
                                            
                                            <div class="traveler" style="width: 250px;">
                                                <button class="btn btn-info edit_person_data" data-id="Section 6 - <?=$i;?>"><i class="fa fa-edit"></i></button>
                                                <div class="cover-image">
                                                    <img src="uploads/home_happy_traveller/<?php echo $section6_content['person'][$i]['background_image'];?>" alt="">
                                                </div>
                                                <div class="wrapper-content">
                                                    <div class="avatar">
                                                        <img src="uploads/home_happy_traveller/<?php echo $section6_content['person'][$i]['image'];?>" alt="" class="img-responsive">
                                                    </div>
                                                    <p class="name"><?php echo $section6_content['person'][$i]['name'];?></p>
                                                    <p class="address"><?php echo $section6_content['person'][$i]['address'];?></p>
                                                    <p class="description">" <?php echo $section6_content['person'][$i]['review_text'];?>"</p>
                                                </div>
                                            </div>
                                        <?php $i++;if($i % 2 == 0){break;}}?>
                                        </div>
                                        <?php }?>
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
            <?php $section_content = json_decode($get_info[9]['section_content'], true);?>
            <section class="a-fact padding-top padding-bottom">
                <div class="container">
                    
                    <div class="row">
                        <div class="col-md">
                            <h3 class="text text-left">Section 7</h3>
                        </div>
                        <div class="col-md" style="text-align: right;">
                            <label class="switch">
                                <input type="checkbox" value="Home - 9" id="togBtn" class="status" <?php if(isset($get_info[9]['is_enable']) && $get_info[9]['is_enable'] == 1){echo 'checked';}?>>
                                <div class="slider round"></div>
                            </label>
                            <button class="btn btn-success edit_section" data-id="9">
                                Edit
                            </button>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-5">
                            <div class="group-title">
                                <div class="sub-title">
                                    <p class="text">
                                        <?php echo $section_content['sub_title'];?>
                                    </p>
                                    <i class="icons flaticon-people"></i>
                                </div>
                                <h2 class="main-title">
                                    <?php echo $section_content['title'];?>
                                </h2>
                            </div>
                            <div class="a-fact-wrapper">

                                <?php echo $section_content['text'];?>

                            </div>
                        </div>
                        <div class="col-md-7">
                            <div data-wow-delay="0.5s" class="about-us-image wow zoomIn">
                                <img src="uploads/thumbnail/<?php echo $section_content['background_image'];?>" alt="" class="img-responsive">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
            <form class="text-center" id="add_hotel_info" style="width: 100%;">
                
                <input type="hidden" name="page_name" value="Home">
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-6" style="float: left;">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="inputGroupSelect07" class="" style="display: block;text-align: left;">Page Title:</label>
                                    <input type="text" class="form-control" name="meta_title" value="<?php echo $home_meta_content['meta_title'];?>" style="border: 1px solid #c6c6c6;">
                                </div>
                            </div>
                        </div>
                    

                        <?php $meta_keyword = explode(', ', $home_meta_content['meta_keyword']);?>

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
                            <textarea name="meta_description" class="form-control textarea text-left p-3 h-100" rows="2" placeholder="Meta Description" style="margin: 0px;border: 1px solid #c6c6c6;"><?php echo $home_meta_content['meta_description']?></textarea>
                        </div>
                    </div>
                </div>
                
                <ul class="list-inline" style="margin-top: 20px;">
                    <li class="list-inline-item">
                        <button type="button" class="btn" id="submit_btn" style="background-color: #ff3333;color: #e6e6e6;">Submit</button>
                    </li>
                </ul>

            </form>
            
            
        </div><!-- end row -->
    </div><!-- end box -->
</div>

<!-- Add Section 1 Modal -->
<div id="add_section_1_data" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="display: block;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Section 1 Data</h4>
            </div>
            <form id="section_1">
                <div class="modal-body">
                    <input type="hidden" name="page_name" value="Home">
                    <input type="hidden" name="section" value="Section 1">

                    <div class="form-group">
                        <label for="inputGroupSelect07" class="">Title:</label>
                        <input type="text" class="form-control" name="title" required id="" style="border: 1px solid #ced4da;">
                    </div>
                    <div class="form-group">
                        <label for="inputGroupSelect07" class="">Text:</label>
                        <input type="text" class="form-control" name="slider_text" required id="" style="border: 1px solid #ced4da;">
                    </div>
                    <div class="form-group">
                        <label for="inputGroupSelect07" class="">Background Image:</label>
                        <input type="file" class="form-control" name="image[]" required id="" style="border: 1px solid #ced4da;">
                    </div>
                </div>
                <div class="modal-footer">
                    <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
                    <button type="button" class="btn btn-success save_section_btn" data-id="1" style="color: #fff;background-color: #28a745;border-color: #28a745;">Save changes</button>
                </div>
            </form>
        </div>

    </div>
</div>
<!-- End Add Section 1 Modal -->

<!-- Modal -->
<div class="modal fade" id="section_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    
</div>

<!-- Set Hotel Modal -->
<div id="setHotelModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="display: block;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Set Hotel</h4>
            </div>
            <form action="admin/set_hotel_data" method="post">
                <div class="modal-body">
                    <ul>
                        <?php $i = 1;foreach ($get_all_hotel as $row) {?>
                        <li>
                            <input type="checkbox" id="cb<?=$i?>" name="hotel_id[]" value="<?php echo $row['id'];?>" <?php if(in_array($row['id'], $explode_hotel_data)){echo 'checked';}?>/>
                            <label for="cb<?=$i?>">
                                <img src="uploads/hotel/thumbnail/<?php echo $row['hotel_image'];?>" alt=""/>
                                <div class="caption" style="padding: 0px; margin-top: 5px;">
                                    <p>
                                        <?php echo $row['hotel_name'];?>
                                    </p>
                                </div>
                            </label>
                        </li>
                        <?php $i++;}?>
                    </ul>
                </div>
                <div class="modal-footer">
                    <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
                    <button type="submit" class="btn btn-success" style="color: #fff;background-color: #28a745;border-color: #28a745;">Save changes</button>
                </div>
            </form>
        </div>

    </div>
</div>

<!-- Set Tour Modal -->
<div id="setTourModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="display: block;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Set Tour</h4>
            </div>
            <form action="admin/set_tour_data" method="post">
                <div class="modal-body">
                    <ul>
                        <?php $i = 1;foreach ($get_all_tour as $row) {?>
                        <li>
                            <input type="checkbox" id="tour<?=$i?>" name="tour_id[]" value="<?php echo $row['tour_id'];?>" <?php if(in_array($row['tour_id'], $explode_tour_data)){echo 'checked';}?>/>
                            <label for="tour<?=$i?>">
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
                </div>
                <div class="modal-footer">
                    <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
                    <button type="submit" class="btn btn-success" style="color: #fff;background-color: #28a745;border-color: #28a745;">Save changes</button>
                </div>
            </form>
        </div>

    </div>
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
            <form method="post" action="admin/update_section_6_client" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" name="page_name" value="Home">
                    <input type="hidden" name="section" value="Section 6">

                    <div class="form-row">
                        
                        <div class="form-group col-md-6">
                            <label for="inputGroupSelect07" class="">Name:</label>
                            <input type="text" class="form-control" name="name" required id="" style="border: 1px solid #ced4da;" value="">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputGroupSelect07" class="">Address:</label>
                            <input type="text" class="form-control" name="address" required id="" style="border: 1px solid #ced4da;" value="">
                        </div>
                        
                        <div class="form-group col-md-12">
                            <label for="inputGroupSelect07" class="">Review:</label>
                            <textarea type="text" class="form-control" name="review_text" required id="" style="border: 1px solid #ced4da;"></textarea>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="inputGroupSelect07" class="">Image:</label>
                            <input type="file" class="form-control" name="image[]" required id="" style="border: 1px solid #ced4da;">
                        </div>
                        
                        <div class="form-group col-md-12">
                            <label for="inputGroupSelect07" class="">Background Image:</label>
                            <input type="file" class="form-control" name="background_image[]" required id="" style="border: 1px solid #ced4da;">
                        </div>
                        
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" data-id="4">Save changes</button>
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
                type: "Home"
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
                }
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
            url: "admin/save_section_data",
            data: form_data,
            type: 'POST',
            processData: false,
            contentType: false,
            cache: false,
            enctype: 'multipart/form-data',
            success: function (data) {
                $('#section_modal').modal('toggle');
                setTimeout(function(){
                    window.location.reload(1);
                }, 500);
                $("#success_msg").html('Data updated successfully');
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

    $(document).on('click', '.edit_slider_section', function () {
        $(this).attr('data-id');
        $.ajax({
            url: "admin/get_home_slider_data",
            data: {
                id: $(this).attr('data-id'),
                Section: "Home"
            },
            type: 'POST',
            success: function (data) {
                var obj = JSON.parse(data);
                $("#section_modal").html(obj.section_modal_div);
                $('#section_modal').modal('show');
            }
        });
    });
    
    $(".edit_person_data").click(function () {
        $(this).attr('data-id');
        $.ajax({
            url: "admin/get_home_person_data",
            data: {
                id: $(this).attr('data-id'),
                Section: "Home"
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