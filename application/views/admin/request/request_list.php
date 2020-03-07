<div class="in-content-wrapper">
    <div class="row no-gutters">

        <div class="col">
            <div class="heading-messages">
                <h3>Request Listing</h3>
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
            </div>
            <div class="col text-right">
            </div>

        </div><!-- end row -->
        <div class="row no-gutters">
            <div class="col">
                <table id="example" class="display table-hover table-responsive-xl listing">
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
                                <?php if($this->type == 1 || $this->type == 2) {?>
                                <a href="view-request/<?php echo $book['request_id']?>">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <?php } if($this->type == 1 || $this->type == 2) {?>
                                <!--<a href="delete-slider/<?php echo $book['request_id']?>"><i class="fas fa-trash-alt"></i></a>-->
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