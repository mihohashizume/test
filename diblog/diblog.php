<?php
session_start();

// 登録ユーザーじゃないひとにエラーがでないように
// 権限ありでもログインしていなければ表示しない項目
// 他ページでセッション保持




$page_flag = 0;

if( !empty($_POST['mail']) ) {

	$page_flag = 1;
}
// ログインから来なかったひとにエラーをださない



// セッションを登録・初期化
if (!isset($_SESSION['loginflag'])) {
  $_SESSION['loginflag'] = false;
}

// if (!isset($_SESSION['authority')) {
//  $_SESSION['authority'] = false;}




if( $_SESSION['loginflag']==false)
{

	$MAIL = $_POST['mail'];

try{
	mb_internal_encoding("utf8");
	$pdo=new PDO("mysql:dbname=lesson01; host=localhost;","root","");
	$stmt=$pdo->query("select * from account where mail='".$MAIL."'");
	// メールアドレスから取得
	
	$row=$stmt->fetch();
	
	$passwordhash = $row['password'];
	

	if( $passwordhash != "" )
	{
		if( password_verify( $_POST['password'] , $passwordhash ) )
		// passwordの照合
		{
			echo "success";
			$_SESSION['loginflag']=true;
		// ログインされていたらセッションはtru
		}
		else
		{
			echo "false";
			$_SESSION['loginflag'] = false;
		}
	}
	
	
	if( $row['authority']==1)
	{
		$_SESSION['authority'] = true;
		$_SESSION['loginflag'] = true;
	}
	elseif( $row['authority']==0)
	{
		$_SESSION['authority'] = false;
		$_SESSION['loginflag'] = true;
	}
	else
	{
		$_SESSION['authority'] = false;
		$_SESSION['loginflag'] = false;
	}
	
	
}catch (Exception $e) {
	echo '<span class="error"><font color="red">エラーが発生したためログイン情報を取得できません。</font></span><br>';
	echo $e->getMessage();
	exit;
}
}
?>


<!DOCTYPE html>
<html lang="ja">
    <head>
        <img src="diblog_logo.jpg" alt="logo">
        <meta charset="utf-8">
        <title>diblog</title>
        <link rel="stylesheet" href="diblogcss.css">
    </head>
    <body>
    

        <header>
            <ul>
            <li>トップ</li>
            <li>プロフィール</li>
            <li>D.I.Blogについて</li>
            <?php
            	if($_SESSION['loginflag']==true && $_SESSION['authority']==true)
            	{
		            echo "<li><a href='regist.php'>アカウント登録</a></li>";
					echo "<li><a href='list.php'>アカウント一覧</a></li>";
            	}
            	else
            	{
            	}
            ?>
            <li>問い合わせ</li>
            <li>その他</li>
            </ul>
        </header>
        <main>
            <div class="left">  
                <h1> プログラミングに役立つ書籍</h1>
                <div class="date">2017年1月15日</div>
                <div class="bookstore"><img src="bookstore.jpg">
                <p>
                D.I.BlogはD.I.Worksが提供する演習問題です。
                </p>
                </div>
                <br>
                <br>
            記事中身
                <br>
                <br>
                <div class="kijinakami">

                    <ul class="head">
                        <li><img src="pic1.jpg" alt="1">
                        <p>ドメイン取得方法</p></li>
                        <li><img src="pic2.jpg" alt="2">
                        <p>快適な職場環境</p></li>
                        <li><img src="pic3.jpg" alt="3">
                        <p>Linyxnの基礎</p></li>
                        <li><img src="pic4.jpg" alt="4">
                        <p>マーケティング入門</p></li>
                        
                        <li><img src="pic5.jpg" alt="5"><p>アクティブラーニング</p></li>
                        <li><img src="pic6.jpg" alt="6">
                        <p>CSSの効率的な方法</p></li>
                        <li><img src="pic7.jpg" alt="7">
                        <p>リーダブルコードとは</p></li>
                        <li><img src="pic8.jpg" alt="8">
                        <p>HTMLの可能性</p></li>
                    </ul>
                </div>
            </div>
            <ul class="right">
                <h2>人気の記事</h2>
                <ul class="migi">
                    <li>PHPオススメ本</li><br>
                    <li>PHPMyAdminの使い方</li><br>
                    <li>今人気のエディタTops</li><br>
                    <li>HTMLの基礎</li><br>
                </ul>
                <br><br><br>
                <h2>オススメリンク</h2>
                <ul class="migi">
                    <li>ディーアイワークス株式会社</li><br>
                    <li>XAMPPのダウンロード</li><br>
                    <li>Eclicpseのダウンロード</li><br>
                    <li>Braketsのダウンロード</li><br>
                </ul>
                <br><br><br>
                <h2>カテゴリ</h2>
                <ul class="migi">
                    <li>HTML</li><br>
                    <li>PHP</li><br>
                    <li>MySQL</li><br>
                    <li>JavaScript</li>
                </ul>
            </div>
        </main>
        <footer>
            Copyright D.I.Works is the one which provides A to Z about programing
        </footer>
    </body>
</html>