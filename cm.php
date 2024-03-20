<?php
/**
 * Plugin Name: Colorful Maps
 * Description: A google maps plugin with easy design customization features
 * Version: 1.1.1
 * Author: Rafael Green
 * Author URI: https://github.com/AlvinBiz
 * Text Domain: colorful-maps
 * Domain Path: /languages
 **/

/**
 * Base config constants and functions
 */

require_once(dirname(__FILE__). DIRECTORY_SEPARATOR. 'classes/user-options.php');
require_once(dirname(__FILE__). DIRECTORY_SEPARATOR. 'classes/user-styles.php');
require_once(dirname(__FILE__). DIRECTORY_SEPARATOR. 'functions.php');
require_once(dirname(__FILE__). DIRECTORY_SEPARATOR. 'admin.php');
require_once(dirname(__FILE__). DIRECTORY_SEPARATOR. 'modules/shortcodes.php');


/**
* Variables
*/

function getAPI () {

  $userOpt = new UserOptions();

  $apiUrl;

  if ( null !== ( $userOpt->getGeneralValues()['api'] ) ) {
      $apiUrl = 'https://maps.googleapis.com/maps/api/js?&key=' . $userOpt->getGeneralValues()['api'] . '&loading=async&libraries=places';
  } else {
      $apiUrl = 'https://maps.googleapis.com/maps/api/js?&key=0&loading=asynclibraries=places';
  };
    
  return $apiUrl;

}

/**
* Scripts and Styles
*/

function colorful_map_scripts() { 

      $apiFrontEnd = getAPI() . "&callback=initMap";

      wp_register_script('colorfulmap', $apiFrontEnd, '', '', true);
 
  
      wp_register_script('cmpolyfill', 'https://polyfill.io/v3/polyfill.min.js?features=default', '', '', true);
 
      wp_register_script( 'functionsscript',  plugin_dir_url( __FILE__ ) . 'js/functions.js', array( 'wp-color-picker' ) );
      
      wp_register_style( 'cmstyle',  plugin_dir_url( __FILE__ ) . 'css/style.css' );
    
        
      wp_enqueue_script('colorfulmap');
      wp_enqueue_script('cmpolyfill');
      wp_enqueue_script('functionsscript');
      wp_enqueue_style('cmstyle');

  
}

add_action('wp_enqueue_scripts', 'colorful_map_scripts');


/**
* Admin scripts and Styles
*/

function cm_admin_scripts() {

      wp_enqueue_script('colorful-admin-map', getAPI(), '', '', true);
      wp_enqueue_style("cm-admin-css", plugin_dir_url( __FILE__ ) . "css/admin.css", array(), filemtime(plugin_dir_path( __FILE__ ) . 'css/admin.css') );
      wp_enqueue_style( 'wp-color-picker' );
      wp_enqueue_script( 'wp-color-picker');
      wp_enqueue_script( 'adminscript',  plugin_dir_url( __FILE__ ) . 'js/admin.js', array( 'wp-color-picker', 'jquery' ), filemtime(plugin_dir_path( __FILE__ ) . 'js/admin.js') );

}

add_action('admin_enqueue_scripts', 'cm_admin_scripts');


add_action( 'admin_footer', 'media_selector_print_scripts' );

function media_selector_print_scripts() {

  $my_saved_attachment_post_id = get_option( 'media_selector_attachment_id', 0 );

  ?><script type='text/javascript'>

    jQuery( document ).ready( function( $ ) {

      // Uploading files
      var file_frame;
      var wp_media_post_id = wp.media.model.settings.post.id; // Store the old id
      var set_to_post_id = <?php echo $my_saved_attachment_post_id; ?>; // Set this

      jQuery('#upload_image_button').on('click', function( event ){

        event.preventDefault();

        // If the media frame already exists, reopen it.
        if ( file_frame ) {
          // Set the post ID to what we want
          file_frame.uploader.uploader.param( 'post_id', set_to_post_id );
          // Open frame
          file_frame.open();
          return;
        } else {
          // Set the wp.media post id so the uploader grabs the ID we want when initialised
          wp.media.model.settings.post.id = set_to_post_id;
        }

        // Create the media frame.
        file_frame = wp.media.frames.file_frame = wp.media({
          title: 'Select a image to upload',
          button: {
            text: 'Use this image',
          },
          multiple: false // Set to true to allow multiple files to be selected
        });
        // When an image is selected, run a callback.
        file_frame.on( 'select', function() {
          // We set multiple to false so only get one image from the uploader
          attachment = file_frame.state().get('selection').first().toJSON();

          // Do something with attachment.id and/or attachment.url here
          $( '#marker-preview' ).attr( 'src', attachment.url ).css( 'width', 'auto' );
          $( '#marker-image' ).val( attachment.id );
          // Restore the main post ID
          wp.media.model.settings.post.id = wp_media_post_id;
        });

          // Finally, open the modal
          file_frame.open();
      });

      // Restore the main ID when the add media button is pressed
      jQuery( 'a.add_media' ).on( 'click', function() {
        wp.media.model.settings.post.id = wp_media_post_id;
      });
    });

  </script><?php

}
