<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>


<?php 
	/* Create variables to be used in Schema and Social Media Open Graph tags */
	$name = get_the_title();
	$url = get_the_permalink();
	$excerpt = get_the_excerpt();
	$thumb_id = get_post_thumbnail_id();
	$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
	$thumb_url = $thumb_url_array[0];
?>


<?php /* Schema markup */ ?>
<script type="application/ld+json">
{
	"@context": "https://schema.org",
	"@type": "Product",
	"name": "<?php echo $name; ?>",
	"brand": {
		"@type": "Brand",
		"name": "Flo-rite Seed Firmers",
		"logo": "http://florite.local/wp-content/uploads/2022/08/FR_LogoMain.png"
	},
	"url": "<?php echo $url; ?>",
	"description": "<?php echo $excerpt; ?>",
	"image": "<?php echo $thumb_url; ?>",
	"countryOfOrigin": "USA",
	"countryOfAssembly": "USA"
}
</script>


<?php /* Facebook and Twitter Open Graph markup */ ?>
<meta property="og:site_name" content="Flo-rite Seed Firmers" />
<meta property="og:title" content="<?php the_title(); ?>" />
<meta property="og:type" content="product" />
<meta property="og:image" content="<?php echo $thumb_url; ?>" />
<meta property="og:url" content="<?php echo $url; ?>" />
<meta property="og:description" content="<?php echo $excerpt; ?>" />

<meta property="twitter:card" content="summary_large_image" />
<meta property="twitter:image" content="<?php echo $thumb_url; ?>" />


<?php /* Page content start */ ?>
<section id="product-title" class="xsmall-padding">
	<div class="wrapper">
		<ol id="breadcrumbs" itemscope itemtype="https://schema.org/BreadcrumbList">
			<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
				<a href="<?php bloginfo('url'); ?>/products" itemprop="item">
					<span itemprop="name">Products</span>
				</a>
				<meta itemprop="position" content="1" />
			</li>
			<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
				<span itemprop="name"><?php the_title(); ?></span>
				<meta itemprop="position" content="2" />
			</li>
		</ol>

		<h1><?php the_title(); ?></h1>
	</div>
</section>


<section id="product-content">		
	<div class="wrapper">
		<div class="product-columns">
			
		    <div class="product-column product-image-column medium-padding-bottom">
			    <?php $images = get_field('gallery'); if( is_array($images) ): ?>
			    	<ul id="product-gallery">
				        <?php foreach( $images as $image ): ?>
				        	<li>
			                	<img src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
			                	<p><?php echo esc_html($image['caption']); ?></p>
			                </li>
				        <?php endforeach; ?>
				    </ul>

				    <div id="product-gallery-thumbs">
				    	<?php global $my_page_offset;

						if(!isset($my_page_offset))
						  $my_page_offset = 0;

						$pages = get_pages(array(
						  'child_of'    => $post->ID, 
						  'offset'      => $my_page_offset, 
						  'number'      => 1,
						));

						if (count($images) >= 2) {
							foreach( $images as $image ): ?>
				                <a data-slide-index="<?php echo $my_page_offset++; ?>">
			                    	<img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>" />
				                </a>
					        <?php endforeach; 
					    } ?>
				    </div>
			    <?php endif; wp_reset_query(); ?>
	    	</div>

	    	<div class="product-column product-text-column medium-padding-bottom">
				<div class="long-text">
			        <?php the_content(); ?>
			    </div>
		    </div>
    	</div>
    </div>
</section>


<?php if( get_field('features') || get_field('compatibility') || get_field('benefits') ): ?>
	<section id="features-and-benefits" class="long-text">
		<div class="wrapper">
			<div class="product-columns">
				<?php if( get_field('features') ): ?>
					<div class="product-column product-features medium-padding-bottom">
						<?php the_field('features'); ?>
					</div>
				<?php endif; ?>
				<?php if( get_field('compatibility') ): ?>
					<div class="product-column product-compatibility medium-padding-bottom">
						<?php the_field('compatibility'); ?>
					</div>
				<?php endif; ?>
				<?php if( get_field('benefits') ): ?>
					<div class="product-column product-benefits medium-padding-bottom">
						<?php the_field('benefits'); ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</section>
<?php endif; ?>


