<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/Conf.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/entity/exhibit.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/dao/ExhibitDAO.class.php');

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/html5reset.css">
<link rel="stylesheet" type="text/css" href="css/detail.css">
<link rel="stylesheet" type="text/css" href="css/headericon.css">
<title>FREE VEGETABLES ONLINE SITE</title>
</head>

<body>
	<div id="wrapper">
		<header>
			<h1><img src="image/logo.png" alt="logo"></h1>
			<p>
		
			<form name="searchform" id="searchform" method="get" action="#">
				<input type="text" placeholder="キーワードから検索" name="keywords"
					id="keywords" value=""> <input type="image" src="image/btn4.gif"
					alt="検索" name="searchBtn" id="searchBtn" />
			</form>
			</p>
			<div id="my_page">
			<div id="icon">
				<p id="image_icon">
					<img src="image/icon_w.png" alt="アイコン">
				</p>
				<p class="icon_character">マイページ</p>
			</div>
			<div id="bell">
				<p id="image_bell">
					<img src="image/bell_w.png" alt="ベル">
				</p>
				<p class="icon_character">お知らせ</p>
			</div>
			<div id="check">
				<p id="image_check">
					<img src="image/check_w.png" alt="チェック">
				</p>
				<p class="icon_character">やることリスト</p>
			</div>
		</div>
		</header>
		
		<form action="confirmation.php" method="post">
		<?php foreach($exhibitList as $exhibit){

			if($int==1){
		?>
		<div id="breadcrumb">
			<p>TOP></p>
			<p>野菜</p>
		</div>
		<nav>
			<ul>
				<li>野菜</li>
				<li>果物</li>
				<li>お米</li>
			</ul>
		</nav>
		<div id="contents">
			<form action="settlement.php" method="post">
			<div id="contents_center">
				<p>支払方法</p>
				<p>クレジットカード</p>
				<p>コンビニ支払い</p>
			</div>
			</form>
		</div>
	</div>
	<footer>Copyright©FREE VEGETABLES ONLINE SITE , inc.AllRightsReserved.</footer>
</body>
</html>