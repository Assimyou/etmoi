<section id="identity" class="identity showing group">
	<form action="" method="post" >
		<h1 class="banner">Identité</h1>
			<?php 	if ($editing) :
						$visibility = 'Privé';
						include "edit-button.php";
					endif; 
					
					if (!empty($users['firstname'])) :
					foreach ($users['firstname'] as $key => $value) :
						$firstname['key'] = $key;
						$firstname['value'] = $value;
					endforeach;
					else : 
						$firstname['key'] = NULL;
						$firstname['value'] = NULL;
					endif;

					if (!empty($users['name'])) :
					foreach ($users['name'] as $key => $value) :
						$name['key'] = $key;
						$name['value'] = $value;
					endforeach;
					else : 
						$name['key'] = NULL;
						$name['value'] = NULL;
					endif;

					if (!empty($users['sex'])) :
					foreach ($users['sex'] as $key => $value) :
						$sex['key'] = $key;
						$sex['value'] = $value;
					endforeach;
					else : 
						$sex['key'] = NULL;
						$sex['value'] = NULL;
					endif;

					if (!empty($users['date'])) :
					foreach ($users['date'] as $key => $value) :
						$date['key'] = $key;
						$date['value'] = $value;
					endforeach;
					else : 
						$date['key'] = NULL;
						$date['value'] = NULL;
					endif; ?>

		<?php if ($showing) : ?>
		<div class="showing">
			<?php if (!empty($firstname['value']) || !empty($name['value'])) : ?>
			<div>
				<?php if (!empty($firstname['value'])) : ?>
				<div class="col-2">
					<h2>Prénom</h2><label><?php echo htmlentities($firstname['value'], ENT_QUOTES); ?></label>
				</div>
				<?php endif; ?>
				<?php if (!empty($name['value'])) : ?>
				<div class="col-2">
					<h2>Nom</h2><label><?php echo htmlentities($name['value'], ENT_QUOTES); ?></label>
				</div>
				<?php endif; ?>
			</div>
			<?php endif; 

			if (!empty($sex['value']) || !empty($date['value'])) : ?>
			<div>
				<?php if (!empty($sex['value'])) : ?>
				<div class="col-2">
					<h2>Sexe</h2><label><?php echo htmlentities($sex['value'], ENT_QUOTES); ?></label>
				</div>
				<?php endif; ?>
				<?php if (!empty($date['value'])) : ?>
				<div class="col-2">
					<label>13/09/2013</label>
					<h2>Date de naissance</h2><label><?php echo htmlentities($date['value'], ENT_QUOTES); ?></label>
				</div>
				<?php endif; ?>
			</div>
			<?php endif; ?>
		</div>
		<?php endif; ?>

		<?php if($editing) : ?>
			<div class="editing">
				<div>
					<div class="col-2">
						<h2>Prénom</h2>
						<input type="text" name="firstname[<?php if (!empty($firstname['key'])) : echo $firstname['key']; endif; ?>]" value="<?php if (!empty($firstname['value'])) : echo htmlentities($firstname['value'], ENT_QUOTES); endif; ?>" placeholder="Prénom" />
					</div>
					<div class="col-2">
						<h2>Nom</h2>
						<input type="text" name="name[<?php if (!empty($name['key'])) : echo $name['key']; endif; ?>]" value="<?php if (!empty($name['value'])) : echo htmlentities($name['value'], ENT_QUOTES); endif; ?>" placeholder="Nom" />
					</div>
				</div>
				<div>
					<div class="col-2">
						<h2>Sexe</h2>
						<input type="radio" name="sexe[<?php if (!empty($sex['key'])) : echo $sex['key']; endif; ?>]" id="femme" value="Femme" <?php if (!empty($sex['value']) && $sex['value'] == 'Femme') : ?>checked="true"<?php endif; ?> /> 
						<label for="femme">Femme</label> 
						<input type="radio" name="sexe[<?php if (!empty($sex['key'])) : echo $sex['key']; endif; ?>]" id="homme" value="Homme" <?php if (!empty($sex['value']) && $sex['value'] == 'Homme') : ?>checked="true"<?php endif; ?> /> 
						<label for="homme">Homme</label> 
						<input type="radio" name="sexe[<?php if (!empty($sex['key'])) : echo $sex['key']; endif; ?>]" id="autre" value="Autre" <?php if (!empty($sex['value']) && $sex['value'] == 'Autre') : ?>checked="true"<?php endif; ?> /> 
						<label for="autre">Autre</label> 
					</div>
					<div class="col-2">
						<h2>Date de naissance</h2>
						<input type="date" />
					</div>
				</div>
			</div>
		<?php endif; ?>
	</form>
</section>