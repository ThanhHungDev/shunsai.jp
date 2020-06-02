$(document).ready(function() {
	var flag = false;
	var pagetop = $('.pagetop');
	$(window).scroll(function () {
		if ($(this).scrollTop() > 400) {
			if (flag == false) {
				flag = true;
				pagetop.stop().animate({
					'right': '10px'
				}, 200);
			}
		} else {
			if (flag) {
				flag = false;
				pagetop.stop().animate({
					'right': '-80px'
				}, 200);
			}
		}
	});
	pagetop.click(function () {
		$('body, html').animate({ scrollTop: 0 }, 500);
		return false;
	});
});