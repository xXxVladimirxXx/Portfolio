<?php
/*
Template Name: archive
*/
get_header(); ?>

<!--========== PARALLAX ==========-->
<div class="parallax-window" data-parallax="scroll" style="background: url(<?php echo get_the_post_thumbnail_url( 108, 'img_slider' ); ?>);">
    <div class="parallax-content container">
        <h1 class="carousel-title">Блог</h1>
        <p>Lorem ipsum dolor amet consectetur adipiscing dolore magna aliqua <br/> enim minim estudiat veniam siad venumus dolore</p>
    </div>
</div>
<!--========== PARALLAX ==========-->

<!--========== PAGE LAYOUT ==========-->
<!-- Our Exceptional Solutions -->
<div class="content-lg container">
    <div class="row margin-b-50">
        <?php $count = 0;
        if(have_posts()) : while (have_posts()) : the_post(); $count++;?>
            <!-- Our Exceptional Solutions -->
            <div class="col-sm-4 sm-margin-b-50">
                <div class="margin-b-20">
                    <div class="wow zoomIn" data-wow-duration=".3" data-wow-delay=".1s">
                        <?php the_post_thumbnail('img_our_works'); ?>
                    </div>
                </div>
                <h3><?php the_title(); ?></h3>

                <a class="link" href="<?php the_permalink(); ?>">Посмотреть полностью</a>
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
    <div class="blog-pagination">
        <ul class="pagination">
            <?php if (function_exists('wp_corenavi')) wp_corenavi(); ?>
        </ul>
    </div>
</div>
<!--========== END PAGE LAYOUT ==========-->

<?php get_footer(); ?>