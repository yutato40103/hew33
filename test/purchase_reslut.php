<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/Conf.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/entity/buy.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/dao/buyerDAO.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/entity/exhibit.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/dao/ExhibitDAO.class.php');
$category= $_SESSION["category"];
$method = $_POST["method"];
$price =  $_POST["price"];
$date = date('Y-m-d', strtotime("+ 7 days"));
$datename = date('Y年n月j日', strtotime($date));
try{
	$db = new PDO(DB_DNS,DB_USERNAME,DB_PASSWORD);
	$BuyerDAO = new buyerDAO($db);
	$ExhibitDAO = new exhibitDAO($db);
	$member = $_SESSION["id"];
	$buyList = $BuyerDAO->insert($member,$category,$method,$date);
	$flg = $ExhibitDAO->upflg($category);
	$buyList = str_pad($buyList, 8, 0, STR_PAD_LEFT);	
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
<link rel="stylesheet" type="text/css" href="css/headericon.css">
<link rel="stylesheet" type="text/css" href="css/purchase_reslut.css">
<title>FREE VEGETABLES ONLINE SITE</title>
</head>

<body>
	<div id="wrapper">
		<header>
			<h1><a href="home.php"><img src="image/logo.png" alt="logo"></a></h1>
		</header>
		<form action="purchase_reslut.php" method="post">
		<div id="contents">
			<div id="number_header">
				<h2>商品の決済が完了しました </h2>
				<p>ご購入頂きありがとうございます。支払期限までにお金の方を振り込みくださいませ</p>
			</div>
			<div id="number_table">
				<div id="number1">
					<p>受付番号</p>
					<p><?=$buyList?></p>
				</div>
				<div id="number2">
					<p>支払期限</p>
					<p><?=$datename?></p>
				</div>
				<div id="number3">
					<p>支払方法</p>
					<p><?=$method?></p>
				</div>
				<div id="number4">
					<p>支払金額</p>
					<p><?=$price?>円</p>
				</div>
			</div>	
			<div id="top"><a href="home.php">TOPへ戻る</a></div>
		</div>
	</div>
	<footer>Copyright©FREE VEGETABLES ONLINE SITE , inc.AllRightsReserved.</footer>
</body>
</html>