<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/Conf.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/entity/exhibit.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/dao/ExhibitDAO.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/entity/member.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/dao/MemberDAO.class.php');

$category=$_SESSION["category"];

try{
	$db = new PDO(DB_DNS,DB_USERNAME,DB_PASSWORD);
	$ExhibitDAO = new ExhibitDAO($db);
	$exhibitList = $ExhibitDAO->t_exhibit_image($category);
	$member = $_SESSION["id"];
	$MemberDAO = new MemberDAO($db);
	$memberList = $MemberDAO->findLogin($member);
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
<link rel="stylesheet" type="text/css" href="css/headericon.css">
<link rel="stylesheet" type="text/css" href="css/jquery.minimalect.css" media="screen" >
<link rel="stylesheet" type="text/css" href="css/purchase.css">
<title>FREE VEGETABLES ONLINE SITE</title>
</head>
<script src="js/jquery-2.1.4.min.js"></script>
<script src="js/jquery.minimalect.js"></script>  
 <script>
$(function(){
	$("#method1").minimalect();
});
</script>


<body>
	<div id="wrapper">
		<header>
			<h1><a href="home.php"><img src="image/logo.png" alt="logo"></a></h1>
		</header>
		<form action="purchase_reslut.php" method="post">
			<div id="contents">
				<div id="contents_top">
					<?php foreach($exhibitList as $exhibit){
						if($int==1){
		?>
					<div id="top_left">
						<p>
							<img src="exhibit/<?= $exhibit->getImage()?>" alt="トマト"
								width="200px">
						</p>
					</div>
					<div id="top_right">
						<p>
							<?= $exhibit->getProduct_name()?>
						</p>
						<p>
							<input type="hidden" name="price" value="<?= $exhibit->getPrice()?>">
							<?= $exhibit->getPrice()?>
							円
						</p>
						<?php
		}
		$int++;
					}
					?>
					</div>
				</div>

				<div id="contents_middle">
					<div id="method">
						<p>支払い方法</p>
					</div>
					<SELECT id="method1" name="method">
								<OPTION value="コンビニ払い">コンビニ払い</OPTION>
								<OPTION value="銀行・ＡＴＭ">銀行・ＡＴＭ</OPTION>
								<OPTION value="クレジットカード">クレジットカード</OPTION>
					</SELECT>
					<div id="address">
						<p>配送先住所</p>
						<p>
							<?=$memberList->getaddress()?>
						</p>
						<p>
							<?=$memberList->getsei()?>
							<?=$memberList->getmei()?>
							様
						</p>
					</div>
				</div>
				<input type="submit" value="支払い方法を決定する" id="purchase">
		
		</form>
	</div>
	<footer>Copyright©FREE VEGETABLES ONLINE SITE , inc.AllRightsReserved.</footer>
</body>
</html>