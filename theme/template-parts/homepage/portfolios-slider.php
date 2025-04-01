<?php $portfolioSection = get_field('portfolio'); ?>
<section>
	<div class="swiper relative container ltr lg:mt-24 mt-12 post-slider"
		 data-index="portfolios" data-perfix="portfolio" data-space="0"
		 data-perpage="<?= $row ?? '4'; ?>" data-mobile="1.1" data-autoplay="100000" data-scroll="0" data-free="1">
		<div
			class="lg:absolute start-0 inset-y-0 lg:!w-[30vw] w-full justify-center lg:text-start text-stroke-3 text-transparent !stroke-white/30 flex items-center max-lg:h-[200px] lg:text-[7vw] text-center text-6xl max-lg:px-8">
			<?= $portfolioSection['first-slide'] ?>
		</div>
		<div class="swiper-wrapper pb-12 swiper-container">
			<!-- First Slide -->
			<div class="swiper-slide max-lg:hidden"></div>
			<div class="swiper-slide max-lg:hidden"></div>

			<?php
			$portfolios = $portfolioSection['portfolios'];
			foreach ($portfolios as $portfolio):
				if (!$portfolio) continue;

				// Get post details
				$post_id = $portfolio->ID;
				$title = get_the_title($post_id);
				$link = get_permalink($post_id);
				$image = get_the_post_thumbnail_url($post_id, 'full');
				$categories = get_the_terms($post_id, 'dsn-blackdsn-categories'); // Change 'portfolio_category' if needed
				$category_names = !empty($categories) ? implode(', ', wp_list_pluck($categories, 'name')) : 'Uncategorized';
				?>
				<div class="swiper-slide relative max-lg:border-2 border-black h-[50vh] lg:h-[90vh] overflow-hidden group">
					<?php if ($image): ?>
						<img src="<?= esc_url($image); ?>" alt="<?= esc_attr($title); ?>"
							 class="size-full group-hover:scale-125 duration-700 transition-all object-cover">
					<?php endif; ?>
					<a href="<?= esc_url($link); ?>"
					   class="absolute text-white/70 font-bold bg-gradient-to-t from-black/70 bottom-0 p-6 inset-0 gap-x-2 flex justify-end items-end text-center">
						<div class="flex flex-col gap-2 items-end justify-end">
							<p class="text-sm"><?= esc_html($category_names); ?></p>
							<h3 class="text-end text-lg font-semibold"><?= esc_html($title); ?></h3>
						</div>
						<div class="p-3 rounded-full border-2 border-white/70">
							<svg width="24" height="24" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
								<path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/>
							</svg>
						</div>
					</a>
				</div>
			<?php endforeach; ?>
			<div class="swiper-slide max-lg:hidden"></div>
			<div class="swiper-slide max-lg:hidden"></div>
			<!-- Last Slide -->
		</div>
		<div
			class="lg:absolute end-0 inset-y-0 w-full lg:!w-[30vw] lg:text-start text-stroke-3 justify-center text-transparent !stroke-white/30 flex items-center max-lg:h-[200px] lg:text-[7vw] text-center text-6xl max-lg:px-8">
			<?= $portfolioSection['last-slide'] ?>
		</div>
	</div>
</section>
