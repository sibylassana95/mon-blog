<?php 
/**
 * blogghiamo functions and dynamic template
 *
 * @package blogghiamo
 */
 
 /**
 * Delete font size style from tag cloud widget
 */
if ( ! function_exists( 'blogghiamo_fix_tag_cloud' ) ) {
	function blogghiamo_fix_tag_cloud($tag_string){
	   return preg_replace('/ style=("|\')(.*?)("|\')/','',$tag_string);
	}
}
add_filter('wp_generate_tag_cloud', 'blogghiamo_fix_tag_cloud',10,1);

/**
 * Replace more Excerpt
 */
if ( ! function_exists( 'blogghiamo_new_excerpt_more' ) ) {
	function blogghiamo_new_excerpt_more($more) {
		if ( is_admin() ) {
			return $more;
		}
		return '&hellip;';
	}
}
add_filter('excerpt_more', 'blogghiamo_new_excerpt_more');

 /**
 * Register All Colors and Section
 */
function blogghiamo_color_primary_register( $wp_customize ) {
	$colors = array();
	
	$colors[] = array(
		'slug'=>'text_color_first', 
		'default' => '#404040',
		'label' => __('Text Color', 'blogghiamo')
	);
	
	$colors[] = array(
		'slug'=>'box_color_second', 
		'default' => '#ffffff',
		'label' => __('Box Color', 'blogghiamo')
	);
	
	$colors[] = array(
		'slug'=>'special_color_third', 
		'default' => '#0a7db0',
		'label' => __('Special Color', 'blogghiamo')
	);
	
	foreach( $colors as $blogghiamo_theme_options ) {
		// SETTINGS
		$wp_customize->add_setting( 'blogghiamo_theme_options[' . $blogghiamo_theme_options['slug'] . ']', array(
				'default' => $blogghiamo_theme_options['default'],
				'type' => 'option', 
				'sanitize_callback' => 'sanitize_hex_color',
				'capability' => 'edit_theme_options'
			)
		);
		// CONTROLS
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				$blogghiamo_theme_options['slug'], 
				array('label' => $blogghiamo_theme_options['label'], 
				'section' => 'colors',
				'settings' =>'blogghiamo_theme_options[' . $blogghiamo_theme_options['slug'] . ']',
				)
			)
		);
	}
	
	/*
	Start Blogghiamo Options
	=====================================================
	*/
	$wp_customize->add_section( 'cresta_blogghiamo_options', array(
	     'title'    => esc_html__( 'Blogghiamo Theme Options', 'blogghiamo' ),
	     'priority' => 50,
	) );
	
	/*
	Social Icons
	=====================================================
	*/
	$socialmedia = array();
	
	$socialmedia[] = array(
	'slug'=>'facebookurl', 
	'default' => '#',
	'label' => __('Facebook URL', 'blogghiamo')
	);
	$socialmedia[] = array(
	'slug'=>'twitterurl', 
	'default' => '#',
	'label' => __('Twitter URL', 'blogghiamo')
	);
	$socialmedia[] = array(
	'slug'=>'googleplusurl', 
	'default' => '#',
	'label' => __('Google Plus URL', 'blogghiamo')
	);
	$socialmedia[] = array(
	'slug'=>'linkedinurl', 
	'default' => '#',
	'label' => __('Linkedin URL', 'blogghiamo')
	);
	$socialmedia[] = array(
	'slug'=>'instagramurl', 
	'default' => '#',
	'label' => __('Instagram URL', 'blogghiamo')
	);
	$socialmedia[] = array(
	'slug'=>'youtubeurl', 
	'default' => '#',
	'label' => __('YouTube URL', 'blogghiamo')
	);
	$socialmedia[] = array(
	'slug'=>'pinteresturl', 
	'default' => '#',
	'label' => __('Pinterest URL', 'blogghiamo')
	);
	$socialmedia[] = array(
	'slug'=>'tumblrurl', 
	'default' => '#',
	'label' => __('Tumblr URL', 'blogghiamo')
	);
	$socialmedia[] = array(
	'slug'=>'vkurl', 
	'default' => '#',
	'label' => __('VK URL', 'blogghiamo')
	);
	$socialmedia[] = array(
	'slug'=>'githuburl', 
	'default' => '',
	'label' => __('GitHub URL', 'blogghiamo')
	);
	$socialmedia[] = array(
	'slug'=>'vineurl', 
	'default' => '',
	'label' => __('Vine URL', 'blogghiamo')
	);
	$socialmedia[] = array(
	'slug'=>'xingurl', 
	'default' => '',
	'label' => __('Xing URL', 'blogghiamo')
	);
	$socialmedia[] = array(
	'slug'=>'telegramurl', 
	'default' => '',
	'label' => __('Telegram URL', 'blogghiamo')
	);
	$socialmedia[] = array(
	'slug'=>'imdburl', 
	'default' => '',
	'label' => __('Imdb URL', 'blogghiamo')
	);
	$socialmedia[] = array(
	'slug'=>'twitchurl', 
	'default' => '',
	'label' => __('Twitch URL', 'blogghiamo')
	);
	$socialmedia[] = array(
	'slug'=>'spotifyurl', 
	'default' => '',
	'label' => __('Spotify URL', 'blogghiamo')
	); 
	$socialmedia[] = array(
	'slug'=>'whatsappurl', 
	'default' => '',
	'label' => __('WhatsApp URL', 'blogghiamo')
	); 
	
	foreach( $socialmedia as $blogghiamo_theme_options ) {
		// SETTINGS
		$wp_customize->add_setting(
			'blogghiamo_theme_options_' . $blogghiamo_theme_options['slug'], array(
				'default' => $blogghiamo_theme_options['default'],
				'capability'     => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw',
				'type'     => 'theme_mod',
			)
		);
		// CONTROLS
		$wp_customize->add_control(
			$blogghiamo_theme_options['slug'], 
			array('label' => $blogghiamo_theme_options['label'], 
			'section'    => 'cresta_blogghiamo_options',
			'settings' =>'blogghiamo_theme_options_' . $blogghiamo_theme_options['slug'],
			)
		);
	}
	
	/*
	Email Button
	=====================================================
	*/
	$wp_customize->add_setting('blogghiamo_theme_options_emailurl', array(
        'default'    => '#',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_email'
    ) );
	
	$wp_customize->add_control('blogghiamo_theme_options_emailurl', array(
        'label'      => __( 'Your Email', 'blogghiamo' ),
        'section'    => 'cresta_blogghiamo_options',
        'settings'   => 'blogghiamo_theme_options_emailurl',
    ) );
	
	/*
	Search Button
	=====================================================
	*/
	$wp_customize->add_setting('blogghiamo_theme_options_hidesearch', array(
        'default'    => '1',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'blogghiamo_sanitize_checkbox'
    ) );
	
	$wp_customize->add_control('blogghiamo_theme_options_hidesearch', array(
        'label'      => __( 'Show Search Button', 'blogghiamo' ),
        'section'    => 'cresta_blogghiamo_options',
        'settings'   => 'blogghiamo_theme_options_hidesearch',
        'type'       => 'checkbox',
    ) );
	
	/*
	RSS Icon
	=====================================================
	*/
	$wp_customize->add_setting('blogghiamo_theme_options_rss', array(
        'default'    => '1',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'blogghiamo_sanitize_checkbox'
    ) );
	
	$wp_customize->add_control('blogghiamo_theme_options_rss', array(
        'label'      => __( 'Show RSS Icon', 'blogghiamo' ),
        'section'    => 'cresta_blogghiamo_options',
        'settings'   => 'blogghiamo_theme_options_rss',
        'type'       => 'checkbox',
    ) );
	
	/*
	Full or Excerpt post
	=====================================================
	*/
	$wp_customize->add_setting('blogghiamo_theme_options_postshow', array(
        'default'    => '1',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'blogghiamo_sanitize_checkbox'
    ) );
	
	$wp_customize->add_control('blogghiamo_theme_options_postshow', array(
        'label'      => __( 'Check if you want to show excerpt, uncheck if you want to show full post', 'blogghiamo' ),
        'section'    => 'cresta_blogghiamo_options',
        'settings'   => 'blogghiamo_theme_options_postshow',
        'type'       => 'checkbox',
    ) );
	
	/*
	Use smooth scroll
	=====================================================
	*/
	$wp_customize->add_setting('blogghiamo_theme_options_smoothscroll', array(
        'default'    => '1',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'blogghiamo_sanitize_checkbox'
    ) );
	
	$wp_customize->add_control('blogghiamo_theme_options_smoothscroll', array(
        'label'      => __( 'Enable smooth scroll', 'blogghiamo' ),
        'section'    => 'cresta_blogghiamo_options',
        'settings'   => 'blogghiamo_theme_options_smoothscroll',
        'type'       => 'checkbox',
    ) );
	
	/*
	Custom Copyright text
	=====================================================
	*/
	$wp_customize->add_setting('blogghiamo_theme_options_mobilemenu_text', array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'    => __( 'Menu', 'blogghiamo' ),
		'type'       => 'theme_mod',
		'capability' => 'edit_theme_options',
	) );
	$wp_customize->add_control('blogghiamo_theme_options_mobilemenu_text', array(
		'label'      => __( 'Mobile menu text', 'blogghiamo' ),
		'section'    => 'cresta_blogghiamo_options',
		'settings'   => 'blogghiamo_theme_options_mobilemenu_text',
		'type'       => 'text',
	) );
	
	/*
	Show read more button
	=====================================================
	*/
	$wp_customize->add_setting('blogghiamo_theme_options_readmore', array(
        'default'    => '',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field'
    ) );
	
	$wp_customize->add_control('blogghiamo_theme_options_readmore', array(
        'label'      => __( 'Read more button', 'blogghiamo' ),
		'description'=> __( 'Leave the field blank if you do not want to show the read more button', 'blogghiamo' ),
        'section'    => 'cresta_blogghiamo_options',
        'settings'   => 'blogghiamo_theme_options_readmore',
        'type'       => 'text',
		'active_callback' => 'blogghiamo_is_excerpt',
    ) );
	
	/*
	Copyright text
	=====================================================
	*/
	$wp_customize->add_setting('blogghiamo_theme_options_copyrighttext', array(
		'sanitize_callback' => 'blogghiamo_sanitize_text',
		'default'    => '&copy; '.date('Y').' '. get_bloginfo('name'),
		'type'       => 'theme_mod',
		'capability' => 'edit_theme_options',
	) );
	$wp_customize->add_control('blogghiamo_theme_options_copyrighttext', array(
		'label'      => __( 'Copyright Text', 'blogghiamo' ),
		/* translators: 1: start link, 2: end link */
		'description' => sprintf( __( 'Get the %1$s PRO version %2$s to remove CrestaProject credits', 'blogghiamo' ), '<a href="' . esc_url( apply_filters( 'blogghiamo_pro_filter_url', 'https://crestaproject.com/downloads/blogghiamo/' ) ) . '" target="_blank">', '</a>' ),
		'section'    => 'cresta_blogghiamo_options',
		'settings'   => 'blogghiamo_theme_options_copyrighttext',
		'type'       => 'text',
	) );
	
	/*
	Upgrade to PRO
	=====================================================
	*/
    class Blogghiamo_Customize_Upgrade_Control extends WP_Customize_Control {
        public function render_content() {  ?>
        	<p class="blogghiamo-upgrade-title">
        		<span class="customize-control-title">
					<h3 style="text-align:center;"><div class="dashicons dashicons-megaphone"></div> <?php esc_html_e('Get Blogghiamo PRO WP Theme for only', 'blogghiamo'); ?> 24,90&euro;</h3>
        		</span>
        	</p>
			<p style="text-align:center;" class="blogghiamo-upgrade-button">
				<a style="margin: 10px;" target="_blank" href="https://crestaproject.com/demo/blogghiamo-pro/" class="button button-secondary">
					<?php esc_html_e('Watch the demo', 'blogghiamo'); ?>
				</a>
				<a style="margin: 10px;" target="_blank" href="https://crestaproject.com/downloads/blogghiamo/" class="button button-secondary">
					<?php esc_html_e('Get Blogghiamo PRO Theme', 'blogghiamo'); ?>
				</a>
			</p>
			<ul>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b><?php esc_html_e( 'Advanced Theme Options', 'blogghiamo' ); ?></b></li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b><?php esc_html_e( 'Logo Upload', 'blogghiamo' ); ?></b></li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b><?php esc_html_e( 'Font switcher', 'blogghiamo' ); ?></b></li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b><?php esc_html_e( 'Loading Page', 'blogghiamo' ); ?></b></li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b><?php esc_html_e( 'Unlimited Colors and Skin', 'blogghiamo' ); ?></b></li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b><?php esc_html_e( 'Beautiful Slider', 'blogghiamo' ); ?></b></li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b><?php esc_html_e( 'Breaking News', 'blogghiamo' ); ?></b></li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b><?php esc_html_e( 'Post views counter', 'blogghiamo' ); ?></b></li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b><?php esc_html_e( 'Breadcrumb', 'blogghiamo' ); ?></b></li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b><?php esc_html_e( 'Post format', 'blogghiamo' ); ?></b></li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b><?php esc_html_e( '7 Shortcodes', 'blogghiamo' ); ?></b></li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b><?php esc_html_e( '12 Exclusive Widgets', 'blogghiamo' ); ?></b></li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b><?php esc_html_e( 'Related Posts Box', 'blogghiamo' ); ?></b></li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b><?php esc_html_e( 'Information About Author Box', 'blogghiamo' ); ?></b></li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b><?php esc_html_e( 'Advertising System', 'blogghiamo' ); ?></b></li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b><?php esc_html_e( 'And much more...', 'blogghiamo' ); ?></b></li>
			<ul><?php
        }
    }
	
	$wp_customize->add_section( 'cresta_upgrade_pro', array(
	     'title'    => esc_html__( 'More features? Upgrade to PRO', 'blogghiamo' ),
	     'priority' => 999,
	));
	
	$wp_customize->add_setting('blogghiamo_section_upgrade_pro', array(
		'default' => '',
		'type' => 'option',
		'sanitize_callback' => 'esc_attr'
	));
	
	$wp_customize->add_control(new Blogghiamo_Customize_Upgrade_Control($wp_customize, 'blogghiamo_section_upgrade_pro', array(
		'section' => 'cresta_upgrade_pro',
		'settings' => 'blogghiamo_section_upgrade_pro',
	)));
	
}
add_action( 'customize_register', 'blogghiamo_color_primary_register' );

