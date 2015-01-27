<?php

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
while($row = mysql_fetch_assoc($result)) {
	//出力
	//var_dump($row);
	print('投稿No.'.$row['id']);

	print('<p>');
	print('件名:'.$row['title']);
	print('</p>');

	print('<p>');
	print('本文:'.$row['body']);
	print('</p>');

	print('<p>');
	print('投稿日時:'.$row['created_at']);
	print('</p>');

	print('<INPUT type="submit" name="edit" value="編集">');
	print('<INPUT type="submit" name="delete" value="削除">');
	print('<hr>');
}

$close_flag = mysql_close($link);

if ($close_flag){
	//print('<p>切断に成功しました。</p>');
}

?>
