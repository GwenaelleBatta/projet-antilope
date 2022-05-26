<?php get_header(); ?>
	<main>
		<section aria-labelledby="projet" class="layout__project projects">
			<h2 id="projet" class=" projects__title" aria-level="2"><?= __('Modules', 'ecosphair') ?></h2>
			<div class="projects__list">
				<?php if (($modules = ecosphair_get_modules(10))->have_posts()):while ($modules->have_posts()): $modules->the_post(); ?>
					<article aria-labelledby="singleModule" class="project">
						<a href="<?= get_the_permalink() ?>"
						   class="project__link"><?= __('Voir plus sur ', 'ecosphair') ?><?= get_the_title() ?></a>
						<div class="project__cards">
							<header class="project__head">
								<h3 id="singleModule" class="project__title" aria-level="3"><?= get_the_title() ?></h3>
							</header>
							<div class="project__image">
								<figure class="project__fig">
									<?= get_the_post_thumbnail(null, 'post-thumbnail', ['class' => 'project__thumb']); ?>
								</figure>
								<div class="project__circle"></div>
								<div class="project__circle"></div>
								<div class="project__circle"></div>
							</div>
							<div class="project__excerpt">
								<p>
									<?= get_field('presentation') ?>
								</p>
							</div>
						</div>
					</article>
				<?php endwhile; ?>
				<?php else: ?>
					<p class="project__empty"><?= __('Il n\'y a pas de nouveaux projets', 'ecosphair') ?></p>
				<?php endif; ?>
			</div>
		</section>
	</main>
<?php get_footer(); ?>