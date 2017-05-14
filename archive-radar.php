<?php
/**** The main template file ****/
get_header(); ?>
<div class="content-area">
    <section class="radar">
        <div class="screen-title">
            <div class="container">
                <div class="title-content">
                    <h3>Radar</h3>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="radar__container">
                <ul class="featured_news--content">
                    <?php $args = array( 'post_type' => 'radar', 'posts_per_page' => 8 );
                    $loop = new WP_Query( $args );
                    while ( $loop->have_posts() ) : $loop->the_post();
                        $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
                        <li>
                            <span class="featured_news--content_image">
                                <a href="<?php the_permalink(); ?>"><img src="<?php echo $image[0]; ?>" width="60" height="60" alt="" class="image" /></a>
                            </span>
                            <div class="featured_news--content_text">
                                <a href="<?php the_permalink(); ?>" class="color-red subtitle"><?php the_date(); ?></a>
                                <a href="<?php the_permalink(); ?>"<h3 class="title"><?php the_title(); ?></h3></a>
                                <a href="<?php the_permalink(); ?>"<p class="text-content"><?php the_excerpt(); ?></p></a>
                                <a href="<?php the_permalink(); ?>"<p class="color-red subtitle">Leia Mais</p></a>
                            </div>
                        </li>
                    <?php endwhile; ?>
                </ul>
                <?php wp_reset_postdata(); ?>
            </div>
        <?php get_sidebar(); ?>
        </div>
    </section>

    
</div>

<?php get_footer(); ?>