<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/entity/member.class.php');
$member_list = array();
$member = new Member();
foreach($_POST as $key => $val) {
	$val = trim($val);
	$member_list[$key] = $val;
}
$member = new Member();
$member->setSei($member_list['sei']);
$member->setMei($member_list['mei']);
$member->setSeikana($member_list['sei_kana']);
$member->setMeikana($member_list['mei_kana']);
$member->setMail($member_list['mail']);
$member->setPassword($member_list['password']);
$member->setSex($member_list['sex']);
$member->setYear($member_list['year']);
$member->setMonth($member_list['month']);
$member->setDay($member_list['day']);
$member->setAddress($member_list['year']);
$_SESSION["member"] = serialize($member);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/html5reset.css">
<link rel="stylesheet" type="text/css" href="css/confirmation.css">
<link rel="stylesheet" type="text/css" href="css/headericon.css">
<title>FREE VEGETABLES ONLINE SITE</title>
</head>
<form action="finish.php" method="post">
<body>
	<div id="wrapper">
		<header>
			<h1><img src="image/logo.png" alt="logo"></h1>
		</header>
		<div id="breadcrumb">
			<p>TOP></p>
			<p>登録確認</p>
		</div>
		<h2>登録確認</h2>
		<div id="contents">
			<div id="list">
				<p>お客様情報の入力</p>
				<p class="list">登録・確認</p>
				<p class="list">登録完了</p>
			</div>
			<p id="caution">以下の項目を入力し「確認する」ボタンを押してください。必須は必須項目です。</p>
			<div id="item">
				<table>
					<tr>
						<th>お名前>
						</th>
						<td><div class="sei">姓&emsp;<?=$member_list['sei']?>&emsp;</div>
							<div class="sei">名&emsp;<?=$member_list['mei']?>&emsp;</div></td>
					</tr>
					<tr>
						<th>フリガナ
						</th>
						<td><div class="sei">セイ&nbsp;<?=$member_list['sei_kana']?>&nbsp;</div>
							<div class="mei">メイ&nbsp;<?=$member_list['mei_kana']?>&emsp;</div></td>
					</tr>
					<tr>
						<th>メールアドレス&nbsp;<span class="label require">必須</span><br />
						</th>
						<td class="registerPCmail no-border"><div class="mail"><?=$member_list['mail']?>&emsp;</div>
						</td>
					</tr>

					<tr>
						<th>パスワード&nbsp;<span class="label require">必須</span>
						</th>
						<td><?=$member_list['password']?>&emsp;
						</td>
					</tr>

					<tr>
						<th>性別&nbsp;<span class="label require">必須</span>
						</th>
						<td><label> &nbsp;<?=$member_list['sex']?></label>
						</td>
					</tr>

					<tr>
						<th>生年月日&nbsp;<span class="label require">必須</span>
						</th>
						<td class="birth"><?=$member_list['year']?>年<?=$member_list['month']?>月<?=$member_list['day']?>日 &emsp;</td>
					</tr>
					<tr>
						<th>住所&nbsp;<span class="label require">必須</span>
						</th>
						<td><?=$member_list['address']?></td>
					</tr>
				</table>
           </div>
		</div>
        <div id="button">
                <p><input type="submit" value="登録完了"></p>
      	</div>
	</div>
	<footer>Copyright©FREE VEGETABLES ONLINE SITE , inc.AllRightsReserved.</footer>
</form>
</body>
</html>