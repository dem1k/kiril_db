<div ><a href="/distributors/create/"> new </a></div>
<h1>Поставщики</h1>
<table>
    <thead>
        <tr>
            <th>Название</th>
            <th>description</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($objects as $object):?>
        <tr>
            <td><?=$object->name?></td>
            <td><?=$object->description?></td>
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
            <th>description</th>
        </tr>
    </tfoot>
</table>