<?php include_once "header.php"; ?>
	
	<!-- Debut du corps du site -->
	<div>

		<section>
			<form action="" method="get" id="search" />
				<input type="text" name="q" placeholder="rechercher un évènement" />
				<input type="submit" id="research" value="rechercher" />
			</form>
		</section>

		<?php if (!empty($listEvent)) : ?>
		<section class="evenements">
			<h1>Les évènements trouvés</h1>
			<div class="wrapper">
				<?php foreach ($listEvent as $id => $events) : ?>
				<article class="evenement small">
					<?php if (!empty($events['headline'])) : ?>
					<?php foreach ($events['headline'] as $index => $headline) : ?>
					<h2><?php echo $headline; ?></h2>
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
							<div class="where"><?php echo $address; ?></div>
							<?php endforeach; ?>
							<?php endif; ?>
						</div>
						<?php if (!empty($events['illustration'])) : ?>
						<?php foreach ($events['illustration'] as $index => $illustration) : ?>
						<div class="thumbnail"><img src="<?php echo $illustration; ?>" alt="Image des anciens élèves de montrouge au rassemblement de 2011 en train de griller des mergezes" /></div>
						<?php endforeach; ?>
	  					<?php endif; ?>
					</div>
					<div class="evenement-by">
						Par : <a href="associations/generation-montrouge.html">Génération Montrouge</a>
						<a class="more" href="evenement.php?q=<?php echo $id; ?>"><span class="plus ir">Plus</span> de détails</a>
					</div>
				</article>
				<?php endforeach; ?>
			</div>
		</section>
		<!-- Fin Derniers Évènement -->
		<?php endif; ?>
	</div>

<?php include_once "footer.php"; ?>