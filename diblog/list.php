<!-
	性別、権限がなしの時は含めて検索する
	初期値ではテーブルを表示しない
	
	(!empty)じゃない書き方 isset
	
	if($row['gender'] == '2' && $row['authority'] == '2')
	→代入する？？

	デバックのコード
->




<?php
	mb_internal_encoding("utf8");
	$pdo=new PDO("mysql:dbname=lesson01; host=localhost;","root","");
    	if(@$_POST["family_name"] != "" 
	    	OR @$_POST["last_name_name"] != ""
	    	OR @$_POST["family_name_kana"] != ""
	    	OR @$_POST["last_name_kana"] != ""
	    	OR @$_POST["mail"] != ""
	    	OR @$_POST["gender"] != ""
	    	OR @$_POST["authority"] != ""
    	)
    	
    	

if (isset($_POST["kensaku"]))
{

        $query = "SELECT * FROM account 
            WHERE family_name LIKE  '%".$_POST["family_name"]."%'
            AND last_name LIKE  '%".$_POST["last_name"]."%'
            AND family_name_kana LIKE  '%".$_POST["family_name_kana"]."%'
            AND last_name_kana LIKE  '%".$_POST["last_name_kana"]."%'
            AND mail LIKE  '%".$_POST["mail"]."%'
            ";
            
            
            // 0か1で条件を追加する
            // .=  +=
            
            if($_POST["gender"]==0 || $_POST["gender"]==1)
            {
            $query .= "AND gender='".$_POST["gender"] ."'";
            }
            
            if($_POST["authority"]==0 || $_POST["authority"]==1)
            {
            $query .= "AND authority='".$_POST["authority"] ."'";
            }
            
	        // 条件が足されていく
            $stmt = $pdo->query($query);
            
}
else
{
}


/*
and
空白時はand条件を外す


            WHERE family_name LIKE  '%".$_POST["family_name"]."%'
            AND last_name LIKE  '%".$_POST["last_name"]."%'
            AND family_name_kana LIKE  '%".$_POST["family_name_kana"]."%'
            AND last_name_kana LIKE  '%".$_POST["last_name_kana"]."%'
            AND mail LIKE  '%".$_POST["mail"]."%'
            AND gender='".$_POST["gender"] ."'
            AND authority='".$_POST["authority"] ."'
            )");
            
            
            $stmt = $pdo->query("SELECT * FROM account");
            // elseで全件表示

*/

?>






<?php
session_start();
?>




