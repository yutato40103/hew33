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

	class Good{
		/**
		* 主キーid
		*/
		private $member_id;

		private $exhibit_id;
				
		private	$good_flg;
		
		public function getMember_id(){
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

		public function getGood_flg() {
			return $this->good_flg;
		}
		public function setGood_flg($good_flg) {
			$this->good_flg = $good_flg;
		}
		
	}

?>