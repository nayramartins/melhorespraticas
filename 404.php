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
					<header class="page-header">
						<h1 class="page-title"><?php _e( 'Página não encontrada.', 'melhorespraticas' ); ?></h1>
					</header><!-- .page-header -->

					<div class="page-content">
						<p><?php _e( 'Tente efetuar uma pesquisa do que está procurando:', 'melhorespraticas' ); ?></p>

						<?php get_search_form(); ?>
					</div><!-- .page-content -->
				</div>
			</section><!-- .error-404 -->

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
