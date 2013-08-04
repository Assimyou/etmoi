<?php include_once "header.php"; ?>
		<!-- Debut page evenement -->
		<div class="content event group">
			<section class="description group center">
				<div class="map"><div class="google"></div></div>
				<article>
					<?php if (!empty($events['headline'])) : ?>
					<?php foreach ($events['headline'] as $key => $value) : ?>
					<h1><?php echo $value; ?></h1>
					<?php endforeach; ?>
					<?php endif; ?>
					<div class="registering">
						<div class="registered">61 inscrits</div>
						<a href="#register" class="btn register">J'y vais </a>
					</div>
					<p>Le seul aménagement cyclable en site propre de la ville se situe avenue Marx-Dormoy (D62), à cheval sur les communes de Montrouge et Arcueil. Il présente l'originalité d'être disposée au centre de la voirie, et deux bordures plantées la séparent de la circulation.</p>
					<p>L'avenue de la Marne présente également une piste cyclable à double-sens sur un côté de la rue, y compris là où la vitesse de la circulation générale est limitée à 30 km/h. Des couloirs de bus autorisés aux vélos, notamment sur la RD920, permettent de faciliter leur circulation et, depuis sa rénovation achevée en novembre 2010, l'avenue Henri-Ginoux (D128) est dotée sur son côté droit d'une bande cyclable entre les avenues Gabriel-Péri et Verdier. La présence permanente de véhicules stationnés en infraction sur le côté gauche de cette section de l'avenue oblige cependant les autres véhicules à l'emprunter pour circuler.</p>
					<p>Les nombreux feux de la commune ne sont pas dotés de sas pour les cyclistes. Les double-sens cyclables sont inexistants, et les zones 30 ont été supprimées en juillet 20112,3.</p>
					<p>C'est à Montrouge que la juge Catherine Giudicelli est décédée des suites d'un accident à Vélib' en août 20094, premier accident mortel en banlieue parisienne en utilisant ce moyen de transport.</p>
				
				 <?php if (!empty($events['tag'])) : ?><div class="category">Catégories : <?php foreach ($events['tag'] as $key => $value) : ?><a href="evenements.php?q=<?php echo $value; ?>"><?php echo $value; ?></a><?php endforeach; ?></div><?php endif; ?>
				</article>
			</section>

			<section class="comments group center">
				<h1 class="banner">Commentaires</h1>
				<article class="group">
					<div class="col-3-2">
						<div class="comment group">
							<figure><img src="images/avatar.png" alt="Bernard Martin" /></figure>
							<article>
								<div class="date">10h32 - 10/06/13</div>
								<h2><a href="#">Bernard Martin</a></h2>
								<div class="text">J'ouvrirais mon bar ce dimanche sur le chemin du vide grenier, n'hésitez pas a venir vous rafraichir entre deux achats autour d'une bière pour cette journée ensoleillé</div>
								<a class="reply">Répondre</a>
								<a class="report">Signaler</a>
							</article>
						</div>
						<div class="comment answer group">
							<figure><img src="images/avatar.png" alt="Bernard Martin" /></figure>
							<article>
								<div class="date">10h32 - 10/06/13</div>
								<h2><a href="#">Steven Triangle</a></h2>
								<div class="text">Je serais au rendez-vous, discuter avec toi en humant du houblon est toujours un imense plaisir !</div>
								<a class="reply">Répondre</a>
								<a class="report">Signaler</a>
							</article>
						</div>
						<div class="comment group">
							<figure><img src="images/avatar.png" alt="Bernard Martin" /></figure>
							<article>
								<div class="date">10h32 - 10/06/13</div>
								<h2><a href="#">Michel Gerard</a></h2>
								<div class="text">Pour les féru de vielles consoles mon stand sera à coté de l'église ! N'hésitez pas à venir me voir pour trouver votre donheur ou simplement discuter rétro-gaming</div>
								<a class="reply">Répondre</a>
								<a class="report">Signaler</a>
							</article>
						</div>
						<div class="comment group">
							<figure><img src="images/avatar.png" alt="Bernard Martin" /></figure>
							<article>
								<div class="date">10h32 - 10/06/13</div>
								<h2><a href="#">Giselle Michou</a></h2>
								<div class="text">Le club de lecture organise un truc de livres au centre de la plance ! Venez avec votre ouvrage et repartez avec une noucelle aventure. Restez parler lecture, échangez vos conseils et vos livres.</div>
								<a class="reply">Répondre</a>
								<a class="report">Signaler</a>
							</article>
						</div>
					</div>
					<div class="col-3">
						<form>
							<label for="comment">Commenter</label>
							<textarea id="comment"></textarea>
							<input type="submit" class="btn" value="Envoyer">
						</form>
					</div>
				</article>
			</section>

			<section class="share group center">
				<h1 class="banner">Partageons avec #GrenierMntRge</h1>
				<article class="group">
					<div class="col-3-2">
						<div class="image">
							<figure class="instagram big"><img src="images/barbecue-eleves-montrouge.jpg" alt="" /></figure>
							<figure class="instagram small"><img src="images/barbecue-eleves-montrouge.jpg" alt="" /></figure>
							<figure class="instagram small"><img src="images/chanter.jpg" alt="" /></figure>
						</div>
						<div class="image">
							<figure class="instagram small"><img src="images/barbecue-eleves-montrouge.jpg" alt="" /></figure>
							<figure class="instagram small"><img src="images/chanter.jpg" alt="" /></figure>
							<figure class="instagram big"><img src="images/barbecue-eleves-montrouge.jpg" alt="" /></figure>
						</div>
					</div>
					<div class="col-3">
						<div class="comment group">
							<figure><img src="images/avatar.png" alt="Bernard Martin" /></figure>
							<article>
								<div class="date">10h32 - 10/06/13</div>
								<h2><a href="#">Bernard Martin</a></h2>
								<div class="text">J'ouvrirais mon bar ce dimanche sur le chemin du vide grenier, n'hésitez pas a venir vous rafraichir entre deux achats autour d'une bière pour cette journée ensoleillé</div>
								<a class="reply">Répondre</a>
								<a class="report">Signaler</a>
							</article>
						</div>
						<div class="comment group">
							<figure><img src="images/avatar.png" alt="Bernard Martin" /></figure>
							<article>
								<div class="date">10h32 - 10/06/13</div>
								<h2><a href="#">Michel Gerard</a></h2>
								<div class="text">Pour les féru de vielles consoles mon stand sera à coté de l'église ! N'hésitez pas à venir me voir pour trouver votre donheur ou simplement discuter rétro-gaming</div>
								<a class="reply">Répondre</a>
								<a class="report">Signaler</a>
							</article>
						</div>
						<div class="comment group">
							<figure><img src="images/avatar.png" alt="Bernard Martin" /></figure>
							<article>
								<div class="date">10h32 - 10/06/13</div>
								<h2><a href="#">Giselle Michou</a></h2>
								<div class="text">Le club de lecture organise un truc de livres au centre de la plance ! Venez avec votre ouvrage et repartez avec une noucelle aventure. Restez parler lecture, échangez vos conseils et vos livres.</div>
								<a class="reply">Répondre</a>
								<a class="report">Signaler</a>
							</article>
						</div>
					</div>
				</article>
			</section>

			<section class="participants">
				<h1 class="banner">Qui participe ?</h1>
				<article class="group">
					
				</article>
			</section>
		</div>
		<!-- Fin page evenement -->
<?php include_once "footer.php"; ?>