<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/Conf.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/entity/small.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/dao/smallDAO.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/entity/mediumcategory.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/dao/MediumcategoryDAO.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/entity/mediumcategory.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/dao/MediumcategoryDAO.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/entity/mediumcategory.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/dao/BigcategoryDAO.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/entity/Bigcategory.class.php');
$smallList = array();
try{
	$db = new PDO(DB_DNS,DB_USERNAME,DB_PASSWORD);
	$SmallDAO = new SmallDAO($db);
	$MediumDAO = new MediumDAO($db);
	$BigDAO = new BigDAO($db);
	$smallJoinList = $SmallDAO->findAll();
	$MediumcategoryJoinList = $MediumDAO->findAll();
	$BigcategoryJoinList = $BigDAO->findAll();
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
<link rel="stylesheet" type="text/css" href="css/exhibit_start.css">
<link rel="stylesheet" type="text/css" href="css/headericon.css">
<link rel="stylesheet" type="text/css" href="css/dropify.css">
<link rel="stylesheet" type="text/css" href="css/jquery.minimalect.css" media="screen" >

<title>FREE VEGETABLES ONLINE SITE</title>
<script src="js/jquery-2.1.4.min.js"></script>
<script src="js/dropify.js"></script>
<script src="js/jquery.minimalect.js"></script>  
<script>
$(function(){
	 //selectタグ（親） が変更された場合
    $("#example2").on("change", function(){
          var example2 = $("#example2").val();
          //maker_val値 を select.php へ渡す
          $.ajax({
            url: "select.php",
            type: "POST",
            dataType:"json",
            data:{
              example2:example2
            }
          })
        .done(function(data){
            //selectタグ（子） の option値 を一旦削除
            $('#example3 option').remove();
            $('#example3').append($('<option>').text("選択してください").attr('value'," "));
            //select.php から戻って来た data の値をそれそれ optionタグ として生成し、
            // .car_model に optionタグ を追加する
            $.each(data, function(id, name){
              $('#example3').append($('<option>').text(name).attr('value', id));
            });

          })
          .fail(function(jqXHR, textStatus, errorThrown){
             console.log("NG:" + jqXHR.status);
            
            console.log("失敗");
          });
        });
   	$("#example1").on("change", function(){
          var example1 = $("#example1").val();
          //maker_val値 を select.php へ渡す
          $.ajax({
            url: "select1.php",
            type: "POST",
            dataType:"json",
            data:{
              example1:example1
            }
          })
        .done(function(data){
            //selectタグ（子） の option値 を一旦削除
            $('#example2 option').remove();
             $('#example2').append($('<option>').text("選択してください").attr('value'," "));
            //select.php から戻って来た data の値をそれそれ optionタグ として生成し、
            // .car_model に optionタグ を追加する
            $.each(data, function(id, name){
              $('#example2').append($('<option>').text(name).attr('value', id));
            });

          })
          .fail(function(jqXHR, textStatus, errorThrown){
             console.log("NG:" + jqXHR.status);
            
            console.log("失敗");
          });
        });
    $('.dropify').dropify();
	$("#example1").minimalect();
	$("#example2").minimalect();
	$("#example3").minimalect();
	$("#example4").minimalect();

});
</script>
</head>

<body>
	<div id="wrapper">
		<header>
			<h1><a href="home.php"><img src="image/logo.png" alt="logo"></a></h1>
		</header>
		<form action="exhibit_finish.php" method="post" enctype="multipart/form-data">
			<div id="contents">
				<h2>商品の情報を入力して下さい</h2>
				<div id="image">
					<h3>出品画像</h3>
					<p class=image><input type="file" name="exbit1" size="30" class="dropify"/></p>
					<p class=image><input type="file" name="exbit2" size="30" class="dropify"/></p>
					<p class=image><input type="file" name="exbit3" size="30" class="dropify"/></p>
					<p class=image><input type="file" name="exbit4" size="30" class="dropify"/></p>
				</div>
				<div id="exbit_name">
					<p>商品名</p>
					<p><input type="text" name="name" size="110"></p>
				</div>
				<div id="exbit_description">
					<p>商品の説明</p>
					<p><textarea name="remarks" rows="10" cols="112"></textarea></p>
				</div>
				<div id="description_detail">
						<div id="description_left">
							<p>商品の詳細</p>
						</div>
						<div id="description_right">
							<div id="category">	
								<p>大カテゴリー</p>
								<select id="example1" name="category1">
								<option class="">選択してください</option>
								<?php foreach ($BigcategoryJoinList as $big){?>
										<option value="<?=$big->getBigcategory_id()?>"><?= $big->getBigcategoryname()?></option>
								<?php }?>
								</select>
								<p>中カテゴリー</p>
								<select id="example2" name="category2">
									<option class="">大カテゴリーを選択してください</option>
								</select>
								<p>小カテゴリー</p>
								<select id="example3" name="category3">
									<option class="">中カテゴリーを選択してください</option>
								</select>
							</div>
							<div id="state" >
									<p>状態</p>
									<select id="example4" name="state">
												<option value="0">新鮮野菜</option>
												<option value="1">廃棄野菜</option>
									</select>
							</div>
						</div>
				</div>				
				<div id="price">
					<div id="price_left">
						<p>販売価格</p>
					</div>
					<div id="price_right">
						<p>価格</p>
						<p>￥<input type="text" name="price"></p>
					</div>
				</div>
					<div id="d_bottom">
						<p><input type="submit" value="登録" id="bottom"></p>
					</div>
			</div>
		</form>
	<footer>Copyright©FREE VEGETABLES ONLINE SITE , inc. AllRightsReserved.</footer>
</body>
</html>
