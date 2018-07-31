<?php
/*
Template Name: archive-employees
*/
get_header(); ?>

<!--========== PARALLAX ==========-->
<div class="parallax-window" data-parallax="scroll" style="background: url(<?php echo get_the_post_thumbnail_url( 132, 'img_slider' ); ?>);">
    <div class="parallax-content container">
        <h1 class="carousel-title">Сотрудники</h1>
        <p>Lorem ipsum dolor amet consectetur adipiscing dolore magna aliqua <br/> enim minim estudiat veniam siad venumus dolore</p>
    </div>
</div>
<!--========== PARALLAX ==========-->

<!--========== PAGE LAYOUT ==========-->
<!-- Pricing -->
<div class="bg-color-sky-light">
    <div class="content-lg container">
        <div class="row margin-b-50">
            <?php $count = 0;
            if(have_posts()) : while (have_posts()) : the_post(); $count++;?>
                <!-- Our Exceptional Solutions -->
                <div class="col-sm-4 sm-margin-b-50">
                    <div class="bg-color-white margin-b-20">
                        <div class="wow zoomIn" data-wow-duration=".3" data-wow-delay=".1s">
                            <?php the_post_thumbnail('img_employees'); ?>
                        </div>
                    </div>
                    <h4>
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><br>
                        <span class="text-uppercase margin-l-20"><?php echo get_field("position"); ?></span>
                    </h4>
                    <p><?php the_excerpt(); ?></p>
                    <a class="link" href="<?php the_permalink(); ?>">Подробнее</a>
                </div>
                <!-- End Our Exceptional Solutions -->
                <?php
                if( $count % 3 == 0) {
                    echo '</div><div class="row margin-b-50">';
                }
            endwhile; wp_reset_postdata(); else: ?>
                <p><?php _e('Ошибка: 404 Таких постов нет'); ?></p>
            <?php endif; ?>
        </div>
        <!--// end row -->
    </div>
</div>
<!-- End Pricing -->

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
<!--========== END PAGE LAYOUT ==========-->
<?php get_footer(); ?>