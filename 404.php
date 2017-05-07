<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage Melhores_Praticas
 * @since Melhores_Praticas 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<section class="error-404 not-found">
				<div class="container">

					<div class="page-content">
						<header class="page-header">
							<h1 class="page-title"><?php _e( 'Página não encontrada.', 'melhorespraticas' ); ?></h1>
						</header>
						<p><?php _e( 'Tente efetuar uma pesquisa do que está procurando:', 'melhorespraticas' ); ?></p>

						<form role="search" id="search-form" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
							<input class="search-form-bottom_text" type="text" name="s"/>
							<input type="submit" class="cta" />
						</form>
					</div>
				</div>
			</section>

			<section class="tags">
				<div class="container">
					<div class="page-content">
						<?php $tags = get_terms( 'post_tag' );

						?>
						<h3>Tags</h3>
						<ul>
							<?php foreach($tags as $tag): ?>
								<li><a href="<?php bloginfo('url'); ?>/tags/<?php echo $tag->slug ?>" class="color-red"><?php echo $tag->name ?></a></li>
							<?php endforeach; ?>
						</ul>
					</div>
				</div>
			</section>

			<section class="featured_news">
					<div class="container">
						<h2 class="box-title edition_carousel--title">Últimas Notícias</h2>
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
						</ul>
				</div>
			</section>
		</main>
	</div>

<?php get_footer(); ?>
