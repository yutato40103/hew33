<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/Conf.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/entity/small.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/dao/smallDAO.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/entity/exhibit.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/dao/ExhibitDAO.class.php');
	if(isset($_SESSION["loginFlg"]))
	{
		$flg=1;
	}
	else 
	{
		$flg=0;
	}
$pageflg=0;
if(isset($_GET["pageflg"])){
	$pageflg=$_GET["pageflg"];
}

if($pageflg == 1 || $pageflg == 2){
	unset($_SESSION["e_id"]);
}

if($pageflg == 3 || $pageflg == 4){
	unset($_SESSION["keywords"]);
}

if(isset($_SESSION["e_id"])){
	$id=$_SESSION["e_id"];
	unset($_SESSION["e_id"]);
}

if(isset($_GET["id"]) && $_GET["id"]!=""){
	$id=$_GET["id"];
	$_SESSION["e_id"]=$id;
	/*unset($_SESSION["keywords"]);*/
}
else if(isset($_SESSION["keywords"])){
	$keywords=$_SESSION["keywords"];
	/*unset($_SESSION["keywords"]);*/
}

if(isset($_GET["key"])){
	unset($_SESSION["key"]);
	$key=$_GET["key"];
	$_SESSION["key"] =$key;
}
else if(isset($_SESSION["key"])){
	$key = $_SESSION["key"];
}
if(isset($_GET["order"])){
	unset($_SESSION["order"]);
	$order=$_GET["order"];
	$_SESSION["order"]=$order;
}
else if(isset($_SESSION["order"])){
	$order = $_SESSION["order"];
}

if(isset($_GET["keywords"])){
	$keywords=$_GET["keywords"];
	$_SESSION["keywords"] = $keywords;
}

$linesPerPage = 8;//20桁までにする

$pageNo = 1;
if(isset($_GET["page"]) && is_numeric($_GET["page"])){
	$pageNo = $_GET["page"];
}

$offset = $linesPerPage *($pageNo - 1);

