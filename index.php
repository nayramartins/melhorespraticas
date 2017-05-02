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
				<?php 
				
				?>
				<select class="select-option" name="select">
					<option value="value1" selected disabled>Buscar por assunto</option>
					<option value="value2">Valor 2</option>
					<option value="value3">Valor 3</option>
				</select>
				<a href="#" class="see-more">Ver todos</a>
			</div>

			<?php $args = array('posts_per_page' => 3, 'cat' => 28);
			$posts_query = new WP_Query( $args ); 
			if ($posts_query->have_posts()):
				while($posts_query->have_posts()) : $posts_query->the_post(); 
					$categories = get_the_category(); 
					if ( ! empty( $categories ) ):
						foreach( $categories as $category ) {
							if($category->slug != 'escolha-do-editor'):
								$cat_slug = $category->slug;
								$cat = $category->name;
							endif;
						}
					endif;
					?>
					<div class="top_content--news">
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
			endif;
			wp_reset_postdata(); ?>

		</section>
		<section class="top_content-right">
			<div class="top_content-right--header">
				<h2 class="box-title">Entrevistas</h2>
				<a href="#" class="see-more color-grey">Ver todos</a>
			</div>
			<div class="top_content-right--content">
				<div class="box-title">
					<div class="image-box">
						<img src="wp-content/themes/melhorespraticas/images/tester.jpg" alt="" width="60" height="60" class="image"/>
					</div>
					<div class="text-box">
						<a href="#"  class="lora-title">Nome Autor</a>
						<p class="color-grey subtitle">Vice-presidente executiva da ABIMIP</p>
					</div>
				</div>
				<a href="#"  class="title">Automedicação: Como a educação em saúde pode contribuir para essa prática?</a>
				<a href="#" class="color-red subtitle">22 Jan 2017</a>
			</div>
		</div>
	</section>
	<section class="merchandising_1 container">
		<p class="subtitle">anuncie aqui</p>
	</section>
</div>
</div>
<section class="edition_carroussel">
	<div class="container">
		<h2 class="box-title edition_carroussel--title">Últimas Edições</h2>
		<div class="owl-carousel owl-theme">
			<div> Your Content </div>
			<div> Your Content </div>
			<div> Your Content </div>
			<div> Your Content </div>
			<div> Your Content </div>
			<div> Your Content </div>
			<div> Your Content </div>
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
		<h2 class="box-title edition_carroussel--title">Radar</h2>

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

<section class="full_banner bg-grey">
	<div class="container">
		<h3 class="full_banner--text lora-title">Fique Atualizado</h3>
		<p class="text-content color-white">Inscreva-se e receba nossas notícias, programação e novidades direto na sua caixa de entrada.</p>
		<form action="">
			<input type="text" placeholder="digite seu e-mail" />
		</form>
		<a href="#" class="cta">cadastrar</a>
	</div>
</section>
<?php get_footer(); ?>