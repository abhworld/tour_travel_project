<div class="in-content-wrapper">
    <div class="row no-gutters">

        <div class="col">
            <div class="heading-messages">
                <h3>Booking Listing</h3>
            </div><!-- End heading-messages -->
        </div><!-- End column -->
        <div class="col-md-4">
            <div class="breadcrumb">
                <div class="breadcrumb-item"><i class="fas fa-angle-right"></i><a href="#">Listing</a>
                </div>
                <div class="breadcrumb-item active"><i class="fas fa-angle-right"></i>All
                </div>
            </div><!-- end breadcrumb -->
        </div><!-- End column -->
    </div><!-- end row -->

    <div class="box">
        <div>
            <p style="margin-left: 18px;color: green;font-weight: 600;font-size: 14px;"><?php echo $this->session->flashdata('success_msg');?></p>
        </div>
        <div class="row no-gutters">
            <div class="col text-left">
<!--                <div class="add-new">
                    <a href="add-slider">Add New<i class="fas fa-plus"></i></a>
                </div> End add-new-->
            </div><!-- End column-->
            <div class="col text-right">
<!--                <div class="tools-btns">
                    <a href="#"><i class="fas fa-print" data-toggle="tooltip" data-html="true"
                                   title="Print"></i></a>
                    <a href="#"><i class="fas fa-file-pdf" data-toggle="tooltip" data-html="true"
                                   title="Pdf"></i></a>
                    <a href="#"><i class="fas fa-file-excel" data-toggle="tooltip" data-html="true"
                                   title="Excel"></i></a>
                </div> End tool-btns-->
            </div><!-- End text-right-->

        </div><!-- end row -->
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
                                <?php echo $book['phone_no'];?>
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
                        <?php $i++;}?>
                    </tbody>
                </table>
            </div><!-- end column -->
        </div><!-- end row -->
    </div><!-- end box -->
</div>