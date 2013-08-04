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
				<article>
					<div class="col-3-2">
						Durant la Révolution, on prête aux carrières de Montrouge d'avoir servi de cachette pour Condorcet, qui y aurait passé sa dernière nuit de liberté.
						Le premier maire de Montrouge fut François Ory (1790) qui était maître carrier de profession.
						En 1814, les jésuites revinrent à Montrouge.
						C'est dans la plaine qui forme le territoire de cette commune que les troupes françaises, échappées au désastre du Mont Saint Jean, étaient, en 1815 rangées en bataille. Les élèves de l'École polytechnique, persuadés qu'on allait livrer bataille sous les murs de Paris, avaient abandonné leur position sur la butte de Saint Chaumont pour se réunir avec leurs canons. Cette armée, cette troupes brûlaient d'en venir aux mains, mais elles apprirent la convention de Saint Cloud et elles quittèrent Montrouge, le lendemain, pour aller au delà de la Loire.
						En 1843, un géographe M. Sanis, crée près de la mairie de Montrouge une attraction éducative figurant la France en miniature : le Géorama7.
					</div>
					<div class="col-3">
						Sous le Second Empire, les « ateliers catholiques » de Montrouge, dirigés par l'abbé Migne et employant de nombreux jeunes artistes, fournissent les églises de France en matériels de décoration, notamment en peintures à l'huile sur toile. Trois des plus intéressants spécimens de cette production, dans le style de Delacroix, se trouvent encore dans le chœur de l'église Saint Jean Baptiste d'Audresselles (Pas-de-Calais).
					</div>
				</article>
			</section>

			<section class="share group center">
				<h1 class="banner">Partageons avec #GrenierMntRge</h1>
				<article>
					<div class="col-3-2">
						Durant la Révolution, on prête aux carrières de Montrouge d'avoir servi de cachette pour Condorcet, qui y aurait passé sa dernière nuit de liberté.
						Le premier maire de Montrouge fut François Ory (1790) qui était maître carrier de profession.
						En 1814, les jésuites revinrent à Montrouge.
						C'est dans la plaine qui forme le territoire de cette commune que les troupes françaises, échappées au désastre du Mont Saint Jean, étaient, en 1815 rangées en bataille. Les élèves de l'École polytechnique, persuadés qu'on allait livrer bataille sous les murs de Paris, avaient abandonné leur position sur la butte de Saint Chaumont pour se réunir avec leurs canons. Cette armée, cette troupes brûlaient d'en venir aux mains, mais elles apprirent la convention de Saint Cloud et elles quittèrent Montrouge, le lendemain, pour aller au delà de la Loire.
						En 1843, un géographe M. Sanis, crée près de la mairie de Montrouge une attraction éducative figurant la France en miniature : le Géorama7.
					</div>
					<div class="col-3">
						Sous le Second Empire, les « ateliers catholiques » de Montrouge, dirigés par l'abbé Migne et employant de nombreux jeunes artistes, fournissent les églises de France en matériels de décoration, notamment en peintures à l'huile sur toile. Trois des plus intéressants spécimens de cette production, dans le style de Delacroix, se trouvent encore dans le chœur de l'église Saint Jean Baptiste d'Audresselles (Pas-de-Calais).
					</div>
				</article>
			</section>

			<section class="participants">
				<h1 class="banner">Qui participe ?</h1>
				<article>
					
				</article>
			</section>
		</div>
		<!-- Fin page evenement -->
<?php include_once "footer.php"; ?>