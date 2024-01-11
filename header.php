<!DOCTYPE html>
<html lang="en">
<head>
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	
	  ga('create', 'UA-42026666-14', 'trikoatinginc.com');
	  ga('send', 'pageview');
	
	</script>

	<title><?php wp_title() ?></title>
	
	<meta charset="utf-8">
	<meta name="HandheldFriendly" content="True">
	<meta name="MobileOptimized" content="540">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<!-- Google Tag Manager -->

	<!-- End Google Tag Manager -->

	<?php wp_head(); ?> <!-- Retrieves the css from functions file -->

	<!-- mobile address bar colour -->
	<meta name="theme-color" content="#d7282f">
	<meta name="msapplication-navbutton-color" content="#d7282f">
	<meta name="apple-mobile-web-app-capable" content="no">
	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
</head>


<body <?php body_class($post->post_name); ?> >



	<div class="responsive-menu">
		<?php
			$defaults = array(
				'container' => false,
				'theme_location' => 'primary-nav',
				'menu_id' => 'mobile-main-menu'
			);

			wp_nav_menu( $defaults );
		?>
	</div>
	
	<div class="mobile-nav-controls" aria-label="close mobile menu">
		<button class="close-nav">
			<svg version="1.1" id="menu-close" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 50 50" width="25" height="25" preserveAspectRatio="xMidYMid meet">
				<g>
					<rect x="-5.7" y="20.8" transform="matrix(0.7071 0.7071 -0.7071 0.7071 24.9588 -10.36)" width="61.5" height="8.3"/>
					<rect x="-5.7" y="20.9" transform="matrix(-0.7071 0.7071 -0.7071 -0.7071 60.4176 25.0783)" width="61.5" height="8.3"/>
				</g>
			</svg>
		</button>
		<button class="back-nav" aria-label="previous menu">
			<svg version="1.1" id="menu-back" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 25 25" width="25" height="25" preserveAspectRatio="xMidYMid meet">
				<g><rect x="4" y="10.5" width="21" height="4"/></g>
				<g><polygon points="12.5,25 0,12.5 12.5,0 15.3,2.8 5.7,12.5 15.3,22.2"/></g>
			</svg>
		</button>
	</div>
	<div class="mobile-overlay"></div>



	<div id="container">
		<div id="header-spacer"></div>
		<header>
			<a href="<?php bloginfo('url'); ?>/" class="header-logo-link" aria-label="TriKoating home page">
				<?php get_template_part('inc/logo'); ?>
			</a>

			<nav>
				<?php
					$defaults = array(
						'container' => false,
						'theme_location' => 'primary-nav',
						'menu_id' => 'main-menu'
					);

					wp_nav_menu( $defaults );
				?>
			</nav>

			<div class="mobile-nav">
				<div class="mobile-nav-buttons">
					<a href="<?php bloginfo('url'); ?>/request-a-quote">Request A Quote</a>
				</div>
				<div class="hamburger">
					<div class="bun-top"></div>
					<div class="meat"></div>
					<div class="bun-bottom"></div>
				</div>
			</div>
		</header>

		<main>