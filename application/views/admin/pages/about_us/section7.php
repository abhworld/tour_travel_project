<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Section</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form id="section_<?php echo $section_id;?>">
            <div class="modal-body">
                
                <?php $section_content = json_decode($get_info['section_content'], true);?>
                
                <input type="hidden" name="page_name" value="<?php echo $get_info['page_name'];?>">
                <input type="hidden" name="section" value="<?php echo $get_info['section'];?>">
                
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputGroupSelect07" class="">No Happy Customers:</label>
                        <input type="text" class="form-control" name="happy_customer" required id="" style="border: 1px solid #ced4da;" value="<?php if(isset($section_content['happy_customer'])){echo $section_content['happy_customer'];}?>">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="inputGroupSelect07" class="">No Flight To Travel:</label>
                        <input type="text" class="form-control" name="flight_to_travel" required id="" style="border: 1px solid #ced4da;" value="<?php if(isset($section_content['flight_to_travel'])){echo $section_content['flight_to_travel'];}?>">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="inputGroupSelect07" class="">No Hotel to stay:</label>
                        <input type="text" class="form-control" name="hotel_to_stay" required id="" style="border: 1px solid #ced4da;" value="<?php if(isset($section_content['hotel_to_stay'])){echo $section_content['hotel_to_stay'];}?>">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="inputGroupSelect07" class="">No Car Rental:</label>
                        <input type="text" class="form-control" name="car_rental" required id="" style="border: 1px solid #ced4da;" value="<?php if(isset($section_content['car_rental'])){echo $section_content['car_rental'];}?>">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="inputGroupSelect07" class="">No Awesome Tours:</label>
                        <input type="text" class="form-control" name="awesome_tour" required id="" style="border: 1px solid #ced4da;" value="<?php if(isset($section_content['awesome_tour'])){echo $section_content['awesome_tour'];}?>">
                    </div>

                    <div class="form-group col-md-12">
                        <label for="inputGroupSelect07" class="">Background Image:</label>
                        <input type="file" class="form-control" name="image" required id="" style="border: 1px solid #ced4da;">
                    </div>
                    <?php if(isset($section_content['background_image'])){?>
                    <img src="uploads/<?php echo $section_content['background_image']?>" alt="" style="width: 200px;">
                    <input type="hidden" name="prev_image" value="<?php echo $section_content['background_image'];?>">
                    <?php }?>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary save_section_btn" data-id="<?php echo $section_id;?>">Save changes</button>
            </div>
        </form>
    </div>
</div>