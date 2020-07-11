<!doctype HTML>
<html lang="ja">
    <head>
    <meta charset="utf-8">
    <title>プログラミング実習</title>
    <link rel="stylesheet" type="text/css" href="style2.css">
    </head>
    <body>
    <h1>アカウント削除確認画面</h1>
    <div class="confirm">
    <?php
        $error_flag=false;
        foreach ($_POST as $key=>$value){
        	if ($key=="delete_flag"){
        		if ($value=="1"){
        		$error_flag=true;
	        	}
        	}
        }
        ?>
        <?php if ($error_flag){
        	echo "<h2>既に削除されています。</h2>";
        	}else{
        	echo "<h2>本当に削除してよろしいですか？</h2>";
        }
 		?>
 		<form action="list.php" method="post">
	        <input type="submit" class="button1" value="戻る">
        </form>
        
        
        <form action="delete_complete.php" method="post">
	        <input 
	        	type="submit" 
	        	class="button2" 
	        	value="削除する"
	        	<?php if ($error_flag){
        			echo "disabled";
        			}
        		?>
	        >
	        <input 
	        	type='hidden' 
	        	value="<?php echo $_POST['id']; ?>" 
	        	name='id' 
	        >
        </form>
    </div>
    </body>
</html>