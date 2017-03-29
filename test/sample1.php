<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/Conf.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/entity/member.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/dao/MemberDAO.class.php');
try{
	$db = new PDO(DB_DNS,DB_USERNAME,DB_PASSWORD);
	$MemberDAO = new MemberDAO($db);
	$member=$MemberDAO->findLogin(1);
	$address = $member->getAddress();
}
catch(PDOException $ex){
	print_r($ex);
	$_SESSION["errorMsg"] = "DB接続に失敗しました";
}
finally {
	$db = null;
}
ini_set('display_errors', 'ON');
error_reporting(E_ALL);

// UTF-8設定下でのみ動作します
// UTF-8になっていない場合は、このようにUTF-8に変更してください
mb_internal_encoding('UTF-8');

//autoloaderを使わず、Classファイルを手動で読み込む場合は下記ファイルをすべて読み込んでください
$LIB_DIR = realpath(dirname(__FILE__).'/src/').'/';
require_once $LIB_DIR.'Dm/Geocoder.php';
require_once $LIB_DIR.'Dm/Geocoder/Address.php';
require_once $LIB_DIR.'Dm/Geocoder/Prefecture.php';
require_once $LIB_DIR.'Dm/Geocoder/Query.php';
require_once $LIB_DIR.'Dm/Geocoder/GISCSV.php';
require_once $LIB_DIR.'Dm/Geocoder/GISCSV/Finder.php';
require_once $LIB_DIR.'Dm/Geocoder/GISCSV/Reader.php';

//ジオコーディング
$result = Dm_Geocoder::geocode($address);
var_dump($result[0]->lat);
/*var_dump($result[0]->["lat"]);*/

header("Content-Type: application/json");
echo json_encode($result);