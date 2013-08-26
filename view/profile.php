<?php include_once "header.php"; ?>

		<!-- Debut du corps du site -->
		<div class="content profil group">
			<section class="cover" style="background-image:url('images/cover-cat.jpg')">
				<div class="center">
					<h1><?php 	if (!empty($users['firstname']) && !empty($users['name'])) : 
						 			if (!empty($users['firstname'])) : 
						 				foreach ($users['firstname'] as $key => $value) : 
						 					echo htmlentities($value, ENT_QUOTES); 
						 				endforeach; 
						 			endif;
						 			if (!empty($users['name'])) : 
						 				foreach ($users['name'] as $key => $value) : 
						 					echo " ".htmlentities($value, ENT_QUOTES);
						 				endforeach; 
						 			endif;
						 		else : 
						 		 	echo 'Moi'; 
						 		endif; ?></h1>
					<figure><img src="images/avatar.png" alt="" /></figure>
				</div>
			</section>
			<div class="center">
				<aside class="col-3">
					<nav class="menu-aside">
						<a href="#profil" class="current">Profil</a>
						<a href="#events">Évènements</a>
						<a href="#associations">Associations</a>
						<a href="#">Badges</a>
						<?php if($ISME) : ?><a href="#">Notifications</a><?php endif; ?>
					</nav>
				</aside>
				<section class="col-3-2">
					<?php if($ISME || $ISLEADER) : 
							if ($ISLEADER) :
								$showing = TRUE;
								$editing = FALSE;
							endif;
							if ($ISME) :
								$showing = TRUE;
								$editing = TRUE;
							endif;
					 		include "Profile-profil.php";
					 	 endif; ?>

					<?php if($ISME || $ISLEADER) : 
							if ($ISLEADER) :
								$showing = TRUE;
								$editing = FALSE;
							endif;
							if ($ISME) :
								$showing = TRUE;
								$editing = TRUE;
							endif;
					 		include "Profile-identity.php";
					 	 endif; ?>

					<?php if($ISME || $ISLEADER) : 
							if ($ISLEADER) :
								$showing = TRUE;
								$editing = FALSE;
							endif;
							if ($ISME) :
								$showing = TRUE;
								$editing = TRUE;
							endif;
					 		include "Profile-network.php";
					 	 endif; ?>

					<?php if($ISME || $ISLEADER) : ?>
					<section id="contact" class="contact showing group">
						<h1 class="banner">Contacts</h1>
						<?php 	if ($ISME)
								{
									$visibility = 'Public';
									include "edit-button.php";
								}
						?>
						<form action="" method="post" >
							<h2>Adresse</h2><label>42, rue Barbès 94200 Ivry-sur-Seine, France</label>
							<h2>Téléphone</h2><label class="col-2 tel">01 52 36 45 87</label><label class="col-2 mobile">06 72 23 68 26</label>
						</form action="" method="post" >
					</section>
					<?php endif; ?>

					<section id="say-more" class="say-more showing group">
						<h1 class="banner">Dites en plus !</h1>
						<?php 	if ($ISME)
								{
									$visibility = 'Public';
									include "edit-button.php";
								}
						?>
						<form action="" method="post" >
							<h2>Description</h2><label>Failure is not an option. 
							Where ignorance lurks, so too do the frontiers of discovery and imagination. 
							Across the sea of space, the stars are other suns. 
							Space, the final frontier. These are the voyages of the Starship Enterprise. Its five-year mission: to explore strange new worlds, to seek out new life and new civilizations, to boldly go where no man has gone before.
							Dinosaurs are extinct today because they lacked opposable thumbs and the brainpower to build a space program.</label>
							<h2>Animaux</h2><label>Chien, Chat, Souris, Peluche</label>
							<h2>Signe astrologique</h2><label>Vierge</label>
							<h2>Loisirs</h2><label>Art, Graphisme, Design, Web, Velo, Escalade, Jeux Vidéos</label>
							<h2>Métier</h2><label>Graphiste Global</label>
							<h2>Entreprise</h2><label>Société les fantastiques</label>
						</form action="" method="post" >
					</section>

					<section id="events" class="group">
						<h1 class="banner">Derniers évènements</h1>
						<div class="wrapper">
							<article class="evenement small">
								<h2>Barbecue des anciens élèves de Montrouge</h2>
								<div class="group">
									<div class="infos">
										<div class="when">10.06.2013</div>
										<div class="where">Place Victor Hugo, Impasse des citrons</div>
									</div>
									<figure><img src="images/chanter.jpg" alt="Image des anciens élèves de montrouge au rassemblement de 2011 en train de griller des mergezes" /></figure>
								</div>
								<div class="evenement-by">
									Par : <a href="associations/generation-montrouge.html">Génération Montrouge</a>
									<a class="more" href="#"><span class="plus ir">Plus</span> de détails</a>
								</div>
							</article>
							<article class="evenement small">
								<h2>Barbecue des anciens élèves de Montrouge</h2>
								<div class="group">
									<div class="infos">
										<div class="when">10.06.2013</div>
										<div class="where">Place Victor Hugo, Impasse des citrons</div>
									</div>
									<figure><img src="images/chanter.jpg" alt="Image des anciens élèves de montrouge au rassemblement de 2011 en train de griller des mergezes" /></figure>
								</div>
								<div class="evenement-by">
									Par : <a href="associations/generation-montrouge.html">Génération Montrouge</a>
									<a class="more" href="#"><span class="plus ir">Plus</span> de détails</a>
								</div>
							</article>
							<article class="evenement small">
								<h2>Barbecue des anciens</h2>
								<div class="group">
									<div class="infos">
										<div class="when">10.06.2013</div>
										<div class="where">Place Victor Hugo, Impasse des citrons</div>
									</div>
									<figure><img src="images/chanter.jpg" alt="Image des anciens élèves de montrouge au rassemblement de 2011 en train de griller des mergezes" /></figure>
								</div>
								<div class="evenement-by">
									Par : <a href="associations/generation-montrouge.html">Génération Montrouge</a>
									<a class="more" href="#"><span class="plus ir">Plus</span> de détails</a>
								</div>
							</article>
							<article class="evenement small">
								<h2>Barbecue des anciens élèves de Montrouge</h2>
								<div class="group">
									<div class="infos">
										<div class="when">10.06.2013</div>
										<div class="where">Place Victor Hugo, Impasse des citrons</div>
									</div>
									<figure><img src="images/chanter.jpg" alt="Image des anciens élèves de montrouge au rassemblement de 2011 en train de griller des mergezes" /></figure>
								</div>
								<div class="evenement-by">
									Par : <a href="associations/generation-montrouge.html">Génération Montrouge</a>
									<a class="more" href="#"><span class="plus ir">Plus</span> de détails</a>
								</div>
							</article>
							<article class="evenement small">
								<h2>Barbecue des anciens élèves de Montrouge</h2>
								<div class="group">
									<div class="infos">
										<div class="when">10.06.2013</div>
										<div class="where">Place Victor Hugo, Impasse des citrons</div>
									</div>
									<figure><img src="images/chanter.jpg" alt="Image des anciens élèves de montrouge au rassemblement de 2011 en train de griller des mergezes" /></figure>
								</div>
								<div class="evenement-by">
									Par : <a href="associations/generation-montrouge.html">Génération Montrouge</a>
									<a class="more" href="#"><span class="plus ir">Plus</span> de détails</a>
								</div>
							</article>
						</div>
					</section>

					<section id="associations" class="group">
						<h1 class="banner">Les associations</h1>
						<div class="group">
							<article class="association col-2">
								<h2>Le Club du parc</h2>
								<figure><img src="images/commerces.jpg" alt="Logo du club du parc" /></figure>
								<a class="more" href="#"><span class="plus ir">Plus</span> de détails</a>
							</article>
							<article class="association col-2">
								<h2>Le Club du parc</h2>
								<figure><img src="images/commerces.jpg" alt="Logo du club du parc" /></figure>
								<a class="more" href="#"><span class="plus ir">Plus</span> de détails</a>
							</article>
						</div>
					</section>
				</section>
			</div>
		</div>
		<!-- Fin du corps du site -->

<?php include_once "footer.php"; ?>
