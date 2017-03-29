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

	class User {
		/**
		* 主キーid
		*/
		private $id;
				
		private $password;
		/**
		* パスワード
		*/
		private $nameLast;
		/**
		* 姓
		*/
		private $nameFirst;
		/**
		* 名
		*/
		private $mail;

		//以下アクセサメソッド
		public function getId() {
			return $this->id;
		}
		public function setId($id) {
			$this->id = $id;
		}
		public function getPassword() {
			return $this->password;
		}
		public function setPassword($password) {
			$this->password = $password;
		}
		public function getSei() {
			return $this->sei;
		}
		public function setSei($sei) {
			$this->sei = $sei;
		}
		public function getMei() {
			return $this->mei;
		}
		public function setMei($mei) {
			$this->mei = $mei;
		}
		public function getMail() {
			return $this->mail;
		}
		public function setMail($mail) {
			$this->mail = $mail;
		}
	}

?>