<?php 
	//sort_order
	//add_option( 'dt_home_link', 'true', '', 'yes' );
	// add_option( 'dt_sort_order', 'ASC', '', 'yes' );
?>
<?php get_header(); ?>

	<div id="content-area" class="clearfix">
	<?php get_template_part('includes/entry'); ?>
 <!-- #content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>