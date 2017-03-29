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
class goodDAO {
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
	public function good_insert($good){
		$sql = "INSERT INTO `t_good`(`member_id`, `exhibit_id`, `good_flg`) VALUES(:member_id,:exhibit_id,:good_flg)";
			$stmt = $this->db->prepare($sql);
			$stmt->bindValue(":member_id",$good->getMember_id(),PDO::PARAM_INT);
			$stmt->bindValue(":exhibit_id",$good->getExhibit_id(),PDO::PARAM_INT);
			$stmt->bindValue(":good_flg",0,PDO::PARAM_INT);
			$result = $stmt->execute();
		}
}

?>