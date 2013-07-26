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

		<link rel="stylesheet" href="style/normalize.css">
		<link rel="stylesheet" href="style/animate.min.css">
		<link rel="stylesheet" href="style/biere.css">
		<link rel="stylesheet" href="style/jquery.parallax.css">
		<!--[if lt IE 9]
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
					<a href="#" class="close ir" id="close-notification">Fermer</a>
				</div>
			</section>
			<section class="user">
				   <!-- parallax header -->

				  <div class="parallax-viewport" id="parallax">
					    <div class="parallax-layer dn" style="width:860px; height:273px;">
					        <img src="images/0_sun.png" alt="" style="position:absolute; left:300px; top:-12px;"/>
					    </div>
					    <div class="parallax-layer dn" style="width:920px; height:274px;">
					        <img src="images/1_mountains.png" alt="" />
					    </div>
					    <div class="parallax-layer" style="width:1100px; height:284px;">
					        <img src="images/cloud_front.png" alt="" style="position:absolute; top:10px; left:-20%;" />
					    </div>
					    <div class="parallax-layer " style="width:1360px; height:320px;">
					        <img src="images/cloud_back.png" alt="" style="position:absolute; top:46px; left:0;"/>
					    </div>
				</div>

				<div class="center">
					<div class="logo"><img src="images/logo.png" alt="Montrouge" /><div class="user-logo">& <?php if (!empty($_SESSION['firstname'])) : echo $_SESSION['firstname']; else : echo 'Moi'; endif; ?></div></div>
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