<?php
/**
 *WP32　PHPサンプル7 マスタテーブル管理DAO晩 src06/26
　*
 *
 *@autor Shinzo SAITO <architshin@websarva.com>
 *version 1.0
 *@copyright Sarva
 *
 *ファイル名=UserDAO.class.php
 *ディレクトリ=/wp32/scottadminkan/classes/dao
 */

/**
 *usersテーブルへのデータ操作クラス
 */
class MediumDAO {
	/**
	 * @var PDO DB接続オブジェクト
	 */
	private $db;

	/**
	 *コントストラクタ
	 *
	 *@param PDO $db PDO DB接続オブジェクト
	 */ 

	public function __construct(PDO $db){
			$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
			$this->db = $db;
	}
	
	public function findAll() {
		$sql = "SELECT * FROM m_mediumcategory ORDER BY mediumcategory_id";
		$stmt = $this->db->prepare($sql);
		$result = $stmt->execute();
		$mediumcategory = null;
		$mediumcategory_List = array();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$mediumcategoryid = $row["mediumcategory_id"];
		$mediumcategoryname = $row["category_name"];

		$Mediumcategory = new Mediumcategory();
		$Mediumcategory->setMediumcategory_id($mediumcategoryid);
		$Mediumcategory->setMediumcategory($mediumcategoryname);
		$Mediumcategory_List[$mediumcategoryid] = $Mediumcategory;
	}
		return $Mediumcategory_List;
	}
	public function findByPK_b($bigcategory_id) {
		$sql = "SELECT * FROM m_mediumcategory where bigcategory_id=:bigcategory_id";
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(":bigcategory_id",$bigcategory_id, PDO::PARAM_INT);
		$result = $stmt->execute();
		$small = null;
		$small_List = array();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$mediumcategoryid = $row["mediumcategory_id"];
		$mediumcategoryname = $row["category_name"];
		$medium_List[$mediumcategoryid] = $mediumcategoryname;
	}
		return $medium_List;
	}
}

?>