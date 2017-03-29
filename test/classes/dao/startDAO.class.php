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
class StartDAO {
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

	/**
	 *ログインIDによる検索
	 *
	 *@param string $loginId ログインID 
	 *@return User 該当するUserオブジェクト。ただし該当データがない場合はnull
	 */
	public function start($flg) {
		$sql = "SELECT * FROM t_exhibit e INNER JOIN t_good g ON e.exhibit_id = g.exhibit_id INNER JOIN m_member m ON  m.member_id=g.member_id    INNER JOIN t_exhibit_image i ON e.exhibit_id=i.exhibit_id where good_flg=:good_flg AND Line=:line";
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(":good_flg",$flg,PDO::PARAM_INT);
		$stmt->bindValue(":line",1,PDO::PARAM_INT);
		$result = $stmt->execute();
		$buy = null;
		$buyList = array();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$member_id = $row["member_id"];	
		$exhibit_id = $row["exhibit_id"];
		$product_name = $row["product_name"];
		$remarks = $row["remarks"];
		$image = $row["image"];

		$start = new Start();
		$start->setMember_id($member_id);
		$start->setExhibit_id($exhibit_id);
		$start->setProduct_name($product_name);
		$start->setRemarks($remarks);
		$start->setImages($image);
		$start_List[$exhibit_id] = $start;
	}
		return $start_List;
	}

}

?>