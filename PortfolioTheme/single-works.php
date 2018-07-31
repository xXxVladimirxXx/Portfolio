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
                        <h3><?php the_title(); ?></h3>
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

        <div class="media commnets">
            <a class="pull-left" href="#">
                <?php $author_email = get_the_author_email();
                echo get_avatar($author_email, '75');?>
            </a>
            <h4 class="media-heading">Отзыв заказчика: <?php the_author(); ?></h4>
            <div class="media-body">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6 sm-margin-b-2">
                <div class="pricing">
                    <h4 class="media-heading">Общая информация </h4>
                    <ul class="list-unstyled pricing-list margin-b-50">
                        <li class="pricing-list-item">Ссылка на сайт: <a href="<?php echo get_field("url"); ?>"><?php echo get_field("url"); ?></a></li>
                        <li class="pricing-list-item">Сроки выполнения: <?php echo get_field("deadline"); ?></li>
                </div>
            </div>
        </div>

        <div class="single-post">
            <div class="response-area">
                <?php if (comments_open()) { //Производим проверку на «открытость» комментраиев
                    if(get_comments_number() != 0){ //Если комментарии есть, делаем вывод

                        comments_template('/comments.php');
                        wp_list_comments(array('callback' => 'fatum_comment'));
                    }
                } else { ?>
                    <h2>Обсуждения закрыты для данной статьи</h2>
                <?php } ?>
            </div><!--/Response-area-->
            <div class="replay-box">
                <div class="row">
                    <!-- Выводим форму добавления комментариев -->
                    <?php
                    $args = array(
                        'fields' =>
                            $fields = array(
                                'author' => ' 
                                            <div class="col-sm-8">
                                                 <label for="author">' . __( 'Name' ) . ($req ? '*' : '') . '</label>
                                            <input type="text" id="author" name="author" class="form-control footer-input margin-b-20" value="' . esc_attr($commenter['comment_author']) . '" placeholder="" pattern="[A-Za-zА-Яа-я]{3,}" maxlength="30" autocomplete="on" tabindex="1" required' . $aria_req . '>',

                                'email' => '
                                                <label for="email">' . __( 'Email') . ($req ? '*' : '') . '</label>
                                            <input type="email" id="email" name="email" class="form-control footer-input margin-b-20" value="' . esc_attr($commenter['comment_author_email']) . '" placeholder="example@example.com" maxlength="30" autocomplete="on" tabindex="2" required' . $aria_req . '>',

                                'url' => '
                                               <label for="url">' . __( 'Website' ) . ($req ? '*' : '') . '</label>
                                            <input type="url" id="url" name="url" class="form-control footer-input margin-b-20" value="' . esc_attr($commenter['comment_author_url']) . '" placeholder="www.example.com" maxlength="30" tabindex="3" autocomplete="on">
                                            ' ),
                        'comment_notes_after' => '',
                        'comment_field' => '
                                            
                                                    <label for="comment">Ваш комментаий</label> <textarea class="form-control margin-b-30" id="comment" name="comment" rows="10" aria-required="true"></textarea>
                                            </div>',
                        'label_submit' => 'Отправить',
                        'submit_button'        => '<input name="%1$s" type="submit" id="%2$s" class="btn-theme btn-theme-sm btn-base-bg text-uppercase" value="%4$s" />',
                        'submit_field'         => '<p class="form-submit">%1$s %2$s</p>',
                    );
                    if (get_comments_number() == 0) { ?>
                        <h2>Комментариев пока нет, но вы можете стать первым</h2>
                        <?php
                        comment_form($args);
                    } else {
                        comment_form($args);
                    } ?>
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
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
