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

	class Bigcategory {
		/**
		* 主キーid
		*/
		private $bigcategory_id;
				
		private $bigcategoryname;
	
		//以下アクセサメソッド
		public function getBigcategory_id() {
			return $this->bigcategory_id;
		}
		public function setBigcategory_id($bigcategory_id) {
			$this->bigcategory_id = $bigcategory_id;
		}
		public function getBigcategoryname() {
			return $this->bigcategoryname;
		}
		public function setBigcategoryname($bigcategoryname) {
			$this->bigcategoryname = $bigcategoryname;
		}
	}
?>