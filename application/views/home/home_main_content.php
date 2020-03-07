<!DOCTYPE html>
<html lang="en-US">

<head>
    <?php echo $headerlink;?>
</head>

<body>


<!-- preloader-->
<!-- <div id="preloader">
    <div id="status">&nbsp;</div>
</div> -->
<!-- preloader-->


    <!-- Header Area Start -->
    <header class="abh-header-area">
        <!-- Header Top Area Start -->
       <?php echo $header;?>
    </header>
    <!-- Header Area End -->


<!-- Slider Area Start -->
	<?php echo $home_content;?>
<!-- Blog Area End -->




    <!-- Footer Area Start -->
    <footer class="abh-footer-area">
        <?php echo $footer;?>
    </footer>
    <!-- Footer Area End -->


    <!-- Sidebar Navigation Start -->
    <?php echo $sidebar;?>
    <!-- Sidebar Navigation End -->


    <?php echo $footerlink;?>

    <!-- <script>
    var tag = document.createElement('script');
    tag.src = "https://www.youtube.com/iframe_api";
    var firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

    var player;
    function onYouTubeIframeAPIReady() {
        player = new YT.Player('player', {
        videoId: 'JPe2mwq96cw',
        playerVars: {
            autoplay: 1,
            controls: 0,
            modestbranding: 1,
            loop: 1,
            playlist: 'JPe2mwq96cw'
        }
        });
    }
    </script> -->
</body>



</html>
