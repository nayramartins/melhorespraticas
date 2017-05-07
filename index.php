<?php
/**** The main template file ****/
get_header(); ?>

<section class="slider">
<?php
    echo do_shortcode("[metaslider id=29]");
?>
</section>

<div class="container">
	<div class="top_content">
		<section class="top_content-left">
			<div class="top_content-left--header">
				<h2 class="box-title">Escolha do Editor</h2>
				<?php $assuntos = get_categories('orderby=name&child_of=23&order=desc');?>
				<form action="" method="post">
					<select class="select-option" name="select" onchange="selectChange(this.value)">
						<option value="28" selected disabled>Buscar por assunto</option>
						<?php foreach ($assuntos as $assunto): ?>
							<option value="<?php echo $assunto->cat_ID?>"><?php echo $assunto->cat_name; ?></option>
						<?php endforeach; ?>
					</select>
				</form>
				<a href="#" class="see-more">Ver todos</a>
			</div>

			<?php
			foreach ($assuntos as $assunto):
				$args = array('posts_per_page' => 3, 'cat' => $assunto->cat_ID);
				$posts_query = new WP_Query( $args ); ?>
				<div class="<?php echo $assunto->cat_ID != '28' ? newsHide: 'newsActive'; ?>" id="<?php echo $assunto->cat_ID?>">
				<?php if ($posts_query->have_posts()):
					while($posts_query->have_posts()) : $posts_query->the_post();
						$categories = get_the_category();
						if ( ! empty( $categories ) ):
							foreach( $categories as $category ):
								if($category->slug != 'escolha-do-editor'):
									$cat_slug = $category->slug;
									$cat = $category->name;
								endif;
							endforeach;
						endif;
						?>
						<div class="top_content--news" >
							<div class="box-image">
								<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
								<img src="<?php echo $image[0]; ?>" width="50" height="50" alt="" class="image" />
							</div>
							<div class="box-content">
								<a href="<?php bloginfo('url'); ?>/categoria/<?php echo $cat_slug ?>" class="subtitle color-red"><?php echo $cat; ?></a>
								<a href="<?php the_permalink(); ?>" class="title"><?php the_title(); ?></a>
								<p class="text-content"><?php echo the_field("call")?></p>
								<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>" class="color-grey subtitle">por: <?php the_author(); ?></a>
							</div>
						</div>
					<?php endwhile;
				endif; ?>
				</div>
				<?php wp_reset_postdata();
			endforeach;
			?>

		</section>
		<section class="top_content-right">
			<div class="top_content-right--header">
				<h2 class="box-title">Entrevistas</h2>
				<a href="#" class="see-more color-grey">Ver todos</a>
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
						<a href="<?php the_permalink(); ?>"> <div class="lora-title"><?php echo the_field('entrevistado'); ?></div>
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
	<section class="merchandising_1 container">
		<?php
			$my_query = query_posts('post_id=112&post_type=anuncios'); 
			global $post;
			foreach ($my_query as $post):
				setup_postdata($post);
				$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
				if($image): ?>
					<a href="<?php the_field('link'); ?>"><img src="<?php echo $image[0]; ?>" width="60" height="60" alt="" class="image" /></a>
				<?php else:  ?>
					<a href="<?php bloginfo('url'); ?>/anuncie"><p class="subtitle"><?php the_content(); ?></p></a>
				<?php endif; 
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
		<h2 class="box-title edition_carousel--title">Últimas Edições</h2>
		<div class="owl-carousel owl-theme">
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
	</div>
</section>

<section class="full_banner" style="background-image: url('wp-content/themes/melhorespraticas/images/index_full-banner.jpg')">
	<div class="container">
		<h3 class="full_banner--text lora-title">Seja um assinante e tenha acesso aos nossos conteúdos exclusivos.</h3>
		<a href="#" class="cta">assine já</a>
	</div>
</section>

<section class="featured_news">
	<div class="container">
		<h2 class="box-title edition_carousel--title">Radar</h2>
		
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

<section class="cover_video"></section>

<script>
var selectChange = function(value) {
	var selected = document.getElementById(value);
	var active = document.getElementsByClassName('newsActive')[0];
	active.classList.remove('newsActive');
	active.classList.add('newsHide');
	selected.classList.remove('newsHide');
	selected.classList.add('newsActive');
}
</script>
<?php get_footer(); ?>