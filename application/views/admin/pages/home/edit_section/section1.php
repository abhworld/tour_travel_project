<div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header" style="display: block;">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Add Section 1 Data</h4>
        </div>
        <form method="post" action="admin/update_slider_data" enctype="multipart/form-data">
            <div class="modal-body">
                
                <?php $section_content = json_decode($get_info['section_content'], true);?>
                
                <input type="hidden" name="page_name" value="Home">
                <input type="hidden" name="section" value="<?=$get_info['section'];?>">
                <input type="hidden" name="index_id" value="<?=$array_index?>">
                <input type="hidden" name="folder_name" value="<?=$folder_name?>">

                <div class="form-group">
                    <label for="inputGroupSelect07" class="">Title:</label>
                    <input type="text" class="form-control" name="title" required id="" style="border: 1px solid #ced4da;" value="<?php echo $section_content['section_content'][$array_index]['title'];?>">
                </div>
                <div class="form-group">
                    <label for="inputGroupSelect07" class="">Text:</label>
                    <input type="text" class="form-control" name="text" required id="" style="border: 1px solid #ced4da;" value="<?php echo $section_content['section_content'][$array_index]['text'];?>">
                </div>
                <div class="form-group">
                    <label for="inputGroupSelect07" class="">Background Image:</label>
                    <input type="file" class="form-control" name="image[]" id="" style="border: 1px solid #ced4da;">
                </div>
                
                <img src="uploads/home/<?=$folder_name;?>/<?php echo $section_content['section_content'][$array_index]['background_image']?>" alt="" style="width: 200px;">
                <input type="hidden" name="prev_image" value="<?php echo $section_content['section_content'][$array_index]['background_image'];?>">
                
            </div>
            <div class="modal-footer">
                <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
                <button type="submit" class="btn btn-success" data-id="1" style="color: #fff;background-color: #28a745;border-color: #28a745;">Save changes</button>
            </div>
        </form>
    </div>

</div>