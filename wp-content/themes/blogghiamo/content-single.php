<?php
/**
 * @package blogghiamo
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta smallPart">
			<?php blogghiamo_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->
	
	<?php
		if ( '' != get_the_post_thumbnail() ) {
			echo '<div class="entry-featuredImg">';
			the_post_thumbnail('blogghiamo-normal-post');
			echo '</div>';
		}
	?>

	<div class="entry-content">
		<?php if ( '' != get_the_post_thumbnail() ): ?>
		<div class="crestaPostStripeInner">
			<i class="fa fa-lg fa-pencil"></i>
		</div>
		<?php endif; ?>
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links smallPart"><i class="fa fa-file-text spaceRight aria-hidden="true""></i>' . esc_html__( 'Pages:', 'blogghiamo' ),
				'after'  => '</div>',
				'link_before'      => '<span>',
				'link_after'       => '</span>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer smallPart">
		<?php blogghiamo_entry_footer(); ?>
	</footer><!-- .entry-footer -->
	
</article><!-- #post-## -->
