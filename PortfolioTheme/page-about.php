<?php
/*
Template Name: about
Template Post Type: page
*/
get_header(); ?>
        <!--========== END HEADER ==========-->

        <!--========== PARALLAX ==========-->
        <div class="parallax-window" data-parallax="scroll" style="background: url(<?php the_post_thumbnail_url('img_top'); ?>);">
            <div class="parallax-content container">
                <h1 class="carousel-title">О нас</h1>
            </div>
        </div>
        <!--========== PARALLAX ==========-->

        <!--========== PAGE LAYOUT ==========-->
        <?php if(have_posts()) : while (have_posts()) : the_post(); ?>
        <!-- About -->
        <div class="content-lg container">
            <!--// end row -->

            <div class="row">
                <?php the_content(); ?>
            </div>
            <!--// end row -->
        </div>
        <!-- End About -->
   <?php endwhile; wp_reset_postdata(); endif; ?>
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

        <!-- Testimonials -->
        <div class="content-lg container">
            <div class="row">
                <div class="col-sm-9">
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
                    </div>
                    <!-- End Swiper Testimonials -->
                </div>
            <!--// end row -->
            </div>
        </div>
        <!-- End Testimonials -->

        <!-- Team -->
        <div class="bg-color-sky-light">
            <div class="content-lg container">
                <div class="row margin-b-40">
                    <div class="col-sm-6">
                        <h2>Наша команда</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed tempor incididunt ut laboret dolore magna aliqua enim minim veniam exercitation</p>
                    </div>
                </div>
                <!--// end row -->

                <div class="row">
                    <?php
                    $employees = new WP_Query( array ( 'post_type'  => 'employees' ) );
                    if ( $employees->have_posts() ) {
                        while ( $employees->have_posts() ) : $employees->the_post();?>
                    <!-- Team -->
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
                    <!-- End Team -->
                    <?php endwhile; wp_reset_postdata(); } ?>

                </div>
                <!--// end row -->
            </div>
        </div>
        <!-- End Team -->
        <!--========== END PAGE LAYOUT ==========-->

        <!--========== FOOTER ==========-->
        <?php get_footer(); ?>