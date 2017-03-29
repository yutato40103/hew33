<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/Conf.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/entity/small.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/dao/smallDAO.class.php');
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
$smallJoinList = array();
$seasonList = array();
$exhibitJoinList= array();
$season=date("n");



if($season=="3" || $season=="4" || $season=="5")
{
	$seasonflg=1;
	$seasonname="春";
}
else if($season=="6" || $season=="7" || $season=="8")
{
	$seasonflg=2;
	$seasonname="夏";
}
else if($season=="9" || $season=="10" || $season=="11")
{
	$seaosonflg=3;
	$seasonname="秋";
}
else if($season=="12" || $season=="1" || $season=="2")
{
	$seasonflg=4;
	$seasonname="冬";
}

try{
	$db = new PDO(DB_DNS,DB_USERNAME,DB_PASSWORD);
	$SmallDAO = new SmallDAO($db);
	$ExhibitDAO = new ExhibitDAO($db);
	$smallJoinList1 = $SmallDAO->small_rankings("野菜");
	$smallJoinList2 = $SmallDAO->small_rankings("果物");
	$smallJoinList3 = $SmallDAO->small_rankings("お米");
	$seasonList = $SmallDAO->season($seasonflg);
	$exhibitJoinList = $ExhibitDAO->exhibit_image();


}
catch(PDOException $ex){
	print_r($ex);
	$_SESSION["errorMsg"] = "DB接続に失敗しました";
}
finally {
	$db = null;
}


