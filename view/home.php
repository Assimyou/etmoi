<?php include_once "view/header.php"; ?>

		<!-- Debut du corps du site -->
		<div class="content home group">

			<!-- Debut Évènement à la Une -->
			<?php $uneEvent = array_shift($listEvent);?>

			<?php if(isset($uneEvent)) : ?>
			<section class="une">
				<article class="evenement big">
					<?php if (!empty($uneEvent['headline'])) : ?>
					<?php foreach ($uneEvent['headline'] as $index => $headline) : ?>
					<h1 class="left-50"><a href="evenement.php?q=<?php echo $uneEvent['id']; ?>"><?php echo htmlentities($headline, ENT_QUOTES); ?></a></h1>
					<?php endforeach; ?>
					<?php endif; ?>

					<div class="evenement-by left-50">
						Par : <a href="associations/generation-montrouge.html">Génération Montrouge</a>
						<a class="more" href="evenement.php?q=<?php echo $uneEvent['id']; ?>"><span class="plus ir">Plus</span> de détails</a>
					</div>

					<div class="infos left-50 group">
						<?php if (!empty($uneEvent['date'])) : ?>
						<?php foreach ($uneEvent['date'] as $index => $datetime) : ?>
						<div class="when"><?php $date = DateTime::createFromFormat('Y-m-d', $datetime);
						echo $date->format('d-m-Y'); ?></div>
						<?php endforeach; ?>
						<?php endif; ?>
						<?php if (!empty($uneEvent['address'])) : ?>
						<?php foreach ($uneEvent['address'] as $index => $address) : ?>
						<div class="where"><?php echo htmlentities($address, ENT_QUOTES); ?></div>
						<?php endforeach; ?>
						<?php endif; ?>
					</div>

					<?php if (!empty($uneEvent['illustration'])) : ?>
					<?php foreach ($uneEvent['illustration'] as $index => $illustration) : ?>
					<figure><a href="evenement.php?q=<?php echo $uneEvent['id']; ?>"><img src="<?php echo $illustration; ?>" alt="" /></a></figure>
					<?php endforeach; ?>
					<?php else : ?>
					<figure><a href="evenement.php?q=<?php echo $uneEvent['id']; ?>"><img src="view/images/event-remplace.png" alt="" /></a></figure>
						<?php endif; ?>

					<?php if (!empty($uneEvent['description'])) : ?>
					<div class="description left-50 group">
						<?php 
						foreach ($uneEvent['description'] as $key => $value) : 
							$paragraph = mb_split('\r\n', $value);
							foreach ($paragraph as $p) :
								if (!empty($p)) : ?>
									<p><?php echo htmlentities($p, ENT_QUOTES); ?></p>
								<?php endif;
							endforeach;
						endforeach; ?>
					</div>
					<?php endif; ?>
					<?php if (!empty($uneEvent['tag'])) : ?><div class="category left-50">Catégories : <?php foreach ($uneEvent['tag'] as $key => $value) : ?><a href="evenements.php?q=<?php echo $value; ?>"><?php echo htmlentities($value, ENT_QUOTES); ?></a><?php endforeach; ?></div><?php endif; ?>

					<div class="registering left-50 group">
						<div class="registered">61 inscrits</div>
						<a href="#register" class="btn register">J'y vais </a>
					</div>
				</article>
			</section>
			<?php endif; ?>
			<!-- Fin Évènement à la Une -->

			<!-- Debut Section Derniers Évènement -->
			<?php if (!empty($listEvent)) : ?>
			<section class="evenements col-3-2">
				<h1 class="banner">Derniers évènements</h1>
				<div class="wrapper">
					<?php foreach ($listEvent as $id => $events) : ?>
					<article class="evenement small">
						<?php if (!empty($events['headline'])) : ?>
						<?php foreach ($events['headline'] as $index => $headline) : ?>
						<h2><a href="evenement.php?q=<?php echo $events['id']; ?>"><?php echo htmlentities($headline, ENT_QUOTES); ?></a></h2>
						<?php endforeach; ?>
						<?php endif; ?>
						<div class="group">
							<div class="infos">
								<?php if (!empty($events['date'])) : ?>
								<?php foreach ($events['date'] as $index => $datetime) : ?>
								<div class="when"><?php $date = DateTime::createFromFormat('Y-m-d', $datetime);
								echo $date->format('d-m-Y'); ?></div>
								<?php endforeach; ?>
								<?php endif; ?>
								<?php if (!empty($events['address'])) : ?>
								<?php foreach ($events['address'] as $index => $address) : ?>
								<div class="where"><?php echo htmlentities($address, ENT_QUOTES); ?></div>
								<?php endforeach; ?>
								<?php endif; ?>
							</div>
							<?php if (!empty($events['illustration'])) : ?>
							<?php foreach ($events['illustration'] as $index => $illustration) : ?>
							<figure><a href="evenement.php?q=<?php echo $events['id']; ?>"><img src="<?php echo $illustration; ?>" alt="Image des anciens élèves de montrouge au rassemblement de 2011 en train de griller des mergezes" /></a></figure>
							<?php endforeach; ?>
		  					<?php else : ?>
							<figure><a href="evenement.php?q=<?php echo $events['id']; ?>"><img src="view/images/event-remplace.png" alt="" /></a></figure>
							<?php endif; ?>
						</div>
						<div class="evenement-by">
							Par : <a href="associations/generation-montrouge.html">Génération Montrouge</a>
							<a class="more" href="evenement.php?q=<?php echo $events['id']; ?>"><span class="plus ir">Plus</span> de détails</a>
						</div>
					</article>
					<?php endforeach; ?>
				</div>
			</section>
			<!-- Fin Derniers Évènement -->
			<?php endif; ?>

			<!-- Debut Section les associations -->
			<section class="associations col-3">
				<h1 class="banner">Les associations</h1>
				<?php if (!empty($listAssos)) : ?>
				<div class="wrapper">
					<?php foreach ($listAssos as $id => $associations) : ?>
					<article class="association">
						<?php if (!empty($associations['name'])) : ?>
						<?php foreach ($associations['name'] as $index => $name) : ?>
						<h2><a href="association.php?q=<?php echo $id; ?>"><?php echo $name; ?></a></h2>
						<?php endforeach; ?>
	  					<?php endif; ?>
	  					<?php if (!empty($associations['illustration'])) : ?>
						<figure>
						<?php foreach ($associations['illustration'] as $index => $illustration) : ?>
						<a href="association.php?q=<?php echo $id; ?>"><img src="<?php echo $illustration; ?>" alt="Logo du club du parc" /></a>
						<?php endforeach; ?>
						</figure>
						<?php else : ?>
						<figure><a href="association.php?q=<?php echo $id; ?>"><img src="view/images/event-remplace.png" alt="" /></a></figure>
						<?php endif; ?>
						<a class="more" href="association.php?q=<?php echo $id; ?>"><span class="plus ir">Plus</span> de détails</a>
					</article>
					<?php endforeach; ?>
				</div>
				<?php endif; ?>
			</section>
			<!-- Fin Section les associations -->
		</div>

		<!-- Début Push badge -->
		<section class="pushbadges group">
			<div class="center">
				<div class="intro">
					<h3>Décuplez le <span class="fun tada">fun</span> grâce au badges !</h3>
					<p>
						Faites par de votre activité à vos amis :)<br>
						Gagnez des badges en fonction des événéments où vous allez. Sans compter les badges secrets ;)
					</p>
				</div>
				<div class="badges group">
					<figure class="wobble">
						<img src="images/badge-passeport.png" alt="badge">
					</figure>
					<figure class="flip">
						<img src="images/badge-louis.png" alt="badge">
					</figure>
					<figure class="pulse">
						<img src="images/badge-barbecue.png" alt="badge">
					</figure>
					<figure class="swing">
						<img src="images/badge-ceci-nest-pas-un-badge.png" alt="badge">
					</figure>
					<figure class="wiggle">
						<img src="images/badge-explorateur.png" alt="badge">
					</figure>
					<figure class="bounce">
						<img src="images/badge-montrouge.png" alt="badge">
					</figure>
				</div>
			</div>
		</section>
		<!-- Fin du corps du site -->

<?php include_once "view/footer.php"; ?>
