<!doctype HTML>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>プログラミング実習</title>
<link rel="stylesheet"type="text/css" href="style4.css">
</head>
<body>
<div>
    <h1>アカウント登録完了画面</h1>
<?php
try {
	mb_internal_encoding("utf8");
	$pdo=new PDO("mysql:dbname=lesson01; host=localhost;","root","");
	$pdo ->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
	$pdo ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$pdo ->exec("
		insert into account(family_name
		,last_name
		,family_name_kana
		,last_name_kana
		,mail
		,password
		,gender
		,postal_code
		,prefecture
		,address_1
		,address_2
		,authority
		,delete_flag
		,registered_time
		,update_time
		) 
		values('".$_POST['family_name']."'
		,'".$_POST['last_name']."'
		,'".$_POST['family_name_kana']."'
		,'".$_POST['last_name_kana']."'
		,'".$_POST['mail']."'
		,'".password_hash($_POST['password'], PASSWORD_DEFAULT)."'
		,'".$_POST['gender']."'
		,'".$_POST['postal_code']."'
		,'".$_POST['prefecture']."'
		,'".$_POST['address_1']."'
		,'".$_POST['address_2']."'
		,'".$_POST['authority']."'
		,0
		,NOW()
		,NOW()
		);
	");
	echo "<div class='confirm'><h2>登録完了しました。</h2></div>";
	$pdo =NULL;
} catch (Exception $e) {
	echo '<span class="error"><font color="red">エラーが発生したためアカウント登録できません。</font></span><br>';
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
