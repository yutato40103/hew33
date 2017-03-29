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

	class Start{
		/**
		* 主キーid
		*/
		private $buyer_id;
				
		private $member_id;

		private $exhibit_id;

		private $product_name;

		private $images;
		
		//以下アクセサメソッド

		public function getBuyer_id() {
			return $this->buyer_id;
		}
		public function setBuyer_id($buyer_id) {
			$this->buyer_id = $buyer_id;
		}
		public function getMember_id() {
			return $this->member_id;
		}
		public function setMember_id($member_id) {
			$this->member_id = $member_id;
		}
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
		public function getImages() {
			return $this->images;
		}
		public function setImages($images) {
			$this->images = $images;
		}
		public function getRemarks() {
			return $this->remarks;
		}
		public function setRemarks($remarks) {
			$this->remarks = $remarks;
		}
	}

?>