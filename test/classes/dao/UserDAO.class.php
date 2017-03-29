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
class UserDAO {
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
	public function findByLoginid($mail) {
		$sql = "SELECT * FROM m_member WHERE mail =:mail";
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(":mail",$mail, PDO::PARAM_INT);
		$result = $stmt->execute();
		$user = null;
		if ($result && $row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$id = $row["member_id"];
			$sei = $row["sei"];
			$mei = $row["mei"];

			$mail = $row["mail"];
			$password = $row["password"];
			

			$user = new User();
			$user->setId($id);
			$user->setSei($sei);
			$user->setMei($mei);
			$user->setPassword($password);
			$user->setMail($mail);
		}
		return $user;
	}
}

?>