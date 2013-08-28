<?php include_once "view/header.php"; ?>

		<script type="text/javascript">
			function addLoadEvent(func) {
			  var oldonload = window.onload;
			  if (typeof window.onload != 'function') {
			    window.onload = func;
			  } else {
			    window.onload = function() {
			      if (oldonload) {
			        oldonload();
			      }
			      func();
			    }
			  }
			}
		</script>

		<!-- Debut page evenement -->
		<div class="content event group">
			<section class="description group">
				<div class="map">	
					<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCSGWvl82q9C_nnbjfprJOL6jXdr_xPMHo&sensor=true"></script>
					<script type="text/javascript">
						var address = "efficom rue camille peltant montrouge, france";
						var geocoder;
						var map;
						var panorama;
						var lieu;

						function initialize() {
							geocoder = new google.maps.Geocoder();

							var latlng = new google.maps.LatLng(<?php
								if (!empty($events['data-location'])) : 
									foreach ($events['data-location'] as $key => $value) : 
										echo $value;
									endforeach;
									else:
										echo "48.816363, 2.3173839999999473";
								endif;
							?>);
							var mapOptions = {
								zoom: 14,
								center: latlng,
								scrollwheel: false,
								navigationControl: false,
								mapTypeControl: false,
								scaleControl: false,
								draggable: true,
								disableDefaultUI: true,
								mapTypeId: google.maps.MapTypeId.ROADMAP
							}
							map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
							codeAddress();

							panorama = map.getStreetView();
							panorama.setPov(/** @type {google.maps.StreetViewPov} */({
								heading: 265,
								pitch: 0
							}));
						}

						function toggleStreetView() {
							var toggle = panorama.getVisible();
							if (toggle == false) {
								panorama.setVisible(true);
							} else {
								panorama.setVisible(false);
							}
						}

						function codeAddress() {
							var resultat;
							geocoder.geocode( { 'address': address}, function(results, status) {
								if (status == google.maps.GeocoderStatus.OK) {
									map.setCenter(results[0].geometry.location);
									var marker = new google.maps.Marker({
										map: map,
										position: results[0].geometry.location
									});
									panorama.setPosition(results[0].geometry.location);
									lieu = results[0].geometry.location;
								} else {
									alert("Geocode was not successful for the following reason: " + status);
								}
							});
						}

						addLoadEvent(initialize);
					</script>
					<div id="map-canvas" class="google"></div>
					<div class="streetview">
						<div class="center">
							<button onclick="toggleStreetView()" class="btn">Dans la rue ?</button>
						</div>
					</div>
				</div>
				<article class="center">
					<figure><img src="images/barbecue-eleves-montrouge.jpg" alt="Image des anciens élèves de montrouge au rassemblement de 2011 en train de griller des mergezes" /></figure>
					<?php if (!empty($events['headline'])) : ?>
					<?php foreach ($events['headline'] as $key => $value) : ?>
						<h1><?php echo htmlentities($value, ENT_QUOTES); ?></h1>
					<?php endforeach; ?>
					<?php endif; ?>
					<div class="registering">
						<div class="registered">61 inscrits</div>
						<a href="#register" class="btn register">J'y vais </a>
					</div>
					<?php if (!empty($events['description'])) : ?>
						<?php foreach ($events['description'] as $key => $value) : ?>

						<?php $paragraph = mb_split('\r\n', $value);

								foreach ($paragraph as $p) :
								if (!empty($p)) : ?>
					<p><?php echo htmlentities($p, ENT_QUOTES); ?></p>
								<?php endif;
								endforeach;
						  	endforeach;
						endif; ?>
				 <?php if (!empty($events['tag'])) : ?><div class="category">Catégories : <?php foreach ($events['tag'] as $key => $value) : ?><a href="evenements.php?q=<?php echo $value; ?>"><?php echo htmlentities($value, ENT_QUOTES); ?></a><?php endforeach; ?></div><?php endif; ?>
				</article>
			</section>

			<section class="center comments group">
				<h1 class="banner">Commentaires</h1> 
			    <div id="disqus_thread"></div>
			</section>
		    <script type="text/javascript">
		        /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
		        var disqus_shortname = 'etmoi'; // required: replace example with your forum shortname

		        /* * * DON'T EDIT BELOW THIS LINE * * */
		        (function() {
		            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
		            dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
		            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
		        })();
		    </script>
		    <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
		    <a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
		    <script>
		    	var cssLink = document.createElement("link") 
				cssLink.href = "style/disqus.css"; 
				cssLink .rel = "stylesheet"; 
				cssLink .type = "text/css"; 
				frames['dsq1'].document.body.appendChild(cssLink);
		    </script>
    

			<?php if (!empty($events['hashtag'])) : ?>
			<section class="share center">
				<?php 
					foreach ($events['hashtag'] as $key => $value) : 
				 		$hashtag = $value;
					endforeach;

					$popular = $instagram->getTagMedia($hashtag);
				?>
				<h1 class="banner">Partageons avec #<?php echo $hashtag; ?></h1>
				<article class="group">
					<div class="col-3-2">
						<div class="image">
							<figure class="instagram big"><img src="<?php echo $popular->data[0]->images->low_resolution->url ?>" alt="" /></figure>
							<figure class="instagram small"><img src="<?php echo $popular->data[1]->images->thumbnail->url ?>" alt="" /></figure>
							<figure class="instagram small"><img src="<?php echo $popular->data[2]->images->thumbnail->url ?>" alt="" /></figure>
						</div>
						<div class="image">
							<figure class="instagram small"><img src="<?php echo $popular->data[3]->images->thumbnail->url ?>" alt="" /></figure>
							<figure class="instagram small"><img src="<?php echo $popular->data[4]->images->thumbnail->url ?>" alt="" /></figure>
							<figure class="instagram big"><img src="<?php echo $popular->data[5]->images->low_resolution->url ?>" alt="" /></figure>
						</div>
					</div>
					<script type="text/javascript" src="js/twitter.js"></script>
					<div class="col-3" id="twitter" data-tag="<?php echo $hashtag; ?>"></div>
				</article>
			</section>
			<?php endif; ?>

			<section class="participants center">
				<h1 class="banner">Qui participe ?</h1>
				<article class="group">
					<div class="participant float-6">
						<figure><img src="images/avatar.png" alt="Bernard Martin" /></figure>
						<h3><a href="#">Giselle Michou</a></h3>
					</div>
					<div class="participant float-6">
						<figure><img src="images/avatar.png" alt="Bernard Martin" /></figure>
						<h3><a href="#">Giselle Michou</a></h3>
					</div>
					<div class="participant float-6">
						<figure><img src="images/avatar.png" alt="Bernard Martin" /></figure>
						<h3><a href="#">Bernard Martin</a></h3>
					</div>
					<div class="participant float-6">
						<figure><img src="images/avatar.png" alt="Bernard Martin" /></figure>
						<h3><a href="#">Giselle Michou</a></h3>
					</div>
					<div class="participant float-6">
						<figure><img src="images/avatar.png" alt="Bernard Martin" /></figure>
						<h3><a href="#">Steven Triangle</a></h3>
					</div>
					<div class="participant float-6">
						<figure><img src="images/avatar.png" alt="Bernard Martin" /></figure>
						<h3><a href="#">Giselle Michou</a></h3>
					</div>
					<div class="participant float-6">
						<figure><img src="images/avatar.png" alt="Bernard Martin" /></figure>
						<h3><a href="#">Bernard Martin</a></h3>
					</div>
					<div class="participant float-6">
						<figure><img src="images/avatar.png" alt="Bernard Martin" /></figure>
						<h3><a href="#">Giselle Michou</a></h3>
					</div>
					<div class="participant float-6">
						<figure><img src="images/avatar.png" alt="Bernard Martin" /></figure>
						<h3><a href="#">Michel</a></h3>
					</div>
					<div class="participant float-6">
						<figure><img src="images/avatar.png" alt="Bernard Martin" /></figure>
						<h3><a href="#">Giselle Michou</a></h3>
					</div>
					<div class="participant float-6">
						<figure><img src="images/avatar.png" alt="Bernard Martin" /></figure>
						<h3><a href="#">Bernard Martin</a></h3>
					</div>
					<div class="participant float-6">
						<figure><img src="images/avatar.png" alt="Bernard Martin" /></figure>
						<h3><a href="#">Giselle Michou</a></h3>
					</div>
					<div class="participant float-6">
						<figure><img src="images/avatar.png" alt="Bernard Martin" /></figure>
						<h3><a href="#">Bernard Martin</a></h3>
					</div>
					<div class="participant float-6">
						<figure><img src="images/avatar.png" alt="Bernard Martin" /></figure>
						<h3><a href="#">Giselle Michou</a></h3>
					</div>
					<div class="participant float-6">
						<figure><img src="images/avatar.png" alt="Bernard Martin" /></figure>
						<h3><a href="#">Steven Triangle</a></h3>
					</div>
					<div class="participant float-6">
						<figure><img src="images/avatar.png" alt="Bernard Martin" /></figure>
						<h3><a href="#">Michel</a></h3>
					</div>
					<div class="participant float-6">
						<figure><img src="images/avatar.png" alt="Bernard Martin" /></figure>
						<h3><a href="#">Giselle Michou</a></h3>
					</div>
					<div class="participant float-6">
						<figure><img src="images/avatar.png" alt="Bernard Martin" /></figure>
						<h3><a href="#">Giselle Michou</a></h3>
					</div>
					<div class="participant float-6">
						<figure><img src="images/avatar.png" alt="Bernard Martin" /></figure>
						<h3><a href="#">Steven Triangle</a></h3>
					</div>
					<div class="participant float-6">
						<figure><img src="images/avatar.png" alt="Bernard Martin" /></figure>
						<h3><a href="#">Steven Triangle</a></h3>
					</div>
					<div class="participant float-6">
						<figure><img src="images/avatar.png" alt="Bernard Martin" /></figure>
						<h3><a href="#">Michel</a></h3>
					</div>
					<div class="participant float-6">
						<figure><img src="images/avatar.png" alt="Bernard Martin" /></figure>
						<h3><a href="#">Giselle Michou</a></h3>
					</div>
				</article>
			</section>

			<div class="center">
				<section class="promoters col-3-2">
					<h1 class="banner">Qui organise ?</h1>
					<article class="group">
						<div class="association group">
							<figure><img src="images/commerces.jpg" alt="Logo du club du parc" /></figure>
							<article>
								<a class="more" href="#"><span class="plus ir">Plus</span> de détails</a>
								<h2>Le Club du parc</h2>
								<div class="text">
									Lorem ipsum dolor sit amet consectetuer adipiscing elit, sed diam nonummy nibh euismod Lorem ipsum dolor sit amet consectetuer adipiscing elit, sed diam nonummy nibh euismod
								</div>
								<div class="registering group">
									<div class="registered">61 membres</div>
									<a href="#register" class="btn register">J'adhère </a>
								</div>
							</article>
						</div>
						<div class="association group">
							<figure><img src="images/commerces.jpg" alt="Logo du club du parc" /></figure>
							<article>
								<a class="more" href="#"><span class="plus ir">Plus</span> de détails</a>
								<h2>Le Club du parc</h2>
								<div class="text">
									Lorem ipsum dolor sit amet consectetuer adipiscing elit, sed diam nonummy nibh euismod Lorem ipsum dolor sit amet consectetuer adipiscing elit, sed diam nonummy nibh euismod
								</div>
								<div class="registering group">
									<div class="registered">61 membres</div>
									<a href="#register" class="btn register">J'adhère </a>
								</div>
							</article>
						</div>
						<div class="association group">
							<figure><img src="images/commerces.jpg" alt="Logo du club du parc" /></figure>
							<article>
								<a class="more" href="#"><span class="plus ir">Plus</span> de détails</a>
								<h2>Le Club du parc</h2>
								<div class="text">
									Lorem ipsum dolor sit amet consectetuer adipiscing elit, sed diam nonummy nibh euismod Lorem ipsum dolor sit amet consectetuer adipiscing elit, sed diam nonummy nibh euismod
								</div>
								<div class="registering group">
									<div class="registered">61 membres</div>
									<a href="#register" class="btn register">J'adhère </a>
								</div>
							</article>
						</div>
						<div class="association group">
							<figure><img src="images/commerces.jpg" alt="Logo du club du parc" /></figure>
							<article>
								<a class="more" href="#"><span class="plus ir">Plus</span> de détails</a>
								<h2>Le Club du parc</h2>
								<div class="text">
									Lorem ipsum dolor sit amet consectetuer adipiscing elit, sed diam nonummy nibh euismod Lorem ipsum dolor sit amet consectetuer adipiscing elit, sed diam nonummy nibh euismod
								</div>
								<div class="registering group">
									<div class="registered">61 membres</div>
									<a href="#register" class="btn register">J'adhère </a>
								</div>
							</article>
						</div>
					</article>
				</section>

				<section class="badges col-3">
					<h1 class="banner">Les badges ?</h1>
					<article class="group">
						<div class="badge group">
							<figure><img src="images/badge.png" alt="Bernard Martin" /></figure>
							<article>
								<h2><a href="#">Steven Triangle</a></h2>
								<div class="text">Lorem ipsum dolor sit amet consectetuer adipiscing elit, sed diam nonummy nibh euismod</div>
							</article>
						</div>
						<div class="badge group">
							<figure><img src="images/badge.png" alt="Bernard Martin" /></figure>
							<article>
								<h2><a href="#">Steven Triangle</a></h2>
								<div class="text">Lorem ipsum dolor sit amet consectetuer adipiscing elit, sed diam nonummy nibh euismod</div>
							</article>
						</div>
						<div class="badge group">
							<figure><img src="images/badge.png" alt="Bernard Martin" /></figure>
							<article>
								<h2><a href="#">Steven Triangle</a></h2>
								<div class="text">Lorem ipsum dolor sit amet consectetuer adipiscing elit, sed diam nonummy nibh euismod</div>
							</article>
						</div>
					</article>
				</section>
			</div>
		</div>
		<!-- Fin page evenement -->
<?php include_once "view/footer.php"; ?>