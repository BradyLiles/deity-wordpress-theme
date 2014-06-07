<?php

if ( ! function_exists( 'deity_titles' ) ){
	function deity_titles() {
		global $shortname;

		$sitename = get_bloginfo('name');
		$site_description = get_bloginfo('description');

		#title for homepage
		if (is_home() || is_front_page()) {
			echo $sitename . " | " . $site_description;
		}
		
		#title for single posts and pages
		if ( ( is_single() || is_page() ) && ! is_front_page() ) {
			echo $sitename . " | " . wp_title('',false,'');
		}

		#title for categories, archives, and search results
		if (is_category() || is_archive() || is_search()) {
			echo $sitename . " | " . wp_title('',false,'');
		}
	}
}

?>