<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/Conf.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/entity/User.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/dao/UserDAO.class.php');
$isRedirect = false;

$mail = $_POST["mail"];
$password = $_POST["password"];

$mail = trim($mail);
$password = trim($password);
$validationMsgs = array();

if (strlen($mail) == 0) {
	$validationMsgs[] = "メールアドレスを入力してください。";
}
if (strlen($password) == 0) {
	$validationMsgs[] = "パスワードを入力してください。";
}

if (empty($validationMsgs)) {
	try{
		$db = new PDO(DB_DNS,DB_USERNAME,DB_PASSWORD);
		$userDAO = new UserDAO($db);

		$user = $userDAO->findByLoginId($mail);
		if ($user == null) {
			$validationMsgs[] = "メールアドレス、またはパスワードが違います。";
		}
		else {
			$userPw = $user->getPassword();
			if ($password == $userPw) {
				$id = $user-> getId();
				$sei = $user-> getsei();
				$mei = $user-> getmei();

				$_SESSION["loginFlg"] = true;
				$_SESSION["id"] = $id;
				$_SESSION["name"] = $sei." ".$mei;
				$_SESSION["auth"] = 1;
				$isRedirect = true;
				header("Location:home.php");
			} else {
				$validationMsgs[] = "メールアドレス、またはパスワードが違います。";
			}
		}
	}
	catch (PDOException $ex) {
			print("<ul><li>Code=".$ex->getCode()."</li><li>File=".$ex->getFile()."</li><li>Line=".$ex->getLine()."</li><li>Message=".$ex->getMessage()."</li><li>Trace=".$ex->getTraceAsString()."</li></ul>");
	$_SESSION["errorMsg"] = "DB接続に失敗しました";
	} finally {
		$db = null;
	}
}
if (!$isRedirect) {
			$_SESSION["validationMsgs"] = $validationMsgs;
			header("Location:login.php");
	}
?>
