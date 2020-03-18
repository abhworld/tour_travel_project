<!-- Breadcrumb Area Start -->
<section class="abh-breadcrumb-area" style="background-image: url('../assets/frontend_asset/img/hotel-banner.jpg');">
    <div class="breadcrumb-top">
        <div class="container">
            <div class="col-lg-12">
                <div class="breadcrumb-box">
                    <h2><?php echo $country_details["name"] ?> Visa Service</h2>
                    <ul class="breadcrumb-inn">
                        <li><a href="index.html">Home</a></li>
                        <li class="active"><a href="#">Visa service</a></li>
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
                
                <div class="hotel-details-tab-inner mt-0">
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
                                    <p><?php echo $country_details["description"];?></p>
                                </div>

                            </div>
                            <div id="facilities" class="tab-pane">

                                <div class="tab-details-inner">
                                    <p><?php echo $country_details["facilities"];?></p>
                                </div>

                            </div>
                            <div id="hotel-itinerary" class="tab-pane">

                                <div class="tab-details-inner">
                                    <p><?php echo $country_details["itinerary"];?></p>
                                </div>

                            </div>
                            <!-- <div id="map" class="tab-pane">

                                <div class="tab-details-inner">

                                </div>

                            </div> -->



                        </div>


                    </section>
                </div>
                
            </div>
            <div class="col-lg-4">
                
                <div class="sidebar-widget" id="sidebar">
                    <div class="single-sidebar">
                        <div class="book-hotel-wrapper">
                        <div class="quick-contact">
                           <h3>Argentina Visa</h3>
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
                              <!-- <div class="book-tour-field">
                                 <input id="reservation_date" name="reservation_date" placeholder="Booking Date" data-select="datepicker" type="text">
                              </div>
                              <div class="book-tour-field clearfix">
                                 <select class="wide">
                                    <option selected disabled>Type of Room</option>
                                    <option>Double</option>
                                    <option>Single</option>
                                    <option>King</option>
                                    <option>Couple</option>
                                 </select>
                              </div> -->
                              <div class="book-tour-field">
                                 <button type="submit">Book Now</button>
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