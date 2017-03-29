<?php
	/**
	*WP32 PHPサンプル１２　マスターテーブル管理完版
	*共通関数記述ファイル
	*
	*@author Shinzo Saito <architshin@websarva.com>
	*@version 1.0
	*@copyright Sarva
	*
	*ファイル名＝Functions.php
	*ディレクトリ＝/wp32/scottadminkan/classes
	*/

	/**
	* ユーザエンティティクラス。
	*/

	class Exhibit{
		/**
		* 主キーid
		*/
		private $exhibit_id;
				
		private $product_name;
	
		private $smallcategory_id;

		private $flg;

		private $remarks;

		private $num;

		private $image;

		private $line;

		private $new;

		private $price;

		private $count;

		private $smallcategory_name;

		private $mediumcategory_name;

		private $bigcategory_name;

		private $member;

		private $day;

		private $coment_name;

		private $buyer_id;
		
		//以下アクセサメソッド
		public function getExhibit_id() {
			return $this->exhibit_id;
		}
		public function setExhibit_id($exhibit_id) {
			$this->exhibit_id = $exhibit_id;
		}
		public function getProduct_name() {
			return $this->product_name;
		}
		public function setProduct_name($product_name) {
			$this->product_name = $product_name;
		}
		public function getSmallcategory_id(){
			return $this->smallcategory_id;
		}
		public function setSmallcategory_id($smallcategory_id) {
			$this->smallcategory_id = $smallcategory_id;
		}
		public function getFlg(){
			return $this->flg;
		}
		public function setFlg($flg) {
			$this->flg = $flg;
		}
		public function getRemarks(){
			return $this->remarks;
		}
		public function setRemarks($remarks) {
			$this->remarks = $remarks;
		}
		public function getNew() {
			return $this->new;
		}
		public function setNew($new) {
			$this->new = $new;
		}
		public function getPrice() {
			return $this->price;
		}
		public function setPrice($price) {
			$this->price = $price;
		}	
		public function getNum() {
			return $this->num;
		}
		public function setNum($num) {
			$this->num = $num;
		}
		public function getImage() {
			return $this->image;
		}
		public function setImage($image) {
			$this->image = $image;
		}
		public function getLine() {
			return $this->line;
		}
		public function setLine($line) {
			$this->line = $line;
		}
		public function getCount() {
			return $this->count;
		}
		public function setCount($count) {
			$this->count = $count;
		}
		public function getSmallcategory_name() {
			return $this->smallcategory_name;
		}
		public function setSmallcategory_name($smallcategory_name) {
			$this->smallcategory_name = $smallcategory_name;
		}
		public function getMediumcategory_name() {
			return $this->mediumcategory_name;
		}
		public function setMediumcategory_name($mediumcategory_name) {
			$this->mediumcategory_name = $mediumcategory_name;
		}
		public function getBigcategory_name() {
			return $this->bigcategory_name;
		}
		public function setBigcategory_name($bigcategory_name) {
			$this->bigcategory_name = $bigcategory_name;
		}
		public function getPrefectures_name() {
			return $this->prefectures_name;
		}
		public function setPrefectures_name($prefectures_name) {
			$this->prefectures_name = $prefectures_name;
		}
		public function getComent_name() {
			return $this->coment_name;
		}
		public function setComent_name($coment_name) {
			$this->coment_name = $coment_name;
		}
		public function getMember() {
			return $this->member;
		}
		public function setMember($member) {
			$this->member = $member;
		}
		public function getDay() {
			return $this->day;
		}
		public function setDay($day) {
			$this->day = $day;
		}
		public function getBuy_id() {
			return $this->buy_id;
		}
		public function setBuy_id($buy_id) {
			$this->buy_id = $buy_id;
		}
	}

?>