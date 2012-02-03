<h1>Изменить поставщика: <?=$object->name?></h1>

<?= form_open('/distributors/edit/'.$object->id);?>
<table>
    <tr>
        <td>Название</td>
        <td><?=form_input(array(
                    'name'        => 'name',
                    'id'          => 'name',
                    'value'=>set_value('name',$object->name),
                    )
                    )?></td>
    </tr>
    <tr>
        <td>коэф.</td>
        <td><?=form_input(array(
                    'name'        => 'description',
                    'id'          => 'description',
                    'value'=>set_value('description',$object->description),
                    )
                    )?></td>
    </tr>


</table>
<?=form_submit(array('value'=>'save'));?>
<?= form_close();?>