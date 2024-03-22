<?php

function display_map($atts) {

	$arrayClass = new GetArray();
    $conditionalOptionsArray = $arrayClass->getArray();

    return '<div id="colorful-map-container"></div>';

}
add_shortcode('colorful_map', 'display_map');
