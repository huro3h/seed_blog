<?php 
	
	// modelの中身を呼び出すよ！
	require('models/blog.php');

	// コントローラのクラスをインスタンス化
	$controller = new BlogsController();
	

	// アクション名によって、呼び出すメソッドを変える
	// $action（グローバル変数）は、routes.phpで定義されているもの
	switch ($action) {
		case 'index':
			$controller->index();
			break;

		default:
			
			break;

	}


	class BlogsController {
		public function index(){
			// ここでモデルを呼び出す
			$blog = new Blog();
			$blog->index();
		}
	}

 ?>