<svg class="seed-divider" x="0px" y="0px" viewBox="0 0 320 14" width="320" height="14" preserveAspectRatio="xMidYMid meet">
	<path d="M46,7c0,0-8.4,7-13,7S20,7,20,7s8.4-7,13-7S46,7,46,7"/>
	<path d="M109.5,7c0,0-8.4,7-13,7c-4.6,0-13-7-13-7s8.4-7,13-7C101.1,0,109.5,7,109.5,7"/>
	<path d="M173,7c0,0-8.4,7-13,7c-4.6,0-13-7-13-7s8.4-7,13-7S173,7,173,7"/>
	<path d="M236.5,7c0,0-8.4,7-13,7c-4.6,0-13-7-13-7s8.4-7,13-7C228.1,0,236.5,7,236.5,7"/>
	<path d="M300,7c0,0-8.4,7-13,7s-13-7-13-7s8.4-7,13-7S300,7,300,7"/>
</svg>


<section id="product-quote-form" class="bg-white small-padding">
	<div class="wrapper xthin-wrapper">
		<div class="contact-form center-align">
			<?php if( have_rows('models') ): ?>
				<div id="product-model-options">
					<?php while( have_rows('models') ): the_row(); ?>
						<span><?php the_sub_field('model'); ?></span>
					<?php endwhile; ?>
				</div>
			<?php endif; ?>
			<?php echo apply_shortcodes( '[contact-form-7 id="108" title="Product Quote Request"]' ); ?>
		</div>
	</div>
</section>


<?php if( have_rows('downloads') ): ?>
	<section id="product-downloads" class="bg-primary small-padding">
		<div class="wrapper">
			<h2 class="center-align">Downloads</h2>

			<div class="file-list">
		        <?php while( have_rows('downloads') ): the_row(); 
		        	$file = get_sub_field('file'); 
		        	if( $file ):
	        			$filesize = $file['filesize'];
					    $filesize = size_format($filesize, 2);
			        ?><a href="<?php echo $file['url']; ?>" target="_blank">
			        	<svg x="0px" y="0px" viewBox="0 0 128 160" width="128" height="160" preserveAspectRatio="xMidYMid meet">
							<path d="M70.8,96.2c0.5,2.1,0.4,4.3-0.1,6.3c-0.7,2.2-2.7,3.7-5,3.5h-4.2V91.9h3.3 C67.8,91.9,70,93,70.8,96.2z M41.7,91.6H38v6.3h3.6c1.6,0,3.1-0.2,3.8-1.5c0.4-1,0.4-2.2,0-3.3C44.8,91.7,43.3,91.6,41.7,91.6z M128,73.3V160H0V0h50.7C83.1,0,73,53.3,73,53.3C93,48.4,128,50.5,128,73.3z M51.3,91.7c-1.1-3.2-4-5.1-8.2-5.1H32v24.6h6v-8.5h5.1 c4.1,0,7.1-1.8,8.2-5.1C51.9,95.7,51.9,93.7,51.3,91.7z M74,89.7c-2.1-2.1-5-3.2-8-3.1H55.3v24.6H66c3.2,0.2,6.3-1.2,8.4-3.6 C78.1,103.3,78.3,94.1,74,89.7L74,89.7z M98.7,86.7H81.1v24.6h6v-9.8h9.9v-4.9h-9.9v-4.7h11.5L98.7,86.7z"/>
							<path d="M128,45.9C118,32.6,93.1,7.8,78.5,0c7.7,7.8,10.4,28.2,8.9,38C97.4,36.3,113.4,36,128,45.9z"/>
						</svg>
						<p><?php echo $file['title']; ?> <span>(<?php echo $filesize; ?>)</span></p>
					</a><?php endif;
				endwhile; ?>
			</div>
		</div>
	</section>
<?php endif; ?>


<script type="text/javascript">
	jQuery( document ).ready( function ( $ ) {
		// --------------------------------------------------------------------------------------
		// Product sliders ------------------------------------------------------
		// --------------------------------------------------------------------------------------
	    $('#product-gallery').bxSlider({
	        pagerCustom: '#product-gallery-thumbs',
	        controls: false,
	    });  

	    // --------------------------------------------------------------------------------------
		// Populate form model dropdown ------------------------------------------------------
		// --------------------------------------------------------------------------------------
	    $('#product-model-options span').each(function() {
		  $('select#productlist ').append(
		  	$('<option>', { 
	            value: $(this).text(),
	            text: $(this).text()
	        })
		  );
		}); 
    });
</script>


<?php endwhile; endif; ?>
<?php get_footer(); ?>