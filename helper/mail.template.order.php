<!DOCTYPE html>
<html lang="ja">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<head>
    <meta charset="UTF-8">
    <style type="text/css">
        .res_container {
            background-color: #fff;
        }
    </style>
</head>

<body style="background-color: #eff3f8;">
    <div class="wrapper-page">
        <div class="res_container">

            <div class="infor-message">
                <p><?= $title ?></p>
                <?php if (!empty($post)) : ?>
                    <table class="order_wrap">

                        <?php
                        $totalNumber = 0;
                        $totalPrice = 0;
                        ?>
                        <?php if (isset($post['validate_order'])) : $numberRow = $post['validate_order'];
                            $indexRow = 1; ?>
                            <?php while ($numberRow) :
                                $subIndex = "";
                                if ($indexRow != 1) {
                                    $subIndex = $indexRow;
                                }
                                if (!isset($post['name' . $subIndex])) {
                                    $indexRow++;
                                    continue;
                                }
                                $totalNumber += $post['number' . $subIndex];
                                $totalPrice += $post['number' . $subIndex] * $post['one-price' . $subIndex];
                            ?>
                                <tr>
                                    <td>
                                        <p><?= $post['name' . $subIndex] ?></p>
                                    </td>
                                    <td class="order_number">
                                        <p><?= $post['number' . $subIndex] ?>&nbsp;個</p>
                                    </td>
                                    <td class="order_price"><?= $post['number' . $subIndex] * $post['one-price' . $subIndex] ?>円</td>
                                </tr>
                                <?php
                                $numberRow--;
                                $indexRow++;
                                ?>
                            <?php endwhile; ?>
                        <?php endif; ?>

                        <tr>
                            <td>合計個数：</td>
                            <td><?= $totalNumber ?>個</td>
                        </tr>
                        <tr>
                            <td>合計金額：</td>
                            <td><?= $totalPrice ?>円</td>
                        </tr>

                    </table>

                    <table class="company_wrap">
                        <tr>
                            <th>お届け日：</th>
                            <td><?= $post['delivery_month'] ?>&nbsp;月&nbsp;<?= $post['delivery_date'] ?>&nbsp;日</td>
                        </tr>

                        <tr>
                            <th>お届け時間：</th>
                            <td> <?= $post['delivery_time_start'] ?>&nbsp;～&nbsp;<?= $post['delivery_time_end'] ?></td>
                        </tr>

                        <tr>
                            <th>ご担当者名：</th>
                            <td><?= $post['name_customer'] ?></td>
                        </tr>

                        <tr>
                            <th>電話番号：</th>
                            <td><?= $post['mobile'] ?></td>
                        </tr>

                        <tr>
                            <th>メールアドレス：</th>
                            <td><?= $post['email'] ?></td>
                        </tr>

                        <tr>
                            <th>お届け先住所：</th>
                            <td>〒&nbsp;<?= $post['zip_1'] ?> 千葉県&nbsp;<?= $post['address'] ?></td>
                        </tr>

                    </table>
                <?php endif; ?>
            </div>

        </div>
    </div>
</body>

</html>