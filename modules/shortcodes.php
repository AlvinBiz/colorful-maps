<?php

function display_map($atts) {

    return '<div id="colorful-map-container"></div>';

}
add_shortcode('colorful_map', 'display_map');
