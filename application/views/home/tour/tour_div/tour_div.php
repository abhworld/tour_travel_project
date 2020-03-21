 <div class="row">
               <?php foreach($all_tour as $row) { ?>
                <div class="col-lg-6">
                    <div class="single-popular-tour">
                        <div class="popular-tour-image">
                            <a href="<?php echo base_url();?>uploads/tour/<?php echo $row['tour_image'];?>" class="popup-img">
                                <img src="<?php echo base_url();?>uploads/tour/<?php echo $row['tour_image'];?>" alt="Popular Tours" />
                            </a>
                        </div>
                        <div class="popular-tour-desc">
                            <div class="tour-desc-top">
                                <h3><a href="tour-detail/<?php echo str_replace(' ', '-', strtolower($row['package_name']))?>"><?php echo $row['package_name'];?></a></h3>
                                <div class="tour_duration">
                                    <p>
                                        <i class="fa fa-hourglass-half"></i>
                                        <?php echo $row['no_of_day'];?> Days / <?php echo $row['no_of_day']+1;?> Nights
                                    </p>
                                </div>
                            </div>
                            <div class="tour-desc-bottom">
                                <div class="tour-details">
                                    <a href="tour-detail/<?php echo str_replace(' ', '-', strtolower($row['package_name']))?>"> Book Now</a>
                                </div>
                                <div class="tour-desc-price">
                                    <p><?php echo $row['tour_price'];?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
             </div>

             <?php echo $this->ajax_pagination->create_links();?>