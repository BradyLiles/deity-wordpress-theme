<div class="clear"></div>
</div>
<footer id="footer" role="contentinfo">
	<div id="copyright">
		<?php echo sprintf( __( '%1$s %2$s %3$s. All Rights Reserved.', 'blankslate' ), '&copy;', date( 'Y' ), esc_html( get_bloginfo( 'name' ) ) ); echo sprintf( __( ' Theme By: %1$s.', 'Deity Web Design' ), '<a href="http://deitywebdesign.com/">Deity Web Design</a>' ); ?>
	</div>
</footer>
</div>//Must include wp_footer hook for pluginss
<?php wp_footer(); ?>
</body>
</html>