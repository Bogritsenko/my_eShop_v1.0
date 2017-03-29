<script type="text/javascript">
<!--
$(document).ready(function(){
   $(".draggable").draggable({
      helper: "clone",
      addClasses: false,
      scope: "test", // Ограничение области видимости
      zIndex: 9000
   });
   $("#cart").droppable({
      scope: "test", // Ограничение области видимости
      activeClass: false,
      tolerance: "touch",
      accept: ".draggable",
      drop: function(e, ui) {  
      var str = ui.draggable.attr("id");
      arr = str.match(/\d+/g);
      id = arr[0];
      price = arr[1];
      add(id, price);
      }
   });
      
});
-->
</script>

<!-- ROW 1 -->
<tr>
<? foreach($select as $key=>$value){?>

<? if ($key < 3) {?>

<td width="20"><img src="view/img/spacer.gif" width="20" height="1"></td>
<!-- ROW IMAGES -->
<td align="center" width="33%">
	<table border="0" width="100%" cellpadding="0" cellspacing="0">
		<tbody>
			<tr>
				<td colspan="2" align="center">
                    <div  class="draggable" id="<?=$value['id']?>_<?=$value['price']?>">
				        <img src="view/img/<?=$value['id']?>.jpg" id="<?=$value['id']?>" class="<?=$value['price']?>" width="160" height="160"  border="0"/>
                     </div>   
				</td>
			</tr>
			<tr>
				<td align="center" class="item-title">
    				<a href="javascript:add(id = '<?=$value['id']?>', price = '<?=$value['price']?>')" >
							<img src="view/img/form-add.gif" width="16" height="16" border="0" title="Добавить в корзину."></a>
					<font color="#939393"><?=$value['name']?></font>
					<font  id="price"color="#494949">$<?=$value['price']?></font>
				</td>
			</tr>
			<tr>
				<td>
					<img src="view/img/spacer.gif" width="20" height="5">
				</td>
			</tr>
			<tr>
			
			</tr>
		</tbody>
	</table>
</td>
<? } ?>
    
<? }?>

</tr>   
<!-- END 1 -->


<? if (($size = count($select))>3) {?>
<!-- ROW next -->
<tr>
	<td colspan="6">
		<img src="view/img/spacer.gif" width="1" height="15">
	</td>
</tr>
<tr>
	<td colspan="6" background="view/img/general-sep.gif">
		<img src="view/img/spacer.gif" width="1" height="1">
	</td>
</tr>
<tr>
	<td colspan="6">
		<img src="view/img/spacer.gif" width="1" height="10">
	</td>
</tr>
<tr>
    
<? foreach($select as $key=>$value){?>

<? if ($key>=3) {?>

<td width="20"><img src="view/img/spacer.gif" width="20" height="1"></td>
<!-- ROW IMAGES -->
    <td align="center" width="33%">
	<table border="0" width="100%" cellpadding="0" cellspacing="0">
		<tbody>
			<tr>
				<td colspan="2" align="center">
				    <div  class="draggable" id="<?=$value['id']?>_<?=$value['price']?>">
				        <img src="view/img/<?=$value['id']?>.jpg" width="160" height="160"  border="0"/>
                     </div> 
				</td>
			</tr>
			<tr>
				<td align="center" class="item-title">
    				<a href="javascript:add(id = '<?=$value['id']?>',  price = '<?=$value['price']?>')" >
							<img src="view/img/form-add.gif" width="16" height="16" border="0" title="Добавить в корзину."></a>
					<font color="#939393"><?=$value['name']?></font>
					<font  id="price"color="#494949">$<?=$value['price']?></font>
				</td>
			</tr>
			<tr>
				<td>
					<img src="view/img/spacer.gif" width="20" height="5">
				</td>
			</tr>
			<tr>
			
			</tr>
		</tbody>
	</table>
</td>
<? } ?>

<? }?>

</tr>   
<!-- END next -->  
<?}?>


    
       
    
    	
       