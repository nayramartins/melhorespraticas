<?php
/**** The main template file ****/
get_header(); $terms = wp_get_post_terms($post->ID, 'edicoes');?>
<?php if (have_posts()): ?>
<div class="content-area">
    <section class="edicoes">
        <div class="screen-title">
            <div class="container">
                <div class="title-content">
                    <h3><?php single_cat_title(); ?></h3>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="edicoes__container">
               <?php 
                    while ( have_posts() ) : the_post(); 
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
                                    <a href="#" class="cta" onClick="showMateriaCart($(this).data('id'))" data-id="<?php echo $product->id?>">Comprar Matéria </a>
                                    <a href="#" class="cta invert" onClick="showLogin()">Log in </a>
                                    <div class="modal-login hideLogin" id="modal-login">
                                        <div class="modal-login-container">
                                            <span class="modal-close" onClick="showLogin()" data-id="<?php echo $product->id?>"></span>
                                            <h3>Área do Assinante</h3>
                                            <p>Para que você possa ler nossas matérias restritas basta ser assinante e preencher os campos abaixo com os mesmos dados do seu cadastro de assinante:</p>
                                            <?php echo do_shortcode('[theme-my-login]'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-materia hideMateriaCart" id="<?php echo $product->id?>">
                                    <div class="modal-materia-content">
                                        <span class="modal-close" onClick="showMateriaCart($(this).data('id'))" data-id="<?php echo $product->id?>"></span>
                                        <?php $available_variations = $product->get_available_variations(); ?>
                                        <h3 class="lora-title"><?php echo $product->name; ?></h3>
                                        <p class="color-grey subtitle"><?php echo $product->attributes['edicao']['options'][0]; ?></p>
                                        <ul class="lista-produto">
                                            <li>
                                                <img src="<?php echo $available_variations[2]['image']['url']; ?>"/>
                                                <h4 class="subtitle color-black">Acesso Básico<?php echo $available_variations[2]['attributes']['attribute_acesso']; ?></h4>
                                                <p class="subtitle color-red">R$<?php echo $available_variations[2]['price']; ?></p>
                                                <ul class="acesso <?php echo $available_variations[2]['attributes']['attribute_pa_acesso']; ?>">
                                                    <li>PDF baixa resolução do texto escolhido</li>
                                                    <li>PDF alta resolução da edição completa</li>
                                                    <li>Direito de distribuição</li>
                                                    <li>Direitos de uso</li>
                                                    <li>Edição completa</li>
                                                </ul>
                                                <div class="botao-comprar">
                                                <a href="<?php echo 'http://' . $_SERVER[HTTP_HOST] . $_SERVER[REQUEST_URI]; ?>?add-to-cart=<?php echo $product->id; ?>&variation_id=<?php echo $available_variations[2]['id']; ?>&attribute_pa_acesso=<?php echo $available_variations[2]['attributes']['attribute_pa_acesso']; ?>" rel="nofollow" data-product_id="<?php $product->id ?>" data-product_sku="<?php $product->get_sku() ?>" class="cta product_type button product_type_simple add_to_cart_button ajax_add_to_cart">Comprar</a>
                                                </div>
                                            </li>
                                            <li>
                                                <img src="<?php echo $available_variations[1]['image']['url']; ?>"/>
                                                <h4 class="subtitle color-black">Acesso Completo<?php echo $available_variations[1]['attributes']['attribute_acesso']; ?></h4>
                                                <p class="subtitle color-red">R$<?php echo $available_variations[1]['price']; ?></p>
                                                <ul class="acesso <?php echo $available_variations[1]['attributes']['attribute_pa_acesso']; ?>">
                                                    <li>PDF baixa resolução do texto escolhido</li>
                                                    <li>PDF alta resolução da edição completa</li>
                                                    <li>Direito de distribuição</li>
                                                    <li>Direitos de uso</li>
                                                    <li>Edição completa</li>
                                                </ul>
                                                <div class="botao-comprar">
                                                <a href="<?php echo 'http://' . $_SERVER[HTTP_HOST] . $_SERVER[REQUEST_URI]; ?>?add-to-cart=<?php echo $product->id; ?>&variation_id=<?php echo $available_variations[1]['id']; ?>&attribute_pa_acesso=<?php echo $available_variations[1]['attributes']['attribute_pa_acesso']; ?>" rel="nofollow" data-product_id="<?php $product->id ?>" data-product_sku="<?php $product->get_sku() ?>" class="cta product_type button product_type_simple add_to_cart_button ajax_add_to_cart">Comprar</a>
                                                </div>
                                            </li>
                                            <li>
                                                <img src="<?php echo $available_variations[0]['image']['url']; ?>"/>
                                                <h4 class="subtitle color-black">Acesso Premium<?php echo $available_variations[0]['attributes']['attribute_acesso']; ?></h4>
                                                <p class="subtitle color-red">R$<?php echo $available_variations[0]['price']; ?></p>
                                                <ul class="acesso <?php echo $available_variations[0]['attributes']['attribute_pa_acesso']; ?>">
                                                    <li>PDF baixa resolução do texto escolhido</li>
                                                    <li>PDF alta resolução da edição completa</li>
                                                    <li>Direito de distribuição</li>
                                                    <li>Direitos de uso</li>
                                                    <li>Edição completa</li>
                                                </ul>
                                                <div class="botao-comprar">
                                                <a href="<?php echo 'http://' . $_SERVER[HTTP_HOST] . $_SERVER[REQUEST_URI]; ?>?add-to-cart=<?php echo $product->id; ?>&variation_id=<?php echo $available_variations[0]['id']; ?>&attribute_pa_acesso=<?php echo $available_variations[0]['attributes']['attribute_pa_acesso']; ?>" rel="nofollow" data-product_id="<?php $product->id ?>" data-product_sku="<?php $product->get_sku() ?>" class="cta product_type button product_type_simple add_to_cart_button ajax_add_to_cart">Comprar</a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
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

<script>
    var showCart = function() {
        var cart = document.getElementsByClassName('modal-carrinho');
        var modalMateria = document.getElementsByClassName('modal-materia');
        modalMateria[0].classList.add('hideMateriaCart');
        cart[0].classList.toggle('hideCart');
    };

    var showMateriaCart = function(id) {
        var materiaCart = document.getElementById(id);
        materiaCart.classList.toggle('hideMateriaCart');
    };

    var showLogin = function() {
        var login = document.getElementById('modal-login');
        login.classList.toggle('hideLogin');
    };

</script>

