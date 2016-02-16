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

		// プロパティ用意（クラスの中なので外から受け渡すことができない、自分で...$this）
		// アクセス修飾子を忘れないこと！(private or public)
		private $action = '';
		private $resource = '';


		public function index(){
			// ここでモデルを呼び出す（モデルの名前はindex）
			$blog = new Blog();
			$blog->index();

			// アクション名を設定する
			$this->action ='index';

			// ビューを呼び出すよ！
			// require()でindexを同じように呼び出すよ！
			
			// ここでapp〜を呼び出す app〜に書いてある中身が使えるようになる）
			require ('views/layout/application.php');
			//require ('views/blogs/index.php');
		}
	}

 ?>