<script src="assets/admin_asset/js/popper.min.js"></script>
<script src="assets/admin_asset/js/bootstrap.min4.2.1.js"></script>

<script src="assets/admin_asset/vendors/dropzone-5.5.0/dist/min/dropzone.min.js"></script>

<script src="assets/admin_asset/js/customscriptfile.js"></script>
<script src="assets/admin_asset/vendors/chart.js-2.8.0/dist/Chart.min.js"></script>
<!--<script src="assets/admin_asset/vendors/ckeditor5-build-classic/ckeditor.js"></script>-->
<script src="assets/admin_asset/js/ckeditor/ckeditor.js" type="text/javascript"></script>
<script src="assets/admin_asset/js/ckeditor/adapters/jquery.js" type="text/javascript"></script>
<script href="assets/admin_asset/js/ckeditor/config.js"></script>
<script src="assets/admin_asset/js/ckeditor/styles.js" type="text/javascript"></script>
<script src="assets/admin_asset/js/dropify.js"></script>

<?php 
    $page_segment = $this->uri->segment(2);
    if($page_segment == 'home-page' || $page_segment == 'about-us' || $page_segment == 'contact-us' || $page_segment == 'footer-content') {
?>
<script src="assets/frontend_asset/js/owl.carousel.min.js"></script>
<!--magnific-popup-1.1.0.js-->
<script src="assets/frontend_asset/js/magnific-popup-1.1.0.js"></script>
<!--jquery.nice-select.min.js-->
<!--<script src="assets/frontend_asset/js/jquery.nice-select.min.js"></script>-->
<!--jquery.waypoints.4.0.0.min.js-->
<script src="assets/frontend_asset/js/jquery.waypoints.4.0.0.min.js"></script>
<!--jquery.counterup.min.js-->
<script src="assets/frontend_asset/js/jquery.counterup.min.js"></script>
<!--jquery.slicknav.min.js-->
<script src="assets/frontend_asset/js/jquery.slicknav.min.js"></script>
<!--main.js-->
<script src="assets/frontend_asset/js/main.js"></script>
<?php }?>

<script src="assets/admin_asset/vendors/datatables/datatables.min.js"></script>
<script src="assets/admin_asset/js/select2.js" type="text/javascript"></script>
<script src="assets/admin_asset/js/select2.full.js" type="text/javascript"></script>
<!-- Page Scripts Ends -->

