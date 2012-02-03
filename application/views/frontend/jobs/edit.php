<h1>Изменить работу: <?=$object->name?></h1>

<?= form_open('/jobs/edit/'.$object->id);?>
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
                    'name'        => 'rate',
                    'id'          => 'rate',
            'value'=>set_value('rate',$object->rate),
                    )
                    )?></td>
    </tr>
    <tr>
        <td>Цена 1</td>
        <td><?=form_input(array(
                    'name'        => 'price1',
                    'id'          => 'price1',
            'value'=>set_value('price1',$object->price1),
                    )
                    )?></td>
    </tr>
    <tr>
        <td>Цена 2</td>
        <td><?=form_input(array(
                    'name'        => 'price2',
                    'id'          => 'price2',
            'value'=>set_value('price2',$object->price2),
                    )
                    )?></td>
    </tr><tr>
        <td>Ед.изм.</td>
        <td><?=form_input(array(
                    'name'        => 'units',
                    'id'          => 'units',
                    'value'=>set_value('units',$object->units),
                    )
                    )?></td>
    </tr>
    <tr>
        <td>Дата</td>
        <td><?=form_input(array(
                    'name'        => 'date',
                    'id'          => 'date',
                    'value'=>set_value('date',$object->date),
                    )
                    )?></td>
    </tr>


</table>
<?=form_submit(array('value'=>'save'));?>
<?= form_close();?>