<?php /* Template Name: About page template */; ?>
<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
	<main class="layout__about">
		<section aria-labelledby="about" class="about">
			<h2 id="about" class="about__title slide-in" aria-level="2"><?= get_the_title() ?></h2>
			<section aria-labelledby="why" class="about__section why">
				<div class="why__position">
					<h3 id="why" class="why__title slide-in" aria-level="3"><?= __('Pourquoi ?', 'ecosphair') ?></h3>
					<div class="why__wysiwyg slide-in">
						<?= get_field('pourquoi') ?>
					</div>
				</div>
				<figure class="why__figure ">
					<?= get_the_post_thumbnail(null, 'post-thumbnail', ['class' => 'why__thumb']); ?>
				</figure>
			</section>
			<section aria-labelledby="history" class="about__section history">
				<h3 id="history" class="history__title slide-in" aria-level="3"><?= __('Historique', 'ecosphair') ?></h3>
				<svg viewBox="0 0 50% 50%" xmlns="http://www.w3.org/2000/svg" class="history__svg">
					<line x1="20" y1="0" x2="20" y2="1200"  class="history__line"/>
				</svg>
				<div class="history__list">
					<?php if (($history = ecosphair_get_history())->have_posts()):while ($history->have_posts()): $history->the_post(); ?>
						<article aria-labelledby="<?= get_the_title() ?>" class="article__history slide-in">
							<div class="history__cards">
								<header class="history__head">
									<h4 id="<?= get_the_title() ?>" aria-level="4" class="history__title"><?= get_the_title() ?></h4>
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
				</div>
			</section>
			<section aria-labelledby="who" class="about__section who">
				<h3 id="who" class="who__title slide-in" aria-level="3"><?=__('Avec Qui ?', 'ecosphair')?></h3>
				<?php if (($partners = ecosphair_get_partners())->have_posts()):while ($partners->have_posts()): $partners->the_post(); ?>
					<article aria-labelledby="<?= get_the_title() ?>" class="who__article">
						<div class="who__text">
							<h4 id="<?= get_the_title() ?>" class="who__title slide-in" aria-level="4"><?= get_the_title() ?></h4>
							<p class="who__text slide-in"><?=get_the_content() ?></p>
							<a class="who__link slide-in" href="<?= get_the_permalink(ecosphair_get_template_page('template-contact')) ?>"><?= __('Contacter', 'ecosphair') ?></a>
						</div>
						<figure class="who__figure"><span class="actor__circle "></span>
							<span class="actor__circle "></span>
							<span class="actor__circle"></span>
							<span class="actor__circle"></span>
							<?= get_the_post_thumbnail(null, 'post-thumbnail', ['class' => 'trip__thumb ']); ?>
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
