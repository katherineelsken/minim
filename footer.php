<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package minim
 */

?>
		</div><!--.wrap-->
	</div><!-- #content -->
	
	<div class="footer-widgets">
		<div class="wrap">
			<?php dynamic_sidebar( 'footer-widget-1' ); ?>
			<?php dynamic_sidebar( 'footer-widget-2' ); ?>
			<?php dynamic_sidebar( 'footer-widget-3' ); ?>
		
		</div>
	</div>
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="wrap">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'minim' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'minim' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'minim' ), 'minim', '<a href="http://www.katherineelsken.com" rel="designer">Katherine Elsken</a>' ); ?>
		</div><!-- .site-info -->
			</div><!--.wrap-->
	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