try{
	$db = new PDO(DB_DNS,DB_USERNAME,DB_PASSWORD);
	$SmallDAO = new SmallDAO($db);
	$ExhibitDAO = new ExhibitDAO($db);
	if($pageflg==0){
		if(isset($keywords) && isset($key) && isset($order)){/*検索ワードでオーダーバイ*/
			$exhibitList = $ExhibitDAO->exhibitId_keyword($keywords,$key,$order,$offset,$linesPerPage);
			$count = $ExhibitDAO->exhibitId_keywordcount($keywords,$key,$order);
			$pageflg = 1;
		}
		else if(isset($keywords)){/*検索ワード*/
			$exhibitList = $ExhibitDAO->exhibit_keyword($keywords,$offset,$linesPerPage);
			$count = $ExhibitDAO->exhibit_keywordcount($keywords);
			$pageflg = 2;
		}
		else if(isset($key) && isset($order) && isset($id)){/*商品選択でオーダーバイ*/
			$exhibitList = $ExhibitDAO->exhibitId_key($key,$order,$id,$offset,$linesPerPage);
			$count = $ExhibitDAO->exhibitId_keycount($key,$order,$id);
			$pageflg = 3;
		}
		else if(isset($key) && isset($order)){/*オーダーバイ*/
			$exhibitList = $ExhibitDAO->exhibit_key($key,$order,$offset,$linesPerPage);
			$count = $ExhibitDAO->exhibitcount();
			$pageflg = 4;
		}
		else if(isset($id)){/*商品選択*/
			$exhibitList = $ExhibitDAO->exhibitId($id,$offset,$linesPerPage);
			$count = $ExhibitDAO->exhibitIdcount($id);
			$pageflg = 5;
		}
		else{
			$exhibitList = $ExhibitDAO->exhibit_limit($offset,$linesPerPage);
			$count = $ExhibitDAO->exhibitcount();
			$pageflg = 6;
		}
	}

	else{
		if(isset($keywords) && isset($key) && isset($order) ||$pageflg == "1"){/*検索ワードでオーダーバイ*/
			$exhibitList = $ExhibitDAO->exhibitId_keyword($keywords,$key,$order,$offset,$linesPerPage);
			$count = $ExhibitDAO->exhibitId_keywordcount($keywords,$key,$order);
			$pageflg = 1;
		}
		else if(isset($keywords) && $pageflg=="2"){/*検索ワード*/
			$exhibitList = $ExhibitDAO->exhibit_keyword($keywords,$offset,$linesPerPage);
			$count = $ExhibitDAO->exhibit_keywordcount($keywords);
			$pageflg = 2;
		}
		else if(isset($key) && isset($order) && isset($id) || $pageflg=="3"){/*商品選択でオーダーバイ*/
			$exhibitList = $ExhibitDAO->exhibitId_key($key,$order,$id,$offset,$linesPerPage);
			$count = $ExhibitDAO->exhibitId_keycount($key,$order,$id);
			$pageflg = 3;
		}
		else if(isset($key) && isset($order) || $pageflg=="4"){/*オーダーバイ*/
			$exhibitList = $ExhibitDAO->exhibit_key($key,$order,$offset,$linesPerPage);
			$count = $ExhibitDAO->exhibitcount();
			$pageflg = 4;
		}
		else if(isset($id)&& $pageflg=="5"){/*商品選択*/
			$exhibitList = $ExhibitDAO->exhibitId($id,$offset,$linesPerPage);
			$count = $ExhibitDAO->exhibitIdcount($id);
			$pageflg = 5;
		}
		else if($pageflg=="6"){
			$exhibitList = $ExhibitDAO->exhibit_limit($offset,$linesPerPage);
			$count = $ExhibitDAO->exhibitcount();
			$pageflg = 6;
		}
	}
	$smallJoinList = $SmallDAO->small_rankings("野菜");
}
catch(PDOException $ex){
	print_r($ex);
	$_SESSION["errorMsg"] = "DB接続に失敗しました";
}
finally {
	$db = null;
}

$totalPage = ceil($count[1]->getCount() / $linesPerPage);//少数点切り上げ


