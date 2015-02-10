

<html>
<head>
<title>新規投稿</title>
</head>
<body>
<form action="edit_insert.php?id=<?php echo($id) ?>" method="post">
<p>
<input type="hidden" name="title" value="<?php echo ($title) ?>">
件名：<?php echo ($title); ?>
</p>
<p>
<textarea name="body" style="display:none;" rows="4" cols="40"><?php echo ($body) ?></textarea>
本文：<?php echo nl2br($body); ?>
</p>
<input type="submit" value="送信">
</form>
</body>
</html>

