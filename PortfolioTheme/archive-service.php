<?php
/*
Template Name: archive-service
*/
get_header(); ?>

<!--========== PARALLAX ==========-->
<div class="parallax-window" data-parallax="scroll" style="background: url(<?php echo get_the_post_thumbnail_url( 132, 'img_slider' ); ?>);">
    <div class="parallax-content container">
        <h1 class="carousel-title">Услуги</h1>
        <p>Lorem ipsum dolor amet consectetur adipiscing dolore magna aliqua <br/> enim minim estudiat veniam siad venumus dolore</p>
    </div>
</div>
<!--========== PARALLAX ==========-->

<!--========== PAGE LAYOUT ==========-->
<!-- Pricing -->
<div class="bg-color-sky-light">
    <div class="content-lg container">
        <div class="row row-space-1">
        <?php $count = 0;
        if(have_posts()) : while (have_posts()) : the_post(); $count++;?>
                <div class="col-sm-4 sm-margin-b-2">
                    <!-- Pricing -->
                    <div class="pricing">
                        <div class="margin-b-30">
                            <i class="pricing-icon icon-chemistry"></i>
                            <h3><?php the_title(); ?> <span> - $</span> <?php echo get_field("price"); ?></h3>
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

            <?php
            if( $count % 3 == 0) {
                echo '</div><div class="row row-space-1">';
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