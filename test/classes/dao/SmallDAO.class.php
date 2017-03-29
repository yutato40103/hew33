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
class SmallDAO {
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
		$sql = "SELECT * FROM m_smallcategory ORDER BY smallcategory_id";
		$stmt = $this->db->prepare($sql);
		$result = $stmt->execute();
		$small = null;
		$small_List = array();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$smallid = $row["smallcategory_id"];
		$smallname = $row["category_name"];

		$small = new Small();
		$small->setSmallid($smallid);
		$small->setSmallname($smallname);
		$small_List[$smallid] = $small;
	}
		return $small_List;
	}

	public function small_rankings($category_name) {
		$sql = "SELECT count(*),s.smallcategory_id,s.category_name,s.image FROM t_exhibit e INNER JOIN t_buyer b on e.exhibit_id = b.exhibit_id INNER JOIN m_smallcategory s on e.smallcategory_id = s.smallcategory_id INNER JOIN m_mediumcategory m ON s.mediumcategory_id = m.mediumcategory_id INNER JOIN m_bigcategory big ON m.bigcategory_id = big.bigcategory_id where big.category_name=:category_name group by s.smallcategory_id order by count(*) DESC Limit 5";
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(":category_name",$category_name, PDO::PARAM_STR);
		$result = $stmt->execute();
		$small = null;
		$small_List = array();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$count = $row["count(*)"];
		$smallid = $row["smallcategory_id"];
		$smallname = $row["category_name"];
		$smallimage = $row["image"];

		$small = new Small();
		$small->setCount($count);
		$small->setSmallid($smallid);
		$small->setSmallname($smallname);
		$small->setSmallimage($smallimage);
		$small_List[$smallid] = $small;
	}
		return $small_List;
	}

	public function season($seasonflg) {
		$sql = "SELECT smallcategory_id,category_name,image FROM  m_smallcategory where season=:season limit 6";
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(":season",$seasonflg,PDO::PARAM_INT);
		$result = $stmt->execute();
		$small = null;
		$season_List = array();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$smallid = $row["smallcategory_id"];
		$smallname = $row["category_name"];
		$smallimage = $row["image"];

		$small = new Small();
		$small->setSmallid($smallid);
		$small->setSmallname($smallname);
		$small->setSmallimage($smallimage);
		$season_List[$smallid] = $small;
	}
		return $season_List;
	}

	
	public function findByPK($smallcategory_id) {
		$sql = "SELECT * FROM m_smallcategory where smallcategory_id=:smallcategory_id";
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(":smallcategory_id",$smallcategory_id, PDO::PARAM_INT);
		$result = $stmt->execute();
		$small = null;
		$small_List = array();
		if ($result && $row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$smallid = $row["smallcategory_id"];
		$smallname = $row["category_name"];

		$small = new Small();
		$small->setSmallid($smallid);
		$small->setSmallname($smallname);
	}
		return $small;
	}

	public function findByPK_m($mediumcategory_id) {
		$sql = "SELECT * FROM m_smallcategory where mediumcategory_id=:mediumcategory_id";
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(":mediumcategory_id",$mediumcategory_id, PDO::PARAM_INT);
		$result = $stmt->execute();
		$small = null;
		$small_List = array();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$smallid = $row["smallcategory_id"];
		$smallname = $row["category_name"];
		$small_List[$smallid] = $smallname;
	}
		return $small_List;
	}

	public function findlist($bigcategory_id) {
		$sql = "SELECT s.smallcategory_id,s.category_name,s.image FROM m_smallcategory s INNER JOIN m_mediumcategory m ON s.mediumcategory_id= m.mediumcategory_id INNER JOIN m_bigcategory big ON m.bigcategory_id = big.bigcategory_id where m.bigcategory_id=:bigcategory_id";
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(":bigcategory_id",$bigcategory_id, PDO::PARAM_INT);
		$result = $stmt->execute();
		$small = null;
		$small_List = array();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$smallid = $row["smallcategory_id"];
		$smallname = $row["category_name"];
		$smallimage = $row["image"];
		
		$small = new Small();
		$small->setSmallid($smallid);
		$small->setSmallname($smallname);
		$small->setSmallimage($smallimage);
		$small_List[$smallid] = $small;
	}
		return $small_List;
	}

}

?>