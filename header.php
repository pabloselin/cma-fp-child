<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "container" div.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?> >
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
	<?php do_action( 'foundationpress_after_body' ); ?>

	<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) === 'offcanvas' ) : ?>
	<div class="off-canvas-wrapper">
		<?php get_template_part( 'template-parts/mobile-off-canvas' ); ?>
	<?php endif; ?>

	<?php do_action( 'foundationpress_layout_start' ); ?>

	<header class="site-header" role="banner">
		<div class="site-title-bar title-bar" <?php foundationpress_title_bar_responsive_toggle() ?>>
			<div class="title-bar-left">
				<button class="nav-menu-icon" type="button" data-toggle="<?php foundationpress_mobile_menu_id(); ?>"><i class="fa fa-bars"></i></button>
				<span class="site-mobile-title title-bar-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" title="<?php bloginfo( 'name' ); ?>">
						<img src="<?php echo cm_get_option('logo');?>" alt="<?php bloginfo( 'name' ); ?>" width="280" height="69">
					</a>
				</span>
			</div>
		</div>
		
		<nav class="site-navigation top-bar" role="navigation">
			<div class="site-info">
				<p><i class="fa fa-map-marker"></i> <?php echo cm_get_option('address');?> - <a href="tel:<?php echo cm_get_option('fono');?>"><i class="fa fa-phone"></i> <?php echo cm_get_option('fono');?></a> - <a href="mailto:<?php echo cm_get_option('site_email');?>"><i class="fa fa-envelope-o"></i> <?php echo cm_get_option('site_email');?></a></p>
			</div>

			<div class="top-search">
				<?php echo get_search_form();?>
			</div>
			<div class="top-bar-left">
				<div class="site-desktop-title top-bar-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<img src="<?php echo cm_get_option('logo');?>" alt="<?php bloginfo( 'name' ); ?>" width="500" height="123">
					</a>

				</div>
			</div>
			<div class="top-bar-right">
				<?php foundationpress_top_bar_r(); ?>

				<?php if ( ! get_theme_mod( 'wpt_mobile_menu_layout' ) || get_theme_mod( 'wpt_mobile_menu_layout' ) === 'topbar' ) : ?>
					<?php get_template_part( 'template-parts/mobile-top-bar' ); ?>
				<?php endif; ?>
			</div>
		</nav>

		<nav class="menu-interno">
			<?php foundationpress_bottom_bar(); ?>
		</nav>

		<nav class="enlaces-rapidos">
			<div class="wrapper">
				<span class="linklabel"><i class="fa fa-bolt"></i> </span><?php foundationpress_fast_links(); ?>
			</div>
		</nav>

	</header>

	<section class="container">
		<?php do_action( 'foundationpress_after_header' );
