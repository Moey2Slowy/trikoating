<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>



<section id="service-select" class="full-height hero bg-grey">
	<?php if(get_field('home_features')): $i = 0; $rowCount = count(get_field('home_features')); ?>
		<ul id="home-features" class="row-count-<?php echo $rowCount; ?>">
			<?php while( have_rows('home_features') ): $i++; the_row(); 
		        $labelImg = get_sub_field('label_image');
		        $bgImg = get_sub_field('background_image');
		        $link = get_sub_field('link');
		        if( $link ): 
				    $link_url = $link['url'];
				    $link_title = $link['title'];
				    $link_target = $link['target'] ? $link['target'] : '_self'; ?>
			        <li>
				        <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
				        	<?php if($bgImg): ?>
				        		<img class="bg-img" src="<?php echo $bgImg['url']; ?>" alt="<?php echo $bgImg['alt'] ?>" />
							<?php else: ?>
								<img class="bg-img" src="<?php bloginfo('url'); ?>/wp-content/themes/trikoating/images/powder-coating-1.webp" alt="<?php the_sub_field('title'); ?>" />
				        	<?php endif; ?>

				        	<div class="filter"></div>

				        	<?php if ($i == 1) { ?>
					        	<h1 class="label">
				        	<?php } else { ?>
				        		<h2 class="label">
				        	<?php } ?>

				        		<?php if( get_sub_field('label_type') == 'text' ) { ?>
					        		<?php the_sub_field('label_text'); ?>
								<?php } else { ?>
									<img class="label-image" src="<?php echo $labelImg['url']; ?>" alt="<?php echo $labelImg['alt'] ?>" />
					        	<?php } ?>

				        	<?php if ($i == 1) { ?>
					        	</h1>
				        	<?php } else { ?>
				        		</h2>
				        	<?php } ?>
				        </a>
					</li>
				<?php endif; ?>
	        <?php endwhile; ?>
	    </ul>
	<?php endif; ?>
</section>



<?php endwhile; endif; ?>
<?php get_footer(); ?>