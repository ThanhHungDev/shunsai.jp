<?php
/* <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> */
/***********************************************************
	HTMLヘッダ
***********************************************************/
function Shunsai_HTML_Header($title,$meta_description,$meta_keywords,$meta_add='') {
print <<< Shunsai_HTML_Header

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,user-scalable=no,maximum-scale=1" />
	<title>$title</title>
	<meta name="Keywords" content="$meta_keywords" />
	<meta name="Description" content="$meta_description" />
	<meta http-equiv="imagetoolbar" content="no" />
	<link rel="stylesheet" href="/css/common.css">
	<link rel="stylesheet" href="/css/pc.css">
	<link rel="stylesheet" href="/css/sp.css">
	<link rel="shortcut icon" href="/favicon/favicon.ico">
	<link href="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.css" rel="stylesheet">
	<code><script src="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.js"></script></code>
	
	<script src="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.js"></script>
	<script type="text/javascript" src="/js/jquery.js"></script>
	<script src="/js/drawr.js"></script>
	<script src="/js/pagetop.js"></script>
	<script src="/js/tel.js"></script>
	

<script type="text/javascript">
$(function() {
	$('#nav span').css({ 
		width: $('#nav .current').outerWidth(),
		left: $('#nav .current').position().left 
	});
	$('#nav a').mouseover(function(){
		$('#nav span').stop().animate({
			width: $(this).outerWidth(),
			left: $(this).position().left}
		,{ duration: 170, easing: 'linear', }); 
	});
});
</script>

<script>
// aosの初期化
AOS.init();

// オプションも追加出来ます
/*
 AOS.init({
        easing: 'ease-out-back',
        duration: 1000
        });
*/
</script>


</head>

Shunsai_HTML_Header;
}

/***********************************************************
	ヘッダー
***********************************************************/
function Shunsai_Header() {

	print <<< Shunsai_Header

    <div class="header_wrap">
    
        <div class="left_header">
        <h1>千葉の宅配弁当・ロケ弁・研修用・会議用・オードブル・仕出し弁当</h1>
        <a href="/"><img src="/img/logo.png" alt="お弁当屋さん"></a>
        </div>
    
        <div class="right_header">
        <ul>
        <li><span data-action="call" data-tel="047-311-5131">
        <img src="/img/tel.png" alt="047-311-5131"></span>
        </li>
        <li>
        <a href="/pdf/fax.pdf" target="_blank"><img src="/img/fax.png" alt="047-311-5131"></a>
        </li>
        
        </ul>
        <p>平日：9:00～20:00 / 土日祝：9:00～18:30</p>
        
        </div>
    
    </div>
    
    
    <!-- nav start -->
    <a class="sidr-btn"></a>
    <nav class="nav">
    
        <div class="drawr">
        <div class="navin">
        
        <div id="menu">
        <div id="nav">
        
        <ul id="fade_in" class="dropmenu">
        <li><a href="/">トップ</a></li>
        <li><a href="/menu/">弁当一覧</a></li>
        <li><a href="/area/">配達エリア</a></li>
        <li><a href="/company/">店舗情報</a></li>
        <li><a href="/contact/">お問い合わせ</a></li>
        
        </ul>
        
        </div>
        </div>
        </div>
        </div>
    </nav><!-- nav end -->

Shunsai_Header;
}
?>