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

		<!-- Debut du corps du site -->
		<div class="content center group">

			<!-- Debut Évènement à la Une -->
			<section class="une">
				<article class="evenement big">
					<h1 class="left-50">Barbecue des anciens élèves de Montrouge</h1>
					<div class="evenement-by left-50">
						Par : <a href="associations/generation-montrouge.html">Génération Montrouge</a>
						<a class="more" href="#"><span class="plus ir">Plus</span> de détails</a>
					</div>
					<div class="infos left-50 group">
						<div class="when">10.06.2013</div>
						<div class="where">Place Victor Hugo, Impasse des citrons</div>
					</div>
					<div class="thumbnail"><img src="view/images/barbecue-eleves-montrouge.jpg" alt="Image des anciens élèves de montrouge au rassemblement de 2011 en train de griller des mergezes" /></div>
					<div class="description left-50 group">
						<p>The regret on our side is., they used to say years ago, we are reading about you in science class.</p>
						<p>We are all connected; To each other, biologically. To the earth, chemically. To the rest of the universe atomically....</p>
					</div>
					<div class="category left-50">Catégories : <a href="evenements?category=vide-grenier">Vide grenier</a> <a href="evenements?category=public">public</a></div>
					<div class="registering left-50 group">
						<div class="registered">61 inscrits</div>
						<a href="#register" class="btn register">J'y vais ?</a>
					</div>
				</article>
			</section>
			<!-- Fin Évènement à la Une -->

			<!-- Debut Section Derniers Évènement -->
			<section class="evenements">
				<h1>Derniers évènements</h1>
				<article class="evenement small">
					<h1>Barbecue des anciens élèves de Montrouge</h1>
					<div class="when">10.06.2013</div>
					<div class="where">Place Victor Hugo, Impasse des citrons</div>
					<div class="thumbnail"><img src="view/images/barbucue-montrouge.jpg" alt="Image des anciens élèves de montrouge au rassemblement de 2011 en train de griller des mergezes" /></div>
					<div class="evenement-by">
						Par : <a href="associations/generation-montrouge.html">Génération Montrouge</a>
						<div class="more"><span class="plus">Plus</span> de détails</div>
					</div>
				</article>
				<article class="evenement small">
					<h1>Barbecue des anciens élèves de Montrouge</h1>
					<div class="when">10.06.2013</div>
					<div class="where">Place Victor Hugo, Impasse des citrons</div>
					<div class="thumbnail"><img src="images/barbucue-montrouge.jpg" alt="Image des anciens élèves de montrouge au rassemblement de 2011 en train de griller des mergezes" /></div>
					<div class="evenement-by">
						Par : <a href="associations/generation-montrouge.html">Génération Montrouge</a>
						<div class="more"><span class="plus">Plus</span> de détails</div>
					</div>
				</article>
				<article class="evenement small">
					<h1>Barbecue des anciens élèves de Montrouge</h1>
					<div class="when">10.06.2013</div>
					<div class="where">Place Victor Hugo, Impasse des citrons</div>
					<div class="thumbnail"><img src="images/barbucue-montrouge.jpg" alt="Image des anciens élèves de montrouge au rassemblement de 2011 en train de griller des mergezes" /></div>
					<div class="evenement-by">
						Par : <a href="associations/generation-montrouge.html">Génération Montrouge</a>
						<div class="more"><span class="plus">Plus</span> de détails</div>
					</div>
				</article>
				<article class="evenement small">
					<h1>Barbecue des anciens élèves de Montrouge</h1>
					<div class="when">10.06.2013</div>
					<div class="where">Place Victor Hugo, Impasse des citrons</div>
					<div class="thumbnail"><img src="images/barbucue-montrouge.jpg" alt="Image des anciens élèves de montrouge au rassemblement de 2011 en train de griller des mergezes" /></div>
					<div class="evenement-by">
						Par : <a href="associations/generation-montrouge.html">Génération Montrouge</a>
						<div class="more"><span class="plus">Plus</span> de détails</div>
					</div>
				</article>
				<article class="evenement small">
					<h1>Barbecue des anciens élèves de Montrouge</h1>
					<div class="when">10.06.2013</div>
					<div class="where">Place Victor Hugo, Impasse des citrons</div>
					<div class="thumbnail"><img src="images/barbucue-montrouge.jpg" alt="Image des anciens élèves de montrouge au rassemblement de 2011 en train de griller des mergezes" /></div>
					<div class="evenement-by">
						Par : <a href="associations/generation-montrouge.html">Génération Montrouge</a>
						<div class="more"><span class="plus">Plus</span> de détails</div>
					</div>
				</article>
			</section>
			<!-- Fin Derniers Évènement -->

			<!-- Debut Section les associations -->
			<section class="associations">
				<h1>Les associations</h1>
				<article class="association">
					<h2>Le Club du parc</h2>
					<div class="thumbnail"><img src="images/le-club-du-parc.jpg" alt="Logo du club du parc" /></div>
					<div class="more"><span class="plus">Plus</span> de détails</div>
				</article>
				<article class="association">
					<h2>Le Club du parc</h2>
					<div class="thumbnail"><img src="images/le-club-du-parc.jpg" alt="Logo du club du parc" /></div>
					<div class="more"><span class="plus">Plus</span> de détails</div>
				</article>
				<article class="association">
					<h2>Le Club du parc</h2>
					<div class="thumbnail"><img src="images/le-club-du-parc.jpg" alt="Logo du club du parc" /></div>
					<div class="more"><span class="plus">Plus</span> de détails</div>
				</article>
				<article class="association">
					<h2>Le Club du parc</h2>
					<div class="thumbnail"><img src="images/le-club-du-parc.jpg" alt="Logo du club du parc" /></div>
					<div class="more"><span class="plus">Plus</span> de détails</div>
				</article>
			</section>
			<!-- Fin Section les associations -->
		</div>
		<!-- Fin du corps du site -->

		<!-- Debut du footer -->
		<footer>
			<div class="center">
				<div class="sitemap">
					<h3>Montrouge et moi</h3>
					<nav class="footer-menu">
						<ul>
							<li></li>
						</ul>
					</nav>
				</div>

				<div class="top-associations">
					<h3>Top associations</h3>
					<ul>
						<li></li>
					</ul>
				</div>


				<div class="login">
					<h3>Login</h3>
					<form action="" method="Post" >
					<?php if (empty($_SESSION)) : ?>
						<input type="mail" name="mail" />
						<input type="password" name="password" />
						<input type="submit" name="submit" value="Se connecter" />
					<?php else : ?>
						<input type="submit" name="submit" value="Se deconnecter" />
					<?php endif; ?>
					</form>
				</div>
			</div>
		</footer>
		<!-- Fin du footer -->


		<!-- Debut des scripts. 
		<script src="js/main.js"></script>

		Google Analytics: ne pas oublier de mettre l'ID Correcte. 
		<script>
			var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
			(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
			g.src='//www.google-analytics.com/ga.js';
			s.parentNode.insertBefore(g,s)}(document,'script'));
		</script> -->
	</body>
</html>