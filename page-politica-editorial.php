<?php
/**** The post template file ****/
 get_header(); ?>
<div class="container">
    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
    <img src="<?php echo $image[0]; ?>" width="60" height="60" alt="" class="image" />
    <section class="politica-content">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
        the_content();
        endwhile; endif; ?>
    </section>
 </div>
<?php get_footer(); ?>