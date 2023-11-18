<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>



<?php get_template_part('inc/hero'); ?>


<?php if( '' !== get_post()->post_content ) { ?>
	<section id="main-content" class="large-padding long-text">		
		<div class="wrapper thin-wrapper">
	        <?php the_content(); ?>
	    </div>
	</section>
<?php } ?>


<?php get_template_part('inc/sections'); ?>



<?php endwhile; endif; ?>
<?php get_footer(); ?>