<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
	<main class="layout__singleModule">
		<section aria-labelledby="module" class="singleModule">
			<div class="singleModule__intro">
				<div class="singleModule__content">
					<h2 id="module" class="singleModule__title" aria-level="2"><?= get_the_title() ?></h2>
					<?php the_content(); ?>
				</div>
				<a href="<?= get_post_type_archive_link('module'); ?>"
				   class="singleModule__links"> <?= __('Autres modules', 'ecosphair') ?></a>
				<figure class="singleModule__fig">
					<?= get_the_post_thumbnail(null, 'medium_large', ['class' => 'singleModule__logo']); ?>
				</figure>
			</div>
			<div class="singleModule__questions">
				<section aria-labelledby="why" class="singleModule__why">
					<h3 id="why" class="singleModule__title" aria-level="3"><?= __('Pourquoi ?', 'ecosphair') ?></h3>
					<p class="singleModule__paragraph"><?= get_field('pourquoi') ?></p>
				</section>
				<section aria-labelledby="who" class="singleModule__who">
					<h3 id="who" class="singleModule__title" aria-level="3"><?= __('Pour qui ?', 'ecosphair') ?></h3>
					<p class="singleModule__paragraph"><?= get_field('qui') ?></p>
				</section>
			</div>
			<div class="singleModule__picture">
				<div class="singleModule__galerie">
					<figure class="singleModule__figure">
						<img src="<?= get_field('galerie1') ?>"
							 alt="<?= __('Photo du modules ', 'ecosphair') ?>">
					</figure>
				</div>
				<div class="singleModule__galerie">
					<figure class="singleModule__figure">
						<img src="<?= get_field('galerie2') ?>"
							 alt="<?= __('Photo du modules ', 'ecosphair') ?>">
					</figure>
				</div>
				<div class="singleModule__galerie">
					<figure class="singleModule__figure">
						<img src="<?= get_field('galerie3') ?>"
							 alt="<?= __('Photo du modules ', 'ecosphair') ?>">
					</figure>
				</div>
			</div>
		</section>
	</main>
<?php endwhile; ?>
<?php endif; ?>
<?php get_footer() ?>