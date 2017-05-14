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
        <section class="single-video">
            <div class="container">
                <div class="title-content">
                    <h4 class="video-title">Vídeo</h4>
                    <h3 class="video-item-title"><?php the_title(); ?></h3>
                    <p class="video-title">Publicado em <?php the_date(); ?></p>
                    <hr>
                </div>
            </div>
            <div class="container">
                <div class="container">
                    <div class="capa_video">
                        <?php the_content(); ?>
                    </div>
                    <section class="politica-content">
                        <div class="container post__content">
                             <?php the_field('info'); ?>
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
                            <div class="post__tags">
                                <?php $taxonomy = 'tag-video';
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
                                <div class="post__comments">
                                    <?php echo do_shortcode('[wpdevart_facebook_comment curent_url="<?php blogbloginfo("url"); ?>" order_type="social" width="100%" bg_color="#d4d4d4" animation_effect="random" count_of_comments="3" title_text=""]'); ?>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
             <section class="featured_news">
                <div class="container">
                    <h2 class="box-title edition_carousel--title">Vídeos Relacionados</h2>

                    <ul class="featured_news--content">
                        <?php $args = array( 'post_type' => 'videos', 'posts_per_page' => 4 );
                        $loop = new WP_Query( $args );
                        while ( $loop->have_posts() ) : $loop->the_post();
                        $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
                        <li>
                            <span class="featured_news--content_image">
                                <a href="<?php the_permalink(); ?>"><img src="<?php echo $image[0]; ?>" width="60" height="60" alt="" class="image" /></a>
                            </span>
                            <a href="<?php the_permalink(); ?>" class="color-red subtitle"><?php echo get_the_date(); ?></a>
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