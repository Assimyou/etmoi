<!doctype html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>login</title>
	</head>
	<body>
		<section>
			<?php if (!empty($error)) : ?>
				<output for="" form="" ><?php echo $error; ?></output>
			<?php endif; ?>
			<form action="" method="post" id="" />
				<input type="text" name="mail[]" id="mail" placeholder="mail" />
				<input type="text" name="password[]" id="password" placeholder="password" />
				<input type="submit" name="valider" id="valider" value="enregistrer" />
			</form>
		</section>
	</body>
</html>