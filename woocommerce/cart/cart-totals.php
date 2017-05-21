<?php
/**
 * Cart totals
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-totals.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.3.6
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="cart_totals <?php echo ( WC()->customer->has_calculated_shipping() ) ? 'calculated_shipping' : ''; ?>">

	<?php do_action( 'woocommerce_before_cart_totals' ); ?>
    <div class="order-total">
        <h3><?php _e( 'Total:', 'woocommerce' ); ?></h3>
        <p data-title="<?php esc_attr_e( 'Total', 'woocommerce' ); ?>"><?php wc_cart_totals_order_total_html(); ?></p>
    </div>

	<div class="wc-proceed-to-checkout">
		<a class="cta bg-black" href="<?php bloginfo('url'); ?>/assine-a-revista">Comprar mais</a>
		<a class="cta bg-green" href="<?php bloginfo('url'); ?>/pagamento">Confirmar</a>
	</div>

	<?php do_action( 'woocommerce_after_cart_totals' ); ?>

</div>