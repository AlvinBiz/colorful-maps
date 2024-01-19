<?php
// create custom plugin settings menu
add_action('admin_menu', 'colorful_maps_create_menu');


function colorful_maps_create_menu() {

	//create new top-level menu
	add_menu_page('Colorful Maps Settings', 'CM Settings', 'administrator', __FILE__, 'colorful_maps_settings_page' , 'dashicons-location' );

	//call register settings function
	add_action( 'admin_init', 'register_colorful_maps_settings' );
}


function register_colorful_maps_settings() {
	//register our settings
	register_setting( 'colorful-maps-settings-group', 'api-key' );
	register_setting( 'colorful-maps-settings-group', 'address' );
    register_setting( 'colorful-maps-settings-group', 'marker-image' );
	register_setting( 'colorful-maps-settings-group', 'geometry-color');
    register_setting( 'colorful-maps-settings-group', 'geometry-stroke-color');
	register_setting( 'colorful-maps-settings-group', 'labels-icon-color');
	register_setting( 'colorful-maps-settings-group', 'primary-text-color');
    register_setting( 'colorful-maps-settings-group', 'primary-text-stroke-color');
	register_setting( 'colorful-maps-settings-group', 'poi-color');
	register_setting( 'colorful-maps-settings-group', 'road-color');
	register_setting( 'colorful-maps-settings-group', 'highway-color');
	register_setting( 'colorful-maps-settings-group', 'transit-line-color');
	register_setting( 'colorful-maps-settings-group', 'transit-station-color');
	register_setting( 'colorful-maps-settings-group', 'water-color');
}

function colorful_maps_settings_page() {
?>
<div class="wrap">
<h1>Colorful Maps Plugin</h1>

<form class="cm-admin-opt-form" method="post" action="options.php">

    <?php settings_fields( 'colorful-maps-settings-group' ); ?>
    <?php do_settings_sections( 'colorful-maps-settings-group' ); ?>
    <?php wp_enqueue_media(); ?>

    <table class="form-table">
    	<tr valign="top">
        <th scope="row">API Key</th>
        <td><input type="text" name="api-key" value="<?php echo esc_attr( get_option('api-key') ); ?>" /></td>
        </tr>

        <tr valign="top">
        <th scope="row">Address</th>
        <td><input id="cm-address-input" type="text" name="address" value="<?php echo esc_attr( get_option('address') ); ?>" /></td>
        </tr>
        
        <tr valign="top">
        <th scope="row">Custom Marker Image</th>
        <td>
        <div class='image-preview-wrapper'>
        <img id="marker-preview" class='image-preview' src="<?php echo wp_get_attachment_image_url(esc_attr(get_option('marker-image'))); ?>" width='100' height='100' style='max-height: 100px; width: 100px;'>
        </div>
        <input id="upload_image_button" type="button" class="button" value=<?php '"' . _e( 'Upload image' ) . '"'; ?> />
        <input type='hidden' name='marker-image' id='marker-image' value=''>
        <p>Image should be no larger than 80px by 80px.</p>  
        </td>
        </tr>

        <tr valign="top">
        <th scope="row">Geometry Color</th>
        <td><input type="text" name="geometry-color" value="<?php echo esc_attr( get_option('geometry-color') ); ?>" class="color-field" data-default-color="#effeff" /></td>
        </tr>
        
        <tr valign="top">
        <th scope="row">Geometry Stroke Color</th>
        <td><input type="text" name="geometry-stroke-color" value="<?php echo esc_attr( get_option('geometry-stroke-color') ); ?>" class="color-field" data-default-color="#effeff" /></td>
        </tr>
        
        <tr valign="top">
        <th scope="row">Label Icon Color</th>
        <td><input type="text" name="labels-icon-color" value="<?php echo esc_attr( get_option('labels-icon-color') ); ?>" class="color-field" data-default-color="#effeff" /></td>
        </tr>

        <tr valign="top">
        <th scope="row">Primary Text Color</th>
        <td><input type="text" name="primary-text-color" value="<?php echo esc_attr( get_option('primary-text-color') ); ?>" class="color-field" data-default-color="#effeff" /></td>
        </tr>

        <tr valign="top">
        <th scope="row">Primary Text Stroke Color</th>
        <td><input type="text" name="primary-text-stroke-color" value="<?php echo esc_attr( get_option('primary-text-stroke-color') ); ?>" class="color-field" data-default-color="#effeff" /></td>
        </tr>

        <tr valign="top">
        <th scope="row">Poi Color</th>
        <td><input type="text" name="poi-color" value="<?php echo esc_attr( get_option('poi-color') ); ?>" class="color-field" data-default-color="#effeff" /></td>
        </tr>

        <tr valign="top">
        <th scope="row">Road Color</th>
        <td><input type="text" name="road-color" value="<?php echo esc_attr( get_option('road-color') ); ?>" class="color-field" data-default-color="#effeff" /></td>
        </tr>

        <tr valign="top">
        <th scope="row">Highway Color</th>
        <td><input type="text" name="highway-color" value="<?php echo esc_attr( get_option('highway-color') ); ?>" class="color-field" data-default-color="#effeff" /></td>
        </tr>

        <tr valign="top">
        <th scope="row">Transit Line Color</th>
        <td><input type="text" name="transit-line-color" value="<?php echo esc_attr( get_option('transit-line-color') ); ?>" class="color-field" data-default-color="#effeff" /></td>
        </tr>

        <tr valign="top">
        <th scope="row">Transit Station Color</th>
        <td><input type="text" name="transit-station-color" value="<?php echo esc_attr( get_option('transit-station-color') ); ?>" class="color-field" data-default-color="#effeff" /></td>
        </tr>

        <tr valign="top">
        <th scope="row">Water Color</th>
        <td><input type="text" name="water-color" value="<?php echo esc_attr( get_option('water-color') ); ?>" class="color-field" data-default-color="#effeff" /></td>
        </tr>
    </table>
    
    <?php submit_button(); ?>

</form>
</div>
<?php };

