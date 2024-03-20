<?php

require_once(dirname(__FILE__). DIRECTORY_SEPARATOR. 'classes/conditional-options-arrays.php');



// create custom plugin settings menu
add_action('admin_menu', 'colorful_maps_create_menu');

function colorful_maps_create_menu() {

    //create new top-level menu
    add_menu_page('Colorful Maps Settings', 'CM Settings', 'administrator', __FILE__, 'colorful_maps_settings_page' , 'dashicons-location' );

    //call register settings function
    add_action( 'admin_init', 'register_colorful_maps_settings' );

}

function sanitize_array( $array ) {
    return map_deep( $array, 'sanitize_text_field' );
}


function register_colorful_maps_settings() {

    $markerArgs = array(
            'type' => 'array', 
            'sanitize_callback' => 'sanitize_array',
            'default' => NULL,
            );
    $administrativeArgs = array(
            'type' => 'array', 
            'sanitize_callback' => 'sanitize_array',
            'default' => NULL,
            );
    $landscapeArgs = array(
            'type' => 'array', 
            'sanitize_callback' => 'sanitize_array',
            'default' => NULL,
            );
    $poiArgs = array(
            'type' => 'array', 
            'sanitize_callback' => 'sanitize_array',
            'default' => NULL,
            );
    $roadArgs = array(
            'type' => 'array', 
            'sanitize_callback' => 'sanitize_array',
            'default' => NULL,
            );
    $transitArgs = array(
            'type' => 'array', 
            'sanitize_callback' => 'sanitize_array',
            'default' => NULL,
            );
    $waterArgs = array(
            'type' => 'array', 
            'sanitize_callback' => 'sanitize_array',
            'default' => NULL,
            );

    //register our settings
    register_setting( 'colorful-maps-settings-group', 'api-key' );
    register_setting( 'colorful-maps-settings-group', 'address' );
    register_setting( 'colorful-maps-settings-group', 'marker-styles', $markerArgs);
    register_setting( 'colorful-maps-settings-group', 'administrative-styles', $administrativeArgs);
    register_setting( 'colorful-maps-settings-group', 'landscape-styles', $landscapeArgs);
    register_setting( 'colorful-maps-settings-group', 'poi-styles', $poiArgs);
    register_setting( 'colorful-maps-settings-group', 'road-styles', $roadArgs);
    register_setting( 'colorful-maps-settings-group', 'transit-styles', $transitArgs);
    register_setting( 'colorful-maps-settings-group', 'water-styles', $waterArgs);

}


function colorPickerField($option, $name, $id, $caption) {
    $field = '<td>';
    if ($caption !== NULL) : 
    $field .= $caption;
    endif;
    $field .= '<input type="text" name="' . $name . '" value="' . esc_attr( $option ) . '" class="color-field" /></td>';
    return $field;
}

function rangeField($option, $name, $min, $max, $step, $id, $caption) {
    $field = '<td>';
    if ($caption !== NULL) : 
    $field .= $caption;
    endif;
    $field .= '<input id="' . $id . '" name="' . $name . '" type="range" min="' . $min . '" max="' . $max . '" value="' . esc_attr( $option ) . '" step="' . $step . '" /><span class="range-result"></span></td>';
    return $field;
}

function elementTypeSelectField($option, $name, $id, $caption) {
    $select = '<td>';
    if ($caption !== NULL) : 
    $select .= $caption;
    endif;
    if ($option == NULL) : 
    $option = 'all';
    endif;
    $select .= '<select name="' . $id . '" onchange="document.getElementById(';
    $select .= "'" . $id . "'";
    $select .= ').value=this.options[this.options.selectedIndex].value;">';
    $selected = (isset( $option ) && $option === 'all') ? 'selected' : '' ;
    $select .= '<option value="all"' . $selected . '>All</option>';
    $selected = (isset( $option ) && $option === 'geometry') ? 'selected' : '' ;
    $select .= '<option value="geometry"' . $selected . '>Geometry</option>';
    $selected = (isset( $option ) && $option === 'labels') ? 'selected' : '' ;
    $select .= '<option value="labels"' . $selected . '>Labels</option>';
    $select .= '</select>';
    $select .= '<input type="hidden" id="' . $id . '" name="' . $name . '" value="' . $option . '"></td>';
    return $select;
}

function visibilitySelectField($option, $name, $id, $caption) {
    $select = '<td>';
    if ($caption !== NULL) : 
    $select .= $caption;
    endif;
    if ($option == NULL) : 
    $option = 'on';
    endif;
    $select .= '<select name="' . $id . '" onchange="document.getElementById(';
    $select .= "'" . $id . "'";
    $select .= ').value=this.options[this.options.selectedIndex].value;">'; 
    $selected = (isset( $option ) && $option === 'on') ? 'selected' : '' ;
    $select .= '<option value="on"' . $selected . '>On</option>';
    $selected = (isset( $option ) && $option === 'off') ? 'selected' : '' ;
    $select .= '<option value="off"' . $selected . '>Off</option>';
    $selected = (isset( $option ) && $option === 'simplified') ? 'selected' : '' ;
    $select .= '<option value="simplified"' . $selected . '>Simplified</option>';
    $select .= '</select>';
    $select .= '<input type="hidden" id="' . $id . '" name="' . $name . '" value="' . $option . '"></td>';
    return $select;
}

