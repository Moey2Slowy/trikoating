<?php /* Template Name: Contact */ ?>
<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>




<section id="location-map" class="no-padding">
	<div id="location-map-canvas" class="acf-map" data-zoom="13">
		<?php 
		$type_icon = get_stylesheet_directory_uri().'/images/pin-dealer-partner.png'; 
		$location = get_field('location','option'); ?>
		<div class="marker" 
			data-type="partner" 
			data-lat="<?php echo esc_attr($location['lat']); ?>" 
			data-lng="<?php echo esc_attr($location['lng']); ?>"
			data-region="<?php echo esc_attr($location['state']); ?>"
			data-img="<?php echo $type_icon; ?>"
		>
			<div class="marker-type marker-type-partner">Partner Dealer</div>
			<div class="marker-main-content">
				<h3 class="no-margin"><?php the_title(); ?></h3>
				<p>
					<?php echo esc_html( $location['street_number'] ); ?> <?php echo esc_html( $location['street_name'] ); ?><br />
					<?php echo esc_html( $location['city'] ); ?>, <?php echo esc_html( $location['state'] ); ?>, <?php echo esc_html( $location['country'] ); ?><br />
					<a href="https://www.google.com/maps?saddr=My+Location&daddr=<?php echo esc_html( $location['address'] ); ?>" target="_blank">Get Directions</a>
				</p>
			</div>
		</div>
	</div>
</section>


<section class="section-text-image large-padding bg-white long-text">
	<div class="wrapper">
		<h1>Contact Us</h1>

		<div class="text-image-columns image-column-right">
			<div class="text-image-column text-column small-text">
				<div class="contacts">
					<div>
						<h4>Location</h4>
						<p>
							<?php the_field('address','option'); ?>, <br />
							<?php the_field('city','option'); ?>, <?php the_field('province','option'); ?>, <?php the_field('postal','option'); ?>
						</p>
					</div>
					<div>
						<h4>Office</h4>
						<p>
							Phone: <a class="phone-link" href="tel:<?php the_field('office_phone','option'); ?>"><?php the_field('office_phone','option'); ?></a><br />
							Toll Free: <a class="phone-link" href="tel:<?php the_field('office_tf','option'); ?>"><?php the_field('office_tf','option'); ?></a><br />
							<a href="mailto:<?php the_field('email','option'); ?>"><?php the_field('email','option'); ?></a>
						</p>
					</div>
					<?php if( have_rows('contacts','option') ):
					    while( have_rows('contacts','option') ): the_row(); ?>
					    	<div>
								<h4><?php the_sub_field('name'); ?></h4>
								<p>
									<a class="phone-link" href="tel:<?php the_sub_field('phone'); ?>"><?php the_sub_field('phone'); ?></a><br />
									<a href="mailto:<?php the_sub_field('email'); ?>"><?php the_sub_field('email'); ?></a>
								</p>
							</div>
						<?php endwhile;
					endif; ?>
				</div>
			</div><div class="text-image-column image-column">
				<?php if ( has_post_thumbnail() ): ?>
					<?php the_post_thumbnail(); ?>
				<?php else: ?>
					<img src="<?php bloginfo('url'); ?>/wp-content/themes/trikoating/images/powder-coating-1.webp" alt="powder coating" />
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>


<?php if( '' !== get_post()->post_content ) { ?>
	<section id="main-content" class="large-padding long-text">		
		<div class="wrapper thin-wrapper">
	        <?php the_content(); ?>
	    </div>
	</section>
<?php } ?>


<?php get_template_part('inc/sections'); ?>




