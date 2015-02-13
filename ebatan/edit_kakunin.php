<?php

session_start();

//変数の初期化
$title = '';
$body = '';

$id = $_GET['id'];
//入力された内容が正しいかの判定処理。駄目だったらnew.phpに戻す
if($_POST['title'] === ''){
	$_SESSION['error_message']['title']['none'] = 1;
} elseif(mb_strlen($_POST['title']) >= 64){
	$_SESSION['error_message']['title']['over']  = 1;
}
if($_POST['body'] === ''){
	 $_SESSION['error_message']['body']['none'] = 1;
}
$title = $_POST['title'];
$body = $_POST['body'];
require('view/edit_kakunin.php');

//上の判定処理に一個でも引っかかったら入力した値をクッキーにセットしてedit.phpにリダイレクトする処理
if(!empty($_SESSION['error_message']['title']['none']) || !empty($_SESSION['error_message']['title']['over']) || !empty($_SESSION['error_message']['body']['none'])){
	header('Location: http://54.92.3.142/ebatan/edit.php?id='.$id);
}

$_SESSION['title'] = $title;
$_SESSION['body'] = $body;

?>
