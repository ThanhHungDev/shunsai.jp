<?php
//require_once("include/header.php");
//require_once("include/footer.php");
require_once $_SERVER['DOCUMENT_ROOT']."/include/header.php";
require_once $_SERVER['DOCUMENT_ROOT']."/include/footer.php";
/* <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> */
?>

<?php
$title="ご注文内容確認｜旬彩｜千葉の宅配弁当 | ロケ弁 | 研修用 | 会議用 | オードブル | 仕出し弁当 | デリバリーならお弁当屋さん";
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

<h2>ご注文内容確認</h2>
<form method="post" id="complete" name="complete" action="complete.php">
<table class="order_wrap">
<tr>
<th class="order_goods">商品名</th>
<th class="order_number">個数</th>
<th class="order_price">単価</th>
</tr>

<tr>
<td><input type="text" placeholder="チキン竜田生姜焼き弁当"></td>
<td class="order_number"><input class="w30" type="number" min="1">&nbsp;個</td>
<td class="order_price">630円</td>
</tr>


<tr>
<td>合計</td>
<td class="order_number">個</td>
<td class="order_price">円</td>
</tr>

</table>

<table class="company_wrap">
<tr>
<th>お届け日</th>
<td><input class="w40" type="number" min="1" max="12">&nbsp;月&nbsp;<input class="w40" type="number" min="1" max="31">&nbsp;日</td>
</tr>

<tr>
<th>お届け時間</th>
<td><input class="w80" type="time">&nbsp;～&nbsp;<input type="time" class="w80"></td>
</tr>

<tr>
<th>ご担当者名</th>
<td><input type="text"></td>
</tr>

<tr>
<th>電話番号</th>
<td><input type="tel" class="w160"></td>
</tr>

<tr>
<th>メールアドレス</th>
<td><input type="email"></td>
</tr>

<tr>
<th>お届け先住所</th>
<td>〒&nbsp;<input class="w80" id="js_zip1" name="zip_1" type="text" placeholder="2702261" maxlength="8"><br><br>
千葉県&nbsp;<input class="w85" type="text" placeholder="市区町村以降"></td>
</tr>

</table>
<br>
<p align="center">ご注文内容を確認し注文確定ボタンを押して下さい。</p>
<br>
<p class="btn_link_back"><input type="button" onclick="history.back()" value="注文入力画面に戻る" name="back"/></p>

<p class="btn_link"><input type="submit" value="注文確定"/></p>
</form>

</div>

</div><!--wrap end-->

<?php
Shunsai_Footer();
?>

</body>
</html>

