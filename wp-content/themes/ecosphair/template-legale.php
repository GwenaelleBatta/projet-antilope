<?php /* Template Name: Legale page template */ ?>
<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
	<main class="layout__legales">
		<div class="legales__position">
			<section aria-labelledby="legales" class="legales">
				<h2 id="legales" class="legales__title" aria-level="2"><?= get_the_title(); ?></h2>
			</section>
			<div class="legales__content">
				<section aria-labelledby="coordinates" class="legales__section">
					<h2 id="coordinates" class="coordinate__title"
						aria-level="2"><?= __('Coordonnées', 'ecosphair') ?></h2>
					<section aria-labelledby="coordinate" class="coordinates" itemscope itemtype="https://schema.org/Person">
						<h3 id="coordinate" class="coordinates__title hidden" aria-level="3"><?=__('Mes coordonnées')?></h3>
						<section aria-labelledby="mail" class="coordinates__mail">
							<h4 id="mail" class="coordinates__title" aria-level="4"><?= __('E-mail', 'ecosphair') ?></h4>
							<p class="coordinates__mail mail" itemprop="email">
								<a href="mailto:ecosphair@issep.com">ecosphair@issep.com</a>
							</p>
						</section>
						<section aria-labelledby="phone" class="coordinates__phone">
							<h4 id="phone" class="coordinates__title" aria-level="4"><?= __('Numéro de téléphone', 'ecosphair') ?></h4>
							<p class="coordinates__mail phone" itemprop="telephone">
								+32 (0)4 229 82 68
							</p>
						</section>
						<section aria-labelledby="address" class="coordinates__address" itemscope itemtype="https://schema.org/PostalAddress">
							<h4 id="address" class="coordinates__title" aria-level="4"><?= __('Adresse', 'ecosphair') ?></h4>
							<p itemprop="streetAddress" class="coordinates__adress">
								rue du Chéra, 200
							</p>
							<p itemprop="postalCode" class="coordinates__postal">
								4000 LIÈGE
							</p>
						</section>
					</section  >
				</section>
				<section aria-labelledby="confidentiality" class="confident">
					<h2 id="confidentiality" class="confident__title"><?= __('Clauses de confidentialité', 'ecosphair') ?></h2>
					<p class="confident__text">
						<?= get_the_content() ?>
					</p>
				</section>
			</div>
		</div>
	</main>
<?php endwhile; endif; ?>
<?php get_footer(); ?>