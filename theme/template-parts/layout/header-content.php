<header
	:class="scrollingDown ? '-translate-y-full' : (scrollingUp ? 'translate-y-0' : '')"
	class="fixed top-0 left-0 w-full bg-background backdrop-blur-sm transition-transform duration-600 z-50"
	id="header"
>
	<nav class="container flex items-center lg:h-24 h-20 py-2 lg:px-0 justify-between">
		<!-- Mobile Menu Button -->
		<button @click="menuOpen = true" aria-labelledby="open mobileMenu" class="text-white lg:hidden">
			<svg width="30" height="30" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
				<path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
			</svg>
		</button>

		<!-- Desktop Menu -->
		<?php
		wp_nav_menu(
			array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
				'menu_class' => 'max-lg:hidden flex gap-x-3 justify-center lg:justify-start',
				'depth' => 1,
				'walker' => new Footer_Walker_Nav_Menu(),
			)
		);
		?>

		<!-- Logo -->
		<?php
		$args = array(
			'logoSize' => 'h-full max-w-30 lg:max-w-48'
		);
		get_template_part('template-parts/global/logo', null, $args);
		?>
	</nav>
</header>

<!-- Mobile Menu Modal -->
<div
	@keydown.escape.window="menuOpen = false" id="mobileMenu"
	:class="menuOpen ? '!z-50' : 'z-[-1] opacity-0'"
	class="fixed inset-0 flex justify-center z-[-1] items-end lg:hidden backdrop-blur-sm transition-all duration-300"
	@click.self="menuOpen = false"
>
	<div
		class="bg-foreground text-white w-full max-w-sm p-6 rounded-t-2xl translate-y-full transition-all"
		:class="menuOpen ? 'delay-200 !translate-y-0' : 'translate-y-full'"
	>
		<!-- Close Button -->
		<button @click="menuOpen = false" aria-label="close menu" class="absolute top-4 right-4 text-white">
			<svg width="25" height="25" fill="currentColor" viewBox="0 0 16 16">
				<path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
			</svg>
		</button>

		<!-- Mobile Menu Items -->
		<nav class="mt-10">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'mobile-menu',
					'menu_class' => 'flex flex-col gap-y-4 text-base text-center font-medium',
					'depth' => 1,
				)
			);
			?>
		</nav>
	</div>
</div>
