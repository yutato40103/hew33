<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/Conf.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/dao/SmallDAO.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/entity/small.class.php');
  //直接のページ遷移を阻止
/*$request = isset($_SERVER['HTTP_X_REQUESTED_WITH']) ? strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) : '';
  if($request !== 'xmlhttprequest') exit;*/
  //DBへの接続
  //本来は db_connect関数 を作成して、DRYにした方が良いです。
  if (isset($_POST['example2'])){
  try {
    $db = new PDO(DB_DNS,DB_USERNAME,DB_PASSWORD);
    $example2 = $_POST["example2"];
    $SmallDAO = new SmallDAO($db);
    $smallJoinList = $SmallDAO->findByPK_m($example2);
  }
  catch (Exception $e) {
    exit('データベース接続失敗'.$e->getMessage());
  }
  finally {
        $db = null;
  }
  //Ajaxで渡ってきた値をもとに modelテーブル から該当する model を抽出

 
header("Content-Type: application/json");
  //json形式で index.php へバックする
  echo json_encode($smallJoinList);
  }
else
{
     var_dump($_POST["maker_val"]);;

}
 ?>