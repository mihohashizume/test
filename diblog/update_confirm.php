<!doctype HTML>
<html lang="ja">
    <head>
    <meta charset="utf-8">
    <title>プログラミング実習</title>
    <link rel="stylesheet" type="text/css" href="style2.css">
    </head>
    <body>
    <h1>アカウント更新確認画面</h1>
    <div class="confirm">
        <p>名前(姓)<br>
        <?php
	        if( $_POST['family_name'] == "" ){
	            echo '<font color="red">入力してください</font>'; 
	            }else{
	            echo $_POST['family_name'];
	            }
            ?>
        <p>名前(名)<br>
        <?php
	        if( $_POST['last_name'] == "" ){
	            echo '<font color="red">入力してください</font>';
	            }else{
	            echo $_POST['last_name'];
	            }
            ?>
        </p>
        <p>カナ(姓)<br>
        <?php
	        if( $_POST['family_name_kana'] == "" ){
	            echo '<font color="red">入力してください</font>';
	            }else{
	            echo $_POST['family_name_kana'];
	            }
            ?>
        <p>カナ(名)<br>
        <?php
	        if( $_POST['last_name_kana'] == "" ){
	            echo '<font color="red">入力してください</font>'; 
	            }else{
	            echo $_POST['last_name_kana'];
	            }
            ?>
        </p>
        <p>メールアドレス<br>
        <?php
	        if( $_POST['mail'] == "" ){
	            echo '<font color="red">入力してください</font>'; 
	            }else{
	            echo $_POST['mail'];
	            }
            ?>
        </p>
        <p>パスワード<br>
        <?php
        		$str = $_POST['password'];
        		$str2 = str_repeat('●', strlen($str));
        	if( $_POST['password'] == "" ){
            echo '<font color="red">パスワードは変更しません。</font>';
            }else{
            echo  $str2 ;
            }
            ?>
        </p>
        <p>性別<br>
        <?php
           if( $_POST['gender'] == 0 ){
           echo '男性';
           }
		   else{ echo '女性';
		   } 
        ?>
        </p>
        <p>郵便番号<br>
        <?php
	        if( $_POST['postal_code'] == "" ){
	            echo '<font color="red">入力してください</font>';
	            }else{
	            echo $_POST['postal_code'];}
            ?>
        </p>
        <p>住所(都道府県)<br>
        <?php
	        if( $_POST['prefecture'] == "選択してください" ){
	            echo '<font color="red">入力してください</font>';
	            }else{
	            echo $_POST['prefecture'];
	            }
            ?>
        <p>住所(市区町村)<br>
	        <?php
	        if( $_POST['address_1'] == "" ){
	            echo '<font color="red">入力してください</font>';
	            }else{
	            echo $_POST['address_1'];
	            }
            ?>
        </p>
        <p>住所(番地)<br>
       <?php
        if( $_POST['address_2'] == "" ){
            echo '<font color="red">入力してください</font>';
            }else{
            echo $_POST['address_2'];
            }
            ?>
        </p>
        <p>アカウント権限<br>
        <?php
        if( $_POST['authority'] == 0 ){
            echo '一般';
            }else{
            echo '管理者';
            }
            ?>
        </p>
        <form action="update.php" method="post">
        <input type="submit" class="button1" value="戻る">
	        <input type="hidden" value="update_confirm" name="from">
	        <input type='hidden' value="<?php echo $_POST['id']; ?>" name="id">
	        <input type="hidden" value="<?php echo $_POST['family_name']; ?>" name="family_name">
	        <input type="hidden" value="<?php echo $_POST['last_name']; ?>" name="last_name">
	        <input type="hidden" value="<?php echo $_POST['family_name_kana']; ?>" name="family_name_kana">
	        <input type="hidden" value="<?php echo $_POST['last_name_kana']; ?>" name="last_name_kana">
	        <input type="hidden" value="<?php echo $_POST['mail']; ?>" name="mail">
	        <input type="hidden" value="<?php echo $_POST['password']; ?>" name="password">
	        <input type="hidden" value="<?php echo $_POST['gender']; ?>" name="gender">
	        <input type="hidden" value="<?php echo $_POST['postal_code']; ?>" name="postal_code">
	        <input type="hidden" value="<?php echo $_POST['prefecture']; ?>" name="prefecture">
	        <input type="hidden" value="<?php echo $_POST['address_1']; ?>" name="address_1">
	        <input type="hidden" value="<?php echo $_POST['address_2']; ?>" name="address_2">
	        <input type="hidden" value="<?php echo $_POST['authority']; ?>" name="authority">
        </form>
        
        <?php
        $error_flag=false;
        foreach ($_POST as $key=>$value){
        	if ($key=="id"){
        		if (empty($value)){
        		$error_flag=true;
        		}
        	}
        	elseif ($key=="family_name"){
        		if (empty($value)){
        		$error_flag=true;
        		}
        		if(mb_strlen($value)>10){
	        	$error_flag=true;
	        	}
        	}
        	elseif ($key=="last_name"){
        		if (empty($value)){
        		$error_flag=true;
        		}
        		if(mb_strlen($value)>10){
	        	$error_flag=true;
	        	}
        	}
        	elseif ($key=="family_name_kana"){
        		if (empty($value)){
        		$error_flag=true;
        		}
        		if(mb_strlen($value)>10){
	        	$error_flag=true;
	        	}
        	}
        	elseif ($key=="last_name_kana"){
        		if (empty($value)){
        		$error_flag=true;
        		}
        		if(mb_strlen($value)>10){
	        	$error_flag=true;
	        	}
        	}
        	elseif ($key=="mail"){
        		if (empty($value)){
        		$error_flag=true;
        		}
        		if(mb_strlen($value)>100){
	        	$error_flag=true;
	        	}
        	}
        	elseif ($key=="password"){
        		if(mb_strlen($value)>10){
	        	$error_flag=true;
	        	}
        	}
	        elseif ($key=="postal_code"){
        		if (empty($value)){
        		$error_flag=true;
        		}
        		if(mb_strlen($value)>7){
	        	$error_flag=true;
	        	}
        	}
        	elseif ($key=="prefecture"){
        		if (empty($value)){
        		$error_flag=true;
        		}
        	}
        	elseif ($key=="address_1"){
        		if (empty($value)){
        		$error_flag=true;
        		}
        		if(mb_strlen($value)>100){
	        	$error_flag=true;
	        	}
        	}
        	elseif ($key=="address_2"){
        		if (empty($value)){
        		$error_flag=true;
        		}
        		if(mb_strlen($value)>255){
	        	$error_flag=true;
	        	}
        	}
        }
        ?>
        <form action="update_complete.php" method="post">
        <input
        	type="submit" 
        	class="button2" 
        	value="更新する"
        	<?php if ($error_flag){
        		echo "disabled";
        		}
        	?>
        >
	        <input type='hidden' value="<?php echo $_POST['id']; ?>" name="id">
	        <input type="hidden" value="<?php echo $_POST['family_name']; ?>" name="family_name">
	        <input type="hidden" value="<?php echo $_POST['last_name']; ?>" name="last_name">
	        <input type="hidden" value="<?php echo $_POST['family_name_kana']; ?>" name="family_name_kana">
	        <input type="hidden" value="<?php echo $_POST['last_name_kana']; ?>" name="last_name_kana">
	        <input type="hidden" value="<?php echo $_POST['mail']; ?>" name="mail">
	        <input type="hidden" value="<?php echo $_POST['password']; ?>" name="password">
	        <input type="hidden" value="<?php echo $_POST['gender']; ?>" name="gender">
	        <input type="hidden" value="<?php echo $_POST['postal_code']; ?>" name="postal_code">
	        <input type="hidden" value="<?php echo $_POST['prefecture']; ?>" name="prefecture">
	        <input type="hidden" value="<?php echo $_POST['address_1']; ?>" name="address_1">
	        <input type="hidden" value="<?php echo $_POST['address_2']; ?>" name="address_2">
	        <input type="hidden" value="<?php echo $_POST['authority']; ?>" name="authority">
        </form>
    </div>
    </body>
</html>