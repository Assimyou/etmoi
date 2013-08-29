<section class="addevent center group">
	<form action="" enctype="multipart/form-data" method="post" />
		<h1 class="banner">Nouvel événement</h1>
		<div class="edit">
			<select>
				<option value="public">Public</option>
				<option value="private">Privé</option>
			</select>
			<input type="submit" name="event-<?php echo generateToken($_SERVER['REQUEST_URI']); ?>" value="enregistrer" class="btn" />
		</div>
		<div class="col-3-2">
			<h2>Titre</h2>
			<?php if (!empty($events['headline'])) : ?>
			<?php foreach ($events['headline'] as $key => $value) : ?>
			<input type="text" name="headline[<?php echo $key; ?>]"  value="<?php echo htmlentities($value, ENT_QUOTES); ?>" placeholder="titre" />
			<?php endforeach; ?>
			<?php else : ?>
			<input type="text" name="headline[]" placeholder="titre" />
			<?php endif; ?>
			<h2>Description</h2>
			<?php if (!empty($events['description'])) : ?>
			<?php foreach ($events['description'] as $key => $value) : ?>
			<textarea name="description[<?php echo $key; ?>]" placeholder="description" ><?php echo htmlentities($value, ENT_QUOTES); ?></textarea>
			<?php endforeach; ?>
			<?php else : ?>
			<textarea name="description[]" placeholder="description" ></textarea>
			<?php endif; ?>
			<h2>Adresse</h2>
			<?php if (!empty($events['address'])) : ?>
			<?php foreach ($events['address'] as $key => $value) : ?>
			<input type="text" name="address[<?php echo $key; ?>]" value="<?php echo htmlentities($value, ENT_QUOTES); ?>" placeholder="addresse" />
			<?php endforeach; ?>
			<?php else : ?>
			<input type="text" name="address[]" placeholder="adresse" />
			<?php endif; ?>
			<div class="group">
				<div class="col-3">
					<?php if (!empty($events['zip'])) : ?>
					<?php foreach ($events['zip'] as $key => $value) : ?>
					<input type="text" name="zip[<?php echo $key; ?>]" value="<?php echo htmlentities($value, ENT_QUOTES); ?>" placeholder="Code postal" />
					<?php endforeach; ?>
					<?php else : ?>
					<input type="text" name="zip[]" placeholder="Code postal" />
					<?php endif; ?>
				</div>
				<div class="col-3">
					<?php if (!empty($events['city'])) : ?>
					<?php foreach ($events['city'] as $key => $value) : ?>
					<input type="text" name="city[<?php echo $key; ?>]" value="<?php echo htmlentities($value, ENT_QUOTES); ?>" placeholder="Ville" />
					<?php endforeach; ?>
					<?php else : ?>
					<input type="text" name="city[]" placeholder="ville" />
					<?php endif; ?>
				</div>
				<div class="col-3">
					<input type="text" />
				</div>
			</div>
			<h2>Catégories</h2>
			<?php if (!empty($events['tag'])) : ?>
			<?php foreach ($events['tag'] as $key => $value) : ?>
			<input type="text" name="tag[<?php echo $key; ?>]" value="<?php echo htmlentities($value, ENT_QUOTES); ?>" placeholder="catégories" />
			<?php endforeach; ?>
			<?php else : ?>
			<input type="text" name="tag[]" placeholder="catégories" />
			<?php endif; ?>
		</div>
		<div class="col-3">
			<h2>#Mot Dièse</h2>
			<?php if (!empty($events['hashtag'])) : ?>
			<?php foreach ($events['hashtag'] as $key => $value) : ?>
			<input type="text" name="hashtag[<?php echo $key; ?>]" value="<?php echo htmlentities($value, ENT_QUOTES); ?>" placeholder="#Mot Dièse" />
			<?php endforeach; ?>
			<?php else : ?>
			<input type="text" name="hashtag[]" placeholder="#Mot Dièse" />
			<?php endif; ?>
			<h2>Date d'affichage</h2>
			<?php if (!empty($events['publish'])) : ?>
			<?php foreach ($events['publish'] as $key => $value) : ?>
			<input type="date" name="publish[<?php echo $key; ?>]" value="<?php echo $value; ?>" />
			<?php endforeach; ?>
			<?php else : ?>
			<input type="date" name="publish[]" />
			<?php endif; ?>
			<h2>Date du début</h2>
			<?php if (!empty($events['date'])) : ?>
			<?php foreach ($events['date'] as $key => $value) : ?>
			<input type="date" name="date[<?php echo $key; ?>]" value="<?php echo $value; ?>" />
			<?php endforeach; ?>
			<?php else : ?>
			<input type="date" name="date[]" />
			<?php endif; ?>
			<h2>Date de fin</h2>
			<input type="date" />
			<h2>Image</h2>
			<input type="file" name="illustration" accept="image/*" />

			<!-- Association -->
			<?php if (!empty($events['association'])) : ?>
			<?php foreach ($events['association'] as $key => $value) : ?>
			<input type="text" name="association[<?php echo $key; ?>]" value="<?php echo $value; ?>" placeholder="association" />
			<?php endforeach; ?>
			<?php else : ?>
			<input type="hidden" name="association[]" value="<?php echo $id['association']; ?>" />
			<?php endif; ?>
		</div>
	</form>
</section>