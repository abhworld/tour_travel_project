<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Section</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        
        <form action="flight/update_airport_data" method="post" id="">
            <div class="modal-body">
                
                <input type="hidden" name="airline_id" value="<?php echo $airport_info['airline_id'];?>">
                
                <div class="form-row">
                    <div class="col-md" id="menu_id">
                        <div class="form-group">
                            <label for="inputGroupSelect07" class="" style="text-align: left;display: block;">Country:</label>
                            <select class="form-control" name="airline_country_id" id="inputGroupSelect00" style="border: 1px solid #ced4da !important;">
                                <option value="">Choose Country</option>
                                <?php foreach ($all_country as $menu) { ?>
                                    <option value="<?php echo $menu['id'] ?>" <?php if($airport_info['airline_country_id'] == $menu['id']){echo 'selected';}?>>
                                        <?php echo $menu['name']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md" id="menu_id">
                        <div class="form-group">
                            <label for="inputGroupSelect07" class="" style="text-align: left;display: block;">Airport Name:</label>
                            <input type="text" class="form-control" name="airline_airport" required id="" style="border: 1px solid #ced4da !important;" value="<?php echo $airport_info['airline_airport']?>">
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md" id="menu_id">
                        <div class="form-group">
                            <label for="inputGroupSelect07" class="" style="text-align: left;display: block;">IATA Code:</label>
                            <input type="text" class="form-control" name="airline_iata_code" required id="" style="border: 1px solid #ced4da !important;" value="<?php echo $airport_info['airline_iata_code']?>">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
    </div>
</div>