<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBJbCCarP3BOwoiC70F6C9xAzlvLpEEU8g" defer></script>
<script type="text/javascript">	
(function( $ ) {	
	/* ------------------------------------------------------------------------ */
	/* Initiate Google Map ------------------------------------ */
	/* ------------------------------------------------------------------------ */
	function initMap( $el ) {

		var $markers = $el.find('.marker');
		geocoder = new google.maps.Geocoder();

		// Create generic map.
		var mapArgs = {
			zoom        : $el.data('zoom') || 16,
			mapTypeId   : google.maps.MapTypeId.ROADMAP,
			styles		: [
				{
					"featureType": "all",
					"elementType": "geometry",
					"stylers": [{ "color": "#ebe3cd" }]
				},
				{
					"featureType": "all",
					"elementType": "labels.text.fill",
					"stylers": [{ "color": "#523735" }]
				},
				{
					"featureType": "all",
					"elementType": "labels.text.stroke",
					"stylers": [{ "color": "#f5f1e6" }]
				},
				{
					"featureType": "administrative",
					"elementType": "geometry.stroke",
					"stylers": [{ "color": "#c9b2a6" }]
				},
				{
					"featureType": "administrative",
					"elementType": "labels",
					"stylers": [{ "visibility": "off" }]
				},
				{
					"featureType": "administrative.locality",
					"elementType": "labels.text",
					"stylers": [{ "visibility": "on" }]
				},
				{
					"featureType": "administrative.neighborhood",
					"elementType": "labels.text",
					"stylers": [{ "visibility": "on" }]
				},
				{
					"featureType": "administrative.land_parcel",
					"elementType": "geometry.stroke",
					"stylers": [{ "color": "#dcd2be" }]
				},
				{
					"featureType": "administrative.land_parcel",
					"elementType": "labels.text.fill",
					"stylers": [{ "color": "#ae9e90" }]
				},
				{
					"featureType": "landscape",
					"elementType": "labels",
					"stylers": [{ "visibility": "off" }]
				},
				{
					"featureType": "landscape.natural",
					"elementType": "geometry",
					"stylers": [{ "color": "#dfd2ae" }]
				},
				{
					"featureType": "poi",
					"elementType": "geometry",
					"stylers": [{ "color": "#dfd2ae" }]
				},
				{
					"featureType": "poi",
					"elementType": "labels",
					"stylers": [{ "visibility": "off" }]
				},
				{
					"featureType": "poi",
					"elementType": "labels.text.fill",
					"stylers": [{ "color": "#93817c" }]
				},
				{
					"featureType": "poi.park",
					"elementType": "geometry.fill",
					"stylers": [{ "color": "#a5b076" }]
				},
				{
					"featureType": "poi.park",
					"elementType": "labels.text.fill",
					"stylers": [{ "color": "#447530" }]
				},
				{
					"featureType": "road",
					"elementType": "geometry",
					"stylers": [{ "color": "#f5f1e6" }]
				},
				{
					"featureType": "road",
					"elementType": "labels",
					"stylers": [{ "visibility": "simplified" }]
				},
				{
					"featureType": "road.highway",
					"elementType": "geometry",
					"stylers": [{ "color": "#f8c967" }]
				},
				{
					"featureType": "road.highway",
					"elementType": "geometry.stroke",
					"stylers": [{ "color": "#e9bc62" }]
				},
				{
					"featureType": "road.highway",
					"elementType": "labels",
					"stylers": [{ "visibility": "off" }]
				},
				{
					"featureType": "road.highway.controlled_access",
					"elementType": "geometry",
					"stylers": [{ "color": "#e98d58" }]
				},
				{
					"featureType": "road.highway.controlled_access",
					"elementType": "geometry.stroke",
					"stylers": [{ "color": "#db8555" }]
				},
				{
					"featureType": "road.arterial",
					"elementType": "geometry",
					"stylers": [{ "color": "#fdfcf8" }]
				},
				{
					"featureType": "road.arterial",
					"elementType": "geometry.fill",
					"stylers": [
						{ "hue": "#ff6300" },
						{ "lightness": "-25" }
					]
				},
				{
					"featureType": "road.arterial",
					"elementType": "labels",
					"stylers": [{ "visibility": "on" }]
				},
				{
					"featureType": "road.arterial",
					"elementType": "labels.text",
					"stylers": [{ "visibility": "on" }]
				},
				{
					"featureType": "road.arterial",
					"elementType": "labels.icon",
					"stylers": [{ "visibility": "off" }]
				},
				{
					"featureType": "road.local",
					"elementType": "geometry",
					"stylers": [
						{ "hue": "#ff9c00" },
						{ "gamma": ".9" },
						{ "lightness": "-24" }
					]
				},
				{
					"featureType": "road.local",
					"elementType": "labels.text.fill",
					"stylers": [{ "color": "#806b63" }]
				},
				{
					"featureType": "transit",
					"elementType": "labels",
					"stylers": [{ "visibility": "off" }]
				},
				{
					"featureType": "transit.line",
					"elementType": "geometry",
					"stylers": [{ "color": "#dfd2ae" }]
				},
				{
					"featureType": "transit.line",
					"elementType": "labels.text.fill",
					"stylers": [{ "color": "#8f7d77" }]
				},
				{
					"featureType": "transit.line",
					"elementType": "labels.text.stroke",
					"stylers": [{ "color": "#ebe3cd" }]
				},
				{
					"featureType": "transit.station",
					"elementType": "geometry",
					"stylers": [{ "color": "#dfd2ae" }]
				},
				{
					"featureType": "water",
					"elementType": "geometry.fill",
					"stylers": [{ "color": "#b9d3c2" }]
				},
				{
					"featureType": "water",
					"elementType": "labels.text.fill",
					"stylers": [{ "color": "#92998d" }]
				}
			]
		};
		var map = new google.maps.Map( $el[0], mapArgs );
		
		// Markers
		var infoWindow = new google.maps.InfoWindow();
		map.markers = [];
		$markers.each(function(){
			initMarker( $(this), map );
		});
		
		// Center map based on markers.
		centerMap( map );

		// Return map instance.
		return map;
	}
	

	/* ------------------------------------------------------------------------ */
	/* Set markers (pins) and info windows ------------------------------------ */
	/* ------------------------------------------------------------------------ */
	function initMarker( $marker, map ) {

		// Get position from marker.
		var lat = $marker.data('lat');
		var lng = $marker.data('lng');
		var latLng = {
			lat: parseFloat( lat ),
			lng: parseFloat( lng )
		};
		var icon = $marker.attr('data-img');
		var type = $marker.attr('data-type');
		var region = $marker.attr('data-region');
		
		// Create marker instance.
		var marker = new google.maps.Marker({
			position : latLng,
			map: map,
			icon: icon,
			type: type,
			region: region,
		});
				
		// Append to reference for later use.
		map.markers.push( marker );

		// If marker contains HTML, add it to an infoWindow.
		if( $marker.html() ){
			// Initialize info window
			infoWindow = new google.maps.InfoWindow({
				content: $marker.html()
			});

			// Click functionality on pins - update and move info window
			google.maps.event.addListener(marker, 'click', function() {
				var html = $marker.html();
				infoWindow.setContent(html);
				infoWindow.open( map, marker, html );
			});
		}
	}
	
	
	
	/* ------------------------------------------------------------------------ */
	/* Center Map - keep all locations in view ------------------------------------ */
	/* ------------------------------------------------------------------------ */
	function centerMap( map ) {
		// Create map boundaries from all map markers.
		var bounds = new google.maps.LatLngBounds();
		map.markers.forEach(function( marker ){
			bounds.extend({
				lat: marker.position.lat(),
				lng: marker.position.lng()
			});
		});

		// Case: Single marker.
		if( map.markers.length == 1 ){
			map.setCenter( bounds.getCenter() );

		// Case: Multiple markers.
		} else{
			map.fitBounds( bounds );
		}
	}
	
	
	/* ------------------------------------------------------------------------ */
	/* Render Map ------------------------------------ */
	/* ------------------------------------------------------------------------ */
	$(document).ready(function(){
		$('.acf-map').each(function(){
			var map = initMap( $(this) );
		});
	});

})(jQuery);
</script>



<?php endwhile; endif; ?>
<?php get_footer(); ?>