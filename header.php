
<?php
/**** The template for displaying the header ****/
?>
<!DOCTYPE html>
<html <?php language_attributes();?> >
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	<link rel="stylesheet" href="wp-content/themes/melhorespraticas/style.css">
	<title><?php bloginfo('name'); ?> | <?php bloginfo('description'); ?></title>
</head>
<?php wp_head(); ?>
<body <?php body_class(); ?>>
	<div class="main">
		<header class="header">
			<div class="header_background">
				<div class="container">
					<div class="col-12">
						<div class="header_top">
							<ul class="header_top-social col">
								<li><a href="#" id="facebook"><img src="" width="13" height="13" alt=""></a></li>
								<li><a href="#" id="linkedin"><img src="" width="13" height="13" alt=""></a></li>
							</ul>

							<ul class="header_top-menu col-5">
								<li><a href="#">Nossa Empresa</a></li>
								<li><a href="#">Contato</a></li>
								<li><a href="#">A Revista de benchmarking em saúde</a></li>
							</ul>

							<p class="col-4 header_top-message">Casos e práticas embasados nas metodologias de acreditação</p>

							<ul class="header_top-login col-2">
								<li><a href="#">login</li>
								<li><a href="#"><img src="" width="23" height="20" alt=""></a></li>
								<li><a href="#"><img src="" width="23" height="20" alt=""></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="header_content">
					<div class="header_content-box box-1 col-2">
						<img src="wp-content/themes/melhorespraticas/images/melhores_praticas_logo.png" alt="" class="image">
					</div>
					<ul class="header_content-box box-2 col-8">
						<li><a href="#">item menu</a></li>
						<li><a href="#">item menu</a></li>
						<li><a href="#">item menu</a></li>
						<li><a href="#">item menu</a></li>
						<li><a href="#">item menu</a></li>
						<li><a href="#">item menu</a></li>
						<li><a href="#">item menu</a></li>
					</ul>
					<div class="header_content-box box-3 col-2">
						<a href="#" class="cta">Assine</a>
					</div>
				</div>
			</div>
		</header>