<!doctype HTML>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>プログラミング実習</title>
        <link rel="stylesheet" type="text/css" href="style4.css">
    </head>
    <body>
    <h1>アカウント一覧</h1>
    
    	<div class="kensaku">
    	
    	<form method="POST" action="">
    	<!- 同じファイルにPOST ->
    	
	    	<lavel>名前（姓）　　　
	    		<input 
	    			type="text" 
	    			name="family_name" 
	    			placeholder="入力してください"
	    			value="<?php if( !empty($_POST['family_name']) ){
                		echo $_POST['family_name'];
                	}
                	?>"
	    		>
	    		<br>
	    	</lavel>
	    	
	    	<lavel>名前（名）　　　
	    		<input 
	    			type="text" 
	    			name="last_name" 
	    			placeholder="入力してください"
	    			value="<?php if( !empty($_POST['last_name']) ){
                		echo $_POST['last_name'];
                	}
                	?>"
	    		>
	    		<br>
	    	</lavel>
	    	
	    	<lavel>カナ（姓）　　　
	    		<input 
	    			type="text" 
	    			name="family_name_kana" 
	    			placeholder="入力してください"
	    			value="<?php if( !empty($_POST['family_name_kana']) ){
                		echo $_POST['family_name_kana'];
                	}
                	?>"
	    		>
	    		<br>
	    	</lavel>
	    	
	    	<lavel>カナ（名）　　　
	    		<input 
	    			type="text" 
	    			name="last_name_kana" 
	    			placeholder="入力してください"
	    			value="<?php if( !empty($_POST['last_name_kana']) ){
                		echo $_POST['last_name_kana'];
                	}
                	?>"
	    		>
	    		<br>
	    	</lavel>
	    	
	    	<lavel>メールアドレス　
	    		<input 
	    			type="text" 
	    			name="mail" 
	    			placeholder="入力してください"
	    			value="<?php if( !empty($_POST['mail']) ){
                		echo $_POST['mail'];
                	}
                	?>"
	    		>
            	<br>
	    	</lavel>
	    	
	    	<lavel>性別　　　　　
                <input 
                	type="radio" 
                	name="gender" 
                	value=2 checked
                		<?php if( !empty($_POST['gender']) ){
                			if($_POST['gender']=="2"){
                			echo 'checked';
                			}
                		}
                	?>
                	>未選択
				<input 
                	type="radio" 
                	name="gender" 
                	value=0 
                		<?php if( !empty($_POST['gender']) ){
                			if($_POST['gender']=="0"){
                			
                			}
                		}
                	?>
                	>男性
                <input 
                	type="radio" 
                	name="gender" 
                	value=1 
                		<?php if( !empty($_POST['gender']) ){
                			if($_POST['gender']=="1"){
                			
                		} } 
                	?>
                	>女性
                                <br>
	    	</lavel>
	    	
	    	<lavel>アカウント権限　　　　　　　　
                <select 
                	class="dropdown" 
                	name="authority"
                >
                <option
	                 value =2
	            >未選択
	            </option><option
	                 value =0
	            >一般
	            </option>
                <option
                	value =1
                >管理者
                </option>
                </select>
                <br>
	    	</lavel>
	    	
	    	<input
	    		type="hidden"
	    		name="kensaku"
	    		value=""
	    		/>
	    	
	    	<input
	    		type="submit" 
	    		class="button1" 
	    		value="検索"
	    	>
	    	<br><br><br>
	    	
     	</form>
     	</div>
     	
     	
     	<?php 
            // フォームのボタンが押されたらフォームから送信されたデータを各変数に格納
            if ($_SERVER["REQUEST_METHOD"] == "POST")
            {
              $family_name = $_POST["family_name"];
              $last_name = $_POST["last_name"];
              $family_name_kana = $_POST["family_name_kana"];
              $last_name_kana = $_POST["last_name_kana"];
              $mail = $_POST["mail"];
              $gender = $_POST["gender"];
              $authority = $_POST["authority"];
            }
          ?>
          
          
    <?php
    if(empty($stmt))
    {
    }
    else{
    ?>
	<table border="0" cellpadding="2" bgcolor="">
    	<tr bgcolor="#eee">
    		<th>名前(姓)</th>
    		<th>名前(名)</th>
    		<th>カナ(姓)</th>
    		<th>カナ(名)</th>
    		<th>メールアドレス</th>
    		<th>性別</th>
    		<th>アカウント権限</td>
    		<th>削除フラグ</td>
    		<th>登録日時</td>
    		<th>更新日時</td>
    		<th colspan="2">操作</th>
    	</tr>
    	<?php
    	     echo '<tr>';
    	     	if(!empty($stmt))
    	     	{
	                while ($row=$stmt->fetch())
	                {
	                
	                	echo "<div class='list'>";
	                		echo "<td>".$row['family_name']."</td>";
	                		echo "<td>".$row['last_name']."</td>";
	                		echo "<td>".$row['family_name_kana']."</td>";
	                		echo "<td>".$row['last_name_kana']."</td>";
	                		echo "<td>".$row['mail']."</td>";
							echo "<td>";
	                		if( $row['gender'] == '0' ){
	                			echo '男性';
	                		}else{
	                			echo '女性';
	                		}
	                		echo "</td>";
	                		echo "<td>";
	                		if( $row['authority'] == '0' ){
	                			echo '一般';
	                		}else{
	                			echo '管理者';
	                		}
	                		echo "</td>";
	                		echo "<td>";
	                		if( $row['delete_flag'] == "0" ){
	                			echo '有効';
	                		}else{
	                			echo'無効';
	                			}
	                		echo "</td>";
	                		echo "<td>".$row['registered_time']."</td>";
	                		echo "<td>".$row['update_time']."</td>";
	                		echo "<td><form action='update.php' method='post'>
									<input type='submit' value='更新'>
									<input type='hidden' name='id' value='".$row['id']."'>
									<input type='hidden' name='from' value='list'>
									<input type='hidden' name='delete_flag' value='".$row['delete_flag']."'>
									</form></td>";
							echo "<td><form action='delete.php' method='post'>
									<input type='submit' value='削除'>
									<input type='hidden' name='id' value='".$row['id']."'>
									<input type='hidden' name='delete_flag' value='".$row['delete_flag']."'>
									</form></td>";
						echo "</div>";
	  				echo '</tr>';
					}
				}
				else
				{
				}
                ?>
    	</table>
    	
    	<?php
    	}
    	?>

     	
		<form action="diblog.php">
        <input type="submit" class="button1" value="TOPページへ戻る">
        </form>
      </div>
</body>
</html>
