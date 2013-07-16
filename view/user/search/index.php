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
				<input type="text" name="word" id="word" placeholder="" />
				<input type="submit" name="research" id="research" value="rechercher" />
			</form>
		</section>
		<?php if (!empty($listUser)) : ?>
		<section>
			<?php foreach ($listUser as $id => $users) : ?>
			<article id="<?php echo $id; ?>">
				<header>
					<?php if (!empty($users['name'])) : ?>
					<?php foreach ($users['name'] as $index => $name) : ?>
					<?php foreach ($users['firstname'] as $index => $firstname) : ?>
					<h2><?php echo $firstname; ?> <?php echo $name; ?></h2>
					<?php endforeach; ?>
					<?php endforeach; ?>
					<?php endif; ?>
					<?php if (!empty($users['date'])) : ?>
					<?php foreach ($users['date'] as $index => $datetime) : ?>
					<time datetime="<?php echo $datetime; ?>" ><?php $date = DateTime::createFromFormat('Y-m-d', $datetime);
						echo $date->format('d-m-Y'); ?></time>
					<?php endforeach; ?>
					<?php endif; ?>
					<?php if (!empty($users['address'])) : ?>
					<?php foreach ($users['address'] as $index => $address) : ?>
					<h4><?php echo $address; ?></h4>
					<?php endforeach; ?>
					<?php endif; ?>
				</header>
				<aside>
					<figure>
						<?php if (!empty($users['illustration'])) : ?>
						<?php foreach ($users['illustration'] as $index => $illustration) : ?>
	  					<img src="<?php echo $illustration; ?>" alt="" />
	  					<?php endforeach; ?>
	  					<?php endif; ?>
	  					<?php if (!empty($users['hashtag'])) : ?>
						<?php foreach ($users['hashtag'] as $index => $hashtag) : ?>
	  					<figcaption>#<?php echo $hashtag; ?></figcaption>
	  					<?php endforeach; ?>
	  					<?php endif; ?>
					</figure>
				</aside>
				<footer>
					<?php if (!empty($users['tag'])) : ?>
					<?php foreach ($users['tag'] as $index => $tag) : ?>
					<mark id="<?php echo $index; ?>" ><?php echo $tag; ?></mark>
					<?php endforeach; ?>
					<?php endif; ?>
					<?php if (!empty($users['publish'])) : ?>
					<?php foreach ($users['publish'] as $index => $publish) : ?>
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