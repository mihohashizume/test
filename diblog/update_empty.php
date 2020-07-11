<!doctype HTML>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>プログラミング実習</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
    <?php
    	if( $_POST['from']=="update_confirm"){
    	}else{
    		mb_internal_encoding("utf8");
    		$pdo=new PDO("mysql:dbname=lesson01; host=localhost;","root","");
    		$stmt=$pdo->query("select*from account where id=".$_POST['id']."");
    		$row=$stmt->fetch();
    		$back=$row;
    	}
    ?>
        <h1>アカウント更新画面</h1>
        <form method="post" action="updata_confirm.php">
            <div>
                <label>姓</label><br>
                <input 
                	type="text" 
                	class="text" 
                	maxlength="10" 
                	size="35" 
                	name="family_name" 
                	value="<?php if( !empty($_POST['family_name']) ){
                		echo $_POST['family_name']; 
                		}elseif(!empty($_POST['id'])){
                		echo $row['family_name']; 
                		} 
                	?>" 
                	pattern="[^\x20-\x7E\uFF66-\uFF9D\u30A1-\u30F6\uFF10-\uFF19\uFF21-\uFF3A\uFF41-\uFF5A\s ]*" 
                	>
            </div>
            <div>
                <label>名</label><br>
                <input 
                	type="text" 
                	class="text" 
                	maxlength="10" 
                	size="35" 
                	name="last_name" 
                	value="<?php if( !empty($_POST['last_name']) ){
                		echo $_POST['last_name']; }
                		elseif(!empty($_POST['id'])){ 
                		echo $row['last_name']; 
                		} 
                	?>" 
                	pattern="[^\x20-\x7E\uFF66-\uFF9D\u30A1-\u30F6\uFF10-\uFF19\uFF21-\uFF3A\uFF41-\uFF5A\s ]*"
                	>
            </div>
            <div>
                <label>セイ</label><br>
                <input 
                	type="text" 
                	class="text" 
                	maxlength="10" 
                	size="35" 
                	name="family_name_kana" 
                	value="<?php if( !empty($_POST['family_name_kana']) ){ 
                		echo $_POST['family_name_kana']; 
                		}elseif(!empty($_POST['id'])){
                		echo $row['family_name_kana']; 
                		} 
                	?>" 
                	pattern="[\u30A1-\u30FF]*"
                >
            </div>
            <div>
                <label>メイ</label><br>
                <input 
                	type="text" 
                	class="text" 
                	maxlength="10" 
                	size="35" 
                	name="last_name_kana" 
                	value="<?php if( !empty($_POST['last_name_kana']) ){ 
                		echo $_POST['last_name_kana']; 
                		}elseif(!empty($_POST['id'])){
                		echo $row['last_name_kana']; } 
                	?>" 
                	pattern="[\u30A1-\u30FF]*"
                >
            </div>
            <div>
                <label>メールアドレス</label><br>
                <input 
                	type="mail" 
                	class="text" 
                	maxlength="100" 
                	size="35" 
                	name="mail" 
                	value="<?php if( !empty($_POST['mail']) ){
                		echo $_POST['mail']; 
                		}elseif(!empty($_POST['id'])){
                		echo $row['mail']; 
                		} 
                	?>"
                >
            </div>
            <div>
                <label>パスワード</label><br>
                <input 
	                type="password" 
	                class="text" 
	                maxlength="10" 
	                size="35" 
	                name="password"
	            >
            </div>
            <div>
                <label>性別</label><br>
                <input type="radio" name="gender" value=0 checked
	                <?php 
	                	if( !empty($_POST['gender']) ) {
	                		if($_POST['gender']=="0"){
	                			echo 'checked';
	                		}
	                	}elseif(!empty($_POST['id'])){
	                		if($row['gender']=="0"){
	                			echo 'checked';
	                		}
	                	}
	                ?>>男性
                <input type="radio" name="gender" value=1 
                	 <?php 
	                	if( !empty($_POST['gender']) ) {
	                		if($_POST['gender']=="1"){
	                			echo 'checked';
	                		}
	                	}elseif(!empty($_POST['id'])){
	                		if($row['gender']=="1"){
	                			echo 'checked';
	                		}
	                	}
	                	?>>女性
            </div>
            <div>
                <label>郵便番号</label><br>
                <input 
                	type="text" 
                	class="text" 
                	maxlength="7" 
                	size="35" 
                	name="postal_code" 
                	value="<?php if( !empty($_POST['postal_code']) ){
                		echo $_POST['postal_code']; 
                		}elseif(!empty($_POST['id'])){
                		echo $row['postal_code']; 
                		}
                	?>" 
                	pattern="\d{3}-?\d{4}"
                >
            </div>
            <div>
                <label>都道府県</label><br>
                <select
					class=dropdown
					name="prefecture"
					id="pref"
				>
					<?php
					$prefs = array ('選択してください','北海道','青森県','岩手県','宮城県'
									,'秋田県','山形県','福島県','茨城県','栃木県'
									,'群馬県','埼玉県','千葉県','東京都','神奈川県'
									,'山梨県','新潟県','富山県','石川県','福井県'
									,'長野県','岐阜県','静岡県','愛知県','三重県'
									,'滋賀県','京都府','大阪府','兵庫県','奈良県'
									,'和歌山県','鳥取県','島根県','岡山県','広島県'
									,'山口県','徳島県','香川県','愛媛県','高知県'
									,'福岡県','佐賀県','長崎県','熊本県','大分県'
									,'宮崎県','鹿児島県','沖縄県');
					foreach($prefs as $pref => $value){
						if($value == $row["prefecture"]){
							echo "<option value='$value' selected>".$value."</option>";
						}
						elseif($value == $_POST["prefecture"]){
					        echo "<option value='$value' selected>".$value."</option>";
					    }else{
					        echo "<option value='$value'>".$value."</option>";
					    }
					}
					?>
				</select>
            </div>
            <div>
                <label>住所</label><br>
                <input 
                	type="text" 
                	class="text" 
                	maxlength="10" 
                	size="35" 
                	name="address_1" 
                	value="<?php
                		if( !empty($_POST['address_1']) ){ 
                		echo $_POST['address_1']; 
                		}elseif(!empty($_POST['id'])){
                		echo $row['address_1']; 
                	} 
                	?>"
                	>
            </div>
            <div>
                <label>番地</label><br>
                <input 
                	type="text" 
                	class="text" 
                	maxlength="100" 
                	size="35" 
                	name="address_2" 
                	value="<?php
                		if( !empty($_POST['address_2']) ){ 
                		echo $_POST['address_2']; 
                		}elseif(!empty($row['address_2'])){
                		echo $row['address_2']; 
                		}
                	?>"
                >
            </div>
            <div>
                <label>権限</label><br>
                
                <select
                	class="dropdown" 
                	name="authority"
                	>
                     <option
                     	 value=0 <?php if( !empty($_POST['authority']) ){
	                     	echo 'selected';
                     	}
                     ?>
                     >有効</option>
                     <option
                     	value=1 <?php if( !empty($_POST['authority']) ){
	                     	echo 'selected';
	                     }
                     ?>
                     >無効</option>
                </select>
            </div>
            <div>
                <input type="submit" class="submit" value="確認する" >
                <input type='hidden' name='id' value='".$row['id']."'>
            </div>
        </form>
    </body>
</html>