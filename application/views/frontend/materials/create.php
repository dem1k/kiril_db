
<!--h1>Создать материал</h1-->


<?= form_open('/materials/create');?>
<!--table>
    <tr>
        <td>Название</td>
        <td><?=form_input(array(
                    'name'        => 'name',
                    'id'          => 'name',
                    )
                    )?></td>
    </tr>
    <tr>
        <td></td>
        <td><?=form_textarea(array(
                    'name'        => 'description',
                    'id'          => 'description',
                    )
                    )?></td>
    </tr>


</table-->


<div class="clr"></div>
  <div class="add_materials">
 <?=form_input(array(
                    'name'        => 'name',
                    'id'          => 'name',
                    )
                    )?>
 <div class="add_materails_field">
 <ul>
 <li>Цена:<?=form_input(array(
                    'name'        => 'name',
                    'id'          => 'name',
                    )
                    )?></li>
 <li>Ед. изм.<?=form_input(array(
                    'name'        => 'name',
                    'id'          => 'name',
                    )
                    )?></li>
 <li>Дата изменения:</li>
 </ul>
 <input name="cancel" type="button" value=" " id="cancel" /> <input name="send" type="button" id="send" value=" " />
 </div><!--end.add_materials_field -->
  </div><!--end.add_materials -->
<!--?=form_submit(array('value'=>'save'));?-->
<?= form_close();?>