function featureTypeRows($option, $name, $id, $ft) {

    (isset($option['elementType'])) ? $elementType = $option['elementType'] : $elementType = NULL;
    (isset($option['visibility'])) ? $visibility = $option['visibility'] : $visibility = NULL;
    (isset($option['color'])) ? $color = $option['color'] : $color = NULL;
    (isset($option['hue'])) ? $hue = $option['hue'] : $hue = NULL;
    (isset($option['lightness'])) ? $lightness = $option['lightness'] : $lightness = NULL;
    (isset($option['saturation'])) ? $saturation = $option['saturation'] : $saturation = NULL;
    // (isset($option['gamma'])) ? $gamma = $option['gamma'] : $gamma = NULL;
    (isset($option['weight'])) ? $weight = $option['weight'] : $weight = NULL;

    $rows = '<tr valign="top">';
    $rows .= elementTypeSelectField($elementType, $name . '[elementType]', $id . '-elementtype', 'ElementType');
    $rows .= visibilitySelectField($visibility, $name . '[visibility]', $id . '-visibility', 'Visibility');
    $rows .= '</tr>';
    $rows .= '<tr valign="bottom">';
    $rows .= colorPickerField($color, $name . '[color]', NULL, 'Color');
    $rows .= colorPickerField($hue, $name . '[hue]', NULL, 'Hue');
    $rows .= rangeField($lightness, $name . '[lightness]', -100, 100, 10, $id . '-lightness', 'Lightness');
    $rows .= rangeField($saturation, $name . '[saturation]', -100, 100, 10, $id . '-saturation', 'Saturation');
    // $rows .= rangeField($gamma, $name . '[gamma]', 0.01, 10.0, 0.01, $id . '-gamma', 'Gamma');
    $rows .= rangeField($weight, $name . '[weight]', 1, 5, 1, $id . '-weight', 'Weight');
    $rows .= '<input type="hidden" id="' . $id . '-featuretype" name="' . $name . '[featureType]' . '" value="' . $ft . '"></td>';
    $rows .= '</tr>';
    return $rows;
}

function colorful_maps_settings_page() {
?>
<div class="wrap">
<h1>Colorful Maps Plugin</h1>
    <div class="tab">
      <button class="tablinks" id="default-tab" onclick="openTab(event, 'general-settings')">General Settings</button>
      <button class="tablinks" onclick="openTab(event, 'marker-styles')">Marker Options</button>
      <button class="tablinks" onclick="openTab(event, 'map-styles')">Map Options</button>
    </div>

    <form class="cm-admin-opt-form" method="post" action="options.php">

    <?php settings_fields( 'colorful-maps-settings-group' ); ?>
    <?php do_settings_sections( 'colorful-maps-settings-group' ); ?>
    <?php wp_enqueue_media(); ?>

    <div id="general-settings" class="tabcontent">
        <h3>Map Settings</h3> 
        <table class="form-table">
            <tbody>
            <tr valign="top">
            <th scope="row">API Key</th>
            <td><input type="text" name="api-key" value="<?php echo esc_attr( get_option('api-key') ); ?>" /></td>
            </tr>
            <tr valign="top">
            <th scope="row">Address</th>
            <td><input id="cm-address-input" type="text" name="address" value="<?php echo esc_attr( get_option('address') ); ?>" /></td>
            </tr>
            </tbody>
        </table>
    </div>
        
    <div id="marker-styles" class="tabcontent">
        <h3>Marker Options</h3> 
        <table class="form-table">
            <tbody>
            <tr valign="top">
            <th class="marker-header" scope="row">Custom Marker Image</th>
            <td>
            <div class='image-preview-wrapper'>
            <span id="image-clear">x</span>
            <img id="marker-preview" class='image-preview' src="<?php echo wp_get_attachment_image_url(esc_attr(get_option('marker-styles')['image'])); ?>" width='100' height='100' style='max-height: 100px; width: 100px;'>
            </div>
            <input id="upload_image_button" type="button" class="button" value=<?php '"' . _e( 'Upload image' ) . '"'; ?> />
            <input type='hidden' name='marker-styles[image]' id='marker-image' value="<?php if (is_array(get_option('marker-styles')) && isset(get_option('marker-styles')['image'])) echo esc_attr(get_option('marker-styles')['image']); ?>">
            <p>Image should be no larger than 80px by 80px.</p> 
            <p>Other marker styles will not be applies when a marker image is set.</p> 
            </td>
            </tr>
            <tr valign="top">
            <th scope="row">Marker Scale</th>
            <?php echo rangeField(get_option('marker-styles')['scale'], 'marker-styles[scale]', 1, 3, 0.25, 'marker-range', NULL); ?>
            </tr>
            <tr valign="top">
            <th scope="row">Marker Background Color</th>
            <?php echo colorPickerField(get_option('marker-styles')['bg-color'], 'marker-styles[bg-color]', NULL, NULL); ?>
            </tr>
            <tr valign="top">
            <th scope="row">Marker Border Color</th>
            <?php echo colorPickerField(get_option('marker-styles')['border-color'], 'marker-styles[border-color]', NULL, NULL); ?>
            </tr>
            <tr valign="top">
            <th scope="row">Marker Glyph Color</th>
            <?php echo colorPickerField(get_option('marker-styles')['glyph-color'], 'marker-styles[glyph-color]', NULL, NULL); ?>
            </tr>
            </tbody>
        </table>
    </div>
    <div id="map-styles" class="tabcontent">
        <h3>Map Options</h3> 
        <table class="form-table">
            <tbody>
            <?php 

                $arrayClass = new GetArray();

                $conditionalOptionsArray = $arrayClass->getArray();
                
                foreach($conditionalOptionsArray as $optionKey => $option) {
                    echo '<th class="section-table-header" scope="row">' . $optionKey . '</th>';
                    echo featureTypeRows($option['getOption'], $option['name'], $option['id'], $option['featureType']);
                }

            ?>
            </tbody>

            
        </table>
    </div>
    <?php submit_button(); ?>
    </form>
</div>
<?php };
