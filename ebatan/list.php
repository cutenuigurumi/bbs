<?php
//デバッグ用
error_reporting(E_ALL);
ini_set( 'display_errors', 1 );

//DB接続の共通化
require('db_connect.php');
require('view/list.php');

//SQLを格納
$sql = "SELECT * FROM post";

//クエリの発行
$result = mysql_query($sql, $link);
if(!$result){
	die('<p>クエリの発行に失敗しました。。</p>');
}

$html_post_list = '';

while($row = mysql_fetch_assoc($result)) {
    $id = $row['id'];
    $title = $row['title'];
    $body = nl2br($row['body']);
    $created_at = $row['created_at'];
    $updated_at = $row['updated_at'];
    $html_post_list .=<<<EOD
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

$close_flag = mysql_close($link);

if ($close_flag){
	//print('<p>切断に成功しました。</p>');
}

?>
