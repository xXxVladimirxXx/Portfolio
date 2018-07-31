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
            <div class="row">
                <?php while ( have_posts() ) : the_post(); ?>
                    <div class="col-md-8">
                        <h3>
                            <?php the_title(); ?>
                            <span class="text-uppercase margin-l-20"><?php echo get_field("position"); ?></span>
                        </h3>
                        <?php the_post_thumbnail('img_our_works'); ?>

                        <p><?php the_content(); ?></p>
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
        </div>
    </div>
</div>
</div>

<?php get_footer(); ?>
