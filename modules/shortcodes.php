<?php

function display_map($atts) {

	// $userStyles = new userStyles($userVals);
	// return $userStyles->getUserStyles;
    return '<div id="colorful-map-container"></div>';

}
add_shortcode('colorful_map', 'display_map');
