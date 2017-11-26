
<?php
/**** The template for displaying the header ****/
?>
<!DOCTYPE html>
<html <?php language_attributes();?> >
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	<link rel="stylesheet" href="<?php bloginfo('url'); ?>/wp-content/themes/melhorespraticas/js/owlcarousel/assets/owl.carousel.min.css">
	<link rel="stylesheet" href="<?php bloginfo('url'); ?>/wp-content/themes/melhorespraticas/js/owlcarousel/assets/owl.theme.default.min.css">
	<script src="<?php bloginfo('url'); ?>/wp-content/themes/melhorespraticas/js/jquery-3.2.1.min.js"></script>
	<script src="<?php bloginfo('url'); ?>/wp-content/themes/melhorespraticas/js/owlcarousel/owl.carousel.min.js"></script>
	<script>
		$(document).ready(function(){
			$(".owl-carousel.edition").owlCarousel({
				loop:true,
				margin:10,
				nav:true,
				navText: ["<img src='<?php bloginfo('url'); ?>/wp-content/themes/melhorespraticas/images/arrow_next.png'>",
					"<img src='<?php bloginfo('url'); ?>/wp-content/themes/melhorespraticas/images/arrow_prev.png'>"],
				items: 5,
				margin:10,
				responsive:{
					0:{
						items:1,
						nav:true
					},
					600:{
						items:3,
						nav:false
					},
					1000:{
						items:4,
						nav:true,
						loop:false
					},
					1400:{
						items:5,
						nav:true,
						loop:false
					}
				}
			});

			$(".slider-videos").owlCarousel({
				loop:true,
				margin:10,
				nav:true,
				navText: ["<img src='<?php bloginfo('url'); ?>/wp-content/themes/melhorespraticas/images/arrow_next.png'>",
					"<img src='<?php bloginfo('url'); ?>/wp-content/themes/melhorespraticas/images/arrow_prev.png'>"],
				items: 3,
				margin:10,
				video: true,
				responsive:{
					0:{
						items:1,
						nav:true
					},
					600:{
						items:2,
						nav:false
					},
					1000:{
						items:3,
						nav:true,
						loop:false
					},
					1400:{
						items:3,
						nav:true,
						loop:false
					}
				}
			});


		});
	</script>
	<title><?php bloginfo('name'); ?> | <?php bloginfo('description'); ?></title>
</head>
<?php wp_head(); ?>
<?php $facebook_url = get_theme_mod('url_facebook'); ?>
<?php $linkedin_url = get_theme_mod('url_linkedin'); ?>
<?php $facebook_img = get_theme_mod('img_facebook'); ?>
<?php $linkedin_img = get_theme_mod('img_linkedin'); ?>
<?php $logo = get_theme_mod('melhorespraticas_logo'); ?>
<body <?php body_class(); ?>>
	<div class="main">
		<header class="header">
			<div class="header_background">
				<div class="container">
					<div class="header_top">
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

						<ul class="header_top-login">
							<?php if(!is_user_logged_in()): ?>
								<li><a href="<?php echo esc_url( get_permalink( get_page_by_title('Login')));?>">login</li>
							<?php else: ?>
								<li><a href="<?php echo wp_logout_url( $redirect ); ?>">logout</li>
							<?php endif; ?>
							<li><a href="#" onClick="showCart()"><img src="<?php bloginfo('url'); ?>/wp-content/themes/melhorespraticas/images/melhores_praticas-cart.png" width="23" height="20" alt=""></a></li>
							<li><a href="#" onclick="handleSearch()"><img src="<?php bloginfo('url'); ?>/wp-content/themes/melhorespraticas/images/melhores_praticas-search.png" width="23" height="20" alt=""></a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="header_content">
					<button id="menu-mobile" onclick="menuClick()">
						<span></span>
						<span></span>
						<span></span>
					</button>

					<div class="header_content-box box-1">
						<a class="header_content-box-brand" href="<?php bloginfo('url'); ?>"><img src="<?php echo $logo; ?>" alt="" class="image"></a>
					</div>
					<div class="main-navigation" id="top-menu">
						<div class="social-menu-mobile">
							<div class="container">
								<ul class="header_top-login-mobile">
									<li><a href="#" onclick="handleSearch()"><img src="<?php bloginfo('url'); ?>/wp-content/themes/melhorespraticas/images/melhores_praticas-search-white.png" width="23" height="20" alt=""></a></li>
									<li><a href="#" onClick="showCart()"><img src="<?php bloginfo('url'); ?>/wp-content/themes/melhorespraticas/images/melhores_praticas-cart-white.png" width="23" height="20" alt=""></a></li>
								</ul>
								<ul class="header_top-social-mobile">
									<li>
										<a href="<?php echo $facebook_url; ?>" id="facebook">
											<img src="<?php bloginfo('url'); ?>/wp-content/themes/melhorespraticas/images/melhores_praticas-facebook-white.png" width="15" height="15" alt="">
										</a>
									</li>
									<li>
										<a href="<?php echo $linkedin_url; ?>" id="linkedin">
											<img src="<?php bloginfo('url'); ?>/wp-content/themes/melhorespraticas/images/melhores_praticas-linkedin-white.png" width="15" height="15" alt="">
										</a>
									</li>
								</ul>
							</div>
							</div>
						<?php if (function_exists(navigation_menu())) navigation_menu(); ?>
							<?php if(!is_user_logged_in()): ?>
								<span class="login subtitle"><a href="<?php echo esc_url( get_permalink( get_page_by_title('Login')));?>">login</span>
							<?php else: ?>
								<span class="login subtitle"><a href="<?php echo wp_logout_url( $redirect ); ?>">logout</span>
							<?php endif; ?>
					</div>
					<div class="header_content-box box-3">
						<a href="#" class="cta">Assine</a>
					</div>
				</div>
			</div>
		</header>
		<div class="busca" id="searchWord">
			<?php get_search_form(); ?>
		</div>

		<script>
			var menuClick = function () {
				var menuMobile = document.getElementById('menu-mobile');
				var topMobile = document.getElementById('top-menu');
				topMobile.classList.toggle('active');
				menuMobile.classList.toggle('close-menu');
			};

			var handleSearch = function() {
				var search = document.getElementsByClassName('busca')[0];
				var input = document.getElementsByClassName('search-form-bottom_text')[0];
				search.classList.toggle('active');
				input.focus();
			}
		</script>