<?php /* Template Name: Contact page template */ ?>
<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
	<main class="layout contact">
		<section aria-labelledby="contact" class="layout__contact">
			<h2 id="contact" class="contact__title" aria-level="2"><?= get_the_title(); ?></h2>
			<div class="contact__position">
				<div class="contact__content">
					<figure class="contact__figure">
						<span class="contact__circle"></span>
						<span class="contact__circle"></span>
						<span class="contact__circle"></span>
						<img src="<?= wp_get_attachment_image_src(get_field('image'), 'medium_large')[0] ?? null; ?>"
							 alt="Photo de quelqu'un qui rédige un mail" class="contact__image">
					</figure>
					<section aria-labelledby="info" class="information">
						<h3 id="info" class="information__title" aria-level="3"><?= __('Nos coordonnées', 'ecosphair') ?></h3>
						<div class="information__position">
							<?php if (($partners = ecosphair_get_partners())->have_posts()):while ($partners->have_posts()): $partners->the_post(); ?>
								<article aria-labelledby="partner" class="information__article">
									<h4 id="partner" class="information__title" aria-level="4"><?= get_the_title() ?></h4>
									<section aria-labelledby="infoContact" class="information__contact">
										<h5 id="infoContact" class="information__who" aria-level="5" ><?= get_field('nom') ?></h5>
										<p class="information__where"><?= get_field('lieu') ?></p>
										<p class="information__mail"><?= get_field('email') ?></p>
										<p class="information__phone"><?= get_field('telephone') ?></p>
									</section>
								</article>
							<?php endwhile; ?>
							<?php endif; ?>
						</div>
				</div>
				<div class="contact__forms">
					<?php if (!isset($_SESSION['contact_form_feedback']) || !$_SESSION['contact_form_feedback']['success']) : ?>
						<form action="<?= substr(get_home_url(), 0,-2); ?>wp-admin/admin-post.php" method="POST"
							  class="contact__form form"
							  id="contact">
							<?php if (isset($_SESSION['contact_form_feedback'])) : ?>
								<p class="form__error"><?= __('Oups ! Il y a des erreurs dans le formulaire', 'ecosphair') ?></p>
							<?php endif; ?>
							<div class="form__field">
								<label for="who" class="form__label"><?= __('À qui', 'ecosphair') ?></label>
								<select name="who" id="who" class="form__select">
									<?php if (($partners = ecosphair_get_partners())->have_posts()):while ($partners->have_posts()): $partners->the_post(); ?>
										<option class="form__option" value="ISSeP"><?= get_the_title() ?></option>
									<?php endwhile; ?>
									<?php endif; ?>
								</select>
							</div>
							<div class="form__field">
								<label for="lastname"
									   class="form__label required"> <?= __('Nom', 'ecosphair') ?></label>
								<input type="text" name="lastname" id="lastname" class="form__input"
									   value="<?= ecosphair_get_contact_field_value('lastname'); ?>">
								<?= ecosphair_get_contact_field_error('lastname'); ?>
							</div>
							<div class="form__field">
								<label for="firstname"
									   class="form__label required"><?= __('Prénom', 'ecosphair') ?></label>
								<input type="text" name="firstname" id="firstname" class="form__input"
									   value="<?= ecosphair_get_contact_field_value('firstname'); ?>">
								<?= ecosphair_get_contact_field_error('firstname'); ?>
							</div>
							<div class="form__field">
								<label for="email" class="form__label required"><?= __('E-mail', 'ecosphair') ?></label>
								<input type="email" name="email" id="email" class="form__input"
									   value="<?= ecosphair_get_contact_field_value('email'); ?>">
								<?= ecosphair_get_contact_field_error('email'); ?>
							</div>
							<div class="form__field">
								<label for="object" class="form__label"><?= __('Objet', 'ecosphair') ?></label>
								<input type="text" name="object" id="object" class="form__input"
									   value="<?= ecosphair_get_contact_field_value('phone'); ?>">
								<?= ecosphair_get_contact_field_error('phone'); ?>
							</div>
							<div class="form__field">
								<label for="message"
									   class="form__label required"><?= __('Message', 'ecosphair') ?></label>
								<textarea name="message" id="message" cols="30" rows="10"
										  class="form__input"><?= ecosphair_get_contact_field_value('message'); ?></textarea>
								<?= ecosphair_get_contact_field_error('message'); ?>
							</div>
							<div class="form__field">
								<label for="rules" class="form__checkbox">
									<input type="checkbox" name="rules" id="rules" value="1"/>
									<span class="form__checklabel"><?= str_replace(':condition', '<a href="'. get_the_permalink(ecosphair_get_template_page('template-condition')) .'">' . __('conditions générales d\'utilisation', 'ecosphair') . '</a>', __('J\'accepte les :condition ', 'ecosphair')) ?></span>
								</label>
								<?= ecosphair_get_contact_field_error('rules'); ?>
							</div>
							<div class="form__actions">
								<?php wp_nonce_field('nonce_submit_contact'); ?>
								<input type="hidden" name="action" value="submit_contact_form"/>
								<button class="form__button" type="submit"><?= __('Envoyer', 'ecosphair') ?></button>
							</div>
						</form>
					<?php else : ?>
						<p class="form__end" id="contact"><?= __('Merci ! Votre message a bien été envoyé.', 'ecosphair') ?></p>
						<?php unset($_SESSION['contact_form_feedback']); endif; ?>
				</div>
			</div>
		</section>
	</main>
<?php endwhile; endif; ?>
<?php get_footer(); ?>