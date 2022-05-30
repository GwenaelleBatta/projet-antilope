<?php /* Template Name: Condition page template */ ?>
<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
	<main class="layout__conditions">
		<div class="conditions__position">
			<section aria-labelledby="conditions" class="conditions">
				<h2 id="conditions" class="conditions__title" aria-level="2"><?= get_the_title(); ?></h2>
			</section>
			<div class="conditions__content">
				<section aria-labelledby="coordinates" class="conditions__section">
					<h2 id="coordinates" class="coordinate__title"
						aria-level="2"><?= __('Dispositions générales', 'ecosphair') ?></h2>
				</section>
				<section class="confident">
					<h2 class="confident__title"><?= __('Modalités ', 'ecosphair') ?></h2>
					<p class="confident__text">
						<?= get_the_content() ?>
					</p>
				</section>
			</div>
		</div>
	</main>
<?php endwhile; endif; ?>
<?php get_footer(); ?>