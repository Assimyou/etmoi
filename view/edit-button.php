<div class="edit">
	<?php if($visibility == "Privé") : ?>
		<div class="privacy hint--left" data-hint="Les informations privé ne sont visible que par vous et les dirigeants de vos associations"><?php echo $visibility; ?></div>
	<?php else : ?>
		<div class="privacy"><?php echo $visibility; ?></div>
	<?php endif; ?>
	<a class="btn createform" href="#">Éditer</a>
	<input type="submit" name="<?php echo $newToken; ?>" value="enregistrer" class="btn editing" />
</div>