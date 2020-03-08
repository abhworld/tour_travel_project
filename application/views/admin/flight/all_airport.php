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
                <h3>Airport Listing</h3>
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
                    <a data-toggle="modal" data-target="#add_airport_modal" style="cursor: pointer;color: #fff;">Add New<i class="fas fa-plus"></i></a>
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
                            <th>Country</th>
                            <th>Airport Name</th>
                            <th>IATA Code</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;foreach ($all_airport as $row) {?>
                        <tr>
                            <td>
                                <?php echo $i;?>
                            </td>
                            
                            <td>
                                <?php echo $row['name']?>
                            </td>
                            
                            <td>
                                <?php echo $row['airline_airport']?>
                            </td>
                            
                            <td class="text-center">
                                <?php echo $row['airline_iata_code']?>
                            </td>
                            
                            <td>
                                <a onclick="edit_airport_modal('<?php echo $row['airline_id']?>')">
                                    <i class="fas fa-edit"></i>
                                </a>
<!--                                <a href="flight/delete_airline/<?php echo $row['airline_id']?>" onclick="return confirm('Are you sure you want to delete this item?');">
                                    <i class="fas fa-trash-alt"></i>
                                </a>-->
                            </td>
                        </tr>
                        <?php $i++;}?>
                    </tbody>
                </table>
            </div><!-- end column -->
        </div><!-- end row -->
    </div><!-- end box -->
</div>

<!-- Modal -->
<div class="modal fade" id="add_airport_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add City</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <div id="error_message" style="margin-left: 15px;"></div>
            <div id="success_msg" style="margin-left: 15px;color: green; font-weight: 600;"></div>
            
            <form class="text-center" id="add_city" action="flight/save_airport_data" method="post">
                <div class="modal-body">
                    <div class="form-row">
                        <div class="col-md" id="menu_id">
                            <div class="form-group">
                                <label for="inputGroupSelect07" class="" style="text-align: left;display: block;">Country:</label>
                                <select class="form-control" name="airline_country_id" id="inputGroupSelect00" style="border: 1px solid #ced4da !important;">
                                    <option value="">Choose Country</option>
                                    <?php foreach ($all_country as $menu) {?>
                                    <option value="<?php echo $menu['id']?>">
                                        <?php echo $menu['name'];?>
                                    </option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="col-md" id="menu_id">
                            <div class="form-group">
                                <label for="inputGroupSelect07" class="" style="text-align: left;display: block;">Airport Name:</label>
                                <input type="text" class="form-control" name="airline_airport" required id="" style="border: 1px solid #ced4da !important;">
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="col-md" id="menu_id">
                            <div class="form-group">
                                <label for="inputGroupSelect07" class="" style="text-align: left;display: block;">IATA Code:</label>
                                <input type="text" class="form-control" name="airline_iata_code" required id="" style="border: 1px solid #ced4da !important;">
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="edit_country_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        
    </div>
</div>


<script>
    function edit_airport_modal(airline_id){
        $.ajax({
            url: "flight/edit_airport_modal",
            type: 'POST',
            data: {
                airline_id: airline_id
            },
            success: function (response) {
                var obj = JSON.parse(response);
                $("#edit_country_modal").html(obj.edit_city_modal);
                $('#edit_country_modal').modal('show');
                
            }
        })
    }
</script>