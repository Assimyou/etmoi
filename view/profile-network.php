<section id="social" class="social showing group">
	<form action="" method="post" >
		<h1 class="banner">Réseaux sociaux</h1>
			<?php 	if ($editing) :
						$visibility = 'Privé';
						include "view/edit-button.php";
					endif; 

					if (!empty($users['twitter'])) :
					foreach ($users['twitter'] as $key => $value) :
						$twit['key'] = $key;
						$twit['value'] = $value;
					endforeach;
					else : 
						$twit['key'] = NULL;
						$twit['value'] = NULL;
					endif; 

					if (!empty($users['facebook'])) :
					foreach ($users['facebook'] as $key => $value) :
						$fb['key'] = $key;
						$fb['value'] = $value;
					endforeach;
					else : 
						$fb['key'] = NULL;
						$fb['value'] = NULL;
					endif;

					if (!empty($users['instagram'])) :
					foreach ($users['instagram'] as $key => $value) :
						$insta['key'] = $key;
						$insta['value'] = $value;
					endforeach;
					else : 
						$insta['key'] = NULL;
						$insta['value'] = NULL;
					endif; ?>

		
		<?php if ($showing) : ?>
		<div class="showing">
			<?php if (!empty($twit['value']) || !empty($fb['value']) || !empty($insta['value'])) : ?>
			<div>
				<?php if (!empty($twit['value'])) : ?>
				<div class="col-3">
					<h2>Twitter</h2>
					<label><span>@</span><?php echo htmlentities($twit['value'], ENT_QUOTES); ?></label>
				</div>
				<?php endif; ?>
				<?php if (!empty($fb['value'])) : ?>
				<div class="col-3">
					<h2>Facebook</h2>
					<label><span>facebook.com/</span><?php echo htmlentities($fb['value'], ENT_QUOTES); ?></label>
				</div>
				<?php endif; ?>
				<?php if (!empty($insta['value'])) : ?>
				<div class="col-3">
					<h2>Instagram</h2>
					<label><span>instagr.am/</span><?php echo htmlentities($insta['value'], ENT_QUOTES); ?></label>
				</div>
				<?php endif; ?>
			</div>
			<?php endif; ?>
		</div>
		<?php endif; ?>

		<?php if($editing) : ?>
		<div class="editing">
			<div>
				<div class="col-3">
					<h2>Twitter</h2>
					<input type="text" name="twitter[<?php if (!empty($twit['key'])) : echo $twit['key']; endif; ?>]" value="<?php if (!empty($twit['value'])) : echo htmlentities($twit['value'], ENT_QUOTES); endif; ?>" placeholder="@utilisateur" />
				</div>
				<div class="col-3">
					<h2>Facebook</h2>
					<input type="text" name="facebook[<?php if (!empty($fb['key'])) : echo $fb['key']; endif; ?>]" value="<?php if (!empty($fb['value'])) : echo htmlentities($fb['value'], ENT_QUOTES); endif; ?>" placeholder="facebook.com/utilisateur" />
				</div>
				<div class="col-3">
					<h2>Instagram</h2>
					<input type="text" name="instagram[<?php if (!empty($insta['key'])) : echo $insta['key']; endif; ?>]" value="<?php if (!empty($insta['value'])) : echo htmlentities($insta['value'], ENT_QUOTES); endif; ?>" placeholder="instagr.am/utilisateur" />
				</div>
			</div>
		</div>
		<?php endif; ?>
	</form>
</section>