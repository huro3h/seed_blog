<?php

	// 1.GETパラメータ取得
	// explode関数:第二引数の文字列を、第一引数の文字列で分割し、配列で返す関数
	$params = explode('/', $_GET['url']);
	var_dump($params);

	// 2.パラメータの分解
	$resource = $params[0];
	$action =  $params[1];
	$id = 0;

	// idがあった場合は、idも取得する
	if (isset($params[2])) {
		$id = $params[2];
	}

	// 3.コントローラの呼び出し
	require('controllers/'.$resouce.'_controller.php');

?>