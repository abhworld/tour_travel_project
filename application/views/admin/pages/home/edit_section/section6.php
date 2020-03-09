<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Section</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form method="post" action="admin/edit_home_person_data" enctype="multipart/form-data">
            <div class="modal-body">
                
                <?php $section_content = json_decode($get_info['section_content'], true);
                ?>
                
                <input type="hidden" name="page_name" value="<?php echo $get_info['page_name'];?>">
                <input type="hidden" name="section" value="<?php echo $get_info['section'];?>">
                
                <input type="hidden" name="index_id" value="<?=$array_index?>">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputGroupSelect07" class="">Name:</label>
                        <input type="text" class="form-control" name="name" required id="" style="border: 1px solid #ced4da;" value="<?php echo $section_content['person'][$array_index]['name']?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputGroupSelect07" class="">Address:</label>
                        <input type="text" class="form-control" name="address" required id="" style="border: 1px solid #ced4da;" value="<?php echo $section_content['person'][$array_index]['address']?>">
                    </div>

                    <div class="form-group col-md-12">
                        <label for="inputGroupSelect07" class="">Review:</label>
                        <textarea type="text" class="form-control" name="review_text" required id="" style="border: 1px solid #ced4da;"><?php echo $section_content['person'][$array_index]['review_text']?></textarea>
                    </div>

                    <div class="form-group col-md-12">
                        <label for="inputGroupSelect07" class="">Image:</label>
                        <input type="file" class="form-control" name="image[]" id="" style="border: 1px solid #ced4da;">
                    </div>
                    <?php if (isset($section_content['person'][$array_index]['image'])) { ?>
                        <img src="uploads/home_happy_traveller/<?php echo $section_content['person'][$array_index]['image'] ?>" alt="" style="width: 200px;">
                        <input type="hidden" name="prev_image" value="<?php echo $section_content['person'][$array_index]['image']; ?>">
                    <?php } ?>

                    <div class="form-group col-md-12">
                        <label for="inputGroupSelect07" class="">Background Image:</label>
                        <input type="file" class="form-control" name="background_image[]" id="" style="border: 1px solid #ced4da;">
                    </div>
                    <?php if (isset($section_content['person'][$array_index]['background_image'])) { ?>
                        <img src="uploads/home_happy_traveller/<?php echo $section_content['person'][$array_index]['background_image'] ?>" alt="" style="width: 200px;">
                        <input type="hidden" name="prev_background_image" value="<?php echo $section_content['person'][$array_index]['background_image']; ?>">
                    <?php } ?>
                </div>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" data-id="<?php echo $section_id;?>">Save changes</button>
            </div>
        </form>
    </div>
</div>