<?php
//require_once("include/header.php");
//require_once("include/footer.php");
require_once $_SERVER['DOCUMENT_ROOT']."/include/header.php";
require_once $_SERVER['DOCUMENT_ROOT']."/include/footer.php";
/* <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> */
?>

<?php
$title="ご注文結果｜旬彩｜千葉の宅配弁当 | ロケ弁 | 研修用 | 会議用 | オードブル | 仕出し弁当 | デリバリーならお弁当屋さん";
$meta_description="旬彩は千葉の宅配弁当、ロケ弁、研修用、会議用、オードブル、仕出し弁当、デリバリーを行っております。";
$meta_keywords="旬彩,千葉の宅配弁当,ロケ弁,研修用,会議用,オードブル,仕出し弁当,デリバリー";
Shunsai_HTML_Header($title,$meta_description,$meta_keywords);
?>

<body>
	<!--header start-->
<div class="header">
    
	<?php
    Shunsai_Header();
    ?>
          
</div><!-- header end -->



<div class="wrap"><!--wrap start-->

<div class="wrap_inner">

<h2>ご注文結果</h2>
<?php if ($success) { ?>
    <p class="area_title">ご注文が完了しました</p>
	<p>この度は、ご注文いただき、誠にありがとうございます。<br>到着までしばらくお待ちください。</p>
	<br><br><br><br>
	<p class="btn_link"><a href="../">トップページへ</a></p>
<?php } else { ?>
    <p class="area_title">送信エラーが発生しました</p>
	<p>ご注文は完了しておりません。<br>
    お手数をお掛け致しますがご注文入力ページへ戻り、最初から入力し直して下さい。</p>
	<br><br><br><br>
	<p class="btn_link"><a href="index.html">ご注文内容へ</a></p>
<?php } ?>
<br>

</div>

</div><!--wrap end-->

<?php
Shunsai_Footer();
?>

</body>
</html>

