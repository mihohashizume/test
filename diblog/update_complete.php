<!doctype HTML>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>プログラミング実習</title>
<link rel="stylesheet"type="text/css" href="style4.css">
</head>
<body>
<div>
    <h1>アカウント更新完了画面</h1>
<?php
try {
	mb_internal_encoding("utf8");
	$pdo=new PDO("mysql:dbname=lesson01; host=localhost;","root","");
	$pdo ->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
	$pdo ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$pdo ->exec("
		update account set family_name='".$_POST['family_name']."'
		,last_name='".$_POST['last_name']."'
		,family_name_kana='".$_POST['family_name_kana']."'
		,last_name_kana='".$_POST['last_name_kana']."'
		,mail='".$_POST['mail']."'
		,password='".password_hash($_POST['password'], PASSWORD_DEFAULT)."'
																				// paswordが空だったら変更しない
		,gender='".$_POST['gender']."'
		,postal_code='".$_POST['postal_code']."'
		,prefecture='".$_POST['prefecture']."'
		,address_1='".$_POST['address_1']."'
		,address_2='".$_POST['address_2']."'
		,authority='".$_POST['authority']."'
		,update_time=NOW()
		where id='".$_POST['id']."'
		");
	echo "<div class='confirm'><h2>更新完了しました。</h2></div>";
	$pdo =NULL;
} catch (Exception $e) {
	echo '<span class="error"><font color="red">エラーが発生したためアカウント更新できません。</font></span><br>';
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