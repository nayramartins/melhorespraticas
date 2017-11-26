<?php
/**** The main template file ****/
get_header(); ?>

<?php
	$entrevistas = get_theme_mod('entrevistas');
	$radar = get_theme_mod('radar');
	$videos = get_theme_mod('videos');
	$edicoes = get_theme_mod('edicoes');
?>

<section class="slider">
	<?php
	echo do_shortcode("[metaslider id=29]");
	?>
</section>

<div class="container">
	<section class="merchandising_1">
		<?php
		$my_query = query_posts('post_type=anuncios');
		foreach ($my_query as $post):
			if($post->ID == '112'):
				setup_postdata($post);
			$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
			if($image): ?>
			<a href="<?php the_field('link'); ?>"><img src="<?php echo $image[0]; ?>" width="60" height="60" alt="" class="image" /></a>
		<?php else:  ?>
			<a href="<?php bloginfo('url'); ?>/anuncie"><p class="subtitle"><?php the_content(); ?></p></a>
		<?php endif;
		endif;
		endforeach;
		wp_reset_postdata(); ?>
	</section>
	<section class="top_content-left">
		<div class="top_content-left--header new-container_subtitle">
			<div class="new-subtitle_section">
				<h2 class="box-title">#RADARMELHORESPRÁTICAS</h2>
				<p><?php echo $radar; ?></p>
			</div>

			<a href="<?php bloginfo('url'); ?>/radar" class="see-more">Ver todos</a>
		</div>

		<div class="<?php echo 'newsActive'; ?>">
		<?php $args = array( 'post_type' => 'radar', 'posts_per_page' => 3 );
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post(); ?>
				<div class="top_content--news new-top_content" >
					<div class="box-image">
						<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
						<img src="<?php echo $image[0]; ?>" width="50" height="50" alt="" class="image" />
					</div>
					<div class="box-content new-box_content">
						<a href="<?php bloginfo('url'); ?>/categorias/<?php echo $cat_slug ?>" class="subtitle color-red"><?php echo $cat; ?></a>
						<p class="date-new"><?php echo get_the_date('F'); ?></p>
						<a href="<?php the_permalink(); ?>" class="title title-new"><?php the_title(); ?></a>
						<p class="text-content"><?php the_excerpt(); ?></p>
						<p class="tempo-leitura">Tempo de leitura: <?php the_field('tempo_de_leitura'); ?></p>
					</div>
				</div>
			<?php endwhile; ?>
		</div>
		<?php wp_reset_postdata(); ?>
		</section>

		<section class="top_content-right">
			<div class="top_content-right--header new-container_subtitle">
				<div class="new-subtitle_section">
					<h2 class="box-title">Entrevistas</h2>
					<p><?php echo $entrevistas; ?></p>
				</div>
				<a href="<?php bloginfo('url'); ?>/entrevistas" class="see-more color-grey">Ver todos</a>
			</div>
			<?php $args = array( 'post_type' => 'entrevistas', 'posts_per_page' => 3 );
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post();
			?>
			<div class="top_content-right--content new-entrevistas">
				<div class="image-box">
					<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
					<img src="<?php echo $image[0]; ?>" width="60" height="60" alt="" class="image" />
				</div>
				<div class="box-title">
					<div class="text-box">
						<p class="date-new"><?php echo get_the_date('F'); ?></p>
						<a href="<?php the_permalink(); ?>"> <div class="title title-new"><?php echo the_field('entrevistado'); ?></div></a>
							<p><?php echo the_field('subtitulo_entrevistado'); ?></p>
						</div>
					</div>
				</div>
			<?php endwhile;
			wp_reset_postdata(); ?>
		</div>
	</section>
	<div class="container">
		<section class="merchandising_1 videos-margin">
			<?php
			$my_query = query_posts('post_type=anuncios');
			foreach ($my_query as $post):
				if($post->ID == '1122'):
					setup_postdata($post);
				$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
				if($image): ?>
				<a href="<?php the_field('link'); ?>"><img src="<?php echo $image[0]; ?>" width="60" height="60" alt="" class="image" /></a>
			<?php else:  ?>
				<a href="<?php bloginfo('url'); ?>/anuncie"><p class="subtitle"><?php the_content(); ?></p></a>
			<?php endif;
			endif;
			endforeach;
			wp_reset_postdata(); ?>
		</section>
	</div>
	<div class="videos-home container">
		<div class="top_content-right--header new-container_subtitle">
			<div class="new-subtitle_section">
				<h2 class="box-title">Vídeos</h2>
				<p><?php echo $videos; ?></p>
			</div>
			<a href="<?php bloginfo('url'); ?>/videos" class="see-more color-grey">Ver todos</a>
		</div>
		<div class="video-single">
			<?php $args = array( 'post_type' => 'videos', 'posts_per_page' => 1 );
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post(); ?>
				<div class="video">
					<?php
					$postContent = $post; ?>
					<?php setup_postdata($post); ?>
					<?php the_content(); ?>
					<div class="box-title box-title-video">
						<div class="text-box">
							<p class="date-new"><?php echo get_the_date('F'); ?></p>
							<a href="<?php the_permalink(); ?>"> <div class="title title-new"><?php echo the_title(); ?></div></a>
							<p class="info-new"><?php echo the_field('info'); ?></p>
						</div>
					</div>
				</div>
			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
		</div>
		<div class="owl-carousel slider-videos owl-theme">
			<?php $args = array( 'post_type' => 'videos' );
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post(); ?>
				<div class="slide">
					<?php
					$postContent = $post; ?>
					<?php setup_postdata($post); ?>
					<?php the_content(); ?>
					<div class="box-title box-title-video">
						<div class="text-box">
							<a href="<?php the_permalink(); ?>"> <div class="title title-new"><?php echo the_title(); ?></div></a>
							<p class="info-new"><?php echo custom_field_excerpt(); ?></p>
						</div>
					</div>
				</div>
			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
		</div>
	</div>
	<div class="container">
		<section class="merchandising_1">
			<?php
			$my_query = query_posts('post_type=anuncios');
			foreach ($my_query as $post):
				if($post->ID == '1127'):
					setup_postdata($post);
				$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
				if($image): ?>
				<a href="<?php the_field('link'); ?>"><img src="<?php echo $image[0]; ?>" width="60" height="60" alt="" class="image" /></a>
			<?php else:  ?>
				<a href="<?php bloginfo('url'); ?>/anuncie"><p class="subtitle"><?php the_content(); ?></p></a>
			<?php endif;
			endif;
			endforeach;
			wp_reset_postdata(); ?>
		</section>
	</div>
