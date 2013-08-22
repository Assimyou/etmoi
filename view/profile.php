<?php include_once "header.php"; ?>

		<?php
		$ISME = false;
		if(empty($_GET['id']) || $_SESSION['id'] == $_GET['id']){
			$ISME = true;
		}

		$ISLEADER = false;
		foreach ($visa as $key => $value){
			if($value == 'webmaster'){
				$ISME = true;
			}

			if ($value == 'leader' && $profil['association'] == $users['association']){
				$ISLEADER = true;
			}
		}

		function editbutton($private){
			global $ISME;

			$editbutton = "";
			if($ISME){
				$privacy = 'Public';
				if($private){ $privacy = 'Privé'; }
				
				$editbutton = 
					'<div class="edit">'.
						'<div class="privacy tooltip">'.$privacy.'</div>'.
						'<a class="btn createform" href="?act=edit">Éditer</a>'.
						'<input type="submit" name="'.generateToken($_SERVER['REQUEST_URI']).'" value="enregistrer" class="btn editing" />'.
					'</div>';
			}

			echo $editbutton;
		}

		?>

		<!-- Debut du corps du site -->
		<div class="content profil group">
			<section class="cover" style="background-image:url('images/cover-cat.jpg')">
				<div class="center">
					<?php if (!empty($users['name']) && !empty($users['firstname'])) : 

						$monnom = "";
						foreach ($users['firstname'] as $key => $value) :
							$monnom .= $value." ";
						endforeach;
						foreach ($users['name'] as $key => $value) :
							$monnom .= $value;
						endforeach;
						?>
						<h1><?php echo $monnom; ?></h1>
					<?php else : ?>
						<h1>Moi</h1>
					<?php endif; ?>
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
					<?php if($ISME || $ISLEADER) : ?>
					<!-- Début section profil -->
					<section id="profil" class="profil showing group">
						<form>
							<h1 class="banner">Profil</h1>
							<?php 
							editbutton(true); 

							$showing = "";
							$editing = "";

							if (!empty($users['mail'])){
								foreach ($users['mail'] as $key => $value){
									$showing .= '<h2>E-Mail</h2><label>'.$value.'</label>';
									$editing .= '<h2>E-Mail</h2><input type="text" name="mail['.$key.']" value="'.$value.'" placeholder="E-Mail" />';
								}
							} else {
								$showing .= '';
								$editing .= '<h2>E-Mail</h2><input type="text" name="mail[]" placeholder="E-Mail" />';
							}
							?>

							<div class="showing">
								<?php if($showing != "") : ?><?php echo $showing; ?><?php endif; ?>
								<?php if($ISME) : ?><h2>Mot de sécurité</h2><label>********</label><?php endif; ?>
							</div>

							<?php if($ISME) : ?>
							<div class="editing">
								<?php if($editing != "") : ?><?php echo $editing; ?><?php endif; ?>
								<h2>Mot de sécurité</h2><input type="password" name="password[]" placeholder="Mot de sécurité" />
							</div>
							<?php endif; ?>
						</form>
					</section>
					<!-- Fin section profil -->
					<?php endif; ?>

					<section id="identity" class="identity showing group">
						<form>
							<h1 class="banner">Identité</h1>
							<?php 
							editbutton(false); 

							$showing = "";
							$editing = "";

							if (!empty($users['firstname'])){
								foreach ($users['firstname'] as $key => $value){
									$showing .= '<h2>E-Mail</h2><label>'.$value.'</label>';
									$editing .= '<h2>E-Mail</h2><input type="text" name="mail['.$key.']" value="'.$value.'" placeholder="Prénom" />';
								}
							} else {
								$showing .= '';
								$editing .= '<h2>E-Mail</h2><input type="text" name="mail[]" placeholder="Prénom" />';
							}
							?>

							<div class="showing">
								<div>
									<div class="col-2">
										<h2>Prénom</h2><label>Loïc</label>
									</div>
									<div class="col-2">
										<h2>Nom</h2><label>Huck</label>
									</div>
								</div>
								<div>
									<div class="col-2">
										<h2>Sexe</h2><label>Homme</label>
									</div>
									<div class="col-2">
										<h2>Date de naissance</h2><label>13/09/2013</label>
									</div>
								</div>
							</div>

							<?php if($ISME) : ?>
							<div class="editing">
								<div>
									<div class="col-2">
										<h2>Prénom</h2><input type="text" value="Loïc" />
									</div>
									<div class="col-2">
										<h2>Nom</h2><input type="text" value="Huck" />
									</div>
								</div>
								<div>
									<div class="col-2">
										<h2>Sexe</h2>
										<input type="radio" name="sexe[]" id="femme" value="Femme" /> 
										<label for="femme">Femme</label> 
										<input type="radio" name="sexe[]" id="homme" value="Homme" checked="true" /> 
										<label for="homme">Homme</label> 
										<input type="radio" name="sexe[]" id="autre" value="Autre" /> 
										<label for="autre">Autre</label> 
									</div>
									<div class="col-2">
										<h2>Date de naissance</h2><input type="date" />
									</div>
								</div>
							</div>
							<?php endif; ?>
						</form>
					</section>

					<section id="social" class="social showing group">
						<h1 class="banner">Réseaux sociaux</h1>
						<?php editbutton(false); ?>
						<form>
							<div class="col-3">
								<h2>Twitter</h2><label><span>@</span>loichuck</label>
							</div>
							<div class="col-3">
								<h2>Facebook</h2><label><span>facebook.com/</span>loichuck</label>
							</div>
							<div class="col-3">
								<h2>Instagram</h2><label><span>instagr.am/</span>loichuck</label>
							</div>
						</form>
					</section>

					<?php if($ISME || $ISLEADER) : ?>
					<section id="contact" class="contact showing group">
						<h1 class="banner">Contacts</h1>
						<?php editbutton(true); ?>
						<form>
							<h2>Adresse</h2><label>42, rue Barbès 94200 Ivry-sur-Seine, France</label>
							<h2>Téléphone</h2><label class="col-2 tel">01 52 36 45 87</label><label class="col-2 mobile">06 72 23 68 26</label>
						</form>
					</section>
					<?php endif; ?>

					<section id="say-more" class="say-more showing group">
						<h1 class="banner">Dites en plus !</h1>
						<?php editbutton(false); ?>
						<form>
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
						</form>
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
