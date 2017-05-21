<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}
global $product;
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<li <?php post_class(); ?>>
    <img src="<?php bloginfo('url'); ?>/wp-content/themes/melhorespraticas/images/icon-anuncie.png" alt="" class="icon" width="20" height="20"/>
    
	<p class="price"><?php echo $product->get_price_html(); ?></p>

    <?php do_action( 'woocommerce_shop_loop_item_title' ); ?>

        <div class="product-info"><?php echo $postwithbreaks = wpautop( $post->post_content, true ); ?> </div>
    
    <?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
</li>
