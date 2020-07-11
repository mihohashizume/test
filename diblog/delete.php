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
    	$stmt=$pdo->query("select*from account where id=".$_POST['id']."");
    	$row=$stmt->fetch();
    ?>
        <h1>アカウント削除画面</h1>
        <form method="post" action="delete_confirm.php">
    		 <?php
                echo "<div class='list'>";
                echo "<p><label>名前(姓)</label><br>";
                echo $row['family_name']."</p>";
                echo "<p><label>名前(名)</label><br>";
                echo $row['last_name']."</p>";
                echo "<p><label>カナ(姓)</label><br>";
                echo $row['family_name_kana']."</p>";
                echo "<p><label>カナ(名)</label><br>";
                echo $row['last_name_kana']."</p>";
                echo "<p><label>メールアドレス</label><br>";
                echo $row['mail']."</p>";
                echo "<p><label>性別</label><br>";
                	if($row['gender']==0){
                		echo '男性';
                	}else{
                		echo '女性';
                	}
                echo "</p>";
                echo "<p><label>郵便番号</label><br>";
                echo $row['postal_code']."</p>";
                echo "<p><label>住所(都道府県)</label><br>";
                echo $row['prefecture']."</p>";
                echo "<p><label>住所(市区町村)</label><br>";
                echo $row['address_1']."</p>";
                echo "<p><label>住所(番地)</label><br>";
                echo $row['address_2']."</p>";
                echo "<p><label>アカウント権限</label><br>";
                	if($row['authority']==0){
                		echo '一般';
                	}else{
                		echo '管理者';
                	}
                echo "</p>";
                echo "</div>";
              ?>
            <div>
                <input type="submit" class="submit" value="削除する" >
                <input type='hidden' name='id' value="<?php echo $_POST['id']; ?>">
                <input type='hidden' name='delete_flag' value="<?php echo $_POST['delete_flag']; ?>">
        		</form>
            </div>
        </form>
    </body>
</html>