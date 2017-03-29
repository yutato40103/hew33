<?php 
$Id = $_SESSION["id"];
$flg =0;

require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/Conf.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/entity/exhibit.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/dao/ExhibitDAO.class.php');
try{
	$db = new PDO(DB_DNS,DB_USERNAME,DB_PASSWORD);
	$ExhibitDAO = new ExhibitDAO($db);
	$ExhibitList = $ExhibitDAO->Exhibit_my(0,$Id);
	$Exhibits = $ExhibitDAO->Exhibit_my(1,$Id);
}
catch(PDOException $ex){
	print_r($ex);
	$_SESSION["errorMsg"] = "DB接続に失敗しました";
}
finally {
	$db = null;
}
$int=1;
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/html5reset.css">
<link rel="stylesheet" type="text/css" href="css/transaction.css">
<link rel="stylesheet" type="text/css" href="css/headericon.css">
<title>FREE VEGETABLES ONLINE SITE</title>
</head>

<script
	src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"
	type="text/javascript"></script>

<script type="text/javascript">
$(function() {
	$('.tab li:nth-child(1)').addClass('current');/*最初のliタグにcurrent追加*/
	$('.tab li').click(function() {
		var num = $(this).parent().children('li').index(this);/*.tabから見た子要素のli要素が何番目かを習得*/
		$(this).parent('.tab').each(function(){/*要素に対しての処理*/
			$('li',this).removeClass('current').eq(num).addClass('current');/*元にあったli要素からcurrenを取り出しnum番目にcurren追加*/
		});
		$(this).parent().next().children('.content').hide().eq(num).show();/*ulの次のcontentsの要素を全て非表示しnum番目を表示させる*/
	}).first().click();
});
</script>

</head>

<body>
	<div id="wrapper">
		<header>
			<h1><a href="home.php"><img src="image/logo.png" alt="logo"></a></h1>
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
					<a href="mypage.php"><img src="image/icon_w.png" alt="アイコン">
				</p>
				<p class="icon_character">マイページ</a></p>
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
				<div id="title">
					<p>出品した商品</p>
				</div>
				<div id="top_list">
					<div id="list">
						<ul class="tab">
							<li>出品</li>
							<li>取引中</li>
							<li>過去の取引</li>
						</ul>
						<div class="contents">
							<div class="content">
							<?php if($ExhibitList!=""){
								foreach ($ExhibitList as $Exhibit) { ?>
								<dl>
									<dt>
										<a href="category.php?id=<?= $Exhibit->getExhibit_id()?>"><img src="exhibit/<?= $Exhibit->getimage()?>">
										</a>
									</dt>
									<dd>
										<?= $Exhibit->getProduct_name()?>
									</dd>
								</dl>
								<?php } 
								}?>
							</div>
							<div class="content">
							<?php if($ExhibitList!=""){
								foreach ($Exhibits as $Exhibit) { ?>
								<dl>
									<dt>
										<a href="category.php?id=<?= $Exhibit->getExhibit_id()?>"><img src="exhibit/<?= $Exhibit->getimage()?>">
										</a>
									</dt>
									<dd>
										<?= $Exhibit->getProduct_name()?>
									</dd>
								</dl>
								<?php } 
								}?>
							</div>
							<div class="content">
							<?php if($ExhibitList!=""){
								foreach ($Exhibits as $Exhibit) { ?>
								<dl>
									<dt>
										<a href="category.php?id=<?= $Exhibit->getExhibit_id()?>"><img src="exhibit/<?= $Exhibit->getimage()?>">
										</a>
									</dt>
									<dd>
										<?= $Exhibit->getProduct_name()?>
									</dd>
								</dl>
								<?php } 
								}?>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
	<div id="top"><a href="exhibit_start.php"><p>商品の<br />出品は<br />こちら</p></a></div>
	</div>
	<footer>Copyright©FREE VEGETABLES ONLINE SITE , inc.AllRightsReserved.</footer>
</body>
</html>
