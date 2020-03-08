
<div class="in-content-wrapper">
    <div class="row no-gutters">

        <div class="col">
            <div class="heading-messages">
                <h3>Country Listing</h3>
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
                <div class="add-new">
                    <a href="add-slider" data-toggle="modal" data-target="#add_country_modal">Add New<i class="fas fa-plus"></i></a>
                </div>
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
                            <th>Country Name</th>
                            <th>City Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;foreach ($all_city_list as $val) {?>
                        <tr>
                            <td><?php echo $i;?></td>
                            <td>
                                <?php echo $val['country_name'];?>
                            </td>
                            <td>
                                <?php echo $val['name'];?>
                            </td>
                            <td>
                                <?php if($this->type == 1 || $this->type == 2) {?>
                                <a href="edit-city/<?php echo $val['id']?>">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <?php } if($this->type == 1 || $this->type == 2) {?>
                                <a href="delete-city/<?php echo $val['id']?>">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
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


<!-- Modal -->
<div class="modal fade" id="add_country_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            
            <form class="text-center" id="add_city">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect00">Country:</label>
                            </div>
                            <select class="custom-select" name="country_id" id="inputGroupSelect00">
                                <option value="">Choose Country</option>
                                <?php foreach ($all_country as $menu) {?>
                                <option value="<?php echo $menu['id']?>">
                                    <?php echo $menu['name'];?>
                                </option>
                                <?php }?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="optionBox">
                        <div class="block" style="text-align: right;">
                            <span class="add btn btn-success" style="margin: 10px 0px;">+</span>
                        </div>

                        <div class="block" style="text-align: left;">

                            <div class="form-row">
                                <div class="col-md" id="menu_id">
                                    <div class="form-group">
                                        <label for="inputGroupSelect07" class="" style="text-align: left;display: block;">City Name:</label>
                                        <input type="text" class="form-control" name="name[]" required id="" style="border: 1px solid #ced4da !important;">
                                    </div><!-- end form-group -->
                                </div><!-- end column -->
                            </div><!-- end form-row -->

                        </div>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" id="save_city_btn" class="btn btn-primary">Save</button>
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
    $("#save_city_btn").click(function (){
        var form_data = new FormData($("#add_city")[0]);
        $(".error_msg").html('');
        
        $.ajax({
            url: "admin/save_city",
            type: 'POST',
            processData: false,
            contentType: false,
            cache: false,
            enctype: 'multipart/form-data',
            data: form_data,
            success: function (response) {
                var obj = JSON.parse(response);
                $.each(obj.errors, function(key, val) {
                    $('#error_message').append("<div><small class='error_msg' style='font-weight: bold;color: red;'>" + val + "</small></div>");
                });
                
                if(obj.status == true) {
                    $("#success_msg").show();
                    $("#success_msg").html('Cities Added Successfully');
                    setTimeout(function() {
                        document.location.reload();
                    }, 1000);
                }
            }
        })
    })
    
    var id = 1;
    $('.add').click(function () {
        id++;
//        alert(id);
        $('.block:last').after('<div class="block" style="text-align: left;">\n\
                                    <div class="form-row">\n\
                                        <div class="col-md-10" id="city">\n\
                                            <div class="form-group">\n\
                                                <label for="inputGroupSelect07" class="" style="text-align: left;display: block;">City Name:</label>\n\
                                                <input type="text" class="form-control" name="name[]" required id="" style="border: 1px solid #ced4da !important;">\n\
                                            </div>\n\
                                        </div>\n\
                                        <div class="col-md-2" id="city">\n\
                                            <span class="remove btn btn-danger" style="margin-top: 32px;">X</span>\n\
                                        </div>\n\
                                    </div>\n\
                                    <div class="appenddata' + id + '"></div>\n\
                                </div>');
        $(".select2").select2();
    });
    
    $('.optionBox').on('click', '.remove', function () {
        $(this).closest('.block').remove();
//        $(this).parent().remove();
    });
    
//    function edit_city_modal(city_id){
//        
//        
//        $.ajax({
//            url: "admin/edit_modal",
//            type: 'POST',
//            data: {
//                city_id: city_id
//            },
//            success: function (response) {
//                var obj = JSON.parse(response);
//                $('#edit_country_modal').modal('show');
//                $("#edit_country_modal").html(obj.edit_city_modal);
//                
//            }
//        })
//    }
</script>