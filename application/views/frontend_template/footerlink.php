    
    <!-- Popper JS -->
    <script src="<?php echo base_url();?>assets/frontend_asset/js/popper.min.js"></script>
    <!--Bootstrap js-->
    <script src="<?php echo base_url();?>assets/frontend_asset/js/bootstrap.min.js"></script>
    <!--Owl-Carousel js-->
    <script src="<?php echo base_url();?>assets/frontend_asset/js/owl.carousel.min.js"></script>
    <!--Animatedheadline js-->
    <script src="<?php echo base_url();?>assets/frontend_asset/js/jquery.animatedheadline.min.js"></script>
    <!--Slicknav js-->
    <script src="<?php echo base_url();?>assets/frontend_asset/js/jquery.slicknav.min.js"></script>
    <!--Magnific js-->
    <script src="<?php echo base_url();?>assets/frontend_asset/js/jquery.magnific-popup.min.js"></script>
    <!-- Datepicker -->
    <script src="<?php echo base_url();?>assets/frontend_asset/js/jquery.datepicker.min.js"></script>
    <!--Nice Select js-->
    <!-- <script src="<?php echo base_url();?>assets/frontend_asset/js/jquery.nice-select.min.js"></script> -->
    <!-- Way Points JS -->
    <script src="<?php echo base_url();?>assets/frontend_asset/js/waypoints-min.js"></script>
    <!-- Sticky sidebar JS -->
    <script src="<?php echo base_url();?>assets/frontend_asset/js/jquery.sticky-sidebar.min.js"></script>
    <!-- niceCountryInput js -->
    <script src="<?php echo base_url();?>assets/frontend_asset/js/niceCountryInput.js"></script>
    <!--Main js-->
    <script src="<?php echo base_url();?>assets/frontend_asset/js/main.js"></script>
    <script src="assets/admin_asset/js/select2.js" type="text/javascript"></script>
    <script src="assets/admin_asset/js/select2.full.js" type="text/javascript"></script>

    <script src="<?php echo base_url();?>assets/frontend_asset/js/select2.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/frontend_asset/js/select2.full.js" type="text/javascript"></script>

    <!—- ShareThis BEGIN -—>
    <!-- <script async src="https://platform-api.sharethis.com/js/sharethis.js#property=5e524534fb5dd10012827de6&product=sticky-share-buttons"></script> -->
    <!—- ShareThis END -—>

    <!-- Smartsupp Live Chat script -->
    <script type="text/javascript">
    var _smartsupp = _smartsupp || {};
    _smartsupp.key = 'cd7f3b02734a47c2610e70bb02c46ef98cec330f';
    window.smartsupp||(function(d) {
    var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
    s=d.getElementsByTagName('script')[0];c=d.createElement('script');
    c.type='text/javascript';c.charset='utf-8';c.async=true;
    c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
    })(document);
    </script>
    <script>
        function onChangeCallback(ctr){
            console.log("The country was changed: " + ctr);
            //$("#selectionSpan").text(ctr);
        }

        $(document).ready(function(){
        // Basic
        $(".select2").select2();
        
        // $(".js-example-tokenizer").select2({
        //     // placeholder: 'Select an option',
        //     // tags: true,
        //     // tokenSeparators: [',', ' ']
        // });
    });
    </script>
