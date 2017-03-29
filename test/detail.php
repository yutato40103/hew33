<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/Conf.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/entity/exhibit.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/dao/ExhibitDAO.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/entity/member.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/dao/MemberDAO.class.php');


	if(isset($_SESSION["loginFlg"]))
	{
		$flg=1;
	}
	else 
	{
		$flg=0;
	}
if(isset($_GET["id"])){
$category = $_GET["id"];
}
else{
$category= $_SESSION["category"];
}

$_SESSION["category"] = $category;

if(isset($_SESSION["id"])){
$member = $_SESSION["id"];
}

try{
	$db = new PDO(DB_DNS,DB_USERNAME,DB_PASSWORD);
	$ExhibitDAO = new ExhibitDAO($db);
	$MemberDAO = new MemberDAO($db);
	$exhibitList = $ExhibitDAO->t_exhibit_image($category);
	$exhibit_n = $ExhibitDAO->t_exhibit_image_n($category);
	$exhibitImg = $ExhibitDAO->image($category);
	$exhibitcoment = $ExhibitDAO->t_coment($category);
	
	$Member = $MemberDAO->findLogin($exhibit_n[1]->getMember());
	$image = $Member->getImage();
}
catch(PDOException $ex){
	print_r($ex);
	$_SESSION["errorMsg"] = "DB接続に失敗しました";
}
finally {
	$db = null;
}
$int=1;
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/html5reset.css">
<link rel="stylesheet" type="text/css" href="css/detail.css">
<link rel="stylesheet" type="text/css" href="css/headericon.css">
<title>FREE VEGETABLES ONLINE SITE</title>
    <script src="js/jquery-2.1.4.min.js"></script>
    <script>
    $(function(){
    $('#send').click(function()
        {
            $.ajax({
                type:"POST",
                url:"send.php",
                dataType:'json', 
                data:{
        			 request : $('#request').val(),
        			 val: ($("#hidenn1").val()),
        			 member: ($("#hidenn2").val())
    			}
    		})
            .done(function(data){
            	/*alert("ok");
	           		$.each(data, function(num,coment_name)
	           		{
	             		$('#coment').append($('<p>').text(coment_name).attr('value',num));
	             		alert(coment_name[1]);
	             	});*/
                   window.location.href = "detail.php";
            })
            .fail(function(jqXHR, textStatus, errorThrown){
                {
                    alert('Error : ' + errorThrown);
                }
            });
        });

   });
   $(function() {
	$('img.thumb').mouseover(function(){
		// "_thumb"を削った画像ファイル名を取得
		var selectedSrc = $(this).attr('src').replace(/^(.+)_thumb(\.gif|\.jpg|\.png+)$/, "$1"+"$2");

		// 画像入れ替え
		$('img.mainImage').stop().fadeOut(50,
			function(){
				$('img.mainImage').attr('src', selectedSrc);
				$('img.mainImage').stop().fadeIn(200);
			}
		);
		// サムネイルの枠を変更
		$(this).css({"border":"2px solid #ff5a71"});
	});

	// マウスアウトでサムネイル枠もとに戻す
	$('img.thumb').mouseout(function(){
		$(this).css({"border":""});
	});
});
    </script>
</head>

