<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/Conf.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/dao/MemberDAO.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/entity/member.class.php');

		$member = $_SESSION["member"];
		$member = unserialize($member);
	
		try{
		$db = new PDO(DB_DNS,DB_USERNAME,DB_PASSWORD);
		$memberDAO = new MemberDAO($db);
		$result = $memberDAO->insert($member);
		if(!$result){
				$_SESSION["errorMsg"] ="情報登録に失敗しました。もう一度はじめからやり直してください";
			}
		}
	catch(PDOException $ex){
		print_r($ex);
		$_SESSION["errorMsg"] = "DB接続に失敗しました";
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
<link rel="stylesheet" type="text/css" href="css/finish.css">
<link rel="stylesheet" type="text/css" href="css/headericon.css">
<title>FREE VEGETABLES ONLINE SITE</title>
</head>

<body>
	<div id="wrapper">
		<header>
			<h1><img src="image/logo.png" alt="logo"></h1>
        </header>
		<div id="breadcrumb">
			<p>TOP></p>
			<p>登録完了</p>
		</div>
		<h2>登録完了</h2>
		<div id="contents">
			<div id="list">
				<p>お客様情報の入力</p>
				<p class="list">登録・確認</p>
				<p class="list">登録完了</p>
			</div>
			<div id="finish">
            	<h3>会員登録が完了致しました</h3>
				<p>FVOSにご登録頂きましてありがとうございます。</p>
                <p>登録が完了いたしましたのでお知らせいたします。</p>
			</div>
		</div>
      </div>
	<footer>Copyright©FREE VEGETABLES ONLINE SITE , inc.AllRightsReserved.</footer>
</body>
</html>