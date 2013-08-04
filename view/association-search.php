<?php include_once "header.php"; ?>
	
	<!-- Debut du corps du site -->
	<div>

		<section>
			<form action="" method="get" id="search" />
				<input type="text" name="q" placeholder="rechercher une association" />
				<input type="submit" id="research" value="rechercher" />
			</form>
		</section>

		<?php if (!empty($listAssos)) : ?>
		<section>
			<h1>Les associations</h1>
				<div class="wrapper">
					<?php foreach ($listAssos as $id => $associations) : ?>
					<article class="association">
						<?php if (!empty($associations['name'])) : ?>
						<?php foreach ($associations['name'] as $index => $name) : ?>
						<h2><?php echo $name; ?></h2>
						<?php endforeach; ?>
	  					<?php endif; ?>
	  					<?php if (!empty($associations['illustration'])) : ?>
	  					<div class="thumbnail">
						<?php foreach ($associations['illustration'] as $index => $illustration) : ?>
							<img src="<?php echo $illustration; ?>" alt="Logo du club du parc" />
						<?php endforeach; ?>
						</div>
	  					<?php endif; ?>
						<a class="more" href="#"><span class="plus ir">Plus</span> de détails</a>
					</article>
					<?php endforeach; ?>
				</div>
		</section>
		<?php endif; ?>

	</div>

<?php include_once "footer.php"; ?>