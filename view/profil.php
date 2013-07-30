<?php include_once "header.php"; ?>

		<!-- Debut du corps du site -->
		<div class="content center group">

		<section>
			<?php if (!empty($error)) : ?>
				<output for="" form="" ><?php echo $error; ?></output>
			<?php endif; ?>
			<form action="" method="post" />
				<?php if (!empty($users['mail'])) : ?>
				<?php foreach ($users['mail'] as $key => $value) : ?>
				<input type="text" name="mail[<?php echo $key; ?>]" value="<?php echo $value; ?>" placeholder="mail" />
				<?php endforeach; ?>
				<?php else : ?>
				<input type="text" name="mail[]" placeholder="mail" />
				<?php endif; ?>

				<?php if (!empty($users['association'])) : ?>
				<?php foreach ($users['association'] as $key => $value) : ?>
				<input type="text" name="association[<?php echo $key; ?>]" value="<?php echo $value; ?>" placeholder="association" />
				<?php endforeach; ?>
				<?php else : ?>
				<input type="text" name="association[]" placeholder="association" />
				<?php endif; ?>

				<?php if (!empty($users['name'])) : ?>
				<?php foreach ($users['name'] as $key => $value) : ?>
				<input type="text" name="name[<?php echo $key; ?>]" value="<?php echo $value; ?>" placeholder="headline" />
				<?php endforeach; ?>
				<?php else : ?>
				<input type="text" name="name[]" placeholder="name" />
				<?php endif; ?>

				<?php if (!empty($users['firstname'])) : ?>
				<?php foreach ($users['firstname'] as $key => $value) : ?>
				<input type="text" name="firstname[<?php echo $key; ?>]" value="<?php echo $value; ?>" placeholder="headline" />
				<?php endforeach; ?>
				<?php else : ?>
				<input type="text" name="firstname[]" placeholder="firstname" />
				<?php endif; ?>

				<?php if (!empty($events['description'])) : ?>
				<?php foreach ($events['description'] as $key => $value) : ?>
				<textarea name="description[<?php echo $key; ?>]" placeholder="description" ><?php echo $value; ?></textarea>
				<?php endforeach; ?>
				<?php else : ?>
				<textarea name="description[]" placeholder="description" ></textarea>
				<?php endif; ?>

				<?php if (!empty($events['illustation'])) : ?>
				<?php foreach ($events['illustation'] as $key => $value) : ?>
				<input type="file" name="illustation[<?php echo $key; ?>]" accept="image/jpeg" />
				<?php endforeach; ?>
				<?php else : ?>
				<input type="file" name="illustation[]" accept="image/jpeg" />
				<?php endif; ?>

				<?php if (!empty($users['zip'])) : ?>
				<?php foreach ($users['zip'] as $key => $value) : ?>
				<input type="text" name="zip[<?php echo $key; ?>]" value="<?php echo $value; ?>" placeholder="Code postal" />
				<?php endforeach; ?>
				<?php else : ?>
				<input type="text" name="zip[]" placeholder="Code postal" />
				<?php endif; ?>

				<?php if (!empty($users['city'])) : ?>
				<?php foreach ($users['city'] as $key => $value) : ?>
				<input type="text" name="city[<?php echo $key; ?>]" value="<?php echo $value; ?>" placeholder="Ville" />
				<?php endforeach; ?>
				<?php else : ?>
				<input type="text" name="city[]" placeholder="ville" />
				<?php endif; ?>

				<?php if (!empty($users['address'])) : ?>
				<?php foreach ($users['address'] as $key => $value) : ?>
				<input type="text" name="address[<?php echo $key; ?>]" value="<?php echo $value; ?>" placeholder="location" />
				<?php endforeach; ?>
				<?php else : ?>
				<input type="text" name="address[]" placeholder="location" />
				<?php endif; ?>

				<?php if (!empty($users['date'])) : ?>
				<?php foreach ($users['date'] as $key => $value) : ?>
				<input type="text" name="date[<?php echo $key; ?>]" value="<?php echo $value; ?>" placeholder="date" />
				<?php endforeach; ?>
				<?php else : ?>
				<input type="text" name="date[]" placeholder="date" />
				<?php endif; ?>

				<input type="submit" name="valider" value="enregistrer" />
			</form>
		</section>
	</div>

<?php include_once "footer.php"; ?>
