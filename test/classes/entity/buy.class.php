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

	class Buy{
		/**
		* 主キーid
		*/
		private $buyer_id;
				
		private $member_id;

		private $exhibit_id;

		private $buyer_flg;

		private $payment;

		private $divide;

		private $time;
		
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
		public function getBuyer_flg() {
			return $this->buyer_flg;
		}
		public function setBuyer_flg($buyer_flg) {
			$this->buyer_flg = $buyer_flg;
		}
		public function getPayment() {
			return $this->payment;
		}
		public function setPayment($payment) {
			$this->payment = $payment;
		}

		public function getDivide() {
			return $this->divide;
		}
		public function setDivide($divide) {
			$this->divide = $divide;
		}
		public function getTime() {
			return $this->time;
		}
		public function setTime($time) {
			$this->time = $time;
		}
	}

?>