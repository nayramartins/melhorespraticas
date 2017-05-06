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
		<p class="subtitle">anuncie aqui</p>
	</section>
</div>
</div>
<section class="edition_carousel">
	<div class="container">
		<h2 class="box-title edition_carousel--title">Últimas Edições</h2>
		<div class="owl-carousel owl-theme">
			<div class="slide">
				<div class="slide-content">
					<div class="slide-content_media"></div>
					<p class="slide-content_text color-grey subtitle">Edição #01</p>
				</div>
			 </div>
			<div class="slide">
				<div class="slide-content">
					<div class="slide-content_media"></div>
					<p class="slide-content_text color-grey subtitle">Edição #01</p>
				</div>
			 </div>
			<div class="slide">
				<div class="slide-content">
					<div class="slide-content_media"></div>
					<p class="slide-content_text color-grey subtitle">Edição #01</p>
				</div>
			 </div>
			<div class="slide">
				<div class="slide-content">
					<div class="slide-content_media"></div>
					<p class="slide-content_text color-grey subtitle">Edição #01</p>
				</div>
			 </div>
			<div class="slide">
				<div class="slide-content">
					<div class="slide-content_media"></div>
					<p class="slide-content_text color-grey subtitle">Edição #01</p>
				</div>
			 </div>
			<div class="slide">
				<div class="slide-content">
					<div class="slide-content_media"></div>
					<p class="slide-content_text color-grey subtitle">Edição #01</p>
				</div>
			 </div>
			<div class="slide">
				<div class="slide-content">
					<div class="slide-content_media"></div>
					<p class="slide-content_text color-grey subtitle">Edição #01</p>
				</div>
			 </div>
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
			<li>
				<span class="featured_news--content_image">
					<img src="" alt="" class="image" />
				</span>
				<a href="#" class="color-red subtitle">22 jan 2017</a>
				<p class="title">Achado pode ajudar a personalizar tratamento do câncer de mama em estágio inicial</p>
				<p class="text-content">Pesquisadores do A.C. Camargo Câncer Center descreveram um conjunto de 26 genes com potencial para se tornarem biomarcadores de agressividade para um subtipo de câncer de mama</p>
			</li>
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