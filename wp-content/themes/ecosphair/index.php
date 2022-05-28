<?php get_header(); ?>
<main class="layout">
	<section aria-labelledby="intro" class="layout__intro intro">
		<div class="intro__position">
			<h2 id="intro" class="intro__title" aria-level="2"><?= get_bloginfo('name'); ?><?= __(', la vie telle que nous la connaissons sur terre', 'ecosphair') ?> </h2>
			<a class="intro__links"
			   href="<?= get_the_permalink(ecosphair_get_template_page('template-contact')) ?>"><?= __('Contacter', 'ecosphair') ?></a>
		</div>
		<figure class="intro__figure">
			<?= get_the_post_thumbnail(null, 'post-thumbnail' , ['class' => 'intro__thumb']) ?>
		</figure>
	</section>
	<section aria-labelledby="help" class="layout__help help">
		<div class="help__content">
			<h2 id="help" class="help__title" aria-level="2"><?= __('En quoi ', 'ecosphair') ?><?= get_bloginfo('name'); ?> <?= __(' peut vous aider ?', 'ecosphair') ?></h2>
			<p class="help__text"><?= __('"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur?', 'ecosphair') ?>
			</p>
			<a href="<?= get_the_permalink(ecosphair_get_template_page('template-about')) ?>"
			   class="help__links"> <?= __('En savoir plus', 'ecosphair') ?></a>
		</div>
		<figure class="help__figure">
			<span class="help__circle"></span>
			<span class="help__circle"></span>
			<span class="help__circle"></span>
			<?= get_the_post_thumbnail(null, 'post-thumbnail', ['class' => 'help__thumb']); ?>
		</figure>
	</section>
	<section aria-labelledby="modules" class="layout__module modules">
		<h2 id="modules" class="modules__title" aria-level="2"><?= __('Quelles sont les solutions proposées ? ', 'ecosphair') ?></h2>
		<a href="<?= get_post_type_archive_link('module'); ?>"
		   class="modules__links"> <?= __('Voir tous les modules', 'ecosphair') ?></a>
		<div class="modules__module module">
			<?php if (($modules = ecosphair_get_modules(3))->have_posts()):while ($modules->have_posts()): $modules->the_post(); ?>
				<article aria-labelledby="listModule" class="article__module">
					<div class="module__position">
						<div class="module__cards">
							<div class="module__links">
								<a href="<?= get_the_permalink() ?>"
								   class="module__link"><?= __('Voir plus sur', 'ecosphair') ?> <?= get_the_title() ?></a>
							</div>
							<header class="module__head">
								<h3 id="listModule" class="module__title" aria-level="3"><?= get_the_title() ?></h3>
							</header>
							<figure class="module__fig">
								<?= get_the_post_thumbnail(null, 'post-thumbnail', ['class' => 'modules__thumb']); ?>
							</figure>
							<div class="module__excerpt">
								<p>
									<?= get_field('presentation') ?>
								</p>
							</div>
						</div>
					</div>
				</article>
			<?php endwhile; ?>
			<?php else: ?>
				<p class="project__empty"><?= __('Il n\'y a pas de nouveaux projets', 'ecosphair') ?></p>
			<?php endif; ?>
		</div>
	</section>
	<section aria-labelledby="actors" class="layout__who actor">
		<h2 id="actors" class="actor__title" aria-level="2"> <?= __('Avec qui ?', 'ecosphair') ?></h2>
		<?php if (($partners = ecosphair_get_partners())->have_posts()):while ($partners->have_posts()): $partners->the_post(); ?>
			<article aria-labelledby="actor" class="actor__article">
				<div class="actor__text">
					<h3 id="actor" class="actor__title" aria-level="3"><?= get_the_title() ?></h3>
					<p class="actor__text"><?= get_field('excerpt') ?></p>
					<a href="<?= get_the_permalink(ecosphair_get_template_page('template-about')) ?>"
					   class="actor__link"><?= __('En savoir plus', 'ecosphair') ?></a>
				</div>
				<figure class="actor__figure">
					<span class="actor__circle"></span>
					<span class="actor__circle"></span>
					<span class="actor__circle"></span>
					<?= get_the_post_thumbnail(null, 'medium_large', ['class' => 'trip__thumb']); ?>
				</figure>
			</article>
		<?php endwhile; ?>
		<?php endif; ?>
	</section>
	<section aria-labelledby="articles" class="layout__article articles">
		<h2 id="articles" class="article__title" aria-level="2"><?= __('Quelques articles sur nous', 'ecosphair') ?></h2>
		<a href="<?= get_post_type_archive_link('article'); ?>"
		   class="articles__links"><?= __('Voir tous les articles', 'ecosphair') ?></a>
		<div class="articles__article article">
			<?php if (($articles = ecosphair_get_articles(3))->have_posts()):while ($articles->have_posts()): $articles->the_post(); ?>
				<article aria-labelledby="article" class="article__article">
					<div class="article__position">
						<div class="article__links">
							<a href="<?= get_field('article') ?>"
							   class="article__link"><?= __('Voir plus sur', 'ecosphair') ?><?= get_the_title() ?></a>
						</div>
						<div class="article__cards">
							<header class="article__head">
								<h3 id="article" class="article__title" aria-level="3"><?= get_the_title() ?></h3>
							</header>
							<figure class="article__fig">
								<?= get_the_post_thumbnail(null, 'post-thumbnail', ['class' => 'article__thumb']); ?>
							</figure>
						</div>
					</div>
				</article>
			<?php endwhile; ?>
			<?php else: ?>
				<p class="project__empty"> <?= __('Il n\'y a pas de nouveaux articles', 'ecosphair') ?></p>
			<?php endif; ?>
		</div>
	</section>
</main>
<?php get_footer(); ?>
