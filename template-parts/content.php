<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package minim
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_single() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php minim_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	<?php the_post_thumbnail();?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_excerpt();?>
		<button class="read-more"><a href="<?php echo the_permalink();?>">Read More</a></button>
	</div><!-- .entry-content -->


</article><!-- #post-## -->
