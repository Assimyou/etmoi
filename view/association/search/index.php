<!doctype html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>search</title>
	</head>
	<body>
		<section>
			<?php if (!empty($error)) : ?>
			<output for="tags" form="search" ><?php echo $error; ?></output>
			<?php endif; ?>
			<form action="" method="post" id="search" />
				<input type="text" name="word" id="association" placeholder="association" />
				<input type="submit" name="research" id="research" value="rechercher" />
			</form>
		</section>
		<?php if (!empty($listAssos)) : ?>
		<section>
			<?php foreach ($listAssos as $id => $associations) : ?>
			<article id="<?php echo $id; ?>">
				<figure>
					<?php if (!empty($associations['illustration'])) : ?>
					<?php foreach ($associations['illustration'] as $index => $illustration) : ?>
	  				<img src="<?php echo $illustration; ?>" alt="" />
	  				<?php endforeach; ?>
	  				<?php endif; ?>
	  				<?php if (!empty($associations['name'])) : ?>
					<?php foreach ($associations['name'] as $index => $name) : ?>
	  				<figcaption><?php echo $name; ?></figcaption>
	  				<?php endforeach; ?>
	  				<?php endif; ?>
				</figure>
			</article>
			<?php endforeach; ?>
		</section>
		<?php endif; ?>
	</body>
</html>