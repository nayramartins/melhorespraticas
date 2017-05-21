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

    <section class="product container">
        <div class="container">

            <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
                the_content();
            endwhile; endif; 
            $preco = str_replace('.', ',', get_field('preco_anteriores')); ?>

            <ul>
                <li>
                    <img src="<?php bloginfo('url'); ?>/wp-content/themes/melhorespraticas/images/icon-anuncie.png" alt="" class="icon" width="20" height="20"/>
                    <?php echo 'R$' . $preco; ?>
                    <h3>Edições Anteriores</h3>
                    <p>Versão impressa</p>
                    <p><?php the_field('conteudo_anteriores'); ?></p>
                    <a href="<?php bloginfo('url'); ?>/contato">Contato</a>
                </li>
                <li>
                    <img src="<?php bloginfo('url'); ?>/wp-content/themes/melhorespraticas/images/icon-anuncie.png" alt="" class="icon" width="20" height="20"/>
                    <h2>Assinatura para grupo de pessoas</h2>
                    <p>Preço sob consulta</p>
                    <p>Condições especiais</p>
                    <p><?php the_field('conteudo_grupo'); ?></p>
                    <a href="<?php bloginfo('url'); ?>/contato">Contato</a>
                </li>
            </ul>
        </div>

    </section>

<?php get_footer(); ?>