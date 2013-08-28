<?php include_once "view/header.php"; ?>

		<!-- Debut du corps du site -->
		<div>

		<section>
			<form action="" enctype="multipart/form-data" method="post" />
				<?php if (!empty($users['mail'])) : ?>
				<?php foreach ($users['mail'] as $key => $value) : ?>
				<input type="text" name="mail[<?php echo $key; ?>]" value="<?php echo htmlentities($value, ENT_QUOTES); ?>" placeholder="mail" />
				<?php endforeach; ?>
				<?php else : ?>
				<input type="text" name="mail[]" placeholder="mail" />
				<?php endif; ?>

				<?php if (!empty($users['association'])) : ?>
				<?php foreach ($users['association'] as $key => $value) : ?>
				<input type="text" name="association[<?php echo $key; ?>]" value="<?php echo htmlentities($value, ENT_QUOTES); ?>" placeholder="association" />
				<?php endforeach; ?>
				<?php else : ?>
				<input type="text" name="association[]" placeholder="association" />
				<?php endif; ?>

				<?php if (!empty($users['name'])) : ?>
				<?php foreach ($users['name'] as $key => $value) : ?>
				<input type="text" name="name[<?php echo $key; ?>]" value="<?php echo htmlentities($value, ENT_QUOTES); ?>" placeholder="headline" />
				<?php endforeach; ?>
				<?php else : ?>
				<input type="text" name="name[]" placeholder="name" />
				<?php endif; ?>

				<?php if (!empty($users['firstname'])) : ?>
				<?php foreach ($users['firstname'] as $key => $value) : ?>
				<input type="text" name="firstname[<?php echo $key; ?>]" value="<?php echo htmlentities($value, ENT_QUOTES); ?>" placeholder="headline" />
				<?php endforeach; ?>
				<?php else : ?>
				<input type="text" name="firstname[]" placeholder="firstname" />
				<?php endif; ?>

				<?php if (!empty($users['description'])) : ?>
				<?php foreach ($users['description'] as $key => $value) : ?>
				<textarea name="description[<?php echo $key; ?>]" placeholder="description" ><?php htmlentities($value, ENT_QUOTES); ?></textarea>
				<?php endforeach; ?>
				<?php else : ?>
				<textarea name="description[]" placeholder="description" ></textarea>
				<?php endif; ?>

				<!-- debut previsualisation -->
				<div id="previewcanvascontainer">
					<script>
						function ShowImagePreview(files)
						{
						    if( !( window.File && window.FileReader && window.FileList && window.Blob ) )
						    {
						      alert('The File APIs are not fully supported in this browser.');
						      return false;
						    }

						    if( typeof FileReader === "undefined" )
						    {
						        alert( "Filereader undefined!" );
						        return false;
						    }

						    var file = files[0];

						    if( !( /image/i ).test( file.type ) )
						    {
						        alert( "File is not an image." );
						        return false;
						    }

						    reader = new FileReader();
						    reader.onload = function(event) 
						            { var img = new Image; 
						              img.onload = UpdatePreviewCanvas; 
						              img.src = event.target.result;  }
						    reader.readAsDataURL( file );
						}

						function UpdatePreviewCanvas()
						{
						    var img = this;
						    var canvas = document.getElementById( 'previewcanvas' );

						    if( typeof canvas === "undefined" 
						        || typeof canvas.getContext === "undefined" )
						        return;

						    var context = canvas.getContext( '2d' );

						    var world = new Object();
						    world.width = canvas.offsetWidth;
						    world.height = canvas.offsetHeight;

						    canvas.width = world.width;
						    canvas.height = world.height;

						    if( typeof img === "undefined" )
						        return;

						    var WidthDif = img.width - world.width;
						    var HeightDif = img.height - world.height;

						    var Scale = 0.0;
						    if( WidthDif > HeightDif )
						    {
						        Scale = world.width / img.width;
						    }
						    else
						    {
						        Scale = world.height / img.height;
						    }
						    if( Scale > 1 )
						        Scale = 1;

						    var UseWidth = Math.floor( img.width * Scale );
						    var UseHeight = Math.floor( img.height * Scale );

						    var x = Math.floor( ( world.width - UseWidth ) / 2 );
						    var y = Math.floor( ( world.height - UseHeight ) / 2 );

						    context.drawImage( img, x, y, UseWidth, UseHeight );  
						}
					</script>
				    <canvas id="previewcanvas">
				    </canvas>
				</div>

				<input type="file" name="illustration" onchange="return ShowImagePreview(this.files);" accept="image/jpeg" />
				<!-- Fin previsualisation -->

				<input type="file" name="cover" accept="image/jpeg" />

				<?php if (!empty($users['zip'])) : ?>
				<?php foreach ($users['zip'] as $key => $value) : ?>
				<input type="text" name="zip[<?php echo $key; ?>]" value="<?php htmlentities($value, ENT_QUOTES); ?>" placeholder="Code postal" />
				<?php endforeach; ?>
				<?php else : ?>
				<input type="text" name="zip[]" placeholder="Code postal" />
				<?php endif; ?>

				<?php if (!empty($users['city'])) : ?>
				<?php foreach ($users['city'] as $key => $value) : ?>
				<input type="text" name="city[<?php echo $key; ?>]" value="<?php htmlentities($value, ENT_QUOTES); ?>" placeholder="Ville" />
				<?php endforeach; ?>
				<?php else : ?>
				<input type="text" name="city[]" placeholder="ville" />
				<?php endif; ?>

				<?php if (!empty($users['address'])) : ?>
				<?php foreach ($users['address'] as $key => $value) : ?>
				<input type="text" name="address[<?php echo $key; ?>]" value="<?php htmlentities($value, ENT_QUOTES); ?>" placeholder="adresse" />
				<?php endforeach; ?>
				<?php else : ?>
				<input type="text" name="address[]" placeholder="adresse" />
				<?php endif; ?>

				<?php if (!empty($users['data-location'])) : ?>
				<?php foreach ($users['data-location'] as $key => $value) : ?>
				<input type="text" name="location[<?php echo $key; ?>]" value="<?php htmlentities($value, ENT_QUOTES); ?>" placeholder="location" />
				<?php endforeach; ?>
				<?php else : ?>
				<input type="text" name="location[]" placeholder="location" />
				<?php endif; ?>

				<?php if (!empty($users['date'])) : ?>
				<?php foreach ($users['date'] as $key => $value) : ?>
				<input type="text" name="date[<?php echo $key; ?>]" value="<?php htmlentities($value, ENT_QUOTES); ?>" placeholder="date" />
				<?php endforeach; ?>
				<?php else : ?>
				<input type="text" name="date[]" placeholder="date" />
				<?php endif; ?>

				<input type="submit" name="<?php echo generateToken($_SERVER['REQUEST_URI']); ?>" value="enregistrer" />
			</form>
			<form action="" enctype="multipart/form-data" method="post">
				<input type="submit" name="submit" value="supprimer" />
			</form>
		</section>
	</div>

<?php include_once "view/footer.php"; ?>
