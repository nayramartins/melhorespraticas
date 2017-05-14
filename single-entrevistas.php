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
        <section class="single-entrevista">
            <div class="container">
                <div class="title-content">
                    <h4 class="entrevista-title">Entrevista</h4>
                    <h3 class="entrevista-item-title"><?php the_title(); ?></h3>
                    <p class="entrevista-title">Publicado em <?php the_date(); ?></p>
                    <hr>
                </div>
            </div>
            <div class="container">
                <div class="container">
                    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
                    <div class="capa_entrevista">
                        <img src="<?php echo $image[0]; ?>" width="60" height="60" alt="" class="image" />
                        <div class="capa_content">
                            <h4><?php echo the_field('entrevistado') ?></h4>
                            <p><?php echo the_field('subtitulo_entrevistado'); ?></p>
                        </div>
                    </div>
                    <section class="politica-content">
                        <div class="container post__content">
                             <?php the_content(); ?>
                            <div class="post__entrevistado">
                                <div class="image-box">
                                    <img src="<?php echo the_field('foto_entrevistado'); ?>" />
                                </div>
                                <div class="post__entrevistado__content">
                                    <h4><?php echo the_field('entrevistado') ?></h4>
                                    <p><?php echo the_field('subtitulo_entrevistado'); ?></p>
                                </div>
                            </div>
                            <div class="post__tags">
                                <?php $taxonomy = 'tag-entrevista';
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
            <section class="entrevistas container">
                <h4>Entrevistas Relacionadas</h4>
                <div class="entrevistas__container">
                    <?php $args = array( 'post_type' => 'entrevistas', 'posts_per_page' => 3 );
                        $loop = new WP_Query( $args );
                        while ( $loop->have_posts() ) : $loop->the_post();
                    ?>
                    <div class="entrevistas--content">
                        <div class="box-title">
                            <div class="image-box">
                                <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
                                <img src="<?php echo $image[0]; ?>" width="60" height="60" alt="" class="image" />
                            </div>
                            <div class="text-box">
                                <a href="<?php the_permalink(); ?>"> <div class="lora-title"><?php echo the_field('entrevistado'); ?></div>
                                <p class="color-grey subtitle"><?php echo the_field('subtitulo_entrevistado'); ?></p>
                            </div>
                        </div>
                        <div class="title"><?php the_title(); ?></div>
                        <div class="color-red subtitle"><?php echo get_the_date(); ?></div></a>
                    </div>
                    <?php endwhile;
                    wp_reset_postdata(); ?>
                </div>
            </section>
        </section>

    <?php endwhile;
endif;

get_footer(); ?>