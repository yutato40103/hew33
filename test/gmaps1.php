
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
 "http://www.w3.org/TR/html4/loose.dtd">
<html><head>
<meta http-equiv="Content-Script-Type" content="text/javascript">
<meta http-equiv="Content-type" content="text/html; charset=UTF-8">
<title>WA GoogleMap</title>

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
#window1 dt{
	float: left;
}
#window1 dd{
	padding:5px;
}
#window2{
	overflow:hidden;
	clear:left;
}
#window2 dt{
	float: left;
}
#window2 dd{
	padding:5px;
}
#window3{
	overflow:hidden;
	clear:left;
}
#window3 dt{
	float: left;
}
#window3 dd{
	padding:5px;
}


#window4{
	overflow:hidden;
	clear:left;
}
#window4 dt{
	float: left;
}
#window4 dd{
	padding:5px;
}
.right{
	float: left;
}
#window5{
	overflow:hidden;
	clear:left;
}
#window5 dt{
	float: left;
}
#window5 dd{
	padding:5px;
}
#window6{
	overflow:hidden;
	clear:left;
}
#window6 dt{
	float: left;
}
#window6 dd{
	padding:5px;
}
#gmap2{
	overflow:hidden;
}
li{
	list-style:none
}
-->
</style>

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">

//①まずは表示してみる。
google.maps.event.addDomListener(window,"load",function(){
	//alert("Map")ジオコーディング
	// Object { hoge: "fuga" }
	//1)移動経路を初期設定する
	var Lat="34.699875";
	var Lng="135.493032";
	var Lat1="34.702485";
	var Lng1="135.495951";
	var LatLng = new google.maps.LatLng(Lat,Lng);
	var LatLng1 = new google.maps.LatLng(Lat1,Lng1);
	var LatSun="34.809527";
	var LngSun="135.532415";
	var LatLngSun = new google.maps.LatLng(LatSun,LngSun);
	var LatYasiti="34.711297";
	var LngYasiti="135.499721";
	var LatLngYasiti = new google.maps.LatLng(LatYasiti,LngYasiti);
	var LatNoudo="34.667141";
	var LngNoudo="135.510262";
	var LatLngNoudo = new google.maps.LatLng(LatNoudo,LngNoudo);
	var LatKonzikidou="39.001354";
	var LngKonzikidou="141.099858";
	var LatLngKonzikidou = new google.maps.LatLng(LatKonzikidou,LngKonzikidou);
	var LatNaha="26.217014";
	var LngNaha="127.719521";
	var LatLngNaha = new google.maps.LatLng(LatNaha,LngNaha);
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
			styles:[{"featureType":"administrative","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"landscape","elementType":"all","stylers":[{"visibility":"simplified"},{"hue":"#0066ff"},{"saturation":74},{"lightness":100}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"off"},{"weight":0.6},{"saturation":-85},{"lightness":61}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"visibility":"on"}]},{"featureType":"road.arterial","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road.local","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"water","elementType":"all","stylers":[{"visibility":"simplified"},{"color":"#5f94ff"},{"lightness":26},{"gamma":5.86}]}]
	};
	/*上部コピーした*/
	var mapObj = new google.maps.Map(map,options);

	//②マーカーを表示する

	//マーカーを画像にする
	//1)画像の登録・設定
	var markerImage = new google.maps.MarkerImage(
		//画像のＵＲＬ
		"images/gmap_marker.png",
		//画像のサイズ
		new google.maps.Size(45,60),
		//画像の基準位置
		new google.maps.Point(0,0),
		//画像の中心
		new google.maps.Point(22,60)
	);
	var markerImage1 = new google.maps.MarkerImage(
		//画像のＵＲＬ
		"images/icon6.png",
		//画像のサイズ
		new google.maps.Size(64,64),
		//画像の基準位置
		new google.maps.Point(0,0),
		//画像の中心
		new google.maps.Point(32,64)
	);

	var markerImage2 = new google.maps.MarkerImage(
		//画像のＵＲＬ
		"images/icon1.png",
		//画像のサイズ
		new google.maps.Size(64,64),
		//画像の基準位置
		new google.maps.Point(0,0),
		//画像の中心
		new google.maps.Point(20,64)
	);
	var markerImage3 = new google.maps.MarkerImage(
		//画像のＵＲＬ
		"images/icon2.png",
		//画像のサイズ
		new google.maps.Size(64,64),
		//画像の基準位置
		new google.maps.Point(0,0),
		//画像の中心
		new google.maps.Point(20,64)
	);
	var markerImage4 = new google.maps.MarkerImage(
		//画像のＵＲＬ
		"images/icon3.png",
		//画像のサイズ
		new google.maps.Size(64,64),
		//画像の基準位置
		new google.maps.Point(0,0),
		//画像の中心
		new google.maps.Point(20,64)
	);
	var markerImage5 = new google.maps.MarkerImage(
		//画像のＵＲＬ
		"images/icon4.png",
		//画像のサイズ
		new google.maps.Size(64,64),
		//画像の基準位置
		new google.maps.Point(0,0),
		//画像の中心
		new google.maps.Point(32,64)
	);
	var markerImage6 = new google.maps.MarkerImage(
		//画像のＵＲＬ
		"images/icon5.png",
		//画像のサイズ
		new google.maps.Size(64,64),
		//画像の基準位置
		new google.maps.Point(0,0),
		//画像の中心
		new google.maps.Point(32,64)
	);
	
	//2)画像マーカーを表示する
	var markerObj = new google.maps.Marker({
		position:LatLng,
		map:mapObj,
		icon:markerImage,
		title:"HAL大阪"
	});
	var markerObj1 = new google.maps.Marker({
		position:LatLng1,
		map:mapObj,
		title:"大阪駅",
		icon:markerImage1,
		visible:false
	});
	
	var markerObj2 = new google.maps.Marker({
		position:LatLngSun,
		map:mapObj,
		title:"太陽の塔",
		icon:markerImage2,
		visible:false
	}); 
	var markerObj3 = new google.maps.Marker({
		position:LatLngYasiti,
		map:mapObj,
		title:"弥七",
		icon:markerImage3,
		visible:false
	});
	var markerObj4 = new google.maps.Marker({
		position:LatLngNoudo,
		map:mapObj,
		title:"濃度８",
		icon:markerImage4,
		visible:false
	});
	var markerObj5 = new google.maps.Marker({
		position:LatLngKonzikidou,
		map:mapObj,
		title:"中尊寺金色堂",
		icon:markerImage5,
		visible:false
	});
	var markerObj6 = new google.maps.Marker({
		position:LatLngNaha,
		map:mapObj,
		title:"首里城",
		icon:markerImage6,
		visible:false
	});


	//③マーカーにクリックイベントを設定する

	google.maps.event.addListener(markerObj,"click",function(){

		var html = "<dl id='window'><dt>HAL大阪</dt><dd><img src='images/campus.png' align='left'></dd><dd>HAL大阪はゲーム・アニメ・デザイン・ITなどの専門学校。</dd><dd><a href='http://www.hal.ac.jp/osaka/' target='blank'>HAL大阪へgo</a></dd></dl>";
		//infoWindowを作成
		var infoWindow = new google.maps.InfoWindow();
		infoWindow.setContent(html);
		infoWindow.open(mapObj,markerObj);
	});
	google.maps.event.addListener(markerObj1,"click",function(){

		var html = "<dl id='window1'><dt><img src='images/images.jpg' align='left' width='100'></dt><div class=right><dd>大阪駅</dd><dd class='red'>★★★★★4.0</dd><dd><a href='http://osakastationcity.com/' target='blank'>大阪駅へgo</a></dd></dl>";
		//infoWindowを作成
		var infoWindow = new google.maps.InfoWindow();
		infoWindow.setContent(html);
		infoWindow.open(mapObj,markerObj1);
	});
	google.maps.event.addListener(markerObj2,"click",function(){

		var htmlsun = "<dl id='window2'><dt><img src='images/sun.jpg' align='left' width='100'></dt><div class=right><dd>太陽の塔</dd><dd class='red'>★★★★★4.6</dd><dd><a href='http://www.expo70-park.jp/cause/expo/tower-of-sun/' target='blank'>太陽の塔へgo</a></dd></div></dl>";
		
		//infoWindowを作成
		var infoWindow = new google.maps.InfoWindow();
		infoWindow.setContent(htmlsun);
		infoWindow.open(mapObj,markerObj2);
	});
	google.maps.event.addListener(markerObj3,"click",function(){
		var htmlyasiti = "<dl id='window3'><dt><img src='images/Yasiti.jpg' align='left' width='100'></dt><div class=right><dd>ラーメン弥七</dd><dd class='red'>★★★★☆3.82</dd><dd><a href='http://tabelog.com/osaka/A2701/A270101/27003232/' target='blank'>弥七go</a></dd></div></dl>";
		
		//infoWindowを作成
		var infoWindow = new google.maps.InfoWindow();
		infoWindow.setContent(htmlyasiti);
		infoWindow.open(mapObj,markerObj3);
	});
	google.maps.event.addListener(markerObj4,"click",function(){
		var htmlnoudo = "<dl id='window4'><dt><img src='images/noudo.jpg' align='left' width='100'></dt><div class=right><dd>濃度８</dd><dd class='red'>★★★★☆3.52</dd><dd><a href='http://tabelog.com/osaka/A2701/A270202/27075464/' target='blank'>濃度８へgo</a></dd></div></dl>";
		
		//infoWindowを作成
		var infoWindow = new google.maps.InfoWindow();
		infoWindow.setContent(htmlnoudo);
		infoWindow.open(mapObj,markerObj4);
	});
	google.maps.event.addListener(markerObj5,"click",function(){
	
		var htmlkonzikido = "<dl id='window5'><dt><img src='images/konziki.jpg' align='left' width='100'></dt><div class=right><dd>中尊寺金色堂</dd><dd class='red'>★★★★☆4.3</dd><dd><a href='http://www.chusonji.or.jp/guide/precincts/konjikido.html' target='blank'>中尊寺金色堂へgo</a></dd></div></dl>";
		
		//infoWindowを作成
		var infoWindow = new google.maps.InfoWindow();
		infoWindow.setContent(htmlkonzikido);
		infoWindow.open(mapObj,markerObj5);
	});
	google.maps.event.addListener(markerObj6,"click",function(){
		var htmlnaha = "<dl id='window6'><dt><img src='images/syuri.jpg' align='left' width='100'></dt><div class=right><dd>首里城</dd><dd class='red'>★★★★☆4.3</dd><dd><a href='http://oki-park.jp/shurijo/' target='blank'>首里城へgo</a></dd></div></dl>";
		
		//infoWindowを作成
		var infoWindow = new google.maps.InfoWindow();
		infoWindow.setContent(htmlnaha);
		infoWindow.open(mapObj,markerObj6);
	});

	
	//④map外の要素からの制御（DOM構造からイベントをとる）
	var halOsaka_btn = document.getElementById("halosaka_btn");
	google.maps.event.addDomListener(halOsaka_btn,"click",function(){
		mapObj.panTo(LatLng);
	});	
	var osakaSt_btn = document.getElementById("osakast_btn");
	google.maps.event.addDomListener(osakaSt_btn,"click",function(){
		mapObj.panTo(LatLng1);
		markerObj1.setOptions({visible:true});
		
		//⑤経路を表示する
		var directionsRenderer = new google.maps.DirectionsRenderer();
		//表示されるルートのオプション設定
		directionsRenderer.setOptions({
			suppressMarkers:true,
			polylineOptions:{strokeColor:"red",strokeWeight:2,strokeOpacity:0.9}/*動く？*/
		});
		directionsRenderer.setMap(mapObj);
		directionsRenderer.setPanel(document.getElementById('gmap2'));/*overflow:auto*/
		var request = {
			origin:LatLng,
			destination:LatLng1,
			travelMode:google.maps.DirectionsTravelMode.DRIVING
		};
		var directionsService = new google.maps.DirectionsService();

		directionsService.route(request,function(result,status){
			if(status == google.maps.DirectionsStatus.OK){
				directionsRenderer.setDirections(result);
			}/*動かない*/
		});
	});
		/*太陽の塔*/
		var osakaSun_btn = document.getElementById("osakasun_btn");
		google.maps.event.addDomListener(osakaSun_btn,"click",function(){
		mapObj.panTo(LatLngSun);
		markerObj2.setOptions({visible:true});
		
		//⑤経路を表示する
		var directionsRenderer = new google.maps.DirectionsRenderer();
		//表示されるルートのオプション設定
		directionsRenderer.setOptions({
			suppressMarkers:true,
			polylineOptions:{strokeColor:"red",strokeWeight:2,strokeOpacity:0.9}/*動く？*/
		});
		directionsRenderer.setMap(mapObj);
		directionsRenderer.setPanel(document.getElementById('gmap2'));/*overflow:auto*/
		var request = {
			origin:LatLng,
			destination:LatLngSun,
			travelMode:google.maps.DirectionsTravelMode.DRIVING
		};
		var directionsService = new google.maps.DirectionsService();
		directionsService.route(request,function(result,status){
			if(status == google.maps.DirectionsStatus.OK){
				directionsRenderer.setDirections(result);
			}
		});
	});
	/*弥七*/
		var osakaYasiti_btn = document.getElementById("osakayasiti_btn");
		google.maps.event.addDomListener(osakaYasiti_btn,"click",function(){
		mapObj.panTo(LatLngYasiti);
		markerObj3.setOptions({visible:true});
		//⑤経路を表示する
		var directionsRenderer = new google.maps.DirectionsRenderer();
		//表示されるルートのオプション設定
		directionsRenderer.setOptions({
			suppressMarkers:true,
			polylineOptions:{strokeColor:"red",strokeWeight:2,strokeOpacity:0.9}/*動く？*/
		});
		directionsRenderer.setMap(mapObj);
		directionsRenderer.setPanel(document.getElementById('gmap2'));/*overflow:auto*/
		var request = {
			origin:LatLng,
			destination:LatLngYasiti,
			travelMode:google.maps.DirectionsTravelMode.DRIVING
		};
		var directionsService = new google.maps.DirectionsService();
		directionsService.route(request,function(result,status){
			if(status == google.maps.DirectionsStatus.OK){
				directionsRenderer.setDirections(result);
			}
		});
	});
		/*濃度８*/
		var osakaYasiti_btn = document.getElementById("osakanoudo_btn");
		google.maps.event.addDomListener(osakaYasiti_btn,"click",function(){
		mapObj.panTo(LatLngNoudo);
		markerObj4.setOptions({visible:true});
		//⑤経路を表示する
		var directionsRenderer = new google.maps.DirectionsRenderer();
		//表示されるルートのオプション設定
		directionsRenderer.setOptions({
			suppressMarkers:true,
			polylineOptions:{strokeColor:"red",strokeWeight:2,strokeOpacity:0.9}/*動く？*/
		});
		directionsRenderer.setMap(mapObj);
		directionsRenderer.setPanel(document.getElementById('gmap2'));/*overflow:auto*/
		var request = {
			origin:LatLng,
			destination:LatLngNoudo,
			travelMode:google.maps.DirectionsTravelMode.DRIVING
		};
		var directionsService = new google.maps.DirectionsService();
		directionsService.route(request,function(result,status){
			if(status == google.maps.DirectionsStatus.OK){
				directionsRenderer.setDirections(result);
			}
		});
	});
	/*中尊寺金色堂*/
		var Konzikidou_btn = document.getElementById("konzikidou_btn");
		google.maps.event.addDomListener(Konzikidou_btn ,"click",function(){
		mapObj.panTo(LatLngYasiti);
		markerObj5.setOptions({visible:true});
		//⑤経路を表示する
		var directionsRenderer = new google.maps.DirectionsRenderer();
		//表示されるルートのオプション設定
		directionsRenderer.setOptions({
			suppressMarkers:true,
			polylineOptions:{strokeColor:"red",strokeWeight:2,strokeOpacity:0.9}/*動く？*/
		});
		directionsRenderer.setMap(mapObj);
		directionsRenderer.setPanel(document.getElementById('gmap2'));/*overflow:auto*/
		var request = {
			origin:LatLng,
			destination:LatLngKonzikidou,
			travelMode:google.maps.DirectionsTravelMode.DRIVING
		};
		var directionsService = new google.maps.DirectionsService();
		directionsService.route(request,function(result,status){
			if(status == google.maps.DirectionsStatus.OK){
				directionsRenderer.setDirections(result);
			}
		});
	});
/*首里城*/
		var naha_btn = document.getElementById("naha_btn");
		google.maps.event.addDomListener(naha_btn ,"click",function(){
		mapObj.panTo(LatLngNaha);
		markerObj6.setOptions({visible:true});
		//⑤経路を表示する
		var directionsRenderer = new google.maps.DirectionsRenderer();
		//表示されるルートのオプション設定
		directionsRenderer.setOptions({
			suppressMarkers:true,
			polylineOptions:{strokeColor:"red",strokeWeight:2,strokeOpacity:0.9}/*動く？*/
		});
		directionsRenderer.setMap(mapObj);
		directionsRenderer.setPanel(document.getElementById('gmap2'));/*overflow:auto*/
		var request = {
			origin:LatLng,
			destination:LatLngNaha,
			travelMode:google.maps.DirectionsTravelMode.DRIVING
		};
		var directionsService = new google.maps.DirectionsService();
		directionsService.route(request,function(result,status){
			if(status == google.maps.DirectionsStatus.OK){
				directionsRenderer.setDirections(result);
			}
		});
	});
});



</script>  

</head>

<body>

<!-- googleMapを表示する -->
<div id="gmap" style="width : 400px; height : 400px; float:left;"></div>
<div id="gmap2" style="width : 400px; height : 400px; float:left;"></div>
<ul>
    <li><a href="#" id="halosaka_btn">HAL大阪</a></li>
    <li><a href="#" id="osakast_btn">大阪駅</a></li>
    <li><a href="#" id="osakasun_btn">太陽の塔</a></li>
    <li><a href="#" id="osakayasiti_btn">ラーメン弥七</a></li>
    <li><a href="#" id="osakanoudo_btn">濃度８</a></li>
    <li><a href="#" id="konzikidou_btn">中尊寺金色堂</a></li>
    <li><a href="#" id="naha_btn">那覇</a></li>
</ul>
</body>
</html>



