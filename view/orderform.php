<tr>
    <td colspan="6" align="center">
        <h1>Регистрационая форма</h1>
    	
    </td>
</tr>
<tr>
    <td colspan="6" align="center">
        <div class='reg_block'>
        	<form action="index.php?c=order&act=form" method="post" enctype="text/plain">
            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                <tbody>
                    <tr>
                        <td><img src="view/img/spacer.gif" width="90" height="50"></td>
                        <td align="center"><label for="name" >Имя</label></td>
                        <td><input name="name" required size="30"><br /></td>
                    </tr>
                    <tr>
                        <td><img src="view/img/spacer.gif" width="90" height="50"></td>
                        <td><label for="secondname">Фамилия</label></td>
                        <td><input name="secondname" required size="30"><br /></td>
                    </tr>
                    <tr>
                    <td><img src="view/img/spacer.gif" width="90" height="50"></td>
                        <td><label for="email">email</label></td>
                        <td><input name="email" type="email" required><br /></td>
                    </tr>
                    <tr>
                        <td><img src="view/img/spacer.gif" width="90" height="50"></td>
                        <td><label for="tel">Телефон</label></td>
                        <td><input name="tel" type="tel" required size="30"><br /></td>
                    </tr>
                    <tr>
                        <td><img src="view/img/spacer.gif" width="90" height="50"></td>
                        <td><label for="status" >Форма доставки:</label></td>
                        <td>
                            <select name="status">
                                <option >email</option>
                                <option disabled="" >Курьер</option>
                                <option disabled="">Самовывоз</option>
                            </select><br />
                        </td>
                    </tr>
                    <tr>
                        <td><img src="view/img/spacer.gif" width="90" height="50"></td>
                        <td ><label for="date">Дата доставки</label></td>
                        <td><input name="date" type="date" required /><br /></td>
                    </tr>
                    <tr>
                        <td colspan="3" align="center"><br /><br />
                            <input type="submit" formaction="index.php?c=order&act=form" value="Отправить"class="button"/><br />
                        </td>
                    </tr>
                </tbody>
            </table>
            </form>
        </div>
    </td>
</tr>
<tr>
    <td colspan="6">
    	<img src="view/img/spacer.gif" width="1" height="15">
        
    </td>
</tr>