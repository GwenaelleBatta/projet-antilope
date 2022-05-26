<?php /* Template Name: About page template */; ?>
<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
	<main class="layout__about">
		<section class="about">
			<h2 class="about__title"><?= get_the_title() ?></h2>
			<section class="about__section why">
				<div class="why__position">
					<h3 class="why__title"><?= __('Pourquoi ?', 'ecosphair') ?></h3>
					<div class="why__wysiwyg">
						<?= get_field('pourquoi') ?>
					</div>
				</div>
				<figure class="why__figure">
					<?= get_the_post_thumbnail(null, 'post-thumbnail', ['class' => 'why__thumb']); ?>
				</figure>
			</section>
			<section class="about__section history">
				<h3 class="history__title"><?= __('Historique', 'ecosphair') ?></h3>
				<svg viewBox="0 0 50% 50%" xmlns="http://www.w3.org/2000/svg" class="history__svg">
					<line x1="20" y1="0" x2="20" y2="1200"  class="history__line"/>
				</svg>
				<ul class="history__list">
					<?php if (($history = ecosphair_get_history())->have_posts()):while ($history->have_posts()): $history->the_post(); ?>
						<article class="article__history">
							<div class="history__cards">
								<header class="history__head">
									<h4 class="history__title"><?= get_the_title() ?></h4>
								</header>
								<div class="history__excerpt">
									<p>
										<?= get_the_excerpt() ?>
									</p>
								</div>
							</div>
						</article>
					<?php endwhile; ?>
					<?php endif; ?>
				</ul>
			</section>
			<section class="about__section who">
				<h3 class="who__title"><?=__('Avec Qui ?', 'ecosphair')?></h3>
				<?php if (($partners = ecosphair_get_partners())->have_posts()):while ($partners->have_posts()): $partners->the_post(); ?>
					<article class="who__article">
						<div class="who__text">
							<h4 class="who__title"><?= get_the_title() ?></h4>
							<p class="who__text"><?=get_the_content() ?></p>
							<a class="who__link" href="<?= get_the_permalink(ecosphair_get_template_page('template-contact')) ?>"><?= __('Contacter', 'ecosphair') ?></a>
						</div>
						<figure class="who__figure">
							<?= get_the_post_thumbnail(null, 'post-thumbnail', ['class' => 'trip__thumb']); ?>
						</figure>
					</article>
				<?php endwhile; ?>
				<?php endif; ?>
			</section>
		</section>
	</main>
<?php endwhile; ?>
<?php endif; ?>
<?php get_footer() ?>
