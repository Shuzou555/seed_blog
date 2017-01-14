<?php
	// echo 'モデルblog.PHPが保存されました<br>';

	
	class Blog{

		//プロパティ(db接続オブジェクト)
		private $dbconnect = '';

		//コンストラクタ
		function __construct(){
			// DB接続ファイルを読み込む 
			// 「routes.php」がDB接続しているので、「routes.php」から見た処理をするので、../dbconnect.phpの「../ 」を不要にする
			require('dbconnect.php');
			//DB接続設定の値をプロパティに代入 DB接続が１回で済む
			$this->dbconnect = $db;
		}

		//一覧表示に必要なデータを取得
		function index(){
			// echo 'モデルのindex()が呼び出されました<br/>';

			//SQLの記述（SELECT文）
			//delete_flug = 0　のデータの格納
			$sql = 'SELECT * FROM `blogs` WHERE `delete_flag` = 0 ORDER BY `created` DESC';

			//SQLの実行
			$results = mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));


			//実行結果を取得し、配列に格納
			$rtn = array();
			while ($result = mysqli_fetch_assoc($results)){
				$rtn[] = $result;
			}

			//取得結果を返す
			return $rtn;
		}

		function add(){
			// echo 'モデルのindex()が呼び出されました<br/>';

			
		}

		function show($id){
			$sql = sprintf("SELECT * FROM `blogs` WHERE `delete_flag` = 0 AND `id` =%d",$id);
			//$sql = "SELECT * FROM `blogs` WHERE `delete_flag` = 0 AND `id` =$id"　上記と同じ効果

			//SQLの実行
			$results = mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));


			//実行結果を取得し、配列に格納
			
			$result = mysqli_fetch_assoc($results);

			//取得結果を返す
			return $result;
		}


			
		

		function create($blog_data){
			// Insert文の記述 ''シングルコーテーションを　””ダブルコーテーションに変えても良い
			$sql = sprintf("INSERT INTO `blogs`(`id`, `title`, `body`, `delete_flag`, `created`, `modified`) 
								VALUES (NULL,'%s','%s',0,now(),CURRENT_TIMESTAMP);",$blog_data['title'],$blog_data['body']);

			//SQL文の実行
			$results = mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));

			//実行結果を返す
			return $results;
		}


	}
?>