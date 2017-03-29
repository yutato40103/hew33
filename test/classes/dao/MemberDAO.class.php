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
class MemberDAO {
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


	public function find() {
		$sql = "SELECT * FROM m_member";
		$stmt = $this->db->prepare($sql);
		$result = $stmt->execute();
		$user = null;
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$id = $row["member_id"];
			$sei = $row["sei"];
			$mei = $row["mei"];
			$mail = $row["mail"];
			$password = $row["password"];
			
			$user = new User();
			$user->setId($id);
			$user->setSei($sei);
			$user->setSei($sei);
			$user->setMei($mei);
			$user->setPassword($password);
			$user->setMail($mail);
			$user_List[$id] = $user;
		}
		return $user_List;
	}


	public function findAll($mail) {
		$sql = "SELECT * FROM m_member WHERE mail =:mail";
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(":mail",$mail, PDO::PARAM_STR);
		$result = $stmt->execute();
		$user = null;
		if ($result && $row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$id = $row["member_id"];
			$sei = $row["sei"];
			$mei = $row["mei"];
			$mail = $row["mail"];
			$password = $row["password"];
			
			$user = new User();
			$user->setSei($sei);
			$user->setMei($mei);
			$user->setPassword($password);
			$user->setMail($mail);
		}
		return $user;
	}

	public function findLogin($member_id) {
		$sql = "SELECT * FROM m_member WHERE member_id =:member_id";
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(":member_id",$member_id, PDO::PARAM_STR);
		$result = $stmt->execute();
		$user = null;
		if ($result && $row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$id = $row["member_id"];
			$sei = $row["sei"];
			$mei = $row["mei"];
			$image = $row["image"];
			$address = $row["address"];
			$belief = $row["belief"];
			$farm = $row["farm"];
			$description = $row["description"];

			$member = new Member();
			$member->setMemberid($id);
			$member->setSei($sei);
			$member->setMei($mei);
			$member->setimage($image);
			$member->setAddress($address);
			$member->setBelief($belief);
			$member->setFarm($farm);
			$member->setDescription($description);
		}
		return $member;
	}




	public function insert($member){
	$sqlInsert = "INSERT INTO `m_member`(`sei`, `mei`, `seikana`, `meikana`, `mail`, `password`, `sex`, `year`, `month`, `day`, `address`, `belief`) VALUES (:sei,:mei,:seikana,:meikana,:mail,:password,:sex,:year,:month,:day,:address, :belief)";
		$stmt = $this->db->prepare($sqlInsert);
			$stmt->bindValue(":sei",$member->getSei(),PDO::PARAM_STR);
			$stmt->bindValue(":mei",$member->getMei(),PDO::PARAM_STR);
			$stmt->bindValue(":seikana",$member->getSeikana(),PDO::PARAM_STR);
			$stmt->bindValue(":meikana",$member->getMeikana(),PDO::PARAM_STR);
			$stmt->bindValue(":mail",$member->getMail(),PDO::PARAM_STR);
			$stmt->bindValue(":password",$member->getPassword(),PDO::PARAM_INT);
			$stmt->bindValue(":sex",$member->getSex(),PDO::PARAM_INT);
			$stmt->bindValue(":year",$member->getYear(),PDO::PARAM_INT);
			$stmt->bindValue(":month",$member->getMonth(),PDO::PARAM_INT);
			$stmt->bindValue(":day",$member->getDay(),PDO::PARAM_INT);
			$stmt->bindValue(":address",$member->getAddress(),PDO::PARAM_INT);
			$stmt->bindValue(":belief","",PDO::PARAM_STR);
			$result = $stmt->execute();
			return $result;
	}
	public function update_m($id,$phPathS){
	$sql = "UPDATE m_member SET image = :image WHERE member_id = :member_id";
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(":image",$phPathS,PDO::PARAM_INT);
		$stmt->bindValue(":member_id",$id,PDO::PARAM_INT);
		$result = $stmt->execute();
		return $result;
	}
}

?>