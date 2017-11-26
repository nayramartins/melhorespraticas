<div class="search-right sidebar">
    <div class="advanced-search">
        <p class="open-sans-title advanced-title">Busca Avançada</p>
        <p class="subtitle color-grey">Palavra-chave</p>
        <form role="search" id="search-form" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
            <input class="search-field" type="text" name="s"/>
        </form>
        <?php if(get_post_type() == 'entrevistas'): ?>
            <p class="subtitle color-grey">Entrevistados</p>
            <select onChange="window.location = this.value" class="search-field">
                <?php $args = array( 'post_type' => 'entrevistas', 'posts_per_page' => 12 );
                $loop = new WP_Query( $args ); ?>
                <option value="" disabled selected></option>
                <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                    <option value="<?php the_permalink(); ?>"><?php the_field('entrevistado'); ?></option>
                <? endwhile; ?>
            </select>
        <?php elseif(get_post_type() == 'post' && !is_search()): ?>
            <p class="subtitle color-grey">Categoria</p>
            <?php $assuntos = get_categories('orderby=name&child_of=23&order=desc');?>
             <form action="" method="post">
					<select class="search-field" name="select" onChange="window.location = this.value">
						<option value="28" selected disabled></option>
						<?php foreach ($assuntos as $assunto):?>
							<option value="<?php echo bloginfo('url') . '/categorias/' . $assunto->slug; ?>"><?php echo $assunto->cat_name; ?></option>
						<?php endforeach; ?>
					</select>
				</form>
        <?php endif; ?>
        <!--<p class="subtitle color-grey">Filtrar por</p>
        <ul class="search-filter">
            <li><a href="#" class="title subtitle">Matérias</a></li>
            <li><a href="#" class="title subtitle">Matérias</a></li>
            <li><a href="#" class="title subtitle">Matérias</a></li>
            <li><a href="#" class="title subtitle">Matérias</a></li>
        </ul>-->
    </div>
    <section class="merchandising_1 container">
        <?php
        if(get_post_type() == 'entrevistas'):
            $postid = '412';
        elseif(get_post_type() == 'post'):
            $postid = '414';
        elseif(get_post_type() == 'radar'):
            $postid = '420';
        elseif(get_post_type() == 'videos'):
            $postid = '422';
        elseif(is_search()):
            $postid = '418';
        else: 
            $postid = '412';
        endif;
        $post = get_post( $postid );
        setup_postdata($post);
        
            $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
            if($image): ?>
                <a href="<?php the_field('link'); ?>"><img src="<?php echo $image[0]; ?>" width="60" height="60" alt="" class="image" /></a>
            <?php else:  ?>
                <a href="<?php bloginfo('url'); ?>/anuncie"><p class="subtitle"><?php the_content(); ?></p></a>
            <?php endif;

        wp_reset_postdata(); ?>
    </section>
</div>