<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package bluebox
 */

get_header();
?>
<?php get_template_part('template-parts/global/post-hero'); ?>
	<section class="flex max-xl:flex-col max-lg:px-5 gap-x-12 gap-y-5 pt-8 items-start container">
		<article
			id="post-<?php the_ID(); ?>" <?php post_class('entry-content prose prose-neutral text-white/70 prose-img:mx-auto text-justify prose-strong:text-white prose-headings:text-white prose-a:no-underline prose-a:text-[#f3bafd]'); ?>>
			<?php the_content(); ?>
		</article>
		<aside
			class="xl:sticky xl:basis-1/3 top-24 max-md:w-full xl:bg-white/5 max-xl:order-first rounded-xl">
			<?php get_template_part('template-parts/blog/single/post-information'); ?>
			<?php get_template_part('template-parts/blog/single/toc'); ?>
			<?php
			$args = array(
				'class' => 'max-lg:hidden'
			);
			get_template_part('template-parts/blog/single/related-portfolio', null, $args); ?>
			<?php
			$args = array(
				'class' => 'max-lg:hidden'
			);
			get_template_part('template-parts/blog/single/share-button', null, $args); ?>
		</aside>
	</section>
	<?php
	$args = array(
		'class' => 'lg:hidden px-5'
	);
	get_template_part('template-parts/blog/single/related-portfolio', null, $args); ?>
	<?php
	$args = array(
		'class' => 'lg:hidden px-5'
	);
	get_template_part('template-parts/blog/single/share-button', null, $args); ?>
<?php get_template_part('template-parts/blog/single/next-previous-posts'); ?>
<?php get_template_part('template-parts/blog/single/related-posts'); ?>
<?php
get_footer();
