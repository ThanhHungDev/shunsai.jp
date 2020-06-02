//ドロワーメニュー
$(function($) {
	WindowHeight = $(window).height();
	$('.drawr').css('height', WindowHeight); //メニューをwindowの高さいっぱいにする
	
	$(document).ready(function() {
		$('.sidr-btn').click(function(){ //クリックしたら
			$('.drawr').animate({width:'toggle'}); //animateで表示・非表示
			$(this).toggleClass('peke'); //toggleでクラス追加・削除
		});
	});
});