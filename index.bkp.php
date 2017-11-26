<section class="cover_video">
	<div class="container">
		<div class="materia-capa">
			<div class="top-content">
				<?php $args = array('posts_per_page' => 5, 'cat' => '1');
				$posts_query = new WP_Query( $args );  ?>
				<select class="select-option" name="select" onchange="selectCapa(this.value)">
					<option value="" selected disabled>Matérias de Capa</option>
					<?php while($posts_query->have_posts()) : $posts_query->the_post(); ?>
						<option value="<?php echo $post->ID?>"><?php the_title(); ?></option>
					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
				</select>
			</div>
			<div class="materia-content">
				<?php $args = array('posts_per_page' => 5, 'cat' => '1');
					$posts_query = new WP_Query( $args );
					$i = 0;
					while($posts_query->have_posts()) : $posts_query->the_post();
					$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
					<div class="container-capa <?php echo $i == 0 ? 'capaActive' : 'capaHide'?>" id="<?php echo $post->ID; ?>">
						<img src="<?php echo $image[0]; ?>" width="60" height="60" alt="" class="image" />
						<div class="content-capa">
							<h3 class="open-sans-title"><?php the_title(); ?></h3>
							<p><?php the_excerpt(); ?></p>
							<a href="<?php the_permalink(); ?>" class="subtitle">Leia mais</a>
						</div>
					</div>
					<?php
					$i++;
					endwhile; ?>
				<?php wp_reset_postdata(); ?>
			</div>
		</div>
	</div>
</section>

<?php
/**** The main template file ****/
get_header(); ?>

<section class="slider">
	<?php
	echo do_shortcode("[metaslider id=29]");
	?>
</section>

<div class="container">
	<section class="merchandising_1 container">
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
		<div class="top_content-left--header">
			<h2 class="box-title">Radar</h2>

			<a href="<?php bloginfo('url'); ?>/radar" class="see-more">Ver todos</a>
		</div>

		<div class="<?php echo 'newsActive'; ?>">
		<?php $args = array( 'post_type' => 'radar', 'posts_per_page' => 3 );
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post(); ?>
				<div class="top_content--news" >
					<div class="box-image">
						<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
						<img src="<?php echo $image[0]; ?>" width="50" height="50" alt="" class="image" />
					</div>
					<div class="box-content">
						<a href="<?php bloginfo('url'); ?>/categorias/<?php echo $cat_slug ?>" class="subtitle color-red"><?php echo $cat; ?></a>
						<a href="<?php the_permalink(); ?>" class="title"><?php the_title(); ?></a>
						<p class="text-content"><?php the_excerpt(); ?></p>
						<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>" class="color-grey subtitle">por: <?php the_author(); ?></a>
					</div>
				</div>
			<?php endwhile; ?>
		</div>
		<?php wp_reset_postdata(); ?>
		</section>

		<section class="top_content-right">
			<div class="top_content-right--header">
				<h2 class="box-title">Entrevistas</h2>
				<a href="<?php bloginfo('url'); ?>/entrevistas" class="see-more color-grey">Ver todos</a>
			</div>
			<?php $args = array( 'post_type' => 'entrevistas', 'posts_per_page' => 3 );
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post();
			?>
			<div class="top_content-right--content">
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
					<div class="color-red subtitle"><?php the_date(); ?></div></a>
				</div>
			<?php endwhile;
			wp_reset_postdata(); ?>
		</div>
	</section>
	<div class="videos-home">
		<h3 class="box-title color-white">Vídeos</h3>
		<div class="owl-carousel slider-videos owl-theme">
			<?php $args = array( 'post_type' => 'videos', 'posts_per_page' => 4 );
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post(); ?>
				<div class="slide">
					<?php
					$postContent = $post; ?>
					<?php setup_postdata($post); ?>
					<?php the_content(); ?>
					<p class="color-grey subtitle"><?php echo get_the_date(); ?></p>
					<p class="color-white mont-title"><?php the_title(); ?></p>
					</div>
			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
		</div>
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
		<h2 class="box-title edition_carousel--title">Últimas Edições</h2>
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

<section class="full_banner" style="background-size: cover; background-image: url('<?php bloginfo('url'); ?>/wp-content/themes/melhorespraticas/images/index_full-banner.jpg')">
	<div class="container">
		<h3 class="full_banner--text open-sans-title">Seja um assinante e tenha acesso aos nossos conteúdos exclusivos.</h3>
		<a href="#" class="cta">assine já</a>
	</div>
</section>

<!-- <section class="featured_news">
	<div class="container">
		<h2 class="box-title edition_carousel--title">Escolha do Editor</h2>

		<ul class="featured_news--content">
		<?php /* $args = array('posts_per_page' => 4, 'cat' => '28');
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post();
			$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
			<li>
				<span class="featured_news--content_image">
					<a href="<?php the_permalink(); ?>"><img src="<?php echo $image[0]; ?>" width="60" height="60" alt="" class="image" /></a>
				</span>
				<!-- <a href="<?php the_permalink(); ?>" class="color-red subtitle"><?php the_date(); ?></a> -->
				<a href="<?php the_permalink(); ?>"<h3 class="title"><?php the_title(); ?></h3></a>
				<a href="<?php the_permalink(); ?>"<p class="text-content"><?php the_excerpt(); ?></p></a>
			</li>
			<?php endwhile; ?>
			<?php wp_reset_postdata(); */?>
		</ul>
	</div>
</section> -->

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