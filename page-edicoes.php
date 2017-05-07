<?php
/**** The main template file ****/
get_header(); ?>
<div class="content-area">
    <section class="edicoes">
        <div class="screen-title">
            <div class="container">
                <div class="title-content">
                    <h3><?php the_title(); ?></h3>
                </div>
            </div>
        </div>
        <div class="edicoes__featured">
            <?php 		
            $taxonomy = 'edicoes';
		    $terms = get_terms([
                'taxonomy' => $taxonomy,
                'hide_empty' => false,
                'order' => 'DESC'
	    	]); 
            $date = strtotime(get_field('mes_edicao', 'edicoes_' . $terms[0]->term_id));
            $dateformatstring = 'M Y';
            $date1 = date_i18n($dateformatstring, $date);
            ?>
            <div class="edicoes__feaured__left">
                <h3><?php echo $terms[0]->name ?></h3>					
                <div class="edicoes__mes"><?php echo $date1; ?></div>
                <div class="edicoes__capa"><img src="<?php the_field('capa', 'edicoes_' . $terms[0]->term_id); ?>" /></div>
                <a href="<?php bloginfo('url'); ?>/edicoes/<?php echo $terms[0]->slug; ?>" class="cta">Visualizar Matérias</a>
            </div>
            <div class="edicoes__feaured__right">
                <h3>Editorial</h3>
                <div class="edicoes__content">
                    <?php echo $terms[0]->description; ?>
                </div>
                <p><?php the_field('autor_editorial', 'edicoes_' . $terms[0]->term_id); ?></p>
                <p><?php the_field('subtitulo_autor_editorial', 'edicoes_' . $terms[0]->term_id); ?></p>
            </div>
        </div>
        <?php wp_reset_postdata(); ?>
    </section>

    <section class="merchandising_1 container">
		<?php
			$my_query = query_posts('post_type=anuncios'); 
			foreach ($my_query as $post):
                if($post->ID == '180'):
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

    <section class="edicoes__list">
        <h3>Navegue por outras edições</h3>
        <select class="select-edicao" name="select" onchange="window.location.href = this.value">
            <option value="" selected disabled>Exibir Lista</option>
            <?php foreach( $terms as $term): ?>
                <option value="<?php bloginfo('url'); ?>/edicoes/<?php echo $term->slug; ?>"><?php echo $term->name; ?></option>
            <?php endforeach; ?>
        </select>
        <div class="edicoes__list__container">
            <?php 
            $i = 0;
            foreach( $terms as $term): 
                if($i <= 3): ?>
                    <div class="edicoes__list__item">
                        <img src="<?php the_field('capa', 'edicoes_' . $term->term_id); ?>" />
                        <div class="edicoes__list__item__content">
                            <h4><?php echo $term->name; ?></h4>
                            <p><?php the_field('subtitulo', 'edicoes_' . $term->term_id); ?></p>
                            <p><?php the_field('topicos', 'edicoes_' . $term->term_id); ?></p>
                        </div>
                    </div>
                <?php endif;
                $i++;
            endforeach; ?>
        </div>
    </section>
</div>
<?php get_footer(); ?>