
<?php
/**** The template for displaying the header ****/
?>
<!DOCTYPE html>
<html <?php language_attributes();?> >
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	<title><?php bloginfo('name'); ?> | <?php bloginfo('description'); ?></title>
</head>
<?php wp_head(); ?>
<body <?php body_class(); ?>>
	<div class="main">
		<header class="header">
			<div class="header_background">
				<div class="container">
					<div class="header_top">
						<ul class="header_top-social col">
							<li><a href="#" id="facebook"><img src="wp-content/themes/melhorespraticas/images/melhores_praticas-facebook.png" width="15" height="15" alt=""></a></li>
							<li><a href="#" id="linkedin"><img src="wp-content/themes/melhorespraticas/images/melhores_praticas-linkedin.png" width="15" height="15" alt=""></a></li>
						</ul>

						<?php //wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
						<ul class="header_top-menu">
							<li><a href="#">Nossa Empresa</a></li>
							<li><a href="#">Contato</a></li>
							<li><a href="#">A Revista de benchmarking em saúde</a></li>
						</ul>

						<p class="header_top-message">Casos e práticas embasados nas metodologias de acreditação</p>

						<ul class="header_top-login">
							<li><a href="#">login</li>
							<li><a href="#"><img src="wp-content/themes/melhorespraticas/images/melhores_praticas-cart.png" width="23" height="20" alt=""></a></li>
							<li><a href="#"><img src="wp-content/themes/melhorespraticas/images/melhores_praticas-search.png" width="23" height="20" alt=""></a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="header_content">
					<div class="header_content-box box-1">
						<img src="wp-content/themes/melhorespraticas/images/melhores_praticas_logo.png" alt="" class="image">
					</div>
					<ul class="header_content-box box-2">
						<li><a href="#">item menu</a></li>
						<li><a href="#">item menu</a></li>
						<li><a href="#">item menu</a></li>
						<li><a href="#">item menu</a></li>
						<li><a href="#">item menu</a></li>
						<li><a href="#">item menu</a></li>
						<li><a href="#">item menu</a></li>
					</ul>
					<div class="header_content-box box-3">
						<a href="#" class="cta">Assine</a>
					</div>
				</div>
			</div>
		</header>