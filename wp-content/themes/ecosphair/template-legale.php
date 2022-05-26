<?php /* Template Name: Legale page template */ ?>
<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
    <main class="layout__legales">
        <section aria-labelledby="legales" class="legales">
            <h2 id="legales" class="legales__title" aria-level="2"><?= get_the_title(); ?></h2>
        </section>

		<section class="confident">
			<h2 class="confident__title"><?=__('Clauses de confidentialité', 'portfolio')?></h2>
			<p class="confident__text">
				<?= get_the_content()?>
			</p>
		</section>
    </main>
<?php endwhile; endif; ?>
<?php get_footer(); ?>