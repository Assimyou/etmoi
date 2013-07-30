		<!-- Debut du footer -->
		<footer class="group">
			<div class="center">
				<div class="sitemap">
					<h3>Montrouge et moi</h3>
					<nav class="footer-menu">
						<a href="#">Accueil</a>
						<a href="#">Événements</a>
						<a href="#">Associations</a>
						<a href="#">Badges</a>
						<a href="#">Profil de Loïc</a>
						<a href="http://www.endoftheinternet.com/" target="_blank">Mentions légales</a>
						
					</nav>
				</div>

				<div class="top-associations">
					<h3>Top associations</h3>
					<nav>
						<a href="#">Bièrestorming<span>999</span></a>
						<a href="#">Le club du Parc <span>999</span></a>
						<a href="#">L'Amicale des Pompiers<span>999</span></a>
						<a href="#">Femen<span>999</span></a>
						<a href="#">Green Peace<span>999</span></a>
					</nav>
				</div>

				<div class="login">
					<h3>Pas encore connecté ?</h3>
					<form action="" method="post" >
					<?php if (empty($_SESSION['id'])) : ?>
						<input type="text" name="mail" />
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



		<script src="js/jquery-1.10.2.min.js" type="text/javascript"></script>
		<script src="js/jquery.parallax.js"></script>
		<script src="js/main.js" type="text/javascript"></script>

		<!-- Debut des scripts. 
		Google Analytics: ne pas oublier de mettre l'ID Correcte. 
		<script>
			var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
			(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
			g.src='//www.google-analytics.com/ga.js';
			s.parentNode.insertBefore(g,s)}(document,'script'));
		</script> -->
	</body>
</html>