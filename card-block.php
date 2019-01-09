<?php
/**
 * Plugin Name: Gutenvko Block
 * Plugin URI: https://github.com/anddigital-jh/Gutenvko
 * Description: Mr.Zhivko's Gutenburg Block
 * Author: Jabari Holder
 * Author URI: http://www.jabari-holder.com
 * Version: 1.0.0
 */

function my_register_gutenberg_card_block() {

   // Register our block script with WordPress
   wp_enqueue_script(
     'gutenberg-card-block',
     plugins_url('/blocks/dist/blocks.build.js', __FILE__),
     array('wp-blocks', 'wp-element', 'wp-editor')
   );
 
   // Register our block's base CSS  
   wp_register_style(
     'gutenberg-card-block-style',
     plugins_url( '/blocks/dist/blocks.style.build.css', __FILE__ ),
     array( 'wp-blocks' )
   );
   
   // Register our block's editor-specific CSS
   wp_register_style(
     'gutenberg-card-block-edit-style',
     plugins_url('/blocks/dist/blocks.editor.build.css', __FILE__),
     array( 'wp-edit-blocks' )
   );  
 }
 
function register_card_block() {
	if ( function_exists( 'register_block_type' ) ) {
    // Enqueue the script in the editor
    register_block_type('card-block/main', array(
      'editor_script' => 'gutenberg-card-block',
      'editor_style' => 'gutenberg-card-block-edit-style',
      'style' => 'gutenberg-card-block-edit-style'
    ));
	}
}

add_action('enqueue_block_assets', 'my_register_gutenberg_card_block');
add_action('plugins_loaded', 'register_card_block');