<body>
	<div id="wrapper">
		<header>
			<h1><a href="home.php"><img src="image/logo.png" alt="logo"></a></h1>
			<form action="category.php" name="searchform" id="searchform" method="get">
				<p><input type="text" placeholder="キーワードから検索" name="keywords" id="keywords" value=""></p>
                <p><input type="image" src="image/btn4.gif" alt="検索" name="searchBtn" id="searchBtn" /></p>
			</form>
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
		
		<?php foreach($exhibitList as $exhibit){
			if($int==1){
		?>
		<div id="breadcrumb">
			<p>TOP></p>
			<p><?= $exhibit->getBigcategory_name()?>></p>
			<p><?= $exhibit->getProduct_name()?></p>
		</div>
		<nav>
			<ul>
				<li>野菜</li>
				<li>果物</li>
				<li>お米</li>
			</ul>
		</nav>
		<div id="contents">
			<div id="contents_header">
				<div id="product_name">
				<?php if($image!=""){?>
              	<p id="product_img"><a href="myprofile.php?Id=<?=$Member->getMemberid()?>"><img src="member/<?=$Member->getImage()?>"alt="チェック"></p>
              <?php }
              else{?>
              	<p id="product_img"><a href="myprofile.php?Id=<?=$Member->getMemberid()?>"><img src="image/icon.png" alt="アイコン"></p>
              <?php }?>
					<p id="name"><?=$Member->getSei()?><?=$Member->getMei()?></a></p>
				</div>
				<div id="category">
					<p>カテゴリー：<?= $exhibit->getBigcategory_name()?>><?= $exhibit->getMediumcategory_name()?>><?= $exhibit->getSmallcategory_name()?></p>
				</div>
			</div>
			<div id="contents_center">
				<div id="contents_main">
				<div id="main">
					<p>
						<img src="exhibit/<?=$exhibitImg[1]->getImage()?>" class="mainImage">
					</p>
				</div>
					<div id="for_image">
				<?php for($i=1;$i<5;$i++){
					if(isset($exhibitImg[$i])){
					?>
					<div class="image">
						<p>
							<img src="exhibit/<?=$exhibitImg[$i]->getImage()?>" class="thumb">
						</p>
					</div>
				<?php
				} 
			}?>
				</div>

				</div>

				<div id="contents_product">
					<h2>
						<?= $exhibit->getProduct_name()?>
					</h2>
					<p>
						<?= $exhibit->getPrice()?>
						円
					</p>
					<?php
					$int++;
					}
					}?>
					<div id="product_nice">
						<p>♥いいね 4件</p>
						<p>💬コメント 0件</p>
					</div>
					<form action="purchase_details.php" method="get">
						<p><input id="buy" value="購入に進む" type="submit"></p>
					</form>
						
								</div>
			</div>
			<div id="contents_under">
				<div id="under_left">
					<h3>商品情報</h3>
					<table>
						<tr>
							<th>カテゴリー</th>
							<td><?= $exhibit->getBigcategory_name()?>><?= $exhibit->getMediumcategory_name()?>><?= $exhibit->getSmallcategory_name()?></td>
						</tr>
						<tr>
							<th>発送元の地域</th>
							<td>&nbsp;<?= $exhibit->getPrefectures_name()?></td>
						</tr>
						<tr>
							<th>配送料の負担</th>
							<td>&nbsp;着払い</td>
						</tr>
						<tr>
							<th>発送日の目安</th>
							<td>&nbsp;支払い後すぐに発送</td>
						</tr>
					</table>
				</div>
				<input name="hogehoge" type="hidden" value="<?=$category?>" id="hidenn1"/>
				<input name="member" type="hidden" value="<?=$member?>" id="hidenn2"/>
				<div id="under_right">
					<h3>商品詳細</h3>
					<p><?=$exhibit->getRemarks()?></p>
					<h3>コメント</h3>
					<?php foreach($exhibitcoment as $exhibit){?>
					<div class="coment">
						<p><?=$exhibit["sei"]?><?=$exhibit["mei"]?></p>
						<p><?=$exhibit["time"]?></p>
						<p><?=$exhibit["coment_name"]?></p>
					</div>
					<?php } ?>
					
							<textarea id="request" cols="60" rows="6" wrap="off"></textarea>
                    <p><input id="send" value="送信" type="button"></p>
                 

				</div>
			</div>
		</div>
		<div id="top"><a href="exhibit_start.php"><p>商品の<br />出品は<br />こちら</p></a></div>
	</div>
	<footer>Copyright©FREE VEGETABLES ONLINE SITE , inc.AllRightsReserved.</footer>
</body>
</html>