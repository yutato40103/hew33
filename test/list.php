<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/Conf.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/entity/small.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/dao/smallDAO.class.php');

	if(isset($_SESSION["loginFlg"]))
	{
		$flg=1;
	}
	else 
	{
		$flg=0;
	}
if(isset($_GET["id"]) ){
	$id=$_GET["id"];
}
if($id==1){
	$list_name="野菜";
}
else if($id==2){
	$list_name="果物";
}
else if($id==3){
	$list_name="お米";
}

$linesPerPage = 8;//20桁までにする

$pageNo = 1;
if(isset($_GET["page"]) && is_numeric($_GET["page"])){
	$pageNo = $_GET["page"];
}

$offset = $linesPerPage *($pageNo - 1);

/*$totalPage = ceil($count[1]->getCount() / $linesPerPage);//少数点切り上げ*/
try{
	$db = new PDO(DB_DNS,DB_USERNAME,DB_PASSWORD);
	$SmallDAO = new SmallDAO($db);
	$SmallList = $SmallDAO->findlist($id);
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
<link rel="stylesheet" type="text/css" href="css/category.css">
<link rel="stylesheet" type="text/css" href="css/headericon.css">
<title>FREE VEGETABLES ONLINE SITE</title>
</head>

<body>
	<div id="wrapper">
		<header>
			<h1><a href="home.php"><img src="image/logo.png" alt="logo"></a></h1>
			
			<form action="category.php" name="searchform" id="searchform" method="get">
				<p><input type="text" placeholder="キーワードから検索" name="keywords" id="keywords" value=""></p>
					<input name="pageflg" type="hidden" value="2">
                <p><input type="image" src="image/btn4.gif" alt="検索" name="searchBtn" id="searchBtn" /></p>
			</form>
			
			<?php if($flg==1){?>
		<div id="my_page">
			<div id="icon">
				<p id="image_icon">
					<a href="mypage.php"><img src="image/icon_w.png" alt="アイコン">
				</p>
				<p class="icon_character">マイページ</a></p>
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
	<?php }
	else{
	?>
		<div id="guest">
			<div id="login_id">
				<a href="login.php"><p>ログイン</p></a>
			</div>
			<div id="new_member">
				<a href="registration.php"><p>新規会員登録</p></a>
			</div>
		</div>
	<?php }
		?>
		</header>
		
		<div id="breadcrumb">
					<p>TOP></p>
					<p><?=$list_name?></p>
		</div>
		<nav id="nav4">
			<ul>
				<li><a href="list.php?id=1" class="tate">野菜</a></li>
				<li><a href="list.php?id=2" class="tate">果物</a></li>
				<li><a href="list.php?id=3" class="tate">お米</a></li>
			</ul>
		</nav>
		<div id="contents">
				<h2><?=$list_name?></h2>
				<!-- <div id="searchfcategory">
					<p><a href="category.php">人参</a></p>
					<p><a href="category.php">キャベツ</a></p>
					<p><a href="category.php">なすび</a></p>
					<p><a href="category.php">レタス</a></p>
					<p><a href="category.php">大根</a></p>
				</div> -->
					<div id="list">
					
						<div id="all_list">
							<?php foreach($SmallList as $small){?>
								<div class="list_product">
									<p class="photo">
										<a href="category.php?id=<?=$small->getSmallId()?>">
										<img src="image/<?= $small->getSmallimage()?>" alt="トマト">
									</p>
									<div class="name">
										<p><?= $small->getSmallname()?></p>
										</a>
									</div>
								</div>
							<?php } ?>
					</div>
			<div id="top"><a href="exhibit_start.php"><p>商品の<br />出品は<br />こちら</p></a></div>
	</div>
	<footer>Copyright©FREE VEGETABLES ONLINE SITE , inc. AllRightsReserved.</footer>
</body>
</html>
