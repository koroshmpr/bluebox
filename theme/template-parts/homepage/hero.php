<?php $hero = get_field('hero'); ?>
<section class="relative overflow-hidden lg:h-[80vh] h-[50vh] max-lg:pt-12 lg:pb-16">
	<div class="absolute bottom-0 inset-x-0 h-2/3 bg-gradient-to-t from-foreground from-60%"></div>
	<div class="container max-lg:w-full h-full relative">
		<img width="390" height="374"
			:class="scrollingDown ? 'scale-95' : (scrollingUp ? 'scale-105' : '')"
			class="absolute inset-0 w-full lg:h-[80vh] h-[50vh] transition-all duration-700 object-cover"
			src="<?= $hero['image']['url'] ?? ''; ?>" alt="<?= $hero['image']['url'] ?? ''; ?>">
		<div :class="scrollingDown ? 'lg:-translate-y-24 -translate-y-8 scale-90' : (scrollingUp ? 'scale-105' : '')"
			 class="absolute duration-700 transition-all bottom-24 text-white w-full inset-x-0 flex flex-col items-center gap-y-3">
			<div class="flex ltr items-center text-nowrap">
				<span class="lg:text-7xl text-4xl"><?= $hero['title'] ?? ''; ?></span>
				<span class="text-white/70 lg:text-6xl text-3xl font-thin"><?= $hero['adjectives'] ?? ''; ?></span>
			</div>
			<h1 class="lg:text-4xl text-2xl"><?= $hero['subtitle'] ?? ''; ?></h1>
		</div>
	</div>
</section>
