<?php
//デバッグ用
error_reporting(E_ALL);
ini_set( 'display_errors', 1 );
?>

<html>
<head>
<title>新規投稿</title>
</head>
<body>
<form action="new_kakunin.php" method="post">
<p>
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
