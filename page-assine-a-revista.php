<?php
get_header(); ?>

    <div class="screen-title">
        <div class="container">
            <div class="title-content">
                <h3 class="woocommerce-products-header__title page-title"><?php the_title(); ?></h3>
            </div>
        </div>
    </div>
    <div class="breadcrumb">
        <div class="container">
            <?php wp_custom_breadcrumbs(); ?>
        </div>
    </div>

    <section class="product container assine">
        <div class="container">

            <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
                the_content();
            endwhile; endif;
            $preco = str_replace('.', ',', get_field('preco_anteriores')); ?>

            <div class="woocommerce">
                <ul class="products">
                    <li class="product">
                        <img src="<?php bloginfo('url'); ?>/wp-content/themes/melhorespraticas/images/icon-anuncie.png" alt="" class="icon" width="20" height="20"/>
                        <p class="price">
                            <span class="woocommerce-Price-amount amount"><?php echo 'R$' . $preco; ?></span>
                        </p>
                        <h2 class="woocommerce-loop-product__title">Edições Anteriores</h2>
                        <div class="product-info">
                            <h2 class="color-grey subtitle">Versão impressa</h2>
                            <p><?php the_field('conteudo_anteriores'); ?></p>
                        </div>
                        <a href="<?php bloginfo('url'); ?>/contato" class="button product_type_simple add_to_cart_button ajax_add_to_cart">Contato</a>
                    </li>
                    <li class="product">
                        <img src="<?php bloginfo('url'); ?>/wp-content/themes/melhorespraticas/images/icon-anuncie.png" alt="" class="icon" width="20" height="20"/>
                        <h2 class="small-title">Assinatura para grupo de pessoas</h2>
                        <p class="woocommerce-loop-product__title">Preço sob consulta</p>
                        <div class="product-info">
                            <h2 class="color-grey subtitle">Condições especiais</h2>
                            <p><?php the_field('conteudo_grupo'); ?></p>
                        </div>
                        <a href="<?php bloginfo('url'); ?>/contato" class="button product_type_simple add_to_cart_button ajax_add_to_cart">Contato</a>
                    </li>
                </ul>
            </div>
        </div>

    </section>

<?php get_footer(); ?>