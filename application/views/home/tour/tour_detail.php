  <!-- Breadcrumb Area Start -->
      <section class="abh-breadcrumb-area">
         <div class="breadcrumb-top">
            <div class="container">
               <div class="col-lg-12">
                  <div class="breadcrumb-box">
                     <h2>Tour Details</h2>
                      <ul class="breadcrumb-inn">
                        <li><a href="index.html">Home</a></li>
                        <li class="active"><a href="#">Tour Details</a></li>
                      </ul>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- Breadcrumb Area End -->
       
       
      <!-- Tour Details Area Start -->
      <section class="abh-tour-details-area section_70">
         <div class="container">
            <div class="row">
               <div class="col-lg-8">
                  <div class="tour-details-left">
                     <div class="tour-details-head">
                        <h3><?php echo $tour_detail[0]['package_name'];?> <span> <span class="tour_price"><?php echo $tour_detail[0]['tour_price'];?></span> / per person </span></h3>
                        <div class="tour_duration">
                                    <p>
                                        <i class="fa fa-hourglass-half"></i>
                                        <?php echo $tour_detail[0]['no_of_day'];?> Days / <?php echo $tour_detail[0]['no_of_day']+1;?> Nights
                                    </p>
                                </div>
                     </div>
                     <div class="tour-details-image">
                        <img src="<?php echo base_url();?>uploads/tour/<?php echo $tour_detail[0]['tour_image'];?>" alt="Tour" />
                     </div>
                     <p><?php echo $tour_detail[0]['tour_description'];?></p>
                     <ul class="tour-offer clearfix">
                        <li><span>Country </span><?php echo $tour_destination['country_name'];?></li>
                        <li><span>City </span><?php echo $tour_destination['city_name'];?></li>
                        <!-- <li><span>Departure Time </span>Sunday 14 of May, 20:30 hs</li> -->
                        <?php if(isset($tour_detail[0]['all_inclusive']) && $tour_detail[0]['all_inclusive']){?>
                        <li><span>Accommodation </span>All Inclusive</li>
                        <?php } ?>
                        <li>
                           <span>What´s Included</span>
                           <ul>
                              <?php if(isset($tour_detail[0]['insurance']) && $tour_detail[0]['insurance']){?>
                              <li><i class="fa fa-check-circle"></i>Travel Insurance</li>
                              <?php } ?>
                              <?php if(isset($tour_detail[0]['five_star_accommodation']) && $tour_detail[0]['five_star_accommodation']){?>
                              <li><i class="fa fa-check-circle"></i> 5 star Accommodation</li>
                              <?php } ?>
                               <?php if(isset($tour_detail[0]['airport_transfer']) && $tour_detail[0]['airport_transfer']){?>
                              <li><i class="fa fa-check-circle"></i>Airport Transfer</li>
                              <?php } ?>
                               <?php if(isset($tour_detail[0]['breakfast']) && $tour_detail[0]['breakfast']){?>
                              <li><i class="fa fa-check-circle"></i> Breakfast</li>
                              <?php } ?>
                               <?php if(isset($tour_detail[0]['personal_guide']) && $tour_detail[0]['personal_guide']){?>
                              <li><i class="fa fa-check-circle"></i> Personal Guide </li>
                              <?php } ?>
                               <?php if(isset($tour_detail[0]['two_days_long_city_tour']) && $tour_detail[0]['two_days_long_city_tour']){?>
                              <li><i class="fa fa-check-circle"></i> Two days long City tour </li>
                              <?php }?>
                           </ul>
                        </li>
               
                     </ul>
                     
                     <?php if(!empty($tour_gallery)) { ?>
                     <div class="tour-gallery">
                        <h3>Gallery</h3>
                        
                        
                        <div class="tour-gallery-slider owl-carousel">
                            <?php $i=0; foreach($tour_gallery as $row[$i]) { ?>
                           <div class="single-gallery-tour">
                              <img src="<?php echo base_url();?>uploads/tour/tour_gallery/<?php echo $row[$i]['gallery_image'];?>" alt="tour" />
                           </div>     
                           <?php $i++;}?>
                        </div>
                        
                         
                     </div>
                      
                     <?php } ?>

                    

                     
                  </div>
               </div>
               <div class="col-lg-4">
                  <div class="sidebar-widget">
                     <div class="single-sidebar">
                        <div class="quick-contact">
                           <h3>Book This Tour</h3>
                           <form>
                              <div class="book-tour-field">
                                 <input type="text" placeholder="Your Name">
                              </div>
                              <div class="book-tour-field">
                                 <input type="email" placeholder="Email Address">
                              </div>
                              <div class="book-tour-field">
                                 <input type="tel" placeholder="Phone Number">
                              </div>
                              <div class="book-tour-field">
                                 <input id="reservation_date" name="reservation_date" placeholder="Departure Date" data-select="datepicker" type="text">
                              </div>
                              <div class="book-tour-field clearfix">
                                 <select class="wide">
                                    <option selected disabled>Number Of Person</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4+</option>
                                 </select>
                              </div>
                              <div class="book-tour-field">
                                 <button type="submit">Book Now</button>
                              </div>
                           </form>
                        </div>
                     </div>
                     <div class="single-sidebar">
                        <h3>More Information</h3>
                        <ul class="more-info">
                           <li>
                              <span><i class="fa fa-phone"></i> Phone Number:</span>
                              1-567-124-44227
                           </li>
                           <li>
                              <span><i class="fa fa-clock-o"></i> Office Time:</span>
                              9am - 5pm
                           </li>
                           <li>
                              <span><i class="fa fa-map-marker"></i> Office Location:</span>
                              5520 Quebec Place
                           </li>
                        </ul>
                     </div>
                     <!-- <div class="single-sidebar">
                        <img src="<?php echo base_url();?>assets/frontend_asset/img/destination.jpg" alt="destination" />
                     </div> -->
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- Tour Details Area End -->