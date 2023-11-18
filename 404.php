<?php get_header(); ?>


<section id="page-not-found">
	<img src="<?php bloginfo('url'); ?>/wp-content/themes/trikoating/images/powder-coating-1.webp" alt="<?php the_title(); ?>" />	
	<h1>Page not found</h1>
</section>


<section class="small-padding bg-secondary long-text center-align">
	<div class="wrapper thin-wrapper">
		<h4 class="center-align">Were you looking for one of these?</h4>

		<div class="buttons-wrapper center-buttons">
	        <a href="<?php bloginfo('url'); ?>/powder-coating/" class="button">Powder Coating</a>
	        <a href="<?php bloginfo('url'); ?>/co-manufacturing/" class="button">Co-Manufacturing</a>
	        <a href="<?php bloginfo('url'); ?>/about/" class="button">About Us</a>
	    </div>
    </div>
</section>



<?php get_footer(); ?>