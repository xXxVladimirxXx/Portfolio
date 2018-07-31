<?php get_header(); ?>
<!--========== SLIDER ==========-->
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <?php $count = 0;
        $slider = new WP_Query( array ( 'post_type'  => 'slider', 'order' => 'ASC' ) );
        if ( $slider->have_posts() ) {
            while ( $slider->have_posts() ) : $slider->the_post(); $count ++;?>

                <div class="item <?php if ($count == '1') { echo 'active'; } ?>">
                    <img class="img-responsive" src="<?php the_post_thumbnail_url('img_slider'); ?>" alt="Slider Image">
                    <div class="container">
                        <div class="carousel-centered">
                            <div class="margin-b-40">
                                <h1 id="title-logo" class="carousel-title"><?php the_title();?></h1>
                                <p><?php the_content(); ?></p>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endwhile; wp_reset_postdata(); } ?>
        <div class="container">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                <li data-target="#carousel-example-generic" data-slide-to="3"></li>
            </ol>
        </div>
    </div>
</div>
<!--========== SLIDER ==========-->
<!--========== PAGE LAYOUT ==========-->
<!-- Service -->
<div class="bg-color-sky-light" data-auto-height="true">
    <div class="content-lg container">
        <div class="row row-space-1 margin-b-2">
            <?php
            $advantages = new WP_Query( array ( 'post_type'  => 'advantages', 'order' => 'ASC' ) );
            if ( $advantages->have_posts() ) {
                while ( $advantages->have_posts() ) : $advantages->the_post();?>
            <div class="col-sm-4 sm-margin-b-2">
                <div class="wow fadeInLeft" data-wow-duration=".3" data-wow-delay=".3s">
                    <div class="service" data-height="height">
                       <!-- <div class="service-element">
                            <i class="service-icon icon-chemistry"></i>
                        </div> -->
                        <div class="service-info">
                            <h3><?php the_title(); ?></h3>
                            <p class="margin-b-5"><?php the_content(); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile; wp_reset_postdata(); } ?>
    </div>
        <!--// end row -->
    </div>
</div>
<!-- End Service -->

<!-- Latest Products -->
<div class="content-lg container">
    <div class="row margin-b-40">
        <div class="col-sm-6">
            <h2>Последние работы</h2>
            <p>Здесь представлены последние работы которые мы завершили</p>
        </div>
    </div>
    <!--// end row -->

    <div class="row">
        <?php $works = new WP_Query( array ( 'post_type'  => 'works', 'posts_per_page'  => '3' ) );
            if ( $works->have_posts() ) {
                while ( $works->have_posts() ) : $works->the_post(); ?>
                <!-- Latest Products -->
                <div class="col-sm-4 sm-margin-b-50">
                    <div class="margin-b-20">
                        <div class="wow zoomIn" data-wow-duration=".3" data-wow-delay=".1s">
                            <?php the_post_thumbnail('img_our_works'); ?>
                        </div>
                    </div>
                    <h4><?php the_title(); ?></h4>
                    <p><?php the_excerpt(); ?></p>
                    <a class="link" href="<?php the_permalink(); ?>">Посмотреть полностью</a>
                </div>
                <!-- End Latest Products -->
        <?php endwhile; wp_reset_postdata(); } ?>
    </div>
    <!--// end row -->
</div>
<!-- End Latest Products -->

<!-- Testimonials -->
<div class="content-lg container">
    <div class="row">
        <div class="col-sm-9">
            <h2>Комментарии наших заказчиков</h2>


            <!-- Swiper Testimonials -->
            <div class="swiper-slider swiper-testimonials">
                <!-- Swiper Wrapper -->
                <div class="swiper-wrapper">

                    <?php
                    $args = array(
                        'number'  => 10,
                        'orderby' => 'comment_date',
                        'order'   => 'DESC',
                        'status'  => 'approve',
                        'type'    => 'comment', // только комментарии, без пингов и т.д...
                    );

                   $comments = get_comments( $args );
                    foreach( $comments as $comment ){
                        ?>

                    <div class="swiper-slide comment-<?php comment_ID(); ?>">
                        <blockquote class="blockquote">
                            <div class="margin-b-20"><?php comment_text(); ?></div>
                            <p><span class="fweight-700 color-link"><?php comment_author(); ?></span>, <a href="<?php comment_link(); ?>">Комментарий к статье...</a></p>
                        </blockquote>
                    </div>

                    <?php } ?>

                </div>
                <!-- End Swiper Wrapper -->

                <!-- Pagination -->
                <div class="swiper-testimonials-pagination"></div>
            </div>
            <!-- End Swiper Testimonials -->
        </div>
    </div>
    <!--// end row -->
</div>
<!-- End Testimonials -->

<!-- Pricing -->
<div class="bg-color-sky-light">
    <div class="content-lg container">
        <div class="row row-space-1">

        <?php $service = new WP_Query( array ( 'post_type'  => 'service', 'order' => 'ASC', 'posts_per_page'  => '3' ) );
        if ( $service->have_posts() ) {
            while ( $service->have_posts() ) : $service->the_post(); ?>

            <div class="col-sm-4 sm-margin-b-2">
                <!-- Pricing -->
                <div class="pricing">
                    <div class="margin-b-30">
                        <i class="pricing-icon icon-chemistry"></i>
                        <h3><?php the_title(); ?> <span> - $</span> <?php echo get_field("price"); ?></h3>
                        <p><?php the_content(); ?></p>
                    </div>
                    <ul class="list-unstyled pricing-list margin-b-50">
                        <li class="pricing-list-item"><?php echo get_field("first_set"); ?></li>
                        <li class="pricing-list-item"><?php echo get_field("the_second_set"); ?></li>
                        <li class="pricing-list-item"><?php echo get_field("third_set"); ?></li>
                    </ul>
                    <a href="<?php the_permalink(); ?>" class="btn-theme btn-theme-sm btn-default-bg text-uppercase">Подробнее</a>
                </div>
                <!-- End Pricing -->
            </div>

        <?php endwhile; wp_reset_postdata(); } ?>

        </div>
        <!--// end row -->
    </div>
</div>
<!-- End Pricing -->

    <!-- Work -->
    <div class="bg-color-sky-light overflow-h">
        <div class="content-lg container">
            <div class="row margin-b-40">
                <div class="col-sm-6">
                    <h2>Блог</h2>
                    <p>Обучающие статьи</p>
                </div>
            </div>
            <!--// end row -->

            <!-- Masonry Grid -->
            <div class="masonry-grid">
                <div class="masonry-grid-sizer col-xs-6 col-sm-6 col-md-1"></div>

                <?php
                $post_blog = new WP_Query( array ( 'post_type' => 'post', 'posts_per_page'  => '6' ) );
                if ( $post_blog->have_posts() ) {
                      while ( $post_blog->have_posts() ) : $post_blog->the_post(); ?>
                <div class="masonry-grid-item col-xs-6 col-sm-6 col-md-4">
                    <div class="work wow fadeInUp" data-wow-duration=".4" data-wow-delay=".2s">
                        <div class="work-overlay">
                            <?php the_post_thumbnail('img_our_works'); ?>
                        </div>
                        <div class="work-content">
                            <h3 class="color-white margin-b-5"><?php the_title(); ?></h3>
                        </div>
                        <a class="content-wrapper-link" href="<?php the_permalink(); ?>"></a>
                    </div>
                </div>
              <?php endwhile; wp_reset_postdata(); } ?>

            </div>
            <!-- End Masonry Grid -->
        </div>
    </div><!-- End Work -->
<!--========== END PAGE LAYOUT ==========-->

<?php get_footer(); ?>