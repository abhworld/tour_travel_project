<div class="in-content-wrapper">
    <div class="row no-gutters">

        <div class="col">
            <div class="heading-messages">
                <h3>Profile</h3>
            </div> <!-- End heading-messages -->
        </div> <!-- End column -->
        <div class="col-md-4">
            <div class="breadcrumb">
                <div class="breadcrumb-item"><i class="fas fa-angle-right"></i><a href="#">Profile</a>
                </div>
                <div class="breadcrumb-item active"><i class="fas fa-angle-right"></i>Edit Profile
                </div>
            </div><!-- End breadcrumb-->
        </div><!-- End column -->

    </div><!-- End row -->

    <div class="box">

        <div class="row">
            <div class="col">
                <div class="details-text">
                    <h4>Change Password</h4>
                </div><!-- End details-text -->
            </div><!-- End column -->
        </div><!-- End row -->
        <div class="hotel-listing-form">
            <form class="text-center" id="update_password_form">
                <div class="row">
                    <div class="col">
                        
                        <div id="success_msg" style='font-weight: bold;color: green;'></div>
                        <div id="error_message"></div>
                        
                        <div class="form-row">
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="to" class="">Old Password:</label>
                                    <input type="password" class="form-control" required id="to" name="old_password">
                                </div><!-- end form-group -->
                            </div><!-- End column -->
                        </div><!-- End form-row -->
                        <div class="form-row">
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="to1" class="">New Password:</label>
                                    <input type="password" class="form-control" required id="to1" name="new_password">
                                </div><!-- end form-group -->
                            </div><!-- end column -->
                        </div><!-- end form-row -->
                        <div class="form-row">
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="to2" class="">Repeat Password:</label>
                                    <input type="password" class="form-control" required id="to2" name="conf_password">
                                </div><!-- end form-group -->
                            </div><!-- End column -->
                        </div><!-- End form-row -->

                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <button type="button" class="btn" id="update_btn">Update</button>
                            </li>
                        </ul>
                    </div><!-- End column -->
                </div><!-- End row -->

            </form>
        </div><!-- End hotel-listing-form -->
    </div><!-- End Box -->
</div>

<script>
    $("#update_btn").click(function (){
        var form_data = new FormData($("#update_password_form")[0]);
//        var content = $( 'textarea.editor' ).val();
//        console.log(editor.getData());
        $("#error_message").html('');
        $("#success_msg").html('');
        $.ajax({
            url: "update-password",
            type: 'POST',
            processData: false,
            contentType: false,
            cache: false,
            enctype: 'multipart/form-data',
            data: form_data,
            success: function (response) {
                var obj = JSON.parse(response);
                $.each(obj.errors, function(key, val) {
                    $('#error_message').append("<div class='text-left'><small class='error_msg' style='font-weight: bold;color: red;'>" + val + "</small></div>");
                });
                if(obj.status == true){
                    $("#success_msg").show();
                    $("#success_msg").html('Your Password Updated Successfully');
                }
            }
        });
    })
</script>