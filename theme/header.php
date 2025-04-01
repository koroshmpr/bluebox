<?php
/**
 * The header for our theme
 *
 * This is the template that displays the `head` element and everything up
 * until the `#content` element.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bluebox
 */

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<?php
	$focus_keyword = get_post_meta(get_the_ID(), 'rank_math_focus_keyword', true);
	?>
	<meta name="keywords" content="<?= $focus_keyword ??  get_bloginfo('name'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
	<?php
	$scripts = get_field('header-scripts', 'option');
	echo $scripts ?? '';
	?>
</head>

<body
	x-data="{
        lastScroll: 0,
        scrollingDown: false,
        scrollingUp: false,
        menuOpen: false
    }"
	x-init="window.addEventListener('scroll', () => {
        let currentScroll = window.pageYOffset;
        scrollingDown = currentScroll > lastScroll && currentScroll > 50;
        scrollingUp = currentScroll < lastScroll;
        lastScroll = currentScroll;
    })"
	<?php body_class('bg-background font-peyda'); ?>>
<?php $scripts = get_field('body-scripts', 'option');
echo $scripts ?? ''; ?>
<?php wp_body_open(); ?>
<?php get_template_part('template-parts/layout/header-content'); ?>
<main class="relative <?= is_singular('') ? 'bg-[#131313]' : 'pt-24'; ?> lg:pt-28" id="<?= get_post_type() ?? ''; ?>-<?= the_ID(); ?>">
