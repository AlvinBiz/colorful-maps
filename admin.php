<?php
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
            'default' => array('featureType' => 'administrative'),
            );
    $landscapeArgs = array(
            'type' => 'array', 
            'sanitize_callback' => 'sanitize_array',
            'default' => array('featureType' => 'landscape'),
            );
    $poiArgs = array(
            'type' => 'array', 
            'sanitize_callback' => 'sanitize_array',
            'default' => array('featureType' => 'poi'),
            );
    $roadArgs = array(
            'type' => 'array', 
            'sanitize_callback' => 'sanitize_array',
            'default' => array('featureType' => 'road'),
            );
    $transitArgs = array(
            'type' => 'array', 
            'sanitize_callback' => 'sanitize_array',
            'default' => array('featureType' => 'transit'),
            );
    $waterArgs = array(
            'type' => 'array', 
            'sanitize_callback' => 'sanitize_array',
            'default' => array('featureType' => 'water'),
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
    $select .= '<select name="' . $id . '" onchange="document.getElementById(' . $id . ').value=this.options[this.options.selectedIndex].value;">';
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
    $select .= '<select name="' . $id . '" onchange="document.getElementById(' . $id . ').value=this.options[this.options.selectedIndex].value;">';
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

function featureTypeRows($option, $name, $id) {
    $rows = '<tr valign="top">';
    $rows .= elementTypeSelectField($option['elementType'], $name . '[elementType]', $id . '-elementtype', 'Label');
    $rows .= visibilitySelectField($option['visibility'], $name . '[visibility]', $id . '-visibility', 'Label');
    $rows .= '</tr>';
    $rows .= '<tr valign="bottom">';
    $rows .= colorPickerField($option['color'], $name . '[color]', NULL, 'Color');
    $rows .= colorPickerField($option['hue'], $name . '[hue]', NULL, 'Hue');
    $rows .= rangeField($option['lightness'], $name . '[lightness]', -100, 100, 10, $id . '-lightness', 'Lightness');
    $rows .= rangeField($option['saturation'], $name . '[saturation]', -100, 100, 10, $id . '-saturation', 'Saturation');
    $rows .= rangeField($option['gamma'], $name . '[gamma]', 0.01, 10.0, 0.01, $id . '-gamma', 'Gamma');
    $rows .= rangeField($option['weight'], $name . '[weight]', 1, 5, 1, $id . '-weight', 'Weight');
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
            <input type='hidden' name='marker-styles[image]' id='marker-image' value="<?php echo esc_attr(get_option('marker-styles')['image']); ?>">
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
            <th class="section-table-header" scope="row">Administrative Global</th>
            <?php echo featureTypeRows(get_option('administrative-styles'), 'administrative-styles', 'administrative-styles'); ?>

            <th class="section-table-header" scope="row">Administrative Country</th>
            <?php echo featureTypeRows(get_option('administrative-styles')['subFeatureTypes']['country'], 'administrative-styles[subFeatureTypes][country]', 'administrative-styles-country'); ?>
            
            <th class="section-table-header" scope="row">Administrative Land Parcel</th>
            <?php echo featureTypeRows(get_option('administrative-styles')['subFeatureTypes']['land_parcel'], 'administrative-styles[subFeatureTypes][land-parcel]', 'administrative-styles-land-parcel'); ?>

            <th class="section-table-header" scope="row">Administrative Locality</th>
            <?php echo featureTypeRows(get_option('administrative-styles')['subFeatureTypes']['locality'], 'administrative-styles[subFeatureTypes][locality]', 'administrative-styles-locality'); ?>

            <th class="section-table-header" scope="row">Administrative Neighborhood</th>
            <?php echo featureTypeRows(get_option('administrative-styles')['subFeatureTypes']['neighborhood'], 'administrative-styles[subFeatureTypes][neighborhood]', 'administrative-styles-neighborhood'); ?>

            <th class="section-table-header" scope="row">Administrative Province</th>
            <?php echo featureTypeRows(get_option('administrative-styles')['subFeatureTypes']['province'], 'administrative-styles[subFeatureTypes][province]', 'administrative-styles-province'); ?>
            </tbody>

            <tbody>
            <th class="section-table-header" scope="row">Landscape Global</th>
            <?php echo featureTypeRows(get_option('landscape-styles'), 'landscape-styles', 'landscape-styles'); ?>

            <th class="section-table-header" scope="row">Landscape Man Made</th>
            <?php echo featureTypeRows(get_option('landscape-styles')['subFeatureTypes']['man_made'], 'landscape-styles[subFeatureTypes][man_made]', 'landscape-styles-man_made'); ?>
            
            <th class="section-table-header" scope="row">Landscape Natural</th>
            <?php echo featureTypeRows(get_option('landscape-styles')['subFeatureTypes']['natural'], 'landscape-styles[subFeatureTypes][natural]', 'landscape-styles-natural'); ?>

            <th class="section-table-header" scope="row">Landscape Natural Landcover</th>
            <?php echo featureTypeRows(get_option('landscape-styles')['subFeatureTypes']['natural']['subFeatureTypes']['landcover'], 'landscape-styles[subFeatureTypes][natural][subFeatureTypes][landcover]', 'landscape-styles-natural-landcover'); ?>

            <th class="section-table-header" scope="row">Landscape Natural Terrain</th>
            <?php echo featureTypeRows(get_option('landscape-styles')['subFeatureTypes']['natural']['subFeatureTypes']['terrain'], 'landscape-styles[subFeatureTypes][natural][subFeatureTypes][terrain]', 'landscape-styles-natural-terrain'); ?>
            </tbody>

            <tbody>
            <th class="section-table-header" scope="row">Poi Global</th>
            <?php echo featureTypeRows(get_option('poi-styles'), 'poi-styles', 'poi-styles'); ?>

            <th class="section-table-header" scope="row">Poi Attraction</th>
            <?php echo featureTypeRows(get_option('poi-styles')['subFeatureTypes']['attraction'], 'poi-styles[subFeatureTypes][attraction]', 'poi-styles-attraction'); ?>
            
            <th class="section-table-header" scope="row">Poi Business</th>
            <?php echo featureTypeRows(get_option('poi-styles')['subFeatureTypes']['business'], 'poi-styles[subFeatureTypes][business]', 'poi-styles-business'); ?>

            <th class="section-table-header" scope="row">Poi Government</th>
            <?php echo featureTypeRows(get_option('poi-styles')['subFeatureTypes']['government'], 'poi-styles[subFeatureTypes][government]', 'poi-styles-government'); ?>

            <th class="section-table-header" scope="row">Poi Medical</th>
            <?php echo featureTypeRows(get_option('poi-styles')['subFeatureTypes']['medical'], 'poi-styles[subFeatureTypes][medical]', 'poi-styles-medical'); ?>

            <th class="section-table-header" scope="row">Poi Park</th>
            <?php echo featureTypeRows(get_option('poi-styles')['subFeatureTypes']['park'], 'poi-styles[subFeatureTypes][park]', 'poi-styles-park'); ?>

            <th class="section-table-header" scope="row">Poi Place Of Worship</th>
            <?php echo featureTypeRows(get_option('poi-styles')['subFeatureTypes']['place_of_worship'], 'poi-styles[subFeatureTypes][place_of_worship]', 'poi-styles-place_of_worship'); ?>

            <th class="section-table-header" scope="row">Poi School</th>
            <?php echo featureTypeRows(get_option('poi-styles')['subFeatureTypes']['school'], 'poi-styles[subFeatureTypes][school]', 'poi-styles-school'); ?>

            <th class="section-table-header" scope="row">Poi Sports Complex</th>
            <?php echo featureTypeRows(get_option('poi-styles')['subFeatureTypes']['sports_complex'], 'poi-styles[subFeatureTypes][sports_complex]', 'poi-styles-sports_complex'); ?>
            </tbody>

            <tbody>
            <th class="section-table-header" scope="row">Road Global</th>
            <?php echo featureTypeRows(get_option('road-styles'), 'road-styles', 'road-styles'); ?>

            <th class="section-table-header" scope="row">Road Arterial</th>
            <?php echo featureTypeRows(get_option('road-styles')['subFeatureTypes']['arterial'], 'road-styles[subFeatureTypes][arterial]', 'road-styles-arterial'); ?>
            
            <th class="section-table-header" scope="row">Road Highway</th>
            <?php echo featureTypeRows(get_option('road-styles')['subFeatureTypes']['highway'], 'road-styles[subFeatureTypes][highway]', 'road-styles-highway'); ?>

            <th class="section-table-header" scope="row">Road Highway Controlled Access</th>
            <?php echo featureTypeRows(get_option('road-styles')['subFeatureTypes']['highway']['subFeatureTypes']['controlled_access'], 'road-styles[subFeatureTypes][highway][subFeatureTypes][controlled_access]', 'road-styles-highway-controlled_access'); ?>

            <th class="section-table-header" scope="row">Road Local</th>
            <?php echo featureTypeRows(get_option('road-styles')['subFeatureTypes']['local'], 'road-styles[subFeatureTypes][local]', 'road-styles-local'); ?>
            </tbody>

            <tbody>
            <th class="section-table-header" scope="row">Transit Global</th>
            <?php echo featureTypeRows(get_option('transit-styles'), 'transit-styles', 'transit-styles'); ?>

            <th class="section-table-header" scope="row">Transit Line</th>
            <?php echo featureTypeRows(get_option('transit-styles')['subFeatureTypes']['line'], 'transit-styles[subFeatureTypes][line]', 'transit-styles-line'); ?>
            
            <th class="section-table-header" scope="row">Transit Station</th>
            <?php echo featureTypeRows(get_option('transit-styles')['subFeatureTypes']['station'], 'transit-styles[subFeatureTypes][station]', 'transit-styles-station'); ?>

            <th class="section-table-header" scope="row">Transit Station Airport</th>
            <?php echo featureTypeRows(get_option('transit-styles')['subFeatureTypes']['station']['subFeatureTypes']['airport'], 'transit-styles[subFeatureTypes][station][subFeatureTypes][airport]', 'transit-styles-station-airport'); ?>

            <th class="section-table-header" scope="row">Transit Station Bus</th>
            <?php echo featureTypeRows(get_option('transit-styles')['subFeatureTypes']['station']['subFeatureTypes']['bus'], 'transit-styles[subFeatureTypes][station][subFeatureTypes][bus]', 'transit-styles-station-bus'); ?>

            <th class="section-table-header" scope="row">Transit Station Rail</th>
            <?php echo featureTypeRows(get_option('transit-styles')['subFeatureTypes']['station']['subFeatureTypes']['rail'], 'transit-styles[subFeatureTypes][station][subFeatureTypes][rail]', 'transit-styles-station-rail'); ?>
            </tbody>

            <tbody>
            <th class="section-table-header" scope="row">Water</th>
            <?php echo featureTypeRows(get_option('water-styles'), 'water-styles', 'water-styles'); ?>
            </tbody>
        </table>
    </div>
    <?php submit_button(); ?>
    </form>
</div>
<?php };
