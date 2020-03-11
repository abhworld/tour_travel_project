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
                <h3>News Listing</h3>
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
                            <th>News Title</th>
                            <th>Category</th>
                            <th>Created At</th>
                            <!--<th>Offer</th>-->
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;foreach ($all_news as $row) {?>
                        <tr>
                            <td style=""><?php echo $i;?></td>
                            <td style="">
                                <?php echo $row['news_title']?>
                            </td>
                            <td style="">
                                <?php echo $row['category_name']?>
                            </td>
                            <td style="">
                                <?php echo date('Y-m-d', strtotime($row['created_at']))?>
                            </td>
                            
                            <td style="">
                                <a href="edit-news/<?php echo $row['news_id']?>">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="delete-news/<?php echo $row['news_id']?>" onclick="return confirm('Are you sure you want to delete this item?');">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                        <?php $i++;}?>
                    </tbody>
                </table>
            </div><!-- end column -->
        </div><!-- end row -->
    </div><!-- end box -->
</div>