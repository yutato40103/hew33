<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/Conf.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/dao/MediumcategoryDAO.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/entity/mediumcategory.class.php');
  //直接のページ遷移を阻止
/*$request = isset($_SERVER['HTTP_X_REQUESTED_WITH']) ? strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) : '';
  if($request !== 'xmlhttprequest') exit;*/
  //DBへの接続
  //本来は db_connect関数 を作成して、DRYにした方が良いです。
  if (isset($_POST['example1'])){
  try {
    $db = new PDO(DB_DNS,DB_USERNAME,DB_PASSWORD);
    $example1 = $_POST["example1"];
    $MediumDAO = new MediumDAO($db);
    $mediumJoinList = $MediumDAO->findByPK_b($example1);
  }
  catch (Exception $e) {
    exit('データベース接続失敗'.$e->getMessage());
  }
  //Ajaxで渡ってきた値をもとに modelテーブル から該当する model を抽出

 
header("Content-Type: application/json");
  //json形式で index.php へバックする
  echo json_encode($mediumJoinList);
  }
else
{
     var_dump($_POST["maker_val"]);;

}
 ?>