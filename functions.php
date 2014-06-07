<?php
add_action( 'after_setup_theme', 'deity_setup_theme' );
if ( ! function_exists( 'deity_setup_theme' ) ){
	function deity_setup_theme(){
		global $themename, $shortname;
		$themename = "Deity";
		$shortname = "deity";

		$template_dir = get_template_directory();

		require_once($template_dir . '/athena/custom_functions.php');
	}
}
?>