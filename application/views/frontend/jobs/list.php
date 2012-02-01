<div ><a href="/jobs/create/"> new </a></div>
<h1>Работы</h1>
<table>
    <thead>
        <tr>
            <th>Название</th>
            <th>Коэф.</th>
            <th>Цена</th>
            <th>Цена2</th>
            <th>Ед.изм</th>
            <th>Дата</th>
            <th>Действия</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($objects as $object):?>
        <tr>
            <td><?=$object->name?></td>
            <td><?=$object->rate?></td>
            <td><?=$object->price1?></td>
            <td><?=$object->price2?></td>
            <td><?=$object->units?></td>
            <td><?=$object->date?></td>
            <td>
                <a href="/jobs/edit/<?=$object->id?>/"> edit </a>
                <br/>
                <a href="/jobs/delete/<?=$object->id?>/"> delete </a>
            </td>
        </tr>
        <?php endforeach;?>
    </tbody>
    <tfoot>
        <tr>
            <th>Название</th>
            <th>Коэф.</th>
            <th>Цена</th>
            <th>Цена2</th>
            <th>Ед.изм</th>
            <th>Дата</th>
            <th>Действия</th>
        </tr>
    </tfoot>
</table>