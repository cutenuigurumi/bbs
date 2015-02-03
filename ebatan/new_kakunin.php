<?php

session_start();

//入力された内容が正しいかの判定処理。駄目だったらnew.phpに戻す
if($_POST['title'] == ''){
	$_SESSION['e_title_none'] = 1;
	header('Location: http://54.92.3.142/ebatan/new.php');
} elseif(mb_strlen($_POST['title']) > 64){
	$_SESSION['e_title_over'] = 1;
	header('Location: http://54.92.3.142/ebatan/new.php');
}
if($_POST['body'] == ''){
	$_SESSION['e_body_none'] = 1;
	header('Location: http://54.92.3.142/ebatan/new.php');
}


$title = $_POST['title'];
$body = $_POST['body'];
$html = '';


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
