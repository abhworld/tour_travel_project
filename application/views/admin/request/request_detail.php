<style>
    #nav-tabContent {
        background: #fff;
    }
    
    #nav-tab a {
        color: #0f0f0f;
        font-weight: 600;
    }
    
    .ck-editor__editable_inline {
        min-height: 200px;
    }
    
    .tab-content > .active {
        padding: 10px;
    }
    
    .block {
        padding: 20px;
        border: 1px solid #ccc;
        background: #fff;
        margin: 20px 0px;
    }
    
    .block:first-of-type{
        padding: 0px;
        border: none;
        background: inherit;
        margin: 0px;
    }
    
    .form-group {
        margin-bottom: 1rem !important;
    }
    
    .block textarea{
        margin: 0px !important;
        border: 1px solid #ccc;
        resize: none;
    }
    
    .block textarea:focus {
        border: 1px solid #ccc;
    }
    
    #map{
        width: 100%;
        height: 250px;
    }
    
    #searchInput{
        top: 10px !important;
        padding: 10px;
        width: 300px;
    }
</style>
<div class="in-content-wrapper">
    <div class="row no-gutters">

        <div class="col">
            <div class="heading-messages">
                <h3>Booking Detail</h3>
            </div><!-- End heading-messages -->
        </div><!-- End column -->
        <div class="col-md-4">
            <div class="breadcrumb">
                <div class="breadcrumb-item">
                    <i class="fas fa-angle-right"></i>
                    <a href="request-list">Listing</a>
                </div>
                <div class="breadcrumb-item active">
                    <i class="fas fa-angle-right"></i>Create
                </div>
            </div><!-- end breadcrumb-->
        </div><!-- end column -->

    </div><!-- end row -->

    <div class="box">

        <div class="row">
            <div class="col">
                
                <div class="details-text">
                    <h4>Request Details</h4>
                </div><!-- end details-text -->
            </div><!-- End column -->
        </div><!-- end row -->
        <div class="hotel-listing-form">
            <div style="text-align: right;margin-right: 10px;">
                <button class="btn btn-info" onclick="window.print();">Print this book</button>
            </div>
            <div class="row">
                
                
                <div class="col-md">
                    <h6 style="margin-left: 20px;">Customer Info</h6>
                    <?php // echo '<pre>';print_r($request_data[0]);die;?>
                    <table class="table table-bordered" style="background-color: #fff;">
                        <tr>
                            <td>Customer Name</td>
                            <td><?php echo $request_data[0]['name'];?></td>
                        </tr>
                        <tr>
                            <td>Customer Email</td>
                            <td><?php echo $request_data[0]['email'];?></td>
                        </tr>
                        <tr>
                            <td>Phone No</td>
                            <td><?php echo $request_data[0]['phone_no'];?></td>
                        </tr>
<!--                        <tr>
                            <td>Booking Note</td>
                            <td><?php // echo $request_data[0]['booking_note'];?></td>
                        </tr>-->
                    </table>
                </div>
                <div class="col-md">
                    <h6 style="margin-left: 20px;">Request Info</h6>
                    <table class="table table-bordered" style="background-color: #fff;">
                        <tr>
                            <td>Request For</td>
                            <td><?php echo book_for($request_data[0]['type'])?></td>
                            
                        </tr>
                        
                        <?php if(book_for($request_data[0]['type']) != 'Flight'){ ?>
                        <tr>
                            <td>Country</td>
                            <td>
                                <?php 
                                    $country_info = get_info('countries', 'id', $request_data[0]['country']);
                                    echo $country_info[0]['name'];
                                ?>
                            </td>
                            
                        </tr>
                        <?php if(book_for($request_data[0]['type']) != 'Visa'){ ?>
                        <tr>
                            <td>City</td>
                            <td>
                                <?php 
                                    echo $request_data[0]['city_name'];
                                ?>
                            </td>
                        </tr>
                        <?php }?>
                        <?php }if(book_for($request_data[0]['type']) == 'Flight'){ ?>
                        <tr>
                            <td>From</td>
                            <td><?php if($request_data[0]['req_from']){echo $request_data[0]['req_from'];}?></td>
                        </tr>
                        <tr>
                            <td>To</td>
                            <td><?php if($request_data[0]['req_to']){echo $request_data[0]['req_to'];}?></td>
                        </tr>
                        <tr>
                            <td>Check In</td>
                            <td><?php if($request_data[0]['check_in']){echo $request_data[0]['check_in'];}?></td>
                        </tr>
                        <tr>
                            <td>Check Out</td>
                            <td><?php if($request_data[0]['check_out']){echo $request_data[0]['check_out'];}?></td>
                        </tr>
                        <tr>
                            <td>Flight Type</td>
                            <td>
                                <?php 
                                if($request_data[0]['flight_type'] == 1){
                                    echo 'One Way';
                                } else if($request_data[0]['flight_type'] == 2) {
                                    echo 'Round Trip';
                                } else {
                                    echo 'Multiple Cities';
                                }
                                ?>
                            </td>
                        </tr>
                        
                        <?php }?>
                        <?php if(book_for($request_data[0]['type']) != 'Visa'){ ?>
                        <tr>
                            <td>No. of Adult</td>
                            <td><?php echo $request_data[0]['no_of_adult'];?></td>
                        </tr>
                        <tr>
                            <td>No. of Child</td>
                            <td><?php echo $request_data[0]['no_of_child'];?></td>
                        </tr>
                        <?php }?>

                    </table>
                </div>
            </div>
            
            
            
        </div><!-- end hotel-listing-form -->
    </div><!-- end box -->
</div><!-- end in-content-wrapper -->


