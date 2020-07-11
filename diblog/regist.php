<?php
session_start();

// 管理者しか見れなくする


if (!isset($_SESSION['loginflag'])) {
  $_SESSION['loginflag'] = false;
}

if (!isset($_SESSION['authority'])) {
  $_SESSION['authority'] = false;
}

if( $_SESSION['loginflag']==true && $_SESSION['authority']==true)
{
echo "success";
?>


<!doctype HTML>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>プログラミング実習</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
    <?php
    	mb_internal_encoding("utf8");
    	$pdo=new PDO("mysql:dbname=lesson01; host=localhost;","root","");
    	$stmt=$pdo->query("select*from account");
     	?>
        <h1>アカウント登録画面</h1>
        <form method="post" action="regist_confirm.php">
            <div>
                <label>名前(姓)</label><br>
                <input
                	type="text" 
                	class="text" 
                	maxlength="10" 
                	size="35" 
                	name="family_name" 
                	value="<?php if( !empty($_POST['family_name']) ){
                		echo $_POST['family_name'];
                	}
                	?>" 
                	pattern="[^\x20-\x7E\uFF66-\uFF9D\u30A1-\u30F6\uFF10-\uFF19\uFF21-\uFF3A\uFF41-\uFF5A\s ]*"
                >
            </div>
            <div>
                <label>名前(名)</label><br>
                <input 
                	type="text" 
                	class="text" 
                	maxlength="10" 
                	size="35" 
                	name="last_name" 
                	value="<?php if( !empty($_POST['last_name']) ){
                		echo $_POST['last_name'];
                	}
                	?>" 
                	pattern="[^\x20-\x7E\uFF66-\uFF9D\u30A1-\u30F6\uFF10-\uFF19\uFF21-\uFF3A\uFF41-\uFF5A\s ]*"
                >
            </div>
            <div>
            <label>カナ(姓)</label><br>
                <input 
                	type="text" 
                	class="text" 
                	maxlength="10" size="35" 
                	name="family_name_kana" 
                	value="<?php if( !empty($_POST['family_name_kana']) ){
                		echo $_POST['family_name_kana'];
                	}
                	?>" 
                	pattern="[\u30A1-\u30FF]*"
                >
            </div>
            <div>
                <label>カナ(名)</label><br>
                <input 
                	type="text" 
                	class="text" 
                	maxlength="10" 
                	size="35" 
                	name="last_name_kana" 
                	value="<?php if( !empty($_POST['last_name_kana']) ){
                		echo $_POST['last_name_kana'];
                	}
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
                	}
                	?>"
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
            <div>
                <label>性別</label><br>
                <input 
                	type="radio" 
                	name="gender" 
                	value=0 checked
                		<?php if( !empty($_POST['gender']) ){
                			if($_POST['gender']=="0"){
                			echo 'checked';
                		}}
                	?>
                	>男性
                <input 
                	type="radio" 
                	name="gender" 
                	value=1 
                		<?php if( !empty($_POST['gender']) ){
                			if($_POST['gender']=="1"){
                			echo 'checked';
                		} } 
                	?>
                	>女性
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
                	}
                	?>" 
                	pattern="\d{3}-?\d{4}"
                >
            </div>
            <div>
                <label>住所(都道府県)</label><br>
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
					 if($value == $_POST["prefecture"]){
					        echo "<option value='$value' selected>".$value."</option>";
					    }else{
					        echo "<option value='$value'>".$value."</option>";
					    }
					}
					?>
				</select>
            </div>
            <div>
                <label>住所(市区町村)</label><br>
                <input 
                	type="text" 
                	class="text" 
                	maxlength="10" 
                	size="35" 
                	name="address_1" 
                	value="<?php if( !empty($_POST['address_1']) ){
                		echo $_POST['address_1'];
                	}
                	?>"
                >
            </div>
            <div>
                <label>住所(番地)</label><br>
                <input 
                	type="text" 
                	class="text" 
                	maxlength="100" 
                	size="35" 
                	name="address_2" 
                	value="<?php if( !empty($_POST['address_2']) ){
                		echo $_POST['address_2'];
                	}
                	?>"
                >
            </div>
            <div>
                <label>アカウント権限</label><br>
                <select 
                	class="dropdown" 
                	name="authority"
                	>
                     <option
	                     value =0 <?php if( !empty($_POST['authority']) ){
	                     	if($_POST['authority']==0){
	                     		echo 'selected';
	                     	}
	                     	}
	                     ?>
	                     >一般</option>
                     <option
                     	value =1 <?php if( !empty($_POST['authority']) ){
	                     	if($_POST['authority']==1){
	                     		echo 'selected';
	                     	}
	                     	}
                     ?>
                     >管理者</option>
                </select>
            </div>
            <div>
                <input 
                	type="submit" 
                	class="submit" 
                	value="確認する" 
                	>
            </div>
        </form>
    </body>
</html>

<?php
}
else
{
echo "権限がありません。";
}


?>