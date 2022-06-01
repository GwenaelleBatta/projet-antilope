<?php get_header(); ?>
	<main class="layout__article">
		<section aria-labelledby="learn_more" class="layout__articles articles">
			<h2 id="learn_more" class="articles__title" aria-level="2"><?= __('Si vous voulez en savoir encore plus', 'ecosphair') ?></h2>
			<section aria-labelledby="articles" class="articles__article articles">
				<h3 id="articles"  class="article__title" aria-level="3"><?= __('Quelques articles', 'ecosphair') ?></h3>
				<div class="article__list">
					<?php if (($articles = ecosphair_get_articles())->have_posts()):while ($articles->have_posts()): $articles->the_post(); ?>
						<article aria-labelledby="<?= get_post_field('post_name') ?>" class="article__article">
							<a href="<?= get_field('article') ?>"
							   class="article__link"><?= __('Voir plus sur', 'ecosphair') ?> <?= get_the_title() ?></a>
							<div class="article__cards">
								<header class="article__head">
									<h4 id="<?= get_post_field('post_name') ?>" class="article__title" aria-level="4"><?= get_the_title() ?></h4>
								</header>
								<figure class="article__fig">
									<?= get_the_post_thumbnail(null, 'post-thumbnail', ['class' => 'article__thumb']); ?>
								</figure>
							</div>
						</article>
					<?php endwhile; ?>
					<?php else: ?>
						<p class="article__empty"><?= __('Il n\'y a pas de nouveaux articles', 'ecosphair') ?></p>
					<?php endif; ?>
				</div>
			</section>
			<section aria-labelledby="videos" class="articles__video videos">
				<h3 id="videos" class="video__title" aria-level="3"><?= __('Quelques vidéos', 'ecosphair') ?></h3>
				<div class="video__list">
					<?php if (($videos = ecosphair_get_videos())->have_posts()):while ($videos->have_posts()): $videos->the_post(); ?>
						<article aria-labelledby="<?= get_post_field('post_name') ?>" class="video">
							<a href="<?= get_field('videos') ?>"
							   class="video__link"><?= __('Voir plus sur', 'ecosphair') ?> <?= get_the_title() ?></a>
							<div class="video__cards">
								<header class="video__head">
									<h4 id="<?= get_post_field('post_name') ?>" class="video__title" aria-level="4"><?= get_the_title() ?></h4>
								</header>
								<figure class="video__fig">
									<?= get_the_post_thumbnail(null, 'post-thumbnail', ['class' => 'video__thumb']); ?>
								</figure>
							</div>
						</article>
					<?php endwhile; ?>
					<?php else: ?>
						<p class="article__empty"><?= __('Il n\'y a pas de nouvelles vidéos', 'ecosphair') ?></p>
					<?php endif; ?>
				</div>
			</section>
		</section>
	</main>
<?php get_footer(); ?>