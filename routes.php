<?php

	// 1.GETパラメータ取得
	// explode関数:第二引数の文字列を、第一引数の文字列で分割し、配列で返す関数
	$params = explode('/', $_GET['url']);

	// 2.パラメータの分解
	$resource = $params[0];
	$action =  $params[1];
	$id = 0;
	$post = array(); //←配列として受け取る

	// idがあった場合は、idも取得する
	if (isset($params[2])) {
		$id = $params[2];
	}

	// フォームのデータ($_POST)を受け取る
	if (isset($_POST) && !empty($_POST)) {
		$post = $_POST;
	}

	// 3.コントローラの呼び出し(requireされた時点で別ページでも$---が使えるようになる)
	require('controllers/'.$resource.'_controller.php');

?>