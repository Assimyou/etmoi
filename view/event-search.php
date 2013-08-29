<?php include_once "view/header.php"; ?>
	
	<div class="search-zone group">
		<form action="" method="get" id="search" />
			<input type="text" name="q" placeholder="rechercher un évènement" />
			<select name="cat" >
				<option value="date" selected>date</option>
				<option value="headline" >titre</option>
				<option value="address" >adresse</option>
				<option value="tag" >catégorie</option>
			</select>
			<input type="submit" value="rechercher" class="btn" />
		</form>
	</div>

	<!-- Debut du corps du site -->
	<div class="content event group">
		<?php if (!empty($listEvent)) : ?>
		<section class="events">
			<h1 class="banner">Les évènements trouvés</h1>
			<div class="wrapper">
				<?php foreach ($listEvent as $id => $events) : ?>
				<article class="evenement big">
					<?php if (!empty($events['headline'])) : ?>
					<?php foreach ($events['headline'] as $index => $headline) : ?>
					<h1 class="left-50"><a href="evenement.php?q=<?php echo $events['id']; ?>"><?php echo htmlentities($headline, ENT_QUOTES); ?></a></h1>
					<?php endforeach; ?>
					<?php endif; ?>

					<div class="evenement-by left-50">
						Par : <a href="associations/generation-montrouge.html">Génération Montrouge</a>
						<a class="more" href="evenement.php?q=<?php echo $events['id']; ?>"><span class="plus ir">Plus</span> de détails</a>
					</div>

					<div class="infos left-50 group">
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
					<figure><img src="<?php echo $illustration; ?>" alt="" /></figure>
					<?php endforeach; ?>
					<?php else : ?>
					<figure><img src="view/images/event-remplace.png" alt="" /></figure>
  					<?php endif; ?>

					<?php if (!empty($events['description'])) : ?>
					<div class="description left-50 group">
						<?php foreach ($events['description'] as $key => $value) : ?>
						<?php $paragraph = mb_split('\r\n', $value);
								foreach ($paragraph as $p) :
								if (!empty($p)) : ?>
									<p><?php echo htmlentities($p, ENT_QUOTES); ?></p>
								<?php endif;
								endforeach;
						  	endforeach;
						endif; ?>
					</div>
					<?php if (!empty($events['tag'])) : ?><div class="category left-50">Catégories : <?php foreach ($events['tag'] as $key => $value) : ?><a href="evenements.php?q=<?php echo $value; ?>"><?php echo htmlentities($value, ENT_QUOTES); ?></a><?php endforeach; ?></div><?php endif; ?>

					<div class="registering left-50 group">
						<div class="registered">61 inscrits</div>
						<a href="#register" class="btn register">J'y vais </a>
					</div>
				</article>
				<?php endforeach; ?>
			</div>
		</section>
		<!-- Fin Derniers Évènement -->
		<?php endif; ?>
	</div>

<?php include_once "view/footer.php"; ?>