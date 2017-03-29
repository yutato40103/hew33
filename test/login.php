<?php  
	$validationMsgs = null;
	if(isset($_SESSION["validationMsgs"])){
		$validationMsgs = $_SESSION["validationMsgs"];
	}
    unset($_SESSION["validationMsgs"]);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/html5reset.css">
<link rel="stylesheet" type="text/css" href="css/login.css">
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
			<p>ログイン</p>
		</div>
		<h2>ログイン</h2>
		<form action="login_f.php" method="post">
		<div id="contents">
			<div id="login">
				<div id="login_detail">
					<h3>ログイン</h3>
					<p>会員登録が完了しているお客様</p>
					<p>メールアドレスとパスワードを入力してログインしてください。</p>
							<?php
						if(!is_null($validationMsgs)){
	?>
		<section id="errorMsgs">
		<ul>
			<?php
			foreach ($validationMsgs as $msg) {
	?>
			<li><?php print($msg) ?></li>
			<?php
	}
	?>
		</ul>
		</section>
		<?php
	}
	?>
					<table>
						<tr>
							<th>メールアドレス</th>
							<td><input type="email" name="mail" id="mail"></td>
						</tr>
						<tr>
							<th>パスワード</th>
							<td> <input type="password" name="password" id="password"></td>
						</tr>
					</table>
				</div>
                
				<div id="login_botton">
					<p><input type="submit" value="ログイン" class="sbt_1"></p>
				</div>
				
			</div>
			<div id="registration">
					<div id="registration_detail">
						<h3>新規会員登録</h3>
						<p>商品をご購入いただくには新規会員登録が必要です。</p>
						<p>一度ご登録して頂きますと、ご注文の際にお名前・ご住所などの入力が不要になり安全かつ簡単にご利用頂けます。</p>
					</div>
				<div id="registration_botton">
					<p><a href="registration.php">新規会員登録</a></p>
				</div>
			</div>
		<div id="top">
			<p>出品</p>
		</div>
		</form>
	</div>
	<footer>Copyright©FREE VEGETABLES ONLINE SITE , inc.AllRightsReserved.</footer>
</body>
</html>