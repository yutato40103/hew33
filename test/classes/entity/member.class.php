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

	class Member{
		/**
		* 主キーid
		*/
		private $memberid;
				
		private $sei;
		
		private $mei;
		
		private $seikana;

		private $meikana;

		private $mail;

		private $password;

		private $year;

		private $month;

		private $day;

		private $address;

		private $belief;

		private $image;

		private $farm;

		private $description;

		//以下アクセサメソッド
		public function getMemberid() {
			return $this->memberid;
		}
		public function setMemberid($memberid) {
			$this->memberid = $memberid;
		}
		public function getSei(){
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
		public function getSeikana(){
			return $this->seikana;
		}
		public function setSeikana($seikana) {
			$this->seikana = $seikana;
		}
		public function getMeikana() {
			return $this->meikana;
		}
		public function setMeikana($meikana) {
			$this->meikana = $meikana;
		}
		public function getMail() {
			return $this->mail;
		}
		public function setMail($mail) {
			$this->mail = $mail;
		}
		public function getPassword() {
			return $this->password;
		}
		public function setPassword($password) {
			$this->password = $password;
		}
		public function getSex() {
			return $this->sex;
		}
		public function setSex($sex) {
			$this->sex = $sex;
		}
		public function getYear() {
			return $this->year;
		}
		public function setYear($year) {
			$this->year = $year;
		}
		public function getMonth() {
			return $this->month;
		}
		public function setMonth($month) {
			$this->month = $month;
		}
		public function getDay() {
			return $this->day;
		}
		public function setDay($day) {
			$this->day = $day;
		}
		public function getAddress() {
			return $this->address;
		}
		public function setAddress($address) {
			$this->address = $address;
		}
		public function getImage() {
			return $this->image;
		}
		public function setImage($image) {
			$this->image = $image;
		}
		public function getBelief() {
			return $this->belief;
		}
		public function setBelief($belief) {
			$this->belief = $belief;
		}
		public function getFarm() {
			return $this->farm;
		}
		public function setFarm($farm) {
			$this->farm = $farm;
		}
		public function getDescription() {
			return $this->description;
		}
		public function setDescription($description) {
			$this->description = $description;
		}
	}

?>