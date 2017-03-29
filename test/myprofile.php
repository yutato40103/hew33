<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
 "http://www.w3.org/TR/html4/loose.dtd">
<html><head>
<meta http-equiv="Content-Script-Type" content="text/javascript">
<meta http-equiv="Content-type" content="text/html; charset=UTF-8">
<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/Conf.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/entity/member.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/dao/MemberDAO.class.php');
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

if(isset($_GET["Id"])){
$Id = $_GET["Id"];
}
try{
	$db = new PDO(DB_DNS,DB_USERNAME,DB_PASSWORD);
	$MemberDAO = new MemberDAO($db);
	$ExhibitDAO = new ExhibitDAO($db);
/*	$count = $ExhibitDAO->Id_count($Id);*/
	$member=$MemberDAO->findLogin($Id);
	$address = $member->getAddress();
	$image = $member->getImage();
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
/*var_dump($result[0]->["lat"]);*/
/*echo json_encode($result);*/
?>
<!--スタイル-->
<style type="text/css">
<!--
#gmap{
	border:solid red 1px;
}
*{
	margin:0px;
	padding:0px;	
}
.red{
	color:red;
}
/*infowindowへのスタイリング*/
#window{
	width:200px;	
}
#window dt{
	font-size: bold;
	font-size: 1.1em;
	color:red;
	padding-bottom:0.2em;
	border-bottom: solid #06f 1px;
	margin:-bottom:5px;
}
#window dd{
	font-size: 0.9px;
	margin-bottom:0.2em;
}
#window1{
	overflow:hidden;
	clear:left;
}

#gmap2{
	overflow:hidden;
}
</style>

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&key=AIzaSyA42IQ2CCfXyiYJMO-tMioEccnyIv6iGjQ 	
"></script><!--key注意-->
<script type="text/javascript">
    // Object { hoge: "fuga" }
//①まずは表示してみる。
google.maps.event.addDomListener(window,"load",function(){
	//alert("Map")ジオコーディング

	//1)移動経路を初期設定する
	var Lat = <?php echo json_encode($result[0]->lat);?>;
	var Lng = <?php echo json_encode($result[0]->lng);?>;
	var LatLng = new google.maps.LatLng(Lat,Lng);
	//2)表示エリアの初期設定
	var map = document.getElementById("gmap");
	var options ={
		zoom:16,
		center:LatLng,
		mapTypeId:google.maps.MapTypeId.ROADMAP,
		/*styles:[
			  {
			    featureType: "all",
			    elementType: "all",
			    stylers: [
			      { visibility: "on" },
			      { hue: "#0800ff" }
			    ]
			  }
			]*/
	};
	/*上部コピーした*/
	var mapObj = new google.maps.Map(map,options);
	
	//2)画像マーカーを表示する
	var markerObj = new google.maps.Marker({
		position:LatLng,
		map:mapObj
	});
	var panorama = new google.maps.StreetViewPanorama(
      document.getElementById('gmap2'), {
        position:LatLng,
        map:mapObj,
        pov: {
          heading: 34,
          pitch: 15
        }
      });
  map.setStreetView(panorama);
	
});



</script>  

<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/html5reset.css">
<link rel="stylesheet" type="text/css" href="css/myprofile.css">
<link rel="stylesheet" type="text/css" href="css/headericon.css">
<title>FREE VEGETABLES ONLINE SITE</title>
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
		<h2>農家プロフィール</h2>
		<div id="account">
			<div id="account_left">
	            <?php if($image!=""){?>
	              	<p><img src="member/<?=$member->getImage()?>"alt="チェック"></p>
	              <?php }
	              else{?>
	              	<p><img src="image/icon.png" alt="アイコン"></p>              	
	              <?php }?>
	        </div>
	        <!-- <table id="account_right"> -->
	        <table class="company">
	        <tbody>
	        	<tr>
	              <th class="arrow_box">名前</th>
	              <td><?=$member->getSei()?><?=$member->getMei()?></td>
	            </tr>
	            <tr>
	              <th class="arrow_box">農園名</th>
	              <td><?=$member->getFarm()?></td>
	            </tr>
	            <tr>
	              <th class="arrow_box">営業地</th>
	              <td><?=$member->getAddress()?></td>
	            </tr>
	            <tr>
	              <th class="arrow_box">農園について</th>
	              <td><?=$member->getDescription()?></td>
	            </tr>
	            <tr>
	              <th class="arrow_box">こだわり</th>
	              <td><?=$member->getBelief()?></td>
	            </tr>
	        </tbody>
	        </table>
        </div>
        <div id="contents">
		    <h2>googleマップで生産場所を表示</h2>
		    <div id="map">
				<div id="gmap"></div>
				<div id="gmap2"></div>
			</div>
        </div>

	</div>
	<footer>Copyright©FREE VEGETABLES ONLINE SITE , inc.AllRightsReserved.</footer>
</body>
</html>



