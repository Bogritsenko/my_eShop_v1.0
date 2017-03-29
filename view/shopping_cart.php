<div id="cart">

    <!-- Important Checkout Settings -->
	<form name="checkout" action="index.php?">
	<input type="hidden" name="c" value="basket">
    <!-- End Settings -->		

	<table border="0" cellpadding="0" cellspacing="0" width="100%" height="110">

	<!-- The shadow: here, we branch depending on if we're Windows IE or not -->

	<tr><td height="12"><img src="view/img/cart-shadow.jpg" width="100%" height="12"></td></tr>

	<tr><td bgcolor="#EDF8FF" background="view/img/cart-undershadow.gif" height="3"><img src="view/img/spacer.gif" width="1" height=3"></td></tr>
	
	<tr height="100%" valign="top" style="background-color: #edf8ff" id="cart-main"><td>
	
	<!-- Upper-left Header -->
    <script type="text/javascript">
<!--
function f_result(xml) {
   var status = $("status", xml).eq(0).text();
   if (status == "ok") {
      $("#total").val("");
   }
}
$(document).ready(function() {
   $("#clear").click(function() {
     $("#total").val("111");
      $.post("ajax.php", {must: die}, f_result, "xml");
      return false;
   });
   
});
//-->
</script>
	
	<table border="0" cellpadding="0" cellspacing="0">
	<tr><td><img src="view/img/cart-header.jpg" width="27" height="21"></td>
	<td>
       <span class="cart-header">Корзина</span> &nbsp;
        <span class="cart-header2" id="carthelp2" style="visibility: visible; ">Перетащите в корзину ваш выбор
        </span>
    </td></tr>
	</table>
	
	<!-- Temporary "Help" Layer -->
	
	<div id="carthelp" style="position: absolute; visibility: hidden; width: 100%;">
	<table border="0" width="100%" cellpadding="0" cellspacing="0"><tr><td align="center">
		<table border="0"><tr><td><img src="view/img/cart-helparrow.jpg" width="48" height="43"></td>
		<td class="cart-help">drag any item here to add it to your cart</td>
		</tr></table>
	</td></tr></table>
	</div>
	
	<!-- Cart Content Slots -->

	<div id="cartcontents" style="position: relative; visibility: visible">
	<table border="0" width="100%" cellpadding="0" cellspacing="0"><tr><td><center>
		<table border="0" cellpadding="0" cellspacing="0">
		<tr>
		
		<!-- Cart Items -->

		<td></td>

                <!-- "Here's a great idea! Composite the size and quantity badges on the fly!", says I. Ugh. -->

		<td>
		<div style="display: none; float: left; width: 55px; height: 55px" id="cartslot-0-block">
                  <div style="background: url('view/img/spacer.gif') no-repeat;" id="cartslot-0-item">
                    <div style="background: url('view/img/spacer.gif') no-repeat;" id="cartslot-0-var">
                      <div style="background: url('view/img/spacer.gif') no-repeat;" id="cartslot-0-qty">
                        <img src="view/img/spacer.gif" width="55" height="55" id="cartslot-0-drag" name="cartslot-0-drag">
                      </div>
                    </div>
                  </div>
                </div>
		</td>

		<td>
		<div style="display: none; float: left; width: 55px; height: 55px" id="cartslot-1-block">
                  <div style="background: url('view/img/spacer.gif') no-repeat;" id="cartslot-1-item">
                    <div style="background: url('view/img/spacer.gif') no-repeat;" id="cartslot-1-var">
                      <div style="background: url('view/img/spacer.gif') no-repeat;" id="cartslot-1-qty">
                        <img src="view/img/spacer.gif" width="55" height="55" id="cartslot-1-drag" name="cartslot-1-drag">
                      </div>
                    </div>
                  </div>
                </div>
		</td>

		<td>
		<div style="display: none; float: left; width: 55px; height: 55px" id="cartslot-2-block">
                  <div style="background: url('view/img/spacer.gif') no-repeat;" id="cartslot-2-item">
                    <div style="background: url('view/img/spacer.gif') no-repeat;" id="cartslot-2-var">
                      <div style="background: url('view/img/spacer.gif') no-repeat;" id="cartslot-2-qty">
                        <img src="view/img/spacer.gif" width="55" height="55" id="cartslot-2-drag" name="cartslot-2-drag">
                      </div>
                    </div>
                  </div>
                </div>
		</td>

		<td>
		<div style="display: none; float: left; width: 55px; height: 55px" id="cartslot-3-block">
                  <div style="background: url('view/img/spacer.gif') no-repeat;" id="cartslot-3-item">
                    <div style="background: url('view/img/spacer.gif') no-repeat;" id="cartslot-3-var">
                      <div style="background: url('view/img/spacer.gif') no-repeat;" id="cartslot-3-qty">
                        <img src="view/img/spacer.gif" width="55" height="55" id="cartslot-3-drag" name="cartslot-3-drag">
                      </div>
                    </div>
                  </div>
                </div>
		</td>

		<td>
		<div style="display: none; float: left; width: 55px; height: 55px" id="cartslot-4-block">
                  <div style="background: url('view/img/spacer.gif') no-repeat;" id="cartslot-4-item">
                    <div style="background: url('view/img/spacer.gif') no-repeat;" id="cartslot-4-var">
                      <div style="background: url('view/img/spacer.gif') no-repeat;" id="cartslot-4-qty">
                        <img src="view/img/spacer.gif" width="55" height="55" id="cartslot-4-drag" name="cartslot-4-drag">
                      </div>
                    </div>
                  </div>
                </div>
		</td>

		<td>
		<div style="display: none; float: left; width: 55px; height: 55px" id="cartslot-5-block">
                  <div style="background: url('view/img/spacer.gif') no-repeat;" id="cartslot-5-item">
                    <div style="background: url('view/img/spacer.gif') no-repeat;" id="cartslot-5-var">
                      <div style="background: url('view/img/spacer.gif') no-repeat;" id="cartslot-5-qty">
                        <img src="view/img/spacer.gif" width="55" height="55" id="cartslot-5-drag" name="cartslot-5-drag">
                      </div>
                    </div>
                  </div>
                </div>
		</td>
		
		<td>
		<div style="display: none; float: left; width: 55px; height: 55px" id="cartslot-6-block">
                  <div style="background: url('view/img/spacer.gif') no-repeat;" id="cartslot-6-item">
                    <div style="background: url('view/img/spacer.gif') no-repeat;" id="cartslot-6-var">
                      <div style="background: url('view/img/spacer.gif') no-repeat;" id="cartslot-6-qty">
                        <img src="view/img/spacer.gif" width="55" height="55" id="cartslot-6-drag" name="cartslot-6-drag">
                      </div>
                    </div>
                  </div>
                </div>
		</td>

		<td>
		<div style="display: none; float: left; width: 55px; height: 55px" id="cartslot-7-block">
                  <div style="background: url('view/img/spacer.gif') no-repeat;" id="cartslot-7-item">
                    <div style="background: url('view/img/spacer.gif') no-repeat;" id="cartslot-7-var">
                      <div style="background: url('view/img/spacer.gif') no-repeat;" id="cartslot-7-qty">
                        <img src="view/img/spacer.gif" width="55" height="55" id="cartslot-7-drag" name="cartslot-7-drag">
                      </div>
                    </div>
                  </div>
                </div>
		</td>

		<td>
		<div style="display: none; float: left; width: 55px; height: 55px" id="cartslot-8-block">
                  <div style="background: url('view/img/spacer.gif') no-repeat;" id="cartslot-8-item">
                    <div style="background: url('view/img/spacer.gif') no-repeat;" id="cartslot-8-var">
                      <div style="background: url('view/img/spacer.gif') no-repeat;" id="cartslot-8-qty">
                        <img src="view/img/spacer.gif" width="55" height="55" id="cartslot-8-drag" name="cartslot-8-drag">
                      </div>
                    </div>
                  </div>
                </div>
		</td>

		</td>

		<td></td>
		
		<!-- Cart Total / Check Out -->
		
		<td><img src="view/img/spacer.gif" width="15" height="55"></td>

		<td><center><input type="submit" value="Заглянуть в корзину" formaction="index.php?c=basket"><br>
		<img src="view/img/spacer.gif" width="1" height="4"><br>
		<span class="cart-total">Сумма: </span>
        <span class="cart-total-dark">$</span>
        <span class="cart-total-dark" id="total"></span>
		</center></td>
	
		</tr>
		</table>
	</center></td></tr></table>
	</div>
	
	</td></tr>
	</table>
	
	</form>
	
</div>
				

<div id="ItemDrag" style="left: 511px; top: 850px; visibility: hidden; ">
    <img src="view/img/drag.jpg" name="DragImage" id="DragImage" width="55" height="55">
</div>