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
                
                <div class="form-group">
                    <label for="inputGroupSelect07" class="">Left Section Title:</label>
                    <input type="text" class="form-control" name="left_section_title" required id="" style="border: 1px solid #ced4da;" value="<?php if(isset($section_content['left_section_title'])){echo $section_content['left_section_title'];}?>">
                </div>

                <div class="form-group">
                    <label for="inputGroupSelect07" class="">Left Section Text:</label>
                    <textarea type="text" class="form-control editor" name="text" required id="editor1" style="border: 1px solid #ced4da;" ><?php if(isset($section_content['left_section_text'])){echo $section_content['left_section_text'];}?></textarea>
                </div>

                <div class="form-group">
                    <label for="inputGroupSelect07" class="">Right Section Image:</label>
                    <input type="file" class="form-control" name="image[]" id="" style="border: 1px solid #ced4da;">
                </div>
                <?php if(isset($section_content['background_image'])){?>
                <img src="uploads/<?php echo $section_content['background_image']?>" alt="" style="width: 200px;">
                <input type="hidden" name="prev_image" value="<?php echo $section_content['background_image'];?>">
                <?php }?>

                <div class="form-group">
                    <label for="inputGroupSelect07" class="">Right Section Title:</label>
                    <input type="text" class="form-control" name="right_section_title" required id="" style="border: 1px solid #ced4da;" value="<?php if(isset($section_content['right_section_title'])){echo $section_content['right_section_title'];}?>">
                </div>

                <div class="form-group">
                    <label for="inputGroupSelect07" class="">Right Section Text:</label>
                    <textarea type="text" class="form-control editor1" name="right_section_text" required id="editor" style="border: 1px solid #ced4da;" ><?php if(isset($section_content['right_section_text'])){echo $section_content['right_section_text'];}?></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary save_section_btn" data-id="<?php echo $section_id;?>">Save changes</button>
            </div>
        </form>
    </div>
</div>