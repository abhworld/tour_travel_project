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
                                    <select id="country_id" class="select2">
                                        <option value=''>Select country</option>
                                        <?php 
                                            foreach($countries as $country)
                                            {
                                                echo "<option value='". $country['id']."'>".$country['name']."</option>";
                                            }
                                        ?>
                                    </select>
                                </p>
                                <p>
                                    <select class="wide" id="city_id">
                                        <option value=''>Select city</option>
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
                            </form>
                        </div>
                    </div>
                    <div class="single-sidebar">
                        <div class="quick_contact">
                            <?php  $this->load->view('home/contact_info');?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <!-- <div class="site-heading">
                        <h2>Hotel List</h2>
                       
                    </div> -->
                <div id="hotel_list" class="hotel-list-wrapper">
		            <?php $this->load->view('home/hotel/hotel_list'); ?>
                    
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
<script>
function getHotelInfo()
{
    $.post( 
            "home/searchHotel",
            { 'restaurant': $("#restaurant").val(),'swimming_pool': $("#swimming-pool").val(), 'fitness': $("#fitness").val(), 'service_room': $("#service-room").val(), 'coffee_shop': $("#coffee-shop").val(), 'wifi_free': $("#wifi-free").val(), 'country_id': $("#country_id").val()},
            function(data) {
                console.log(data);

                // var obj = JSON.parse(data);
                $("#hotel_list").html(data); 
            }
        );
}
$('#restaurant, #fitness, #service-room, #coffee-shop, #wifi-free, #service-room').on('click', function() { 
    getHotelInfo();
            
});
$('#country_id').on('change', function() { 
    $.post( 
            "home/searchCityByCountry",
            {'country_id': $("#country_id").val()},
            function(data) {
                console.log(data);

                // var obj = JSON.parse(data);
                $("#city_id").html(data); 
            }
        );
    getHotelInfo();
            
});
</script>