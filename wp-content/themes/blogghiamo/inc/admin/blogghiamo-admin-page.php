<?php
/**
 * Blogghiamo Admin Class.
 *
 * @author  CrestaProject
 * @package Blogghiamo
 * @since   1.4.2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Blogghiamo_Admin' ) ) :

/**
 * Blogghiamo_Admin Class.
 */
class Blogghiamo_Admin {

	/**
	 * Constructor.
	 */
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'admin_menu' ) );
		add_action( 'wp_loaded', array( __CLASS__, 'hide_notices' ) );
		add_action( 'load-themes.php', array( $this, 'admin_notice' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_scripts' ) );
	}

	/**
	 * Add admin menu.
	 */
	public function admin_menu() {
		$theme = wp_get_theme( get_template() );
		global $blogghiamo_adminpage;
		$blogghiamo_adminpage = add_theme_page( esc_html__( 'About', 'blogghiamo' ) . ' ' . $theme->display( 'Name' ), esc_html__( 'About', 'blogghiamo' ) . ' ' . $theme->display( 'Name' ), 'activate_plugins', 'blogghiamo-welcome', array( $this, 'welcome_screen' ) );
	}

	/**
	 * Enqueue styles.
	 */
	public function enqueue_admin_scripts() {
		global $blogghiamo_adminpage;
		$screen = get_current_screen();
		if ( $screen->id != $blogghiamo_adminpage ) {
			return;
		}
		wp_enqueue_style( 'blogghiamo-welcome', get_template_directory_uri() . '/inc/admin/welcome.css', array(), '1.0' );
	}

	/**
	 * Add admin notice.
	 */
	public function admin_notice() {
		global $pagenow;

		wp_enqueue_style( 'blogghiamo-message', get_template_directory_uri() . '/inc/admin/message.css', array(), '1.0' );

		// Let's bail on theme activation.
		if ( 'themes.php' == $pagenow && isset( $_GET['activated'] ) ) {
			add_action( 'admin_notices', array( $this, 'welcome_notice' ) );
			update_option( 'blogghiamo_admin_notice_welcome', 1 );

		// No option? Let run the notice wizard again..
		} elseif( ! get_option( 'blogghiamo_admin_notice_welcome' ) ) {
			add_action( 'admin_notices', array( $this, 'welcome_notice' ) );
		}
	}

	/**
	 * Hide a notice if the GET variable is set.
	 */
	public static function hide_notices() {
		if ( isset( $_GET['blogghiamo-hide-notice'] ) && isset( $_GET['_blogghiamo_notice_nonce'] ) ) {
			if ( ! wp_verify_nonce( sanitize_key($_GET['_blogghiamo_notice_nonce'] ), 'blogghiamo_hide_notices_nonce' ) ) {
				wp_die( esc_html__( 'Action failed. Please refresh the page and retry.', 'blogghiamo' ) );
			}

			if ( ! current_user_can( 'manage_options' ) ) {
				wp_die( esc_html__( 'Cheatin&#8217; huh?', 'blogghiamo' ) );
			}

			$hide_notice = sanitize_text_field( wp_unslash($_GET['blogghiamo-hide-notice'] ));
			update_option( 'blogghiamo_admin_notice_' . $hide_notice, 1 );
		}
	}

	/**
	 * Show welcome notice.
	 */
	public function welcome_notice() {
		?>
		<div id="message" class="updated cresta-message">
			<a class="cresta-message-close notice-dismiss" href="<?php echo esc_url( wp_nonce_url( remove_query_arg( array( 'activated' ), add_query_arg( 'blogghiamo-hide-notice', 'welcome' ) ), 'blogghiamo_hide_notices_nonce', '_blogghiamo_notice_nonce' ) ); ?>"><?php esc_html_e( 'Dismiss', 'blogghiamo' ); ?></a>
			<p>
			<?php
			/* translators: 1: start option panel link, 2: end option panel link */
			printf( esc_html__( 'Welcome! Thank you for choosing Blogghiamo! To fully take advantage of the best our theme can offer please make sure you visit our %1$swelcome page%2$s.', 'blogghiamo' ), '<a href="' . esc_url( admin_url( 'themes.php?page=blogghiamo-welcome' ) ) . '">', '</a>' );
			?>
			</p>
			<p class="submit">
				<a class="button-secondary" href="<?php echo esc_url( admin_url( 'themes.php?page=blogghiamo-welcome' ) ); ?>"><?php esc_html_e( 'Get started with Blogghiamo', 'blogghiamo' ); ?></a>
			</p>
		</div>
		<?php
	}

	/**
	 * Intro text/links shown to all about pages.
	 *
	 * @access private
	 */
	private function intro() {
		$theme = wp_get_theme( get_template() );
		?>
		<div class="cresta-theme-info">
				<h1>
					<?php esc_html_e('About', 'blogghiamo'); ?>
					<?php echo esc_html($theme->get( 'Name' )) ." ". esc_html($theme->get( 'Version' )); ?>
				</h1>

			<div class="welcome-description-wrap">
				<div class="about-text"><?php echo esc_html($theme->display( 'Description' )); ?>
				<p class="cresta-actions">
					<a href="<?php echo esc_url( apply_filters( 'blogghiamo_pro_theme_url', 'https://crestaproject.com/downloads/blogghiamo/' ) ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'Theme Info', 'blogghiamo' ); ?></a>

					<a href="<?php echo esc_url( apply_filters( 'blogghiamo_pro_theme_url', 'https://crestaproject.com/demo/blogghiamo/' ) ); ?>" class="button button-secondary docs" target="_blank"><?php esc_html_e( 'View Demo', 'blogghiamo' ); ?></a>

					<a href="<?php echo esc_url( apply_filters( 'blogghiamo_pro_theme_url', 'https://crestaproject.com/demo/blogghiamo-pro/' ) ); ?>" class="button button-primary docs" target="_blank"><?php esc_html_e( 'View PRO version Demo', 'blogghiamo' ); ?></a>

					<a href="<?php echo esc_url( apply_filters( 'blogghiamo_pro_theme_url', 'https://wordpress.org/support/theme/blogghiamo/reviews/' ) ); ?>" class="button button-secondary docs" target="_blank"><?php esc_html_e( 'Rate this theme', 'blogghiamo' ); ?></a>
				</p>
				</div>

				<div class="cresta-screenshot">
					<img src="<?php echo esc_url( get_template_directory_uri() ) . '/screenshot.png'; ?>" />
				</div>
			</div>
		</div>

		<h2 class="nav-tab-wrapper">
			<a class="nav-tab <?php if ( empty( $_GET['tab'] ) && isset( $_GET['page'] ) && $_GET['page'] == 'blogghiamo-welcome' ) echo 'nav-tab-active'; ?>" href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'blogghiamo-welcome' ), 'themes.php' ) ) ); ?>">
				<?php echo esc_html($theme->display( 'Name' )); ?>
			</a>
			<a class="nav-tab <?php if ( isset( $_GET['tab'] ) && $_GET['tab'] == 'free_vs_pro' ) echo 'nav-tab-active'; ?>" href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'blogghiamo-welcome', 'tab' => 'free_vs_pro' ), 'themes.php' ) ) ); ?>">
				<?php esc_html_e( 'Free Vs PRO', 'blogghiamo' ); ?>
			</a>
			<a class="nav-tab <?php if ( isset( $_GET['tab'] ) && $_GET['tab'] == 'changelog' ) echo 'nav-tab-active'; ?>" href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'blogghiamo-welcome', 'tab' => 'changelog' ), 'themes.php' ) ) ); ?>">
				<?php esc_html_e( 'Changelog', 'blogghiamo' ); ?>
			</a>
		</h2>
		<?php
	}

	/**
	 * Welcome screen page.
	 */
	public function welcome_screen() {
		$current_tab = empty( $_GET['tab'] ) ? 'about' : sanitize_title( wp_unslash($_GET['tab']) );

		// Look for a {$current_tab}_screen method.
		if ( is_callable( array( $this, $current_tab . '_screen' ) ) ) {
			return $this->{ $current_tab . '_screen' }();
		}

		// Fallback to about screen.
		return $this->about_screen();
	}

	/**
	 * Output the about screen.
	 */
	public function about_screen() {
		$theme = wp_get_theme( get_template() );
		?>
		<div class="wrap about-wrap">

			<?php $this->intro(); ?>

			<div class="changelog point-releases">
				<div class="under-the-hood two-col">
					<div class="col">
						<h3><?php esc_html_e( 'Theme Customizer', 'blogghiamo' ); ?></h3>
						<p><?php esc_html_e( 'All Theme Options are available via Customize screen.', 'blogghiamo' ) ?></p>
						<p><a href="<?php echo esc_url(admin_url( 'customize.php' )); ?>" class="button button-secondary"><?php esc_html_e( 'Customize', 'blogghiamo' ); ?></a></p>
					</div>

					<div class="col">
						<h3><?php esc_html_e( 'Got theme support question?', 'blogghiamo' ); ?></h3>
						<p><?php esc_html_e( 'Please put it in our support forum.', 'blogghiamo' ) ?></p>
						<p><a target="_blank" href="<?php echo esc_url( 'https://wordpress.org/support/theme/blogghiamo/' ); ?>" class="button button-secondary"><?php esc_html_e( 'Support', 'blogghiamo' ); ?></a></p>
					</div>

					<div class="col">
						<h3><?php esc_html_e( 'Need more features?', 'blogghiamo' ); ?></h3>
						<p><?php esc_html_e( 'Upgrade to PRO version for more exciting features.', 'blogghiamo' ) ?></p>
						<p><a target="_blank" href="<?php echo esc_url( 'https://crestaproject.com/downloads/blogghiamo/' ); ?>" class="button button-secondary"><?php esc_html_e( 'Info about PRO version', 'blogghiamo' ); ?></a></p>
					</div>

					<div class="col">
						<h3>
							<?php
							esc_html_e( 'Translate', 'blogghiamo' );
							echo ' ' . esc_html($theme->display( 'Name' ));
							?>
						</h3>
						<p><?php esc_html_e( 'Click below to translate this theme into your own language.', 'blogghiamo' ) ?></p>
						<p>
							<a target="_blank" href="<?php echo esc_url( 'http://translate.wordpress.org/projects/wp-themes/blogghiamo/' ); ?>" class="button button-secondary">
								<?php
								esc_html_e( 'Translate', 'blogghiamo' );
								echo ' ' . esc_html($theme->display( 'Name' ));
								?>
							</a>
						</p>
					</div>
				</div>
			</div>

			<div class="return-to-dashboard cresta">
				<?php if ( current_user_can( 'update_core' ) && isset( $_GET['updated'] ) ) : ?>
					<a href="<?php echo esc_url( self_admin_url( 'update-core.php' ) ); ?>">
						<?php is_multisite() ? esc_html_e( 'Return to Updates', 'blogghiamo' ) : esc_html_e( 'Return to Dashboard &rarr; Updates', 'blogghiamo' ); ?>
					</a> |
				<?php endif; ?>
				<a href="<?php echo esc_url( self_admin_url() ); ?>"><?php is_blog_admin() ? esc_html_e( 'Go to Dashboard &rarr; Home', 'blogghiamo' ) : esc_html_e( 'Go to Dashboard', 'blogghiamo' ); ?></a>
			</div>
		</div>
		<?php
	}

		/**
	 * Output the changelog screen.
	 */
	public function changelog_screen() {
		?>
		<div class="wrap about-wrap">

			<?php $this->intro(); ?>

			<p class="about-description"><?php esc_html_e( 'View changelog below:', 'blogghiamo' ); ?></p>

			<?php
				$changelog_file = apply_filters( 'blogghiamo_changelog_file', get_template_directory() . '/readme.txt' );

				// Check if the changelog file exists and is readable.
				if ( $changelog_file && is_readable( $changelog_file ) ) {
					$changelog = file_get_contents( $changelog_file );
					$changelog_list = $this->parse_changelog( $changelog );

					echo wp_kses_post( $changelog_list );
				}
			?>
		</div>
		<?php
	}

	/**
	 * Parse changelog from readme file.
	 * @param  string $content
	 * @return string
	 */
	private function parse_changelog( $content ) {
		$matches   = null;
		$regexp    = '~==\s*Changelog\s*==(.*)($)~Uis';
		$changelog = '';

		if ( preg_match( $regexp, $content, $matches ) ) {
			$changes = explode( '\r\n', trim( $matches[1] ) );

			$changelog .= '<pre class="changelog">';

			foreach ( $changes as $index => $line ) {
				$changelog .= wp_kses_post( preg_replace( '~(=\s*Version\s*(\d+(?:\.\d+)+)\s*=|$)~Uis', '<span class="title">${1}</span>', $line ) );
			}

			$changelog .= '</pre>';
		}

		return wp_kses_post( $changelog );
	}

	/**
	 * Output the free vs pro screen.
	 */
	public function free_vs_pro_screen() {
		?>
		<div class="wrap about-wrap">

			<?php $this->intro(); ?>

			<p class="about-description"><?php esc_html_e( 'Upgrade to PRO version for more exciting features.', 'blogghiamo' ); ?></p>

			<table>
				<thead>
					<tr>
						<th class="table-feature-title"><h3><?php esc_html_e('Features', 'blogghiamo'); ?></h3></th>
						<th><h3><?php esc_html_e('Blogghiamo', 'blogghiamo'); ?></h3></th>
						<th><h3><?php esc_html_e('Blogghiamo PRO', 'blogghiamo'); ?></h3></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><h3><?php esc_html_e('Responsive Design', 'blogghiamo'); ?></h3></td>
						<td><span class="dashicons dashicons-yes"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Change Background', 'blogghiamo'); ?></h3></td>
						<td><span class="dashicons dashicons-yes"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Unlimited Text Color', 'blogghiamo'); ?></h3></td>
						<td><span class="dashicons dashicons-yes"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Choose Social Incons', 'blogghiamo'); ?></h3></td>
						<td><span class="dashicons dashicons-yes"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('RTL Support', 'blogghiamo'); ?></h3></td>
						<td><span class="dashicons dashicons-yes"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Powerful theme options', 'blogghiamo'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Choose share buttons', 'blogghiamo'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Choose sidebar position', 'blogghiamo'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Animations', 'blogghiamo'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Loading Page', 'blogghiamo'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Font switcher', 'blogghiamo'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Beautiful posts slider', 'blogghiamo'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Breaking News', 'blogghiamo'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Breadcrumb', 'blogghiamo'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Post views counter', 'blogghiamo'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('7 Shortcodes', 'blogghiamo'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('12 Exclusive Widgets', 'blogghiamo'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Related Posts Box', 'blogghiamo'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Information About Author Box', 'blogghiamo'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td class="btn-wrapper">
							<a href="<?php echo esc_url( apply_filters( 'blogghiamo_pro_theme_url', 'https://crestaproject.com/demo/blogghiamo-pro/' ) ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'View PRO version demo', 'blogghiamo' ); ?></a>
							<a href="<?php echo esc_url( apply_filters( 'blogghiamo_pro_theme_url', 'https://crestaproject.com/downloads/blogghiamo/' ) ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'More Information', 'blogghiamo' ); ?></a>
						</td>
					</tr>
				</tbody>
			</table>

		</div>
		<?php
	}
}

endif;

return new Blogghiamo_Admin();
