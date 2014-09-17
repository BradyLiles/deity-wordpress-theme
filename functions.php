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

function register_my_menu() {
  register_nav_menu('header-menu',__( 'Navigation Menu' ));
}
add_action( 'init', 'register_my_menu' );

?>
<?php require_once(TEMPLATEPATH . '/athena/admin-menu.php'); ?>