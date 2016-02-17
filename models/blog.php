<?php 

	class Blog {


		//プロパティに設定
		private $dbconnect = '';

		//NEWされる時最初にいるのは？ →コンストラクタ
		public function __construct(){
			// DB接続ファイルの読み込み
			require('dbconnect.php');
			// DB接続設定の値を代入
			$this->dbconnect = $db;
		}

		public function index() {
			// DB接続用意 ↓ MYSQLから引っ張ってくる
			// $sql = 'SELECT * FROM `blogs` WHERE `delete_flag` = 0';
			$sql = 'SELECT * FROM `blogs` WHERE `delete_flag` = 0';
			$results = mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));


			// 連想配列で順番にでてきたのを格納する変数
			$rtn = array();
			while ($result = mysqli_fetch_assoc($results)) {
				//今回表示したいのが、タイトルと日付とid
				$rtn [] = $result;


			}
			// 取得結果を返す
				return $rtn;
		}

		public function show($id){
			echo 'モデルのshowメソッドが呼び出されました';
			echo $id;
		}

	}

 ?>