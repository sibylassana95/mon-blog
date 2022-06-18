<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package blogghiamo
 */

if ( ! function_exists( 'blogghiamo_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 */
function blogghiamo_post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation">
		<h2 class="screen-reader-text"><?php esc_html_e( 'Post navigation', 'blogghiamo' ); ?></h2>
		<div class="nav-links">
			<?php
				previous_post_link( '<div class="nav-previous">%link</div>', '<div class="meta-nav" title="%title" aria-hidden="true"><i class="fa fa-angle-left spaceRight"></i><span>' . esc_html__( 'Previous Post', 'blogghiamo' ) . '</span></div> ' . '<span class="screen-reader-text">' . esc_html__( 'Previous post:', 'blogghiamo' ) . '</span> ' );
				next_post_link( '<div class="nav-next">%link</div>', '<div class="meta-nav" title="%title" aria-hidden="true"><span>' . esc_html__( 'Next Post', 'blogghiamo' ) . '</span><i class="fa fa-angle-right spaceLeft"></i></div> ' . '<span class="screen-reader-text">' . esc_html__( 'Next Post:', 'blogghiamo' ) . '</span> ' );
			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'blogghiamo_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function blogghiamo_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);
	
	$byline = '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>';

	echo '<span class="posted-on"><i class="fa fa-calendar spaceRight" aria-hidden="true"></i>' . $time_string . '</span><span class="byline"><i class="fa fa-user spaceRight" aria-hidden="true"></i>' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	
	if ( 'post' == get_post_type() ) {
		$categories_list = get_the_category_list( ' / ' );
		if ( $categories_list ) {
			echo '<span class="cat-links"><i class="fa fa-folder-open spaceRight" aria-hidden="true"></i>' . $categories_list. '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}
	}
	
	if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) {
		echo '<span class="comments-link"><i class="fa fa-comments-o spaceRight" aria-hidden="true"></i>';
		comments_popup_link( esc_html__( 'Leave a comment', 'blogghiamo' ), esc_html__( '1 Comment', 'blogghiamo' ), esc_html__( '% Comments', 'blogghiamo' ) );
		echo '</span>';
	}

}
endif;

if ( ! function_exists( 'blogghiamo_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function blogghiamo_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' == get_post_type() ) {
		$tags_list = get_the_tag_list( '', ' / ' );
		if ( $tags_list ) {
			echo '<span class="tags-links"><i class="fa fa-tags spaceRight" aria-hidden="true"></i>' . $tags_list . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'blogghiamo' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link"><i class="fa fa-wrench spaceRight" aria-hidden="true"></i>',
		'</span>'
	);
}
endif;