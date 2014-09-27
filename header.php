<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php deity_titles(); ?></title>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />

<link rel="stylesheet" href="<?php echo get_template_directory_uri()?>/athena/featured/featured-style.css" type="text/css" media="screen" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php $options = get_option('mytheme_options'); ?>
<?php wp_head(); ?>

</head>
<body<?php if (is_front_page()) echo(' id="home"'); ?> <?php body_class(); ?> >
<div id="container">
	<div id="header">
			<!-- TOP MENU -->
		<div id="logo">
            <?php $logo = ($options['header_logo'] <> '') ? $options['header_logo'] : get_template_directory_uri().'/images/logo.png'; ?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                <img src="<?php echo esc_attr( $logo ); ?>"/>
			</a>
            <?php $blogName = ($options['custom_blog_name'] <> '') ? $options['custom_blog_name'] : get_bloginfo('name'); ?>
            <h1><?php echo esc_attr($blogName); ?></h1>
			
		</div>
		<div id="social-media">
            <?php if ($options['facebook_logo'])    echo ('<a href="'.$options['facebook_url'].'"><img src="'.get_template_directory_uri().'/images/facebook-logo.png"></a>');?>
			<?php if ($options['linkedin_logo'])	echo ('<a href="'.$options['linkedin_url'].'"><img src="'.get_template_directory_uri().'/images/linkedin-logo.png"></a>');?>
			<?php if ($options['twitter_logo']) 	echo ('<a href="'.$options['twitter_url'].'"><img src="'.get_template_directory_uri().'/images/twitter-logo.png"></a>');?>
		</div>
		<nav id="navigation">	
			<?php $menuClass = 'superfish nav';
            //My Comment
			$primaryNav = '';
			if (function_exists('wp_nav_menu'))
				$primaryNav = wp_nav_menu( array( 'theme_location' => 'header-menu', 'container' => '', 'fallback_cb' => '', 'menu_class' => $menuClass, 'echo' => false ) );
			if ($primaryNav == '') { ?>
					<ul class="<?php echo esc_attr( $menuClass ); ?>">
						<?php show_page_menu($menuClass,false,true); ?>
					</ul> <!-- end ul.nav -->
			<?php } else echo($primaryNav); ?>
		</nav>	
	</div> <!-- end #header -->