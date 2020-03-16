<!-- Breadcrumb Area Start -->
<section class="abh-breadcrumb-area" style="background-image: url('./assets/frontend_asset/img/visa-banner.jpg');">
    <div class="breadcrumb-top">
        <div class="container">
            <div class="col-lg-12">
                <div class="breadcrumb-box">
                    <h2>Visa Service</h2>
                    <ul class="breadcrumb-inn">
                        <li><a href="index.html">Home</a></li>
                        <li class="active"><a href="#">Visa Service</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Area End -->



<div class="country-list-area section_50">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="site-heading heading-style mt-0">
                    <h2><?php if(isset($countries[0]["continent_name"]))
                                 echo $countries[0]["continent_name"];
                        ?>
                    </h2>
                </div>
            </div>
        </div>
        <div class="row">

        <?php
         foreach($countries as $country){
        ?>
            <div class="col-lg-3">
                <div class="single-destination">
                    <a href="country-details.php">
                        <div class="destination-image">
                            <img src="<?= base_url()?>uploads/visa/<?php echo $country['image']; ?>" alt="asia" />
                            <div class="destination-title">
                                <h3><?php echo $country["name"];?></h3>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
         <?php }  ?>
         </div>
       </div>     
    
</div>