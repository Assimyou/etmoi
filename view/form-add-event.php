<section class="addevent center group">
	<form action="" enctype="multipart/form-data" method="post" />
		<h1 class="banner">Nouvel événement</h1>
		<div class="edit">
			<select>
				<option value="public">Public</option>
				<option value="private">Privé</option>
			</select>
			<input type="submit" name="" value="enregistrer" class="btn" />
		</div>
		<div class="col-3-2">
			<h2>Titre</h2>
			<input type="text" />
			<h2>Description</h2>
			<?php if (!empty($events['description'])) : ?>
			<?php foreach ($events['description'] as $key => $value) : ?>
			<textarea name="description[<?php echo $key; ?>]" placeholder="description" ><?php echo $value; ?></textarea>
			<?php endforeach; ?>
			<?php else : ?>
			<textarea name="description[]" placeholder="description" ></textarea>
			<?php endif; ?>
			<h2>Adresse</h2>
			<?php if (!empty($events['address'])) : ?>
			<?php foreach ($events['address'] as $key => $value) : ?>
			<input type="text" name="address[<?php echo $key; ?>]" value="<?php echo $value; ?>" placeholder="adresse" />
			<?php endforeach; ?>
			<?php else : ?>
			<input type="text" name="address[]" placeholder="adresse" />
			<?php endif; ?>
			<div class="group">
				<div class="col-3"><input type="text" /></div>
				<div class="col-3"><input type="text" /></div>
				<div class="col-3"><input type="text" /></div>
			</div>
			<h2>Catégories</h2>
			<input type="text">
		</div>
		<div class="col-3">
			<h2>#Mot Dièse</h2>
			<input type="text" />
			<h2>Date d'affichage</h2>
			<input type="date" />
			<h2>Date du début</h2>
			<input type="date" />
			<h2>Date de fin</h2>
			<input type="date" />
			<h2>Image</h2>
			<input type="image" class="btn" />

			<!-- Association -->
			<?php if (!empty($events['association'])) : ?>
			<?php foreach ($events['association'] as $key => $value) : ?>
			<input type="text" name="association[<?php echo $key; ?>]" value="<?php echo $value; ?>" placeholder="association" />
			<?php endforeach; ?>
			<?php else : ?>
			<input type="text" name="association[]" placeholder="association" />
			<?php endif; ?>
		</div>
	</form>
</section>