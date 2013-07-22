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

		<section>
			<?php if (!empty($error)) : ?>
				<output for="" form="" ><?php echo $error; ?></output>
			<?php endif; ?>
			<form action="" method="post" id="" />
				<?php if (!empty($users['mail'])) : ?>
				<?php foreach ($users['mail'] as $key => $value) : ?>
				<input type="text" name="mail[<?php echo $key; ?>]" id="mail" value="<?php echo $value; ?>" placeholder="mail" />
				<?php endforeach; ?>
				<?php else : ?>
				<input type="text" name="mail[]" id="mail" placeholder="mail" />
				<?php endif; ?>
				<?php if (!empty($users['association'])) : ?>
				<?php foreach ($users['association'] as $key => $value) : ?>
				<input type="text" name="association[<?php echo $key; ?>]" id="association" value="<?php echo $value; ?>" placeholder="association" />
				<?php endforeach; ?>
				<?php else : ?>
				<input type="text" name="association[]" id="association" placeholder="association" />
				<?php endif; ?>
				<?php if (!empty($users['name'])) : ?>
				<?php foreach ($users['name'] as $key => $value) : ?>
				<input type="text" name="name[<?php echo $key; ?>]" id="name"  value="<?php echo $value; ?>" placeholder="headline" />
				<?php endforeach; ?>
				<?php else : ?>
				<input type="text" name="name[]" id="name" placeholder="name" />
				<?php endif; ?>
				<?php if (!empty($users['firstname'])) : ?>
				<?php foreach ($users['firstname'] as $key => $value) : ?>
				<input type="text" name="firstname[<?php echo $key; ?>]" id="firstname"  value="<?php echo $value; ?>" placeholder="headline" />
				<?php endforeach; ?>
				<?php else : ?>
				<input type="text" name="firstname[]" id="firstname" placeholder="firstname" />
				<?php endif; ?>
				<?php if (!empty($users['description'])) : ?>
				<?php foreach ($users['description'] as $key => $value) : ?>
				<input type="text" name="description[<?php echo $key; ?>]" id="description" value="<?php echo $value; ?>" placeholder="description" />
				<?php endforeach; ?>
				<?php else : ?>
				<input type="text" name="description[]" id="description" placeholder="description" />
				<?php endif; ?>
				<?php if (!empty($users['illustation'])) : ?>
				<?php foreach ($users['illustation'] as $key => $value) : ?>
				<input type="text" name="illustation[<?php echo $key; ?>]" id="illustation" value="<?php echo $value; ?>" placeholder="illustation" />
				<?php endforeach; ?>
				<?php else : ?>
				<input type="text" name="illustation[]" id="illustation" placeholder="illustation" />
				<?php endif; ?>
				<?php if (!empty($users['zip'])) : ?>
				<?php foreach ($users['zip'] as $key => $value) : ?>
				<input type="text" name="zip[<?php echo $key; ?>]" id="zip" value="<?php echo $value; ?>" placeholder="Code postal" />
				<?php endforeach; ?>
				<?php else : ?>
				<input type="text" name="zip[]" id="zip" placeholder="Code postal" />
				<?php endif; ?>
				<?php if (!empty($users['city'])) : ?>
				<?php foreach ($users['city'] as $key => $value) : ?>
				<input type="text" name="city[<?php echo $key; ?>]" id="city" value="<?php echo $value; ?>" placeholder="Ville" />
				<?php endforeach; ?>
				<?php else : ?>
				<input type="text" name="city[]" id="city" placeholder="ville" />
				<?php endif; ?>
				<?php if (!empty($users['address'])) : ?>
				<?php foreach ($users['address'] as $key => $value) : ?>
				<input type="text" name="address[<?php echo $key; ?>]" id="location" value="<?php echo $value; ?>" placeholder="location" />
				<?php endforeach; ?>
				<?php else : ?>
				<input type="text" name="address[]" id="location" placeholder="location" />
				<?php endif; ?>
				<?php if (!empty($users['date'])) : ?>
				<?php foreach ($users['date'] as $key => $value) : ?>
				<input type="text" name="date[<?php echo $key; ?>]" id="date" value="<?php echo $value; ?>" placeholder="date" />
				<?php endforeach; ?>
				<?php else : ?>
				<input type="text" name="date[]" id="date" placeholder="date" />
				<?php endif; ?>
				<input type="submit" name="valider" id="valider" value="enregistrer" />
			</form>
		</section>
	</div>

		
	</body>
</html>