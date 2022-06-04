<footer class="footer">
	<section aria-labelledby="footer" class="footer__body">
		<h2 id="footer" class="footer__title hidden" aria-level="2"><?= __('Pied de la page d\'', 'ecosphair') ?> <?= get_bloginfo('name') ?></h2>
		<p class="footer__placeholder slide-in"><?= __('Retrouvez nous aussi sur', 'ecosphair') ?></p>
		<ul class="footer__list">
			<?php if (($network = ecosphair_get_network())->have_posts()):while ($network->have_posts()): $network->the_post(); ?>
				<li class="footer__item slide-in">
					<?= get_the_post_thumbnail(null, 'post-thumbnail', ['class' => 'footer__thumb']); ?>
					<a class="footer__link" href="<?= get_field('network') ?>">
						<?= get_the_title() ?>
					</a>
				</li>
			<?php endwhile; ?>
			<?php endif; ?>
		</ul>
		<a href="<?=get_the_permalink(ecosphair_get_template_page('template-legale'))?>" class="footer__legale slide-in"><?= __('Mentions légales', 'ecosphair') ?></a>
	</section>
</footer>
<script type="text/javascript" src="<?= ecosphair_mix('/js/script.js'); ?>"></script>
</body>
</html>
