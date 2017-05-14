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
            </div>
        </section>
    <?php endwhile;
endif;

get_footer(); ?>