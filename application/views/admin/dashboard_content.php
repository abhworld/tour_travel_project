<div class="in-content-wrapper">
    <div class="row no-gutters">

        <div class="col">
            <div class="heading-messages">
                <h3>Dashboard</h3>
            </div><!-- End heading-messages -->
        </div><!-- End column -->
        <div class="col-md-4">
            <div class="breadcrumb">
                <div class="breadcrumb-item">
                    <i class="fas fa-angle-right"></i>
                    <a href="dashboard">Dashboard</a>
                </div>
            </div><!-- End Breadcrumbs-->
        </div><!-- End column -->
    </div><!-- End row -->

    <div class="box">
        <h4 style="margin-left: 20px;">Latest Booking</h4>
        <div class="dashboard1-wrapper">
            <div class="row no-gutters">
            <div class="col">
                <table id="example" class="display table-hover table-responsive-xl listing">
                    <thead>
                        <tr>
                            <th >#</th>
                            <th >Book For</th>
                            <th >Book Date</th>
                            <th >Name</th>
                            <th >Email</th>
                            <th >Contact No</th>
                            <th >Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;foreach ($all_booking_list as $book) {?>
                        <tr>
                            <td ><?php echo $i;?></td>
                            <td >
                                <?php echo book_for($book['type'])?>
                            </td>
                            <td >
                                <?php echo $book['booking_date'];?>
                            </td>
                            <td >
                                <?php echo $book['first_name']. ' '. $book['last_name']?>
                            </td>
                            <td >
                                <?php echo $book['email_address'];?>
                            </td>
                            <td style="text-align: left;">
                                <?php echo $book['contact_no'];?>
                            </td>
                            <td >
                                <?php if($this->type == 1 || $this->type == 2) {?>
                                <a href="view-booking/<?php echo $book['booking_id']?>">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <?php } if($this->type == 1 || $this->type == 2) {?>
                                <!--<a href="delete-slider/<?php echo $book['booking_id']?>"><i class="fas fa-trash-alt"></i></a>-->
                                <?php }?>
                            </td>
                        </tr>
                        <?php $i++; if($i == 6){break;}}?>
                    </tbody>
                </table>
            </div><!-- end column -->
        </div>
            
        </div>
    </div>
    
    <div class="box">
        <h4 style="margin-left: 20px;">Latest Request</h4>
        <div class="dashboard1-wrapper">
            <div class="row no-gutters">
            <div class="col">
                <table id="data-table" class="display table-hover table-responsive-xl listing">
                    <thead>
                        <tr>
                            <th >#</th>
                            <th >Request For</th>
                            <th >Request Date</th>
                            <th >Name</th>
                            <th >Email</th>
                            <th >Contact No</th>
                            <th >Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;foreach ($all_request_list as $book) {?>
                        <tr>
                            <td ><?php echo $i;?></td>
                            <td >
                                <?php echo book_for($book['type'])?>
                            </td>
                            <td >
                                <?php echo $book['req_date'];?>
                            </td>
                            <td >
                                <?php echo $book['name'];?>
                            </td>
                            <td >
                                <?php echo $book['email'];?>
                            </td>
                            <td style="text-align: left;">
                                <?php echo $book['phone_no'];?>
                            </td>
                            <td >
                                <a href="view-request/<?php echo $book['request_id']?>">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                        <?php $i++;if($i == 6){break;}}?>
                    </tbody>
                </table>
            </div><!-- end column -->
        </div>
            
        </div><!-- End dashboard1-wrapper -->
    </div><!-- End Box -->
</div><!-- End in-content-wrapper -->