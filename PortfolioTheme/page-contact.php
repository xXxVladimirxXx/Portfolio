<?php
/*
Template Name: contact
Template Post Type: page
*/
?>
    <!DOCTYPE html>
    <html class="no-js">
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8"/>
        <title><?php bloginfo('name'); ?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <meta content="" name="description"/>
        <meta content="" name="author"/>

        <!-- GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Hind:300,400,500,600,700" rel="stylesheet" type="text/css">

        <!-- Favicon -->
        <link rel="shortcut icon" href="favicon.ico"/>
        <?php wp_head(); ?>
        <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
        <script type="text/javascript">
            ymaps.ready(init);

            function init(){
                var myMap = new ymaps.Map("map", {
                    center: [<?php echo get_option('geopoint'); ?>],
                    zoom: 15
                });

                var myPlacemark = new ymaps.Placemark([<?php echo get_option('geopoint'); ?>], {
                    hintContent: 'Содержимое всплывающей подсказки',
                    balloonContent: 'Содержимое балуна'
                });

                myMap.geoObjects.add(myPlacemark);
            }
        </script>
    </head>
    <!-- END HEAD -->

    <!-- BODY -->
<body>

<!--========== HEADER ==========-->
<header class="header navbar-fixed-top">
    <!-- Navbar -->
    <nav class="navbar" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="menu-container">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="toggle-icon"></span>
                </button>

                <!-- Logo -->
                <div class="logo">
                    <a href="<?php bloginfo('url'); ?>"><h1 id="title-logo" class="nav-item-child nav-item-hover"><?php bloginfo('name'); ?></h1></a>
                </div>
                <!-- End Logo -->
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse nav-collapse">
                <?php wp_nav_menu( [
                    'theme_location' => 'menu',
                ] ); ?>
            </div>
            <!-- End Navbar Collapse -->
        </div>
    </nav>
    <!-- Navbar -->
</header>
<!--========== END HEADER ==========-->

        <!--========== END HEADER ==========-->

        <!--========== PARALLAX ==========-->
        <div class="parallax-window" data-parallax="scroll" style="background: url(<?php echo get_the_post_thumbnail_url( 31, 'img_slider' ); ?>);">
            <div class="parallax-content container">
                <h1 class="carousel-title">Контакты</h1>
                <p>Lorem ipsum dolor amet consectetur adipiscing dolore magna aliqua <br/> enim minim estudiat veniam siad venumus dolore</p>
            </div>
        </div>
        <!--========== PARALLAX ==========-->

        <!--========== PAGE LAYOUT ==========-->
        <!-- Contact List -->
        <div class="section-seperator">
            <div class="content-lg container">
                <div class="row">
                    <!-- Contact List -->
                    <div class="col-sm-6 sm-margin-b-80">
                        <div class="wow fadeInLeft" data-wow-duration=".3" data-wow-delay=".3s">
                            <h3><?php echo get_option('address'); ?></h3>
                            <p>Наш офис находиться на третьем этаже в доме который указан на карте</p>
                            <ul class="list-unstyled contact-list">
                                <li><i class="margin-r-10 color-base icon-call-out"></i> <?php echo get_option('phone'); ?></li>
                                <li><i class="margin-r-10 color-base icon-envelope"></i> <?php echo get_option('email'); ?></li>
                            </ul>
                        </div>
                    </div>
                    <!-- End Contact List -->
                </div>
                <!--// end row -->
            </div>
        </div>
        <!-- End Contact List -->

        <!-- Google Map -->
        <div id="map" class="map height-400"></div>

        <!--========== END PAGE LAYOUT ==========-->

        <!--========== FOOTER ==========-->
        <?php get_footer(); ?>