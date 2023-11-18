<?php if( have_rows('sections') ): ?>
    <?php while( have_rows('sections') ): the_row(); ?>


        <?php if( get_row_layout() == 'title_banner' ): 
        	$bg = get_sub_field('background');
            ?>
			<section class="section-title-banner title-banner <?php if( get_sub_field('section_height') == 'full' ): ?>full-height<?php endif; ?> bg-white">
				<?php if($bg) {
					echo wp_get_attachment_image( $bg['ID'], 'full' );
				} else { ?>
					<img src="<?php bloginfo('url'); ?>/wp-content/themes/trikoating/images/powder-coating-1.webp" alt="<?php the_sub_field('title'); ?>" />
				<?php } ?>
				
				<div class="title-banner-triangle"></div>

				<div class="title-banner-content <?php if( get_sub_field('section_height') != 'full' ): ?>xlarge-padding<?php endif; ?>">
					<div class="wrapper">
						<h2><?php the_sub_field('title'); ?></h2>
					</div>
				</div>
			</section>


		<?php elseif( get_row_layout() == 'text_and_image_columns' ): 
        	$imgColumn = get_sub_field('image');
            ?>
			<section class="section-text-image large-padding bg-white long-text">
				<div class="wrapper">
					<?php if( get_sub_field('title') ): ?>
						<h2><?php the_sub_field('title'); ?></h2>
					<?php endif; ?>

					<div class="text-image-columns <?php if( get_sub_field('text_side') == 'left' ): ?>image-column-right<?php else: ?>image-column-left<?php endif; ?>">
						<div class="text-image-column text-column">
							<?php the_sub_field('text'); ?>
						</div><div class="text-image-column image-column">
							<?php if($imgColumn) {
								echo wp_get_attachment_image( $imgColumn['ID'], 'full' );
							} else { ?>
								<img src="<?php bloginfo('url'); ?>/wp-content/themes/trikoating/images/powder-coating-1.webp" alt="powder coating" />
							<?php } ?>
						</div>
					</div>
				</div>
			</section>


        <?php elseif( get_row_layout() == 'feature_rows' ): ?>
        	<section class="section-feature-rows <?php if( get_sub_field('first_row_arrow') == 'left' ): ?>feature-start-left<?php endif; ?>">
	            <?php if( have_rows('feature_row') ): ?>
				    <ul class="feature-rows">
					    <?php while( have_rows('feature_row') ): the_row(); 
					        $image = get_sub_field('image');
					        $icon = get_sub_field('icon');
					        ?>
					        <li class="feature-row">
					        	<div class="feature-imagery">
									<div class="feature-arrow">
						        		<div class="feature-arrow-block"></div><svg class="feature-arrow-triangle" viewBox="0 0 220 256" width="220" height="256" preserveAspectRatio="xMidYMid meet"><path class="st0" d="M218.16,109.9c0,0-160.1-103.78-163.99-106.31S44.65,0,39.55,0H0v256c12.04,0,22.71-4.2,30.79-9.12l0,0l0,0 c2.97-1.8,187.44-130.24,187.44-130.24C220.62,115.01,220.58,111.47,218.16,109.9z"/></svg>
							        </div>
						        	<?php if($icon): ?><img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt'] ?>" /><?php endif; ?>
						        	<div class="feature-row-image">
							        	<?php if($image): ?>
							        		<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
										<?php else: ?>
											<img src="<?php bloginfo('url'); ?>/wp-content/themes/trikoating/images/powder-coating-1.webp" alt="<?php the_sub_field('title'); ?>" />
							        	<?php endif; ?>
							        </div>
						        </div>
					        	
					        	<div class="wrapper">
						        	<div class="feature-column feature-title-column">								            
								        <h3 class="feature-title"><?php the_sub_field('title'); ?></h3>
							        </div><div class="feature-column feature-text-column">
						        		<div class="feature-text">
								            <?php the_sub_field('text'); ?>
								        </div>
							        </div>
						        </div>
					        </li>
					    <?php endwhile; ?>
				    </ul>
				<?php endif; ?>
			</section>


		<?php elseif( get_row_layout() == 'text_banner' ): ?>
			<section class="section-text-banner large-padding  
				<?php if ( get_sub_field('background_colour') == 'navy' ) { ?>bg-secondary
				<?php } elseif ( get_sub_field('background_colour') == 'black' ) { ?>bg-black
				<?php } elseif ( get_sub_field('background_colour') == 'white' ) { ?>bg-white
				<?php } else { ?>bg-primary<?php } ?>">	

					<?php if( have_rows('text_lines') ): ?>			
						<div class="wrapper thin-wrapper">
							<h2>
								<?php while( have_rows('text_lines') ): the_row(); ?>
									<span class="
										<?php if( get_sub_field('position') == 'left' ) { ?>left-align
										<?php } elseif ( get_sub_field('position') == 'left indent one' ) { ?>left-align left-indent-one
										<?php } elseif ( get_sub_field('position') == 'left indent two' ) { ?>left-align left-indent-two
										<?php } elseif ( get_sub_field('position') == 'center' ) { ?>center-align
										<?php } elseif ( get_sub_field('position') == 'right indent two' ) { ?>right-align right-indent-two
										<?php } elseif ( get_sub_field('position') == 'right indent one' ) { ?>right-align right-indent-one
										<?php } elseif ( get_sub_field('position') == 'right' ) { ?>right-align<?php } ?>
									">
										<?php the_sub_field('text'); ?>
									</span>
								<?php endwhile; ?>
							</h2>
						</div>
					<?php endif; ?>
				</section>


		<?php elseif( get_row_layout() == 'team_grid' ): ?>
			<section class="section-team-grid text-banner large-padding 
				<?php if ( get_sub_field('background_colour') == 'navy' ) { ?>bg-secondary
				<?php } elseif ( get_sub_field('background_colour') == 'black' ) { ?>bg-black
				<?php } elseif ( get_sub_field('background_colour') == 'white' ) { ?>bg-white
				<?php } else { ?>bg-primary<?php } ?>">	

				<div class="wrapper thin-wrapper">
					<?php if( get_sub_field('title') ): ?>
						<div class="long-text center-align">
							<h2><?php the_sub_field('title'); ?></h2>
						</div>
					<?php endif; ?>

					<?php if( have_rows('team') ): ?>			
						<ul class="team-grid small-padding-top">
							<?php while( have_rows('team') ): the_row(); $mugshot = get_sub_field('mugshot'); ?>
								<li>
									<div class="team-image">
										<?php if($mugshot) {
											echo wp_get_attachment_image( $mugshot['ID'], 'full' );
										} else { ?>
											<img src="<?php bloginfo('url'); ?>/wp-content/uploads/2023/11/team-placeholder-secondary-01.png" alt="<?php the_sub_field('name'); ?>" />
										<?php } ?>
									</div>
									<h3><?php the_sub_field('name'); ?></h3>
									<h4><?php the_sub_field('position'); ?></h4>
								</li>
							<?php endwhile; ?>
						</ul>
					<?php endif; ?>
				</div>
			</section>


		<?php elseif( get_row_layout() == 'contact_form' ): ?>
			<section class="section-contact-form small-padding">
				<div class="wrapper">
					<div class="contact-form-column small-padding side-padding
						<?php if ( get_sub_field('background_colour') == 'navy' ) { ?>bg-secondary
						<?php } elseif ( get_sub_field('background_colour') == 'black' ) { ?>bg-black
						<?php } else { ?>bg-primary<?php } ?>">	

						<div class="gravity-form-bg"></div>

						<div class="form-section-triangle triangle-blue">
							<?php $blueimage = get_field('blue_triangle_image');if( !empty( $blueimage ) ): ?>
							    <img src="<?php echo esc_url($blueimage['url']); ?>" alt="<?php echo esc_attr($blueimage['alt']); ?>" />
							<?php else: ?>
								<img src="<?php bloginfo('url'); ?>/wp-content/themes/trikoating/images/powder-coating-1.webp" alt="powder coating" />
							<?php endif; ?>
							<div class="filter"></div>
						</div>

						<div class="form-section-triangle triangle-red">
							<?php $redimage = get_field('red_triangle_image');if( !empty( $redimage ) ): ?>
							    <img src="<?php echo esc_url($redimage['url']); ?>" alt="<?php echo esc_attr($redimage['alt']); ?>" />
							<?php else: ?>
								<img src="<?php bloginfo('url'); ?>/wp-content/uploads/2023/11/chemical-wash.webp" alt="chemical wash" />
							<?php endif; ?>
							<div class="filter"></div>
						</div>

						<div class="form-section-triangle triangle-white">
							<?php $whiteimage = get_field('white_triangle_image');if( !empty( $whiteimage ) ): ?>
							    <img src="<?php echo esc_url($whiteimage['url']); ?>" alt="<?php echo esc_attr($whiteimage['alt']); ?>" />
							<?php else: ?>
								<img src="<?php bloginfo('url'); ?>/wp-content/uploads/2023/11/powder-coated-parts-4.webp" alt="powder coated products" />
							<?php endif; ?>
							<div class="filter"></div>
						</div>

						<div class="gravity-form">
							<?php if( get_sub_field('title') ): ?>
								<h3><?php the_sub_field('title'); ?></h3>
							<?php endif; ?>
							<?php the_sub_field('form_shortcode'); ?>
						</div>
					</div>
				</div>
			</section>


		<?php elseif( get_row_layout() == 'request_quote_form' ): ?>
			<section class="section-raq-form large-padding 
				<?php if ( get_sub_field('form_background') == 'navy' ) { ?>bg-secondary
				<?php } elseif ( get_sub_field('form_background') == 'black' ) { ?>bg-black
				<?php } elseif ( get_sub_field('form_background') == 'white' ) { ?>bg-white
				<?php } else { ?>bg-primary<?php } ?>">

				<div class="wrapper">
					<div class="gravity-form">
						<?php if( get_sub_field('title') ): ?>
							<h3><?php the_sub_field('title'); ?></h3>
						<?php endif; ?>
						<?php the_sub_field('form_shortcode'); ?>
					</div>
				</div>
			</section>


        <?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>