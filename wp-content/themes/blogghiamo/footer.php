<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package blogghiamo
 */
?>

	</div><!-- #content -->
	<?php if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'footer' ) ) : ?>
		<footer id="colophon" class="site-footer">
			<div class="site-info smallPart">
				<?php
				$copyrightText = get_theme_mod('blogghiamo_theme_options_copyrighttext', '&copy; '.date('Y').' '. get_bloginfo('name'));
				if ($copyrightText || is_customize_preview()): ?>
					<span class="custom"><?php echo do_shortcode(wp_kses_post($copyrightText)); ?></span>
				<?php endif; ?>
				<span class="sep"> | </span>
				<?php
				/* translators: 1: theme name, 2: theme developer */
				printf( esc_html__( 'WordPress Theme: %1$s by %2$s.', 'blogghiamo' ), '<a title="Blogghiamo Theme" target="_blank" href="https://crestaproject.com/downloads/blogghiamo/" rel="noopener noreferrer">Blogghiamo</a>', 'CrestaProject' );
				?>
			</div><!-- .site-info -->
		</footer><!-- #colophon -->
	<?php endif; ?>
</div><!-- #page -->
<a href="#top" id="toTop" aria-hidden="true"><i class="fa fa-angle-up fa-lg"></i></a>
<?php wp_footer(); ?>

</body>
</html>
