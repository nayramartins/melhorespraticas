<?php
/**** The main template file ****/
get_header(); ?>
<div class="content-area">
    <section class="entrevistas">
        <div class="screen-title">
            <div class="container">
                <div class="title-content">
                    <h3>Entrevistas</h3>
                </div>
            </div>
        </div>
        <div class="breadcrumb">
            <div class="container">
                <?php wp_custom_breadcrumbs(); ?>
            </div>
        </div>
        <div class="container">
            <div class="entrevistas__container">
                <?php $args = array( 'post_type' => 'entrevistas', 'posts_per_page' => 12 );
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
                            <a href="<?php the_permalink(); ?>"> <div class="open-sans-title"><?php echo the_field('entrevistado'); ?></div>
                            <p class="color-grey subtitle"><?php echo the_field('subtitulo_entrevistado'); ?></p>
                        </div>
                    </div>
                    <div class="title"><?php the_title(); ?></div>
                    <div class="color-red subtitle"><?php echo get_the_date(); ?></div></a>
                </div>
                <?php endwhile;
                wp_reset_postdata(); ?>
            </div>
        <?php get_sidebar(); ?>
        </div>
    </section>


</div>

<?php get_footer(); ?>