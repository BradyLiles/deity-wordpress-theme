<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php deity_titles(); ?></title>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	
<?php wp_head(); ?>

</head>

<body<?php if (is_front_page()) echo(' id="home"'); ?> <?php body_class(); ?> >
<div id="container">
	<div id="header">
			<!-- TOP MENU -->
		<div id="logo">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
			<?php $logo = (get_option('deity-logo') <> '') ? get_option('deity-logo') : get_template_directory_uri().'/images/logo.png'; ?>	
			
            <img src="<?php echo esc_attr( $logo ); ?>"/>
			</a>
            <h1><?php echo esc_attr(get_bloginfo('name')); ?></h1>
		</div>
		<div id="social-media">
            <?php if (get_option('facebook-logo')) echo ('<a href="#facebook"><img src='.get_option('facebook-logo').'></a>');?>
			<?php if (get_option('linkedin-logo')) echo ('<a href="#linkedin"><img src='.get_option('linkedin-logo').'></a>');?>
			<?php if (get_option('twitter-logo')) echo ('<a href="#twitter"><img src='.get_option('twitter-logo').'></a>');?>
		</div>
		<nav id="nav">	
			<ul>		
				<li> 
					<a href="#"><span> Home </span></a> 
				</li>
				<li> 
					<a href="#"><span> About </span></a> 
				</li>
				<li> 
					<a href="#"><span> Contact </span></a> 
				</li>
				<li> 
					<a href="#"><span> Services </span></a> 
				</li>
			</ul>
		</nav>	
			<div id="search-form">
			</div> <!-- end searchform -->
	</div> <!-- end #header -->