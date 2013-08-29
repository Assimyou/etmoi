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
			<input type="text" name="headline[]" placeholder="titre" />
			<h2>Description</h2>
			<textarea name="description[]" placeholder="description" ></textarea>
			<h2>Adresse</h2>
			<input type="text" name="address[]" placeholder="adresse" />
			<h2>Catégories</h2>
			<input type="text" name="tag[]" placeholder="catégories" />
		</div>
		<div class="col-3">
			<h2>#Mot Dièse</h2>
			<input type="text" name="hashtag[]" placeholder="#Mot Dièse" />
			<h2>Date d'affichage</h2>
			<input type="date" name="publish[]" value="<?php echo date('Y-m-d');?>" />
			<h2>Date de l'événement</h2>
			<input type="date" name="date[]" />
			<h2>Image</h2>
			<input type="file" name="illustration" accept="image/*" />
			
			<!-- Association -->
			<input type="hidden" name="association[]" value="<?php echo $id['association']; ?>" />
		</div>
	</form>
</section>