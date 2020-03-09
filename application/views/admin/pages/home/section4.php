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
                    <label for="inputGroupSelect07" class="">Sub Title:</label>
                    <input type="text" class="form-control" name="sub_title" required id="" style="border: 1px solid #ced4da;" value="<?php if(isset($section_content['sub_title'])){echo $section_content['sub_title'];}?>">
                </div>
                <div class="form-group">
                    <label for="inputGroupSelect07" class="">Title:</label>
                    <input type="text" class="form-control" name="title" required id="" style="border: 1px solid #ced4da;" value="<?php if(isset($section_content['title'])){echo $section_content['title'];}?>">
                </div>
                <div class="form-group">
                    <label for="inputGroupSelect07" class="">Text:</label>
                    <textarea type="text" class="form-control editor" name="text" required id="editor1" style="border: 1px solid #ced4da;"><?php if(isset($section_content['text'])){echo $section_content['text'];}?></textarea>
                </div>
                <div class="form-group">
                    <label for="inputGroupSelect07" class="">Video Embede Code:</label>
                    <textarea class="form-control" name="video_url" style="border: 1px solid #ced4da;"><?php if(isset($section_content['video_url'])){echo $section_content['video_url'];}?></textarea>
                </div>
                
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary save_section_btn" data-id="<?php echo $section_id;?>">Save changes</button>
            </div>
        </form>
    </div>
</div>