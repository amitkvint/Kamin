<?php
if ( ! is_admin() ) { add_action( 'wp_enqueue_scripts', 'woothemes_add_javascript' ); }

if ( ! function_exists( 'woothemes_add_javascript' ) ) {
	function woothemes_add_javascript() {
		wp_enqueue_script( 'jquery' );    
		wp_enqueue_script( 'third party', get_template_directory_uri() . '/includes/js/third-party.js', array( 'jquery' ) );
		wp_enqueue_script( 'general', get_template_directory_uri() . '/includes/js/general.js', array( 'jquery' ) );
	}
}

// Add HTML5 shim in <IE9
add_action('wp_head', 'woo_html5');
function woo_html5() {
	global $is_IE;
	if($is_IE) {
		$browser = $_SERVER['HTTP_USER_AGENT'];
		$browser = substr( "$browser", 25, 8);
		if ($browser == "MSIE 7.0" || $browser == "MSIE 6.0" || $browser == "MSIE 8.0" ) {
			echo '<script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script>'; 	
		}
	}
}

?>