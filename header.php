<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package _s
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<div class="banner">
		<div class="banner-title">
			<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		</div>
<!--		<form class="banner-search" action="">-->
<!--			<input type="text" name="s"/>-->
<!--			<button class="btn">Search</button>-->
<!--		</form>-->
		<form class="banner-search" method="get" action="<?php echo home_url( '/' ); ?>" role="search">
			<input class="search-query" type="text" name="s" id="s" placeholder="<?php esc_attr_e( 'Search...', 'hive_txtd' ) ?>" autocomplete="off" value="<?php the_search_query(); ?>"/>
			<button class="btn search-submit" id="searchsubmit">Search</button>
		</form>
	</div>
	<div class="sidebar"></div>
	<div class="container">
