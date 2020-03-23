<!-- Breadcrumb Area Start -->
<section class="abh-breadcrumb-area" style="background-image: url('./assets/frontend_asset/img/visa-bg.jpg');">
   <div class="breadcrumb-top">
      <div class="container">
         <div class="col-lg-12">
            <div class="breadcrumb-box">
               <h2>Visa</h2>
               <ul class="breadcrumb-inn">
                  <li><a href="index.html">Home</a></li>
                  <li class="active"><a href="#">Visa</a></li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- Breadcrumb Area End -->


<div class="country-search-area">
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-lg-8">
            <div class="visa-search-wrapper">
               <p>Apply for visa to countries that do not have diplomatic mission in Bangladesh.</p>
               <h2>Need Visa Information ?</h2>
               <!-- <div class="niceCountryInputSelector" data-selectedcountry="US" data-showspecial="false"
                  data-showflags="false" data-i18nall="All selected" data-i18nnofilter="No selection"
                  data-i18nfilter="Filter" data-onchangecallback="onChangeCallback">
               </div> -->
               <select id="country_id" class="select2 form-control">
                  <option value=''>Select country</option>
                  <?php 
                     foreach($countries as $country)
                     {
                        echo "<option value='". $country['id']."'>".$country['name']."</option>";
                     }
                  ?>
               </select>
		<?php //echo '<pre>'; print_r($countries); die;?>

            </div>
         </div>
      </div>
   </div>
</div>


<div class="visa-area">
   <div class="container">
      <div class="row">
         <div class="col-lg-4 col-sm-12">
            <div class="gallery-item visa-item">
               <div class="gallery-img">
                  <img src="<?php echo base_url();?>assets/frontend_asset/img/asia.png" alt="gallery">
               </div>
               <div class="content">
                  <a href="<?php echo base_url();?>visa-service/2">
                     <h4 class="name">Asia</h4>
                  </a>
               </div>
            </div>
         </div>
         <div class="col-lg-4 col-sm-12">
            <div class="gallery-item visa-item">
               <div class="gallery-img">
                  <img src="<?php echo base_url();?>assets/frontend_asset/img/europe.png" alt="gallery">
               </div>
               <div class="content">
                  <a href="<?php echo base_url();?>visa-service/3">
                     <h4 class="name">Europe</h4>
                  </a>
               </div>
            </div>
         </div>
         <div class="col-lg-4 col-sm-12">
            <div class="gallery-item visa-item">
               <div class="gallery-img">
                  <img src="<?php echo base_url();?>assets/frontend_asset/img/north_amarica.png" alt="gallery">
               </div>
               <div class="content">
                  <a href="<?php echo base_url();?>visa-service/4">
                     <h4 class="name">North America</h4>
                  </a>
               </div>
            </div>
         </div>
         <div class="col-lg-4 col-sm-12">
            <div class="gallery-item visa-item mb-30">
               <div class="gallery-img">
                  <img src="<?php echo base_url();?>assets/frontend_asset/img/South_America.png" alt="gallery">
               </div>
               <div class="content">
                  <a href="<?php echo base_url();?>visa-service/5">
                     <h4 class="name">South America</h4>
                  </a>
               </div>
            </div>
         </div>
         <div class="col-lg-4 col-sm-12">
            <div class="gallery-item visa-item mb-30">
               <div class="gallery-img">
                  <img src="<?php echo base_url();?>assets/frontend_asset/img/osania.png" alt="gallery">
               </div>
               <div class="content">
                  <a href="<?php echo base_url();?>visa-service/6">
                     <h4 class="name">Antarctica</h4>
                  </a>
               </div>
            </div>
         </div>
         <div class="col-lg-4 col-sm-12">
            <div class="gallery-item visa-item mb-30">
               <div class="gallery-img">
                  <img src="<?php echo base_url();?>assets/frontend_asset/img/africa.png" alt="gallery">
               </div>
               <div class="content">
                  <a href="<?php echo base_url();?>visa-service/1">
                     <h4 class="name">Africa</h4>
                  </a>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- Discount Area Start -->
<section class="abh-discount-area" style="background-image: url(./assets/frontend_asset/img/bg.png);">
   <div class="container">
      <div class="row">
         <div class="col-lg-7 align-self-center">
            <div class="discount-box">

               <div id="container">
                  <div class="discount_desc" id="inner">
                     <h4>Travel Adventures</h4>
                     <h2>Discover Amazing Places of the world</h2>
                     <p>Spend a best Holidays with us</p>
                     <div class="tour-details">
                        <!-- <a href="tour-details.html"><i class="fa fa-flag"></i> Book Now</a> -->
                     </div>
                     <!-- <div class="descount_btn">
                                    <a href="#"><img src="<?php echo base_url();?>assets/frontend_asset/img/appstore.png" alt="appstore" /></a>
                                    <a href="#"><img src="<?php echo base_url();?>assets/frontend_asset/img/playstore.png" alt="playstore" /></a>
                                </div> -->
                  </div>
               </div>
            </div>
         </div>
         <div class="col-lg-5 align-self-center">
            <div class="shape-image text-center">
               <!-- <img class="img-fluid" src="<?php echo base_url();?>assets/frontend_asset/img/bann-img.png" alt=""> -->
               <div class="grun-img shape-3">
                  <img class="img-fluid" src="<?php echo base_url();?>assets/frontend_asset/img/shape-2.png" alt="">
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- Discount Area End -->
<script>
   $('#country_id').on('change', function() { 
      window.location.replace("<?php echo base_url();?>"+'country-visa/'+$('#country_id').val());
   });
</script>