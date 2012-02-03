
<h1>Создать работу</h1>


<?= form_open('/jobs/create');?>
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
        <td>коэф.</td>
        <td><?=form_input(array(
                    'name'        => 'rate',
                    'id'          => 'rate',
                    )
                    )?></td>
    </tr>
    <tr>
        <td>Цена 1</td>
        <td><?=form_input(array(
                    'name'        => 'price1',
                    'id'          => 'price1',
                    )
                    )?></td>
    </tr>
    <tr>
        <td>Цена 2</td>
        <td><?=form_input(array(
                    'name'        => 'price2',
                    'id'          => 'price2',
                    )
                    )?></td>
    </tr><tr>
        <td>Ед.изм.</td>
        <td><?=form_input(array(
                    'name'        => 'units',
                    'id'          => 'units',
                    )
                    )?></td>
    </tr>
    <tr>
        <td>Дата</td>
        <td><?=form_input(array(
                    'name'        => 'date',
                    'id'          => 'date',
                    )
                    )?></td>
    </tr>


</table>
<?=form_submit(array('value'=>'save'));?>
<?= form_close();?>