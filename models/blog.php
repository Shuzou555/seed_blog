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
	}
?>