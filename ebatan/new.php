<?php
define("NONE_TITLE", "<p>タイトルがありません</p>");
define("OVER_TITLE", "<p>タイトルは64文字以内で入力してください。</p>");
define("NONE_BODY", "<p>本文がありません</p>");

//デバッグ用
error_reporting(E_ALL);
ini_set( 'display_errors', 1 );

session_start();

$error_msg = "";

//初回の判定
if(empty($_COOKIE["PHPSESSID"])){
	$_SESSION['error_message']['title']['none'] = '';
	$_SESSION['error_message']['title']['over'] = '';
	$_SESSION['error_message']['body']['none'] = '';
}
//new_kakunin.phpでエラーがあったかの処理
if(isset( $_SESSION['error_message']['title']['none']) &&  $_SESSION['error_message']['title']['none'] == 1){
	$error_msg .= NONE_TITLE;
}
if(isset($_SESSION['error_message']['title']['over'] ) && $_SESSION['error_message']['title']['over']  == 1){
	$error_msg .= OVER_TITLE;
}
if(isset($_SESSION['error_message']['body']['none']) &&  $_SESSION['error_message']['body']['none'] == 1){
	$error_msg .= NONE_BODY;
}


$_SESSION['error_message']['title']['none'] = '';
$_SESSION['error_message']['title']['over']  = '';
$_SESSION['error_message']['body']['none'] = '';

?>

<html>
<head>
<title>新規投稿</title>
<link href="./style.css" rel="stylesheet" type="text/css">
</head>
<body>
<form action="new_kakunin.php" method="post">
<p>
<span class = "error"><?php echo($error_msg); ?></span>
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
