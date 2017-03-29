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
class ExhibitDAO {
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
	

	public function exhibit() {
		$sql = "SELECT * FROM t_exhibit e INNER JOIN t_exhibit_image i ON e.exhibit_id = i.exhibit_id Where e.flg = 0 AND i.line=1 ORDER by e.day";
		$stmt = $this->db->prepare($sql);
		$result = $stmt->execute();
		$small = null;
		$exhibit_List = array();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$exhibitid = $row["exhibit_id"];
		$product_name = $row["product_name"];
		$smallcategory_id = $row["smallcategory_id"];
		$flg = $row["flg"];
		$remarks = $row["remarks"];
		$new = $row["new"];
		$price = $row["price"];
		$image = $row["image"];

		$exhibit = new Exhibit();
		$exhibit->setExhibit_id($exhibitid);
		$exhibit->setProduct_name($product_name);
		$exhibit->setSmallcategory_id($smallcategory_id);
		$exhibit->setFlg($flg);
		$exhibit->setRemarks($remarks);
		$exhibit->setFlg($flg);
		$exhibit->setNew($new);
		$exhibit->setPrice($price);
		$exhibit->setImage($image);
		$exhibit_List[$image] = $exhibit;
	}
		return $exhibit_List;
	}
	public function exhibit_limit($offset,$linesPerPage) {
		$sql = "SELECT * FROM t_exhibit e INNER JOIN t_exhibit_image i ON e.exhibit_id = i.exhibit_id Where e.flg = 0 AND i.line=1 ORDER by e.day LIMIT :limit OFFSET :offset";
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(":limit",$linesPerPage,PDo::PARAM_INT);
		$stmt->bindValue(":offset",$offset,PDo::PARAM_INT);
		$result = $stmt->execute();
		$small = null;
		$exhibit_List = array();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$exhibitid = $row["exhibit_id"];
		$product_name = $row["product_name"];
		$smallcategory_id = $row["smallcategory_id"];
		$flg = $row["flg"];
		$remarks = $row["remarks"];
		$new = $row["new"];
		$price = $row["price"];
		$image = $row["image"];

		$exhibit = new Exhibit();
		$exhibit->setExhibit_id($exhibitid);
		$exhibit->setProduct_name($product_name);
		$exhibit->setSmallcategory_id($smallcategory_id);
		$exhibit->setFlg($flg);
		$exhibit->setRemarks($remarks);
		$exhibit->setFlg($flg);
		$exhibit->setNew($new);
		$exhibit->setPrice($price);
		$exhibit->setImage($image);
		$exhibit_List[$image] = $exhibit;
	}
		return $exhibit_List;
	}

	public function exhibitId($id,$offset,$linesPerPage) {
		$sql = "SELECT e.exhibit_id,product_name,e.smallcategory_id,flg,remarks,new,price,i.image FROM t_exhibit e INNER JOIN t_exhibit_image i ON e.exhibit_id = i.exhibit_id INNER JOIN m_smallcategory m ON e.smallcategory_id = m.smallcategory_id Where e.flg = 0 AND i.line=1 AND e.smallcategory_id =:smallcategory_id ORDER by e.day LIMIT :limit OFFSET :offset";
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(":limit",$linesPerPage,PDo::PARAM_INT);
		$stmt->bindValue(":offset",$offset,PDo::PARAM_INT);
		$stmt->bindValue(":smallcategory_id",$id, PDO::PARAM_INT);
		$result = $stmt->execute();
		$small = null;
		$exhibit_List = array();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$exhibitid = $row["exhibit_id"];
		$product_name = $row["product_name"];
		$smallcategory_id = $row["smallcategory_id"];
		$flg = $row["flg"];
		$remarks = $row["remarks"];
		$new = $row["new"];
		$price = $row["price"];
		$image = $row["image"];

		$exhibit = new Exhibit();
		$exhibit->setExhibit_id($exhibitid);
		$exhibit->setProduct_name($product_name);
		$exhibit->setSmallcategory_id($smallcategory_id);
		$exhibit->setFlg($flg);
		$exhibit->setRemarks($remarks);
		$exhibit->setFlg($flg);
		$exhibit->setNew($new);
		$exhibit->setPrice($price);
		$exhibit->setImage($image);
		$exhibit_List[$image] = $exhibit;
	}
		return $exhibit_List;
	}

	public function exhibit_key($key,$order) {/*sさくせいまだ*/
		$sql = "SELECT * FROM t_exhibit e INNER JOIN t_exhibit_image i ON e.exhibit_id = i.exhibit_id Where e.flg = 0 AND i.line=1 ORDER by e.$key $order LIMIT :limit OFFSET :offset";
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(":limit",$linesPerPage,PDo::PARAM_INT);
		$stmt->bindValue(":offset",$offset,PDo::PARAM_INT);
		$result = $stmt->execute();
		$small = null;
		$season_List = array();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$exhibitid = $row["exhibit_id"];
		$product_name = $row["product_name"];
		$smallcategory_id = $row["smallcategory_id"];
		$flg = $row["flg"];
		$remarks = $row["remarks"];
		$new = $row["new"];
		$price = $row["price"];
		$image = $row["image"];

		$exhibit = new Exhibit();
		$exhibit->setExhibit_id($exhibitid);
		$exhibit->setProduct_name($product_name);
		$exhibit->setSmallcategory_id($smallcategory_id);
		$exhibit->setFlg($flg);
		$exhibit->setRemarks($remarks);
		$exhibit->setFlg($flg);
		$exhibit->setNew($new);
		$exhibit->setPrice($price);
		$exhibit->setImage($image);
		$exhibit_List[$image] = $exhibit;
	}
		return $exhibit_List;
	}
	public function exhibitId_key($key,$order,$id,$offset,$linesPerPage) {
		$sql = "SELECT e.exhibit_id,product_name,e.smallcategory_id,flg,remarks,new,price,i.image FROM t_exhibit e INNER JOIN t_exhibit_image i ON e.exhibit_id = i.exhibit_id INNER JOIN m_smallcategory m ON e.smallcategory_id = m.smallcategory_id Where i.line=1 AND e.smallcategory_id =:smallcategory_id AND e.flg = 0 ORDER by e.$key $order LIMIT :limit OFFSET :offset";
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(":limit",$linesPerPage,PDo::PARAM_INT);
		$stmt->bindValue(":offset",$offset,PDo::PARAM_INT);
		$stmt->bindValue(":smallcategory_id",$id, PDO::PARAM_INT);
		$result = $stmt->execute();
		$small = null;
		$exhibit_List = array();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$exhibitid = $row["exhibit_id"];
		$product_name = $row["product_name"];
		$smallcategory_id = $row["smallcategory_id"];
		$flg = $row["flg"];
		$remarks = $row["remarks"];
		$new = $row["new"];
		$price = $row["price"];
		$image = $row["image"];

		$exhibit = new Exhibit();
		$exhibit->setExhibit_id($exhibitid);
		$exhibit->setProduct_name($product_name);
		$exhibit->setSmallcategory_id($smallcategory_id);
		$exhibit->setFlg($flg);
		$exhibit->setRemarks($remarks);
		$exhibit->setFlg($flg);
		$exhibit->setNew($new);
		$exhibit->setPrice($price);
		$exhibit->setImage($image);
		$exhibit_List[$image] = $exhibit;
	}
		return $exhibit_List;
	}
	public function exhibit_keyword($keywords,$offset,$linesPerPage) {
	$sql = "SELECT e.exhibit_id,product_name,e.smallcategory_id,flg,remarks,new,price,i.image  FROM t_exhibit e INNER JOIN t_exhibit_image i ON e.exhibit_id = i.exhibit_id INNER JOIN m_smallcategory s ON e.smallcategory_id = s.smallcategory_id INNER JOIN m_mediumcategory m ON s.mediumcategory_id = m.mediumcategory_id INNER JOIN m_bigcategory big ON m.bigcategory_id = big.bigcategory_id 
		Where i.line=1 AND e.remarks LIKE :remarks AND e.flg = 0 or i.line=1 AND product_name LIKE :product_name AND e.flg = 0 or i.line=1 AND s.category_name LIKE :s_keywords AND e.flg = 0 or i.line=1 AND m.category_name LIKE :m_keywords or i.line=1 AND big.category_name LIKE :big_keywords AND e.flg = 0 LIMIT :limit OFFSET :offset";
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(":limit",$linesPerPage,PDo::PARAM_INT);
		$stmt->bindValue(":offset",$offset,PDo::PARAM_INT);
		$stmt->bindValue(":remarks","%".$keywords."%",PDO::PARAM_STR);
		$stmt->bindValue(":product_name","%".$keywords."%",PDO::PARAM_STR);
		$stmt->bindValue(":s_keywords","%".$keywords."%",PDO::PARAM_STR);
		$stmt->bindValue(":m_keywords","%".$keywords."%",PDO::PARAM_STR);
		$stmt->bindValue(":big_keywords","%".$keywords."%",PDO::PARAM_STR);

		$result = $stmt->execute();
		$small = null;
		$exhibit_List = array();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$exhibitid = $row["exhibit_id"];
		$product_name = $row["product_name"];
		$smallcategory_id = $row["smallcategory_id"];
		$flg = $row["flg"];
		$remarks = $row["remarks"];
		$new = $row["new"];
		$price = $row["price"];
		$image = $row["image"];

		$exhibit = new Exhibit();
		$exhibit->setExhibit_id($exhibitid);
		$exhibit->setProduct_name($product_name);
		$exhibit->setSmallcategory_id($smallcategory_id);
		$exhibit->setFlg($flg);
		$exhibit->setRemarks($remarks);
		$exhibit->setFlg($flg);
		$exhibit->setNew($new);
		$exhibit->setPrice($price);
		$exhibit->setImage($image);
		$exhibit_List[$image] = $exhibit;
	}
		return $exhibit_List;
	}

	public function exhibitId_keyword($keywords,$key,$order,$offset,$linesPerPage) {
		$sql = "SELECT e.exhibit_id,product_name,e.smallcategory_id,flg,remarks,new,price,i.image  FROM t_exhibit e INNER JOIN t_exhibit_image i ON e.exhibit_id = i.exhibit_id INNER JOIN m_smallcategory s ON e.smallcategory_id = s.smallcategory_id INNER JOIN m_mediumcategory m ON s.mediumcategory_id = m.mediumcategory_id INNER JOIN m_bigcategory big ON m.bigcategory_id = big.bigcategory_id 
		    Where i.line=1 AND e.remarks LIKE :remarks AND e.flg = 0 or i.line=1 AND product_name LIKE :product_name AND e.flg = 0 or i.line=1 AND s.category_name LIKE :s_keywords AND e.flg = 0 or i.line=1 AND m.category_name LIKE :m_keywords or i.line=1 AND big.category_name LIKE :big_keywords AND e.flg = 0  ORDER by e.$key $order LIMIT :limit OFFSET :offset";
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(":limit",$linesPerPage,PDo::PARAM_INT);
		$stmt->bindValue(":offset",$offset,PDo::PARAM_INT);
		$stmt->bindValue(":remarks","%".$keywords."%",PDO::PARAM_STR);
		$stmt->bindValue(":product_name","%".$keywords."%",PDO::PARAM_STR);
		$stmt->bindValue(":s_keywords","%".$keywords."%",PDO::PARAM_STR);
		$stmt->bindValue(":m_keywords","%".$keywords."%",PDO::PARAM_STR);
		$stmt->bindValue(":big_keywords","%".$keywords."%",PDO::PARAM_STR);
		$result = $stmt->execute();
		$small = null;
		$exhibit_List = array();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$exhibitid = $row["exhibit_id"];
		$product_name = $row["product_name"];
		$smallcategory_id = $row["smallcategory_id"];
		$flg = $row["flg"];
		$remarks = $row["remarks"];
		$new = $row["new"];
		$price = $row["price"];
		$image = $row["image"];

		$exhibit = new Exhibit();
		$exhibit->setExhibit_id($exhibitid);
		$exhibit->setProduct_name($product_name);
		$exhibit->setSmallcategory_id($smallcategory_id);
		$exhibit->setFlg($flg);
		$exhibit->setRemarks($remarks);
		$exhibit->setFlg($flg);
		$exhibit->setNew($new);
		$exhibit->setPrice($price);
		$exhibit->setImage($image);
		$exhibit_List[$image] = $exhibit;
	}
		return $exhibit_List;
	}


	public function exhibitcount() {
		$sql = "SELECT count(*) FROM t_exhibit e INNER JOIN t_exhibit_image i ON e.exhibit_id = i.exhibit_id Where i.line=1 AND e.flg = 0 ORDER by e.day";
		$stmt = $this->db->prepare($sql);
		$result = $stmt->execute();
		$small = null;
		$exhibit_List = array();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$count = $row["count(*)"];
		$exhibit = new Exhibit();
		$exhibit->setCount($count);
		$exhibit_List[1] = $exhibit;
	}
		return $exhibit_List;
	}
	public function exhibitIdcount($id,$offset,$linesPerPage) {
		$sql = "SELECT count(*) FROM t_exhibit e INNER JOIN t_exhibit_image i ON e.exhibit_id = i.exhibit_id INNER JOIN m_smallcategory m ON e.smallcategory_id = m.smallcategory_id Where e.flg = 0 AND i.line=1 AND e.smallcategory_id =:smallcategory_id ORDER by e.day LIMIT :limit OFFSET :offset";
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(":limit",$linesPerPage,PDO::PARAM_INT);
		$stmt->bindValue(":offset",$offset,PDO::PARAM_INT);
		$stmt->bindValue(":smallcategory_id",$id, PDO::PARAM_INT);
		$result = $stmt->execute();
		$small = null;
		$exhibit_List = array();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$count = $row["count(*)"];
		$exhibit = new Exhibit();
		$exhibit->setCount($count);
		$exhibit_List[1] = $exhibit;
	}
		return $exhibit_List;
	}

	public function exhibitId_keycount($key,$order,$id,$offset,$linesPerPage) {
		$sql = "SELECT count(*) FROM t_exhibit e INNER JOIN t_exhibit_image i ON e.exhibit_id = i.exhibit_id INNER JOIN m_smallcategory m ON e.smallcategory_id = m.smallcategory_id Where i.line=1 AND e.smallcategory_id =:smallcategory_id AND e.flg = 0  ORDER by e.$key $order LIMIT :limit OFFSET :offset";
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(":limit",$linesPerPage,PDO::PARAM_INT);
		$stmt->bindValue(":offset",$offset,PDO::PARAM_INT);
		$stmt->bindValue(":smallcategory_id",$id, PDO::PARAM_INT);
		$result = $stmt->execute();
		$small = null;
		$exhibit_List = array();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$count = $row["count(*)"];
		$exhibit = new Exhibit();
		$exhibit->setCount($count);
		$exhibit_List[1] = $exhibit;
	}
		return $exhibit_List;
	}

	public function exhibitId_keywordcount($keywords,$key,$order,$offset,$linesPerPage) {
		$sql = "SELECT count(*) FROM t_exhibit e INNER JOIN t_exhibit_image i ON e.exhibit_id = i.exhibit_id INNER JOIN m_smallcategory s ON e.smallcategory_id = s.smallcategory_id INNER JOIN m_mediumcategory m ON s.mediumcategory_id = m.mediumcategory_id INNER JOIN m_bigcategory big ON m.bigcategory_id = big.bigcategory_id 
		    Where i.line=1 AND e.remarks LIKE :remarks AND e.flg = 0 or
		          i.line=1 AND product_name LIKE :product_name AND e.flg = 0 or 
		          i.line=1 AND s.category_name LIKE :s_keywords AND e.flg = 0 or 
		          i.line=1 AND m.category_name LIKE :m_keywords AND e.flg = 0 or 
		          i.line=1 AND big.category_name LIKE :big_keywords AND e.flg = 0 ORDER by e.$key $order LIMIT :limit OFFSET :offset";
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(":limit",$linesPerPage,PDo::PARAM_INT);
		$stmt->bindValue(":offset",$offset,PDo::PARAM_INT);
		$stmt->bindValue(":remarks","%".$keywords."%",PDO::PARAM_STR);
		$stmt->bindValue(":product_name","%".$keywords."%",PDO::PARAM_STR);
		$stmt->bindValue(":s_keywords","%".$keywords."%",PDO::PARAM_STR);
		$stmt->bindValue(":m_keywords","%".$keywords."%",PDO::PARAM_STR);
		$stmt->bindValue(":big_keywords","%".$keywords."%",PDO::PARAM_STR);
		$result = $stmt->execute();
		$small = null;
		$exhibit_List = array();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$count = $row["count(*)"];
		$exhibit = new Exhibit();
		$exhibit->setCount($count);
		$exhibit_List[1] = $exhibit;
	}
		return $exhibit_List;
	}

	public function exhibit_keywordcount($keywords,$offset,$linesPerPage) {
		$sql = "SELECT count(*) FROM t_exhibit e INNER JOIN t_exhibit_image i ON e.exhibit_id = i.exhibit_id INNER JOIN m_smallcategory s ON e.smallcategory_id = s.smallcategory_id INNER JOIN m_mediumcategory m ON s.mediumcategory_id = m.mediumcategory_id INNER JOIN m_bigcategory big ON m.bigcategory_id = big.bigcategory_id 
		    Where i.line=1 AND e.remarks LIKE :remarks AND e.flg = 0 or
		          i.line=1 AND product_name LIKE :product_name AND e.flg = 0 or 
		          i.line=1 AND s.category_name LIKE :s_keywords AND e.flg = 0 or 
		          i.line=1 AND m.category_name LIKE :m_keywords AND e.flg = 0 or 
		          i.line=1 AND big.category_name LIKE :big_keywords AND e.flg = 0 LIMIT :limit OFFSET :offset";
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(":limit",$linesPerPage,PDO::PARAM_INT);
		$stmt->bindValue(":offset",$offset,PDO::PARAM_INT);
		$stmt->bindValue(":remarks","%".$keywords."%",PDO::PARAM_STR);
		$stmt->bindValue(":product_name","%".$keywords."%",PDO::PARAM_STR);
		$stmt->bindValue(":s_keywords","%".$keywords."%",PDO::PARAM_STR);
		$stmt->bindValue(":m_keywords","%".$keywords."%",PDO::PARAM_STR);
		$stmt->bindValue(":big_keywords","%".$keywords."%",PDO::PARAM_STR);
		$result = $stmt->execute();
		$small = null;
		$exhibit_List = array();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$count = $row["count(*)"];
		$exhibit = new Exhibit();
		$exhibit->setCount($count);
		$exhibit_List[1] = $exhibit;
	}
		return $exhibit_List;
	}

	public function Id_count($id) {
		$sql = "SELECT count(*) FROM t_exhibit e Where e.member_id =:member_id LIMIT :limit OFFSET :offset";
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(":limit",$linesPerPage,PDO::PARAM_INT);
		$stmt->bindValue(":offset",$offset,PDO::PARAM_INT);
		$stmt->bindValue(":member_id",$id, PDO::PARAM_INT);
		$result = $stmt->execute();
		$small = null;
		$exhibit_List = array();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$count = $row["count(*)"];
		$exhibit = new Exhibit();
		$exhibit->setCount($count);
		$exhibit_List[1] = $exhibit;
	}
		return $exhibit_List;
	}

	public function Exhibit_my($flg,$id) {
		$sql = "SELECT * FROM t_exhibit e INNER JOIN t_exhibit_image i ON e.exhibit_id= i.exhibit_id Where e.flg =:flg  AND e.member_id =:member_id AND line=:line ORDER BY e.exhibit_id DESC";
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(":flg",$flg, PDO::PARAM_INT);
		$stmt->bindValue(":member_id",$id, PDO::PARAM_INT);
		$stmt->bindValue(":line",1,PDO::PARAM_INT);
		$result = $stmt->execute();
		$small = null;
		$exhibit_List = array();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$exhibitid = $row["exhibit_id"];
		$product_name = $row["product_name"];
		$image = $row["image"];

		$exhibit = new Exhibit();
		$exhibit->setExhibit_id($exhibitid);
		$exhibit->setProduct_name($product_name);
		$exhibit->setImage($image);
		$exhibit_List[$exhibitid] = $exhibit;
	}
		return $exhibit_List;
	}

	public function Exhibit_myId($id) {
		$sql = "SELECT * FROM t_exhibit e INNER JOIN t_exhibit_image i ON e.exhibit_id= i.exhibit_id Where e.member_id =:member_id AND line=:line";
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(":member_id",$id, PDO::PARAM_INT);
		$stmt->bindValue(":line",1,PDO::PARAM_INT);
		$result = $stmt->execute();
		$small = null;
		$exhibit_List = array();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$exhibitid = $row["exhibit_id"];
		$product_name = $row["product_name"];
		$image = $row["image"];

		$exhibit = new Exhibit();
		$exhibit->setExhibit_id($exhibitid);
		$exhibit->setProduct_name($product_name);
		$exhibit->setImage($image);
		$exhibit_List[$exhibitid] = $exhibit;
	}
		return $exhibit_List;
	}

	public function Exhibit_kanri($flg) {
		$sql = "SELECT * FROM t_exhibit e INNER JOIN t_exhibit_image i ON e.exhibit_id= i.exhibit_id Where e.flg =:flg AND line=:line";
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(":flg",$flg, PDO::PARAM_INT);
		$stmt->bindValue(":line",1,PDO::PARAM_INT);
		$result = $stmt->execute();
		$small = null;
		$exhibit_List = array();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$exhibitid = $row["exhibit_id"];
		$product_name = $row["product_name"];
		$smallcategory_id = $row["smallcategory_id"];
		$flg = $row["flg"];
		$remarks = $row["remarks"];
		$new = $row["new"];
		$price = $row["price"];
		$member = $row["member_id"];
		$day = $row["day"];
		$prefectures_name = $row["prefectures_name"];

		$exhibit = new Exhibit();
		$exhibit->setExhibit_id($exhibitid);
		$exhibit->setProduct_name($product_name);
		$exhibit->setSmallcategory_id($smallcategory_id);
		$exhibit->setFlg($flg);
		$exhibit->setPrice($price);
		$exhibit->setMember($member);
		$exhibit->setDay($day);
		$exhibit->setPrefectures_name($prefectures_name);
		$exhibit_List[$exhibitid] = $exhibit;
	}
		return $exhibit_List;
	}

	public function Exhibit_kanri_d($flg) {
		$sql = "SELECT * FROM t_exhibit e INNER JOIN t_exhibit_image i ON e.exhibit_id= i.exhibit_id INNER JOIN t_buyer b ON e.exhibit_id= b.exhibit_id Where e.flg =:flg AND line=:line";
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(":flg",$flg, PDO::PARAM_INT);
		$stmt->bindValue(":line",1,PDO::PARAM_INT);
		$result = $stmt->execute();
		$small = null;
		$exhibit_List = array();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$exhibitid = $row["exhibit_id"];
		$product_name = $row["product_name"];
		$smallcategory_id = $row["smallcategory_id"];
		$flg = $row["flg"];
		$remarks = $row["remarks"];
		$new = $row["new"];
		$price = $row["price"];
		$member = $row["member_id"];
		$day = $row["day"];
		$prefectures_name = $row["prefectures_name"];

		$exhibit = new Exhibit();
		$exhibit->setExhibit_id($exhibitid);
		$exhibit->setProduct_name($product_name);
		$exhibit->setSmallcategory_id($smallcategory_id);
		$exhibit->setFlg($flg);
		$exhibit->setPrice($price);
		$exhibit->setMember($member);
		$exhibit->setDay($day);
		$exhibit->setPrefectures_name($prefectures_name);
		$exhibit_List[$exhibitid] = $exhibit;
	}
		return $exhibit_List;
	}


	public function exhibit_image() {
		$sql = "SELECT e.exhibit_id,product_name,remarks,image FROM t_exhibit e INNER JOIN t_exhibit_image i ON e.exhibit_id = i.exhibit_id Where i.line=1 AND e.flg=0 ORDER by e.exhibit_id DESC limit 4";
		$stmt = $this->db->prepare($sql);
		$result = $stmt->execute();
		$small = null;
		$season_List = array();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$exhibitid = $row["exhibit_id"];
		$product_name = $row["product_name"];
		$remarks = $row["remarks"];
		$image = $row["image"];

		$exhibit = new Exhibit();
		$exhibit->setExhibit_id($exhibitid);
		$exhibit->setProduct_name($product_name);
		$exhibit->setRemarks($remarks);
		$exhibit->setImage($image);
		$exhibit_List[$image] = $exhibit;
	}
		return $exhibit_List;
	}
	public function findMax(){
		$sql = "SELECT * FROM t_exhibit where exhibit_id=(select max(exhibit_id) from t_exhibit)";
		$stmt = $this->db->prepare($sql);
		$result = $stmt->execute();
		$reservationList = array();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$exhibit_id= $row["exhibit_id"];
		$exhibit =new Exhibit();
		$exhibit->setExhibit_id($exhibit_id);
		$exhibitList["1"] = $exhibit;
	}
	return $exhibitList;
	}
	public function insert($exhibit,$member,$today){
	$sqlInsert = "INSERT INTO `t_exhibit`(`product_name`, `smallcategory_id`, `flg`, `remarks`, `new`, `price`, `dispatch_id`, `prefectures_name`, `member_id`,day) VALUES (:product_name,:smallcategory_id,:flg,:remarks,:new,:price ,:dispatch_id,:prefectures_name,:member_id,:today)";
		$stmt = $this->db->prepare($sqlInsert);
			/*$stmt->bindValue(":exhibit_id",$exhibit->getExhibit_id(),PDO::PARAM_INT);*/
			$stmt->bindValue(":product_name",$exhibit->getProduct_name(),PDO::PARAM_STR);
			$stmt->bindValue(":smallcategory_id",$exhibit->getSmallcategory_id(),PDO::PARAM_INT);
			$stmt->bindValue(":flg",0,PDO::PARAM_INT);
			$stmt->bindValue(":remarks",$exhibit->getRemarks(),PDO::PARAM_STR);
			$stmt->bindValue(":new",$exhibit->getRemarks(),PDO::PARAM_STR);
			$stmt->bindValue(":price",$exhibit->getPrice(),PDO::PARAM_INT);
			$stmt->bindValue(":dispatch_id",1,PDO::PARAM_STR);
			$stmt->bindValue(":prefectures_name","大阪",PDO::PARAM_INT);
			$stmt->bindValue(":member_id",$member,PDO::PARAM_INT);
			$stmt->bindValue(":today",$today,PDO::PARAM_INT);
			$result = $stmt->execute();
			return $result;
	}
	public function insert_image($exhibit){
	$sqlInsert = "INSERT INTO t_exhibit_image(exhibit_id,image,line)VALUES (:exhibit_id,:image,:line)";
		$stmt = $this->db->prepare($sqlInsert);
			$stmt->bindValue(":exhibit_id",$exhibit->getExhibit_id(),PDO::PARAM_INT);
			$stmt->bindValue(":image",$exhibit->getImage(),PDO::PARAM_STR);
			$stmt->bindValue(":line",$exhibit->getLine(),PDO::PARAM_INT);
			$result = $stmt->execute();
			$id= 0;
			if($result){
			$id = $this->db->lastInsertId();
			}
			return $id;
	}
	public function updatePath($id,$phPathL){
		$sql = "UPDATE t_exhibit_image SET image = :image WHERE num = :num";
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(":image",$phPathL,PDO::PARAM_STR);
		$stmt->bindValue(":num",$id,PDO::PARAM_INT);
		$result = $stmt->execute();
		return $result;
	}
	public function t_exhibit_image($exhibit_id){/**/
			$sql = "SELECT num,e.exhibit_id,product_name,price,i.image,s.category_name smallcategory_name,m.category_name mediumcategory_name,big.category_name bigcategory_name,prefectures_name,remarks,member_id FROM  t_exhibit e INNER JOIN t_exhibit_image i ON e.exhibit_id = i.exhibit_id INNER JOIN m_smallcategory s on e.smallcategory_id = s.smallcategory_id INNER JOIN m_mediumcategory m ON s.mediumcategory_id = m.mediumcategory_id INNER JOIN m_bigcategory big ON m.bigcategory_id = big.bigcategory_id where e.exhibit_id =:exhibit_id";
			$stmt = $this->db->prepare($sql);
			$stmt->bindValue(":exhibit_id",$exhibit_id,PDO::PARAM_INT);
			$result = $stmt->execute();
			$reservationList = array();
			while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$num= $row["num"];
			$exhibit_id= $row["exhibit_id"];
			$product_name= $row["product_name"];
			$price= $row["price"];
			$image= $row["image"];
			$smallcategory_name= $row["smallcategory_name"];
			$mediumcategory_name= $row["mediumcategory_name"];
			$bigcategory_name= $row["bigcategory_name"];
			$prefectures_name= $row["prefectures_name"];
			$remarks= $row["remarks"];/*追加*/
			$member = $row["member_id"];
			$exhibit =new Exhibit();
			$exhibit->setNum($num);
			$exhibit->setExhibit_id($exhibit_id);
			$exhibit->setProduct_name($product_name);
			$exhibit->setPrice($price);
			$exhibit->setImage($image);
			$exhibit->setSmallcategory_name($smallcategory_name);
			$exhibit->setMediumcategory_name($mediumcategory_name);
			$exhibit->setBigcategory_name($bigcategory_name);
			$exhibit->setPrefectures_name($prefectures_name);
			$exhibit->setRemarks($remarks);
			$exhibit->setMember($member);
			$exhibitList[$num] = $exhibit;
		}
		return $exhibitList;
	}
	public function t_exhibit_image_n($exhibit_id){/**/
			$sql = "SELECT num,e.exhibit_id,product_name,price,i.image,s.category_name smallcategory_name,m.category_name mediumcategory_name,big.category_name bigcategory_name,prefectures_name,remarks,member_id FROM  t_exhibit e INNER JOIN t_exhibit_image i ON e.exhibit_id = i.exhibit_id INNER JOIN m_smallcategory s on e.smallcategory_id = s.smallcategory_id INNER JOIN m_mediumcategory m ON s.mediumcategory_id = m.mediumcategory_id INNER JOIN m_bigcategory big ON m.bigcategory_id = big.bigcategory_id where e.exhibit_id =:exhibit_id";
			$stmt = $this->db->prepare($sql);
			$stmt->bindValue(":exhibit_id",$exhibit_id,PDO::PARAM_INT);
			$result = $stmt->execute();
			$reservationList = array();
			while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$num= $row["num"];
			$exhibit_id= $row["exhibit_id"];
			$product_name= $row["product_name"];
			$price= $row["price"];
			$image= $row["image"];
			$smallcategory_name= $row["smallcategory_name"];
			$mediumcategory_name= $row["mediumcategory_name"];
			$bigcategory_name= $row["bigcategory_name"];
			$prefectures_name= $row["prefectures_name"];
			$remarks= $row["remarks"];/*追加*/
			$member = $row["member_id"];
			$exhibit =new Exhibit();
			$exhibit->setNum($num);
			$exhibit->setExhibit_id($exhibit_id);
			$exhibit->setProduct_name($product_name);
			$exhibit->setPrice($price);
			$exhibit->setImage($image);
			$exhibit->setSmallcategory_name($smallcategory_name);
			$exhibit->setMediumcategory_name($mediumcategory_name);
			$exhibit->setBigcategory_name($bigcategory_name);
			$exhibit->setPrefectures_name($prefectures_name);
			$exhibit->setRemarks($remarks);
			$exhibit->setMember($member);
			$exhibitList[1] = $exhibit;
		}
		return $exhibitList;
	}

	public function t_coment($exhibit_id){
			$sql = "SELECT sei,mei,num,time,e.exhibit_id,coment_name FROM t_exhibit e INNER JOIN t_coment c ON e.exhibit_id = c.exhibit_id INNER JOIN m_member m ON c.member_id = m.member_id where e.exhibit_id =:exhibit_id";
			$stmt = $this->db->prepare($sql);
			$stmt->bindValue(":exhibit_id",$exhibit_id,PDO::PARAM_INT);
			$result = $stmt->execute();
			$comentList = array();
			/*while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$num　= $row["num"];
			$exhibit_id　= $row["exhibit_id"];
			$coment_name　= $row["coment_name"];
			$exhibit =new Exhibit();
			$exhibit->setNum($num);
			$exhibit->setExhibit_id($exhibit_id);
			$exhibit->setComent_name($coment_name);
			$comentList[$num] = $exhibit;
		}*/
		$comentList = $stmt->fetchAll();
		return $comentList;
	}

	public function t_coment_a($id){
			$sql = "SELECT num,coment_name FROM t_exhibit e INNER JOIN t_coment c ON e.exhibit_id = c.exhibit_id INNER JOIN m_member m ON c.member_id = m.member_id where e.exhibit_id =:exhibit_id";
			$stmt = $this->db->prepare($sql);
			$stmt->bindValue(":exhibit_id",$id,PDO::PARAM_INT);
			$result = $stmt->execute();
			$comentList = array();
		// 	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		// 	$num　= $row["num"];
		// 	$coment_name　= $row["coment_name"];
		// 	$comentList[$num] = $coment_name;
		// }
		$comentList = $stmt->fetchAll();
		return $comentList;
	}



	public function coment_insert($id,$text,$member,$today){
		$sqlInsert = "INSERT INTO `t_coment`(`exhibit_id`, `coment_name`, `time`, `member_id`) VALUES (:exhibit_id,:coment_name,:time,:member_id)";
		$stmt = $this->db->prepare($sqlInsert);
			$stmt->bindValue(":exhibit_id",$id,PDO::PARAM_INT);
			$stmt->bindValue(":coment_name",$text,PDO::PARAM_STR);
			$stmt->bindValue(":time",$today,PDO::PARAM_STR);
			$stmt->bindValue(":member_id",$member,PDO::PARAM_INT);
			$result = $stmt->execute();
			return $result;
	}

	public function image($category){
		$sql = "SELECT * FROM t_exhibit_image where exhibit_id = :exhibit_id";
			$stmt = $this->db->prepare($sql);
			$stmt->bindValue(":exhibit_id",$category,PDO::PARAM_INT);
			$result = $stmt->execute();
			$int=1;
			while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				$image = $row["image"];
				$exhibit = new Exhibit();
				$exhibit->setImage($image);
				$exhibit_List[$int] = $exhibit;
				$int++;
			}
		return $exhibit_List;
	}
	public function upflg($exhibit_id){
		$sql = "UPDATE t_exhibit SET flg = :flg WHERE exhibit_id = :exhibit_id";
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(":exhibit_id",$exhibit_id,PDO::PARAM_INT);
		$stmt->bindValue(":flg",1,PDO::PARAM_INT);
		$result = $stmt->execute();
		return $result;
	}
}
?>