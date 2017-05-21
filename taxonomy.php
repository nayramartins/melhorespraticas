<?php
/**** The main template file ****/
get_header(); $terms = wp_get_post_terms($post->ID, 'edicoes');?>
<div class="content-area">
    <section class="edicoes">
        <div class="screen-title">
            <div class="container">
                <div class="title-content">
                    <h3><?php echo $terms[0]->name; ?></h3>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="edicoes__container">
               <?php 
                $args = array(
                'tax_query' => array(
                    array(
                        'taxonomy' => 'edicoes',
                        'field' => 'name',
                        'terms' => $terms[0]->name
                        )
                    )
                );

                $query = new WP_Query($args);
                if ( $query -> have_posts() ) : while ( $query -> have_posts() ) : $query -> the_post(); 
                $categories = get_the_category();
                if ( ! empty( $categories ) ):
                    foreach( $categories as $category ):
                        if($category->slug != 'escolha-do-editor'):
                            $cat_slug = $category->slug;
                            $cat = $category->name;
                        endif;
                    endforeach;
                endif;
                $hasAccess = pmpro_has_membership_access(NULL, NULL, true);
                $product = get_field('materia_produto');
                $product = $product[0];
                $productID = $product->ID;
                $product = wc_get_product($productID);
                ?>
                    
                
                <div class="top_content--news" >
                    <div class="box-image">
                        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
                        <img src="<?php echo $image[0]; ?>" width="50" height="50" alt="" class="image" />
                        <?php if($hasAccess[0] == 0): ?>
                            <span><img src="<?php bloginfo('url'); ?>/wp-content/themes/melhorespraticas/images/icon-cadeado.png"/>Exclusiva para assinantes</span>
                        <?php endif; ?>
                    </div>
                    <div class="box-content">
                        <a href="<?php bloginfo('url'); ?>/categorias/<?php echo $cat_slug ?>" class="subtitle color-red"><?php echo $cat; ?></a>
                        <a href="<?php the_permalink(); ?>" class="title"><?php the_title(); ?></a>
                        <p class="text-content"><?php echo the_field("call")?></p>
                        <?php if($hasAccess[0] == 1): ?>
                            <a href="<?php the_permalink(); ?>" class="cta">Ler a Matéria</a>
                        <?php else: ?>
                            <div class="conteudo-exclusivo">
                                <div class="botao-comprar">
                                    <?php 
                                        echo apply_filters( 'woocommerce_loop_add_to_cart_link',
                                        sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" class="cta %s product_type_%s button product_type_simple add_to_cart_button ajax_add_to_cart">Comprar Matéria</a>',
                                            esc_url( $product->add_to_cart_url() ),
                                            esc_attr( $product->id ),
                                            esc_attr( $product->get_sku() ),
                                            $product->is_purchasable() ? 'add_to_cart_button' : '',
                                            esc_attr( $product->product_type ),
                                            esc_html( $product->add_to_cart_text() )
                                        ),
                                        $product );
                                    ?>
                                </div>
                                <a href="#" class="cta invert">Log in </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endwhile;  endif;?>
            </div>
            <?php get_sidebar(); ?>
        </div>
    </section>

    
</div>

<?php get_footer(); ?>