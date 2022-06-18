<?php
/**
 * @package blogghiamo
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta smallPart">
			<?php blogghiamo_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->
	
	<?php
		if ( '' != get_the_post_thumbnail() ) {
			echo '<div class="entry-featuredImg"><a href="' .esc_url( get_permalink() ). '" title="' .the_title_attribute('echo=0'). '"><span class="overlay-img"></span>';
			the_post_thumbnail('blogghiamo-normal-post', array( 'alt' => get_the_title()));
			echo '</a></div>';
		}
	?>

	<div class="entry-summary">
		<?php if ( '' != get_the_post_thumbnail() ): ?>
		<div class="crestaPostStripeInner">
			<i class="fa fa-lg fa-pencil"></i>
		</div>
		<?php endif; ?>
		
		<?php 
			$showfullpost = get_theme_mod('blogghiamo_theme_options_postshow', '1');
		?>
		<?php if ( $showfullpost == 1 ) : ?>
			<?php 
				the_excerpt();
				$showReadMore = get_theme_mod('blogghiamo_theme_options_readmore', '');
				if ($showReadMore) {
					echo '<div class="blogghiamoReadMore"><a href="' .esc_url( get_permalink() ). '" title="' .the_title_attribute('echo=0'). '">' .esc_html($showReadMore). '</a></div>';
				}
			?>
		<?php else: ?>
			<?php
			the_content( sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'blogghiamo' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			) );
			wp_link_pages( array(
				'before' => '<div class="page-links smallPart"><i class="fa fa-file-text spaceRight aria-hidden="true""></i>' . esc_html__( 'Pages:', 'blogghiamo' ),
				'after'  => '</div>',
				'link_before'      => '<span>',
				'link_after'       => '</span>',
			) );
			?>
		<?php endif; ?>
		
	</div><!-- .entry-content -->

	<footer class="entry-footer smallPart">
		<?php edit_post_link( esc_html__( 'Edit', 'blogghiamo' ), '<span class="edit-link"><i class="fa fa-wrench spaceRight" aria-hidden="true"></i>', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
