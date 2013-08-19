<?php
ini_set('include_path', ini_get('include_path').';./model/;./view/;./controller/');

if(!empty($_GET['instagram'])){
	require_once 'classes/instagram.class.php';
	$tag = $_GET['instagram'];

	$instagram = new Instagram('44a354e34a344471aed0e4df151513b4');
	$query = $instagram->getTagMedia($tag);

	echo json_encode($query->data);
}


if(!empty($_GET['twitter'])){
	require_once 'classes/twitteroauth.php';
	$tag = $_GET['twitter'];

	$twitter = new TwitterOAuth('utXk1ldX0xyOejBhRZAg', 'Ht2HwfQYaoWtUHU45CbFeTSkYUTEY1HWpzezvX5II', '1662502975-HX16mxnB8Hk9lXGC2uOIqni3QMa23gKtC53cAtf', '1jFgAlEgCRv9CtLbqMVzGLwf6VM7AyyvnrC8nrNE');
	$tweets = $twitter->get('search/tweets', array('q'=>"#".$tag, 'count'=>3));

	echo json_encode($tweets);
}
?>