function blogghiamo_sanitize_checkbox( $input ) {
	if ( $input == 1 ) {
		return 1;
	} else {
		return '';
	}
}

function blogghiamo_is_excerpt() {
	$showfullpost = get_theme_mod('blogghiamo_theme_options_postshow', '1');
	if ($showfullpost) {
		return true;
	}
	return false;
}

function blogghiamo_sanitize_text( $input ) {
	return wp_kses($input, blogghiamo_allowed_html());
}

if( ! function_exists('blogghiamo_allowed_html')){
	function blogghiamo_allowed_html() {
		$allowed_tags = array(
			'a' => array(
				'class' => array(),
				'id'    => array(),
				'href'  => array(),
				'rel'   => array(),
				'title' => array(),
				'target' => array(),
			),
			'abbr' => array(
				'title' => array(),
			),
			'b' => array(),
			'blockquote' => array(
				'cite'  => array(),
			),
			'cite' => array(
				'title' => array(),
			),
			'code' => array(),
			'del' => array(
				'datetime' => array(),
				'title' => array(),
			),
			'dd' => array(),
			'div' => array(
				'class' => array(),
				'title' => array(),
				'style' => array(),
			),
			'dl' => array(),
			'dt' => array(),
			'em' => array(),
			'h1' => array(
				'class' => array(),
			),
			'h2' => array(
				'class' => array(),
			),
			'h3' => array(
				'class' => array(),
			),
			'h4' => array(
				'class' => array(),
			),
			'h5' => array(
				'class' => array(),
			),
			'h6' => array(
				'class' => array(),
			),
			'i' => array(
				'class' => array(),
			),
			'br' => array(),
			'img' => array(
				'alt'    => array(),
				'class'  => array(),
				'height' => array(),
				'src'    => array(),
				'width'  => array(),
			),
			'li' => array(
				'class' => array(),
			),
			'ol' => array(
				'class' => array(),
			),
			'p' => array(
				'class' => array(),
			),
			'q' => array(
				'cite' => array(),
				'title' => array(),
			),
			'span' => array(
				'class' => array(),
				'title' => array(),
				'style' => array(),
			),
			'strike' => array(),
			'strong' => array(),
			'ul' => array(
				'class' => array(),
			),
			'iframe' => array(
				'width' => array(),
				'height' => array(),
				'src' => array(),
				'frameborder' => array(),
				'allow' => array(),
				'style' => array(),
				'name' => array(),
				'id' => array(),
				'class' => array(),
			),
		);
		return $allowed_tags;
	}
}

