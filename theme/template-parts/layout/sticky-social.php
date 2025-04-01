<nav x-data="{ atBottom: false }"
	 x-init="window.addEventListener('scroll', () => {
         atBottom = (window.innerHeight + window.scrollY) >= document.body.offsetHeight - 100;
     })"
	 :class="atBottom ? 'opacity-0' : ''"
	 class="fixed max-lg:hidden inset-y-0 end-0 py-20 flex flex-col gap-y-5 justify-end items-center transition-opacity duration-300">

	<div class="flex flex-col gap-4 items-center justify-center lg:justify-end">
		<?php
		$socials = get_field('social', 'option');
		if ($socials):
			foreach ($socials as $social):?>
				<a aria-label="<?= esc_attr($social['name']); ?>"
				   class="text-white" target="_blank"
				   href="<?= esc_url($social['link']['url'] ?? ''); ?>">
					<?php
					$args = array('size' => 14);
					get_template_part('template-parts/svg/socials/' . esc_attr($social['name']), null, $args); ?>
				</a>
			<?php endforeach;
		endif;
		?>
	</div>

	<div class="rotate-90 text-xs aspect-square flex gap-1 justify-center items-center text-white">
		<div class="h-0.5 w-12 bg-white/70"></div>
		<span>FOLLOW US</span>
	</div>
</nav>
