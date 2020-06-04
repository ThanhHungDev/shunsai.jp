//ドロワーメニュー
$(function($) {
	WindowHeight = $(window).height();
	$('.drawr').css('height', WindowHeight); //メニューをwindowの高さいっぱいにする
	
	$(document).ready(function() {
		$('.sidr-btn').click(function(){ //クリックしたら
			$('.drawr').animate({width:'toggle'}); //animateで表示・非表示
			$(this).toggleClass('peke'); //toggleでクラス追加・削除
		});

		var orders = document.getElementsByClassName("js-item-order")
		if( orders.length ){
			$(".js-item-order").click( function (){
				$(this).toggleClass("active")
			})
		}

		$('#js-select-food').on($.modal.OPEN, function(event, modal) {
			/// remove all active
			$(".js-item-order").removeClass("active")
		});
		$(".btn-add-item-order").click(function(){
			var ordersActive = $(".js-item-order.active")
			if(ordersActive.length){
				var inputIndex = 1
				
				for (let index = 0; index < ordersActive.length; index++) {
					var name = $(ordersActive[index]).attr("data-name")
					var price = $(ordersActive[index]).attr("data-price")
					var neworder = createNewOrder(  )
					var ordersTr = $("form .js-order").last()
					
					
					if( ordersTr.length ){

						inputIndex = $(ordersTr[0]).attr("data-index")
						ordersTr.after(neworder)
					}else{
						var ordersTr = $("form .js-head-order").last()
						ordersTr.after(neworder)
					}
					inputIndex = parseInt(inputIndex) + 1
					updateOrder(name, price, inputIndex)	
				}
			}
			$.modal.close();
			bindTotalOrder()
			$("#validate_order").focus()
			$("#validate_order").blur()
		})
	});

	bindTotalOrder()

	
});
$.modal.OPEN = 'modal:open';


function createNewOrder(  ){
	var exampleOrderRow = document.getElementById("js-order-partial-example")
	return exampleOrderRow.innerHTML
}
function updateOrder(name, price, inputIndex){
	
	var exampleOrderRow = $("form .js-order").last()
	if( exampleOrderRow ){
		exampleOrderRow.attr("data-index", inputIndex)
		exampleOrderRow.find("input").each(function( index, ele ) {
			console.log( $( ele ).attr("name") )
			$( ele ).attr("name", ($( ele ).attr("name") + inputIndex) )
		})
		if( $(exampleOrderRow).find(".name").length ){
			var input = $(exampleOrderRow).find(".name")[0]
			$(input).val(name)
		}
		if( $(exampleOrderRow).find(".number").length ){
			var input = $(exampleOrderRow).find(".number")[0]
			$(input).val(1)
		}
		$(exampleOrderRow).find(".order_price").attr('data-price', price)
		$(exampleOrderRow).find(".order_price").text(price + '円')
		$(exampleOrderRow).find(".js-order-price").val(price)
		
	}
}

function changeOrderRow(e){
	var number = $( e ).val()
	var order_price = $( e ).closest( 'tr' ).find(".order_price")
	if( order_price.length ){
		var totalRePrice = $(order_price[0]).attr('data-price')
		$(order_price[0]).text( parseInt(number) * parseInt(totalRePrice) + '円' )
	}
	bindTotalOrder()
}
function bindTotalOrder(){
	console.log("ac")
	var form = $("#js-form-order")
	var bindNumber = $("#js-total-number")
	var bindPrice = $("#js-total-price")
	if( bindNumber && bindPrice ){
		var total_order_number = 0
		var total_order_price = 0
		console
		form.find(".js-order .order_number").each(function() {
			console.log($(this).find("input.number"))
			var inputNumber = $(this).find("input.number");
			if(inputNumber.length){
				var inputNumber = $(this).find("input.number")[0]
				var order_number = parseInt($(inputNumber).val())
				total_order_number += order_number
				var priceDom = $(this).closest("tr").find(".order_price")
				if( priceDom.length ){
					console.log( $(priceDom[0]).attr("data-price"))
					total_order_price += ( parseInt($(priceDom[0]).attr("data-price")) * order_number)
				}
			}
			
		});
		
		if( total_order_number ){
			bindNumber.text(total_order_number + "個")
		}
		if( total_order_price ){
			bindPrice.text(total_order_price + "円")
		}
	}
	if(document.getElementById("validate_order"))
		document.getElementById("validate_order").value = $("#js-form-order .js-order").length
}

function removeRowOrder(ele){
	
	$( ele ).closest('tr').remove()
	bindTotalOrder()
}
