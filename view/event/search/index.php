<!doctype html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>search</title>
	</head>
	<body>
		<section>
			<?php if (!empty($error)) : ?>
			<output for="tags" form="search" ><?php echo $error; ?></output>
			<?php endif; ?>
			<form action="" method="post" id="search" />
				<input type="text" name="tags" id="tags" placeholder="" />
				<input type="submit" name="research" id="research" value="rechercher" />
			</form>
		</section>
		<?php if (!empty($listEvent)) : ?>
		<section>
			<?php foreach ($listEvent as $id => $events) : ?>
			<article id="<?php echo $id; ?>">
				<header>
					<?php if (!empty($events['headline'])) : ?>
					<?php foreach ($events['headline'] as $index => $headline) : ?>
					<h2><?php echo $headline; ?></h2>
					<?php endforeach; ?>
					<?php endif; ?>
					<?php if (!empty($events['date'])) : ?>
					<?php foreach ($events['date'] as $index => $datetime) : ?>
					<time datetime="<?php echo $datetime; ?>" ><?php $date = DateTime::createFromFormat('Y-m-d', $datetime);
						echo $date->format('d-m-Y'); ?></time>
					<?php endforeach; ?>
					<?php endif; ?>
					<?php if (!empty($events['address'])) : ?>
					<?php foreach ($events['address'] as $index => $address) : ?>
					<h4><?php echo $address; ?></h4>
					<?php endforeach; ?>
					<?php endif; ?>
				</header>
				<aside>
					<figure>
						<?php if (!empty($events['illustration'])) : ?>
						<?php foreach ($events['illustration'] as $index => $illustration) : ?>
	  					<img src="<?php echo $illustration; ?>" alt="" />
	  					<?php endforeach; ?>
	  					<?php endif; ?>
	  					<?php if (!empty($events['hashtag'])) : ?>
						<?php foreach ($events['hashtag'] as $index => $hashtag) : ?>
	  					<figcaption>#<?php echo $hashtag; ?></figcaption>
	  					<?php endforeach; ?>
	  					<?php endif; ?>
					</figure>
				</aside>
				<footer>
					<?php if (!empty($events['tag'])) : ?>
					<?php foreach ($events['tag'] as $index => $tag) : ?>
					<mark id="<?php echo $index; ?>" ><?php echo $tag; ?></mark>
					<?php endforeach; ?>
					<?php endif; ?>
					<?php if (!empty($events['publish'])) : ?>
					<?php foreach ($events['publish'] as $index => $publish) : ?>
					<time datetime="<?php echo $publish; ?>" pubdate ><?php $date = DateTime::createFromFormat('Y-m-d', $publish);
						echo $date->format('d-m-Y'); ?></time>
					<?php endforeach; ?>
					<?php endif; ?>
				</footer>
			</article>
			<?php endforeach; ?>
		</section>
		<?php endif; ?>
	</body>
</html>