<?php
//require_once("include/header.php");
//require_once("include/footer.php");
require_once $_SERVER['DOCUMENT_ROOT']."/include/header.php";
require_once $_SERVER['DOCUMENT_ROOT']."/include/footer.php";
require_once $_SERVER['DOCUMENT_ROOT']."/helper/db.php";
/* <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> */
?>

<?php
$title="スタミナ牛焼肉弁当｜旬彩｜千葉の宅配弁当 | ロケ弁 | 研修用 | 会議用 | オードブル | 仕出し弁当 | デリバリーならお弁当屋さん";
$meta_description="旬彩は千葉の宅配弁当、ロケ弁、研修用、会議用、オードブル、仕出し弁当、デリバリーを行っております。";
$meta_keywords="旬彩,千葉の宅配弁当,ロケ弁,研修用,会議用,オードブル,仕出し弁当,デリバリー";
Shunsai_HTML_Header($title,$meta_description,$meta_keywords);
?>
<?php 
    $slug = basename(__FILE__, ".php");
    $food = food($slug )
?>

<body>
	<!--header start-->
<div class="header">
    
	<?php
    Shunsai_Header();
    ?>
          
</div><!-- header end -->

<div class="wrap"><!--wrap start-->

<div class="main_wrap">

<div class="main_wrap_left">
<img src="../img/sutamina.jpg" alt="メニュー">

</div>

<div class="main_wrap_right">
<h3 class="title_menu">スタミナ牛焼肉弁当</h3>
<p class="comment">食べ応えのある大ぶりのかつと特製醤油たれに付け込んだ「鮮魚の照焼き」はボリュームたっぷり大満足の逸品です。 ※写真は炊き込みご飯です。</p>
<p class="price menu_price main_price">630円（税込）</p>

<div class="main_tel">
<span data-action="call" data-tel="047-894-5066"><img src="../img/order_tel.png" alt="047-894-5066"></span>
</div>

<div class="main_fax">
<a href="/pdf/fax.pdf" target="_blank"><img src="../img/order_fax.png" alt="047-894-5088"></a>
</div>

<br>
<h2>メールで注文する</h2>
<br>
<form method="post" id="order" name="order" action="/order/index.php">
<input type="hidden" name="name" value="<?= $food["name"] ?>">
<input type="hidden" name="slug" value="<?= $food["slug"] ?>">
<input type="hidden" name="price" value="<?= $food["price"] ?>">
<p>数量&nbsp;<input class="w30" type="number" min="1"><input class="p30" type="submit" value="ご注文ページへ"/></p>
</form>
<br>
<p class="shop_time">平日：9:00～20:00 / 土日祝：9:00～18:30（年中無休）</p>
</div>

</div>

</div><!--wrap end-->

<?php
Shunsai_Footer();
?>

</body>
</html>

