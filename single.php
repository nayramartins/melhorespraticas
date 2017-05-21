<?php
/**** The post template file ****/
 get_header();

if (have_posts()):
    while ( have_posts() ) : the_post();
        $terms = wp_get_post_terms($post->ID, 'edicoes'); ?>

        <section class="materia">
            <div class="container">
                <div class="materia__container">
                    <h4 class="taxonomy__title"><?php echo $terms[0]->name; ?></h4>
                    <h1 class="post__title"><?php the_title(); ?></h1>
                    <h3 class="post__author"><?php the_field('autor') ?></h3>
                    <hr>
                    <h2 class="post__call"><?php echo the_field('call') ?></h2>
                    <section class="merchandising_1">
                        <?php $postAnuncio = get_post(224); 
                            $image = wp_get_attachment_image_src( get_post_thumbnail_id( $postAnuncio->ID ), 'full' );
                            if($image): 
                            $a = '<a href="' . get_field('link', $postAnuncio->ID) . '"><img src="' .  $image[0] . '" width="60" height="60" alt="" class="image" /></a>';
                            else:
                            $a = '<a href="' . get_site_url() . '/anuncie"><p class="subtitle">' .$postAnuncio->post_content . '</p></a>';
                            endif; 
                            echo $a;
                            wp_reset_postdata(); ?>
                    </section>
                    <div class="post__content">
                        <?php the_content(); 
                        $is_purchased = false;
                        $str_products_payperpost = get_post_meta( get_the_ID(), 'woocommerce_ppp_product_id', true ); var_dump($str_products_payperpost);
                        $current_user = wp_get_current_user();
                        $arr_ids_products = explode( ",", $str_products_payperpost );
                        foreach ( $arr_ids_products as $id ):
                            $purchased = wc_customer_bought_product( $current_user->user_email, $current_user->ID, $id );
                            if ( $purchased || $id == '' ):
                                $is_purchased = true;
                            endif;
                        endforeach;

                        // var_dump($is_purchased);
                        ?>
                    </div>
                    <div class="post__referencias">
                        <h3>Referências</h3>
                        <p><?php the_field('referencias')?></p>
                    </div>
                    <div class="post__tags">
                        <?php $tags = wp_get_post_tags( $post->ID ); ?>
                        <h3>Tags</h3>
                        <ul>
                            <?php foreach($tags as $tag): ?>
                                <li><a href="<?php bloginfo('url'); ?>/tags/<?php echo $tag->slug ?>" class="color-red"><?php echo $tag->name ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <?php get_sidebar(); ?>
            </div>
            <div class="container post__footer">
                <div class="post__comments">
                    <?php echo do_shortcode('[wpdevart_facebook_comment curent_url="<?php blogbloginfo("url"); ?>" order_type="social" width="100%" bg_color="#d4d4d4" animation_effect="random" count_of_comments="3" title_text=""]'); ?>
                </div>
                <div class="post__navigation">
                    <?php
                    $prev_post = get_previous_post();
                    if (!empty( $prev_post )): ?>
                        <div class="post__navigation__item left">
                            <a href="<?php echo $prev_post->guid ?>">
                                <h4 class="color-red subtitle">Matéria Anterior</h4>
                                <h4 class="color-black navigation__title"><?php echo $prev_post->post_title ?></h4>
                                <p class="color-grey"><?php echo get_field('call', $next_post->ID); ?></p>
                            </a>
                        </div>
                    <?php endif ?>
                    <?php
                    $next_post = get_next_post();
                    if (!empty( $next_post )): ?>
                        <div class="post__navigation__item right">
                            <a href="<?php echo $next_post->guid ?>">
                                <h4 class="color-red subtitle">Próxima Matéria</h4>
                                <h4 class="color-black navigation__title"><?php echo $next_post->post_title ?></h4>
                                <p class="color-grey"><?php echo get_field('call', $next_post->ID); ?></p>
                            </a>
                        </div>
                    <?php endif ?>
                </div>
            </div>
        </section>

    <?php endwhile;
endif;

get_footer(); ?>