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

	class Mediumcategory {
		/**
		* 主キーid
		*/
		private $mediumcategory_id;
				
		private $mediumcategoryname;
	
		//以下アクセサメソッド
		public function getMediumcategory_id() {
			return $this->mediumcategory_id;
		}
		public function setMediumcategory_id($mediumcategory_id) {
			$this->mediumcategory_id = $mediumcategory_id;
		}
		public function getMediumcategoryname() {
			return $this->mediumcategory;
		}
		public function setMediumcategory($mediumcategory) {
			$this->mediumcategory = $mediumcategory;
		}
	}
?>