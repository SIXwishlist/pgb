<?php
/**
* block-navtop.php
*
* The NavTop block is visible on SM and larger screen sizes.On XS screens, menu items are moved into main nav.
*
* @return string
*/

$is_affix = ( 'fixed' === pgb_get_option( 'nav_position', 'static' ) ? true : false );
$topmenustyle = sprintf( 'navbar-%s-top', pgb_get_option( 'nav_position', 'static' ) );
$topnav_width = pgb_get_option( 'topnav_width', 'container' );
$topnav_width_inner = ( 'container-fluid' === $topnav_width ? 'container' : 'container-fluid' );

?>
<nav id="top-nav" class="navbar navbar-inverse site-navigation hidden-xs <?=$topmenustyle; ?> <?=$topnav_width; ?>" <?php echo ( $is_affix ? 'data-spy="affix" data-offset-top="0"' : '' ); ?> >
	<div  class="<?=$topnav_width_inner; ?> nav-contain" role="navigation">
		<div class="navbar-inner">
			<?php if( '1' === pgb_get_option( 'nav_search' ) ) get_template_part( 'searchform', 'nav' ); // Show search form ?>
			<?php // Main Menu
			wp_nav_menu(
				array(
					'theme_location' => 'secondary',
					'container' => false,
					'menu_class' => 'nav navbar-nav navbar-right',
					'fallback_cb' => '',
					'menu_id' => 'top-menu',
					'walker' => new wp_bootstrap_navwalker()
				)
			);
			?>
		</div>
	</div>
</nav>