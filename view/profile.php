<?php include_once "view/header.php"; ?>

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
						<a href="#badges">Badges</a>
						<?php if($ISME) : ?><a href="#notifications">Notifications</a><?php endif; ?>
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
					 		include "view/profile-profil.php";
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
					 		include "view/profile-identity.php";
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
					 		include "view/profile-network.php";
					 	 endif; ?>

					<?php if($ISME || $ISLEADER) : ?>
					<section id="contact" class="contact showing group">
						<h1 class="banner">Contacts</h1>
						<?php 	if ($ISME)
								{
									$visibility = 'Public';
									include "view/edit-button.php";
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
									include "view/edit-button.php";
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

					<section id="badges" class="badges group">
						<h1 class="banner">Les Badges</h1>
						<div class="group">
							<article class="badge group">
								<h2>Papiers s'il-vous-plaît</h2>
								<figure><img src="images/badge-passeport.png" alt="badge"></figure>
								<p>Félicitations ! Vous avez rentré avec succès votre Nom et Prénom, vous êtes enfin prêt à faire de belles recontre sur Montrouge & Moi. ;)</p>
							</article>
							<article class="badge group">
								<h2>Explorateur</h2>
								<figure><img src="images/badge-explorateur.png" alt="badge"></figure>
								<p>Vous êtes réelement impliqué dans la vie associative de Montrouge, un véritable modèle à suivre ! Continuez sur cette voie.</p>
							</article>
							<article class="badge group">
								<h2>Arche de noé</h2>
								<figure></figure>
								<p>À poil, à plume, à  écaille, vous adorez les animaux de compagnie.</p>
							</article>
							<article class="badge group">
								<h2>Louis la brocante</h2>
								<figure><img src="images/badge-louis.png" alt="badge"></figure>
								<p>Vous êtes né pour chiner, la brocante est votre passion et vous le faîtes partager à vos amis.</p>
							</article>
							<article class="badge group">
								<h2>Ceci n’est pas un badge</h2>
								<figure><img src="images/badge-ceci-nest-pas-un-badge.png" alt="badge"></figure>
								<p>Vous adorez sortir au musée pour vous instruire, vos week-end sont consacrés à votre passion pour l’art.</p>
							</article>
							<article class="badge group">
								<h2>J’apporte les saucisses ?</h2>
								<figure><img src="images/badge-barbecue.png" alt="badge"></figure>
								<p>Rien de tel qu’un bon barbecue pour passer un bon moment entre amis, Participez à encore plus de barbecue pour obtenir une meilleure gratification.</p>
							</article>
						</div>
					</section>

					<?php if($ISME) : ?>
					<section id="notifications" class="notifications" class="group">
						<h1 class="banner">Notifications par email</h1>
						<div class="group">
							<h2>Nouvel événement</h2>
							<div><label>Publication d'un événement d'une association dont je suis membre</label><div class="slideThree"><input type="checkbox" value="None" id="slideThree1" name="check" checked /><label for="slideThree1"></label></div></div>
							<div><label>Publication d'un événement d'une association dont je ne suis pas membre</label><div class="slideThree"><input type="checkbox" value="None" id="slideThree2" name="check" /><label for="slideThree2"></label></div></div>

							<h2>Commentaires</h2>
							<div><label>M'avertir quand un événement au quel je participe est commenté</label><div class="slideThree"><input type="checkbox" value="None" id="slideThree3" name="check" checked /><label for="slideThree3"></label></div></div>
							<div><label>M'avertir quand on commente un événement que j'ai commenté</label><div class="slideThree"><input type="checkbox" value="None" id="slideThree4" name="check" checked /><label for="slideThree4"></label></div></div>
							<div><label>M'avertir quand on répond à un de mes commentaires</label><div class="slideThree"><input type="checkbox" value="None" id="slideThree5" name="check" checked /><label for="slideThree5"></label></div></div>

							<h2>Badges</h2>
							<div><label>Lors-ce que je reçois un nouveau badge</label><div class="slideThree"><input type="checkbox" value="None" id="slideThree6" name="check" checked /><label for="slideThree6"></label></div></div>
							<div><label>Lors-ce qu'une association dont je suis membre reçoit un nouveau badge</label><div class="slideThree"><input type="checkbox" value="None" id="slideThree7" name="check" /><label for="slideThree7"></label></div></div>
						</div>
					</section>
					<?php endif; ?>
				</section>
			</div>
		</div>
		<!-- Fin du corps du site -->

<?php include_once "view/footer.php"; ?>
