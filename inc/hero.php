<section id="hero" class="title-banner full-height">
	<?php if( has_post_thumbnail() ) {
		the_post_thumbnail();
	} else { ?>
		<img src="<?php bloginfo('url'); ?>/wp-content/themes/trikoating/images/powder-coating-1.webp" alt="<?php the_title(); ?>" />
	<?php } ?>

	<div class="title-banner-triangle"></div>

	<div class="title-banner-content">
		<div class="wrapper">
			<?php if( get_field('alternative_title') ): ?>
			    <h1><?php the_field('alternative_title'); ?></h1>
			<?php elseif( is_home() ): ?>
				<h1><?php single_post_title(); ?></h1>
			<?php else: ?>
				<h1><?php the_title(); ?></h1>
			<?php endif; ?>
		</div>
	</div>
</section>