<?php
/**
 * The template for displaying search results pages
 */

get_header(); ?>

	<div class="content-area">
		<?php if ( have_posts() ) : ?>
            <section class="featured_news search_result">
                <div class="search_result-title">
                    <div class="container">
                        <h3>Resultados para: <span>medicina</span></h3>
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
                    <div class="search-right">
                        <div class="advanced-search">
                            <p class="lora-title advanced-title">Busca Avançada</p>
                            <p class="subtitle color-grey">Palavra-chave</p>
                            <input type="text" class="search-field"/>
                            <p class="subtitle color-grey">Filtrar por</p>
                            <ul class="search-filter">
                                <li><a href="#" class="title subtitle">Matérias</a></li>
                                <li><a href="#" class="title subtitle">Matérias</a></li>
                                <li><a href="#" class="title subtitle">Matérias</a></li>
                                <li><a href="#" class="title subtitle">Matérias</a></li>
                            </ul>
                        </div>
                        <div class="merchandising_2">
                            <p class="subtitle color-white">anuncie aqui</p>
                        </div>
                    </div>
                </div>
            </section>
        <?php  else : ?>
			<div> nenhum post </div>
		<?php endif; ?>
	</div>

<?php get_footer(); ?>
