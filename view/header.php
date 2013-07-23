<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"><!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>Montrouge et Moi</title>
		<meta name="description" content="Mon site des assoctiations et évenements de Montrouge">
		<meta name="viewport" content="width=device-width">

		<link rel="stylesheet" href="view/style/normalize.css">
		<link rel="stylesheet" href="view/style/biere.css">
		<!--[if lt IE 9]>
			<script src="js/lib/html5shiv.js"></script>
		<![endif]-->
	</head>
	<body class="home">
		<!--[if lt IE 8]>
			<p class="chromeframe">Votre navigateur internet est <strong>obsolet</strong>. S'il vous plait veuillez <a href="http://browsehappy.com/">mettre à jour votre navigateur</a> ou <a href="http://www.google.com/chromeframe/?redirect=true">activez Google Chrome Frame</a> pour améliorer votre expérence.</p>
		<![endif]-->

		<!-- Debut du header -->
		<header>
			<section class="notification-zone">
				<div class="notification center">
					Montrouge & Moi est votre espace dans votre ville. Créer votre espace personnalisé en vous inscrivant :)
					<a href="#" class="close ir">Fermer</a>
				</div>
			</section>
			<section class="user">
				<div class="center">
					<div class="logo"><img src="view/images/logo.png" alt="Montrouge" /><div class="user-logo">& <?php if (!empty($_SESSION['firstname'])) : echo $_SESSION['firstname']; else : echo 'Moi'; endif; ?></div></div>
					<div class="login">
						<a href="#">Inscription</a> | <a href="#">Connexion</a>
					</div>
				</div>
			</section>
			<nav class="main-menu">
				<span class="current">Accueil</span>
				<a href="evenements.html">Évènements</a>
				<a href="associations.html">Associations</a>
				<?php if (!empty($_SESSION['user'])) : ?><a href="#"><?php if (!empty($_SESSION['firstname'])) : echo $_SESSION['firstname']; else : echo 'Moi'; endif; ?></a><?php endif; ?>
				<form name="search" class="search" action="/evenements.php" method="get"><input type="text" class="search field" placeholder="Rechercher" /><input type="submit" class="search submit" value="Rechercher"></form>
			</nav>
		</header>
		<!-- Fin du header -->