<section id="profil" class="profil showing group">
	<form action="" enctype="multipart/form-data" method="post" >
		<h1 class="banner">Profil</h1>
		<?php 	if ($editing) :
					$visibility = 'Privé';
					include "view/edit-button.php";
				endif; 

				if (!empty($users['mail'])) :
					foreach ($users['mail'] as $key => $value) :
						$mail['key'] = $key;
						$mail['value'] = $value;
					endforeach;
				else : 
					$mail['key'] = NULL;
					$mail['value'] = NULL;
				endif; ?>

		<?php if ($showing) : ?>
		<div class="showing">
			<div>
				<div class="col-2">
					<?php if (!empty($mail['value'])) : ?><h2>E-Mail</h2><label><?php echo htmlentities($mail['value'], ENT_QUOTES); ?></label><?php endif; ?>
				</div>
			</div>
		</div>
		<?php endif; ?>
		<?php if ($editing) : ?>
		<div class="editing">
			<div>
				<div class="col-2">
					<h2>E-Mail</h2>
					<input type="text" name="mail[<?php if (!empty($mail['key'])) : echo $mail['key']; endif; ?>]" value="<?php if (!empty($mail['key'])) : echo htmlentities($mail['value'], ENT_QUOTES); endif; ?>" placeholder="E-Mail" />
				</div>
			</div>
		</div>
		<?php endif; ?>
	</form>
</section>
