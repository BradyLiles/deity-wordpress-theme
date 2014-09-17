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

function theme_name_scripts() {
    wp_enqueue_script( 'deity-slider', get_template_directory_uri() . '/athena/js/deity.slider.js', array(), '1.0.0', true );
}

add_action( 'wp_enqueue_scripts', 'theme_name_scripts' );


if ( ! function_exists( 'show_categories_menu' ) ){
	function show_categories_menu($customClass = 'nav clearfix', $addUlContainer = true){
		global $shortname, $themename, $category_menu, $exclude_cats, $hide, $strdepth2, $projects_cat;

		//excluded categories
		if (et_get_option($shortname.'_menucats') <> '') $exclude_cats = implode(",", et_get_option($shortname.'_menucats'));

		//hide empty categories
		if (et_get_option($shortname.'_categories_empty') == 'on') $hide = '1';
		else $hide = '0';

		//dropdown for categories
		$strdepth2 = '';
		if (et_get_option($shortname.'_enable_dropdowns_categories') == 'on') $strdepth2 = "depth=".et_get_option($shortname.'_tiers_shown_categories');
		if ($strdepth2 == '') $strdepth2 = "depth=1";

		$args = "orderby=".et_get_option($shortname.'_sort_cat')."&order=".et_get_option($shortname.'_order_cat')."&".$strdepth2."&exclude=".$exclude_cats."&hide_empty=".$hide."&title_li=&echo=0";

		$categories = get_categories( $args );

		if ( !empty($categories) ) {
			$category_menu = wp_list_categories($args);
			if ($addUlContainer) echo('<ul class="'.$customClass.'">');
				echo $category_menu;
			if ($addUlContainer) echo('</ul>');
		}
	}
}

if ( ! function_exists( 'show_page_menu' ) ){
	function show_page_menu($customClass = 'nav clearfix', $addUlContainer = true, $addHomeLink = true){
		global $shortname, $themename, $exclude_pages, $strdepth, $page_menu, $is_footer;

		//excluded pages
		if (get_option('dt_menupages', '') <> '') $exclude_pages = implode(",", get_option('dt_menupages'));

		$page_menu = wp_list_pages("sort_column=".get_option('dt_sort_pages', '')."&sort_order=".get_option('dt_order_page')."&exclude=".$exclude_pages."&title_li=&echo=0");

		if ($addUlContainer) echo('<ul class="'.$customClass.'">');
			if (get_option('dt_home_link') == 'true' && $addHomeLink) { ?>
				<li <?php if (is_front_page() || is_home()) echo('class="current_page_item"') ?>><a href="<?php echo esc_url( home_url() ); ?>"><?php _e('Home',$themename); ?></a></li>
			<?php };

			echo $page_menu;
		if ($addUlContainer) echo('</ul>');
	}
}

?>