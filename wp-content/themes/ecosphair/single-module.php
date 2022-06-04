<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
	<main class="layout__singleModule">
		<section aria-labelledby="module" class="singleModule">
			<div class="singleModule__intro">
				<div class="singleModule__content">
					<h2 id="module" class="singleModule__title slide-in" aria-level="2"><?= get_the_title() ?></h2>
					<?php the_content(); ?>
				<a href="<?= get_post_type_archive_link('module'); ?>"
				   class="singleModule__links slide-in"> <?= __('Autres modules', 'ecosphair') ?></a>
				</div>
				<figure class="singleModule__fig ">
					<?= get_the_post_thumbnail(null, 'medium_large', ['class' => 'singleModule__logo']); ?>
				</figure>
			</div>
			<div class="singleModule__questions">
				<section aria-labelledby="why" class="singleModule__why">
					<h3 id="why" class="singleModule__title slide-in" aria-level="3"><?= __('Pourquoi ?', 'ecosphair') ?></h3>
					<p class="singleModule__paragraph slide-in"><?= get_field('pourquoi') ?></p>
				</section>
				<section aria-labelledby="who" class="singleModule__who">
					<h3 id="who" class="singleModule__title slide-in" aria-level="3"><?= __('Pour qui ?', 'ecosphair') ?></h3>
					<p class="singleModule__paragraph slide-in"><?= get_field('qui') ?></p>
				</section>
			</div>
			<div class="singleModule__picture">
				<div class="singleModule__galerie ">
					<figure class="singleModule__figure ">
						<img src="<?= get_field('galerie1') ?>"
							 alt="<?= __('Photo du modules ', 'ecosphair') ?>">
					</figure>
				</div>
				<div class="singleModule__galerie ">
					<figure class="singleModule__figure ">
						<img src="<?= get_field('galerie2') ?>"
							 alt="<?= __('Photo du modules ', 'ecosphair') ?>">
					</figure>
				</div>
				<div class="singleModule__galerie ">
					<figure class="singleModule__figure ">
						<img src="<?= get_field('galerie3') ?>"
							 alt="<?= __('Photo du modules ', 'ecosphair') ?>">
					</figure>
				</div>
			</div>
			<div class="singleModule__nav">
				<?php if( get_adjacent_post(false, '', false) ) {
					next_post_link('%link', ' %title');
				} else {
					$last = new WP_Query('post_type=module&posts_per_page=1&order=ASC'); $last->the_post();
					echo '<a  href="' . get_permalink() . '">' . get_the_title() .'</a>';
					wp_reset_query();
				};  ?>
				<?php if( get_adjacent_post(false, '', true) ) {
					previous_post_link('%link', '%title ');
				} else {
					$first = new WP_Query('post_type=module&posts_per_page=1&order=DESC'); $first->the_post();
					echo '<a  href="' . get_permalink() . '">' . get_the_title() .'</a>';
					wp_reset_query();
				}; ?>
			</div>
		</section>
	</main>
<?php endwhile; ?>
<?php endif; ?>
<?php get_footer() ?>