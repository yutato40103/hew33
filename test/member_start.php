<?php 
$name = $_SESSION["name"];
$Id = $_SESSION["id"];
require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/Conf.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/entity/exhibit.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/dao/ExhibitDAO.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/dao/MemberDAO.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/entity/member.class.php');

try{
	$db = new PDO(DB_DNS,DB_USERNAME,DB_PASSWORD);
	$ExhibitDAO = new ExhibitDAO($db);
	$MemberDAO = new MemberDAO($db);
	$count = $ExhibitDAO->Id_count($Id);
	$member=$MemberDAO->findLogin($Id);
}
catch(PDOException $ex){
	print_r($ex);
	$_SESSION["errorMsg"] = "DB接続に失敗しました";
}
finally {
	$db = null;
}

?> 
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/html5reset.css">
<link rel="stylesheet" type="text/css" href="css/mypage.css">
<link rel="stylesheet" type="text/css" href="css/headericon.css">
<link rel="stylesheet" type="text/css" href="css/dropify.css">
<title>FREE VEGETABLES ONLINE SITE</title>

<script src="js/jquery-2.1.4.min.js"></script>
<script src="js/dropify.js"></script>
<script type="text/javascript">
$(function() {
	$('.dropify').dropify();
});
</script>

</head>

<body>
	<div id="wrapper">
		<header>

			<h1><a href="home.php"><img src="image/logo.png" alt="logo"></h1>
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
					<a href="mypage.php"><img src="image/icon_w.png" alt="アイコン"></a>
				</p>
				<p class="icon_character"><a href="mypage.php">マイページ</a></p>
			</div>
			<div id="bell">
				<p id="image_bell">
					<a href="#"><img src="image/bell_w.png" alt="ベル"></a>
				</p>
				<p class="icon_character">お知らせ</p>
			</div>
			<div id="check">
				<p id="image_check">
					<a href="#"><img src="image/check_w.png" alt="チェック"></a>
				</p>
				<p class="icon_character">やることリスト</p>
			</div>
		</div>
		</header>
		<form action="member_finish.php" method="post" enctype="multipart/form-data">
		<div id="breadcrumb">
			<p>TOP></p>
			<p>マイページ</p>
		</div>
		<div id="contents">
		  <nav>
				<ul>
					<li><a href="mypage.php">マイページ</a></li>
					<li><a href="#">お知らせ</a></li>
					<li><a href="#">いいね！一覧</a></li>
					<li><a href="#">出品する</a></li>
					<li><a href="exhibit.php">出品した商品</a></li>
					<li><a href="purchase.php">購入した商品</a></li>
					<li><a href="#">評価一覧</a></li>
				</ul>
				<ul>
					<li><a href="#">売上.振込申請</a></li>
					<li><a href="#">ポイント</a></li>
				</ul>
				<ul>
					<li><a href="member_start.php">プロフィール変更</a></li>
					<li><a href="#">住所変更</a></li>
					<li><a href="#">支払い方法</a></li>
					<li><a href="#">メール/パスワード</a></li>
					<li><a href="#">電話確認の確認</a></li>
					<li><a href="logout.php">ログアウト</a></li>
				</ul>
			</nav>
            <div id="right_content">
			<div class="photo_contents">
				<div class="box">
					<div class="name">現在の画像アイコン</div>

					<?php 
					if(!empty($member->getImage())){?>
					<div class="photo"><img src="member/<?=$member->getImage()?>"alt=""></div>
					<?php }
					else {?>
					<div class="photo"><img src="member/icon.jpg?>"alt=""></div>
					<?php }?>
				</div>
				<div class="box">
					<div class="name">変更したい画像のアイコン</div>
					<div class="photo"><input type="file" name="exbit1" size="30" class="dropify"/></div>
				</div>
			</div>

			<div id="d_bottom">
				<p><b><input type="submit" value="登録" id="bottom"></b></p>
			</div>
		</div>
		</div>

		<div id="top"><a href="exhibit_start.php"><p>商品の<br />出品は<br />こちら</p></a></div>
	</div>
	</form>
	<footer>Copyright©FREE VEGETABLES ONLINE SITE , inc.AllRightsReserved.</footer>
</body>
</html>

