<?php 
// echo "<pre>";print_r($all_hotel);die;
foreach($all_hotel as $key => $row) {?>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="hotel-image-inner">
                                <div class="details-slider owl-carousel">
                                <?php
                                    foreach($row as $key => $gallery_img) {?>
                                    <div class="single-destination">
                                        <a href="hotel-detail/<?php echo str_replace(' ', '-', strtolower($row[0]['hotel_name'])) ;?>">
                                       
                                            
                                            <div class="destination-image">
                                                <img src="<?php echo base_url();?>uploads/hotel/hotel_gallery/<?php echo $gallery_img['gallery_image'];?>" alt="destination" />
                                            </div>
                                        </a>
                                    </div>

                                    <?php } ?>   
                                    
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="hotel-details-inner">
                                <h2><?php echo $row[0]['city_name']; ?></h2>
                                <a href="hotel-detail/<?php echo str_replace(' ', '-', strtolower($row[0]['hotel_name'])) ;?>"><h3>
                                    <i class="fa fa-building"></i><?php echo $row[0]['hotel_name'];?></h3></a>
                                <h3 class="hotel-address"><i class="fa fa-map-marker"></i><?php echo $row[0]['hotel_address']; ?>
                                </h3>
                                <h4>Hotel Facilities</h4>
                                <div class="hotel-features">

                                    <ul>
                                        <?php if(isset($row[0]['restaurant']) && $row[0]['restaurant']) { ?>
                                        <li><span>Restaurant</span></li>
                                        <?php } ?>
                                        <?php if(isset($row[0]['swimming_pool']) && $row[0]['swimming_pool']) { ?>
                                        <li><span>Pool</span></li>
                                        <?php } ?>
                                        <?php if(isset($row[0]['fitness_center']) && $row[0]['fitness_center']) { ?>
                                        <li><span>Fitness Center</span></li>
                                        <?php } ?>
                                        <?php if(isset($row[0]['service_room']) && $row[0]['service_room']) { ?>
                                        <li><span>Service Room</span></li>
                                        <?php } ?>
                                        <?php if(isset($row[0]['coffee_shop']) && $row[0]['coffee_shop']) { ?>
                                        <li><span>Coffee Shop</span></li>
                                        <?php } ?>
                                        <?php if(isset($row[0]['wifi']) && $row[0]['wifi']) { ?>
                                        <li><span>Wifi Free</span></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                                <div class="tour-details">
                                    <a href="hotel-detail/<?php echo str_replace(' ', '-', strtolower($row[0]['hotel_name'])) ;?>"> Book Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="gap-30"></div>
                    <?php } ?>