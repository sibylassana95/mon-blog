<?php
/**
 * The template for displaying comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package blogghiamo
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
			$comments_number = get_comments_number();
			if ( 1 === $comments_number ) {
				printf(
					/* translators: 1: title. */
					esc_html_e( 'One thought on &ldquo;%1$s&rdquo;', 'blogghiamo' ),
					'<span>' . esc_html(get_the_title()) . '</span>'
				);
			} else {
				printf( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $comments_number, 'comments title', 'blogghiamo' ) ),
					esc_html( number_format_i18n( $comments_number ) ),
					'<span>' . esc_html(get_the_title()) . '</span>'
				);
			}
			?>
		</h2>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'      => 'ol',
					'short_ping' => true,
					'avatar_size' => '70',
					'reply_text'        =>  '<span class="smallPart">' . esc_html__( 'Reply'  , 'blogghiamo' ) . '<i class="fa fa-level-down spaceLeft"></i></span>',
				) );
			?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below" class="comment-navigation">
			<h1 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'blogghiamo' ); ?></h1>
			<div class="nav-previous smallPart"><i class="fa fa-lg fa-angle-left spaceRight"></i> <?php previous_comments_link( esc_html__( 'Older Comments', 'blogghiamo' ) ); ?></div>
			<div class="nav-next smallPart"><?php next_comments_link( esc_html__( 'Newer Comments', 'blogghiamo' ) ); ?> <i class="fa fa-lg fa-angle-right spaceLeft"></i></div>
		</nav><!-- #comment-nav-below -->
		<?php endif; // check for comment navigation ?>

	<?php endif; // have_comments() ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'blogghiamo' ); ?></p>
	<?php endif; ?>

	<?php
	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );

	$fields =  array(
		'author' => '<p class="comment-form-author"><label for="author"><span class="screen-reader-text">' . __( 'Name *'  , 'blogghiamo' ) . '</span></label><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" ' . $aria_req . ' placeholder="' . esc_attr__( 'Name *'  , 'blogghiamo' ) . '"/></p>',
		'email'  => '<p class="comment-form-email"><label for="email"><span class="screen-reader-text">' . __( 'Email *'  , 'blogghiamo' ) . '</span></label><input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" ' . $aria_req . ' placeholder="' . esc_attr__( 'Email *'  , 'blogghiamo' ) . '"/></p>',
		'url'    => '<p class="comment-form-url"><label for="url"><span class="screen-reader-text">' . __( 'Website'  , 'blogghiamo' ) . '</span></label><input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" placeholder="' . esc_attr__( 'Website'  , 'blogghiamo' ) . '"/></p>',
	);
	$required_text = __(' Required fields are marked ', 'blogghiamo').' <span class="required">*</span>';
	?>
	<?php comment_form( array(
		'fields' => apply_filters( 'comment_form_default_fields', $fields ),
		/* translators: %s: wordpress login url */
		'must_log_in' => '<p class="must-log-in">' .  sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.' , 'blogghiamo' ), wp_login_url( apply_filters( 'the_permalink', esc_url(get_permalink( ) ) ) ) ) . '</p>',
		/* translators: 1: profile user link, 2: username, 3: logout link */
		'logged_in_as' => '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>'  , 'blogghiamo' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', esc_url(get_permalink( ) ) ) ) ) . '</p>',
		'comment_notes_before' => '<p class="comment-notes">' . __( 'Your email address will not be published.'  , 'blogghiamo' ) . ( $req ? $required_text : '' ) . '</p>',
		'title_reply' => __( 'Leave a Reply'  , 'blogghiamo' ),
		/* translators: %s: name of person to reply */
		'title_reply_to' => __( 'Leave a Reply to %s'  , 'blogghiamo' ),
		'cancel_reply_link' => __( 'Cancel reply'  , 'blogghiamo' ) . '<i class="fa fa-times spaceLeft"></i>',
		'label_submit' => __( 'Post Comment'  , 'blogghiamo' ),
		'comment_field' => '<div class="clear"></div><p class="comment-form-comment"><label for="comment"><span class="screen-reader-text">' . __( 'Comment *'  , 'blogghiamo' ) . '</span></label><textarea id="comment" name="comment" rows="8" aria-required="true" placeholder="' . esc_attr__( 'Comment *'  , 'blogghiamo' ) . '"></textarea></p>'
	)); 
	?>

</div><!-- #comments -->
