<?php get_header(); ?>



<?php get_template_part('inc/hero'); ?>


<section class="section-text-banner large-padding bg-primary">
	<div class="wrapper thin-wrapper">
		<h2>
			<span class="left-align left-indent-one">Nothing showcases</span>
			<span class="center-align">our work better than</span>
			<span class="right-align right-indent-two">our work</span>
		</h2>
	</div>
</section>


<div class="projects-container medium-padding">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<section id="<?php echo sanitize_title_with_dashes(get_the_title()); ?>" class="project-listing">
			<div class="wrapper long-text">
				<h2><?php the_title(); ?></h2>
			</div>

			<?php $images = get_field('gallery'); if( $images ): ?>
			    <div class="gallery-slider">
			    	<div class="gallery-wrapper">
			    		<div class="gallery-nowrap">
					        <?php foreach( $images as $image ): ?>
				            	<a href="<?php echo esc_url($image['url']); ?>" data-fancybox="<?php echo sanitize_title_with_dashes(get_the_title()); ?>" data-caption="<?php echo esc_attr($image['caption']); ?>">
				                     <img src="<?php echo esc_url($image['sizes']['gallery']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
				                </a>
					        <?php endforeach; ?>
					    </div>
				    </div>
			    </div>
			<?php endif; ?>
	    </section>

	<?php endwhile; endif; ?>
</div>


<section class="section-contact-form small-padding">
	<div class="wrapper">
		<div class="contact-form-column small-padding side-padding bg-primary">	
			<div class="gravity-form-bg"></div>

			<div class="form-section-triangle triangle-blue">
				<img src="<?php bloginfo('url'); ?>/wp-content/themes/trikoating/images/powder-coating-1.webp" alt="powder coating" />
				<div class="filter"></div>
			</div>

			<div class="form-section-triangle triangle-red">
				<img src="<?php bloginfo('url'); ?>/wp-content/uploads/2023/11/chemical-wash.webp" alt="chemical wash" />
				<div class="filter"></div>
			</div>

			<div class="form-section-triangle triangle-white">
				<img src="<?php bloginfo('url'); ?>/wp-content/uploads/2023/11/powder-coated-parts-4.webp" alt="powder coated products" />
				<div class="filter"></div>
			</div>

			<div class="gravity-form">
				<h3>Contact Us</h3>
				<?php  echo do_shortcode( '[gravityform id="1" title="false" description="false"]' ); ?>
			</div>
		</div>
	</div>
</section>


<?php get_footer(); ?>