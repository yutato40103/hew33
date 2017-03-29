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

	class Coment{

		private $num;
				
		private $exhibit_id;
	
		private $coment_name;

		//以下アクセサメソッド
		public function getNum() {
			return $this->num;
		}
		public function setNum($num) {
			$this->num = $num;
		}
		public function getExhibit_id() {
			return $this->exhibit_id;
		}
		public function setExhibit_id($exhibit_id) {
			$this->exhibit_id = $exhibit_id;
		}
		public function getComent_name() {
			return $this->coment_name;
		}
		public function setComent_name($coment_name) {
			$this->coment_name = $coment_name;
		}
	}

?>