/*if(isset($_SESSION["errorMsg"])){
	header("Location:/wp32/scottadmindao/error.php");
	exit;
}*/
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/html5reset.css">
<link href="css/themes/default/default.css" rel="stylesheet" type="text/css" />
<link href="css/nivo-slider.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/home.css">
<link rel="stylesheet" type="text/css" href="css/headericon.css">
<title>FREE VEGETABLES ONLINE SITE</title>
<script src="js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="js/jquery.nivo.slider.pack.js"></script>
<script type="text/javascript">
$(function() {
	//タブクリック時の処理
	$('#popularity3 .tab_area ul li').click(function() {
		//.index()を使いクリックされたタブの順番を変数indexに代入する
		var index = $('#popularity3 .tab_area ul li').index(this);
		//指定した全コンテンツを非表示にする
		$('.content_block_3').css('display','none');
		//クリックされたタブと同じ順番のコンテンツのみを表示させる
		$('.content_block_3').eq(index).css('display','block');
	});
});
$(function(){
            $('#slider').nivoSlider({
                effect:'fade'
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
					<a href="mypage.php"><img src="image/icon_w.png" alt="アイコン"></a>
				</p>
				<p class="icon_character"><a href="mypage.php">マイページ</a></p>
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
		
		<div id="main">
			<div class="slider-wrapper theme-default">
				<div id="slider">
					<p>
						<img src="image/home1.jpg" alt="ホーム画像">
					</p>
					<p>
						<img src="image/home2.jpg" alt="ホーム画像">
					</p>
					<p>
						<img src="image/home.jpg" alt="ホーム画像">
					</p>
				</div>
			</div>
		</div>
		<div id="contents">
			<!--<div id="contents_left">-->
				<div id="popularity_food">
					<h2>人気食材から探す</h2>
					<div id="popularity3">
						<div class="tab_area clearfix">
							<ul>
								<li class="odd">野菜</li>
								<li class="even">果物</li>
								<li class="odd">お米</li>
							</ul>
						</div>
						<?php
						?>
						<div class="content_area">
							<div class="content_area_inner clearfix">
								<div id="contents3_1" class="content_block_3"
									style="display: block">
									<div class="food_contents">
										<?php foreach($smallJoinList1 as $small){?>
										<div class="food">
											<div class="food_image">
												<p>
													<a href="category.php?id=<?=$small->getSmallId()?>"><img src="image/<?= $small->getSmallimage()?>" alt="<?= $small->getSmallname()?>"></a>
												</p>
											</div>
											<p><?= $small->getSmallname()?></p>
										</div>
										<?php } ?>
									</div>
                                   
								</div>
								<div id="contents3_2" class="content_block_3"
									style="display:none">
									<!-- <div class="food_contents">
										<div class="food">
											<div class="food_image">
												<p>
													<a href="category.php"><img src="image/orange.jpg" alt="みかん"></a>
												</p>
											</div>
											<p>みかん</p>
										</div>
										<div class="food">
											<div class="food_image">
												<p>
													<a href="category.php"><img src="image/cherry.jpg" alt="さくらんぼ"></a>
												</p>
											</div>
											<p>さくらんぼ</p>
										</div>
										<div class="food">
											<div class="food_image">
												<p>
													<a href="category.php"><img src="image/grape.jpg" alt="ぶどう"></a>
												</p>
											</div>
											<p>ぶどう</p>
										</div>
										<div class="food">
											<div class="food_image">
												<p>
													<a href="category.php"><img src="image/peach.jpg" alt="もも"></a>
												</p>
											</div>
											<p>もも</p>
										</div>
										<div class="food">
											<div class="food_image">
												<p>
													<a href="category.php"><img src="image/apple.jpg" alt="りんご"></a>
												</p>
											</div>
											<p>りんご</p>
										</div>
									</div> -->
                                    <div class="food_contents">
										<?php foreach($smallJoinList2 as $small){?>
										<div class="food">
											<div class="food_image">
												<p>
													<a href="category.php?id=<?=$small->getSmallId()?>"><img src="image/<?= $small->getSmallimage()?>" alt="<?= $small->getSmallname()?>"></a>
												</p>
											</div>
											<p><?= $small->getSmallname()?></p>
										</div>
										<?php } ?>
									</div>
								</div>
								<div id="contents3_3" class="content_block_3"
									style="display:none">
									<div class="food_contents">
										<?php foreach($smallJoinList3 as $small){?>
										<div class="food">
											<div class="food_image">
												<p>
													<a href="category.php?id=<?=$small->getSmallId()?>"><img src="image/<?= $small->getSmallimage()?>" alt="<?= $small->getSmallname()?>"></a>
												</p>
											</div>
											<p><?= $small->getSmallname()?></p>
										</div>
										<?php } ?>
									</div>
                                    
								</div>
							</div>
						</div>
					</div>
				</div>
				<div id="four_seasons">
					<h2><?=$seasonname?>の食材特集</h2>
					<div id="seasons_work">
					<?php foreach($seasonList as $season){?>
						<div class="summer">
								<p>
								<a href="category.php?id=<?=$season->getSmallId()?>"><img src="image/<?= $season->getSmallimage()?>" alt="<?= $season->getSmallname()?>"></a>
								</p>
							<p><?= $season->getSmallname()?></p>
						</div>
						<?php } ?>
					</div>
				</div>
			<!--</div>-->
			<!--<div id="contents_right">-->
				<div id="latest_information">
					<h2>新着食材</h2>
					<?php foreach($exhibitJoinList as $exhibit){?>
					<div class="new">
						<div class="new_image">
							<p>
								<a href="detail.php?id=<?=$exhibit->getExhibit_id()?>"><img src="exhibit/<?=$exhibit->getImage()?>" alt="<?=$exhibit->getProduct_name()?>"></a>
							</p>
						</div>
                        <div class="new_character">
                            <p><?=$exhibit->getProduct_name()?></p>
                        </div>
					</div>
					<?php }?>
				</div>
			<!--</div>-->
		</div>
		<div id="top"><a href="exhibit_start.php"><p>商品の<br />出品は<br />こちら</p></a></div>
	</div>

	<footer>Copyright©FREE VEGETABLES ONLINE SITE , inc. AllRightsReserved.</footer>
</body>
</html>
