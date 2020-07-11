<?php
session_start();
$_SESSION['loginflag']=false;
$_SESSION['authority']=false;
// sessionをリセット
?>

<!doctype HTML>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>プログラミング実習</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>

        <h1>ログイン</h1>
        <form method="post" action="diblog.php">
            <div>
                <label>メールアドレス</label><br>
                <input 
                	type="mail" 
                	class="text" 
                	maxlength="100" 
                	size="35" 
                	name="mail"
                >
            </div>
            <div>
                <label>パスワード(半角英数字)</label><br>
                <input 
                	type="password" 
                	class="text" 
                	maxlength="10" size="35" 
                	name="password"
                >
            </div>
            <?php
	        // 入力チェック
	        $error_flag=false;
	        foreach ($_POST as $key=>$value){
	        if ($key=="mail"){
	        		if ($value!=$row['mail']){
	        		$error_flag=true;
	        		}
	        		if (empty($value)){
	        		$error_flag=true;
	        		}
	        		if(mb_strlen($value)>100){
		        	$error_flag=true;
		        	}
	        	}
	        	elseif ($key=="password"){
	        		if (empty($value)){
	        		$error_flag=true;
	        		}
	        		if(mb_strlen($value)>10){
		        	$error_flag=true;
		        	}
	        	}
	        }
	        ?>
	       
        	<input type="submit"  class="submit" value="ログイン" 
        		<?php if ($error_flag){
        		// disabled=エラーならsubmitされない
        			echo "disabled";
        			}
        		?>
        	>
        	<form action="diblog.html">
			<input
				type="submit" 
				class="submit" 
				value="TOPページ"
			>
			</form>
        </form>
    </body>
</html>