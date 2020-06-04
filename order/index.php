<?php
//require_once("include/header.php");
//require_once("include/footer.php");
require_once $_SERVER['DOCUMENT_ROOT'] . "/include/header.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/include/footer.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/helper/db.php";
/* <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> */
?>

<?php
$title = "ご注文内容｜旬彩｜千葉の宅配弁当 | ロケ弁 | 研修用 | 会議用 | オードブル | 仕出し弁当 | デリバリーならお弁当屋さん";
$meta_description = "旬彩は千葉の宅配弁当、ロケ弁、研修用、会議用、オードブル、仕出し弁当、デリバリーを行っております。";
$meta_keywords = "旬彩,千葉の宅配弁当,ロケ弁,研修用,会議用,オードブル,仕出し弁当,デリバリー";
Shunsai_HTML_Header($title, $meta_description, $meta_keywords);
?>

<body>
    <!--header start-->
    <div class="header">

        <?php
        Shunsai_Header();
        ?>

    </div><!-- header end -->
    <?php
    $food = array();
    
    if (isset($_POST) && isset($_POST['slug'])) {
        $food = food($_POST['slug']);
    }
    $number = isset($_POST['number']) && $_POST['number'] ? $_POST['number'] : 1;
    $price = isset($_POST['price']) ? $_POST['price'] : '';
    ?>


    <div class="wrap">
        <!--wrap start-->

        <div class="wrap_inner">
            <h2>ご注文内容</h2>
            <form method="post" id="js-form-order" name="confirm" action="confirm.php" class="js-form-order-validate">
                <table class="order_wrap">
                    <tr class="js-head-order">
                        <th class="order_goods">商品名</th>
                        <th class="order_number">個数</th>
                        <th class="order_price">単価</th>
                    </tr>

                    <?php if ($food) : ?>
                        <tr class="js-order" data-index="1">
                            <td>
                            
                                <input class="name" name="name" type="text" placeholder="チキン竜田生姜焼き弁当" value="<?= $food['name'] ?>">
                                &nbsp;
                                <input class="w50 remove" name="button" type="button"type="button" value="取消" onclick="removeRowOrder(this)">
                                <input class="hidden-input js-order-price" id="js-order-price" name="one-price" value="<?= $price * $number ?>" />
                            </td>
                            <td class="order_number">
                                <input class="w30 number" name="number" type="number" min="1" 
                                onchange="changeOrderRow(this)" value="<?= $number ?>">&nbsp;個
                            </td>
                            <td class="order_price" data-price="<?= $price ?>"><?= $price * $number ?>円</td>
                            
                        </tr>
                        
                    <?php endif; ?>

                    <tr>
                        <td colspan="3">
                            <a href="#js-select-food" rel="modal:open">+商品を追加する</a>
                            <input id="validate_order" type="text" name="validate_order" class="hidden-input" value=""/>
                        </td>

                    </tr>

                    <tr>
                        <td>合計</td>
                        <td id="js-total-number" class="order_number">個</td>
                        <td id="js-total-price" class="order_price">円</td>
                    </tr>

                </table>

                <table class="company_wrap">
                    <tr>
                        <th>お届け日</th>
                        <td>
                            <input name="delivery_month" class="w40" type="number" min="1" max="12">&nbsp;月&nbsp;
                            <input name="delivery_date" class="w40" type="number" min="1" max="31">&nbsp;日
                        </td>
                    </tr>

                    <tr>
                        <th>お届け時間</th>
                        <td>
                            <input name="delivery_time_start" class="w80" type="time">&nbsp;～&nbsp;
                            <input name="delivery_time_end" type="time" class="w80">
                        </td>
                    </tr>

                    <tr>
                        <th>ご担当者名</th>
                        <td><input type="text" name="name_customer"></td>
                    </tr>

                    <tr>
                        <th>電話番号</th>
                        <td><input type="tel" class="w160" name="mobile"></td>
                    </tr>

                    <tr>
                        <th>メールアドレス</th>
                        <td><input type="email" name="email"></td>
                    </tr>

                    <tr>
                        <th>お届け先住所</th>
                        <td>〒&nbsp;
                            <input class="w80" id="js_zip1" name="zip_1" type="text" placeholder="2702261" maxlength="8"><br><br>
                            千葉県&nbsp;
                            <input class="w85" type="text" name="address" placeholder="市区町村以降"></td>
                    </tr>

                </table>
                <br>
                <p class="btn_link"><input type="submit" id="confirm" name="confirm" value="内容確認画面へ" /></p>
                <!---onClick="return chkInput();" -->
            </form>

        </div>

    </div>
    <!--wrap end-->

    <?php
    Shunsai_Footer();
    ?>
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/order/modal.order-more.php"; ?>
    <?php echo  file_get_contents( $_SERVER['DOCUMENT_ROOT'] . "/order/partial.order-row.php") ?>
</body>

</html>