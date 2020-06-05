<?php

//Load composer's autoloader
require_once $_SERVER['DOCUMENT_ROOT'].'/helper/sendmail.php';


//require_once("include/header.php");
//require_once("include/footer.php");
require_once $_SERVER['DOCUMENT_ROOT']."/include/header.php";
require_once $_SERVER['DOCUMENT_ROOT']."/include/footer.php";
require_once $_SERVER['DOCUMENT_ROOT']."/helper/session.php";
/* <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> */
?>

<?php
$title="ご注文結果｜旬彩｜千葉の宅配弁当 | ロケ弁 | 研修用 | 会議用 | オードブル | 仕出し弁当 | デリバリーならお弁当屋さん";
$meta_description="旬彩は千葉の宅配弁当、ロケ弁、研修用、会議用、オードブル、仕出し弁当、デリバリーを行っております。";
$meta_keywords="旬彩,千葉の宅配弁当,ロケ弁,研修用,会議用,オードブル,仕出し弁当,デリバリー";
Shunsai_HTML_Header($title,$meta_description,$meta_keywords);

$success = false;
$confirmData = Session::getFlash("DATA_CONFIRM");

if( !empty($confirmData) ){

	$_config['email']['smtp']['host'] = 'mp-co.sakura.ne.jp';
	$_config['email']['smtp']['port'] = '587';
	$_config['email']['username'] = 'test@management-partners.co.jp';
	$_config['email']['password'] = 'Wbi6KQsv';
	$_config['email']['default_email'] = 'test@management-partners.co.jp';

		
	$mailler = new MailHelper();
	$mailObject = $mailler
	->setConfig($_config)
	->setSMTPDebug(4)
	->setFrom("noreply@shunsai.jp")
	->setFromName("noreply@shunsai.jp")
	->setTo($confirmData['email'])
	->setToName($confirmData['name_customer'])
	->setSubject('【旬菜】ご注文ありがとうございます。')
	->setView( $_SERVER['DOCUMENT_ROOT'].'/helper/mail.template.order.php')
	->setCC(['pg@management-partners.co.jp'])
	->setData(array( 
		"post" => $confirmData, 
		'title' => "以下の内容でご注文を承りました。",
		"footer" => "注文の変更やキャンセルはお電話にてお願いいたします。",
		"mobile" =>  "047-894-5066"
	))
	->create();

	try {
		$success = $mailObject->send();
	} catch (\Throwable $th) {
		//throw $th;
	}

	$mailObject = $mailler
	->setConfig($_config)
	->setSMTPDebug(4)
	->setFrom("noreply@shunsai.jp")
	->setFromName("noreply@shunsai.jp")
	->setTo("master@management-partners.co.jp")
	->setToName($confirmData['name_customer'])
	->setSubject('【旬菜】注文がありました。')
	->setView( $_SERVER['DOCUMENT_ROOT'].'/helper/mail.template.order.php')
	->setCC(['pg@management-partners.co.jp'])
	->setData(array( "post" => $confirmData, 'title' => "注文がありました。" ))
	->create();

	try {
		$success = $mailObject->send();
	} catch (\Throwable $th) {
		//throw $th;
	}
}

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

