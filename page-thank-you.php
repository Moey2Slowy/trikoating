<?php /* Template Name: Thank You */
get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>



<section id="thank-you">
	<?php if( has_post_thumbnail() ) {
		the_post_thumbnail();
	} else { ?>
		<img src="<?php bloginfo('url'); ?>/wp-content/themes/trikoating/images/powder-coating-1.webp" alt="<?php the_title(); ?>" />
	<?php } ?>
	
	<div class="wrapper center-align">
		<h1>Thank You</h1>
	</div>
</section>


<?php if( '' !== get_post()->post_content ) { ?>
	<section id="main-content" class="large-padding long-text">		
		<div class="wrapper thin-wrapper">
	        <?php the_content(); ?>
	    </div>
	</section>
<?php } ?>


<?php endwhile; endif; ?>
<?php get_footer(); ?>