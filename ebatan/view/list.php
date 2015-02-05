<?php

//include('../list.php');

?>

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
<?php
foreach($post_list as $post){ ?>
        <tr>
        <td><?php echo $post['id']; ?></td>
        <td><?php echo $post['title']; ?></td>
        <td><?php echo nl2br($post['body']); ?></td>
        <td><?php echo $post['created_at'] ?></td>
        <td><?php echo $post['updated_at'] ?></td>
        <td><a href="edit.php?id={$id}">編集</a>/<a href="delete.php?id={$id}">削除</a></td>
        </tr>
<?php } ?>
        </table>
    </td>
    </tr>
</table>

    </td>
    </tr>
</table>

    </td>
    </tr>
</table>
</body>     
