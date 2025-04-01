<?php $about = get_field('about_us'); ?>
<section class="container mt-6 lg:mt-24 flex max-lg:flex-col relative justify-center items-start gap-x-12 gap-y-8 h-[50vh] max-lg:w-11/12 lg:h-[80vh]">
	<div
		:class="scrollingDown ? 'lg:translate-y-6 scale-95' : (scrollingUp ? '' : '')"
		class="text-white lg:basis-1/4 relative z-[1] lg:sticky top-36 duration-700 transition-all pb-24 flex flex-col gap-y-2">
		<h2 class="lg:text-4xl text-2xl"><?= $about['title'] ?? ''; ?></h2>
		<article class="text-justify max-lg:text-sm text-white/80 leading-7">
			<?= $about['content'] ?? ''; ?>
		</article>
	</div>
	<div :class="scrollingDown ? 'lg:scale-95' : (scrollingUp ? '' : '')"
		 class="lg:basis-2/5 basis-full max-lg:absolute h-full inset-0 z-[0] bg-cover bg-left transition-all duration-700">
		<img class="size-full object-cover" src="<?= $about['image']['url'] ?? ''; ?>" alt="">
	</div>
</section>
