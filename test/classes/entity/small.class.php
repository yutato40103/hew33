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

	class Small {
		/**
		* 主キーid
		*/
		private $smallid;
				
		private $smallname;
		/**
		* パスワード
		*/
		private $smallimage;

		private $count_num;
		

		//以下アクセサメソッド
		public function getSmallid() {
			return $this->smallid;
		}
		public function setSmallid($smallid) {
			$this->smallid = $smallid;
		}
		public function getSmallname() {
			return $this->smallname;
		}
		public function setSmallname($smallname) {
			$this->smallname = $smallname;
		}
		public function getSmallimage() {
			return $this->smallimage;
		}
		public function setSmallimage($smallimage) {
			$this->smallimage = $smallimage;
		}
		public function getCount() {
			return $this->count_num;
		}
		public function setCount($count_num) {
			$this->count_num = $count_num;
		}
	}
?>