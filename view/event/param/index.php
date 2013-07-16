<!doctype html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>event</title>
	</head>
	<body>
		<section>
			<?php if (!empty($error)) : ?>
				<output for="" form="" ><?php echo $error; ?></output>
			<?php endif; ?>
			<form action="" method="post" id="" />
				<?php if (!empty($events['association'])) : ?>
				<?php foreach ($events['association'] as $key => $value) : ?>
				<input type="text" name="association[<?php echo $key; ?>]" id="association" value="<?php echo $value; ?>" placeholder="association" />
				<?php endforeach; ?>
				<?php else : ?>
				<input type="text" name="association[]" id="association" placeholder="association" />
				<?php endif; ?>
				<?php if (!empty($events['headline'])) : ?>
				<?php foreach ($events['headline'] as $key => $value) : ?>
				<input type="text" name="headline[<?php echo $key; ?>]" id="headline"  value="<?php echo $value; ?>" placeholder="headline" />
				<?php endforeach; ?>
				<?php else : ?>
				<input type="text" name="headline[]" id="headline" placeholder="headline" />
				<?php endif; ?>
				<?php if (!empty($events['description'])) : ?>
				<?php foreach ($events['description'] as $key => $value) : ?>
				<input type="text" name="description[<?php echo $key; ?>]" id="description" value="<?php echo $value; ?>" placeholder="description" />
				<?php endforeach; ?>
				<?php else : ?>
				<input type="text" name="description[]" id="description" placeholder="description" />
				<?php endif; ?>
				<?php if (!empty($events['illustation'])) : ?>
				<?php foreach ($events['illustation'] as $key => $value) : ?>
				<input type="text" name="illustation[<?php echo $key; ?>]" id="illustation" value="<?php echo $value; ?>" placeholder="illustation" />
				<?php endforeach; ?>
				<?php else : ?>
				<input type="text" name="illustation[]" id="illustation" placeholder="illustation" />
				<?php endif; ?>
				<?php if (!empty($events['zip'])) : ?>
				<?php foreach ($events['zip'] as $key => $value) : ?>
				<input type="text" name="zip[<?php echo $key; ?>]" id="zip" value="<?php echo $value; ?>" placeholder="Code postal" />
				<?php endforeach; ?>
				<?php else : ?>
				<input type="text" name="zip[]" id="zip" placeholder="Code postal" />
				<?php endif; ?>
				<?php if (!empty($events['city'])) : ?>
				<?php foreach ($events['city'] as $key => $value) : ?>
				<input type="text" name="city[<?php echo $key; ?>]" id="city" value="<?php echo $value; ?>" placeholder="Ville" />
				<?php endforeach; ?>
				<?php else : ?>
				<input type="text" name="city[]" id="city" placeholder="ville" />
				<?php endif; ?>
				<?php if (!empty($events['address'])) : ?>
				<?php foreach ($events['address'] as $key => $value) : ?>
				<input type="text" name="address[<?php echo $key; ?>]" id="location" value="<?php echo $value; ?>" placeholder="location" />
				<?php endforeach; ?>
				<?php else : ?>
				<input type="text" name="address[]" id="location" placeholder="location" />
				<?php endif; ?>
				<?php if (!empty($events['hashtag'])) : ?>
				<?php foreach ($events['hashtag'] as $key => $value) : ?>
				<input type="text" name="hashtag[<?php echo $key; ?>]" id="hashtag" value="<?php echo $value; ?>" placeholder="hashtag" />
				<?php endforeach; ?>
				<?php else : ?>
				<input type="text" name="hashtag[]" id="hashtag" placeholder="hashtag" />
				<?php endif; ?>
				<?php if (!empty($events['tag'])) : ?>
				<?php foreach ($events['tag'] as $key => $value) : ?>
				<input type="text" name="tag[<?php echo $key; ?>]" id="tag" value="<?php echo $value; ?>" placeholder="tag" />
				<?php endforeach; ?>
				<?php else : ?>
				<input type="text" name="tag[]" id="tag" placeholder="tag" />
				<?php endif; ?>
				<input type="text" name="tag[]" id="tag2" placeholder="tag2" />
				<?php if (!empty($events['publish'])) : ?>
				<?php foreach ($events['publish'] as $key => $value) : ?>
				<input type="text" name="publish[<?php echo $key; ?>]" id="publish" value="<?php echo $value; ?>" placeholder="publish" />
				<?php endforeach; ?>
				<?php else : ?>
				<input type="text" name="publish[]" id="publish" placeholder="publish" />
				<?php endif; ?>
				<?php if (!empty($events['date'])) : ?>
				<?php foreach ($events['date'] as $key => $value) : ?>
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