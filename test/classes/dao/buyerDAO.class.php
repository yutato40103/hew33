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
class buyerDAO {
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

	public function buyAll(){
		$sql = "SELECT * FROM t_buyer";
		$stmt = $this->db->prepare($sql);
		$result = $stmt->execute();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$buyer_id = $row["buyer_id"];
		$exhibit_id = $row["exhibit_id"];
		$member_id = $row["member_id"];

		$start = new Start();
		$start->setBuyer_id($buyer_id);
		$start->setExhibit_id($exhibit_id);
		$start->setMember_id($member_id);
		$buy_List[$buyer_id] = $start;
		}
		return $buy_List;
	}

	public function buy($buyer_flg,$member_id) {
		$sql = "SELECT * FROM t_buyer b INNER JOIN t_exhibit e ON b.exhibit_id= e.exhibit_id INNER JOIN t_exhibit_image i ON e.exhibit_id= i.exhibit_id where b.member_id = :member_id AND buyer_flg = :buyer_flg AND line=:line ORDER BY b.buyer_id DESC";
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(":member_id",$member_id,PDO::PARAM_INT);
		$stmt->bindValue(":buyer_flg",$buyer_flg,PDO::PARAM_INT);
		$stmt->bindValue(":line",1,PDO::PARAM_INT);
		$result = $stmt->execute();
		$buy = null;
		$buyList = array();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$buyer_id = $row["buyer_id"];
		$product_name = $row["product_name"];
		$image = $row["image"];
		
		$start = new Start();
		$start->setBuyer_id($buyer_id);
		$start->setProduct_name($product_name);
		$start->setImages($image);
		$buy_List[$buyer_id] = $start;
	}
		return $buy_List;
	}

	public function buy_Notice() {
		$sql = "SELECT buyer_id,product_name,b.member_id FROM t_buyer b INNER JOIN t_exhibit e ON b.exhibit_id= e.exhibit_id  INNER JOIN t_exhibit_image i ON e.exhibit_id = i.exhibit_id  Where e.flg = 1 AND i.line=1 ORDER by e.day";
		$stmt = $this->db->prepare($sql);
		$result = $stmt->execute();
		$small = null;
		$exhibit_List = array();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$buyer_id = $row["buyer_id"];
		$product_name = $row["product_name"];
		$member_id = $row["member_id"];
		
		$start = new Start();
		$start->setBuyer_id($buyer_id);
		$start->setProduct_name($product_name);
		$start->setMember_id($member_id);
		$buy_List[$buyer_id] = $start;
	}
		return $buy_List;
	}
	
	public function things($member_id){
		$sql = "SELECT b.buyer_id,b.buyer_flg,b.divide,b.time FROM t_buyer b where b.member_id=:member_id1 
				UNION 
				SELECT e.exhibit_id,e.flg,e.divide,e.time FROM t_exhibit e where e.member_id=:member_id2 AND e.flg=1
				ORDER BY time DESC";
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(":member_id1",$member_id,PDO::PARAM_INT);
		$stmt->bindValue(":member_id2",$member_id,PDO::PARAM_INT);
		$result = $stmt->execute();
		$member_List = array();
		$i=1;
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$buyer_id = $row["buyer_id"];
			$buyer_flg = $row["buyer_flg"];
			$divide = $row["divide"];
			$time = $row["time"];
			
			$buy = new Buy();
			$buy->setBuyer_id($buyer_id);
			$buy->setBuyer_flg($buyer_flg);
			$buy->setDivide($divide);
			$buy->setTime($time);
			$buy_List[$i] = $buy;
			$i++;
		}
		return $buy_List;
	}

	public function insert($member,$category,$method,$date){
		$sqlInsert = "INSERT INTO `t_buyer`(member_id,exhibit_id,buyer_flg,payment,time) VALUES (:member_id,:exhibit_id,:buyer_flg,:payment,:time)";
		$stmt = $this->db->prepare($sqlInsert);
			$stmt->bindValue(":member_id",$member,PDO::PARAM_INT);
			$stmt->bindValue(":exhibit_id",$category,PDO::PARAM_INT);
			$stmt->bindValue(":buyer_flg",1,PDO::PARAM_INT);
			$stmt->bindValue(":payment",$method,PDO::PARAM_INT);
			$stmt->bindValue(":time",$date,PDO::PARAM_STR);
			$result = $stmt->execute();
			$id= 0;
			if($result){
				$id = $this->db->lastInsertId();
			}	
			return $id;
	}
}

?>