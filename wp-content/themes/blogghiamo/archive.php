<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package blogghiamo
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">
			<?php if ( have_posts() ) : ?>
			
				<?php if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'archive' ) ) : ?>

					<header class="page-header">
						<?php
							the_archive_title( '<h1 class="page-title">', '</h1>' );
							the_archive_description( '<div class="taxonomy-description">', '</div>' );
						?>
					</header><!-- .page-header -->

					<?php /* Start the Loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>

						<?php
							get_template_part( 'content', get_post_format() );
						?>

					<?php endwhile; ?>

					<?php
						the_posts_pagination( array(
							'prev_text'          => '<i class="fa fa-angle-double-left spaceRight"></i>' . esc_html__( 'Previous', 'blogghiamo' ),
							'next_text'          => esc_html__( 'Next', 'blogghiamo' ) . '<i class="fa fa-angle-double-right spaceLeft"></i>',
							'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'blogghiamo' ) . ' </span>',
						) );
					?>
				
				<?php endif; ?>

			<?php else : ?>

				<?php get_template_part( 'content', 'none' ); ?>

			<?php endif; ?>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
