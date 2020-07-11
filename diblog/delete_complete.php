<!doctype HTML>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>プログラミング実習</title>
<link rel="stylesheet"type="text/css" href="style4.css">
</head>
<body>
<div>
    <h1>アカウント削除完了画面</h1>
<?php
try {
	mb_internal_encoding("utf8");
	$pdo=new PDO("mysql:dbname=lesson01; host=localhost;","root","");
	$pdo ->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
	$pdo ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$pdo ->exec("update account set delete_flag='1'
		,update_time=NOW() where id=".$_POST['id']."");
	echo "<div class='confirm'><h2>削除完了しました。</h2></div>";
	$pdo =NULL;
} catch (Exception $e) {
	echo '<span class="error"><font color="red">エラーが発生したためアカウント削除できません。</font></span><br>';
	echo $e->getMessage();
	exit;
}
?>
<form action="diblog.html">
	<input
        type="submit"
        class="button1"
        value="TOPページへ戻る"
        >
</form>
</div>
</body>
</html>
