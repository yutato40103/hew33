<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/Conf.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/entity/exhibit.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/dao/ExhibitDAO.class.php');
try{
	$db = new PDO(DB_DNS,DB_USERNAME,DB_PASSWORD);
	$ExhibitDAO = new ExhibitDAO($db);
	$ExhibitList = $ExhibitDAO->Exhibit_kanri(0);
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
<link rel="stylesheet" type="text/css" href="css/contolmanage.css">
<link rel="stylesheet" type="text/css" href="css/headericon.css">
<title>FREE VEGETABLES ONLINE SITE</title>
</head>
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
		</header>
		<div id="breadcrumb">
			<p>TOP></p>
			<p>マイページ</p>
		</div>
		<div id="contents">
			<nav>
				<ul>
					<li><a href="#">出品されている商品-商品-出品中の確認</a></li>
					<li><a href="#">出品されている商品-商品-取引中の確認</a></li>
					<li><a href="#">出品されている商品-商品-売却済みの確認</a></li>
					<li><a href="#">購入されている商品-取引中の確認</a></li>
					<li><a href="#">購入されている商品-過去の取引の確認</a></li>
				</ul>
				<ul>
					<li><a href="#">会員情報検索</a></li>
				</ul>
			</nav>
			<div id="right_content">
				<div id="title">
					<p>出品されている商品</p>
				</div>
				<table>
					<tr>
						<th>商品ID</th>
						<th>商品名</th>
						<th>商品カテゴリー</th>
						<th>価格</th>
						<th>都道府県</th>
						<th>会員番号</th>
						<th>出品日</th>
					</tr>
					<div id="top_list">
						<?php if($ExhibitList!=""){
									foreach ($ExhibitList as $Exhibit) { ?>
									<tr>
										<td><?=$Exhibit->getExhibit_id()?></td>
										<td><?=$Exhibit->getProduct_name()?></td>
										<td><?=$Exhibit->getSmallcategory_id()?></td>
										<td><?=$Exhibit->getPrice()?>円</td>
										<td><?=$Exhibit->getPrefectures_name()?></td>
										<td><?=$Exhibit->getMember()?></td>
										<td><?=$Exhibit->getDay()?></td>
									</tr>
									<?php } 
									}?>
						</div>
					</div>
				</table>
			</div>
		</div>
	</div>
	<div id="top">
		<p>出品</p>
	</div>
	</div>
	<footer>Copyright©FREE VEGETABLES ONLINE SITE , inc.AllRightsReserved.</footer>
</body>
</html>