if(isset($keywords)){
	$title = $keywords;
}
else{
	 $small = $SmallDAO->findByPK($id);
	 $title = $small->getSmallname();
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
					<p>野菜</p>
					<div id="search">
						<p>検索結果<?= $count[1]->getCount()?>件</p>
					</div>
		</div>
		<nav id="nav4">
			<ul>
				<li><a href="list.php?id=1" class="tate">野菜</a></li>
				<li><a href="list.php?id=2" class="tate">果物</a></li>
				<li><a href="list.php?id=3" class="tate">お米</a></li>
			</ul>
		</nav>
		<div id="contents">
				<h2>野菜</h2>
			<!-- 	<div id="searchfcategory">
					<p><a href="category.php">人参</a></p>
					<p><a href="category.php">キャベツ</a></p>
					<p><a href="category.php">なすび</a></p>
					<p><a href="category.php">レタス</a></p>
					<p><a href="category.php">大根</a></p>
				</div> -->
					<!-- <h3>野菜人気ランキング</h3> -->
					<h3>人気ランキング</h3>
					<div class="food_contents">
						<?php foreach($smallJoinList as $small){?>
										<div class="food">
											<div class="food_image">
												<p>
													<a href="category.php?id=<?=$small->getSmallId()?>"><img src="image/<?= $small->getSmallimage()?>" alt="<?= $small->getSmallname()?>"></a>
												</p>
											</div>
											<p><?= $small->getSmallname()?></p>
										</div>
						<?php } ?>
					</div>
					<div id="list">
						<div id=product_id>
							<h3><?=$title?>の商品一覧</h3>
							<!-- <p></*?=$count[1]->getCount() */?>件中 1 - 件</p> -->
						</div>
						<div id="sort">
							<p><a href=category.php?<?php if(isset($id)){?>id=<?=$id?>&<?php }?>key=day&order=DESC&pageflg=<?=$pageflg ?>>新しい順</a></p>
							<p><a href=category.php?<?php if(isset($id)){?>id=<?=$id?>&<?php }?>key=day&order=ASC&pageflg=<?=$pageflg ?>>古い順</a></p>
							<p><a href=category.php?<?php if(isset($id)){?>id=<?=$id?>&<?php }?>key=price&order=DESC&pageflg=<?=$pageflg ?>>価格が高い順</a></p>
							<p><a href=category.php?<?php if(isset($id)){?>id=<?=$id?>&<?php }?>key=price&order=ASC&pageflg=<?=$pageflg ?>>価格が低い順</a></p>
						</div>
						<div id="all_list">
							<?php foreach($exhibitList as $exhibit){?>
								<div class="list_product">
									<p class="photo">
										<a href=detail.php?id=<?=$exhibit->getExhibit_id()?>>
										<img src="exhibit/<?= $exhibit->getImage()?>" alt="トマト">
										
									</p>
									<div class="name">
										<p><?= $exhibit->getProduct_name()?></p>
										<p><?= $exhibit->getPrice()?>円</p>
										</a>
									</div>
								</div>
							<?php } ?>
					</div>
		<!-- 			<div id="num">
						<ul>
							<li>1</li>
							<li>2</li>
							<li>3</li>
							<li>4</li>
							<li>＞</li>
							<li>＞＞</li>
						</ul>
					</div> -->
		<div class="pager">
		<?php
		if($pageNo == 1){
		?>
		<p class="arrow">&lt;&lt;First</p><p class="arrow">&lt;Prev</p>
		<?php
		}
		else{
			$prevPageNo = $pageNo -1;
			?>
		<p class="arrow">
			<a href="/iw31/test/category.php?page=1&pageflg=<?=$pageflg ?>&id=<?=$id?>">&lt;&lt;First</a>
		</p>
		<p class="arrow">
		<a
			href="/iw31/test/category.php?page=<?= $prevPageNo ?>&pageflg=<?=$pageflg ?><?php if(isset($id)){?>
			&id=<?=$id?><?php }
			?>">&lt;Prev</a>
		</p>
		<?php
				}
		?><div id="pagewidth">
		<?php
				for($pages = 1; $pages <= $totalPage; $pages++){
				if($pages == $pageNo){
			?>

		<p class="page_color"><?= $pages ?></p>
		<?php 
				}
				else {
			?>
		<p class="page">
		<a href="/iw31/test/category.php?page=<?= $pages ?>&pageflg=<?=$pageflg ?><?php if(isset($id)){?>
			&id=<?=$id?><?php }
			?>"><?= $pages ?>
		</a>
		</p>
		<?php
			}
		
			if($pages != $totalPage){
		?> <?php
			}
		}
		?></div><?php 
		if($pageNo == $totalPage){
		?><p class="arrow">Next&gt;</p><p class="arrow">Last&gt;&gt;</p> <?php
		}
		else{
			$nextPageNo = $pageNo +1;
			?>
			<p class="arrow">
			<a href="/iw31/test/category.php?page=<?= $nextPageNo ?>&pageflg=<?=$pageflg ?><?php if(isset($id)){?>
			&id=<?=$id?><?php }
			?>">Next&gt;</a>
			</p>
			<p class="arrow">
				<a
				href="/iw31/test/category.php?page=<?= $totalPage ?>&pageflg=<?=$pageflg ?><?php if(isset($id)){?>
				&id=<?=$id?><?php }
				?>">Last&gt;&gt;</a>
			</p>
				<?php
		}
		?>
	
	</div>
			</div>
			<div id="top"><a href="exhibit_start.php"><p>商品の<br />出品は<br />こちら</p></a></div>
	</div>
	<footer>Copyright©FREE VEGETABLES ONLINE SITE , inc. AllRightsReserved.</footer>
</body>
</html>
