<?php include_once "header.php"; ?>

		<!-- Debut du corps du site -->
		<div class="content center group">

		<section>
			<?php if (!empty($error)) : ?>
				<output for="" form="" ><?php echo $error; ?></output>
			<?php endif; ?>
			<form action="" method="post" id="" />
				<?php if (!empty($users['mail'])) : ?>
				<?php foreach ($users['mail'] as $key => $value) : ?>
				<input type="text" name="mail[<?php echo $key; ?>]" id="mail" value="<?php echo $value; ?>" placeholder="mail" />
				<?php endforeach; ?>
				<?php else : ?>
				<input type="text" name="mail[]" id="mail" placeholder="mail" />
				<?php endif; ?>
				<?php if (!empty($users['association'])) : ?>
				<?php foreach ($users['association'] as $key => $value) : ?>
				<input type="text" name="association[<?php echo $key; ?>]" id="association" value="<?php echo $value; ?>" placeholder="association" />
				<?php endforeach; ?>
				<?php else : ?>
				<input type="text" name="association[]" id="association" placeholder="association" />
				<?php endif; ?>
				<?php if (!empty($users['name'])) : ?>
				<?php foreach ($users['name'] as $key => $value) : ?>
				<input type="text" name="name[<?php echo $key; ?>]" id="name"  value="<?php echo $value; ?>" placeholder="headline" />
				<?php endforeach; ?>
				<?php else : ?>
				<input type="text" name="name[]" id="name" placeholder="name" />
				<?php endif; ?>
				<?php if (!empty($users['firstname'])) : ?>
				<?php foreach ($users['firstname'] as $key => $value) : ?>
				<input type="text" name="firstname[<?php echo $key; ?>]" id="firstname"  value="<?php echo $value; ?>" placeholder="headline" />
				<?php endforeach; ?>
				<?php else : ?>
				<input type="text" name="firstname[]" id="firstname" placeholder="firstname" />
				<?php endif; ?>
				<?php if (!empty($users['description'])) : ?>
				<?php foreach ($users['description'] as $key => $value) : ?>
				<input type="text" name="description[<?php echo $key; ?>]" id="description" value="<?php echo $value; ?>" placeholder="description" />
				<?php endforeach; ?>
				<?php else : ?>
				<input type="text" name="description[]" id="description" placeholder="description" />
				<?php endif; ?>
				<?php if (!empty($users['illustation'])) : ?>
				<?php foreach ($users['illustation'] as $key => $value) : ?>
				<input type="text" name="illustation[<?php echo $key; ?>]" id="illustation" value="<?php echo $value; ?>" placeholder="illustation" />
				<?php endforeach; ?>
				<?php else : ?>
				<input type="text" name="illustation[]" id="illustation" placeholder="illustation" />
				<?php endif; ?>
				<?php if (!empty($users['zip'])) : ?>
				<?php foreach ($users['zip'] as $key => $value) : ?>
				<input type="text" name="zip[<?php echo $key; ?>]" id="zip" value="<?php echo $value; ?>" placeholder="Code postal" />
				<?php endforeach; ?>
				<?php else : ?>
				<input type="text" name="zip[]" id="zip" placeholder="Code postal" />
				<?php endif; ?>
				<?php if (!empty($users['city'])) : ?>
				<?php foreach ($users['city'] as $key => $value) : ?>
				<input type="text" name="city[<?php echo $key; ?>]" id="city" value="<?php echo $value; ?>" placeholder="Ville" />
				<?php endforeach; ?>
				<?php else : ?>
				<input type="text" name="city[]" id="city" placeholder="ville" />
				<?php endif; ?>
				<?php if (!empty($users['address'])) : ?>
				<?php foreach ($users['address'] as $key => $value) : ?>
				<input type="text" name="address[<?php echo $key; ?>]" id="location" value="<?php echo $value; ?>" placeholder="location" />
				<?php endforeach; ?>
				<?php else : ?>
				<input type="text" name="address[]" id="location" placeholder="location" />
				<?php endif; ?>
				<?php if (!empty($users['date'])) : ?>
				<?php foreach ($users['date'] as $key => $value) : ?>
				<input type="text" name="date[<?php echo $key; ?>]" id="date" value="<?php echo $value; ?>" placeholder="date" />
				<?php endforeach; ?>
				<?php else : ?>
				<input type="text" name="date[]" id="date" placeholder="date" />
				<?php endif; ?>
				<input type="submit" name="valider" id="valider" value="enregistrer" />
			</form>
		</section>
	</div>

<?php include_once "footer.php"; ?>
