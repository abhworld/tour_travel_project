<!-- Breadcrumb Area Start -->
<section class="abh-breadcrumb-area">
    <div class="breadcrumb-top">
        <div class="container">
            <div class="col-lg-12">
                <div class="breadcrumb-box">
                    <h2>Popular Tours</h2>
                    <ul class="breadcrumb-inn">
                        <li><a href="index.html">Home</a></li>
                        <li class="active"><a href="#">Popular Tours</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Area End -->

<!-- Popular Tours Area Start -->
<section class="abh-popular-tours-area section_70">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">

                <?php $this->load->view('home/tour/tour_div/tour_div')?>

            </div>
            <div class="col-lg-4">

                <div class="sidebar-widget" id="sidebar">
                    <div class="single-sidebar">
                        <div class="book-hotel-wrapper">
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
                                        <input id="reservation_date" name="reservation_date" placeholder="Booking Date"
                                            data-select="datepicker" type="text">
                                    </div>
                                    <div class="book-tour-field clearfix">
                                        <select class="wide">
                                            <option selected disabled>Type of Tour</option>
                                            <option>Long</option>
                                            <option>Short</option>
                                            <option>Too long</option>
                                            <option>Single Day</option>
                                        </select>
                                    </div>
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
</section>
<!-- Popular Tours Area End -->