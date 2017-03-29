<?php 
$name = $_SESSION["name"];
$Id = $_SESSION["id"];
require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/Conf.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/entity/exhibit.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/dao/ExhibitDAO.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/dao/MemberDAO.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/entity/member.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/entity/user.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/entity/buy.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/entity/start.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/dao/buyerDAO.class.php');
try{
	$db = new PDO(DB_DNS,DB_USERNAME,DB_PASSWORD);
	$ExhibitDAO = new ExhibitDAO($db);
	$MemberDAO = new MemberDAO($db);
	$BuyerDAO = new buyerDAO($db);
	$count = $ExhibitDAO->Id_count($Id);
	$member=$MemberDAO->findLogin($Id);
	$image = $member->getImage();
	$BuyerList = $BuyerDAO->things($Id);
	$ExhibitList = $ExhibitDAO->exhibit_Notice();
	$Buyer = $BuyerDAO->buy_Notice();
	$memberAll=$MemberDAO->find();
	$BuyerAll = $BuyerDAO->buyAll();
	/*VAR_DUMP($BuyerAll);*/
	/*VAR_DUMP($ExhibitList);*/
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
<link rel="stylesheet" type="text/css" href="css/mypage.css">
<link rel="stylesheet" type="text/css" href="css/headericon.css">
<title>FREE VEGETABLES ONLINE SITE</title>
</head>

<script
	src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"
	type="text/javascript"></script>

<script type="text/javascript">
$(function() {
	$('.tab li:nth-child(1)').addClass('current');/*最初のliタグにcurrent追加*/
	$('.tab li').click(function() {
		var num = $(this).parent().children('li').index(this);/*.tabから見た子要素のli要素が何番目かを習得*/
		$(this).parent('.tab').each(function(){/*要素に対しての処理*/
			$('li',this).removeClass('current').eq(num).addClass('current');/*元にあったli要素からcurrenを取り出しnum番目にcurren追加*/
		});
		$(this).parent().next().children('.content').hide().eq(num).show();/*ulの次のcontentsの要素を全て非表示しnum番目を表示させる*/
	}).first().click();
});
</script>

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
		
		<div id="breadcrumb">
			<p>TOP></p>
			<p>マイページ</p>
		</div>
		<div id="contents">
		  <nav>
				<ul>
					<li><a href="mypage.php">マイページ</a></li>
					<li><a href="#">お知らせ</a></li>
					<li><a href="#">いいね！一覧</a></li>
					<li><a href="#">出品する</a></li>
					<li><a href="exhibit.php">出品した商品</a></li>
					<li><a href="purchase.php">購入した商品</a></li>
					<li><a href="#">評価一覧</a></li>
				</ul>
				<ul>
					<li><a href="#">売上.振込申請</a></li>
					<li><a href="#">ポイント</a></li>
				</ul>
				<ul>
					<li><a href="member_start.php">プロフィール変更</a></li>
					<li><a href="#">住所変更</a></li>
					<li><a href="#">支払い方法</a></li>
					<li><a href="#">メール/パスワード</a></li>
					<li><a href="#">電話確認の確認</a></li>
					<li><a href="logout.php">ログアウト</a></li>
				</ul>
			</nav>
            <div id="right_content">
            <div id="account">
            <?php if($image!=""){?>
              	<p><img src="member/<?=$member->getImage()?>"alt="チェック"></p>
              <?php }
              else{?>
              	<p><img src="image/icon.png" alt="アイコン"></p>
              <?php }?>

              <p><?=$name?></p>
              <p>評価　0　出品数<?=$count[1]->getcount();?></p>
            </div>
			<div id="two_list">
				<div id="top_list">
						<ul class="tab">
							<li>お知らせ</li>
							<li>やることリスト</li>
						</ul>
						<div class="contents">
							<div class="content">
								<dl>
									<dt>ピーラーで皮をむいて千切りに！</dt>
									<dd>2017/01/31</dd>
								</dl>
								<dl>
									<dt>野菜ジュースは本当に体にいい?</dt>
									<dd>2017/01/27</dd>
								</dl>
								<dl>
									<dt>捨てるのはもったいない！みかんの白いスジと皮の健康効果</dt>
									<dd>2017/01/25</dd>
								</dl>
								<dl>
									<dt>免疫力がUPする食べもの3つ</dt>
									<dd>2017/01/21</dd>
								</dl>
								<dl>
									<dt>実は生でおいしく食べられる野菜</dt>
									<dd>2017/01/17</dd>
								</dl>
							</div>
							<div class="content">
							<?php foreach($BuyerList as $buye){?>
								<dl>
									<?php if($buye->getDivide()==0){?>
										
										<dt>
										<?=var_dump($buye->getbuyer_id())?>
										<?=var_dump($BuyerAll[$buye->getbuyer_id()]->getMember_id())?>
										<?=var_dump($ExhibitList[$buye->getbuyer_id()]->getMember())?>
											<?=$memberAll[$ExhibitList[$buye->getbuyer_id()]->getMember()]->getSei()?>
											<?=$memberAll[$ExhibitList[$buye->getbuyer_id()]->getMember()]->getMei()?>さんが貴方の出品した
											<?=$ExhibitList[$buye->getbuyer_id()]->getProduct_name()?>を購入希望しています。
										</dt>
										<dd><?=substr($buye->getTime(),0,10)?></dd>
									<?php }
									else if($buye->getDivide()==1){
										$date=substr($buye->getTime(),0,10);
										list($Y, $m, $d) = explode('-',$date);
										$d=$d-7;
										$d = (string) $d;
										if(!ctype_digit($d) || $d==0){
											$m=$m-1;
											$m = (string) $m;
											$m="0".$m;
											$Time = $Y."-".$m;
											$last=date('d', strtotime('last day of ' . $Time));
											$d=$last+$d;
										}
										if(strlen($d)==1){
											$d="0".$d;
										};
										$Time = $Y."-".$m."-".$d;
										?>
									<dt><!-- 購入ＩＤ -->
									<?=VAR_DUMP($BuyerAll[$buye->getbuyer_id()]->getExhibit_id())?>
									<?=VAR_DUMP($buye->getbuyer_id())?>
									<?=$memberAll[$Buyer[$buye->getbuyer_id()]->getMember_id()]->getMei()?>
										<?=$memberAll[$ExhibitList[$BuyerAll[$buye->getbuyer_id()]->getExhibit_id()]->getMember()]->getSei()?>
										<?=$memberAll[$ExhibitList[$buye->getbuyer_id()]->getMember()]->getMei()?>さんが出品した
										<?=$Buyer[$buye->getbuyer_id()]->getProduct_name()?>を購入しました
									</dt>
									<dd><?=$Time?></dd>
									<?php } ?>
								</dl>
							<?php } ?>
							</div>
					</div>
			  </div>
        </div>
		</div>
		</div>
		<div id="top"><a href="exhibit_start.php"><p>商品の<br />出品は<br />こちら</p></a></div>
	</div>
	<footer>Copyright©FREE VEGETABLES ONLINE SITE , inc.AllRightsReserved.</footer>
</body>
</html>