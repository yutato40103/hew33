<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/Conf.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/entity/exhibit.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/dao/ExhibitDAO.class.php');
     $text=$_POST['request'];
     $id=$_POST['val'];
     $member=$_POST['member'];
    $today = date("Y-m-d H:i:s"); 
  try{
	$db = new PDO(DB_DNS,DB_USERNAME,DB_PASSWORD);
	$ExhibitDAO = new ExhibitDAO($db);
	$exhibitcoment = $ExhibitDAO->coment_insert($id,$text,$member,$today);

    //$comentList = $ExhibitDAO->t_coment_a(24);
	}
    catch(PDOException $ex){
    $_SESSION["errorMsg"] = "DB接続に失敗しました";
    }
    finally {
        $db = null;
    }
    header("Content-Type: application/json");
    
    echo json_encode($exhibitcoment);
?>
