<?php
/**** The template for displaying the footer ****/
?>

 <?php wp_footer();
 $logo = get_theme_mod('logo_footer');
 $sobre = get_theme_mod('sobre');
 $telefone = get_theme_mod('telefone');
 $email = get_theme_mod('email');
 $facebook_url = get_theme_mod('url_facebook');
 $linkedin_url = get_theme_mod('url_linkedin');
 $facebook_img = get_theme_mod('img_facebook');
 $linkedin_img = get_theme_mod('img_linkedin');
 ?>

    <footer class="footer">
        <?php dynamic_sidebar('footer'); ?>
        <div class="container">
            <div class="footer_contact">
                <p class="color-white subtitle">sobre a gpes</p>
                <p class="footer_contact--address color-white"><?php echo $sobre; ?></p>
            </div>
            <div class="space"></div>
            <div class="footer_sitemap">
                <div class="footer_sitemap--left out">
                    <p class="footer_sitemap--title color-white subtitle">Quick Links</p>
                    <div class="new-nav_container">
                        <?php if (function_exists(institucional_menu())) institucional_menu(); ?>
                        <?php if (function_exists(conteudo_menu())) conteudo_menu(); ?>
                    </div>
                </div>
            </div>
            <div class="newsletter">
                <?php echo do_shortcode("[mc4wp_form id='148']"); ?>
            </div>
            <div class="footer_image">
                <img class="image-small" src="<?php echo $logo;?>" alt="">
            </div>
        </div>
        <div class="footer_secondary">
            <div class="container">
                <div class="copyright">
                    <p>Copyright@2017</p>
                    <p>GPeS | Health Branding and Business</p>
                </div>
                <?php if (function_exists(submenu_footer())) submenu_footer(); ?>
                <ul class="header_top-social col">
                    <li>
                        <a href="<?php echo $facebook_url; ?>" id="facebook">
                            <img src="<?php echo $facebook_img; ?>" width="15" height="15" alt="">
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo $linkedin_url; ?>" id="linkedin">
                            <img src="<?php echo $linkedin_img; ?>" width="15" height="15" alt="">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </footer>
 </div><!-- div.main -->
<section class="modal-carrinho hideCart">
    <div class="carrinho-content">
        <span class="modal-close" onClick="showCart()"></span>
        <h2>Carrinho de Compras</h2>
        <p class="color-white subtitle">Confirme os itens adquiridos e conclua sua compra</p>
        <?php echo do_shortcode("[woocommerce_cart]"); ?>
    </div>
</section>
</body>
</html>
<script>
    var showCart = function() {
        var cart = document.getElementsByClassName('modal-carrinho');
        cart[0].classList.toggle('hideCart');
    };

/* global wc_add_to_cart_params */
/*!
 * WooCommerce Add to Cart JS
 */
jQuery( function( $ ) {

	// On "added_to_cart"
	$( document.body ).on( 'added_to_cart', function( event, fragments, cart_hash, $button ) {
        var viewCart = document.querySelector('.added_to_cart');
        viewCart.addEventListener('click', function(e) {
            e.preventDefault();
            showCart();
        });
	});

});
</script>
