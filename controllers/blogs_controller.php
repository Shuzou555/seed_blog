<?php
	// echo'blogsコントローラーが呼ばれました<br>';
	//モデルを呼び出す
	require('models/blog.php');

	//コントローラーのクラスのインスタンス化
	$controller = new BlogsController();
	// $controller->index();

	//アクション名によって、呼び出すメソッドを変える
	switch ($action) {
		case 'index':
			 $controller->index();
			break;
		
		case 'add':
			$controller->add();
			break;

		case 'show':
			$controller->show($id);
			break;

		case 'create':
			
			$controller->create($_POST);

			break;

		case 'edit':
			
			$controller->edit();

			break;
		default:
			# code...
			break;
	}

	class BlogsController {
		
		function index(){
			// echo 'コントローラのindex()が呼び出されました！<br>';
			//モデルを呼び出す
			$blog = new Blog();

			$viewOptions = $blog->index();
			$action = 'index';
			// var_dump($viewOptions);
			require('views/layout/application.php');

		}

		function add(){
			// echo 'add()が呼び出されました。<br>';
			// $blog = new Blog();
			// $viewOptions = $blog->add();
			$action = 'add';
			// var_dump($viewOptions);
			require('views/layout/application.php');

		}

		function show($id){

			//モデルを呼び出す
			$blog = new Blog();

			//モデルのshowメソッドを実行する（モデルのshowメソッドは、select文を実行してidで指定したブログデータを取得する）
			//モデルのshowメソッドに$idを引数として渡す
     		//モデルのshowメソッドから返ってきた取得結果を、変数に格納
			$viewOptions = $blog->show($id);
			//$viewOptionsに使う文

						
			$action = 'show';
			
			require('views/layout/application.php');

		}

		function create($blog_data){
			// echo 'create()が呼び出されました。<br>';

			//モデルを呼び出す
			$blog = new Blog();
			
			//モデルのcreateメソッドを実行する（モデルのcreateメソッドは、insert文を実行してブログを保存する）
			$return = $blog->create($blog_data);

			header('Location: /seed_blog/blogs/index');


		}

		function edit(){
			//モデルを呼び出す
			$blog = new Blog();
			$action = 'edit';
			require('views/layout/application.php');
		}

	}
?>