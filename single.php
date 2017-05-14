<?php
/**** The post template file ****/
 get_header();

if (have_posts()):
    while ( have_posts() ) : the_post();
        $terms = wp_get_post_terms($post->ID, 'edicoes'); ?>

        <section class="materia">
            <div class="container">
                <h4><?php echo $terms[0]->name; ?></h4>
                <h1><?php the_title(); ?></h1>
                <h3><?php the_field('autor') ?></h3>
                <h2><?php the_field('call') ?></h2>
                <?php the_content(); ?>
                <h3>Referências</h3>
                <div><?php the_field('referencias')?></div>
                <div class="page-content">
                    <?php $tags = wp_get_post_tags( $post->ID ); ?>
                    <h3>Tags</h3>
                    <ul>
                        <?php foreach($tags as $tag): ?>
                            <li><a href="<?php bloginfo('url'); ?>/tags/<?php echo $tag->slug ?>" class="color-red"><?php echo $tag->name ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php echo do_shortcode('[wpdevart_facebook_comment curent_url="<?php blogbloginfo("url"); ?>" order_type="social" width="100%" bg_color="#d4d4d4" animation_effect="random" count_of_comments="3" ]'); ?>
            </div>
        </section>

    <?php endwhile;
endif;

get_footer(); ?>