<style>
    .hot a{
        background-color: #f33;
        padding: 5px 10px;
        border-radius: 10px;
        font-size: 13px;
        color: #fff !important;;
    }
    
    .normal a{
        background-color: orange;
        padding: 5px 10px;
        border-radius: 10px;
        font-size: 13px;
        color: #fff !important;;
    }
</style>

<div class="in-content-wrapper">
    <div class="row no-gutters">

        <div class="col">
            <div class="heading-messages">
                <h3>Hotel Listing</h3>
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
        <div class="row no-gutters">
            <div class="col text-left">
                <div class="add-new">
                    <a href="add-hotel">Add New<i class="fas fa-plus"></i></a>
                </div><!-- End add-new-->
            </div><!-- End column-->
            <div class="col text-right">
                
            </div><!-- End text-right-->

        </div><!-- end row -->
        <div class="row no-gutters">
            <div class="col">
                <table id="example" class="display table-hover table-responsive-xl listing">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Hotel Name</th>
                            <th>Country</th>
                            <th>City</th>
                            <!--<th>Offer</th>-->
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;foreach ($all_hotel as $hotel) {?>
                        <tr>
                            <td style=""><?php echo $i;?></td>
                            <td style="">
                                <?php echo $hotel['hotel_name']?>
                            </td>
                            <td style="">
                                <?php echo $hotel['country_name']?>
                            </td>
                            <td style="">
                                <?php echo $hotel['city_name']?>
                            </td>
<!--                            <td class="<?php if($hotel['offer']){ echo 'hot';}else {echo 'normal';}?>" style="">
                                <a href="set-hot/1/<?php echo $hotel['id']?>"><?php if($hotel['offer']){echo 'Hot';} else {echo 'Normal';}?></a>
                            </td>-->
                            <td style="">
                                <?php if(has_permission($this->type, 'edit-hotel')) {?>
                                <a href="edit-hotel/<?php echo $hotel['id']?>"><i class="fas fa-edit"></i></a>
                                <?php }if(has_permission($this->type, 'delete-hotel')) {?>
                                <a href="delete-data/1/<?php echo $hotel['id']?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fas fa-trash-alt"></i></a>
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