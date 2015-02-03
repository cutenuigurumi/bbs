<?php
define("NONE_TITLE", "タイトルがありません");
define("OVER_TITLE", "タイトルは64文字以内で入力してください。");
define("NONE_BODY", "本文がありません");

//デバッグ用
error_reporting(E_ALL);
ini_set( 'display_errors', 1 );

session_start();

//初回の判定
if(empty($_COOKIE["PHPSESSID"])){
	$_SESSION['e_title_none'] = '';
	$_SESSION['e_title_over'] = '';
	$_SESSION['e_body_none'] = '';
}
//new_kakunin.phpでエラーがあったかの処理
if($_SESSION['e_title_none'] == 1){
	print(NONE_TITLE);
}
if($_SESSION['e_title_over'] == 1){
	print(OVER_TITLE);
}
if($_SESSION['e_body_none'] == 1){
	print(NONE_BODY);
}


?>

<html>
<head>
<title>新規投稿</title>
</head>
<body>
<form action="new_kakunin.php" method="post">
<p>
件名：<input type="text" name="title">
</p>
<p>
本文：<textarea name="body" rows="4" cols="40">ここに本文</textarea>
</p>
<p>
<input type="submit" value="送信">
</p>
</form>

</body>
</html>