<script>
    $(document).ready(function(){
        // Basic
        $('.dropify').dropify();
        $('#example').DataTable();
        $('#data-table').DataTable();
        // $(".select2").select2();
        
        $(".js-example-tokenizer").select2({
            placeholder: 'Select an option',
            tags: true,
            tokenSeparators: [',', ' ']
        });
    });
    
    $('.editor').ckeditor({
        height: 200,
        extraPlugins : 'simage, ckeditor_wiris, htmlwriter, uploadimage',
        filebrowserBrowseUrl: '/uploads/ckeditor_image?type=Images',
        filebrowserUploadUrl: 'imageUpload',
        toolbar: [
        { name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'NewPage','Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
        { name: 'basicstyles', items: [ 'Bold', 'Italic','Underline','Strike','Subscript', 'Superscript', '-', 'SImage', 'Source', 'Table', 'Image' ] },
        '/',
        { name: 'document', items: [ 'RemoveFormat','Maximize', 'ShowBlocks','TextColor', 'BGColor','-', 'Templates','Link', 'addFile'] },
        '/',
        { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'Language' ] },
        { name: 'styles', items: [ 'Styles', 'Format','Font','FontSize'] },
        ],
        allowedContent: true,
        toolbarCanCollapse : false
    });
    
    $('.editor1').ckeditor({
        height: 200,
        extraPlugins : 'simage, ckeditor_wiris, htmlwriter',
        filebrowserBrowseUrl: '/assets/uploads?type=Images',
        filebrowserUploadUrl: 'imageUpload',
        toolbar: [
        { name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'NewPage','Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
        { name: 'basicstyles', items: [ 'Bold', 'Italic','Underline','Strike','Subscript', 'Superscript', '-', 'SImage', 'Source', 'Table' ] },
        '/',
        { name: 'document', items: [ 'RemoveFormat','Maximize', 'ShowBlocks','TextColor', 'BGColor','-', 'Templates','Link', 'addFile'] },
        '/',
        { name: 'styles', items: [ 'Styles', 'Format','Font','FontSize'] },
        ],
        allowedContent: true,
        toolbarCanCollapse : false
    });

    $('.editor2').ckeditor({
        height: 200,
        extraPlugins : 'simage, ckeditor_wiris, htmlwriter',
        filebrowserBrowseUrl: '/assets/uploads?type=Images',
        filebrowserUploadUrl: 'imageUpload',
        toolbar: [
        { name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'NewPage','Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
        { name: 'basicstyles', items: [ 'Bold', 'Italic','Underline','Strike','Subscript', 'Superscript', '-', 'SImage', 'Source', 'Table' ] },
        '/',
        { name: 'document', items: [ 'RemoveFormat','Maximize', 'ShowBlocks','TextColor', 'BGColor','-', 'Templates','Link', 'addFile'] },
        '/',
        { name: 'styles', items: [ 'Styles', 'Format','Font','FontSize'] },
        ],
        allowedContent: true,
        toolbarCanCollapse : false
    });
    
    $('.itinerary').ckeditor({
        height: 200,
        extraPlugins : 'simage, ckeditor_wiris',
        filebrowserBrowseUrl: '/assets/uploads?type=Images',
        filebrowserUploadUrl: 'imageUpload',
        toolbar: [
        { name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'NewPage','Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
        { name: 'basicstyles', items: [ 'Bold', 'Italic','Underline','Strike','Subscript', 'Superscript', '-', 'SImage', 'Table' ] },
        '/',
        { name: 'document', items: [ 'RemoveFormat','Maximize', 'ShowBlocks','TextColor', 'BGColor','-', 'Templates','Link', 'addFile'] },
        '/',
        { name: 'styles', items: [ 'Styles', 'Format','Font','FontSize'] },
        ],
        allowedContent: true,
        toolbarCanCollapse : false
    });
    
    $('.included').ckeditor({
        height: 200,
        extraPlugins : 'simage, ckeditor_wiris',
        filebrowserBrowseUrl: '/assets/uploads?type=Images',
        filebrowserUploadUrl: 'imageUpload',
        toolbar: [
        { name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'NewPage','Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
        { name: 'basicstyles', items: [ 'Bold', 'Italic','Underline','Strike','Subscript', 'Superscript', '-', 'SImage', 'Table' ] },
        '/',
        { name: 'document', items: [ 'RemoveFormat','Maximize', 'ShowBlocks','TextColor', 'BGColor','-', 'Templates','Link', 'addFile'] },
        '/',
        { name: 'styles', items: [ 'Styles', 'Format','Font','FontSize'] },
        ],
        allowedContent: true,
        toolbarCanCollapse : false
    });
    
    $('.excluded').ckeditor({
        height: 200,
        extraPlugins : 'simage, ckeditor_wiris',
        filebrowserBrowseUrl: '/assets/uploads?type=Images',
        filebrowserUploadUrl: 'imageUpload',
        toolbar: [
        { name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'NewPage','Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
        { name: 'basicstyles', items: [ 'Bold', 'Italic','Underline','Strike','Subscript', 'Superscript', '-', 'SImage', 'Table' ] },
        '/',
        { name: 'document', items: [ 'RemoveFormat','Maximize', 'ShowBlocks','TextColor', 'BGColor','-', 'Templates','Link', 'addFile'] },
        '/',
        { name: 'styles', items: [ 'Styles', 'Format','Font','FontSize'] },
        ],
        allowedContent: true,
        toolbarCanCollapse : false
    });
    
    $('.faq').ckeditor({
        height: 200,
        extraPlugins : 'simage, ckeditor_wiris',
        filebrowserBrowseUrl: '/assets/uploads?type=Images',
        filebrowserUploadUrl: 'imageUpload',
        toolbar: [
        { name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'NewPage','Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
        { name: 'basicstyles', items: [ 'Bold', 'Italic','Underline','Strike','Subscript', 'Superscript', '-', 'SImage', 'Table' ] },
        '/',
        { name: 'document', items: [ 'RemoveFormat','Maximize', 'ShowBlocks','TextColor', 'BGColor','-', 'Templates','Link', 'addFile'] },
        '/',
        { name: 'styles', items: [ 'Styles', 'Format','Font','FontSize'] },
        ],
        allowedContent: true,
        toolbarCanCollapse : false
    });
    
    $('.price').ckeditor({
        height: 200,
        extraPlugins : 'simage, ckeditor_wiris',
        filebrowserBrowseUrl: '/assets/uploads?type=Images',
        filebrowserUploadUrl: 'imageUpload',
        toolbar: [
        { name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'NewPage','Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
        { name: 'basicstyles', items: [ 'Bold', 'Italic','Underline','Strike','Subscript', 'Superscript', '-', 'SImage', 'Table' ] },
        '/',
        { name: 'document', items: [ 'RemoveFormat','Maximize', 'ShowBlocks','TextColor', 'BGColor','-', 'Templates','Link', 'addFile'] },
        '/',
        { name: 'styles', items: [ 'Styles', 'Format','Font','FontSize'] },
        ],
        allowedContent: true,
        toolbarCanCollapse : false
    });
    
//    let editor;
//    ClassicEditor
//            .create( document.querySelector( '.editor' ) )
//            .then( newEditor => {
//                editor = newEditor;
//            })
//            .catch( error => {
//                console.error( error );
//            } );
//    ClassicEditor
//            .create( document.querySelector( '.editor1' ) )
//            .catch( error => {
//                console.error( error );
//            } );
</script>


<script>

    var sub_img = 0;
    var p_file = 0;
    $(document).on('mouseover', '.dropify', function () {
        $(this).dropify();
    });
    $(document).on('focus', '.dropify', function () {
        $(this).dropify();
    });
    var img_extn = ['png', 'PNG', 'jpg', 'JPG', 'jpeg', 'JPEG'];

    function image_hover(color_code) {
        document.getElementById('add_img_div').style.backgroundColor = color_code;
    }

    function add_images() {
        sub_img++;
        var addImg = '<div  class="col-md-3" style="float: left;">'
                + '<input type="file" id="sub_img_' + sub_img + '" data-height="150" class="dropify" name="userfile[]" data-default-file="">'
                + '<span id="img_err" style="color: red;">'
                + '<?php // echo form_error('sub_img'); ?>'
                + '</span>'
                + '</div>';
        $('#add_images_div').before(addImg);
        $('#sub_img_' + sub_img).focus();
    }

</script>