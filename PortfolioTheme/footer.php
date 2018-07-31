<!--========== FOOTER ==========-->
<footer class="footer">
    <!-- Links -->
    <div class="footer-seperator">
        <div class="content-lg container">
            <div class="row">
                <div class="col-sm-2 sm-margin-b-50">
                    <!-- List -->
                    <?php wp_nav_menu( [
                        'theme_location' => 'footer-menu',
                    ] ); ?>
                    <!-- End List -->
                </div>
                <div class="col-sm-4 sm-margin-b-30">
                    <!-- List -->
                    <ul class="list-unstyled footer-list">
                        <li class="footer-list-item"><a class="footer-list-link" href="<?php echo get_option("Facebook"); ?>">Facebook</a></li>
                        <li class="footer-list-item"><a class="footer-list-link" href="<?php echo get_option("Instagram"); ?>">Instagram</a></li>
                        <li class="footer-list-item"><a class="footer-list-link" href="<?php echo get_option("Youtube"); ?>">Youtube</a></li>
                        </ul>
                    </ul>
                    <!-- End List -->
                </div>


                <div class="col-sm-5 sm-margin-b-30">
                    <h2 class="color-white">Напишите нам</h2>
                    <!--
                    <input type="text" class="form-control footer-input margin-b-20" placeholder="Name" required>
                    <input type="email" class="form-control footer-input margin-b-20" placeholder="Email" required>
                    <input type="text" class="form-control footer-input margin-b-20" placeholder="Phone" required>
                    <textarea class="form-control footer-input margin-b-30" rows="6" placeholder="Message" required></textarea>
                    <button type="submit" class="btn-theme btn-theme-sm btn-base-bg text-uppercase">Submit</button>
                    -->
                    <?php echo do_shortcode('[contact-form-7 id="40" title="Contact form 1"]'); ?>
                </div>
            </div>
            <!--// end row -->
        </div>
    </div>
    <!-- End Links -->

    <!-- Copyright -->
    <div class="content container">
        <div class="row">
            <div class="col-xs-6">
                <div class="logo">
                    <a href="<?php bloginfo('url'); ?>"><h1 id="title-logo" class="nav-item-child nav-item-hover"><?php bloginfo('name'); ?></h1></a>
                </div>
            </div>
            <div class="col-xs-6 text-right">
                <p class="margin-b-0"><a class="color-base fweight-700" href="<?php bloginfo('url'); ?>">Portfolio</a> Theme Powered by: <a class="color-base fweight-700">Brother Dolzhykovi</a></p>
            </div>
        </div>
        <!--// end row -->
    </div>
    <!-- End Copyright -->
</footer>
<!--========== END FOOTER ==========-->

<!-- Back To Top -->
<a href="javascript:void(0);" class="js-back-to-top back-to-top"><h2 style="color: white">🠙</h2></a>

<!-- JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- CORE PLUGINS -->
<script src="<?php bloginfo('template_directory'); ?>/vendor/jquery.min.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_directory'); ?>/vendor/jquery-migrate.min.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_directory'); ?>/vendor/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

<!-- PAGE LEVEL PLUGINS -->
<script src="<?php bloginfo('template_directory'); ?>/vendor/jquery.easing.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_directory'); ?>/vendor/jquery.back-to-top.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_directory'); ?>/vendor/jquery.smooth-scroll.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_directory'); ?>/vendor/jquery.wow.min.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_directory'); ?>/vendor/swiper/js/swiper.jquery.min.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_directory'); ?>/vendor/masonry/jquery.masonry.pkgd.min.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_directory'); ?>/vendor/masonry/imagesloaded.pkgd.min.js" type="text/javascript"></script>

<!-- PAGE LEVEL SCRIPTS -->
<script src="<?php bloginfo('template_directory'); ?>/js/layout.min.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/components/wow.min.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/components/swiper.min.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/components/masonry.min.js" type="text/javascript"></script>
<?php wp_footer(); ?>
</body>
<!-- END BODY -->
</html>