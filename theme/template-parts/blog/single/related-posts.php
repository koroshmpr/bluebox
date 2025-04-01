<section class="container max-w-content mt-12 pb-16">
	<h6 class="pb-8 text-center text-white text-3xl fw-bold">مقالات مرتبط</h6>
	<div class="grid lg:grid-cols-3 gap-3">
		<?php
		$args = array(
			'post_type' => 'post',
			'post_status' => 'publish',
			'posts_per_page' => '6',
			'ignore_sticky_posts' => true
		);
		$loop = new WP_Query($args);
		if ($loop->have_posts()) : $i = 0;
			/* Start the Loop */
		while (have_posts()) :
			the_post();
			$args = array(
				'index' => $i
			);
			get_template_part('template-parts/blog/single/card-single', null, $args);
			$i++;
		endwhile;
		endif;
		wp_reset_postdata(); ?>
	</div>
</section>
