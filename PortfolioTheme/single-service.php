<?php get_header(); ?>
<div class="parallax-window" data-parallax="scroll" style="background-color: #81848f;">
    <div class="parallax-content container">
        <h1 class="carousel-title"><?php the_title(); ?></h1>
        <p>Lorem ipsum dolor amet consectetur adipiscing dolore magna aliqua <br/> enim minim estudiat veniam siad venumus dolore</p>
    </div>
</div>

<div class="content-block">
    <div class="content-lg container">
        <div class="row row-space-1">

                <?php while ( have_posts() ) : the_post(); ?>
                    <div class="col-md-8">
                        <?php the_post_thumbnail('img_our_works'); ?>

                        <div class="margin-b-30">
                            <h3><?php the_title(); ?> <span> - $</span> <?php echo get_field("price"); ?></h3>
                            <p><?php the_content(); ?></p>
                        </div>
                        <div class="spacer-30"></div>
                    </div>
                    <div class="pager-area col-md-4">
                        <ul class="pager pull-right">
                            <li><span><<?php next_post_link (' %link'); ?></span></li>
                            <li><span><?php previous_post_link( '%link '); ?>></span></li>
                        </ul>
                    </div>
                <?php endwhile; ?>
            </div>
            <div class="row">
                <div class="col-sm-4 sm-margin-b-2">
                    <!-- Pricing -->
                    <div class="pricing">
                        <h4 class="media-heading">Что входит в услугу: </h4>
                        <ul class="list-unstyled pricing-list margin-b-50">
                            <li class="pricing-list-item"><?php echo get_field("first_set"); ?></li>
                            <li class="pricing-list-item"><?php echo get_field("the_second_set"); ?></li>
                            <li class="pricing-list-item"><?php echo get_field("third_set"); ?></li>
                        </ul>
                    </div>
                    <!-- End Pricing -->
                </div>
                <div class="col-sm-4 sm-margin-b-2">
                    <div class="pricing">
                        <h4 class="media-heading">Общая информация </h4>
                        <ul class="list-unstyled pricing-list margin-b-50">
                            <li class="pricing-list-item">Сроки выполнения: <?php echo get_field("deadline"); ?></li>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content-block gray-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Похожие работы</h3>
                <div class="row margin-b-50"">
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
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
