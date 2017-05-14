<?php
/**** The post template file ****/
 get_header(); ?>
<div class="screen-title">
    <div class="container">
        <div class="title-content">
            <h3><?php the_title(); ?></h3>
        </div>
    </div>
</div>
<div class="breadcrumb">
    <div class="container">
        <?php wp_custom_breadcrumbs(); ?>
    </div>
</div>
<div class="container">
    <div class="container">
        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
        <img src="<?php echo $image[0]; ?>" width="60" height="60" alt="" class="image" />
        <section class="politica-content">
        <div class="container">
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
                the_content();
                endwhile; endif; ?>
        </div>
        </section>
    </div>
</div>
<?php get_footer(); ?>