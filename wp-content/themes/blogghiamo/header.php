<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package blogghiamo
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="https://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php 
if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open();
} else {
    do_action( 'wp_body_open' );
}
?>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'blogghiamo' ); ?></a>
	<?php if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'header' ) ) : ?>
		<header id="masthead" class="site-header">
			<div class="theTop">
				<div class="site-branding">
					<?php
					if ( is_front_page() && is_home() ) : ?>
						<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
					<?php else : ?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php
					endif;
					$blogghiamo_description = get_bloginfo( 'description', 'display' ); 
					if ( $blogghiamo_description || is_customize_preview() ) : ?>
					<p class="site-description"><?php echo $blogghiamo_description; /* // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */ ?></p>
					<?php endif; ?>
				</div>
			<?php 
				$hideSearch = get_theme_mod('blogghiamo_theme_options_hidesearch', '1');
				$hideRss = get_theme_mod('blogghiamo_theme_options_rss', '1');
				$facebookURL = get_theme_mod('blogghiamo_theme_options_facebookurl', '#');
				$twitterURL = get_theme_mod('blogghiamo_theme_options_twitterurl', '#');
				$googleplusURL = get_theme_mod('blogghiamo_theme_options_googleplusurl', '#');
				$linkedinURL = get_theme_mod('blogghiamo_theme_options_linkedinurl', '#');
				$instagramURL = get_theme_mod('blogghiamo_theme_options_instagramurl', '#');
				$youtubeURL = get_theme_mod('blogghiamo_theme_options_youtubeurl', '#');
				$pinterestURL = get_theme_mod('blogghiamo_theme_options_pinteresturl', '#');
				$vkURL = get_theme_mod('blogghiamo_theme_options_vkurl', '#');
				$tumblrURL = get_theme_mod('blogghiamo_theme_options_tumblrurl', '#');
				$githubURL = get_theme_mod('blogghiamo_theme_options_githuburl', '');
				$vineURL = get_theme_mod('blogghiamo_theme_options_vineurl', '');
				$xingURL = get_theme_mod('blogghiamo_theme_options_xingurl', '');
				$telegramURL = get_theme_mod('blogghiamo_theme_options_telegramurl', '');
				$imdbURL = get_theme_mod('blogghiamo_theme_options_imdburl', '');
				$twitchURL = get_theme_mod('blogghiamo_theme_options_twitchurl', '');
				$spotifyURL = get_theme_mod('blogghiamo_theme_options_spotifyurl', '');
				$whatsappURL = get_theme_mod('blogghiamo_theme_options_whatsappurl', '');
				$emailURL = get_theme_mod('blogghiamo_theme_options_emailurl', '#');
				$mobileMenuText = get_theme_mod('blogghiamo_theme_options_mobilemenu_text', __( 'Menu', 'blogghiamo' ));
			?>

				<div class="socialLine">
					<?php if (!empty($facebookURL)) : ?>
						<a href="<?php echo esc_url($facebookURL); ?>" title="<?php esc_attr_e( 'Facebook', 'blogghiamo' ); ?>"><i class="fa fa-facebook spaceRightDouble"><span class="screen-reader-text"><?php esc_html_e( 'Facebook', 'blogghiamo' ); ?></span></i></a>
					<?php endif; ?>
							
					<?php if (!empty($twitterURL)) : ?>
						<a href="<?php echo esc_url($twitterURL); ?>" title="<?php esc_attr_e( 'Twitter', 'blogghiamo' ); ?>"><i class="fa fa-twitter spaceRightDouble"><span class="screen-reader-text"><?php esc_html_e( 'Twitter', 'blogghiamo' ); ?></span></i></a>
					<?php endif; ?>
							
					<?php if (!empty($googleplusURL)) : ?>
						<a href="<?php echo esc_url($googleplusURL); ?>" title="<?php esc_attr_e( 'Google Plus', 'blogghiamo' ); ?>"><i class="fa fa-google-plus spaceRightDouble"><span class="screen-reader-text"><?php esc_html_e( 'Google Plus', 'blogghiamo' ); ?></span></i></a>
					<?php endif; ?>
							
					<?php if (!empty($linkedinURL)) : ?>
						<a href="<?php echo esc_url($linkedinURL); ?>" title="<?php esc_attr_e( 'Linkedin', 'blogghiamo' ); ?>"><i class="fa fa-linkedin spaceRightDouble"><span class="screen-reader-text"><?php esc_html_e( 'Linkedin', 'blogghiamo' ); ?></span></i></a>
					<?php endif; ?>
							
					<?php if (!empty($instagramURL)) : ?>
						<a href="<?php echo esc_url($instagramURL); ?>" title="<?php esc_attr_e( 'Instagram', 'blogghiamo' ); ?>"><i class="fa fa-instagram spaceRightDouble"><span class="screen-reader-text"><?php esc_html_e( 'Instagram', 'blogghiamo' ); ?></span></i></a>
					<?php endif; ?>
							
					<?php if (!empty($youtubeURL)) : ?>
						<a href="<?php echo esc_url($youtubeURL); ?>" title="<?php esc_attr_e( 'YouTube', 'blogghiamo' ); ?>"><i class="fa fa-youtube spaceRightDouble"><span class="screen-reader-text"><?php esc_html_e( 'YouTube', 'blogghiamo' ); ?></span></i></a>
					<?php endif; ?>
							
					<?php if (!empty($pinterestURL)) : ?>
						<a href="<?php echo esc_url($pinterestURL); ?>" title="<?php esc_attr_e( 'Pinterest', 'blogghiamo' ); ?>"><i class="fa fa-pinterest spaceRightDouble"><span class="screen-reader-text"><?php esc_html_e( 'Pinterest', 'blogghiamo' ); ?></span></i></a>
					<?php endif; ?>
					
					<?php if (!empty($tumblrURL)) : ?>
						<a href="<?php echo esc_url($tumblrURL); ?>" title="<?php esc_attr_e( 'Tumblr', 'blogghiamo' ); ?>"><i class="fa fa-tumblr spaceRightDouble"><span class="screen-reader-text"><?php esc_html_e( 'Tumblr', 'blogghiamo' ); ?></span></i></a>
					<?php endif; ?>
							
					<?php if (!empty($vkURL)) : ?>
						<a href="<?php echo esc_url($vkURL); ?>" title="<?php esc_attr_e( 'VK', 'blogghiamo' ); ?>"><i class="fa fa-vk spaceRightDouble"><span class="screen-reader-text"><?php esc_html_e( 'VK', 'blogghiamo' ); ?></span></i></a>
					<?php endif; ?>
					
					<?php if (!empty($githubURL)) : ?>
						<a href="<?php echo esc_url($githubURL); ?>" title="<?php esc_attr_e( 'GitHub', 'blogghiamo' ); ?>"><i class="fa fa-github spaceRightDouble"><span class="screen-reader-text"><?php esc_html_e( 'GitHub', 'blogghiamo' ); ?></span></i></a>
					<?php endif; ?>
					
					<?php if (!empty($vineURL)) : ?>
						<a href="<?php echo esc_url($vineURL); ?>" title="<?php esc_attr_e( 'Vine', 'blogghiamo' ); ?>"><i class="fa fa-vine spaceRightDouble"><span class="screen-reader-text"><?php esc_html_e( 'Vine', 'blogghiamo' ); ?></span></i></a>
					<?php endif; ?>
					
					<?php if (!empty($xingURL)) : ?>
						<a href="<?php echo esc_url($xingURL); ?>" title="<?php esc_attr_e( 'Xing', 'blogghiamo' ); ?>"><i class="fa fa-xing spaceRightDouble"><span class="screen-reader-text"><?php esc_html_e( 'Xing', 'blogghiamo' ); ?></span></i></a>
					<?php endif; ?>
					
					<?php if (!empty($telegramURL)) : ?>
						<a href="<?php echo esc_url($telegramURL); ?>" title="<?php esc_attr_e( 'Telegram', 'blogghiamo' ); ?>"><i class="fa fa-telegram spaceRightDouble"><span class="screen-reader-text"><?php esc_html_e( 'Telegram', 'blogghiamo' ); ?></span></i></a>
					<?php endif; ?>
					
					<?php if (!empty($imdbURL)) : ?>
						<a href="<?php echo esc_url($imdbURL); ?>" title="<?php esc_attr_e( 'Imdb', 'blogghiamo' ); ?>"><i class="fa fa-imdb spaceRightDouble"><span class="screen-reader-text"><?php esc_html_e( 'Imdb', 'blogghiamo' ); ?></span></i></a>
					<?php endif; ?>
					
					<?php if (!empty($twitchURL)) : ?>
						<a href="<?php echo esc_url($twitchURL); ?>" title="<?php esc_attr_e( 'Twitch', 'blogghiamo' ); ?>"><i class="fa fa-twitch spaceRightDouble"><span class="screen-reader-text"><?php esc_html_e( 'Twitch', 'blogghiamo' ); ?></span></i></a>
					<?php endif; ?>
					
					<?php if (!empty($spotifyURL)) : ?>
						<a href="<?php echo esc_url($spotifyURL); ?>" title="<?php esc_attr_e( 'Spotify', 'blogghiamo' ); ?>"><i class="fa fa-spotify spaceRightDouble"><span class="screen-reader-text"><?php esc_html_e( 'Spotify', 'blogghiamo' ); ?></span></i></a>
					<?php endif; ?>
					
					<?php if (!empty($whatsappURL)) : ?>
						<a href="<?php echo esc_url($whatsappURL); ?>" title="<?php esc_attr_e( 'WhatsApp', 'blogghiamo' ); ?>"><i class="fa fa-whatsapp spaceRightDouble"><span class="screen-reader-text"><?php esc_html_e( 'WhatsApp', 'blogghiamo' ); ?></span></i></a>
					<?php endif; ?>
					
					<?php if (!empty($emailURL)) : ?>
						<a href="mailto:<?php echo esc_attr(antispambot($emailURL)); ?>" title="<?php esc_attr_e( 'Email', 'blogghiamo' ); ?>"><i class="fa fa-envelope spaceRightDouble"><span class="screen-reader-text"><?php esc_html_e( 'Email', 'blogghiamo' ); ?></span></i></a>
					<?php endif; ?>
					
					<?php if ( $hideRss == 1 ) : ?>
						<a href="<?php esc_url(bloginfo( 'rss2_url' )); ?>" title="<?php esc_attr_e( 'RSS', 'blogghiamo' ); ?>"><i class="fa spaceRightDouble fa-rss"><span class="screen-reader-text"><?php esc_html_e( 'RSS', 'blogghiamo' ); ?></span></i></a>
					<?php endif; ?>
					
					<?php if ( $hideSearch == 1 ) : ?>
						<a href="#" class="top-search"><i class="fa spaceRightDouble fa-search"><span class="screen-reader-text"><?php esc_html_e( 'Search', 'blogghiamo' ); ?></span></i></a>
					<?php endif; ?>
				</div>
				<?php if ( $hideSearch == 1 ) : ?>
					<div class="topSearchForm">
							<form method="get" id="searchform" action="<?php echo esc_url(home_url( '/' ) ); ?>">
								<label>
									<span class="screen-reader-text"><?php esc_html_e( 'Search for:', 'blogghiamo' ); ?></span>
									<input type="search" name="s" class="search" placeholder="<?php esc_attr_e('Type here and hit enter...', 'blogghiamo'); ?>">
								</label>
							</form>
					</div>
				<?php endif; ?>
			</div>
				<nav id="site-navigation" class="main-navigation smallPart">
					<button class="menu-toggle" aria-label="<?php echo esc_attr($mobileMenuText); ?>"><?php echo esc_html($mobileMenuText); ?><i class="fa fa-align-justify"></i></button>
					<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
				</nav><!-- #site-navigation -->
		</header><!-- #masthead -->
	<?php endif; ?>
	<div id="content" class="site-content">