/**
 * Add Custom CSS to Header 
 */
function blogghiamo_custom_css_styles() { 
	global $blogghiamo_theme_options;
	$se_options = get_option( 'blogghiamo_theme_options', $blogghiamo_theme_options );
	if( isset( $se_options[ 'text_color_first' ] ) ) {
		$text_color_first = $se_options['text_color_first'];
	}
	if( isset( $se_options[ 'box_color_second' ] ) ) {
		$box_color_second = $se_options['box_color_second'];
	}
	if( isset( $se_options[ 'special_color_third' ] ) ) {
		$special_color_third = $se_options['special_color_third'];
	}
?>

<style id="blogghiamo-custom-css">
	<?php if (!empty($text_color_first) && $text_color_first != '#404040' ) : ?>
	body,
	button,
	input,
	select,
	textarea,
	a,
	.menu-toggle {
		color: <?php echo esc_html($text_color_first); ?>;
	}
	.navigation.pagination .nav-links span.current {
		background: <?php echo esc_html($text_color_first); ?>;
	}
	<?php endif; ?>
	
	<?php if (!empty($box_color_second) && $box_color_second != '#ffffff' ) : ?>
	button,
	input[type="button"],
	input[type="reset"],
	input[type="submit"],
	.main-navigation a,
	.main-navigation a:hover, 
	.main-navigation a:focus, 
	.main-navigation a:active,
	.post-navigation .meta-nav,
	.widget-title,
	.edit-link a, .widget_tag_cloud a, .blogghiamoReadMore a,
	#comments .reply a,
	.menu-toggle:hover,
	.menu-toggle:focus,
	.navigation.pagination .nav-links span.current	{
		color: <?php echo esc_html($box_color_second); ?>;
	}
	@media screen and (max-width: 1025px) {
		.main-navigation ul li .indicator {
			color: <?php echo esc_html($box_color_second); ?>;
		}
	}
	.theTop, footer.site-footer, .hentry, .widget, .comments-area, #toTop, .paging-navigation .nav-links a, .page-header, #disqus_thread, .navigation.pagination .nav-links > a,
	.crestaPostStripeInner,
	.page-content,
	.entry-content,
	.entry-summary,
	.menu-toggle {
		background: <?php echo esc_html($box_color_second); ?>;
	}
	.site-title {
		text-shadow: 4px 3px 0px <?php echo esc_html($box_color_second); ?>, 9px 8px 0px rgba(0, 0, 0, 0.1);
	}
	<?php endif; ?>
	
	<?php if (!empty($special_color_third) && $special_color_third != '#0a7db0' ) : ?>
	button,
	input[type="button"],
	input[type="reset"],
	input[type="submit"],
	.main-navigation,
	.main-navigation ul ul,
	.post-navigation .meta-nav,
	.widget-title,
	.edit-link a, .widget_tag_cloud a, .blogghiamoReadMore a,
	#comments .reply,
	.menu-toggle:focus, .menu-toggle:hover {
		background: <?php echo esc_html($special_color_third); ?>;
	}
	button:hover,
	input[type="button"]:hover,
	input[type="reset"]:hover,
	input[type="submit"]:hover,
	a:hover,
	a:focus,
	a:active,
	.post-navigation .meta-nav:hover,
	.top-search.active,
	.edit-link a:hover, .widget_tag_cloud a:hover, .blogghiamoReadMore a:hover,
	.page-links a span {
		color: <?php echo esc_html($special_color_third); ?>;
	}
	blockquote {
		border-left: 5px solid <?php echo esc_html($special_color_third); ?>;
		border-right: 2px solid <?php echo esc_html($special_color_third); ?>;
	}
	button:hover,
	input[type="button"]:hover,
	input[type="reset"]:hover,
	input[type="submit"]:hover,
	input[type="text"]:focus,
	input[type="email"]:focus,
	input[type="url"]:focus,
	input[type="password"]:focus,
	input[type="search"]:focus,
	input[type="number"]:focus,
	input[type="tel"]:focus,
	input[type="range"]:focus,
	input[type="date"]:focus,
	input[type="month"]:focus,
	input[type="week"]:focus,
	input[type="time"]:focus,
	input[type="datetime"]:focus,
	input[type="datetime-local"]:focus,
	input[type="color"]:focus,
	textarea:focus,
	.post-navigation .meta-nav:hover,
	#wp-calendar tbody td#today,
	.edit-link a:hover, .widget_tag_cloud a:hover, .blogghiamoReadMore a:hover	{
		border: 1px solid <?php echo esc_html($special_color_third); ?>;
	}
	.widget-title:before, .theShareSpace:before {
		border-top: 1.5em solid <?php echo esc_html($special_color_third); ?>;
	}
	<?php endif; ?>
	
</style>
    <?php
}
add_action('wp_head', 'blogghiamo_custom_css_styles');