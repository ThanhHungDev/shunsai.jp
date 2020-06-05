<?php
//require_once("include/header.php");
//require_once("include/footer.php");
require_once $_SERVER['DOCUMENT_ROOT']."/include/header.php";
require_once $_SERVER['DOCUMENT_ROOT']."/include/footer.php";
require_once $_SERVER['DOCUMENT_ROOT']."/helper/session.php";
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

    Session::set("DATA_CONFIRM", $_POST);

    ?>
          
</div><!-- header end -->



<div class="wrap"><!--wrap start-->

<div class="wrap_inner">

<h2>ご注文内容確認</h2>
<form method="post" id="complete" name="complete" action="complete.php">
<input class="hidden-input" name="validate_order" value="<?= isset($_POST['validate_order']) ? $_POST['validate_order'] : 0 ?>" />
<input class="hidden-input" name="delivery_month" value="<?= isset($_POST['delivery_month']) ? $_POST['delivery_month'] : "" ?>" />
<input class="hidden-input" name="delivery_date" value="<?= isset($_POST['delivery_date']) ? $_POST['delivery_date'] : ''?>" />
<input class="hidden-input" name="delivery_time_start" value="<?= isset($_POST['delivery_time_start']) ? $_POST['delivery_time_start'] : '' ?>" />
<input class="hidden-input" name="delivery_time_end" value="<?= isset($_POST['delivery_time_end']) ? $_POST['delivery_time_end'] : '' ?>" />
<input class="hidden-input" name="name_customer" value="<?= isset($_POST['name_customer']) ? $_POST['name_customer'] : '' ?>" />
<input class="hidden-input" name="mobile" value="<?= isset($_POST['mobile']) ? $_POST['mobile'] : '' ?>" />
<input class="hidden-input" name="email" value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>" />
<input class="hidden-input" name="zip_1" value="<?= isset($_POST['zip_1']) ? $_POST['zip_1'] : '' ?>" />
<input class="hidden-input" name="address" value="<?= isset($_POST['address']) ? $_POST['address'] : '' ?>" />
<table class="order_wrap">
<tr>
<th class="order_goods">商品名</th>
<th class="order_number">個数</th>
<th class="order_price">金額</th>
</tr>


<?php 
$totalNumber = 0;
$totalPrice = 0;
?>
<?php if( isset($_POST['validate_order']) ): $numberRow = $_POST['validate_order']; $indexRow = 1; ?>
<?php while($numberRow): 
    $subIndex = "";
    if( $indexRow != 1 ){
        $subIndex = $indexRow;
    }
    if( !isset( $_POST['name'.$subIndex] )){
        $indexRow++;
        continue;
    }
    $totalNumber += $_POST['number'.$subIndex];
    $totalPrice += $_POST['number'.$subIndex] * $_POST['one-price'.$subIndex];
    ?>
    <tr>
        <td>
            <p><?= $_POST['name'.$subIndex] ?></p>
            <input class="hidden-input" name="name<?= $subIndex ?>" value="<?= $_POST['name'.$subIndex] ?>" />
            <input class="hidden-input" name="number<?= $subIndex ?>" value="<?= $_POST['number'.$subIndex] ?>" />
            <input class="hidden-input" name="one-price<?= $subIndex ?>" value="<?= $_POST['one-price'.$subIndex] ?>" />
        </td>
        <td class="order_number"><p><?= $_POST['number'.$subIndex] ?>&nbsp;個</p></td>
        <td class="order_price"><?= number_format($_POST['number'.$subIndex] * $_POST['one-price'.$subIndex]) ?>円</td>
    </tr>
    <?php 
    $numberRow--; 
    $indexRow++;
    ?>
<?php endwhile; ?>
<?php endif; ?>

<tr>
<td>合計</td>
<td class="order_number"><?= number_format($totalNumber) ?>個</td>
<td class="order_price"><?= number_format($totalPrice) ?>円</td>
</tr>

</table>

<table class="company_wrap">
<tr>
<th>お届け日</th>
<td>
    <?= isset($_POST['delivery_month']) ? $_POST['delivery_month'] : '' ?>&nbsp;月&nbsp;
    <?= isset($_POST['delivery_date']) ? $_POST['delivery_date'] : '' ?>&nbsp;日</td>
</tr>

<tr>
<th>お届け時間</th>
<td>
    <?= isset($_POST['delivery_time_start']) ? $_POST['delivery_time_start'] : '' ?>&nbsp;～&nbsp;
    <?= isset($_POST['delivery_time_end']) ? $_POST['delivery_time_end'] : '' ?></td>
</tr>

<tr>
<th>ご担当者名</th>
<td><?= isset($_POST['name_customer']) ? $_POST['name_customer'] : '' ?></td>
</tr>

<tr>
<th>電話番号</th>
<td><?= isset($_POST['mobile']) ? $_POST['mobile'] : '' ?></td>
</tr>

<tr>
<th>メールアドレス</th>
<td><?= isset($_POST['email']) ? $_POST['email'] : '' ?></td>
</tr>

<tr>
<th>お届け先住所</th>
<td>〒&nbsp;<?= isset($_POST['zip_1']) ? $_POST['zip_1'] : '' ?><br><br>
千葉県&nbsp;<?= isset($_POST['address']) ? $_POST['address'] : '' ?></td>
</tr>

</table>
<br>
<p align="center">ご注文内容を確認し注文確定ボタンを押して下さい。</p>
<br>
<p class="btn_link_back">
<a href="/order/index.php">
    <input type="button" value="注文入力画面に戻る" name="back"/>
</a>

</p>

<p class="btn_link"><input type="submit" value="注文確定"/></p>
</form>

</div>

</div><!--wrap end-->

<?php
Shunsai_Footer();
?>

</body>
</html>

