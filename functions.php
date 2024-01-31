<?php

add_action('wp_head', 'map_script');

function map_script() {

$userOpt = new UserOptions();
$userVals = $userOpt->getValues();

$userStyles = new userStyles($userVals);

?>

<script type="text/javascript">
	var map;
	var geocoder;
	var lat = '';
	var lang = '';
	var styles = <?php echo $userStyles->getUserStyles(); ?>;

	function initMap() {
		var mapLayer = document.getElementById("colorful-map-container");
		var centerCoordinates = new google.maps.LatLng(42.877742, -97.380979);

		var defaultOptions = { center: centerCoordinates, zoom: 10 }

		map = new google.maps.Map(mapLayer, defaultOptions);
		geocoder = new google.maps.Geocoder();
		map.setOptions({styles: styles});
		
		<?php
		if (! empty($userVals['address'])) {
		        ?>  
		         	geocoder.geocode( { 'address': <?php echo "'" . $userVals['address'] . "'"; ?> }, function(LocationResult, status) {
						if (status == google.maps.GeocoderStatus.OK) {
							var latitude = LocationResult[0].geometry.location.lat();
							var longitude = LocationResult[0].geometry.location.lng();
							map.setCenter({lat: latitude, lng: longitude});
						} 
		        	    		
		        	    	<?php if (NULL == $userVals['marker-styles']['image']) { ?>
							const pinCustomized = new PinElement({
							    scale: <?php echo "'" . $userVals['marker-styles']['scale'] . "'"; ?>,
							    background: <?php echo "'" . $userVals['marker-styles']['bg-color'] . "'"; ?>,
							    borderColor: <?php echo "'" . $userVals['marker-styles']['border-color'] . "'"; ?>,
							    glyphColor: <?php echo "'" . $userVals['marker-styles']['glyph-color'] . "'"; ?>,
							});
							<?php }; ?>
	        	    		new google.maps.Marker({
		            	        position: new google.maps.LatLng(latitude, longitude),
		            	        map: map,
		            	        title: <?php echo "'" . $userVals['address'] . "'"; ?>,
		            	        icon: <?php echo "'" . wp_get_attachment_image_url($userVals['marker-styles']['image']) . "'"; ?>,
		            	        <?php if (NULL == $userVals['marker-styles']['image']) { ?>
		            	        content: pinCustomized.element,
		            	        <?php }; ?>
		            	    });

					});

			    <?php
		}
		?>	

	}
</script>

	<?php
};
