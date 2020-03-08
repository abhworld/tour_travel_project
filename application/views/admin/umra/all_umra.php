<div class="in-content-wrapper">
    <div class="row no-gutters">

        <div class="col">
            <div class="heading-messages">
                <h3>Umra Listing</h3>
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
                    <a href="add-umra">Add New<i class="fas fa-plus"></i></a>
                </div><!-- End add-new-->
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
                            <th>#</th>
                            <th>Package Name</th>
                            <!--<th>Country</th>-->
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;foreach ($all_umra as $umra) {?>
                        <tr>
                            <td><?php echo $i;?></td>
                            <td>
                                <?php echo $umra['package_name']?>
                            </td>
                            
                            <td>
                                <?php if(has_permission($this->type, 'edit-umra')) {?>
                                <a href="edit-umra/<?php echo $umra['umra_id']?>"><i class="fas fa-edit"></i></a>
                                <?php }if(has_permission($this->type, 'delete-umra')) {?>
                                <a href="delete-data/3/<?php echo $umra['umra_id']?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fas fa-trash-alt"></i></a>
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