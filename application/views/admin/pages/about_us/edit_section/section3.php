<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Section</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form method="post" action="admin/edit_section3_data" enctype="multipart/form-data">
            <div class="modal-body">
                
                <?php 
                $section_content = json_decode($get_info['section_content'], true);
                ?>
                
                <input type="hidden" name="page_name" value="<?php echo $get_info['page_name'];?>">
                <input type="hidden" name="section" value="<?php echo $get_info['section'];?>">
                
                <input type="hidden" name="index_id" value="<?=$array_index?>">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="inputGroupSelect07" class="">Title:</label>
                        <input type="text" class="form-control" name="title" required id="" style="border: 1px solid #ced4da;" value="<?php echo $section_content['content'][$array_index]['title']; ?>">
                    </div>

                    <div class="form-group col-md-12">
                        <label for="inputGroupSelect07" class="">Text:</label>
                        <textarea type="text" class="form-control" name="text" required id="" style="border: 1px solid #ced4da;" ><?php echo $section_content['content'][$array_index]['text']; ?></textarea>
                    </div>

                </div>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" data-id="<?php echo $section_id;?>">Save changes</button>
            </div>
        </form>
    </div>
</div>