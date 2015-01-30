<?php

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
