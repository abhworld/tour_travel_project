!-- Breadcrumb Area Start -->
<section class="abh-breadcrumb-area">
    <div class="breadcrumb-top">
        <div class="container">
            <div class="col-lg-12">
                <div class="breadcrumb-box">
                    <h2>Hotel list</h2>
                    <ul class="breadcrumb-inn">
                        <li><a href="index.html">Home</a></li>
                        <li class="active"><a href="#">Hotel list</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Area End -->

<div class="hotel-list-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="sidebar-widget" id="sidebar">
                    <div class="single-sidebar">
                        <h3>FIND YOUR HOTEL</h3>
                        <div class="tour-filter clearfix">
                            <form>
                                <p>
                                    <input type="search" placeholder="Search Tour..." id="hotel_id"/>
                                    <i class="fa fa-search"></i>
                                </p>
                                <p>
                                    <input type="search" placeholder="Where To?" />
                                    <i class="fa fa-tags"></i>
                                </p>
                                <p>
                                    <select class="wide">
                                        <option>Month</option>
                                        <option>January</option>
                                        <option>February</option>
                                        <option>March</option>
                                        <option>April</option>
                                        <option>May</option>
                                        <option>June</option>
                                        <option>July</option>
                                        <option>August</option>
                                        <option>September</option>
                                        <option>October</option>
                                        <option>November</option>
                                        <option>December</option>
                                    </select>
                                </p>
                                <p>
                                    <select class="wide">
                                        <option>Tour Type</option>
                                        <option>Adventure</option>
                                        <option>Romantic</option>
                                        <option>Vacation</option>
                                        <option>Explore</option>
                                        <option>Trendy</option>
                                    </select>
                                </p>
                                <h4 class="widget-title">FACILITIES</h4>
                                <ul class="ceckbox_filter">
                                    <li class="checkbox">
                                        <input class="checkbox-spin" type="checkbox" id="restaurant">
                                        <label for="restaurant"><span></span>Restaurant</label>
                                    </li>
                                    <li class="checkbox">
                                        <input class="checkbox-spin" type="checkbox" id="swimming-pool">
                                        <label for="swimming-pool"><span></span>Swimming Pool</label>
                                    </li>
                                    <li class="checkbox">
                                        <input class="checkbox-spin" type="checkbox" id="fitness">
                                        <label for="fitness"><span></span>Fitness</label>
                                    </li>
                                    <li class="checkbox">
                                        <input class="checkbox-spin" type="checkbox" id="service-room">
                                        <label for="service-room"><span></span>Service room</label>
                                    </li>
                                    <li class="checkbox">
                                        <input class="checkbox-spin" type="checkbox" id="coffee-shop">
                                        <label for="coffee-shop"><span></span>Coffee shop</label>
                                    </li>
                                    <li class="checkbox">
                                        <input class="checkbox-spin" type="checkbox" id="wifi-free">
                                        <label for="wifi-free"><span></span>Wifi free</label>
                                    </li>
                                </ul>
                                <p>
                                    <button type="submit">Search</button>
                                </p>
                            </form>
                        </div>
                    </div>
                    <div class="single-sidebar">
                        <div class="quick_contact">
                            <h4>Contact US</h4>
                            <p>
                                <i class="fa fa-phone"></i>
                                +8809639001224
                            </p>
                            <p>
                                <i class="fa fa-envelope"></i>
                                info@example.com
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <!-- <div class="site-heading">
                        <h2>Hotel List</h2>
                       
                    </div> -->
                <div class="hotel-list-wrapper">
                    <?php foreach($all_hotel as $row) { ?>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="hotel-image-inner">
                                <div class="details-slider owl-carousel">
                                    <div class="single-destination">
                                        <a href="hotel-detail/<?php echo str_replace(' ', '-', strtolower($row['hotel_name'])) ;?>">
                                            <div class="destination-image">
                                                <img src="<?php echo base_url();?>assets/frontend_asset/img/Exterior-2.jpg" alt="destination" />
                                            </div>
                                        </a>
                                    </div>
                                    <div class="single-destination">
                                        <a href="hotel-details.php">
                                            <div class="destination-image">
                                                <img src="<?php echo base_url();?>assets/frontend_asset/img/Exterior-1.jpg" alt="destination" />
                                            </div>
                                        </a>
                                    </div>
                                    <div class="single-destination">
                                        <a href="hotel-details.php">
                                            <div class="destination-image">
                                                <img src="<?php echo base_url();?>assets/frontend_asset/img/Exterior-3.jpg" alt="destination" />
                                            </div>
                                        </a>
                                    </div>
                                    <div class="single-destination">
                                        <a href="hotel-details.php">
                                            <div class="destination-image">
                                                <img src="<?php echo base_url();?>assets/frontend_asset/img/Exterior-4.jpg" alt="destination" />
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="hotel-details-inner">
                                <h2><?php echo $row['city_name']; ?></h2>
                                <a href="hotel-detail/<?php echo str_replace(' ', '-', strtolower($row['hotel_name'])) ;?>"><h3><i class="fa fa-building"></i><?php echo $row['hotel_name'];?></h3></a>
                                <h3 class="hotel-address"><i class="fa fa-map-marker"></i><?php echo $row['hotel_address']; ?>
                                </h3>
                                <h4>Hotel Facilities</h4>
                                <div class="hotel-features">

                                    <ul>
                                        <?php if(isset($row['restaurant']) && $row['restaurant']) { ?>
                                        <li><span>Restaurant</span></li>
                                        <?php } ?>
                                        <?php if(isset($row['swimming_pool']) && $row['swimming_pool']) { ?>
                                        <li><span>Pool</span></li>
                                        <?php } ?>
                                        <?php if(isset($row['fitness_center']) && $row['fitness_center']) { ?>
                                        <li><span>Fitness Center</span></li>
                                        <?php } ?>
                                        <?php if(isset($row['service_room']) && $row['service_room']) { ?>
                                        <li><span>Service Room</span></li>
                                        <?php } ?>
                                        <?php if(isset($row['coffee_shop']) && $row['coffee_shop']) { ?>
                                        <li><span>Coffee Shop</span></li>
                                        <?php } ?>
                                        <?php if(isset($row['wifi']) && $row['wifi']) { ?>
                                        <li><span>Wifi Free</span></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                                <div class="tour-details">
                                    <a href="hotel-details.php"> Book Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="gap-30"></div>
                    <?php } ?>

                   

                    
                   

                </div>
            </div>
        </div>


    </div>
</div>

<!-- Choose Area Start -->
<section class="abh-choose-area section_70 bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="site-heading">
                    <h2>Some Good Reason</h2>
                    <p>Lorem ipsum dolor sit amet, conseetuer adipiscing elit. Aenan comdo igula eget. Aenean massa cum
                        sociis Theme natoque.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="single-choose color_1">
                    <p>01</p>
                    <div class="choose-image">
                        <img src="<?php echo base_url();?>assets/frontend_asset/img/choose-1.png" alt="Safe Travel" />
                    </div>
                    <div class="choose-desc">
                        <h3>Safe Travel</h3>
                        <p>printing and typesetting industry has been printing the industry’s ipsum</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="single-choose color_2">
                    <p>02</p>
                    <div class="choose-image">
                        <img src="<?php echo base_url();?>assets/frontend_asset/img/choose-2.png" alt="Awesome Guide" />
                    </div>
                    <div class="choose-desc">
                        <h3>Awesome Guide</h3>
                        <p>printing and typesetting industry has been printing the industry’s ipsum</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="single-choose color_3">
                    <p>03</p>
                    <div class="choose-image">
                        <img src="<?php echo base_url();?>assets/frontend_asset/img/choose-3.png" alt="Save Money" />
                    </div>
                    <div class="choose-desc">
                        <h3>Save Money</h3>
                        <p>printing and typesetting industry has been printing the industry’s ipsum</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Choose Area End -->