<? if (empty($select)) {?>
<tr>
    <td colspan="6">
    	<img src="view/img/spacer.gif" width="1" height="15">
    </td>
</tr>
<tr>
    <td colspan="6">
    	<div align="center" id="notbs">
            <p>
                <a href="" style="color: #CCC; background-color: #ffffff;">Ваша корзина пуста:</a>
                <a href="javascript:window.history.back()">Продолжить покупки</a>
            </p>
        </div>
    </td>
</tr>
<tr>
    <td colspan="6">
    	<img src="view/img/spacer.gif" width="1" height="255">
    </td>
</tr>


<? }else{?>
<tr>
    <td colspan="6">
    	<img src="view/img/spacer.gif" width="1" height="15">
    </td>
</tr>
<tr>
    <noindex>
        <td colspan="6">
            <table border="0" width="100%" cellpadding="5" cellspacing="5" bgcolor="">
                <tbody>
                    <tr>
                       	<td colspan="5" align="center">
                            <h1>Ваша корзина</h1>		
                        </td>
                    </tr>
                    <tr>
                       	<td colspan="5">
                        	<div align="right" id="bs">
                                <p><a href="javascript:window.history.back()">Продолжить покупки</a></p>
                            </div>
                        </td>
                    </tr>
                    <tr bgcolor="#FAFAFA" style="background-color: #99CCFF"  align="center">
                       	<td colspan="3" id="bs">Наименование</td>
                        <td id="bs">Колличество/Сумма</td>
                        <td id="bs">Дейсвия</td>
                    </tr>
                    <? foreach($select as $key=>$value) {?>
                    <tr style="background-color: #FAFAFA" >
                       	<td colspan="3" align="center">
                        <p>
                            <img id="<?=$value['id']?>" src="view/img/<?=$value['id']?>.jpg" width="160" height="160" name="<?=$value['id']?>" border="0">
                        </p>
                        <p>
                            <font color="#000033"><?=$value['name']?></font>
                        </p>
                        
                        </td>
                        <td align="center">
                            <p>&nbsp;</p>
                            <p id="bs">Колличество: &nbsp;<input type="number" size="3" value="<?=$value['quantity']?>" onblur="update(id = '<?=$value['id']?>', quantity = this.value)"> шт.</p>
                            <p>&nbsp;</p>
                        </td>
                        
                        <td align="center">
                            <div align="center" id="bs">
                                <p><a href="index.php?c=basket&act=delete&id=<?=$value['id']?>">Удалить&nbsp;&nbsp;</a></p>
                            </div>
                        </td>
                    </tr>
                    <? }?>
                    <tr bgcolor="#FAFAFA" style="background-color: #FAFAFA">
                       	<td colspan="3">
                           <div align="center" id="bs">
                                <p >
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ваш заказ на сумму:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                </p>
                            </div
                         </td>
                       	<td>
                            <?
                            $allsum = '';
                            foreach($select as $key=>$value) 
                            {
                                $allsum += $value['sum'];
                                
                            }
                            ?>
                           <div align="center" id="bs">
                                <p id="totalSum"><?=$allsum?></p>
                            </div
                        </td>
                        <td >
                        	<div align="center" id="bs">
                                <p><a href="index.php?c=basket&act=resave">Оформить заказ</a></p>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </td>
    </noindex>
</tr>
<tr>
    <td colspan="6">
    	<img src="view/img/spacer.gif" width="1" height="15">
    </td>
</tr>


<? }?>




    
       
    
    	
       