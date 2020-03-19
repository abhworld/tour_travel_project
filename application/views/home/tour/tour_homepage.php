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
            <div class="col-lg-8 tour_list">

                <?php $this->load->view('home/tour/tour_div/tour_div')?>

            </div>
            <div class="col-lg-4">

                <div class="sidebar-widget" id="sidebar">
                    <div class="single-sidebar">
                        <div class="book-hotel-wrapper">
                            <div class="quick-contact">
                                <h3>Book This Tour</h3>
                                <form id="tour_filter_form">

                                    <div class="book-tour-field">
                                        <label class="tb-label">Country</label>
                                       <select class="form-control select2" name="country_id" data-type="1">
                                                    <!-- <option value="">Country</option> -->
                                                    <?php foreach (get_all_info('countries') as $row) { ?>
                                                        <option value="<?php echo $row['id'] ?>" <?php if ($country_id == $row['id']) {echo 'selected';} ?>>
                                                            <?php echo $row['name'] ?>
                                                        </option>
                                                    <?php } ?>
                                        </select>
                                    </div>
                                    <label class="tb-label">City</label>
                                    <div class="book-tour-field">
                                         <!-- <label class="tb-label">City</label> -->
                                            <div class="input-group">
                                                <select class="form-control" name="city_id" data-type="1">

                                                </select>
                                            </div>
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

<script>
    
    //$(document).ready(function (){
        //get_city_by_country('<?php //echo $country_id;?>', '<?php //echo $city_id;?>')
    //});
    
    
    $("[name='country_id']").change(function (){
        var country = this.value;
        var city = '';

        get_city_by_country(country, city);
        search_filter_data();
    });
    
    $("[name='city_id']").change(function (){
        search_filter_data();
    });
    
    function get_city_by_country(country, city){
        $.ajax({
            url: "home/get_city_by_country",
            type: 'POST',
            data: {
                country_id: country,
                city_id: city
            },
            success: function (response) {
                var obj = JSON.parse(response);
                $('[name="city_id"]').html(obj);
            }
        });
    }
    
    $(".radio-btn").click(function (){
        search_filter_data();
    });
    
    function searchPaginationData(page_num) {
        page_num = page_num?page_num:0;
        $.ajax({
            type: 'POST',
            url: 'home/ajaxPaginationData/'+page_num,
            data: {page:page_num},
            beforeSend: function () {
                $('.loading').show();
            },
            success: function (msg) {
                var hhh = JSON.parse(msg);
                $('.tour_list').html(hhh.tour_list_div);
            }
        });
    }
    
    function search_filter_data(){
        $.ajax({
            url: "home/search_tour_data",
            type: 'POST',
            data: $("#tour_filter_form").serialize(),
            success(data){
                var obj = JSON.parse(data);
                $(".tour_list").html(obj.tour_list_div);
            }
        })
    }
    
</script>