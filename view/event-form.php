<?php include_once "view/header.php"; ?>
	
	<!-- Debut du corps du site -->
	<div class="content center group">
		<section>
			<form action="" enctype="multipart/form-data" method="post" />
				<?php if (!empty($events['association'])) : ?>
				<?php foreach ($events['association'] as $key => $value) : ?>
				<input type="text" name="association[<?php echo $key; ?>]" value="<?php echo $value; ?>" placeholder="association" />
				<?php endforeach; ?>
				<?php else : ?>
				<input type="text" name="association[]" placeholder="association" />
				<?php endif; ?>

				<?php if (!empty($events['headline'])) : ?>
				<?php foreach ($events['headline'] as $key => $value) : ?>
				<input type="text" name="headline[<?php echo $key; ?>]"  value="<?php echo $value; ?>" placeholder="headline" />
				<?php endforeach; ?>
				<?php else : ?>
				<input type="text" name="headline[]" placeholder="headline" />
				<?php endif; ?>

				<?php if (!empty($events['description'])) : ?>
				<?php foreach ($events['description'] as $key => $value) : ?>
				<textarea name="description[<?php echo $key; ?>]" placeholder="description" ><?php htmlentities($value, ENT_QUOTES); ?></textarea>
				<?php endforeach; ?>
				<?php else : ?>
				<textarea name="description[]" placeholder="description" ></textarea>
				<?php endif; ?>

				<input type="file" name="illustration" accept="image/jpeg" />

				<?php if (!empty($events['zip'])) : ?>
				<?php foreach ($events['zip'] as $key => $value) : ?>
				<input type="text" name="zip[<?php echo $key; ?>]" value="<?php echo $value; ?>" placeholder="Code postal" />
				<?php endforeach; ?>
				<?php else : ?>
				<input type="text" name="zip[]" placeholder="Code postal" />
				<?php endif; ?>

				<?php if (!empty($events['city'])) : ?>
				<?php foreach ($events['city'] as $key => $value) : ?>
				<input type="text" name="city[<?php echo $key; ?>]" value="<?php echo $value; ?>" placeholder="Ville" />
				<?php endforeach; ?>
				<?php else : ?>
				<input type="text" name="city[]" placeholder="ville" />
				<?php endif; ?>

				<?php if (!empty($events['address'])) : ?>
				<?php foreach ($events['address'] as $key => $value) : ?>
				<input type="text" name="address[<?php echo $key; ?>]" value="<?php echo $value; ?>" placeholder="adresse" />
				<?php endforeach; ?>
				<?php else : ?>
				<input type="text" name="address[]" placeholder="adresse" />
				<?php endif; ?>

				<?php if (!empty($events['data-location'])) : ?>
				<?php foreach ($events['data-location'] as $key => $value) : ?>
				<input type="text" name="location[<?php echo $key; ?>]" value="<?php echo $value; ?>" placeholder="location" />
				<?php endforeach; ?>
				<?php else : ?>
				<input type="text" name="location[]" placeholder="location" />
				<?php endif; ?>

				<?php if (!empty($events['hashtag'])) : ?>
				<?php foreach ($events['hashtag'] as $key => $value) : ?>
				<input type="text" name="hashtag[<?php echo $key; ?>]" value="<?php echo $value; ?>" placeholder="hashtag" />
				<?php endforeach; ?>
				<?php else : ?>
				<input type="text" name="hashtag[]" placeholder="hashtag" />
				<?php endif; ?>

				<?php if (!empty($events['tag'])) : ?>
				<?php foreach ($events['tag'] as $key => $value) : ?>
				<input type="text" name="tag[<?php echo $key; ?>]" value="<?php echo $value; ?>" placeholder="tag" />
				<?php endforeach; ?>
				<?php else : ?>
				<input type="text" name="tag[]" placeholder="tag" />
				<?php endif; ?>

				<?php if (!empty($events['publish'])) : ?>
				<?php foreach ($events['publish'] as $key => $value) : ?>
				<input type="text" name="publish[<?php echo $key; ?>]" value="<?php echo $value; ?>" placeholder="date de puplication" />
				<?php endforeach; ?>
				<?php else : ?>
				<input type="text" name="publish[]" id="publish" placeholder="date de puplication" />
				<?php endif; ?>

				<?php if (!empty($events['date'])) : ?>
				<?php foreach ($events['date'] as $key => $value) : ?>
				<input type="text" name="date[<?php echo $key; ?>]" id="date" value="<?php echo $value; ?>" placeholder="date de l'évènement" />
				<?php endforeach; ?>
				<?php else : ?>
				<input type="text" name="date[]" placeholder="date de l'évènement" />
				<?php endif; ?>
				<input type="submit" class="btn" name="<?php echo generateToken($_SERVER['REQUEST_URI']); ?>" value="enregistrer" />
			</form>
		</section>
	</div>

<?php include_once "view/footer.php"; ?>