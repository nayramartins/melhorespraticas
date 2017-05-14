<?php
/**
 * The template for displaying search results pages
 */

get_header(); ?>

	<div class="content-area">
		<?php if ( have_posts() ) : ?>
            <section class="featured_news search_result">
                <div class="screen-title">
                    <div class="container">
                        <div class="title-content">
                            <h3>Resultados para: <span><?php echo $_GET['s']; ?></span></h3>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <ul class="featured_news--content">
			            <?php while ( have_posts() ) : the_post(); ?>
                            <li>
                                <span class="featured_news--content_image">
                                    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
								    <img src="<?php echo $image[0]; ?>" width="50" height="50" alt="" class="image" />
                                </span>
                                <span class="search-text">
                                    <a href="#" class="color-red subtitle"><?php the_date(); ?></a>
                                    <p class="title"><?php the_title(); ?></p>
                                </span>
                                <!--<p class="text-content"><?php the_excerpt(); ?></p>-->
                            </li>
			            <?php endwhile; ?>
                    </ul>
                    <?php get_sidebar(); ?>
                </div>
            </section>
        <?php  else : ?>
			<div> nenhum post </div>
		<?php endif; ?>
	</div>

<?php get_footer(); ?>
