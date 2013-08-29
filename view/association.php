<?php include_once "view/header.php"; ?>

		<!-- Debut du corps du site -->
		<div class="content association group">
			<div class="cover" style="background-image: url('images/vide-grenier.jpg');">
				<?php if (!empty($associations['name'])) : ?><div class="center"><?php foreach ($associations['name'] as $key => $value) : ?><h1><?php echo $value; ?></h1><?php endforeach; ?></div><?php endif; ?>
			</div>

			<?php if($ISLEADER) :
				include "view/form-add-event.php";
			endif; ?>

			<section class="description group">
				<article class="center">
					<div class="registering">
						<div class="registered">61 membres</div>
						<a href="#register" class="btn register">J'adhère </a>
					</div>
					<?php if (!empty($associations['description'])) : ?>
						<?php foreach ($associations['description'] as $key => $value) : ?>

						<?php $paragraph = mb_split('\r\n', $value);

								foreach ($paragraph as $p) :
								if (!empty($p)) : ?>
					<p><?php echo htmlentities($p, ENT_QUOTES); ?></p>
								<?php endif;
								endforeach;
						  	endforeach;
						endif; ?>
				</article>
			</section>

			<section class="participants center">
				<h1 class="banner">Les membres ?</h1>
				<article class="group">
					<div class="participant float-6">
						<figure><img src="images/avatar.png" alt="Bernard Martin" /></figure>
						<h3><a href="#">Giselle Michou</a></h3>
					</div>
					<div class="participant float-6">
						<figure><img src="images/avatar.png" alt="Bernard Martin" /></figure>
						<h3><a href="#">Giselle Michou</a></h3>
					</div>
					<div class="participant float-6">
						<figure><img src="images/avatar.png" alt="Bernard Martin" /></figure>
						<h3><a href="#">Bernard Martin</a></h3>
					</div>
					<div class="participant float-6">
						<figure><img src="images/avatar.png" alt="Bernard Martin" /></figure>
						<h3><a href="#">Giselle Michou</a></h3>
					</div>
					<div class="participant float-6">
						<figure><img src="images/avatar.png" alt="Bernard Martin" /></figure>
						<h3><a href="#">Steven Triangle</a></h3>
					</div>
					<div class="participant float-6">
						<figure><img src="images/avatar.png" alt="Bernard Martin" /></figure>
						<h3><a href="#">Giselle Michou</a></h3>
					</div>
					<div class="participant float-6">
						<figure><img src="images/avatar.png" alt="Bernard Martin" /></figure>
						<h3><a href="#">Bernard Martin</a></h3>
					</div>
					<div class="participant float-6">
						<figure><img src="images/avatar.png" alt="Bernard Martin" /></figure>
						<h3><a href="#">Giselle Michou</a></h3>
					</div>
					<div class="participant float-6">
						<figure><img src="images/avatar.png" alt="Bernard Martin" /></figure>
						<h3><a href="#">Michel</a></h3>
					</div>
					<div class="participant float-6">
						<figure><img src="images/avatar.png" alt="Bernard Martin" /></figure>
						<h3><a href="#">Giselle Michou</a></h3>
					</div>
					<div class="participant float-6">
						<figure><img src="images/avatar.png" alt="Bernard Martin" /></figure>
						<h3><a href="#">Bernard Martin</a></h3>
					</div>
					<div class="participant float-6">
						<figure><img src="images/avatar.png" alt="Bernard Martin" /></figure>
						<h3><a href="#">Giselle Michou</a></h3>
					</div>
					<div class="participant float-6">
						<figure><img src="images/avatar.png" alt="Bernard Martin" /></figure>
						<h3><a href="#">Bernard Martin</a></h3>
					</div>
					<div class="participant float-6">
						<figure><img src="images/avatar.png" alt="Bernard Martin" /></figure>
						<h3><a href="#">Giselle Michou</a></h3>
					</div>
					<div class="participant float-6">
						<figure><img src="images/avatar.png" alt="Bernard Martin" /></figure>
						<h3><a href="#">Steven Triangle</a></h3>
					</div>
					<div class="participant float-6">
						<figure><img src="images/avatar.png" alt="Bernard Martin" /></figure>
						<h3><a href="#">Michel</a></h3>
					</div>
					<div class="participant float-6">
						<figure><img src="images/avatar.png" alt="Bernard Martin" /></figure>
						<h3><a href="#">Giselle Michou</a></h3>
					</div>
					<div class="participant float-6">
						<figure><img src="images/avatar.png" alt="Bernard Martin" /></figure>
						<h3><a href="#">Giselle Michou</a></h3>
					</div>
					<div class="participant float-6">
						<figure><img src="images/avatar.png" alt="Bernard Martin" /></figure>
						<h3><a href="#">Steven Triangle</a></h3>
					</div>
					<div class="participant float-6">
						<figure><img src="images/avatar.png" alt="Bernard Martin" /></figure>
						<h3><a href="#">Steven Triangle</a></h3>
					</div>
					<div class="participant float-6">
						<figure><img src="images/avatar.png" alt="Bernard Martin" /></figure>
						<h3><a href="#">Michel</a></h3>
					</div>
					<div class="participant float-6">
						<figure><img src="images/avatar.png" alt="Bernard Martin" /></figure>
						<h3><a href="#">Giselle Michou</a></h3>
					</div>
				</article>
			</section>

			<div class="center group">
				<section class="evenements col-3-2">
					<h1 class="banner">Évènements</h1>
					<article class="group">
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
					</article>
				</section>

				<section class="badges col-3">
					<h1 class="banner">Les badges ?</h1>
					<article class="group">
						<article class="badge group">
							<figure><img src="images/badge-explorateur.png" alt="badge"></figure>
							<h2>Explorateur</h2>
							<p>Vous êtes réelement impliqué dans la vie associative de Montrouge, un véritable modèle à suivre ! Continuez sur cette voie.</p>
						</article>
						<article class="badge group">
							<figure><img src="images/badge-barbecue.png" alt="badge"></figure>
							<h2>J’apporte les saucisses ?</h2>
							<p>Rien de tel qu’un bon barbecue pour passer un bon moment entre amis, Participez à encore plus de barbecue pour obtenir une meilleure gratification.</p>
						</article>
					</article>
				</section>
			</div>

			<section class="share center">
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
		</div>
		<!-- Fin du corps du site -->

<?php include_once "view/footer.php"; ?>