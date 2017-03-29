<?php 

require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/Conf.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/dao/ExhibitDAO.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/entity/exhibit.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/dao/goodDAO.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/entity/good.class.php');
$name = $_POST["name"];
$remarks = $_POST["remarks"];
$category = $_POST["category3"];
$state = $_POST["state"];
$price = $_POST["price"];
$name = trim($name);
$remarks = trim($remarks);
$category = trim($category);
$state = trim($state);
$price = trim($price);
$member = $_SESSION["id"];
$today = date("Y-m-d H:i:s");
$exbit1Array = $_FILES["exbit1"];
$exbit2Array = $_FILES["exbit2"];
$exbit3Array = $_FILES["exbit3"];
$exbit4Array = $_FILES["exbit4"];

if(is_uploaded_file($exbit1Array["tmp_name"])){
	
	$exbitArray = array($exbit1Array);
}

if(is_uploaded_file($exbit2Array["tmp_name"])){
	
	array_push($exbitArray,$exbit2Array);
}

if(is_uploaded_file($exbit3Array["tmp_name"])){
	array_push($exbitArray,$exbit3Array);
}

if(is_uploaded_file($exbit4Array["tmp_name"])){
	
	array_push($exbitArray,$exbit4Array);
}

$exhibit = new Exhibit();
$exhibit->setProduct_name($name);
$exhibit->setRemarks($remarks);
$exhibit->setNum($state);
$exhibit->setPrice($price);
$exhibit->setSmallcategory_id($category);



$good = new Good();/*new*/
$good->setMember_id(1);

if(!is_uploaded_file($exbit1Array["tmp_name"])){
	print("ファイルが指定されていないか、ファイルアップロードに失敗しました。");
}
else if($exbit1Array["type"] !="image/png" && $exbit1Array["type"] !="image/jpeg"){
	print("対応できない画像ファイルが指定されました。JPEG、または、PNG画像ファイルを指定してください");
}
try{
	//これ本門
	$db =new PDO(DB_DNS,DB_USERNAME,DB_PASSWORD);
	$exhibitDAO = new exhibitDAO($db);
	$goodDAO = new GoodDAO($db);/*new*/
	$db->beginTransaction();
	$exhibit_id = $exhibitDAO->insert($exhibit,$member,$today);
	$exhibit_MAX = $exhibitDAO->findMax();
	$maxtiket=$exhibit_MAX["1"]->getExhibit_id($exhibit_id);
	$exhibit->setExhibit_id($maxtiket);
	$good->setExhibit_id($maxtiket);
	$goodDAO->good_insert($good);

	foreach ($exbitArray as $Array){
			$line=0;
			if($exhibit->getLine()!=""){
				$line=$exhibit->getLine();
			}
			$line++;
			$exhibit->setLine($line);
			$id = $exhibitDAO->insert_image($exhibit);
			if($id !=0){
				@$imgSizeArray=getimagesize($Array['tmp_name']);
				$width = $imgSizeArray[0];
				$height = $imgSizeArray[1];
				$imgType = $imgSizeArray[2];

				$upDir = $_SERVER['DOCUMENT_ROOT']."/IW31/test/exhibit/";

				$phPathS="upfile-".$id."-S.jpg";
				$phPathL="upfile-".$id."-L.jpg";

				if($imgType ==3){
					$image = imagecreatefrompng($Array['tmp_name']);
				}
				else{
					@$image = imagecreatefromjpeg($Array['tmp_name']);
				}


				$newHeightS = 400;/*60から400に変えた*/
				$rateX = $height/ $newHeightS;
				@$newWidthS = $width /$rateX;


				@$canvasS=imagecreatetruecolor($newWidthS,$newHeightS);
				@imagecopyresampled($canvasS,$image,0,0,0,0,$newWidthS,$newHeightS,$width,$height);

				@imagejpeg($canvasS,$upDir.$phPathS,100);
				@imagedestroy($canvasS);

				if($width<=400){
					move_uploaded_file($Array['tmp_name'],$upDir.$phPathL);
				}
				else{
					$newWidthL = 400;
					$rateY = $width/ $newWidthL;
					$newHeightL = $height /$rateY;

					$canvasL =imagecreatetruecolor($newWidthL,$newHeightL);
					imagecopyresampled($canvasL,$image,0,0,0,0,$newWidthL,$newHeightL,$width,$height);
					imagejpeg($canvasL,$upDir.$phPathL,100);
					imagedestroy($canvasL);
				}

				@imagedestroy($image);

				$reslut = $exhibitDAO->updatePath($id,$phPathS,$phPathL);
			}
			else{
				$db->rollBack();
				throw $ex;
				print_r($ex);
			}
		}
		if($reslut){
			$db->commit();
			$isRedirect = true;
		}
		else{
			$db->rollBack();
			throw $ex;
			print_r($ex);
		}
	
}
catch(PDOException $ex){
	$db->rollBack();
	throw $ex;
	print_r($ex);
}
catch(Exception $ex){
	$db->rollBack();
	throw $ex;
	print_r($ex);
}
finally{
	$db = null;
}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/html5reset.css">
<link rel="stylesheet" type="text/css" href="css/exhibit_finish.css">
<link rel="stylesheet" type="text/css" href="css/headericon.css">
<title>FREE VEGETABLES ONLINE SITE</title>

</head>

<body>
	<div id="wrapper">
		<header>
			<h1><a href="home.php"><img src="image/logo.png" alt="logo"></a></h1>
		</header>
		<div id="contents">
			<div id="movie_detail">
				<div id=reslut>
					<h2>出品が完了致しました</h2>
					<p>
						<a href="exhibit_start.php">引き続き商品を出品する</a>
					</p>
					<p>
						<a href="home.php">商品ホームページに戻る</a>
					</p>
				</div>
			</div>
		</div>
		<!--contents-->
		<!--wrapper-->
	</div>
	<footer>Copyright©FREE VEGETABLES ONLINE SITE , inc. AllRightsReserved.</footer>
</body>
</html>

