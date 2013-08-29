<?php include_once "view/header.php"; ?>
	
	<div class="search-zone group">
		<form action="" method="get" id="search" />
			<input type="text" name="q" placeholder="rechercher une association" />
			<input type="submit" id="research" value="rechercher" class="btn" />
		</form>
	</div>

	<!-- Debut du corps du site -->
	<div class="content association group">
		<?php if (!empty($listAssos)) : ?>
		<section class="center group">
			<h1 class="banner">Les associations</h1>
			<div class="wrapper">
				<?php foreach ($listAssos as $id => $associations) : ?>
				<article class="association float-3">
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
		</section>
		<?php endif; ?>

	</div>

<?php include_once "view/footer.php"; ?>