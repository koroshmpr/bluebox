<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no `home.php` file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bluebox
 */

get_header();
?>
	<header class="container max-w-content pb-8 pt-2 lg:pt-24">
		<h1 class="text-white text-3xl lg:text-7xl"><?php single_post_title(); ?></h1>
	</header>
	<section class="container max-w-content grid lg:grid-cols-3 gap-12">
<?php
if (have_posts()) :
	$paged = max(1, get_query_var('paged', 1)); // Get current page number
	$posts_per_page = get_query_var('posts_per_page', get_option('posts_per_page'));
	$i = ($paged - 1) * $posts_per_page + 1; // Calculate starting index
	// Load posts loop.
	while (have_posts()) :
		the_post();
		$args = array(
			'index' => $i
		);
		get_template_part('template-parts/blog/archive-card', null, $args);
		$i++;
	endwhile;
	?>
	</section>
	<?php get_template_part('template-parts/global/pagination'); ?>
	<?php
	// Reset query
	wp_reset_postdata();
endif;

get_footer();
