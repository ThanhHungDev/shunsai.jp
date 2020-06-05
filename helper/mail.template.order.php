
<?php 
$totalNumber = 0;
$totalPrice = 0;

$bodyContent = "<b>" . $title . "</b><br/><br/>";

if (!empty($post)) :
    if (isset($post['validate_order'])):
        $numberRow = $post['validate_order'];
        $indexRow = 1; 
        while ($numberRow) :
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
            

            $bodyContent .= "<b>" . $post['name' . $subIndex] . " : </b> " ;
            $bodyContent .= "&nbsp; &nbsp; " . $post['number' . $subIndex]  ."&nbsp;個  &nbsp;&nbsp; ";
            $bodyContent .= "&nbsp; &nbsp; " . number_format($post['number' . $subIndex] * $post['one-price' . $subIndex])  ."&nbsp;円  <br/> ";
        
            $numberRow--;
            $indexRow++;
        endwhile;
    endif;

    
    $bodyContent .= "<b>合計個数：</b> " . number_format($totalNumber) ." 個 <br/> " ;
    $bodyContent .= "<b>合計金額：</b> " . number_format($totalPrice) ." 円 <br/><br/><br/> " ;

    $bodyContent .= "<b>お届け日：</b>".$post['delivery_month']." &nbsp;月&nbsp;".$post['delivery_date'] ."&nbsp;日 <br/> " ;
    $bodyContent .= "<b>お届け時間：</b> ".$post['delivery_time_start']."&nbsp;～&nbsp;".$post['delivery_time_end']."<br/>" ;
    $bodyContent .= "<b>ご担当者名：</b> ".$post['name_customer']."<br/> " ;
    $bodyContent .= "<b>電話番号</b> " . $post['mobile'] ."<br/> " ;
    $bodyContent .= "<b>メールアドレス：</b> " . $post['email'] ."<br/> " ;
    $bodyContent .= "<b>お届け先住所：</b> 〒&nbsp;" .  $post['zip_1'] ." 千葉県&nbsp;" ;
    $bodyContent .= $post['address'] ."<br/></br /> <br/>" ;

    if( isset($footer) && isset($mobile) ){
        $bodyContent .= $footer . " <br/> " . $mobile ;
    }
    

    

endif;


echo $bodyContent;

