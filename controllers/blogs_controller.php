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
		}
	}
?>