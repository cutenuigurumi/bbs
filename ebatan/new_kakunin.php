<?php

session_start();

//入力された内容が正しいかの判定処理。駄目だったらnew.phpに戻す
if($_POST['title'] == ''){
	$_SESSION['error_message']['title']['none'] = 1;
} elseif(mb_strlen($_POST['title']) >= 64){
	$_SESSION['error_message']['title']['over']  = 1;
}
if($_POST['body'] == ''){
	 $_SESSION['error_message']['body']['none'] = 1;
}

$title = $_POST['title'];
$body = $_POST['body'];
$html = '';

if(isset($_SESSION['error_message']['title']['none']) && isset( $_SESSION['error_message']['title']['over']) && isset( $_SESSION['error_message']['body']['none'])){
	setcookie("title", $title);
	setcookie("body", $body);
	header('Location: http://54.92.3.142/ebatan/new.php');
}

$html.=<<<EOD

<html>
<head>
<title>新規投稿</title>
</head>
<body>
<form action="new_insert.php" method="post">
<p>
<input type="hidden" name="title" value="{$title}">
件名：{$title}
</p>
<p>
<textarea name="body" style="display:none;" rows="4" cols="40">{$body}</textarea>
本文：{$body}
</p>
<input type="submit" value="送信">
</form>
</body>
</html>
EOD;
print($html);
?>
