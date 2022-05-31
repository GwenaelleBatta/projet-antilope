<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta name="author" content="Batta Gwenaëlle">
	<meta name="description" content="Projet Client">
	<meta name="keywords"
		  content="pollution, air, mesure, écologie, antilope, oryx, saiga, madoqua, impala, nyala, HEPL, ISSep">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?= wp_title('-', false, 'right') . get_bloginfo('name'); ?></title>
	<link rel="stylesheet" type="text/css" href="<?= ecosphair_mix('css/style.css'); ?>">
	<link rel="stylesheet" href="https://use.typekit.net/tqs7xtc.css">
	<script type="text/javascript" src="<?= ecosphair_mix('/js/script.js'); ?>"></script>
	<?php wp_head(); ?>
</head>
<body aria-labelledby="ecosphair">
<header>
	<h1 id="ecosphair" class="header__title hidden" aria-level="1"><?= get_bloginfo('name'); ?></h1>
	<p class="header__placeholder hidden"><?= get_bloginfo('description'); ?></p>
	<nav aria-labelledby="navigation" class="header__nav">
		<h2 id="navigation" class="nav__title hidden"
			aria-level="2"><?= __('Navigation d\'', 'ecosphair') ?> <?= get_bloginfo('name') ?></h2>
		<div class="nav__logo logo">
			<a href="<?= home_url() ?>" class="logo__link"> <?= __('Accueil', 'ecosphair') ?></a>
		</div>
		<label class="hidden" for="burger">
			Checkbox Burger Menu
		</label>
		<input id="burger" name="burger" type="checkbox" class="nav__checkbox">
		<div class="nav__burger burger">
			<span class="burger__line line1"></span>
			<span class="burger__line line2"></span>
			<span class="burger__line line3"></span>
		</div>
		<div class="nav__position">
			<ul class="nav__liste">
				<?php foreach (ecosphair_get_menu_items('primary') as $link): ?>
					<li class="<?= $link->getBemClasses('nav__item'); ?>">
						<a href="<?= $link->url; ?>"
								<?= $link->title ? 'title = "' . $link->title . '"' : ''; ?>
						   class="nav__link"><?= $link->label; ?></a>
					</li>
				<?php endforeach; ?>
				<ul class="languages">
					<?php foreach (pll_the_languages(['raw' => true]) as $code => $locale):; ?>
						<li class="nav__languages">
							<a href="<?= $locale['url']; ?>"
							   class="nav__locale <?= $locale['current_lang'] ? ' nav__locale--current' : '' ?>"
							   lang="<?= $locale['locale']; ?>"
							   hreflang="<?= $locale['locale'] ?>" title="<?= $locale['name']; ?>"><?= $code ?></a>
						</li>
					<?php endforeach; ?>
				</ul>
			</ul>
		</div>
	</nav>
</header>

