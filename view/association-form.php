<?php include_once "view/header.php"; ?>

		<!-- Debut du corps du site -->
		<div class="content center group">
			<section>
				<form action="" enctype="multipart/form-data" method="post" >
					<?php if (!empty($associations['name'])) : ?>
					<?php foreach ($associations['name'] as $key => $value) : ?>
					<input type="text" name="name[<?php echo $key; ?>]" value="<?php echo htmlentities($value, ENT_QUOTES); ?>" placeholder="association" />
					<?php endforeach; ?>
					<?php else : ?>
					<input type="text" name="name[]" placeholder="association" />
					<?php endif; ?>

					<?php if (!empty($events['description'])) : ?>
					<?php foreach ($events['description'] as $key => $value) : ?>
					<textarea name="description[<?php echo $key; ?>]" placeholder="description" ><?php echo htmlentities($value, ENT_QUOTES); ?></textarea>
					<?php endforeach; ?>
					<?php else : ?>
					<textarea name="description[]" placeholder="description" ></textarea>
					<?php endif; ?>

					<input type="file" name="illustration" accept="image/jpeg" />

					<input type="file" name="cover" accept="image/jpeg" />

					<?php if (!empty($associations['zip'])) : ?>
					<?php foreach ($associations['zip'] as $key => $value) : ?>
					<input type="text" name="zip[<?php echo $key; ?>]" value="<?php echo htmlentities($value, ENT_QUOTES); ?>" placeholder="Code postal" />
					<?php endforeach; ?>
					<?php else : ?>
					<input type="text" name="zip[]" placeholder="Code postal" />
					<?php endif; ?>

					<?php if (!empty($associations['city'])) : ?>
					<?php foreach ($associations['city'] as $key => $value) : ?>
					<input type="text" name="city[<?php echo $key; ?>]" value="<?php echo htmlentities($value, ENT_QUOTES); ?>" placeholder="Ville" />
					<?php endforeach; ?>
					<?php else : ?>
					<input type="text" name="city[]" placeholder="ville" />
					<?php endif; ?>

					<?php if (!empty($associations['address'])) : ?>
					<?php foreach ($associations['address'] as $key => $value) : ?>
					<input type="text" name="address[<?php echo $key; ?>]" value="<?php echo htmlentities($value, ENT_QUOTES); ?>" placeholder="location" />
					<?php endforeach; ?>
					<?php else : ?>
					<input type="text" name="address[]" placeholder="location" />
					<?php endif; ?>

					<?php if (!empty($associations['date'])) : ?>
					<?php foreach ($associations['date'] as $key => $value) : ?>
					<input type="text" name="date[<?php echo $key; ?>]" value="<?php echo htmlentities($value, ENT_QUOTES); ?>" placeholder="date" />
					<?php endforeach; ?>
					<?php else : ?>
					<input type="text" name="date[]" placeholder="date" />
					<?php endif; ?>

					<input type="submit" name="association-<?php echo generateToken($_SERVER['REQUEST_URI']); ?>" value="enregistrer" />
				</form>
			</section>
		</div>

<?php include_once "view/footer.php"; ?>