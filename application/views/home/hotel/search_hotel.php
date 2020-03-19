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
                <a href="hotel-detail/<?php echo str_replace(' ', '-', strtolower($row['hotel_name'])) ;?>"> Book Now</a>
            </div>
        </div>
    </div>
</div>
<div class="gap-30"></div>
<?php } ?>