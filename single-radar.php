<?php
/**** The post template file ****/
 get_header();

if (have_posts()):
    while ( have_posts() ) : the_post(); ?>

<div class="breadcrumb">
    <div class="container">
        <?php wp_custom_breadcrumbs(); ?>
    </div>
</div>
<section class="single-radar">
    <div class="container">
        <div class="title-content">
            <h4 class="radar-title">Radar</h4>
            <h3 class="radar-item-title"><?php the_title(); ?></h3>
            <p class="radar-title">Publicado em <?php the_date(); ?></p>
            <hr>
        </div>
    </div>
    <div class="container">
        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
        <img src="<?php echo $image[0]; ?>" width="60" height="60" alt="" class="image" />
        <section class="politica-content">
            <div class="post__content">
                    <?php the_content(); ?>
            </div>
            <div class="post__tags">
                <?php $taxonomy = 'tag-radar';
                    $tags = get_terms([
                        'taxonomy' => $taxonomy,
                        'hide_empty' => false,
                        'order' => 'DESC'
                        ]);
                ?>
                <h3>Tags</h3>
                <ul>
                    <?php foreach($tags as $tag): ?>
                        <li><a href="<?php bloginfo('url'); ?>/tags/<?php echo $tag->slug ?>" class="color-red"><?php echo $tag->name ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="post__comments">
                <?php echo do_shortcode('[wpdevart_facebook_comment curent_url="<?php blogbloginfo("url"); ?>" order_type="social" width="100%" bg_color="#d4d4d4" animation_effect="random" count_of_comments="3" title_text=""]'); ?>
            </div>
        </section>
    </div>

    <section class="featured_news">
        <div class="container">
            <h2 class="box-title edition_carousel--title">Notícias Relacionadas</h2>

            <ul class="featured_news--content">
                <?php $args = array( 'post_type' => 'radar', 'posts_per_page' => 4 );
                $loop = new WP_Query( $args );
                while ( $loop->have_posts() ) : $loop->the_post();
                $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
                <li>
                    <span class="featured_news--content_image">
                        <a href="<?php the_permalink(); ?>"><img src="<?php echo $image[0]; ?>" width="60" height="60" alt="" class="image" /></a>
                    </span>
                    <a href="<?php the_permalink(); ?>" class="color-red subtitle"><?php the_date(); ?></a>
                    <a href="<?php the_permalink(); ?>"<h3 class="title"><?php the_title(); ?></h3></a>
                    <a href="<?php the_permalink(); ?>"<p class="text-content"><?php the_excerpt(); ?></p></a>
                </li>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            </ul>
        </div>
    </section>
</section>


    <?php endwhile;
endif;

get_footer(); ?>