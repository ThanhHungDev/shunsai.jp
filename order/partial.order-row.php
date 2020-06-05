
<table  >
    <tbody id="js-order-partial-example" style="display: none;">
        <tr class="js-order">
            <td>
            
                <input class="name" readonly name="name" type="text" placeholder="チキン竜田生姜焼き弁当" value="">
                &nbsp;
                <input class="w50 remove" name="button" type="button" value="取消" onclick="removeRowOrder(this)">
                <input class="hidden-input js-order-price" id="js-order-price" name="one-price" />
            </td>
            <td class="order_number">
                <input class="w30 number" name="number" type="number" min="1" 
                onchange="changeOrderRow(this)" value="1">&nbsp;個
            </td>
            <td class="order_price" data-price=""></td>
        </tr>
    </tbody>
</table>