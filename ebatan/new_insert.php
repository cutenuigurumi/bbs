<?php
//デバッグ用
error_reporting(E_ALL);
ini_set( 'display_errors', 1 );

//前ページから受け取る
$title = $_POST['title'];
$body = $_POST['body'];

//list.phpにリダイレクト
header("HTTP/1.1 301 Moved Permanently");
header("Location: http://54.92.3.142/ebatan/list.php");

//データベースに接続
$link = mysql_connect('localhost', 'user_b', 'ned5725');
if (!$link) {
    die('接続失敗です。'.mysql_error());
}

$timestamp = time();

//データベースの選択
$db_selected = mysql_select_db('bbs', $link);
if(!$db_selected){
	die("データベースの選択失敗です".mysql_error());
}

//SQLを格納
//$sql = "INSERT INTO post(title, body, created_at) VALUES ('$title', '$body', cast ( now() as datetime))";
$sql = "INSERT INTO post(title, body) VALUES ('$title', '$body')";

//クエリの発行
$result = mysql_query($sql, $link);
if(!$result){
	die('<p>クエリの発行に失敗しました。。</p>');
}

print("書き込みました。戻ります<br>");

$close_flag = mysql_close($link);

if ($close_flag){
	//print('<p>切断に成功しました。</p>');
}

?>
