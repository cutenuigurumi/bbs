<?php
//デバッグ用
error_reporting(E_ALL);
ini_set( 'display_errors', 1 );

//データベースに接続
$link = mysql_connect('localhost', 'user_b', 'ned5725');
if (!$link) {
    die('接続失敗です。'.mysql_error());
}

//print('<p>接続に成功しました。</p>');

//データベースの選択
$db_selected = mysql_select_db('bbs', $link);
if(!$db_selected){
	die("データベースの選択失敗です".mysql_error());
}
//print('<p>データベースの選択に成功しました</p>');

//SQLを格納
$sql = "SELECT * FROM post";

//クエリの発行
$result = mysql_query($sql, $link);
if(!$result){
	die('<p>クエリの発行に失敗しました。。</p>');
}
//配列としてrowの中に格納
//fetchできなくなるまで繰り返す
$html = '';
$html .=<<<EOD
<html>
<head>
	<title>ebatan bbs</title>
</head>
<body>
<table>
	<tr>
	<td><a href="new.php">新規書き込み</a></td>
	<td>
	<table border="1">
		<tr>
		<td>投稿No.</td>
		<td>タイトル:</td>
		<td>本文：</td>
		<td>投稿日時：</td>
		<td>変更日時</td>
		<td>編集/削除</td>
		</tr>
EOD;

while($row = mysql_fetch_assoc($result)) {
	$id = $row['id'];
	$title = $row['title'];
	$body = $row['body'];
	$created_at = $row['created_at'];
	$updated_at = $row['updated_at'];


	$html .=<<<EOD
		<tr>
		<td>{$id}</td>
		<td> {$title}</td>
		<td>{$body}</td>
		<td>{$created_at}</td>
		<td>{$updated_at}</td>
		<td><a href="edit.php?id={$id}">編集</a>/<a href="delete.php?id={$id}">削除</a></td>
		</tr>
EOD;
}
$html .=<<<EOD
		</table>
	</td>
	</tr>
</table>
</body>
</html>

EOD;

	print($html);
$close_flag = mysql_close($link);

if ($close_flag){
	//print('<p>切断に成功しました。</p>');
}

?>
