<!doctype html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>association</title>
	</head>
	<body>
		<section>
			<?php if (!empty($error)) : ?>
				<output for="" form="" ><?php echo $error; ?></output>
			<?php endif; ?>
			<form action="" method="post" id="" />
				<?php if (!empty($associations['name'])) : ?>
				<?php foreach ($associations['name'] as $key => $value) : ?>
				<input type="text" name="name[<?php echo $key; ?>]" id="name" value="<?php echo $value; ?>" placeholder="association" />
				<?php endforeach; ?>
				<?php else : ?>
				<input type="text" name="name[]" id="name" placeholder="association" />
				<?php endif; ?>
				<?php if (!empty($associations['description'])) : ?>
				<?php foreach ($associations['description'] as $key => $value) : ?>
				<input type="text" name="description[<?php echo $key; ?>]" id="description" value="<?php echo $value; ?>" placeholder="description" />
				<?php endforeach; ?>
				<?php else : ?>
				<input type="text" name="description[]" id="description" placeholder="description" />
				<?php endif; ?>
				<?php if (!empty($associations['illustation'])) : ?>
				<?php foreach ($associations['illustation'] as $key => $value) : ?>
				<input type="text" name="illustation[<?php echo $key; ?>]" id="illustation" value="<?php echo $value; ?>" placeholder="illustation" />
				<?php endforeach; ?>
				<?php else : ?>
				<input type="text" name="illustation[]" id="illustation" placeholder="illustation" />
				<?php endif; ?>
				<?php if (!empty($associations['zip'])) : ?>
				<?php foreach ($associations['zip'] as $key => $value) : ?>
				<input type="text" name="zip[<?php echo $key; ?>]" id="zip" value="<?php echo $value; ?>" placeholder="Code postal" />
				<?php endforeach; ?>
				<?php else : ?>
				<input type="text" name="zip[]" id="zip" placeholder="Code postal" />
				<?php endif; ?>
				<?php if (!empty($associations['city'])) : ?>
				<?php foreach ($associations['city'] as $key => $value) : ?>
				<input type="text" name="city[<?php echo $key; ?>]" id="city" value="<?php echo $value; ?>" placeholder="Ville" />
				<?php endforeach; ?>
				<?php else : ?>
				<input type="text" name="city[]" id="city" placeholder="ville" />
				<?php endif; ?>
				<?php if (!empty($associations['address'])) : ?>
				<?php foreach ($associations['address'] as $key => $value) : ?>
				<input type="text" name="address[<?php echo $key; ?>]" id="location" value="<?php echo $value; ?>" placeholder="location" />
				<?php endforeach; ?>
				<?php else : ?>
				<input type="text" name="address[]" id="location" placeholder="location" />
				<?php endif; ?>
				<?php if (!empty($associations['date'])) : ?>
				<?php foreach ($associations['date'] as $key => $value) : ?>
				<input type="text" name="date[<?php echo $key; ?>]" id="date" value="<?php echo $value; ?>" placeholder="date" />
				<?php endforeach; ?>
				<?php else : ?>
				<input type="text" name="date[]" id="date" placeholder="date" />
				<?php endif; ?>
				<input type="submit" name="valider" id="valider" value="enregistrer" />
			</form>
		</section>
	</body>
</html>