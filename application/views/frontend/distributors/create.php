
<h1>Создать поставщики</h1>


<?= form_open('/distributors/create');?>
<table>
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


</table>
<?=form_submit(array('value'=>'save'));?>
<?= form_close();?>