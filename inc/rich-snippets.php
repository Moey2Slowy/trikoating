<?php 
	/* Create variables to be used in Schema and Social Media Open Graph tags */
	if( get_field('alternative_title') ):
		$name = get_field('alternative_title');
	else:
		$name = get_the_title();
	endif;
	$url = get_the_permalink();
	$excerpt = get_the_excerpt();
	$thumb_id = get_post_thumbnail_id();
	$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'og', true);
	$thumb_url = $thumb_url_array[0];
?>


<?php /* Schema markup */ ?>
<script type="application/ld+json">
{
	"@context": "https://schema.org",
	"@type": "WebPage",
	"name": "Tri Koating Inc. | <?php echo $name; ?>",
	"url": "<?php echo $url; ?>",
	"description": "<?php echo $excerpt; ?>",
	"image": "<?php echo $thumb_url; ?>",
}
</script>


<?php /* Facebook and Twitter Open Graph markup */ ?>
<meta property="og:site_name" content="Tri Koating Inc." />
<meta property="og:title" content="<?php the_title(); ?>" />
<meta property="og:type" content="website" />
<meta property="og:image" content="<?php echo $thumb_url; ?>" />
<meta property="og:url" content="<?php echo $url; ?>" />
<meta property="og:description" content="<?php echo $excerpt; ?>" />

<meta property="twitter:card" content="summary" />
<meta property="twitter:image" content="<?php echo $thumb_url; ?>" />