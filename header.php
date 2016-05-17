<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Rico-Amber
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<title>rico-amber</title>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link href="https://fonts.googleapis.com/css?family=Oxygen:400,300,700" rel="stylesheet" type="text/css">
<link href="<?php bloginfo('template_directory'); ?>/css/slick.css" rel="stylesheet" type="text/css" />
<link href="<?php bloginfo('template_directory'); ?>/css/slick-theme.css" rel="stylesheet" type="text/css" />
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<!-- useful for screen readers -->
	<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'rico-amber' ); ?></a>
	<header>
		<div class="searchBar"></div>
			<nav role="navigation">
				<div class="nav-content">
					<button type="button" class="navbar-toggle">
						<span class="navbar-toggle-bar"></span>
						<span class="navbar-toggle-bar"></span>
						<span class="navbar-toggle-bar"></span>
					</button>
					<div class="logo">
						<img src="<?php echo(get_template_directory_uri());?>/images/amber-logo.svg" alt="amber logo">
					</div>
					<?php wp_nav_menu( array(
						'theme_location' => 'primary',
						'menu_id' => 'nav-menu',
						'container' => '',
						'class' => '',
						'walker' => new Rico_Nav_List()
					) ); ?>
				</div>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
