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
			
			$sql = 'SELECT * FROM `blogs` WHERE `id` ='. $id;
			$results = mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));

			// 連想配列で順番にでてきたのを格納する変数
			// 今回取ってくるのは１件だけなのでwhile文で回す必要なし
			$result = mysqli_fetch_assoc($results);
			// 取得結果を返す
			return $result;
		}
		
		public function create($post){
			
			//$sql = 'INSERT INTO `blogs`(`title`, `body`, `delete_flag`, `created`) VALUES ("hoge","honbun",0,now())'
			$sql = sprintf('INSERT INTO `blogs`(`title`, `body`, `delete_flag`, `created`) VALUES ("%s","%s",0,now())',
			mysqli_real_escape_string($this->dbconnect, $post['title']),
			mysqli_real_escape_string($this->dbconnect, $post['body'])
			// add.php参照
			);
			mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));
			// var_dump($sql);
			// return値はいらない
		}

		public function edit($id){
			
			$sql = 'SELECT * FROM `blogs` WHERE `id` ='. $id;
			$results = mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));
			$result = mysqli_fetch_assoc($results);
			return $result;
		}

	}


 ?>