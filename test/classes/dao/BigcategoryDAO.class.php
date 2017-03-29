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
class BigDAO {
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
		$sql = "SELECT * FROM m_bigcategory ORDER BY bigcategory_id";
		$stmt = $this->db->prepare($sql);
		$result = $stmt->execute();
		$bigcategory = null;
		$bigcategory_List = array();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$bigcategoryid = $row["bigcategory_id"];
		$bigcategoryname = $row["category_name"];
		$Bigcategory = new Bigcategory();
		$Bigcategory->setBigcategory_id($bigcategoryid);
		$Bigcategory->setBigcategoryname($bigcategoryname);
		$Bigcategory_List[$bigcategoryid] = $Bigcategory;
	}
		return $Bigcategory_List;
	}
}

?>