</div>

<section class="edition_carousel">
	<?php
	$taxonomy = 'edicoes';
	$terms = get_terms([
		'taxonomy' => $taxonomy,
		'hide_empty' => false,
		'order' => 'DESC'
		]);
	?>
	<div class="container">
		<div class="top_content-right--header new-container_subtitle edition_carousel--title">
			<div class="new-subtitle_section">
				<h2 class="box-title">Últimas Edições</h2>
				<p><?php echo $edicoes; ?></p>
			</div>
			<a href="<?php bloginfo('url'); ?>/edicoes" class="see-more color-grey">Ver todos</a>
		</div>
		<div class="owl-carousel edition owl-theme">
			<?php foreach ($terms as $term): ?>
			<div class="slide">
				<a href="<?php bloginfo('url'); ?>/edicoes/<?php echo $term->slug; ?>">
					<div class="slide-content">
						<div class="slide-content_media"><img src="<?php the_field('capa', 'edicoes_' . $term->term_id); ?>" /></div>
						<p class="slide-content_text color-grey subtitle"><?php echo $term->name ?></p>
					</div>
				</a>
			</div>
			<?php endforeach; ?>
		</div>
	</section>

<script>
	var selectChange = function(value) {
		var selected = document.getElementById(value);
		var active = document.getElementsByClassName('newsActive')[0];
		active.classList.remove('newsActive');
		active.classList.add('newsHide');
		selected.classList.remove('newsHide');
		selected.classList.add('newsActive');
	}
	var selectCapa = function(value) {
		var selected = document.getElementById(value);
		var active = document.getElementsByClassName('capaActive')[0];
		active.classList.remove('capaActive');
		active.classList.add('capaHide');
		selected.classList.remove('capaHide');
		selected.classList.add('capaActive');
	}
</script>
<?php get_footer(); ?>