<!-- Breadcrumb Area Start -->
<section class="abh-breadcrumb-area" style="background-image: url('../assets/frontend_asset/img/hotel-banner.jpg');">
    <div class="breadcrumb-top">
        <div class="container">
            <div class="col-lg-12">
                <div class="breadcrumb-box">
                    <h2>Hotel Details</h2>
                    <ul class="breadcrumb-inn">
                        <li><a href="index.html">Home</a></li>
                        <li class="active"><a href="#">Hotel Details</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Area End -->

<div class="hotel-details-area section_70">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="hotel-heading">
                    <h3 class="hotel-name"><?php echo $hotel_detail['hotel_name']; ?></h3>
                    <h3 class="hotel-address"><i class="fa fa-map-marker"></i><?php echo $hotel_detail['hotel_address']; ?></h3>
                </div>
                <div class="hotel-image-inner">
                    <div class="details-slider owl-carousel">
                        <?php foreach($hotel_gallery as $gallery) { ?>
                        <div class="single-destination">
                            <a href="#">
                                <div class="destination-image">
                                    <img class="img-fluid" src="<?php echo base_url();?>uploads/hotel/hotel_gallery/<?php echo $gallery['gallery_image']; ?>" alt="destination" />
                                </div>
                            </a>
                        </div>
                        <?php } ?>
                        
                        
                       
                    </div>
                </div>
                <div class="hotel-details-tab-inner">
                    <section class="abh-tab-menu-area">
                        <div class="row">
                            <div class="col d-flex">
                                <ul class="nav nav-menu-tabs" role="tablist">

                                    <li>
                                        <a class="active show" data-toggle="tab" href="#hotel-description" role="tab"
                                            aria-controls="hotel-description" aria-selected="false">
                                            Description</a>
                                    </li>


                                    <li>
                                        <a class="" data-toggle="tab" href="#facilities" role="tab"
                                            aria-controls="facilities" aria-selected="false"> Facilities</a>
                                    </li>


                                    <li>
                                        <a class="" data-toggle="tab" href="#hotel-itinerary" role="tab"
                                            aria-controls="hotel-itinerary" aria-selected="true">Itinerary</a>
                                    </li>


                                    <!-- <li>
                                        <a class="" data-toggle="tab" href="#map" role="tab" aria-controls="map"
                                            aria-selected="true">Map</a>
                                    </li> -->

                                </ul>
                            </div>
                        </div>
                        <div class="tab-content">
                            <div id="hotel-description" class="tab-pane show active">

                                <div class="tab-details-inner">
                                    <p><?php echo $hotel_detail['hotel_description']; ?></p>
                                </div>

                            </div>
                            <div id="facilities" class="tab-pane">

                                <div class="tab-details-inner">
                                    <p><?php echo $hotel_detail['hotel_facilities']; ?></p>
                                </div>

                            </div>
                            <div id="hotel-itinerary" class="tab-pane">

                                <div class="tab-details-inner">
                                    <p><?php echo $hotel_detail['hotel_itinerary']; ?></p>
                                </div>

                            </div>
                            <!-- <div id="map" class="tab-pane">

                                <div class="tab-details-inner">

                                </div>

                            </div> -->



                        </div>


                    </section>
                </div>
                <div class="hotel-room-area">
                    <div class="row">

                       <?php if(isset($room_detail['room_type']) && $room_detail['room_type'] == 'Double'){?>
                        <div class="col-lg-5 pad-right-0">
                            <div class="hotel-img-inner hotel-room-img-style-1">
                                <div class="price">
                                    <span class="price-num"> ৳ <?php echo $room_detail['rent_per_night'];?></span>
                                    <span class="price-night-text"> / night </span>
                                </div>
                                <a href="<?php echo base_url();?>uploads/hotel/rooms/<?php echo $room_detail['room_image'];?>" class="popup-img">
                                    <img class="img-fluid" src="<?php echo base_url();?>uploads/hotel/rooms/<?php echo $room_detail['room_image'];?>" alt="Hotel Room" />
                                </a>
                                <div class="room-name">
                                    <h3>Double Room</h3>
                                </div>
                            </div>
                        </div>
                        <?php } ?>

                        <div class="col-lg-7">
                            <div class="hotel-four-room-inner">
                                <div class="row">

                                     <?php if(isset($room_detail['room_type']) && $room_detail['room_type'] == 'Single'){?>
                                     <div class="col-lg-6">
                                        <div class="hotel-img-inner">
                                            <div class="price">
                                                <span class="price-num"> ৳ <?php echo $room_detail['rent_per_night'];?> </span>
                                                <span class="price-night-text"> / night </span>
                                            </div>
                                            <a href="<?php echo base_url();?>uploads/hotel/rooms/<?php echo $room_detail['room_image'];?>" class="popup-img">

                                                <img class="img-fluid" src="<?php echo base_url();?>uploads/hotel/rooms/<?php echo $room_detail['room_image'];?>"
                                                    alt="Hotel Room"/>
                                            </a>
                                            <div class="room-name">
                                                <h3>Single Room</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>

                                     <?php if(isset($room_detail['room_type']) && $room_detail['room_type'] == 'King'){?>
                                    <div class="col-lg-6 pad-left-0">
                                        <div class="hotel-img-inner">
                                            <div class="price">
                                                <span class="price-num"> ৳ <?php echo $room_detail['rent_per_night'];?>  </span>
                                                <span class="price-night-text"> / night </span>
                                            </div>
                                            <a href="<?php echo base_url();?>uploads/hotel/rooms/<?php echo $room_detail['room_image'];?>" class="popup-img">
                                                <img class="img-fluid" src="<?php echo base_url();?>uploads/hotel/rooms/<?php echo $room_detail['room_image'];?>"
                                                    alt="Hotel Room" />
                                            </a>
                                            <div class="room-name">
                                                <h3>King Room</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>

                                     <?php if(isset($room_detail['room_type']) && $room_detail['room_type'] == 'Appartments'){?>
                                    <div class="col-lg-6">
                                        <div class="hotel-img-inner">
                                            <div class="price">
                                                <span class="price-num"> ৳ <?php echo $room_detail['rent_per_night'];?> </span>
                                                <span class="price-night-text"> / night </span>
                                            </div>
                                            <a href="<?php echo base_url();?>uploads/hotel/rooms/<?php echo $room_detail['room_image'];?>" class="popup-img">
                                                <img class="img-fluid" src="<?php echo base_url();?>uploads/hotel/rooms/<?php echo $room_detail['room_image'];?>"
                                                    alt="Hotel Room" />
                                            </a>
                                            <div class="room-name">
                                                <h3>Appartments</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>

                                     <?php if(isset($room_detail['room_type']) && $room_detail['room_type'] == 'Villa'){?>
                                    <div class="col-lg-6 pad-left-0">
                                        <div class="hotel-img-inner">
                                            <div class="price">
                                                <span class="price-num"> ৳ <?php echo $room_detail['rent_per_night'];?> </span>
                                                <span class="price-night-text"> / night </span>
                                            </div>
                                            <a href="<?php echo base_url();?>uploads/hotel/rooms/thumbnail/<?php echo $room_detail['room_image'];?>" class="popup-img">
                                                <img class="img-fluid" src="<?php echo base_url();?>uploads/hotel/rooms/<?php echo $room_detail['room_image'];?>"
                                                    alt="Hotel Room" />
                                            </a>
                                            <div class="room-name">
                                                <h3>Villa Room</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                
                <div class="sidebar-widget" id="sidebar">
                    <div class="single-sidebar">
                        <div class="book-hotel-wrapper">
                        <div class="quick-contact">
                           <h3>Book This Hotel</h3>
                           <form id="booking_request">

                              <input type="hidden" name="type" value="1">
                              
                              <input type="hidden" name="hotel_id" value="<?php echo $hotel_detail['id']?>">

                              <div class="book-tour-field">
                                 <input type="text" placeholder="Your Name" name="name">
                              </div>
                              <div class="book-tour-field">
                                 <input type="email" placeholder="Email Address" name="email_address">
                              </div>
                              <div class="book-tour-field">
                                 <input type="tel" placeholder="Phone Number" name="phone">
                              </div>
                              <div class="book-tour-field">
                                 <input id="reservation_date" name="reservation_date" placeholder="Booking Date" data-select="datepicker" type="text">
                              </div>
                             <!--  <div class="book-tour-field clearfix">
                                 <select class="wide"  name="no_of_person">
                                    <option selected disabled>Type of Room</option>
                                    <option>Double</option>
                                    <option>Single</option>
                                    <option>King</option>
                                    <option>Couple</option>
                                 </select>
                              </div> -->
                              <div class="book-tour-field">
                                 <button type="button" id="booking_request_btn">Book Now</button>
                              </div>
                           </form>
                        </div>
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


        </div>
    </div>
</div>



<div class="abh-location-map-area">
    <!-- <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="user-field">
                    <div class="userid">
                        <label for="text">user id :</label>
                        <input type="text" placeholder="Search" class="form-control">
                    </div>

                </div>
            </div>
            <div class="col-lg-6">
                <div class="user-field">
                    <div class="userid">
                        <label for="text">Date</label>
                        <input type="date" class="form-control">
                    </div>

                </div>
            </div>
        </div>

    </div> -->

    <div class="map-section-full">
        <div class="abh-map-sec">
            <div class="abh-maps-wraper location-wrapper">
                <div class="map">
                    <iframe
                        src="https://maps.google.com/maps?width=100%&amp;height=600&amp;hl=en&amp;q=Gulshan%202%2C%20Dhaka%20-%201212%2C%20Bangladesh+(ABH%20CRM)&amp;ie=UTF8&amp;t=&amp;z=17&amp;iwloc=B&amp;output=embed"></iframe>
                </div>
                <div class="location location-1" data-placement="left" data-toggle="tooltip" data-html="true" title='<h2 class="location-name">Gulshan 2, Dhaka</h2>
                        <p class="location-des">Gulshan 2, Dhaka - 1212, Bangladesh <br>House: 24/A CWN (B), Road: 36</p>
                        <p>Tel: +8809639001224 <br>
                            Email: info@abhworld.com</p>'>

                    <div class="location_indicator indicator-1"></div>
                    <div class="location-info d-block d-md-none">
                        <h2 class="location-name">Gulshan 2, Dhaka - 1212</h2>
                        <p class="location-des">Gulshan 2, Dhaka - 1212, Bangladesh <br>House: 24/A CWN (B), Road: 36</p>
                        <p class="location-tel">Tel: +8809639001224 <br>
                            Email: info@abhworld.com</p>

                    </div>
                </div>
                <div class="location location-2" data-placement="left" data-toggle="tooltip" data-html="true" title='<h2 class="location-name">Gulshan 2, Dhaka</h2>
                        <p class="location-des">Gulshan 2, Dhaka - 1212, Bangladesh <br>House: 24/A CWN (B), Road: 36</p>
                        <p>Tel: +8809639001224 <br>
                            Email: info@abhworld.com</p>'>

                            <div class="location_indicator indicator-1"></div>
                    <div class="location-info d-block d-md-none">
                        <h2 class="location-name">Gulshan 2, Dhaka - 1212</h2>
                        <p class="location-des">Gulshan 2, Dhaka - 1212, Bangladesh <br>House: 24/A CWN (B), Road: 36</p>
                        <p class="location-tel">Tel: +8809639001224 <br>
                            Email: info@abhworld.com</p>

                    </div>
                </div>
                <div class="location location-3" data-placement="left" data-toggle="tooltip" data-html="true" title='<h2 class="location-name">Gulshan 2, Dhaka</h2>
                        <p class="location-des">Gulshan 2, Dhaka - 1212, Bangladesh <br>House: 24/A CWN (B), Road: 36</p>
                        <p>Tel: +8809639001224 <br>
                            Email: info@abhworld.com</p>'>

                            <div class="location_indicator indicator-1"></div>
                    <div class="location-info d-block d-md-none">
                        <h2 class="location-name">Gulshan 2, Dhaka - 1212</h2>
                        <p class="location-des">Gulshan 2, Dhaka - 1212, Bangladesh <br>House: 24/A CWN (B), Road: 36</p>
                        <p class="location-tel">Tel: +8809639001224 <br>
                            Email: info@abhworld.com</p>

                    </div>
                </div>
                <div class="location location-4" data-placement="left" data-toggle="tooltip" data-html="true" title='<h2 class="location-name">Gulshan 2, Dhaka</h2>
                        <p class="location-des">Gulshan 2, Dhaka - 1212, Bangladesh <br>House: 24/A CWN (B), Road: 36</p>
                        <p>Tel: +8809639001224 <br>
                            Email: info@abhworld.com</p>'>

                            <div class="location_indicator indicator-1"></div>
                    <div class="location-info d-block d-md-none">
                        <h2 class="location-name">Gulshan 2, Dhaka - 1212</h2>
                        <p class="location-des">Gulshan 2, Dhaka - 1212, Bangladesh <br>House: 24/A CWN (B), Road: 36</p>
                        <p class="location-tel">Tel: +8809639001224 <br>
                            Email: info@abhworld.com</p>

                    </div>
                </div>
                <div class="location location-5" data-placement="left" data-toggle="tooltip" data-html="true" title='<h2 class="location-name">Gulshan 2, Dhaka</h2>
                        <p class="location-des">Gulshan 2, Dhaka - 1212, Bangladesh <br>House: 24/A CWN (B), Road: 36</p>
                        <p>Tel: +8809639001224 <br>
                            Email: info@abhworld.com</p>'>

                            <div class="location_indicator indicator-1"></div>
                    <div class="location-info d-block d-md-none">
                        <h2 class="location-name">Gulshan 2, Dhaka - 1212</h2>
                        <p class="location-des">Gulshan 2, Dhaka - 1212, Bangladesh <br>House: 24/A CWN (B), Road: 36</p>
                        <p class="location-tel">Tel: +8809639001224 <br>
                            Email: info@abhworld.com</p>

                    </div>
                </div>
                <div class="location location-6" data-placement="left" data-toggle="tooltip" data-html="true" title='<h2 class="location-name">Gulshan 2, Dhaka</h2>
                        <p class="location-des">Gulshan 2, Dhaka - 1212, Bangladesh <br>House: 24/A CWN (B), Road: 36</p>
                        <p>Tel: +8809639001224 <br>
                            Email: info@abhworld.com</p>'>

                            <div class="location_indicator indicator-1"></div>
                    <div class="location-info d-block d-md-none">
                        <h2 class="location-name">Gulshan 2, Dhaka - 1212</h2>
                        <p class="location-des">Gulshan 2, Dhaka - 1212, Bangladesh <br>House: 24/A CWN (B), Road: 36</p>
                        <p class="location-tel">Tel: +8809639001224 <br>
                            Email: info@abhworld.com</p>

                    </div>
                </div>
                <div class="location location-7" data-placement="left" data-toggle="tooltip" data-html="true" title='<h2 class="location-name">Gulshan 2, Dhaka</h2>
                        <p class="location-des">Gulshan 2, Dhaka - 1212, Bangladesh <br>House: 24/A CWN (B), Road: 36</p>
                        <p>Tel: +8809639001224 <br>
                            Email: info@abhworld.com</p>'>

                            <div class="location_indicator indicator-1"></div>
                    <div class="location-info d-block d-md-none">
                        <h2 class="location-name">Gulshan 2, Dhaka - 1212</h2>
                        <p class="location-des">Gulshan 2, Dhaka - 1212, Bangladesh <br>House: 24/A CWN (B), Road: 36</p>
                        <p class="location-tel">Tel: +8809639001224 <br>
                            Email: info@abhworld.com</p>

                    </div>
                    <!-- end location info -->
                </div>
                <!-- end location -->

            </div>
            <!-- end ts maps wrapper -->
        </div><!-- End map section -->
    </div>
</div>

<?php $this->load->view('home/booking_request_modal');?>

<script>
    $("#booking_request_btn").click(function () {
        
        $(".error_msg").remove();
        
        $.ajax({
            url: "<?php echo base_url();?>"+'/home/send_booking_request',
            type: 'POST',
            data: $("#booking_request").serialize(),
            success: function (response) {
                var obj = JSON.parse(response);
//                console.log(obj);
                if(obj.status == true){
                    $('#booking_request_modal').modal('show');
                    $('#booking_request')[0].reset();
                } else {
                    $.each(obj.errors, function(key, val) {
                        $('#'+key).after("<div><small class='error_msg' style='font-weight: bold;color: red;'>" + val + "</small></div>");
                    });
                }
            }
        });
    });
</script>