<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package blogghiamo
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div id="secondary" class="widget-area">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div><!-- #secondary -->
