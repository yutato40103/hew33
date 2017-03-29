<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/Conf.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/entity/exhibit.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/dao/ExhibitDAO.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/dao/MemberDAO.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/entity/member.class.php');
$Id=1;
$name="aaa";
try{
	$db = new PDO(DB_DNS,DB_USERNAME,DB_PASSWORD);
	$ExhibitDAO = new ExhibitDAO($db);
	$MemberDAO = new MemberDAO($db);
/*	$count = $ExhibitDAO->Id_count($Id);*/
	$member=$MemberDAO->findLogin($Id);
	$image = $member->getImage();
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
			<div id="my_page">
			<div id="icon">
				<p id="image_icon">
					<img src="image/icon_w.png" alt="アイコン">
				</p>
				<p class="icon_character">マイページ</p>
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
	              <td>春野太郎</td>
	            </tr>
	            <tr>
	              <th class="arrow_box">農園名</th>
	              <td>HAL農園</td>
	            </tr>
	            <tr>
	              <th class="arrow_box">営業地</th>
	              <td>大阪府</td>
	            </tr>
	            <tr>
	              <th class="arrow_box">農園について</th>
	              <td>野菜栽培の土台である土の生物の多様性を広げるため、農薬・化学肥料を使わずに栽培し、JAS認証を取得しています。
				家族・友人・仲間との食卓が豊かになり、会話が生まれ、絆が深まる・・・。そんな人の環（わ）を築いていくお手伝いができれば、私たちは幸せです。</td>
	            </tr>
	        </tbody>
	        </table>
        </div>
        <div id="contents">
	        <h2>こだわり</h2>
	            <p>無農薬・無化学肥料栽培だから、おいしい野菜ができるとは思っていない。高い晴天率や昼夜の寒暖差のおかげで野菜が健康に育つことがおいしさにつながっていると思うので、私たちはその御膳立てに徹する。</p>
        </div>
	</div>

	</div>
	<footer>Copyright©FREE VEGETABLES ONLINE SITE , inc.AllRightsReserved.</footer>
</body>
</html>