<?php

define('CMA_VERSION', '0.1.41');

function foundationpress_scripts() {

		// Enqueue the main Stylesheet.
		wp_enqueue_style( 'main-stylesheet',  get_stylesheet_directory_uri() . '/dist/assets/css/' . foundationpress_asset_path('app.css'), array(), CMA_VERSION, 'all' );

		// Deregister the jquery version bundled with WordPress.
		wp_deregister_script( 'jquery' );

		// CDN hosted jQuery placed in the header, as some plugins require that jQuery is loaded in the header.
		wp_enqueue_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js', array(), '3.2.1', false );

		wp_enqueue_script( 'fontawesome', 'https://use.fontawesome.com/e316494244.js', array(), '4.7.0', true );

		wp_enqueue_style( 'cabin', 'https://fonts.googleapis.com/css?family=Open+Sans:400,700', array(), '', 'screen' );

		// Enqueue Founation scripts
		wp_enqueue_script( 'foundation', get_bloginfo('template_url') . '/dist/assets/js/' . foundationpress_asset_path('app.js'), array( 'jquery' ), '2.10.4', true );

		// Enqueue FontAwesome from CDN. Uncomment the line below if you don't need FontAwesome.
		//wp_enqueue_script( 'fontawesome', 'https://use.fontawesome.com/5016a31c8c.js', array(), '4.7.0', true );


		// Add the comment-reply library on pages where it is necessary
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

	}

add_action( 'wp_enqueue_scripts', 'foundationpress_scripts' );


function browsersync_footer() {
	if(WP_ENV == 'development'):?>
	
	<script id="__bs_script__">//<![CDATA[
    document.write("<script async src='http://HOST:3000/browser-sync/browser-sync-client.js?v=2.18.13'><\/script>".replace("HOST", location.hostname));
//]]></script>
	
	<?php
		endif;
}

add_action('wp_footer', 'browsersync_footer');

function add_theme_caps() {
    // gets the author role
    $role = get_role( 'editor' );

    // This only works, because it accesses the class instance.
    // would allow the author to edit theme options
    $role->add_cap( 'edit_theme_options' ); 
}
add_action( 'admin_init', 'add_theme_caps');


include( STYLESHEETPATH . '/extras/class-footer-info-widget.php');