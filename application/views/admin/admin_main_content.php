<!doctype html>
<html lang="en">

    <head>
        
        <?php echo $headerlink;?>

    </head>

    <body>

        <!-- ===========wrapper============= -->
        <div class="wrapper">

            <!-- ===========Top-Bar============= -->
            <div class="top-bar">
                
                <?php echo $header;?>
                
            </div><!-- End top-bar -->

            <!-- =========== sidebar-left ============= -->
            <div class="sidebar-left">
                
                <?php echo $leftbar?>
                
            </div><!-- End sidebar-left -->

            <!-- ===========Innerpage-wrapper============= -->
            <section>
                <div class="content dashbaord">
                    <?php echo $main_content;?>
                </div><!-- End content-dashboard -->
            </section>
            <!-- ===========End Innerpage-wrapper============= -->

        </div><!-- end wrapper -->

        <!-- Optional JavaScript, Not optional it's need too -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <?php echo $footerlink;?>
    </body>


    <!-- Mirrored from kiswa.net/themes/star-travel/admin-demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 27 Apr 2019 06:30:53 GMT -->
</html>