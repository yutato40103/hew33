<?php 

require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/Conf.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/dao/MemberDAO.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/entity/member.class.php');

$exbit1Array = $_FILES["exbit1"];
$member="member";
$id = $_SESSION["id"];

if(is_uploaded_file($exbit1Array["tmp_name"])){
	
	$exbitArray = array($exbit1Array);
}
if(!is_uploaded_file($exbit1Array["tmp_name"])){
	print("ファイルが指定されていないか、ファイルアップロードに失敗しました。");
}
else if($exbit1Array["type"] !="image/png" && $exbit1Array["type"] !="image/jpeg"){
	print("対応できない画像ファイルが指定されました。JPEG、または、PNG画像ファイルを指定してください");
}
	try{
		$db =new PDO(DB_DNS,DB_USERNAME,DB_PASSWORD);
		$memberDAO = new MemberDAO($db);
		$db->beginTransaction();
			$imgSizeArray=getimagesize($exbit1Array['tmp_name']);
			$width = $imgSizeArray[0];
			$height = $imgSizeArray[1];
			$imgType = $imgSizeArray[2];

			$upDir = $_SERVER['DOCUMENT_ROOT']."/IW31/test/member/";

			$phPathS="upfile-".$member.$id."-S.jpg";
			$phPathL="upfile-".$member.$id."-L.jpg";

			if($imgType ==3){
				$image = imagecreatefrompng($exbit1Array['tmp_name']);
			}
			else{
				$image = imagecreatefromjpeg($exbit1Array['tmp_name']);
			}

			$newHeightS = 400;
			$rateX = $height/ $newHeightS;
			$newWidthS = $width /$rateX;


			$canvasS=imagecreatetruecolor($newWidthS,$newHeightS);
			imagecopyresampled($canvasS,$image,0,0,0,0,$newWidthS,$newHeightS,$width,$height);
			
			imagejpeg($canvasS,$upDir.$phPathS,100);
			imagedestroy($canvasS);
			
			if($width<=400){
				move_uploaded_file($exbit1Array['tmp_name'],$upDir.$phPathL);
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

			imagedestroy($image);

			$reslut = $memberDAO->update_m($id,$phPathS);
			
			if($reslut){
				$db->commit();
				$isRedirect = true;
			}
			else{
				$db->rollBack();
				$smarty->assign("errorMsg","情報登録に失敗しました。もう一度はじめからやり直してください.");
				$tplPath = "error.tpl";
			}
		
	}
	catch(PDOException $ex){
		$db->rollBack();
		print_r($ex);
	}
	catch(Exception $ex){
		$db->rollBack();
		print_r($ex);
	}
	finally{
		$db = null;
	}
	header('Location:member_start.php');
?>