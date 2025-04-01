<?php
$customersGroup = get_field('customers');
$customers = $customersGroup['customers'];

?>

<section class="bg-foreground  py-10 lg:py-32">
	<div class="container max-w-content">
		<div class="relative flex justify-center lg:mb-24 mb-16">
			<h3 class="lg:text-4xl text-lg text-center font-bold text-white"><?= $customersGroup['title'] ?? ''; ?></h3>
			<span
				class="absolute inset-0 text-center -translate-y-full text-white/5 lg:text-8xl uppercase text-3xl"><?= $customersGroup['subtitle'] ?? ''; ?></span>
		</div>

		<?php if ($customers) : ?>
			<?php foreach ($customers as $customer): ?>
				<article
					class="grid lg:grid-cols-7 grid-cols-3 gap-8 max-lg:flex-wrap justify-center items-center text-white">
					<?php if (has_post_thumbnail()) : ?>
						<img src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php the_title_attribute(); ?>"
							 class="object-cover w-full aspect-square">
					<?php endif; ?>
				</article>
			<?php endforeach; ?>
		<?php endif; ?>
	</div>
</section>
