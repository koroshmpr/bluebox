<a href="<?php the_permalink(); ?>" class="flex flex-col gap-y-4 group text-white/70 hover:text-white/90 border-e border-transparent hover:border-white/5 transition-all duration-500">
	<div class="flex justify-between gap-x-3 items-start">
		<span class="w-10/12 text-xl font-bold"><?php the_title(); ?></span>
		<span class="w-12 p-3 flex justify-center group-hover:bg-white group-hover:shadow-[0_0_122px_30px_#ffffff1f] transition-all group-hover:text-black bg-foreground aspect-square text-white">
							<?= sprintf("%02d", $args['index'] ?? '1'); ?>
						</span>
	</div>
	<img class="w-10/12 object-cover aspect-square opacity-65 group-hover:opacity-100 transition-all" height="250" src="<?= the_post_thumbnail_url(); ?>"
		 alt="image of the <?= get_the_title(); ?> post">
	<?= shamsi_date('d F, Y', get_the_modified_time('U')); ?>
	<p class="w-10/12 text-white/60 text-sm text-justify"><?= wp_trim_words(get_the_content(), 25); ?></p>
</a>
